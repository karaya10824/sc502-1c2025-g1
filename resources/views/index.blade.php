@extends('layouts.app')

@section('title', 'Inicio')

@section('contentt')
    <style>
        .my-slider-progress {
            background: #ccc;
        }
        .my-slider-progress-bar {
            background: greenyellow;
            height: 4px;
            transition: width 400ms ease;
            width: 0;
        }
    </style>

    <!-- Contenedor del Slider PRINCIPAL -->
    <section class="w-100 h-screen pb-5 text-center text-black"> 
        <div class="flex">
                <div class="w-1/3 flex justify-center items-center relative">
                    <img src="{{ asset('img/DSC_3317.jpg') }}" alt="">
                </div>

                <div class="w-1/3 relative">
                    <img src="{{ asset('img/DSC_3226.jpg') }}" alt="">
                    <div class="w-full absolute bottom-20">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-gray-600 transition duration-300">
                            Colección 2028
                        </h3>
                        <button class="w-1/2 px-4 py-2 mt-2  border border-gray-300 text-gray-200 rounded-full bg-trasparent hover:bg-gray-800 hover:bg-gray-100 transition">
                            Ver Más
                        </button>
                    </div>
                </div>

                <div class="w-1/3 relative">
                    <img src="{{ asset('img/DSC_3203.jpg') }}" alt="">
                </div>
        </div>
    </section>

    <!-- Contenedor del Slider PRINCIPAL - RESPONSIVE -->
    <section class="w-100 pb-5 text-center text-black hidden">
        <div id="splide-principal-responsive" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <div class="flex justify-center items-center relative">
                            <img src="{{ asset('img/DSC_3317.jpg') }}" alt="">
                            <div class="w-full absolute bottom-20">
                                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-gray-600 transition duration-300">
                                AirPods Pro 
                                </h3>
                                <p class="text-sm text-gray-500">Zapatillas clásicas de mujer.</p>
                                <span class="block text-black font-bold mt-2">$129.99</span>
                                <button class="w-1/2 px-4 py-2 mt-2  border border-gray-300 text-gray-700 rounded-full bg-white hover:bg-gray-100 transition">
                                    Ver Más
                                </button>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="relative">
                            <img src="{{ asset('img/DSC_3226.jpg') }}" alt="">
                            <div class="w-full absolute bottom-20">
                                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-gray-600 transition duration-300">
                                AirPods Pro 
                                </h3>
                                <p class="text-sm text-gray-500">Zapatillas clásicas de mujer.</p>
                                <span class="block text-black font-bold mt-2">$129.99</span>
                                <button class="w-1/2 px-4 py-2 mt-2  border border-gray-300 text-gray-700 rounded-full bg-white hover:bg-gray-100 transition">
                                    Ver Más
                                </button>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class=" relative">
                            <img src="{{ asset('img/DSC_3203.jpg') }}" alt="">
                            <div class="w-full absolute bottom-20">
                                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-gray-600 transition duration-300">
                                AirPods Pro 
                                </h3>
                                <p class="text-sm text-gray-500">Zapatillas clásicas de mujer.</p>
                                <span class="block text-black font-bold mt-2">$129.99</span>
                                <button class="w-1/2 px-4 py-2 mt-2  border border-gray-300 text-gray-700 rounded-full bg-white hover:bg-gray-100 transition">
                                    Ver Más
                                </button>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
            
            <!-- Add the progress bar element -->
            <div class="my-slider-progress">
                <div class="my-slider-progress-bar"></div>
            </div>
        </div>

    </section>

    <!-- Contenedor del Slider Nuevos-->
    <section class="w-10/12 mx-auto mt-5" style="height:auto;">
        <section class="container">
            <h3 class="text-lg ml-2 font-semibold text-gray-800 group-hover:text-gray-600 transition duration-300">Ultimos Lanzamientos</h3>
        </section>
        
        <section id="splide-slider" class="splide mx-auto border-t border-gray-200"> 
            <div class="splide__track">
                <ul class="splide__list" style="height: auto;">
                    @foreach ($Productos as $producto)
                    <li class="splide__slide">
                        <div class="splide__slide__container px-2 pb-6">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                                <div class="relative">
                                    @foreach ($producto->media as $media)
                                        <a href="{{ url('/producto/' . $producto->id_producto) }}"><img src="{{ $media->getUrl() }}" alt="Producto" class="w-full h-full transform transition duration-300 hover:scale-105 "></a>
                                    @break
                                    @endforeach
                                    <span class="absolute top-2 left-2 bg-black text-white text-xs uppercase px-2 py-1 rounded">Nuevo</span>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-gray-600 transition duration-300">
                                        {{ $producto['nombre_producto'] }}
                                    </h3>
                                    <p class="text-sm text-gray-500">{{ $producto['nombre_producto'] }}</p>
                                    <span class="block text-black font-bold mt-2">{{ $producto['precio_venta_producto'] }}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>


            </div>
            <div class="my-slider-progress">
                <div class="my-slider-progress-nuevo"></div>
            </div>

        </section>

        <section class="container mx-auto">
            <button class="w-1/3 mx-auto px-4 py-2 border border-gray-300 text-gray-700 rounded-full bg-white hover:bg-gray-100 transition">
                    Ver Todo
            </button>
        </section>
    </section>

    <!-- Contenedor del Slider Categorias-->
    <section class="w-100 px-32 h-auto text-center text-black"> 
        <div class="flex gap-10">
            <div class="w-1/3 relative flex items-center justify-center transform transition duration-300 hover:scale-105">
                <img src="{{ asset('img/DSC_9907.jpg') }}" alt="" class=" h-auto">
                <button class="px-5 h-10 bg-white text-gray-600 font-semibold border border-black rounded-lg shadow-md hover:bg-white-900 hover:text-gray-800 transition duration-300 absolute bottom-10">Hombre</button>
            </div>
            <div class="w-1/3 relative flex items-center justify-center transform transition duration-300 hover:scale-105 ">
                <img src="{{ asset('img/DSC_8817.jpg') }}" alt="" class="h-auto">
                <button class="px-5 h-10 bg-white text-gray-600 font-semibold rounded-lg shadow-md hover:bg-white-900 hover:text-gray-800 transition duration-300 absolute bottom-10">Mujer</button>
            </div>
            <div class="w-1/3 relative flex items-center justify-center transform transition duration-300 hover:scale-105 ">
                <img src="{{ asset('img/DSC_3203.jpg') }}" alt="" class="h-auto">
                <button class="px-5 h-10 bg-white text-gray-600 font-semibold border border-black rounded-lg shadow-md hover:bg-white-900 hover:text-gray-800 transition duration-300 absolute bottom-10 absolute bottom-10">Accesorios</button>
            </div>
        </div>
    </section>     

    <!-- Contenedor del Slider Descuentos-->
    <section class="w-10/12 mx-auto mt-5" style="height:auto;">
        <section class="container">
            <h3 class="text-lg ml-2 font-semibold text-gray-800 group-hover:text-gray-600 transition duration-300">Ultimos Lanzamientos</h3>
        </section>
        
        <section id="splide-slider-descuentos" class="splide mx-auto border-t border-gray-200"> 
            <div class="splide__track">
                <ul class="splide__list" style="height: auto;">
                    <li class="splide__slide">
                        <div class="splide__slide__container px-2 pb-6">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                                <div class="relative">
                                    <img src="https://holacompras.com/wp-content/uploads/2022/11/MQD83AMA-2.jpg" alt="Producto" class="w-full h-80 transform transition duration-300 hover:scale-105 ">
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
                                    <img src="https://icon.co.cr/cdn/shop/files/IMG-14858589.jpg?v=1727232516" alt="Producto" class="w-full h-80 transform transition duration-300 hover:scale-105 ">
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
                    <li class="splide__slide ">
                        <div class="splide__slide__container">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                                <div class="relative">
                                    <img src="https://cr.tiendasishop.com/cdn/shop/files/IMG-1529010.jpg?v=1734375395&width=823" alt="Producto" class="w-full h-80 transform transition duration-300 hover:scale-105">
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
            <div class="my-slider-progress">
                <div class="my-slider-progress-nuevo"></div>
            </div>

        </section>

        <section class="container mx-auto">
            <button class="w-1/3 mx-auto px-4 py-2 border border-gray-300 text-gray-700 rounded-full bg-white hover:bg-gray-100 transition">
                    Ver Todo
            </button>
        </section>
    </section>


    <!-- Contenedor de Banners-->
    <section class="w-3/4 flex gap-6 mt-auto mt-8 mx-auto h-auto text-center text-black">
        <div class="w-1/3 py-10 bg-gray-200">
            Envios
        </div>
        <div class="w-1/3 bg-gray-200">
            Devoluciones
        </div>
        <div class="w-1/3 bg-gray-200">
            Tasa 0
        </div>
    </section>

