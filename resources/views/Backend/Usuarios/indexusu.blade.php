@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            @if (session('status'))
                <div class="row justify-content-center">
                    <div class="col-md-4 my-5 ">
                        <div class="alert alert-success text-white text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('crear_usuarios') }}" class="btn btn-info">
                        <i class="material-icons">person_add</i>
                        Agregar Nuevo Usuario
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white ps-3">Lista Usuarios y Técnicos Reparadores</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Nombres</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">
                                            Cargo</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Estado</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->idusuarios == Auth::user()->idusuarios)
                                            @continue
                                        @else
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-md">{{ $usuario->nombre }}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{ $usuario->email }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{ $usuario->nombrerol }}</p>
                                                    <p class="text-xs text-secondary mb-0">SIREST</p>
                                                </td>
                                                <td class="align-middle text-center text-md">
                                                    @if ($usuario->status == 1)
                                                        <span class="badge bg-gradient-success">Activo</span>
                                                    @else
                                                        <span class="badge bg-gradient-danger">Inactivo</span>
                                                    @endif

                                                </td>
                                                <td class="align-middle text-center">
                                                    <form action="{{ route('eliminar_usuarios', $usuario->idusuarios) }}"
                                                        method="POST" class="formulario">

                                                        @csrf

                                                        @method('delete')

                                                        <a href="{{ route('editar_usuarios', $usuario->idusuarios) }}"
                                                            class="btn bg-gradient-info"><i class="material-icons">edit</i>
                                                            Editar</a>
                                                        <a href="{{ route('editar_usuarios_pass', $usuario->idusuarios) }}"
                                                            class="btn bg-gradient-warning"><i
                                                                class="material-icons">key</i>
                                                            Pass</a>
                                                        <button type="submit" class="btn bg-gradient-danger formulario"><i
                                                                class="material-icons">delete</i>
                                                            Eliminar</button>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se eliminó al usuario correctamente',
                'success'
            )
        </script>
    @endif

    <script>
        // $('.formulario').submit(function(e){
        $(document).on('submit', '.formulario', function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro de eliminar al Usuario?',
                text: "Se eliminará al usuario",
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
@endpush
