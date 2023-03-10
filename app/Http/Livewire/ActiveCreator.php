<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ActiveCreator extends Component
{
    public $name, $email, $phone, $address, $city, $country, $facebook, $instagram, $bio;

    public function render()
    {
        return view('livewire.active-creator');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'bio' => 'required',
        ]);

        auth()->user()->profile()->create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'user_id' => auth()->user()->id,
            'bio' => $this->bio,
        ]);

        auth()->user()->save();

        auth()->user()->assignRole('Creador');

        $this->reset('name', 'email', 'phone', 'address', 'city', 'country', 'facebook', 'instagram', 'bio');

        return redirect()->route('creator.comics.index');
    }
}
