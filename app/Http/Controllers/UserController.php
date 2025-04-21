<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller{
    public function index(){
        $roles = Role::all();
        $Usuarios = User::all();
        $active = "usuario";

        return view('usuario.listado', compact('Usuarios', 'roles', 'active'));
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
        return redirect()->route('usuarios-vista');
    }

    public function vistaModificar($id){
        $Usuario = User::find($id);

        
        $active = "usuario";

        return view('usuario.modificar', compact('Usuario', 'active'));
    }

    public function modificar($id, Request $request){      
        // Buscar el producto
        $user = User::find($id);
        // Eliminar el producto
        $user->nombre =  $request->input('nombre');
        $user->apellidos =  $request->input('apellidos');
        $user->email =  $request->input('email');
        $user->telefono =  $request->input('telefono');

        $user->save();

        return redirect()->route('perfil-vista');
    }

    public function eliminar($id){       
        // Buscar el producto
        $user = User::find($id);
        // Eliminar el producto
        $user->delete();

        return redirect()->route('usuarios-vista');
    }
}