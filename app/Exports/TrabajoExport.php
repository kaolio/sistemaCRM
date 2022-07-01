<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TrabajoExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View

    {   if (Auth::user()->id != 1) {

        $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();

        $datosTablas =  DB::table('orden_trabajos')
        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
        ->join('users','users.id','orden_trabajos.asignado')
        ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
        ->where('orden_trabajos.creado',$usuario)
        ->orderBy('orden_trabajos.id','asc')
        ->get(); 
    }else{
        $datosTablas =  DB::table('orden_trabajos')
        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
        ->join('users','users.id','orden_trabajos.asignado')
        ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
        ->orderBy('orden_trabajos.id','asc')
        ->get(); 
    }
        

                    //ruta del archivo a exportar
        return view('trabajo/reportes/excel',[
            'trabajo' => $datosTablas
        ]);
    }
}
