@extends('Backend.Layout.app')

@section('main-content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <!-- PARTE OPERACIONAL DE OPCIONES -->
            <div class="col-12 col-md-7">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <div class="col-sm-12 col-md-6">
                                <div id="searchInput1" class="dataTables_filter"><label class="is-filled">Buscar:<input
                                            type="search" class="form-control form-control-sm" placeholder=""
                                            aria-controls="example"></label></div>
                            </div>

                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="w-24 cursor-pointer  text-left text-uppercase text-secondary text-sm font-weight-bolder opacity-7"
                                            wire:click="order('id_proveedor')">
                                            Id

                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1" aria-hidden="true"></i>

                                        </th>
                                        <th class="cursor-pointer  text-uppercase text-secondary text-sm font-weight-bolder opacity-7"
                                            wire:click="order('nombre_proveedor')">
                                            Proveedor

                                            <i class="fas fa-sort float-right " aria-hidden="true"></i>
                                        </th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-md">5</h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-md">asdasd</h6>
                                                    <p class="text-xs text-secondary mb-0">asdsad</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="d-flex px-2 py-1">
                                            <form action="" method="POST" class="formulario">

                                                <input type="hidden" name="_token"
                                                    value="RirOC5jivBH99gc8lLmb44F0d5tfiNUc8dfh9yVD">
                                                <input type="hidden" name="_method" value="delete">
                                                <a href="" class="btn bg-gradient-info" data-bs-toggle="modal"
                                                    data-bs-target="#editar_proveedor"
                                                    wire:click="edit({&quot;id_proveedor&quot;:5,&quot;nombre_proveedor&quot;:&quot;asdasd&quot;,&quot;pais_proveedor&quot;:&quot;asdsad&quot;})"><i
                                                        class="material-icons">edit</i>
                                                    Editar</a>


                                                <a wire:click="$emit('deleteProveedor', 5)" href=""
                                                    class="btn bg-gradient-danger" data-bs-toggle="modal">
                                                    <i class="material-icons">delete</i>
                                                    Eliminard</a>

                                                <a class="btn btn-red ml-2" data-bs-toggle="" wire:click="delete(5)">
                                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-md">4</h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-md">madeinchina</h6>
                                                    <p class="text-xs text-secondary mb-0">chinaa</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="d-flex px-2 py-1">
                                            <form action="" method="POST" class="formulario">

                                                <input type="hidden" name="_token"
                                                    value="RirOC5jivBH99gc8lLmb44F0d5tfiNUc8dfh9yVD">
                                                <input type="hidden" name="_method" value="delete">
                                                <a href="" class="btn bg-gradient-info" data-bs-toggle="modal"
                                                    data-bs-target="#editar_proveedor"
                                                    wire:click="edit({&quot;id_proveedor&quot;:4,&quot;nombre_proveedor&quot;:&quot;madeinchina&quot;,&quot;pais_proveedor&quot;:&quot;chinaa&quot;})"><i
                                                        class="material-icons">edit</i>
                                                    Editar</a>


                                                <a wire:click="$emit('deleteProveedor', 4)" href=""
                                                    class="btn bg-gradient-danger" data-bs-toggle="modal">
                                                    <i class="material-icons">delete</i>
                                                    Eliminard</a>

                                                <a class="btn btn-red ml-2" data-bs-toggle="" wire:click="delete(4)">
                                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-md">2</h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-md">8060</h6>
                                                    <p class="text-xs text-secondary mb-0">china</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="d-flex px-2 py-1">
                                            <form action="" method="POST" class="formulario">

                                                <input type="hidden" name="_token"
                                                    value="RirOC5jivBH99gc8lLmb44F0d5tfiNUc8dfh9yVD">
                                                <input type="hidden" name="_method" value="delete">
                                                <a href="" class="btn bg-gradient-info" data-bs-toggle="modal"
                                                    data-bs-target="#editar_proveedor"
                                                    wire:click="edit({&quot;id_proveedor&quot;:2,&quot;nombre_proveedor&quot;:&quot;8060&quot;,&quot;pais_proveedor&quot;:&quot;china&quot;})"><i
                                                        class="material-icons">edit</i>
                                                    Editar</a>


                                                <a wire:click="$emit('deleteProveedor', 2)" href=""
                                                    class="btn bg-gradient-danger" data-bs-toggle="modal">
                                                    <i class="material-icons">delete</i>
                                                    Eliminard</a>

                                                <a class="btn btn-red ml-2" data-bs-toggle="" wire:click="delete(2)">
                                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-md">1</h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-md">alibaba</h6>
                                                    <p class="text-xs text-secondary mb-0">china</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="d-flex px-2 py-1">
                                            <form action="" method="POST" class="formulario">

                                                <input type="hidden" name="_token"
                                                    value="RirOC5jivBH99gc8lLmb44F0d5tfiNUc8dfh9yVD">
                                                <input type="hidden" name="_method" value="delete">
                                                <a href="" class="btn bg-gradient-info" data-bs-toggle="modal"
                                                    data-bs-target="#editar_proveedor"
                                                    wire:click="edit({&quot;id_proveedor&quot;:1,&quot;nombre_proveedor&quot;:&quot;alibaba&quot;,&quot;pais_proveedor&quot;:&quot;china&quot;})"><i
                                                        class="material-icons">edit</i>
                                                    Editar</a>


                                                <a wire:click="$emit('deleteProveedor', 1)" href=""
                                                    class="btn bg-gradient-danger" data-bs-toggle="modal">
                                                    <i class="material-icons">delete</i>
                                                    Eliminard</a>

                                                <a class="btn btn-red ml-2" data-bs-toggle="" wire:click="delete(1)">
                                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-md">0</h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-md">Sin Proveedor</h6>
                                                    <p class="text-xs text-secondary mb-0">Sin Pais</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="d-flex px-2 py-1">
                                            <form action="" method="POST" class="formulario">

                                                <input type="hidden" name="_token"
                                                    value="RirOC5jivBH99gc8lLmb44F0d5tfiNUc8dfh9yVD">
                                                <input type="hidden" name="_method" value="delete">
                                                <a href="" class="btn bg-gradient-info" data-bs-toggle="modal"
                                                    data-bs-target="#editar_proveedor"
                                                    wire:click="edit({&quot;id_proveedor&quot;:0,&quot;nombre_proveedor&quot;:&quot;Sin Proveedor&quot;,&quot;pais_proveedor&quot;:&quot;Sin Pais&quot;})"><i
                                                        class="material-icons">edit</i>
                                                    Editar</a>


                                                <a wire:click="$emit('deleteProveedor', 0)" href=""
                                                    class="btn bg-gradient-danger" data-bs-toggle="modal">
                                                    <i class="material-icons">delete</i>
                                                    Eliminard</a>

                                                <a class="btn btn-red ml-2" data-bs-toggle="" wire:click="delete(0)">
                                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="px-12 py-2">

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
                            <div class="tab-pane fade show active" id="pills-nuevos" role="tabpanel"
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
                                                    data-bs-toggle="modal" data-bs-target="#nuevo_cliente">Nuevo</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--Tercer NAV VAR PRODUCTOS -->
                            <div class="tab-pane fade" id="pills-productos" role="tabpanel"
                                aria-labelledby="pills-productos-tab">
                                <div class="card mb-4 ">
                                    <div class="d-flex">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-xl mt-n3 ms-4">
                                            <i class="material-icons opacity-10" aria-hidden="true">store</i>
                                        </div>
                                        <h6 class="mt-3 mb-2 ms-3 ">PRODUCTOS/SERVICIOS</h6>
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
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                United States</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Sales:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">2500
                                                                        </h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Value:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">
                                                                            $230,900</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-sm">
                                                                    <div class="col text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Bounce:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">29.9%
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
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                Germany</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Sales:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">3.900
                                                                        </h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Value:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">
                                                                            $440,000</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-sm">
                                                                    <div class="col text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Bounce:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">40.22%
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
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                Great Britain</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Sales:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">1.400
                                                                        </h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Value:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">
                                                                            $190,700</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-sm">
                                                                    <div class="col text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Bounce:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">23.44%
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
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                Brasil</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Sales:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">562
                                                                        </h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Value:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">
                                                                            $143,960</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-sm">
                                                                    <div class="col text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Bounce:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">32.14%
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
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                United States</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Sales:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">2500
                                                                        </h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Value:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">
                                                                            $230,900</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-sm">
                                                                    <div class="col text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Bounce:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">29.9%
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
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                Germany</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Sales:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">3.900
                                                                        </h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Value:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">
                                                                            $440,000</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-sm">
                                                                    <div class="col text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Bounce:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">40.22%
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
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                Great Britain</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Sales:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">1.400
                                                                        </h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Value:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">
                                                                            $190,700</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-sm">
                                                                    <div class="col text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Bounce:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">23.44%
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
                                                                            <h6 class="text-sm font-weight-normal mb-0 ">
                                                                                Brasil</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Sales:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">562
                                                                        </h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Value:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">
                                                                            $143,960</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-sm">
                                                                    <div class="col text-center">
                                                                        <p class="text-xs font-weight-bold mb-0 ">Bounce:
                                                                        </p>
                                                                        <h6 class="text-sm font-weight-normal mb-0 ">32.14%
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
                                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab"
                                    href="#profile-tabs-simple" role="tab" aria-controls="profile"
                                    aria-selected="true" id="pills-nuevos-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-nuevos" aria-selected="false">Nuevos

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1"id="pills-clientes-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-clientes" data-bs-toggle="tab" href="#dashboard-tabs-simple"
                                    role="tab" aria-controls="dashboard" aria-selected="false">
                                    Clientes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" id="pills-productos-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-productos"data-bs-toggle="tab" href="#dashboard-tabs-simple"
                                    role="tab" aria-controls="dashboard" aria-selected="true">
                                    Productos
                                </a>
                            </li>
                            <!--
                                                                                            <li class="nav-item">
                                                                                                <a class="nav-link mb-0 px-0 py-1" id="pills-cateogiria-tab" data-bs-toggle="pill"
                                                                                                    data-bs-target="#pills-categoria"data-bs-toggle="tab" data-bs-toggle="tab"
                                                                                                    href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard"
                                                                                                    aria-selected="false">
                                                                                                    Categorias
                                                                                                </a>
                                                                                            </li>
                                                                                        -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- MODALES --}}
        @livewire('backend.clientes-live.crearclient')
    </div>
@endsection

@push('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Seleccione...",
                allowClear: true
            });
        });
    </script>
    <style>
        tr.even {}

        div:empty {
            display: none;
        }

        input.form-control {
            border: #000 1px solid;
        }

        div.dataTables_filter {
            background-color: white;
            position: relative;

        }
    </style>
    <script>
        $(document).ready(function() {
            $('#productos1').DataTable({
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
                "language": {
                    "search": "Buscar",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "paginate": {
                        "previous": "<",
                        "next": ">",
                        "first": "Primero",
                        "last": "Último"
                    }

                }
            });
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
    <script></script>
@endpush
