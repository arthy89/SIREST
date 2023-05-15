<div>
    <div class="input-group input-group-static">
        <select class="select2 dispositivos" name="rolid" style="width: 100%" height="100px">
            <option>Seleccione un dispositivo...</option>
            @foreach ($dispositivos as $device)
                <option>{{ $device->device_name }} - {{ $device->device_mark }}</option>
            @endforeach
        </select>
    </div>

    <script>
        document.addEventListener('livewire:update', function() {
            $('.dispositivos').select2();
        });
    </script>
</div>
