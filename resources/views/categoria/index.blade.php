@extends('layouts.app')

@section('contentt')
<main class="container mx-auto px-4 py-8">
        <!-- Botón para desplegar filtros en móviles -->
        <button id="filter-toggle" class="filter-toggle">Filtros ☰</button>

        <div class="flex flex-col md:flex-row">
            <!-- Aside de filtros 
            <aside id="filters" class="w-full md:w-1/4 bg-white p-4 mb-4 md:mb-0">
                <h2 class="text-xl font-bold mb-4">Filtros</h2>
                <div class="filter-group mb-4">
                    <h3 class="text-lg font-semibold mb-2">Categoría</h3>
                    <select class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                        <option value="todos">Todos</option>
                        <option value="sneakers">Sneakers</option>
                        <option value="ropa">Ropa</option>
                        <option value="accesorios">Accesorios</option>
                    </select>
                </div>
                <div class="filter-group mb-4">
                    <h3 class="text-lg font-semibold mb-2">Precio</h3>
                    <input type="range" min="10" max="500" step="10" class="w-full">
                </div>
                <div class="filter-group mb-4">
                    <h3 class="text-lg font-semibold mb-2">Marca</h3>
                    <label class="block mb-2"><input type="checkbox" class="mr-2"> Nike</label>
                    <label class="block mb-2"><input type="checkbox" class="mr-2"> Adidas</label>
                    <label class="block mb-2"><input type="checkbox" class="mr-2"> Puma</label>
                </div>
            </aside> -->

            <div class="w-full mx-auto grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">
                <!-- Tarjeta de Producto -->
                <div class=" bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative">
                        <img src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Producto" class="w-full h-3/4 object-cover transition-transform group-hover:scale-105 duration-300">
                        <span class="absolute top-2 left-2 bg-black text-white text-xs uppercase px-2 py-1 rounded">Nuevo</span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-gray-600 transition duration-300">
                            Nike Air Force 1
                        </h3>
                        <p class="text-sm text-gray-500">Zapatillas clásicas de mujer.</p>
                        <span class="block text-black font-bold mt-2">$129.99</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative">
                        <img src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Producto" class="w-full h-1/3 object-cover transition-transform group-hover:scale-105 duration-300">
                        <span class="absolute top-2 left-2 bg-red-500 text-white text-xs uppercase px-2 py-1 rounded">SALE</span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-gray-600 transition duration-300">
                            Nike Air Force 1
                        </h3>
                        <p class="text-sm text-gray-500">Zapatillas clásicas de mujer.</p>
                        <span class="block text-black font-bold mt-2">$129.99</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative">
                        <img src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Producto" class="w-full h-3/4 object-cover transition-transform group-hover:scale-105 duration-300">
                        <span class="absolute top-2 left-2 bg-black text-white text-xs uppercase px-2 py-1 rounded">Nuevo</span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-gray-600 transition duration-300">
                            Nike Air Force 1
                        </h3>
                        <p class="text-sm text-gray-500">Zapatillas clásicas de mujer.</p>
                        <span class="block text-black font-bold mt-2">$129.99</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative">
                        <img src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Producto" class="w-full h-1/3 transform transition duration-300 hover:scale-105 ">
                        <span class="absolute top-2 left-2 bg-red-500 text-white text-xs uppercase px-2 py-1 rounded">SALE</span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-gray-600 transition duration-300">
                            Nike Air Force 1
                        </h3>
                        <p class="text-sm text-gray-500">Zapatillas clásicas de mujer.</p>
                        <span class="block text-black font-bold mt-2">$129.99</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative">
                        <img src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Producto" class="w-full h-3/4 transform transition duration-300 hover:scale-105 ">
                        <span class="absolute top-2 left-2 bg-black text-white text-xs uppercase px-2 py-1 rounded">Nuevo</span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-gray-600 transition duration-300">
                            Nike Air Force 1
                        </h3>
                        <p class="text-sm text-gray-500">Zapatillas clásicas de mujer.</p>
                        <span class="block text-black font-bold mt-2">$129.99</span>
                    </div>
                </div>


                
                <!-- Duplicar más tarjetas aquí -->
            </div>

            <!-- Sección de productos -->
            <!-- <section class="product-grid">
                <div class="product">
                    <img src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Producto 1">
                    <h3>Producto 1</h3>
                    <p>$99.99</p>
                    <button class="w-100 bg-black text-white py-2 rounded-lg hover:bg-gray-800">Comprar</button>
                </div>
                <div class="product">
                    <img src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Producto 2">
                    <h3>Producto 2</h3>
                    <p>$79.99</p>
                    <button class="w-100 bg-black text-white py-2 rounded-lg hover:bg-gray-800">Comprar</button>
                </div>
                <div class="product">
                    <img src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Producto 3">
                    <h3>Producto 3</h3>
                    <p>$120.00</p>
                    <button class="w-100 bg-black text-white py-2 rounded-lg hover:bg-gray-800">Comprar</button>
                </div>
                <div class="product">
                    <img src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Producto 4">
                    <h3>Producto 4</h3>
                    <p>$150.00</p>
                    <button class="w-100 bg-black text-white py-2 rounded-lg hover:bg-gray-800">Comprar</button>
                </div>
                <div class="product">
                    <img src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Producto 5">
                    <h3>Producto 5</h3>
                    <p>$110.00</p>
                    <button class="w-100 bg-black text-white py-2 rounded-lg hover:bg-gray-800">Comprar</button>
                </div>
                <div class="product">
                    <img src="img/producto6.jpg" alt="Producto 6">
                    <h3>Producto 6</h3>
                    <p>$99.00</p>
                    <button class="w-100 bg-black text-white py-2 rounded-lg hover:bg-gray-800">Comprar</button>
                </div>
                <div class="product">
                    <img src="img/producto7.jpg" alt="Producto 7">
                    <h3>Producto 7</h3>
                    <p>$89.00</p>
                    <button class="w-100 bg-black text-white py-2 rounded-lg hover:bg-gray-800">Comprar</button>
                </div>
                <div class="product">
                    <img src="img/producto8.jpg" alt="Producto 8">
                    <h3>Producto 8</h3>
                    <p>$199.00</p>
                    <button class="w-100 bg-black text-white py-2 rounded-lg hover:bg-gray-800">Comprar</button>

                </div>
            </section> -->
        </div>
    </main>
@endsection
