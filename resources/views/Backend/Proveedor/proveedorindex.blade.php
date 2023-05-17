@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn bg-gradient-dark" data-bs-toggle="modal"
                                    data-bs-target="#nuevo_proveedor"><i class="material-icons text-sm">add</i>
                                    Agregar Proveedor</button>
                                    @livewire('backend.proveedorlive.crearproveedor')
                </div>

            </div>
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h5 class="text-white ps-3">Lista De Provedores</h5>
                        </div>
                    </div>
                    @livewire('backend.proveedorlive.listarproveedor')
                </div>
            </div>
        </div>
        {{-- modal editar--}}


    </div>
@endsection

@push('custom-scripts')
{{--agregamos para que esche lel livewuire--}}
@livewireScripts
@livewireStyles

<script>


    Livewire.on('alert',function(title,message){
            Lobibox.notify('success', {
                    width: 400,
                    img: "{{asset('imgs/success.png')}}",
                    position: 'top right',
                    title: title,
                    msg: message
                });
        })
    document.addEventListener("DOMContentLoaded", function(event) {

    });
    Livewire.on('deleteProveedor', provedorId => {
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {

            Livewire.emitTo('backend.proveedorlive.listarproveedor','delete',provedorId);
            //Livewire.emit('postAdded')

            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        })
    })



</script>
@endpush
