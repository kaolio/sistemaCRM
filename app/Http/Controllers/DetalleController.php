<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\OrdenTrabajo;
use App\Models\Inventario;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Detalle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Datatable;

class DetalleController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-trabajo|crear-trabajo|editar-trabajo|borrar-trabajo',['only'=>['index']]);
        $this->middleware('permission:crear-trabajo',['only'=>['create','store']]);
        $this->middleware('permission:editar-trabajo',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-trabajo',['only'=>['destroy']]);
    }



    public function datosTabla(){

        $datosTabla =  DB::table('detalle_ordens')
                    ->join('orden_trabajos','orden_trabajos.id','=','detalle_ordens.id_trabajos')
                    ->select('orden_trabajos.diagnostico','detalle_ordens.tipo','detalle_ordens.rol','detalle_ordens.fabricante','detalle_ordens.modelo',
                            'detalle_ordens.serial','detalle_ordens.localizacion','detalle_ordens.id')
                    ->where('detalle_ordens.id_trabajos','=',$_POST["nombre"])
                    ->where('detalle_ordens.rol','=','Paciente')
                    ->get(); 


        return json_encode(array('data'=>$datosTabla));
    }
    

    public function datosDispositivos(){

        $datosTabla =  DB::table('detalle_ordens')
                    ->join('orden_trabajos','orden_trabajos.id','=','detalle_ordens.id_trabajos')
                    ->select('orden_trabajos.diagnostico','detalle_ordens.tipo','detalle_ordens.rol','detalle_ordens.fabricante','detalle_ordens.modelo',
                            'detalle_ordens.serial','detalle_ordens.localizacion','detalle_ordens.id')
                    ->where('detalle_ordens.id_trabajos','=',$_POST["nombre"])
                    ->where('detalle_ordens.rol','<>','Paciente')
                    ->get(); 
        return json_encode(array('data'=>$datosTabla));
    }
    public function buscar($id){

        $usuarioDesignado = DB::table('users')
                                ->select('*')
                                ->where('name','<>','Administrador')
                                ->get();

        $orden_elegida = DB::table('orden_trabajos')
                                ->join('clientes','clientes.id','=','orden_trabajos.id_cliente')
                                ->join('users','users.id','=','orden_trabajos.asignado')
                                ->select('clientes.nombreCliente','clientes.vat','clientes.calle','clientes.codigoPostal',
                                'clientes.pais','clientes.nota','users.name','orden_trabajos.id','orden_trabajos.informacion','orden_trabajos.datosImportantes')
                                ->where('orden_trabajos.id','=',$id)
                                ->get(); 

        return view('trabajo.informacion.detalle',(compact('orden_elegida','usuarioDesignado')));

    }

    public function buscarOrden(){
                 
        $ruta =  "/trabajos/detalle/".$_POST["orden"];

        return json_encode(array('data'=>$ruta));
    }  

    public function guardarNota(){

        $trabajo = DB::table('orden_trabajos')
                    ->select('id')
                    ->where('id','=',$_POST["nombre"])
                    ->first();

            $nota = new Nota();
            $nota->creado = Auth::user()->name;
            $nota ->id_trabajos = $trabajo->id;
            $nota->nota = $_POST["comentario"];
            $nota->save();

            $notas = DB::table('notas')
                        ->select('*')
                        ->where('id_trabajos','=',$trabajo->id)
                        ->first();

                return json_encode(array('data'=>$notas));
                  
    }

    public function tablaNotas(){
        $trabajo = DB::table('orden_trabajos')
                    ->select('id')
                    ->where('id','=',$_POST["nombre"])
                    ->first();

    $notas = DB::table('notas')
                    ->select('*')
                    ->where('id_trabajos','=',$trabajo->id)
                    ->get();

                return json_encode(array('data'=>$notas));
        
    }

     public function guardarDesignacion(){

        $usuarioDesignado = DB::table('users')
                    ->select('*')
                    ->where('id','=',$_POST["nombre"])
                    ->first();

            DB::table('orden_trabajos')
                    ->where('id', $usuarioDesignado->id)
                    ->update(['asignado' => $_POST["selectDesignacion"]]);

        
                return json_encode(array('data'=>$usuarioDesignado));
                  
    }

    /* public function datosDashboard(){
        $trabajo = DB::table('orden_trabajos')
                    ->select('id')
                    ->where('id','=',$_POST["nombre"])
                    ->first();

    $notasDashboard = DB::table('notas')
                    ->select('*')
                    ->where('id_trabajos','=',$trabajo->id)
                    ->get();

                return json_encode(array('data'=>$notasDashboard));
        
    }*/

   /* public function destroy(){
                 
        $ruta =  "/trabajos/detalle/notas".$_POST["orden"];
        $notas=Nota::findOrFail($id);
        $notas->delete();

        return json_encode(array('data'=>$ruta));
    }*/



    public function datosPacientes(){

        $datosPacientes =  DB::table('detalle_ordens')
                    ->join('orden_trabajos','orden_trabajos.id','=','detalle_ordens.id_trabajos')
                    ->select('orden_trabajos.diagnostico','detalle_ordens.tipo','detalle_ordens.rol','detalle_ordens.fabricante','detalle_ordens.modelo',
                            'detalle_ordens.serial','detalle_ordens.localizacion','detalle_ordens.id')
                    ->where('detalle_ordens.id_trabajos','=',$_POST["nombre"])
                    ->where('detalle_ordens.rol','=','Paciente')
                    ->get();  
        return json_encode(array('data'=>$datosPacientes));
    }

    //datos del inventario
    public function datosInventario(){

        $datosTabla =  DB::table('inventarios')
                    ->select('orden_trabajos.diagnostico','detalle_ordens.tipo','detalle_ordens.rol','detalle_ordens.fabricante','detalle_ordens.modelo',
                            'detalle_ordens.serial','detalle_ordens.localizacion','detalle_ordens.id')
                    ->where('detalle_ordens.id_trabajos','=',$_POST["nombre"])
                    ->where('detalle_ordens.rol','=','Paciente')
                    ->get(); 


        return json_encode(array('data'=>$datosTabla));
    }

   
}
