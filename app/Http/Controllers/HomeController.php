<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $comics = Comic::with('image')->orderBy('id', 'desc')->take(3)->get();
        return view('welcome', compact('comics'));
    }
}
