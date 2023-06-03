<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class HistorialController extends Controller
{

    public function show($id)
    {
        $id = Crypt::decrypt($id);

        $historial = DB::table('historials')
                                ->select('*')
                                ->where('id_trabajos','=',$id)
                                ->orderBy('id','asc')
                                ->get();

        return view('trabajo.log.historial',compact('historial'));
    }

}
