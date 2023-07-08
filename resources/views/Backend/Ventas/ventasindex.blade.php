@extends('Backend.Layout.app')

@section('main-content')
    <form action="{{ route('ventas_crear') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid py-4">
            <div class="row mt-4">
                <!-- PARTE OPERACIONAL DE OPCIONES -->
                <div class="col-12 col-md-7">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="table-responsive p-0">

                                <div class="container">

                                    <div class="table-responsive" class="listado" id="carrito">
                                        <div style=" height:400px; overflow-y: scroll; ">


                                            <table class="table align-items-center mb-0" id="listadoelementos">
                                                <thead>
                                                    <tr>
                                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                            width="400px">
                                                            Ítem</th>
                                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                                                            width="100px">
                                                            Cantidad</th>
                                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                            width="100px">
                                                            Precio</th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                            Quitar</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tablebody" id="carrito-item">



                                                </tbody>


                                            </table>
                                        </div>
                                        <thead>

                                        </thead>

                                    </div>


                                </div>


                            </div>
                            <div class="row py-5">
                                <div class="col-lg-4 col-md-6 col-12">

                                    <div class="d-flex align-items-center position-relative">

                                        <span class="carrito-precio-total">
                                            Total
                                            <h6>$
                                                <span id="span_total_precio"> 0.00</span>
                                                <input type="hidden" name="contenido_total_precio"
                                                    id="input_span_preciototal">

                                            </h6>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="d-flex align-items-center position-relative">
                                        <th></th>
                                        <select class="js-example-basic-single" name="tipodepago">
                                            <option value="boleta">Botela Electornica</option>
                                            <option value="Comprovante">Comprovante de Venta</option>
                                            <option value="factura">Factura Electronica</option>
                                        </select>
                                    </div>
                                    {{-- input de LISTA DE PRODUCTOS --}}
                                    <input type="hidden" name="tablaElementos" id="tablaElementosInput">
                                </div>
                                <div class="col-lg-4 col-md-6 col-12 ms-lg-auto">
                                    <div class="d-flex align-items-center">
                                        {{-- <button type="submit" class="btn bg-gradient-dark btn-lg w-100">Guardar Pedido</button> --}}
                                        <button type="submit" class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                            title="Next">Pagar</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body p-3">
                            <div class="chart pt-3">
                                <canvas id="chart-cons-week" class="chart-canvas" height="320" width="406"
                                    style="display: block; box-sizing: border-box; height: 320px; width: 406.9px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PARTE DE OPCIONES -->
                <div class="col-12 col-md-5 ms-auto mt-xl-0 mt-5">

                    <div class="card h-100">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="tab-content shadow-dark border-radius-lg" id="pills-tabContent">
                                <!--PRIMER NAV VAR NUEVOS PRODUCTOS-->
                                <div class="tab-pane fade" id="pills-nuevos" role="tabpanel"
                                    aria-labelledby="pills-nuevos-tab">
                                    <div class="card mb-4 ">
                                        <div class="d-flex">
                                            <div
                                                class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-xl mt-n3 ms-4">
                                                <i class="material-icons opacity-10" aria-hidden="true">language</i>
                                            </div>
                                            <h6 class="mt-3 mb-2 ms-3 ">NUEVOS PRODUCTOS</h6>
                                        </div>
                                        <div class="card-body px-0 pb-2">
                                            <table id="productos" class="table table-striped display responsive nowrap"
                                                style="width:100%">
                                                <thead>
                                                    <tr>

                                                        <th>Nombre</th>
                                                        <th></th>
                                                        <th>CANTIDAD DISPONIBLE</th>
                                                        <th>PRECIO</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--SEGUNDO NAV VAR CLIENTES  -->
                                <div class="tab-pane fade" id="pills-clientes" role="tabpanel"
                                    aria-labelledby="pills-clientes-tab">
                                    <div class="card mb-4 ">
                                        <div class="d-flex">
                                            <div
                                                class="icon icon-shape icon-lg bg-gradient-info shadow text-center border-radius-xl mt-n3 ms-4">
                                                <i class="material-icons opacity-10" aria-hidden="true">person_add</i>
                                            </div>
                                            <h6 class="mt-3 mb-2 ms-3 ">CLIENTES</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-7">
                                                    @livewire('backend.clientes-live.showclient')
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        <div class="card-footer p-3">
                                            <div class="row">
                                                <div class="col-md-8 my-2">
                                                    @livewire('backend.clientes-live.listarclient')
                                                </div>
                                                <div class="col-md-4 my-2" align="center">
                                                    <button type="button" class="btn bg-gradient-dark mb-0"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#nuevo_cliente">Nuevo</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--Tercer NAV VAR PRODUCTOS -->
                                <div class="tab-pane fade show active" id="pills-productos" role="tabpanel"
                                    aria-labelledby="pills-productos-tab">
                                    <div class="card mb-4 ">
                                        <div class="d-flex">
                                            <div
                                                class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-xl mt-n3 ms-4">
                                                <i class="material-icons opacity-10" aria-hidden="true">store</i>
                                            </div>
                                            <h6 class="mt-3 mb-2 ms-3 ">PRODUCTOS/SERVICIOS</h6>
                                        </div>
                                        <div class="card-body px-0 pb-2">
                                            @livewire('backend.venta-producto-live.listar')
                                            {{-- @livewire('backend.producto-live.listarpro') --}}
                                        </div>

                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script>
                                            var tablaElementos = [];
                                            var contadorId = 1;

                                            function actualizarTablaElementos() {
                                                var tablaElementosInput = document.getElementById('tablaElementosInput');
                                                tablaElementosInput.value = JSON.stringify(tablaElementos);
                                            }

                                            function agregarProducto(id, nombre, precio, stock) {

                                                //console.log(id, verificaCantidad(id));
                                                if (verificaCantidad(id) == 0) {
                                                    //alert("ettro aqui");
                                                    return 0;
                                                } else {
                                                    var contenedor = document.getElementById("carrito-item");
                                                    //crear una nueva fila
                                                    //var id = parseInt(id);
                                                    var nuevoDiv = document.createElement("tr");
                                                    nuevoDiv.id = id;

                                                    nuevoDiv.innerHTML = '<tr  id="+id+" >' +
                                                        '<td><span class="carrito-item-titulo">' + nombre + '</span></td>' +
                                                        '<td><div class="container ">' +
                                                        '       <i onclick="sumarCantidad(' + (id + 2) +
                                                        ')" class="sumar-cantidad material-icons text-secondary position-relative text-xxl btn" style="heigth:5px; ">add</i>' +
                                                        '      <input style="width: 100%;" type="text" id="' + (id + 2) + '" value="' + 1 +
                                                        '" class="carrito-item-cantidad form-control " disabled="" onfocus="focused(this)" onfocusout="defocused(this)">' +
                                                        '       <i onclick="restarCantidad(' + (id + 2) +
                                                        ')" class=" restar-cantidad fa-solid material-icons text-secondary position-relative text-xxl btn">remove</i>' +
                                                        '  </div>' +
                                                        '</td>' +
                                                        '<td>' +
                                                        '   <div class="input-group input-group-outline">$ ' +
                                                        '      <span class="carrito-item-precio" id="' + (id + 1) + '" >' + precio + '</span>' +
                                                        ' </div>' +
                                                        '</td>' +
                                                        '<td>' +
                                                        '   <button type="button" onclick="eliminarFila(' + id +
                                                        ')" class=" btn btn-sm bg-gradient-danger mt-1 mx-1">x</button>' +
                                                        '</td>' +
                                                        '</tr>';
                                                    // Verificar si el elemento ya existe

                                                    var filaExistente = document.getElementById(id);
                                                    if (filaExistente) {

                                                        actualizarCantidad(id);
                                                        //para la cantidad de precio
                                                        actualizarprecio(id);
                                                        //sumarPrecioTotal();


                                                    } else {
                                                        // Insertar el nuevo div dentro del contenedor

                                                        //alert("se inserto reviselo");
                                                        contenedor.appendChild(nuevoDiv);
                                                    }
                                                    sumarPrecioTotal();

                                                    var elementoExistente = tablaElementos.find(function(elem) {
                                                        return elem.id_p === id.toString();
                                                    });

                                                    if (elementoExistente) {
                                                        elementoExistente.cantidad++;
                                                    } else {
                                                        var producto = {
                                                            id_t: id + 2,
                                                            id_p: id,
                                                            tipo: 'producto',
                                                            nombre: nombre,
                                                            cantidad: 1,
                                                            precio: precio
                                                        };
                                                        tablaElementos.push(producto);
                                                    }

                                                    actualizarTablaElementos();
                                                    console.log(tablaElementos);
                                                }

                                            }

                                            function verificaCantidad(id) {
                                                //console.log(id);

                                                var idAux = id;
                                                //algoritmo para obtener el estock original de un producto
                                                var letterstock = "S";
                                                var combinedIdstock = letterstock + idAux.toString();
                                                var elementoStockReal = document.getElementById(combinedIdstock);
                                                var stockReal = elementoStockReal.textContent;
                                                var stockReal = parseInt(stockReal);
                                                if (stockReal > 0) {
                                                    var elementoCantidad = document.getElementById((id + 2));
                                                    if (elementoCantidad != null) {
                                                        //console.log("existe la tabla");
                                                        var elementoCantidade = elementoCantidad.value;
                                                        if (elementoCantidade > stockReal) {
                                                            Lobibox.notify('error', {
                                                                width: 600,
                                                                img: "{{ asset('imgs/error.png') }}",
                                                                position: 'top right',
                                                                title: 'Error, Cantidad Supera el STOCK',
                                                                msg: 'No se puede vender mas de la cantidad redusca la cantidad .'
                                                            });
                                                            return 0;
                                                        }

                                                    } else {
                                                        //console.log("no ela tablas");
                                                    }


                                                } else {
                                                    Lobibox.notify('error', {
                                                        width: 600,
                                                        img: "{{ asset('imgs/error.png') }}",
                                                        position: 'top right',
                                                        title: 'Error, STOCK NO DISPONIBLE',
                                                        msg: 'NO HAY CANTIDAD SUFICIENTE PARA VENDER DICHA CANTIDAD .'
                                                    });
                                                    return 0;

                                                }
                                                //return id;
                                                //capturamos la cantidad de elementos

                                            };

                                            function eliminarFila(idFila) {
                                                var fila = document.getElementById(idFila);
                                                fila.remove();

                                                // Convertir idFila a cadena de texto
                                                var idFilaTexto = idFila.toString();

                                                // Buscar el elemento correspondiente en el array
                                                var indice = -1;
                                                for (var i = 0; i < tablaElementos.length; i++) {
                                                    if (tablaElementos[i].id_p === idFilaTexto) {
                                                        indice = i;
                                                        break;
                                                    }
                                                }

                                                // Eliminar el elemento del array si se encontró
                                                if (indice !== -1) {
                                                    tablaElementos.splice(indice, 1);
                                                }

                                                sumarPrecioTotal();
                                                actualizarTablaElementos();
                                                console.log(tablaElementos);
                                            }

                                            function actualizarCantidad(id) {
                                                // para actualiar la cantidad
                                                var elementoCantidad = document.getElementById((id + 2));
                                                var elementoCantidade = elementoCantidad.value;
                                                var elementoCantidadsuma = parseInt(elementoCantidade) + 1;
                                                elementoCantidad.value = (elementoCantidadsuma);
                                            }

                                            function actualizarprecio(id) {
                                                var idAux = id;
                                                //algoritmo para obtener el precio original de un producto
                                                var letter = "P";
                                                var combinedId = letter + idAux.toString();
                                                var elementoPrecioReal = document.getElementById(combinedId);
                                                var precioReal = parseFloat(elementoPrecioReal.textContent);
                                                //algoritmo para obtener el estock original de un producto
                                                var letterstock = "S";
                                                var combinedIdstock = letterstock + idAux.toString();
                                                var elementoStockReal = document.getElementById(combinedIdstock);
                                                var stockReal = elementoStockReal.textContent;
                                                //capturamos la cantidad de elementos
                                                var elementoCantidad = document.getElementById((id + 2));
                                                var elementoCantidade = elementoCantidad.value;
                                                //condicion para que no se agrega mas de la cantidad de nuestro stock
                                                verificaCantidad(id);
                                                var precioTotal = elementoCantidade * precioReal;
                                                var precioTotalRedondeado = precioTotal.toFixed(2);
                                                //para agregarlo a la casilla de porecio
                                                var elementoPrecio = document.getElementById((id + 1));
                                                elementoPrecio.textContent = precioTotalRedondeado;
                                                sumarPrecioTotal();


                                                //console.log(typeof suma);
                                            }

                                            //sumar cantidad
                                            function sumarPrecioTotal() {
                                                // Obtener todas las filas de precios
                                                var filasPrecios = document.getElementsByClassName('carrito-item-precio');

                                                // Calcular el total inicial
                                                var total = 0.0;

                                                // Recorrer las filas de precios y sumar los valores
                                                for (var i = 0; i < filasPrecios.length; i++) {
                                                    var precio = parseFloat(filasPrecios[i].textContent);
                                                    total += precio;
                                                }
                                                //console.log("Se Actualizara el precio",total);
                                                // Actualizar el elemento de total con el nuevo valor
                                                document.getElementById('span_total_precio').textContent = total.toFixed(2);
                                                //asignamos a un input para enviar al post

                                                var spanContenidoP = document.getElementById('span_total_precio').textContent;
                                                document.getElementById('input_span_preciototal').value = spanContenidoP;


                                            };

                                            function sumarCantidad(id) {
                                                var elementoCantidad = document.getElementById(id);
                                                var elementoCantidade = elementoCantidad.value;
                                                var elementoCantidadsuma = parseInt(elementoCantidade) + 1;
                                                elementoCantidad.value = elementoCantidadsuma;

                                                // Actualizar el valor de cantidad en el array tablaElementos
                                                var elemento = tablaElementos.find(function(elem) {
                                                    return elem.id_t === id.toString();
                                                });

                                                if (elemento) {
                                                    elemento.cantidad = elementoCantidadsuma;
                                                }

                                                var idAux = id.toString();
                                                var nuevoId = idAux.slice(0, -1);
                                                actualizarprecio(nuevoId);
                                                actualizarTablaElementos();
                                                console.log(tablaElementos);
                                            }

                                            function restarCantidad(id) {
                                                var elementoCantidad = document.getElementById(id);
                                                var elementoCantidade = elementoCantidad.value;
                                                var elementoCantidadsuma = parseInt(elementoCantidade) - 1;
                                                elementoCantidad.value = (elementoCantidadsuma);

                                                // Actualizar el valor de cantidad en el array tablaElementos
                                                var elemento = tablaElementos.find(function(elem) {
                                                    return elem.id_t === id.toString();
                                                });

                                                if (elemento) {
                                                    elemento.cantidad = elementoCantidadsuma;
                                                }

                                                var idAux = id.toString();
                                                var nuevoId = idAux.slice(0, -1);
                                                actualizarprecio(nuevoId);
                                                actualizarTablaElementos();
                                                console.log(tablaElementos);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <!--CUERTO NAV VAR CATEGORIAS-->
                                <div class="tab-pane fade" id="pills-categoria" role="tabpanel"
                                    aria-labelledby="pills-cateogiria-tab">
                                    <div class="card mb-4 ">
                                        <div class="d-flex">
                                            <div
                                                class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-xl mt-n3 ms-4">
                                                <i class="material-icons opacity-10" aria-hidden="true">leaderboard</i>
                                            </div>
                                            <h6 class="mt-3 mb-2 ms-3 ">CATEGORIAS</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-7">
                                                    <div class="table-responsive">
                                                        <table class="table align-items-center ">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="w-30">
                                                                        <div class="d-flex px-2 py-1 align-items-center">
                                                                            <div>
                                                                                <img src="../../assets/img/icons/flags/US.png"
                                                                                    alt="Country flag">
                                                                            </div>
                                                                            <div class="ms-4">
                                                                                <p class="text-xs font-weight-bold mb-0 ">
                                                                                    Country:</p>
                                                                                <h6
                                                                                    class="text-sm font-weight-normal mb-0 ">
                                                                                    United States</h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-center">
                                                                            <p class="text-xs font-weight-bold mb-0 ">
                                                                                Sales:
                                                                            </p>
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                2500
                                                                            </h6>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-center">
                                                                            <p class="text-xs font-weight-bold mb-0 ">
                                                                                Value:
                                                                            </p>
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                $230,900</h6>
                                                                        </div>
                                                                    </td>
                                                                    <td class="align-middle text-sm">
                                                                        <div class="col text-center">
                                                                            <p class="text-xs font-weight-bold mb-0 ">
                                                                                Bounce:
                                                                            </p>
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                29.9%
                                                                            </h6>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-30">
                                                                        <div class="d-flex px-2 py-1 align-items-center">
                                                                            <div>
                                                                                <img src="../../assets/img/icons/flags/DE.png"
                                                                                    alt="Country flag">
                                                                            </div>
                                                                            <div class="ms-4">
                                                                                <p class="text-xs font-weight-bold mb-0 ">
                                                                                    Country:</p>
                                                                                <h6
                                                                                    class="text-sm font-weight-normal mb-0 ">
                                                                                    Germany</h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-center">
                                                                            <p class="text-xs font-weight-bold mb-0 ">
                                                                                Sales:
                                                                            </p>
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                3.900
                                                                            </h6>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-center">
                                                                            <p class="text-xs font-weight-bold mb-0 ">
                                                                                Value:
                                                                            </p>
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                $440,000</h6>
                                                                        </div>
                                                                    </td>
                                                                    <td class="align-middle text-sm">
                                                                        <div class="col text-center">
                                                                            <p class="text-xs font-weight-bold mb-0 ">
                                                                                Bounce:
                                                                            </p>
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                40.22%
                                                                            </h6>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-30">
                                                                        <div class="d-flex px-2 py-1 align-items-center">
                                                                            <div>
                                                                                <img src="../../assets/img/icons/flags/GB.png"
                                                                                    alt="Country flag">
                                                                            </div>
                                                                            <div class="ms-4">
                                                                                <p class="text-xs font-weight-bold mb-0 ">
                                                                                    Country:</p>
                                                                                <h6
                                                                                    class="text-sm font-weight-normal mb-0 ">
                                                                                    Great Britain</h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-center">
                                                                            <p class="text-xs font-weight-bold mb-0 ">
                                                                                Sales:
                                                                            </p>
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                1.400
                                                                            </h6>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-center">
                                                                            <p class="text-xs font-weight-bold mb-0 ">
                                                                                Value:
                                                                            </p>
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                $190,700</h6>
                                                                        </div>
                                                                    </td>
                                                                    <td class="align-middle text-sm">
                                                                        <div class="col text-center">
                                                                            <p class="text-xs font-weight-bold mb-0 ">
                                                                                Bounce:
                                                                            </p>
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                23.44%
                                                                            </h6>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-30">
                                                                        <div class="d-flex px-2 py-1 align-items-center">
                                                                            <div>
                                                                                <img src="../../assets/img/icons/flags/BR.png"
                                                                                    alt="Country flag">
                                                                            </div>
                                                                            <div class="ms-4">
                                                                                <p class="text-xs font-weight-bold mb-0 ">
                                                                                    Country:</p>
                                                                                <h6
                                                                                    class="text-sm font-weight-normal mb-0 ">
                                                                                    Brasil</h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-center">
                                                                            <p class="text-xs font-weight-bold mb-0 ">
                                                                                Sales:
                                                                            </p>
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                562
                                                                            </h6>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="text-center">
                                                                            <p class="text-xs font-weight-bold mb-0 ">
                                                                                Value:
                                                                            </p>
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                $143,960</h6>
                                                                        </div>
                                                                    </td>
                                                                    <td class="align-middle text-sm">
                                                                        <div class="col text-center">
                                                                            <p class="text-xs font-weight-bold mb-0 ">
                                                                                Bounce:
                                                                            </p>
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                32.14%
                                                                            </h6>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active" id="pills-productos-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-productos"data-bs-toggle="tab"
                                        href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard"
                                        aria-selected="true">
                                        Productos
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1"id="pills-clientes-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-clientes" data-bs-toggle="tab"
                                        href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard"
                                        aria-selected="false">
                                        Clientes
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="#profile-tabs-simple"
                                        role="tab" aria-controls="profile" aria-selected="true"
                                        id="pills-nuevos-tab" data-bs-toggle="pill" data-bs-target="#pills-nuevos"
                                        aria-selected="false">Nuevos

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            {{-- MODALES --}}
            @livewire('backend.clientes-live.crearclient')
        </div>
    </form>
@endsection

@push('custom-scripts')
    {{-- para enviar el span --}}


    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Seleccione...",
                allowClear: true
            });
        });
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        $(document).ready(function() {
            $('#productos').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('ventas') }}",
                columns: [{
                        data: 'nombre_p',
                        name: 'nombre_p'
                    },
                    {
                        data: 'action',
                        sWidth: '110px',
                        sortable: false
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'precio_venta_public',
                        name: 'precio_venta_public'
                    },
                ],
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "info": false,
                "ordering": false,
                "paging": false,
                "deferRender": true,
                "scroller": true,
                "scrollCollapse": true,
                "scrollY": 250
            });
        });
    </script>
@endpush
