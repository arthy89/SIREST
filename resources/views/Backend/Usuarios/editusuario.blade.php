@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Nuevo Usuario</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('editar_usuarios', $usuario) }}" method="POST">

                            @csrf

                            @method('put')

                            <div class="row">

                                @if ($errors->has('email'))
                                    @foreach ($errors->all() as $error)
                                        <div class="row justify-content-center">
                                            <div class="col-md-4 my-0 ">
                                                <div class="alert alert-danger text-white text-center" role="alert">
                                                    <strong>¡Error!</strong> ¡El correo ya existe o es incorrecto!
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                {{-- nombres --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label>Nombres</label>
                                        <input type="text" class="form-control" name="nombre"
                                            value="{{ $usuario->nombre }}">
                                        @if ($errors->has('nombre'))
                                            <p class="text-danger mb-0 text-sm"><em>Este campo es obligatorio</em></p>
                                        @endif
                                    </div>
                                </div>

                                {{-- apellidos --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label>Apellidos</label>
                                        <input type="text" class="form-control" name="apellidos"
                                            value="{{ $usuario->apellidos }}">
                                        @if ($errors->has('apellidos'))
                                            <p class="text-danger mb-0 text-sm"><em>Este campo es obligatorio</em></p>
                                        @endif
                                    </div>
                                </div>

                                {{-- correo --}}
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label>@ Correo</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $usuario->email }}">
                                        @if ($errors->has('email'))
                                            <p class="text-danger mb-0 text-sm"><em>Este campo es obligatorio</em></p>
                                        @endif
                                    </div>
                                </div>

                                {{-- rol --}}
                                <div class="col-md-6">
                                    <label>Rol</label>
                                    <div class="input-group input-group-static my-3">
                                        <select class="js-example-basic-single" id="rol" name="rolid"
                                            style="width: 100%">
                                            <option value="1">Administrador</option>
                                            <option value="2">Técnico Reparador</option>
                                            <option value="3">Vendedor</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- rol --}}
                                <div class="col-md-6">
                                    <label>Estado de la cuenta</label>
                                    <div class="input-group input-group-static my-3">
                                        <select class="js-example-basic-single" id="estado" name="status"
                                            style="width: 100%">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <button type="submit" class="btn bg-gradient-info">Guardar cambios</button>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single').select2();

            // rol
            $('#rol').val("{{ $usuario->rolid }}");
            $('#rol').select2().trigger('change');

            // rol
            $('#estado').val("{{ $usuario->status }}");
            $('#estado').select2().trigger('change');
        });
    </script>
@endpush
