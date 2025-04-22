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
    <div class="bg-white rounded-lg shadow-lg w-3/4 h-3/4 overflow-y-auto">
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
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg" required>
                </div>


                <div class="mb-4">
                    <label for="imagen" class="block text-gray-700">Imagen del Usuario</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="imagen" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18M3 12h18m-6 4v4m0-4v-4"></path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click para subir imagen</span> o arrastra aquí</p>
                                <p class="text-xs text-gray-500">PNG, JPG, JPEG (máx. 5MB)</p>
                            </div>
                            <input id="imagen" name="imagen" type="file" class="hidden" accept="image/*" onchange="previewImage(event)">
                        </label>
                    </div>
                    <div class="mt-4">
                        <img id="preview" class="hidden w-32 h-32 object-cover rounded-full shadow-md" alt="Previsualización de la imagen">
                    </div>
                </div>
                <!---Roles---->
                <div class="row mb-4">
                    <label for="role" class="col-lg-2 col-form-label">Rol:</label>
                    <div class="col-lg-4">
                        <select name="role" id="role" class="peer block w-full appearance-none rounded-LG border border-gray-300 bg-white px-4 py-2 pr-10 text-sm text-gray-700 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" aria-labelledby="rolHelpBlock">
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
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }   
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
