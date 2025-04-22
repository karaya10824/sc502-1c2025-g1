@extends('layouts.dashboard')

@section('title', 'Inventario')

@section('principal')
<div class="flex h-full w-full">
    <div class="container">
        <div class="flex h-full">
            <form action="{{ url('/descuento/modificar/' . $Descuento->id_descuento) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Perfil -->
            <div id="profile" class="tab-content w-full">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Modificar Descuento</h2>
                    <div class="w-auto flex flex-col">
                            <div class="flex flex-row gap-2">
                                <a href="{{ route('descuentos-vista') }}" class="w-auto px-5 py-1 h-10 mb-5 bg-gray-200 text-gray-700 font-semibold border border-indigo rounded-md hover:bg-indigo-900 hover:text-white transition duration-300">Volver</a>
                                <button type="submit" class="w-auto px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-indigo rounded-md hover:bg-purple-900 hover:text-white transition duration-300">Modificar Descuento</button>                            
                            </div>
                    </div>
                    <input type="hidden" id="id_descuento" name="id_descuento">
                    <div class="mb-4">
                        <label for="porcentaje_descuento" class="block text-gray-700">Porcentaje de Descuento</label>
                        <input type="number" id="porcentaje_descuento_mod" min="0" max="100" value="{{ $Descuento->porcentaje_descuento }}" name="porcentaje_descuento" class="w-full px-3 py-2 border rounded-lg"></input>
                    </div>
                    <div class="mb-4">
                        <label for="codigo_de_descuento" class="block text-gray-700">Código de Descuento</label>
                        <input type="text" id="codigo_de_descuento_mod" name="codigo_de_descuento" value="{{ $Descuento->codigo_de_descuento ?? 'No Especificado' }}" class="w-full px-3 py-2 border rounded-lg">
                    </div>
                    <div class="mb-4">
                        <label for="descripcion_descuento" class="block text-gray-700">Descripción de Descuento</label>
                        <textarea id="descripcion_descuento_mod" name="descripcion_descuento" class="w-full px-3 py-2 border rounded-lg" value="{{ $Descuento->descripcion_descuento ?? 'No Especificado' }}">{{ $Descuento->descripcion_descuento ?? 'No Especificado'}}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="fk_id_estado" class="block text-gray-700">Estado</label>
                        <select id="fk_id_estado_mod" name="fk_id_estado" class="w-full px-3 py-2 border rounded-lg">
                            <option disabled selected>{{$Descuento->estado->detalle_estado ?? 'Sin estado'}} </option>
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
