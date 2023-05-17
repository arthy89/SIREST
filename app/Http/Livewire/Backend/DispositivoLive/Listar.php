<?php

namespace App\Http\Livewire\Backend\DispositivoLive;

use App\Models\Dispositivo;
use Livewire\Component;

class Listar extends Component
{

    protected $listeners =
    [
        'actualizarDispositivos' => 'render'
    ];

    public function render()
    {

        $dispositivos = Dispositivo::orderBy('device_name')->get();

        return view('livewire.backend.dispositivo-live.listar', compact('dispositivos'));
    }
}
