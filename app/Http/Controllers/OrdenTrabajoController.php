<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\DetalleOrden;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrdenTrabajoController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-trabajo|crear-trabajo|editar-trabajo|borrar-trabajo',['only'=>['index']]);
        $this->middleware('permission:crear-trabajo',['only'=>['create','store']]);
        $this->middleware('permission:editar-trabajo',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-trabajo',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda=trim($request->get('busqueda'));
        $trabajo = DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','asignado','creado','orden_trabajos.created_at')
                    ->where('nombreCliente', 'LIKE', '%'.$busqueda.'%')
                    ->orWhere('asignado', 'LIKE', '%'.$busqueda.'%')
                    ->orWhere('orden_trabajos.id', 'LIKE', '%'.$busqueda.'%')
                    ->orderBy('orden_trabajos.id','asc')
                    ->paginate(10);

        /*$trabajo=DB::table('orden_trabajos')
                        ->select('id')
                        ->where('Modelo', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('Serial', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('Prioridad', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('id', 'LIKE', '%'.$busqueda.'%')
                        ->orderBy('id','asc')
                        ->paginate(10);*/
        //$datoTrabajo['trabajos']=OrdenTrabajo::paginate(10);
        return view('trabajo.index', compact('busqueda','trabajo'));
        
    }


    public function descargarPDF(){
        $trabajo = OrdenTrabajo::all();
        $pdf = \PDF::loadView('/trabajo/pdf',compact('trabajo'));
                              //ruta del archivo        envio de la variable de la db 
        return $pdf->setPaper('a4','landscape')->download('Reporte-Trabajo.pdf');
                                                             //nombre del pdf a descargar
    }

    public function descargarItemPdf($id){
        $trabajo = Inventario::find($id);
        $pdf = \PDF::loadView('/inventario/itemPdf',compact('inventario')); //bien
        return $pdf->setPaper('a4')->download('Reporte-Item-trabajo.pdf');
    }


    public function buscador(Request $request){
        $trabajo = OrdenTrabajo::where("Prioridad",'like','%'.$request->texto.'%')->get();
                               
        return view("/trabajo/paginas",compact("trabajo"));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cadena = Session::get('cadena');
        return view('trabajo.create',compact('cadena'));
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
                        
        $datoTrabajo = new OrdenTrabajo;
        $datoTrabajo->id_cliente = $identificado->id;
        $datoTrabajo->prioridad = $request->get('prioridad');
        $datoTrabajo->tiempoEstimado = $request->get('tiempoEstimado');
        $datoTrabajo->estado = "Recibido";
        $datoTrabajo->informacion = $request->get('informacion');
        $datoTrabajo->datosImportantes = $request->get('datos');
        $datoTrabajo->creado = Auth::user()->name;
        $datoTrabajo->diagnostico = "No Actualizado";
        $datoTrabajo->bandera = "0";
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
        $localizacion = request('localizacion');

        for ($i=0; $i < sizeOf($tipo); $i++) { 
            $detalle = new DetalleOrden();
            $detalle->tipo = $tipo[$i];
            $detalle->rol = $rol[$i];
            $detalle->fabricante = $fabricante[$i];
            $detalle->modelo = $modelo[$i];
            $detalle->serial = $serial[$i];
            $detalle->localizacion = $localizacion[$i];
            $detalle->id_trabajos = $trabajo->id;
            $detalle->save();
        }

        DB::table('orden_trabajos')
                ->where('id', $trabajo->id)
                ->update(['bandera' => '1']);

        return redirect('trabajos');
        //dd($cliente);
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
        dd($id);
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
      $data = DB::table('clientes')
        ->where('nombreCliente', 'LIKE', "{$query}%")
        ->get();
      $output = '<datalist id="codigo">';
      foreach($data as $row)
      {
       $output .= '
       <option>'.$row->nombreCliente.', '.$row->calle.' '.$row->numero.', '.$row->codigoPostal.' '.$row->nombreCiudad.'</option>
       ';
      }
      $output .= '</datalist>';
      echo $output;
     }
    }
}
