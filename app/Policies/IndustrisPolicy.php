<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Industris;
use Illuminate\Auth\Access\HandlesAuthorization;

class IndustrisPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view_any_industri');
    }

    public function view(User $user, Industris $industris): bool
    {
        return $user->can('view_industri');
    }

    public function create(User $user): bool
    {
        return $user->can('create_industri');
    }

    public function update(User $user, Industris $industris): bool
    {
        return $user->can('update_industri');
    }

    public function delete(User $user, Industris $industris): bool
    {
        return $user->can('delete_industri');
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_industri');
    }

    public function forceDelete(User $user, Industris $industris): bool
    {
        return $user->can('force_delete_industri');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_industri');
    }

    public function restore(User $user, Industris $industris): bool
    {
        return $user->can('restore_industri');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_industri');
    }

    public function replicate(User $user, Industris $industris): bool
    {
        return $user->can('replicate_industri');
    }

    public function reorder(User $user): bool
    {
        return $user->can('reorder_industri');
    }
}
