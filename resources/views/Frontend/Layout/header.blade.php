<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<header class="header-section d-none d-xl-block">
    <div class="header-wrapper">
        <div class="header-bottom header-bottom-color--black section-fluid sticky-header sticky-color--black">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <!-- Start Header Logo -->
                        <div class="header-logo">
                            <div class="logo">
                                <a href="#"><img src="{{ asset('imgs/Recurso2.png') }}" alt="" /></a>
                            </div>
                        </div>
                        <!-- End Header Logo -->

                        <!-- Start Header Main Menu -->
                        <div class="main-menu menu-color--white menu-hover-color--pink">
                            <nav>
                                <ul>
                                    <li class="has-dropdown">
                                        <a class="active main-menu-link" href="{{ route('home-client') }}">Home
                                            {{-- <i class="fa fa-angle-down"></i> --}}
                                        </a>
                                        <!-- Sub Menu -->
                                        {{-- <ul class="sub-menu">
                                            <li><a href="index.html">Home 1</a></li>
                                            <li><a href="index-2.html">Home 2</a></li>
                                            <li><a href="index-3.html">Home 3</a></li>
                                            <li><a href="index-4.html">Home 4</a></li>
                                        </ul> --}}
                                    </li>

                                    <li class="has-dropdown">
                                        <a href="{{ route('ecomerce_categorias') }}">Categorias <i
                                                class="fa fa-angle-down"></i></a>
                                        <!-- Sub Menu -->
                                        <ul class="sub-menu">
                                            <li>
                                                <a class="mega-menu-item-title" href="#">Pantallas</a>
                                            </li>
                                            <li>
                                                <a class="mega-menu-item-title" href="#">Cargadores</a>
                                            </li>
                                            <li>
                                                <a class="mega-menu-item-title" href="#">Flexs</a>
                                            </li>
                                            <li>
                                                <a class="mega-menu-item-title" href="#">Celulares</a>
                                            </li>
                                            <li>
                                                <a href="#" class="mega-menu-item-title">Otros</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="{{ route('ofertas') }}">Ofertas <i class="fa fa-angle-down"></i></a>
                                        <!-- Sub Menu -->
                                        <ul class="sub-menu">
                                            <li><a href="faq.html">Reparaciones</a></li>
                                            <li>
                                                <a href="privacy-policy.html">Cambio de pantalla</a>
                                            </li>
                                            <li><a href="404.html">404 Page</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('serviciotecnico') }}">Pedir Tecnico</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contactanos') }}">Contacto</a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                        <!-- End Header Main Menu Start -->

                        <!-- Start Header Action Link -->
                        <ul class="header-action-link action-color--white action-hover-color--pink">
                            @auth('client')
                                <li>
                                    <a href="{{ route('list_pedidos_servicio') }}">
                                        <i class="icon-grid"></i>
                                    </a>
                                </li>
                            @endauth
                            <li>
                                <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                    <i class="icon-heart"></i>
                                    <span class="item-count">3</span>
                                </a>
                            </li>

                            <li>
                                <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                    <i class="icon-bag"></i>
                                    <span id="numeritomovil" class="item-count">0</span>
                                </a>
                            </li>
                            {{-- Habilitar cuando se incorpore la busqueda --}}
                            {{-- <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li> --}}

                            {{-- @auth
                                <li class="nav-item d-flex align-items-center">
                                    <a href="" class="nav-link text-body font-weight-bold px-0">

                                        <span class="d-sm-inline d-none">{{ Auth::user()->nombre }}
                                            {{ Auth::user()->apellidos }}</span>
                                    </a>
                                </li>
                                <a href="{{ route('logout-client') }}">
                                    <i class="fa-light fa-right-from-bracket">Salir</i>
                                </a>
                            @endauth

                            <!-- Mostrar contenido solo para usuarios no autenticados -->
                            @guest
                            <li class="nav-item d-flex align-items-center">
                                <a href="{{ route('login_cliente') }}" class="nav-link text-body font-weight-bold px-0">
                                    <i class="fa fa-user me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Iniciar Sesión</span>
                                </a>
                            </li>
                            @endguest --}}

                            @guest('client')
                                @if (Route::has('login_cliente'))
                                    <li class="nav-item d-flex align-items-center">
                                        <a href="{{ route('login_cliente') }}"
                                            class="nav-link text-body font-weight-bold px-0">
                                            <i class="fa fa-user me-sm-1"></i>
                                            <span class="d-sm-inline d-none">Iniciar Sesión</span>
                                        </a>
                                    </li>
                                @endif
                            @else
                                <li class="list-unstyled rounded-circle">
                                    <a href="{{ route('editar_perfil_cliente', Auth::guard('client')->user()->idpersona) }}"
                                        class="btn btn-outline-primary btn-xl mb-0 me-6">
                                        @php
                                            $name = Auth::guard('client')->user()->nombres;
                                            $name2 = Auth::guard('client')->user()->apellidos;
                                            $firstLetter = substr($name, 0, 1);
                                            $lastname = substr($name2, 0, 1);
                                        @endphp
                                        {{ $firstLetter }}
                                        {{-- {{ Auth::guard('client')->user()->nombres }} --}}
                                        {{-- {{ Auth::guard('client')->user()->apellidos }} --}}</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout-client') }}" method="POST">
                                        @csrf
                                        <button class="text-white" type="submit"><i class="icon-logout"></i></button>
                                    </form>
                                    {{-- <a href="{{ route('logout-client') }}">
                                        <i class="bi bi-box-arrow-right">SR</i>
                                    </a> --}}
                                </li>
                            @endguest
                            <li>
                                <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Header Action Link -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Start Header Area -->

