<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $permisos = [
            //Productos
            'productos-vista',
            'productos-create',
            'productos-destroy',
            'productos-update',

            //categorías
            'categorias-vista',
            'categorias-create',
            'categorias-destroy',
            'categorias-update',

            //Descuento
            'descuentos-vista',
            'descuentos-create',
            'descuentos-destroy',
            'descuentos-update',

            //Envio
            'envios-vista',
            'envios-create',
            'envios-destroy',
            'envios-update',

            //Gastos
            'gastos-vista',
            'gastos-create',
            'gastos-destroy',
            'gastos-update',

            //Proveedor
            'proveedor-vista',
            'proveedor-create',
            'proveedor-destroy',
            'proveedor-update',
            
            //User
            'usuarios-vista',
            'usuarios-create',
            'usuarios-destroy',
            'usuarios-update',

            //Perfil 
            'perfil-ajustes'
        ];

        foreach($permisos as $permiso){
            Permission::create(['name' => $permiso]);
        }
    }
}