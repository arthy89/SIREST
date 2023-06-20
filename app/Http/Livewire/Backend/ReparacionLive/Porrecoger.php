<?php

namespace App\Http\Livewire\Backend\ReparacionLive;

use App\Models\Pedido;
use Livewire\Component;

class Porrecoger extends Component
{
    public $listeners = [
        'pedidoActualizado' => 'render'
    ];

    public function render()
    {
        $pedidos = Pedido::join('persona', 'pedido.personaid', '=', 'persona.idpersona')
            ->leftJoin('usuarios', 'pedido.usuarioid', '=', 'usuarios.idusuarios')
            ->join('dispositivo', 'pedido.id_device', '=', 'dispositivo.id_device')
            ->select('pedido.*', 'pedido.status as estado_p', 'persona.*', 'persona.apellidos as persona_apellidos', 'usuarios.*', 'usuarios.apellidos as usuario_apellidos', 'usuarios.email as usuario_email', 'dispositivo.*')
            ->where('pedido.status', 1)
            ->get();
        return view('livewire.backend.reparacion-live.porrecoger', [
            'pedidos' => $pedidos,
        ]);
    }

    public function actualizarEstado($pedidoId, $estadoSeleccionado)
    {
        $pedido = Pedido::find($pedidoId);
        $pedido->status = $estadoSeleccionado;
        $pedido->save();

        $this->emit('pedidoActualizado');
    }
}
