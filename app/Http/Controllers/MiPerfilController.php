<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
//use App\Models\*;
use Exception;
use Illuminate\Support\Facades\DB;

class MiPerfilController extends Controller{
    public function index(){
        $active = "ajustes";
        return view('dashboard.miperfil', compact('active'));
    }
}