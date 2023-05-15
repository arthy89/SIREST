<div>
    <div class="input-group input-group-static">
        <select class="select2 productos" name="producto" style="width: 100%" height="100px">
            <option>Seleccione un producto...</option>
            @foreach ($productos as $pro)
                <option>{{ $pro->nombre_p }} - ${{ $pro->precio_compra }} - {{ $pro->stock }}U</option>
            @endforeach
        </select>
    </div>

    <script>
        document.addEventListener('livewire:update', function() {
            $('.productos').select2();
        });
    </script>
</div>
