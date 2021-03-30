<?php

namespace App\Policies;

use App\Models\ProductVersion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductVersionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any product versions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the product version.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductVersion  $productVersion
     * @return mixed
     */
    public function view(?User $user, ProductVersion $productVersion)
    {
        return true;
    }

    /**
     * Determine whether the user can create product versions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the product version.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductVersion  $productVersion
     * @return mixed
     */
    public function update(User $user, ProductVersion $productVersion)
    {
        return $user->id === $productVersion->user_id;
    }

    /**
     * Determine whether the user can delete the product version.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductVersion  $productVersion
     * @return mixed
     */
    public function delete(User $user, ProductVersion $productVersion)
    {
        return $user->id === $productVersion->user_id;
    }

    /**
     * Determine whether the user can restore the product version.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductVersion  $productVersion
     * @return mixed
     */
    public function restore(User $user, ProductVersion $productVersion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the product version.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductVersion  $productVersion
     * @return mixed
     */
    public function forceDelete(User $user, ProductVersion $productVersion)
    {
        //
    }
}
