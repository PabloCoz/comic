<?php

namespace App\Observers;

use App\Models\Comic;
use Illuminate\Support\Facades\Storage;

class ComicObserver
{
    public function deleting(Comic $comic)
    {   
        if ($comic->image) {
            $comic->image->delete();
            Storage::delete($comic->image->url);
        }
        $comic->chapters()->delete();

    }
}
