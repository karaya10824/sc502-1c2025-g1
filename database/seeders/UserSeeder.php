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