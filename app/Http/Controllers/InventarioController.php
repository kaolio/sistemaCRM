<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\DetalleOrden;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDF; // use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel; //excel
use App\Exports\InventarioExport;    //excel

class InventarioController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:lista de inventario|crear inventario|editar inventario|borrar inventario',['only'=>['index']]);
        $this->middleware('permission:crear inventario',['only'=>['create','store']]);
        $this->middleware('permission:editar inventario',['only'=>['edit','update']]);
        $this->middleware('permission:borrar inventario',['only'=>['destroy']]);
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
        $trabajo = DB::table('inventarios')
                    ->select('*')
                    ->orderBy('inventarios.id','desc')
                    ->get();

        return view('inventario.index', compact('trabajo','rol'));
        
    }

    

    public function descargarPDF(){
        $inventario = Inventario::all();
        $pdf = \PDF::loadView('/inventario/pdf',compact('inventario'));
                              //ruta del archivo        envio de la variable de la db 
        return $pdf->setPaper('a4','landscape')->download('Reporte-Inventario.pdf');
                                                             //nombre del pdf a descargar
    }

    public function descargarItemPdf($id){
        $inventario = Inventario::find($id);
        $pdf = \PDF::loadView('/inventario/itemPdf',compact('inventario')); //bien
        return $pdf->setPaper('a4')->download('Reporte-Item-Inventario.pdf');
    }

    public function imprimirPdf(){
        $inventario = Inventario::all();
        $pdf = \PDF::loadView('/inventario/pdf',compact('inventario'));
        return $pdf->setPaper('a4','landscape')->stream(); //mandar a imprimir la vista pdf en horizontal
    }

    public function imprimirItemPdf($id){
        $inventario = Inventario::find($id);
        $pdf = \PDF::loadView('/inventario/itemPdf',compact('inventario')); //imprimir la vista itemPdf
                                         //ruta del archivo
        return $pdf->setPaper('a4')->stream();
    }

    public function descargarExcel(Request $request){
        return Excel::download(new InventarioExport, 'Reporte-Inventario-Excel.xlsx');
    }

    public function buscador(Request $request){
        $inventario = Inventario::where("manufactura",'like','%'.$request->texto.'%')
                               ->orWhere("factor_de_forma",'like','%'.$request->texto.'%')->get();
        return view("/inventario/paginas",compact("inventario"));        
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

        $factor = DB::table('factor_formas')
                ->select('*')
                ->get();

        $dispositivo = DB::table('dispositivos')
                ->select('*')
                ->get();

        $cadena = Session::get('cadena');
        return view('inventario.create',compact('cadena','fabricante','factor','dispositivo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Roles $roles)
    {
                               
        $inventario = new Inventario;

        $inventario->manufactura = request('manufactura');
        $inventario->modelo = request('modelo');
        $inventario->numero_de_serie = request('numero_de_serie');
        $inventario->firmware = request('firmware');
        $inventario->capacidad = request('capacidad');
        $inventario->part_Number = request('partNumber');
        $inventario->date_code = request('dateCode');
        $inventario->site_code = request('siteCode');
        $inventario->product_of = request('productOf');
        $inventario->pbc = request('pbc');
        $inventario->pcb_revision = request('pcbRevision');
        $inventario->phisycal_heads = request('phisycalHeads');
        $inventario->premp_type = request('prempType');
        $inventario->ubicacion = request('ubicacion');
        $inventario->factor_de_forma = request('factor_de_forma');
        $inventario->nota = request('nota');
        $inventario->precio = request('precio');
        $inventario->cabecera = request('cabecera');
        $inventario->info_de_cabecera = request('info_de_cabecera');
        $inventario->diagnostico = request('diagnostico');
        $inventario->rol = request('rol');
        $inventario->tipo = request('tipo');
        $inventario->estado = "Disponible";
      
        $inventario->save();
        return redirect('inventario');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $fabricante = DB::table('fabricantes')
                    ->select('*')
                    ->get();

            $factor = DB::table('factor_formas')
                    ->select('*')
                    ->get();

            $dispositivo = DB::table('dispositivos')
                    ->select('*')
                    ->get();

            $inventario=Inventario::findOrFail($id);

            $inventario_elegido = DB::table('inventarios')  //recuperar el valor del select
                    ->select('*')
                    ->Where('inventarios.id', '=', $id)
                    ->first();
                    //dd($inventario_elegido->manufactura);
            return view('inventario.editar',compact('inventario', 'inventario_elegido','fabricante','factor','dispositivo'));

        } catch (\Throwable $th) {
            //throw $th;
        }

        
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
        $inventario=Inventario::findOrFail($id);

        $inventario->manufactura = request('manufactura');
        $inventario->modelo = request('modelo');
        $inventario->numero_de_serie = request('numero_de_serie');
        $inventario->firmware = request('firmware');
        $inventario->capacidad = request('capacidad');
        $inventario->part_Number = request('partNumber');
        $inventario->date_code = request('dateCode');
        $inventario->site_code = request('siteCode');
        $inventario->product_of = request('productOf');
        $inventario->pbc = request('pbc');
        $inventario->pcb_revision = request('pcbRevision');
        $inventario->phisycal_heads = request('phisycalHeads');
        $inventario->premp_type = request('prempType');
        $inventario->ubicacion = request('ubicacion');
        $inventario->factor_de_forma = request('factor_de_forma');
        $inventario->nota = request('nota');
        $inventario->precio = request('precio');
        $inventario->cabecera = request('cabecera');
        $inventario->info_de_cabecera = request('info_de_cabecera');
        $inventario->rol = request('rol');
        $inventario->tipo = request('tipo');
        $inventario->save();


        return redirect('inventario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario, $id)
    {
        $inventario=Inventario::findOrFail($id);
        $inventario->delete();

        return redirect('inventario');
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

    public function prioridad()
    { //orden es el select q va recibir para que haga la funcion
        if ($_POST["orden"] =='Todos') {
            $datosTabla =  DB::table('inventarios')
            ->select('*')
            ->orderBy('id','desc')
            ->get();  
        }else{
            $datosTabla =  DB::table('inventarios')
                        ->select('*')
                        ->where('inventarios.rol','=',$_POST["orden"])
                        ->orderBy('inventarios.id','desc')
                        ->get();  
        }
        
        return json_encode(array('data'=>$datosTabla));
    }

    public function estado()
    {
        if ($_POST["orden"] =='Todos') {
            $datosTabla =  DB::table('inventarios')
            ->select('*')
            ->orderBy('inventarios.id','desc')
            ->get();  
        }else{
            $datosTabla =  DB::table('inventarios')
                        ->select('*')
                        ->where('inventarios.manufactura','=',$_POST["orden"])
                        ->orderBy('inventarios.id','desc')
                        ->get();  
        }
        
        return json_encode(array('data'=>$datosTabla));
    }

    public function ingeniero()
    {
        if ($_POST["orden"] =='Todos') {
            $datosTabla =  DB::table('inventarios')
            ->select('*')
            ->orderBy('inventarios.id','desc')
            ->get();  
        }else{
            $datosTabla =  DB::table('inventarios')
                        ->select('*')
                        ->where('inventarios.tipo','=',$_POST["orden"])
                        ->orderBy('inventarios.id','desc')
                        ->get();  
        }
        
        return json_encode(array('data'=>$datosTabla));
    }

    public function factorDeForma()
    {
        if ($_POST["orden"] =='Todos') {
            $datosTabla =  DB::table('inventarios')
            ->select('*')
            ->orderBy('inventarios.id','desc')
            ->get();  
        }else{
            $datosTabla =  DB::table('inventarios')
                        ->select('*')
                        ->where('inventarios.factor_de_forma','=',$_POST["orden"])
                        ->orderBy('inventarios.id','desc')
                        ->get();  
        }
        
        return json_encode(array('data'=>$datosTabla));
    }

    public function ver()
    {
            $datosTabla =  DB::table('inventarios')
            ->select('*')
            ->orderBy('inventarios.id','desc')
            ->get();  
        
        return json_encode(array('data'=>$datosTabla));
    }

    public function buscadorTiempoReal()
    {

            $datosTabla =  DB::table('inventarios')
            ->select('*')
            ->where('modelo', 'like', '%' . $_POST["value"] . '%')
            ->orWhere('manufactura', 'like', '%' . $_POST["value"] . '%')
            ->orWhere('factor_de_forma', 'like', '%' . $_POST["value"] . '%')
            ->orderBy('inventarios.id','desc')
            ->get();  
        
            
        return json_encode(array('data'=>$datosTabla));
    }

    public function redireccionar()
    {
        if ($_POST["grado"] != "Todos") {
            $datosTabla =  DB::table('inventarios')
            ->select('*')
            ->where('inventarios.rol','=',$_POST["grado"])
            ->orderBy('inventarios.id','desc')
            ->get(); 
        } else {
            if ($_POST["estado"] != "Todos") {
                $datosTabla =  DB::table('inventarios')
                ->select('*')
                ->where('inventarios.manufactura','=',$_POST["estado"])
                ->orderBy('inventarios.id','desc')
                ->get();
            } else {
                if ($_POST["ingeniero"] != "Todos") { //modify
                    $datosTabla =  DB::table('inventarios')
                    ->select('*')
                    ->where('inventarios.tipo','=',$_POST["ingeniero"]) //modify
                    ->orderBy('inventarios.id','desc')
                    ->get();
                } else {
                    if($_POST["factor_de_forma"] != "Todos"){
                        $datosTabla =  DB::table('inventarios')
                        ->select('*')
                        ->where('inventarios.factor_de_forma','=',$_POST["factor_de_forma"])
                        ->orderBy('inventarios.id','desc')
                        ->get();
                    }
                    else{
                                    $datosTabla =  DB::table('inventarios')
                                    ->select('*')
                                    ->orderBy('inventarios.id','desc')
                                    ->get(); 
                        }
                }
                
            }
            
        }
        
        
        return json_encode(array('data'=>$datosTabla));
    }

    public function cambioPrioridadNueva()
    {

        
            DB::table('orden_trabajos')
                ->where('id', $_POST['arreglo'][0])
                ->update(['prioridad' => $_POST["seleccionado"]]);
                


        $datosTablas =  DB::table('orden_trabajos')
        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
        ->join('users','users.id','orden_trabajos.asignado')
        ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
        ->orderBy('orden_trabajos.id','desc')
        ->get();  
    
        return json_encode(array('data'=>$datosTablas));
    }

    public function moverDisco(){

        DB::table('inventario')
                ->where('id', $_POST["id"])
                ->update(['ubicacion' => $_POST["ubicacion"]]);


         return json_encode(array('data'=>$_POST["ubicacion"]));
    }
}