<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\RequisitionItem;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RequisitionItemPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RequisitionItem $requisitionItem): bool
    {
        return $requisitionItem->is_public ||
        $requisitionItem->event->invitations()->where('user_id', $user->id)->exists() ||
        $user->id === $requisitionItem->event->creator_id ||
        $user->id === $requisitionItem->event->event_for_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user,Event $event): bool
    {
        return $user->id === $event->creator_id || $user->id === $event->event_for_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RequisitionItem $requisitionItem): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RequisitionItem $requisitionItem): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RequisitionItem $requisitionItem): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RequisitionItem $requisitionItem): bool
    {
        return false;
    }

    public function claim(User $user, RequisitionItem $item)
    {
        return !$item->claimed_by_id &&
               $item->event->invitations()->where('user_id', $user->id)
                        ->where('status', 'Accepted')->exists();
    }
}
