<?php

use App\Models\Desarrolladora;
use App\Models\Editora;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component
{
    public ?Desarrolladora $desarrolladora = null;

    #[Computed]
    public function editoras()
    {
        return Editora::all();
    }

    #[Validate('required|string|max:255')]
    public string $denominacion = '';

    public bool $verForm = false;

    #[Validate('required|exists:editoras,id')]
    public $editora_id;

    public $esEditar = false;

    #[Computed]
    public function desarrolladoras()
    {
        return Desarrolladora::all();
    }

    public function editar($id)
    {
        $desarrolladora = Desarrolladora::find($id);

        if ($desarrolladora !== null) {
            // Lógica para cargar los datos de la desarrolladora en el formulario de edición
            $this->desarrolladora = $desarrolladora;
            $this->denominacion = $desarrolladora->denominacion;
            $this->editora_id = $desarrolladora->editora_id;
            $this->esEditar = true;
            $this->verForm = true;
        }
    }

    public function createUpdate()
    {
        $this->validate();
        if ($this->desarrolladora === null) {
            Desarrolladora::create([
                'denominacion' => $this->denominacion,
                'editora_id' => $this->editora_id,
            ]);
        } else {
            $this->desarrolladora->denominacion = $this->denominacion;
            $this->desarrolladora->editora_id = $this->editora_id;
            $this->desarrolladora->save();
        }
        $this->resetFormulario();
    }

    public function resetFormulario()
    {
        $this->desarrolladora = null;
        $this->editora_id = null;
        $this->denominacion = '';
        $this->esEditar = false;
        $this->verForm = false;
    }

    public function eliminar($id)
    {
        $desarrolladora = Desarrolladora::find($id);

        if ($desarrolladora !== null) {
            $desarrolladora->delete();
        }
    }

    public function crear()
    {
        $this->resetFormulario();
        $this->esEditar = false;
        $this->verForm  = true;
    }
}
?>

<div>
    <div class="flex justify-center">
        <div class="mx-auto p-4">
            <h1 class="text-3xl font-bold mb-4">Desarrolladoras</h1>
            <table class="table">
                <thead>
                    <th>Denominación</th>
                    <th>Editora</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($this->desarrolladoras as $desarrolladora)
                    <tr>
                        <td>{{ $desarrolladora->denominacion }}</td>
                        <td>{{$desarrolladora->editora->nombre}}</td>
                        <td>
                            <div class="flex gap-2">
                                <button
                                    class="btn btn-sm btn-info btn-ghost"
                                    wire:click="editar({{ $desarrolladora->id }})">
                                    Editar
                                </button>
                                <button
                                    type="submit"
                                    class="btn btn-sm btn-ghost btn-error"
                                    onclick="return confirm('¿Está seguro de que desea eliminar esta desarrolladora?')"
                                    wire:click="eliminar({{ $desarrolladora->id }})">
                                    Eliminar
                                </button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="btn btn-soft btn-primary mt-4"
                wire:click="crear">
                Dar de alta una nueva desarrolladora
            </button>
        </div>

        <!-- Formulario de creación y edición de desarrolladoras -->
        <div class="w-full max-w-sm mx-auto
            {{ $verForm ? 'visible' : 'invisible' }}
            ">
            <h2 class="text-2xl font-bold mb-3">{{ $esEditar ? 'Editar una desarrolladora' : 'Crear una desarrolladora' }}</h2>
            <form class="card bg-base-200 p-6 shadow space-y-6" wire:submit.prevent="createUpdate">
                <label for="denominacion" class="floating-label mb-0">
                    <span>Denominación:</span>
                    <input class="input" type="text" id="denominacion"
                        name="denominacion" wire:model="denominacion">
                </label>
                @error('denominacion')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
                <label class="floating-label mt-6" for="editora_id">
                    <span class="p-3 text-l">Editora:</span>
                    <select class="select" name="editora_id" id="editora_id" wire:model="editora_id">
                        @foreach ($this->editoras as $editora)
                        <option value="{{$editora->id}}">{{$editora->nombre}}</option>
                        @endforeach
                    </select>
                </label>
                @error('editora_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
                <div class="flex-2 mt-2">
                    <button
                        class="btn btn-soft btn-success"
                        type="submit">
                        {{ $esEditar ? 'Editar' : 'Crear' }}
                    </button>
                    <button
                        class="btn btn-soft btn-error"
                        type="button"

                        wire:click="resetFormulario">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
