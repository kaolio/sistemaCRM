<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\OrdenTrabajo;
use App\Models\Inventario;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Detalle;
use Illuminate\Support\Facades\DB;
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

        $orden_elegida = DB::table('orden_trabajos')
                                ->select('*')
                                ->where('id','=',$id)
                                ->first(); 

        return view('trabajo.informacion.detalle',(compact('orden_elegida')));

    }

    public function buscarOrden(){
                 
        $ruta =  "/trabajos/detalle/".$_POST["orden"];

        return json_encode(array('data'=>$ruta));
    }  

    public function guardarNota(){

            $nota = new Nota();
            $nota->nota = $_POST["comentario"];
            $nota->save();

    }


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