<script>

//SWIPERS PRINCIPALES
document.addEventListener('DOMContentLoaded', function () {
    var splide = new Splide( '#splide-principal-responsive', {
        width : '100vw',
        height: '60vh',
        pagination: false,
        arrows     : false
    });
    var bar    = splide.root.querySelector( '.my-slider-progress-bar' );

    
    // Updates the bar width whenever the carousel moves:
    splide.on( 'mounted move', function () {
        var end  = splide.Components.Controller.getEnd() + 1;
        var rate = Math.min( ( splide.index + 1 ) / end, 1 );
        bar.style.width = String( 100 * rate ) + '%';
    } );
    
    splide.mount();
});

//Initialize Swiper
document.addEventListener('DOMContentLoaded', function () {
    var splide = new Splide('#splide-slider', {  // Se define la instancia correctamente
        width: '80vw',
        type: 'loop', // Reproduce en bucle
        perPage: 4,   // Muestra 4 slides al mismo tiempo
        gap: '1rem',  // Espaciado entre slides
        autoplay: true,  // Activar autoplay
        interval: 5000,  // Cambio cada 5 segundos
        pauseOnHover: true,  // Pausa en hover
        arrows: false,  // Desactiva las flechas predeterminadas de Splide
        pagination: false,
        breakpoints: {
            1024: { perPage: 2 }, // 2 slides en pantallas medianas
            640: { perPage: 1 }  // 1 slide en móviles
        }
    });

    var bar = splide.root.querySelector('.my-slider-progress-nuevo'); // Se obtiene el progreso

    splide.on('mounted move', function () {
        var end = splide.Components.Controller.getEnd() + 1;
        var rate = Math.min((splide.index + 1) / end, 1);
        bar.style.width = String(100 * rate) + '%';
    });

    splide.mount(); // Se monta la instancia correctamente
});

//Initialize Swiper
document.addEventListener('DOMContentLoaded', function () {
    new Splide('#splide-slider-descuentos', {
        width : '80vw',
        type       : 'loop', // Reproduce en bucle
        perPage    : 4,      // Muestra 3 slides al mismo tiempo
        gap        : '1rem', // Espaciado entre slides
        autoplay   : true,   // Activar autoplay
        interval   : 5000,   // Cambio cada 3 segundos
        pauseOnHover: true,  // Pausa en hover
        arrows     : true, // Desactiva las flechas predeterminadas de Splide
        pagination: false,
        breakpoints: {
            1024: { perPage: 2 }, // 2 slides en pantallas medianas
            640:  { perPage: 1 }  // 1 slide en móviles
        }
    }).mount();
});
</script>
@endsection

