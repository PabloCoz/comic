<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:Listar Comic (creador)')->only('index');
        $this->middleware('can:Revisar Comic (administrador)')->only('show');
    }

    public function index()
    {
        return view('admin.comics.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show(Comic $comic)
    {
        $this->authorize('revision', $comic);
        $chapters = $comic->chapters()->orderBy('position', 'asc')->get();
        return view('admin.comics.show', compact('comic', 'chapters'));
    }

    public function approved(Comic $comic)
    {
        $this->authorize('revision', $comic);
        if ($comic->observations()->count() > 0) {
            $comic->observations()->delete();
        }
        $comic->status = 3;
        $comic->save();
        return redirect()->route('admin.comics.index');
    }
}
