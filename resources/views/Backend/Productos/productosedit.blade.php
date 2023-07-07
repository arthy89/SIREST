@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                        <div class="bg-gradient-success shadow-primary border-radius-lg pt-4 pb-3 ">
                            <h6 class="text-white text-capitalize ps-3">Editar Producto</h6>
                        </div>
                    </div>


                    <div class="card-body">
                        <form action="{{ route('editar_productos', $producto) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method("put")

                            <div class="row">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                {{-- nombre producto --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Nombre del Producto</label>
                                        <input type="text" class="form-control" name="nombre_producto" value="{{$producto->nombre_p}}">
                                    </div>

                                </div>
                                {{-- Categorias --}}
                                <div class="col-md-6">
                                    <label>Categoria</label>
                                    <div class="input-group input-group-static my-0">
                                        <select class="js-example-basic-single" id="cateogiraid" name="categoriaid"
                                            style="width: 100%" height="100px">
                                            @foreach ($categorias as $categoria)
                                                <option value="{{$categoria->idcategoria}}" selected>{{$categoria->nombre}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                {{--stock cantidad --}}
                                <div class="col-md-3">

                                    <div class="input-group input-group-static mb-4">
                                        <label > Stock(Cantidad)</label>
                                        <input type="text" class="form-control" name="stock_cantidad" value="{{$producto->stock}}"onkeypress='validate(event)' maxlength="">
                                    </div>
                                </div>


                                {{-- precio Compra --}}
                                <div class="col-md-3">
                                    <div class="input-group input-group-static mb-4">
                                        <label >Precio (compra)</label>
                                        <input type="text" class="form-control" name="precio_compra" value="{{$producto->precio_compra}}" onkeypress='validate(event)' maxlength="8">
                                    </div>
                                </div>
                                {{-- precio mayoreo  --}}
                                <div class="col-md-3">
                                    <div class="input-group input-group-static mb-4">
                                        <label >Precio (Mayoreo)</label>
                                        <input type="text" class="form-control" name="precio_mayoreo" value="{{$producto->precio_venta_mayor}}" onkeypress='validate(event)' maxlength="8">
                                    </div>
                                </div>
                                {{-- rol --}}
                                <div class="col-md-3">
                                    <div class="input-group input-group-static mb-4">
                                        <label >Precio (Publico)</label>
                                        <input type="text" class="form-control" name="precio_publico" value="{{$producto->precio_venta_public}}">
                                    </div>
                                </div>

                                {{-- Colores --}}
                                <div class="col-md-6">
                                    <label>Color</label>
                                    <select class="tokenizationSelect2" id="colores" name="colores[]" multiple="true" style="width: 100%" height="100px">
                                        @foreach ($producto->colores as $color)
                                            <option value="{{$color}}">{{$color}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                {{-- Tags --}}
                                <div class="col-md-6">
                                    <label>Tags</label>
                                    <select class="tokenizationSelect3" id="tags" name="tags[]" multiple="true" style="width: 100%" height="100px">
                                        @foreach ($producto->tags as $tag)
                                            <option value="{{$tag}}">{{$tag}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- Descripcion --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-dynamic">
                                        <textarea class="form-control" id="descripcion"  name="descripcion" rows="3"  spellcheck="false">{{$producto->descripcion}}</textarea>
                                    </div>
                                </div>
                                {{-- Estado --}}
                                <div class="col-md-6">
                                    <label>Proveedor</label>
                                    <div class="input-group input-group-static my-2">
                                        <select class="js-example-basic-single" id="proveedorid" name="proveedor"
                                            style="width: 100%" height="100px">
                                            @foreach ($proveedores as $proveedor)
                                                <option value="{{ $proveedor->id_proveedor }}">
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
                                                <option value="{{ $dispositivo->id_device }}">
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
                                            Clic aquí para Cambiar tu Imagen
                                            <input type="file" id="archivo" name="archivo" />
                                            </div>
                                            <div class="preview-container">

                                            @if($producto->imagen == "http://sirest.test/")
                                                <img src="{{asset('imgs/noimage.jpg')}}" id="preview">
                                            @else
                                                <img src="{{$producto->imagen}}" id="preview">
                                            @endif

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="submit" class="btn bg-gradient-success">Guardar cambios Producto</button>
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
        //var pizza = "porción1,porción2,porción3,porción4";
    $(document).ready(function() {

            $('.js-example-basic-single').select2();
            // categorias
            $('#cateogiraid').val("{{ $producto->categoriaid }}");
            $('#cateogiraid').select2().trigger('change');
            // rol
            $('#proveedorid').val("{{ $producto->proveedorid }}");
            $('#proveedorid').select2().trigger('change');
            // colores
            $('#colores').val(@json($producto->colores));
            // tags
            $('#tags').val(@json($producto->tags));
            // tags
            //var rj = @json($producto->tags);
            //$('#pruebas').val(rj);

    });


    $(document).ready(function(){
        $(".tokenizationSelect2").select2({
                placeholder: "Escriba los Colores", //placeholder
                tags: true,
                tokenSeparators: ['/',',',';'," "]
            });

        $(".tokenizationSelect3").select2({
                placeholder: "Escriba los tags", //placeholder
                tags: true,
                tokenSeparators: ['/',',',';'," "]
            });
        })
$('select').select2({
  createTag: function (params) {
    $( ".js-ejemplo-tokenizador" ). select2 ({
    etiquetas : verdadero ,
    tokenSeparators : [ ',' , ' ' ] })

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
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
        }
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


</script>
@endpush
