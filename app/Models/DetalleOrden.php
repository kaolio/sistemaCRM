<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    use HasFactory;
    protected $table = "detalle_ordens";
    protected $fillable = [
        'tipo','rol','fabricante','modelo','serial','localizacion','diagnostico','id_trabajos',
    ];
}
