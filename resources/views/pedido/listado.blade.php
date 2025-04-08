@extends('layouts.dashboard')

@section('title', 'Pedidos')

@section('principal')
<!-- Contenido Principal -->
<div class="container pt-16 mx-auto">
    <div class="w-1/4 pt-6 ">
        <form action="{{ route('pedidos-agregar-vista') }}">
            <button class="w-full px-5 h-10 mb-5 bg-gray-800 text-white font-semibold border border-black rounded-lg shadow-md hover:bg-gray-900 hover:text-white transition duration-300">Agregar Pedido</button>
        </form>
    </div>

    <div class="max-w-6xl bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Pedidos</h2>

        <!-- Tabs -->
        <div class="flex border-b overflow-x-auto">
            <button class="tab-button px-4 py-2 text-gray-600 border-b-2 border-transparent focus:outline-none active-tab" data-tab="all">Todos</button>
            <button class="tab-button px-4 py-2 text-gray-600 border-b-2 border-transparent focus:outline-none" data-tab="cancelled">Página Web</button>
            <button class="tab-button px-4 py-2 text-gray-600 border-b-2 border-transparent focus:outline-none" data-tab="pending">Pendientes</button>
            <button class="tab-button px-4 py-2 text-gray-600 border-b-2 border-transparent focus:outline-none" data-tab="completed">Completados</button>
            <button class="tab-button px-4 py-2 text-gray-600 border-b-2 border-transparent focus:outline-none" data-tab="cancelled">Cancelados</button>
        </div>

        <!-- Tabla de Pedidos -->
        <div class="overflow-x-auto mt-4">
            <table class="w-full border-collapse bg-white shadow-md">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-3 text-left">Fecha</th>
                        <th class="py-3 px-3 text-left">Cliente</th>
                        <th class="py-3 px-6 text-left">Productos</th>
                        <th class="py-3 px-3 text-left">Total</th>
                        <th class="py-3 px-3 text-left">Estado</th>
                        <th class="py-3 px-3 text-left">Envío</th>
                        <th class="py-3 px-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody id="ordersTable">
                    <!-- Pedidos dinámicos -->
                    <tr class="order-row border-b border-gray-200 hover:bg-gray-100" data-status="pending">
                        <td class="py-3 px-6">#001</td>
                        <td class="py-3 px-3">Juan Pérez</td>
                        <td class="py-3 px-3">$120.00</td>
                        <td class="py-3 px-3 text-yellow-600">Pendiente</td>
                        <td class="py-3 px-3"> </td>
                        <td class="py-3 px-3 flex gap-2 justify-center">
                            <form action="{{ route('pedidos-destroy', ['id_pedido' => 1] ) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                            <a href="#" class="bg-green-600 text-white px-3 py-1 rounded-md hover:bg-green-700 transition btnModificarProducto" >
                                <i class="fas fa-pencil"></i> Modificar
                            </a>
                        </td>
                    </tr>
                    <tr class="order-row border-b border-gray-200 hover:bg-gray-100" data-status="completed">
                        <td class="py-3 px-6">#002</td>
                        <td class="py-3 px-3">Ana López</td>
                        <td class="py-3 px-3">$250.00</td>
                        <td class="py-3 px-3 text-green-600">Completado</td>
                    </tr>
                    <tr class="order-row border-b border-gray-200 hover:bg-gray-100" data-status="cancelled">
                        <td class="py-3 px-6">#003</td>
                        <td class="py-3 px-3">Carlos Gómez</td>
                        <td class="py-3 px-3">$90.00</td>
                        <td class="py-3 px-3 text-red-600">Cancelado</td>
                    </tr>
                    <tr class="order-row border-b border-gray-200 hover:bg-gray-100" data-status="pending">
                        <td class="py-3 px-6">#004</td>
                        <td class="py-3 px-3">Marta Ruiz</td>
                        <td class="py-3 px-3">$180.00</td>
                        <td class="py-3 px-3 text-yellow-600">Pendiente</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <script src="script.js"></script>

</html>

@endsection
