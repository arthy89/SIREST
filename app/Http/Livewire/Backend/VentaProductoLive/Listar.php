<?php

namespace App\Http\Livewire\Backend\VentaProductoLive;
use App\Models\Productos;
use Livewire\Component;

class Listar extends Component
{
    public $search;
    public function render()
    {
        // $productos = Productos::all();
        $productos = Productos::where('nombre_p','like','%' .$this->search . '%')->get();
        return view('livewire.backend.venta-producto-live.listar', compact('productos'));
    }
}
