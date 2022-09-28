<?php

namespace App\Http\Controllers;

use App\Models\Clones;
use App\Models\Nota;
use App\Models\OrdenTrabajo;
use App\Models\Inventario;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Detalle;
use App\Models\Donantes;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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

    public function datosClones(){

        $datosClones = DB::table('clones')
                ->select('*')
                ->where('id_trabajos','=',$_POST["nombre"])
                ->get();

        return json_encode(array('data'=>$datosClones));
    }

    public function datosDonantes(){

        $datosDonantes = DB::table('donantes')
                ->select('*')
                ->where('id_trabajos','=',$_POST["nombre"])
                ->get();

                return json_encode(array('data'=>$datosDonantes));
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

        try {
            $diagnosticoDesignado = DB::table('orden_trabajos')
                            ->select('diagnostico')
                            ->get();

        $recuperarDatos = DB::table('inventarios')
                        ->select('*')
                        ->get();

        $prioridadTrabajo = DB::table('orden_trabajos')
                        ->select('*')
                        ->Where('orden_trabajos.id', '=', $id)
                        ->get();

        $notas = DB::table('notas')
                    ->join('orden_trabajos','orden_trabajos.id','=','notas.id_trabajos')
                    ->select('notas.creado','notas.created_at','notas.nota','notas.id_trabajos','notas.id')
                    ->where('notas.id_trabajos','=',$id)
                    ->get();

        $usuarioDesignado = DB::table('users')
                                ->select('*')
                                ->where('name','<>','Administrador')
                                ->get();

        $orden_elegida = DB::table('orden_trabajos')
                                ->join('clientes','clientes.id','=','orden_trabajos.id_cliente')
                                ->join('users','users.id','=','orden_trabajos.asignado')
                                ->select('clientes.nombreCliente','clientes.vat','clientes.calle','clientes.codigoPostal','clientes.nombreCiudad',
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
        catch (Exception $e) {
            //
        }

        
    }

    public function buscarOrden(){
                 
        $ruta =  "/trabajos/detalle/".$_POST["orden"];

        return json_encode(array('data'=>$ruta));
    }  

    public function guardarNotaCliente(){

        //
                  
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
            $nota->clienteInfo = " ";
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
                        ->where('id','=',$_POST["selectDesignacion"])
                        ->first();
        
                return json_encode(array('data'=>$usuarioDesignado));
                  
    }

    public function guardarEstado(){

            DB::table('orden_trabajos')
                    ->where('id','=', $_POST["nombre"])
                    ->update(['estado' => $_POST["selectEstado"]]);

        $estadoDesigando = DB::table('orden_trabajos')
                    ->select('*')
                    ->where('estado','=', $_POST["selectEstado"])
                    ->get();

                    return json_encode(array('data'=>$estadoDesigando));

    }

    public function guardarPrioridad(){

             DB::table('orden_trabajos')
                    ->where('id','=', $_POST["nombre"])
                    ->update(['prioridad' => $_POST["selectPrioridad"]]);

        $prioridadDesignada = DB::table('orden_trabajos')
                    ->select('*')
                    ->where('prioridad','=',$_POST["selectPrioridad"])
                    ->get();

                    return json_encode(array('data'=>$prioridadDesignada));
    }

    public function eliminarNota($id)
    {
        $nota=Nota::findOrFail($id);
        $nota->delete();
        
        return redirect('trabajos.informacion');
    }

    public function subirArchivo(Request $request){
        
       dd($request->file("file-upload")->store("","google"));
       
      // Storage::disk("google")->put("test.txt");
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

    public function buscadorClon(){
        
        $recuperarDatosClon = DB::table('inventarios')
                        ->select('*')
                        ->orWhere('id','=',$_POST["idInternoClon"])
                        ->orWhere('modelo','=',$_POST["modeloClon"])
                        ->orWhere('numero_de_serie','=',$_POST["serieClon"])
                        ->orWhere('capacidad','=',$_POST["tamañoClon"])
                        ->orWhere('pbc','=',$_POST["pcbClon"])
                        ->get();

                        return json_encode(array('data'=>$recuperarDatosClon));
    }

    public function agregarBusquedaClon(){

        $inventario = DB::table('inventarios')
                        ->select('*')
                        ->where('id','=',$_POST["idBuscado"])
                        ->first();

       $estadoElegido = DB::table('orden_trabajos')
                        ->select('estado')
                        ->where('id','=',$_POST["nombre"])
                        ->first();


                $clon = new Clones();
                $clon->id_clon = "c-".$_POST["idBuscado"];
                $clon->tipo = $inventario->tipo;
                $clon->manufactura = $inventario->manufactura;
                $clon->modelo = $inventario->modelo;
                $clon->numero_serie = $inventario->numero_de_serie;
                $clon->factor_forma = $inventario->factor_de_forma;
                $clon->id_trabajos = $_POST["nombre"];
                $clon->id_inventarios = $_POST["idBuscado"];
                $clon->estado = $estadoElegido->estado;
                $clon->ocupado_hasta ="";
                $clon->ubicacion = $inventario->ubicacion;
                $clon->nota = $inventario->nota;
                $clon->save();

                $clones = DB::table('clones')
                            ->select('*')
                            ->where('id_trabajos','=',$_POST["nombre"])
                            ->get();

                return json_encode(array('data'=>$clones));
    }

    public function mostrarClonesBuscados(){

       $datosClones = DB::table('clones')
                    ->select('*')
                    ->where('id_trabajos','=',$_POST["nombre"])
                    ->get();

                    return json_encode(array('data'=>$datosClones));

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

    public function agregarBusquedaDonante(){

        $inventario = DB::table('inventarios')
                        ->select('*')
                        ->where('id','=',$_POST["idDonanteBuscado"])
                        ->first();

         $trabajo = DB::table('orden_trabajos')
                        ->select('*')
                        ->where('id','=',$_POST["nombre"])
                        ->first();


                $donante = new Donantes();
                $donante->id_donante = $_POST["idDonanteBuscado"];
                $donante->tipo = $inventario->tipo;
                $donante->manufactura = $inventario->manufactura;
                $donante->modelo = $inventario->modelo;
                $donante->numero_serie = $inventario->numero_de_serie;
                $donante->ubicacion = $inventario->ubicacion;
                $donante->nota = $inventario->nota;
                $donante->id_trabajos = $trabajo->id;
                $donante->id_inventarios = $_POST["idDonanteBuscado"];
                $donante->save();

                $donantes = DB::table('donantes')
                            ->select('*')
                            ->where('id_trabajos','=',$_POST["nombre"])
                            ->get();

                return json_encode(array('data'=>$donantes));
    }

    public function mostrarDonantesBuscados(){

        $datosDonantes = DB::table('donantes')
                     ->select('*')
                     ->where('id_trabajos','=',$_POST["nombre"])
                     ->get();
 
                     return json_encode(array('data'=>$datosDonantes));
 
     }

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

    public function moverUbicacion()
    {

        for ($i=0; $i < sizeof($_POST['arreglo']); $i++) { 
            DB::table('orden_trabajos')
                ->where('id', $_POST['arreglo'][$i])
                ->update(['estado' => $_POST["seleccionado"]]);
        }
            
        if (Auth::user()->id != 1) {
            $usuario = DB::table('users')
            ->select('name')
            ->where('id',Auth::user()->id)
            ->first();
            
            $datosTablas =  DB::table('orden_trabajos')
            ->join('clientes','clientes.id','orden_trabajos.id_cliente')
            ->join('users','users.id','orden_trabajos.asignado')
            ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
            ->Where('orden_trabajos.creado',$usuario->name)
            ->orWhere('orden_trabajos.asignado',Auth::user()->id)
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
    
       // return json_encode(array('data'=>$datosTablas));
    }
}