<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
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


=======

class IndexController extends Controller{
    public function index(){
        return view('index');
    }
}
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
