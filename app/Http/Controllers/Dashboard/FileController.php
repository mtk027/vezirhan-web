<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Helpers\General;
use App\Models\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File as SupportFile;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['items'] = File::all();

        return view('admin.libraries.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $path)
    {
        $requestKeys = collect($request->all())->keys();
        try {
            DB::beginTransaction();
            if ($path != "libraries") {
                $path = "/uploads/{$path}";
            } else {
                $path = "/uploads";
            }
            if (gettype($request[$requestKeys[0]]) == 'array') {
                $file = self::check_array($request[$requestKeys[0]]);
            } else {
                $file = $request[$requestKeys[0]];
            }
            $mime_type = $file->getMimeType();
            $size = $file->getSize();
            $resolution = getimagesize($file);
            $file_ext = Str::lower($file->getClientOriginalExtension());
            if (General::check_mime($file_ext)) {
                $uploaded_file = self::file_direct_upload($file, $path);
                $created_file = File::create([
                    "path" => $uploaded_file,
                    "slug" => Str::before(Str::afterLast($uploaded_file, '/'), '.'),
                    "size" => $size,
                    "resolution" => "{$resolution[0]}x{$resolution[1]}",
                    "type" => $requestKeys[0] == "image" ? "default" : $requestKeys[0],
                    "mime_type" => $mime_type
                ]);
                DB::commit();
                return $created_file->slug;
            } else {
                DB::rollBack();
                throw new Exception($file_ext . ' Dosya türü desteklenmiyor.', 1);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return $e;
        }
    }
    public static function check_array($file)
    {
        $key =  array_key_first($file);
        $file = $file[$key];
        if (gettype($file) == 'array') {
            return self::check_array($file);
        } else {
            return $file;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $file = File::where('slug', $slug)->first();
        $path = public_path($file->path);
        $file_name = Str::afterLast($file->path, '/');
        $data = [
            'full_name' => $file_name,
            'file_path' => $file->path,
            'name' => SupportFile::name($file_name),
            'size' => SupportFile::size($path),
            'mime_type' => SupportFile::mimeType($path)
        ];
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $file = File::find($id);
            $file->update([
                'alt' => $request->alt[0],
                'file_title' => $request->file_title[0],
            ]);
            DB::commit();
            session()->flash('success', "Bilgiler başarıyla güncellendi.");
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', "Bilgiler güncellenirken bir sorun oluştu. Hata mesajı:" . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);
        rename(public_path($file->path), public_path('/deleted-files//' . $file->file_name));
        $file->delete();
        return 1;
    }
    public static function file_compress_upload($file, $compression_quality = 100, $folder)
    {
        try {
            $file_name_ext = $file->getClientOriginalName();
            $file_name = Str::slug(pathinfo($file_name_ext, PATHINFO_FILENAME));
            $file_type = Str::lower($file->getClientOriginalExtension());

            if (!file_exists($file)) {
                return false;
            }

            $output_file = self::has_images("{$folder}/{$file_name}", $file_type, 'webp');
            switch ($file_type) {
                case 'jpeg':
                case 'jpg':
                    $image = imagecreatefromjpeg($file);
                    break;

                case 'png':
                    $image = imagecreatefrompng($file);
                    imagepalettetotruecolor($image);
                    imagealphablending($image, true);
                    imagesavealpha($image, true);
                    break;

                case 'gif':
                    $image = imagecreatefromgif($file);
                    break;

                default:
                    return "görsel webp'ye çevrilemiyor.";
            }
            $result = imagewebp($image, public_path() . "/{$output_file}", $compression_quality);

            if (false === $result) {
                return "kayıt işlemi başarısız";
            }

            imagedestroy($image);

            return $output_file;
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function file_direct_upload($file, $folder)
    {
        try {
            $file_name_ext = $file->getClientOriginalName();
            $file_name = Str::slug(pathinfo($file_name_ext, PATHINFO_FILENAME));
            $file_ext = $file->getClientOriginalExtension();

            $featured_file_name =  self::has_images("{$folder}/{$file_name}", $file_ext);
            $upload_success = $file->move(public_path($folder), $featured_file_name);

            if ($upload_success) {
                return $featured_file_name;
            } else {
                throw new Exception("İstek başarısız oldu.", 1);
            }
        } catch (Exception $e) {
            return $e;
        }
    }
    public static function has_images($file_name, $file_ext, $file_last_ext = "")
    {
        $uniq_no = 1;
        if ($file_last_ext != "") {
            $file_ext = $file_last_ext;
        }

        $featured_file_name = "{$file_name}.{$file_ext}";
        while (file_exists(public_path() . '/' . $featured_file_name)) {
            $featured_file_name = "{$file_name}-{$uniq_no}.{$file_ext}";
            $uniq_no++;
        }
        return $featured_file_name;
    }
}
