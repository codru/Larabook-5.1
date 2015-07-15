<?php

namespace Larabook\Statuses;

use Illuminate\Support\Facades\Auth;
use Larabook\Users\User;

class StatusRepository
{
    public function save(Status $status)
    {
        return Auth::user()->statuses()->save($status);
    }

    public function getAllForUser(User $user)
    {
        return $user->statuses()->with('user')->latest()->get();
    }
}
