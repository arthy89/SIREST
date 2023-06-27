@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('reparaciones_crear_view') }}" class="btn btn-info">
                    <i class="material-icons">add</i>
                    Crear nueva reparación
                </a>
                <a href="{{ route('reparaciones_buscar') }}" class="btn btn-success">
                    <i class="material-icons">search</i>
                    Buscar reparación
                </a>
                <a href="{{ route('reparaciones') }}" class="btn btn-primary">
                    <i class="material-icons">inventory_2</i>
                    Todas las reparaciones
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Búsqueda</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="card mb-4">
                            <div class="px-5 pb-5 col-12">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Buscar por nombre de cliente</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="d-flex">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-xl mt-n3 ms-4">
                                    <i class="material-icons opacity-10" aria-hidden="true">search</i>
                                </div>
                                <h6 class="mt-3 mb-2 ms-3 ">RESULTADO DE LA BÚSQUEDA</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="p-0">
                                    {{-- @livewire('backend.reparacion-live.todorep') --}}
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
@endpush
