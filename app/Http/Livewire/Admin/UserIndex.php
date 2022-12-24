<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    protected $listeners = ['render' => 'render'];
    public function render()
    {
        $users = User::where('username', 'LIKE', "%{$this->search}%")
            ->paginate(10);
        return view('livewire.admin.user-index', compact('users'));
    }

    public function clearPage()
    {
        $this->resetPage();
    }

    public function banear($user)
    {
        $user = User::find($user);
        $user->status = false;
        $user->save();
        $this->emitSelf('render');
    }

    public function activar($user)
    {
        $user = User::find($user);
        $user->status = true;
        $user->save();
        $this->emitSelf('render');
    }
}
