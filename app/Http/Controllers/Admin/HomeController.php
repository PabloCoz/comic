<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $comics = Comic::count();
        $users = User::count();
        $profiles = Profile::where('is_original', 3)->count();
        return view('admin.index', compact('comics', 'users', 'profiles'));
    }
}
