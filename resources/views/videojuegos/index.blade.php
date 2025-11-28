<x-app-layout>
    <table class="table">
        <thead>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Fecha de lanzamiento</th>
            <th>Desarrolladora</th>
            <th>Modificar</th>
        </thead>
        <tbody>
            @foreach ($videojuegos as $videojuego)
                <tr>
                    <td><a class="link link-secondary"
                        href="{{ route('videojuegos.show', $videojuego)}}">{{ $videojuego->nombre }}</td>
                    <td>{{ $videojuego->precio_formateado }}</td>
                    <td>{{ $videojuego->lanzamiento_formateado }}</td>
                    <td>{{ $videojuego->desarrolladora->denominacion }}</td>
                     <td>
                        <form action="/videojuegos/{{ $videojuego->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="text-heading bg-transparent box-border border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Borrar</button>
                        </form>
                    </td>
                    <td>
                        <a href="/videojuegos/{{ $videojuego->id }}/edit">
                            Modificar
                        </a>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
</x-app-layout>
