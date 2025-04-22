@extends('layouts.dashboard')

@section('title', 'Inventario')

@section('principal')
    <div class="container flex w-full h-full">
        <div class="flex h-full w-full">
            <form action="{{ url('/gasto/modificar/' . $Gasto->id_gasto) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Perfil -->
            <div id="profile" class="tab-content">
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
                        <!-- Nombre -->
                         <div class="flex gap-2">
                            <div class=w-2/3>
                                <label for="name" class="block text-sm font-medium text-gray-700">Fecha</label>
                                <div class="relative">
                                    <input type="date" name="fecha_gasto" id="fecha_gasto" value="{{ \Carbon\Carbon::parse($Gasto->fecha_gasto)->format('Y-m-d') }}" 
                                        class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                                </div>
                            </div>

                        <!-- Descripcion del Gasto -->
                        <div class=w-1/3>
                            <label for="monto_gasto" class="block text-sm font-medium text-gray-700">Monto</label>
                            <div class="relative">
                                <input type="number" name="monto_gasto" id="monto_gasto" value="{{ $Gasto->monto_gasto }}" 
                                    class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            </div>                            
                            </div>
                        </div>

                        <!-- Descripcion del Producto -->
                        <div>
                            <label for="descripcion_gasto" class="block text-sm font-medium text-gray-700">Descripcion</label>
                            <textarea id="descripcion_gasto" name="descripcion_gasto" class="w-full px-3 py-2 border border-gray-300 rounded-lg" value="{{ $Gasto->descripcion_gasto ?? 'No especificado'}}">{{ $Gasto->descripcion_gasto ?? 'No especificado'}}</textarea>
                        </div>

                        <!-- Categoria -->
                        <div>
                            <label for="fk_id_categoria_gasto" class="block text-sm font-medium text-gray-700">Categoria</label>
                            <select name="fk_id_categoria_gasto" id="fk_id_categoria_gasto" class="peer block w-full appearance-none rounded-LG border border-gray-300 bg-white px-4 py-2 pr-10 text-sm text-gray-700 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="{{ $Gasto->categoriagasto->id_categoria_gasto ?? '' }}" disabled selected>{{$Gasto->categoriagasto->descripcion_categoria_gasto ?? 'No especificado'}} </option>
                                @foreach ($Categorias as $categoria)
                                    <option value="{{$categoria->id_categoria_gasto}}">
                                        {{$categoria->descripcion_categoria_gasto ?? 'No especificado'}}
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

@endsection