<!-- Start Mobile Header -->
<div class="mobile-header mobile-header-bg-color--black section-fluid d-lg-block d-xl-none">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <!-- Start Mobile Left Side -->
                <div class="mobile-header-left">
                    <ul class="mobile-menu-logo">
                        <li>
                            <a href="{{ route('home-client') }}">
                                <div class="logo">
                                    <img src="{{ asset('imgs/Recurso2.png') }}" alt="" />
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Mobile Left Side -->

                <!-- Start Mobile Right Side -->
                <div class="mobile-right-side">
                    <ul class="header-action-link action-color--white action-hover-color--pink">
                        <li>
                            <a href="#search">
                                <i class="icon-magnifier"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                <i class="icon-heart"></i>
                                <span class="item-count">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                <i class="icon-bag"></i>
                                <span id="numerito" class="item-count">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#mobile-menu-offcanvas"
                                class="offcanvas-toggle offside-menu offside-menu-color--black">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Mobile Right Side -->
            </div>
        </div>
    </div>
</div>
<!-- End Mobile Header -->

<!--  Start Offcanvas Mobile Menu Section -->
<div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close">
            <i class="ion-android-close"></i>
        </button>
    </div>
    <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <div class="offcanvas-mobile-menu-wrapper">
        <!-- Start Mobile Menu  -->
        <div class="mobile-menu-bottom">
            <!-- Start Mobile Menu Nav -->
            <div class="offcanvas-menu">
                <ul>
                    <li><a href="{{ route('home-client') }}"><span>Home</span></a></li>
            <li><a href="{{ route('ecomerce_categorias') }}"><span>CATEGORIA</span></a></li>
            <li>
                <a href="{{ route('ofertas') }}"><span>Ofertas</span></a>
            </li>
            <li>
                <a href="{{ route('serviciotecnico') }}"><span>Pedir Tecnico</span></a>

            </li>

                </ul>
            </div>
            <!-- End Mobile Menu Nav -->
        </div>
        <!-- End Mobile Menu -->

        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info">
            <div class="logo">
                <a href="{{ route('home-client') }}"><img src="{{ asset('imgs/Recurso2.png') }}" alt="" /></a>
            </div>

            <address class="address">
                <span>Address: Develop Sirest.</span>
                <span>+51985 107 359</span>
                <span>Email: ioelgomez2019@gmai.com</span>
            </address>

            <ul class="social-link">
                <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                </li>
            </ul>

            <ul class="user-link">
                <li><a href="{{ route('home-client') }}"><span>Home</span></a></li>
            <li><a href="{{ route('ecomerce_categorias') }}"><span>CATEGORIA</span></a></li>
            <li>
                <a href="{{ route('ofertas') }}"><span>Ofertas</span></a>
            </li>
            <li>
                <a href="{{ route('serviciotecnico') }}"><span>Pedir Tecnico</span></a>

            </li>
            </ul>
        </div>
        <!-- End Mobile contact Info -->
    </div>
    <!-- End Offcanvas Mobile Menu Wrapper -->
</div>
<!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

