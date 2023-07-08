<div>
    <div class="px-2 py-1">
        Buscar
        <input class="" type="text" wire:model="search">
        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">sCAN</button>
    </div>
    @if ($productos->count())

        <div class="table-responsive" id="template-card" style=" height:280px; overflow-y: scroll; ">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>

                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Producto</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Stock</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $producto->nombre_p }}</h6>
                                        <p class="text-xs text-secondary mb-0">precio: <span class="text-success"
                                                id="P{{ $producto->idproducto }}">{{ $producto->precio_venta_public }}</span>
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="agregar-carrito">
                                <a id=""
                                    onclick="agregarProducto('{{ $producto->idproducto }}', '{{ $producto->nombre_p }}','{{ $producto->precio_venta_public }}','{{ $producto->stock }}' )"
                                    class="avatar avatar-sm border-1 rounded-circle bg-white shadow-sm">
                                    <i class="material-icons text-dark text-xxxl" type="button">add</i>
                                </a>

                            </td>

                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-normal"
                                    id="S{{ $producto->idproducto }}">{{ $producto->stock }} </span><span
                                    class="text-secondary text-xs font-weight-normal">und</span>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @else
        <div>no existen datos</div>
    @endif
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
    </div>

</div>
