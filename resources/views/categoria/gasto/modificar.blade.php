@extends('layouts.dashboard')

@section('title', 'Inventario')

@section('principal')
<div class="flex h-full w-full">
    <div class="container">
        <div class="flex h-full">
            <form action="{{ url('/categoria/gasto/modificar/' . $Categoria->id_categoria_gasto) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Perfil -->
            <div id="profile" class="tab-content w-full">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Modificar Gasto</h2>
                    <div class="w-auto flex flex-col">
                            <div class="flex flex-row gap-2">
                                <a href="{{ route('gastos-vista') }}" class="w-auto px-5 py-1 h-10 mb-5 bg-gray-200 text-gray-700 font-semibold border border-indigo rounded-md hover:bg-indigo-900 hover:text-white transition duration-300">Volver</a>
                                <button type="submit" class="w-auto px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-indigo rounded-md hover:bg-purple-900 hover:text-white transition duration-300">Modificar Gasto</button>                            
                            </div>
                    </div>
                    <div class="flex items-center space-x-6 mb-6">

                    <!-- Información del usuario -->
                    <div class="space-y-4">
                        <!-- Descripcion -->
                        <div class="">
                            <label for="descripcion_categoria_gasto" class="block text-sm font-medium text-gray-700">Descripcion</label>
                            <div class="relative">
                                <input type="text" name="descripcion_categoria_gasto" id="descripcion_categoria_gasto" value="{{ $Categoria->descripcion_categoria_gasto }}" 
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            </div>
                        </div>

                        <!-- Estado -->
                        <div class="mb-4">
                            <label for="fk_id_estado" class="block text-gray-700">Estado</label>
                            <select id="fk_id_estado_mod" name="fk_id_estado" class="w-full px-3 py-2 border rounded-lg">
                                <option disabled selected>{{$Categoria->estado->detalle_estado ?? 'Sin estado'}} </option>
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
