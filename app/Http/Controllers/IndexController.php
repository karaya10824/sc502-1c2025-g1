<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;

class IndexController extends Controller{
    public function index(){
        $Productos = Producto::all();

        return view('index', compact('Productos'));
    }

    public function indexDashboard(){
        $productos = Producto::all();
        $pedidos = Pedido::all();
        $active = "inicio";

        return view('indexDashboard', compact('active', 'productos', 'pedidos'));
    }
}


