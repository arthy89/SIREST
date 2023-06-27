@extends('Frontend.Layout.app')

@section('main-content')

<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Ofertas</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="{{route('home-client')}}">Home</a></li>
                                <li><a href="{{ route('categorias') }}">ecommerce</a></li>
                                <li class="active" aria-current="page">Ofertas</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop-section">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-12">
                <!-- Start Shop Product Sorting Section -->
                <div class="shop-sort-section">
                    <div class="container">
                        <div class="row">
                            <!-- Start Sort Wrapper Box -->
                            <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                                <!-- Start Sort tab Button -->
                                <div class="sort-tablist d-flex align-items-center">
                                    <ul class="tablist nav sort-tab-btn">
                                        <li><a class="nav-link active" data-bs-toggle="tab" href="#layout-4-grid"><img src="assets/images/icons/bkg_grid.png" alt=""></a></li>
                                        <li><a class="nav-link" data-bs-toggle="tab" href="#layout-list"><img src="assets/images/icons/bkg_list.png" alt=""></a></li>
                                    </ul>

                                    <!-- Start Page Amount -->
                                    <div class="page-amount ml-2">
                                        <span>Showing 1–9 of 21 results</span>
                                    </div> <!-- End Page Amount -->
                                </div> <!-- End Sort tab Button -->

                                <!-- Start Sort Select Option -->
                                <div class="sort-select-list d-flex align-items-center">
                                    <label class="mr-2">Sort By:</label>
                                    <form action="#">
                                        <fieldset>
                                            <select name="speed" id="speed" style="display: none;">
                                                <option>Sort by average rating</option>
                                                <option>Sort by popularity</option>
                                                <option selected="selected">Mejor eleccion</option>
                                                <option>Sort by price: low to high</option>
                                                <option>Sort by price: high to low</option>
                                                <option>Product Name: Z</option>
                                            </select><div class="nice-select" tabindex="0"><span class="current">Sort by newness</span><ul class="list"><li data-value="Sort by average rating" class="option">Sort by average rating</li><li data-value="Sort by popularity" class="option">Sort by popularity</li><li data-value="Sort by newness" class="option selected">Sort by newness</li><li data-value="Sort by price: low to high" class="option">Sort by price: low to high</li><li data-value="Sort by price: high to low" class="option">Sort by price: high to low</li><li data-value="Product Name: Z" class="option">Product Name: Z</li></ul></div>
                                        </fieldset>
                                    </form>
                                </div> <!-- End Sort Select Option -->



                            </div> <!-- Start Sort Wrapper Box -->
                        </div>
                    </div>
                </div> <!-- End Section Content -->

                <!-- Start Tab Wrapper -->
                <div class="sort-product-tab-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content">
                                    <!-- Start Grid View Product -->
                                    <div class="tab-pane active show sort-layout-single" id="layout-4-grid">
                                        <div class="row">

                                            @foreach($ofertas as $oferta)

                                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                                    <!-- Start Product Default Single Item -->
                                                    <div class="product-default-single-item product-color--golden aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                                        <div class="image-box">
                                                            <a href="{{ route('detalles_oferta', $oferta->nombre_p, ) }}" class="image-link">
                                                                <img src="{{$oferta->imagen }}" alt="">
                                                                <img src="{{$oferta->imagen }}" alt="">
                                                            </a>
                                                            <div  class="tag">
                                                                <span style="background-color:#ff365d">Oferta</span>
                                                            </div>
                                                            <div class="action-link">
                                                                <div class="action-link-left">
                                                                    <a onclick="agregarAlCarrito(event,{{$oferta}})" id="{{$oferta->idproducto}}" href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#modalAddcart{{ $oferta->idproducto }}">Agregar Carrito</a>
                                                                </div>
                                                                <div class="action-link-right">
                                                                    <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#modal{{ $oferta->idproducto }}"><i
                                                                                class="icon-magnifier"></i></a>
                                                                    <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                                    <a href="compare.html"><i class="icon-shuffle"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <div class="content-left">
                                                                <h6 class="title"><a href="#">{{$oferta->nombre_p}}</a></h6>
                                                                <ul class="review-star">
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="empty"><i class="ion-android-star"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="content-right">
                                                                {{-- <span class="price">{{ $prorecien->precio_venta_public }}</span> --}}
                                                                <span class=""><del>$ {{$oferta->precio_venta_public}}</del>
                                                                    <h5>
                                                                        <strong>$
                                                                            <span class="price">
                                                                                @if($oferta->tipo_descuento == 1)
                                                                                    {{$oferta->precio_venta_public*$oferta->cantidad_descuento/100}}
                                                                                @else
                                                                                    {{$oferta->precio_venta_public - $oferta->cantidad_descuento}}
                                                                                @endif
                                                                            </span>

                                                                        </strong>
                                                                    </h5>

                                                                    {{-- {{$oferta->cantidad_descuento}} --}}
                                                                    {{-- $ 80.00 --}}

                                                                </span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- End Product Default Single Item -->
                                                </div>
                                            @endforeach



                                        </div>
                                    </div> <!-- End Grid View Product -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Tab Wrapper -->

                <!-- Start Pagination -->
                <div class="page-pagination text-center aos-init" data-aos="fade-up" data-aos-delay="0">
                    @if ($ofertas->hasPages())
                        <ul >
                            {{-- Enlace "anterior" --}}
                            @if ($ofertas->onFirstPage())
                                <li class="disabled"><span>&laquo;</span></li>
                            @else
                                <li><a href="{{ $ofertas->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif

                            {{-- Elementos de la paginación --}}
                            @foreach ($ofertas->getUrlRange(1, $ofertas->lastPage()) as $page => $url)
                                @if ($page == $ofertas->currentPage())
                                    <li ><a class="active" >{{ $page }}</a></li>
                                @else
                                    <li><a  href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            {{-- Enlace "siguiente" --}}
                            @if ($ofertas->hasMorePages())
                                <li ><a href="{{ $ofertas->nextPageUrl() }}" rel="next"  >&raquo;</a></li>
                            @else
                                <li class="disabled"><span>&raquo;</span></li>
                            @endif
                        </ul>
                    @endif
                    </div>
                <!-- End Pagination -->
            </div> <!-- End Shop Product Sorting Section  -->
        </div>
    </div>
