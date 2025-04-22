<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tech Lab - @yield('title')</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
<body>
  <div class="flex h-screen overflow-hidden">
    <!-- Mobile sidebar backdrop -->
    <div id="backdrop" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 transform -translate-x-full lg:translate-x-0 lg:static w-64 bg-white border-r z-40 transition-transform duration-300 ease-in-out">
      <div class="h-16 flex items-center justify-center border-b">
        <span class="text-primary font-bold text-xl">Tech Lab</span>
      </div>
      <nav class="flex-1 p-4 overflow-y-auto">
        <ul class="space-y-2 pb-2">
          <span class="font-bold">Administración</span>
          
          <li><a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-600 hover:bg-purple-100 rounded <?php  if ($active === "inicio"){ echo "bg-purple-100";} ?>"><i class="fa-solid fa-house ml-2"></i><span class="ml-2">Inicio</span></a></li>
          <li><a href="{{ route('pedidos-vista') }}" class="flex items-center p-2 text-gray-600 hover:bg-purple-100 rounded-lg <?php  if ($active === "pedido"){ echo "bg-purple-100";} ?>"><i class="fa-solid fa-bag-shopping ml-2"></i><span class="ml-2">Pedidos</span></a></li>
          <li class="disabled"><a href="#" class="flex items-center p-2 text-gray-200 rounded-lg <?php  if ($active === "envio"){ echo "bg-purple-100";} ?>"><i class="fa-solid fa-truck-fast ml-2"></i><span class="ml-2">Envios</span></a></li>
          <li><a href="{{ route('gastos-vista') }}" class="flex items-center p-2 text-gray-600 hover:bg-purple-100 rounded-lg <?php  if ($active === "gasto"){ echo "bg-purple-100";} ?>"><i class="fa-solid fa-receipt ml-2"></i><span class="ml-2">Gastos</span></a></li>
          <li><a href="{{ route('proveedor-vista') }}" class="flex items-center p-2 text-gray-600 hover:bg-purple-100 rounded-lg <?php  if ($active === "proveedor"){ echo "bg-purple-100 ";} ?>"><i class="fa-solid fa-address-book ml-2"></i><span class="ml-2">Proveedores</span></a></li>
          <li><a href="{{ route('productos-vista') }}" class="flex items-center p-2 text-gray-600 hover:bg-purple-100 rounded-lg <?php  if ($active === "inventario"){ echo "bg-purple-100";} ?>"><i class="fa-solid fa-warehouse ml-2"></i><span class="ml-2">Inventario</span></a></li>
          <li class="disabled"><a href="#" class="flex items-center p-2 text-gray-200 rounded-lg <?php  if ($active === "reporte"){ echo "bg-purple-100";} ?>"><i class="fa-solid fa-chart-simple ml-2"></i><span class="ml-2">Reportes</span></a></li>
          <li><a href="{{ route('perfil-vista') }}" class="flex items-center p-2 text-gray-600 hover:bg-purple-100 rounded-lg <?php  if ($active === "ajustes"){ echo "bg-purple-100";} ?>"><i class="fa-solid fa-gear ml-2"></i><span class="ml-2">Ajustes</span></a></li>
        </ul>
        <ul class="space-y-2 border-t pt-4 ">
          <span class="font-bold">Super Administración</span>
          <li><a href="{{ route('usuarios-vista') }}" class="flex items-center p-2 text-gray-700 hover:bg-purple-100 rounded <?php  if ($active === "usuario"){ echo "bg-purple-100";} ?>"><i class="fa-solid fa-user-plus"></i><span class="ml-2">Usuarios</span></a></li>
          <li><a href="{{ route('roles-vista') }}" class="flex items-center p-2 text-gray-700 hover:bg-purple-100 rounded <?php  if ($active === "rol"){ echo "bg-purple-100";} ?>"><i class="fa-solid fa-key"></i><span class="ml-2">Roles</span></a></li>
        </ul>
        <div class="mt-8 border-t pt-4">
          <ul class="space-y-2">
            <li><a href="#" class="flex items-center p-2 text-gray-500 hover:bg-gray-100 rounded"><span class="ml-2">Ayuda</span></a></li>
            <li><a href="/logout" class="flex items-center p-2 text-gray-500 hover:bg-gray-100 rounded"><i class="fa-solid fa-right-from-bracket"></i><span class="ml-2">Cerrar Sesión</span></a></li>
          </ul>
        </div>
      </nav>
    </aside>

    <!-- Navbar -->
    <header class="fixed w-full bg-white h-16 border-b flex items-center justify-between">
      <div class="flex items-center lg:hidden space-x-4">
        <button id="toggleSidebar" class="lg:hidden text-gray-600 focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>

      <div class="flex items-center space-x-4 absolute right-10">
        <a href="/"><button class="px-5 mx-1 h-10 bg-purple-500 text-white font-semibold border border-purple-500 rounded-md hover:bg-purple-800 hover:text-white transition duration-300">Visitar Página Web</button> </a>

        <button class="text-gray-500 hover:text-gray-700">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
        </button>
        <div class="relative">
          <button class="btn-opciones w-12 h-12">
            <img class="w-full h-full rounded-full" src="{{ Auth::user()->ruta_imagen ? asset('storage/' . Auth::user()->ruta_imagen) : asset('images/default-user.png') }}" alt="User avatar">
          </button>
          <div class="absolute right-0 mt-3 w-48 bg-white rounded-md shadow-lg py-2 hidden">
            <a href="{{ route('perfil-vista') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Perfil</a>
            <a href="/logout" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Cerrar Sesión</a>
          </div>
        </div>
      </div>
    </header>

    <!-- Main content -->
    <div class="flex-1 flex flex-col">
      <!-- Main content placeholder -->
      <main class="pt-16 overflow-y-auto h-full w-full bg-gray-100">
        @yield('principal')
        <!-- Aquí puedes añadir la tabla u otros contenidos -->
      </main>
    </div>
  </div>



  <script>
    const sidebar = document.getElementById('sidebar');
    const backdrop = document.getElementById('backdrop');
    const toggleBtn = document.getElementById('toggleSidebar');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
      backdrop.classList.toggle('hidden');
    });

    backdrop.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      backdrop.classList.add('hidden');
    });
  </script>
  <script src="https://kit.fontawesome.com/ec1d96e2ca.js" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
  <script>
      document.addEventListener("DOMContentLoaded", function () {
          const tabs = document.querySelectorAll(".tab-button");
          const rows = document.querySelectorAll(".order-row");

          tabs.forEach(tab => {
              tab.addEventListener("click", function () {
                  tabs.forEach(t => t.classList.remove("active-tab", "border-purple-500", "text-purple-600"));
                  this.classList.add("active-tab", "border-purple-500", "text-purple-600");

                  const filter = this.getAttribute("data-tab");

                  rows.forEach(row => {
                      if (filter === "all" || row.getAttribute("data-status") === filter) {
                          row.style.display = "";
                      } else {
                          row.style.display = "none";
                      }
                  });
              });
          });
      });
  </script>

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
        document.querySelectorAll('.sidebar a').forEach(span => {
        span.classList.toggle('hidden');
        });
    });
    });

    // Lógica para cambiar entre pestañas
    document.querySelectorAll(".tab-link").forEach((tab) => {
        tab.addEventListener("click", function () {
            document.querySelectorAll(".tab-content").forEach((content) => content.classList.add("hidden"));
            document.getElementById(this.dataset.tab).classList.remove("hidden");

            document.querySelectorAll(".tab-link").forEach((t) => t.classList.remove("border-purple-500", "text-black"));
            this.classList.add("border-purple-500", "text-black");
        });
    });

    //Ventana modal ROL
    document.querySelectorAll('.btnModificarRol').forEach(button => {
      button.addEventListener('click', function() {
        //          document.getElementById('precio_costo_mod').value = this.dataset.precioCosto;
        // Obtener datos del rol
        const rolId = this.getAttribute('data-id');
        const rolNombre = this.getAttribute('data-nombre');
        const permisos = JSON.parse(this.getAttribute('data-permisos'));
        console.log(permisos);

        // Llenar el formulario del modal
        document.getElementById('id').value = rolId;
        document.getElementById('edit_name').value = rolNombre;

        // Limpiar permisos seleccionados
        document.querySelectorAll('.edit-permission').forEach(checkbox => {
            checkbox.checked = false;
        });

        // Seleccionar los permisos asociados al rol
        permisos.forEach(id => {
            const checkbox = document.getElementById(`edit_permission_${id}`);
            if (checkbox) {
                checkbox.checked = true;
            }
        });

        // Mostrar el modal
        document.getElementById('modalModificarRol').classList.remove('hidden');
      });
    });

    //Ventana modal PRODUCTO
    document.getElementById('btnAgregarProducto').addEventListener('click', function() {
        document.getElementById('modalAgregarProducto').classList.remove('hidden');
    });

    //// Ventana modal CATEGORIA
    document.getElementById('btnAgregarCategoria').addEventListener('click', function() {
        document.getElementById('modalAgregarCategoria').classList.remove('hidden');
    });

    //// Ventana modal DESCUENTO
    document.getElementById('btnAgregarDescuento').addEventListener('click', function() {
        document.getElementById('modalAgregarDescuento').classList.remove('hidden');
    });
    
    //Botones para modulo de agregar
    document.getElementById('closeModal').addEventListener('click', function() {
      document.getElementById('modalAgregarProducto').classList.add('hidden');
    });

    document.getElementById('closeModalC').addEventListener('click', function() {
      document.getElementById('modalAgregarCategoria').classList.add('hidden');
    });

    document.getElementById('closeModalD').addEventListener('click', function() {
      document.getElementById('modalAgregarDescuento').classList.add('hidden');
    });

    document.getElementById('cancelarModal').addEventListener('click', function() {
      document.getElementById('modalAgregarProducto').classList.add('hidden');
    });
    document.getElementById('cancelarModalC').addEventListener('click', function() {
      document.getElementById('modalAgregarCategoria').classList.add('hidden');
    });
    document.getElementById('cancelarModalD').addEventListener('click', function() {
      document.getElementById('modalAgregarDescuento').classList.add('hidden');
    });

  </script>

</body>

</html>