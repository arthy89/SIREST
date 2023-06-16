@extends('Backend.Layout.app')

@push('custom-css')
@endpush

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                            <h4 class="text-white text-capitalize ps-3">Mi Negocio</h4>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <form action="{{ route('negocio_edit', $negocio[0]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Nombre de Mi Negocio</label>
                                        <input type="text" name="neg_nombre" class="form-control"
                                            value="{{ $negocio[0]->neg_nombre }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Dirección</label>
                                        <input type="text" name="neg_direccion" class="form-control"
                                            value="{{ $negocio[0]->neg_direccion }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="input-group input-group-static mb-4">
                                        <label>País</label>
                                        <select class="select2 pais" id="pais" name="neg_pais" style="width: 100%"
                                            height="100px">
                                            @foreach ($paises as $pais)
                                                <option value="{{ $pais->cod }}">{{ $pais->pais }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-1">
                                    <div class="input-group input-group-static mb-4">
                                        <label>+ Código</label>
                                        <span class="input-group-text">+</span>
                                        <input type="text" name="neg_cod" class="form-control"
                                            value="{{ $negocio[0]->neg_cod }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-1">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Teléfono</label>
                                        <input type="text" name="neg_telefono" class="form-control" maxlength="9"
                                            onkeypress='validate(event)' value="{{ $negocio[0]->neg_telefono }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Correo</label>
                                        <span class="input-group-text">@</span>
                                        @if ($negocio[0]->neg_correo)
                                            <input type="text" name="neg_correo" class="form-control"
                                                value="{{ $negocio[0]->neg_correo }}">
                                        @else
                                            <input type="text" name="neg_correo" class="form-control"
                                                placeholder="Correo...">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="input-group input-group-dynamic">
                                        <label>Garantía</label>
                                    </div>
                                    <div class="input-group input-group-static mb-4">
                                        <textarea name="neg_garantia" class="form-control" rows="3"
                                            placeholder="Coloque aquí la garantía que desea brindar a las reparaciones que ofrece en su negocio..."
                                            spellcheck="false">{{ $negocio[0]->neg_garantia }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    {{-- img --}}
                                    <div id="row justify-content-center">

                                        <div id="imagenes">
                                            <div class="main-container_1" id="main-container">
                                                <div class="input-container_1">
                                                    Clic aquí para agregar una imagen
                                                    <input type="file" id="archivo" name="neg_img">
                                                </div>
                                                <div class="preview-container">
                                                    @if ($negocio[0]->neg_img)
                                                        <img src="{{ asset('storage/' . $negocio[0]->neg_img) }}"
                                                            id="preview">
                                                    @else
                                                        <img src="{{ asset('imgs/noimage.jpg') }}" id="preview">
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" class="btn bg-gradient-success">Guardar Cambios</button>
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
            $('.select2 ').select2();
            $('#pais').val("{{ $negocio[0]->neg_pais }}");
            $('#pais').select2().trigger('change');
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

    {{-- imagenes --}}
    <script>
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
