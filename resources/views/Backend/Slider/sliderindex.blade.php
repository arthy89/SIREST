@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('crear_slider') }}" class="btn btn-info">
                        <i class="material-icons">add</i>
                        AGREGAR
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white ps-3">Lista De Sliders</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-5">
                            @foreach ($slider as $sliders)

                                @csrf

                                <div class="col-lg-6 col-md-6">
                                        <div class="card" data-animation="true">
                                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                                <a class="d-block blur-shadow-image">

                                                    <img src="{{ asset($sliders->imagen) }}" alt="img-blur-shadow"
                                                        class="img-fluid shadow border-radius-lg">
                                                </a>
                                                <div class="colored-shadow"
                                                    style="background-image: url(&quot;../../assets/img/products/product-1-min.jpg&quot;);">
                                                </div>
                                            </div>

                                            <div class="card-body text-center">
                                                <form action="{{route('eliminar_slider', $sliders->sliderid)}}" method="POST" class="formulario">
                                                    @csrf

                                                    @method('DELETE')
                                                    <div class="d-flex mt-n6 mx-auto">
                                                        <a href="{{route('editar_slider', $sliders->sliderid)}}" class="btn btn-link text-primary ms-auto border-0" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom" data-bs-original-title="edit">
                                                            <i class="material-icons text-lg" >edit</i>
                                                        </a>

                                                        <button id="" type="submit" class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom"  >
                                                            <i class="material-icons text-lg">delete</i>
                                                        </button>
                                                    </div>
                                                </form>
                                                <div class="hero-slider-content">
                                                    {!! html_entity_decode($sliders->htmlcode ) !!}

                                                </div>
                                            </div>


                                            <hr class="dark horizontal my-0">
                                            <div class="card-footer d-flex">

                                            </div>
                                        </div>

                                </div>
                            </form>
                            @endforeach


                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('custom-scripts')
<script>
    $(document).on('submit', '.formulario', function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro de eliminar al Categoria?',
            text: "Se eliminará la Categoria    ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se eliminó el Slider',
                'success'
            )
        </script>
    @endif
    @if (session('eliminar') == 'ok_e')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El slider no existe ',
                'success'
            )
        </script>
    @endif
    @if (session('crear')=='ok')
        <script type="text/javascript">

            Lobibox.notify('success', {
                width: 600,
                img: "{{asset('imgs/success.png')}}",
                position: 'top right',
                title: 'Registro correctamente !!',
                msg: 'Slider Registrada.'
            });

        </script>
    @endif
    @if (session('actualizar')=='ok')
        <script type="text/javascript">

            Lobibox.notify('success', {
                width: 600,
                img: "{{asset('imgs/success.png')}}",
                position: 'top right',
                title: 'Actualizacion correctamente !!',
                msg: 'Slider Actualizada.'
            });

        </script>
    @endif

@endpush