<!-- Start Offcanvas Mobile Menu Section -->
<div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close">
            <i class="ion-android-close"></i>
        </button>
    </div>
    <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <!-- Start Mobile contact Info -->
    <div class="mobile-contact-info">
        <div class="logo">
            <a href="{{ route('home-client') }}"><img src="{{ asset('imgs/Recurso2.png') }}" alt="" /></a>
        </div>

        <address class="address">
            <span>direccion: Nuestra direccion.</span>
            <span>Call Us: +56 9 4139 9644</span>
            <span>Email: ztelchile@gmail.com</span>
        </address>

        <ul class="social-link">
            <li>
                <a href="#"><i class="fa fa-facebook"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </li>
        </ul>

        <ul class="user-link">
            <li><a href="{{ route('home-client') }}"><span>Home</span></a></li>
            <li><a href="{{ route('ecomerce_categorias') }}"><span>CATEGORIA</span></a></li>
            <li>
                <a href="{{ route('ofertas') }}"><span>Ofertas</span></a>
            </li>
            <li>
                <a href="{{ route('serviciotecnico') }}"><span>Pedir Tecnico</span></a>

            </li>
        </ul>
    </div>
    <!-- End Mobile contact Info -->
</div>
<!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

<!-- Start Offcanvas Addcart Section -->
<div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close">
            <i class="ion-android-close"></i>
        </button>
    </div>
    <!-- End Offcanvas Header -->

    <!-- Start  Offcanvas Addcart Wrapper -->
    <div class="offcanvas-add-cart-wrapper">
        <h4 class="offcanvas-title">Carrrito de Compra</h4>
        <ul class="scrollable-div  offcanvas-cart" id="ul-carrito">
            {{-- <li class="offcanvas-cart-item-single">
                <div class="offcanvas-cart-item-block">
                    <a href="#" class="offcanvas-cart-item-image-link">
                        <img src="{{ asset('assetsc/images/product/default/home-3/default-1.jpg') }}" alt=""
                            class="offcanvas-cart-image" />
                    </a>
                    <div class="offcanvas-cart-item-content">
                        <a href="#" class="offcanvas-cart-item-link">Car Wheel</a>
                        <div class="offcanvas-cart-item-details">
                            <span class="offcanvas-cart-item-details-quantity">1 x </span>
                            <span class="offcanvas-cart-item-details-price">$49.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-cart-item-delete text-right">
                    <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li> --}}


        </ul>
        <div class="offcanvas-cart-total-price">
            <span class="offcanvas-cart-total-price-text">Subtotal:</span>
            <span class="offcanvas-cart-total-price-value">
                <p class="subtotallado" id="subtotallado">$</p>
            </span>
        </div>
        <ul class="offcanvas-cart-action-button">
            <li>
                <a href="{{ route('carrito_home') }}" class="btn btn-block btn-pink">Ver Carrito</a>
            </li>
            <li>
                <a href="compare.html" class="btn btn-block btn-pink mt-5">Pasar Por Caja</a>
            </li>
        </ul>
    </div>
    <!-- End  Offcanvas Addcart Wrapper -->
</div>
<!-- End  Offcanvas Addcart Section -->

<!-- Start Offcanvas Mobile Menu Section -->
<div id="offcanvas-wishlish" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close">
            <i class="ion-android-close"></i>
        </button>
    </div>
    <!-- ENd Offcanvas Header -->

    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <div class="offcanvas-wishlist-wrapper">
        <h4 class="offcanvas-title">Favoritos</h4>
        <ul class="offcanvas-wishlist">
            {{-- <li class="offcanvas-wishlist-item-single">
                <div class="offcanvas-wishlist-item-block">
                    <a href="#" class="offcanvas-wishlist-item-image-link">
                        <img src="{{ asset('assetsc/images/product/default/home-3/default-1.jpg') }}" alt=""
                            class="offcanvas-wishlist-image" />
                    </a>
                    <div class="offcanvas-wishlist-item-content">
                        <a href="#" class="offcanvas-wishlist-item-link">Car Wheel</a>
                        <div class="offcanvas-wishlist-item-details">
                            <span class="offcanvas-wishlist-item-details-quantity">1 x
                            </span>
                            <span class="offcanvas-wishlist-item-details-price">$49.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-wishlist-item-delete text-right">
                    <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
            <li class="offcanvas-wishlist-item-single">
                <div class="offcanvas-wishlist-item-block">
                    <a href="#" class="offcanvas-wishlist-item-image-link">
                        <img src="{{ asset('assetsc/images/product/default/home-2/default-1.jpg') }}" alt=""
                            class="offcanvas-wishlist-image" />
                    </a>
                    <div class="offcanvas-wishlist-item-content">
                        <a href="#" class="offcanvas-wishlist-item-link">Car Vails</a>
                        <div class="offcanvas-wishlist-item-details">
                            <span class="offcanvas-wishlist-item-details-quantity">3 x
                            </span>
                            <span class="offcanvas-wishlist-item-details-price">$500.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-wishlist-item-delete text-right">
                    <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
            <li class="offcanvas-wishlist-item-single">
                <div class="offcanvas-wishlist-item-block">
                    <a href="#" class="offcanvas-wishlist-item-image-link">
                        <img src="{{ asset('assetsc/images/product/default/home-3/default-1.jpg') }}" alt=""
                            class="offcanvas-wishlist-image" />
                    </a>
                    <div class="offcanvas-wishlist-item-content">
                        <a href="#" class="offcanvas-wishlist-item-link">Shock Absorber</a>
                        <div class="offcanvas-wishlist-item-details">
                            <span class="offcanvas-wishlist-item-details-quantity">1 x
                            </span>
                            <span class="offcanvas-wishlist-item-details-price">$350.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-wishlist-item-delete text-right">
                    <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li> --}}
        </ul>
        <ul class="offcanvas-wishlist-action-button">
            <li><a href="#" class="btn btn-block btn-pink">ver Favoritos</a></li>
        </ul>
    </div>
    <!-- End Offcanvas Mobile Menu Wrapper -->
