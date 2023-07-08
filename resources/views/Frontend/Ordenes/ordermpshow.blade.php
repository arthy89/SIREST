@extends('Frontend.Layout.app')

@section('main-content')
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">REP-{{ str_pad($pedido->idpedido, 7, '0', STR_PAD_LEFT) }}</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="{{ route('home-client') }}">Home</a></li>
                                    <li><a href="{{ route('ecomerce_categorias') }}">ecommerce</a></li>
                                    <li class="active" aria-current="page">detalles del pedido</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="table_page table-responsive">
                            <table>
                                <!-- Start Cart Table Head -->
                                <thead>
                                    <tr>
                                        <th class="">Imagen</th>
                                        <th class="">Dispositivo</th>
                                        <th class="">Lista del pedido</th>
                                        <th class="">Total Precio</th>
                                        <th class="">Estado</th>
                                    </tr>
                                </thead> <!-- End Cart Table Head -->
                                <tbody>
                                    <tr>
                                        @if ($producto)
                                            <td class="product_thumb"><img src="{{ asset($producto->imagen) }}"
                                                    alt="">
                                            </td>
                                        @else
                                            <td class="product_thumb"><img src="{{ asset('imgs/noimage.jpg') }}"
                                                    alt="">
                                            </td>
                                        @endif

                                        <td class="product_remove">
                                            <p>{{ $dispositivo->device_name }} -
                                                {{ $dispositivo->device_mark }}</p>
                                        </td>
                                        <td class="product_name">
                                            @if ($lista_pedido_array)
                                                @foreach ($lista_pedido_array as $items)
                                                    <li><strong>{{ $items['tipo'] }}</strong> - {{ $items['nombre'] }} -
                                                        ${{ $items['precio'] }}</li>
                                                @endforeach
                                            @else
                                                <li>No hay lista de agregados</li>
                                            @endif

                                            <li><strong>Envío:</strong> ${{ $pedido->costo_envio }}</li>
                                        </td>
                                        <td class="product-price">${{ $pedido->monto + $pedido->costo_envio }}</td>
                                        <td class="product_quantity">
                                            @if ($pedido->status == 0)
                                                <h5>Por Asignar</h5>
                                            @elseif ($pedido->status == 1)
                                                <h5>Por Recoger</h5>
                                            @elseif ($pedido->status == 2)
                                                <h5>En Proceso</h5>
                                            @elseif ($pedido->status == 3)
                                                <h5>Por Entregar</h5>
                                            @elseif ($pedido->status == 4)
                                                <h5>Rechazado</h5>
                                            @elseif ($pedido->status == 5)
                                                <h5>Finalizado</h5>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('costum-js')
@endpush
