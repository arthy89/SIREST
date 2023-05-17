<?php

namespace App\Http\Livewire\Backend\ProductoLive;

use App\Models\Productos;
use Livewire\Component;

class Listarpro extends Component
{
    protected $listeners =
    [
        'actualizarProducto' => 'render'
    ];

    public function render()
    {

        $productos = Productos::orderBy('nombre_p')->get();

        return view('livewire.backend.producto-live.listarpro', compact('productos'));
    }
}
