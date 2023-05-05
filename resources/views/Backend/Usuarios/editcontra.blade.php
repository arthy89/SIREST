@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Editar contraseña del Usuario:
                                <strong>{{ $usuario->nombre }}</strong>
                            </h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('editar_usuarios_pass', $usuario) }}" method="POST">

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
                            </div>
                            <p class="text-danger py-0 text-sm" id="mensaje_t"></p>
                            <p class="text-danger py-0 text-sm" id="mensaje"></p>
                            <div class="form-check form-switch d-flex align-items-center mb-3">
                                <input class="form-check-input" type="checkbox" name="mostrar" id="mostrar"
                                    onchange="tick(this)">
                                <label class="form-check-label mb-0 ms-3" for="mostrar">Mostrar la
                                    contraseña</label>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <button type="submit" class="btn bg-gradient-info disabled" id="boton">Guardar
                                        cambios</button>
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
