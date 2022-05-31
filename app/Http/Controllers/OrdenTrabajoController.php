<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;
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
        $trabajo=DB::table('orden_trabajos')
                        ->select('id','infoCliente','Prioridad','TiempoEstimado','Tipo','Rol','Fabricante','Modelo','Serial','Localizacion','informacionDispositivo','datoImportante')
                        ->where('Modelo', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('Serial', 'LIKE', '%'.$busqueda.'%')
                        ->orderBy('id','asc')
                        ->paginate(10);
        //$datoTrabajo['trabajos']=OrdenTrabajo::paginate(10);
        return view('trabajo.index', compact('busqueda','trabajo'));
        
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
        return view('trabajo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Roles $roles)
    {

        $request->validate([
            'infoDispositivo' => '',
            'DatoImportante' => ''
            
            ]);

        
        $datoTrabajo = new OrdenTrabajo;
        $datoTrabajo->infoCliente = $request->get('infoC');
        $datoTrabajo->Prioridad = $request->get('priority');
        $datoTrabajo->TiempoEstimado = $request->get('tiempoEstimado');
        $datoTrabajo->Tipo = $request->get('Type');
        $datoTrabajo->Rol = $request->get('Role');
        $datoTrabajo->Fabricante = $request->get('Fabricante');
        $datoTrabajo->Modelo = $request->get('Modelo');
        $datoTrabajo->Serial = $request->get('Serial');
        $datoTrabajo->Localizacion = $request->get('Localizacion');
        $datoTrabajo->informacionDispositivo = $request->get('infoDispositivo');
        $datoTrabajo->datoImportante = $request->get('DatoImportante');
        
        
        $datoTrabajo->save();
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
    public function edit($id)
    {
        $trabajo = OrdenTrabajo::findOrFail($id);
        $trabajo_elegido = DB::table('orden_trabajos')  //recuperar el valor del select
        ->select('*')
        ->Where('orden_trabajos.id', '=', $id)->first();
        return view('trabajo.editar',compact('trabajo','trabajo_elegido'));
        
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
        $ordenUpdate = OrdenTrabajo::findOrFail($id);
        $ordenUpdate->infoCliente = $request->infoC;
        $ordenUpdate->Prioridad = $request->priority;
        $ordenUpdate->TiempoEstimado = $request->tiempoEstimado;
        $ordenUpdate->Tipo = $request->Type;
        $ordenUpdate->Rol = $request->Role;
        $ordenUpdate->Fabricante = $request->Fabricante;
        $ordenUpdate->Modelo = $request->Modelo;
        $ordenUpdate->Serial = $request->Serial;
        $ordenUpdate->Localizacion = $request->Localizacion;
        $ordenUpdate->informacionDispositivo = $request->infoDispositivo;
        $ordenUpdate->datoImportante = $request->DatoImportante;
        $ordenUpdate->save();        
        return redirect('trabajos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdenTrabajo $trabajo,$id)
    {
        // OrdenTrabajo::destroy($id); 
        // return redirect('trabajos');
        $trabajo=OrdenTrabajo::findOrFail($id);
        $trabajo->delete();
                return redirect('trabajos');
    }

}
