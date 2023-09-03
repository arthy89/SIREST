@extends('Frontend.Layout.app')

@section('main-content')
<div class="about-top">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-between d-sm-column">
            <div class="col-md-6">
                <div class="about-img aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                    <div class="img-responsive">
                        <img src="{{ asset('imgs/serviciot.jpeg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="title">Servicio Tecnico Profecional</h3>
                    <h5 class="semi-title">Pida su reparacion a domicilio, elija el producto o empieze de una vez</h5>
                    <p>For this reason, our each design serves an idea. Our strength in design is reflected by our
                        name, our care for details. Our specialist won't be afraid to go extra miles just to
                        approach near perfection. We don't require everything to be perfect, but we need them to be
                        perfectly cared for. That's a reason why we are willing to give contributions at best. Not a
                        single detail is missed out under Billey's professional eyes.The amount of dedication and
                        effort equals to the level of passion and determination. Get better, together as one.</p>
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
                                                <option selected="selected">Sort by newness</option>
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
                                    <div class="tab-pane show sort-layout-single active" id="layout-4-grid">
                                        <div class="row">
                                            @foreach($repuestos as $repuesto)
                                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                                <!-- Start Product Default Single Item -->
                                                <div class="product-default-single-item product-color--golden aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                                    <div class="image-box">
                                                        <a href="{{ route('detalles_producto_tecnico', $repuesto->nombre_p) }}" class="image-link">
                                                            <img src="{{$repuesto->imagen }}" alt="">
                                                            <img src="{{$repuesto->imagen }}" alt="">
                                                        </a>
                                                        <div  class="tag">
                                                            {{-- <span style="background-color:#ff365d">Oferta</span> --}}
                                                        </div>
                                                        <div class="action-link">
                                                            <div class="action-link-left">
                                                                <a onclick="{{-- agregarAlCarrito(event,{{$repuesto}})" id="{{$repuesto->idproducto}}"--}} href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#modalAddcart{{ $repuesto->idproducto }}">Pedir tecnico</a>
                                                            </div>
                                                            <div class="action-link-right">
                                                                <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#modal{{ $repuesto->idproducto }}"><i
                                                                            class="icon-magnifier"></i></a>
                                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="content-left">
                                                            <h6 class="title"><a href="#">{{$repuesto->nombre_p}}</a></h6>
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
                                                            <span class="price">{{ $repuesto->precio_venta_public }}</span>

                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- End Product Default Single Item -->
                                            </div>
                                            @endforeach

                                        </div>
                                    </div> <!-- End Grid View Product -->
                                    <!-- Start List View Product -->
                                    <div class="tab-pane sort-layout-single" id="layout-list">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- Start Product Defautlt Single -->
                                                <div class="product-list-single product-color--golden">
                                                    <a href="product-details-default.html" class="product-list-img-link">
                                                        <img class="img-fluid" src="assets/images/product/default/home-1/default-1.jpg" alt="">
                                                        <img class="img-fluid" src="assets/images/product/default/home-1/default-2.jpg" alt="">
                                                    </a>
                                                    <div class="product-list-content">
                                                        <h5 class="product-list-link"><a href="product-details-default.html">KAOREET LOBORTIS
                                                                SAGIT</a></h5>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                        <span class="product-list-price"><del>$30.12</del>
                                                            $25.12</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Nobis ad, iure incidunt. Ab consequatur temporibus non
                                                            eveniet inventore doloremque necessitatibus sed, ducimus
                                                            quisquam, ad asperiores</p>
                                                        <div class="product-action-icon-link-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to
                                                                cart</a>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                            <a href="wishlist.html" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                            <a href="compare.html" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Product Defautlt Single -->
                                            </div>
                                            <div class="col-12">
                                                <!-- Start Product Defautlt Single -->
                                                <div class="product-list-single product-color--golden">
                                                    <a href="product-details-default.html" class="product-list-img-link">
                                                        <img class="img-fluid" src="assets/images/product/default/home-1/default-3.jpg" alt="">
                                                        <img class="img-fluid" src="assets/images/product/default/home-1/default-4.jpg" alt="">
                                                    </a>
                                                    <div class="product-list-content">
                                                        <h5 class="product-list-link"><a href="product-details-default.html">CONDIMENTUM
                                                                POSUERE</a></h5>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                        <span class="product-list-price">$95.00</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Nobis ad, iure incidunt. Ab consequatur temporibus non
                                                            eveniet inventore doloremque necessitatibus sed, ducimus
                                                            quisquam, ad asperiores</p>
                                                        <div class="product-action-icon-link-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to
                                                                cart</a>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                            <a href="wishlist.html" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                            <a href="compare.html" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Product Defautlt Single -->
                                            </div>
                                            <div class="col-12">
                                                <!-- Start Product Defautlt Single -->
                                                <div class="product-list-single product-color--golden">
                                                    <a href="product-details-default.html" class="product-list-img-link">
                                                        <img class="img-fluid" src="assets/images/product/default/home-1/default-5.jpg" alt="">
                                                        <img class="img-fluid" src="assets/images/product/default/home-1/default-6.jpg" alt="">
                                                    </a>
                                                    <div class="product-list-content">
                                                        <h5 class="product-list-link"><a href="product-details-default.html">ALIQUAM
                                                                LOBORTIS</a></h5>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                        <span class="product-list-price"> $25.12</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Nobis ad, iure incidunt. Ab consequatur temporibus non
                                                            eveniet inventore doloremque necessitatibus sed, ducimus
                                                            quisquam, ad asperiores</p>
                                                        <div class="product-action-icon-link-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to
                                                                cart</a>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                            <a href="wishlist.html" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                            <a href="compare.html" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Product Defautlt Single -->
                                            </div>
                                            <div class="col-12">
                                                <!-- Start Product Defautlt Single -->
                                                <div class="product-list-single product-color--golden">
                                                    <a href="product-details-default.html" class="product-list-img-link">
                                                        <img class="img-fluid" src="assets/images/product/default/home-1/default-7.jpg" alt="">
                                                        <img class="img-fluid" src="assets/images/product/default/home-1/default-8.jpg" alt="">
                                                    </a>
                                                    <div class="product-list-content">
                                                        <h5 class="product-list-link"><a href="product-details-default.html">CONVALLIS QUAM
                                                                SIT</a></h5>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                        <span class="product-list-price">$75.00 - $85.00</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Nobis ad, iure incidunt. Ab consequatur temporibus non
                                                            eveniet inventore doloremque necessitatibus sed, ducimus
                                                            quisquam, ad asperiores</p>
                                                        <div class="product-action-icon-link-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to
                                                                cart</a>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                            <a href="wishlist.html" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                            <a href="compare.html" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Product Defautlt Single -->
                                            </div>
                                            <div class="col-12">
                                                <!-- Start Product Defautlt Single -->
                                                <div class="product-list-single product-color--golden">
                                                    <a href="product-details-default.html" class="product-list-img-link">
                                                        <img class="img-fluid" src="assets/images/product/default/home-1/default-9.jpg" alt="">
                                                        <img class="img-fluid" src="assets/images/product/default/home-1/default-10.jpg" alt="">
                                                    </a>
                                                    <div class="product-list-content">
                                                        <h5 class="product-list-link"><a href="product-details-default.html">DONEC EU LIBERO
                                                                AC</a></h5>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                        <span class="product-list-price"><del>$25.12</del>
                                                            $20.00</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Nobis ad, iure incidunt. Ab consequatur temporibus non
                                                            eveniet inventore doloremque necessitatibus sed, ducimus
                                                            quisquam, ad asperiores</p>
                                                        <div class="product-action-icon-link-list">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to
                                                                cart</a>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                            <a href="wishlist.html" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                            <a href="compare.html" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div> <!-- End Product Defautlt Single -->
                                            </div>
                                        </div>
                                    </div> <!-- End List View Product -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Tab Wrapper -->

                <!-- Start Pagination -->
                <div class="page-pagination text-center aos-init" data-aos="fade-up" data-aos-delay="0">
                    @if ($repuestos->hasPages())
                        <ul >
                            {{-- Enlace "anterior" --}}
                            @if ($repuestos->onFirstPage())
                                <li class="disabled"><span>&laquo;</span></li>
                            @else
                                <li><a href="{{ $repuestos->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif

                            {{-- Elementos de la paginación --}}
                            @foreach ($repuestos->getUrlRange(1, $repuestos->lastPage()) as $page => $url)
                                @if ($page == $repuestos->currentPage())
                                    <li ><a class="active" >{{ $page }}</a></li>
                                @else
                                    <li><a  href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            {{-- Enlace "siguiente" --}}
                            @if ($repuestos->hasMorePages())
                                <li ><a href="{{ $repuestos->nextPageUrl() }}" rel="next"  >&raquo;</a></li>
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

