<div>
    <div wire:ignore.self class="modal fade" id="nuevo_servicio" tabindex="-1" role="dialog"
        aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-normal" id="modal-title-default">Nuevo servicio</h4>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">cancel</i></span>
                    </button>
                </div>
                <form wire:submit.prevent="guardar_serv">
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
                                    $('#nuevo_servicio').modal('hide');
                                })
                            </script>
                        @endif
                        <div class="input-group input-group-static mb-4">
                            <label>Nombre del servicio</label>
                            <input wire:model="servicio.nombre" type="text" class="form-control">
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>Descripción</label>
                            <input wire:model="servicio.descripcion" type="text" class="form-control">
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
</div>
