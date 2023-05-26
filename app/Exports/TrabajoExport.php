<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Spatie\Permission\Models\Role;

class TrabajoExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View{   

        
        $rols = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
                    
            $rol = Role::findById($rols->role_id)->name ;

        if ($rol == 'ADMINISTRADOR') {

            $datosTablas =  DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->join('users','users.id','orden_trabajos.asignado')
                        ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                        ->orderBy('orden_trabajos.id','desc')
                        ->get();

        }else {
            
            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {
            
                $datosTablas =  DB::table('orden_trabajos')
                            ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                            ->join('users','users.id','orden_trabajos.asignado')
                            ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')                       
                            ->where(function($q) use($usuario) {
                                $q->Where('orden_trabajos.creado',$usuario->name)
                                ->orWhere('orden_trabajos.asignado',Auth::user()->id);
                            })
                            ->orderBy('orden_trabajos.id','desc')
                            ->get();

            }else{

                $datosTablas =  DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->join('users','users.id','orden_trabajos.asignado')
                        ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                        ->orderBy('orden_trabajos.id','desc')
                        ->get();
                
            }    

        }
            

                    //ruta del archivo a exportar
        return view('trabajo/reportes/excel',[
            'trabajo' => $datosTablas
        ]);
    }
}
