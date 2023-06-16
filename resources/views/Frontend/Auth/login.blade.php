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
        <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                    <h3>login</h3>
                    <form action="#" method="POST">
                        <div class="default-form-box">
                            <label>Username or email <span>*</span></label>
                            <input type="text">
                        </div>
                        <div class="default-form-box">
                            <label>Passwords <span>*</span></label>
                            <input type="password">
                        </div>
                        <div class="login_submit">
                            <button class="btn btn-md btn-black-default-hover mb-4" type="submit">login</button>
                            <label class="checkbox-default mb-4" for="offer">
                                <input type="checkbox" id="offer">
                                <span>Remember me</span>
                            </label>
                            <a href="#">Perdi mi contracenia?</a>

                        </div>
                    </form>
                </div>
            </div>
            <!--login area start-->

            <!--register area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <h3>Registrar</h3>
                    <form action="#">
                        <div class="default-form-box">
                            <label>Nombres  <span>*</span></label>
                            <input type="text">
                        </div>
                        <div class="default-form-box">
                            <label>Apellidos <span>*</span></label>
                            <input type="text">
                        </div>
                        <div class="default-form-box">
                            <label>Identificacion <span>*</span></label>
                            <input type="text">
                        </div>
                        <div class="default-form-box">
                            <label>Telefono <span>*</span></label>
                            <input type="text">
                        </div>
                        <div class="default-form-box">
                            <label>Email <span>*</span></label>
                            <input type="text">
                        </div>
                        <div class="default-form-box">
                            <label>Passwords <span>*</span></label>
                            <input type="password">
                        </div>
                        <div class="default-form-box">
                            <label>Direccion (se usara para delyvery) <span>*</span></label>
                            <input type="text">
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
