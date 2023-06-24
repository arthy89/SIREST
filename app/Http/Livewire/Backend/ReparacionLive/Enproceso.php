<?php

namespace App\Http\Livewire\Backend\ReparacionLive;

use App\Models\Pedido;
use App\Models\Imagenes;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Enproceso extends Component
{
    public $listeners = [
        'pedidoActualizado' => 'render',
        'pedidoEliminado' => 'render',
        'eliminarPedidoEnProceso' => 'eliminarPedido',
    ];

    public function render()
    {
        $pedidos = Pedido::join('persona', 'pedido.personaid', '=', 'persona.idpersona')
            ->leftJoin('usuarios', 'pedido.usuarioid', '=', 'usuarios.idusuarios')
            ->join('dispositivo', 'pedido.id_device', '=', 'dispositivo.id_device')
            ->select('pedido.*', 'pedido.status as estado_p', 'persona.*', 'persona.apellidos as persona_apellidos', 'usuarios.*', 'usuarios.apellidos as usuario_apellidos', 'usuarios.email as usuario_email', 'dispositivo.*')
            ->where('pedido.status', 2)
            ->get();
        return view('livewire.backend.reparacion-live.enproceso', [
            'pedidos' => $pedidos,
        ]);
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
