<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tech Lab - @yield('title')</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">

  <style>
    .sidebar {
      transition: width 0.3s;
    }
    .sidebar-collapsed {
      width: 4rem;
    }
    .sidebar-expanded {
      width: 16rem;
    }
    .sidebar-dropdown {
      display: none;
    }
    .sidebar-dropdown-active {∂
      display: block;
    }
  </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="bg-white p-4 fixed h-16 w-full z-5 top-0 border-b border-gray-300 pb-4">
      <div class="container mx-auto flex justify-between items-center">
        <div class="text-black text-lg font-semibold">Tech Lab</div>
        <div class="relative">
          <a href="/"><button class="px-5 mx-5 h-10 bg-gray-800 text-white font-semibold border border-black rounded-lg shadow-md hover:bg-gray-900 hover:text-white transition duration-300">Visitar Página Web</button> </a>
            <button class="btn-opciones text-black focus:outline-none">
            Opciones
            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </button>
          <div class="absolute right-0 mt-3 w-48 bg-white rounded-md shadow-lg py-2 hidden">
            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Perfil</a>
            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Configuración</a>
            <a href="/logout" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Cerrar Sesión</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Fin Navbar -->

    <!-- Sidebar -->
    <div class="flex ">
      <div id="sidebar" class="sidebar sidebar-collapsed bg-white h-screen pt-20 border-r border-gray-300 pb-4 fixed">
        <ul class="text-black">
          <span class="ml-4 font-semibold">Administración</span>
          <li class="flex items-center p-4 hover:bg-gray-200 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
            <a href="{{ route('dashboard') }}" class="ml-4 hidden">Inicio</a>
          </li>
          <li class="flex items-center p-4 hover:bg-gray-200 cursor-pointer">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <a href="{{ route('pedidos-vista') }}" class="ml-4 hidden">Pedidos</a>
          </li>
          <li class="flex items-center p-4 hover:bg-gray-200 cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" /></svg>
            <a href="{{ route('pedidos-vista') }}" class="ml-4 hidden">Envíos</a>
          </li>
          <li class="flex items-center p-4 hover:bg-gray-200 cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V13.5Zm0 2.25h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V18Zm2.498-6.75h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V13.5Zm0 2.25h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V18Zm2.504-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V18Zm2.498-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5ZM8.25 6h7.5v2.25h-7.5V6ZM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 0 0 2.25 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0 0 12 2.25Z" /> </svg>
            <a href="{{ route('gastos-vista') }}" class="ml-4 hidden">Gastos</a>
          </li>
          <li class="flex items-center p-4 hover:bg-gray-200 cursor-pointer" id="inventario-menu">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" /> </svg>
            <a href="{{ route('productos-vista') }}" class="ml-4 hidden">Inventario</a>
          </li>
          <li class="flex items-center p-4 hover:bg-gray-200 cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" /> <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" /> </svg>
            <a href="{{ url('/envios') }}" class="ml-4 hidden">Reportes</a>
          </li>
          <li class="flex items-center p-4 hover:bg-gray-200 cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
            <a href="{{ route('perfil-ajustes') }}" class="ml-4 hidden">Ajustes</a>
          </li>

          <li class="flex flex-column align-center p-4 hover:bg-gray-200 cursor-pointer">
              <button id="logout-hidden" class="w-3/4 h-10 mb-5 bg-gray-800 text-white font-semibold border border-black rounded-lg shadow-md hover:bg-gray-900 hover:text-white transition duration-300 hidden">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" /></svg>Cerrar Sesión
                </button>

              <a href="index.php"><button id="logout" class="h-10 mb-4 bg-gray-800 text-white font-semibold border border-black rounded-lg shadow-md hover:bg-gray-900 hover:text-white transition duration-300"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" /> </svg></button> </a>
          </li>
        </ul>

        <ul class="text-black">
          <span class="ml-4 font-semibold">Super Administración</span>
          <li class="flex items-center p-4 hover:bg-gray-200 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
            <a href="{{ url('/usuarios') }}" class="ml-4 hidden">Usuarios</a>
          </li>
          <li class="flex items-center p-4 hover:bg-gray-200 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
            <a href="{{ url('/roles') }}" class="ml-4 hidden">Roles</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Fin Sidebar -->

  @yield('principal')

  <!-- SCRIPT PARA TABLA PEDIDOS-->
   <!-- End of <body> -->
   <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
  <script>
      document.addEventListener("DOMContentLoaded", function () {
          const tabs = document.querySelectorAll(".tab-button");
          const rows = document.querySelectorAll(".order-row");

          tabs.forEach(tab => {
              tab.addEventListener("click", function () {
                  tabs.forEach(t => t.classList.remove("active-tab", "border-blue-600", "text-blue-600"));
                  this.classList.add("active-tab", "border-blue-600", "text-blue-600");

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

            document.querySelectorAll(".tab-link").forEach((t) => t.classList.remove("border-black", "text-black"));
            this.classList.add("border-black", "text-black");
        });
    });

    //Ventana modal PRODUCTO
    document.getElementById('btnAgregarProducto').addEventListener('click', function() {
        document.getElementById('modalAgregarProducto').classList.remove('hidden');
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

    //// Ventana modal CATEGORIA
    document.getElementById('btnAgregarCategoria').addEventListener('click', function() {
        document.getElementById('modalAgregarCategoria').classList.remove('hidden');
    });

    document.querySelectorAll('.btnModificarCategoria').forEach(button => {
      button.addEventListener('click', function() {
          document.getElementById('id_categoria').value = this.dataset.id;
          document.getElementById('nombre_categoria_mod').value = this.dataset.nombre;
          document.getElementById('descripcion_categoria_mod').value = this.dataset.descripcion;
          document.getElementById('activo_mod').value = this.dataset.activo;
          // Aquí puedes agregar lógica para mostrar la imagen actual si es necesario
          document.getElementById('modalModificarCategoria').classList.remove('hidden');
      });
    });

    document.getElementById("formModificarCategoria").addEventListener("submit", function(event) {
          event.preventDefault(); // Evita el envío por defecto
          
          // Obtener el ID de la categoría desde el input
          const idCategoria = document.getElementById("id_categoria").value;

          if (!idCategoria) {
              alert("El ID de la categoría es obligatorio.");
              return;
          }

          // Actualizar la URL del formulario dinámicamente
          this.action = `/categoria/modificar/${idCategoria}`;

          // Enviar el formulario manualmente
          this.submit();
      });

    //// Ventana modal DESCUENTO
    document.getElementById('btnAgregarDescuento').addEventListener('click', function() {
        document.getElementById('modalAgregarDescuento').classList.remove('hidden');
    });

    document.querySelectorAll('.btnModificarDescuento').forEach(button => {
      button.addEventListener('click', function() {
          document.getElementById('id_descuento').value = this.dataset.id;
          document.getElementById('codigo_descuento_mod').value = this.dataset.codigo;
          document.getElementById('porcentaje_mod').value = this.dataset.porcentaje;
          document.getElementById('descripcion_descuento_mod').value = this.dataset.descripcion;
          document.getElementById('activo_mod').value = this.dataset.activo;
          // Aquí puedes agregar lógica para mostrar la imagen actual si es necesario
          document.getElementById('modalModificarDescuento').classList.remove('hidden');
      });
    });

    document.getElementById("formModificarDescuento").addEventListener("submit", function(event) {
          event.preventDefault(); // Evita el envío por defecto
          
          // Obtener el ID de la categoría desde el input
          const idDescuento = document.getElementById("id_descuento").value;

          if (!idDescuento) {
              alert("El ID de la categoría es obligatorio.");
              return;
          }

          // Actualizar la URL del formulario dinámicamente
          this.action = `/descuento/modificar/${idDescuento}`;

          // Enviar el formulario manualmente
          this.submit();
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

    //Botones para modulo de modificar
    document.getElementById('closeModalModificar').addEventListener('click', function() {
      document.getElementById('modalModificarProducto').classList.add('hidden');
    });
    document.getElementById('closeModalModificarC').addEventListener('click', function() {
      document.getElementById('modalModificarCategoria').classList.add('hidden');
    });
    document.getElementById('closeModalModificarD').addEventListener('click', function() {
      document.getElementById('modalModificarDescuento').classList.add('hidden');
    });

    document.getElementById('cancelarModalModificar').addEventListener('click', function() {
      document.getElementById('modalModificarProducto').classList.add('hidden');
    });
    document.getElementById('cancelarModalModificarC').addEventListener('click', function() {
      document.getElementById('modalModificarCategoria').classList.add('hidden');
    });
    document.getElementById('cancelarModalModificarD').addEventListener('click', function() {
      document.getElementById('modalModificarDescuento').classList.add('hidden');
    });

  </script>

</body>

</html>