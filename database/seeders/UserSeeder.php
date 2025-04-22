<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder{
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

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear roles y asignar permisos
        $admin = Role::firstOrCreate(['name' => 'Administrador']);
        $vendedor = Role::firstOrCreate(['name' => 'Vendedor']);
        $cliente = Role::firstOrCreate(['name' => 'Cliente']);

        $admin->syncPermissions(Permission::all());
        $vendedor->syncPermissions(['categorias-vista']);

        // Crear usuarios y asignarles roles
        $adminUser = User::firstOrCreate(
            ['email' => 'kevin@gmail.com'],
            [
                'nombre' => 'Kevin A',
                'password' => Hash::make('123'),
            ]
        );
        $adminUser->assignRole($admin);
    }
}