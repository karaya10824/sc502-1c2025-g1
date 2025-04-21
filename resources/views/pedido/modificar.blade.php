@extends('layouts.dashboard')

@section('title', 'Modificar Pedido')

@section('contentt')
<form class="" action="{{ url('/pedidos/modificar/' . $Pedido['id_pedido']) }}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="productos" id="productos">
    <input type="hidden" name="cantidades" id="cantidades">
    <input type="hidden" name="precios" id="precios">
    <input type="hidden" name="descuentos" id="descuentos">

    <div class="container w-full mx-auto mt-4">
        <div class="grid grid-cols-2 gap-4"> <!-- Grid con 3 columnas y gap de 6 -->
  

            <div class="col-span-1 bg-white">
                <div class="bg-blue-500 text-white text-center py-2 rounded-t-md">
                    Datos generales
                </div>
                <div class="p-6 border rounded-b-md shadow-md">
                    <div class="grid grid-cols-1 gap-6">

                        <!-- Número de comprobante -->
                        <div>
                            <label for="nombre_cliente" class="block text-sm font-medium text-gray-700">Nombre del Cliente</label>
                            <input required type="text" name="nombre_cliente" id="nombre_cliente" value="{{ $Pedido->cliente->nombre_cliente }}" class="block w-full px-4 py-2 text-gray-700 bg-white  border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            @error('numero_comprobante')
                                <small class="text-red-500">{{ '*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Número de comprobante -->
                        <div>
                            <label for="numero_comprobante" class="block text-sm font-medium text-gray-700">Tipo de Envío</label>
                            <input required type="text" name="numero_comprobante" id="numero_comprobante" class="block w-full px-4 py-2 text-gray-700 bg-white  border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            @error('numero_comprobante')
                                <small class="text-red-500">{{ '*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Método de Pago -->
                        <div>
                            <label for="fk_id_metodo_de_pago" class="block text-sm font-medium text-gray-700">Método de Pago</label>
                            <select name="fk_id_metodo_de_pago" id="metodo_de_pago" class="peer block w-full appearance-none rounded-LG border border-gray-300 bg-white px-4 py-2 pr-10 text-sm text-gray-700 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="" disabled selected> -</option>
                                @foreach ($metodosPago as $metodo)
                                    <option value="{{$metodo->id_metodo_de_pago}}">
                                        {{$metodo->detalle_metodo_de_pago}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Número de comprobante -->
                        <div>
                            <label for="numero_comprobante" class="block text-sm font-medium text-gray-700">Número de comprobante</label>
                            <input required type="text" name="numero_comprobante" id="numero_comprobante" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            @error('numero_comprobante')
                                <small class="text-red-500">{{ '*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Descuento -->
                        <div>
                            <label for="fk_id_descuento" class="block text-sm font-medium text-gray-700">Descuento</label>
                            <select name="fk_id_descuento" id="descuento_id" class="peer block w-full appearance-none rounded-LG border border-gray-300 bg-white px-4 py-2 pr-10 text-sm text-gray-700 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="" disabled selected> -</option>
                                @foreach ($Descuentos as $descuento)
                                    <option value="{{$descuento->id_descuento}}">
                                        {{$descuento->codigo_de_descuento}} - {{$descuento->porcentaje_descuento}}%
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Impuesto -->
                        <div>
                            <label for="impuesto" class="block text-sm font-medium text-gray-700">Impuesto (IVA)</label>
                            <input readonly type="text" name="impuesto" id="impuesto" class="block w-full px-4 py-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300">
                            @error('impuesto')
                                <small class="text-red-500">{{ '*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Detalles de la Compra -->
                        <div class="mb-4">
                            <label for="fk_id_estado" class="block text-gray-700">Estado</label>
                            <select id="fk_id_estado" name="fk_id_estado" class="w-full px-3 py-2 border rounded-lg">
                                <option value="3">Completado</option>
                                <option value="4">Pendiente</option>
                                <option value="5">Cancelado</option>
                            </select>
                        </div>

                        <!-- Detalles de la Compra -->
                        <div>
                            <label for="detalle_pedido" class="block text-sm font-medium text-gray-700">Detalles</label>
                            <textarea type="text" name="detalle_pedido" id="detalle_pedido" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none transition duration-300"></textarea>
                        </div>

                        <!-- Fecha -->
                        <div class="col-sm-6">
                            <label for="fecha" class="form-label">Fecha:</label>
                            <input readonly type="date" name="fecha_pedido" id="fecha" class="form-control border-success" value="<?php echo date("Y-m-d") ?>">
                            <?php

                            use Carbon\Carbon;

                            $fecha_hora = Carbon::now()->toDateTimeString();
                            ?>
                            <input type="hidden" name="fecha_pedido" value="{{$fecha_hora}}">
                        </div>

                        <!-- Usuario -->
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <!-- Botón para guardar -->
                        <div class="text-center">
                            <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-md shadow hover:bg-green-600 transition">
                                Realizar venta
                            </button>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</form>
@endsection