<x-app-layout>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form action="/videojuegos/{{ $videojuego->id }}" method="POST">
    @method('PUT')
    @csrf
    <label for="nombre">Nombre:* </label>
    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $videojuego->nombre) }}"><br>

    <label for="precio">Precio:* </label>
    <input type="text" id="precio" name="precio" value="{{ old('precio', $videojuego->precio) }}"><br>

    <label for="lanzamiento">Fecha de lanzamiento: </label>
    <input type="text" id="lanzamiento" name="lanzamiento" value="{{ old('lanzamiento', $videojuego->lanzamiento) }}"><br>

    <label for="desarrolladora">ID Desarrolladora: </label>
    <input type="text" id="desarrolladora" name="desarrolladora" value="{{ old('desarrolladora', $videojuego->desarrolladora) }}"><br>

    <button type="submit">Modificar</button>
</form>

</x-app-layout>
