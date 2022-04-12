<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;


class LanguageController extends Controller
{
    public function change_language($lang)
    {
        Session::put('locale', $lang);

        app()->setLocale($lang);


        return redirect('/');
    }
}
