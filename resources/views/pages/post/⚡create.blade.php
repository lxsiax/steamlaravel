<?php

use Livewire\Component;

new class extends Component {

    public string $title = '';

    public string $content = '';

    public $contador = 0;

    public string $texto = '';

    public function incrementar()
    {
        $this->contador++;
    }

    public function mayusculas()
    {
        $this->texto = strtoupper($this->texto);
    }

};
?>

<div>
    <h1 class="text-2xl font-bold mb-3">Contador: {{ $contador }}</h1>
    <button class="btn btn-secondary" wire:click="incrementar">Incrementar</button><br>
    <input type="text"
    wire:model="texto"
    wire:blur="mayusculas"
    class="border p-2 mt-3"
    placeholder="Escribe algo aquí">
    <h2 class="mt-3">Texto en mayúsculas: {{ $texto }}</h2>
</div>
