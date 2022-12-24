<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comic;
use Livewire\Component;
use Livewire\WithPagination;

class ComicsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $search;
    public function render()
    {
        $comics = Comic::where('title', 'LIKE', "%{$this->search}%")
            ->where('status', '=', 2)
            ->paginate(10);
        return view('livewire.admin.comics-index', compact('comics'));
    }

    public function clearPage()
    {
        $this->resetPage();
    }
}
