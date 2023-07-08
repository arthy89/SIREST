<div>
    <div wire:ignore.self class="modal fade" id="nuevo_proveedor" tabindex="-1" role="dialog"
        aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-normal" id="modal-title-default">Nuevo Proveedor</h4>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">cancel</i></span>
                    </button>
                </div>
                <form wire:submit.prevent="guardar_proveedor">
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
                                    $('#nuevo_proveedor').modal('hide');
                                })
                            </script>
                        @endif
                        <div class="input-group input-group-static mb-4">
                            <label>Nombre del Proveedor</label>
                            <input wire:model.defer="proveedor.nombre_proveedor" type="text" class="form-control">
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>Pais proveedor</label>
                            <input wire:model.defer="proveedor.pais_proveedor" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cerrar </button>
                        <button type="submit" class="btn bg-gradient-primary" id="boton" wire:loading.remove>Guardar</button>
                        <span wire:loading class="">Cargando....</span>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
