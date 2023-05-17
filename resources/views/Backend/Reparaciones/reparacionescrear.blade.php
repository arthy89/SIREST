@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            {{-- datos de reparacion --}}
            <div class="col-md-8 my-2" id="">
                {{-- datos de nueva reparacion, datos principales --}}
                <div class="row">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h4 class="mb-0">Nueva Reparación</h4>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                        data-bs-target="#nuevo_dispositivo"><i
                                            class="material-icons text-sm">add</i>&nbsp;&nbsp;Agregar
                                        nuevo dispositivo</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-4 my-2">
                                    <p><strong>Dispositivo a raparar</strong></p>
                                    @livewire('backend.dispositivo-live.listar')
                                </div>
                                <div class="col-md-4 my-1">
                                    <p><strong>IMEI</strong></p>
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">IMEI</label>
                                        <input type="text" class="form-control" name="imei" id="imei"
                                            onkeypress='validate(event)' maxlength="15" value="{{ old('imei') }}">
                                    </div>
                                </div>
                                <div class="col-md-2 my-1">
                                    <p><strong>Contraseña</strong></p>
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Contraseña</label>
                                        <input type="text" class="form-control" name="contra">
                                    </div>
                                </div>
                                <div class="col-md-2 my-1" align="center">
                                    <p><strong>Patrón</strong></p>
                                    <button type="button" class="btn bg-gradient-dark" data-bs-toggle="modal"
                                        data-bs-target="#patron"><i class="material-icons text-sm">lock</i>
                                        Patrón</button>
                                </div>
                            </div>
                            <hr class="dark horizontal my-3">
                            <div class="row">
                                <h4 class="mb-0">Servicio de reparación</h4>
                                <div class="col-md-3 my-2">
                                    <p><strong>Servicio</strong></p>
                                    @livewire('backend.servicio-live.listarservicio')
                                </div>
                                <div class="col-md-1 my-1">
                                    <p><strong>Add</strong></p>
                                    <button type="button" class="btn bg-gradient-info"
                                        onclick="agregarServicio()">+</button>
                                </div>
                                <div class="col-md-2 my-1">
                                    <p><strong>Otro Servicio</strong></p>
                                    <button type="button" class="btn bg-gradient-dark" data-bs-toggle="modal"
                                        data-bs-target="#nuevo_servicio">
                                        Nuevo</button>
                                </div>
                                <div class="col-md-3 my-2">
                                    <p><strong>Producto</strong></p>
                                    @livewire('backend.producto-live.listarpro')
                                </div>
                                <div class="col-md-1 my-1">
                                    <p><strong>Add</strong></p>
                                    <button type="button" class="btn bg-gradient-info"
                                        onclick="agregarProducto()">+</button>
                                </div>
                                <div class="col-md-2 my-1">
                                    <p><strong>Nuevo Producto</strong></p>
                                    <button type="button" class="btn bg-gradient-dark" data-bs-toggle="modal"
                                        data-bs-target="#nuevo_producto">Nuevo</button>
                                </div>
                            </div>

                            <hr class="dark horizontal my-3">
                            <div class="row">
                                <h4 class="mb-0">Lista de agregados</h4>
                                <div class="listado">
                                    <div class="table-responsive">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                    width="400px">
                                                    Ítem</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                                                    width="100px">
                                                    Cantidad</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                    width="100px">
                                                    Precio</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                    Quitar</th>
                                            </thead>
                                            <tbody class="tablebody">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <script>
                                    function agregarServicio() {
                                        var selectedOption = $('.servicios').select2('data')[0];
                                        if (selectedOption) {
                                            var servicioNombre = selectedOption.text;
                                            var servicioId = selectedOption.id;
                                            var servicioHtml =
                                                `<tr>
                                                    <td>` +
                                                servicioNombre +
                                                `</td>
                                                <td>

                                                </td>
                                                <td>
                                                    <div class="input-group input-group-outline">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm bg-gradient-danger mt-2 mx-2" onclick="eliminarServicio(this)">x</button>
                                                </td>
                                                </tr>`;
                                            $('.tablebody').append(servicioHtml);
                                            $('.servicios').val(null).trigger('change');
                                        }
                                    }

                                    function eliminarServicio(btn) {
                                        $(btn).closest('tr').remove();
                                    }

                                    function agregarProducto() {
                                        var selectedOption = $('.productos').select2('data')[0];
                                        if (selectedOption) {
                                            var productoNombre = selectedOption.text;
                                            var productoId = selectedOption.id;
                                            var productoHtml =
                                                `<tr>
                                                    <td>` +
                                                productoNombre +
                                                `</td>
                                                <td>
                                                    <div class="input-group input-group-outline">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </td>
                                                <td align="center">` +
                                                productoId +
                                                `</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-danger mt-2 mx-2" onclick="eliminarProducto(this)">x</button>
                                                </td>
                                                </tr>`;
                                            $('.tablebody').append(productoHtml);
                                            $('.productos').val(null).trigger('change');
                                        }
                                    }

                                    function eliminarProducto(btn) {
                                        $(btn).closest('tr').remove();
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- detalles --}}
                <div class="row mt-2">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="d-flex align-items-center">
                                    <h4 class="mb-0">Detalles de la Reparación</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-5 my-1">
                                    <p><strong>Descrición</strong></p>
                                    <div class="input-group input-group-static">
                                        <textarea class="form-control" rows="3" placeholder="Descripción del problema..." spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-2 my-1">
                                    <p><strong>Prioridad</strong></p>
                                    <select class="select2 prioridad" name="prioridad" style="width: 100%" height="100px">
                                        <option></option>
                                        <option value="1">Baja</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>
                                    </select>
                                </div>
                                <div class="col-md-2 my-1">
                                    <p><strong>Fecha de Entrega</strong></p>
                                    <div class="input-group input-group-static my-3">
                                        <input type="datetime-local" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3 my-1">
                                    <p><strong>Responsable</strong></p>
                                    <select class="select2 responsable" name="prioridad" style="width: 100%"
                                        height="100px">
                                        <option></option>
                                        @foreach ($usuarios as $user)
                                            <option value="{{ $user->idusuarios }}">{{ $user->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- subir imagenes --}}
                <div class="row mt-2">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h4 class="mb-0">Imágenes</h4>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn bg-gradient-dark mb-0"
                                        onclick="document.getElementById('image-input').click()"><i
                                            class="material-icons text-sm">add</i>&nbsp;&nbsp;Agregar imagen</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            {{-- <input type="text" name="id" placeholder="ID"><br><br> --}}
                            <div id="image-preview" class="row"></div><br>
                            <input type="file" id="image-input" style="display: none;"
                                onchange="previewImages(event)" multiple>
                            <script>
                                var imageCount = 0;
                                var imagesArray = [];
                                var addButton = document.getElementById('add-image-button');

                                function previewImages(event) {
                                    var previewContainer = document.getElementById('image-preview');

                                    var files = event.target.files;
                                    var remainingSlots = 3 - imageCount;
                                    var filesToAdd = Array.from(files).slice(0, remainingSlots);

                                    for (var i = 0; i < filesToAdd.length; i++) {
                                        var file = filesToAdd[i];
                                        var reader = new FileReader();

                                        reader.onload = function(e) {
                                            var imageContainer = document.createElement('div');
                                            imageContainer.setAttribute('class', 'col-md-4');

                                            var deleteButton = document.createElement('button');
                                            deleteButton.innerHTML = 'Eliminar';
                                            deleteButton.setAttribute('class', 'delete-button btn btn-primary btn-sm');
                                            deleteButton.addEventListener('click', function() {
                                                deleteImage(imageContainer);
                                            });
                                            imageContainer.appendChild(deleteButton);

                                            var imgElement = document.createElement('img');
                                            imgElement.setAttribute('src', e.target.result);
                                            imgElement.setAttribute('width', '250');
                                            imageContainer.appendChild(imgElement);

                                            previewContainer.appendChild(imageContainer);
                                            imageCount++; // Incrementar el contador de imágenes
                                            imagesArray.push(file); // Agregar imagen al array
                                        }

                                        reader.readAsDataURL(file);
                                    }

                                    if (imageCount >= 3) {
                                        addButton.disabled = true;
                                    }
                                }

                                function deleteImage(imageContainer) {
                                    imageContainer.parentNode.removeChild(imageContainer);
                                    imageCount--; // Decrementar el contador de imágenes

                                    // Eliminar la imagen del array
                                    var index = Array.from(previewContainer.children).indexOf(imageContainer);
                                    if (index > -1) {
                                        imagesArray.splice(index, 1);
                                    }

                                    if (imageCount < 3) {
                                        addButton.disabled = false;
                                    }
                                }
                            </script>
                            <style>
                                .image-container {
                                    position: relative;
                                }

                                .delete-button {
                                    position: absolute;
                                    z-index: 1;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>

            {{-- datos de facturacion --}}
            <div class="col-md-3 my-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">person</i>
                                </div>
                                <div class="text-end pt-1">
                                    <h4 class="mb-2">Datos del Cliente</h4>
                                    @livewire('backend.clientes-live.showclient')
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <div class="row">
                                    <div class="col-md-8 my-2">
                                        @livewire('backend.clientes-live.listarclient')
                                    </div>
                                    <div class="col-md-4 my-2" align="center">
                                        <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                            data-bs-target="#nuevo_cliente">+ Nuevo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                                    <i class="material-icons opacity-10">account_balance</i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3">
                                <div class="row">
                                    <div class="col-6 text-start">
                                        <h6 class="mb-0">Servicio</h6>
                                        <h6 class="mb-0">Impuesto</h6>
                                        <h6 class="mb-0">Adelanto</h6>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p class="mb-0"><strong>$40.00</strong></p>
                                        <p class="mb-0"><strong>$40.00</strong></p>
                                        <p class="mb-0"><strong>$40.00</strong></p>
                                    </div>
                                </div>
                                <hr class="horizontal dark my-3">
                                <h5 class="text-center mb-0">Total: +$2000</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODALES --}}
        @livewire('backend.dispositivo-live.crear')
        @livewire('backend.servicio-live.crearservicio')
        @livewire('backend.producto-live.crearpro')
        @livewire('backend.clientes-live.crearclient')

        {{-- PATRON --}}
        <div class="modal fade" id="patron" tabindex="-1" role="dialog" aria-labelledby="modal-default"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title font-weight-normal" id="modal-title-default">Secuencia del Patrón</h4>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">cancel</i></span>
                        </button>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="input-group input-group-outline">
                                <br><input type="text" class="form-control" id="patron_inp" style="font-size: 30px;">
                            </div>
                            <div class="row justify-content-center mt-5">
                                <div id="gesturepwd"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
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
            space: 20,
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

            $("#gesturepwd").trigger("passwdRight");

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Seleccione...",
                allowClear: true
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".responsable").select2({
                placeholder: "Seleccione un usuario",
                allowClear: true
            });
        });
    </script>

    {{-- comprobar campos nuevo dispositivo --}}
    {{-- <script>
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
    </script> --}}

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
