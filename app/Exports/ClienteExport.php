<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ClienteExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View

    {   
        
        if (Auth::user()->id != 1) {

            $datosTablas = DB::table('clientes')
                        ->select('*')
                        ->where('user_id',Auth::user()->id)
                        ->orderBy('id','desc')
                        ->get();

        }else{
            $datosTablas = DB::table('clientes')
                        ->select('*')
                        ->where('id_user',Auth::user()->id)
                        ->orderBy('id','desc')
                        ->get();
        }
        
        

                    //ruta del archivo a exportar
        return view('cliente/reporte/excel',[
            'cliente' => $datosTablas
        ]);
    }
}
