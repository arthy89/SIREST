<div>
    <div class="input-group input-group-static">
        <select class="select2 dispositivos" name="dispositivo" id="dispositivos" style="width: 100%" height="100px">
            <option></option>
            @foreach ($dispositivos as $device)
                <option value="{{ $device->id_device }}">{{ $device->device_name }} - {{ $device->device_mark }}</option>
            @endforeach
        </select>
    </div>

    <script>
        document.addEventListener('livewire:update', function() {
            $('.dispositivos').select2({
                placeholder: "Seleccione...",
                allowClear: true
            });
        });
    </script>
</div>
