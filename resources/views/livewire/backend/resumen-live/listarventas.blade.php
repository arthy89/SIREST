<div>
    {{$search}}
    <div class="px-2 py-1">
        Buscar
        <input class="" type="text" wire:model="search" placeholder="Escriba un nombre">
        {{-- <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">sCAN</button> --}}
    </div>
    @if ($productos->count())

        <div class="table-responsive" id="template-card">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cliente/Vendedor
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function
                        </th>
                        {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Status</th> --}}
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Fecha Venta</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $contador = 0;
                    @endphp
                    @foreach ($productos as $producto)
                        @if($contador <= 4)
                        {{-- <h1> el contador es {{$lista[$contador]}}</h1> --}}

                        @else
                        @php
                            $contador = 0;
                        @endphp

                        {{-- <h1> el contador mas de 6 es {{$contador}}</h1> --}}
                        @endif
                        <tr>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $producto->id_venta }}</p>
                                {{-- <p class="text-xs font-weight-bold mb-0"> {{$loop->iteration}}</p> --}}

                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">

                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $producto->nombres }} {{ $producto->apellidos }}
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">{{ $producto->vendedor_venta }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">Productoos</p>
                                <p class="text-xs text-secondary mb-0">


                                <div class="accordion-item mb-3">
                                    <h5 class="accordion-header" id="heading{{$lista[$contador]}}">
                                        <button class="accordion-button border-bottom font-weight-bold collapsed"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$lista[$contador]}}"
                                            aria-expanded="false" aria-controls="collapse{{$lista[$contador]}}">
                                            Su lista :ㅤㅤㅤㅤㅤㅤ
                                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                                aria-hidden="true"></i>
                                            <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                                aria-hidden="true"></i>
                                        </button>
                                    </h5>
                                    <div id="collapse{{$lista[$contador]}}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{$lista[$contador]}}" data-bs-parent="#accordionRental" style="">
                                        @foreach (json_decode($producto->lista_venta) as $item)
                                        {{-- @foreach ($producto['lista_venta'] as $productos_secundario)--}}
                                        <div class="accordion-body text-sm opacity-8">
                                            {{$loop->iteration}}. {{$item->nombre}}
                                        </div>
                                        @endforeach
                                        <div class="accordion-body text-sm opacity-8">
                                            total: $. {{ $producto->total_venta }}
                                        </div>

                                    </div>
                                </div>
                                </p>
                            </td>
                            {{-- <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-gradient-success">activo</span>
                            </td> --}}
                            <td class="align-middle text-center">
                                <span
                                    class="text-secondary text-xs font-weight-bold">{{ $producto->fecha_venta }}</span>
                            </td>
                            <td class="align-middle">
                                <div class="dropdown mt-2 mb-0">
                                    <button class="btn btn-sm bg-gradient-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="dropdownMenuButton" data-popper-placement="bottom-end" data-popper-reference-hidden="" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-102.667px, 34px, 0px);">
                                        <li><a class="dropdown-item" href="">
                                                Ver Venta <i class="material-icons">visibility</i></a>
                                        </li>
                                        <li><a class="dropdown-item" href="">
                                                Imprimir<i class="material-icons">print</i></a>
                                        </li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                        {{-- <tr>
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

                        </tr> --}}
                        @php
                            $contador++;
                        @endphp
                    @endforeach

                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <!-- Botón "Anterior" -->
                    <li class="page-item {{ $productos->previousPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" wire:click="previousPage" tabindex="-1">
                            <span class="material-icons">
                                keyboard_arrow_left
                            </span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                    <!-- Números de página -->
                    @for ($page = 1; $page <= $productos->lastPage(); $page++)
                        <li class="page-item {{ $page == $productos->currentPage() ? 'active' : '' }}">
                            <a class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                        </li>
                    @endfor

                    <!-- Botón "Siguiente" -->
                    <li class="page-item {{ $productos->nextPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" wire:click="nextPage">
                            <span class="material-icons">
                                keyboard_arrow_right
                            </span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    @else
        <div>no existen datos</div>
    @endif


</div>
<style>
</style>
<script>

</script>
