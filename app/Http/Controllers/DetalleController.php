<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Clones;
use App\Models\Nota;
use App\Models\DetalleOrden;
use App\Models\Donantes;
use App\Models\Historial;
use App\Models\InicioSesion;
use App\Models\Servicio;
use Facade\FlareClient\Http\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Datatable;
use Psy\Command\WhereamiCommand;
use Spatie\Permission\Models\Role;

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

            $id = Crypt::decrypt($id);

            $rols_id = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
                    
            $rol_encontrado = Role::findById($rols_id->role_id)->name ;

            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo');

             $diagnosticoDesignado = DB::table('orden_trabajos')
                            ->select('diagnostico')
                            ->get();

            $recuperarDatos = DB::table('inventarios')
                            ->select('*')
                            ->get();

            $estados = DB::table('estados')
                            ->select('*')
                            ->get();
            
            $prioridad = DB::table('prioridads')
                            ->select('*')
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
                                    ->select('clientes.nombreCliente','clientes.cif','clientes.calle','clientes.codigoPostal','clientes.provincia','clientes.correo','clientes.numero','clientes.telefono', 'clientes.poblacion','clientes.idioma',
                                    'clientes.pais','clientes.nota','users.name','orden_trabajos.id_cliente','orden_trabajos.id','orden_trabajos.informacion','orden_trabajos.estado','orden_trabajos.prioridad','orden_trabajos.datosImportantes','orden_trabajos.nombre_archivo','orden_trabajos.password','orden_trabajos.lista_archivo','orden_trabajos.nota as notaOrden')
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
                                    ->where('id_trabajo','=',$id)
                                    ->get();

            $inicio_sesion = DB::table('inicio_sesions')
                                ->select('*')
                                ->where('id_trabajos','=',$id)
                                ->orderBy('id','desc')
                                ->paginate(10);

            $historial = DB::table('historials')
                                ->select('*')
                                ->where('id_trabajos','=',$id)
                                ->orderBy('id','desc')
                                ->paginate(10);

            $malFuncionamiento = DB::table('mal_funcionamientos')
                                ->select('*')
                                ->get();

            $dispositivosCargar = DB::table('dispositivos')
                                ->select('*')
                                ->get();

            $fabricantes = DB::table('fabricantes')
                                ->select('*')
                                ->get();

            $conexion = DB::table('tipo_conexions')
                                ->select('*')
                                ->get();

            $factor = DB::table('factor_formas')
                                ->select('*')
                                ->get();

             return view('trabajo.informacion.detalle',compact('orden_elegida','usuarioDesignado','notas','recuperarDatos','diagnosticoCambiado','recuperarDonante','imagenes','estados','prioridad','rol_encontrado','rolePermission','inicio_sesion','historial','malFuncionamiento','dispositivosCargar','fabricantes','conexion','factor'));

        } catch (\Throwable $th) {

            return view('errors.detalle');

        }

    }

    public function buscarOrden(){

        $rols = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
                    
            $rol = Role::findById($rols->role_id)->name ;
        if ($rol == 'ADMINISTRADOR') {
            $buscado = DB::table('orden_trabajos')
                        ->select('id')
                        ->where('id','=',$_POST["orden"])
                        ->exists();

        } else {
            
            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)'); 
            
            if ($rolePermission) {
                
                $buscado = DB::table('orden_trabajos')
                        ->select('id')
                        ->where('id','=',$_POST["orden"])
                        ->where(function($q) {
                            $q->where('creado',Auth::user()->name)
                              ->orWhere('orden_trabajos.asignado',Auth::user()->id);
                        })
                        ->exists();
                
            }else{
                
                $buscado = DB::table('orden_trabajos')
                        ->select('id')
                        ->where('id','=',$_POST["orden"])
                        ->exists();
            }
            
            
        }

        if ($buscado) {
            $ini_ses = new InicioSesion();
            $ini_ses->usuario = Auth::user()->name;
            $ini_ses->informacion = 'Inicio de Sesion';
            $ini_ses->id_trabajos = $_POST["orden"];
            $ini_ses->save(); 
        }

        $ordenes = [];
        
        $crip =Crypt::encrypt($_POST["orden"]);

        $ruta =  "/trabajos/detalle/".$crip;

        array_push($ordenes, $buscado, $ruta);

        

        return json_encode(array('data'=>$ordenes));
    }  

    public function datosNotas()
    {
        $nota = DB::table('notas')
                    ->select('*')
                    ->where('id_trabajos','=',$_POST["id"])
                    ->get();

        return json_encode(array('data'=>$nota));
    }

    public function guardarNota(){

            $nota = new Nota();
            $nota->creado = Auth::user()->name;
            $nota ->id_trabajos = $_POST["id"];
            $nota->nota = $_POST["comentario"];
            $nota->clienteInfo = " ";
            $nota->save();

            $ini_ses = new Historial();
            $ini_ses->usuario = Auth::user()->name;
            $ini_ses->informacion = 'Añadio un nuevo comentario'. $_POST["comentario"];
            $ini_ses->id_trabajos = $_POST["id"];
            $ini_ses->save(); 

            return json_encode(array('data'=>true));
                  
    }

    public function mostrarPrecio(){
        
        $precio = DB::table('servicios')
                ->where('id_trabajos','=',$_POST["nombre"])
                ->sum("precio");

                return json_encode(array('data'=>$precio));
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
        
        $ini_ses = new Historial();
        $ini_ses->usuario = Auth::user()->name;
        $ini_ses->informacion = 'Asigno Trabajo a '.$usuarioDesignado->name;
        $ini_ses->id_trabajos = $_POST["nombre"];
        $ini_ses->save(); 

        return json_encode(array('data'=>$usuarioDesignado));
                  
    }

    public function guardarEstado(){

        try {
            
            $ant = DB::table('orden_trabajos')
                    ->select('*')
                    ->where('id','=', $_POST["nombre"])
                    ->first();


            $ini_ses = new Historial();
            $ini_ses->usuario = Auth::user()->name;
            $ini_ses->informacion = 'Cambio el estado de '.$ant->estado.' a '.$_POST["selectEstado"];
            $ini_ses->id_trabajos = $_POST["nombre"];
            $ini_ses->save(); 


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

            $ant = DB::table('orden_trabajos')
                    ->select('prioridad')
                    ->where('id',$_POST["nombre"])
                    ->first();

            $pri = DB::table('prioridads')
                    ->select('*')
                    ->where('nombre_prioridad',$_POST["selectPrioridad"])
                    ->first();

            $text = 'Tiempo de Diagnostico '.$ant->prioridad;

            $serv = DB::table('servicios')
                    ->select('id')
                    ->where('detalle',$text)
                    ->where('id_trabajos',$_POST["nombre"])
                    ->first();
                    
            DB::table('orden_trabajos')
                    ->where('id','=', $_POST["nombre"])
                    ->update(['prioridad' => $_POST["selectPrioridad"]]);
            
            
            DB::table('servicios')
                    ->where('id','=', intval($serv->id))
                    ->update(['detalle' => 'Tiempo de Diagnostico '.$_POST["selectPrioridad"],
                              'descripcion' => $pri->tiempo_estimado,
                              'precio' => $pri->prioridad_precio]);

            $ini_ses = new Historial();
            $ini_ses->usuario = Auth::user()->name;
            $ini_ses->informacion = 'Cambio la prioridad de '.$ant->prioridad.' a '.$_POST["selectPrioridad"];
            $ini_ses->id_trabajos = $_POST["nombre"];
            $ini_ses->save(); 
        
                    return json_encode(array('data'=>true));

        } catch (\Throwable $th) {
            
               return json_encode(array('data'=>false));
        }
             
    }
 
    public function eliminarNotas()
    {
        $NotaE = DB::table('notas')
                    ->select('*')
                    ->where('id',$_POST["id"])
                    ->first();

        $nota=Nota::findOrFail($_POST["id"]);
        $nota->delete();

        $ini_ses = new Historial();
        $ini_ses->usuario = Auth::user()->name;
        $ini_ses->informacion = 'Elimino la nota : '.$NotaE->nota ;
        $ini_ses->id_trabajos = $NotaE->id_trabajos;
        $ini_ses->save(); 
        
        return json_encode(array('data'=>true));
    }

    public function eliminarDispositivoRecuperar()
    {
        $dis = DB::table('detalle_ordens')
                    ->select('*')
                    ->where('id',$_POST["id_detalle"])
                    ->first();

        $ini_ses = new Historial();
        $ini_ses->usuario = Auth::user()->name;
        $ini_ses->informacion = 'Elimino el registro del dispositivo : Tipo: '.$dis->tipo.' Rol: '.$dis->rol.' Fabricante: '.$dis->fabricante.' Modelo: '.$dis->modelo.' Serial: '.$dis->serial.' Capacidad: '.$dis->capacidad.' Mal Funcionamiento: '.$dis->mal_funcionamiento.' Localizacion: '.$dis->localizacion  ;
        $ini_ses->id_trabajos = $dis->id_trabajos;
        $ini_ses->save();

        $id_serv = DB::table('servicios')
                    ->select('id')
                    ->where('detalle',$dis->mal_funcionamiento)
                    ->where('id_trabajos',$dis->id_trabajos)
                    ->first();
        
        DB::table('servicios')->where('id', $id_serv->id)->delete();

        $dispositivo = DetalleOrden::findOrFail($_POST["id_detalle"]);
        $dispositivo -> delete();
        
        return json_encode(array('data'=>true)); 
    }

    public function eliminarDispositivOtro()
    {

        $dis = DB::table('detalle_ordens')
                    ->select('*')
                    ->where('id',$_POST["id_detalle"])
                    ->first();

        $ini_ses = new Historial();
        $ini_ses->usuario = Auth::user()->name;
        $ini_ses->informacion = 'Elimino el registro del dispositivo : Tipo: '.$dis->tipo.' Rol: '.$dis->rol.' Fabricante: '.$dis->fabricante.' Modelo: '.$dis->modelo.' Serial: '.$dis->serial.' Capacidad: '.$dis->capacidad.' Mal Funcionamiento: '.$dis->mal_funcionamiento.' Localizacion: '.$dis->localizacion  ;
        $ini_ses->id_trabajos = $dis->id_trabajos;
        $ini_ses->save();
        
        $id_serv = DB::table('servicios')
                    ->select('id')
                    ->where('detalle',$dis->mal_funcionamiento)
                    ->where('id_trabajos',$dis->id_trabajos)
                    ->first();
        
        DB::table('servicios')->where('id', $id_serv->id)->delete();

        $dispositivo = DetalleOrden::findOrFail($_POST["id_detalle"]);
        $dispositivo -> delete();
        
        return json_encode(array('data'=>true)); 
    }

    public function eliminarDispositivoDonante()
    {       
        $dispositivo = DB::table('donantes')
                    ->select('*')
                    ->where('id','=', $_POST["id_donante"])
                    ->first();

        $dispositivos = Donantes::findOrFail($_POST["id_donante"]);
        $dispositivos -> delete();

                   DB::table('inventarios')
                        ->where('id',$dispositivo->id_inventarios)
                        ->update(['estado' => 'Disponible']);

        $ini_ses = new Historial();
        $ini_ses->usuario = Auth::user()->name;
        $ini_ses->informacion = 'Elimino el registro del dispositivo : Tipo: '.$dispositivo->tipo.' Rol: Donante Fabricante: '.$dispositivo->manufactura.' Modelo: '.$dispositivo->modelo.' Serial: '.$dispositivo->numero_serie.' Localizacion: '.$dispositivo->ubicacion  ;
        $ini_ses->id_trabajos = $dispositivo->id_trabajos;
        $ini_ses->save(); 
        
        return json_encode(array('data'=>true)); 
    }

    public function eliminarDispositivoClon() 
    {
        $dispositivo = DB::table('clones')
                    ->select('*')
                    ->where('id','=', $_POST["id_clon"])
                    ->first();

                    
        if ($dispositivo->id_inventarios != null) {
           
            $dispositivos = Clones::findOrFail($_POST["id_clon"]);
            $dispositivos -> delete();

            DB::table('inventarios')
                    ->where('id',$dispositivo->id_inventarios)
                    ->update(['estado' => 'Disponible']);

        } else {
            
            $dispositivos = Clones::findOrFail($_POST["id_clon"]);
            $dispositivos -> delete();

        }

        $ini_ses = new Historial();
        $ini_ses->usuario = Auth::user()->name;
        $ini_ses->informacion = 'Elimino el registro del dispositivo: Tipo: '.$dispositivo->tipo.' Rol: Volcado Fabricante: '.$dispositivo->manufactura.' Modelo: '.$dispositivo->modelo.' Serial: '.$dispositivo->numero_serie.' Localizacion: '.$dispositivo->ubicacion.' Capacidad: '.$dispositivo->nota  ;
        $ini_ses->id_trabajos = $dispositivo->id_trabajos;
        $ini_ses->save(); 
        
   
        return json_encode(array('data'=>true)); 
    }


    
    public function datosPacientes(){

        $datosPacientes =  DB::table('detalle_ordens')
                    ->join('orden_trabajos','orden_trabajos.id','=','detalle_ordens.id_trabajos')
                    ->select('detalle_ordens.diagnostico','orden_trabajos.nota','detalle_ordens.tipo','detalle_ordens.rol','detalle_ordens.fabricante','detalle_ordens.modelo',
                            'detalle_ordens.serial','detalle_ordens.localizacion','detalle_ordens.id','detalle_ordens.capacidad','detalle_ordens.mal_funcionamiento')
                    ->where('detalle_ordens.id_trabajos','=',$_POST["nombre"])
                    ->where('detalle_ordens.rol','=','Dispositivo a Recuperar')
                    ->get();  

        $mal = DB::table('mal_funcionamientos')
                    ->select('*')
                    ->get();

        return json_encode(array(['data'=>$datosPacientes,'funcionamiento'=>$mal])); 
    }

    //tabla de otros disp de los clientes
    public function datosOtrosDispositivos(){

        $datosOtrosDispositivos =  DB::table('detalle_ordens')
                    ->join('orden_trabajos','orden_trabajos.id','=','detalle_ordens.id_trabajos')
                    ->select('detalle_ordens.diagnostico','orden_trabajos.nota','detalle_ordens.tipo','detalle_ordens.rol','detalle_ordens.fabricante','detalle_ordens.modelo',
                            'detalle_ordens.serial','detalle_ordens.localizacion','detalle_ordens.id','detalle_ordens.capacidad','detalle_ordens.mal_funcionamiento')
                    ->where('detalle_ordens.id_trabajos','=',$_POST["nombre"])
                    ->where('detalle_ordens.rol','<>','Dispositivo a Recuperar')
                    ->get();
                    
        $mal = DB::table('mal_funcionamientos')
                    ->select('*')
                    ->get();

        return json_encode(array('data'=>$datosOtrosDispositivos,'funcionamiento'=>$mal));
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

        $a = $_POST["idInternoClon"];
        $b = $_POST["modeloClon"];
        $c = $_POST["serieClon"];
        $d = $_POST["tamanoClon"];
        $e = $_POST["pcbClon"];
        
        $recuperarDatosClon = DB::table('inventarios')
                        ->select('*')
                        ->where('estado','=','Disponible')
                        ->where('rol','=','Datos')
                        ->where(function($q)use ($a,$b,$c,$d,$e) {
                            $q->where('id','=',$a)
                            ->orWhere('modelo','=',$b)
                            ->orWhere('numero_de_serie','=',$c)
                            ->orWhere('capacidad','=',$d)
                            ->orWhere('pbc','=',$e);
                        })
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
                $clon->id_clon = "VI-".$_POST["idBuscado"];
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

                $ini_ses = new Historial();
                $ini_ses->usuario = Auth::user()->name;
                $ini_ses->informacion = 'Agrego un nuevo dispositivo para Volcado de Tipo: '.$clon->tipo.' Fabricante: '.$clon->manufactura.' Modelo: '.$clon->modelo.' Serie: '.$clon->numero_serie.' Localizacion: '.$clon->ubicacion.' Factor de Forma: '.$clon->factor_forma.' Serie: '.$clon->numero_serie.' Capacidad: '.$clon->nota;
                $ini_ses->id_trabajos = $_POST["nombre"];
                $ini_ses->save(); 

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

        $a = $_POST["idInternoDonante"];
        $b = $_POST["modeloDonante"];
        $c = $_POST["serieDonante"];
        $d = $_POST["tamanoDonante"];
        $e = $_POST["pcbDonante"];
        
        $recuperarDatos = DB::table('inventarios')
                        ->select('*')
                        ->where('estado','=','Disponible')
                        ->where('rol','=','Donante')
                        ->where(function($q)use ($a,$b,$c,$d,$e) {
                            $q->where('id','=',$a)
                            ->orWhere('modelo','=',$b)
                            ->orWhere('numero_de_serie','=',$c)
                            ->orWhere('capacidad','=',$d)
                            ->orWhere('pbc','=',$e);
                        })
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
                $donante->id_donante = 'D-'.$_POST["idDonanteBuscado"];
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

                $ini_ses = new Historial();
                $ini_ses->usuario = Auth::user()->name;
                $ini_ses->informacion = 'Agrego un nuevo dispositivo donante de Tipo: '.$donante->tipo.' Fabricante: '.$donante->manufactura.' Modelo: '.$donante->modelo.' Serie: '.$donante->numero_serie.' Localizacion: '.$donante->ubicacion.' Serie: '.$donante->numero_serie.' Nota: '.$donante->nota;
                $ini_ses->id_trabajos =  $trabajo->id;
                $ini_ses->save(); 

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

        $diag = DB::table('detalle_ordens')
                ->select('diagnostico')
                ->where('id', $_POST["id_diagnostico"])
                ->first();

        DB::table('detalle_ordens')
                    ->where('id_trabajos', $_POST["id"])
                    ->where('id', $_POST["id_diagnostico"])
                    ->update(['diagnostico' => $_POST["seleccionado"]]);

        $ini_ses = new Historial();
        $ini_ses->usuario = Auth::user()->name;
        $ini_ses->informacion = 'Actualizo el estado del diagnostico de: '.$diag->diagnostico.' a '.$_POST["seleccionado"];
        $ini_ses->id_trabajos = $_POST["id"];
        $ini_ses->save();         
        
        return json_encode(array('data'=>true));
                  
    }


    public function ubicacionNueva(){

        
        if ($_POST["dispositivo"][0] != 'vacio') {
            for ($i=0; $i < sizeof($_POST['dispositivo']); $i++) { 

                    $ubi = DB::table('detalle_ordens')
                                ->select('localizacion')
                                ->where('id', $_POST['dispositivo'][$i])
                                ->first();

                    DB::table('detalle_ordens')
                    ->where('id', $_POST['dispositivo'][$i])
                    ->where('id_trabajos', $_POST['id'])
                    ->update(['localizacion' => $_POST["texto"]]);

                    $ini_ses = new Historial();
                    $ini_ses->usuario = Auth::user()->name;
                    $ini_ses->informacion = 'Movio el Dispositivo de la ubicacion: '.$ubi->localizacion.' a una nueva ubicacion: '.$_POST["texto"];
                    $ini_ses->id_trabajos = $_POST["id"];
                    $ini_ses->save();         
            };
        }  
        if ($_POST["clon"][0] != 'vacio') {
            for ($i=0; $i < sizeof($_POST['clon']); $i++) {
                
                $ubi = DB::table('clones')
                                ->select('ubicacion')
                                ->where('id', $_POST['clon'][$i])
                                ->first();

                DB::table('clones')
                ->where('id', $_POST['clon'][$i])
                ->where('id_trabajos', $_POST['id'])
                ->update(['ubicacion' => $_POST["texto"]]);

                $ini_ses = new Historial();
                $ini_ses->usuario = Auth::user()->name;
                $ini_ses->informacion = 'Movio el Dispositivo de la ubicacion: '.$ubi->ubicacion.' a una nueva ubicacion: '.$_POST["texto"];
                $ini_ses->id_trabajos = $_POST["id"];
                $ini_ses->save(); 
            };  
        }
        if ($_POST["donante"][0] != 'vacio') {
            for ($i=0; $i < sizeof($_POST['donante']); $i++) { 

                $ubi = DB::table('donantes')
                                ->select('ubicacion')
                                ->where('id', $_POST['donante'][$i])
                                ->first();

                DB::table('donantes')
                ->where('id', $_POST['donante'][$i])
                ->where('id_trabajos', $_POST['id'])
                ->update(['ubicacion' => $_POST["texto"]]);

                $ini_ses = new Historial();
                $ini_ses->usuario = Auth::user()->name;
                $ini_ses->informacion = 'Movio el Dispositivo de la ubicacion: '.$ubi->ubicacion.' a una nueva ubicacion: '.$_POST["texto"];
                $ini_ses->id_trabajos = $_POST["id"];
                $ini_ses->save(); 
            };     
        }
        if ($_POST["otros"][0] != 'vacio') {
            for ($i=0; $i < sizeof($_POST['otros']); $i++) {
                
                $ubi = DB::table('detalle_ordens')
                                ->select('localizacion')
                                ->where('id', $_POST['otros'][$i])
                                ->first();

                DB::table('detalle_ordens')
                            ->where('id', $_POST['otros'][$i])
                            ->where('id_trabajos', $_POST['id'])
                            ->where('rol','<>','Recuperacion de Datos')
                            ->update(['localizacion' => $_POST["texto"]]);

                $ini_ses = new Historial();
                $ini_ses->usuario = Auth::user()->name;
                $ini_ses->informacion = 'Movio el Dispositivo de la ubicacion: '.$ubi->localizacion.' a una nueva ubicacion: '.$_POST["texto"];
                $ini_ses->id_trabajos = $_POST["id"];
                $ini_ses->save(); 
            };     
        }
                
            

        return json_encode(array('data'=>true));

    }

    public function moverDispositivoRecuperar(){

        $ubi = DB::table('detalle_ordens')
                ->select('localizacion')
                ->where('id', $_POST["detalle"])
                ->first();

        DB::table('detalle_ordens')
                ->where('id_trabajos', $_POST["id"])
                ->where('id', $_POST["detalle"])
                ->where('rol','=','Dispositivo a Recuperar')
                ->update(['localizacion' => $_POST["loc"]]);

        $ini_ses = new Historial();
        $ini_ses->usuario = Auth::user()->name;
        $ini_ses->informacion = 'Movio el Dispositivo a Recuperar de la ubicacion: '.$ubi->localizacion.' a una nueva ubicacion: '.$_POST["loc"];
        $ini_ses->id_trabajos = $_POST["id"];
        $ini_ses->save(); 

         return json_encode(array('data'=>true));
    }

    public function moverDispositivOtro(){

        $ubi = DB::table('detalle_ordens')
                ->select('localizacion','rol')
                ->where('id', $_POST["detalle"])
                ->first();

        DB::table('detalle_ordens')
                ->where('id', $_POST["detalle"])
                ->update(['localizacion' => $_POST["loc"]]);

        $ini_ses = new Historial();
        $ini_ses->usuario = Auth::user()->name;
        $ini_ses->informacion = 'Movio el Dispositivo de '.$ubi->rol.' de la ubicacion: '.$ubi->localizacion.' a una nueva ubicacion: '.$_POST["loc"];
        $ini_ses->id_trabajos = $_POST["id"];
        $ini_ses->save(); 


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
                $detalle->capacidad = $_POST["capacidad"];
                $detalle->mal_funcionamiento = $_POST["funcionamiento"];
                $detalle->localizacion =$_POST["localizacion"];
                $detalle->diagnostico = "No Actualizado";
                $detalle->id_trabajos = $_POST["nombre"];
                $detalle->save();

                $ini_ses = new Historial();
                $ini_ses->usuario = Auth::user()->name;
                $ini_ses->informacion = 'Registro un nuevo dispositivo: Tipo: '.$_POST["tipo"].' Rol: '.$_POST["rol"].' Fabricante: '.$_POST["fabrica"].' Modelo: '.$_POST["modelo"].' Serial: '.$_POST["serial"].' Capacidad: '.$_POST["capacidad"].' Mal Funcionamiento: '.$_POST["funcionamiento"].' Localizacion: '.$_POST["localizacion"]  ;
                $ini_ses->id_trabajos = $_POST["nombre"];
                $ini_ses->save(); 

                $servicio = new Servicio();
                $servicio->detalle = $_POST["funcionamiento"];
                $servicio->descripcion = "Daño que Presenta el Dispositivo";
                $servicio->precio = $servicio->obtenerPrecioFuncionamiento($_POST["funcionamiento"]);
                $servicio->id_trabajos = $_POST["nombre"];
                $servicio->save();

                return json_encode(array('data'=>true));
            } catch (\Throwable $th) {
                return json_encode(array('data'=>false));
            }
            
  
    }

    public function guardarNuevoDispositivoVolcado(){
        
        try {
            
            $clon = new Clones();
            $clon->id_clon = "VC-".$clon->sumaCantidad()+1;
            $clon->tipo = $_POST["tipo"];
            $clon->manufactura = $_POST["fabrica"];
            $clon->modelo = $_POST["modelo"];
            $clon->numero_serie = $_POST["serial"];
            $clon->factor_forma = $_POST["factor"];
            $clon->id_trabajos = $_POST["id"];
            $clon->estado = "Ocupado";
            $clon->ocupado_hasta ="";
            $clon->ubicacion = $_POST["localizacion"];
            $clon->nota = $_POST["capacidad"];
            $clon->save();

            $ini_ses = new Historial();
            $ini_ses->usuario = Auth::user()->name;
            $ini_ses->informacion = 'Registro un nuevo dispositivo para volcado: Tipo: '.$_POST["tipo"].' Fabricante: '.$_POST["fabrica"].' Modelo: '.$_POST["modelo"].' Serial: '.$_POST["serial"].' Capacidad: '.$_POST["capacidad"].' Factor de Forma: '.$_POST["factor"].' Localizacion: '.$_POST["localizacion"]  ;
            $ini_ses->id_trabajos = $_POST["id"];
            $ini_ses->save();

            return json_encode(array('data'=>true));
        } catch (\Throwable $th) {
            return json_encode(array('data'=>false));
        }
        

}

    public function eliminarVariosC(){
        
        
        if ($_POST["dispositivo"][0] != 'vacio') {
            for ($i=0; $i < sizeof($_POST['dispositivo']); $i++) { 

                    $ubi = DB::table('detalle_ordens')
                                ->select('*')
                                ->where('id', $_POST['dispositivo'][$i])
                                ->first();

                    $dispositivos = DetalleOrden::findOrFail($_POST['dispositivo'][$i]);
                    $dispositivos -> delete();

                    $id_serv = DB::table('servicios')
                            ->select('id')
                            ->where('detalle',$ubi->mal_funcionamiento)
                            ->where('id_trabajos', $_POST["id"])
                            ->first();
        
                    DB::table('servicios')->where('id', $id_serv->id)->delete();

                    $ini_ses = new Historial();
                    $ini_ses->usuario = Auth::user()->name;
                    $ini_ses->informacion = 'Elimino el dispositivo a recuperar de Tipo: '.$ubi->tipo.' Fabricante:'.$ubi->fabricante.' Modelo:'.$ubi->modelo.' Serial:'.$ubi->serial.' Capacidad:'.$ubi->capacidad.' Daño:'.$ubi->mal_funcionamiento.' Localizacion:'.$ubi->localizacion ;
                    $ini_ses->id_trabajos = $_POST["id"];
                    $ini_ses->save();         
            }
            
        }  
        
        if ($_POST["clon"][0] != 'vacio') {
            for ($i=0; $i < sizeof($_POST['clon']); $i++) {
                
                $ubi = DB::table('clones')
                                ->select('*')
                                ->where('id', $_POST['clon'][$i])
                                ->first();
                                
                                
                if ($ubi->id_inventarios  != null) {

                    DB::table('inventarios')
                            ->where('id',$ubi->id_inventarios)
                            ->update(['estado' => 'Disponible']);
                    
                    $dispositivos = Clones::findOrFail($_POST['clon'][$i]);
                    $dispositivos -> delete();

                    $ini_ses = new Historial();
                    $ini_ses->usuario = Auth::user()->name;
                    $ini_ses->informacion = 'Elimino el dispositivo para volcado de Tipo: '.$ubi->tipo.' Fabricante:'.$ubi->manufactura.' Modelo:'.$ubi->modelo.' Serial:'.$ubi->numero_serie.' Factor de Forma:'.$ubi->factor_forma.' Localizacion:'.$ubi->ubicacion ;
                    $ini_ses->id_trabajos = $_POST["id"];
                    $ini_ses->save(); 

                } else {
                    
                    $dispositivos = Clones::findOrFail($_POST['clon'][$i]);
                    $dispositivos -> delete();

                    $ini_ses = new Historial();
                    $ini_ses->usuario = Auth::user()->name;
                    $ini_ses->informacion = 'Elimino el dispositivo para volcado de Tipo: '.$ubi->tipo.' Fabricante:'.$ubi->manufactura.' Modelo:'.$ubi->modelo.' Serial:'.$ubi->numero_serie.' Factor de Forma:'.$ubi->factor_forma.' Localizacion:'.$ubi->ubicacion ;
                    $ini_ses->id_trabajos = $_POST["id"];
                    $ini_ses->save(); 
                }
                 
            }
        }

        if ($_POST["donante"][0] != 'vacio') {
            for ($i=0; $i < sizeof($_POST['donante']); $i++) { 

                $ubi = DB::table('donantes')
                                ->select('*')
                                ->where('id', $_POST['donante'][$i])
                                ->first();

                if ($ubi->id_inventarios  != null) {

                    DB::table('inventarios')
                            ->where('id',$ubi->id_inventarios)
                            ->update(['estado' => 'Disponible']);
                    
                    $dispositivos = Donantes::findOrFail($_POST['donante'][$i]);
                    $dispositivos -> delete();

                    $ini_ses = new Historial();
                    $ini_ses->usuario = Auth::user()->name;
                    $ini_ses->informacion = 'Elimino el dispositivo donante de Tipo: '.$ubi->tipo.' Fabricante:'.$ubi->manufactura.' Modelo:'.$ubi->modelo.'  Serial:'.$ubi->numero_serie.' Nota:'.$ubi->nota.' Localizacion:'.$ubi->ubicacion ;
                    $ini_ses->id_trabajos = $_POST["id"];
                    $ini_ses->save(); 

                } else {
                    $dispositivos = Donantes::findOrFail($_POST['donante'][$i]);
                    $dispositivos -> delete();

                    $ini_ses = new Historial();
                    $ini_ses->usuario = Auth::user()->name;
                    $ini_ses->informacion = 'Elimino el dispositivo donante de Tipo: '.$ubi->tipo.' Fabricante:'.$ubi->manufactura.' Modelo:'.$ubi->modelo.' Serial:'.$ubi->numero_serie.' Nota:'.$ubi->nota.' Localizacion:'.$ubi->ubicacion ;
                    $ini_ses->id_trabajos = $_POST["id"];
                    $ini_ses->save(); 
                }
            }     
        }
        if ($_POST["otros"][0] != 'vacio') {
            for ($i=0; $i < sizeof($_POST['otros']); $i++) {
                
                $ubi = DB::table('detalle_ordens')
                            ->select('*')
                            ->where('id', $_POST['otros'][$i])
                            ->first();

                $dispositivos = DetalleOrden::findOrFail($_POST['otros'][$i]);
                $dispositivos -> delete();

                $id_serv = DB::table('servicios')
                            ->select('id')
                            ->where('detalle',$ubi->mal_funcionamiento)
                            ->where('id_trabajos', $_POST["id"])
                            ->first();
        
                    DB::table('servicios')->where('id', $id_serv->id)->delete();

                $ini_ses = new Historial();
                $ini_ses->usuario = Auth::user()->name;
                $ini_ses->informacion = 'Elimino el dispositivo de Tipo: '.$ubi->tipo.' Fabricante:'.$ubi->fabricante.' Modelo:'.$ubi->modelo.' Serial:'.$ubi->serial.' Capacidad:'.$ubi->capacidad.' Daño:'.$ubi->mal_funcionamiento.' Localizacion:'.$ubi->localizacion ;
                $ini_ses->id_trabajos = $_POST["id"];
                $ini_ses->save();
            }   
        }
                

            return json_encode(array('data'=>true));
    }
 
    public function actualizarDispositivo(){

        $tipos = DB::table('detalle_ordens')
                        ->select('*')
                        ->where('id_trabajos', $_POST["id"])
                        ->where('id', $_POST["id_detalle"])
                        ->first();

        $detalle = DetalleOrden::find($_POST["id_detalle"]);
        if ($_POST["tipo"] != null) {
            $detalle->tipo = $_POST["tipo"];
        } else {
            $detalle->tipo = $tipos->tipo;
            $_POST["tipo"]= $tipos->tipo;
        }
        if ($_POST["rol"] != null) {
            $detalle->rol = $_POST["rol"];
        } else {
            $detalle->rol = $tipos->rol;
            $_POST["rol"]= $tipos->rol;
        }
        if ($_POST["funcionamiento"] != null) {
            $detalle->mal_funcionamiento = $_POST["funcionamiento"];

            $id_servicio = DB::table('servicios')
                                ->select('id')
                                ->where('id_trabajos',$_POST["id"])
                                ->where('detalle',$tipos->mal_funcionamiento)
                                ->first();

            $servicio = Servicio::find($id_servicio->id);
            $servicio->detalle = $_POST["funcionamiento"];
            $servicio->precio = $servicio->obtenerPrecioFuncionamiento($_POST["funcionamiento"]);
            $servicio->update();

        } else {
            $detalle->mal_funcionamiento = $tipos->mal_funcionamiento;
            $_POST["funcionamiento"]= $tipos->mal_funcionamiento;
        }
        $detalle->fabricante = $_POST["fabricante"];
        $detalle->modelo = $_POST["modelo"];
        $detalle->serial = $_POST["serial"];
        $detalle->capacidad = $_POST["capacidad"];
        $detalle->localizacion = $_POST["localizacion"];
        $detalle->update();

        $ini_ses = new Historial();
        $ini_ses->usuario = Auth::user()->name;
        $ini_ses->informacion = 'Edito el dispositivo de: Tipo: '.$tipos->tipo.' Rol: '.$tipos->rol.' Fabricante: '.$tipos->fabricante.' Modelo: '.$tipos->modelo.' Serial: '.$tipos->serial.' Capacidad: '.$tipos->capacidad.' Mal Funcionamiento: '.$tipos->mal_funcionamiento.' Localizacion: '.$tipos->localizacion  ;
        $ini_ses->id_trabajos = $_POST["id"];
        $ini_ses->save(); 

        return json_encode(array('data'=>true));
    }
 
    public function actualizarDispositivOtro(){

        $tipos = DB::table('detalle_ordens')
                        ->select('*')
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
        if ($_POST["funcionamiento"] != null) {
            $detalle->mal_funcionamiento = $_POST["funcionamiento"];

            $id_servicio = DB::table('servicios')
                                ->select('id')
                                ->where('id_trabajos',$_POST["id"])
                                ->where('detalle',$tipos->mal_funcionamiento)
                                ->first();

            $servicio = Servicio::find($id_servicio->id);
            $servicio->detalle = $_POST["funcionamiento"];
            $servicio->precio = $servicio->obtenerPrecioFuncionamiento($_POST["funcionamiento"]);
            $servicio->update();

        } else {
            $detalle->mal_funcionamiento = $tipos->mal_funcionamiento;
        }
        $detalle->fabricante = $_POST["fabricante"];
        $detalle->modelo = $_POST["modelo"];
        $detalle->serial = $_POST["serial"];
        $detalle->localizacion = $_POST["localizacion"];
        $detalle->update();

        $ini_ses = new Historial();
        $ini_ses->usuario = Auth::user()->name;
        $ini_ses->informacion = 'Edito el dispositivo de: Tipo: '.$tipos->tipo.' Rol: '.$tipos->rol.' Fabricante: '.$tipos->fabricante.' Modelo: '.$tipos->modelo.' Serial: '.$tipos->serial.' Capacidad: '.$tipos->capacidad.' Mal Funcionamiento: '.$tipos->mal_funcionamiento.' Localizacion: '.$tipos->localizacion  ;
        $ini_ses->id_trabajos = $_POST["id"];
        $ini_ses->save(); 

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

    public function actualizarCliente(){

            $cliente = DB::table('clientes')
                        ->select('*')
                        ->where('id',$_POST["id_cliente"])
                        ->first();
        
            $datoCliente = Cliente::find($_POST["id_cliente"]);
            $datoCliente->nombreCliente = $_POST["nombre"];
            $datoCliente->correo = $_POST["correo"];
            $datoCliente->calle = $_POST["direccion"];
            $datoCliente->cif = $_POST["cif"];
            $datoCliente->numero = $_POST["movil"];
            $datoCliente->telefono = $_POST["telefono"];
            $datoCliente->codigoPostal = $_POST["postal"];
            $datoCliente->poblacion = $_POST["poblacion"];
            $datoCliente->provincia = $_POST["provincia"];
            $datoCliente->pais = $_POST["ciudad"];
            $datoCliente->update();

            $ini_ses = new Historial();
            $ini_ses->usuario = Auth::user()->name;
            $ini_ses->informacion = 'Actualizo datos del cliente de: Nombre: '.$cliente->nombreCliente.' Correo: '.$cliente->correo.' Direccion: '.$cliente->calle.' CIF: '.$cliente->cif.' Celular: '.$cliente->numero.' Telefono: '.$cliente->telefono.' Codigo Postal: '.$cliente->codigoPostal.' Poblacion: '.$cliente->poblacion.' Provincia: '.$cliente->provincia.' Pais: '.$cliente->pais  ;
            $ini_ses->id_trabajos = $_POST["id"];
            $ini_ses->save(); 
    
            return json_encode(array('data'=>true));
                
    }


}