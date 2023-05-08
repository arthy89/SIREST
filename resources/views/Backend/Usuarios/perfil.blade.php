@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            @if (session('status'))
                <div class="row justify-content-center">
                    <div class="col-md-4 my-5 ">
                        <div class="alert alert-success text-white text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    </div>
                </div>
            @endif

            @if (session('contrastatus'))
                <div class="row justify-content-center">
                    <div class="col-md-4 my-5 ">
                        <div class="alert alert-info text-white text-center" role="alert">
                            {{ session('contrastatus') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <h4 class="mb-0">Editando datos del Perfil</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('editar_perfil', Auth::user()->idusuarios) }}" method="POST">

                                @csrf

                                @method('put')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-static mb-4">
                                            <label>Nombres</label>
                                            <input type="text" class="form-control" name="nombre"
                                                value="{{ Auth::user()->nombre }}">
                                            @if ($errors->has('nombre'))
                                                <p class="text-danger mb-0 text-sm"><em>Este campo es obligatorio</em></p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group input-group-static mb-4">
                                            <label>Apellidos</label>
                                            <input type="text" class="form-control" name="apellidos"
                                                value="{{ Auth::user()->apellidos }}">
                                            @if ($errors->has('apellidos'))
                                                <p class="text-danger mb-0 text-sm"><em>Este campo es obligatorio</em></p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group input-group-static mb-4">
                                            <label>Correo Electrónico</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ Auth::user()->email }}">
                                            @if ($errors->has('email'))
                                                <p class="text-danger mb-0 text-sm"><em>Este campo es obligatorio o se
                                                        repitió un correo existente</em></p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6" align="center">
                                        <button type="submit" class="mt-4 btn bg-gradient-success">Guardar Datos
                                            Personales</button>
                                    </div>
                                </div>
                            </form>

                            <hr class="dark horizontal my-3">

                            <div class="text-end pt-1">
                                <h4 class="mb-0">Cambiar Contraseña</h4>
                            </div>

                            <form action="{{ route('editar_perfil_pass', Auth::user()->idusuarios) }}" method="POST">

                                @csrf

                                @method('put')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Contraseña Nueva</label>
                                            <input type="password" class="form-control" name="password" id="pass1">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Repetir la Contraseña</label>
                                            <input type="password" class="form-control" id="pass2">
                                        </div>
                                    </div>
                                    <p class="text-danger py-0 text-sm" id="mensaje_t"></p>
                                    <p class="text-danger py-0 text-sm" id="mensaje"></p>
                                    <div class="col-md-6">
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="mostrar"
                                                onchange="tick(this)">
                                            <label class="form-check-label mb-0 ms-3" for="mostrar">Mostrar la
                                                contraseña</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6" align="center">
                                        <button type="submit" class="btn bg-gradient-info disabled" id="boton">Guardar
                                            Contraseña Nueva</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('custom-scripts')
    <script type="text/javascript">
        function tick(el) {
            $('#pass1').attr('type', el.checked ? 'text' : 'password');
            $('#pass2').attr('type', el.checked ? 'text' : 'password');
        }
    </script>

    <script>
        $(document).ready(() => {

            var pass1 = $('#pass1');
            var pass2 = $('#pass2');

            function comparar() {
                var contra1 = pass1.val();
                var contra2 = pass2.val();
                var mensaje = $('#mensaje');
                var tam = $('#mensaje_t');
                var boton = $('#boton');

                if (contra1.length < 6 || contra1 == "") {
                    mensaje.hide();
                    tam.show();
                    tam.text("La contraseña debe tener 6 caracteres o más");
                }

                if (contra1.length >= 6) {
                    tam.hide();
                }

                if (contra1 != contra2) {
                    boton.addClass('disabled');
                    mensaje.removeClass('text-success');
                    mensaje.addClass('text-danger');
                    mensaje.show();
                    mensaje.text("Las contraseñas no son iguales");
                }

                if (contra1 == contra2 && contra1.length >= 6 && contra2.length >= 6) {
                    boton.removeClass('disabled');
                    mensaje.removeClass('text-danger');
                    mensaje.addClass('text-success');
                    mensaje.show();
                    mensaje.text("Las contraseñas son iguales");
                }
            }

            pass1.keyup(function() {
                comparar();
            });

            pass2.keyup(function() {
                comparar();
            });
        });
    </script>
@endpush
