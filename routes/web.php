<?php

use App\Models\Cliente;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
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

Route::delete('/clientes/borrar/{cliente}', function(Cliente $cliente){
    $cliente->delete();
    return redirect('/clientes');
});
