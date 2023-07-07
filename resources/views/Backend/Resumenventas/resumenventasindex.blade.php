@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{route('ventas_crear')}}" class="btn btn-info">
                        <i class="material-icons">person_add</i>
                        Agregar Nueva Venta
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white ps-3">Lista Ventas</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        @livewire('backend.resumen-live.listarventas')
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('custom-scripts')

@endpush
