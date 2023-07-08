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
                        <form action="{{ route('crear_usuarios') }}" method="POST">

                            @csrf

                            <div class="row">

                                {{-- error de email ya existente --}}
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
                                @if ($errors->has('nombre'))
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline is-invalid my-3">
                                            <label class="form-label">Nombres</label>
                                            <input type="text" class="form-control" name="nombre">
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Nombres</label>
                                            <input type="text" class="form-control" name="nombre"
                                                value="{{ old('nombre') }}">
                                        </div>
                                    </div>
                                @endif

                                {{-- apellidos --}}
                                @if ($errors->has('apellidos'))
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline is-invalid my-3">
                                            <label class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" name="apellidos">
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" name="apellidos"
                                                value="{{ old('apellidos') }}">
                                        </div>
                                    </div>
                                @endif

                                {{-- correo --}}
                                @if ($errors->has('email'))
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline is-invalid my-3">
                                            <label class="form-label">@ Correo</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">@ Correo</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>
                                @endif

                                {{-- contraseña --}}
                                @if ($errors->has('password'))
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline is-invalid my-3">
                                            <label class="form-label">* Contraseña *</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">* Contraseña *</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                @endif

                                {{-- rol --}}
                                <div class="col-md-6">
                                    <label>Rol</label>
                                    <div class="input-group input-group-static my-0">
                                        <select class="js-example-basic-single" id="rol" name="rolid"
                                            style="width: 100%" height="100px">
                                            <option value="1">Administrador</option>
                                            <option value="2" selected>Técnico Reparador</option>
                                            <option value="3">Vendedor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <button type="submit" class="btn bg-gradient-info">Guardar nuevo usuario</button>
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
        });
    </script>
@endpush
