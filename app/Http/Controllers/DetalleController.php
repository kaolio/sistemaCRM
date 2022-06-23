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
use Psy\Command\WhereamiCommand;

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

        $recuperarDatos = DB::table('inventarios')
                        ->select('*')
                        ->get();

        $prioridadTrabajo = DB::table('orden_trabajos')
                        ->select('*')
                        ->get();

        $notas = DB::table('notas')
                    ->join('orden_trabajos','orden_trabajos.id','=','notas.id_trabajos')
                    ->select('notas.creado','notas.created_at','notas.nota','notas.id_trabajos','notas.id')
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
        $diagnosticoCambiado = DB::table('orden_trabajos')
                                ->select('*')
                                ->get();
        $recuperarDonante = DB::table('inventarios')
                                ->select('*')
                                ->get();
                                
        return view('trabajo.informacion.detalle',(compact('orden_elegida','usuarioDesignado','notas','recuperarDatos','prioridadTrabajo','diagnosticoCambiado','recuperarDonante')));

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

        $ordenTrabajo = DB::table('orden_trabajos')
                    ->select('*')
                    ->where('id','=',$_POST["nombre"])
                    ->first();

            DB::table('orden_trabajos')
                    ->where('id', $ordenTrabajo->id)
                    ->update(['asignado' => $_POST["selectDesignacion"]]);

        $usuarioDesignado = DB::table('users')
                        ->select('name')
                        ->get();
        
                return json_encode(array('data'=>$usuarioDesignado));
                  
    }

    public function eliminarNota($id)
    {
        $nota=Nota::findOrFail($id);
        $nota->delete();
        
                return redirect('trabajo.informacion.detalle');
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
    //tabla de otros disp de los clientes
    public function datosOtrosDispositivos(){

        $datosOtrosDispositivos =  DB::table('detalle_ordens')
                    ->join('orden_trabajos','orden_trabajos.id','=','detalle_ordens.id_trabajos')
                    ->select('orden_trabajos.diagnostico','detalle_ordens.tipo','detalle_ordens.rol','detalle_ordens.fabricante','detalle_ordens.modelo',
                            'detalle_ordens.serial','detalle_ordens.localizacion','detalle_ordens.id')
                    ->where('detalle_ordens.id_trabajos','=',$_POST["nombre"])
                    ->where('detalle_ordens.rol','<>','Paciente')
                    ->get(); 
        return json_encode(array('data'=>$datosOtrosDispositivos));
    }

    public function buscadorDonante(){
        
        $recuperarDatos = DB::table('inventarios')
                        ->select('*')
                        ->orWhere('id','=',$_POST["idInternoDonante"])
                        ->orWhere('modelo','=',$_POST["modeloDonante"])
                        ->orWhere('numero_de_serie','=',$_POST["serieDonante"])
                        ->orWhere('capacidad','=',$_POST["tamañoDonante"])
                        ->orWhere('pbc','=',$_POST["pcbDonante"])
                        ->get();

                        return json_encode(array('data'=>$recuperarDatos));
    }

    public function agregarDonante(){
        // $donante = DB::table('inventarios')
        //                  ->select('*')
        //                 ->orWhere('id','=',$_POST["idInterno"])
        //                 ->orWhere('manufactura','=',$_POST["manufacturaDonante"])
        //                 ->orWhere('modelo','=',$_POST["modeloDonante"])
        //                 ->orWhere('numero_de_serie','=',$_POST["serieDonante"])
        //                 ->orWhere('capacidad','=',$_POST["capacidadDonante"])
        //                 ->orWhere('ubicacion','=',$_POST["ubicacionDonante"])
        //                 ->orWhere('rol','=',$_POST["selectDonante"])
        //                 ->get();

        //     DB::table('inventarios')
        //             ->where('id', $rol->id)
        //             ->update('manufactura','=',$_POST["manufacturaDonante"]) //variable del input de la tabla
        //             ->update('modelo','=',$_POST["modeloDonante"])
        //             ->update('numero_de_serie','=',$_POST["serieDonante"])
        //             ->update('capacidad','=',$_POST["capacidadDonante"])
        //             ->update('ubicacion','=',$_POST["ubicacionDonante"])
        //             ->update(['rol' => $_POST["selectDonante"]]); //del select

        // $recuperarDonante = DB::table('inventarios')
        //                 ->select('*')
        //                 ->get();
        
        //         return json_encode(array('data'=>$recuperarDonante));
        $recuperarDonante = DB::table('inventarios')
                            ->select('*')
                            ->orWhere('id','=',$_POST["idInternoDonante1"])
                            ->orWhere('modelo','=',$_POST["modeloDonante1"])
                            ->orWhere('numero_de_serie','=',$_POST["serieDonante1"])
                            ->orWhere('capacidad','=',$_POST["tamañoDonante1"])
                            ->orWhere('pbc','=',$_POST["pcbDonante1"])
                            ->get();

        return json_encode(array('data'=>$recuperarDonante));
    }


    // public function moverUbicacion(){
        

    //     $ubicacion = DB::table('detalle_ordens')
    //                 ->join('orden_trabajos','detalle_ordens.id', '=')
    //                 ->select('*')
    //                 ->where('id','=',$_POST["nombre"])
    //                 ->first();

    //         DB::table('orden_trabajos')
    //                 ->where('id', $ordenTrabajo->id)
    //                 ->update(['localizacion' => $_POST["moverUbicacion"]]);

    //         $moverUbicacion = DB::table('detalle_ordens')
    //                 ->select('localizacion')
    //                 ->where(['id','=',$_POST["moverUbicacion"]])
    //                 ->first();
        
    //             return json_encode(array('data'=>$moverUbicacion));
                  
    // }
    public function guardarDiagnostico(){

        $diagnostico = DB::table('orden_trabajos')
                    ->select('*')
                    ->where('id','=',$_POST["nombre"])
                    ->first();

            DB::table('orden_trabajos')
                    ->where('id', $diagnostico->id)
                    ->update(['diagnostico' => $_POST["selectDiagnostico"]]);

        $diagnosticoCambiado = DB::table('orden_trabajos')
                        ->select('diagnostico')
                        ->get();
        
                return json_encode(array('data'=>$diagnosticoCambiado));
                  
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