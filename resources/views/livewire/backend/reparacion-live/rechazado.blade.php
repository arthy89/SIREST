<div>
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Número de Reparación
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Dispositivo</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Fechas</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Responsable</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Estado</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Prioridad</th>
                <th class="text-secondary opacity-7"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">
                                    REP-{{ str_pad($pedido->idpedido, 7, '0', STR_PAD_LEFT) }}</h6>
                                <p class="text-xs text-secondary mb-0">
                                    {{ $pedido->nombres }}
                                    {{ $pedido->persona_apellidos }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">
                            {{ $pedido->device_name }}</p>
                        <p class="text-xs text-secondary mb-0">
                            {{ $pedido->device_mark }}</p>
                    </td>
                    <td>
                        <p class="text-xs text-secondary mb-0">
                            {{ date('d-m-Y', strtotime($pedido->fecha)) }} -
                            Ingreso
                        </p>
                        <p class="text-xs font-weight-bold mb-0">
                            @if ($pedido->fecha_entrega)
                                {{ date('d-m-Y', strtotime($pedido->fecha_entrega)) }}
                                - Entrega
                            @else
                                Sin fecha de entrega
                            @endif
                        </p>
                    </td>
                    <td>
                        @if ($pedido->usuarioid)
                            <p class="text-xs font-weight-bold mb-0">
                                {{ $pedido->nombre }}
                            </p>
                            <p class="text-xs text-secondary mb-0">
                                {{ $pedido->usuario_apellidos }}</p>
                        @else
                            <p class="text-xs font-weight-bold mb-0">Sin Asignar
                            </p>
                        @endif
                    </td>
                    <td class="align-middle text-center text-sm">
                        <div class="dropdown mt-2 mb-0">
                            <button class="btn btn-sm bg-gradient-danger dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Rechazado
                            </button>
                            <ul class="dropdown-menu">
                                <li><a wire:click="actualizarEstado({{ $pedido->idpedido }}, 0)" class="dropdown-item"
                                        href="#">Por Asignar</a></li>
                                <li><a wire:click="actualizarEstado({{ $pedido->idpedido }}, 1)" class="dropdown-item"
                                        href="#">Por Recoger</a></li>
                                <li><a wire:click="actualizarEstado({{ $pedido->idpedido }}, 2)" class="dropdown-item"
                                        href="#">En Proceso</a></li>
                                <li><a wire:click="actualizarEstado({{ $pedido->idpedido }}, 3)" class="dropdown-item"
                                        href="#">Por Entregar</a></li>
                                <li><a wire:click="actualizarEstado({{ $pedido->idpedido }}, 4)" class="dropdown-item"
                                        href="#">Rechazado</a></li>
                                <li><a wire:click="actualizarEstado({{ $pedido->idpedido }}, 5)" class="dropdown-item"
                                        href="#">Finalizado</a></li>
                            </ul>
                        </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                        @if ($pedido->prioridad)
                            @if ($pedido->prioridad == 1)
                                <span class="badge badge-sm bg-gradient-info">Baja</span>
                            @elseif ($pedido->prioridad == 2)
                                <span class="badge badge-sm bg-gradient-warning">Media</span>
                            @elseif ($pedido->prioridad == 3)
                                <span class="badge badge-sm bg-gradient-danger">Alta</span>
                            @endif
                        @else
                            <span class="badge badge-sm bg-gradient-secondary">Vacío</span>
                        @endif
                    </td>
                    <td class="align-middle">
                        <div class="dropdown mt-2 mb-0">
                            <button class="btn btn-sm bg-gradient-info dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Acciones
                            </button>
                            <ul class="dropdown-menu dropdown-menu-start">
                                <li><a class="dropdown-item" href="{{ route('reparaciones_ver', $pedido->idpedido) }}">
                                        Ver reparación <i class="material-icons">visibility</i></a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('reparaciones_imprimir', $pedido->idpedido) }}">
                                        Imprimir <i class="material-icons">print</i></a>
                                </li>
                                <li>
                                    <button wire:click="confirmarEliminacion({{ $pedido->idpedido }})" type="submit"
                                        class="dropdown-item text-danger">
                                        Eliminar <i class="material-icons">delete</i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (session('message'))
        <script>
            Lobibox.notify('success', {
                width: 400,
                img: "{{ asset('imgs/success.png') }}",
                position: 'top right',
                title: "Estado Cambiado",
                msg: '{{ session('message') }}'
            });
        </script>
    @endif
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('confirmarEliminacion', function(data) {
                Swal.fire({
                    title: '¿Estás seguro de eliminar la reparación ' + data + '?',
                    text: "¡Se eliminará la reparación!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('eliminarPedidoRechazado', data);
                        Swal.fire(
                            '¡Eliminado!',
                            'La reparación fue eliminada.',
                            'success'
                        );
                    }
                });
            });
        });
    </script>
</div>
