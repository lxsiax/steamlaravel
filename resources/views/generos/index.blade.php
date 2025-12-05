<x-app-layout>
    <form action="{{route('generos.index')}}">
        <label for="buscar" class="floating-label">
            Buscar un género:
        </label>
        <input type="text" class="input" name="buscar" id="buscar" value="{{ $buscar}}">
        <button type="submit" class="btn btn-active">Buscar</button>
        <a class="btn btn-active" href="{{route('generos.index')}}">Limpiar</a>
    </form>
    <table class="table">
        <thead>
            <th>
                @php
                    $sentido = $sentido == 'asc' ? 'desc' : 'asc';
                    $flecha = $sentido == 'asc' ? '↑' : '↓';
                @endphp
               <a class="btn btn-ghost" href="{{request()->fullUrlWithQuery(['sentido' => $sentido])}}">Género {{$flecha}}</a>
            </th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($generos as $genero)
                <tr>
                    <td>{{ $genero->genero }}</td>
                <td>
                <form action="{{route('generos.destroy', $genero) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-error btn-sm">Borrar</button>
                </form>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table><br>
    {{$generos->links();}}
</x-app-layout>