</div>
{{-- modales --}}
@foreach ($ofertas as $oferta)
{{-- modal ver mas prodyuctos --}}
<div class="modal fade" id="modal{{ $oferta->idproducto }}" tabindex="-1" role="dialog"
            aria-labelledby="modal{{ $oferta->idproducto }}Label" aria-hidden="true">
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
                                                    <img src="{{ $oferta->imagen }}" alt="" />
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="{{ $oferta->imagen }}" alt="" />
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="{{ $oferta->imagen }}" alt="" />
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="{{ $oferta->imagen }}" alt="" />
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
                                            <h4 class="title">{{ $oferta->nombre_p }}</h4>
                                            <div class="price">$
                                                <span class="price">
                                                    @if($oferta->tipo_descuento == 1)
                                                        {{$oferta->precio_venta_public*$oferta->cantidad_descuento/100}}
                                                    @else
                                                        {{$oferta->precio_venta_public - $oferta->cantidad_descuento}}
                                                    @endif
                                                </span>
                                            </div>
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
                                                    <a onclick="agregarAlCarrito(event,{{$oferta}})" id="{{$oferta->idproducto}}" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modalAddcart{{ $oferta->idproducto }}">Agregar Carrito</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product Variable Area -->
                                        <div class="modal-product-about-text">
                                            <p>
                                                {{ $oferta->descripcion }}
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
    {{-- modal para carrito --}}
<div class="modal fade"  id="modalAddcart{{ $oferta->idproducto }}" tabindex="-1" role="dialog"
            aria-labelledby="modal{{ $oferta->idproducto }}Label" aria-hidden="true">
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
                                                <img class="img-fluid" src="{{$oferta->imagen}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="modal-add-cart-info">
                                                <i class="fa fa-check-square"></i>Se agrego al carrito satisfactoriamente!
                                            </div>
                                            <div class="modal-add-cart-product-cart-buttons">
                                                <a href="{{route('carrito_home')}}">View Cart</a>
                                                <a href="checkout.html">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 modal-border">
                                    <ul class="modal-add-cart-product-shipping-info">
                                        <li>
                                            <strong><i class="icon-shopping-cart"></i> En su carrito se agrega el articulo.</strong>
                                        </li>
                                        <li><strong>TOTAL PRICE: </strong>$ <span class="price">
                                            @if($oferta->tipo_descuento == 1)
                                                {{$oferta->precio_venta_public*$oferta->cantidad_descuento/100}}
                                            @else
                                                {{$oferta->precio_venta_public - $oferta->cantidad_descuento}}
                                            @endif
                                        </span></li>
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
    @endforeach


@endsection
