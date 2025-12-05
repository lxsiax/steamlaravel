<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PruebasSeeder extends Seeder{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        if(app()->environment('local')){

            DB::table('users')->insert([
                'name' => 'Lucia',
                'email' => 'lucia@gmail.com',
                'password' => Hash::make('lucia'),
            ]);

            $editora_id = DB::table('editoras')->insertGetId([
                'nombre' => 'Steam',
            ]);

            $desarrolladora_id = DB::table('desarrolladoras')->insertGetId([
                'denominacion' => 'Valve',
                'editora_id' => $editora_id,
            ]);

            DB::table('videojuegos')->insert([
                'nombre' => 'Half Life',
                'precio' => 29.99,
                'lanzamiento' => Carbon::yesterday(),
                'desarrolladora_id' => $desarrolladora_id,
            ]);

            DB::table('generos')->insert([
               [ 'genero'=>'Ciencia-Ficción'],
               ['genero' => 'Terror'],
               ['genero' => 'Arcade'],
               ['genero' => 'Rol'],
               ['genero' => 'Simulador'],
               ['genero' => 'Mundo abierto'],
               ['genero' => 'Lucha 2D'],
               ['genero' => 'Lucha 3D'],
               ['genero' => 'Lógica'],
               ['genero' => 'Puzzle'],
               ['genero' => 'Novela Visual'],
               ['genero' => 'Suspense'],

            ]);

            DB::table('hardware')->insert([
                ['nombre' => 'Steam Controller',
                'descripcion' => 'controlador uwu',
                'precio' => 80.00],
                ['nombre' => 'Steam Machine',
                'descripcion' => 'maquina uwu',
                'precio' => 700.00]
            ]);
            }}
        }
