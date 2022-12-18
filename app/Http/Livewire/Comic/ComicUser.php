<?php

namespace App\Http\Livewire\Comic;

use Livewire\Component;

class ComicUser extends Component
{
    public function render()
    {   
        $comics = auth()->user()->comics_enrolled()->get();
        return view('livewire.comic.comic-user', compact('comics'));
    }
}
