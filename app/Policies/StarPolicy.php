<?php

namespace App\Policies;

use App\Models\Star;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StarPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Star $star): bool
    {
        return $star->user()->is($user);
    }

    public function delete(User $user, Star $star): bool
    {
        return $this->update($user, $star);
    }
}
