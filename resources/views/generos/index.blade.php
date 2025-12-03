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
            <th>Género</th>
        </thead>
        <tbody>
            @foreach ($generos as $genero)
                <tr>
                    <td>{{ $genero->genero }}</td>
                </tr>
            @endforeach
        </tbody>
    </table><br>
    {{$generos->links();}}
</x-app-layout>
