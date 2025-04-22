let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

// Función para agregar un producto al carrito
function agregarAlCarrito(id, nombre, precio) {
    const productoExistente = carrito.find(item => item.id === id);

    if (productoExistente) {
        productoExistente.cantidad += 1;
    } else {
        carrito.push({ id, nombre, precio, cantidad: 1 });
    }

    // Guardar el carrito en localStorage
    localStorage.setItem('carrito', JSON.stringify(carrito));

    // Mostrar el carrito actualizado
    mostrarCarrito();
}

// Función para mostrar el carrito
function mostrarCarrito() {
    const carritoContainer = document.getElementById('carrito-container');
    if (!carritoContainer) return;

    carritoContainer.innerHTML = '';

    carrito.forEach(producto => {
        const item = document.createElement('div');
        item.classList.add('flex', 'justify-between', 'items-center', 'border-b', 'py-2');
        item.innerHTML = `
            <span>${producto.nombre} (x${producto.cantidad})</span>
            <span>₡${(producto.precio * producto.cantidad).toLocaleString('es-CR')}</span>
        `;
        carritoContainer.appendChild(item);
    });

    // Mostrar el total
    const total = carrito.reduce((sum, item) => sum + item.precio * item.cantidad, 0);
    const totalElement = document.createElement('div');
    totalElement.classList.add('font-bold', 'text-right', 'mt-4');
    totalElement.innerText = `Total: ₡${total.toLocaleString('es-CR')}`;
    carritoContainer.appendChild(totalElement);
}

// Función para inicializar los botones de "Agregar al Carrito"
function inicializarBotonesCarrito() {
    const botonesAgregar = document.querySelectorAll('.add-to-cart');
    console.log("pase prueba");
    botonesAgregar.forEach(boton => {
        boton.addEventListener('click', function () {
            const id = this.dataset.id;
            const nombre = this.dataset.nombre;
            const precio = parseFloat(this.dataset.precio);

            agregarAlCarrito(id, nombre, precio);
        });
    });
}

// Inicializar el carrito al cargar la página
document.addEventListener('DOMContentLoaded', function () {
    mostrarCarrito();
    inicializarBotonesCarrito();
});

// Función para guardar el carrito
document.getElementById('guardar-carrito').addEventListener('click', function () {
    fetch('/carrito/guardar', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ carrito })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Carrito guardado correctamente.');
        }
    })
    .catch(error => console.error('Error:', error));
});