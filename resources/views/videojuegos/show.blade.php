<x-app-layout>
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-6">
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

        <a href="/videojuegos" class="inline-block mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Volver
        </a>
    </div>
</x-app-layout>
