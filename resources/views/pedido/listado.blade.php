@extends('layouts.dashboard')

@section('title', 'Pedidos')

@section('principal')
<!-- Contenido Principal -->
<div class="container">
    <div class="max-w-6xl p-6">
        <div class="w-auto flex flex-col">
            <form action="{{ route('pedidos-crear-vista') }}">
                <div class="flex flex-row gap-2">
                    <button type="submit" class="w-auto px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-indigo rounded-md hover:bg-purple-900 hover:text-white transition duration-300">Agregar Pedido</button>
                    <button class="w-auto px-5 h-10 mb-5 bg-gray-200 text-white font-semibold border border-indigo rounded-md hover:bg-indigo-900 hover:text-white transition duration-300">Agregar Pedido</button>
                </div>
            </form>
        </div>
        <h2 class="text-2xl font-bold mb-4">Pedidos</h2>

        <!-- Tabs -->
        <div class="flex border-b overflow-x-auto">
            <button class="tab-button px-4 py-2 text-gray-600 border-b-2 border-transparent focus:text-blue-600 focus:bordxt-blue-500 focus:outline-none active-tab" data-tab="all">Todos</button>
            <button class="tab-button px-4 py-2 text-gray-600 border-b-2 border-transparent focus:text-blue-600 focus:bordxt-blue-500 focus:outline-none" data-tab="3">Página Web</button>
            <button class="tab-button px-4 py-2 text-gray-600 border-b-2 border-transparent focus:text-blue-600 focus:bordxt-blue-500 focus:outline-none" data-tab="3">Completados</button>
            <button class="tab-button px-4 py-2 text-gray-600 border-b-2 border-transparent focus:text-blue-600 focus:bordxt-blue-500 focus:outline-none" data-tab="4">Pendientes</button>
            <button class="tab-button px-4 py-2 text-gray-600 border-b-2 border-transparent focus:text-blue-600 focus:bordxt-blue-500 focus:outline-none" data-tab="5">Cancelados</button>
        </div>

        <!-- Tabla de Pedidos -->
        <div class="max-w-7xl mx-auto">

            <div class="bg-white shadow rounded-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">#</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Fecha</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Cliente</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Envio</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Metodo de Pago</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Total</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Estado</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Acciones</th>
                    </tr>
                </thead>
                <tbody id="ordersTable">
                    <!-- Order Row -->
                    @foreach ($Pedidos as $pedido)
                    <tr class="order-row bg-white border-b hover:bg-gray-50" data-status="{{ $pedido->fk_id_estado }}">
                        <td class="px-6 py-4">{{ $pedido->id_pedido }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pedido->fecha_pedido)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-blue-600">{{ $pedido->cliente->nombre_cliente ?? 'No especificado'}}</td>
                        <td class="px-6 py-4">{{ $pedido->fk_id_cliente ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $pedido->metodoPago->detalle_metodo_de_pago ?? 'No especificado' }}</td>
                        <td class="px-6 py-4">₡{{ $pedido->total_pedido }} <span class="bg-black text-white px-2 py-1 rounded-full text-xs ml-1">13%</span></td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs bg-red-100 text-red-600 rounded-full">Cancelado</span>
                        </td>

                        <td class="py-3 px-4 flex gap-2 justify-center">
                            <a href="{{ url('/pedidos/modificar/' . $pedido['id_pedido']) }}" class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-700 transition btnModificarProducto" data-id="<?php echo $pedido['id_producto']; ?>" data-nombre="<?php echo $pedido['nombre_producto']; ?>">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <form action="{{ url('/pedidos/eliminar/' . $pedido['id_pedido']) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                            </form>
                            <button onclick="toggleDetails('details-{{ $pedido->id_pedido }}')" class="bg-gray-300 text-white px-3 py-1 rounded-md hover:bg-gray-500 transition">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>

                    </tr>
                        <!-- Product Details -->
                        <tr id="details-{{ $pedido->id_pedido }}" class="hidden bg-gray-100">
                            <td colspan="8" class="px-6 py-4">
                                <div class="flex flex-col gap-4">
                                @foreach ($pedido->detallePedido as $detalle)
                                    @if($detalle->pedido->id_pedido == $pedido->id_pedido)
                                    <div>
                                        <img src="{{ $detalle->producto->getFirstMediaUrl('imagenes')  }}" class="h-20 w-20 object-cover rounded-lg shadow-md" alt="">
                                        <div class="text-sm font-medium">{{ $detalle->producto->nombre_producto ?? 'Producto no encontrado'}}</div>
                                        <div class="text-sm text-gray-600">Cantidad: {{ $detalle->cantidad }}, Precio: {{ $detalle->producto->precio_venta_producto ?? 'Producto no encontrado'}}</div>
                                    </div>
                                    @endif
                                @endforeach
                                <div class="text-sm font-semibold text-right">Subtotal: ₡{{ $pedido->subtotal_pedido }}, Descuento: {{ $pedido->descuento ?? 'Sin Descuento'}}, Total: ₡{{ $pedido->total_pedido }}</div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
    <script src="script.js"></script>
  </div>

  <script>
    function toggleDetails(id) {
      const row = document.getElementById(id);
      row.classList.toggle('hidden');
    }
  </script>
</html>

@endsection
