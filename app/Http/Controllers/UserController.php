<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller{
    public function index(){
        $roles = Role::all();
        $Usuarios = User::all();

        return view('user.listado', compact('Usuarios', 'roles'));
    }

    public function create(Request $request){
        try {
            DB::beginTransaction();

            //Encriptar contraseña
            $fieldHash = Hash::make($request->password);

            //Modificar el valor de password en nuestro request
            $request->merge(['password' => $fieldHash]);

            //Crear usuario
            $user = User::create($request->all());

            //Asignar su rol
            $user->assignRole($request->role);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return route('usuarios-vista');
    }
}