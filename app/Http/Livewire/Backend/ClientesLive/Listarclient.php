<?php

namespace App\Http\Livewire\Backend\ClientesLive;

use App\Models\Persona;
use Livewire\Component;

class Listarclient extends Component
{
    protected $listeners =
    [
        'actualizarClientes' => 'render'
    ];

    public function render()
    {
        $clientes = Persona::orderBy('nombres')->get();
        return view('livewire.backend.clientes-live.listarclient', compact('clientes'));
    }
}
