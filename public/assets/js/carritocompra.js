let productoEnCarrito;
let nuevoNumerito;
const numerito = document.querySelector('#numerito');
const numeritomovil = document.querySelector('#numeritomovil');

let ProductosEnCarritoLS = localStorage.getItem("productos-en-carrito");

//const ProductosEnCarritoLS = JSON.parse(localStorage.getItem("productos-en-carrito"))

if(ProductosEnCarritoLS){
    productoEnCarrito = JSON.parse(ProductosEnCarritoLS);
    let nuevoNumerito = productoEnCarrito.reduce((acc, ProductosEnCarritoLS) => acc + ProductosEnCarritoLS.cantidad, 0 );
    numerito.innerText = nuevoNumerito;
    numeritomovil.innerText = nuevoNumerito;
    //actualizarnumerito();

}else{
    productoEnCarrito = [];
}
//const productoEnCarrito = [];

var span = document.querySelector('.price');
var valorprecio = span.textContent;
var preciopantalla = parseFloat(valorprecio);


//var datos = @json($prorecien);
//const proo = {{$prorecien->precio_venta_public}};
function agregarAlCarrito(e,productos){
    //todo los prodcutos  recien
    const id = e.currentTarget.id;
    const productoAgregado = productos;

    if( productoEnCarrito.some(productos=>productos.idproducto == id) ) {
        //console.log("La condición es verdadera");
        //console.log('true');
        const index = productoEnCarrito.findIndex(productos => productos.idproducto == id);
        productoEnCarrito[index].cantidad++;
        productoEnCarrito[index].cantidadcompra++

        //console.log(index);
    }else{
        productoAgregado.cantidad = 1;
        productoAgregado.preciopantalla = valorprecio;
        //productoAgregado.cantidadcompra = 0;
        // if(productoEnCarrito !== null){
        //     productoAgregado.cantidadcompra = 1;
        // }else{
        //     productoEnCarrito[index].cantidadcompra++
        // }
        productoEnCarrito.push(productoAgregado);


    }

    //console.log(productoEnCarrito);

    actualizarnumerito(productos);

    localStorage.setItem("productos-en-carrito", JSON.stringify(productoEnCarrito));
    //console.log(productos)
    return actualizarnumerito;
}
function actualizarnumerito(productos){
    let nuevoNumerito = productoEnCarrito.reduce((acc, productos) => acc + productos.cantidad, 0 );
    numerito.innerText = nuevoNumerito;
    numeritomovil.innerText = nuevoNumerito;
}

