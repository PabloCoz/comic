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
            ->where('title', 'like', '%' . $this->search . '%')
            ->category($this->cate)->paginate(12);
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
}
