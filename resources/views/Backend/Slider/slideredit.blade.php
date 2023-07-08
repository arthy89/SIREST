@extends('Backend.Layout.app')
@push('custom-css')
    <style>
        #file-input {
            display: none;
        }

        .preview-image {

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
        #htmlcode {
  width: 100%; /* Opcional: establece el ancho del textarea al 100% del contenedor */
  resize: vertical; /* Permite redimensionar verticalmente el textarea */
}
.image-preview{
  max-width: 100%; /* Asegura que el contenedor se ajuste al ancho máximo disponible */
}
#image-preview{
  max-width: 100%; /* Asegura que la imagen se ajuste al ancho máximo disponible */
  height: auto; /* Mantiene la proporción de aspecto de la imagen */
}


    </style>
@endpush
@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Editar Slider</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                        <form action="{{ route('editar_slider', $datos) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method("put")

                            <div class="row">


                                {{--nombre cliente --}}
                                <div class="col-md-6">
                                    <h4>Ingresa el titulo y sub titulo</h4>

                                    <textarea  id="htmlcode" name="htmlcode" rows="5" cols="40">{{$datos->htmlcode}}
                                    </textarea>
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
                                                @if($datos->imagen == "http://sirest.test/")
                                                <img src="{{asset('imgs/noimage.jpg')}}" id="preview">
                                                @else
                                                    <img src="http://sirest.test/{{$datos->imagen}}" id="preview">
                                                @endif

                                            </div>

                                        </div>
                                    </div>
                                </div>




                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <button type="submit" class="btn bg-gradient-info">Actualizar Producto</button>

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
    {{-- enviar imagenes --}}

    <script>
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

            if (inputCount >= 1) {
                alert('Solo se permiten agregar hasta 1 imágenes.');
                return;
            }

            var listItem = document.createElement('div');
            listItem.classList.add('col-md-6', 'mt-3');

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
@endpush
