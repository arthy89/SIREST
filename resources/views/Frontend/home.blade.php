{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Ecommerce</title>
</head>

<body>
    <p>Esta es la vista HOME de Ecommerce</p>

    <p>El usuario es: <span> {{ Auth::guard('client')->user()->nombres }} {{ Auth::guard('client')->user()->apellidos }}
        </span></p>
</body>

</html> --}}


@extends('Frontend.Layout.app')

@section('main-content')
    <div class="offcanvas-overlay"></div>
    @if (session('status'))
        <div class="row justify-content-center text-center">
            <div class="col-md-4 my-5 ">
                <div class="alert alert-success text-white" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        </div>
    @endif
    <!-- Start Hero Slider Section-->
    <div class="hero-slider-section">
        <!-- Slider main container -->
        <div class="hero-slider-active swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Start Hero Single Slider Item -->
                @foreach ($sliders as $sliders)
                    <div class="hero-single-slider-item swiper-slide">
                        <!-- Hero Slider Image -->
                        <div class="hero-slider-bg">
                            <img src="{{ asset($sliders->imagen) }}" alt="" />
                        </div>
                        <!-- Hero Slider Content -->
                        <div class="hero-slider-wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="hero-slider-content">
                                            {!! html_entity_decode($sliders->htmlcode) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Hero Single Slider Item -->
                    <!-- Start Hero Single Slider Item -->
                @endforeach
                <!-- End Hero Single Slider Item -->
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination active-color-pink"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev d-none d-lg-block"></div>
            <div class="swiper-button-next d-none d-lg-block"></div>
        </div>
    </div>


    <!-- Start Banner Section -->
    {{-- <div class="banner-section section-top-gap-100">

        <div class="banner-wrapper clearfix">
            @foreach ($categorias as $categoria)
            <!-- Start Banner Single Item -->
            <a href="product-details-default.html">
                <div class="banner-single-item banner-style-7 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="0">
                    <div class="image">
                        <img class="img-fluid" src="{{$categoria->ruta}}"
                            alt="" />
                    </div>
                </div>
            </a>
            @endforeach
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->

            <!-- End Banner Single Item -->
        </div>
    </div> --}}
    <!-- End Banner Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">RECIÉN LLEGADOS</h3>
                                <p>Reserva ahora para recibir ofertas y regalos exclusivos
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-2rows default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-2row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    {{-- @foreach ($productosrecien as $producto)

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $producto->idproducto }}">
                                        Ver detalles de {{ $producto['nombre'] }}
                                    </button>


                                    @endforeach --}}
                                    @foreach ($productosrecien as $prorecien)
                                        <!-- Start Product Default Single Item -->
                                        <div class="product-default-single-item product-color--pink swiper-slide">
                                            <div class="image-box">
                                                <a href="{{ route('detalles_producto', $prorecien->nombre_p) }}"
                                                    class="image-link">
                                                    <img src="{{ $prorecien->imagen }}" alt="" />
                                                    <img src="{{ $prorecien->imagen }}" alt="" />
                                                </a>
                                                <div class="tag">
                                                    <span>oferta</span>
                                                </div>
                                                <div class="action-link">
                                                    <div class="action-link-left">
                                                        {{-- {{$prorecien->idproducto}},{{$prorecien->precio_venta_public}} --}}
                                                        <a onclick="agregarAlCarrito(event,{{$prorecien}})" id="{{$prorecien->idproducto}}" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modalAddcart{{ $prorecien->idproducto }}">Agregar Carrito</a>
                                                            {{-- data-bs-target="#modalAddcart">Agregar Carrito</a> --}}
                                                    </div>
                                                    <div class="action-link-right">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modal{{ $prorecien->idproducto }}"><i
                                                                class="icon-magnifier"></i></a>
                                                        <!-- Star Modal Quickview cart -->

                                                        <!-- End Modal Quickview cart -->
                                                        <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                        <a href="compare.html"><i class="icon-shuffle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="content-left">
                                                    <h6 class="title">
                                                        <a
                                                            href="product-details-default.html">{{ $prorecien->nombre_p }}</a>
                                                    </h6>
                                                    <ul class="review-star">
                                                        <li class="fill">
                                                            <i class="ion-android-star"></i>
                                                        </li>
                                                        <li class="fill">
                                                            <i class="ion-android-star"></i>
                                                        </li>
                                                        <li class="fill">
                                                            <i class="ion-android-star"></i>
                                                        </li>
                                                        <li class="fill">
                                                            <i class="ion-android-star"></i>
                                                        </li>
                                                        <li class="empty">
                                                            <i class="ion-android-star"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="content-right">$
                                                    <span class="price">{{ $prorecien->precio_venta_public }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($productosrecien as $producto)
    {{-- modal ver mas --}}
        <div class="modal fade" id="modal{{ $producto->idproducto }}" tabindex="-1" role="dialog"
            aria-labelledby="modal{{ $producto->idproducto }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{-- Hola{{ $producto->idproducto }} --}}
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col text-right">
                                    <button type="button" class="close modal-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-details-gallery-area mb-7">
                                        <!-- Start Large Image -->
                                        <div class="product-large-image  swiper-container">
                                            <div class="swiper-wrapper">
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="{{ $producto->imagen}}"
                                                        alt="" />
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="{{ $producto->imagen}}"
                                                        alt="" />
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="{{ $producto->imagen}}"
                                                        alt="" />
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="{{ $producto->imagen}}"
                                                        alt="" />
                                                </div>

                                            </div>
                                        </div>
                                        <!-- End Large Image -->
                                        <!-- Start Thumbnail Image -->

                                        <!-- End Thumbnail Image -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="modal-product-details-content-area">
                                        <!-- Start  Product Details Text Area-->
                                        <div class="product-details-text">
                                            <h4 class="title">{{$producto->nombre_p}}</h4>
                                            <div class="price">$ {{$producto->precio_venta_public}}</div>
                                        </div>
                                        <!-- End  Product Details Text Area-->
                                        <!-- Start Product Variable Area -->
                                        <div class="product-details-variable">
                                            <!-- Product Variable Single Item -->
                                            <div class="variable-single-item">
                                                <span>Colores disponibles</span>
                                                <div class="product-variable-color">
                                                    <label for="modal-product-color-red">
                                                        <input name="modal-product-color" id="modal-product-color-red"
                                                            class="color-select" type="radio" checked />
                                                        <span class="product-color-red"></span>
                                                    </label>
                                                    <label for="modal-product-color-tomato">
                                                        <input name="modal-product-color" id="modal-product-color-tomato"
                                                            class="color-select" type="radio" />
                                                        <span class="product-color-tomato"></span>
                                                    </label>
                                                    <label for="modal-product-color-green">
                                                        <input name="modal-product-color" id="modal-product-color-green"
                                                            class="color-select" type="radio" />
                                                        <span class="product-color-green"></span>
                                                    </label>

                                                </div>
                                            </div>
                                            <!-- Product Variable Single Item -->
                                            <div class="d-flex align-items-center flex-wrap">
                                                <div class="variable-single-item">
                                                    <span>Stock</span>
                                                    <div class="product-variable-quantity">
                                                        <input min="1" max="100" value="1"
                                                            type="number" />
                                                    </div>
                                                </div>

                                                <div class="product-add-to-cart-btn">
                                                    <a onclick="agregarAlCarrito(event,{{$producto}})" id="{{$producto->idproducto}}" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modalAddcart{{ $producto->idproducto }}">Agregar Carrito</a>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product Variable Area -->
                                        <div class="modal-product-about-text">
                                            <p>
                                                {{$producto->descripcion}}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- modal-dialog modal-dialog-centered modal-xl --}}
        <div class="modal fade"  id="modalAddcart{{ $producto->idproducto }}" tabindex="-1" role="dialog"
            aria-labelledby="modal{{ $producto->idproducto }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col text-right">
                                    <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="modal-add-cart-product-img">
                                                <img class="img-fluid" src="{{$producto->imagen}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="modal-add-cart-info">
                                                <i class="fa fa-check-square"></i>Agregado satisfactoriamente al carrito!
                                            </div>
                                            <div class="modal-add-cart-product-cart-buttons">
                                                <a href="{{route('carrito_home')}}">Ver Carrito</a>
                                                <a href="checkout.html">Pasar Caja</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 modal-border">
                                    <ul class="modal-add-cart-product-shipping-info">
                                        <li>
                                            <strong><i class="icon-shopping-cart"></i> En su carrito se agrega el articulo.</strong>
                                        </li>
                                        <li><strong>TOTAL PRECIO: </strong> <span>${{$producto->precio_venta_public}}</span></li>
                                        <li class="modal-continue-button">
                                            <a href="#" data-bs-dismiss="modal">CONTINUE SHOPPING</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="modal fade" id="modalAddcart{{ $producto->idproducto }}" tabindex="-1" role="dialog"
            aria-labelledby="modal{{ $producto->idproducto }}Label" aria-hidden="true">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right">
                                <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="modal-add-cart-product-img">
                                            <img class="img-fluid" src="{{$producto->imagen}}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="modal-add-cart-info">
                                            <i class="fa fa-check-square"></i>Added to cart
                                            successfully!
                                        </div>
                                        <div class="modal-add-cart-product-cart-buttons">
                                            <a href="cart.html">View Cart</a>
                                            <a href="checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 modal-border">
                                <ul class="modal-add-cart-product-shipping-info">
                                    <li>
                                        <strong><i class="icon-shopping-cart"></i> There Are 5 Items In
                                            Your Cart.</strong>
                                    </li>
                                    <li><strong>TOTAL PRICE: </strong> <span>$187.00</span></li>
                                    <li class="modal-continue-button">
                                        <a href="#" data-bs-dismiss="modal">CONTINUE SHOPPING</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    @endforeach
    {{-- @include('Frontend.Modal.modalmas') --}}
    {{--
    <div class="modal fade" id="modalmas14" tabindex="-1" aria-labelledby="myModal1Label" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right">
                                <button type="button" class="close modal-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-details-gallery-area mb-7">
                                    <!-- Start Large Image -->
                                    <div class="product-large-image modal-product-image-large swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="{{ asset('assetsc/images/product/default/home-3/default-1.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="{{ asset('assetsc/images/product/default/home-3/default-2.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="{{ asset('assetsc/images/product/default/home-3/default-3.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="{{ asset('assetsc/images/product/default/home-3/default-4.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="{{ asset('assetsc/images/product/default/home-3/default-5.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="{{ asset('assetsc/images/product/default/home-3/default-6.jpg') }}"
                                                    alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Large Image -->
                                    <!-- Start Thumbnail Image -->
                                    <div
                                        class="product-image-thumb modal-product-image-thumb swiper-container pos-relative mt-5">
                                        <div class="swiper-wrapper">
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="{{ asset('assetsc/images/product/default/home-3/default-1.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="{{ asset('assetsc/images/product/default/home-3/default-2.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="{{ asset('assetsc/images/product/default/home-3/default-3.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="{{ asset('assetsc/images/product/default/home-3/default-4.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="{{ asset('assetsc/images/product/default/home-3/default-5.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="{{ asset('assetsc/images/product/default/home-3/default-6.jpg') }}"
                                                    alt="" />
                                            </div>
                                        </div>
                                        <!-- Add Arrows -->
                                        <div class="gallery-thumb-arrow swiper-button-next"></div>
                                        <div class="gallery-thumb-arrow swiper-button-prev"></div>
                                    </div>
                                    <!-- End Thumbnail Image -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-details-content-area">
                                    <!-- Start  Product Details Text Area-->
                                    <div class="product-details-text">
                                        <h4 class="title">Nonstick Dishwasher PFOA</h4>
                                        <div class="price"><del>$70.00</del>$80.00</div>
                                    </div>
                                    <!-- End  Product Details Text Area-->
                                    <!-- Start Product Variable Area -->
                                    <div class="product-details-variable">
                                        <!-- Product Variable Single Item -->
                                        <div class="variable-single-item">
                                            <span>Color</span>
                                            <div class="product-variable-color">
                                                <label for="modal-product-color-red">
                                                    <input name="modal-product-color" id="modal-product-color-red"
                                                        class="color-select" type="radio" checked />
                                                    <span class="product-color-red"></span>
                                                </label>
                                                <label for="modal-product-color-tomato">
                                                    <input name="modal-product-color" id="modal-product-color-tomato"
                                                        class="color-select" type="radio" />
                                                    <span class="product-color-tomato"></span>
                                                </label>
                                                <label for="modal-product-color-green">
                                                    <input name="modal-product-color" id="modal-product-color-green"
                                                        class="color-select" type="radio" />
                                                    <span class="product-color-green"></span>
                                                </label>
                                                <label for="modal-product-color-light-green">
                                                    <input name="modal-product-color" id="modal-product-color-light-green"
                                                        class="color-select" type="radio" />
                                                    <span class="product-color-light-green"></span>
                                                </label>
                                                <label for="modal-product-color-blue">
                                                    <input name="modal-product-color" id="modal-product-color-blue"
                                                        class="color-select" type="radio" />
                                                    <span class="product-color-blue"></span>
                                                </label>
                                                <label for="modal-product-color-light-blue">
                                                    <input name="modal-product-color" id="modal-product-color-light-blue"
                                                        class="color-select" type="radio" />
                                                    <span class="product-color-light-blue"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <!-- Product Variable Single Item -->
                                        <div class="d-flex align-items-center flex-wrap">
                                            <div class="variable-single-item">
                                                <span>Quantity</span>
                                                <div class="product-variable-quantity">
                                                    <input min="1" max="100" value="1"
                                                        type="number" />
                                                </div>
                                            </div>

                                            <div class="product-add-to-cart-btn">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#modalAddcart">Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product Variable Area -->
                                    <div class="modal-product-about-text">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Mollitia iste laborum ad impedit pariatur esse
                                            optio tempora sint ullam autem deleniti nam in quos qui
                                            nemo ipsum numquam, reiciendis maiores quidem aperiam,
                                            rerum vel recusandae
                                        </p>
                                    </div>
                                    <!-- Start  Product Details Social Area-->
                                    <div class="modal-product-details-social">
                                        <span class="title">SHARE THIS PRODUCT</span>
                                        <ul>
                                            <li>
                                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="google-plus"><i
                                                        class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End  Product Details Social Area-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalmas15" tabindex="-1" aria-labelledby="myModal2Label" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right">
                                <button type="button" class="close modal-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-details-gallery-area mb-7">
                                    <!-- Start Large Image -->
                                    <div class="product-large-image modal-product-image-large swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="{{ asset('assetsc/images/product/default/home-3/default-1.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="{{ asset('assetsc/images/product/default/home-3/default-2.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="{{ asset('assetsc/images/product/default/home-3/default-3.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="{{ asset('assetsc/images/product/default/home-3/default-4.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="{{ asset('assetsc/images/product/default/home-3/default-5.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-large-image swiper-slide img-responsive">
                                                <img src="{{ asset('assetsc/images/product/default/home-3/default-6.jpg') }}"
                                                    alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Large Image -->
                                    <!-- Start Thumbnail Image -->
                                    <div
                                        class="product-image-thumb modal-product-image-thumb swiper-container pos-relative mt-5">
                                        <div class="swiper-wrapper">
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="{{ asset('assetsc/images/product/default/home-3/default-1.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="{{ asset('assetsc/images/product/default/home-3/default-2.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="{{ asset('assetsc/images/product/default/home-3/default-3.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="{{ asset('assetsc/images/product/default/home-3/default-4.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="{{ asset('assetsc/images/product/default/home-3/default-5.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="product-image-thumb-single swiper-slide">
                                                <img class="img-fluid"
                                                    src="{{ asset('assetsc/images/product/default/home-3/default-6.jpg') }}"
                                                    alt="" />
                                            </div>
                                        </div>
                                        <!-- Add Arrows -->
                                        <div class="gallery-thumb-arrow swiper-button-next"></div>
                                        <div class="gallery-thumb-arrow swiper-button-prev"></div>
                                    </div>
                                    <!-- End Thumbnail Image -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-details-content-area">
                                    <!-- Start  Product Details Text Area-->
                                    <div class="product-details-text">
                                        <h4 class="title">Nonstick Dishwasher PFOA</h4>
                                        <div class="price"><del>$70.00</del>$80.00</div>
                                    </div>
                                    <!-- End  Product Details Text Area-->
                                    <!-- Start Product Variable Area -->
                                    <div class="product-details-variable">
                                        <!-- Product Variable Single Item -->
                                        <div class="variable-single-item">
                                            <span>Color</span>
                                            <div class="product-variable-color">
                                                <label for="modal-product-color-red">
                                                    <input name="modal-product-color" id="modal-product-color-red"
                                                        class="color-select" type="radio" checked />
                                                    <span class="product-color-red"></span>
                                                </label>
                                                <label for="modal-product-color-tomato">
                                                    <input name="modal-product-color" id="modal-product-color-tomato"
                                                        class="color-select" type="radio" />
                                                    <span class="product-color-tomato"></span>
                                                </label>
                                                <label for="modal-product-color-green">
                                                    <input name="modal-product-color" id="modal-product-color-green"
                                                        class="color-select" type="radio" />
                                                    <span class="product-color-green"></span>
                                                </label>
                                                <label for="modal-product-color-light-green">
                                                    <input name="modal-product-color" id="modal-product-color-light-green"
                                                        class="color-select" type="radio" />
                                                    <span class="product-color-light-green"></span>
                                                </label>
                                                <label for="modal-product-color-blue">
                                                    <input name="modal-product-color" id="modal-product-color-blue"
                                                        class="color-select" type="radio" />
                                                    <span class="product-color-blue"></span>
                                                </label>
                                                <label for="modal-product-color-light-blue">
                                                    <input name="modal-product-color" id="modal-product-color-light-blue"
                                                        class="color-select" type="radio" />
                                                    <span class="product-color-light-blue"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <!-- Product Variable Single Item -->
                                        <div class="d-flex align-items-center flex-wrap">
                                            <div class="variable-single-item">
                                                <span>Quantity</span>
                                                <div class="product-variable-quantity">
                                                    <input min="1" max="100" value="1"
                                                        type="number" />
                                                </div>
                                            </div>

                                            <div class="product-add-to-cart-btn">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#modalAddcart">Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product Variable Area -->
                                    <div class="modal-product-about-text">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Mollitia iste laborum ad impedit pariatur esse
                                            optio tempora sint ullam autem deleniti nam in quos qui
                                            nemo ipsum numquam, reiciendis maiores quidem aperiam,
                                            rerum vel recusandae
                                        </p>
                                    </div>
                                    <!-- Start  Product Details Social Area-->
                                    <div class="modal-product-details-social">
                                        <span class="title">SHARE THIS PRODUCT</span>
                                        <ul>
                                            <li>
                                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="google-plus"><i
                                                        class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End  Product Details Social Area-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@push('costum-js')
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El cliente eliminó correctamente',
                'success'
            )
        </script>
    @endif
    @if (session('crear') == 'ok')
        <script type="text/javascript">
            Lobibox.notify('success', {
                width: 600,
                img: "{{ asset('imgs/success.png') }}",
                position: 'top right',
                title: 'Registro correctamente !!',
                msg: 'USUARIO Registrada.'
            });
        </script>
    @endif
    @if (session('actualizar') == 'ok')
        <script type="text/javascript">
            Lobibox.notify('success', {
                width: 600,
                img: "{{ asset('imgs/success.png') }}",
                position: 'top right',
                title: 'Actualizacion correctamente !!',
                msg: 'Categoria Actualizada.'
            });
        </script>
    @endif
@endpush
