<?php

namespace App\Http\Livewire\Backend\Proveedorlive;

use App\Models\Proveedores;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;

class Listarproveedor extends Component
{
    public $search, $proveedor;
    public $sort = 'id_proveedor';
    public $direction = 'desc';
    protected $listeners = ['render'=>'render','delete'];
    //protected $listeners = ['render'=>'render'];


    public function render()
    {

        $proveedores = Proveedores::where('nombre_proveedor','like','%' . $this->search . '%')
                                    ->orWhere('pais_proveedor','like','%' . $this->search . '%')
                                    ->orderBy( $this->sort ,$this->direction)
                                    ->paginate(10);
        //return view('livewire.backend.proveedorlive.listarproveedor', compact('provedores'));
        return view('livewire.backend.proveedorlive.listarproveedor', compact('proveedores'));

    }
    public function order($sort){
        if($this  -> sort ==$sort){
            if($this->direction == 'desc'){
                $this->direction ='asc';
            }else{
                $this->direction = 'desc';
            }

        }else{
            $this->sort = $sort;
            $this -> directiono = 'asc';
        }

    }
//desde aqui se dedicara a actualizar producto

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
    public function edit(Proveedores $proveedor){

        $this->proveedor = $proveedor;
    }

    public function actualizar_proveedor()
    {
        $this->validate();
        $this->proveedor->save();
        //return proveedor;
        $this->proveedor = new Proveedores();
        //avisamos  al componente listar que creamos un componenetes
        //$this->emit('render');
        $this->emitTo('backend.proveedorlive.listarproveedor','render');

        $this->emit('alert','Actualizacion correcta','Se Actualizo correctamente el Proveedor');

        session()->flash('cerrarModal');
        $this->emitTo('backend.proveedorlive.listarproveedor', 'actualizarProveedores');
    }
    public function delete(Proveedores $proveedor){
        $proveedor->delete();

    }



}
