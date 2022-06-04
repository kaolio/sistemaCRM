<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    // //Scope
    // public function scopeManufactura($query, $manufactura){
    //     if($manufactura){
    //         return $query->where('manufactura', 'LIKE', '%'.$manufactura.'%');
    //     }
    // }
    // public function scopeModelo($query, $modelo){
    //     if($modelo){
    //         return $query->where('modelo', 'LIKE', '%'.$modelo.'%');
    //     }
    // }
    // public function scopeSerie($query, $numero_de_serie){
    //     if($numero_de_serie){
    //         return $query->where('numero_de_serie', 'LIKE', '%'.$numero_de_serie.'%');
    //     }
    // }
    // public function scopeFactor($query, $factor_de_forma){
    //     if($factor_de_forma){
    //         return $query->where('factor_de_forma', 'LIKE', '%'.$factor_de_forma.'%');
    //     }
    // }

}
