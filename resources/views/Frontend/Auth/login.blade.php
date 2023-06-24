@extends('Frontend.Layout.app')

@section('main-content')
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Login</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop-grid-sidebar-left.html">Cuenta</a></li>
                                <li class="active" aria-current="page">Login</li>
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
                    <h3>login</h3>
                    <form id="form1" action="{{ route('login_cliente') }}" method="POST">
                        @csrf
                        <div class="default-form-box">
                            <label>Username or email <span>*</span></label>
                            <input type="text" name="email">
                        </div>
                        <div class="default-form-box">
                            <label>Passwords <span>*</span></label>
                            <input type="password" name="password">
                        </div>
                        <div class="login_submit">
                            <button class="btn btn-md btn-black-default-hover mb-4" type="submit">login</button>
                            <label class="checkbox-default mb-4" for="offer">
                                <input type="checkbox" id="offer">
                                <span>Recuerdame</span>
                            </label>
                            <a href="#">Perdi mi contracenia?</a>
                        </div>
                        <div>
                            no tiene cuenta, <a href="{{ route('login-crear') }}">cree una aqui</a>
                        </div>
                    </form>
                </div>
            </div>
            <!--login area start-->

            <!--register area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <h3>Registrar</h3>

                    <form id="form2" action="{{ route('crear_ecom_clientes') }}" method="POST" >

                        @csrf
                        <div class="default-form-box">
                            <label>Nombres  <span>*</span></label>
                            <input type="text" name="nombres">
                        </div>
                        <div class="default-form-box">
                            <label>Apellidos <span>*</span></label>
                            <input type="text" name="apellidos">
                        </div>
                        <div class="default-form-box">
                            <label>Identificacion <span>*</span></label>
                            <input type="text" name="identificacion">
                        </div>
                        <div class="default-form-box">
                            <label>Telefono <span>*</span></label>
                            <input type="text" name="telefono">
                        </div>
                        <div class="default-form-box">
                            <label>Email <span>*</span></label>
                            <input type="text" name="email">
                        </div>
                        <div class="default-form-box">
                            <label>Passwords <span>*</span></label>
                            <input type="password" name="password">
                        </div>
                        <div class="default-form-box">
                            <label>Direccion (se usara para delyvery) <span>*</span></label>
                            <input type="text" name="direccionfiscal">
                        </div>


                        <div class="login_submit">
                            <button class="btn btn-md btn-black-default-hover" type="submit">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--register area end-->
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("form1").addEventListener("submit", function(event) {
        // Acciones específicas del primer formulario
        event.preventDefault();
        // Resto del código
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
