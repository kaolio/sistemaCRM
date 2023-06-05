<?php

namespace App\Http\Controllers;

use App\Models\InicioSesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class InicioSesionController extends Controller
{
   
    public function show($id)
    { 

        $id = Crypt::decrypt($id);

        $inicio = DB::table('inicio_sesions')
                                ->select('*')
                                ->where('id_trabajos','=',$id)
                                ->orderBy('id','asc')
                                ->get();

        return view('trabajo.log.inicio_sesion',compact('inicio'));
    }


}
