@extends('Frontend.Layout.app')

@section('main-content')
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Lista de Reparaciones</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="{{ route('home-client') }}">Home</a></li>
                                    <li><a href="{{ route('ecomerce_categorias') }}">ecommerce</a></li>
                                    <li class="active" aria-current="page">Lista de reparaciones</li>
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
                    @if ($pedidos->isNotEmpty())
                        <div class="table_desc">
                            <div class="table_page table-responsive">

                                <table>
                                    <!-- Start Cart Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="">Num REP</th>
                                            <th class="">Servicio</th>
                                            <th class="">Fecha</th>
                                            <th class="">Estado</th>
                                            <th class="">Acción</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                        @foreach ($pedidos as $pedido)
                                            <tr>
                                                <td>
                                                    <strong>REP-{{ str_pad($pedido->idpedido, 7, '0', STR_PAD_LEFT) }}</strong>
                                                </td>
                                                <td><strong>Cambio de pantalla:</strong> {{ $pedido->device_name }} -
                                                    {{ $pedido->device_mark }}
                                                </td>
                                                <td>{{ date('d/m/Y - h:i:s A', strtotime($pedido->fecha)) }}</td>
                                                <td>
                                                    @if ($pedido->estado_p == 0)
                                                        <strong>Por Asignar</strong>
                                                    @elseif ($pedido->estado_p == 1)
                                                        <strong>Por Recoger</strong>
                                                    @elseif ($pedido->estado_p == 2)
                                                        <strong>En Proceso</strong>
                                                    @elseif ($pedido->estado_p == 3)
                                                        <strong>Por Entregar</strong>
                                                    @elseif ($pedido->estado_p == 4)
                                                        <strong>Rechazado</strong>
                                                    @elseif ($pedido->estado_p == 5)
                                                        <strong>Finalizado</strong>
                                                    @endif
                                                </td>
                                                <td><a href="{{ route('orders.show', $pedido) }}" class="btn btn-pink"><i
                                                            class="icon-eye"></i> Ver</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    @else
                        <div class="row justify-content-center" align="center">
                            <h4 class="breadcrumb-title">USTED AÚN NO TIENE NINGUNA REPARACIÓN AGENDADA</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('costum-js')
@endpush
