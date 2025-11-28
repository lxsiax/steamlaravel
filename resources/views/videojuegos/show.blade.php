<x-app-layout>
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
                <li class="list-row">
                    <div><img class="size-10 rounded-box" src="https://img.daisyui.com/images/profile/demo/1@94.webp"/></div>
                    <div class="flex-1 min-w-0 ms-2">
                        <p class="font-medium text-heading truncate"> <a href="{{route('generos.show', $genero)}}">
                            {{$genero->genero}}
                        </p>
                    </div>
                    <button class="btn btn-soft btn-error">Borrar</button>
                </li>
            @endforeach

            </ul>
        <a href="/videojuegos" class="inline-block mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Volver
        </a>
    </div>
</x-app-layout>
