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

        return view('role.listado', ['Roles' => $roles, 'Permisos' => $permisos]);
    }

    public function create(Request $request){
        $role = Role::create([
            'name' => $request->name,
        ]);

        $role->syncPermissions($request->permission);

        return redirect('/roles');
    }

    public function destroy($id){       
        // Buscar el producto
        $role = Role::find($id);
        // Eliminar el producto
        $role->delete();
        return redirect('/roles');
    }

    public function update(Request $request, $id){
        // Buscar el producto en la base de datos
        $role = Role::find($id);

        // Actualizar los campos con los nuevos valores
        $role->name = $request->input('name');

        $role->save();
        return redirect('/roles');
    }
}