</div>
<!-- End Offcanvas Mobile Menu Section -->

<!-- Start Offcanvas Search Bar Section -->
<div id="search" class="search-modal">
    <button type="button" class="close">×</button>
    <form>
        <input type="search" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-lg btn-pink">Search</button>
    </form>
</div>
<!-- Botón flotante de WhatsApp https://api.whatsapp.com/send?phone=56941399644&text=Hola%20Te%escribo%desde%su%20paginaF-->

<a class="whatsapp-float" href="https://api.whatsapp.com/send?phone=56941399644&text=Hola,%20necesito%20ayuda%20Ztelchile.cl" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg></a>
<style>
/* Estilo del botón flotante */
.whatsapp-float {
            position: fixed;
            bottom: 80px;
            right: 20px;
            background-color: green;
            color: white;
            padding: 20px;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            font-size: 25px;
            z-index: 999;
        }
</style>
<!-- End Offcanvas Search Bar Section -->
<style>
    .scrollable-div {
        width: 100%;
        /* Ancho del div al 100% del contenedor padre */
        height: 200px;
        /* Altura fija del div */
        overflow: auto;
        /* Habilita la barra de desplazamiento */
    }

    /* Media query para ajustar la altura del div en pantallas más pequeñas */
    @media (max-width: 768px) {
        .scrollable-div {
            height: 150px;
        }
    }
</style>
<script>
    console.log("Construiremos el semi carrito de compra");
    //var contenido_carro = document.getElementById('con-contenido-carrito');
    const contenedorTotallado = document.querySelector("#subtotallado");

    //carrito localstorage
    let ProductosEnCarritolado = localStorage.getItem("productos-en-carrito");
    ProductosEnCarritolado = JSON.parse(ProductosEnCarritolado)



    //console.log(ProductosEnCarrito);
    cargarProductoCarritolado();
    //console.log(ProductosEnCarrito.length);
    function cargarProductoCarritolado() {
        let preciototalisimo = 0;
        let precioaux = 0;
        ProductosEnCarritolado.forEach(producto => {
            //console.log(${producto.imagen});
            // Obtener una referencia al <tbody> por su ID
            var ulcarrito = document.getElementById('ul-carrito');
            //vamos a controlar en caso de ofertas
            let preciopantalla = 0;
            if (producto.nombre_promocion) {
                //console.log("contiene promocion final");
                if (producto.tipo_descuento == 1) {
                    preciopantalla = producto.precio_venta_public * producto.cantidad_descuento / 100;

                } else {
                    preciopantalla = producto.precio_venta_public - producto.cantidad_descuento;
                    //console.log("descuenot por cantidad");
                }
            } else {
                preciopantalla = producto.precio_venta_public;
            }
            //console.log(preciopantalla);
            // Crear un nuevo elemento <tr>
            var li = document.createElement('li');
            li.innerHTML = `<li class="offcanvas-cart-item-single">
                <div class="offcanvas-cart-item-block">
                    <a href="#" class="offcanvas-cart-item-image-link">
                        <img src="${producto.imagen}" alt=""
                            class="offcanvas-cart-image" />
                    </a>
                    <div class="offcanvas-cart-item-content">
                        <a href="#" class="offcanvas-cart-item-link">${producto.nombre_p}</a>
                        <div class="offcanvas-cart-item-details">
                            <span class="offcanvas-cart-item-details-quantity">${producto.cantidad} x </span>
                            <span class="offcanvas-cart-item-details-price">$${preciopantalla}</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-cart-item-delete text-right">
                    <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li> `;
            //aqui calculamos el precio total de cada produco y lo acumuladmos en todo los productos
            precioaux = precioaux + preciopantalla * producto.cantidad;
            // agregar precio total


            ulcarrito.appendChild(li);
        })
        subtotallado.innerText = `$${precioaux}`;
        //console.log(precioaux);

    }
</script>
