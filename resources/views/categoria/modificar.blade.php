@extends('layouts.dashboard')

@section('title', 'Inventario')

@section('principal')
<div class="flex h-full w-full">
    <div class="container">
        <div class="flex h-full">
            <form action="{{ url('/categoria/modificar/' . $Categoria->id_categoria_prod) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Perfil -->
            <div id="profile" class="tab-content w-full">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Modificar Categoria</h2>
                    <div class="w-auto flex flex-col">
                            <div class="flex flex-row gap-2">
                                <a href="{{ route('productos-vista') }}" class="w-auto px-5 py-1 h-10 mb-5 bg-gray-200 text-gray-700 font-semibold border border-indigo rounded-md hover:bg-indigo-900 hover:text-white transition duration-300">Volver</a>
                                <button type="submit" class="w-auto px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-indigo rounded-md hover:bg-purple-900 hover:text-white transition duration-300">Modificar Categoria</button>                            
                            </div>
                    </div>

                    <input type="hidden" id="id_categoria_prod" name="id_categoria_prod">
                    <div class="mb-4">
                        <label for="nombre_categoria_mod" class="block text-gray-700">Nombre de Categoria</label>
                        <input type="text" id="nombre_categoria_mod" name="nombre_categoria" class="w-full px-3 py-2 border rounded-lg" value="{{ $Categoria->nombre_categoria ?? 'No especificado' }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="descripcion_categoria_mod" class="block text-gray-700">Descripción de Categoria</label>
                        <textarea id="descripcion_categoria_mod" name="descripcion_categoria" class="w-full px-3 py-2 border rounded-lg" value="{{ $Categoria->descripcion_categoria ?? 'No especificado' }}">{{ $Categoria->descripcion_categoria ?? 'No especificado' }}</textarea>
                    </div>
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
            </form>
        </div>
    </div>
</div>
@endsection
