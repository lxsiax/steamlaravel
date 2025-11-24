<x-app-layout>
    <x-errores/>

    <form action="/clientes/{{$cliente->id}}" method="POST" class="card bg-base-200 p-6 shadow">
        @csrf
        @method('PUT')
        <label for="dni">DNI:* </label>
        <input type="text" class="input" id="dni"       name="dni" value="{{old('dni', $cliente->dni)}}"><br>
        <label for="nombre">Nombre:* </label>
        <input type="text" class="input" id="nombre"    name="nombre" value="{{old('nombre', $cliente->nombre)}}"><br>
        <label for="apellidos">Apellidos: </label>
        <input type="text" class="input"  id="apellidos" name="apellidos" value="{{old('apellidos', $cliente->apellidos)}}"><br>
        <label for="direccion">Dirección: </label>
        <input type="text" class="input"  id="direccion" name="direccion" value="{{old('direccion', $cliente->direccion)}}"><br>
        <label for="codpostal">Código postal: </label>
        <input type="text" class="input" id="codpostal" name="codpostal" value="{{old('codpostal', $cliente->codpostal)}}"><br>
        <label for="telefono">Teléfono: </label>
        <input type="text" class="input" id="telefono"  name="telefono" value="{{old('telefono', $cliente->telefono)}}"><br>
        <button type="submit">Insertar</button>
    </form>
</x-app-layout>
