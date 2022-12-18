<?php

use App\Http\Controllers\Creator\ComicController;
use App\Http\Livewire\Creator\ComicChapter;
use App\Http\Livewire\Creator\ImageChapter;
use Illuminate\Support\Facades\Route;

Route::resource('comics', ComicController::class)->names('creator.comics');

Route::get('comics/{comic}/chapter', ComicChapter::class)->name('creator.comics.chapter');

Route::get('comics/chapter/{chapter}', ImageChapter::class)->name('creator.comics.images');
