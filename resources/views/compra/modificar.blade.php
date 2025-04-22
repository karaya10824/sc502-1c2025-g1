@extends('layouts.dashboard')

@section('title', 'Inventario')

@section('principal')
<div class="flex h-full w-full">
    <div class="container">
        <div class="flex h-full">
            <form action="{{ url('/compra/modificar/' . $Compra->id_compra) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Perfil -->
            <div id="profile" class="tab-content w-full">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Modificar Compra</h2>
                    <div class="w-auto flex flex-col">
                            <div class="flex flex-row gap-2">
                                <a href="{{ route('compra-vista') }}" class="w-auto px-5 py-1 h-10 mb-5 bg-gray-200 text-gray-700 font-semibold border border-indigo rounded-md hover:bg-indigo-900 hover:text-white transition duration-300">Volver</a>
                                <button type="submit" class="w-auto px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-indigo rounded-md hover:bg-purple-900 hover:text-white transition duration-300">Modificar Compra</button>                            
                            </div>
                    </div>
                    <div class="flex items-center space-x-6 mb-6">

                    <!-- Información del usuario -->
                    <div class="space-y-4">
                        <!-- Fecha de la Compra -->
                         <div class="flex gap-2">
                            <div class=w-2/3>
                                <label for="fecha_compra" class="block text-sm font-medium text-gray-700">Fecha</label>
                                <div class="relative">
                                    <input type="date" name="fecha_compra" id="fecha_compra" value="{{ \Carbon\Carbon::parse($Compra->fecha_compra)->format('Y-m-d') }}" 
                                        class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                                </div>
                            </div>

                        <!-- Total de la Compra -->
                        <div class=w-1/3>
                            <label for="total_compra" class="block text-sm font-medium text-gray-700">Total</label>
                            <div class="relative">
                                <input type="number" name="total_compra" id="total_compra" value="{{ $Compra->total_compra }}" 
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            </div>                            
                            </div>
                        </div>

                        <!-- Descripcion del Producto -->
                        <div>
                            <label for="detalle_compra" class="block text-sm font-medium text-gray-700">Detalle</label>
                            <textarea id="detalle_compra" name="detalle_compra" class="w-full px-3 py-2 border border-gray-300 rounded-lg" value="{{ $Compra->detalle_compra ?? 'No especificado'}}">{{ $Compra->detalle_compra ?? 'No especificado'}}</textarea>
                        </div>

                        <!-- Proveedor -->
                        <div>
                            <label for="fk_id_proveedor" class="block text-sm font-medium text-gray-700">Proveedor</label>
                            <select name="fk_id_proveedor" id="fk_id_proveedor" class="peer block w-full appearance-none rounded-LG border border-gray-300 bg-white px-4 py-2 pr-10 text-sm text-gray-700 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="{{ $Compra->proveedor->id_proveedor ?? '' }}" disabled selected>{{$Compra->proveedor->nombre_proveedor ?? 'No especificado'}} </option>
                                @foreach ($Proveedores as $proveedor)
                                    <option value="{{$proveedor->id_proveedor}}">
                                        {{$proveedor->nombre_proveedor ?? 'No especificado'}}
                                    </option>
                                @endforeach
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
