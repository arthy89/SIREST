@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('reparaciones_crear_view') }}" class="btn btn-info">
                    <i class="material-icons">add</i>
                    Crear nueva reparación
                </a>
            </div>
        </div>
        <div class="row">
            {{-- @yield('component-dispositivo') --}}
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Lista de Pedidos</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        {{-- navegacion --}}
                        <div class="row">
                            <div class="col-12 px-5">
                                <div class="nav-wrapper position-relative end-0">
                                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab"
                                                href="#profile-tabs-simple" role="tab" aria-controls="profile"
                                                aria-selected="true" id="pills-todo-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-todo" aria-selected="false">TODO
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab"
                                                href="#profile-tabs-simple" role="tab" aria-controls="profile"
                                                aria-selected="true" id="pills-asignar-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-asignar" aria-selected="false">Por asignar
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1" id="pills-recoger-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-recoger" data-bs-toggle="tab"
                                                href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard"
                                                aria-selected="false">
                                                Por recoger - Dilivery
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1" id="pills-clientes-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-clientes" data-bs-toggle="tab"
                                                href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard"
                                                aria-selected="false">
                                                En proceso
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1" id="pills-productos-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-productos"data-bs-toggle="tab"
                                                href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard"
                                                aria-selected="true">
                                                Por entregar
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1" id="pills-productos-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-productos"data-bs-toggle="tab"
                                                href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard"
                                                aria-selected="true">
                                                Rechazado
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1" id="pills-productos-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-productos"data-bs-toggle="tab"
                                                href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard"
                                                aria-selected="true">
                                                Finalizado
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- tablas correspondientes --}}
                        <div class="tab-content shadow-dark border-radius-lg mt-4" id="pills-tabContent">
                            {{-- !TODO! --}}
                            <div class="tab-pane fade show active" id="pills-todo" role="tabpanel"
                                aria-labelledby="pills-todo-tab">
                                <div class="card mb-4">
                                    <div class="d-flex">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-xl mt-n3 ms-4">
                                            <i class="material-icons opacity-10" aria-hidden="true">table_view</i>
                                        </div>
                                        <h6 class="mt-3 mb-2 ms-3 ">TODAS LAS REPARACIONES</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="p-0">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Número de Reparación
                                                        </th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                            Dispositivo</th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                            Fechas</th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                            Responsable</th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Estado</th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Prioridad</th>
                                                        <th class="text-secondary opacity-7"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pedidos as $pedido)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex px-2 py-1">
                                                                    <div class="d-flex flex-column justify-content-center">
                                                                        <h6 class="mb-0 text-sm">
                                                                            REP-00{{ $pedido->idpedido }}</h6>
                                                                        <p class="text-xs text-secondary mb-0">
                                                                            {{ $pedido->nombres }}
                                                                            {{ $pedido->persona_apellidos }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $pedido->device_name }}</p>
                                                                <p class="text-xs text-secondary mb-0">
                                                                    {{ $pedido->device_mark }}</p>
                                                            </td>
                                                            <td>
                                                                <p class="text-xs text-secondary mb-0">
                                                                    {{ date('d-m-Y', strtotime($pedido->fecha)) }} - Ingreso
                                                                </p>
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    @if ($pedido->fecha_entrega)
                                                                        {{ date('d-m-Y', strtotime($pedido->fecha_entrega)) }}
                                                                        - Entrega
                                                                    @else
                                                                        Sin fecha de entrega
                                                                    @endif
                                                                </p>
                                                            </td>
                                                            <td>
                                                                @if ($pedido->usuarioid)
                                                                    <p class="text-xs font-weight-bold mb-0">
                                                                        {{ $pedido->nombre }}
                                                                    </p>
                                                                    <p class="text-xs text-secondary mb-0">
                                                                        {{ $pedido->usuario_apellidos }}</p>
                                                                @else
                                                                    <p class="text-xs font-weight-bold mb-0">Sin Asignar
                                                                    </p>
                                                                @endif
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <div class="dropdown mt-2 mb-0">
                                                                    <button
                                                                        class="btn btn-sm bg-gradient-primary dropdown-toggle"
                                                                        type="button" id="dropdownMenuButton"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        Por Asignar
                                                                    </button>
                                                                    <ul class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuButton">
                                                                        <li><a class="dropdown-item" href="#">Por
                                                                                Asignar</a></li>
                                                                        <li><a class="dropdown-item" href="#">Por
                                                                                Recoger</a></li>
                                                                        <li><a class="dropdown-item" href="#">En
                                                                                Proceso</a></li>
                                                                        <li><a class="dropdown-item" href="#">Por
                                                                                Entregar</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="#">Finalizado</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="#">Entregado</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                @if ($pedido->prioridad)
                                                                    @if ($pedido->prioridad == 1)
                                                                        <span
                                                                            class="badge badge-sm bg-gradient-info">Baja</span>
                                                                    @elseif ($pedido->prioridad == 2)
                                                                        <span
                                                                            class="badge badge-sm bg-gradient-warning">Media</span>
                                                                    @else
                                                                        <span
                                                                            class="badge badge-sm bg-gradient-danger">Alta</span>
                                                                    @endif
                                                                @else
                                                                    <span
                                                                        class="badge badge-sm bg-gradient-secondary">Vacío</span>
                                                                @endif
                                                            </td>
                                                            <td class="align-middle">
                                                                <div class="dropdown mt-2 mb-0">
                                                                    <button
                                                                        class="btn btn-sm bg-gradient-info dropdown-toggle"
                                                                        type="button" id="dropdownMenuButton"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        Acciones
                                                                    </button>
                                                                    <ul class="dropdown-menu dropdown-menu-start"
                                                                        aria-labelledby="dropdownMenuButton">
                                                                        <li><a class="dropdown-item"
                                                                                href="{{ route('reparaciones_ver', $pedido->idpedido) }}">
                                                                                Ver reparación <i
                                                                                    class="material-icons">visibility</i></a>
                                                                        </li>
                                                                        <li><a class="dropdown-item"
                                                                                href="{{ route('reparaciones_imprimir', $pedido->idpedido) }}">
                                                                                Imprimir <i
                                                                                    class="material-icons">print</i></a>
                                                                        </li>
                                                                        <li>
                                                                            <form
                                                                                action="{{ route('reparaciones_eliminar', $pedido->idpedido) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button type="submit"
                                                                                    class="dropdown-item text-danger">
                                                                                    Eliminar <i
                                                                                        class="material-icons">delete</i></button>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{-- {{ $pedidos->links() }} --}}
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-end">
                                                    <!-- Botón "Anterior" -->
                                                    <li
                                                        class="page-item {{ $pedidos->previousPageUrl() ? '' : 'disabled' }}">
                                                        <a class="page-link" href="{{ $pedidos->previousPageUrl() }}"
                                                            tabindex="-1">
                                                            <span class="material-icons">
                                                                keyboard_arrow_left
                                                            </span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>

                                                    <!-- Números de página -->
                                                    @foreach ($pedidos->getUrlRange(1, $pedidos->lastPage()) as $page => $url)
                                                        <li
                                                            class="page-item {{ $page == $pedidos->currentPage() ? 'active' : '' }}">
                                                            <a class="page-link"
                                                                href="{{ $url }}">{{ $page }}</a>
                                                        </li>
                                                    @endforeach

                                                    <!-- Botón "Siguiente" -->
                                                    <li class="page-item {{ $pedidos->nextPageUrl() ? '' : 'disabled' }}">
                                                        <a class="page-link" href="{{ $pedidos->nextPageUrl() }}">
                                                            <span class="material-icons">
                                                                keyboard_arrow_right
                                                            </span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ?POR ASIGNAR --}}
                            <div class="tab-pane fade" id="pills-asignar" role="tabpanel"
                                aria-labelledby="pills-asignar-tab">
                                <div class="card mb-4">
                                    <div class="d-flex">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-danger shadow text-center border-radius-xl mt-n3 ms-4">
                                            <i class="material-icons opacity-10" aria-hidden="true">pending_actions</i>
                                        </div>
                                        <h6 class="mt-3 mb-2 ms-3 ">REPARACIONES POR ASIGNAR</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="p-0">
                                            @livewire('backend.reparacion-live.porasignar')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ?POR RECOGER  --}}
                            <div class="tab-pane fade" id="pills-recoger" role="tabpanel"
                                aria-labelledby="pills-recoger-tab">
                                <div class="card mb-4 ">
                                    <div class="d-flex">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-warning shadow text-center border-radius-xl mt-n3 ms-4">
                                            <i class="material-icons opacity-10" aria-hidden="true">person_add</i>
                                        </div>
                                        <h6 class="mt-3 mb-2 ms-3 ">POR RECOGER - DELIVERY</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="p-0">
                                            @livewire('backend.reparacion-live.porrecoger')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Tercer NAV VAR PRODUCTOS -->
                            <div class="tab-pane fade" id="pills-productos" role="tabpanel"
                                aria-labelledby="pills-productos-tab">
                                <div class="card mb-4 ">
                                    <div class="d-flex">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-xl mt-n3 ms-4">
                                            <i class="material-icons opacity-10" aria-hidden="true">store</i>
                                        </div>
                                        <h6 class="mt-3 mb-2 ms-3 ">PRODUCTOS/SERVICIOS</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-7">
                                                <div class="table-responsive">
                                                    <table class="table align-items-center ">
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-30">
                                                                    <div class="d-flex px-2 py-1 align-items-center">
                                                                        <div>
                                                                            <img src="../../assets/img/icons/flags/US.png"
                                                                                alt="Country flag">
                                                                        </div>
                                                                        <div class="ms-4">
                                                                            <p class="text-xs font-weight-bold mb-0 ">
                                                                                Country:</p>
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                United States</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Sales:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">2500
                                                                        </h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Value:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">
                                                                            $230,900</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-sm">
                                                                    <div class="col text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Bounce:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">29.9%
                                                                        </h6>
                                                                    </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
