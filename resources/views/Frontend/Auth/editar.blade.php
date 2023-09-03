@extends('Frontend.Layout.app')

@section('main-content')
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop-grid-sidebar-left.html">Cuenta</a></li>
                                <li class="active" aria-current="page">Editar</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="customer-login">
    <div class="container">

        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        <div class="row">
            @if (session('status'))
                <div class="row justify-content-center text-center">
                    <div class="col-md-4 my-5 ">
                        <div class="alert alert-success text-white" role="alert">
                            {{ session('status') }}
                        </div>
                    </div>
                </div>
            @endif

            @if (session('inactivo'))
                <div class="row justify-content-center">
                    <div class="col-md-4 my-5 ">
                        <div class="alert alert-danger text-white text-center" role="alert">
                            {{ session('inactivo') }}
                        </div>
                    </div>
                </div>
            @endif

            {{-- @if ($errors->has('email'))
                <div class="row justify-content-center">
                    <div class="col-md-4 my-5 ">
                        <div class="alert alert-primary text-white text-center" role="alert">
                            {{ '¡Error de inicio de sesión, credenciales incorrectas!' }}
                        </div>
                    </div>
                </div>
            @endif --}}
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                    <h3>Editar USUARIO</h3>
                    <form id="form1" action="{{ route('editar_perfil_cliente', Auth::guard('client')->user()->idpersona) }}" method="POST" >


                        @csrf
                        @method('put')
                        <div class="default-form-box">
                            <label>Nombres  <span>*</span></label>
                            <input type="text" name="nombres" value="{{Auth::guard('client')->user()->nombres}}">
                        </div>
                        <div class="default-form-box">
                            <label>Apellidos <span>*</span></label>
                            <input type="text" name="apellidos" value="{{Auth::guard('client')->user()->apellidos}}">
                        </div>
                        <div class="default-form-box">
                            <label>Identificacion <span>*</span></label>
                            <input type="text" name="identificacion" value="{{Auth::guard('client')->user()->identificacion}}">
                        </div>
                        <div class="default-form-box">
                            <label>Telefono <span>*</span></label>
                            <input type="text" name="telefono" value="{{Auth::guard('client')->user()->telefono}}">
                        </div>
                        <div class="default-form-box">
                            <label>Email <span>*</span></label>
                            <input type="text" name="email" value="{{Auth::guard('client')->user()->email}}">
                        </div>
                        <div class="default-form-box">
                            <label>Direccion (se usara para delyvery) <span>*</span></label>
                            <input type="text" name="direccionfiscal" value="{{Auth::guard('client')->user()->direccionfiscal}}">
                        </div>


                        <div class="col-md-6" align="center">
                            <button class="btn btn-md btn-black-default-hover" type="submit">Guardar datos personales</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--login area start-->

            <!--register area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <h3>Editar contraceñas </h3>

                    <form id="form2" action="{{ route('editar_perfil_cliente_pass',Auth::guard('client')->user()->idpersona) }}" method="POST" >

                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="default-form-box">

                                <input type="password" class="form-control" placeholder="contraseña nueva" name="password" id="pass1">
                            </div>
                            <div class="default-form-box">
                                <input type="password" placeholder="Repetir contraseña" name="password" class="form-control" id="pass2">
                            </div>
                            <p class="text-danger py-0 text-sm" id="mensaje_t"></p>
                            <p class="text-danger py-0 text-sm" id="mensaje"></p>
                            <div class="col-md-6">
                                <div class="form-check form-switch d-flex align-items-center mb-3">
                                    <input class="form-check-input" type="checkbox" id="mostrar"
                                        onchange="tick(this)">
                                    <label class="form-check-label mb-0 ms-3" for="mostrar">
                                    </label>
                                </div>
                                Mostrar la contraseña
                            </div>
                            <div class="col-md-6" align="center">
                                <button class="btn btn-md btn-black-default-hover" type="submit">Guardar Contraseña Nueva</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--register area end-->
        </div>
    </div>
</div>
@endsection

@push('costum-js')

<script type="text/javascript">
        function tick(el) {
            $('#pass1').attr('type', el.checked ? 'text' : 'password');
            $('#pass2').attr('type', el.checked ? 'text' : 'password');
        }
</script>
<script>
    $(document).ready(() => {

        var pass1 = $('#pass1');
        var pass2 = $('#pass2');

        function comparar() {
            var contra1 = pass1.val();
            var contra2 = pass2.val();
            var mensaje = $('#mensaje');
            var tam = $('#mensaje_t');
            var boton = $('#boton');

            if (contra1.length < 6 || contra1 == "") {
                mensaje.hide();
                tam.show();
                tam.text("La contraseña debe tener 6 caracteres o más");
            }

            if (contra1.length >= 6) {
                tam.hide();
            }

            if (contra1 != contra2) {
                boton.addClass('disabled');
                mensaje.removeClass('text-success');
                mensaje.addClass('text-danger');
                mensaje.show();
                mensaje.text("Las contraseñas no son iguales");
            }

            if (contra1 == contra2 && contra1.length >= 6 && contra2.length >= 6) {
                boton.removeClass('disabled');
                mensaje.removeClass('text-danger');
                mensaje.addClass('text-success');
                mensaje.show();
                mensaje.text("Las contraseñas son iguales");
            }
        }

        pass1.keyup(function() {
            comparar();
        });

        pass2.keyup(function() {
            comparar();
        });
    });
</script>


<script>
    @if ($errors->has('email_cliente'))
        <script>
            Lobibox.notify('error', {
                width: 600,
                delay: 5500,
                position: 'top right',
                title: 'Revise los datos  !!',
                msg: 'El correo electronico se encuentra Registrado'
            });
        </script>
    @endif
    @if ($errors->has('identificacion_cliente'))
            <script>
                Lobibox.notify('error', {
                    width: 600,
                    delay: 5500,
                    position: 'top right',
                    title: 'Revise los datos  !!',
                    msg: 'Existe un Usuario creado con ese RUT'
                });
            </script>
    @endif
        $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
</script>

<script>
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
</script>

@endpush
