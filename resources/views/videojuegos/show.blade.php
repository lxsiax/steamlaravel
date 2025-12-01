<x-app-layout>
    <x-errores/>
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-6">
        <figure>
            <img
            src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
            alt="Shoes" />
        </figure>
        <br>
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $videojuego->nombre }}</h1>

        <div class="mb-2">
            <span class="font-semibold text-gray-700">Precio:</span>
            <span class="text-gray-900 ml-2">{{ $videojuego->precio }}</span>
        </div>

        <div class="mb-2">
            <span class="font-semibold text-gray-700">Fecha de lanzamiento:</span>
            <span class="text-gray-900 ml-2">{{ $videojuego->lanzamiento }}</span>
        </div>

        <div class="mb-2">
            <span class="font-semibold text-gray-700">Desarrolladora:</span>
            <span class="text-gray-900 ml-2">{{ $videojuego->desarrolladora->denominacion }}</span>
        </div>
        <div class="mb-2">
            <span class="font-semibold text-gray-700">Géneros:</span>
        </div>

        <ul class="list bg-base-100 rounded-box shadow-md">
            @foreach ($videojuego->generos as $genero)
                <li class="flex items-center gap-3 p-2 border-b last:border-b-0">
                    <img class="w-10 h-10 rounded-full" src="https://img.daisyui.com/images/profile/demo/1@94.webp" alt="Genero"/>
                    <div class="flex-1 min-w-0">
                        <a href="{{ route('generos.show', $genero) }}" class="font-medium text-heading truncate hover:text-blue-500">
                            {{ $genero->genero }}
                        </a>
                    </div>
                    <form action="{{route('videojuegos.quitar_genero',
                    ['videojuego' => $videojuego, 'genero' => $genero])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-error btn-sm">Borrar</button>
                    </form>
                </li>
            @endforeach
        </ul>


        <br><br>
        @if ($generos->IsnotEmpty())
        <form action="{{ route('videojuegos.agregar_genero', $videojuego) }}" method="POST">
            @csrf

            <label for="genero_id" class="floating-label">
                <span>Añadir género:</span>

                <select class="select" name="genero_id" id="genero_id">
                    @foreach ($generos as $genero)
                        <option value="{{ $genero->id }}"
                            {{ old('genero_id') == $genero->id ? 'selected' : '' }}>
                            {{ $genero->genero }}
                        </option>
                    @endforeach
                </select>
            </label>
            <br>
            <button class="btn btn-secondary">Agregar</button>
        </form>
        @endif
        <a href="/videojuegos" class="inline-block mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Volver
        </a>
    </div>
</x-app-layout>
