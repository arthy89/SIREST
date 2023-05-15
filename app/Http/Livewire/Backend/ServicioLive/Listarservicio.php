<?php

namespace App\Http\Livewire\Backend\ServicioLive;

use App\Models\Servicios;
use Livewire\Component;

class Listarservicio extends Component
{

    protected $listeners =
    [
        'actualizarServicios' => 'render'
    ];

    public function render()
    {

        $servicios = Servicios::get();

        return view('livewire.backend.servicio-live.listarservicio', compact('servicios'));
    }
}
