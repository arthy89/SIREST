@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Nueva Categoria</h6>
                        </div>
                    </div>
                    <div class="card-body">
                    <!--
                        <form action="{{ route('crear_categorias') }}" method="POST">

                            @csrf

                            <div class="row">
                                {{-- nombre producto --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Nombre de categoria</label>
                                        <input type="text" class="form-control" name="nombre_categoria">
                                    </div>
                                </div>

                                {{-- Descripcion --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Descripcion</label>
                                        <textarea type="text" class="form-control" rows="1" placeholder="" spellcheck="false"></textarea>

                                    </div>
                                </div>

                                {{-- Categorias --}}
                                <div class="col-md-6">

                                    <label class="input-group input-group-static mb-4">Estado</label>
                                    <div class="input-group input-group-static my-3">
                                        <select class="js-example-basic-single" id="estado" name="estadoid"
                                            style="width: 100%">
                                            <option value="1" selected>ACTIVO</option>
                                            <option value="2">INACTIVO</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- img --}}
                                <div class="col-md-6">
                                    <input type="file" id="files" name="files[]" />
                                    <output id="list"></output>
                                    <div class="alert alert-info col-md-9" role="alert">
                                        <small><li >El recorte de la imagen debe ser superior a 413 px de ancho y 531 px de alto</li></small>
                                    </div>
                                    <span class="badge badge-danger" id="error_imagen"></span>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="submit" class="btn bg-gradient-info">Guardar nuevo Producto</button>
                                </div>
                            </div>
                        </form>
                    -->
                        <form action="{{ route('crear_categorias') }}" method="POST">

                            @csrf

                            <div class="row">
                                {{-- nombre producto --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Nombre del producto</label>
                                        <input type="text" class="form-control" name="nombre_producto">
                                    </div>
                                </div>

                                {{-- Descripcion --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">

                                        <textarea type="text" class="form-control" rows="2" placeholder="Descripcion" spellcheck="false"></textarea>

                                    </div>
                                </div>

                                {{-- Estado --}}
                                <div class="col-md-6">
                                    <label>Estado</label>
                                    <div class="input-group input-group-static my-0">
                                        <select class="js-example-basic-single" id="estado" name="estadoid"
                                            style="width: 100%" height="100px">
                                            <option value="1" selected>ACTIVO</option>
                                            <option value="2">INACTIVO</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- img --}}
                                <div class="col-md-6" id="imgs">

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
    function mostrarImagen(event){
    var imagenSource = event.target.result;
    var previewImage = document.getElementById('preview');

    previewImage.src = imagenSource;
    }

    function procesarArchivo(event){
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