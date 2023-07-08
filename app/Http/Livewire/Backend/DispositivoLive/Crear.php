<?php

namespace App\Http\Livewire\Backend\DispositivoLive;

use App\Models\Dispositivo;
use Livewire\Component;

class Crear extends Component
{

    public Dispositivo $dispositivo;

    public function mount()
    {
        $this->dispositivo = new Dispositivo();
    }

    public function rules()
    {
        return [
            'dispositivo.device_name' => 'required',
            'dispositivo.device_mark' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'dispositivo.device_name.required' => 'El campo Nombre del dispositivo es requerido',
            'dispositivo.device_mark.required' => 'El campo Marca es requerido '
        ];
    }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function render()
    {
        return view('livewire.backend.dispositivo-live.crear');
    }

    public function guardar_disp()
    {
        $this->validate();
        $this->dispositivo->save();
        $this->dispositivo = new Dispositivo();

        session()->flash('cerrarModal');

        // $this->emit('select2Actualizado');

        $this->emitTo('backend.dispositivo-live.listar', 'actualizarDispositivos');
        // $this->emitUp('dispositivoAgregado');
    }
}
