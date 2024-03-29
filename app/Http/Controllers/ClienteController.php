<?php

namespace App\Http\Controllers;

use App\Exports\ClienteExport;
use App\Models\Cliente;
use App\Models\DetalleCliente;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Spatie\Permission\Models\Role;

class ClienteController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:lista de clientes|crear cliente|editar cliente|borrar cliente',['only'=>['index']]);
        $this->middleware('permission:crear cliente',['only'=>['create','store']]);
        $this->middleware('permission:editar cliente',['only'=>['edit','update']]);
        $this->middleware('permission:borrar cliente',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      /* if (Auth::user()->id != 1) {
                
            $busqueda=trim($request->get('busqueda'));

            $cliente=DB::table('clientes')
                        ->select('*')
                        ->where('id_user', Auth::user()->id)
                        ->where(function($q)use ($busqueda) {
                            $q->where('nombreCliente', 'LIKE', '%'.$busqueda.'%')
                            ->orWhere('cif', 'LIKE', '%'.$busqueda.'%')
                            ->orWhere('telefono', 'LIKE', '%'.$busqueda.'%');
                        })
                        ->orderBy('id','asc')
                        ->paginate(10);
        }else{

            $busqueda=trim($request->get('busqueda'));

            $cliente=DB::table('clientes')
                        ->select('*')
                        ->where('nombreCliente', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('telefono', 'LIKE', '%'.$busqueda.'%')
                        ->orderBy('id','asc')
                        ->paginate(10);

        }*/

        $rols = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
                    
            $rol = Role::findById($rols->role_id)->name ;
        if ($rol == 'ADMINISTRADOR') {

            $busqueda=trim($request->get('busqueda'));

            $cliente=DB::table('clientes')
                        ->select('*')
                        ->selectRaw('DATE(created_at) AS Fecha')
                        ->where('nombreCliente', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('telefono', 'LIKE', '%'.$busqueda.'%')
                        ->orderBy('id','asc')
                        ->paginate(20);

        }else{

            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {

                $busqueda=trim($request->get('busqueda'));

                $cliente=DB::table('clientes')
                            ->select('*')
                            ->selectRaw('DATE(created_at) AS Fecha')
                            ->where('id_user',Auth::user()->id)
                            ->where(function($q) use($busqueda) {
                                $q->where('nombreCliente', 'LIKE', '%'.$busqueda.'%')
                                ->orWhere('telefono', 'LIKE', '%'.$busqueda.'%');
                            })
                            ->orderBy('id','asc')
                            ->paginate(20);

            }else{

                $busqueda=trim($request->get('busqueda'));

                $cliente=DB::table('clientes')
                            ->select('*')
                            ->selectRaw('DATE(created_at) AS Fecha')
                            ->where('nombreCliente', 'LIKE', '%'.$busqueda.'%')
                            ->orWhere('telefono', 'LIKE', '%'.$busqueda.'%')
                            ->orderBy('id','asc')
                            ->paginate(20);

            }

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
        $datoCliente->correo = $request->get('valor');
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
        $id = Crypt::decrypt($id);

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
        $datoCliente->correo = $request->get('valor');
        $datoCliente->telefono = $request->get('telefono');
        $datoCliente->codigoPostal = $request->get('postal');
        $datoCliente->poblacion = $request->get('poblacion');
        $datoCliente->provincia = $request->get('provincia');
        $datoCliente->pais = $request->get('pais');
        $datoCliente->idioma = $request->get('idioma');
        $datoCliente->nota = $request->get('nota');

       // dd($datoCliente);

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

    public function descargarPDF(){


             $rols = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
                    
            $rol = Role::findById($rols->role_id)->name ;

        if ($rol == 'ADMINISTRADOR') {

            $datosTablas = DB::table('clientes')
                        ->select('*')
                        ->orderBy('id','desc')
                        ->get();


        }else{
            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {

                $datosTablas = DB::table('clientes')
                        ->select('*')
                        ->where('id_user',Auth::user()->id)
                        ->orderBy('id','desc')
                        ->get();

            }else{

                $datosTablas = DB::table('clientes')
                        ->select('*')
                        ->orderBy('id','desc')
                        ->get();

            }
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
       
        
             $rols = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
                    
            $rol = Role::findById($rols->role_id)->name ;

        if ($rol == 'ADMINISTRADOR') {

            $datosTablas = DB::table('clientes')
                        ->select('*')
                        ->orderBy('id','desc')
                        ->get();


        }else{
            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {

                $datosTablas = DB::table('clientes')
                        ->select('*')
                        ->where('id_user',Auth::user()->id)
                        ->orderBy('id','desc')
                        ->get();

            }else{

                $datosTablas = DB::table('clientes')
                        ->select('*')
                        ->orderBy('id','desc')
                        ->get();

            }
        }
        
        $pdf = \PDF::loadView('/cliente/reporte/pdf',compact('datosTablas'));
        return $pdf->setPaper('a4','landscape')->stream(); //mandar a imprimir la vista pdf en horizontal
    }
}
