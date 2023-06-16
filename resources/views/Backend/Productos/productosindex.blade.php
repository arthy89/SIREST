@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('crear_productos') }}" class="btn btn-info">
                        <i class="material-icons">person_add</i>
                        Agregar Nuevo Producto
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white ps-3">Lista De Productos</h5>
                        </div>
                    </div>
                    <div class="card-body">

                        <table id="registro" class="table table-striped shadow p-3 mb-5 bg-body rounded mt-4"
                            width="100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>N°</th>
                                    <th>NOMBRE</th>
                                    <th>COLORES</th>
                                    <th>CATEGORIA</th>
                                    <th>PROVEEDOR</th>
                                    <th>COMPRA</th>
                                    <th>STOCK</th>
                                    <th>IMAGEN</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>


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
@push('styles')
<style>
    @media (max-width: 767px) {
    #registro {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
    #registro th,
    #registro td {
        white-space: nowrap;
    }
}
</style>

@endpush
@push('custom-scripts')
@if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se eliminó la Categoria correctamente',
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
                msg: 'Producto Registrada.'
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
                msg: 'Producto Actualizada.'
            });

        </script>
    @endif
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
    $(document).ready(function() {
        $('#registro').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('productos') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'nombre_p',
                    name: 'nombre_p'
                },
                {
                    data: 'colores'
                },
                {
                    data: 'nombre',
                    name: 'nombre'
                },
                {
                    data: 'nombre_proveedor',
                    name: 'nombre_proveedor'
                },
                {
                    data: 'precio_compra',
                    name: 'precio_compra'
                },
                {
                    data: 'stock',
                    name: 'stock'
                },
                {
                    data: 'img'
                },
                {
                    data: 'action',
                    sWidth: '110px',
                    sortable: false
                },
            ],
            responsive: true,
            "language": {
                "search": "Buscar",
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "paginate": {
                    "previous": "<",
                    "next": ">",
                    "first": "Primero",
                    "last": "Último"
                }

            }
        });
    });
</script>
@endpush
