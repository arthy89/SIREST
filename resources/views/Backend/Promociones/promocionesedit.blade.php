@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Editar Promocion</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('editar_promociones', $promocion) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method("put")

                            <div class="row">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                {{-- nombre producto --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Nombre de la promocion</label>
                                        <input type="text" value="{{$promocion->nombre_promocion}}" class="form-control" name="nombre_promocion">
                                    </div>

                                    @if ($errors->has('nombre_producto'))
                                        <p class="text-danger mb-0 text-sm"><em>Este campo es obligatorio</em></p>
                                    @endif
                                </div>
                                {{-- Categorias
                                <div class="col-md-6">
                                    <label>Categoria</label>
                                    <div class="input-group input-group-static my-0">
                                        <select class="js-example-basic-single" id="cateogiraid" name="categoriaid"
                                            style="width: 100%" height="100px">
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->idcategoria }}" selected>
                                                    {{ $categoria->nombre }}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div> --}}

                                {{-- Fecha Inicio --}}
                                <div class="col-md-3">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Fecha Inicio</label>
                                        <input name="fecha_inicio" value="{{$promocion->fecha_inicio}}" type="datetime-local" class="form-control"
                                            onfocus="focused(this)" onfocusout="defocused(this)">
                                    </div>
                                </div>

                                {{-- Fecha Inicio --}}
                                <div class="col-md-3">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Fecha Fecha Final</label>
                                        <input name="fecha_final" value="{{$promocion->fecha_final}}" type="datetime-local" class="form-control"
                                            onfocus="focused(this)" onfocusout="defocused(this)">
                                    </div>
                                </div>

                                {{-- Tipo de DESCUENTO  --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Tipo de Descuento</label>
                                        @if($promocion->tipo_descuento == 1)
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" value="1" type="radio" name="tipo_descuento"
                                                    id="customRadio1" checked onchange="identificarSeleccion()">
                                                <label class="custom-control-label" for="customRadio1">Porcentaje</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" value="2" type="radio" name="tipo_descuento"
                                                    id="customRadio2" onchange="identificarSeleccion()" name="cantidad_descuento">
                                                <label class="custom-control-label" for="customRadio2">Monto</label>
                                            </div>
                                        @else
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" value="1" type="radio" name="tipo_descuento"
                                                id="customRadio1"  onchange="identificarSeleccion()">
                                            <label class="custom-control-label" for="customRadio1">Porcentaje</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="2" type="radio" name="tipo_descuento"
                                                id="customRadio2" checked onchange="identificarSeleccion()" name="cantidad_descuento">
                                            <label class="custom-control-label" for="customRadio2">Monto</label>
                                        </div>
                                        @endif


                                    </div>
                                </div>

                                {{-- Descuento --}}
                                @if($promocion->tipo_descuento == 1)
                                    <div class="col-md-6" id="tipo_descuento">
                                        <label>Porcentaje de Descuento</label>
                                        <div class="input-group input-group-dynamic mb-4">
                                            <span class="input-group-text">%</span>
                                            <input type="text" class="form-control" name="cantidad_descuento" value="{{$promocion->cantidad_descuento}}" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6" id="tipo_descuento">
                                        <label>Cantidad de Descuento</label>
                                        <div class="input-group input-group-dynamic mb-4">
                                            <span class="input-group-text">$</span>
                                            <input type="text" class="form-control" name="cantidad_descuento" value="{{$promocion->cantidad_descuento}}" aria-label="Amount (to the nearest dollar)">
                                        </div>
                                    </div>
                                @endif


                            </div>


                            <div class="col-md-6">
                                    <label>Productos</label>
                                    <div class="input-group input-group-static my-0">
                                        <select class="js-example-basic-single" id="productoid" name="productoid"
                                            style="width: 100%" height="100px">

                                            @foreach ($productos as $producto)
                                                <option value="{{ $producto->idproducto }}" selected>{{ $producto->nombre_p }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>


                            <div class="col-md-6">
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button type="submit" class="btn bg-gradient-info">Guardar nueva Promocion</button>
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
        // productosd
        $('#productoid').val("{{ $promocion->idproducto }}");
        $('#productoid').select2().trigger('change');
        });
        $(document).ready(function() {
            $(".tokenizationSelect2").select2({
                placeholder: "Escriba los Colores", //placeholder
                tags: true,
                tokenSeparators: ['/', ',', ';', " "]
            });

            $(".tokenizationSelect3").select2({
                placeholder: "Escriba los tags", //placeholder
                tags: true,
                tokenSeparators: ['/', ',', ';', " "]
            });
        })
        $('select').select2({
            createTag: function(params) {
                $(".js-ejemplo-tokenizador").select2({
                    etiquetas: verdadero,
                    tokenSeparators: [',', ' ']
                })

                var term = $.trim(params.term);

                if (term === '') {
                    return null;
                }

                return {
                    id: term,
                    text: term,
                    newTag: true // add additional parameters
                }
            }


        });

        //////////////////paara las imagenes
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

        function mostrarImagen(event) {
            var imagenSource = event.target.result;
            var previewImage = document.getElementById('preview');
            previewImage.src = imagenSource;
        }

        function procesarArchivo(event) {
            var imagen = event.target.files[0];

            var lector = new FileReader();

            lector.addEventListener('load', mostrarImagen, false);

            lector.readAsDataURL(imagen);
        }

        document.getElementById('archivo')
            .addEventListener('change', procesarArchivo, false)
    </script>
    <script>
        var contenedor = document.getElementById('tipo_descuento');

        // Crear nuevo contenido HTML
        var porcentajeContenido = document.createElement('p');
        var precioContenido = document.createElement('p');
        porcentajeContenido.textContent = '';
        precioContenido.textContent = '';

        function identificarSeleccion() {
            var checkbox1 = document.getElementById('customRadio1');
            var checkbox2 = document.getElementById('customRadio2');

            if (checkbox1.checked && !checkbox2.checked) {
                contenedor.innerHTML = '<label>Porcentaje de descuento</label><div class="input-group input-group-dynamic mb-4">'+
                                            '<span class="input-group-text">%</span>'+
                                            '<input type="text" class="form-control" value="0.01" name="cantidad_descuento" aria-label="Amount (to the nearest dollar)">'+
                                        '</div>';
                contenedor.appendChild(porcentajeContenido);
                console.log('Checkbox 1 está seleccionado');
            } else if (!checkbox1.checked && checkbox2.checked) {
                contenedor.innerHTML = '<label>Cantidad de Precio precio</label><div class="input-group input-group-dynamic mb-4">'+
                                            '<span class="input-group-text">$</span>'+
                                            '<input type="text" class="form-control" name="cantidad_descuento" aria-label="Amount (to the nearest dollar)">'+
                                        '</div>';
                contenedor.appendChild(precioContenido);
                console.log('Checkbox 2 está seleccionado');
            } else if (checkbox1.checked && checkbox2.checked) {
                console.log('Ambos checkboxes están seleccionados');
            } else {
                console.log('Ningún checkbox está seleccionado');
            }
        }
    </script>
@endpush
