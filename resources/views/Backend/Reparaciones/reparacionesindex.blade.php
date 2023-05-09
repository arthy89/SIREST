@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('reparaciones_crear') }}" class="btn btn-info">
                    <i class="material-icons">person_add</i>
                    Agregar Nuevo Usuario
                </a>
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
