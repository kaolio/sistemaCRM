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
            'tiempo_estimado' => '5 - 12 Dias',
            'prioridad_precio' => '0',
        ]);

        DB::table('prioridads')->insert([
            'nombre_prioridad' => 'Prioritario',
            'tiempo_estimado' => '3 - 5 Dias',
            'prioridad_precio' => '120',
        ]);

        DB::table('prioridads')->insert([
            'nombre_prioridad' => 'Urgente',
            'tiempo_estimado' => '48 - 72h',
            'prioridad_precio' => '150',
        ]);

        DB::table('prioridads')->insert([
            'nombre_prioridad' => 'Inmediato',
            'tiempo_estimado' => '24h',
            'prioridad_precio' => '250',
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
            'abreviacion' => 'ST',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Toshiba',
            'abreviacion' => 'TH',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Samsung',
            'abreviacion' => 'SM',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Verbatim',
            'abreviacion' => 'VM',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Western Digital',
            'abreviacion' => 'WD',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'SkyNet',
            'abreviacion' => 'SK',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Maxtor',
            'abreviacion' => 'MT',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Adata',
            'abreviacion' => 'AT',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Crucial',
            'abreviacion' => 'CL',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Kingston',
            'abreviacion' => 'KS',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Sony',
            'abreviacion' => 'SY',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Hitachi',
            'abreviacion' => 'HTS',
        ]);

        DB::table('fabricantes')->insert([
            'nombre_fabricante' => 'Asus',
            'abreviacion' => 'AS',
        ]);

        //TIPO DE DAÑO
        DB::table('mal_funcionamientos')->insert([
            'mal_funcionamiento' => 'HDD Fisico hasta 2TB',
            'mal_funcio_precio' => '380',
        ]);

        DB::table('mal_funcionamientos')->insert([
            'mal_funcionamiento' => 'Logico hasta 2TB',
            'mal_funcio_precio' => '220',
        ]);

        DB::table('mal_funcionamientos')->insert([
            'mal_funcionamiento' => 'HDD Fisico 3TB a 6TB',
            'mal_funcio_precio' => '490',
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
            'nombre_estado' => 'Registrado',
        ]);
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
        DB::table('estados')->insert([
            'nombre_estado' => 'Otro',
        ]);
    }
}
