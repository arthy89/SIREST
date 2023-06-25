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
                                <a href="#"><img src="{{ asset('imgs/ztel1.jpg') }}" alt="" /></a>
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
                                                <a class="mega-menu-item-title"
                                                    href="#">Pantallas</a>
                                            </li>
                                            <li>
                                                <a class="mega-menu-item-title"
                                                    href="#">Cargadores</a>
                                            </li>
                                            <li>
                                                <a class="mega-menu-item-title" href="#">Flexs</a>
                                            </li>
                                            <li>
                                                <a class="mega-menu-item-title"
                                                    href="#">Celulares</a>
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
                                <li class="">
                                    <a href="{{ route('editar_perfil_cliente', Auth::guard('client')->user()->idpersona) }}"
                                        class="btn btn-outline-primary btn-xl mb-0 me-6">{{ Auth::guard('client')->user()->nombres }}
                                        {{-- {{ Auth::guard('client')->user()->apellidos }}--}}</a>
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
                            <a href="index.html">
                                <div class="logo">
                                    <img src="{{ asset('imgs/ztel1.jpg') }}" alt="" />
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
                                <span  id="numerito" class="item-count">3</span>
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
                    <li>
                        <a href="{{ route('home-client') }}"><span>Home</span></a>
                        {{-- <ul class="mobile-sub-menu">
                            <li><a href="index.html">Home 1</a></li>
                            <li><a href="index-2.html">Home 2</a></li>
                            <li><a href="index-3.html">Home 3</a></li>
                            <li><a href="index-4.html">Home 4</a></li>
                        </ul> --}}
                    </li>
                    <li>
                        <a href="{{ route('ecomerce_categorias') }}"><span>CATEGORIA</span></a>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="">Pantallas</a>
                            </li>
                        </ul>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="">Cargadores</a>
                            </li>
                        </ul>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="#">Flexs</a>
                            </li>
                        </ul>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="#">Celulares</a>
                            </li>
                        </ul>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="#">Otros</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('ofertas') }}"><span>Ofertas</span></a>
                        {{-- <ul class="mobile-sub-menu">
                            <li>
                                <a href="#">Blog Grid</a>
                                <ul class="mobile-sub-menu">
                                    <li>
                                        <a href="blog-grid-sidebar-left.html">Blog Grid Sidebar left</a>
                                    </li>
                                    <li>
                                        <a href="blog-grid-sidebar-right.html">Blog Grid Sidebar Right</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="blog-full-width.html">Blog Full Width</a>
                            </li>
                            <li>
                                <a href="#">Blog List</a>
                                <ul class="mobile-sub-menu">
                                    <li>
                                        <a href="blog-list-sidebar-left.html">Blog List Sidebar left</a>
                                    </li>
                                    <li>
                                        <a href="blog-list-sidebar-right.html">Blog List Sidebar Right</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Blog Single</a>
                                <ul class="mobile-sub-menu">
                                    <li>
                                        <a href="blog-single-sidebar-left.html">Blog Single Sidebar left</a>
                                    </li>
                                    <li>
                                        <a href="blog-single-sidebar-right.html">Blog Single Sidebar Right</a>
                                    </li>
                                </ul>
                            </li>
                        </ul> --}}
                    </li>
                    <li>
                        <a href="{{ route('serviciotecnico') }}"><span>Pedir Tecnico</span></a>

                    </li>

                    <li><a href="contactanos">Contacto</a></li>

                </ul>
            </div>
            <!-- End Mobile Menu Nav -->
        </div>
        <!-- End Mobile Menu -->

        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info">
            <div class="logo">
                <a href="index.html"><img src="{{ asset('imgs/ztel1.jpg') }}"
                        alt="" /></a>
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
                <li><a href="wishlist.html">Wishlist</a></li>
                <li><a href="cart.html">Cart</a></li>
                <li><a href="checkout.html">Checkout</a></li>
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
            <a href="index.html"><img src="{{ asset('assetsc/images/logo/logo_white.png') }}" alt="" /></a>
        </div>

        <address class="address">
            <span>Address: Your address goes here.</span>
            <span>Call Us: 0123456789, 0123456789</span>
            <span>Email: demo@example.com</span>
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
            <li><a href="wishlist.html">Wishlist</a></li>
            <li><a href="cart.html">Cart</a></li>
            <li><a href="checkout.html">Checkout</a></li>
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
        <ul class="offcanvas-cart">
            <li class="offcanvas-cart-item-single">
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
            </li>

        </ul>
        <div class="offcanvas-cart-total-price">
            <span class="offcanvas-cart-total-price-text">Subtotal:</span>
            <span class="offcanvas-cart-total-price-value">$170.00</span>
        </div>
        <ul class="offcanvas-cart-action-button">
            <li>
                <a href="{{route('carrito_home')}}" class="btn btn-block btn-pink">Ver Carrito</a>
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
        <h4 class="offcanvas-title">Wishlist</h4>
        <ul class="offcanvas-wishlist">
            <li class="offcanvas-wishlist-item-single">
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
            </li>
        </ul>
        <ul class="offcanvas-wishlist-action-button">
            <li><a href="#" class="btn btn-block btn-pink">View wishlist</a></li>
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
<!-- End Offcanvas Search Bar Section -->
<script>
    console.log("Construiremos el semi carrito de compra");
</script>
