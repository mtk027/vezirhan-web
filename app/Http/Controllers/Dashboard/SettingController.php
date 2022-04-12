<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index()
    {
        $data['languages'] = Language::all();
        $data['groups'] = Setting::select('group','group_title')->distinct()->get();
        $data['settings'] = Setting::all();
        return view('admin.settings.index', $data);
    }
    
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            foreach (Language::all() as $lang) {
                $setting = Setting::where('language_id', $lang->id)->get();
                foreach ($setting as $item) {
                    $settting_el = Setting::where('key', $item->key)->where('language_id', $lang->id)->first();
                    $settting_el->update(['value' => $request[$item->key][$lang->id]]);
                }
            }
            DB::commit();
            session()->flash('success', "Ayarlar Başarıyla Güncellendi.");
            return redirect()->route('dashboard.settings.index');
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('error', "Ayarlar Güncellenirken bir Hata oluştu. Hata mesajı: " . $e->getMessage());
            return redirect()->route('dashboard.settings.index');
        }
    }
}
