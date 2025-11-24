<x-app-layout>
    <x-errores/>
        <h4 align="center"class="mb-3 text-2xl font-semibold tracking-tight text-heading leading-8">Insertar un videojuego</h4>
    <div class="w-full max-w-sm mx-auto">
        <form action="/videojuegos" method="POST" class="card bg-base-200 p-6 shadow">
            @csrf
            <label for="nombre" class="floating-label">
                <span>Nombre:*</span>
                <input class="input" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"><br>
            </label>
            <label for="precio" class="floating-label">
                <span>Precio:*</span>
                <input class="input" type="text" id="precio" name="precio" value="{{ old('precio') }}"><br>
            </label>
            <label for="lanzamiento" class="floating-label">
                <span>Lanzamiento:</span>
                <input class="input" type="date" id="lanzamiento" name="lanzamiento" value="{{ old('lanzamiento') }}"><br>
            </label>
            <label for="desarrolladora_id" class="floating-label">
                <span>Id desarrolladora:</span>
                <select class="select" name="desarrolladora_id" id="desarrolladora_id">
                    @foreach ($desarrolladoras as $desarrolladora)
                        <option value="{{$desarrolladora->id}}"
                                {{old('desarrolladora_id') == $desarrolladora->id ? 'selected' : ''}}
                            >
                            {{$desarrolladora->denominacion}}</option>
                    @endforeach
                </select>
                <br>
            </label>
            <div class="flex-2">
                <button class="btn btn-soft btn-success" type="submit">Insertar videojuego</button>
                <a href="{{ route('videojuegos.index') }}" class="btn btn-soft btn-info">Volver</a>

            </div>
        </form>
    </div>
</x-app-layout>
