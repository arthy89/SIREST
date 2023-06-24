
@extends('Frontend.Layout.app')

@section('main-content')
  <!-- ...:::: Start Breadcrumb Section:::... -->
  <div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Cart</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                <li class="active" aria-current="page">Cart</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Cart Section:::... -->
<div class="cart-section" id="con-contenido-carrito">
    <!-- Start Cart Table -->
    <div class="cart-table-wrapper" id="carrito-contenido" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="table_page table-responsive">
                            <table>
                                <!-- Start Cart Table Head -->
                                <thead>
                                    <tr>
                                        <th class="product_remove">Eliminar</th>
                                        <th class="product_thumb">Imagen</th>
                                        <th class="product_name">Producto</th>
                                        <th class="product-price">Precio</th>
                                        <th class="product_quantity">Cantidad</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                </thead> <!-- End Cart Table Head -->
                                <tbody id="tbody-carrito">


                                </tbody>
                            </table>
                        </div>
                        <div class="cart_submit">
                            <button class="btn btn-md btn-golden" type="submit">Actualizar precio</button>

                        </div>
                        <div class="cart_submit">

                            <button id="carrito-acciones-vaciar" class="btn btn-md btn-golden carrito-acciones-vaciar" type="submit">vaciar carrito</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Cart Table -->

    <!-- Start Coupon Start -->
    <div class="coupon_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code left" data-aos="fade-up" data-aos-delay="200">
                        <h3>Copon</h3>
                        <div class="coupon_inner">
                            <p>Digite el cupon de descuento.</p>
                            <input class="mb-2" placeholder="Coupon code" type="text">
                            <button type="submit" class="btn btn-md btn-golden">Aplicar Cupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                        <h3>Carrito Total</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Subtotal</p>
                                <p class="subtotal" id="subtotal">$</p>
                            </div>
                            <div class="cart_subtotal ">
                                <p>Costo envio</p>
                                <p class="cart_amount"><span>Tarifa:</span> $10.00</p>
                            </div>
                            <a href="#">Calculate shipping</a>

                            <div class="cart_subtotal">
                                <p>Total</p>
                                <p class="total" id="total">$215.00</p>
                            </div>
                            <div class="checkout_btn">
                                <a href="#" class="btn btn-md btn-golden">Proceesar Pago</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Coupon Start -->
</div> <!-- ...:::: End Cart Section:::... -->
<div class="empty-cart-section section-fluid" id="sin-contenido-carrito">
    <div class="emptycart-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-xl-6 offset-xl-3">
                    <div class="emptycart-content text-center">
                        <div class="image">
                            <img class="img-fluid" src="" alt="">
                        </div>
                        <h4 class="title">Su carrito esta Vacio</h4>
                        <h6 class="sub-title">Lo Siento Compañero... ¡No Se Encontró Ningún Artículo Dentro De Su Carrito!</h6>
                        <a href="{{route('ecomerce_categorias')}}" class="btn btn-lg btn-golden">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('costum-js')
<script>
    var tbody = document.getElementById('tbody-carrito');

    if (tbody.childElementCount > 0) {
    //console.log('El tbody tiene elementos hijos');

    } else {
    //console.log('El tbody está vacío');

    }
</script>
<script>
    var contenido_carro = document.getElementById('con-contenido-carrito');
    var sincontenido_carro = document.getElementById('sin-contenido-carrito');
    let botonesEliminar = document.querySelectorAll("#carrito-producto-eliminar");
    //carrito localstorage
    let ProductosEnCarrito = localStorage.getItem("productos-en-carrito");
    ProductosEnCarrito = JSON.parse(ProductosEnCarrito)
    const botonVaciar = document.querySelector("#carrito-acciones-vaciar");
    const contenedorTotal = document.querySelector("#subtotal");
    const contenedorsubTotal = document.querySelector("#total");


    //console.log(ProductosEnCarrito);
