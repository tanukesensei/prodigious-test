<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function update(User $user, User $userToEdit)
    {
       return $user->id === $userToEdit->id || $user->is_admin;
    }

    public function destroy(User $user)
    {
       return $user->is_admin;
    }

    public function store(User $user)
    {
       return $user->is_admin;
    }

}
