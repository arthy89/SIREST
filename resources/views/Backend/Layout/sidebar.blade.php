<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="">
            <img src="{{ asset('assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Sirest Develop</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse  w-auto h-auto ps " id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link text-white {{ Str::startsWith(request()->url(), route('dashboard')) ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            @if (Auth::guard('web')->user()->rolid == 1)
                <li class="nav-item">
                    <a class="nav-link text-white {{ Str::startsWith(request()->url(), route('usuarios')) ? 'active bg-gradient-primary' : '' }}"
                        href="{{ route('usuarios') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons">group</i>
                        </div>
                        <span class="nav-link-text ms-1">Usuarios</span>
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link text-white {{ Str::startsWith(request()->url(), route('clientes')) ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('clientes') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons">group</i>
                    </div>
                    <span class="nav-link-text ms-1">Clientes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Str::startsWith(request()->url(), route('reparaciones')) ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('reparaciones') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons">construction</i>
                    </div>
                    <span class="nav-link-text ms-1">Reparaciones</span>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#componentsExamples"
                    class="nav-link text-white {{ Str::startsWith(request()->url(), route('ventas')) ? 'active bg-gradient-primary' : '' }} collapsed"
                    aria-controls="componentsExamples" role="button" aria-expanded="false">
                    <i
                        class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">view_in_ar</i>
                    <span class="nav-link-text ms-2 ps-1">Ventas</span>
                </a>
                <div class="collapse {{ Str::startsWith(request()->url(), route('ventas')) ? 'show' : '' }}"
                    id="componentsExamples">
                    <ul class="nav ">
                        <li class="nav-item ">
                            <a class="nav-link text-white active" href="{{ route('ventas') }}">
                                <span class="sidenav-mini-icon"> V </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Venta </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white " href="{{ route('resumenventas') }}" target="_blank">
                                <span class="sidenav-mini-icon"> R </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Resumen Ventas </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pagesExamples"
                    class="nav-link text-white {{ Str::startsWith(request()->url(), [route('proveedor'), route('categorias'), route('productos')]) ? 'active bg-gradient-primary' : '' }} collapsed"
                    aria-controls="pagesExamples" role="button" aria-expanded="false">
                    <i
                        class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">category</i>
                    <span class="nav-link-text ms-2 ps-1">Inventario</span>
                </a>
                <div class="collapse {{ Str::startsWith(request()->url(), [route('proveedor'), route('categorias'), route('productos')]) ? 'show' : '' }}"
                    id="pagesExamples">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Str::startsWith(request()->url(), route('proveedor')) ? 'active' : '' }}"
                                href="{{ route('proveedor') }}">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal ms-2 ps-1"> Proveedores </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Str::startsWith(request()->url(), route('categorias')) ? 'active' : '' }}"
                                href="{{ route('categorias') }}">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal ms-2 ps-1"> Categorias </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Str::startsWith(request()->url(), route('productos')) ? 'active' : '' }}"
                                href="{{ route('productos') }}">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal ms-2 ps-1"> Productos </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>




            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#ecommerceExamples"
                    class="nav-link text-white {{ Str::startsWith(request()->url(), [route('slider'), route('promociones')]) ? 'active bg-gradient-primary' : '' }} collapsed"
                    aria-controls="ecommerceExamples" role="button" aria-expanded="false">
                    <i
                        class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">shopping_basket</i>
                    <span class="nav-link-text ms-2 ps-1">Ecommerce</span>
                </a>
                <div class="collapse {{ Str::startsWith(request()->url(), [route('slider'), route('promociones')]) ? 'show' : '' }}"
                    id="ecommerceExamples" style="">
                    <ul class="nav ">
                        <li class="nav-item ">
                            <a class="nav-link text-white {{ Str::startsWith(request()->url(), route('slider')) ? 'active' : '' }}"
                                href="{{ route('slider') }}">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Slider </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white {{ Str::startsWith(request()->url(), route('promociones')) ? 'active' : '' }}"
                                href="{{ route('promociones') }}">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Promociones </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item mt-3">
                {{-- <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li> --}}
            <li class="nav-item">
                <form action="{{ route('logout-admin') }}" method="POST">
                    @csrf
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-outline-danger"><i
                                class="material-icons opacity-10">logout</i> Cerrar Sesión</button>
                    </div>


                </form>
            </li>
        </ul>
    </div>

</aside>
