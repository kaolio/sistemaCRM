<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Spatie\Permission\Models\Role;

class ClienteExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View

    {   
        
         $rols = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
                    
        $rol = Role::findById($rols->role_id)->name ;

        if ($rol == 'ADMINISTRADOR') {

            $datosTablas = DB::table('clientes')
                        ->select('*')
                        ->orderBy('id','desc')
                        ->get();

        }else {
            
            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');
            
            if ($rolePermission) {
            
                $datosTablas = DB::table('clientes')
                        ->select('*')
                        ->where('id_user',Auth::user()->id)
                        ->orderBy('id','desc')
                        ->get();

            }else{

                $datosTablas = DB::table('clientes')
                        ->select('*')
                        ->orderBy('id','desc')
                        ->get();
                
            }    

        }
        

                    //ruta del archivo a exportar
        return view('cliente/reporte/excel',[
            'cliente' => $datosTablas
        ]);
    }
}
