<?php

//Controladores requeridos
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\MiPerfilController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DescuentoController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;

/*
    RUTAS GENERALES
*/
//Ruta de Index - Inicio Dashboard
Route::get('/', [IndexController::class, 'index']);

//Ruta de Control de Sesiones
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', function () {return view('register');});

/*
    RUTAS DASHBOARD
*/
Route::middleware(['auth'])->group( function() {
    //Ruta de Index - Inicio Ecommerce
    Route::get('/dashboard', [ProductoController::class, 'index'])->name('dashboard');

    //Rutas para Gestionar Perfil, configuración de cuenta y sitio web
    Route::get('/ajustes', [MiPerfilController::class, 'index'])->name('perfil-ajustes');
    
    //Rutas para Gestionar Producto
    Route::get('/producto', [ProductoController::class, 'index'])->name('productos-vista');
    Route::post('/producto/agregar', [ProductoController::class, 'create'])->name('productos-create');
    Route::delete('/producto/eliminar/{id_producto}', [ProductoController::class, 'destroy'])->name('productos-destroy');
    Route::put('/producto/modificar/{id_producto}', [ProductoController::class, 'update'])->name('productos-update');

    //Rutas para Gestionar Categoria
    Route::get('/categoria', [ProductoController::class, 'index'])->name('descuentos-vista');
    Route::post('/categoria/agregar', [CategoriaController::class, 'create'])->name('categorias-create');
    Route::delete('/categoria/eliminar/{id_categoria}', [CategoriaController::class, 'destroy'])->name('categorias-destroy');
    Route::put('/categoria/modificar/{id_categoria}', [CategoriaController::class, 'update'])->name('categorias-update');

    //Rutas para Gestionar Descuento
    Route::get('/descuento', [ProductoController::class, 'index'])->name('descuentos-vista');
    Route::post('/descuento/agregar', [DescuentoController::class, 'create'])->name('descuentos-create');
    Route::delete('/descuento/eliminar/{id_descuento}', [DescuentoController::class, 'destroy'])->name('descuentos-destroy');
    Route::put('/descuento/modificar/{id_descuento}', [DescuentoController::class, 'update'])->name('descuentos-update');

    //Rutas para Gestionar Pedidos
    Route::get('/pedidos/listado', [PedidoController::class, 'index'])->name('pedidos-vista');
    Route::get('/pedidos', [PedidoController::class, 'indexAdd'])->name('pedidos-agregar-vista');
    Route::get('/pedidos/agregar', [PedidoController::class, 'vista'])->name('pedidos-create');
    Route::delete('/pedidos/eliminar/{id_pedido}', [PedidoController::class, 'destroy'])->name('pedidos-destroy');
    Route::put('/pedidos/modificar/{id_pedido}', [PedidoController::class, 'create'])->name('pedidos-update');

    //Rutas para Gestionar Gastos
    Route::get('/gastos', [GastoController::class, 'index'])->name('gastos-vista');
    Route::post('/gastos/agregar', [GastoController::class, 'create'])->name('gastos-create');
    Route::delete('/gastos/eliminar/{id_gasto}', [GastoController::class, 'destroy'])->name('gastos-destroy');
    Route::put('/gastos/modificar/{id_gasto}', [GastoController::class, 'update'])->name('gastos-update');

    //Rutas para Gestionar Envíos
    Route::get('/envios', [EnvioController::class, 'index'])->name('envios-vista');
    Route::post('/envios/agregar', [EnvioController::class, 'create'])->name('envios-create');
    Route::delete('/envios/eliminar/{id_envio}', [EnvioController::class, 'destroy'])->name('envios-destroy');
    Route::put('/envios/modificar/{id_envio}', [EnvioController::class, 'create'])->name('envios-update');

    //Rutas para Gestionar Reportes
    Route::get('/reportes', [ProductoController::class, 'index'])->name('reportes.vista');
    //Route::post('/reportes/agregar', [ProductoController::class, 'create']->name('reportes.create'));
    //Route::delete('/reportes/{id_producto}', [ProductoController::class, 'destroy'])->name('reportes.destroy');

    //Rutas para SUPERADMIN
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios-vista');
    Route::post('/usuarios/agregar', [UserController::class, 'create'])->name('usuarios-create');
    Route::delete('/usuarios/eliminar/{id_producto}', [UserController::class, 'destroy'])->name('usuarios-destroy');
    Route::put('/usuarios/modificar/{id_producto}', [UserController::class, 'update'])->name('usuarios-update');

    Route::get('/roles', [roleController::class, 'index'])->name('roles-vista');
    Route::put('/roles/modificar/', [roleController::class, 'vistaModificar'])->name('roles-editar');
    Route::post('/roles/agregar', [roleController::class, 'create']);
    Route::delete('/roles/eliminar/{id}', [roleController::class, 'destroy'])->name('role-destroy');
    Route::put('/roles/modificar/{id}', [roleController::class, 'update'])->name('roles-update');

});

/*
    RUTAS ECOMMERCE
*/
//Rutas para Gestionar Perfil, configuración de cuenta, Mis Pedidos

//Rutas para Buscar Productos
Route::get('/buscar', function () {
    return view('buscar');
});

//Rutas para Gestionar Filtros

//Rutas para Mostrar Productos

//Rutas para Buscar Productos
Route::get('/producto/usuario', function () {
    return view('producto');
});

//Rutas para Gestionar Carrito
Route::get('/carrito', function () {
    return view('carrito');
});

//Rutas para Procesar Pago
Route::get('/pagar', function () {
    return view('procesopago');
});


//Rutas para SUPERADMIN
