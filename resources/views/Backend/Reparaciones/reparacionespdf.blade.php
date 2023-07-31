<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">



    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>
        SIREST
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/fotos.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.0.5') }}" rel="stylesheet" />

    <!-- Notificacionoes -->
    <link rel="stylesheet" href="{{ asset('assetsnotf/css/Lobibox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsnotf/css/notifications.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

    <link type="text/css" rel="shortcut icon" href="{{ asset('assetsnotf/img/logo-mywebsite-urian-viera.svg') }}" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->

    {{-- SELECT2 --}}
    <link rel="stylesheet" href="{{ asset('assets/select2/select2.min.css') }}">

    <style>
        .swal2-title {
            font-family: 'Roboto', sans-serif;
        }

        .select2-selection__rendered {
            line-height: 34px !important;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-selection__arrow {
            height: 35px !important;
        }
    </style>

    <style>
        .pagination .page-item.active .page-link {
            color: white;
        }
    </style>

</head>

<body>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-4">
                <a class="btn bg-gradient-primary" href="{{ route('reparaciones_pdf', $rep_actual[0]) }}">Imprimir</a>
            </div>
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Factura</h6>
                        </div>
                    </div>
                    <div class="card-body p-5" id="print-section">
                        <div class="row">
                            <h6 class="text-white bg-gray-800 p-2 text-center">FACTURA DE REPARACIÓN</h6>
                        </div>

                        <div class="factura">
                            <div class="row cabecera">
                                <div class="col-6">
                                    {{-- logo --}}
                                    @if ($negocio[0]->neg_img)
                                        <img src="{{ asset('storage/' . $negocio[0]->neg_img) }}" width="150">
                                    @else
                                        <img src="{{ asset('imgs/noimage.jpg') }}" alt="" width="150"
                                            class="img-fluid border-radius-lg">
                                    @endif
                                    <h1 class="mx-2 d-inline">{{ $negocio[0]->neg_nombre }}</h1>
                                    <p class="text-lg text-dark mb-0 text-uppercase">
                                        <strong>Teléfono:</strong> +{{ $negocio[0]->neg_cod }}
                                        {{ $negocio[0]->neg_telefono }}
                                    </p>
                                    <p class="text-lg text-dark mb-0">
                                        <strong class="text-uppercase">Correo:</strong> {{ $negocio[0]->neg_correo }}
                                    </p>
                                    <p class="text-lg text-dark mb-0 text-uppercase">
                                        <strong>Dirección:</strong> {{ $negocio[0]->neg_direccion }} -
                                        <strong>{{ $negocio[0]->neg_pais }}</strong>
                                    </p>
                                </div>
                                <div class="col-6">
                                    {{-- numero de factura --}}
                                    <div class="row ">
                                        <h6 class="text-white bg-gray-800 py-1 px-3 text-center mb-0">FECHA | NÚMERO DE
                                            FACTURA</h6>
                                        @php
                                            $numero = $rep_actual[0]->idpedido;
                                            $digitos = strlen((string) $numero);

                                            if ($digitos <= 7) {
                                                $numeroFormateado = str_pad($numero, 7, '0', STR_PAD_LEFT);
                                                $resultado = 'REP-' . $numeroFormateado;
                                            } else {
                                                $resultado = $numero;
                                            }
                                        @endphp


                                        <div class="border-bottom border-start border-end mb-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="text-lg text-dark mb-0 border-end">
                                                        {{ date('d/m/Y - h:i:s A', strtotime($rep_actual[0]->fecha)) }}
                                                    </p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="text-end text-lg text-dark mb-0">{{ $resultado }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- datos del cliente --}}
                                    <div class="row">
                                        <h6 class="text-white text-center bg-gray-800 py-1 px-3 mb-0">DATOS DEL CLIENTE
                                        </h6>
                                        <div class="border-bottom border-start border-end mb-2"">
                                            <p class="text-lg text-dark mb-0 text-uppercase"><strong>Nombre:</strong>
                                                {{ $rep_actual[0]->nombres }} {{ $rep_actual[0]->persona_apellidos }}
                                            </p>
                                            <p class="text-lg text-dark mb-0 text-uppercase"><strong>Teléfono:</strong>
                                                +{{ $rep_actual[0]->cod }} {{ $rep_actual[0]->persona_telefono }}</p>
                                            <strong class="text-lg text-dark mb-0 text-uppercase">Correo:</strong>
                                            <p class="d-inline minuscula text-lg text-dark mb-0">
                                                {{ $rep_actual[0]->email }}</p>

                                            <p class="text-lg text-dark mb-0 text-uppercase"><strong>Dirección:</strong>
                                                {{ $rep_actual[0]->direccionfiscal }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- datos de raparacion --}}
                            <div class="row">
                                <h6 class="text-white bg-gray-800 py-1 px-3 text-center mb-0" style="font-weight: normal;">DETALLES DE REPARACIÓN
                                </h6>
                                <div class="border-bottom border-start border-end mb-2">
                                    <p class="text-lg text-dark mb-0 text-uppercase"><strong>Dispositivo:</strong>
                                        {{ $rep_actual[0]->device_name }} - {{ $rep_actual[0]->device_mark }}</p>
                                    <p class="text-lg text-dark mb-0 text-uppercase"><strong>IMEI:</strong>
                                        @if ($rep_actual[0]->imei)
                                            {{ $rep_actual[0]->imei }}
                                        @endif
                                    </p>
                                    <p class="text-lg text-dark mb-0"><strong
                                            class="text-uppercase">Contraseña:</strong>
                                        @if ($rep_actual[0]->contrasena)
                                            {{ $rep_actual[0]->contrasena }}
                                        @endif
                                    </p>
                                    <p class="text-lg text-dark mb-0 text-uppercase"><strong>PATRON:</strong>
                                        @if ($rep_actual[0]->patron)
                                            {{ $rep_actual[0]->patron }}
                                        @endif
                                    </p>
                                    <p class="text-lg text-dark mb-0"><strong
                                            class="text-uppercase">Descripción:</strong>
                                        @if ($rep_actual[0]->descripcion)
                                            {{ $rep_actual[0]->descripcion }}
                                        @endif
                                    </p>
                                    <div class="row px-5">
                                        <table class="table table-responsive text-sm text-dark">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-uppercase">Item</th>
                                                    <th scope="col" class="text-center text-uppercase">Cantidad</th>
                                                    <th scope="col" class="text-center text-uppercase">Precio</th>
                                                    <th scope="col" class="text-center text-uppercase">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($rep_actual[0]->lista_pedido)
                                                    @php
                                                        $total_t = 0;
                                                    @endphp
                                                    @foreach (json_decode($rep_actual[0]->lista_pedido) as $item)
                                                        <tr>
                                                            @if ($item->tipo == 'servicio')
                                                                @php
                                                                    $total_t = $total_t + $item->precio;
                                                                @endphp
                                                                <td><strong
                                                                        class="text-uppercase">{{ $item->tipo }}</strong>
                                                                    -
                                                                    {{ $item->nombre }}</td>
                                                                <td class="text-center">{{ $item->cantidad }}</td>
                                                                <td class="text-center">{{ $item->precio }}</td>
                                                                <td class="text-center">$ {{ $item->precio }}</td>
                                                            @else
                                                                @php
                                                                    $total = $item->precio * $item->cantidad;
                                                                    $total_t = $total_t + $total;
                                                                @endphp
                                                                <td><strong
                                                                        class="text-uppercase">{{ $item->tipo }}</strong>
                                                                    -
                                                                    {{ $item->nombre }}</td>
                                                                <td class="text-center">{{ $item->cantidad }}</td>
                                                                <td class="text-center">{{ $item->precio }}</td>
                                                                <td class="text-center">$ {{ $total }}</td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row justify-content-end text-sm text-uppercase mx-2 mb-2 text-dark">
                                        <table style="width:350px">
                                            <tr>
                                                <th class="bg-gray-800 text-white px-2">Subtotal</th>
                                                <td class="border px-2 text-end">$ {{ $total_t }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-gray-800 text-white px-2">Adelanto</th>
                                                <td class="border px-2 text-end">$ {{ $rep_actual[0]->adelanto }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-gray-800 text-white px-2">Impuesto
                                                    {{ $rep_actual[0]->impuesto }}%</th>
                                                @php
                                                    $impuesto = $total_t * ($rep_actual[0]->impuesto / 100);
                                                @endphp
                                                <td class="border px-2 text-end">$ {{ $impuesto }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-gray-800 text-white px-2">Envío</th>
                                                <td class="border px-2 text-end">$ {{ $rep_actual[0]->costo_envio }}
                                                </td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $total_recibo = $total_t + $impuesto + $rep_actual[0]->costo_envio - $rep_actual[0]->adelanto;
                                                @endphp
                                                <th class="bg-gray-800 text-white px-2 text-md text-bold">TOTAL</th>
                                                <td class="border px-2 text-end text-md text-bold">$
                                                    {{ $total_recibo }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <h6 class="text-white bg-gray-800 py-1 px-3 text-center mb-0" style="font-weight: normal;">GARANTÍA</h6>
                                    <div class="border-bottom border-start border-end mb-2">
                                        <p class="text-lg text-dark mb-0">
                                            {{ $negocio[0]->neg_garantia }}
                                        </p>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <h6 class="py-1 px-3 text-center mt-8 border-top w-30">FIRMA</h6>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
    <script src="{{ asset('assets/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/sweetalert/sweetalert2@11.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    {{-- databale responsive --}}
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

    <script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
    <script src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
    <script src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/js/plugins/datatables.js"
        type="text/javascript"></script>
    <!-- Libreria js para las Notificaciones -->
    <script src="{{ asset('assetsnotf/js/Lobibox.js') }}"></script>
    <script src="{{ asset('assetsnotf/js/notification-active.js') }}"></script>
    {{-- <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script> --}}
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.5') }}"></script>
    <script>
        function r(e) {
            var t = document.querySelectorAll(".navbar-main .nav-link"),
                a = document.querySelectorAll(".navbar-main .sidenav-toggler-line");
            "blur" === e ? (t.forEach(e => {
                    e.classList.remove("text-body")
                }),
                a.forEach(e => {
                    e.classList.add("bg-dark")
                })) : "transparent" === e && (t.forEach(e => {
                    e.classList.add("text-body")
                }),
                a.forEach(e => {
                    e.classList.remove("bg-dark")
                }))
        }
        document.querySelector(".sidenav-toggler") && (sidenavToggler = document.getElementsByClassName("sidenav-toggler")[
                0],
            sidenavShow = document.getElementsByClassName("g-sidenav-show")[0],
            toggleNavbarMinimize = document.getElementById("navbarMinimize"),
            sidenavShow) && (sidenavToggler.onclick = function() {
            sidenavShow.classList.contains("g-sidenav-hidden") ? (sidenavShow.classList.remove("g-sidenav-hidden"),
                sidenavShow.classList.add("g-sidenav-pinned"),
                toggleNavbarMinimize && (toggleNavbarMinimize.click(),
                    toggleNavbarMinimize.removeAttribute("checked"))) : (sidenavShow.classList.remove(
                    "g-sidenav-pinned"),
                sidenavShow.classList.add("g-sidenav-hidden"),
                toggleNavbarMinimize && (toggleNavbarMinimize.click(),
                    toggleNavbarMinimize.setAttribute("checked", "true")))
        });
    </script>

</body>

</html>
