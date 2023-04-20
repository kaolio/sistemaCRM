<?php

namespace Database\Seeders;

use App\Models\Prioridad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfiguracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //PRIORIDAD
        DB::table('prioridads')->insert([
            'nombre_prioridad' => 'Normal',
            'tiempo_estimado' => '72 Horas',
            'prioridad_precio' => '1500',
        ]);

        DB::table('prioridads')->insert([
            'nombre_prioridad' => 'Prioritario',
            'tiempo_estimado' => '24 Horas',
            'prioridad_precio' => '2000',
        ]);

        DB::table('prioridads')->insert([
            'nombre_prioridad' => 'Urgente',
            'tiempo_estimado' => '12 Horas',
            'prioridad_precio' => '2500',
        ]);

        DB::table('prioridads')->insert([
            'nombre_prioridad' => 'Inmediato',
            'tiempo_estimado' => '8 Horas',
            'prioridad_precio' => '3000',
        ]);

        //DISPOSITIVO
        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'HDD',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'SSD',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'M2',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'CD/DVD',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'Unidad Flash',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'Tarjeta de Memoria',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'Impresora',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'Memoria',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'Herramientas de Cambio de Cabezales',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'Herramientas de Disco Duro',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'Heramientas de Desapilado de Fuerza Bruta',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'Laptop',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'Notebook',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'PC',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'Telefono Celular',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'Disco Blue Ray',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'Tablet',
        ]);

        DB::table('dispositivos')->insert([
            'nombre_dispositivo' => 'FDD',
        ]);

        //FABRICANTE
        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Seagate',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Toshiba',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Samsung',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Verbatim',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Western Digital',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'SkyNet',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Maxtor',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Adata',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Crucial',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Kingston',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Sony',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Hitachi',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Asus',
        ]);

        //TIPO DE DAÑO
        DB::table('mal_funcionamientos')->insert([
            'mal_funcionamiento' => 'Fisico',
            'mal_funcio_precio' => '2500',
        ]);

        DB::table('mal_funcionamientos')->insert([
            'mal_funcionamiento' => 'Logico',
            'mal_funcio_precio' => '3500',
        ]);

        //FACTOR DE FORMA
        DB::table('factor_formas')->insert([
            'nombre_factor' => '1.0 Pulgadas',
        ]);

        DB::table('factor_formas')->insert([
            'nombre_factor' => '1.3 Pulgadas',
        ]);

        DB::table('factor_formas')->insert([
            'nombre_factor' => '1.8 Pulgadas',
        ]);

        DB::table('factor_formas')->insert([
            'nombre_factor' => '2.0 Pulgadas',
        ]);

        DB::table('factor_formas')->insert([
            'nombre_factor' => '2.5 Pulgadas',
        ]);

        DB::table('factor_formas')->insert([
            'nombre_factor' => '3.5 Pulgadas',
        ]);

        DB::table('factor_formas')->insert([
            'nombre_factor' => '5.25 Pulgadas',
        ]);

        DB::table('factor_formas')->insert([
            'nombre_factor' => 'M2',
        ]);

        //TIPO DE CONEXION
        DB::table('tipo_conexions')->insert([
            'nombre_conexion' => 'M2',
        ]);

        DB::table('tipo_conexions')->insert([
            'nombre_conexion' => 'mSATA',
        ]);

        DB::table('tipo_conexions')->insert([
            'nombre_conexion' => 'PATA',
        ]);

        DB::table('tipo_conexions')->insert([
            'nombre_conexion' => 'PCI Express',
        ]);

        DB::table('tipo_conexions')->insert([
            'nombre_conexion' => 'SAS',
        ]);

        DB::table('tipo_conexions')->insert([
            'nombre_conexion' => 'SATA',
        ]);

        DB::table('tipo_conexions')->insert([
            'nombre_conexion' => 'SATA Express',
        ]);

        DB::table('tipo_conexions')->insert([
            'nombre_conexion' => 'USB 2.0',
        ]);

        DB::table('tipo_conexions')->insert([
            'nombre_conexion' => 'USB 3.0',
        ]);

        DB::table('tipo_conexions')->insert([
            'nombre_conexion' => 'USB 3.1',
        ]);
        
        //ESTADO

        DB::table('estados')->insert([
            'nombre_estado' => 'Recibido',
        ]);
        DB::table('estados')->insert([
            'nombre_estado' => 'En Proceso',
        ]);
        DB::table('estados')->insert([
            'nombre_estado' => 'Esperando Piezas',
        ]);
        DB::table('estados')->insert([
            'nombre_estado' => 'Trabajo Completo',
        ]);
        DB::table('estados')->insert([
            'nombre_estado' => 'Trabajo Incompleto',
        ]);
        DB::table('estados')->insert([
            'nombre_estado' => 'Pagado',
        ]);
        DB::table('estados')->insert([
            'nombre_estado' => 'Devuelto al Cliente',
        ]);
        DB::table('estados')->insert([
            'nombre_estado' => 'Pago Pendiente',
        ]);
        DB::table('estados')->insert([
            'nombre_estado' => 'Llegada Pendiente',
        ]);
        DB::table('estados')->insert([
            'nombre_estado' => 'Pagado y regresado a Cliente',
        ]);
    }
}
