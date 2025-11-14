<?php

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function(){
    $nombre = request()->query('nombre');
    return "Hola, $nombre";
});

Route::get('/clientes', function(){
    return view('clientes.index', [
        'clientes' => Cliente::all(),
    ]);
});

Route::get('/clientes/create', function() {
    return view('clientes.create');
    //Cliente::create([
      //  'dni' => '2222',
        //'nombre' => 'Rocío',
        //'apellidos' => 'Torcido',
        //'direccion' => 'Calle Colmena 2',
        //'codpostal' => 11540,
        //'telefono' => '74583,629'
    //]);
});

Route::post('/clientes', function(Request $request){
    $validated = $request->validate([
        'dni' => 'required|max:9|unique:clientes,dni',
        'nombre' => 'required|max:255',
        'apellidos' => 'nullable|max:255',
        'direccion' => 'nullable|max:255',
        'codpostal' => 'nullable|digits:5',
        'telefono' => 'nullable|max:255'
    ]);
    Cliente::create($validated);
    return redirect('/clientes');
});

Route::delete('/clientes/{cliente}', function(Cliente $cliente){
    $cliente->delete();
    return redirect('/clientes');
});

Route::get('/clientes/{cliente}/edit', function(Cliente $cliente){
    return view('/clientes.edit', [
        'cliente' => $cliente,
    ]);
});

Route::put('/clientes/{cliente}', function(Cliente $cliente, Request $request){
    $validated = $request->validate([
        'dni' => 'required|max:9|unique:clientes,dni,' . $cliente->id,
        'nombre' => 'required|max:255',
        'apellidos' => 'nullable|max:255',
        'direccion' => 'nullable|max:255',
        'codpostal' => 'nullable|digits:5',
        'telefono' => 'nullable|max:255'
    ]);
    $cliente->update($validated);
    return redirect('/clientes');
});
