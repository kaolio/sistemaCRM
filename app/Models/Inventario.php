<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Inventario extends Model
{
    use HasFactory;
    
    protected $table = "inventarios";
    protected $fillable = [
        'manufactura',
        'modelo',
        'numero_de_serie',
        'firmware',
        'capacidad',
        'pbc',
        'ubicacion',
        'factor_de_forma',
        'nota',
        'cabecera',
        'info_de_cabecera',
        'diagnostico',
        'rol',
    ];
    
    

    public static function sumaCantidad()
    {
        $cant = DB::table('inventarios')
                    ->count();

        return $cant;
    }

}
