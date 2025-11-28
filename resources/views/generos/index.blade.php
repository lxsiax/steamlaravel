<x-app-layout>
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
    </table>
</x-app-layout>
