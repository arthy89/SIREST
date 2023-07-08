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
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart">+ Agregar Carrito</a>
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

                        <!-- Start Product Details Tab Content -->
                        {{-- <div class="product-details-content-tab">
                            <div class="tab-content">
                                <!-- Start Product Details Tab Content Singel -->
                                <div class="tab-pane show active" id="description">
                                    <div class="single-tab-content-item">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue
                                            nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi
                                            ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate
                                            adipiscing cursus eu, suscipit id nulla. </p>
                                        <p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem,
                                            quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies
                                            massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero
                                            hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus
                                            nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus,
                                            consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in
                                            imperdiet ligula euismod eget</p>
                                    </div>
                                </div> <!-- End Product Details Tab Content Singel -->
                                <!-- Start Product Details Tab Content Singel -->
                                <div class="tab-pane" id="specification">
                                    <div class="single-tab-content-item">
                                        <table class="table table-bordered mb-20">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Material</th>
                                                    <td>vidrio templado</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Estilos</th>
                                                    <td>nuevos</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Prodpiedades</th>
                                                    <td>Economicos</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p>Fashion has been creating well-designed collections since 2010. The brand
                                            offers feminine designs delivering stylish separates and statement dresses
                                            which have since evolved into a full ready-to-wear collection in which every
                                            item is a vital part of a woman's wardrobe. The result? Cool, easy, chic
                                            looks with youthful elegance and unmistakable signature style. All the
                                            beautiful pieces are made in Italy and manufactured with the greatest
                                            attention. Now Fashion extends to a range of accessories including shoes,
                                            hats, belts and more!</p>
                                    </div>
                                </div> <!-- End Product Details Tab Content Singel -->
                                <!-- Start Product Details Tab Content Singel -->
                                {{-- <div class="tab-pane" id="review">
                                <div class="single-tab-content-item">
                                    <!-- Start - Review Comment -->
                                    <ul class="comment">
                                        <!-- Start - Review Comment list-->
                                        <li class="comment-list">
                                            <div class="comment-wrapper">
                                                <div class="comment-img">
                                                    <img src="assets/images/user/image-1.png" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-content-top">
                                                        <div class="comment-content-left">
                                                            <h6 class="comment-name">Kaedyn Fraser</h6>
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
                                                        <div class="comment-content-right">
                                                            <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>

                                                    <div class="para-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Tempora inventore dolorem a unde modi iste odio amet,
                                                            fugit fuga aliquam, voluptatem maiores animi dolor nulla
                                                            magnam ea! Dignissimos aspernatur cumque nam quod sint
                                                            provident modi alias culpa, inventore deserunt
                                                            accusantium amet earum soluta consequatur quasi eum eius
                                                            laboriosam, maiores praesentium explicabo enim dolores
                                                            quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam
                                                            officia, saepe repellat. </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Start - Review Comment Reply-->
                                            <ul class="comment-reply">
                                                <li class="comment-reply-list">
                                                    <div class="comment-wrapper">
                                                        <div class="comment-img">
                                                            <img src="assets/images/user/image-2.png" alt="">
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-content-top">
                                                                <div class="comment-content-left">
                                                                    <h6 class="comment-name">Oaklee Odom</h6>
                                                                </div>
                                                                <div class="comment-content-right">
                                                                    <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                                </div>
                                                            </div>

                                                            <div class="para-content">
                                                                <p>Lorem ipsum dolor sit amet, consectetur
                                                                    adipisicing elit. Tempora inventore dolorem a
                                                                    unde modi iste odio amet, fugit fuga aliquam,
                                                                    voluptatem maiores animi dolor nulla magnam ea!
                                                                    Dignissimos aspernatur cumque nam quod sint
                                                                    provident modi alias culpa, inventore deserunt
                                                                    accusantium amet earum soluta consequatur quasi
                                                                    eum eius laboriosam, maiores praesentium
                                                                    explicabo enim dolores quaerat! Voluptas ad
                                                                    ullam quia odio sint sunt. Ipsam officia, saepe
                                                                    repellat. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul> <!-- End - Review Comment Reply-->
                                        </li> <!-- End - Review Comment list-->
                                        <!-- Start - Review Comment list-->
                                        <li class="comment-list">
                                            <div class="comment-wrapper">
                                                <div class="comment-img">
                                                    <img src="assets/images/user/image-3.png" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-content-top">
                                                        <div class="comment-content-left">
                                                            <h6 class="comment-name">Jaydin Jones</h6>
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
                                                        <div class="comment-content-right">
                                                            <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>

                                                    <div class="para-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Tempora inventore dolorem a unde modi iste odio amet,
                                                            fugit fuga aliquam, voluptatem maiores animi dolor nulla
                                                            magnam ea! Dignissimos aspernatur cumque nam quod sint
                                                            provident modi alias culpa, inventore deserunt
                                                            accusantium amet earum soluta consequatur quasi eum eius
                                                            laboriosam, maiores praesentium explicabo enim dolores
                                                            quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam
                                                            officia, saepe repellat. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li> <!-- End - Review Comment list-->
                                    </ul> <!-- End - Review Comment -->
                                    <div class="review-form">
                                        <div class="review-form-text-top">
                                            <h5>ADD A REVIEW</h5>
                                            <p>Your email address will not be published. Required fields are marked
                                                *</p>
                                        </div>

                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="default-form-box">
                                                        <label for="comment-name">Your name <span>*</span></label>
                                                        <input id="comment-name" type="text" placeholder="Enter your name" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="default-form-box">
                                                        <label for="comment-email">Your Email <span>*</span></label>
                                                        <input id="comment-email" type="email" placeholder="Enter your email" required="">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="default-form-box">
                                                        <label for="comment-review-text">Your review
                                                            <span>*</span></label>
                                                        <textarea id="comment-review-text" placeholder="Write a review" required=""></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-black-default-hover" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                            </div>
                        </div>  --}}
                        <!-- End Product Details Tab Content -->

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
                                <p>Explore la colección de nuestros productos similares</p>
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
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modalAddcart">Agregar +</a>
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
@endsection
