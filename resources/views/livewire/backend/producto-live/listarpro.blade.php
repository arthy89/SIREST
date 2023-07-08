<div>
    <div class="input-group input-group-static">
        <select class="select2 productos" style="width: 100%" height="100px">
            <option value="">Seleccione...</option>
            @foreach ($productos as $pro)
                <option value="{{ $pro->idproducto }}" data-preciocompra="{{ $pro->precio_venta_public }}">
                    {{ $pro->nombre_p }}
                </option>
            @endforeach
        </select>
    </div>

    <script>
        document.addEventListener('livewire:update', function() {
            $('.productos').select2({
                placeholder: "Seleccione...",
                allowClear: true
            });

            $('.servicios').val('').trigger('change');
        });
    </script>
</div>
