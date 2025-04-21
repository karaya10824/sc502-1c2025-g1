@extends('layouts.dashboard')

@section('title', 'Inventario')

@section('principal')
<!-- Contenido Principal -->
<div class="flex-1">
  <div class="container">
      <!-- Navegación de pestañas -->
      <div class="bg-white overflow-x-auto">
          <div class="flex w-full border-b border-gray-300">
              <button class="tab-link w-1/3 py-3 text-gray-600 font-semibold hover:text-black focus:text-black border-b-2 border-transparent focus:border-purple-500 active" data-tab="tab1">
                  Productos
              </button>
              <button class="tab-link w-1/3 py-3 text-gray-600 font-semibold hover:text-black focus:text-black border-b-2 border-transparent focus:border-purple-500" data-tab="tab2">
                  Categorias
              </button>
              <button class="tab-link w-1/3 py-3 text-gray-600 font-semibold hover:text-black focus:text-black border-b-2 border-transparent focus:border-purple-500" data-tab="tab3">
                  Descuentos
              </button>
          </div>          
      </div>
      <!-- Fin Navegación de pestañas -->
      
      <!-- Contenido de las pestañas -->
    <div class="p-6">
        <div id="tab1" class="tab-content">
            <button id="btnAgregarProducto" class="px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-purple rounded-md shadow-md hover:bg-purple-900 hover:text-white transition duration-300"><i class="fa-solid fa-plus mr-2"></i>Agregar Producto</button>
            <div class="text-white px-2 py-2">
                <h4 class="text-lg font-semibold text-gray-800">Lista de Productos</h4>                
            </div>    

            <div class="bg-white shadow-lg rounded-lg">          
              <div class="overflow-x-auto">
                  @if(count($Productos) === 0)
                  <div class="text-center p-4 text-gray-600">
                      <span>Lista Vacía</span>
                  </div>
                  @else
                  <div class="bg-white shadow rounded-lg">
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-200">
                                    <tr>
                                    <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Nombre</th>
                                    <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Descripción</th>
                                    <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Cantidad</th>
                                    <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Precio de Costo</th>
                                    <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Precio de Venta</th>
                                    <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Precio de Mayoreo</th>
                                    <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Estado</th>
                                    <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Imagenes</th>
                                    <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300">
                                <?php foreach ($Productos as $producto): ?>
                                <tr class="hover:bg-gray-100 text-center transition">
                                        <td class="py-3 px-2 text-center"><?php echo $producto['nombre_producto']; ?></td>
                                        <td class="py-3 px-2 text-center"><?php echo $producto['descripcion_producto']; ?></td>
                                        <td class="py-3 px-2 text-center"><?php echo $producto['cantidad_producto']; ?></td>
                                        <td class="py-3 px-2 text-center">₡<?php echo $producto['precio_costo_producto']; ?></td>
                                        <td class="py-3 px-2 text-center">₡<?php echo $producto['precio_venta_producto']; ?></td>
                                        <td class="py-3 px-2 text-center">₡<?php echo $producto['precio_por_mayor_producto'];?></td>
                                        
                                        <td class="py-3 px-2 text-center text-green-600 font-semibold"> <span class="px-2 py-1 text-xs rounded-full <?php echo $producto['fk_id_estado'] == 1 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600'; ?>"><?php echo $producto['fk_id_estado'] == 1 ? 'Activa' : 'Inactiva'; ?></span></td>
                                        <td class="py-3 px-2 text-center">
                                            <div class="grid grid-cols-2 gap-2">
                                                @foreach($producto->media as $image)
                                                <img src="{{ $image->getUrl(); }}" class="h-20 w-20 object-cover rounded-lg shadow-md">
                                                @endforeach
                                            </div>
                                        </td>

                                        <td class="py-3 px-4 flex gap-2 justify-center">
                                            <button href="#" class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-700 transition btnModificarProducto" data-id="<?php echo $producto['id_producto']; ?>" data-nombre="<?php echo $producto['nombre_producto']; ?>" data-descripcion="<?php echo $producto['descripcion_producto']; ?>" data-cantidad="<?php echo $producto['cantidad_producto']; ?>" data-precio-costo="<?php echo $producto['precio_costo_producto']; ?>" data-precio-venta="<?php echo $producto['precio_venta_producto']; ?>" data-precio-mayor="<?php echo $producto['precio_por_mayor_producto']; ?>" data-activo="<?php echo $producto['fk_id_estado']; ?>" data-imagen="<?php echo $producto['imagen']; ?>">
                                                <i class="fas fa-pencil"></i>
                                            </button>
                                            <form action="{{ url('/producto/eliminar/' . $producto['id_producto']) }}" method="post">
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
            <button id="btnAgregarCategoria" class="px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-purple rounded-md shadow-md hover:bg-purple-900 hover:text-white transition duration-300"><i class="fa-solid fa-plus mr-2"></i>Agregar Categoria</button>
            <div class="text-white px-2 py-2">
                <h4 class="text-lg font-semibold text-gray-800">Lista de Categorias</h4>
            </div>

            <div class="bg-white shadow-lg rounded-lg">          
                <div class="overflow-x-auto">
                    @if(count($Categorias) === 0)
                    <div class="text-center p-4 text-gray-600">
                        <span>Lista Vacía</span>
                    </div>
                    @else
                    <div class="bg-white shadow rounded-lg">
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Nombre</th>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Descripción de Categoria</th>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Activo</th>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300">
                                    <?php foreach ($Categorias as $categoria): ?>
                                    <tr class="hover:bg-gray-100 transition text-center" >
                                            <td class="py-3 px-2 text-center"><?php echo $categoria['nombre_categoria']; ?></td>
                                            <td class="py-3 px-2 text-center"><?php echo $categoria['descripcion_categoria']; ?></td>
                                            <td class="py-3 px-2 text-center text-green-600 font-semibold"> <span class="px-2 py-1 text-xs rounded-full <?php echo $categoria['fk_id_estado'] == 1 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600'; ?>"><?php echo $categoria['fk_id_estado'] == 1 ? 'Activa' : 'Inactiva'; ?></span></td>
                                            <td class="py-3 px-4 flex gap-2 justify-center">
                                                <button class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-700 transition btnModificarCategoria" data-id="<?php echo $categoria['id_categoria_prod']; ?>" data-nombre="<?php echo $categoria['nombre_categoria']; ?>" data-descripcion="<?php echo $categoria['descripcion_categoria']; ?>" data-activo="<?php echo $categoria['fk_id_estado']; ?>">
                                                    <i class="fas fa-pencil"></i>
                                                </button>
                                                <form action="{{ url('/categoria/eliminar/' . $categoria['id_categoria_prod']) }}" method="post">
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
        
        <div id="tab3" class="tab-content hidden">
                <button id="btnAgregarDescuento"  class="px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-purple rounded-md shadow-md hover:bg-purple-900 hover:text-white transition duration-300"><i class="fa-solid fa-plus mr-2"></i>Agregar Descuento</button>
                <div class="text-white px-2 py-2">
                    <h4 class="text-lg font-semibold text-gray-800">Lista de Descuentos</h4>                
                </div>  
                <div class="bg-white shadow-lg rounded-lg">           
                <div class="overflow-x-auto">
                    @if(count($Descuentos) === 0)
                    <div class="text-center p-4 text-gray-600">
                        <span>Lista Vacía</span>
                    </div>
                    @else
                    <div class="bg-white shadow rounded-lg">
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Código de Descuento</th>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Descripción de Descuento</th>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Porcentaje de Descuento</th>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Activo</th>
                                        <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300">
                                    <?php foreach ($Descuentos as $descuento): ?>
                                    <tr class="hover:bg-gray-100 transition text-center">
                                            <td class="py-3 px-4 text-center"><?php echo $descuento['codigo_de_descuento']; ?></td>
                                            <td class="py-3 px-4 text-center"><?php echo $descuento['descripcion_descuento']; ?></td>
                                            <td class="py-3 px-4 text-center"><?php echo $descuento['porcentaje_descuento']; ?>%</td>
                                            <td class="py-3 px-2 text-center text-green-600 font-semibold"> <span class="px-2 py-1 text-xs rounded-full <?php echo $descuento['fk_id_estado'] == 1 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600'; ?>"><?php echo $descuento['fk_id_estado'] == 1 ? 'Activa' : 'Inactiva'; ?></span></td>
                                            <td class="py-3 px-4 flex gap-2 justify-center">
                                                <button class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-700 transition btnModificarDescuento" data-id="<?php echo $descuento['id_descuento']; ?>" data-porcentaje="<?php echo $descuento['porcentaje_descuento']; ?>" data-codigo="<?php echo $descuento['codigo_de_descuento']; ?>" data-descripcion="<?php echo $descuento['descripcion_descuento']; ?>" data-activo="<?php echo $descuento['fk_id_estado']; ?>">
                                                    <i class="fas fa-pencil"></i>
                                                </button>
                                                <form action="{{ url('/descuento/eliminar/' . $descuento['id_descuento']) }}" method="post">
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
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
                 

            </div>
        </div>
        <!-- Fin Contenido de las pestañas -->
    </div>
  </div>
