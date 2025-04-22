@extends('layouts.dashboard')

@section('title', 'Inventario')

@section('principal')
<div class="flex h-full w-full">
    <div class="container">
        <div class="flex h-full">
            <form action="{{ url('/proveedor/modificar/' . $Proveedor->id_proveedor) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Perfil -->
            <div id="profile" class="tab-content w-full">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Modificar Proveedor</h2>
                    <div class="w-auto flex flex-col">
                            <div class="flex flex-row gap-2">
                                <a href="{{ route('proveedor-vista') }}" class="w-auto px-5 py-1 h-10 mb-5 bg-gray-200 text-gray-700 font-semibold border border-indigo rounded-md hover:bg-indigo-900 hover:text-white transition duration-300">Volver</a>
                                <button type="submit" class="w-auto px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-indigo rounded-md hover:bg-purple-900 hover:text-white transition duration-300">Modificar Proveedor</button>                            
                            </div>
                    </div>
                    <div class="flex items-center space-x-6 mb-6">

                    <!-- Información del usuario -->
                    <div class="space-y-4">
                        <!-- Nombre del Proveedor -->
                        <div class=>
                            <label for="nombre_proveedor" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <div class="relative">
                                <input type="text" name="nombre_proveedor" id="nombre_proveedor" value="{{ $Proveedor->nombre_proveedor }}" 
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            </div>
                        </div>

                        <!-- Correo del Proveedor-->
                        <div class=>
                            <label for="correo_proveedor" class="block text-sm font-medium text-gray-700">Correo</label>
                            <div class="relative">
                                <input type="email" name="correo_proveedor" id="correo_proveedor" value="{{ $Proveedor->correo_proveedor }}" 
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            </div>
                        </div>

                        <!-- Direccion del Proveedor -->
                        <div>
                            <label for="direccion_proveedor" class="block text-sm font-medium text-gray-700">Direccion</label>
                            <textarea id="direccion_proveedor" name="direccion_proveedor" class="w-full px-3 py-2 border border-gray-300 rounded-lg" value="{{ $Proveedor->direccion_proveedor ?? 'No especificado'}}">{{ $Proveedor->direccion_proveedor ?? 'No especificado'}}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="telefono_proveedor_mod" class="block text-gray-700">Telefono</label>
                            <input type="text" id="telefono_proveedor_mod" name="telefono_proveedor" value="{{$Proveedor->telefono_proveedor ?? 'No especificado'}}" class="w-full px-3 py-2 border rounded-lg" required>
                        </div>

                        <!-- Estado -->
                        <div class="mb-4">
                            <label for="fk_id_estado" class="block text-gray-700">Estado</label>
                            <select id="fk_id_estado_mod" name="fk_id_estado" class="w-full px-3 py-2 border rounded-lg">
                                <option disabled selected>{{$Proveedor->estado->detalle_estado ?? 'Sin estado'}} </option>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
