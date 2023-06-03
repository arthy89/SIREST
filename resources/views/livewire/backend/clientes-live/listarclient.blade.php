<div>
    <div class="input-group input-group-static">
        <select wire:model="selectedClient" class="select2 clientes" name="cliente" id="cliente" style="width: 100%"
            height="100px">
            <option></option>
            @foreach ($clientes as $client)
                <option value="{{ $client->idpersona }}">{{ $client->nombres }} {{ $client->apellidos }}</option>
            @endforeach
        </select>
    </div>

    <script>
        document.addEventListener('livewire:update', function() {
            $('.clientes').select2({
                placeholder: "Seleccione...",
                allowClear: true
            });
        });

        document.addEventListener('livewire:load', function() {
            $('.clientes').on('change', function(e) {
                var selectedClientId = e.target.value;
                Livewire.emit('clientSelected', selectedClientId);
            });
        });
    </script>
</div>
