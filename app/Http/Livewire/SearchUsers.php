<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.search-users');
    }

    public function getUsersProperty()
    {
        return User::has('profile')->take(4)
            ->get();
    }

    public function getResultsProperty()
    {
        return User::has('profile')
            ->where('username', 'like', '%' . $this->search . '%')
            ->get() ?? [];
    }
}
