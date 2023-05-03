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
                        <form action="{{ route('crear_usuarios') }}" method="POST">

                            @csrf

                            <div class="row">
                                {{-- nombre producto --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Nombre del producto</label>
                                        <input type="text" class="form-control" name="nombre_producto">
                                    </div>
                                </div>



                                {{-- Categorias --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label"> Categorias</label>
                                        <input type="text" class="form-control" name="categorias">
                                    </div>
                                </div>

                                {{-- Stock --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label"> Stock(Cantidad)</label>
                                        <input type="text" class="form-control" name="Stock_cantidad">
                                    </div>
                                </div>


                                {{-- precio Compra --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Precio (compra)</label>
                                        <input type="text" class="form-control" name="precio_compra">
                                    </div>
                                </div>

                                {{-- precio mayoreo  --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Precio (Mayoreo)</label>
                                        <input type="text" class="form-control" name="precio_mayoreo">
                                    </div>
                                </div>


                                {{-- rol --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Precio (Publico)</label>
                                        <input type="text" class="form-control" name="precio_publico">
                                    </div>
                                </div>
                                {{-- Descripcion --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-dynamic">
                                        <textarea class="form-control" name="Descripcion" rows="3" placeholder="Descripcion..." spellcheck="false"></textarea>
                                    </div>
                                </div>
                                {{-- rol --}}
                                <div class="col-md-6">
                                    <input type="file" id="files" name="files[]" />
                                    <br />
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
                    </div>
                </div>
            </div>
        </div>
        {{-- <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer> --}}
    </div>
@endsection

@push('custom-scripts')
<script>
    function archivo(evt) {
      var files = evt.target.files; // FileList object

        //Obtenemos la imagen del campo "file".
      for (var i = 0, f; f = files[i]; i++) {
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
                continue;
           }

           var reader = new FileReader();

           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                      document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);

           reader.readAsDataURL(f);
       }
}

      document.getElementById('files').addEventListener('change', archivo, false);
</script>
@endpush
