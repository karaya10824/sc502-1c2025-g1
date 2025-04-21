@extends('layouts.dashboard')

@section('title', 'Inventario')

@section('principal')
<!-- Contenido Principal -->
<div class="flex-1">
    <div class="container mx-auto">
    <!-- Contenido de las pestañas -->
        <div class="p-6 ">
            <button id="btnAgregarUser" class="px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-purple rounded-md shadow-md hover:bg-purple-900 hover:text-white transition duration-300"><i class="fa-solid fa-plus mr-2"></i>Agregar Usuario</button>
            <div class="text-white px-2 py-2">
                <h4 class="text-lg font-semibold text-gray-800">Lista de Usuarios</h4>                
            </div>    
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">            
                @if(count($Usuarios) === 0)
                <div class="text-center p-4 text-gray-600" th:if="${Usuarios == null or Usuarios.empty}">
                    <span>Lista Vacía</span>
                </div>
                @else
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Nombre</th>
                            <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Apellidos</th>
                            <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Correo Electrónico</th>
                            <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Rol</th>
                            <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                        @foreach ($Usuarios as $usuario)
                        <tr class="hover:bg-purple-100 transition text-center" >
                            <td class="py-3 px-2 text-center">{{$usuario->nombre}}</td>
                            <td class="py-3 px-2 text-center">{{$usuario->apellidos}}</td>
                            <td class="py-3 px-2 text-center">{{$usuario->email}}</td>
                            <td class="py-3 px-2 text-center">{{$usuario->getRoleNames()->first() ?? 'Sin Rol' }}</td>

                            <td class="py-3 px-4 flex gap-2 justify-center">
                                <a class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-700 transition" data-id="{{$usuario->id}}" data-nombre="{{$usuario->nombre}}">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <form action="{{ url('/usuarios/eliminar/' . $usuario['id']) }}" method="post">
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
                        @endforeach    
                    </tbody>
                </table>
                @endif
            </div>              
        </div>    
    <!-- Fin Contenido de las pestañas -->
    </div>
</div>


<!--Pestaña Modal para Agregar Usuario-->
<div id="modalAgregarUser" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-1/2">
        <div class="flex justify-between items-center bg-gray-800 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Agregar Usuario</h3>
            <button id="closeModal" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form action="{{ url('/usuarios/agregar') }}" method="post" enctype="multipart/form-data" id="formAgregarRol">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700">Nombre del Usuario</label>
                    <input type="text" id="nombre" name="nombre" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="nombre_producto" class="block text-gray-700">Apellidos del Usuario</label>
                    <input type="text" id="apellidos" name="apellidos" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Correo Electrónico</label>
                    <input type="text" id="email" name="email" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="PASSWORD" class="block text-gray-700">Contraseña</label>
                    <input type="text" id="password" name="password" class="w-full px-3 py-2 border rounded-lg" required>
                </div>

                <!---Roles---->
                <div class="row mb-4">
                    <label for="role" class="col-lg-2 col-form-label">Rol:</label>
                    <div class="col-lg-4">
                        <select name="role" id="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" aria-labelledby="rolHelpBlock">
                            <option value="" selected disabled>Seleccione:</option>
                            @foreach ($roles as $item)
                                <option value="{{$item->name}}" @selected(old('role')==$item->name)>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2">
                        @error('role')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="button" id="cancelarModal" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-lg">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Pestaña Modal para Agregar Rol-->


<script>
    //// Ventana modal Rol
    document.getElementById('btnAgregarUser').addEventListener('click', function() {
        document.getElementById('modalAgregarUser').classList.remove('hidden');
    });

    document.querySelectorAll('.btnModificarUser').forEach(button => {
      button.addEventListener('click', function() {
          document.getElementById('id').value = this.dataset.id;
          document.getElementById('nameR').value = this.dataset.name;
          // Aquí puedes agregar lógica para mostrar la imagen actual si es necesario
          document.getElementById('modalModificarUser').classList.remove('hidden');
      });
    });


    //BOTONES PARA CERRAR
    document.getElementById('closeModal').addEventListener('click', function() {
      document.getElementById('modalAgregarUser').classList.add('hidden');
    });

    document.getElementById('cancelarModal').addEventListener('click', function() {
      document.getElementById('modalAgregarUser').classList.add('hidden');
    });

    //Botones para modulo de modificar
    document.getElementById('closeModalU').addEventListener('click', function() {
      document.getElementById('modalModificarUser').classList.add('hidden');
    });

    document.getElementById('cancelarModalU').addEventListener('click', function() {
      document.getElementById('modalModificarUser').classList.add('hidden');
    });
</script>
@endsection