<div class="team-section section-top-gap-100 secton-fluid section-inner-bg">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content text-center">
                            <h3 class="section-title">Tecnicos en Celulares</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section Content Text Area -->
    <div class="team-wrapper">
        <div class="container">
            <div class="row mb-n6">
                <div class="col-xl-3 mb-5">
                    <div class="team-single aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                        <div class="team-img">
                            <img class="img-fluid" src="{{ asset('assetsc/images/team/leader1.png') }}
                            " alt="">
                        </div>
                        <div class="team-content">
                            <h6 class="team-name font--bold mt-5">Ms. Veronica</h6>
                            <span class="team-title">Web Designer</span>
                            <ul class="team-social pos-absolute">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                                <li><a href="#"><i class="ion-social-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-5">
                    <div class="team-single aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="team-img">
                            <img class="img-fluid" src="{{ asset('assetsc/images/team/leader2.png') }}" alt="">
                        </div>
                        <div class="team-content">
                            <h6 class="team-name font--bold mt-5">Missa Santos</h6>
                            <span class="team-title">CEO Founder</span>
                            <ul class="team-social pos-absolute">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                                <li><a href="#"><i class="ion-social-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-5">
                    <div class="team-single aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                        <div class="team-img">
                            <img class="img-fluid" src="{{ asset('assetsc/images/team/leader3.png') }}" alt="">
                        </div>
                        <div class="team-content">
                            <h6 class="team-name font--bold mt-5">Missa Santos</h6>
                            <span class="team-title">Chief Officer</span>
                            <ul class="team-social pos-absolute">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                                <li><a href="#"><i class="ion-social-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 mb-5">
                    <div class="team-single aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
                        <div class="team-img">
                            <img class="img-fluid" src="{{ asset('assetsc/images/team/leader4.png') }}" alt="">
                        </div>
                        <div class="team-content">
                            <h6 class="team-name font--bold mt-5">Lisa Antonia</h6>
                            <span class="team-title">CTO</span>
                            <ul class="team-social pos-absolute">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                                <li><a href="#"><i class="ion-social-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach($repuestos as $repuesto)
{{-- modal compra--}}
        <div class="modal fade" id="modal{{ $repuesto->idproducto }}" tabindex="-1" role="dialog"
            aria-labelledby="modal{{ $repuesto->idproducto }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{-- Hola{{ $repuesto }} --}}
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
                                                    <img src="{{ $repuesto->imagen}}"
                                                        alt="" />
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="{{ $repuesto->imagen}}"
                                                        alt="" />
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="{{ $repuesto->imagen}}"
                                                        alt="" />
                                                </div>
                                                <div class="product-image-large-image swiper-slide img-responsive">
                                                    <img src="{{ $repuesto->imagen}}"
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
                                            <h4 class="title">{{$repuesto->nombre_p}}</h4>
                                            <div class="price">$ {{$repuesto->precio_venta_public}}</div>
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
                                                    <a onclick="" id="{{$repuesto->idproducto}}" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modalAddcart">PEDIR TECNICO</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product Variable Area -->
                                        <div class="modal-product-about-text">
                                            <p>
                                                {{$repuesto->descripcion}}
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
        <div class="modal fade"  id="modalAddcart{{ $repuesto->idproducto }}" tabindex="-1" role="dialog"
            aria-labelledby="modal{{ $repuesto->idproducto }} Label" aria-hidden="true">
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
                                                <img class="img-fluid" src="{{$repuesto->imagen}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="modal-add-cart-info">
                                                <i class="fa fa-check-square"></i>VAS A PDIR EL SIGUEINTE PRODUCTOP!
                                            </div>
                                            <div class="modal-add-cart-product-cart-buttons">
                                                @guest('client')
                                                    <a href="{{ route('login_cliente') }}">Iniciar Sesión</a>
                                                @else
                                                    {{-- <a href="{{ route('payment.create', $product[0]) }}">Realizar
                                                        Pedido</a> --}}

                                                @endguest

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 modal-border">
                                    <ul class="modal-add-cart-product-shipping-info">
                                        <li>
                                            <strong><i class="icon-shopping-cart"></i> Precio del producto sin costo de reparacion.</strong>
                                        </li>
                                        <li><strong>TOTAL PRICE: </strong> <span>{{$repuesto->precio_venta_public}}</span></li>
                                        <li class="modal-continue-button">
                                            <a href="#" data-bs-dismiss="modal">CONTINUAR COMPRA</a>
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
