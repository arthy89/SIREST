<div>

    <div class="card-body">
        <div class="table-responsive p-0">
            <div class="px-2 py-1">
                <!--<input type="text" wire:model="search">-->
                Buscar
                <input class="" type="text" wire:model="search">
            </div>

            @if($proveedores->count())
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="w-24 cursor-pointer  text-left text-uppercase text-secondary text-sm font-weight-bolder opacity-7" wire:click="order('id_proveedor')">
                                Id
                                {{--sort --}}
                                @if ($sort == 'id_proveedor')
                                    @if($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif

                                @else
                                    <i class="fas fa-sort float-right "></i>
                                @endif
                            </th>
                            <th class="cursor-pointer  text-uppercase text-secondary text-sm font-weight-bolder opacity-7" wire:click="order('nombre_proveedor')">
                                Proveedor
                                {{--sort --}}
                                @if ($sort == 'nombre_proveedor')
                                    @if($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif

                                @else
                                    <i class="fas fa-sort float-right "></i>
                                @endif
                            </th>
                            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                        Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($proveedores as $proveedor)

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-md">{{$proveedor->id_proveedor}}</h6>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-md">{{ $proveedor->nombre_proveedor }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $proveedor->pais_proveedor }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="d-flex px-2 py-1">
                                        <form action=""
                                            method="POST" class="formulario">

                                            @csrf

                                            @method('delete')

                                            <a href="" class="btn bg-gradient-info" data-bs-toggle="modal"
                                            data-bs-target="#editar_proveedor" wire:click="edit({{$proveedor}})" ><i class="material-icons">edit</i>
                                                Editar</a>


                                                <a wire:click="$emit('deleteProveedor', {{ $proveedor->id_proveedor }})" href="" class="btn bg-gradient-danger" data-bs-toggle="modal">
                                                    <i class="material-icons" >delete</i>
                                                    Eliminard</a>

                                                <a class="btn btn-red ml-2" data-bs-toggle="" wire:click="delete({{ $proveedor->id_proveedor }})">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                        </form>
                                    </td>
                                </tr>

                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="px-12 py-1">
                    No existe ningun registro cohencidente
                </div>

            @endif
            <div class="px-12 py-2">
                {{$proveedores->links()}}
            </div>
        </div>

    </div>
    {{--MODAL --}}
    <div >
        <div wire:ignore.self class="modal fade" id="editar_proveedor" tabindex="-1" role="dialog"
        aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-normal" id="modal-title-default">Editar Proveedor</h4>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">cancel</i></span>
                    </button>
                </div>
                <form wire:submit.prevent="actualizar_proveedor">
                    @csrf
                    <div class="modal-body">

                        @if ($errors->any())
                            <div class="alert alert-primary text-white" role="alert">
                                <strong>Error</strong>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif

                        @if (session()->has('cerrarModal'))
                            <script>
                                $(document).ready(function() {
                                    $('#editar_proveedor').modal('hide');
                                })
                            </script>
                        @endif
                        <div class="input-group input-group-static mb-4">
                            <label>Editar Nombre del Proveedor</label>
                            <input  wire:model="proveedor.nombre_proveedor" type="text" class="form-control">
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>Pais proveedor</label>
                            <input wire:model="proveedor.pais_proveedor" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cerrar </button>
                        <button type="submit" class="btn bg-gradient-primary" id="boton" wire:loading.remove>Actualizar</button>
                        <span wire:loading class="">Cargando....</span>

                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>


</div>

