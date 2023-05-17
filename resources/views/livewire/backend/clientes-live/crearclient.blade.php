<div>
    <div wire:ignore.self class="modal fade" id="nuevo_cliente" tabindex="-1" role="dialog" aria-labelledby="modal-default"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-normal" id="modal-title-default">Nuevo Cliente</h4>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">cancel</i></span>
                    </button>
                </div>
                <form wire:submit.prevent="guardar_client">
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
                                    $('#nuevo_cliente').modal('hide');
                                })
                            </script>
                        @endif
                        <div class="input-group input-group-static mb-4">
                            <label>Nombres</label>
                            <input wire:model="cliente.nombres" type="text" class="form-control">
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>Apellidos</label>
                            <input wire:model="cliente.apellidos" type="text" class="form-control">
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>Correo</label>
                            <input wire:model="cliente.email" type="text" class="form-control">
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>Contraseña (Se recomienda "password")</label>
                            <input wire:model="cliente.password" type="text" class="form-control"
                                placeholder="password">
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group input-group-static mb-4">
                                    <label>Código +</label>
                                    <span class="input-group-text" id="basic-addon1">+</span>
                                    <input wire:model="cliente.cod" type="text" class="form-control"
                                        onkeypress='validate(event)'>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="input-group input-group-static mb-4">
                                    <label>Teléfono</label>
                                    <input wire:model="cliente.telefono" type="text" class="form-control"
                                        onkeypress='validate(event)'>
                                </div>
                            </div>
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label>Dirección</label>
                            <input wire:model="cliente.direccionfiscal" type="text" class="form-control">
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
