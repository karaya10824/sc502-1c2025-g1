@extends('layouts.app')

@section('contentt')

    <main class="product-container mt-16">
        <!-- Imagen del producto -->
        <div class="md:w-3/5 grid grid-cols-2 gap-4 p-4" >
            <img src="https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/1a9ea72e-a96b-4e39-b0a4-d77140afc1d7/custom-nike-air-max-97-shoes-by-you.png" alt="Producto">
            <img src="https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/6a3671b8-f115-44f6-9ab6-3798d55210eb/custom-nike-air-max-97-shoes-by-you.png" alt="Imagen 1">
            <img src="https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/d70a8fd8-e796-4392-bb60-a1b706dd445e/custom-nike-air-max-97-shoes-by-you.png" alt="Imagen 2">
        </div>

        <!-- Información del producto -->
        <div class="md:w-2/5 md:pl-8">
            <h2 class="text-2xl font-bold mb-4">Pleasures Buzo Zip Dragon Marrón</h2>
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

            <button class="w-full bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-900 transition duration-300">Agregar al Carrito</button>

            <p class="mt-4 text-gray-700">
                Este buzo de Pleasures con cremallera y diseño de dragón es ideal para un estilo urbano y moderno. Fabricado con materiales de alta calidad para máxima comodidad.
            </p>
        </div>
        
    </main>

    <div class="w-4/5 mx-auto bg-gray-100 shadow-lg">
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

    <!-- Contenedor del Slider Descuentos -->
    <section class="max-w-screen-2xl h-9/10 mx-auto mt-8">
        <h3 class="text-lg font-semibold ml-40 text-gray-800 group-hover:text-gray-600 transition duration-300">Descuentos</h3>

        <section id="splide-slider-descuentos" class="splide mx-auto border-t mt-2 pt-5 border-gray-200" style="height:65%;">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <div class="splide__slide__container">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                                <div class="relative">
                                    <img src="https://holacompras.com/wp-content/uploads/2022/11/MQD83AMA-2.jpg" alt="Producto" class="w-full h-80 object-cover transition-transform group-hover:scale-105 duration-300">
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
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="splide__slide__container">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                                <div class="relative">
                                    <img src="https://icon.co.cr/cdn/shop/files/IMG-14858589.jpg?v=1727232516" alt="Producto" class="w-full h-80 object-cover transition-transform group-hover:scale-105 duration-300">
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
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="splide__slide__container">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                                <div class="relative">
                                    <img src="https://cr.tiendasishop.com/cdn/shop/files/IMG-1529010.jpg?v=1734375395&width=823" alt="Producto" class="w-full h-80 object-cover transition-transform group-hover:scale-105 duration-300">
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
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="splide__slide__container">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                                <div class="relative">
                                    <img src="https://nextcoshop.com/wp-content/uploads/2023/08/Magsafe.jpg" alt="Producto" class="w-full h-80 object-cover transition-transform group-hover:scale-105 duration-300">
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
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="splide__slide__container">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                                <div class="relative">
                                    <img src="https://nextcoshop.com/wp-content/uploads/2023/08/Magsafe.jpg" alt="Producto" class="w-full h-80 object-cover transition-transform group-hover:scale-105 duration-300">
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
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="splide__slide__container">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                                <div class="relative">
                                    <img src="https://nextcoshop.com/wp-content/uploads/2023/08/Magsafe.jpg" alt="Producto" class="w-full h-80 object-cover transition-transform group-hover:scale-105 duration-300">
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
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="splide__slide__container">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                                <div class="relative">
                                    <img src="https://nextcoshop.com/wp-content/uploads/2023/08/Magsafe.jpg" alt="Producto" class="w-full h-80 object-cover transition-transform group-hover:scale-105 duration-300">
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
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="splide__slide__container">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                                <div class="relative">
                                    <img src="https://nextcoshop.com/wp-content/uploads/2023/08/Magsafe.jpg" alt="Producto" class="w-full h-80 object-cover transition-transform group-hover:scale-105 duration-300">
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
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Flechas personalizadas -->
            <div class="splide__arrows">
                <button class="custom-arrow custom-prev splide__arrow--prev">←</button>
                <button class="custom-arrow custom-next splide__arrow--next">→</button>
            <div class="splide__arrows">
        </section>

        <div class="container mx-auto ">
            <button class="w-1/3 mx-auto px-4 py-2  border border-gray-300 text-gray-700 rounded-full bg-white hover:bg-gray-100 transition">
                    Ver Todo
            </button>
        </div>
    </section>

    <script>
        //Initialize Swiper
        document.addEventListener('DOMContentLoaded', function () {
            new Splide('#splide-slider', {
                width : '80vw',
                height: '60vh',
                type       : 'loop', // Reproduce en bucle
                perPage    : 4,      // Muestra 3 slides al mismo tiempo
                gap        : '1rem', // Espaciado entre slides
                autoplay   : true,   // Activar autoplay
                interval   : 5000,   // Cambio cada 3 segundos
                pauseOnHover: true,  // Pausa en hover
                arrows     : true, // Desactiva las flechas predeterminadas de Splide
                breakpoints: {
                    1024: { perPage: 2 }, // 2 slides en pantallas medianas
                    640:  { perPage: 1 }  // 1 slide en móviles
                }
            }).mount();
        });

        //Initialize Swiper
        document.addEventListener('DOMContentLoaded', function () {
            new Splide('#splide-slider-descuentos', {
                width : '80vw',
                height: '60vh',
                type       : 'loop', // Reproduce en bucle
                perPage    : 4,      // Muestra 3 slides al mismo tiempo
                gap        : '1rem', // Espaciado entre slides
                autoplay   : true,   // Activar autoplay
                interval   : 5000,   // Cambio cada 3 segundos
                pauseOnHover: true,  // Pausa en hover
                arrows     : true, // Desactiva las flechas predeterminadas de Splide
                breakpoints: {
                    1024: { perPage: 2 }, // 2 slides en pantallas medianas
                    640:  { perPage: 1 }  // 1 slide en móviles
                }
            }).mount();
        });

        // Lógica para cambiar entre pestañas
        document.querySelectorAll(".tab-link").forEach((tab) => {
            tab.addEventListener("click", function () {
                document.querySelectorAll(".tab-content").forEach((content) => content.classList.add("hidden"));
                document.getElementById(this.dataset.tab).classList.remove("hidden");

                document.querySelectorAll(".tab-link").forEach((t) => t.classList.remove("border-black", "text-black"));
                this.classList.add("border-black", "text-black");
            });
        });
    </script>

@endsection
