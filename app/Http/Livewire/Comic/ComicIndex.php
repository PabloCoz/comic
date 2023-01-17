<?php

namespace App\Http\Livewire\Comic;

use App\Models\Category;
use App\Models\Comic;
use Livewire\Component;
use Livewire\WithPagination;

class ComicIndex extends Component
{
    use WithPagination;
    public $cate, $search;

    public function render()
    {
        $comics =  Comic::orderBy('id', 'desc')
            ->where('status', Comic::PUBLICADO)
            ->where('title', 'like', '%' . $this->search . '%')
            ->category($this->cate)
            ->whereHas('profile', function ($query) {
                $query->where('is_original', false);
            })
            ->paginate(12);
        return view('livewire.comic.comic-index', compact('comics'));
    }

    public function getCategoriesProperty()
    {
        return Category::get();
    }

    public function resetFilter()
    {
        $this->reset('cate');
    }

    public function clearPage()
    {
        $this->resetPage();
    }

    public function getOriginalsProperty()
    {
        return Comic::where('status', Comic::PUBLICADO)
            ->where('title', 'like', '%' . $this->search . '%')
            ->category($this->cate)
            ->whereHas('profile', function ($query) {
                $query->where('is_original', 3);
            })->take(4)
            ->get();
    }
}
