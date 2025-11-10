<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function(Request $request){
    $nombre = $request->query('nombre');
    return 'Hola, $nombre';
});