</div>


<!--Pestaña Modal para Agregar Producto-->
<div id="modalAgregarProducto" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-3/4 h-3/4 overflow-y-auto">
        <div class="flex justify-between items-center bg-gray-800 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Agregar Producto</h3>
            <button id="closeModal" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form action="{{ url('/producto/agregar') }}" method="post" enctype="multipart/form-data" id="formAgregarProducto">
                @csrf 
                <div class="mb-4">
                    <label for="nombre_producto" class="block text-gray-700">Nombre del Producto</label>
                    <input type="text" id="nombre_producto" name="nombre_producto" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="descripcion_producto" class="block text-gray-700">Descripción</label>
                    <textarea id="descripcion_producto" name="descripcion_producto" class="w-full px-3 py-2 border rounded-lg"></textarea>
                </div>
                <div class="mb-4">
                    <label for="cantidad_producto" class="block text-gray-700">Cantidad</label>
                    <input type="number" id="cantidad_producto" name="cantidad_producto" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="precio_costo_producto" class="block text-gray-700">Precio de Costo</label>
                    <input type="number" id="precio_costo_producto" name="precio_costo_producto" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="precio_venta_producto" class="block text-gray-700">Precio de Venta</label>
                    <input type="number" id="precio_venta_producto" name="precio_venta_producto" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="precio_por_mayor_producto" class="block text-gray-700">Precio por Mayor</label>
                    <input type="number" id="precio_por_mayor_producto" name="precio_por_mayor_producto" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="fk_id_estado" class="block text-gray-700">Estado</label>
                    <select id="fk_id_estado" name="fk_id_estado" class="w-full px-3 py-2 border rounded-lg">
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="imagen" class="block text-gray-700">Imagen</label>
                    <input type="file" id="imagen" name="imagenes[]" class="w-full px-3 py-2 border rounded-lg" multiple>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelarModal" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Pestaña Modal para Agregar Producto-->

