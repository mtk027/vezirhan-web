<?php

namespace App\Helpers;

use App\Models\Language;
use App\Models\SystemPage;
use App\Models\Translation;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class InstallHelper
{
    public static function save_data_local()
    {
        try {
            $aranan = "/ __(.*?) /i";
            $system_pages = SystemPage::all();
            $php_dosyalar = glob(base_path('resources/views/frontend/*.blade.php'));
            $homepage = glob(base_path('resources/views/frontend/homepage_block/*.blade.php'));
            $php_dosyalar = array_merge($php_dosyalar, $homepage);
            $franchising = glob(base_path('resources/views/frontend/franchising_block/*.blade.php'));
            $php_dosyalar = array_merge($php_dosyalar, $franchising);
            $layouts = glob(base_path('resources/views/frontend/layouts/*.blade.php'));
            $php_dosyalar = array_merge($php_dosyalar, $layouts);
            $languages = Language::all();
            $control = false;
            foreach ($languages as $language) {
                $file = base_path("resources/lang/{$language->code}.json");
                if (!file_exists($file)) {
                    $tr_file = base_path("resources/lang/tr.json");
                    $file = copy($tr_file, $file);
                }
                $myObj = [];
                $dil_file_contents = file_get_contents($file);
                $dil_file_json = json_decode($dil_file_contents);
                foreach ($php_dosyalar as $php_dosya) {
                    $php_file_contents = file_get_contents($php_dosya);
                    preg_match_all($aranan, $php_file_contents, $sonuc);
                    $sonuclar = $sonuc[1];
                    foreach ($sonuclar as $sonuc) {
                        $sonuc = Str::between($sonuc, "('", "')");
                        foreach ($dil_file_json as $dil_file_key => $struct) {
                            if ($sonuc == $dil_file_key) {
                                $control = true;
                                break;
                            }
                        }
                        if (!$control) {
                            $inp = $dil_file_json;
                            foreach ($inp as $inp_key => $inp_value) {
                                $myObj[$inp_key] = $inp_value;
                            }
                            $myObj[$sonuc] = $sonuc;
                            foreach ($system_pages as $system_page) {
                                $myObj['/'.$system_page->route_name] = '/'.$system_page->route_name;
                            }
                            file_put_contents($file, json_encode($myObj, true));
                        }
                        $control = false;
                    }
                }
            }
        } catch (Exception $e) {
            return $e;
        }
    }
    public static function save_data_database()
    {
        try {
            DB::beginTransaction();
            $languages = Language::all();
            foreach ($languages as $language) {
                $file = base_path("resources/lang/{$language->code}.json");
                $file_contents = json_decode(file_get_contents($file));
                foreach ($file_contents as $key => $text) {
                    Translation::updateOrCreate(
                        ['key' => $key, 'language_id' => $language->id],
                        [
                            'key' => $key,
                            'text' => $text,
                            'language_id' => $language->id
                        ]
                    );
                }
                DB::commit();
            }
        } catch (Exception $e) {
            dd($e);
            DB::rollback();
        }
    }
}
