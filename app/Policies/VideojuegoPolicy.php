<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Videojuego;
use Illuminate\Auth\Access\Response;

class VideojuegoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $tresMeses = now()->subMonths(3);
        return $user->created_at->lessThan($tresMeses);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Videojuego $videojuego): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->name == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Videojuego $videojuego): bool
    {
        return $user->videojuegos()->where('id', $videojuego->id)->exists();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Videojuego $videojuego): bool
    {
        $uc = $user->created_at;
        $vc = $videojuego->create_at;
        return $uc->diffInMonths($vc) >= 3.0;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Videojuego $videojuego): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Videojuego $videojuego): bool
    {
        return false;
    }
}
