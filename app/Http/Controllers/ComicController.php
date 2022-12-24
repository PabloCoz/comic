<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{

    public function index()
    {
        return view('comics.index');
    }

    public function show(Comic $comic)
    {
        $this->authorize('published', $comic);
        $chapters = $comic->chapters()->orderBy('position', 'asc')->get();
        return view('comics.show', compact('comic' , 'chapters'));
    }

    public function enrolled(Comic $comic)
    {
        $comic->users()->attach(auth()->user()->id);
        $chapter = $comic->chapters()->first();
        return redirect()->route('comics.status', [$comic, $chapter]);
    }
}
