@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Nuevo Cliente</h6>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('crear_clientes') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row">


                                {{--nombre cliente --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre_cliente" required>

                                    </div>
                                </div>
                                {{-- APELLIDO--}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Apelido</label>
                                        <input type="text" class="form-control" name="apellido_cliente" required>

                                    </div>
                                </div>

                                {{-- Identificacion --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Identificacion</label>
                                        <input type="text" class="form-control" name="identificacion_cliente" onkeypress='validate(event)' maxlength="8" >

                                    </div>
                                </div>
                                {{-- Password --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password_cliente" required>

                                    </div>
                                </div>
                                {{-- Telefono --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Telefono</label>
                                        <input type="text" class="form-control" name="telefono_cliente" onkeypress='validate(event)' maxlength="9" >

                                    </div>
                                </div>
                                {{-- Email --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email_cliente" >

                                    </div>
                                </div>
                                {{-- Direccion Fiscal --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Direccion Fiscal</label>
                                        <input type="text" class="form-control" name="direccionfiscal_cliente" required>

                                    </div>
                                </div>

                                {{-- status --}}
                                <div class="col-md-6">
                                    <label>Estado</label>
                                    <div class="input-group input-group-static my-0">
                                        <select class="js-example-basic-single" id="estado" name="status"
                                            style="width: 100%" height="100px">
                                            <option value="1" selected>ACTIVO</option>
                                            <option value="2">INACTIVO</option>
                                        </select>
                                    </div>
                                </div>



                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <button type="submit" class="btn bg-gradient-info">Guardar nuevo Producto</button>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
@if ($errors->has('email_cliente'))
        <script>
            Lobibox.notify('error', {
                width: 600,
                delay: 5500,
                position: 'top right',
                title: 'Revise los datos  !!',
                msg: 'El correo electronico se encuentra Registrado'
            });
        </script>
@endif
@if ($errors->has('identificacion_cliente'))
        <script>
            Lobibox.notify('error', {
                width: 600,
                delay: 5500,
                position: 'top right',
                title: 'Revise los datos  !!',
                msg: 'Existe un Usuario creado con ese RUT'
            });
        </script>
@endif
<script>
    $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
</script>
<script>
    function validate(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>

@endpush
