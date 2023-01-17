<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function original(User $user)
    {
        $user->profile->update([
            'is_original' => Profile::PROCESO
        ]);

        return redirect()->route('users.show', $user);
    }
}
