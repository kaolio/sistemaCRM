<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Servicio extends Model
{
    use HasFactory;

    public function obtenerPrecioFuncionamiento($razon)
    {
        $precio = DB::table('mal_funcionamientos')
        ->select('mal_funcio_precio')
        ->where('mal_funcionamiento', $razon)
        ->first();

        return $precio->mal_funcio_precio;
    }

    public function obtenerPrecioPrioridad($razon)
    {
        $precio = DB::table('prioridads')
        ->select('prioridad_precio')
        ->where('nombre_prioridad', $razon)
        ->first();

        return $precio->prioridad_precio;
    }
}
