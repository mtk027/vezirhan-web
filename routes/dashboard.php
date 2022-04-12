<?php

use App\Http\Controllers\Dashboard\BranchController;
use App\Http\Controllers\Dashboard\ContactRequestController;
use App\Http\Controllers\Dashboard\FaqController;
use App\Http\Controllers\Dashboard\MainController;
use App\Http\Controllers\Dashboard\MenuController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\TranslationController;
use App\Http\Controllers\Dashboard\FileController;
use App\Http\Controllers\Dashboard\FranchiseController;
use App\Http\Controllers\Dashboard\FranchiseRequestController;
use App\Http\Controllers\Dashboard\GalleryController;
use App\Http\Controllers\Dashboard\HappyCustomerController;
use App\Http\Controllers\Dashboard\HomepageBlockController;
use App\Http\Controllers\Dashboard\PropertyController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('index');
        Route::get('/change-status/{page}/{id}/{column_to_update}', [MainController::class, 'change_status']);
        Route::resource('/pages', PageController::class);
        Route::resource('/homepage-blocks', HomepageBlockController::class);
        Route::resource('/sliders', SliderController::class);
        Route::resource('/libraries', FileController::class);
        Route::resource('/menus', MenuController::class);
        Route::resource('/translations', TranslationController::class);
        Route::resource('/settings', SettingController::class);
        Route::resource('/properties', PropertyController::class);
        Route::resource('/branches', BranchController::class);
        Route::resource('/contact-requests', ContactRequestController::class);
        Route::resource('/franchise-requests', FranchiseRequestController::class);
        Route::resource('/faqs', FaqController::class);
        Route::resource('/happy-customers', HappyCustomerController::class);
        Route::resource('/franchises', FranchiseController::class);
        Route::resource('/galleries', GalleryController::class);
        Route::post('menus/order-update', [MenuController::class, 'order_update'])->name('menus.order_update');
        Route::post('menus/dynamic-nestable', [MenuController::class, 'dynamic_nestable'])->name('menus.dynamic_nestable');
        Route::resource('users', UserController::class);

    });
    
    Route::post('/file-upload/{path}', [FileController::class, 'store'])->name('file_upload');
    Route::delete('/file-delete', [FileController::class, 'destroy'])->name('file_delete');
    Route::get('/file-fetch/{file}', [FileController::class, 'show'])->name('file_fetch');
});
