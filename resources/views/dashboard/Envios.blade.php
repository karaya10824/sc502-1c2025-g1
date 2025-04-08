@extends('layouts.dashboard')

@section('title', 'Inventario')

@section('principal')
<!-- Contenido Principal -->
<div class="flex-1 ml-16 pt-16">
  <div class="container mx-auto p-4">
      <!-- Navegación de pestañas -->
      <div class="bg-white">
          <div class="flex w-auto border-b border-gray-300">
              <button class="tab-link py-3 px-6 text-gray-600 font-semibold hover:text-black focus:text-black border-b-2 border-transparent focus:border-black" data-tab="tab1">
                  Envíos
              </button>
              <button class="tab-link py-3 px-6 text-gray-600 font-semibold hover:text-black focus:text-black border-b-2 border-transparent focus:border-black" data-tab="tab2">
                  Categorias
              </button>
          </div>          
      </div>
      <!-- Fin Navegación de pestañas -->
      
      <!-- Contenido de las pestañas -->
      <div class="p-6">
        <div id="tab1" class="tab-content">
          <button id="btnAgregarProducto" class="px-5 h-10 mb-5 bg-gray-800 text-white font-semibold border border-black rounded-lg shadow-md hover:bg-gray-900 hover:text-white transition duration-300">Agregar Producto</button>
          <div class="bg-white shadow-lg rounded-lg overflow-hidden">
              <div class="bg-gray-800 text-white px-4 py-4">
                  <h4 class="text-lg font-semibold">Lista de Envíos</h4>
              </div>
              <div>
                  <table class="w-full border-collapse">
                      <thead class="bg-gray-900 text-white">
                          <tr>
                              <th class="py-3 px-2 text-left">Nombre</th>
                              <th class="py-3 px-2 text-left">Descripción</th>
                              <th class="py-3 px-2 text-left">Cantidad</th>
                              <th class="py-3 px-2 text-left">Precio de Costo</th>
                              <th class="py-3 px-2 text-left">Precio de Venta</th>
                              <th class="py-3 px-2 text-left">Precio de Mayoreo</th>
                              <th class="py-3 px-2 text-left">Estado</th>
                              <th class="py-3 px-2 text-left">Imagen</th>
                              <th sec:authorize="hasRole('ROLE_ADMIN')" class="py-3 px-2 text-center">Acciones</th>
                          </tr>
                      </thead>
                      <tbody class="divide-y divide-gray-300">
                          <tr class="hover:bg-gray-100 transition text-center" ><?php foreach ($Productos as $producto): ?>
                                <td class="py-3 px-4"><?php echo $producto['nombre_producto']; ?></td>
                                <td class="py-3 px-4"><?php echo $producto['descripcion']; ?></td>
                                <td class="py-3 px-4"><?php echo $producto['cantidad']; ?></td>
                                <td class="py-3 px-4"><?php echo $producto['precio_costo']; ?></td>
                                <td class="py-3 px-4"><?php echo $producto['precio_venta']; ?></td>
                                <td class="py-3 px-4"><?php echo $producto['precio_por_mayor']; ?></td>
                                <td class="py-3 px-4 text-green-600 font-semibold"><?php echo $producto['activo'] ? 'Activa' : 'Inactiva'; ?></td>
                                <td class="py-3 px-4">
                                    <img src="<?php echo $producto['imagen']; ?>" class="h-20 w-20 object-cover rounded-lg shadow-md">
                                </td>
                                <td class="py-3 px-4 flex gap-2 justify-center">
                                    <form action="{{ url('/producto/' . $producto['id_producto']) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                          <i class="fas fa-trash"></i> Eliminar
                                      </button>
                                    </form>
                                    <a href="#" class="bg-green-600 text-white px-3 py-1 rounded-md hover:bg-green-700 transition btnModificarProducto" data-id="<?php echo $producto['id_producto']; ?>" data-nombre="<?php echo $producto['nombre_producto']; ?>" data-descripcion="<?php echo $producto['descripcion']; ?>" data-cantidad="<?php echo $producto['cantidad']; ?>" data-precio-costo="<?php echo $producto['precio_costo']; ?>" data-precio-venta="<?php echo $producto['precio_venta']; ?>" data-precio-mayor="<?php echo $producto['precio_mayoreo']; ?>" data-activo="<?php echo $producto['activo']; ?>" data-imagen="<?php echo $producto['imagen']; ?>">
                                        <i class="fas fa-pencil"></i> Modificar
                                    </a>
                                </td>
                              </tr>
                              <?php endforeach; ?>
                      </tbody>
                  </table>
              </div>
              
              <?php echo empty($Productos); if(empty($Productos)){?>
                <div class="text-center p-4 text-gray-600" th:if="${productos == null or productos.empty}">
                    <span>[[#{lista.vacia}]]</span>
                </div>
              <?php } ?>
          </div>
        </div>

        <div id="tab2" class="tab-content hidden">
          <button id="btnAgregarCategoria" class="px-5 h-10 mb-5 bg-gray-800 text-white font-semibold border border-black rounded-lg shadow-md hover:bg-gray-900 hover:text-white transition duration-300">Agregar Categoria</button>
          <div class="bg-white shadow-lg rounded-lg overflow-hidden">
              <div class="bg-gray-800 text-white px-4 py-4">
                  <h4 class="text-lg font-semibold">Lista de Categorias</h4>
              </div>
              <div>
                  <table class="w-full border-collapse">
                      <thead class="bg-gray-900 text-white">
                          <tr>
                              <th class="py-3 px-2 text-left">Nombre</th>
                              <th class="py-3 px-2 text-left">Descripción de Categoria</th>
                              <th class="py-3 px-2 text-left">Activo</th>
                              <th sec:authorize="hasRole('ROLE_ADMIN')" class="py-3 px-2 text-center">Acciones</th>
                          </tr>
                      </thead>
                      <tbody class="divide-y divide-gray-300">
                          <tr class="hover:bg-gray-100 transition text-center" ><?php foreach ($Categorias as $categoria): ?>
                                <td class="py-3 px-4"><?php echo $categoria['nombre_categoria']; ?></td>
                                <td class="py-3 px-4"><?php echo $categoria['descripcion_categoria']; ?></td>
                                <td class="py-3 px-4 text-green-600 font-semibold"><?php echo $categoria['activo'] ? 'Activa' : 'Inactiva'; ?></td>
                                <td class="py-3 px-4 flex gap-2 justify-center">
                                    <form action="{{ url('/categoria/' . $categoria['id_categoria']) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                          <i class="fas fa-trash"></i> Eliminar
                                      </button>
                                    </form>
                                    <a href="#" class="bg-green-600 text-white px-3 py-1 rounded-md hover:bg-green-700 transition btnModificarProducto" data-id="<?php echo $categoria['id_categoria']; ?>" data-nombre="<?php echo $categoria['nombre_categoria']; ?>" data-descripcion="<?php echo $categoria['descripcion_categoria']; ?>" data-activo="<?php echo $categoria['activo']; ?>">
                                        <i class="fas fa-pencil"></i> Modificar
                                    </a>
                                </td>
                              </tr>
                              <?php endforeach; ?>
                      </tbody>
                  </table>
              </div>
              
              <?php echo empty($Productos); if(empty($Productos)){?>
                <div class="text-center p-4 text-gray-600" th:if="${productos == null or productos.empty}">
                    <span>[[#{lista.vacia}]]</span>
                </div>
              <?php } ?>
          </div>
        </div>

        <div id="tab3" class="tab-content hidden">
          <button id="btnAgregarDescuento"  class="px-5 h-10 mb-5 bg-gray-800 text-white font-semibold border border-black rounded-lg shadow-md hover:bg-gray-900 hover:text-white transition duration-300">Agregar Descuento</button>
          <div class="bg-white shadow-lg rounded-lg overflow-hidden">
              <div class="bg-gray-800 text-white px-4 py-4">
                  <h4 class="text-lg font-semibold">Lista de Descuentos</h4>
              </div>
              <div>
                  <table class="w-full border-collapse">
                      <thead class="bg-gray-900 text-white">
                          <tr>
                              <th class="py-3 px-2 text-left">Código de Descuento</th>
                              <th class="py-3 px-2 text-left">Descripción de Descuento</th>
                              <th class="py-3 px-2 text-left">Porcentaje de Descuento</th>
                              <th class="py-3 px-2 text-left">Activo</th>
                              <th sec:authorize="hasRole('ROLE_ADMIN')" class="py-3 px-2 text-center">Acciones</th>
                          </tr>
                      </thead>
                      <tbody class="divide-y divide-gray-300">
                          <tr class="hover:bg-gray-100 transition text-center" ><?php foreach ($Descuentos as $descuento): ?>
                                <td class="py-3 px-4"><?php echo $descuento['codigo_descuento']; ?></td>
                                <td class="py-3 px-4"><?php echo $descuento['descripcion_descuento']; ?></td>
                                <td class="py-3 px-4"><?php echo $descuento['porcentaje']; ?></td>
                                <td class="py-3 px-4 text-green-600 font-semibold"><?php echo $descuento['activo'] ? 'Activa' : 'Inactiva'; ?></td>
                                <td class="py-3 px-4 flex gap-2 justify-center">
                                    <form action="{{ url('/descuento/' . $descuento['id_descuento']) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                          <i class="fas fa-trash"></i> Eliminar
                                      </button>
                                    </form>
                                    <a href="#" class="bg-green-600 text-white px-3 py-1 rounded-md hover:bg-green-700 transition btnModificarProducto" data-id="<?php echo $descuento['id_descuento']; ?>" data-nombre="<?php echo $descuento['porcentaje']; ?>" data-descripcion="<?php echo $descuento['codigo_descuento']; ?>" data-cantidad="<?php echo $descuento['descripcion_descuento']; ?>" data-activo="<?php echo $descuento['activo']; ?>">
                                        <i class="fas fa-pencil"></i> Modificar
                                    </a>
                                </td>
                              </tr>
                              <?php endforeach; ?>
                      </tbody>
                  </table>
              </div>
              
              <?php echo empty($Productos); if(empty($Productos)){?>
                <div class="text-center p-4 text-gray-600" th:if="${productos == null or productos.empty}">
                    <span>[[#{lista.vacia}]]</span>
                </div>
              <?php } ?>
          </div>
        </div>
      </div>
      <!-- Fin Contenido de las pestañas -->
  </div>
</div>

<!--Pestaña Modal para Agregar Producto-->
<div id="modalAgregarProducto" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-1/2">
        <div class="flex justify-between items-center bg-gray-800 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Agregar Envíos</h3>
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
                    <label for="descripcion" class="block text-gray-700">Descripción</label>
                    <textarea id="descripcion" name="descripcion" class="w-full px-3 py-2 border rounded-lg"></textarea>
                </div>
                <div class="mb-4">
                    <label for="cantidad" class="block text-gray-700">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="precio_costo" class="block text-gray-700">Precio de Costo</label>
                    <input type="number" id="precio_costo" name="precio_costo" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="precio_venta" class="block text-gray-700">Precio de Venta</label>
                    <input type="number" id="precio_venta" name="precio_venta" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="precio_por_mayor" class="block text-gray-700">Precio por Mayor</label>
                    <input type="number" id="precio_por_mayor" name="precio_por_mayor" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="activo" class="block text-gray-700">Estado</label>
                    <select id="activo" name="activo" class="w-full px-3 py-2 border rounded-lg">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="imagen" class="block text-gray-700">Imagen</label>
                    <input type="file" id="imagen" name="imagen" class="w-full px-3 py-2 border rounded-lg">
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
<div id="modalModificarProducto" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-1/2">
        <div class="flex justify-between items-center bg-gray-800 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Modificar Producto</h3>
            <button id="closeModalModificar" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form id="formModificarProducto">
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
                    <label for="imagen_mod" class="block text-gray-700">Imagen</label>
                    <input type="file" id="imagen_mod" name="imagen" class="w-full px-3 py-2 border rounded-lg">
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
  // scripts.js
  document.querySelector('.relative .btn-opciones').addEventListener('click', function() {
  this.nextElementSibling.classList.toggle('hidden');
  });

  document.querySelectorAll('.sidebar li').forEach(item => {
  item.addEventListener('click', function() {
      document.getElementById('sidebar').classList.toggle('sidebar-expanded');
      document.getElementById('sidebar').classList.toggle('sidebar-collapsed');
      document.getElementById('logout').classList.toggle('hidden');
      document.getElementById('logout-hidden').classList.toggle('hidden');
      document.querySelectorAll('.sidebar span').forEach(span => {
      span.classList.toggle('hidden');
      });
  });
  });

  document.getElementById('inventario-menu').addEventListener('click', function() {
  document.getElementById('inventario-submenu').classList.toggle('sidebar-dropdown-active');
  });

  // Lógica para cambiar entre pestañas
  document.querySelectorAll(".tab-link").forEach((tab) => {
      tab.addEventListener("click", function () {
          document.querySelectorAll(".tab-content").forEach((content) => content.classList.add("hidden"));
          document.getElementById(this.dataset.tab).classList.remove("hidden");

          document.querySelectorAll(".tab-link").forEach((t) => t.classList.remove("border-black", "text-black"));
          this.classList.add("border-black", "text-black");
      });
  });

  //Ventana modal 
  document.getElementById('btnAgregarProducto').addEventListener('click', function() {
      document.getElementById('modalAgregarProducto').classList.remove('hidden');
  });

  document.getElementById('closeModal').addEventListener('click', function() {
      document.getElementById('modalAgregarProducto').classList.add('hidden');
  });

  document.getElementById('cancelarModal').addEventListener('click', function() {
      document.getElementById('modalAgregarProducto').classList.add('hidden');
  });
//
  document.getElementById('btnAgregarCategoria').addEventListener('click', function() {
      document.getElementById('modalAgregarCategoria').classList.remove('hidden');
  });

  document.getElementById('closeModal').addEventListener('click', function() {
      document.getElementById('modalAgregarCategoria').classList.add('hidden');
  });

  document.getElementById('cancelarModal').addEventListener('click', function() {
      document.getElementById('modalAgregarCategoria').classList.add('hidden');
  });
//
  document.getElementById('btnAgregarDescuento').addEventListener('click', function() {
      document.getElementById('modalAgregarDescuento').classList.remove('hidden');
  });

  document.getElementById('closeModal').addEventListener('click', function() {
      document.getElementById('modalAgregarDescuento').classList.add('hidden');
  });

  document.getElementById('cancelarModal').addEventListener('click', function() {
      document.getElementById('modalAgregarDescuento').classList.add('hidden');
  });

document.querySelectorAll('.btnModificarProducto').forEach(button => {
  button.addEventListener('click', function() {
      document.getElementById('id_producto').value = this.dataset.id;
      document.getElementById('nombre_producto_mod').value = this.dataset.nombre;
      document.getElementById('descripcion_mod').value = this.dataset.descripcion;
      document.getElementById('cantidad_mod').value = this.dataset.cantidad;
      document.getElementById('precio_costo_mod').value = this.dataset.precioCosto;
      document.getElementById('precio_venta_mod').value = this.dataset.precioVenta;
      document.getElementById('precio_por_mayor_mod').value = this.dataset.precioMayor;
      document.getElementById('activo_mod').value = this.dataset.activo;
      // Aquí puedes agregar lógica para mostrar la imagen actual si es necesario
      document.getElementById('modalModificarProducto').classList.remove('hidden');
  });
});

document.getElementById('closeModalModificar').addEventListener('click', function() {
  document.getElementById('modalModificarProducto').classList.add('hidden');
});

document.getElementById('cancelarModalModificar').addEventListener('click', function() {
  document.getElementById('modalModificarProducto').classList.add('hidden');
});

document.getElementById('formModificarProducto').addEventListener('submit', function(event) {
  event.preventDefault();
  // Aquí puedes agregar la lógica para enviar el formulario
  document.getElementById('modalModificarProducto').classList.add('hidden');
});

</script>

</body>
</html>