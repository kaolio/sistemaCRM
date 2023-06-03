<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Clones extends Model
{
    use HasFactory;

    protected $table = "clones";
    protected $fillable = [
        'id_clon', 'manufactura','modelo','numero_serie','factor_forma',
        'estado',
    ];


    public static function sumaCantidad()
    {
        $cant = DB::table('clones')
                    ->count();

        return $cant;
    }
}
