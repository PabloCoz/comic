<?php

namespace App\Observers;

use App\Models\Chapter;
use Illuminate\Support\Facades\Storage;

class ChapterObserver
{
    public function deleting(Chapter $chapter)
    {
        if ($chapter->images) {
            foreach ($chapter->images as $image) {
                $image->delete();
                Storage::delete($image->url);
            }
        }
    }
}
