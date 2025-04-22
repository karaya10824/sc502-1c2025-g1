@extends('layouts.app')

@section('contentt')
<header class="bg-gray-200 text-white py-20">
        <h1>Detalle del Producto</h1>
</header>
    <main class="product-container">
        <!-- Imagen del producto -->

        <div class="product-gallery">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
            @foreach ($Producto->media as $imagen)
                <img id="main-image" src="{{ $imagen->getUrl() }}" alt="Producto">
            @endforeach
            </div>
        </div>

        <!-- Información del producto -->
        <div class="md:w-1/2 md:pl-8">
            <h2 class="text-2xl font-bold mb-4">{{ $Producto->nombre_producto}}</h2>
            <p class="text-xl text-gray-700 mb-4">$120.00</p>
            
            <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2">Tallas disponibles</h3>
                <div class="flex space-x-2">
                    <button class="size px-4 py-2 border rounded-lg hover:bg-gray-200">S</button>
                    <button class="size px-4 py-2 border rounded-lg hover:bg-gray-200">M</button>
                    <button class="size px-4 py-2 border rounded-lg hover:bg-gray-200">L</button>
                    <button class="size px-4 py-2 border rounded-lg hover:bg-gray-200">XL</button>
                </div>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2">Cantidad</h3>
                <input type="number" min="1" value="1" class="w-20 px-4 py-2 border rounded-lg">
            </div>

            <button class="add-to-cart w-full bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-900 transition duration-300"
                data-id="{{ $Producto['id_producto'] }}"
                data-nombre="{{ $Producto['nombre_producto'] }}"
                data-precio="{{ $Producto['precio_venta_producto'] }}">
                Agregar al Carrito
            </button>

            <p class="mt-4 text-gray-700">
                Este buzo de Pleasures con cremallera y diseño de dragón es ideal para un estilo urbano y moderno. Fabricado con materiales de alta calidad para máxima comodidad.
            </p>
        </div>
        
    </main>

    <div class="max-w-6xl mx-auto bg-gray-100 shadow-lg">
        <!-- Navegación de pestañas -->
        <div class="flex align-center justify-center border-b border-gray-300">
            <button class="tab-link py-3 px-6 text-gray-600 font-semibold hover:text-black focus:text-black border-b-2 border-transparent focus:border-black" data-tab="tab1">
                Descripción
            </button>
            <button class="tab-link py-3 px-6 text-gray-600 font-semibold hover:text-black focus:text-black border-b-2 border-transparent focus:border-black" data-tab="tab2">
                Envío
            </button>
            <button class="tab-link py-3 px-6 text-gray-600 font-semibold hover:text-black focus:text-black border-b-2 border-transparent focus:border-black" data-tab="tab3">
                Cambios & Devoluciones
            </button>
            <button class="tab-link py-3 px-6 text-gray-600 font-semibold hover:text-black focus:text-black border-b-2 border-transparent focus:border-black" data-tab="tab4">
                Garantía
            </button>
        </div>

        <!-- Contenido de las pestañas -->
        <div class="p-6">
            <div id="tab1" class="tab-content">
                <h2 class="text-xl font-semibold mb-2">Descripción del Producto</h2>
                <p class="text-gray-700">Este es un producto increíble con una calidad excepcional...</p>
            </div>
            <div id="tab2" class="tab-content hidden">
                <h2 class="text-xl font-semibold mb-2">Detalles del Producto</h2>
                <ul class="list-disc pl-5 text-gray-700">
                    <li>Material: Algodón 100%</li>
                    <li>Colores disponibles: Negro, Blanco, Azul</li>
                    <li>Tallas: S, M, L, XL</li>
                </ul>
            </div>
            <div id="tab3" class="tab-content hidden">
                <h2 class="text-xl font-semibold mb-2">Reseñas de Clientes</h2>
                <p class="text-gray-700 italic">"Un producto excelente, superó mis expectativas!"</p>
            </div>
            <div id="tab4" class="tab-content hidden">
                <h2 class="text-xl font-semibold mb-2">Reseñas </h2>
                <p class="text-gray-700 italic">"Un producto excelente, superó mis expectativas!"</p>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mt-10 mx-auto">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Productos Recomendados</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Producto 1 -->
            <div class="bg-white p-4 shadow-lg rounded-lg">
                <img src="https://via.placeholder.com/300" alt="Producto" class="w-full rounded-md">
                <h3 class="text-lg font-semibold text-gray-700 mt-3">Producto 1</h3>
                <p class="text-gray-500 text-sm">Descripción corta del producto.</p>
                <span class="text-black font-bold mt-2 block">$99.99</span>
                <button class="mt-3 w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">Agregar al carrito</button>
            </div>

            <!-- Producto 2 -->
            <div class="bg-white p-4 shadow-lg rounded-lg">
                <img src="https://via.placeholder.com/300" alt="Producto" class="w-full rounded-md">
                <h3 class="text-lg font-semibold text-gray-700 mt-3">Producto 2</h3>
                <p class="text-gray-500 text-sm">Descripción corta del producto.</p>
                <span class="text-black font-bold mt-2 block">$89.99</span>
                <button class="mt-3 w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">Agregar al carrito</button>
            </div>

            <!-- Producto 3 -->
            <div class="bg-white p-4 shadow-lg rounded-lg">
                <img src="https://via.placeholder.com/300" alt="Producto" class="w-full rounded-md">
                <h3 class="text-lg font-semibold text-gray-700 mt-3">Producto 3</h3>
                <p class="text-gray-500 text-sm">Descripción corta del producto.</p>
                <span class="text-black font-bold mt-2 block">$79.99</span>
                <button class="mt-3 w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">Agregar al carrito</button>
            </div>

            <!-- Producto 4 -->
            <div class="bg-white p-4 shadow-lg rounded-lg">
                <img src="https://via.placeholder.com/300" alt="Producto" class="w-full rounded-md">
                <h3 class="text-lg font-semibold text-gray-700 mt-3">Producto 4</h3>
                <p class="text-gray-500 text-sm">Descripción corta del producto.</p>
                <span class="text-black font-bold mt-2 block">$69.99</span>
                <button class="mt-3 w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">Agregar al carrito</button>
            </div>
        </div>
    </div>
    <script>
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

const botonesAgregar = document.querySelectorAll('.add-to-cart');
botonesAgregar.forEach(boton => {
    boton.addEventListener('click', function () {
        const id = this.dataset.id;
        const nombre = this.dataset.nombre;
        const precio = parseFloat(this.dataset.precio);

        agregarAlCarrito(id, nombre, precio);
    });
    });

// Inicializar el carrito al cargar la página
document.addEventListener('DOMContentLoaded', function () {
    mostrarCarrito();
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
    </script>
@endsection
