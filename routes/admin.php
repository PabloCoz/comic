<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ComicController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->middleware('can:Ver Dashboard (administrador)')->name('admin');

Route::resource('users', UserController::class)->middleware('can:Listar Usuario (administrador)')->names('admin.users');

Route::resource('roles', RoleController::class)->middleware('can:Listar Role (administrador)')->names('admin.roles');

Route::get('comics', [ComicController::class, 'index'])->name('admin.comics.index');

Route::get('comics/{comic}', [ComicController::class, 'show'])->middleware('can:Revisar Comic (administrador)')->name('admin.comics.show');

Route::post('comics/{comic}/approved', [ComicController::class, 'approved'])->middleware('can:Revisar Comic (administrador)')->name('admin.comics.approved');

Route::middleware(['auth'])->group(function () {
    Route::get('settings', [SettingController::class, 'index'])->name('admin.settings.index');
});

Route::resource('categories', CategoryController::class)->names('admin.categories');