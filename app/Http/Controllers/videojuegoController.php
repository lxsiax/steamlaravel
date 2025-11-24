<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('videojuegos.index', [
            'videojuegos' => Videojuego::with('desarrolladora')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videojuegos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|decimal:2|gte:-999999.99|lte:999999.99',
            'lanzamiento' => 'required|date',
            'desarrolladora_id' => 'required|exists:desarrolladoras,id',
        ]);

        Videojuego::create($validated);
        return redirect()->route('videojuegos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        return view('videojuegos.show',
        ['videojuego' => $videojuego
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videojuego $videojuego)
    {
        return view('videojuegos.edit', [
            'videojuego' => $videojuego,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videojuego $videojuego)
    {   $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|decimal:2|gte:-999999.99|lte:999999.99',
            'lanzamiento' => 'required|date',
            'desarrolladora' => 'required|exists:desarrolladoras,id',
        ]);

        Videojuego::create($validated);
        return redirect()->route('videojuegos.index');

        $videojuego->update($validated);
        return redirect()->route('videojuegos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        $videojuego->delete();
        return redirect('/videojuegos');
    }
}
