@extends('Backend.Layout.app')

@push('custom-css')
    <style>
        .minuscula {
            text-transform: lowercase;
        }

        .white-background {
            background-color: white;
        }
    </style>
@endpush

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-4">
                <a class="btn bg-gradient-primary" href="#" onclick="printContent()">Imprimir</a>
            </div>
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Factura</h6>
                        </div>
                    </div>
                    {{-- imprimir --}}
                    <div class="card-body p-5" id="printSection">
                        <div class="row">
                            <h6 class="text-white bg-gray-800 text-center">FACTURA DE REPARACIÓN</h6>
                        </div>

                        <div class="factura">
                            <div class="row cabecera">
                                <div class="col-6">
                                    {{-- logo --}}
                                    <div align="center">
                                        @if ($negocio[0]->neg_img)
                                            <img src="{{ asset('storage/' . $negocio[0]->neg_img) }}" width="100">
                                        @else
                                            <img src="{{ asset('imgs/noimage.jpg') }}" width="100"
                                                class="img-fluid border-radius-lg">
                                        @endif
                                        <h1 class="mx-2">{{ $negocio[0]->neg_nombre }}</h1>
                                    </div>
                                    <div class="mx-4 mb-2">
                                        <p class="text-xs text-dark mb-0 text-uppercase">
                                            <strong>Teléfono:</strong> +{{ $negocio[0]->neg_cod }}
                                            {{ $negocio[0]->neg_telefono }}
                                        </p>
                                        <p class="text-xs text-dark mb-0">
                                            <strong class="text-uppercase">Correo:</strong> {{ $negocio[0]->neg_correo }}
                                        </p>
                                        <p class="text-xs text-dark mb-0 text-uppercase">
                                            <strong>Dirección:</strong> {{ $negocio[0]->neg_direccion }} -
                                            <strong>{{ $negocio[0]->neg_pais }}</strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    {{-- numero de factura --}}
                                    <div class="row ">
                                        <h6 class="text-white bg-gray-800 text-center mb-0">FECHA | NÚMERO DE
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
                                                    <p class="text-xs text-dark mb-0 border-end">
                                                        {{ date('d/m/Y - h:i:s A', strtotime($rep_actual[0]->fecha)) }}
                                                    </p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="text-end text-xs text-dark mb-0">{{ $resultado }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- datos del cliente --}}
                                    <div class="row">
                                        <h6 class="text-white text-center bg-gray-800 px-3 mb-0">DATOS DEL CLIENTE</h6>
                                        <div class="border-bottom border-start border-end mb-2"">
                                            <p class="text-xs text-dark mb-0 text-uppercase"><strong>Nombre:</strong>
                                                {{ $rep_actual[0]->nombres }} {{ $rep_actual[0]->persona_apellidos }}</p>
                                            <p class="text-xs text-dark mb-0 text-uppercase"><strong>Teléfono:</strong>
                                                +{{ $rep_actual[0]->cod }} {{ $rep_actual[0]->persona_telefono }}</p>
                                            <strong class="text-xs text-dark mb-0 text-uppercase">Correo:</strong>
                                            <p class="d-inline minuscula text-xs text-dark mb-0">
                                                {{ $rep_actual[0]->email }}</p>

                                            <p class="text-xs text-dark mb-0 text-uppercase"><strong>Dirección:</strong>
                                                {{ $rep_actual[0]->direccionfiscal }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- datos de raparacion --}}
                            <div class="row">
                                <h6 class="text-white bg-gray-800 px-3 text-center mb-0">DETALLES DE REPARACIÓN</h6>
                                <div class="border-bottom border-start border-end mb-2 mt-2">
                                    <div class="mx-4">
                                        <p class="text-xs text-dark mb-0 text-uppercase"><strong>Dispositivo:</strong>
                                            {{ $rep_actual[0]->device_name }} - {{ $rep_actual[0]->device_mark }}</p>
                                        <p class="text-xs text-dark mb-0 text-uppercase"><strong>IMEI:</strong>
                                            @if ($rep_actual[0]->imei)
                                                {{ $rep_actual[0]->imei }}
                                            @endif
                                        </p>
                                        <p class="text-xs text-dark mb-0"><strong
                                                class="text-uppercase">Contraseña:</strong>
                                            @if ($rep_actual[0]->contrasena)
                                                {{ $rep_actual[0]->contrasena }}
                                            @endif
                                        </p>
                                        <p class="text-xs text-dark mb-0 text-uppercase"><strong>PATRON:</strong>
                                            @if ($rep_actual[0]->patron)
                                                {{ $rep_actual[0]->patron }}
                                            @endif
                                        </p>
                                        <p class="text-xs text-dark mb-0"><strong
                                                class="text-uppercase">Descripción:</strong>
                                            @if ($rep_actual[0]->descripcion)
                                                {{ $rep_actual[0]->descripcion }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="row px-5 mt-2 mb-2">
                                        <table class="text-xs text-dark">
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
                                                @else
                                                    @php
                                                        $total_t = 0;
                                                    @endphp
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row justify-content-end text-xxs text-uppercase mx-2 mb-2 text-dark">
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
                                                <td class="border px-2 text-end">$ {{ $rep_actual[0]->costo_envio }}</td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $total_recibo = $total_t + $impuesto + $rep_actual[0]->costo_envio - $rep_actual[0]->adelanto;
                                                @endphp
                                                <th class="bg-gray-800 text-white px-2 text-xs text-bold">TOTAL</th>
                                                <td class="border px-2 text-end text-xs text-bold">$ {{ $total_recibo }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <h6 class="text-white bg-gray-800 px-3 text-center mb-0">GARANTÍA</h6>
                                    <div class="border-bottom border-start border-end mb-2">
                                        <p class="text-xs text-dark mb-0">
                                            {{ $negocio[0]->neg_garantia }}
                                        </p>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <h6 class="px-3 text-center mt-6 border-top w-50">NOMBRE Y FIRMA DEL CLIENTE</h6>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('custom-scripts')
        <script>
            function printContent() {
                var printContent = document.getElementById("printSection").innerHTML;
                var originalContent = document.body.innerHTML;

                // Agregar la clase al body
                document.body.classList.remove("bg-gray-200");
                document.body.classList.add("bg-gray-0");

                document.body.innerHTML = printContent;
                window.print();
                document.body.innerHTML = originalContent;

                // Remover la clase del body después de imprimir
                document.body.classList.add("bg-gray-200");
                document.body.classList.remove("bg-gray-0");
            }
        </script>
    @endpush
