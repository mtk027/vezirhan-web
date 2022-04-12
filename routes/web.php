<?php

use App\Http\Controllers\Frontend\BranchController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FranchiseController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\LanguageController;
use App\Models\Language;
use App\Models\SystemPage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [HomeController::class, 'index']);

Route::get('/change-language/{lang}', [LanguageController::class, 'change_language'])->name('change_language');

Route::name('system.')->group(function () {
    if (Schema::hasTable('languages')) {
        foreach (Language::all() as  $language) {
            $code = $language->code;
            Route::group(['prefix' => $code], function () use ($code) {
                if (Schema::hasTable('system_pages')) {
                    foreach (SystemPage::all() as $system_page) {
                        $route_name = $system_page->route_name;
                        Route::get(__('/' . $route_name . '', [], $code), [$system_page->controller, 'show'])->name("{$code}.{$route_name}");
                    }
                }
            });
        }
    }
});
Route::post('/send-contact-form', [ContactController::class, 'send_contact_form'])->name("send_contact_form");
Route::post('/send-faq-form', [HomeController::class, 'send_faq_form'])->name("send_faq_form");
Route::post('/send-franchising-form', [FranchiseController::class, 'send_franchising_form'])->name("send_franchising_form");

Route::get('/{slug}', [BranchController::class, 'show'])->name("branches");
