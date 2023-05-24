<div>
    <div class="input-group input-group-static" >
        <select class="select2 servicios" name="rolid" style="width: 100%" height="100px">
            <option></option>
            @foreach ($servicios as $serv)
                <option value="{{ $serv->id_tip_pedido }}">{{ $serv->nombre }}</option>
            @endforeach
        </select>
    </div>

    <script>
        document.addEventListener('livewire:update', function() {
            $('.servicios').select2({
                placeholder: "Seleccione...",
                allowClear: true
            });
        });
    </script>
</div>
