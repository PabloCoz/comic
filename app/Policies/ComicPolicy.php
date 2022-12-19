<?php

namespace App\Policies;

use App\Models\Comic;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComicPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function enrolled(User $user, Comic $comic)
    {
        return $comic->users->contains($user->id);
    }

    public function valued(User $user, Comic $comic)
    {
        if (Rating::where('user_id', $user->id)->where('comic_id', $comic->id)->first())
            return false;
        else
            return true;
    }

    public function created (User $user, Comic $comic)
    {
        if ($comic->user_id == $user->id)
            return true;
        else
            return false;
    }
}