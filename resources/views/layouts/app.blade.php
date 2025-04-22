<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COS - @yield('title')</title>    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@heroicons/vue/24/solid.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/estilos.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.0/dist/css/splide.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="{{ asset('/js/script.js') }}"> </script>

</head>
<body>
    <!-- Overlay oscuro -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden"></div>

    <!-- Pestaña modal -->
    <div id="cart-modal" class="fixed right-0 top-0 h-full lg:w-1/5 w-3/4 bg-white shadow-lg transform translate-x-full transition-transform duration-300 flex flex-col justify-between z-50">
        <div class="p-4 flex-grow overflow-y-auto">
            <h2 class="text-xl font-bold mb-4">Carrito de Compras</h2>
            <div class="mb-4">
                <div class="flex justify-between items-center border-b pb-4 mb-4">
                    <div class="flex items-center">
                        <img src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Producto" class="w-20 h-20 object-cover rounded-lg">
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">Nombre del Producto</h3>
                            <p class="text-gray-600">Descripción breve del producto.</p>
                            <p class="text-lg font-semibold">$99.99</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                    </div>
                </div>
                <!-- Agrega más productos aquí -->
                <div class="flex justify-between items-center border-b pb-4 mb-4">
                    <div class="flex items-center">
                        <img src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Producto" class="w-20 h-20 object-cover rounded-lg">
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">Nombre del Producto</h3>
                            <p class="text-gray-600">Descripción breve del producto.</p>
                            <p class="text-lg font-semibold">$99.99</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 border-t">
            <div class="">
                <div class="flex justify-between items-center mb-6">
                    <p class="text-lg font-semibold">Subtotal:</p>
                    <p class="text-lg font-semibold">$99.99</p>
                </div>
                <form action="{{ url('/carrito/') }}" method="get">
                    <button type="submit" class="bg-gray-800 w-full text-white py-3 px-4 rounded-lg hover:bg-gray-900 transition duration-300">Ver Carrito</button>
                </form>
                <form action="{{ url('/pagar/') }}" method="get">
                    <button class="bg-gray-800 w-full text-white mt-3 py-3 px-4 rounded-lg hover:bg-gray-900 transition duration-300">Pagar</button>
                </form>
            </div>
        </div>
    </div>

    <nav class="bg-white shadow-md fixed top-0 left-0 w-full z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Botón menú móvil -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-800 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>
                <!-- Logo -->
                <div class="text-lg font-semibold">
                    <a href="#" class="text-gray-800 ">COS</a>
                </div>
                <!-- Menú principal -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ url('/') }}" class="text-gray-700 hover:text-gray-900">INICIO</a>

                    <!-- Menú desplegable -->
                    <div class="relative group">
                        <button class="text-gray-700 hover:text-gray-900 flex items-center">
                            HOMBRE
                            <svg class="ml-1 h-5 w-5 text-gray-500 group-hover:text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Submenú -->
                        <div class="absolute left-0 mt-5 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Relojes</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gorras</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bolsos</a>
                        </div>
                    </div>
                    
                    <!-- Menú desplegable -->
                    <div class="relative group">
                        <button class="text-gray-700 hover:text-gray-900 flex items-center">
                            MUJER
                            <svg class="ml-1 h-5 w-5 text-gray-500 group-hover:text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Submenú -->
                        <div class="absolute left-0 mt-5 w-max bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Relojes</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gorras</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bolsos</a>

                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Relojes</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gorras</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bolsos</a>

                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Relojes</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gorras</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bolsos</a>
                        </div>
                    </div>                    

                    <!-- Menú desplegable -->
                    <div class="relative group">
                        <button class="text-gray-700 hover:text-gray-900 flex items-center">
                            MARCAS
                            <svg class="ml-1 h-5 w-5 text-gray-500 group-hover:text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Submenú -->
                        <div class="absolute left-0 mt-5 w-48 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Relojes</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gorras</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bolsos</a>
                        </div>
                    </div>

                    <a href="#" class="text-gray-700 hover:text-gray-900">NOSOTROS</a>
                    <a href="#" class="text-gray-700 hover:text-gray-900">DESCUENTOS</a>
                </div>
                <div class="flex items-center space-x-3">
                        @auth
                        <a href="{{ url('/dashboard/') }}" class="bg-black p-2 text-white hover:text-gray-200">DASHBOARD</a>
                        @endauth
                        <a href="{{ url('/buscar/') }}" class="text-gray-800 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-7">
                            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="{{ url('/login/') }}" class="text-gray-800 hover:text-gray-600 hidden md:block">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>    
                        </a>
                        <a href="#" class="text-gray-800 hover:text-gray-600 " id="cart-button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menú móvil -->
        <div id="mobile-menu" class="fixed inset-0 bg-white z-50 transform -translate-x-full transition-transform duration-300">
            <div class="flex justify-between items-center p-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Menú</h2>
                <button id="close-mobile-menu" class="text-gray-800 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4">
                <a href="{{ url('/') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Inicio</a>

                <!-- Submenú para móviles -->
                <div class="border-t border-gray-200 mt-2">
                    <button class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 flex justify-between items-center" onclick="toggleMobileSubmenu('hombre-menu')">
                        Hombre
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300" id="icon-hombre-menu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div id="hombre-menu" class="hidden pl-6 mt-2">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Relojes</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Gorras</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Bolsos</a>
                    </div>
                </div>

                <!-- Submenú para móviles -->
                <div class="border-t border-gray-200 mt-2">
                    <button class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 flex justify-between items-center" onclick="toggleMobileSubmenu('mujer-menu')">
                        Mujer
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300" id="icon-mujer-menu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div id="mujer-menu" class="hidden pl-6 mt-2">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Relojes</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Gorras</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Bolsos</a>
                    </div>
                </div>

                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded mt-2">Nosotros</a>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded mt-2">Descuentos</a>
            </div>
        </div>
    </nav>

    @yield('contentt')

    <footer class="footer mt-10">
        <div class="footer-container">
            <div class="footer-section">
                <h4>Contactanos</h4>
                <div class="flex space-x-4 text-xl">
                    <a href="https://facebook.com" class="text-blue-600 hover:text-blue-800">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com" class="text-blue-400 hover:text-blue-600">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="https://instagram.com" class="text-pink-500 hover:text-pink-700">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://linkedin.com" class="text-blue-700 hover:text-blue-900">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a href="https://youtube.com" class="text-red-600 hover:text-red-800">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
            </div>

            <div class="footer-section">
                <h4>AYUDA</h4>
                <ul>
                    <li><a href="#">Guía de Tallas</a></li>
                    <li><a href="#">Preguntas Frecuentes</a></li>
                    <li><a href="#">Información de Enviíos</a></li>
                    <li><a href="#">Términos y Condiciones</a></li>
                    <li><a href="#">Cambios & Garantías</a></li>
                    <li><a href="#">Politica de Privacidad</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>CONTÁCTANOS</h4>
                <ul>
                    <li><a href="#">Ubicación de Tiendas</a></li>
                    <li><a href="#">Contáctanos Aquí</a></li>
                    <li><a href="#">WhatsApp: +506</a></li>
                    <li><a href="#">Email: cos@mail.com</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Nuetras Tiendas</h4>
                <p>Heredia centro de los tribunales 250 mts al este</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 COS. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
                // Lógica para cambiar entre pestañas
        document.querySelectorAll(".tab-link").forEach((tab) => {
            tab.addEventListener("click", function () {
                document.querySelectorAll(".tab-content").forEach((content) => content.classList.add("hidden"));
                document.getElementById(this.dataset.tab).classList.remove("hidden");

                document.querySelectorAll(".tab-link").forEach((t) => t.classList.remove("border-black", "text-black"));
                this.classList.add("border-black", "text-black");
            });
        });

        // Mostrar u ocultar el menú móvil
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.remove('-translate-x-full');
        });

        document.getElementById('close-mobile-menu').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.add('-translate-x-full');
        });

        // Mostrar u ocultar submenús
        function toggleMobileSubmenu(id) {
            const submenu = document.getElementById(id);
            const icon = document.getElementById(`icon-${id}`);

            submenu.classList.toggle('hidden');
            icon.classList.toggle('rotate-180'); // Rotar el ícono
        }

        // scripts. VE3NTANA MODAL CARRITO
        document.getElementById('cart-button').addEventListener('click', function() {
            document.getElementById('cart-modal').classList.toggle('translate-x-full');
            document.getElementById('overlay').classList.toggle('hidden');
        });

        document.getElementById('overlay').addEventListener('click', function() {
            document.getElementById('cart-modal').classList.add('translate-x-full');
            document.getElementById('overlay').classList.add('hidden');
        });

        // Submenu toggle with animation
        document.getElementById('nosotros-button').addEventListener('click', function() {
            const menu = document.getElementById('nosotros-menu');
            menu.classList.toggle('hidden');
            menu.classList.toggle('opacity-0');
            menu.classList.toggle('opacity-100');
        });

        document.getElementById('accesorios-button').addEventListener('click', function() {
            const menu = document.getElementById('accesorios-menu');
            menu.classList.toggle('hidden');
            menu.classList.toggle('opacity-0');
            menu.classList.toggle('opacity-100');
        });

        //Filtros
        document.getElementById('filter-toggle').addEventListener('click', function() {
            document.getElementById('filters').classList.toggle('hidden');
        });

        document.getElementById('mobile-menu-button').onclick = function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        };

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.0/dist/js/splide.min.js"> </script>
</body>
</html>