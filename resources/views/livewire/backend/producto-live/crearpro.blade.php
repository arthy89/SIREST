<div>
    <div wire:ignore.self class="modal fade" id="nuevo_producto" tabindex="-1" role="dialog"
        aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-normal" id="modal-title-default">Nuevo producto</h4>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">cancel</i></span>
                    </button>
                </div>
                <form wire:submit.prevent="guardar_pro">
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
                                    $('#nuevo_producto').modal('hide');
                                })
                            </script>
                        @endif
                        <div class="input-group input-group-static mb-4">
                            <label>Nombre del producto</label>
                            <input wire:model="producto.nombre_p" type="text" class="form-control">
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 col-md-6">
                                <div class="input-group input-group-static mb-4">
                                    <label>Precio</label>
                                    <input wire:model="producto.precio_venta_public" type="text" class="form-control"
                                        onkeypress='validate(event)'>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group input-group-static mb-4">
                                    <label>Stock</label>
                                    <input wire:model="producto.stock" type="text" class="form-control"
                                        onkeypress='validate(event)'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group input-group-static mb-4">
                                    <label>Descripción</label>
                                    <input wire:model="producto.descripcion" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        {{-- categoria --}}
                        <div wire:ignore.self class="input-group input-group-static">
                            <div class="col-12 mb-2">
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0">Categoría</label>
                                    <select wire:model="producto.categoriaid" class="form-control"
                                        id="exampleFormControlSelect1">
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->idcategoria }}">{{ $categoria->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- <p>@json($producto . categoriaid)</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-gradient-primary" id="boton">Guardar</button>
                        <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:update', function() {
            $('.categorias').select2();
        });
    </script>
</div>
