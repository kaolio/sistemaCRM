<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [

            //roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',
            //trabajos
            'ver-trabajo',
            'crear-trabajo',
            'editar-trabajo',
            'borrar-trabajo',
            //clientes
            'ver-cliente',
            'crear-cliente',
            'editar-cliente',
            'borrar-cliente',
            //inventario
            'ver-inventario',
            'crear-inventario',
            'editar-inventario',
            'borrar-inventario',

        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
