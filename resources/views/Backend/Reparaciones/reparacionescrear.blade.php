@extends('Backend.Layout.app')
@push('custom-css')
    <style>
        #file-input {
            display: none;
        }

        .preview-image {
            width: 250px;
            object-fit: cover;
        }

        #image-list li {
            display: inline-block;
            margin-bottom: 10px;
            margin-right: 10px;
        }

        #image-list img {
            width: 100px;
            height: 100px;
        }

        .btn-danger {
            margin-left: 5px;
        }
    </style>
@endpush
@section('main-content')
    <form action="{{ route('reparaciones_crear') }}" method="POST" enctype="multipart/form-data" wire:ignore>

        @csrf

        <div class="container-fluid py-4">
            <div class="row">
                {{-- datos de reparacion --}}
                <div class="col-md-9 my-2" id="">
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
                                        @if ($errors->has('dispositivo'))
                                            <p class="text-danger mb-0 text-sm"><em>Seleccione el dispositivo a reparar</em>
                                            </p>
                                        @endif
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
                                    {{-- envio de la lista --}}
                                    <input type="hidden" name="lista_pedido" id="elementosInput">
                                    <h4 class="mb-0">Lista de agregados</h4>
                                    <div class="listado">
                                        <div class="table-responsive">
                                            <table class="table align-items-center mb-0" id="listadoelementos">
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
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                            <textarea name="descripcion" class="form-control" rows="3" placeholder="Descripción del problema..."
                                                spellcheck="false"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-2 my-1">
                                        <p><strong>Prioridad</strong></p>
                                        <select class="select2 prioridad" name="prioridad" style="width: 100%"
                                            height="100px">
                                            <option></option>
                                            <option value="1">Baja</option>
                                            <option value="2">Media</option>
                                            <option value="3">Alta</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 my-1">
                                        <p><strong>Fecha de Entrega</strong></p>
                                        <div class="input-group input-group-static my-3">
                                            <input name="fecha_entrega" type="datetime-local" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-1">
                                        <p><strong>Responsable</strong></p>
                                        <select class="select2 responsable" name="responsable" style="width: 100%"
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
                                        {{-- <button type="button" class="btn bg-gradient-dark mb-0"
                                            onclick="document.getElementById('image-input').click()"><i
                                                class="material-icons text-sm">add</i>&nbsp;&nbsp;Agregar imagen</button> --}}
                                        <button type="button" class="btn bg-gradient-dark mb-0"
                                            onclick="agregarImagen()">Agregar imagen</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div id="image-preview" class="row"></div><br>
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
                                        @if ($errors->has('cliente'))
                                            <p class="text-danger mb-0 text-sm"><em>Seleccione un cliente</em></p>
                                        @endif
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
                                            <button type="button" class="btn bg-gradient-dark mb-0"
                                                data-bs-toggle="modal" data-bs-target="#nuevo_cliente">Nuevo</button>
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
                                <div class="card-body pt-0 p-3 recibo">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="mb-1">Servicio</h6>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="monto" id="monto" hidden>
                                            <p class="mb-1"><strong>$<span id="resultadoTotal">0.00</span></strong></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="mb-1">Impuesto $ <span id="impust_ttl"></span></h6>
                                        </div>
                                        <div class="col-6 text-end">
                                            <div class="input-group input-group-static mb-1">
                                                <input name="impuesto" id="impuesto" type="text"
                                                    class="form-control monto-input" value="0"
                                                    onkeypress='validate(event)'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="mb-1">Adelanto</h6>
                                        </div>
                                        <div class="col-6 text-end">
                                            <div class="input-group input-group-static mb-1">
                                                <input name="adelanto" id="adelanto" type="text"
                                                    class="form-control monto-input" value="0"
                                                    onkeypress='validate(event)'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="mb-1">Envío</h6>
                                        </div>
                                        <div class="col-6 text-end">
                                            <div class="input-group input-group-static mb-1">
                                                <input name="envio" id="envio" type="text"
                                                    class="form-control monto-input" value="0"
                                                    onkeypress='validate(event)'>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="horizontal dark my-3">
                                    <h5 class="text-center mb-0">Total: $<span id="totalrecibo">00.00</span></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="row">
                                <div class="col-12" align="center">
                                    <button type="submit" class="btn bg-gradient-primary btn-lg w-100">Guardar
                                        Pedido</button>
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
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">cancel</i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group input-group-outline">
                                <br><input name="patron" type="text" class="form-control" id="patron_inp"
                                    style="font-size: 30px;">
                            </div>
                            <div class="row justify-content-center mt-5">
                                <div id="gesturepwd"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('custom-scripts')
    {{-- configurar input --}}
    <script>
        // Obtén una referencia al elemento de input
        var elementosInput = document.getElementById('elementosInput');

        // Agrega un evento al botón de enviar el formulario (o a cualquier otro evento deseado)
        document.getElementById('enviarFormulario').addEventListener('click', function() {
            // Obtén los valores de los elementos de la tabla y guárdalos en un array
            var tablaElementos = [];

            // Itera sobre cada fila de la tabla con la clase "tablebody"
            $('.tablebody tr').each(function() {
                var tipo = $(this).find('td:first-child').text().trim();
                var nombre = $(this).find('td:nth-child(2)').text().trim();
                var id = $(this).find('td:nth-child(3)').text().trim();

                // Agrega un objeto con los valores al array tablaElementos
                tablaElementos.push({
                    tipo: tipo,
                    nombre: nombre,
                    id: id
                });
            });

            // Asigna el valor del array tablaElementos al input elementosInput
            elementosInput.value = JSON.stringify(tablaElementos);
        });
    </script>

    {{-- agregar elementos --}}
    <script>
        var tablaElementos = [];
        var contadorId = 1;

        function agregarServicio() {
            var selectedOption = $('.servicios').select2('data')[0];
            if (selectedOption && selectedOption.text !== "Seleccione...") {
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
                            <input type="text" class="form-control precio-input" onkeypress='validate(event)'>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm bg-gradient-danger mt-2 mx-2" onclick="eliminarServicio(this)">x</button>
                    </td>
                    </tr>`;
                $('.tablebody').append(servicioHtml);

                // Agregar el elemento al array
                var servicio = {
                    id: contadorId++,
                    tipo: 'servicio',
                    nombre: servicioNombre,
                    cantidad: '',
                    precio: ''
                };
                tablaElementos.push(servicio);
                actualizarElementosInput();
                console.log(tablaElementos);

                // Actualizar el valor de precio en el elemento correspondiente en el array tablaElementos
                $('.tablebody tr:last-child .precio-input').on('blur', function() {
                    var precio = $(this).val();

                    servicio.precio = precio;
                    actualizarElementosInput();
                    calcularResultadoTotal();
                    calcularReciboTotal();
                    console.log(tablaElementos);
                });

                $('.servicios').val(null).trigger('change');
            }
        }

        function eliminarServicio(btn) {
            var tr = $(btn).closest('tr');
            var servicioId = tr.data('servicio-id');

            // Obtener el índice del elemento a eliminar
            var index = $(btn).closest('tr').index();

            // Eliminar el elemento del array
            tablaElementos.splice(index, 1);

            // Actualizar el campo de precio en el array para los servicios restantes
            $('.tablebody tr').each(function(index, element) {
                var precioInput = $(element).find('.precio-input');
                var servicioId = $(element).data('servicio-id');
                var servicio = tablaElementos.find(function(elemento) {
                    return elemento.id === servicioId;
                });

                if (servicio) {
                    servicio.precio = precioInput.val();
                }
            });

            tr.remove();
            actualizarElementosInput();
            calcularResultadoTotal();
            calcularReciboTotal();
            console.log(tablaElementos);
        }

        function agregarProducto() {
            var selectedOption = $('.productos').select2('data')[0];
            if (selectedOption && selectedOption.text !== "Seleccione...") {
                var productoNombre = selectedOption.text;
                var productoId = selectedOption.id;
                var productoPrecio = selectedOption.element.dataset.preciocompra;
                var productoHtml =
                    `<tr>
                        <td>` +
                    productoNombre +
                    `</td>
                        <td>
                            <div class="input-group input-group-outline">
                                <input type="text" class="form-control cantidad-input" onkeypress='validate(event)'>
                            </div>
                        </td>
                        <td align="center">` +
                    productoPrecio +
                    `</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger mt-2 mx-2" onclick="eliminarProducto(this)">x</button>
                        </td>
                    </tr>`;
                $('.tablebody').append(productoHtml);

                // Agregar el elemento al array
                var producto = {
                    id: contadorId++,
                    id_p: productoId,
                    tipo: 'producto',
                    nombre: productoNombre,
                    cantidad: '',
                    precio: productoPrecio
                };
                tablaElementos.push(producto);
                actualizarElementosInput();
                console.log(tablaElementos);

                // Actualizar el valor de precio en el elemento correspondiente en el array tablaElementos
                $('.tablebody tr:last-child .cantidad-input').on('blur', function() {
                    var cantidad = $(this).val();

                    producto.cantidad = cantidad;
                    actualizarElementosInput();
                    calcularResultadoTotal();
                    calcularReciboTotal();
                    console.log(tablaElementos);
                });

                $('.productos').val(null).trigger('change');

            }
        }

        function eliminarProducto(btn) {
            var tr = $(btn).closest('tr');
            var productoId = tr.data('producto-id');

            // Obtener el índice del elemento a eliminar
            var index = $(btn).closest('tr').index();

            // Eliminar el elemento del array
            tablaElementos.splice(index, 1);

            // Actualizar el campo de precio en el array para los productos restantes
            $('.tablebody tr').each(function(index, element) {
                var precioInput = $(element).find('.precio-input');
                var productoId = $(element).data('producto-id');
                var producto = tablaElementos.find(function(elemento) {
                    return elemento.id === productoId;
                });

                if (producto) {
                    producto.precio = precioInput.val();
                }
            });

            tr.remove();
            actualizarElementosInput();
            calcularResultadoTotal();
            calcularReciboTotal();
            console.log(tablaElementos);
        }

        function actualizarElementosInput() {
            // Actualizar el valor del input con el array de elementos en formato JSON
            document.getElementById('elementosInput').value = JSON.stringify(tablaElementos);
        }

        // Función para mostrar los elementos en la consola
        function mostrarElementosConsola() {
            console.log(tablaElementos);
        }

        function calcularResultadoTotal() {
            var resultado = 0;

            // Recorre los elementos en tablaElementos
            tablaElementos.forEach(function(elemento) {
                if (elemento.tipo === 'producto') {
                    // Si es un producto, multiplica cantidad por precio y suma al resultado
                    var cantidad = parseFloat(elemento.cantidad);
                    var precio = parseFloat(elemento.precio);
                    resultado += cantidad * precio;
                } else if (elemento.tipo === 'servicio') {
                    // Si es un servicio, suma el precio al resultado
                    var precio = parseFloat(elemento.precio);
                    resultado += precio;
                }
            });

            // Actualiza el resultado total en el contenedor
            var resultadoFormatted = resultado.toFixed(2);
            $('#monto').val(resultadoFormatted);
            $('#resultadoTotal').text(resultadoFormatted);
        }

        $(document).ready(function() {
            $('.monto-input').on('blur', function() {
                calcularReciboTotal();
            });
        });

        function calcularReciboTotal() {
            var resultado = 0;

            var servicio = parseFloat($('#resultadoTotal').text().replace('$', ''));
            var impuesto_por = parseFloat($('#impuesto').val());
            var adelanto = parseFloat($('#adelanto').val());
            var envio = parseFloat($('#envio').val());

            var impuesto = servicio * (impuesto_por / 100);

            resultado = (servicio + impuesto + envio) - adelanto;

            // formatear impuesto
            var impuestoformatted = impuesto.toFixed(2);
            $('#impust_ttl').text(impuestoformatted);

            // Actualiza el resultado total en el contenedor
            var resultadoFormatted = resultado.toFixed(2);
            $('#totalrecibo').text(resultadoFormatted);
        }
    </script>

    {{-- enviar imagenes --}}

    <script>
        function mostrarVistaPrevia(input, listItem) {
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var image = listItem.querySelector('.preview-image');

                if (image) {
                    image.src = e.target.result;
                } else {
                    var image = document.createElement('img');
                    image.src = e.target.result;
                    image.classList.add('preview-image');
                    listItem.appendChild(image);
                }
            };

            reader.readAsDataURL(file);
        }

        function agregarImagen() {
            var inputCount = document.querySelectorAll('input[name="imagen[]"]').length;

            if (inputCount >= 3) {
                alert('Solo se permiten agregar hasta 3 imágenes.');
                return;
            }

            var listItem = document.createElement('div');
            listItem.classList.add('col-md-4', 'mt-3');

            var fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.name = 'imagen[]';
            fileInput.multiple = true;
            fileInput.id = 'file-input';

            var customButton = document.createElement('button');
            customButton.type = 'button';
            customButton.classList.add('btn', 'btn-info', 'btn-sm');
            customButton.textContent = 'Subir';

            var deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.classList.add('btn', 'btn-danger', 'btn-sm');
            deleteButton.textContent = 'Eliminar';

            customButton.onclick = function() {
                fileInput.click();
            };

            deleteButton.onclick = function() {
                listItem.remove();
            };

            listItem.appendChild(fileInput);
            listItem.appendChild(customButton);
            listItem.appendChild(deleteButton);

            var previewList = document.getElementById('image-preview');
            previewList.appendChild(listItem);

            fileInput.onchange = function() {
                mostrarVistaPrevia(this, listItem);
            };
        }
    </script>

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

    @if ($errors->has('dispositivo'))
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "¡ERROR DISPOSITIVO!",
                msg: 'Seleccione un dispositivo.'
            });
        </script>
    @endif

    @if ($errors->has('cliente'))
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "¡ERROR CLIENTE!",
                msg: 'Seleccione un cliente.'
            });
        </script>
    @endif
@endpush
