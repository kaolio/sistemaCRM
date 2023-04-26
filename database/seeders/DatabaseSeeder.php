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
            'name' => 'dashboard',
            'tipo' => 'dashboard',
        ]);
        Permission::create([
            'name' => 'lista de roles',
            'tipo' => 'rol',
        ]);
        Permission::create([
            'name' => 'crear rol',
            'tipo' => 'rol',
        ]);
        Permission::create([
            'name' => 'editar rol',
            'tipo' => 'rol',
        ]);
        Permission::create([
            'name' => 'borrar rol',
            'tipo' => 'rol',
        ]);
        Permission::create([
            'name' => 'lista de usuarios',
            'tipo' => 'usuario',
        ]);
        Permission::create([
            'name' => 'crear usuario',
            'tipo' => 'usuario',
        ]);
        Permission::create([
            'name' => 'editar usuario',
            'tipo' => 'usuario',
        ]);
        Permission::create([
            'name' => 'borrar usuario',
            'tipo' => 'usuario',
        ]);
        Permission::create([
            'name' => 'ver orden de trabajo',
            'tipo' => 'trabajo',
        ]);
        Permission::create([
            'name' => 'ver orden de trabajo(Personal)',
            'tipo' => 'trabajo',
        ]);
        Permission::create([
            'name' => 'crear orden de trabajo',
            'tipo' => 'trabajo',
        ]);
        Permission::create([
            'name' => 'editar orden de trabajo',
            'tipo' => 'trabajo',
        ]);
        Permission::create([
            'name' => 'borrar orden de trabajo',
            'tipo' => 'trabajo',
        ]);
        Permission::create([
            'name' => 'imprimir orden de trabajo',
            'tipo' => 'trabajo',
        ]);
        Permission::create([
            'name' => 'imprimir lista de trabajos',
            'tipo' => 'trabajo',
        ]);
        Permission::create([
            'name' => 'lista de trabajos excel',
            'tipo' => 'trabajo',
        ]);
        Permission::create([
            'name' => 'lista de trabajos PDF',
            'tipo' => 'trabajo',
        ]);
        Permission::create([
            'name' => 'lista de clientes',
            'tipo' => 'cliente',
        ]);
        Permission::create([
            'name' => 'crear cliente',
            'tipo' => 'cliente',
        ]);
        Permission::create([
            'name' => 'editar cliente',
            'tipo' => 'cliente',
        ]);
        Permission::create([
            'name' => 'borrar cliente',
            'tipo' => 'cliente',
        ]);
        Permission::create([
            'name' => 'imprimir lista de clientes',
            'tipo' => 'cliente',
        ]);
        Permission::create([
            'name' => 'lista de clientes excel',
            'tipo' => 'cliente',
        ]);
        Permission::create([
            'name' => 'lista de clientes PDF',
            'tipo' => 'cliente',
        ]);
        Permission::create([
            'name' => 'lista de inventario',
            'tipo' => 'inventario',
        ]);
        Permission::create([
            'name' => 'crear inventario',
            'tipo' => 'inventario',
        ]);
        Permission::create([
            'name' => 'editar inventario',
            'tipo' => 'inventario',
        ]);
        Permission::create([
            'name' => 'borrar inventario',
            'tipo' => 'inventario',
        ]);
        Permission::create([
            'name' => 'imprimir lista de inventario',
            'tipo' => 'inventario',
        ]);
        Permission::create([
            'name' => 'lista de inventario excel',
            'tipo' => 'inventario',
        ]);
        Permission::create([
            'name' => 'lista de inventario PDF',
            'tipo' => 'inventario',
        ]);
        Permission::create([
            'name' => 'lista de productos',
            'tipo' => 'producto',
        ]);
        Permission::create([
            'name' => 'crear producto',
            'tipo' => 'producto',
        ]);
        Permission::create([
            'name' => 'editar producto',
            'tipo' => 'producto',
        ]);
        Permission::create([
            'name' => 'borrar producto',
            'tipo' => 'producto',
        ]);
        Permission::create([
            'name' => 'cambiar estado',
            'tipo' => 'producto',
        ]);
        Permission::create([
            'name' => 'mover producto',
            'tipo' => 'producto',
        ]);
        
        $role = Role::create(['name' => 'ADMINISTRADOR']);
        $role->givePermissionTo(Permission::all());
           
        $user = User::create([
            'name' => 'Administrador',
            'email' =>'admin@gmail.com',
            'password' => Hash::make('secret'),
        ]);

        $user->assignRole('ADMINISTRADOR');

        $this->call(ConfiguracionSeeder::class);
    }
}
