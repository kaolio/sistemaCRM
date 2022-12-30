<?php

namespace App\Http\Controllers;

use App\Exports\ClienteExport;
use App\Models\Cliente;
use App\Models\DetalleCliente;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ClienteController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:ver-clientes|crear-clientes|editar-clientes|borrar-clientes',['only'=>['index']]);
        $this->middleware('permission:crear-clientes',['only'=>['create','store']]);
        $this->middleware('permission:editar-clientes',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-clientes',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->id != 1) {
                
            $busqueda=trim($request->get('busqueda'));

            $cliente=DB::table('clientes')
                        ->select('*')
                        ->where('id_user', Auth::user()->id)
                        ->where('nombreCliente', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('cif', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('telefono', 'LIKE', '%'.$busqueda.'%')
                        ->orderBy('id','asc')
                        ->paginate(10);
        }else{

            $busqueda=trim($request->get('busqueda'));

            $cliente=DB::table('clientes')
                        ->select('*')
                        ->where('id_user', Auth::user()->id)
                        ->where('nombreCliente', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('cif', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('telefono', 'LIKE', '%'.$busqueda.'%')
                        ->orderBy('id','asc')
                        ->paginate(10);

        }
        
        //$datoCliente['clientes']=Cliente::paginate(10);
        return view('cliente.index', compact('busqueda','cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    public function createTho()
    {
        $ver=$_POST['ver'];
        echo 'trabajo/nuevoTho/'.$ver;
        //return redirect('/trabajo/nuevo',compact('cliente'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $datoCliente = new Cliente;
        $datoCliente->nombreCliente = $request->get('nombreCliente');
        $datoCliente->cif = $request->get('cif');
        $datoCliente->calle = $request->get('direccion');
        $datoCliente->numero = $request->get('numero');
        $datoCliente->telefono = $request->get('telefono');
        $datoCliente->codigoPostal = $request->get('postal');
        $datoCliente->poblacion = $request->get('poblacion');
        $datoCliente->provincia = $request->get('provincia');
        $datoCliente->pais = $request->get('pais');
        $datoCliente->idioma = $request->get('idioma');
        $datoCliente->nota = $request->get('nota');
        $datoCliente->id_user = Auth::user()->id;
        //dd($datoCliente);
        $datoCliente->save();

        $cliente = DB::table('clientes')
                ->select('id')
                ->where('nombreCliente','=',$request->get('nombreCliente'))
                ->where('calle','=',$request->get('direccion'))
                ->where('codigoPostal','=',$request->get('postal'))
                ->first();


        $tipo = request('tipo');
        $valor = request('valor');
        $nombre = request('nombre');
            
        if ($valor[0] != null) {
            for ($i=0; $i < sizeOf($valor); $i++) { 
                $detalle = new DetalleCliente;
                $detalle->tipo = $tipo[$i];
                $detalle->valor = $valor[$i];
                $detalle->nombre = $nombre[$i];
                $detalle->id_cliente = $cliente->id;
                $detalle->save();
            }
        }
            

        
        if ($id == 1) {
            return redirect('clientes');
        }else {
            $cadena = $request->get('nombreCliente').', '.$request->get('direccion').' '.$request->get('numero').', '.$request->get('postal').' '.$request->get('ciudad');


            return redirect('trabajo/nuevo')->with(compact('cadena'));
            //return Redirect::route('trabajo.create, $cadena');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $cliente = DB::table('clientes')  //recuperar el valor del select
                    ->select('*')
                    ->Where('id', '=', $id)
                    ->first();


                    //dd($cliente);

        return view('cliente.editar',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datoCliente = Cliente::findOrFail($id);

        $datoCliente->nombreCliente = $request->get('nombreCliente');
        $datoCliente->cif = $request->get('cif');
        $datoCliente->calle = $request->get('direccion');
        $datoCliente->numero = $request->get('numero');
        $datoCliente->telefono = $request->get('telefono');
        $datoCliente->codigoPostal = $request->get('postal');
        $datoCliente->poblacion = $request->get('poblacion');
        $datoCliente->provincia = $request->get('provincia');
        $datoCliente->pais = $request->get('pais');
        $datoCliente->idioma = $request->get('idioma');
        $datoCliente->nota = $request->get('nota');
        //dd($datoCliente);
        $datoCliente->save();

        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente,$id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->delete(); 
        return redirect('clientes');
    }

    public function tablaEditar(){

        $datos = DB::table('detalle_clientes')
                    ->select('*')
                    ->where('id_cliente','=',$_POST["id"])
                    ->get();

                   // dd($datos);

             return json_encode(array('data'=>$datos));
    }

    public function eliminarEditar($id){

        //dd($id);

        $datos = DB::table('detalle_clientes')
                ->select('id_cliente')
                ->where('id',$id)
                ->first();

        $editados = DetalleCliente::findOrFail($id);

        $editados->delete();

        return redirect('/cliente/editar/'.$datos->id_cliente);

    }

    public function detallesNuevos(){

        $detalle = new DetalleCliente();
        $detalle->tipo = $_POST["tipo"];
        $detalle->valor = $_POST["valor"];
        $detalle->nombre = $_POST["nombre"];
        $detalle->id_cliente = $_POST["id"];
        $detalle->save();

        $nuevosDetalles = DB::table('detalle_clientes')
        ->select('*')
        ->where('id_cliente','=',$_POST["id"])
        ->get();

             return json_encode(array('data'=>$nuevosDetalles));

    }

    public function descargarPDF(){

        if (Auth::user()->id != 1) {

            $datosTablas = DB::table('clientes')
                        ->select('*')
                        ->where('user_id',Auth::user()->id)
                        ->orderBy('id','desc')
                        ->get();

        }else{
            $datosTablas = DB::table('clientes')
                        ->select('*')
                        ->where('id_user',Auth::user()->id)
                        ->orderBy('id','desc')
                        ->get();
        }

        $pdf = \PDF::loadView('/cliente/reporte/pdf',compact('datosTablas'));
                              //ruta del archivo        envio de la variable de la db 
        return $pdf->setPaper('a4','landscape')->download('Reporte-Clientes.pdf');
                                                             //nombre del pdf a descargar
    }

    public function descargarExcel(Request $request){
        
        return Excel::download(new ClienteExport, 'Reporte-Ordenes_Trabajo.xlsx');
    }

    public function imprimirPdf(){
       
        if (Auth::user()->id != 1) {

            $datosTablas = DB::table('clientes')
                        ->select('*')
                        ->where('user_id',Auth::user()->id)
                        ->orderBy('id','desc')
                        ->get();

        }else{
            $datosTablas = DB::table('clientes')
                        ->select('*')
                        ->where('id_user',Auth::user()->id)
                        ->orderBy('id','desc')
                        ->get();
        }
        
        $pdf = \PDF::loadView('/cliente/reporte/pdf',compact('datosTablas'));
        return $pdf->setPaper('a4','landscape')->stream(); //mandar a imprimir la vista pdf en horizontal
    }
}
