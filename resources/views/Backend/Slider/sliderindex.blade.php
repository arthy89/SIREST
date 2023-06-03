@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('crear_slider') }}" class="btn btn-info">
                        <i class="material-icons">add</i>
                        AGREGAR
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white ps-3">Lista De Sliders</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-5">
                            @foreach ($slider as $sliders)
                            <div class="col-lg-6 col-md-6">
                                <div class="card" data-animation="true">
                                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                        <a class="d-block blur-shadow-image">

                                            <img src="{{ asset($sliders->imagen) }}" alt="img-blur-shadow"
                                                class="img-fluid shadow border-radius-lg">
                                        </a>
                                        <div class="colored-shadow"
                                            style="background-image: url(&quot;../../assets/img/products/product-1-min.jpg&quot;);">
                                        </div>
                                    </div>

                                    <div class="card-body text-center">
                                        <div class="d-flex mt-n6 mx-auto">
                                            <a class="btn btn-link text-primary ms-auto border-0" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" data-bs-original-title="Refresh">
                                                <i class="material-icons text-lg">refresh</i>
                                            </a>
                                            <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" data-bs-original-title="Edit">
                                                <i class="material-icons text-lg">edit</i>
                                            </button>
                                        </div>
                                        <div class="hero-slider-content">
                                            {!! html_entity_decode($sliders->htmlcode ) !!}

                                        </div>
                                    </div>


                                    <hr class="dark horizontal my-0">
                                    <div class="card-footer d-flex">

                                    </div>
                                </div>
                            </div>


                        </div>
                    @endforeach

                    </div>
                </div>
            </div>
        </div>
        {{-- <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer> --}}
    </div>
@endsection
@push('custom-js')
@endpush
