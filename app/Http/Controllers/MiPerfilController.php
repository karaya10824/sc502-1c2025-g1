<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
//use App\Models\*;
use Exception;
use Illuminate\Support\Facades\DB;

class MiPerfilController extends Controller{
    public function index(){
<<<<<<< HEAD
        $active = "ajustes";
        return view('dashboard.miperfil', compact('active'));
=======
        return view('dashboard.miperfil');
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
    }
}