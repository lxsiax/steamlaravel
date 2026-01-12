<?php

use App\Http\Controllers\GeneroController;
use App\Http\Controllers\VideojuegoController;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/hola', function(){
    $nombre = request()->query('nombre');
    return "Hola, $nombre";
});

Route::get('/clientes', function(){
    return view('clientes.index', [
        'clientes' => Cliente::all(),
    ]);
})->name('clientes.index');

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
/*
Route::get('/videojuegos', [videojuegoController::class, 'index']);
Route::get('/videojuegos/create', 'videojuegoController@create');
Route::get('/videojuegos/destroy', 'videojuegoController@destroy');
Route::get('/videojuegos/edit', 'videojuegoController@edit');
Route::get('/videojuegos/show', 'videojuegoController@show');
Route::get('/videojuegos/store', 'videojuegoController@store');
Route::get('/videojuegos/update', 'videojuegoController@update'); */

Route::resource('videojuegos', VideojuegoController::class)->except(['index', 'show'])->middleware('auth');

Route::resource('videojuegos', VideojuegoController::class)->only(['index', 'show']);

Route::resource('generos', GeneroController::class)->except(['index', 'show'])->middleware('auth');

Route::resource('generos', GeneroController::class)->only(['index', 'show']);

Route::post('/videojuegos/{videojuego}/agregar-genero',
    [VideojuegoController::class, 'agregar_genero']
)->middleware('auth')->name('videojuegos.agregar_genero');

Route::delete('/videojuegos/{videojuego}/quitar_genero/{genero}',
    [VideojuegoController::class,'quitar_genero']
    )->middleware('auth')->name('videojuegos.quitar_genero');

Route::get('/login', function(){
    return view('users.login');
})->name('login');

Route::post('/login', function (Request $request){
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->intended(route('users.profile'));
    }

    return back()->withErrors([
        'email' => 'Las credenciales no corresponden a ninguna cuenta',
    ])->onlyInput('email');
})->name('login.perform');

Route::post('/logout', function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->middleware('auth')->name('logout');

Route::get('/profile', function(){
    return view('users.profile', [
        'usuario' => Auth::user(),
    ]);
})->middleware('auth')->name('users.profile');

Route::redirect('/', route('videojuegos.index'));
