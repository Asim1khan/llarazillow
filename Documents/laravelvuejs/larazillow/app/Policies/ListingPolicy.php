<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ListingPolicy
{

    use HandlesAuthorization;
      public function before(?User $user,$ability){
           if($user?->is_admin /*&& $ability==='update'*/)
           {
            return true;
           }
      }
    public function viewAny(User $user): bool
    {
        return true;
    }


    public function view(?User $user, Listing $listing): bool
    {
            return true;
        //
    }


    public function create(User $user): bool
    {
     return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Listing $listing): bool
    {
        return $user->id === $listing->by_user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Listing $listing): bool
    {

        return $user->id === $listing->by_user_id;
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Listing $listing): bool
    {
        return $user->id === $listing->by_user_id;
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Listing $listing): bool
    {
        return $user->id === $listing->by_user_id;
        //
    }
}
