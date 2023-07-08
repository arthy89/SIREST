@extends('Frontend.Layout.app')

@section('main-content')
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">{{$product[0]->nombre_p}}</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="{{route('home-client')}}">Home</a></li>
                                <li><a href="{{ route('ecomerce_categorias') }}">ecommerce</a></li>
                                <li class="active" aria-current="page">productos Detalle</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="product-details-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="product-details-gallery-area aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                        <!-- Start Large Image -->
                        <div
                            class="product-large-image product-large-image-horaizontal swiper-container swiper-container-initialized swiper-container-horizontal">
                            <div class="swiper-wrapper" id="swiper-wrapper-46763fec5cf5483d" aria-live="polite"
                                style="transform: translate3d(0px, 0px, 0px);">
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive swiper-slide-active"
                                    role="group" aria-label="1 / 6"
                                    style="width: 715px; position: relative; overflow: hidden;">
                                    <img
                                        src="{{$product[0]->imagen}}"alt="">

                                    <img role="presentation" alt=""
                                        src="{{$product[0]->imagen}}"
                                        class="zoomImg"
                                        style="position: absolute; top: 131.325px; left: 98.1119px; opacity: 0; width: 600px; height: 690px; border: none; max-width: none; max-height: none;">
                                </div>
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive swiper-slide-next"
                                    role="group" aria-label="2 / 6"
                                    style="width: 715px; position: relative; overflow: hidden;">
                                    <img
                                        src="{{$product[0]->imagen}}"alt="">
                                    <img role="presentation" alt=""
                                        src="{{$product[0]->imagen}}"
                                        class="zoomImg"
                                        style="position: absolute; top: -85.0532px; left: -35.4043px; opacity: 0; width: 600px; height: 690px; border: none; max-width: none; max-height: none;">
                                </div>
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive"
                                    role="group" aria-label="3 / 6"
                                    style="width: 715px; position: relative; overflow: hidden;">
                                    <img
                                        src="{{$product[0]->imagen}}"alt="">
                                    <img role="presentation" alt=""
                                        src="{{$product[0]->imagen}}"
                                        class="zoomImg"
                                        style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 600px; height: 690px; border: none; max-width: none; max-height: none;">
                                </div>
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive"
                                    role="group" aria-label="4 / 6"
                                    style="width: 715px; position: relative; overflow: hidden;">
                                    <img
                                    src="{{$product[0]->imagen}}"alt="">
                                    <img role="presentation" alt=""
                                    src="{{$product[0]->imagen}}"
                                        class="zoomImg"
                                        style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 600px; height: 690px; border: none; max-width: none; max-height: none;">
                                </div>
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive"
                                    role="group" aria-label="5 / 6"
                                    style="width: 715px; position: relative; overflow: hidden;">
                                    <img
                                    src="{{$product[0]->imagen}}"alt="">
                                    <img role="presentation" alt=""
                                    src="{{$product[0]->imagen}}"
                                        class="zoomImg"
                                        style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 600px; height: 690px; border: none; max-width: none; max-height: none;">
                                </div>

                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <!-- End Large Image -->
                        <!-- Start Thumbnail Image -->
                        <div
                            class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5 swiper-container-initialized swiper-container-horizontal swiper-container-free-mode swiper-container-thumbs">
                            <div class="swiper-wrapper" id="swiper-wrapper-0dc41d7f2f8c11087" aria-live="polite"
                                style="transform: translate3d(-1207.5px, 0px, 0px); transition: all 0ms ease 0s;">
                                <div class="product-image-thumb-single swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev"
                                    data-swiper-slide-index="2" role="group" aria-label="1 / 14"
                                    style="width: 147.5px; margin-right: 25px;">
                                    <img class="img-fluid" src="{{$product[0]->imagen}}"
                                        alt="">
                                </div>
                                <div class="product-image-thumb-single swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active"
                                    data-swiper-slide-index="3" role="group" aria-label="2 / 14"
                                    style="width: 147.5px; margin-right: 25px;">
                                    <img class="img-fluid" src="{{$product[0]->imagen}}"
                                        alt="">
                                </div>
                                <div class="product-image-thumb-single swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next"
                                    data-swiper-slide-index="4" role="group" aria-label="3 / 14"
                                    style="width: 147.5px; margin-right: 25px;">
                                    <img class="img-fluid" src="{{$product[0]->imagen}}"
                                        alt="">
                                </div>


                                <div class="product-image-thumb-single swiper-slide" data-swiper-slide-index="1"
                                    role="group" aria-label="6 / 14" style="width: 147.5px; margin-right: 25px;">
                                    <img class="img-fluid" src="{{$product[0]->imagen}}"
                                        alt="">
                                </div>
                                <div class="product-image-thumb-single swiper-slide swiper-slide-prev"
                                    data-swiper-slide-index="2" role="group" aria-label="7 / 14"
                                    style="width: 147.5px; margin-right: 25px;">
                                    <img class="img-fluid" src="{{$product[0]->imagen}}"
                                        alt="">
                                </div>
                                <div class="product-image-thumb-single swiper-slide swiper-slide-visible swiper-slide-active"
                                    data-swiper-slide-index="3" role="group" aria-label="8 / 14"
                                    style="width: 147.5px; margin-right: 25px;">
                                    <img class="img-fluid" src="{{$product[0]->imagen}}"
                                        alt="">
                                </div>

                                <div class="product-image-thumb-single swiper-slide swiper-slide-visible"
                                    data-swiper-slide-index="5" role="group" aria-label="10 / 14"
                                    style="width: 147.5px; margin-right: 25px;">
                                    <img class="img-fluid" src="{{$product[0]->imagen}}"
                                        alt="">
                                </div>
                                <div class="product-image-thumb-single swiper-slide swiper-slide-duplicate swiper-slide-visible swiper-slide-thumb-active"
                                    data-swiper-slide-index="0" role="group" aria-label="11 / 14"
                                    style="width: 147.5px; margin-right: 25px;">
                                    <img class="img-fluid" src="{{$product[0]->imagen}}"
                                        alt="">
                                </div>
                                <div class="product-image-thumb-single swiper-slide swiper-slide-duplicate"
                                    data-swiper-slide-index="1" role="group" aria-label="12 / 14"
                                    style="width: 147.5px; margin-right: 25px;">
                                    <img class="img-fluid" src="{{$product[0]->imagen}}"
                                        alt="">
                                </div>
                                <div class="product-image-thumb-single swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev"
                                    data-swiper-slide-index="2" role="group" aria-label="13 / 14"
                                    style="width: 147.5px; margin-right: 25px;">
                                    <img class="img-fluid" src="{{$product[0]->imagen}}"
                                        alt="">
                                </div>
                                <div class="product-image-thumb-single swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active"
                                    data-swiper-slide-index="3" role="group" aria-label="14 / 14"
                                    style="width: 147.5px; margin-right: 25px;">
                                    <img class="img-fluid" src="{{$product[0]->imagen}}"
                                        alt="">
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="gallery-thumb-arrow swiper-button-next" tabindex="0" role="button"
                                aria-label="La siguiente diapositiva" aria-controls="swiper-wrapper-0dc41d7f2f8c11087">
                            </div>
                            <div class="gallery-thumb-arrow swiper-button-prev" tabindex="0" role="button"
                                aria-label="Diapositiva anterior" aria-controls="swiper-wrapper-0dc41d7f2f8c11087"></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <!-- End Thumbnail Image -->
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="product-details-content-area product-details--golden aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <!-- Start  Product Details Text Area-->
                        <div class="product-details-text">
                            <h4 class="title">{{$product[0]->nombre_p}}</h4>
                            <div class="d-flex align-items-center">
                                <ul class="review-star">
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="empty"><i class="ion-android-star"></i></li>
                                </ul>
                                <a href="#" class="customer-review ml-2">(customer review )</a>
                            </div>
                            <div class="price">{{$product[0]->precio_venta_public}}</div>
                            <p>{{$product[0]->descripcion}}</p>
                        </div> <!-- End  Product Details Text Area-->
                        <!-- Start Product Variable Area -->
                        <div class="product-details-variable">
                            <h4 class="title">Sotck Disponible</h4>
                            <!-- Product Variable Single Item -->
                            <div class="variable-single-item">
                                <div class="product-stock"> <span class="product-stock-in"><i class="ion-checkmark-circled"></i></span> {{$product[0]->stock}} EN STOCK</div>
                            </div>
                            <!-- Product Variable Single Item -->
                            <div class="variable-single-item">
                                <span>Color</span>
                                <div class="product-variable-color">
                                    <label for="product-color-red">
                                        <input name="product-color" id="product-color-red" class="color-select" type="radio" checked="">
                                        <span class="product-color-red"></span>
                                    </label>
                                    <label for="product-color-tomato">
                                        <input name="product-color" id="product-color-tomato" class="color-select" type="radio">
                                        <span class="product-color-tomato"></span>
                                    </label>
                                    <label for="product-color-green">
                                        <input name="product-color" id="product-color-green" class="color-select" type="radio">
                                        <span class="product-color-green"></span>
                                    </label>
                                    <label for="product-color-light-green">
                                        <input name="product-color" id="product-color-light-green" class="color-select" type="radio">
                                        <span class="product-color-light-green"></span>
                                    </label>
                                    <label for="product-color-blue">
                                        <input name="product-color" id="product-color-blue" class="color-select" type="radio">
                                        <span class="product-color-blue"></span>
                                    </label>
                                    <label for="product-color-light-blue">
                                        <input name="product-color" id="product-color-light-blue" class="color-select" type="radio">
                                        <span class="product-color-light-blue"></span>
                                    </label>
                                </div>
                            </div>


                            <!-- Product Variable Single Item -->
                            <div class="d-flex align-items-center ">
                                <div class="variable-single-item ">
                                    <span>Cantidad</span>
                                    <div class="product-variable-quantity">
                                        <input min="1" max="100" value="1" type="number">
                                    </div>
                                </div>

                                <div class="product-add-to-cart-btn">

                                    <a href="#" onclick="agregarAlCarrito(event,{{$product[0]}})" id="{{$product[0]->idproducto}}"
                                    data-bs-toggle="modal" data-bs-target="#modalAddcart{{ $product[0]->idproducto }}">+ Agregar Carrito</a>
                                </div>
                            </div>
                            <!-- Start  Product Details Meta Area-->
                            <div class="product-details-meta mb-20">
                                <a href="wishlist.html" class="icon-space-right"><i class="icon-heart"></i>Añadir a la lista de deseos</a>
                                <a href="compare.html" class="icon-space-right"><i class="icon-refresh"></i>Comparar</a>
                            </div> <!-- End  Product Details Meta Area-->
                        </div> <!-- End Product Variable Area -->

                        <!-- Start  Product Details Catagories Area-->
                        <div class="product-details-catagory mb-2">
                            <span class="title">CATEGORIAS:</span>
                            <ul>
                                <li><a href="#">CERLULAR</a></li>
                                <li><a href="#">IPHONE</a></li>
                                <li><a href="#">PANTALLA</a></li>
                            </ul>
                        </div> <!-- End  Product Details Catagories Area-->


                        <!-- Start  Product Details Social Area-->
                        <div class="product-details-social">
                            <span class="title">COMPARTE ESTE PRODUCTO:</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div> <!-- End  Product Details Social Area-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-details-content-tab-section section-top-gap-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-details-content-tab-wrapper aos-init aos-animate" data-aos="fade-up"
                        data-aos-delay="0">

                        <!-- Start Product Details Tab Button -->
                        <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                            <li><a class="nav-link active" data-bs-toggle="tab" href="#description">
                                    Descripcion
                                </a></li>
                            <li><a class="nav-link" data-bs-toggle="tab" href="#specification">
                                    Especificaciones
                                </a></li>
                            {{-- <li><a class="nav-link" data-bs-toggle="tab" href="#review">
                                Reviews (1)
                            </a></li> --}}
                        </ul> <!-- End Product Details Tab Button -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">PRODUCTOS RELACIONADOS</h3>
                                <p>Explore la colección de nuestros productos relacionados</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-1row default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div
                                class="swiper-container product-default-slider-4grid-1row swiper-container-initialized swiper-container-horizontal">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper" id="swiper-wrapper-f172cdf161107c446" aria-live="polite"
                                    style="transform: translate3d(0px, 0px, 0px);">
                                    <!-- End Product Default Single Item -->
                                    <!-- Start Product Default Single Item -->
                                    @foreach($productossim as $productosimil)
                                        <div class="product-default-single-item product-color--golden swiper-slide swiper-slide-active"
                                            role="group" aria-label="1 / 8" style="width: 342.5px; margin-right: 30px;">
                                            <div class="image-box">
                                                <a href="{{ route('detalles_producto', $productosimil->nombre_p) }}" class="image-link">
                                                    <img src="{{$productosimil->imagen }}"
                                                        alt="">
                                                    <img src="{{ $productosimil->imagen }}"
                                                        alt="">
                                                </a>
                                                <div class="action-link">
                                                    <div class="action-link-left">
                                                        <a href="#"  onclick="agregarAlCarrito(event,{{$productosimil}})" id="{{$productosimil->idproducto}}"
                                                        data-bs-toggle="modal" data-bs-target="#modalAddcart{{ $productosimil->idproducto }}">Agregar Cart</a>
                                                    </div>
                                                    <div class="action-link-right">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modalQuickview"><i
                                                                class="icon-magnifier"></i></a>
                                                        <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                        <a href="compare.html"><i class="icon-shuffle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="content-left">
                                                    <h6 class="title"><a href="product-details-default.html">{{$productosimil->nombre_p}}</a></h6>
                                                    <ul class="review-star">
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="content-right">
                                                    <span class="price">$ {{$productosimil->precio_venta_public}}</span>
                                                </div>

                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                                aria-label="Previous slide" aria-controls="swiper-wrapper-f172cdf161107c446"
                                aria-disabled="true"></div>
                            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                                aria-controls="swiper-wrapper-f172cdf161107c446" aria-disabled="false"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($productossim as $producto)
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
@endsection
