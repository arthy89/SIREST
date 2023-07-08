@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Editar Cliente</h6>
                        </div>
                    </div>
                    <div class="card-body">


                        <form action="{{ route('editar_clientes', $cliente) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method("put")
                            @foreach ($errors->all() as $error)

                            @endforeach

                            <div class="row">

                                {{--nombre cliente --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label class="">Nombre</label>
                                        <input type="text"  class="form-control" name="nombre_cliente"  value="{{$cliente->nombres}}" >
                                        @if ($errors ->has('nombre_cliente'))
                                            <span class="error text-danger" for="input-name">errors</span>
                                        @endif
                                    </div>
                                </div>
                                {{-- APELLIDO--}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label class="form">Apelido</label>
                                        <input type="text" class="form-control" name="apellido_cliente" value="'{{$cliente->apellidos}}" required>

                                    </div>
                                </div>

                                {{-- Identificacion --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label class="form">Identificacion</label>
                                        <input type="text" class="form-control" name="identificacion_cliente" onkeypress='validate(event)' maxlength="8" value="{{ old('identificacion_cliente',$cliente->identificacion)}}" >

                                    </div>
                                </div>
                                {{-- Password --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label class="form">Password</label>
                                        <input type="password" class="form-control" name="password_cliente" placeholder="Ponga la contracena solo en caso de modificarla">

                                    </div>
                                </div>

                                {{-- Telefono --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label class="form">Telefono</label>
                                        <input type="text" class="form-control" name="telefono_cliente" onkeypress='validate(event)' maxlength="9"  value="{{$cliente->telefono}}" required>

                                    </div>
                                </div>
                                {{-- Email --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label class="form">Email</label>
                                        <input type="email" class="form-control" name="email_cliente" value="{{$cliente->email}}">

                                    </div>
                                </div>
                                {{-- Direccion Fiscal --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label class="form">Direccion Fiscal</label>
                                        <input type="text" class="form-control" name="direccionfiscal_cliente" value="{{$cliente->direccionfiscal}}" >

                                    </div>
                                </div>


                                {{-- Estado --}}
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
                                    <button type="submit" class="btn bg-gradient-info">Actualizar Cliente</button>

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
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        // categorias
        $('#estado').val("{{ $cliente->status }}");
        $('#estado').select2().trigger('change');
    });
</script>
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
