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
<<<<<<< HEAD
        $active = "rol";

        return view('roles.listado', ['Roles' => $roles, 'Permisos' => $permisos, 'active' => $active]);
=======

        return view('role.listado', ['Roles' => $roles, 'Permisos' => $permisos]);
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
    }

    public function create(Request $request){
        $role = Role::create([
            'name' => $request->name,
        ]);
<<<<<<< HEAD
=======

>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
        $role->syncPermissions($request->permission);

        return redirect('/roles');
    }

    public function vistaModificar($id){
        $role = Role::find($id);

        $permisos = Permission::all();
        return view('role.modificar', compact('role', 'permisos'));
    }

<<<<<<< HEAD
    public function modificar(Request $request, $id){
        // Buscar el producto en la base de datos
=======
    public function update(Request $request, $id){
        // Buscar el producto en la base de datos

>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
        try {
            DB::beginTransaction();

            //Actualizar rol
            Role::where('id', $id)
                ->update([
                    'name' => $request->name
                ]);
            
            $role = Role::find($id);

            //Actualizar permisos
            $role->syncPermissions($request->permission);

            DB::commit();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
        }

        return redirect()->route('roles-vista');
    }

<<<<<<< HEAD
    public function eliminar($id){       
=======
    public function destroy($id){       
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
        // Buscar el producto
        $role = Role::find($id);
        // Eliminar el producto
        $role->delete();
        return redirect('/roles');
    }
<<<<<<< HEAD
=======

>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
}