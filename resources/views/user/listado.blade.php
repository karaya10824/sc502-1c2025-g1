@extends('layouts.dashboard')

@section('title', 'Inventario')

@section('principal')
<!-- Contenido Principal -->
<div class="flex-1 ml-16 pt-16">
  <div class="container mx-auto p-4">
      <!-- Contenido de las pestañas -->
      <div class="p-6 ">
          <button id="btnAgregarUser" class="px-5 h-10 mb-5 bg-gray-800 text-white font-semibold border border-black rounded-lg shadow-md hover:bg-gray-900 hover:text-white transition duration-300">Agregar Usuario</button>
          <div class="bg-white shadow-lg rounded-lg overflow-hidden">
              <div class="bg-gray-800 text-white px-4 py-4">
                  <h4 class="text-lg font-semibold">Lista de Usuarios</h4>
              </div>              
              <div>
                @if(count($Usuarios) === 0)
                  <div class="text-center p-4 text-gray-600" th:if="${Usuarios == null or Usuarios.empty}">
                      <span>Lista Vacía</span>
                  </div>
                @else
                  <table class="border-collapse">
                        <thead class="bg-gray-900 text-white">
                            <tr>
                                <th class="py-3 px-2 text-center">Nombre</th>
                                <th class="py-3 px-2 text-center">Apellidos</th>
                                <th class="py-3 px-2 text-center">Correo Electrónico</th>
                                <th class="py-3 px-2 text-center">Rol</th>
                                <th class="py-3 px-2 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300">
                          <tr class="hover:bg-gray-100 transition text-center" >
                          @foreach ($Usuarios as $usuario)
                                <td class="py-3 px-4">{{$usuario->name}}</td>
                                <td class="py-3 px-4">{{$usuario->name}}</td>
                                <td class="py-3 px-4">{{$usuario->correo}}</td>
                                <td class="py-3 px-4">{{ $usuario->getRoleNames()->first() ?? 'Sin Rol' }}</td>

                                <td class="py-3 px-4 flex gap-2 justify-center">
                                    <form action="{{ url('/roles/eliminar/' . $usuario['id']) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                          <i class="fas fa-trash"></i> Eliminar
                                      </button>
                                    </form>
                                    <a href="#" class="bg-green-600 text-white px-3 py-1 rounded-md hover:bg-green-700 transition btnModificarRol">
                                        <i class="fas fa-pencil"></i> Modificar
                                    </a>
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


<!--Pestaña Modal para Agregar Rol-->
<div id="modalAgregarUser" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-1/2">
        <div class="flex justify-between items-center bg-gray-800 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Agregar Rol</h3>
            <button id="closeModal" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form action="{{ url('/usuarios/agregar') }}" method="post" enctype="multipart/form-data" id="formAgregarRol">
                @csrf
                <div class="mb-4">
                    <label for="nombre_producto" class="block text-gray-700">Nombre del Usuario</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="nombre_producto" class="block text-gray-700">Apellidos del Usuario</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="nombre_producto" class="block text-gray-700">Correo Electrónico</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="nombre_producto" class="block text-gray-700">Contraseña</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-lg" required>
                </div>

                <!---Roles---->
                <div class="row mb-4">
                    <label for="role" class="col-lg-2 col-form-label">Rol:</label>
                    <div class="col-lg-4">
                        <select name="role" id="role" class="form-select" aria-labelledby="rolHelpBlock">
                            <option value="" selected disabled>Seleccione:</option>
                            @foreach ($roles as $item)
                            <option value="{{$item->name}}" @selected(old('role')==$item->name)>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-text" id="rolHelpBlock">
                            Escoja un rol para el usuario.
                        </div>
                    </div>
                    <div class="col-lg-2">
                        @error('role')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="button" id="cancelarModal" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Agregar</button>
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
