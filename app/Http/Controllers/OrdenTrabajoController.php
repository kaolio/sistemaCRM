<?php

namespace App\Http\Controllers;

use App\Exports\TrabajoExport;
use App\Models\OrdenTrabajo;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\DetalleOrden;
use App\Models\Imagen;
use App\Models\Roles;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel; 

class OrdenTrabajoController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver orden de trabajo|crear orden de trabajo|editar trabajo|borrar orden de trabajo|imprimir orden de trabajo|imprimir lista de trabajos|descargar lista excel|descargar lista PDF',['only'=>['index']]);
        $this->middleware('permission:crear orden de trabajo',['only'=>['create','store']]);
        $this->middleware('permission:editar orden de trabajo',['only'=>['edit','update']]);
        $this->middleware('permission:borrar orden de trabajo',['only'=>['destroy']]);
        $this->middleware('permission:imprimir orden de trabajo',['only'=>['imprimirOrden']]);
        $this->middleware('permission:imprimir lista de trabajos',['only'=>['imprimirPdf']]);
        $this->middleware('permission:descargar lista excel',['only'=>['descargarExcel']]);
        $this->middleware('permission:descargar lista PDF',['only'=>['descargarPDF']]);

    }
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $rol = DB::table('users')
                ->select('*')
                ->where('id','<>','1')
                ->get();
        $trabajo = DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','asignado','creado','orden_trabajos.created_at')
                    ->orderBy('orden_trabajos.id','desc')
                    ->get();

        return view('trabajo.index', compact('trabajo','rol'));
        
    }


    public function buscador(Request $request){
        $trabajo = OrdenTrabajo::where("Prioridad",'like','%'.$request->texto.'%')->get();
                               
        return view("/trabajo/paginas",compact("trabajo"));        
    }

    public function buscarClientes(){

        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $cif = $_POST["cif"];
        $telefono = $_POST["telefono"];

        if($nombre == ''){
            $nombre = "vacio";
        }
        if($correo == ''){
            $correo = "vacio";
        }
        if($cif == ''){
            $cif = "0000";
        }
        if($telefono == ''){
            $telefono = "0000";
        }

        $cliente = DB::table('clientes')
                ->select('*')
                ->where('nombreCliente', 'like', '%' . $nombre . '%')
                      ->orWhere('correo', 'like', '%' . $correo . '%')
                      ->orWhere('cif', 'like', '%' . $cif . '%')
                      ->orWhere('telefono', 'like', '%' . $telefono . '%')
                ->get();
        return json_encode(array('data'=>$cliente));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fabricante = DB::table('fabricantes')
        ->select('*')
        ->get();

        $fabricantes = DB::table('fabricantes')
        ->select('*')
        ->get();

        $dispositivo = DB::table('dispositivos')
                ->select('*')
                ->get();

        $dispositivos = DB::table('dispositivos')
                ->select('*')
                ->get();

        $malFuncionamiento = DB::table('mal_funcionamientos')
                ->select('*')
                ->get();

        $prioridad = DB::table('prioridads')
                ->select('*')
                ->get();

        $factor = DB::table('factor_formas')
                ->select('*')
                ->get();


        $cadena = Session::get('cadena');
        return view('trabajo.create',compact('cadena','fabricante','fabricantes','dispositivo','dispositivos','malFuncionamiento','prioridad','factor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Roles $roles)
    {
       try {
        
            $posicion_coincidencia = strpos($request->get('cliente'), ',');

            
        
                $cliente = substr($request->get('cliente'), 0, $posicion_coincidencia);

                $identificado = DB::table('clientes')
                                ->select('id')
                                ->where('nombreCliente','=',$cliente)
                                ->first();

            
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $acceso = substr(str_shuffle($permitted_chars), 0, 16);


            $datoTrabajo = new OrdenTrabajo;
            $datoTrabajo->id_cliente = $identificado->id;
            $datoTrabajo->prioridad = $request->get('prioridad');
            $datoTrabajo->tiempoEstimado = $request->get('tiempoEstimado');
            $datoTrabajo->estado = "Recibido";
            $datoTrabajo->informacion = $request->get('informacion');
            $datoTrabajo->datosImportantes = $request->get('dato');
            $datoTrabajo->nota = $request->get('nota');
            $datoTrabajo->asignado = '1';
            $datoTrabajo->creado = Auth::user()->name;
            $datoTrabajo->diagnostico = "No Actualizado";
            $datoTrabajo->bandera = "0";
            $datoTrabajo->password = $acceso;
            $datoTrabajo->lista_archivo = 'NO';
            $datoTrabajo->save();
            
            $trabajo = DB::table('orden_trabajos')
                    ->select('id')
                    ->where('bandera','=',"0")
                    ->first();

            $tipo = request('tipo');
            $rol = request('rol');
            $fabricante = request('fabricante');
            $modelo = request('modelo');
            $serial = request('serial');
            $capacidad = request('capacidad');
            $malFuncionamiento= request('malFuncionamiento');
            $localizacion = request('localizacion');

            for ($i=0; $i < sizeOf($tipo); $i++) { 
                $detalle = new DetalleOrden();
                $detalle->tipo = $tipo[$i];
                $detalle->rol = $rol[$i];
                $detalle->fabricante = $fabricante[$i];
                $detalle->modelo = $modelo[$i];
                $detalle->serial = $serial[$i];
                $detalle->capacidad = $capacidad[$i];
                $detalle->localizacion = $localizacion[$i];
                $detalle->mal_funcionamiento = $malFuncionamiento[$i];
                $detalle->diagnostico = "No Actualizado";
                $detalle->id_trabajos = $datoTrabajo->id;
                $detalle->save();
            }


            $file = $request->file('imagen');

            if ($file != null) {
                for ($i=0; $i < sizeof($file) ; $i++) { 
                    $nombre =  time()."_".$file[$i]->getClientOriginalName();//obtenemos el nombre del archivo

                    $ima = new Imagen();
                    $ima->nombre = $nombre;
                    $ima->id_trabajo = $datoTrabajo->id;
                    $ima->save();
                    
                    Storage::disk('imagenes')->put($nombre, File::get($file[$i]));//indicamos que queremos guardar un nuevo archivo en el disco local
                } 
            }


            /*DB::table('orden_trabajos')
                    ->where('id', $trabajo->id)
                    ->update(['bandera' => '1']);*/

                
            return view('trabajo.confirmacion',compact('trabajo','cliente','acceso'));

       } catch (\Throwable $th) {
            return view('errors.errorCreacionPartner');
       }
        
        //dd($cliente);
    }

    public function tiempoEstimado()
    {
        $prioridad = $_POST["prioridad"];

        $datos = DB::table('prioridads')
        ->select('tiempo_estimado')
        ->where('nombre_prioridad', $prioridad)
        ->first();

        return json_encode(array('data'=>$datos));
    }

    public function verConfirmacion(OrdenTrabajo $ordenTrabajo)
    {
        return redirect();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function show(OrdenTrabajo $ordenTrabajo)
    {
        //
    }

    public function imprimirOrden()
    {
        
        $contenedor = [];
        
            $variable = [];
            $datos = DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->select('clientes.nombreCliente','clientes.calle','clientes.provincia','clientes.created_at','orden_trabajos.password')
                ->where('orden_trabajos.id',$_POST["orden"])
                ->first(); 
            
            $ident = $_POST["orden"];

            $aux = [];
            $detalle = DB::table('orden_trabajos')
                ->join('detalle_ordens','detalle_ordens.id_trabajos','orden_trabajos.id')
                ->select('detalle_ordens.tipo','detalle_ordens.fabricante','detalle_ordens.modelo','detalle_ordens.serial')
                ->where('orden_trabajos.id', $_POST["orden"])
                ->get(); 
            
            array_push($variable, $ident);
            array_push($variable, $datos);
            foreach ($detalle as $detalle) {
                array_push($aux, $detalle);
            }
            array_push($variable, $aux);
            array_push($contenedor, $variable);
            

            $pdf = \PDF::loadView('/trabajo/reportes/ordenVarios',compact('contenedor'));
            
            return $pdf->setPaper('carta', 'portrait')->stream('orden.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdenTrabajo $trabajo,$id)
    {
        //dd($id);
        // OrdenTrabajo::destroy($id); 
        // return redirect('trabajos');
        $trabajo=OrdenTrabajo::findOrFail($id);
        $trabajo->delete();
                return redirect('trabajos');
    }

    function autoCompletar(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      
      /*if (Auth::user()->id == 1) {
            $data = DB::table('clientes')
                ->where('nombreCliente', 'LIKE', "{$query}%")
                ->get();
      } else {
           $data = DB::table('clientes')
                ->where('id_user',Auth::user()->id)
                ->where('nombreCliente', 'LIKE', "{$query}%")
                ->get(); 
      }*/
      $data = DB::table('clientes')
                ->where('nombreCliente', 'LIKE', "{$query}%")
                ->get();
      

      $output = '<datalist id="codigo">';
      foreach($data as $row)
      {
       $output .= '
       <option>'.$row->nombreCliente.', '.$row->calle.' '.$row->numero.', '.$row->codigoPostal.' '.$row->pais.'</option>
       ';
      }
      $output .= '</datalist>';
      echo $output;
     }
    }

    public function prioridad()
    {
        $usuario = DB::table('users')
                ->select('name')
                ->where('id',Auth::user()->id)
                ->first();
        if (Auth::user()->id != 1) {
            
            if ($_POST["orden"] =='Todos') {

                $datosTabla =  DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->join('users','users.id','orden_trabajos.asignado')
                ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                ->where('orden_trabajos.creado',$usuario->name)
                ->orWhere('orden_trabajos.asignado',Auth::user()->id)
                ->orderBy('orden_trabajos.id','desc')
                ->get();  
            }else{
                $datosTabla =  DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->join('users','users.id','orden_trabajos.asignado')
                ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                ->where('orden_trabajos.prioridad','=',$_POST["orden"])
                ->where(function($q) use($usuario) {
                    $q->where('orden_trabajos.creado',$usuario->name)
                      ->orWhere('orden_trabajos.asignado',Auth::user()->id);
                })
                ->orderBy('orden_trabajos.id','desc')
                ->get();


            }
        }else{

            if ($_POST["orden"] =='Todos') {
                $datosTabla =  DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->join('users','users.id','orden_trabajos.asignado')
                ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                ->orderBy('orden_trabajos.id','desc')
                ->get();
            }else{
                $datosTabla =  DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->join('users','users.id','orden_trabajos.asignado')
                ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                ->where('orden_trabajos.prioridad','=',$_POST["orden"])
                ->where(function($q) use($usuario) {
                    $q->where('orden_trabajos.creado',$usuario->name)
                      ->orWhere('orden_trabajos.asignado',Auth::user()->id);
                })
                ->orderBy('orden_trabajos.id','desc')
                ->get();
            }
        } 

        return json_encode(array('data'=>$datosTabla));
    }

    public function estado()
    {
        $usuario = DB::table('users')
                ->select('name')
                ->where('id',Auth::user()->id)
                ->first();
        if (Auth::user()->id != 1) {
            
            if ($_POST["orden"] =='Todos') {

                $datosTabla =  DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->join('users','users.id','orden_trabajos.asignado')
                ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                ->where('orden_trabajos.creado',$usuario->name)
                ->orWhere('orden_trabajos.asignado',Auth::user()->id)
                ->orderBy('orden_trabajos.id','desc')
                ->get();  
            }else{
                $datosTabla =  DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->join('users','users.id','orden_trabajos.asignado')
                ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                ->where('orden_trabajos.estado','=',$_POST["orden"])
                ->where(function($q) use($usuario) {
                    $q->where('orden_trabajos.creado',$usuario->name)
                      ->orWhere('orden_trabajos.asignado',Auth::user()->id);
                })
                ->orderBy('orden_trabajos.id','desc')
                ->get();


            }
        }else{

            if ($_POST["orden"] =='Todos') {
                $datosTabla =  DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->join('users','users.id','orden_trabajos.asignado')
                ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                ->orderBy('orden_trabajos.id','desc')
                ->get();
            }else{
                $datosTabla =  DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->join('users','users.id','orden_trabajos.asignado')
                ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                ->where('orden_trabajos.estado','=',$_POST["orden"])
                ->where(function($q) use($usuario) {
                    $q->where('orden_trabajos.creado',$usuario->name)
                      ->orWhere('orden_trabajos.asignado',Auth::user()->id);
                })
                ->orderBy('orden_trabajos.id','desc')
                ->get();
            }
        } 
        
        return json_encode(array('data'=>$datosTabla));
    }
 
    public function ingeniero()
    {

        $usuario = DB::table('users')
                ->select('name')
                ->where('id',Auth::user()->id)
                ->first();
        if (Auth::user()->id != 1) {
            
            if ($_POST["orden"] =='Todos los Ingenieros') {

                $datosTabla =  DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->join('users','users.id','orden_trabajos.asignado')
                ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                ->where('orden_trabajos.creado',$usuario->name)
                ->orWhere('orden_trabajos.asignado',Auth::user()->id)
                ->orderBy('orden_trabajos.id','desc')
                ->get();  
            }else{
                $datosTabla =  DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->join('users','users.id','orden_trabajos.asignado')
                ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                ->where('orden_trabajos.asignado','=',Auth::user()->id)
                ->orderBy('orden_trabajos.id','desc')
                ->get();
            }
        }else{

            if ($_POST["orden"] =='Todos los Ingenieros') {
                $datosTabla =  DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->join('users','users.id','orden_trabajos.asignado')
                ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                ->orderBy('orden_trabajos.id','desc')
                ->get();
            }else{
                $user = DB::table('users')
                            ->select('id')
                            ->where('name',$_POST["orden"])
                            ->first();

                $datosTabla =  DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->join('users','users.id','orden_trabajos.asignado')
                ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                ->where('orden_trabajos.creado',$_POST["orden"])
                ->orWhere('orden_trabajos.asignado',$user->id)
                ->orderBy('orden_trabajos.id','desc')
                ->get();
            }
        } 

        
        return json_encode(array('data'=>$datosTabla));
    }

    public function ver()
    {
        if (Auth::user()->id != 1) {
            $usuario = DB::table('users')
            ->select('name')
            ->where('id',Auth::user()->id)
            ->first();
            
            $datosTabla =  DB::table('orden_trabajos')
            ->join('clientes','clientes.id','orden_trabajos.id_cliente')
            ->join('users','users.id','orden_trabajos.asignado')
            ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
            ->Where('orden_trabajos.creado',$usuario->name)
            ->orWhere('orden_trabajos.asignado',Auth::user()->id)
            ->orderBy('orden_trabajos.id','desc')
            ->get();
        }else{
            $datosTabla =  DB::table('orden_trabajos')
            ->join('clientes','clientes.id','orden_trabajos.id_cliente')
            ->join('users','users.id','orden_trabajos.asignado')
            ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
            ->orderBy('orden_trabajos.id','desc')
            ->get();
        }
        
        
        return json_encode(array('data'=>$datosTabla));
    }

    public function buscaTiempoReal()
    {       $usuario = DB::table('users')
                ->select('name')
                ->where('id',Auth::user()->id)
                ->first();

            $datosTabla =  DB::table('orden_trabajos')
            ->join('clientes','clientes.id','orden_trabajos.id_cliente')
            ->join('users','users.id','orden_trabajos.asignado')
            ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
            ->where('clientes.nombreCliente', 'like', '%' . $_POST["value"] . '%')
            ->orWhere('orden_trabajos.id', 'like', '%' . $_POST["value"] . '%')
            ->orWhere('orden_trabajos.informacion', 'like', '%' . $_POST["value"] . '%')
            ->where(function($q) use($usuario) {
                $q->where('orden_trabajos.creado',$usuario->name)
                  ->orWhere('orden_trabajos.asignado',Auth::user()->id);
            })
            ->orderBy('orden_trabajos.id','desc')
            ->get();  
        
            
        return json_encode(array('data'=>$datosTabla));
    }

    public function redireccionar()
    {
        if ($_POST["grado"] != "Todos") {
            $datosTabla =  DB::table('orden_trabajos')
            ->join('clientes','clientes.id','orden_trabajos.id_cliente')
            ->join('users','users.id','orden_trabajos.asignado')
            ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
            ->where('orden_trabajos.prioridad','=',$_POST["grado"])
            ->orWhere('orden_trabajos.asignado',Auth::user()->id)
            ->orderBy('orden_trabajos.id','desc')
            ->get(); 
        } else {
            if ($_POST["estado"] != "Todos") {
                $datosTabla =  DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->join('users','users.id','orden_trabajos.asignado')
                        ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                        ->where('orden_trabajos.estado','=',$_POST["estado"])
                        ->orWhere('orden_trabajos.asignado',Auth::user()->id)
                        ->orderBy('orden_trabajos.id','desc')
                        ->get();
            } else {
                if ($_POST["ingeniero"] != "Todos los Ingenieros") {
                    $datosTabla =  DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->join('users','users.id','orden_trabajos.asignado')
                        ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                        ->where('orden_trabajos.asignado','=',$_POST["ingeniero"])
                        ->orWhere('orden_trabajos.asignado',Auth::user()->id)
                        ->orderBy('orden_trabajos.id','desc')
                        ->get();
                } else {
                    $datosTabla =  DB::table('orden_trabajos')
                            ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                            ->join('users','users.id','orden_trabajos.asignado')
                            ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                            ->orWhere('orden_trabajos.asignado',Auth::user()->id)
                            ->orderBy('orden_trabajos.id','desc')
                            ->get(); 
                }
                
            }
            
        }
        
        
        return json_encode(array('data'=>$datosTabla));
    }

    public function cambioPrioridadNueva()
    {

        for ($i=0; $i < sizeof($_POST['arreglo']); $i++) { 
            DB::table('orden_trabajos')
                ->where('id', $_POST['arreglo'][$i])
                ->update(['prioridad' => $_POST["seleccionado"]]);
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
    
        return json_encode(array('data'=>$datosTablas));
    }

    public function cambioEstadoNuevo()
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
    
        return json_encode(array('data'=>$datosTablas));
    }

    public function eliminarVarios()
    {

        for ($i=0; $i < sizeof($_POST['arreglo']); $i++) { 
            DB::table('orden_trabajos')
                ->where('id', $_POST['arreglo'][$i])
                ->delete();
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
    
        return json_encode(array('data'=>$datosTablas));
    }

    public function variosPDF()
    {
        //sizeof($_POST['arreglo'])  $_POST['arreglo'][$i]
        $contenedor = [];
        for ($i=0; $i < sizeof($_POST['arreglo']); $i++) {

            $variable = [];
            $datos = DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->select('clientes.nombreCliente','clientes.calle','clientes.provincia','clientes.created_at')
                ->where('orden_trabajos.id',$_POST['arreglo'][$i])
                ->first(); 
            
            $ident = $_POST['arreglo'][$i];

            $aux = [];
            $detalle = DB::table('orden_trabajos')
                ->join('detalle_ordens','detalle_ordens.id_trabajos','orden_trabajos.id')
                ->select('detalle_ordens.tipo','detalle_ordens.fabricante','detalle_ordens.modelo','detalle_ordens.serial')
                ->where('orden_trabajos.id', $_POST['arreglo'][$i])
                ->get(); 
            
            array_push($variable, $ident);
            array_push($variable, $datos);
            foreach ($detalle as $detalle) {
                array_push($aux, $detalle);
            }
            array_push($variable, $aux);
            array_push($contenedor, $variable);
        }

        //return json_encode(array('data'=>$contenedor));
            $pdf = \PDF::loadView('/trabajo/reportes/ordenVarios',compact('contenedor'));
            
            return $pdf->setPaper('carta', 'portrait')->stream('orden.pdf');
    }

    public function imprimirPdf(){
       
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
        $pdf = \PDF::loadView('/trabajo/reportes/pdf',compact('datosTablas'));
        return $pdf->setPaper('a4','landscape')->stream(); //mandar a imprimir la vista pdf en horizontal
    }

    public function descargarPDF(){
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

        $pdf = \PDF::loadView('/trabajo/reportes/pdf',compact('datosTablas'));
                              //ruta del archivo        envio de la variable de la db 
        return $pdf->setPaper('a4','landscape')->download('Reporte-Ordenes_de_trabajo.pdf');
                                                             //nombre del pdf a descargar
    }

    public function descargarExcel(Request $request){
        
        return Excel::download(new TrabajoExport, 'Reporte-Ordenes_Trabajo.xlsx');
    }

    public function general(){

        $urgente = DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                        ->where('prioridad','Urgente')
                        ->get(); 

        $recibido = DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                        ->where('estado','Recibido')
                        ->get(); 

        $proceso = DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                        ->where('estado','En Proceso')
                        ->get(); 


        $partes = DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                        ->where('estado','Esperando Piezas')
                        ->get(); 

        $terminado = DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                        ->where('estado','Trabajo Completo')
                        ->get(); 
        
        $pendiente = DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                        ->where('estado','Pago Pendiente')
                        ->get(); 
                        
        return view('trabajo.general',compact('urgente','recibido','proceso','partes','terminado','pendiente'));
    }
}

