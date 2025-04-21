@extends('layouts.dashboard')

@section('title', 'Pedidos')

@section('principal')
<!-- Contenido Principal -->
<div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold mb-4">Pedidos</h2>

    <!-- Tabs -->
    <div class="flex border-b">
        <button class="tab-button px-4 py-2 text-gray-600 border-b-2 border-transparent focus:border-green-500 focus:outline-none active-tab" data-tab="all">Todos</button>
        <button class="tab-button px-4 py-2 text-gray-600 border-b-2 border-transparent focus:border-green-500 focus:outline-none" data-tab="pending">Pendientes</button>
        <button class="tab-button px-4 py-2 text-gray-600 border-b-2 border-transparent focus:outline-none" data-tab="completed">Completados</button>
        <button class="tab-button px-4 py-2 text-gray-600 border-b-2 border-transparent focus:outline-none" data-tab="cancelled">Cancelados</button>
    </div>

    <!-- Tabla de Pedidos -->
    <div class="overflow-x-auto mt-4">
        <table class="w-full border-collapse bg-white shadow-md">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Cliente</th>
                    <th class="py-3 px-6 text-left">Productos</th>
                    <th class="py-3 px-6 text-left">Total</th>
                    <th class="py-3 px-6 text-left">Estado</th>
                    <th class="py-3 px-6 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody id="ordersTable">
                <!-- Pedidos dinámicos -->
                <tr class="order-row border-b border-gray-200 hover:bg-gray-100" data-status="pending">
                    <td class="py-3 px-6">#001</td>
                    <td class="py-3 px-6">Juan Pérez</td>
                    <td class="py-3 px-6">$120.00</td>
                    <td class="py-3 px-6 text-yellow-600">Pendiente</td>
                </tr>
                <tr class="order-row border-b border-gray-200 hover:bg-gray-100" data-status="completed">
                    <td class="py-3 px-6">#002</td>
                    <td class="py-3 px-6">Ana López</td>
                    <td class="py-3 px-6">$250.00</td>
                    <td class="py-3 px-6 text-green-600">Completado</td>
                </tr>
                <tr class="order-row border-b border-gray-200 hover:bg-gray-100" data-status="cancelled">
                    <td class="py-3 px-6">#003</td>
                    <td class="py-3 px-6">Carlos Gómez</td>
                    <td class="py-3 px-6">$90.00</td>
                    <td class="py-3 px-6 text-red-600">Cancelado</td>
                </tr>
                <tr class="order-row border-b border-gray-200 hover:bg-gray-100" data-status="pending">
                    <td class="py-3 px-6">#004</td>
                    <td class="py-3 px-6">Marta Ruiz</td>
                    <td class="py-3 px-6">$180.00</td>
                    <td class="py-3 px-6 text-yellow-600">Pendiente</td>
                </tr>
                <tr class="py-3 px-4 flex gap-2 justify-center">
                    <form action="{{ url('/producto/eliminar/' . $producto['id_producto']) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>
                    </form>
                    <a href="#" class="bg-green-600 text-white px-3 py-1 rounded-md hover:bg-green-700 transition btnModificarProducto" data-id="<?php echo $producto['id_producto']; ?>" data-nombre="<?php echo $producto['nombre_producto']; ?>" data-descripcion="<?php echo $producto['descripcion']; ?>" data-cantidad="<?php echo $producto['cantidad']; ?>" data-precio-costo="<?php echo $producto['precio_costo']; ?>" data-precio-venta="<?php echo $producto['precio_venta']; ?>" data-precio-mayor="<?php echo $producto['precio_por_mayor']; ?>" data-activo="<?php echo $producto['activo']; ?>" data-imagen="<?php echo $producto['imagen']; ?>">
                        <i class="fas fa-pencil"></i> Modificar
                    </a>
                </tr>
            </tbody>
        </table>
    </div>
</div>


@endsection

