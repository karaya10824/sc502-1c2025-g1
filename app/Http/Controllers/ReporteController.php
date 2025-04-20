<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
//use App\Models\*;
use Exception;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller{
    public function index(){
        $active = "reporte";

        return view('reporte.listado', compact('active'));
    }

    public function create(){

        return view('reporte.listado');
    }

    public function eliminar(){

        return view('reporte.listado');
    }
    
    public function modificar(){

        return view('reporte.listado');
    }
}