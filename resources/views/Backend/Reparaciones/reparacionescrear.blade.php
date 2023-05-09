@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h4 class="mb-0">Nueva Reparación</h4>
                            </div>
                            <div class="col-6 text-end">
                                <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                    data-bs-target="#modal-default"><i
                                        class="material-icons text-sm">add</i>&nbsp;&nbsp;Agregar
                                    nuevo dispositivo</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-4 my-2">
                                <p><strong>Dispositivo a raparar</strong></p>
                                <div class="input-group input-group-static ">
                                    <select class="js-example-basic-single" name="rolid" style="width: 100%"
                                        height="100px">
                                        <option> </option>
                                        @foreach ($dispositivos as $dispositivo)
                                            <option value="">{{ $dispositivo->device_name }} -
                                                {{ $dispositivo->device_mark }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-1">
                                <p><strong>IMEI</strong></p>
                                <div class="input-group input-group-outline">
                                    <label class="form-label">IMEI</label>
                                    <input type="text" class="form-control" name="device_name" id="device_name"
                                        onkeypress='validate(event)' maxlength="15">
                                </div>
                            </div>
                            <div class="col-md-2 my-1">
                                <p><strong>Contraseña</strong></p>
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Contraseña</label>
                                    <input type="text" class="form-control" name="contra">
                                </div>
                            </div>
                            <div class="col-md-2 my-1">
                                <p><strong>Patrón</strong></p>
                                <button type="button" class="btn bg-gradient-dark" data-bs-toggle="modal"
                                    data-bs-target="#patron"><i class="material-icons text-sm">lock</i>
                                    Patrón</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODALES --}}
    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-normal" id="modal-title-default">Nuevo dispositivo</h4>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">cancel</i></span>
                    </button>
                </div>
                <form action="{{ route('create_device') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="device_name" id="device_name">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Marca</label>
                            <input type="text" class="form-control" name="device_mark" id="device_mark">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-gradient-primary disabled" id="boton">Guardar</button>
                        <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- PATRON --}}
    <div class="modal fade" id="patron" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-normal" id="modal-title-default">Patrón</h4>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">cancel</i></span>
                    </button>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>patron</p>
                        <input type="text" id="patron_inp">
                        <div id="gesturepwd"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-primary disabled" id="boton">Guardar</button>
                        <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    {{-- patron jquery --}}
    <script src="{{ asset('assets/patron/jquery.gesture.password.js') }}"></script>

    <script>
        $("#gesturepwd").GesturePasswd({

            backgroundColor: "#fff",
            color: "#7b809a",
            roundRadii: 25,
            pointRadii: 6,
            space: 30,
            width: 240,
            height: 240,
            lineColor: "#e91e63",
            zindex: 100

        });

        $("#gesturepwd").on("hasPasswd", function(e, passwd) {
            var result;
            var patron_inp = $('#patron_inp');

            // password pattern
            // 1235789 = 'Z'
            // comprueba
            // passwd = ("123");
            patron_inp.val(passwd);

            if (passwd == "1235789") {
                result = true;

            } else {
                result = false;
            }



            if (result == true) {
                $("#gesturepwd").trigger("passwdRight");
                setTimeout(function() {
                    alert("Password is valid.")
                }, 500);
            } else {
                $("#gesturepwd").trigger("passwdWrong");

                // alert("Password is valid.");

            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    {{-- comprobar campos nuevo dispositivo --}}
    <script>
        $(document).ready(() => {

            var device_name = $('#device_name');
            var device_mark = $('#device_mark');

            function comprobar() {
                var in1 = device_name.val();
                var in2 = device_mark.val();
                var boton = $('#boton');

                if (in1 == "" || in2 == "") {
                    boton.addClass('disabled');
                }

                if (in1.length > 0 && in2.length > 0) {
                    boton.removeClass('disabled');
                }
            }

            device_name.keyup(function() {
                comprobar();
            });

            device_mark.keyup(function() {
                comprobar();
            });
        });
    </script>

    {{-- validar solo numeros --}}
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
