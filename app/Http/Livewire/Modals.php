<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Modals extends Component
{
    public $open = false;

    public function render()
    {
        return view('livewire.modals');
    }
}
