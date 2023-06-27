<?php

namespace App\Http\Livewire\Backend\ReparacionLive;

use App\Models\Pedido;
use App\Models\Imagenes;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Buscarrep extends Component
{
    use WithPagination;

    public $listeners = [
        'pedidoActualizado' => 'render',
        'pedidoEliminado' => 'render',
        'eliminarPedidoBuscar' => 'eliminarPedido',
    ];

    public function render()
    {
        return view('livewire.backend.reparacion-live.buscarrep');
    }

    public function actualizarEstado($pedidoId, $estadoSeleccionado)
    {
        $pedido = Pedido::find($pedidoId);
        $pedido->status = $estadoSeleccionado;
        $pedido->save();

        $this->emit('pedidoActualizado');
        session()->flash('message', 'Estado de la reparación actualizada exitosamente.');
    }

    public function confirmarEliminacion($pedidoId)
    {
        $this->emit('confirmarEliminacion', $pedidoId);
    }

    public function eliminarPedido($pedidoId)
    {
        $pedido = Pedido::findOrFail($pedidoId);
        $imagenes = Imagenes::where('idpedido', $pedido->idpedido)->get();

        // Eliminar las imágenes del sistema de archivos
        foreach ($imagenes as $imagen) {
            Storage::disk('public')->delete($imagen->ruta);
        }

        // Eliminar las imágenes de la base de datos
        $imagenes->each->delete();

        // Eliminar el pedido
        $pedido->delete();

        $this->emit('pedidoEliminado');
        session()->flash('eliminado', 'Reparación eliminada exitosamente.');
    }
}
