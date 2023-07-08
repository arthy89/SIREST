@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Editar Categoria</h6>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('editar_categorias', $categoria) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method("put")

                            <div class="row">

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                                {{-- nombre producto --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label class="">Nombre del Categoria</label>
                                        <input type="text" class="form-control" name="nombre_categoria" value="{{$categoria->nombre}}">
                                    </div>
                                </div>

                                {{-- Descripcion --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">

                                        <textarea type="text" class="form-control" rows="2" placeholder="Descripcion" spellcheck="false"
                                            name="descripcion">{{$categoria->descripcion}}</textarea>

                                    </div>
                                </div>

                                {{-- Estado --}}
                                <div class="col-md-6">
                                    <label>Estado</label>
                                    <div class="input-group input-group-static my-0">
                                        <select class="js-example-basic-single" id="estado" name="status"
                                            style="width: 100%" height="100px" required>
                                            <option value="1" selected>ACTIVO</option>
                                            <option value="0">INACTIVO</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- img --}}
                                <div class="col-md-6" id="imgs">

                                    <div class="col-md-6" id="imagenes">
                                        <div class="main-container_1" id="main-container">
                                            <div class="input-container_1">
                                                Clic aquí para Editar tu Imagen
                                                <input type="file" id="archivo" name="archivo">
                                            </div>
                                            <div class="preview-container">
                                                <img src="{{$categoria->ruta}}" id="preview">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="submit" class="btn bg-gradient-success">Guardar actualizacion Producto</button>
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
        var x = document.getElementById("archivo");
        x.value = {{$categoria->ruta}};

    </script>
    <script>

        $(document).ready(function() {
        $('.js-example-basic-single').select2();
        // categorias
        $('#estado').val("{{ $categoria->status }}");
        $('#estado').select2().trigger('change');
        });
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

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
