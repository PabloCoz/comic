<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comic;
use Livewire\Component;

class Observations extends Component
{
    public $open = false;

    public $comic, $body;

    public function mount(Comic $comic)
    {
        $this->comic = $comic;
    }

    public function render()
    {
        return view('livewire.admin.observations');
    }

    public function save()
    {
        $this->validate([
            'body' => 'required',
        ]);

        $this->comic->observations()->create([
            'body' => $this->body,
        ]);
        $this->comic->status = 1;
        $this->comic->save();

        $this->reset(['open', 'body']);

        return redirect()->route('admin.comics.index');
    }
}
