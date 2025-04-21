@extends('layouts.dashboard')

@section('title', 'Inventario')

@section('principal')
<!-- Contenido Principal -->
<div class="flex-1">
    <div class="container">
        <!-- Contenido de las pestañas -->
        <div class="p-6">
            <!-- Navegación de pestañas -->
            <div class="bg-white w-1/3 mb-2 overflow-x-auto">
                <div class="flex border-b border-gray-300">
                    <button class="tab-link w-1/2 py-3 text-gray-600 font-semibold hover:text-black focus:text-black border-b-2 border-transparent focus:border-purple-500 active" data-tab="tab1">
                        Compras
                    </button>
                    <button class="tab-link w-1/2 py-3 text-gray-600 font-semibold hover:text-black focus:text-black border-b-2 border-transparent focus:border-purple-500" data-tab="tab2">
                        Proveedores
                    </button>
                </div>          
            </div>
            <!-- Fin Navegación de pestañas -->

            <div id="tab1" class="tab-content">
                <button id="btnAgregarCompras" class="px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-purple rounded-md shadow-md hover:bg-purple-900 hover:text-white transition duration-300"><i class="fa-solid fa-plus mr-2"></i>Agregar Compra</button>
                <div class=" text-white px-2 py-2">
                        <h4 class="text-lg font-semibold text-gray-800">Lista de Compras</h4>                
                </div>    
                <div class="bg-white shadow-lg rounded-lg">          
                    <div class="overflow-x-auto">
                        @if(count($Compras) === 0)
                        <div class="text-center p-4 text-gray-600" th:if="${Compras == null or Compras.empty}">
                            <span>Lista Vacía</span>
                        </div>
                        @else
                        <div class="bg-white shadow rounded-lg">
                            <div class="overflow-x-auto">
                                <table class="min-w-full table-auto">
                                <thead class="bg-gray-100">
                                        <tr>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Fecha</th>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Detalle</th>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Proveedor</th>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Total</th>
                                        <th class="py-3 px-2 text-center">Acciones</th>
                                        </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300">
                                    <?php     foreach ($Compras as $compra):?>
                                    <tr class="hover:bg-gray-100 text-center transition">
                                        <td class="py-3 px-2 text-center">{{  \Carbon\Carbon::parse($compra->fecha_compra)->format('d/m/Y') }}</td>
                                        <td class="py-3 px-2 text-center"><?php echo $compra['detalle_compra']; ?></td>
                                        <td class="py-3 px-2 text-center">{{ $compra->proveedor->nombre_proveedor ?? 'Sin proveedor' }}</td>
                                        <td class="py-3 px-2 text-center"><?php echo $compra['total_compra']; ?></td>
                                        <td class="py-3 px-4 flex gap-2 justify-center">
                                            <a class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-700 transition btnModificarCompra" data-id="<?php echo $compra['id_producto']; ?>" data-nombre="<?php echo $compra['nombre_producto']; ?>">
                                                <i class="fas fa-pencil"></i>
                                            </a>
                                            <form action="{{ url('/compra/eliminar/' . $compra['id_compra']) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <button type="submit" class="bg-gray-300 text-white px-3 py-1 rounded-md hover:bg-gray-500 transition">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div id="tab2" class="tab-content hidden">
                <button id="btnAgregarProveedor" class="px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-purple rounded-md shadow-md hover:bg-purple-900 hover:text-white transition duration-300"><i class="fa-solid fa-plus mr-2"></i>Agregar Proveedores</button>
                <div class=" text-white px-2 py-2">
                        <h4 class="text-lg font-semibold text-gray-800">Lista de Proveedores</h4>                
                </div>    
                <div class="bg-white shadow-lg rounded-lg">          
                    <div class="overflow-x-auto">
                        @if(count($Proveedores) === 0)
                        <div class="text-center p-4 text-gray-600" th:if="${Proveedores == null or Proveedores.empty}">
                            <span>Lista Vacía</span>
                        </div>
                        @else
                        <div class="bg-white shadow rounded-lg">
                            <div class="overflow-x-auto">
                                <table class="min-w-full table-auto">
                                <thead class="bg-gray-100">
                                        <tr>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Nombre</th>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Telefono</th>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Correo Electrónico</th>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Dirección</th>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Estado</th>
                                        <th sec:authorize="hasRole('ROLE_ADMIN')" class="py-3 px-2 text-center">Acciones</th>
                                        </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300">
                                    <?php foreach ($Proveedores as $proveedor):?>
                                    <tr class="hover:bg-gray-100 text-center transition">
                                        <td class="py-3 px-2 text-center"><?php echo $proveedor['nombre_proveedor']; ?></td>
                                        <td class="py-3 px-2 text-center"><?php echo $proveedor['telefono_proveedor']; ?></td>
                                        <td class="py-3 px-2 text-center"><?php echo $proveedor['correo_proveedor']; ?></td>
                                        <td class="py-3 px-2 text-center">₡<?php echo $proveedor['direccion_proveedor']; ?></td>
                                        <td class="py-3 px-2 text-center text-green-600 font-semibold"> <span class="px-2 py-1 text-xs rounded-full <?php echo $proveedor['fk_id_estado'] == 1 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600'; ?>"><?php echo $proveedor['fk_id_estado'] == 1 ? 'Activa' : 'Inactiva'; ?></span></td>
                                        <td class="py-3 px-4 flex gap-2 justify-center">
                                            <a class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-700 transition btnModificarProveedor" data-id="<?php echo $proveedor['id_producto']; ?>" data-nombre="<?php echo $proveedor['nombre_producto']; ?>">
                                                <i class="fas fa-pencil"></i>
                                            </a>
                                            <form action="{{ url('/proveedor/eliminar/' . $proveedor['id_proveedor']) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <button type="submit" class="bg-gray-300 text-white px-3 py-1 rounded-md hover:bg-gray-500 transition">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Pestaña Modal para Agregar Compras-->