<!-- Pestaña Modal para modificar producto -->
<div id="modalModificarProducto" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
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
                    <textarea id="descripcion_mod" name="descripcion_producto" class="w-full px-3 py-2 border rounded-lg"></textarea>
                </div>
                <div class="mb-4">
                    <label for="cantidad_mod" class="block text-gray-700">Cantidad</label>
                    <input type="number" id="cantidad_mod" name="cantidad_producto" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="precio_costo_mod" class="block text-gray-700">Precio de Costo</label>
                    <input type="number" id="precio_costo_mod" name="precio_costo_producto" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="precio_venta_mod" class="block text-gray-700">Precio de Venta</label>
                    <input type="number" id="precio_venta_mod" name="precio_venta_producto" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="precio_por_mayor_mod" class="block text-gray-700">Precio por Mayor</label>
                    <input type="number" id="precio_por_mayor_mod" name="precio_por_mayor_producto" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="fk_id_estado" class="block text-gray-700">Estado</label>
                    <select id="fk_id_estado" name="fk_id_estado" class="w-full px-3 py-2 border rounded-lg">
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
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

<!--Pestaña Modal para Agregar Categoria-->
<div id="modalAgregarCategoria" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-1/2">
        <div class="flex justify-between items-center bg-gray-800 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Agregar Categoria</h3>
            <button id="closeModalC" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form action="{{ route('categorias-crear') }}" method="post" enctype="multipart/form-data" id="formAgregarProducto">
                @csrf
                <div class="mb-4">
                    <label for="nombre_categoria" class="block text-gray-700">Nombre de Categoria</label>
                    <input type="text" id="nombre_categoria" name="nombre_categoria" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="descripcion_categoria" class="block text-gray-700">Descripción de Categoria</label>
                    <textarea id="descripcion_categoria" name="descripcion_categoria" class="w-full px-3 py-2 border rounded-lg"></textarea>
                </div>
                <div class="mb-4">
                    <label for="fk_id_estado" class="block text-gray-700">Estado</label>
                    <select id="fk_id_estado" name="fk_id_estado" class="w-full px-3 py-2 border rounded-lg">
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelarModalC" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Pestaña Modal para Agregar Categoria-->

