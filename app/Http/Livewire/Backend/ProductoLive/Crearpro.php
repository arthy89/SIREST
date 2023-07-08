<?php

namespace App\Http\Livewire\Backend\ProductoLive;

use App\Models\Categorias;
use App\Models\Productos;
use Livewire\Component;

class Crearpro extends Component
{
    public Productos $producto;

    public function mount()
    {
        $this->producto = new Productos();
    }

    public function rules()
    {
        return [
            'producto.nombre_p' => 'required',
            'producto.precio_venta_public' => 'required',
            'producto.stock' => 'required',
            'producto.descripcion' => 'max:500',
            'producto.categoriaid' => 'max:100'
        ];
    }

    public function messages()
    {
        return [
            'producto.nombre_p.required' => 'El campo Nombre del producto es requerido',
            'producto.precio_venta_public.required' => 'El campo Precio es requerido ',
            'producto.stock.required' => 'El campo Stock es requerido',
            'producto.descripcion.max' => 'El campo Descripción supera los 500 caracteres',
            'producto.categoriaid.max' => 'El campo Categoría supera los 100 caracteres'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $categorias = Categorias::get();

        return view('livewire.backend.producto-live.crearpro', compact('categorias'));
    }

    public function guardar_pro()
    {
        $this->validate();
        $this->producto->save();
        $this->producto = new Productos();

        session()->flash('cerrarModal');

        $this->emitTo('backend.producto-live.listarpro', 'actualizarProducto');
    }
}
