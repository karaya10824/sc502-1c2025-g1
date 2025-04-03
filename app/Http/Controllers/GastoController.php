<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
//use App\Models\*;
use Exception;
use Illuminate\Support\Facades\DB;

class GastoController extends Controller{
    public function index(){


        //return view('dashboard.Inventario', compact('productos', 'categorias', 'descuentos'));
        return view('dashboard.Gastos');
    }
}