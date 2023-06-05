<?php

namespace App\Http\Controllers;

use App\Exports\TrabajoExport;
use App\Models\OrdenTrabajo;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Clones;
use App\Models\DetalleOrden;
use App\Models\Imagen;
use App\Models\Productos;
use App\Models\Roles;
use App\Models\Servicio;
use PDF;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class OrdenTrabajoController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver orden de trabajo|crear orden de trabajo|editar trabajo|borrar orden de trabajo|imprimir orden de trabajo|imprimir lista de trabajos|lista de trabajos excel|lista de trabajos PDF',['only'=>['index']]);
        $this->middleware('permission:crear orden de trabajo',['only'=>['create','store']]);
        $this->middleware('permission:editar orden de trabajo',['only'=>['edit','update']]);
        $this->middleware('permission:borrar orden de trabajo',['only'=>['destroy']]);
        $this->middleware('permission:imprimir orden de trabajo',['only'=>['variosPDF']]);
        $this->middleware('permission:imprimir lista de trabajos',['only'=>['imprimirPdf']]);
        $this->middleware('permission:lista de trabajos excel',['only'=>['descargarExcel']]);
        $this->middleware('permission:lista de trabajos PDF',['only'=>['descargarPDF']]);

    }
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $rols_id = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
                    
        $rol_encontrado = Role::findById($rols_id->role_id)->name ;
        $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');
        
        $rol = DB::table('users')
                ->select('*')
                ->where('id','<>','1')
                ->get();
        $trabajo = DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','asignado','creado','orden_trabajos.created_at')
                    ->orderBy('orden_trabajos.id','desc')
                    ->get();

        $prioridad = DB::table('prioridads')
                ->select('nombre_prioridad')
                ->get();
            
        $prioridads = DB::table('prioridads')
                ->select('nombre_prioridad')
                ->get();

        return view('trabajo.index', compact('trabajo','rol','prioridad','prioridads','rol_encontrado','rolePermission'));
        
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


        $rols = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
                    
        $rol = Role::findById($rols->role_id)->name ;

        if ($rol == 'ADMINISTRADOR') {

            if ($nombre != "") {
                $cliente = DB::table('clientes')
                        ->select('*')
                        ->where('nombreCliente', 'like', '%' . $nombre . '%')
                        ->get();
                return json_encode(array('data'=>$cliente));
            }

            if ($correo != "") {
                $cliente = DB::table('clientes')
                        ->select('*')
                        ->where('correo', 'like', '%' . $correo . '%')
                        ->get();
                return json_encode(array('data'=>$cliente));
            }

            if ($cif != "") {
                $cliente = DB::table('clientes')
                        ->select('*')
                        ->where('cif', 'like', '%' . $cif . '%')
                        ->get();
                return json_encode(array('data'=>$cliente));
            }

            if ($telefono != "") {
                $cliente = DB::table('clientes')
                        ->select('*')
                        ->where('telefono', 'like', '%' . $telefono . '%')
                        ->get();
                return json_encode(array('data'=>$cliente));
            }

        }else{

            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)'); 
            
            if ($rolePermission) {

                if ($nombre != "") {
                    $cliente = DB::table('clientes')
                            ->select('*')
                            ->where('id_user',Auth::user()->id)
                            ->where('nombreCliente', 'like', '%' . $nombre . '%')
                            ->get();
                    return json_encode(array('data'=>$cliente));
                }
    
                if ($correo != "") {
                    $cliente = DB::table('clientes')
                            ->select('*')
                            ->where('id_user',Auth::user()->id)
                            ->where('correo', 'like', '%' . $correo . '%')
                            ->get();
                    return json_encode(array('data'=>$cliente));
                }
    
                if ($cif != "") {
                    $cliente = DB::table('clientes')
                            ->select('*')
                            ->where('id_user',Auth::user()->id)
                            ->where('cif', 'like', '%' . $cif . '%')
                            ->get();
                    return json_encode(array('data'=>$cliente));
                }
    
                if ($telefono != "") {
                    $cliente = DB::table('clientes')
                            ->select('*')
                            ->where('id_user',Auth::user()->id)
                            ->where('telefono', 'like', '%' . $telefono . '%')
                            ->get();
                    return json_encode(array('data'=>$cliente));
                }
                

            }else{

                if ($nombre != "") {
                    $cliente = DB::table('clientes')
                            ->select('*')
                            ->where('nombreCliente', 'like', '%' . $nombre . '%')
                            ->get();
                    return json_encode(array('data'=>$cliente));
                }
    
                if ($correo != "") {
                    $cliente = DB::table('clientes')
                            ->select('*')
                            ->where('correo', 'like', '%' . $correo . '%')
                            ->get();
                    return json_encode(array('data'=>$cliente));
                }
    
                if ($cif != "") {
                    $cliente = DB::table('clientes')
                            ->select('*')
                            ->where('cif', 'like', '%' . $cif . '%')
                            ->get();
                    return json_encode(array('data'=>$cliente));
                }
    
                if ($telefono != "") {
                    $cliente = DB::table('clientes')
                            ->select('*')
                            ->where('telefono', 'like', '%' . $telefono . '%')
                            ->get();
                    return json_encode(array('data'=>$cliente));
                }

            }

        }

        $cliente = [];
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

        $conexion = DB::table('tipo_conexions')
                ->select('*')
                ->get();



        $cadena = Session::get('cadena');
        return view('trabajo.create',compact('cadena','fabricante','fabricantes','dispositivo','dispositivos','malFuncionamiento','prioridad','factor', 'conexion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Roles $roles)
    {

        
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
            $datoTrabajo->estado = "Registrado";
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
            $servicio = new Servicio();
            
            $servicio->detalle = "Tiempo de Diagnostico ".$request->get('prioridad');
            $servicio->descripcion = $request->get('tiempoEstimado');
            $servicio->precio = $servicio->obtenerPrecioPrioridad($request->get('prioridad'));
            $servicio->id_trabajos = $datoTrabajo->id;
            $servicio->save();

            $trabajo = $datoTrabajo->id;

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

                $servicio = new Servicio();
                $servicio->detalle = $malFuncionamiento[$i];
                $servicio->descripcion = "Daño que Presenta el Dispositivo";
                $servicio->precio = $servicio->obtenerPrecioFuncionamiento($malFuncionamiento[$i]);
                $servicio->id_trabajos = $datoTrabajo->id;
                $servicio->save();
            }

            

            $tipoVolcado = request('tipoVolcado');
            $fabricanteVolcado = request('fabricanteVolcado');
            $factorVolcado = request('factorVolcado');
            $modeloVolcado = request('modeloVolcado');
            $serieVolcado = request('serieVolcado');
            $conexionVolcado = request('conexionVolcado');
            $capacidadVolcado = request('capacidadVolcado');

            if ($tipoVolcado != null && $fabricanteVolcado != null && $factorVolcado != null && $modeloVolcado != null && $serieVolcado != null && $capacidadVolcado != null) {
                
                for ($i=0; $i < sizeOf($tipoVolcado); $i++) { 

                    $clon = new Clones();
                    $clon->id_clon = "VC-".$clon->sumaCantidad()+1;
                    $clon->tipo = $tipoVolcado[$i];
                    $clon->manufactura = $fabricanteVolcado[$i];
                    $clon->modelo = $modeloVolcado[$i];
                    $clon->numero_serie = $serieVolcado[$i];
                    $clon->factor_forma = $factorVolcado[$i];
                    $clon->id_trabajos = $datoTrabajo->id;
                    $clon->estado = 'Ocupado';
                    $clon->ubicacion = 'Sin Especificar';
                    $clon->nota = 'tipo de conexión '.$conexionVolcado[$i];
                    $clon->save();
                
                }
                
            }

            $file = $request->file('imagen');

            if ($file != null) {
                for ($i=0; $i < sizeof($file) ; $i++) { 
                    //$nombre =  time()."_".$file[$i]->getClientOriginalName();//obtenemos el nombre del archivo
                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $nombre = substr(str_shuffle($permitted_chars), 0, 10);

                    $ima = new Imagen();
                    $ima->nombre = $datoTrabajo->id."-".$nombre;
                    $ima->id_trabajo = $datoTrabajo->id;
                    $ima->save();
                    //storage::disk('imagenes')->put($nombre, File::get($file[$i]));//indicamos que queremos guardar un nuevo archivo en el disco local
                    $file[$i]->move(base_path('public/imagenes-caso/'),  $datoTrabajo->id."-".$nombre.'.jpg');
                } 
            }

            $rols = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
            $rol = Role::findById($rols->role_id)->name ;
            return view('trabajo.confirmacion',compact('trabajo','cliente','acceso','rol'));

       
        
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

    public function imprimirOrden($id)
    {

        $id = Crypt::decrypt($id);
        $contenedor = [];
        
            $variable = [];
            $datos = DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->select('clientes.nombreCliente','clientes.calle','clientes.provincia','clientes.created_at','orden_trabajos.password')
                ->where('orden_trabajos.id',$id)
                ->first(); 
            
            $ident = $id;

            $aux = [];
            $detalle = DB::table('orden_trabajos')
                ->join('detalle_ordens','detalle_ordens.id_trabajos','orden_trabajos.id')
                ->select('detalle_ordens.tipo','detalle_ordens.fabricante','detalle_ordens.modelo','detalle_ordens.serial')
                ->where('orden_trabajos.id', $id)
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

    public function imprimirContrato($id)
    {
        $id = Crypt::decrypt($id);

        $contenedor = [];
        
            $variable = [];
            $datos = DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->select('clientes.nombreCliente','clientes.calle','clientes.poblacion','clientes.cif','clientes.numero',
                'orden_trabajos.id','orden_trabajos.created_at','orden_trabajos.prioridad')
                ->where('orden_trabajos.id',$id)
                ->first(); 

            $precio_prioridad = DB::table('prioridads')
                ->select('prioridad_precio')
                ->where('prioridads.nombre_prioridad',$datos->prioridad)
                ->first();

            $aux = [];
            $detalle = DB::table('detalle_ordens')
                ->select('*')
                ->where('detalle_ordens.id_trabajos', $id)
                ->first(); 

            $precio_mal_funcionamiento = DB::table('mal_funcionamientos')
                ->select('mal_funcio_precio')
                ->where('mal_funcionamiento',  $detalle->mal_funcionamiento)
                ->first();
                
            $total = $precio_prioridad->prioridad_precio + $precio_mal_funcionamiento->mal_funcio_precio;
            
            array_push($variable, $datos);
            array_push($variable, $precio_prioridad);
            array_push($variable, $precio_mal_funcionamiento);
            array_push($variable, $total);

            foreach ($detalle as $detalle) {
                array_push($aux, $detalle);
            }
            array_push($variable, $aux);
            array_push($contenedor, $variable);
            
            //dd($contenedor);

            $pdf = \PDF::loadView('/trabajo/reportes/contrato',compact('contenedor'));
            
            return $pdf->setPaper('A4', 'portrait')->stream('contrato.pdf');
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
        $archivo = DB::table('imagens')
                            ->select('*')
                            ->where('id_trabajo',$id)
                            ->get();
        foreach ($archivo as $item) {
            File::delete('imagenes-caso/'.$item->nombre.'.jpg');
        }

        DB::table('imagens')->where('id_trabajo',$id)->delete();


        $file_list = DB::table('orden_trabajos')
                    ->select('nombre_archivo')
                    ->where('id',$id)
                    ->first();

        if ($file_list->nombre_archivo != null) {
            Storage::delete('public/archivos/'.$file_list->nombre_archivo.'.html');
        }

        
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
        $rols = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
                    
        $rol = Role::findById($rols->role_id)->name ;

        if ($rol == 'ADMINISTRADOR') {
            
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
                /*->where(function($q) use($usuario) {
                    $q->where('orden_trabajos.creado',$usuario->name)
                      ->orWhere('orden_trabajos.asignado',Auth::user()->id);
                })*/
                ->orderBy('orden_trabajos.id','desc')
                ->get();
            }
        }else{
            
            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {
                if ($_POST["orden"] =='Todos') {
                    
                     $datosTabla =  DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->join('users','users.id','orden_trabajos.asignado')
                        ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                        //->where('orden_trabajos.prioridad','=',$_POST["orden"])
                        ->where(function($q) use($usuario) {
                            $q->where('orden_trabajos.creado',$usuario->name);
                            /*->orWhere('orden_trabajos.asignado',Auth::user()->id);*/
                        })
                        ->orderBy('orden_trabajos.id','desc')
                        ->get();
                    
                    
                }else{
                    
                     $datosTabla =  DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->join('users','users.id','orden_trabajos.asignado')
                        ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                        ->where('orden_trabajos.prioridad','=',$_POST["orden"])
                        ->where(function($q) use($usuario) {
                            $q->where('orden_trabajos.creado',$usuario->name);
                            /*->orWhere('orden_trabajos.asignado',Auth::user()->id);*/
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
                        //->where('orden_trabajos.prioridad','=',$_POST["orden"])
                        /*->where(function($q) use($usuario) {
                            $q->where('orden_trabajos.creado',$usuario->name)
                            ->orWhere('orden_trabajos.asignado',Auth::user()->id);
                        })*/
                        ->orderBy('orden_trabajos.id','desc')
                        ->get();
                     
                 }else{
                     
                     $datosTabla =  DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->join('users','users.id','orden_trabajos.asignado')
                        ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                        ->where('orden_trabajos.prioridad','=',$_POST["orden"])
                        /*->where(function($q) use($usuario) {
                            $q->where('orden_trabajos.creado',$usuario->name)
                            ->orWhere('orden_trabajos.asignado',Auth::user()->id);
                        })*/
                        ->orderBy('orden_trabajos.id','desc')
                        ->get();
                     
                 }
                
                
            }
        }

        return json_encode(array('data'=>$datosTabla));
    }

    public function estado()
    {
        $rols = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
                    
        $rol = Role::findById($rols->role_id)->name ;

        if ($rol == 'ADMINISTRADOR') {
            
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
                /*->where(function($q) use($usuario) {
                    $q->where('orden_trabajos.creado',$usuario->name)
                      ->orWhere('orden_trabajos.asignado',Auth::user()->id);
                })*/
                ->orderBy('orden_trabajos.id','desc')
                ->get();
                
            }
        }else{
            
            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {
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
                            //->where('orden_trabajos.creado',$usuario->name)
                            //->orWhere('orden_trabajos.asignado',Auth::user()->id)
                            ->orderBy('orden_trabajos.id','desc')
                            ->get(); 
                     
                 }else{
                     
                    $datosTabla =  DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->join('users','users.id','orden_trabajos.asignado')
                    ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                    ->where('orden_trabajos.estado','=',$_POST["orden"])
                    /*->where(function($q) use($usuario) {
                        $q->where('orden_trabajos.creado',$usuario->name)
                          ->orWhere('orden_trabajos.asignado',Auth::user()->id);
                    })*/
                    ->orderBy('orden_trabajos.id','desc')
                    ->get();
                     
                 }
                
                
            }
        }

        
        return json_encode(array('data'=>$datosTabla));
    }
 
    public function ingeniero()
    {

        $rols = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
                    
        $rol = Role::findById($rols->role_id)->name ;

        if ($rol == 'ADMINISTRADOR') {
            
            if ($_POST["orden"] =='Todos los Ingenieros') {
                
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
                        ->where('orden_trabajos.creado',$_POST["orden"])
                        ->orderBy('orden_trabajos.id','desc')
                        ->get();
                        
            }
        }else{
            
            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {
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
                                ->where('orden_trabajos.creado',$usuario->name)
                                ->orWhere('orden_trabajos.asignado',Auth::user()->id)
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
                     
                    $datosTabla =  DB::table('orden_trabajos')
                            ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                            ->join('users','users.id','orden_trabajos.asignado')
                            ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                            ->where('orden_trabajos.creado',$_POST["orden"])
                            ->orderBy('orden_trabajos.id','desc')
                            ->get();
                    
                 }
                
                
            }
        }

        
        return json_encode(array('data'=>$datosTabla));
    }

    public function ver()
    {

        $rols = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
                    
        $rol = Role::findById($rols->role_id)->name ;

        if ($rol == 'ADMINISTRADOR') {
            $datosTabla =  DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->join('users','users.id','orden_trabajos.asignado')
                    ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                    ->orderBy('orden_trabajos.id','desc')
                    ->get();

        }else{

            /*$rolePermission = DB::table('role_has_permissions')
                    ->where('role_id',Auth::user()->id)
                    ->where('permission_id',11)
                    ->exists();*/
                    
            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');
            //$rolePermission = Auth::user()->hasRole('ver orden de trabajo(Personal)');
                //return json_encode(array('data'=>$rolePermission));

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {
                $datosTabla =  DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->join('users','users.id','orden_trabajos.asignado')
                    ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                    ->Where('orden_trabajos.creado',$usuario->name)
                    ->orWhere('orden_trabajos.asignado',Auth::user()->id)
                    ->orderBy('orden_trabajos.id','desc')
                    ->get();
            } else {
                $datosTabla =  DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->join('users','users.id','orden_trabajos.asignado')
                    ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                    //->Where('orden_trabajos.creado',$usuario->name)
                    //->orWhere('orden_trabajos.asignado',Auth::user()->id)
                    ->orderBy('orden_trabajos.id','desc')
                    ->get();
            }
            
        }
        
        
        return json_encode(array('data'=>$datosTabla));
    }

    public function buscaTiempoReal()
    {       $usuario = DB::table('users')
                ->select('name')
                ->where('id',Auth::user()->id)
                ->first();
            
            $a = $_POST["value"];

            $datosTabla =  DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->join('users','users.id','orden_trabajos.asignado')
                    ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                    ->where(function($q) use($usuario) {
                        $q->where('orden_trabajos.creado',$usuario->name)
                        ->orWhere('orden_trabajos.asignado',Auth::user()->id);
                    })
                    ->where(function($q) use($a) {
                        $q->where('clientes.nombreCliente', 'like', '%' . $a . '%')
                        ->orWhere('orden_trabajos.id', 'like', '%' . $a . '%')
                        ->orWhere('orden_trabajos.informacion', 'like', '%' . $a . '%');
                        
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


            $archivo = DB::table('imagens')
                            ->select('*')
                            ->where('id_trabajo',$_POST['arreglo'][$i])
                            ->get();
            foreach ($archivo as $item) {
                File::delete('imagenes-caso/'.$item->nombre.'.jpg');
            }

            DB::table('imagens')->where('id_trabajo',$_POST['arreglo'][$i])->delete();


            $file_list = DB::table('orden_trabajos')
                        ->select('nombre_archivo')
                        ->where('id',$_POST['arreglo'][$i])
                        ->first();

            if ($file_list->nombre_archivo != null) {
                Storage::delete('public/archivos/'.$file_list->nombre_archivo.'.html');
            }


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

    public function variosPDF($id)
    {
        //sizeof($_POST['arreglo'])  $_POST['arreglo'][$i]

        $contenedor = [];
        
            $variable = [];
            $datos = DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->select('clientes.nombreCliente','clientes.calle','clientes.provincia','clientes.created_at','orden_trabajos.password')
                ->where('orden_trabajos.id',$id)
                ->first(); 
            
            $ident = $id;

            $aux = [];
            $detalle = DB::table('orden_trabajos')
                ->join('detalle_ordens','detalle_ordens.id_trabajos','orden_trabajos.id')
                ->select('detalle_ordens.tipo','detalle_ordens.fabricante','detalle_ordens.modelo','detalle_ordens.serial')
                ->where('orden_trabajos.id', $id)
                ->get(); 
            
            array_push($variable, $ident);
            array_push($variable, $datos);
            foreach ($detalle as $detalle) {
                array_push($aux, $detalle);
            }
            array_push($variable, $aux);
            array_push($contenedor, $variable);
            /*
        $contenedor = [];
        for ($i=0; $i < sizeof($_POST['arreglo']); $i++) {

            $variable = [];
            $datos = DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->select('clientes.nombreCliente','clientes.calle','clientes.provincia','clientes.created_at','orden_trabajos.password')
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
        }*/

        //return json_encode(array('data'=>$contenedor));
            $pdf = \PDF::loadView('/trabajo/reportes/ordenVarios',compact('contenedor'));
            
            return $pdf->setPaper('carta', 'portrait')->download('orden.pdf');
    }

    public function imprimirPdf(){
       
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


        }else{
            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {

                if (Auth::user()->hasPermissionTo('imprimir lista de trabajos')) {
                    $datosTablas =  DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->join('users','users.id','orden_trabajos.asignado')
                        ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                        ->Where('orden_trabajos.creado',$usuario->name)
                        ->orWhere('orden_trabajos.asignado',Auth::user()->id)
                        ->orderBy('orden_trabajos.id','desc')
                        ->get();
                }

                

            }else{

                if (Auth::user()->hasPermissionTo('imprimir lista de trabajos')) {
                    $datosTablas =  DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->join('users','users.id','orden_trabajos.asignado')
                        ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                        ->orderBy('orden_trabajos.id','desc')
                        ->get();
                } 

            }
        }
        $pdf = \PDF::loadView('/trabajo/reportes/pdf',compact('datosTablas'));
        return $pdf->setPaper('a4','landscape')->stream(); //mandar a imprimir la vista pdf en horizontal
    }

    public function descargarPDF(){

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
                    

        }else{
            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {

                if (Auth::user()->hasPermissionTo('lista de trabajos PDF')) {

                    $datosTablas =  DB::table('orden_trabajos')
                            ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                            ->join('users','users.id','orden_trabajos.asignado')
                            ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                            ->Where('orden_trabajos.creado',$usuario->name)
                            ->orWhere('orden_trabajos.asignado',Auth::user()->id)
                            ->orderBy('orden_trabajos.id','desc')
                            ->get();
                }
                
            }else{

                if (Auth::user()->hasPermissionTo('lista de trabajos PDF')) {

                    $datosTablas =  DB::table('orden_trabajos')
                            ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                            ->join('users','users.id','orden_trabajos.asignado')
                            ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
                            ->orderBy('orden_trabajos.id','desc')
                            ->get();

                }

            }
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

