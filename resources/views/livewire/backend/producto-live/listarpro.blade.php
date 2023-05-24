<div>
    <div class="input-group input-group-static">
        <select class="select2 productos" style="width: 100%" height="100px">
            <option></option>
            @foreach ($productos as $pro)
                <option value="{{ $pro->precio_compra }}">{{ $pro->nombre_p }}</option>
            @endforeach
        </select>
    </div>

    <script>
        document.addEventListener('livewire:update', function() {
            $('.productos').select2({
                placeholder: "Seleccione...",
                allowClear: true
            });
        });
    </script>
</div>
