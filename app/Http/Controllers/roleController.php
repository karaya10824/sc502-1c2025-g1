<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Exception;
use Illuminate\Support\Facades\DB;

class roleController extends Controller{
    public function index(){
        $roles = Role::all();
        $permisos = Permission::all();
        $active = "rol";

        return view('roles.listado', ['Roles' => $roles, 'Permisos' => $permisos, 'active' => $active]);
    }

    public function create(Request $request){
        $role = Role::create([
            'name' => $request->input('name'),
            'guard_name' => 'web',
        ]);
        $role->syncPermissions($request->permission);

        return redirect('/roles');
    }

    public function vistaModificar($id){
        $role = Role::find($id);

        $permisos = Permission::all();
        return view('role.modificar', compact('role', 'permisos'));
    }

    public function modificar(Request $request, $id){
        // Buscar el producto en la base de datos
        try {
            // Iniciar la transacción
            DB::beginTransaction();
            
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();

            //Actualizar permisos
            $role->syncPermissions($request->input('permission'));

            DB::commit();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
        }

        return redirect()->route('roles-vista');
    }

    public function eliminar($id){       
        // Buscar el producto
        $role = Role::find($id);
        // Eliminar el producto
        $role->delete();
        return redirect('/roles');
    }
}