<!-- Pestaña Modal para modificar Categoria -->
<div id="modalModificarCategoria" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-1/2">
        <div class="flex justify-between items-center bg-gray-800 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Modificar Categoria</h3>
            <button id="closeModalModificarC" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form action="{{ url('/categoria/modificar/' . ($categoria['id_categoria_prod'] ?? '')) }}" method="post" id="formModificarCategoria">
                @csrf
                @method('PUT')
                <input type="hidden" id="id_categoria_prod" name="id_categoria_prod">
                <div class="mb-4">
                    <label for="nombre_categoria_mod" class="block text-gray-700">Nombre de Categoria</label>
                    <input type="text" id="nombre_categoria_mod" name="nombre_categoria" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="descripcion_categoria_mod" class="block text-gray-700">Descripción de Categoria</label>
                    <textarea id="descripcion_categoria_mod" name="descripcion_categoria" class="w-full px-3 py-2 border rounded-lg"></textarea>
                </div>
                <div class="mb-4">
                    <label for="fk_id_estado" class="block text-gray-700">Estado</label>
                    <select id="fk_id_estado_mod" name="fk_id_estado" class="w-full px-3 py-2 border rounded-lg">
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelarModalModificarC" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Pestaña Modal para modificar Categoria -->

<!--Pestaña Modal para Agregar Descuento-->
<div id="modalAgregarDescuento" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-1/2">
        <div class="flex justify-between items-center bg-gray-800 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Agregar Descuento</h3>
            <button id="closeModalD" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form action="{{ url('/descuento/agregar') }}" method="post" enctype="multipart/form-data" id="formAgregarProducto">
                @csrf
                
                <div class="mb-4">
                    <label for="codigo_de_descuento" class="block text-gray-700">Código de Descuento</label>
                    <input type="text" id="codigo_de_descuento" name="codigo_de_descuento" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="descripcion_descuento" class="block text-gray-700">Descripción de Descuento</label>
                    <textarea id="descripcion_descuento" name="descripcion_descuento" class="w-full px-3 py-2 border rounded-lg"></textarea>
                </div>
                <div class="mb-4">
                    <label for="porcentaje_descuento" class="block text-gray-700">Porcentaje de Descuento</label>
                    <input type="number" id="porcentaje_descuento" min="0" max="100" name="porcentaje_descuento" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="fk_id_estado" class="block text-gray-700">Estado</label>
                    <select id="fk_id_estado" name="fk_id_estado" class="w-full px-3 py-2 border rounded-lg">
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelarModalD" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Pestaña Modal para Agregar Descuento-->

<!-- Pestaña Modal para modificar Descuento -->
<div id="modalModificarDescuento" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-1/2">
        <div class="flex justify-between items-center bg-gray-800 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Modificar Descuento</h3>
            <button id="closeModalModificarD" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form action="{{ url('/descuento/modificar/' . ($descuento['id_descuento'] ?? '')) }}" method="post" id="formModificarDescuento">
                @csrf
                @method('PUT')
                <input type="hidden" id="id_descuento" name="id_descuento">
                <div class="mb-4">
                    <label for="porcentaje_descuento" class="block text-gray-700">Porcentaje de Descuento</label>
                    <input type="number" id="porcentaje_descuento_mod" min="0" max="100" name="porcentaje_descuento" class="w-full px-3 py-2 border rounded-lg"></input>
                </div>
                <div class="mb-4">
                    <label for="codigo_de_descuento" class="block text-gray-700">Código de Descuento</label>
                    <input type="text" id="codigo_de_descuento_mod" name="codigo_de_descuento" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="descripcion_descuento" class="block text-gray-700">Descripción de Descuento</label>
                    <textarea id="descripcion_descuento_mod" name="descripcion_descuento" class="w-full px-3 py-2 border rounded-lg"></textarea>
                </div>
                <div class="mb-4">
                    <label for="fk_id_estado" class="block text-gray-700">Estado</label>
                    <select id="fk_id_estado_mod" name="fk_id_estado" class="w-full px-3 py-2 border rounded-lg">
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelarModalModificarD" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Pestaña Modal para modificar Descuento -->
@endsection
