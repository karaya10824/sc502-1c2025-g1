@extends('layouts.app')

@section('title', 'Pago')

@section('contentt')
<div>
        <div class="flex flex-col md:flex-row overflow-hidden pt-16 h-screen">
            <!-- Columna del formulario -->
            <div class="w-full md:w-1/2 p-8 bg-white overflow-y-auto h-full" style="padding-left:10%">
                <form>
                    <h2 class="text-2xl font-bold mb-6">Datos Personales</h2>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-semibold mb-2">Cédula</label>
                        <input type="text" id="address" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-semibold mb-2">Nombre</label>
                            <input type="text" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>                        
                        </div>

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-semibold mb-2">Apellidos</label>
                            <input type="text" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>                        
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-semibold mb-2">Correo Electrónico</label>
                        <input type="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-semibold mb-2">Teléfono</label>
                        <input type="text" id="address" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>

                    <h2 class="text-2xl font-bold mb-6">Envío</h2>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 font-semibold mb-2">Provincia</label>
                            <input type="text" id="address" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 font-semibold mb-2">Cantón</label>
                            <input type="text" id="address" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 font-semibold mb-2">Distrito</label>
                            <input type="text" id="address" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-semibold mb-2">Dirección Exacta</label>
                        <input type="text" id="address" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>

                    <h2 class="text-2xl font-bold mb-6">Entrega</h2>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">Nombre</label>
                        <input type="text" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-semibold mb-2">Correo Electrónico</label>
                        <input type="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-semibold mb-2">Dirección</label>
                        <input type="text" id="address" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>

                    <h2 class="text-2xl font-bold mb-6">Pago</h2>
                    <div class="mb-4">
                        <input type="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Número de la tarjeta">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <input type="text" id="address" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="MM/AA">
                        </div>
                        <div class="mb-4">
                            <input type="text" id="address" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="CVC">
                        </div>
                    </div>

                    <div class="mb-4">
                        <input type="text" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Nombre en la tarjeta"> 
                    </div>
                    <button class="w-full bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-900 transition duration-300">Proceder al Pago</button>                
                </form>
            </div>

            <!-- Columna del carrito -->
            <div class="w-full md:w-1/2 p-8 bg-gray-100 h-full" style="padding-right:10%">
                <h2 class="text-2xl font-bold mb-6 pr-20">Carrito de Compras</h2>
                <div class="mb-4">
                    <div class="flex justify-between items-center border-b pb-4 mb-4">
                        <div class="flex items-center">
                            <img src="https://via.placeholder.com/100" alt="Producto" class="w-16 h-16 object-cover rounded-lg">
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold">Nombre del Producto</h3>
                                <p class="text-gray-600">Descripción breve del producto.</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <p class="ml-4 text-lg font-semibold">$99.99</p>
                        </div>
                    </div>
                    <!-- Agrega más productos aquí -->
                </div>
                <label for="discount-code" class="block text-gray-700 font-semibold mb-2">Código de Descuento</label>
                <div class="mb-4 flex gap-6">
                    <input type="text" id="discount-code" class="w-3/4  px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">            
                    <button class="w-1/4 bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-900 transition duration-300">Aplicar</button>
                </div>
                <div class="flex justify-between items-center mb-6">
                    <p class="text-lg font-semibold">Subtotal:</p>
                    <p class="text-lg font-semibold">$99.99</p>
                </div>
                <div class="flex justify-between items-center mb-6">
                    <p class="text-lg font-semibold">Envío:</p>
                    <p class="text-lg font-semibold">$99.99</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggle-cart').addEventListener('click', function() {
            var cartContent = document.getElementById('cart-content');
            cartContent.classList.toggle('hidden');
        });
    </script>

@endsection
