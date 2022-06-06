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
// use App\Http\Controllers\InventarioController;

class DetalleController extends InventarioController
{
    // use Inventario;
    function __construct()
    {
        $this->middleware('permission:ver-trabajo|crear-trabajo|editar-trabajo|borrar-trabajo',['only'=>['index']]);
        $this->middleware('permission:crear-trabajo',['only'=>['create','store']]);
        $this->middleware('permission:editar-trabajo',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-trabajo',['only'=>['destroy']]);
    }


    public function guardarNota()
    {
        $nota = new Nota();
        $nota->nota = $_POST["comentario"];
        $nota->save();

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

        //datos del inventario CON AJAX
    public function datosInventario(){

        $datosInventario =  DB::table('inventarios')
                            // ->join('orden_trabajos','orden_trabajos.id','=','detalle_ordens.id_trabajos')
                            ->select('inventarios.id','inventarios.manufactura','inventarios.modelo','inventarios.numero_de_serie','inventarios.firmware',
                                    'inventarios.capacidad','inventarios.pbc','inventarios.ubicacion','inventarios.factor_de_forma','inventarios.cabecera',
                                    'inventarios.info_de_cabecera','inventarios.diagnostico','inventarios.rol')
                            // ->where('inventarios.id','=',$_POST["nombre"])
                            // ->where('detalle_ordens.rol','=','Paciente')
                            ->get();  

        return json_encode(array('data'=>$datosInventario));
    }

    
    // buscador en tiemp real de lista de inventario
    public function buscarInventario(Request $request){
        $inventario = Inventario::where("manufactura",'like','%'.$request->texto.'%')
        ->orWhere("modelo",'like','%'.$request->texto.'%')->get();
        return view("trabajo/informacion/listaInventario",compact("inventario"));        
    }

   



//  public function new($inventario){
//     return $this->var = $var;
//     //  $inventario = Inventario::all();
//      return view("trabajo/informacion/datosInventario",compact("var"));  
 
// https://www.zentica-global.com/es/zentica-blog/ver/tutorial-de-ejemplo-de-laravel-8-ajax-como-usar-ajax-en-laravel-6073a83a75014

// public function getInve(Request $request)
// {
//     $inventario = Inventario::latest()->paginate(5);

//     return Request::ajax() ? 
//                  response()->json($inventario,Response::HTTP_OK) 
//                  : abort(404);
// }
}
