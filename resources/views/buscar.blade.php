@extends('layouts.app')

@section('title', 'Buscar')

@section('contentt')

    <!-- Overlay oscuro -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden"></div>


<!-- Pestaña modal de Filtrar -->
<div id="filter-modal" class="fixed right-0 top-0 h-full lg:w-1/5 w-3/4 bg-white shadow-lg transform translate-x-full transition-transform duration-300 flex flex-col z-50">
    <!-- Modal Header -->
    <div class="modal-header border-b p-4 text-center">
        <h2 class="text-xl font-bold">Filtros</h2>
    </div>

    <!-- Modal Body -->
    <div class="flex-grow overflow-y-auto p-4">
        <!-- Filtro 1 -->
        <div class="mb-4">
            <button class="w-full flex justify-between items-center text-left text-lg font-semibold text-gray-700 hover:text-blue-500 focus:outline-none" onclick="toggleSubmenu('submenu1')">
                Categorías
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-300" id="icon-submenu1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="submenu1" class="mt-2 hidden overflow-hidden transition-all duration-300">
                <label class="block mb-2">
                    <input type="checkbox" class="mr-2"> Ropa
                </label>
                <label class="block mb-2">
                    <input type="checkbox" class="mr-2"> Zapatillas
                </label>
                <label class="block mb-2">
                    <input type="checkbox" class="mr-2"> Accesorios
                </label>
            </div>
        </div>

        <!-- Filtro 2 -->
        <div class="mb-4">
            <button class="w-full flex justify-between items-center text-left text-lg font-semibold text-gray-700 hover:text-blue-500 focus:outline-none" onclick="toggleSubmenu('submenu2')">
                Precio
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-300" id="icon-submenu2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="submenu2" class="mt-2 hidden overflow-hidden transition-all duration-300">
                <input type="range" min="10" max="500" step="10" class="w-full">
            </div>
        </div>

        <!-- Filtro 3 -->
        <div class="mb-4">
            <button class="w-full flex justify-between items-center text-left text-lg font-semibold text-gray-700 hover:text-blue-500 focus:outline-none" onclick="toggleSubmenu('submenu3')">
                Marca
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-300" id="icon-submenu3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="submenu3" class="mt-2 hidden overflow-hidden transition-all duration-300">
                <label class="block mb-2">
                    <input type="checkbox" class="mr-2"> Nike
                </label>
                <label class="block mb-2">
                    <input type="checkbox" class="mr-2"> Adidas
                </label>
                <label class="block mb-2">
                    <input type="checkbox" class="mr-2"> Puma
                </label>
            </div>
        </div>
    </div>

    <!-- Modal Footer -->
    <div class="modal-footer p-4 border-t">
        <form action="{{ url('/carrito/') }}" method="get">
            <button type="submit" class="bg-gray-800 w-full text-white py-3 px-4 rounded-lg hover:bg-gray-900 transition duration-300">Aplicar</button>
        </form>
        <form action="{{ url('/pagar/') }}" method="get">
            <button class="bg-gray-800 w-full text-white mt-3 py-3 px-4 rounded-lg hover:bg-gray-900 transition duration-300">Limpiar Todo</button>
        </form>
    </div>
</div>

<header class="mt-auto w-100 bg-gray-200 py-20 text-center text-black"> 
        <label for="address" class="block text-gray-700 font-semibold mb-2">Buscar Producto</label>
        <input type="text" id="address" class="w-1/2 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"> 
    </header>


    
    <main class="container mx-auto px-4 py-8">
        <!-- Botón para desplegar filtros en móviles -->
        <button id="filter-toggle" class="filter-toggle">Filtros ☰</button>

        <div class="flex md:flex-col">
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
            <div class="flex justify-end">
                <div class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                    </svg>
                </div>
                <button id="filter-button" class="bg-black p-2 text-white hover:text-gray-200">
                    
                    <a>Filtrar</a>
                </button>
            </div>

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

    <script>
        function toggleSubmenu(id) {
            const submenu = document.getElementById(id);
            const icon = document.getElementById(`icon-${id}`);

            if (submenu.classList.contains('hidden')) {
                submenu.classList.remove('hidden');
                submenu.style.maxHeight = submenu.scrollHeight + 'px';
                icon.classList.add('rotate-180'); // Rotar el ícono hacia arriba
            } else {
                submenu.classList.add('hidden');
                submenu.style.maxHeight = null;
                icon.classList.remove('rotate-180'); // Rotar el ícono hacia abajo
            }
        }
        // scripts. VE3NTANA MODAL CARRITO
        document.getElementById('filter-button').addEventListener('click', function() {
            document.getElementById('filter-modal').classList.toggle('translate-x-full');
            document.getElementById('overlay').classList.toggle('hidden');
        });

        document.getElementById('overlay').addEventListener('click', function() {
            document.getElementById('filter-modal').classList.add('translate-x-full');
            document.getElementById('overlay').classList.add('hidden');
        });
    </script>
@endsection
