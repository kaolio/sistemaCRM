<?php

namespace App\Http\Controllers;

use App\Models\Clones;
use App\Models\Nota;
use App\Models\OrdenTrabajo;
use App\Models\Inventario;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Detalle;
use App\Models\DetalleOrden;
use App\Models\Donantes;
use Exception;
use Google\Service\Adsense\Alert;
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
                    ->select('detalle_ordens.diagnostico','detalle_ordens.tipo','detalle_ordens.rol','detalle_ordens.fabricante','detalle_ordens.modelo',
                            'detalle_ordens.serial','detalle_ordens.localizacion','detalle_ordens.id')
                    ->where('detalle_ordens.id_trabajos','=',$_POST["nombre"])
                    ->where('detalle_ordens.rol','=','Dispositivo a Recuperar')
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
                    ->select('detalle_ordens.diagnostico','detalle_ordens.tipo','detalle_ordens.rol','detalle_ordens.fabricante','detalle_ordens.modelo',
                            'detalle_ordens.serial','detalle_ordens.localizacion','detalle_ordens.id')
                    ->where('detalle_ordens.id_trabajos','=',$_POST["nombre"])
                    ->where('detalle_ordens.rol','<>','Dispositivo a Recuperar')
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
                                    ->select('clientes.nombreCliente','clientes.cif','clientes.calle','clientes.codigoPostal','clientes.provincia',
                                    'clientes.pais','clientes.nota','users.name','orden_trabajos.id','orden_trabajos.informacion','orden_trabajos.datosImportantes')
                                    ->where('orden_trabajos.id','=',$id)
                                    ->first(); 

            $diagnosticoCambiado = DB::table('orden_trabajos')
                                    ->select('*')
                                    ->get();

            $recuperarDonante = DB::table('inventarios')
                                    ->select('*')
                                    ->get();

            $imagenes = DB::table('imagens')
                                    ->select('*')
                                    ->get();
                                
             return view('trabajo.informacion.detalle',(compact('orden_elegida','usuarioDesignado','notas','recuperarDatos','prioridadTrabajo','diagnosticoCambiado','recuperarDonante','imagenes')));

        } catch (\Throwable $th) {

            //

        }

    }

    public function buscarOrden(){

        $buscado = DB::table('orden_trabajos')
                        ->select('id')
                        ->where('creado',Auth::user()->name)
                        ->where('id','=',$_POST["orden"])
                        ->exists();

        $ordenes = [];
                 
        $ruta =  "/trabajos/detalle/".$_POST["orden"];

        array_push($ordenes, $buscado, $ruta);

        return json_encode(array('data'=>$ordenes));
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

        try {
            
            DB::table('orden_trabajos')
                    ->where('id','=', $_POST["nombre"])
                    ->update(['estado' => $_POST["selectEstado"]]);

                    return json_encode(array('data'=>true));

        } catch (\Throwable $th) {
            
                 return json_encode(array('data'=>false));
        }

    }

    public function guardarPrioridad(){

        try {
            
            DB::table('orden_trabajos')
                    ->where('id','=', $_POST["nombre"])
                    ->update(['prioridad' => $_POST["selectPrioridad"]]);

        

                    return json_encode(array('data'=>true));

        } catch (\Throwable $th) {
            
               return json_encode(array('data'=>false));
        }
             
    }
 
    public function eliminarNota($id)
    {
        $NotaE = DB::table('notas')
                    ->select('id_trabajos')
                    ->where('id',$id)
                    ->first();

        $nota=Nota::findOrFail($id);
        $nota->delete();
        
        return redirect('/trabajos/detalle/'.$NotaE->id_trabajos);
    }

    public function eliminarDispositivoRecuperar()
    {

        $dispositivo = DetalleOrden::findOrFail($_POST["id_detalle"]);
        $dispositivo -> delete();
        
        return json_encode(array('data'=>true)); 
    }

    public function eliminarDispositivOtro()
    {

        $dispositivo = DetalleOrden::findOrFail($_POST["id_detalle"]);
        $dispositivo -> delete();
        
        return json_encode(array('data'=>true)); 
    }

    public function eliminarDispositivoDonante()
    {

        $dispositivo = Donantes::findOrFail($_POST["id_donante"]);
        $dispositivo -> delete();
        
        return json_encode(array('data'=>true)); 
    }

    public function eliminarDispositivoClon()
    {

        $dispositivo = Clones::findOrFail($_POST["id_clon"]);
        $dispositivo -> delete();
        
        return json_encode(array('data'=>true)); 
    }



    public function subirArchivo(Request $request){
        
       dd($request->file("file-upload")->store("","google"));
       
      // Storage::disk("google")->put("test.txt");
    }

    public function datosPacientes(){

        $datosPacientes =  DB::table('detalle_ordens')
                    ->join('orden_trabajos','orden_trabajos.id','=','detalle_ordens.id_trabajos')
                    ->select('detalle_ordens.diagnostico','orden_trabajos.nota','detalle_ordens.tipo','detalle_ordens.rol','detalle_ordens.fabricante','detalle_ordens.modelo',
                            'detalle_ordens.serial','detalle_ordens.localizacion','detalle_ordens.id')
                    ->where('detalle_ordens.id_trabajos','=',$_POST["nombre"])
                    ->where('detalle_ordens.rol','=','Dispositivo a Recuperar')
                    ->get();  
        return json_encode(array('data'=>$datosPacientes)); 
    }

    //tabla de otros disp de los clientes
    public function datosOtrosDispositivos(){

        $datosOtrosDispositivos =  DB::table('detalle_ordens')
                    ->join('orden_trabajos','orden_trabajos.id','=','detalle_ordens.id_trabajos')
                    ->select('detalle_ordens.diagnostico','orden_trabajos.nota','detalle_ordens.tipo','detalle_ordens.rol','detalle_ordens.fabricante','detalle_ordens.modelo',
                            'detalle_ordens.serial','detalle_ordens.localizacion','detalle_ordens.id')
                    ->where('detalle_ordens.id_trabajos','=',$_POST["nombre"])
                    ->where('detalle_ordens.rol','<>','Dispositivo a Recuperar')
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
                        ->having('estado','=','Disponible')
                        ->having('rol','=','Disco Para Volcado')
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
                $clon->id_clon = "C-".$_POST["idBuscado"];
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

                DB::table('inventarios')
                        ->where('id', $inventario->id)
                        ->update(['estado' => 'Ocupado']);

                return json_encode(array('data'=>true));
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
                        ->having('estado','=','Disponible')
                        ->having('rol','=','Donante')
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

                DB::table('inventarios')
                        ->where('id', $inventario->id)
                        ->update(['estado' => 'Ocupado']);

                return json_encode(array('data'=>true));
    }

    public function mostrarDonantesBuscados(){

        $datosDonantes = DB::table('donantes')
                     ->select('*')
                     ->where('id_trabajos','=',$_POST["nombre"])
                     ->get();
 
                     return json_encode(array('data'=>$datosDonantes));
 
     }

    public function guardarDiagnosticoRecuperacion(){

        DB::table('detalle_ordens')
                    ->where('id_trabajos', $_POST["id"])
                    ->where('id', $_POST["id_diagnostico"])
                    ->update(['diagnostico' => $_POST["seleccionado"]]);

        
                return json_encode(array('data'=>true));
                  
    }


    public function ubicacionNueva(){


        if ($_POST["dispositivo"][0] != 'vacio') {
            for ($i=0; $i < sizeof($_POST['dispositivo']); $i++) { 
                    DB::table('detalle_ordens')
                    ->where('id', $_POST['dispositivo'][$i])
                    ->where('id_trabajos', $_POST['id'])
                    ->update(['localizacion' => $_POST["texto"]]);
            };
        }  
        if ($_POST["clon"][0] != 'vacio') {
            for ($i=0; $i < sizeof($_POST['clon']); $i++) { 
                DB::table('clones')
                ->where('id', $_POST['clon'][$i])
                ->where('id_trabajos', $_POST['id'])
                ->update(['ubicacion' => $_POST["texto"]]);
            };  
        }
        if ($_POST["donante"][0] != 'vacio') {
            for ($i=0; $i < sizeof($_POST['donante']); $i++) { 
                DB::table('donantes')
                ->where('id', $_POST['donante'][$i])
                ->where('id_trabajos', $_POST['id'])
                ->update(['ubicacion' => $_POST["texto"]]);
            };     
        }
        if ($_POST["otros"][0] != 'vacio') {
            for ($i=0; $i < sizeof($_POST['otros']); $i++) { 
                DB::table('detalle_ordens')
                ->where('id', $_POST['otros'][$i])
                ->where('id_trabajos', $_POST['id'])
                ->where('rol','<>','Recuperacion de Datos')
                ->update(['localizacion' => $_POST["texto"]]);
            };     
        }
                
            

        return json_encode(array('data'=>sizeof($_POST["clon"])));

    }

    public function moverDispositivoRecuperar(){

        DB::table('detalle_ordens')
                ->where('id_trabajos', $_POST["id"])
                ->where('id', $_POST["detalle"])
                ->where('rol','=','Dispositivo a Recuperar')
                ->update(['localizacion' => $_POST["loc"]]);


         return json_encode(array('data'=>true));
    }

    public function moverDispositivOtro(){

            DB::table('detalle_ordens')
                    ->where('id', $_POST["detalle"])
                    ->update(['localizacion' => $_POST["loc"]]);

         return json_encode(array('data'=>true));

    }

    public function guardarNuevoDispositivo(){

        
            try {
                $detalle = new DetalleOrden();
                $detalle->tipo = $_POST["tipo"];
                $detalle->rol = $_POST["rol"];
                $detalle->fabricante = $_POST["fabrica"];
                $detalle->modelo = $_POST["modelo"];
                $detalle->serial = $_POST["serial"];
                $detalle->localizacion =$_POST["localizacion"];
                $detalle->id_trabajos = $_POST["nombre"];
                $detalle->save();

                return json_encode(array('data'=>true));
            } catch (\Throwable $th) {
                return json_encode(array('data'=>false));
            }
            
  
    }

    public function eliminarVariosC(){

        for ($i=0; $i < sizeof($_POST['arreglo']); $i++) { 
            DB::table('clones')
                ->where('id', $_POST['arreglo'][$i])
                ->delete();
        }

        $clonesRestantes = DB::table('clones')
                ->select('*')
                ->get();
            //dd($datatable);

            return json_encode(array('data'=>$clonesRestantes));
    }

    public function actualizarDispositivo(){

        $tipos = DB::table('detalle_ordens')
                        ->select('tipo','rol')
                        ->where('id_trabajos', $_POST["id"])
                        ->where('id', $_POST["id_detalle"])
                        ->first();

        $detalle = DetalleOrden::find($_POST["id_detalle"]);
        if ($_POST["tipo"] != null) {
            $detalle->tipo = $_POST["tipo"];
        } else {
            $detalle->tipo = $tipos->tipo;
        }
        if ($_POST["rol"] != null) {
            $detalle->rol = $_POST["rol"];
        } else {
            $detalle->rol = $tipos->rol;
        }
        $detalle->fabricante = $_POST["fabricante"];
        $detalle->modelo = $_POST["modelo"];
        $detalle->serial = $_POST["serial"];
        $detalle->localizacion = $_POST["localizacion"];
        $detalle->update();

        return json_encode(array('data'=>true));
    }

    public function actualizarDispositivOtro(){

        $tipos = DB::table('detalle_ordens')
                        ->select('tipo','rol')
                        ->where('id', $_POST["id_detalle"])
                        ->first();

        $detalle = DetalleOrden::find($_POST["id_detalle"]);
        if ($_POST["tipo"] != null) {
            $detalle->tipo = $_POST["tipo"];
        } else {
            $detalle->tipo = $tipos->tipo;
        }
        if ($_POST["rol"] != null) {
            $detalle->rol = $_POST["rol"];
        } else {
            $detalle->rol = $tipos->rol;
        }
        $detalle->fabricante = $_POST["fabricante"];
        $detalle->modelo = $_POST["modelo"];
        $detalle->serial = $_POST["serial"];
        $detalle->localizacion = $_POST["localizacion"];
        $detalle->update();

        return json_encode(array('data'=>true));
    }

    public function obtenerValores()
    {
        if ($_POST['tipo'] == 'dispositivo') {

            $valores = DB::table('detalle_ordens')
                    ->select('localizacion')
                    ->where('id_trabajos',$_POST['id'])
                    ->where('id',$_POST['value'])
                    ->get();
            
            return json_encode(array('data'=>$valores));
        }else{
            if ($_POST['tipo'] == 'clon') {

                $valores = DB::table('clones')
                        ->select('ubicacion')
                        ->where('id_trabajos',$_POST['id'])
                        ->where('id',$_POST['value'])
                        ->get();
                
                return json_encode(array('data'=>$valores));
            }else {
                if ($_POST['tipo'] == 'donante') {

                        $valores = DB::table('donantes')
                                ->select('ubicacion')
                                ->where('id_trabajos',$_POST['id'])
                                ->where('id',$_POST['value'])
                                ->get();
                        
                        return json_encode(array('data'=>$valores));
                }else{

                        $valores = DB::table('detalle_ordens')
                                ->select('localizacion')
                                ->where('id_trabajos',$_POST['id'])
                                ->where('id',$_POST['value'])
                                ->where('rol','<>','Dispositivo a Recuperar')
                                ->get();
                        
                        return json_encode(array('data'=>$valores));
                
                    }
                
            }
        }
    }


}