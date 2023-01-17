<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\ActiveCreator;
use App\Http\Livewire\Comic\ComicStatus;
use App\Http\Livewire\Comic\ComicUser;
use App\Http\Livewire\SearchUsers;
use Illuminate\Support\Facades\Route;


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

Route::get('/', HomeController::class)->name('home');

Route::resource('/comics', ComicController::class)->only(['index', 'show'])->names('comics');

Route::get('active', ActiveCreator::class)->middleware('auth')->name('active');

Route::post('/comics/{comic}/enrolled', [ComicController::class, 'enrolled'])->middleware('auth')->name('comics.enrolled');

Route::get('/comics/{comic}/{chapter}', ComicStatus::class)->middleware('auth')->name('comics.status');

Route::get('/my-comics', ComicUser::class)->middleware('auth')->name('comics.user');

Route::get('/search-users', SearchUsers::class)->name('search.users');

Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');

Route::post('users/{user}/originl', [UserController::class, 'original'])->middleware('auth')->name('users.original');