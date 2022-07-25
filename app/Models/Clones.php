<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clones extends Model
{
    use HasFactory;

    protected $table = "clones";
    protected $fillable = [
        'id_clon', 'manufactura','modelo','numero_serie','factor_forma',
        'estado',
    ];
}
