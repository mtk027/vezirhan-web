<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\InstallHelper;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Language;
use App\Models\Translation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Translation::all();
        $data['languages'] = Language::all();
        return view('admin.translations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.translations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $new_language = Language::create([
                'title' => $request->title,
                'code' => Str::lower($request->code)
            ]);
            $file = base_path('resources/lang/en.json');
            if (!file_exists($file)) {
                $file = base_path('resources/lang/tr.json');
            }
            $coppied = copy($file, base_path("resources/lang/{$new_language->code}.json"));
            if ($coppied) {
                InstallHelper::save_data_database();
                DB::commit();
                session()->flash('success', "Dil Başarıyla Eklendi.");
                return redirect()->route('dashboard.translations.index');
            } else {
                DB::rollBack();
                session()->flash('error', "Ayarlar Güncellenirken bir Hata oluştu. Hata mesajı: Dil dosyası oluşturulamadı.");
                return redirect()->route('dashboard.settings.index');
            }
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', "Ayarlar Güncellenirken bir Hata oluştu. Hata mesajı: " . $e->getMessage());
            return redirect()->route('dashboard.settings.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
        $myObj = [];

        foreach ($request->key as $language => $key) {
            $dosya = base_path("resources/lang/{$language}.json");
            foreach ($request->key[$language] as $item => $text) {
                $myObj[$text] = $request->text[$language][$item];
            }
            file_put_contents($dosya, json_encode($myObj));
        }
        InstallHelper::save_data_database();
        return redirect()->back()->withSuccess('Çeviriler Kaydedildi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language = Language::find($id);
        if ($id != 1) {
            unlink(base_path("resources/lang/{$language->code}.json"));
            $language->delete();
            return true;
        }else{
            return "{$language->title} Ana dil olduğu için silinemez.";
        }
    }
}