cargarProductoCarrito();
//console.log(ProductosEnCarrito.length);
function cargarProductoCarrito(){

    if(ProductosEnCarrito && ProductosEnCarrito.length > 0){
        //sincontenido_carro
        //console.log(contenido_carro.classList.add("disable"));
        //contenido_carro.classList.remove("disable");
        sincontenido_carro.style.display = 'none';
        ProductosEnCarrito.forEach(producto =>{
            //console.log(${producto.imagen});
            // Obtener una referencia al <tbody> por su ID
            var tbody = document.getElementById('tbody-carrito');
            //vamos a controlar en caso de ofertas
            //console.log(producto.nombre_promocion);
            let preciopantalla = 0;
            if(producto.nombre_promocion){
                //console.log("contiene promocion final");
                if(producto.tipo_descuento == 1){
                    preciopantalla = producto.precio_venta_public*producto.cantidad_descuento/100;

                }else{
                    preciopantalla =producto.precio_venta_public - producto.cantidad_descuento;
                    //console.log("descuenot por cantidad");
                }
            }else{
                preciopantalla = producto.precio_venta_public;
            }
            //console.log(preciopantalla);
            // Crear un nuevo elemento <tr>
            var tr = document.createElement('tr');
            tr.innerHTML = `<td class="product_remove"><button class="carrito-producto-eliminar" id="${producto.idproducto}">
                                        <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                        </td>
                                        <td class="product_thumb"><a href="product-details-default.html"><img
                                                    src="${producto.imagen}"
                                                    alt=""></a></td>
                                        <td class="product_name"><a href="product-details-default.html">
                                            ${producto.nombre_p}</a></td>
                                        <td class="product-price">$ ${preciopantalla}</td>
                                        <td class="product_quantity"><label>Cantidad</label> <input min="1"
                                                max="${producto.stock}" value="${producto.cantidad}" type="number"></td>
                                        <td class="product_total">$ ${preciopantalla*producto.cantidad}</td> `;
            // agregar precio total

            // Agregar el <tr> al <tbody>
            tbody.appendChild(tr);


        })
    }else{
        console.log("no tiene nada el carrito");
        sincontenido_carro.style.display = "block";
        contenido_carro.style.display = 'none';

    }
    actualizarBotonesEliminar();
    actualizarTotal();
}
// Obtén el contenido de un div por su clase
//var elementos = document.getElementsByClassName('product_quantity');
///var primerElemento = elementos[0];
// Imprime el contenido en la consola
////console.log(elementos);


    function actualizarBotonesEliminar(){
        botonesEliminar = document.querySelectorAll(".carrito-producto-eliminar");
        //console.log(botonesEliminar);
        botonesEliminar.forEach(boton => {
            boton.addEventListener("click", eliminarDelCarrito);
        });
    }

    function eliminarDelCarrito(e){
        const  idBoton = e.currentTarget.id;
        //console.log(idBoton);
        const productoEliminado = ProductosEnCarrito.find(producto =>producto.idproducto == idBoton);
        const index = ProductosEnCarrito.findIndex(producto => producto.idproducto == idBoton);

        //console.log(ProductosEnCarrito);
        ProductosEnCarrito.splice(index, 1);
        //console.log(ProductosEnCarrito);
        refrescarContenido();
        cargarProductoCarrito();
        localStorage.setItem("productos-en-carrito", JSON.stringify(ProductosEnCarrito));

    }
    function refrescarContenido() {
        var divElement = document.getElementById("tbody-carrito");
        divElement.innerHTML = "";
    }
    botonVaciar.addEventListener("click",vaciarCarrito);
    function vaciarCarrito(){
        ProductosEnCarrito.length = 0;
        localStorage.setItem("productos-en-carrito", JSON.stringify(ProductosEnCarrito));
        cargarProductoCarrito();
}
    function actualizarTotal(){
        let preciopantalla = 0;
        let costo_envio = 10;
        let precioaux = 0;
        ProductosEnCarrito.forEach(producto =>{
            if(producto.nombre_promocion){
                //console.log("contiene promocion final");
                if(producto.tipo_descuento == 1){
                    preciopantalla = producto.precio_venta_public*producto.cantidad_descuento/100;

                }else{
                    preciopantalla =producto.precio_venta_public - producto.cantidad_descuento;
                    //console.log("descuenot por cantidad");
                }
            }else{
                preciopantalla = producto.precio_venta_public;
            }
            //aqui esssta el precio cuanodo existe promociones
            precioaux = precioaux + preciopantalla*producto.cantidad;
        })
        precioauxil = precioaux.toFixed(2)
        subtotal.innerText = `$${precioauxil}`;
        precioaux = precioaux + costo_envio;
        precioauxiltotal = precioaux.toFixed(2)
        //precioaux = precioaux.toFixed(2)
        total.innerText = `$${precioauxiltotal}`;
        console.log("precio con envio",precioaux);
        //const totalCalculado = ProductosEnCarrito.reduce((acc, producto) => acc + (producto.precio_venta_public*producto.cantidad), 0);
        //total.innerText = `$${totalCalculado}`;
        //console.log(totalCalculado);
    }

</script>
@endpush
