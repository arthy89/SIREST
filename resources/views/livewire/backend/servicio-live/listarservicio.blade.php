<div>
    <div class="input-group input-group-static" wire:poll.5000ms>
        <select class="select2 servicios" name="rolid" style="width: 100%" height="100px">
            <option>Seleccione un servicio...</option>
            @foreach ($servicios as $serv)
                <option>{{ $serv->nombre }}</option>
            @endforeach
        </select>
    </div>

    <script>
        document.addEventListener('livewire:update', function() {
            $('.servicios').select2();
        });
    </script>
</div>
