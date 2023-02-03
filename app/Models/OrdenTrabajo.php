<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrdenTrabajo extends Model
{
    use HasFactory;


    public function buscarNombre($nombre){
        $datos = DB::table('clientes')
        ->select('*')
        ->where('nombreCliente', 'like', '%' . $nombre . '%')
        ->get();

        return $datos;
    }

    public function buscarCorreo($correo){
        $datos = DB::table('clientes')
        ->select('*')
        ->where('correo', 'like', '%' . $correo . '%')
        ->get();

        return $datos;
    }

    public function buscarCif($cif){
        $datos = DB::table('clientes')
        ->select('*')
        ->where('cif', 'like', '%' . $cif . '%')
        ->get();

        return $datos;
    }

    public function buscarTelefono($telefono){
        $datos = DB::table('clientes')
        ->select('*')
        ->where('telefono', 'like', '%' . $telefono . '%')
        ->get();

        return $datos;
    }

    
}
