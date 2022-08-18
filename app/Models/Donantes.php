<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donantes extends Model
{
    use HasFactory;
    protected $table = "donantes";
    protected $fillable = [
        'id_donante', 'tipo','manufactura','modelo','numero_serie','ubicacion',
        'nota',
    ];
}
