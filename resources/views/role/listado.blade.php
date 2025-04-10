@extends('layouts.dashboard')

@section('title', 'Inventario')

@section('principal')
<!-- Contenido Principal -->
<div class="flex-1 ml-16 pt-16">
  <div class="container mx-auto p-4">
      <!-- Contenido de las pestañas -->
      <div class="p-6">
          <button id="btnAgregarRol" class="px-5 h-10 mb-5 bg-gray-800 text-white font-semibold border border-black rounded-lg shadow-md hover:bg-gray-900 hover:text-white transition duration-300">Agregar Roles</button>
          <div class="container bg-white shadow-lg rounded-lg overflow-hidden">
              <div class="bg-gray-800 text-white px-4 py-4">
                  <h4 class="text-lg font-semibold">Lista de Roles</h4>
              </div>              
              <div class="w-auto">
                @if(count($Roles) === 0)
                  <div class="text-center p-4 text-gray-600" th:if="${Roles == null or Roles.empty}">
                      <span>Lista Vacía</span>
                  </div>
                @else
                  <table class="border-collapse">
                        <thead class="bg-gray-900 text-white">
                            <tr>
                                <th class="py-3 px-2 text-center">Role</th>
                                <th class="py-3 px-2 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300">
                          <tr class="hover:bg-gray-100 transition text-center" ><?php foreach ($Roles as $rol): ?>
                                <td class="py-3 px-4"><?php echo $rol['name']; ?></td>
                                <td class="py-3 px-4 flex gap-2 justify-center">
                                    <form action="{{ url('/roles/eliminar/' . $rol['id']) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                          <i class="fas fa-trash"></i> Eliminar
                                      </button>
                                    </form>
                                    <form action="{{ url('/roles/modificar/' . $rol->id) }}" method="get">
                                      <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                          <i class="fas fa-pencil"></i> Editar
                                      </button>
                                    </form>
                                </td>
                              </tr>
                              <?php endforeach; ?>
                      </tbody>
                  </table>
                  @endif
              </div>
          </div>

      <!-- Fin Contenido de las pestañas -->
  </div>
</div>


<!--Pestaña Modal para Agregar Rol-->
<div id="modalAgregarRol" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-1/2">
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
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Agregar</button>
                </div>
            </form>
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

    </div>
</div>
<!-- Fin Pestaña Modal para Agregar Rol-->


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
</script>
@endsection
