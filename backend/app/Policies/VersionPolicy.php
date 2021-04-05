<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Version;
use Illuminate\Auth\Access\HandlesAuthorization;

class VersionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any versions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the version.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Version  $version
     * @return mixed
     */
    public function view(?User $user, Version $version)
    {
        return true;
    }

    /**
     * Determine whether the user can create versions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the version.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Version  $version
     * @return mixed
     */
    public function update(User $user, Version $version)
    {
        return $user->role === 'admin' or $user->id === $version->user_id;
    }

    /**
     * Determine whether the user can delete the version.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Version  $version
     * @return mixed
     */
    public function delete(User $user, Version $version)
    {
        return $user->role === 'admin' or $user->id === $version->user_id;
    }

    /**
     * Determine whether the user can restore the version.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Version  $version
     * @return mixed
     */
    public function restore(User $user, Version $version)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the version.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Version  $version
     * @return mixed
     */
    public function forceDelete(User $user, Version $version)
    {
        //
    }
}
