<?php

namespace App\Policies;

use App\Models\Comentario;
use App\Models\User;
use App\Models\Videojuego;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ComentarioPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response|RedirectResponse
    {
        return Response::deny("Solo el administrador puede ver los comentarios");
        return Response::allow();
        //return Response::allow();

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Comentario $comentario): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return Response::allow();
    }

    public function store(User $user, Videojuego $videojuego): Response
    {
        return $user->videojuegos()->where('videojuego_id', $videojuego->id)->exists()
        ? Response::allow()
        : Response::deny('Solo puedes comentar los videojuegos que hayas comprado');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Comentario $comentario): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comentario $comentario): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Comentario $comentario): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Comentario $comentario): bool
    {
        return false;
    }
}
