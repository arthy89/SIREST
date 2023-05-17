<?php

namespace App\Http\Livewire\Backend\Proveedorlive;

use App\Models\Proveedores;
use Livewire\Component;

class Crearproveedor extends Component
{
    public Proveedores $proveedor;

    public function mount()
    {
        $this->proveedor = new Proveedores();
    }

    public function rules()
    {
        return [
            'proveedor.nombre_proveedor' => 'required',
            'proveedor.pais_proveedor' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'proveedor.nombre_proveedor.required' => 'El campo Nombre del proveedor es requerido',
            'proveedor.pais_proveedor.required' => 'El campo Pais del proveedor es requerido'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.backend.proveedorlive.crearproveedor');
    }

    public function guardar_proveedor()
    {
        $this->validate();
        $this->proveedor->save();
        //return proveedor;
        $this->proveedor = new Proveedores();
        //avisamos  al componente listar que creamos un componenetes
        //$this->emit('render');
        $this->emitTo('backend.proveedorlive.listarproveedor','render');

        $this->emit('alert','Se Agrego correctamente !!','Se Agrego correctamente el Proveedor');

        session()->flash('cerrarModal');
        $this->emitTo('backend.proveedorlive.listarproveedor', 'actualizarProveedores');
    }



}
