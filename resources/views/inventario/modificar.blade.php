@extends('layouts.dashboard')

@section('title', 'Inventario')

@section('principal')
<div class="flex h-full w-full">
    <div class="container">
        <div class="flex h-full">
            <form action="{{ url('/producto/modificar/' . $producto->id_producto) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Perfil -->
            <div id="profile" class="tab-content w-full">
                <div class="p-6">
                    <!-- <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold">Mi Perfil</h2>
                        <form action="{{ url('/producto/modificar/' . $producto->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                            Modificar
                        </button>
                    </div> -->
                    <h2 class="text-2xl font-bold mb-4">Modificar Producto</h2>
                    <div class="w-auto flex flex-col">
                            <div class="flex flex-row gap-2">
                                <form action="{{ route('productos-vista') }}" >
                                    <button type="submit" class="w-auto px-5 h-10 mb-5 bg-gray-200 text-gray-700 font-semibold border border-indigo rounded-md hover:bg-indigo-900 hover:text-white transition duration-300">Volver</a>
                                </form>
                                <button type="submit" class="w-auto px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-indigo rounded-md hover:bg-purple-900 hover:text-white transition duration-300">Modificar Producto</button>                            
                            </div>
                    </div>
                    <div class="flex items-center space-x-6 mb-6">

                    <!-- Información del usuario -->
                    <div class="space-y-4">
                        <!-- Nombre -->
                         <div class="flex gap-2">
                            <div class=w-2/3>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <div class="relative">
                                    <input type="text" name="nombre_producto" id="nombre_producto" value="{{ $producto->nombre_producto }}" 
                                        class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                                </div>
                            </div>

                        <!-- Cantidad -->
                        <div class=w-1/3>
                            <label for="Cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
                            <div class="relative">
                                <input type="text" name="cantidad_producto" id="nombre" value="{{ $producto->cantidad_producto }}" 
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            </div>                            
                            </div>
                        </div>

                        <!-- Descripcion del Producto -->
                        <div>
                            <label for="descripcion_producto" class="block text-sm font-medium text-gray-700">Descripcion</label>
                            <textarea id="descripcion_producto" name="descripcion_producto" class="w-full px-3 py-2 border border-gray-300 rounded-lg" value="{{ $producto->descripcion_producto ?? 'No especificado'}}">{{ $producto->descripcion_producto ?? 'No especificado'}}</textarea>
                        </div>

                        <!-- Categoria -->
                        <div>
                            <label for="telefono" class="block text-sm font-medium text-gray-700">Categoria</label>
                            <select name="fk_id_categoria_prod" id="producto_id" class="peer block w-full appearance-none rounded-LG border border-gray-300 bg-white px-4 py-2 pr-10 text-sm text-gray-700 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="" disabled selected>{{$producto->categoria->nombre_categoria ?? 'No especificado'}} </option>
                                @foreach ($Categorias as $categoria)
                                    <option value="{{$categoria->id_categoria_prod}}">
                                        {{$categoria->nombre_categoria ?? 'No especificado'}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Precio de Costo -->
                        <div>
                            <label for="precio_costo_producto" class="block text-sm font-medium text-gray-700">Precio de Venta</label>
                            <div class="flex items-center border border-gray-300 rounded-lg shadow-sm focus-within:ring-blue-500 focus-within:border-blue-500">
                                <!-- Símbolo de colones -->
                                <span class="px-3 text-gray-700 text-lg rounded-l-lg border-r border-gray-300">₡</span>
                                <!-- Campo de entrada -->
                                <input type="number" id="precio_costo_producto" name="precio_costo_producto" 
                                    value="{{ $producto->precio_costo_producto ?? 'No especificado' }}" 
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none transition duration-300">
                            </div>
                        </div>

                        <!-- Precio de Venta -->
                        <div>
                            <label for="precio_venta_producto" class="block text-sm font-medium text-gray-700">Precio de Venta</label>
                            <div class="flex items-center border border-gray-300 rounded-lg shadow-sm focus-within:ring-blue-500 focus-within:border-blue-500">
                                <!-- Símbolo de colones -->
                                <span class="px-3 text-gray-700 text-lg rounded-l-lg border-r border-gray-300">₡</span>
                                <!-- Campo de entrada -->
                                <input type="number" id="precio_venta_producto" name="precio_venta_producto" 
                                    value="{{ $producto->precio_venta_producto ?? 'No especificado' }}" 
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none transition duration-300">
                            </div>
                        </div>

                        <!-- Precio Por Mayor -->
                        <div>
                            <label for="precio_costo_producto" class="block text-sm font-medium text-gray-700">Precio de Venta al Por Mayor</label>
                            <div class="flex items-center border border-gray-300 rounded-lg shadow-sm focus-within:ring-blue-500 focus-within:border-blue-500">
                                <!-- Símbolo de colones -->
                                <span class="px-3 text-gray-700 text-lg rounded-l-lg border-r border-gray-300">₡</span>
                                <!-- Campo de entrada -->
                                <input type="number" id="precio_por_mayor_producto" name="precio_por_mayor_producto" 
                                    value="{{ $producto->precio_por_mayor_producto ?? 'No especificado' }}" 
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none transition duration-300">
                            </div>
                        </div>

                        <!-- Estado -->
                        <div class="mb-4">
                            <label for="fk_id_estado" class="block text-gray-700">Estado</label>
                            <select id="fk_id_estado_mod" name="fk_id_estado" class="w-full px-3 py-2 border rounded-lg">
                                <option disabled selected>{{$producto->estado->detalle_estado ?? 'Sin estado'}} </option>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>
                        <label for="fk_id_estado" class="block text-gray-700">Imagenes</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                            @foreach($producto->media as $image)
                            <div class="relative ">
                                <!-- Imagen -->
                                <img src="{{ $image->getUrl() }}" class="h-100 w-100 object-cover rounded-lg shadow-md">
                                <form action="{{ url('/imagen/eliminar/' . $image->id) }}" method="get" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Botón para eliminar -->
                                    <button type="submit" 
                                        class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700 transition">
                                        &times;
                                    </button>
                                </form>
                            </div>
                            @endforeach
                            <div class="h-full">
                                <div class="flex flex-col items-center justify-center w-full h-full bg-gray-100">
                                    <h3 class="text-1xl font-bold mb-4 text-gray-700">Agregar Imágenes</h3>
                                    <label for="imagenes" class="flex flex-col items-center justify-center w-100 h-100 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                                        <div class="flex flex-col text-center items-center justify-center pt-5 pb-6">
                                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18M3 12h18m-6 4v4m0-4v-4"></path>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click para subir imágenes</span> o arrastra aquí</p>
                                            <p class="text-xs text-gray-500">PNG, JPG, JPEG (máx. 5MB)</p>
                                        </div>
                                        <input id="imagenes" name="imagenes[]" type="file" class="hidden" multiple>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
