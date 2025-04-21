@extends('layouts.dashboard')

@section('title', 'Modificar Usuario')

@section('principal')

<div class="flex h-full w-full">
    <div class="container">
        <div class="flex h-full">
            <!-- Perfil -->
            <div id="profile" class="tab-content w-full">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold">Mi Perfil</h2>
                        <form action="{{ url('/usuarios/modificar/' . $Usuario->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                            Modificar
                        </button>
                    </div>
                    <div class="flex items-center space-x-6 mb-6">
                        <!-- Imagen del usuario -->
                        <div class="w-24 h-24">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR7awcQZRnbrToH9Hwkh9NsbbAlGThRcfHvCA&s" alt="Imagen del usuario" class="w-full h-full rounded-full object-cover">
                        </div>
                    </div>

                    <!-- Información del usuario -->
                    <div class="space-y-4">
                        <!-- Nombre -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                            <div class="relative">
                                <input type="text" name="nombre" id="nombre" value="{{ $Usuario->nombre }}" 
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            </div>
                        </div>

                        <!-- Apellidos -->
                        <div>
                            <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                            <input type="text" id="apellidos" name="apellidos" value="{{ $Usuario->apellidos }}" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                        </div>

                        <!-- Correo -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
                            <input type="email" id="email" name="email" value="{{ $Usuario->email }}" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                        </div>

                        <!-- Teléfono -->
                        <div>
                            <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" value="{{ $Usuario->telefono ?? 'No especificado' }}" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                        </div>

                        <!-- Contrasena -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <input type="password" id="password" name="password" value="{{ $Usuario->password ?? 'No especificado' }}" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                        </div>

                        <!-- Estado -->
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 pb-2">Estado</label>
                            <span class="px-3 py-2 text-xs rounded-full {{ $Usuario->fk_id_estado ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}"> {{ auth()->user()->fk_id_estado ? 'Activa' : 'Inactiva' }} </span>                            
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection