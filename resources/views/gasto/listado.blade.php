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
                    Gastos
                </button>
                <button class="tab-link w-1/2 py-3 text-gray-600 font-semibold hover:text-black focus:text-black border-b-2 border-transparent focus:border-purple-500" data-tab="tab2">
                    Categorias
                </button>
            </div>          
        </div>
        <!-- Fin Navegación de pestañas -->

        <div id="tab1" class="tab-content">
            <button id="btnAgregarGasto" class="px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-purple rounded-md shadow-md hover:bg-purple-900 hover:text-white transition duration-300">
                <i class="fa-solid fa-plus mr-2"></i>Agregar Gasto
            </button>
            <div class=" text-white px-2 py-2">
                <h4 class="text-lg font-semibold text-gray-800">Lista de Gastos</h4>                
            </div>    

            <div class="bg-white shadow-lg rounded-lg">          
                <div class="overflow-x-auto">
                  @if(count($Gastos) === 0)
                  <div class="text-center p-4 text-gray-600" th:if="${Gastos == null or Gastos.empty}">
                      <span>Lista Vacía</span>
                  </div>
                  @else
                  <div class="bg-white shadow rounded-lg">
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-200">
                                    <tr>
                                    <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Fecha</th>
                                    <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Descripción</th>
                                    <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Categoria</th>
                                    <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Total</th>
                                    <th class="py-3 px-2 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300">
                            <tr class="hover:bg-gray-100 text-center transition" ><?php foreach ($Gastos as $gasto): ?>
                                    <td class="py-3 px-2 text-center">{{  \Carbon\Carbon::parse($gasto->fecha_gasto)->format('d/m/Y') }}</td>
                                    <td class="py-3 px-2 text-center"><?php echo $gasto['descripcion_gasto']; ?></td>
                                    <td class="py-3 px-2 text-center"> {{ $gasto->categoriagasto->descripcion_categoria_gasto ?? 'Sin Categoria'}} </td>
                                    <td class="py-3 px-2 text-center">₡<?php echo $gasto['monto_gasto']; ?></td>
                                    <td class="py-3 px-4 flex gap-2 justify-center">
                                        <button id="btnModificarGasto" class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-700 transition" data-id="<?php echo $gasto['id_gasto']; ?>" data-fecha="{{  \Carbon\Carbon::parse($gasto->fecha_gasto)->format('Y-m-d') }}" data-descripcion="<?php echo $gasto['descripcion_gasto']; ?>" data-categoria="<?php echo $gasto['id_categoria_gasto']; ?>" data-monto="<?php echo $gasto['monto_gasto']; ?>">
                                            <i class="fas fa-pencil"></i>
                                        </button>
                                        <form action="{{ url('/gastos/eliminar/' . $gasto['id_gasto']) }}" method="post">
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

                                </tr><?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                  </div>
                  @endif
                </div>
            </div>

        </div>

        <div id="tab2" class="tab-content hidden">
            <button id="btnAgregarCategoriaG" class="px-5 h-10 mb-5 bg-purple-500 text-white font-semibold border border-purple rounded-md shadow-md hover:bg-purple-900 hover:text-white transition duration-300"><i class="fa-solid fa-plus mr-2"></i>Agregar Categoria</button>
            <div class=" text-white px-2 py-2">
                    <h4 class="text-lg font-semibold text-gray-800">Lista de Categorias</h4>                
            </div>    
            <div class="bg-white shadow-lg rounded-lg">          
                <div class="overflow-x-auto">
                    @if(count($Categorias) === 0)
                    <div class="text-center p-4 text-gray-600" th:if="${Categorias == null or Categorias.empty}">
                        <span>Lista Vacía</span>
                    </div>
                    @else
                    <div class="bg-white shadow rounded-lg">
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto">
                            <thead class="bg-gray-100">
                                    <tr>
                                    <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Nombre</th>
                                    <th class="px-2 py-3 text-center text-sm font-medium text-gray-700">Estado</th>
                                    <th class="py-3 px-2 text-center">Acciones</th>
                                    </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300">
                                <?php foreach ($Categorias as $categoria):?>
                                <tr class="hover:bg-gray-100 text-center transition">
                                    <td class="py-3 px-2 text-center"><?php echo $categoria['descripcion_categoria_gasto']; ?></td>
                                    <td class="py-3 px-2 text-center text-green-600 font-semibold"> <span class="px-2 py-1 text-xs rounded-full <?php echo $categoria['fk_id_estado'] == 1 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600'; ?>"><?php echo $categoria['fk_id_estado'] == 1 ? 'Activa' : 'Inactiva'; ?></span></td>
                                    <td class="py-3 px-4 flex gap-2 justify-center">
                                        <a href="#" class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-700 transition btnModificarProducto" data-id="<?php echo $categoria['id_categoria_gasto']; ?>" data-nombre="<?php echo $categoria['descripcion_categoria_gastos']; ?>">
                                            <i class="fas fa-pencil"></i>
                                        </a>
                                        <form action="{{ url('/categoria/gasto/eliminar/' . $categoria['id_categoria_gasto']) }}" method="post">
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

<!--Pestaña Modal para Agregar Gasto-->
<div id="modalAgregarGasto" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow w-3/4 h-auto overflow-y-auto">
        <div class="flex justify-between items-center bg-gray-500 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Agregar Gasto</h3>
            <button id="closeModalGasto" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form action="{{ route('gastos-crear') }}" method="post" enctype="multipart/form-data" id="formAgregarGasto">
                @csrf 
                <div class="mb-4">
                    <label for="fecha" class="block text-gray-700">Fecha</label>
                    <input type="date" id="fecha_gasto" name="fecha_gasto" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-700">Descripción</label>
                    <textarea id="descripcion_gasto" name="descripcion_gasto" class="w-full px-3 py-2 border rounded-lg"></textarea>
                </div>
                <div class="mb-4">
                    <label for="cantidad" class="block text-gray-700">Categoria</label>
                    <select name="fk_id_categoria_gasto" id="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" aria-labelledby="rolHelpBlock">
                        <option value="" selected disabled>Seleccione:</option>
                        @foreach ($Categorias as $categoria)
                            <option value="{{$categoria->id_categoria_gasto}}">{{$categoria->descripcion_categoria_gasto}}</option>
                        @endforeach
                    </select>                
                </div>
                <div class="mb-4">
                    <label for="monto" class="block text-gray-700">Monto</label>
                    <input type="number" id="monto_gasto" name="monto_gasto" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelarModalGasto" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Pestaña Modal para Agregar Gasto-->

<!-- Pestaña Modal para modificar Gasto -->
<div id="modalModificarGasto" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-1/2">
        <div class="flex justify-between items-center bg-green-600 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Modificar Gasto</h3>
            <button id="closeModalModificar" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form id="formModificarGasto" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="id_gasto" name="id_gasto">
                <div class="mb-4">
                    <label for="fecha_gasto_mod" class="block text-gray-700">Fecha</label>
                    <input type="date" id="fecha_gasto_mod" name="fecha_gasto" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label for="descripcion_gasto_mod" class="block text-gray-700">Descripción</label>
                    <textarea id="descripcion_gasto_mod" name="descripcion_gasto" class="w-full px-3 py-2 border rounded-lg"></textarea>
                </div>
                <div class="mb-4">
                    <label for="categoria_mod" class="block text-gray-700">Categoria</label>
                    <select name="fk_id_categoria_gasto" id="categoria_mod" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" aria-labelledby="rolHelpBlock">
                        <option value="id_categoria_mod" selected></option>
                        @foreach ($Categorias as $categoria)
                            <option value="{{$categoria->id_categoria_gasto}}">{{$categoria->descripcion_categoria_gasto}}</option>
                        @endforeach
                    </select>  
                </div>
                <div class="mb-4">
                    <label for="monto_gasto_mod" class="block text-gray-700">Monto</label>
                    <input type="number" id="monto_gasto_mod" name="monto_gasto" class="w-full px-3 py-2 border rounded-lg">
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelarModalModificar" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Pestaña Modal para modificar Gasto -->

<!--Pestaña Modal para Agregar Categoria-->
<div id="modalAgregarCategoriaG" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow w-3/4 h-auto overflow-y-auto">
        <div class="flex justify-between items-center bg-gray-500 text-white px-4 py-2 rounded-t-lg">
            <h3 class="text-lg font-semibold">Agregar Categoria</h3>
            <button id="closeModalCategoriaG" class="text-white">&times;</button>
        </div>
        <div class="p-6">
            <form action="{{ url('/categoria/gasto/agregar') }}" method="post" enctype="multipart/form-data" id="formAgregarGasto">
                @csrf 
                <div class="mb-4">
                    <label for="descripcion_categoria_gasto" class="block text-gray-700">Nombre</label>
                    <input type="text" id="descripcion_categoria_gasto" name="descripcion_categoria_gasto" class="w-full px-3 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="fk_id_estado" class="block text-gray-700">Estado</label>
                    <select id="fk_id_estado" name="fk_id_estado" class="w-full px-3 py-2 border rounded-lg">
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelarModalCategoriaG" class="px-4 py-2 bg-gray-600 text-white rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Pestaña Modal para Agregar Categoria-->

<script>
    //// Ventana modal Gasto
    document.getElementById('btnAgregarGasto').addEventListener('click', function() {
        document.getElementById('modalAgregarGasto').classList.remove('hidden');
    });

    document.getElementById('btnAgregarCategoriaG').addEventListener('click', function() {
        document.getElementById('modalAgregarCategoriaG').classList.remove('hidden');
    });

    document.getElementById('btnModificarGasto').addEventListener('click', function() {
        console.log(this.dataset.fecha);
        document.getElementById('id_gasto').value = this.dataset.id;
          document.getElementById('fecha_gasto_mod').value = this.dataset.fecha;
          document.getElementById('descripcion_gasto_mod').value = this.dataset.descripcion;
          document.getElementById('monto_gasto_mod').value = this.dataset.monto;
          document.getElementById('id_categoria_mod').value = this.dataset.monto;

        document.getElementById('modalModificarGasto').classList.remove('hidden');
    });

    // Modificar Gasto
    document.getElementById('closeModalModificar').addEventListener('click', function() {
      document.getElementById('modalModificarGasto').classList.add('hidden');
    });
    
    document.getElementById('cancelarModalModificar').addEventListener('click', function() {
      document.getElementById('modalModificarGasto').classList.add('hidden');
    });


    document.getElementById('closeModalGasto').addEventListener('click', function() {
      document.getElementById('modalAgregarGasto').classList.add('hidden');
    });

    document.getElementById('cancelarModalGasto').addEventListener('click', function() {
      document.getElementById('modalAgregarGasto').classList.add('hidden');
    });

    document.getElementById('closeModalCategoriaG').addEventListener('click', function() {
      document.getElementById('modalAgregarCategoriaG').classList.add('hidden');
    });

    document.getElementById('cancelarModalCategoriaG').addEventListener('click', function() {
      document.getElementById('modalAgregarCategoriaG').classList.add('hidden');
    });

</script>
@endsection
