<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\MetodoPago;
use App\Models\CategoriaProducto;
use App\Models\Descuento;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PDF;

class PedidoController extends Controller{
    public function index(){
        // Obtener todos los productos
        $pedidos = Pedido::with(['detallePedido.producto.media', 'metodoPago', 'cliente'])->get();
        // foreach ($pedidos as $pedido) {
        //     foreach ($pedido->detallePedido as $detalle) {
        //         foreach ($detalle->producto->media as $media) {
        //             dd($media->getUrl());
        //         }
        //     }
        // }
        $active = "pedido";

        //return view('dashboard.Inventario', compact('productos', 'categorias', 'descuentos'));
        return view('pedido.listado', ['Pedidos' => $pedidos, 'active' => $active]);
    }

    public function vistaAgregar(){
        // Obtener todos los productos
        $productos = Producto::all();
        $categorias = CategoriaProducto::all();
        $descuentos = Descuento::all();
        $metodosPago = MetodoPago::all();
        $active = "pedido";
        
        //return view('dashboard.Inventario', compact('productos', 'categorias', 'descuentos'));
        return view('pedido.agregar', ['Productos' => $productos, 'Categorias' => $categorias, 'Descuentos' => $descuentos, 'active' => $active, 'metodosPago' => $metodosPago]);
    }

    public function create(Request $request){
        // Validar los datos
        /* $request->validate([
            'nombre_producto' => 'required',
            'descripcion' => 'required',
            'id_categoria' => 'required',
            'cantidad' => 'required',
            'imagen' => 'required',
            'precio_costo' => 'required',
            'precio_venta' => 'required',
            'precio_por_mayor' => 'required',
            'activo' => 'required'
        ]);*/

        $productos = json_decode($request->input('productos'), true);
        $cantidades = json_decode($request->input('cantidades'), true);
        $precios = json_decode($request->input('precios'), true);
        $descuentos = json_decode($request->input('descuentos'), true);

        $cliente = Cliente::create([
            'nombre_cliente' => $request->nombre_cliente,
            // 'apellido_cliente' => $request->apellido_cliente,
            // 'telefono_cliente' => $request->telefono_cliente,
            // 'correo_cliente' => $request->correo_cliente,
            // 'direccion_cliente' => $request->direccion_cliente,
            'fk_id_estado' => 1,
        ]);

        $pedido = Pedido::create([
            'fecha_pedido' => $request->fecha_pedido,
            'subtotal_pedido' => $request->subtotal_pedido,//$request->subtotal_pedido,
            'total_pedido' => $request->total_pedido,//$request->total_pedido,sumasForm
            'detalle_pedido' => $request->detalle_pedido,
            'fk_id_cliente' => $cliente->id_cliente,
            'fk_id_descuento' => $request->fk_id_descuento,
            'fk_id_metodo_de_pago' => $request->fk_id_metodo_de_pago,
            'fk_id_estado' => $request->fk_id_estado,
        ]);
        $idPedido = $pedido->id_pedido;

        foreach ($productos as $index => $productoId) {
            $cantidad = $cantidades[$index];
            $precio = $precios[$index];
            $descuento = $descuentos[$index];

            // Crear el detalle del pedido
            $detallePedidos = DetallePedido::create([
                'cantidad' => $cantidad,
                'subtotal' => $precio,
                'detalle' => $request->detalle_pedido,
                'fk_id_pedido' => $idPedido,
                'fk_id_producto' => $productoId,
            ]);
            // Actualizar la cantidad del producto
            $producto = Producto::find($productoId);
            $producto->cantidad_producto -= $cantidad;
            $producto->save();
        }

        return redirect()->route('pedidos-vista');
    }
    public function vistaModificar($id_pedido){
        $Pedido = Pedido::findOrFail($id_pedido);

        $productos = Producto::all();
        $categorias = CategoriaProducto::all();
        $descuentos = Descuento::all();
        $metodosPago = MetodoPago::all();

        $active = "pedido";
        
        return view('pedido.modificar', ['Pedido' => $Pedido ,'Productos' => $productos, 'Categorias' => $categorias, 'Descuentos' => $descuentos, 'active' => $active, 'metodosPago' => $metodosPago]);    
    }

    public function eliminar($id_pedido){     
        $detallePedidos = DetallePedido::where('fk_id_pedido', $id_pedido)->get();

        // Eliminar los detalles del pedido
        foreach ($detallePedidos as $detallePedido) {
            $detallePedido->delete();
            // Actualizar la cantidad del producto
            $producto = Producto::find($detallePedido->fk_id_producto);
            $producto->cantidad_producto += $detallePedido->cantidad;
            $producto->save();
        }

        // Buscar el pedido
        $pedido = Pedido::find($id_pedido);
        // Eliminar el pedido
        $pedido->delete();

        return redirect()->route('pedidos-vista');
    }
}