<div id="modalAgregarComprar" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-3/4 h-3/4 overflow-y-auto">
        <div class="flex justify-between items-center bg-gray-800 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Agregar Compra</h3>
            <button id="closeModalCompra" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form action="{{ url('/compra/agregar') }}" method="post" enctype="multipart/form-data" id="formAgregarProveedor">
                @csrf 
                <div class="mb-4">
                    <label for="fecha_compra" class="block text-gray-700">Fecha</label>
                    <input type="date" id="fecha_compra" name="fecha_compra" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="detalle_compra" class="block text-gray-700">Detalle</label>
                    <textarea id="detalle_compra" name="detalle_compra" class="w-full px-3 py-2 border rounded-lg"></textarea>
                </div>
                <div class="mb-4">
                    <label for="total_compra" class="block text-gray-700">Total</label>
                    <input type="number" id="total_compra" name="total_compra" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="fk_id_proveedor" class="block text-gray-700">Proovedor</label>
                    <select name="fk_id_proveedor" id="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" aria-labelledby="rolHelpBlock">
                        <option value="" selected disabled>Seleccione:</option>
                        @foreach ($Proveedores as $proveedor)
                            <option value="{{$proveedor->id_proveedor}}">{{$proveedor->nombre_proveedor}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelarModalCompra" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Pestaña Modal para Agregar Compras-->

<!--Pestaña Modal para Agregar Proveedor-->
<div id="modalAgregarProveedor" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-3/4 h-3/4 overflow-y-auto">
        <div class="flex justify-between items-center bg-gray-800 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Agregar Proveedor</h3>
            <button id="closeModalProveedor" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form action="{{ url('/proveedor/agregar') }}" method="post" enctype="multipart/form-data" id="formAgregarProveedor">
                @csrf 
                <div class="mb-4">
                    <label for="nombre_proveedor" class="block text-gray-700">Nombre del Proveedor</label>
                    <input type="text" id="nombre_proveedor" name="nombre_proveedor" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="direccion_proveedor" class="block text-gray-700">Direccion del Proveedor</label>
                    <textarea id="direccion_proveedor" name="direccion_proveedor" class="w-full px-3 py-2 border rounded-lg"></textarea>
                </div>
                <div class="mb-4">
                    <label for="telefono_proveedor" class="block text-gray-700">Telefono</label>
                    <input type="number" id="telefono_proveedor" name="telefono_proveedor" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="correo_proveedor" class="block text-gray-700">Correo</label>
                    <input type="email" id="correo_proveedor" name="correo_proveedor" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelarModalProveedor" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Pestaña Modal para Agregar Proveedor-->

<!-- Pestaña Modal para modificar producto -->
<div id="modalModificarProducto" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-1/2">
        <div class="flex justify-between items-center bg-gray-800 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Modificar Producto</h3>
            <button id="closeModalModificar" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form id="formModificarProducto" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="id_producto" name="id_producto">
                <div class="mb-4">
                    <label for="nombre_producto_mod" class="block text-gray-700">Nombre del Producto</label>
                    <input type="text" id="nombre_producto_mod" name="nombre_producto" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="descripcion_mod" class="block text-gray-700">Descripción</label>
                    <textarea id="descripcion_mod" name="descripcion" class="w-full px-3 py-2 border rounded-lg"></textarea>
                </div>
                <div class="mb-4">
                    <label for="cantidad_mod" class="block text-gray-700">Cantidad</label>
                    <input type="number" id="cantidad_mod" name="cantidad" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="precio_costo_mod" class="block text-gray-700">Precio de Costo</label>
                    <input type="number" id="precio_costo_mod" name="precio_costo" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="precio_venta_mod" class="block text-gray-700">Precio de Venta</label>
                    <input type="number" id="precio_venta_mod" name="precio_venta" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="precio_por_mayor_mod" class="block text-gray-700">Precio por Mayor</label>
                    <input type="number" id="precio_por_mayor_mod" name="precio_por_mayor" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="activo_mod" class="block text-gray-700">Estado</label>
                    <select id="activo_mod" name="activo" class="w-full px-3 py-2 border rounded-lg">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="imagen" class="block text-gray-700">Imagen</label>
                    <input type="file" id="imagen" name="imagenes[]" class="w-full px-3 py-2 border rounded-lg" multiple>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelarModalModificar" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Pestaña Modal para modificar producto -->

<script>
    //// Ventana modal PROVEEDOR
    document.getElementById('btnAgregarProveedor').addEventListener('click', function() {
        document.getElementById('modalAgregarProveedor').classList.remove('hidden');
    });

    //// Ventana modal COMPRAS
    document.getElementById('btnAgregarCompras').addEventListener('click', function() {
        document.getElementById('modalAgregarComprar').classList.remove('hidden');
    });
    
    //Botones para modulo de agregar
    document.getElementById('closeModalProveedor').addEventListener('click', function() {
      document.getElementById('modalAgregarProveedor').classList.add('hidden');
    });

    document.getElementById('cancelarModalProveedor').addEventListener('click', function() {
      document.getElementById('modalAgregarProveedor').classList.add('hidden');
    });

    document.getElementById('closeModalCompra').addEventListener('click', function() {
      document.getElementById('modalAgregarComprar').classList.add('hidden');
    });

    document.getElementById('cancelarModalCompra').addEventListener('click', function() {
      document.getElementById('modalAgregarComprar').classList.add('hidden');
    });
</script>
@endsection
