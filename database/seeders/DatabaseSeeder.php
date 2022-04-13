<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // \App\Models\User::factory(10)->create();
        Permission::create([
            'name' => 'ver-rol',
            'tipo' => 'rol',
        ]);
        Permission::create([
            'name' => 'crear-rol',
            'tipo' => 'rol',
        ]);
        Permission::create([
            'name' => 'editar-rol',
            'tipo' => 'rol',
        ]);
        Permission::create([
            'name' => 'borrar-rol',
            'tipo' => 'rol',
        ]);
        Permission::create([
            'name' => 'ver-usuario',
            'tipo' => 'usuario',
        ]);
        Permission::create([
            'name' => 'crear-usuario',
            'tipo' => 'usuario',
        ]);
        Permission::create([
            'name' => 'editar-usuario',
            'tipo' => 'usuario',
        ]);
        Permission::create([
            'name' => 'borrar-usuario',
            'tipo' => 'usuario',
        ]);
        Permission::create([
            'name' => 'ver-trabajo',
            'tipo' => 'trabajo',
        ]);
        Permission::create([
            'name' => 'crear-trabajo',
            'tipo' => 'trabajo',
        ]);
        Permission::create([
            'name' => 'editar-trabajo',
            'tipo' => 'trabajo',
        ]);
        Permission::create([
            'name' => 'borrar-trabajo',
            'tipo' => 'trabajo',
        ]);
        Permission::create([
            'name' => 'ver-clientes',
            'tipo' => 'clientes',
        ]);
        Permission::create([
            'name' => 'crear-clientes',
            'tipo' => 'clientes',
        ]);
        Permission::create([
            'name' => 'editar-clientes',
            'tipo' => 'clientes',
        ]);
        Permission::create([
            'name' => 'borrar-clientes',
            'tipo' => 'clientes',
        ]);
        Permission::create([
            'name' => 'ver-inventario',
            'tipo' => 'inventario',
        ]);
        Permission::create([
            'name' => 'crear-inventario',
            'tipo' => 'inventario',
        ]);
        Permission::create([
            'name' => 'editar-inventario',
            'tipo' => 'inventario',
        ]);
        Permission::create([
            'name' => 'borrar-inventario',
            'tipo' => 'inventario',
        ]);
        
        $role = Role::create(['name' => 'ADMINISTRADOR']);
        $role->givePermissionTo(Permission::all());
           
        $user = User::create([
            'name' => 'Administrador',
            'email' =>'admin@gmail.com',
            'password' => Hash::make('secret'),
        ]);

        $user->assignRole('ADMINISTRADOR');
    }
}
