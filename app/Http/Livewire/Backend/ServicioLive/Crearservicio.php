<?php

namespace App\Http\Livewire\Backend\ServicioLive;

use App\Models\Servicios;
use Livewire\Component;

class Crearservicio extends Component
{

    public Servicios $servicio;

    public function mount()
    {
        $this->servicio = new Servicios();
    }

    public function rules()
    {
        return [
            'servicio.nombre' => 'required',
            'servicio.descripcion' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'servicio.nombre.required' => 'El campo Nombre del servicio es requerido',
            'servicio.descripcion.required' => 'El campo Descripción es requerido '
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.backend.servicio-live.crearservicio');
    }

    public function guardar_serv()
    {
        $this->validate();
        $this->servicio->save();
        $this->servicio = new Servicios();

        session()->flash('cerrarModal');

        $this->emitTo('backend.servicio-live.listarservicio', 'actualizarServicios');
    }
}
