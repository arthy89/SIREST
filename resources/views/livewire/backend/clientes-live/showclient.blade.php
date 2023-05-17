<div>
    @if ($cliente_act)
        @foreach ($cliente_act as $client)
            <div class="row">
                <div class="col-6 text-start">
                    <h6>Nombres</h6>
                </div>
                <div class="col-6">
                    <p class="mb-0">{{ $client->nombres }} {{ $client->apellidos }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-start">
                    <h6>Correo</h6>
                </div>
                <div class="col-6">
                    <p class="mb-0">{{ $client->email }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-start">
                    <h6>Teléfono</h6>
                </div>
                <div class="col-6">
                    <p class="mb-0">+{{ $client->cod }} {{ $client->telefono }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-start">
                    <h6>Dirección</h6>
                </div>
                <div class="col-6">
                    <p class="mb-0">{{ $client->direccionfiscal }}</p>
                </div>
            </div>
            {{-- <input type="text" value="{{ $client->idpersona }}" name="cliente"> --}}
        @endforeach
    @endif
</div>

{{-- <p class="mb-0">{{ $client->nombres }} {{ $client->apellidos }}</p> --}}
