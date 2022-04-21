<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use Illuminate\Http\Request;
use App\Models\Cliente;
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
    public function index()
    {
        $datoTrabajo['trabajos']=OrdenTrabajo::paginate(10);
        return view('trabajo.index',$datoTrabajo);
        
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
    public function store(Request $request)
    {
        $datoTrabajo = new OrdenTrabajo;
        $datoTrabajo->infoCliente = $request->get('infoC');
        $datoTrabajo->Prioridad = $request->get('priority');
        $datoTrabajo->CasoUrgente1 = $request->get('urgent1');
        $datoTrabajo->CasoUrgente2 = $request->get('urgent2');
        $datoTrabajo->RAID = $request->get('urgent3');
        $datoTrabajo->Tipo = $request->get('Type');
        $datoTrabajo->Rol = $request->get('Role');
        $datoTrabajo->Fabricante = $request->get('Fab');
        $datoTrabajo->Modelo = $request->get('Model');
        $datoTrabajo->Serial = $request->get('Serial');
        $datoTrabajo->Localizacion = $request->get('Location');
        $datoTrabajo->infoDevice = $request->get('infoDevice');
        $datoTrabajo->importantDate = $request->get('important');
        //dd($datoTrabajo);
        $datoTrabajo->save();

        return redirect('trabajos');
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
        return view('trabajo.editar',compact('trabajo'));
        
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
        $ordenUpdate->CasoUrgente1 = $request->urgent1;
        $ordenUpdate->CasoUrgente2 = $request->urgent2;
        $ordenUpdate->RAID = $request->urgent3;
        $ordenUpdate->Tipo = $request->Type;
        $ordenUpdate->Rol = $request->Role;
        $ordenUpdate->Fabricante = $request->Fab;
        $ordenUpdate->Modelo = $request->Model;
        $ordenUpdate->Serial = $request->Serial;
        $ordenUpdate->Localizacion = $request->Location;
        $ordenUpdate->infoDevice = $request->infoDevice;
        $ordenUpdate->importantDate = $request->important;
        $ordenUpdate->save();        
        return redirect('trabajos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OrdenTrabajo::destroy($id); 
        return redirect('trabajos');
    }
}
