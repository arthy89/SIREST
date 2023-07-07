<?php

namespace App\Http\Livewire\Backend\ResumenLive;

use App\Models\Ventas;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Listarventas extends Component
{
    use WithPagination;
    public $search = "";
    public $sort = 'id_venta';
    public $fecha = 'desc';
    public function render()
    {
        //$productos = Ventas::paginate(10);
        $productos = Ventas::select('ventas.*', 'persona.nombres', 'persona.apellidos')
        ->join('persona', 'ventas.idpersona', '=', 'persona.idpersona')
        ->where('persona.nombres','like','%' . $this->search . '%')
        ->orwhere('persona.apellidos','like','%' . $this->search . '%')
        ->orderBy($this->sort, $this->fecha)
        ->paginate(5);
        $lista = ['One','Two','Three','Four','Five','Six','Seven'];

        return view('livewire.backend.resumen-live.listarventas',compact('productos','lista'));
    }
}
