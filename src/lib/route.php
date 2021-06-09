<?php

use Curl\Curl;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Plugins\Htshop\src\Models\Htshop;
use App\Plugins\Htshop\src\Http\Controllers\AdminController;
use App\Plugins\Htshop\src\Http\Controllers\IndexController;

// 管理

Route::prefix('admin/settingPro/Htshop')
    ->name('admin.settingPro.Htshop.')
    ->group(function () {

        Route::get('/', [AdminController::class, "index"])->name("index");
    });


// 
Route::prefix('Htshop')
    ->name('Htshop.')
    ->group(function () {
        Route::get('/', [IndexController::class, "show"])->name("index");

        Route::post('/', [IndexController::class, "store"])->name("post");

    });
