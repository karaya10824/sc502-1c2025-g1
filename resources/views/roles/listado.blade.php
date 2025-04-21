@extends('layouts.dashboard')

@section('title', 'Inventario')

@section('principal')
<!-- Contenido Principal -->
<div class="flex-1">
  <div class="container mx-auto">
      <!-- Contenido de las pestañas -->
        <div class="p-6">
            <button id="btnAgregarRol" class="px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-purple rounded-md shadow-md hover:bg-purple-900 hover:text-white transition duration-300"><i class="fa-solid fa-plus mr-2"></i>Agregar Rol</button>
            <div class="text-white px-2 py-2">
                <h4 class="text-lg font-semibold text-gray-800">Lista de Roles</h4>                
            </div>           
            @if(count($Roles) === 0)
            <div class="text-center p-4 text-gray-600" th:if="${Roles == null or Roles.empty}">
                <span>Lista Vacía</span>
            </div>
            @else
            <div class="bg-white shadow rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Role</th>
                            <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                        <?php foreach ($Roles as $rol): ?>
                        <tr class="hover:bg-purple-100 transition text-center">
                            <td class="py-3 px-2 text-center"><?php echo $rol['name']; ?></td>
                            <td class="py-3 px-4 flex gap-2 justify-center">
                                <button class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-700 transition btnModificarRol" data-id="<?php echo $rol['id']; ?>" data-nombre="<?php echo $rol['name']; ?>" data-permisos="{{ $rol->permissions->pluck('id') }}">
                                    <i class="fas fa-pencil"></i>
                                </button>
                                <form action="{{ url('/roles/eliminar/' . $rol['id']) }}" method="post">
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
      <!-- Fin Contenido de las pestañas -->
  </div>
</div>

<!--Pestaña Modal para Agregar Rol-->
<div id="modalAgregarRol" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-3/4 h-3/4 overflow-y-auto">
        <div class="flex justify-between items-center bg-gray-800 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Agregar Rol</h3>
            <button id="closeModalR" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form action="{{ url('/roles/agregar') }}" method="post" enctype="multipart/form-data" id="formAgregarRol">
                @csrf
                <div class="mb-4">
                    <label for="nombre_producto" class="block text-gray-700">Nombre del Rol</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-lg" required>
                </div>

                <div class="flex justify-end">
                    <button type="button" id="cancelarModalR" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-lg">Agregar</button>
                </div>

                <!---Permisos---->
                <div class="p-6 col-12">
                    <p class="text-muted">Permisos para el rol:</p>
                    @foreach ($Permisos as $item)
                    <div class="form-check mb-2">
                        <input type="checkbox" name="permission[]" id="{{$item->id}}" class="form-check-input" value="{{$item->id}}">
                        <label for="{{$item->id}}" class="form-check-label">{{$item->name}}</label>
                    </div>
                    @endforeach
                </div>
                @error('permission')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror
            </form>
        </div>
    </div>
</div>
<!-- Fin Pestaña Modal para Agregar Rol-->

<!-- Pestaña Modal para modificar Rol -->
<div id="modalModificarRol" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-3/4 h-3/4 overflow-y-auto">
        <div class="flex justify-between items-center bg-green-600 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Modificar Rol</h3>
            <button id="closeModalModificar" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form action="{{ url('/roles/modificar/' . $rol['id']) }}" method="post" enctype="multipart/form-data" id="formModificarRol">
                @csrf
                @method('PUT')
                <input type="hidden" id="id" name="id">

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nombre del Rol</label>
                    <input type="text" id="edit_name" name="name" class="w-full px-3 py-2 border rounded-lg" required>
                </div>

                <!-- Permisos -->
                <div class="p-6 col-12">
                    <p class="text-muted">Permisos para el rol:</p>
                    @foreach ($Permisos as $permiso)
                    <div class="form-check mb-2">
                        <input type="checkbox" name="permission[]" id="edit_permission_{{ $permiso->id }}" class="form-check-input edit-permission" value="{{ $permiso->id }}">
                        <label for="edit_permission_{{ $item->id }}" class="form-check-label">{{ $permiso->name }}</label>
                    </div>
                    @endforeach
                </div>

                <div class="flex justify-end">
                    <button type="button" id="cancelarModalRol" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-lg">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Pestaña Modal para modificar Rol -->


<script>
    //// Ventana modal Rol
    document.getElementById('btnAgregarRol').addEventListener('click', function() {
        document.getElementById('modalAgregarRol').classList.remove('hidden');
    });


    //BOTONES PARA CERRAR
    document.getElementById('closeModalR').addEventListener('click', function() {
      document.getElementById('modalAgregarRol').classList.add('hidden');
    });

    document.getElementById('cancelarModalR').addEventListener('click', function() {
      document.getElementById('modalAgregarRol').classList.add('hidden');
    });

    //Botones para modulo de modificar
    document.getElementById('closeModalRol').addEventListener('click', function() {
      document.getElementById('modalModificarRol').classList.add('hidden');
    });

    document.getElementById('cancelarModalRol').addEventListener('click', function() {
      document.getElementById('modalModificarRol').classList.add('hidden');
    });

    //Ventana modal Modificar Rol


    document.getElementById("formModificarProducto").addEventListener("submit", function(event) {
          event.preventDefault(); // Evita el envío por defecto
          
          // Obtener el ID de la categoría desde el input
          const idProducto = document.getElementById("id_producto").value;

          if (!idProducto) {
              alert("El ID de la categoría es obligatorio.");
              return;
          }

          // Actualizar la URL del formulario dinámicamente
          this.action = `/producto/modificar/${idProducto}`;

          // Enviar el formulario manualmente
          this.submit();
    });
</script>
@endsection
