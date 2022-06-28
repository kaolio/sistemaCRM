<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF; // use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel; //excel
use App\Exports\InventarioExport;    //excel

class InventarioController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:ver-inventario|crear-inventario|editar-inventario|borrar-inventario',['only'=>['index']]);
        $this->middleware('permission:crear-inventario',['only'=>['create','store']]);
        $this->middleware('permission:editar-inventario',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-inventario',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        $busqueda=trim($request->get('busqueda'));
        $inventario=DB::table('inventarios')
                        ->select('id','manufactura','modelo','numero_de_serie','firmware','capacidad','pbc','ubicacion','factor_de_forma','nota','cabecera','info_de_cabecera')
                        ->where('modelo', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('manufactura', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('numero_de_serie', 'LIKE', '%'.$busqueda.'%')
                        ->orwhere('factor_de_forma', 'LIKE', '%'.$busqueda.'%')
                        ->orderBy('id','desc')
                        ->paginate(10);
    //metodo facades para consultar la db //table name

        // $inventario = Inventario::all();
        //metodo eloquent para consultar la bd

        return view('inventario.index', compact('inventario','busqueda')); 
    }
    // public function buscarFactor(Request $request )
    // {
    //     $busquedaFactor=trim($request->get('busquedaFactor'));
    //     $inventario=DB::table('inventarios')
    //                     ->select('id','manufactura','modelo','numero_de_serie','firmware','capacidad','pbc','ubicacion','factor_de_forma','nota','cabecera','info_de_cabecera')
    //                     ->where('factor_de_forma', 'LIKE', '%'.$busquedaFactor.'%')
    //                     // ->orWhere('numero_de_serie', 'LIKE', '%'.$busqueda.'%')
    //                     ->orderBy('id','desc')
    //                     ->paginate(10);
    // //metodo facades para consultar la db //table name

    //     // $inventario = Inventario::all();
    //     //metodo eloquent para consultar la bd

    //     return view('inventario.index', compact('inventario','busquedaFactor')); 
    // }
    

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


    public function rol()
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
    public function fabricante()
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
    public function tipo()
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
    public function factor()
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
    // public function activo()
    // {
    //     if ($_POST["orden"] =='Todos') {
    //         $datosTabla =  DB::table('orden_trabajos')
    //         ->join('clientes','clientes.id','orden_trabajos.id_cliente')
    //         ->join('users','users.id','orden_trabajos.asignado')
    //         ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
    //         ->orderBy('orden_trabajos.id','desc')
    //         ->get();  
    //     }else{
    //         $datosTabla =  DB::table('orden_trabajos')
    //         ->join('clientes','clientes.id','orden_trabajos.id_cliente')
    //         ->join('users','users.id','orden_trabajos.asignado')
    //         ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
    //                     ->where('orden_trabajos.prioridad','=',$_POST["orden"])
    //                     ->orderBy('orden_trabajos.id','desc')
    //                     ->get();  
    //     }
        
    //     return json_encode(array('data'=>$datosTabla));
    // }
    // public function ocupado()
    // {
    //     if ($_POST["orden"] =='Todos') {
    //         $datosTabla =  DB::table('orden_trabajos')
    //         ->join('clientes','clientes.id','orden_trabajos.id_cliente')
    //         ->join('users','users.id','orden_trabajos.asignado')
    //         ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
    //         ->orderBy('orden_trabajos.id','desc')
    //         ->get();  
    //     }else{
    //         $datosTabla =  DB::table('orden_trabajos')
    //         ->join('clientes','clientes.id','orden_trabajos.id_cliente')
    //         ->join('users','users.id','orden_trabajos.asignado')
    //         ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
    //                     ->where('orden_trabajos.prioridad','=',$_POST["orden"])
    //                     ->orderBy('orden_trabajos.id','desc')
    //                     ->get();  
    //     }
        
    //     return json_encode(array('data'=>$datosTabla));
    // }
    // public function recursos()
    // {
    //     if ($_POST["orden"] =='Todos') {
    //         $datosTabla =  DB::table('orden_trabajos')
    //         ->join('clientes','clientes.id','orden_trabajos.id_cliente')
    //         ->join('users','users.id','orden_trabajos.asignado')
    //         ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
    //         ->orderBy('orden_trabajos.id','desc')
    //         ->get();  
    //     }else{
    //         $datosTabla =  DB::table('orden_trabajos')
    //         ->join('clientes','clientes.id','orden_trabajos.id_cliente')
    //         ->join('users','users.id','orden_trabajos.asignado')
    //         ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
    //                     ->where('orden_trabajos.prioridad','=',$_POST["orden"])
    //                     ->orderBy('orden_trabajos.id','desc')
    //                     ->get();  
    //     }
        
    //     return json_encode(array('data'=>$datosTabla));
    // }
    public function verInventario()
    {
            $datosTabla =  DB::table('inventarios')
            ->select('*')
            ->orderBy('inventarios.id','desc')
            ->get();  
        
        return json_encode(array('data'=>$datosTabla));
    }
    // public function redireccionar()
    // {
    //     if ($_POST["grado"] != "Todos") {
    //         $datosTabla =  DB::table('inventarios')
    //         ->select('*')
    //         ->where('inventarios.rol','=',$_POST["grado"])
    //         ->orderBy('inventarios.id','desc')
    //         ->get(); 
    //     } else {
    //         if ($_POST["estado"] != "Todos") {
    //             $datosTabla =  DB::table('orden_trabajos')
    //                     ->join('clientes','clientes.id','orden_trabajos.id_cliente')
    //                     ->join('users','users.id','orden_trabajos.asignado')
    //         ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
    //         ->where('orden_trabajos.estado','=',$_POST["estado"])
    //                     ->orderBy('orden_trabajos.id','desc')
    //                     ->get();
    //         } else {
    //             if ($_POST["ingeniero"] != "Todos los Ingenieros") {
    //                 $datosTabla =  DB::table('orden_trabajos')
    //                     ->join('clientes','clientes.id','orden_trabajos.id_cliente')
    //                     ->join('users','users.id','orden_trabajos.asignado')
    //         ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
    //         ->where('orden_trabajos.asignado','=',$_POST["ingeniero"])
    //                     ->orderBy('orden_trabajos.id','desc')
    //                     ->get();
    //             } else {
    //                 $datosTabla =  DB::table('orden_trabajos')
    //                         ->join('clientes','clientes.id','orden_trabajos.id_cliente')
    //                         ->join('users','users.id','orden_trabajos.asignado')
    //         ->select('orden_trabajos.id','orden_trabajos.prioridad','clientes.nombreCliente','estado','informacion','datosImportantes','users.name','creado','orden_trabajos.created_at')
    //         ->orderBy('orden_trabajos.id','desc')
    //                         ->get(); 
    //             }
                
    //         }
            
    //     }
        
        
    //     return json_encode(array('data'=>$datosTabla));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected function validar(Request $request)  //VALIDACIONES
    {
        $request->validate([
        'manufactura' => 'required | unique:forms',
        'modelo' => 'required | unique:forms',
        'numero_de_serie' =>'required | string | min:20 | max:30',
        'firmware' => '',
        'capacidad' =>'required',
        'pbc' =>'',
        'ubicacion' => 'required',
        'factor_de_forma' => '',
        'nota' => '',
        'cabecera' => '',
        'info_de_cabecera' => ''
        ]);
        
        $form = new Inventario;
        $form->manufactura = $request->manufactura;
    }

    protected function validator(array $data)  //VALIDACIONES
    {
        return Validator::make($data, [
            'id' => ['required', 'string', 'max:255'],
            'manufactura' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'modelo' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function store(Request $request)
    {
        $inventario = new Inventario();

        $inventario->manufactura = request('manufactura');
        $inventario->modelo = request('modelo');
        $inventario->numero_de_serie = request('numero_de_serie');
        $inventario->firmware = request('firmware');
        $inventario->capacidad = request('capacidad');
        $inventario->pbc = request('pbc');
        $inventario->ubicacion = request('ubicacion');
        $inventario->factor_de_forma = request('factor_de_forma');
        $inventario->nota = request('nota');
        $inventario->cabecera = request('cabecera');
        $inventario->info_de_cabecera = request('info_de_cabecera');
        $inventario->diagnostico = request('diagnostico');
        $inventario->rol = request('rol');
        $inventario->tipo = "HDD";

        $inventario->save();
        return redirect('inventario');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        // return view('inventario.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    // public function edit(Inventario $inventario)
    public function edit($id)
    {
        $inventario=Inventario::findOrFail($id);
        $inventario_elegido = DB::table('inventarios')  //recuperar el valor del select
        ->select('*')
        ->Where('inventarios.id', '=', $id)->first();
        // return $inventario;
        return view('inventario.editar',compact('inventario', 'inventario_elegido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventario  $inventario
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
        $inventario->pbc = request('pbc');
        $inventario->ubicacion = request('ubicacion');
        $inventario->factor_de_forma = request('factor_de_forma');
        $inventario->nota = request('nota');
        $inventario->cabecera = request('cabecera');
        $inventario->info_de_cabecera = request('info_de_cabecera');
        $inventario->save();

        return redirect('inventario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario, $id)
    {
        $inventario=Inventario::findOrFail($id);
        $inventario->delete();

        return redirect('inventario');
    }


}
