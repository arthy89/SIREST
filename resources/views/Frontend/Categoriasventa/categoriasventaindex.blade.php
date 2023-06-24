@extends('Frontend.Layout.app')

@section('main-content')
    {{-- <h6 class="title">{{$productos[0]->nombre_p}}</h6> --}}
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Categorias</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="http://sirest.test/ecommerce/home">Home</a></li>
                                    <li><a href="http://sirest.test/backend/categorias">ecommerce</a></li>
                                    <li class="active" aria-current="page">Categorias</li>
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
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">CATEGORIAS</h6>
                            <div class="sidebar-content">
                                <ul class="sidebar-menu">
                                    @foreach ($categorias as $categoria)
                                        <li><a href="{{route('filtro_categorias',$categoria->nombre)}}">{{ $categoria->nombre }}</a></li>
                                    @endforeach
                                    <li>
                                        <ul class="sidebar-menu-collapse">
                                            <!-- Start Single Menu Collapse List -->
                                            <li class="sidebar-menu-collapse-list">
                                                <div class="accordion">
                                                    <a href="#" class="accordion-title collapsed"
                                                        data-bs-toggle="collapse" data-bs-target="#men-fashion"
                                                        aria-expanded="false">mas <i class="ion-ios-arrow-right"></i></a>
                                                    <div id="men-fashion" class="collapse">
                                                        <ul class="accordion-category-list">
                                                            @foreach ($categorias as $categoria)
                                                                <li><a href="{{route('filtro_categorias',$categoria->nombre)}}">{{ $categoria->nombre }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li> <!-- End Single Menu Collapse List -->
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">FILTRAR POR PRECIO</h6>
                            <div class="sidebar-content">
                                <div id="slider-range"
                                    class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"
                                        style="left: 15%; width: 45%;"></div><span tabindex="0"
                                        class="ui-slider-handle ui-corner-all ui-state-default"
                                        style="left: 15%;"></span><span tabindex="0"
                                        class="ui-slider-handle ui-corner-all ui-state-default" style="left: 60%;"></span>
                                </div>
                                <div class="filter-type-price">
                                    <label for="amount">Precio Rangos:</label>
                                    <input type="text" id="amount">
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">Marcas</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        @foreach ($proveedores as $proveedor)
                                            <li>
                                                <label class="checkbox-default" for="brakeParts">
                                                    <input type="checkbox" id="brakeParts">
                                                    <span>{{ $proveedor->nombre_proveedor }}(2)</span>
                                                </label>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">SELECCIONE COLOR</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        <li>
                                            <label class="checkbox-default" for="black">
                                                <input type="checkbox" id="black">
                                                <span>ROJO (6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="blue">
                                                <input type="checkbox" id="blue">
                                                <span>AZUL (8)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="brown">
                                                <input type="checkbox" id="brown">
                                                <span>NEGRO (10)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="Green">
                                                <input type="checkbox" id="Green">
                                                <span>PLOMO (6)</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-default" for="pink">
                                                <input type="checkbox" id="pink">
                                                <span>ROSADO (4)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">Etiqueta de Productos</h6>
                            <div class="sidebar-content">
                                <div class="tag-link">
                                    {{-- @foreach (explode(',', $tags) as $tag)
                                        <span>{{ $tag }}</span>
                                    @endforeach --}}

                                    <a href="#">nuevo</a>
                                    <a href="#">mejor</a>
                                    <a href="#">barato</a>
                                    <a href="#">cool</a>
                                    <a href="#">tiene</a>
                                    <a href="#">normal</a>
                                    <a href="#">diez</a>
                                    <a href="#">viajes</a>
                                    <a href="#">blanco</a>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget
                            <div class="sidebar-single-widget">
                                <div class="sidebar-content">
                                    <a href="product-details-default.html" class="sidebar-banner img-hover-zoom">
                                        <img class="img-fluid"
                                            src="{{ asset('assetsc/images/product/default/home-3/default-1.jpg') }}"
                                            alt="">
                                    </a>
                                </div>
                            </div> <!-- End Single Sidebar Widget -->
                    </div> <!-- End Sidebar Area -->
                </div>
                <div class="col-lg-9">
                    <!-- Start Shop Product Sorting Section -->
                    <div class="shop-sort-section">
                        <div class="container">
                            <div class="row">
                                <!-- Start Sort Wrapper Box -->
                                <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column aos-init aos-animate"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <!-- Start Sort tab Button -->
                                    <div class="sort-tablist d-flex align-items-center">
                                        <ul class="tablist nav sort-tab-btn">
                                            <li><a class="nav-link active" data-bs-toggle="tab"
                                                    href="#layout-3-grid"><img src="assets/images/icons/bkg_grid.png"
                                                        alt=""></a></li>
                                            <li><a class="nav-link" data-bs-toggle="tab" href="#layout-list"><img
                                                        src="assets/images/icons/bkg_list.png" alt=""></a></li>
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
                                                    <option selected="selected">Sort by newness</option>
                                                    <option>Sort by price: low to high</option>
                                                    <option>Sort by price: high to low</option>
                                                    <option>Product Name: Z</option>
                                                </select>
                                                <div class="nice-select" tabindex="0"><span class="current">Sort by
                                                        newness</span>
                                                    <ul class="list">
                                                        <li data-value="Sort by average rating" class="option">Sort by
                                                            average rating</li>
                                                        <li data-value="Sort by popularity" class="option">Sort by
                                                            popularity</li>
                                                        <li data-value="Sort by newness" class="option selected">Sort by
                                                            newness</li>
                                                        <li data-value="Sort by price: low to high" class="option">Sort by
                                                            price: low to high</li>
                                                        <li data-value="Sort by price: high to low" class="option">Sort by
                                                            price: high to low</li>
                                                        <li data-value="Product Name: Z" class="option">Product Name: Z
                                                        </li>
                                                    </ul>
                                                </div>
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
                                    <div class="tab-content tab-animate-zoom">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                            <div class="row">
                                                @foreach ($productos as $producto)
                                                    <div class="col-xl-4 col-sm-6 col-12">
                                                        <!-- Start Product Default Single Item -->
                                                        <div class="product-default-single-item product-color--golden aos-init aos-animate"
                                                            data-aos="fade-up" data-aos-delay="0">
                                                            <div class="image-box">
                                                                <a href="{{ route('detalles_producto', $producto->nombre_p) }}"
                                                                    class="image-link">
                                                                    {{-- <a href="{{ route('detalles_producto', ['parametro1' => $producto->nombre_p, 'parametro2' => $producto->idproducto]) }}" class="image-link"> --}}
                                                                    {{-- <a href="" class="image-link"> --}}
                                                                    <img src="{{ asset($producto->imagen) }}"
                                                                        alt="">
                                                                    <img src="{{ asset($producto->imagen) }}"
                                                                        alt="" />
                                                                </a>
                                                                <div class="action-link">
                                                                    <div class="action-link-left">
                                                                        <a href="#" data-bs-toggle="modal"
                                                                        onclick="agregarAlCarrito(event,{{$producto}})" id="{{$producto->idproducto}}"
                                                                            data-bs-target="#modalAddcart{{ $producto->idproducto }}">Agregar
                                                                            Carrito</a>
                                                                    </div>
                                                                    <div class="action-link-right">
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#modal{{ $producto->idproducto }}"><i
                                                                                class="icon-magnifier"></i></a>
                                                                        <a href="wishlist.html"><i
                                                                                class="icon-heart"></i></a>
                                                                        <a href="compare.html"><i
                                                                                class="icon-shuffle"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="content-left">
                                                                    <h6 class="title"><a
                                                                            href="product-details-default.html">{{ $producto->nombre_p }}</a>
                                                                    </h6>
                                                                    <ul class="review-star">
                                                                        <li class="fill"><i
                                                                                class="ion-android-star"></i>
                                                                        </li>
                                                                        <li class="fill"><i
                                                                                class="ion-android-star"></i>
                                                                        </li>
                                                                        <li class="fill"><i
                                                                                class="ion-android-star"></i>
                                                                        </li>
                                                                        <li class="fill"><i
                                                                                class="ion-android-star"></i>
                                                                        </li>
                                                                        <li class="empty"><i
                                                                                class="ion-android-star"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="content-right">
                                                                    <span class="price">$
                                                                        {{ $producto->precio_venta_public }}</span>
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
                    {{-- <ul class="pagination justify-content-end">
                        <!-- Botón "Anterior" -->
                        <li class="page-item {{ $productos->previousPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" wire:click="previousPage" tabindex="-1">
                                <span class="material-icons">
                                    keyboard_arrow_left
                                </span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                        <!-- Números de página -->
                        @for ($page = 1; $page <= $productos->lastPage(); $page++)
                            <li class="page-item {{ $page == $productos->currentPage() ? 'active' : '' }}">
                                <a class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                            </li>
                        @endfor

                        <!-- Botón "Siguiente" -->
                        <li class="page-item {{ $productos->nextPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" wire:click="nextPage">
                                <span class="material-icons">
                                    keyboard_arrow_right
                                </span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul> --}}
                    <div class="page-pagination text-center aos-init" data-aos="fade-up" data-aos-delay="0">
                    @if ($productos->hasPages())
                        <ul >
                            {{-- Enlace "anterior" --}}
                            @if ($productos->onFirstPage())
                                <li class="disabled"><span>&laquo;</span></li>
                            @else
                                <li><a href="{{ $productos->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif

                            {{-- Elementos de la paginación --}}
                            @foreach ($productos->getUrlRange(1, $productos->lastPage()) as $page => $url)
                                @if ($page == $productos->currentPage())
                                    <li ><a class="active" >{{ $page }}</a></li>
                                @else
                                    <li><a  href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            {{-- Enlace "siguiente" --}}
                            @if ($productos->hasMorePages())
                                <li ><a href="{{ $productos->nextPageUrl() }}" rel="next"  >&raquo;</a></li>
                            @else
                                <li class="disabled"><span>&raquo;</span></li>
                            @endif
                        </ul>
                    @endif
                    </div>
                    <!-- Start Pagination -->
                    {{-- <div class="page-pagination text-center aos-init" data-aos="fade-up" data-aos-delay="0">
                        <ul>
                            {{ $productos->links() }}
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                        </ul>
                    </div> --}}
                    <!-- End Pagination -->
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
    @foreach ($productos as $producto)
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
                                                    <img src="{{ $producto->imagen }}" alt="" />
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="{{ $producto->imagen }}" alt="" />
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="{{ $producto->imagen }}" alt="" />
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="{{ $producto->imagen }}" alt="" />
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
                                            <h4 class="title">{{ $producto->nombre_p }}</h4>
                                            <div class="price">$ {{ $producto->precio_venta_public }}</div>
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
                                                        data-bs-target="#modalAddcart">Agregar Carrito</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product Variable Area -->
                                        <div class="modal-product-about-text">
                                            <p>
                                                {{ $producto->descripcion }}
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
            </div>
        </div>
    @endforeach
@endsection
