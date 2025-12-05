<x-app-layout>
    <x-errores/>
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-6">
        <figure>
            <img
            src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
            alt="Shoes" />
        </figure>
        <br>
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $usuario->name }}</h1>

        <div class="mb-2">
            <span class="font-semibold text-gray-700">Email:</span>
            <span class="text-gray-900 ml-2">{{ $usuario->email}}</span>
        </div><div class="mb-2">
            <span class="font-semibold text-gray-700">Videojuegos:</span>
        </div>
        <ul class="list bg-base-100 rounded-box shadow-md">
            @foreach ($usuario->videojuegos as $videojuego)
                <li class="flex items-center gap-3 p-2 border-b last:border-b-0">
                    <img class="w-10 h-10 rounded-full" src="https://img.daisyui.com/images/profile/demo/1@94.webp" alt="Genero"/>
                    <div class="flex-1 min-w-0">
                            {{ $videojuego->nombre }}
                    </div>
                </li>
            @endforeach
        </ul><br>
        <div class="mb-2">
            <span class="font-semibold text-gray-700">Hardware:</span>
        </div>
        <ul class="list bg-base-100 rounded-box shadow-md">
            @foreach ($usuario->hardware as $hardware)
                <li class="flex items-center gap-3 p-2 border-b last:border-b-0">
                    <img class="w-10 h-10 rounded-full" src="https://img.daisyui.com/images/profile/demo/1@94.webp" alt="Genero"/>
                    <div class="flex-1 min-w-0">
                            {{ $hardware->nombre }}
                    </div>
                </li>
            @endforeach
        </ul>
        <a href="{{route('videojuegos.index')}}" class="inline-block mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Volver
        </a>
    </div>
</x-app-layout>
