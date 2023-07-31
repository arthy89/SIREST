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
                <a class="btn bg-gradient-primary" href="" onclick="printContent()">Imprimir</a>
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
                        <div class="factura">
                            <div class="row cabecera">
                                <div class="row justify-content-center">
                                    {{-- logo --}}
                                    <div align="center">
                                        @if ($negocio[0]->neg_img)
                                            <img src="{{ asset('storage/' . $negocio[0]->neg_img) }}" width="100">
                                        @else
                                            <img src="{{ asset('imgs/noimage.jpg') }}" width="100"
                                                class="img-fluid border-radius-lg">
                                        @endif
                                        <h1 class="mx-2" style=" font-weight: normal; color: black;">{{ $negocio[0]->neg_nombre }}</h1>
                                    </div>
                                    <div class="mx-4 mb-2" align="center">
                                        <p class="text-xs mb-0 text-uppercase" style="color: black;">
                                            <strong style="color: black; font-weight: normal;">Teléfono:</strong> +{{ $negocio[0]->neg_cod }}
                                            {{ $negocio[0]->neg_telefono }}
                                        </p>
                                        <p class="text-xs mb-0" style="color: black; font-weight: normal;">
                                            <strong class="text-uppercase" style="font-weight: normal;">Correo:</strong> {{ $negocio[0]->neg_correo }}
                                        </p>
                                        <p class="text-xs mb-0 text-uppercase" style="color: black; ">
                                            <strong style="font-weight: normal;">Dirección:</strong> {{ $negocio[0]->neg_direccion }} -
                                            <strong>{{ $negocio[0]->neg_pais }}</strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    {{-- numero de factura --}}
                                    <div class="row">
                                        <p class="text-xs mb-0 text-uppercase" style="color: black;">
                                            <strong style="font-weight: normal;">Fecha de emisión:</strong> {{ now()->format('d/m/Y - h:i:s A') }}
                                        </p>
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
                                        <p class="text-xs mb-0 text-uppercase" style="color: black;" >
                                            <strong style="font-weight: normal;">Número de Factura:</strong> {{ $resultado }}
                                        </p>
                                    </div>

                                    {{-- datos del cliente --}}
                                    <div class="row">
                                        <h6 class="text-center px-3 mb-0" style="color: black; font-weight: normal;">DATOS DEL CLIENTE</h6>
                                        <div class="mb-2">
                                            <p class="text-xs mb-0 text-uppercase" style="color: black; ">
                                                <strong style="font-weight: normal;">Nombre:</strong>
                                                {{ $rep_actual[0]->nombres }} {{ $rep_actual[0]->persona_apellidos }}
                                            </p>
                                            <p class="text-xs mb-0 text-uppercase" style="color: black; ">
                                                <strong style="font-weight: normal;">Teléfono:</strong>
                                                +{{ $rep_actual[0]->cod }} {{ $rep_actual[0]->persona_telefono }}
                                            </p>
                                            <p class="text-xs mb-0 text-uppercase" style="color: black; ">
                                                <strong style="font-weight: normal;">Correo:</strong>{{ $rep_actual[0]->email }}
                                            </p>
                                            <p class="text-xs mb-0 text-uppercase" style="color: black; ">
                                                <strong style="font-weight: normal;">Dirección:</strong>
                                                {{ $rep_actual[0]->direccionfiscal }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- datos de raparacion --}}
                            <div class="row">
                                <h6 class="px-3 text-center mb-0" style=" font-weight: normal; color: black; ">DETALLES DE REPARACIÓN</h6>
                                <div class="mb-2 mt-2">
                                    <div class="mx-4">
                                        <p class="text-xs mb-0 text-uppercase" style="color: black;">
                                            <strong style="font-weight: normal;">Dispositivo:</strong>
                                            {{ $rep_actual[0]->device_name }} - {{ $rep_actual[0]->device_mark }}
                                        </p>
                                        <p class="text-xs mb-0 text-uppercase" style="color: black; font-weight: normal;"><strong style="font-weight: normal;"> Fecha de
                                                Ingreso:</strong>
                                            {{ date('d/m/Y - h:i:s A', strtotime($rep_actual[0]->fecha)) }}</p>
                                        <p class="text-xs mb-0" style="color: black;"><strong
                                                class="text-uppercase" style="font-weight: normal;">Descripción:</strong>
                                            @if ($rep_actual[0]->descripcion)
                                                {{ $rep_actual[0]->descripcion }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="row px-5 mt-2 mb-2">
                                        <table class="text-xs" style="color: black;">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-uppercase"></th>
                                                    <th scope="col" class="text-center text-uppercase" style="font-weight: normal;">Cantidad</th>
                                                    <th scope="col" class="text-center text-uppercase" style="font-weight: normal;">Precio</th>
                                                    <th scope="col" class="text-center text-uppercase" style="font-weight: normal;">Total</th>
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
                                                                        class="text-uppercase" style="font-weight: normal;">{{ $item->tipo }}</strong>
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
                                                                        class="text-uppercase" style="font-weight: normal;">{{ $item->tipo }}</strong>
                                                                    -
                                                                    {{ $item->nombre }}</td>
                                                                <td class="text-center" style="font-weight: normal;">{{ $item->cantidad }}</td>
                                                                <td class="text-center" style="font-weight: normal;">{{ $item->precio }}</td>
                                                                <td class="text-center" style="font-weight: normal;">$ {{ $total }}</td>
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
                                    <div class="row justify-content-end text-xxs text-uppercase mx-2 mb-2"
                                        style="color: black;">
                                        <table style="width:250px">
                                            <tr>
                                                <th class=" px-2" style="font-weight: normal;">Subtotal</th>
                                                <td class=" px-2 text-end" style="font-weight: normal;" >$ {{ $total_t }}</td>
                                            </tr>
                                            <tr>
                                                <th class="px-2"style="font-weight: normal;">Adelanto</th>
                                                <td class=" px-2 text-end">$ {{ $rep_actual[0]->adelanto }}</td>
                                            </tr>
                                            <tr>
                                                <th class=" px-2"style="font-weight: normal;" >Impuesto
                                                    {{ $rep_actual[0]->impuesto }}%</th>
                                                @php
                                                    $impuesto = $total_t * ($rep_actual[0]->impuesto / 100);
                                                @endphp
                                                <td class=" px-2 text-end">$ {{ $impuesto }}</td>
                                            </tr>
                                            <tr>
                                                <th class=" px-2" style="font-weight: normal;">Envío</th>
                                                <td class=" px-2 text-end">$ {{ $rep_actual[0]->costo_envio }}</td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $total_recibo = $total_t + $impuesto + $rep_actual[0]->costo_envio - $rep_actual[0]->adelanto;
                                                @endphp
                                                <th class=" px-2 text-xs text-bold" style="font-weight: normal;">TOTAL</th>
                                                <td class=" px-2 text-end text-xs text-bold">$ {{ $total_recibo }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <h6 class="px-3 text-center mb-0"  FACE="raro, courier" style="color: black; font-weight: normal;">GARANTÍA</h6>
                                    {{-- <p class="text-xs mb-0" style="color: black;">
                                        GARANTIA
                                    </p> --}}
                                    <div class="mb-2">
                                        <p class="text-xs mb-0" style="color: black;">
                                            {{ $negocio[0]->neg_garantia }}
                                        </p>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <h6 class="px-3 text-center mt-8 border-top w-50"
                                        style= " font-weight: normal; color: black; ">NOMBRE Y FIRMA
                                        DEL CLIENTE</h6>
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
