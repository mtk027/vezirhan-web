<?php

namespace App\Helpers;

use App\Models\Branch;
use App\Models\File;
use App\Models\Language;
use App\Models\MenuItem;
use App\Models\SystemPage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class General
{

    public static function get_languages($id = null)
    {
        if ($id) {
            return Language::find($id);
        }
        return Language::all();
    }

    public static function get_menu($parent_id = null, $menu_id)
    {
        $menu = MenuItem::with('sub_menu')->where(['language_id' => LanguageHelper::getLanguageId(), 'parent_id' => $parent_id, 'menu_id' => $menu_id])->orderBy('row_number')->get();
        $menus = [];
        foreach ($menu as $data) {
            switch ($data->type) {
                case 0:
                    $data->url = url($data->value);
                    break;
                case 1:
                    $branch = Branch::with(['description' => function ($query) {
                        $query->where('language_id', LanguageHelper::getLanguageId());
                    }])->find($data->value);

                    $data->url = route('branches', $branch->description->url);
                    break;
                case 2:
                    $system_page = SystemPage::find($data->value);
                    $data->url = route('system.' . session('locale') . '.' . $system_page->route_name);
                    break;
            }
            if ($data->url == "#") {
                $data->url = "javascript:;";
            }
            $menus[] = $data;
        }
        return $menus;
    }


    public static function get_block_title($key)
    {
        $array =  [
            'title' => 'Başlık',
            'sub_title' => 'Alt Başlık',
            'description' => 'Açıklama',
            'btn_1_title' => 'İlk Buton Başlığı',
            'btn_1_project_id' => 'İlk Buton Projesi',
            'image' => 'Görsel',
            'percentage' => 'Yüzde'
        ];
        return $array[$key];
    }

    public static function except_data()
    {
        return ['_token', 'image', 'video', 'file_type', 'has_sub_title', 'has_button', 'has_row_number', 'has_short_description'];
    }
    public static function get_first_letter($text)
    {
        $array = Str::of($text)->explode(' ');
        $char_in = "";
        foreach ($array as $char) {
            $char_in .= $char[0];
        }
        return $char_in;
    }

    public static function date_format($time, $format = 'DD MMMM YYYY H:mm')
    {
        Carbon::setLocale(config('app.locale'));
        $date = Carbon::parse($time);
        return $date->isoFormat($format);
    }

    public static function get_menu_types()
    {
        return [
            0 => ['type' => 'text', 'title' => 'Değişken Url', 'model' => null],
            1 => ['type' => 'select', 'title' => 'Şube', 'model' => 'App\Models\Branch'],
            2 => ['type' => 'select', 'title' => 'Sistem Sayfası', 'model' => 'App\Models\SystemPage']
        ];
    }



    public static function get_all_data($model)
    {
        $data = $model::first();
        if (isset($data->language_id)) {
            return $model::where('language_id', LanguageHelper::getLanguageId())->get();
        } else {
            return $model::get();
        }
    }


    public static function log_event($event_name)
    {
        switch ($event_name) {
            case 'created':
                return "yeni kayıt ekleme";
                break;
            case 'updated':
                return "kayıt güncelleme";
                break;
            case 'deleted':
                return "kayıt silme";
                break;
        }
    }

    public static function get_slug()
    {
        return Request::segment(count(Request::segments()));
    }

    public static function get_image($slug)
    {
        $data = File::where('slug', $slug)->first();
        return $data->path;
    }

    public static function get_status_button($data, $id, $column_to_update)
    {
        switch ($data) {
            case 1:
                $name = 'Aktif';
                $color = 'success';
                break;
            case 0:
                $name = 'Pasif';
                $color = 'danger';
                break;
        }

        return '<div class="change_status badge badge-light-' . $color . '" data-id="' . $id . '" data-column="' . $column_to_update . '">' . $name . '</div>';
    }

    public static function get_action_buttons($id, $delete = true, $update = true)
    {
        $deleteBtn = '<a href="javascript:;" data-url="' . route('dashboard.' . self::get_slug() . '.destroy', $id) . '" data-bs-custom-class="tooltip-dark" rel="tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Sil" class="btn btn-sm btn-light-danger delete_item me-3"><i class="fas fa-trash fs-4"></i></i></a>';

        $updateBtn = '<a href="' . route('dashboard.' . self::get_slug() . '.edit', $id) . '"  data-bs-custom-class="tooltip-dark" rel="tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Düzenle" class="btn btn-sm btn-light-primary"><i class="fas fa-pencil-alt fs-4"></i></a>';


        if (!$delete) $deleteBtn = '';
        if (!$update) $updateBtn = '';

        return $deleteBtn . $updateBtn;
    }

    public static function get_files()
    {
        $files = File::all();
        $new_data = [];
        foreach ($files as $file) {
            if ($file->type == 'video') {
                $file->path = asset('admin/assets/img/video.png');
            }
            $item = [
                'name' => $file->slug,
                'file' => $file->path,
            ];
            array_push($new_data, $item);
        }
        return $new_data;
    }
    public static function check_mime($extension)
    {
        $clear_extensions = ["docx", "doc", "csv", "xlsx", "xls", "ppt", "jpeg", "jpg", "webp", "png", "svg", "pdf", "mp4"];
        return Arr::first($clear_extensions, function ($value) use ($extension) {
            return $value == Str::lower($extension);
        });
    }
    public static function line_by_line($string)
    {
        $array = preg_split("/\r\n|\n|\r/", $string);
        return $array;
    }
    public static function get_branch_locations()
    {
        $data = [];
        $branches = Branch::where('status', 1)->get();
        foreach ($branches as $key => $branch) {
            $data[$key] = [$branch->description->title, $branch->lat, $branch->lng];
        }
        return json_encode($data);
    }
}
