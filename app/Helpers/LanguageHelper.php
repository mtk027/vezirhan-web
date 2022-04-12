<?php

namespace App\Helpers;

use App\Models\Language;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;

class LanguageHelper
{
    public static function getLanguageId()
    {
        $default_language_id = 1;
        $language = Language::where('code', session('locale'))
            ->first();
        return $language->id ?? $default_language_id;
    }
}
