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
                                            <a class="nav-link mb-0 px-0 py-1" id="pills-proceso-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-proceso" data-bs-toggle="tab"
                                                href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard"
                                                aria-selected="false">
                                                En proceso
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1" id="pills-entregar-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-entregar"data-bs-toggle="tab"
                                                href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard"
                                                aria-selected="true">
                                                Por entregar
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1" id="pills-rechazado-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-rechazado"data-bs-toggle="tab"
                                                href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard"
                                                aria-selected="true">
                                                Rechazado
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1" id="pills-finalizado-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-finalizado"data-bs-toggle="tab"
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
                                            @livewire('backend.reparacion-live.todorep')
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
                            {{-- ?EN PROCESO --}}
                            <div class="tab-pane fade" id="pills-proceso" role="tabpanel"
                                aria-labelledby="pills-proceso-tab">
                                <div class="card mb-4 ">
                                    <div class="d-flex">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-info shadow text-center border-radius-xl mt-n3 ms-4">
                                            <i class="material-icons opacity-10" aria-hidden="true">build</i>
                                        </div>
                                        <h6 class="mt-3 mb-2 ms-3 ">EN PROCESO</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="p-0">
                                            @livewire('backend.reparacion-live.enproceso')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ?POR ENTREGAR --}}
                            <div class="tab-pane fade" id="pills-entregar" role="tabpanel"
                                aria-labelledby="pills-entregar-tab">
                                <div class="card mb-4 ">
                                    <div class="d-flex">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-xl mt-n3 ms-4">
                                            <i class="material-icons opacity-10" aria-hidden="true">unarchive</i>
                                        </div>
                                        <h6 class="mt-3 mb-2 ms-3 ">POR ENTREGAR</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="p-0">
                                            @livewire('backend.reparacion-live.porentregar')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- !RECHAZADO --}}
                            <div class="tab-pane fade" id="pills-rechazado" role="tabpanel"
                                aria-labelledby="pills-rechazado-tab">
                                <div class="card mb-4 ">
                                    <div class="d-flex">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-danger shadow text-center border-radius-xl mt-n3 ms-4">
                                            <i class="material-icons opacity-10"
                                                aria-hidden="true">disabled_by_default</i>
                                        </div>
                                        <h6 class="mt-3 mb-2 ms-3 ">RECHAZADO</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="p-0">
                                            @livewire('backend.reparacion-live.rechazado')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- *FINALIZADO --}}
                            <div class="tab-pane fade" id="pills-finalizado" role="tabpanel"
                                aria-labelledby="pills-finalizado-tab">
                                <div class="card mb-4 ">
                                    <div class="d-flex">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-xl mt-n3 ms-4">
                                            <i class="material-icons opacity-10" aria-hidden="true">check_box</i>
                                        </div>
                                        <h6 class="mt-3 mb-2 ms-3 ">FINALIZADO</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="p-0">
                                            @livewire('backend.reparacion-live.finalizado')
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

    @if (session('creado'))
        <script>
            Lobibox.notify('success', {
                width: 400,
                img: "{{ asset('imgs/success.png') }}",
                position: 'top right',
                title: "Reparación Registrada",
                msg: '{{ session('creado') }}'
            });
        </script>
    @endif

    @if (session('actualizado'))
        <script>
            Lobibox.notify('success', {
                width: 400,
                img: "{{ asset('imgs/success.png') }}",
                position: 'top right',
                title: "Reparación Actualizada",
                msg: '{{ session('actualizado') }}'
            });
        </script>
    @endif
@endpush
