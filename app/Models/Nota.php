<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $buscable = [
        'columns' => [
            'notas.creado'  => 10,
            'notas.created_at'  => 10,
            'notas.nota'  => 10,
        ]
    ];

    protected $table = "notas";
    protected $fillable = [
        'creado','nota','created_at',
    ];
}
