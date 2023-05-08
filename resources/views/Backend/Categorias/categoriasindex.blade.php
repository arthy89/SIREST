@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('crear_categorias') }}" class="btn btn-info">
                        <i class="material-icons">person_add</i>
                        Agregar Nueva Categoria
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white ps-3">Lista De categorias</h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="registro" class="table table-striped shadow p-3 mb-5 bg-body rounded mt-4"
                            width="100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>N°</th>
                                    <th>NOMBRE</th>
                                    <th>DESCRIPCIÓN</th>
                                    <th>IMAGEN</th>
                                    <th>ESTADO</th>
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
    </div>
@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#registro').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('categorias') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'nombre',
                        name: 'nombre'
                    },
                    {
                        data: 'descripcion',
                        name: 'descripcion'
                    },
                    {
                        data: 'img'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        sWidth: '110px',
                        sortable: false
                    },
                ],
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
