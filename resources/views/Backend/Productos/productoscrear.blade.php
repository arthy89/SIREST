@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Nuevo Producto</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('crear_productos') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                {{-- nombre producto --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Nombre del producto</label>
                                        <input type="text" class="form-control" name="nombre_producto">
                                    </div>
                                    @if ($errors->has('nombre_producto'))
                                            <p class="text-danger mb-0 text-sm"><em>Este campo es obligatorio</em></p>
                                    @endif
                                </div>
                                {{-- Categorias --}}
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
                                </div>

                                {{-- stock cantidad --}}
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label"> Stock(Cantidad)</label>
                                        <input type="text" class="form-control" name="stock_cantidad"
                                            onkeypress='validate(event)' maxlength="">
                                    </div>
                                </div>


                                {{-- precio Compra --}}
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Precio (compra)</label>
                                        <input type="text" class="form-control" name="precio_compra"
                                            onkeypress='validate(event)' maxlength="8">
                                    </div>
                                </div>
                                {{-- precio mayoreo  --}}
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Precio (Mayoreo)</label>
                                        <input type="text" class="form-control" name="precio_mayoreo"
                                            onkeypress='validate(event)' maxlength="8">
                                    </div>
                                </div>


                                {{-- rol --}}
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Precio (Publico)</label>
                                        <input type="text" class="form-control" name="precio_publico">
                                    </div>
                                </div>

                                {{-- Colores --}}
                                <div class="col-md-6">
                                    <label>Color</label>
                                    <select class="tokenizationSelect2" name="colores[]" multiple="true" style="width: 100%" height="100px">
                                        <option value="rojo">Rojo</option>
                                        <option value="blanco">Blanco</option>
                                        <option value="negro">Negro</option>
                                        <option value="azul">Azul</option>
                                        <option value="plomo">Plomo</option>
                                    </select>
                                </div>
                                {{-- Tags --}}
                                <div class="col-md-6">
                                    <label>Tags</label>
                                    <select class="tokenizationSelect3" name="tags[]" multiple="true" style="width: 100%" height="100px">
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>
                                {{-- Descripcion --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-dynamic">
                                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripcion..."
                                            spellcheck="false"></textarea>
                                    </div>
                                </div>
                                {{-- Estado/Provedoresl --}}
                                <div class="col-md-6">
                                    <label>Proveedores</label>
                                    <div class="input-group input-group-static my-0">
                                        <select class="js-example-basic-single" id="proveedorid" name="proveedorid"
                                            style="width: 100%" height="100px">
                                            @foreach ($proveedores as $proveedor)
                                                <option value="{{ $proveedor->id_proveedor }}" selected>
                                                    {{ $proveedor->nombre_proveedor }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Dispositivo--}}
                                <div class="col-md-6">
                                    <label>Dispositivo</label>
                                    <div class="input-group input-group-static my-0">
                                        <select class="js-example-basic-single" id="deviceid" name="deviceid"
                                            style="width: 100%" height="100px">
                                            @foreach ($dispositivos as $dispositivo)
                                                <option value="{{ $dispositivo->id_device }}" selected>
                                                    {{ $dispositivo->device_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- img --}}
                                <div class="col-md-6">
                                    <div class="col-md-6" id="imagenes">
                                        <div class="main-container_1" id="main-container">
                                            <div class="input-container_1">
                                                Clic aquí para subir tu Imagen
                                                <input type="file" id="archivo" name="archivo" />
                                            </div>
                                            <div class="preview-container">
                                                <img src="" id="preview">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
    <script>
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
@endpush
