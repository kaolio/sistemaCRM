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

        $notas = DB::table('notas')
                    ->join('orden_trabajos','orden_trabajos.id','=','notas.id_trabajos')
                    ->select('notas.creado','notas.created_at','notas.nota','notas.id_trabajos')
                    ->get();

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
                                ->first(); 

        return view('trabajo.informacion.detalle',(compact('orden_elegida','usuarioDesignado','notas')));

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

    ////// busqueda
   /* function action($busquedaRapida){
        if ($busquedaRapida->ajax()) {
            $output = '';
            $query = $busquedaRapida->get($_POST["busquedaRapida"]);

            if ($query != '') {
                $data = DB::table('notas')
                    ->select('creado','nota')
                    ->where('creado', 'like', '%' . $query . '%')
                    ->Where('nota', 'like', '%' . $query . '%')
                    ->get();
            } else {
                $data = DB::table('notas')
                    ->select('creado','nota')
                    ->orderBy('created_at') 
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                    <tr>
                    <td>'. $row->creado.'</td>
                    <td>'. $row->created_at.'</td>
                    <td>'. $row->nota.'</td>
                    </tr>
                    ';
                }
            } else {
                $output .= '
                <tr>
                <td align="center" colspan="5">
                Nessun dato trovato
                </td>
                </tr>
                ';
            }
            $data = array(
                'table_data' => $output
            );
            
            return json_encode(array('data'=>$data));

        }
    }*/

    function busquedaRapida(Request $request)
    {
      if($request->ajax())
      {
          $data = Nota::search($request->get('full_text_search_query'))->get();

           return response()->json($data);
          //return json_encode(array('data'=>$$data));
      }
    }
}