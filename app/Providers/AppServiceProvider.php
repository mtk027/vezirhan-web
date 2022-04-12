<?php

namespace App\Providers;

use App\Helpers\LanguageHelper;
use App\Models\File;
use App\Models\Setting;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('settings')) {
            foreach (Setting::where('language_id', LanguageHelper::getLanguageId())->get() as $setting) {
                if ($setting->type != "image") {
                    Config::set('settings.' . $setting->group . '.' . $setting->key, $setting->value);
                } else {
                    $path = File::where('slug', $setting->value)->first();
                    if ($path) {
                        $path = $path->path;
                        Config::set('settings.' . $setting->group . '.' . $setting->key, $path);
                    }
                }
            }
        }
        if(session('locale') == null){
            session()->put('locale','tr');
        }
        Builder::defaultStringLength(191);
    }
}
