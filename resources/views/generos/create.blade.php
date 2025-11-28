<x-app-layout>
    <x-errores/>
        <h4 align="center"class="mb-3 text-2xl font-semibold tracking-tight text-heading leading-8">Insertar un videojuego</h4>
    <div class="w-full max-w-sm mx-auto">
        <form action="{{route('generos.store')}}" method="POST" class="card bg-base-200 p-6 shadow">
            @csrf
            <label for="genero" class="floating-label">
                <span>Género:*</span>
                <input class="input" type="text" id="genero" name="genero" value="{{ old('genero') }}"><br>
            <div class="flex-2">
                <button class="btn btn-soft btn-success" type="submit">Insertar género</button>
                <a href="{{ route('generos.index') }}" class="btn btn-soft btn-info">Volver</a>

            </div>
        </form>
    </div>
</x-app-layout>
