<?php

use App\Plugins\Htshop\src\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// 管理

Route::prefix('admin/settingPro/Htshop')
    ->name('admin.settingPro.Htshop.')
    ->group(function () {

    Route::get('/', [AdminController::class,"index"])->name("index");
    
});


// 
Route::prefix('Htshop')
    ->name('Htshop.')
    ->group(function () {
    Route::get('/', [AdminController::class,"index"])->name("index");
    
});