<?php

namespace App\Http\Controllers;

use App\Models\Prioridad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrioridadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prioridad  $prioridad
     * @return \Illuminate\Http\Response
     */
    public function show(Prioridad $prioridad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prioridad  $prioridad
     * @return \Illuminate\Http\Response
     */
    public function edit(Prioridad $prioridad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prioridad  $prioridad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prioridad $prioridad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prioridad  $prioridad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prioridad $prioridad)
    {
        //
    }

    public function nuevaPrioridad()
    {

        $prioridad = new Prioridad();
        $prioridad->nombre_prioridad = $_POST["prioridad"];
        $prioridad->tiempo_estimado = $_POST["tiempoEstimado"];
        $prioridad->prioridad_precio = $_POST["precioPrioridad"];
        $prioridad->save();



        return json_encode(array('data'=>true));

    }

    public function datosPrioridad(){
        
        $datos = DB::table('prioridads')
                ->select('*')
                ->get();

        return json_encode(array('data'=>$datos));
    }

    public function actualizarPrioridad(){

        $datoPrioridad = Prioridad::find($_POST["id_prioridad"]);
        $datoPrioridad->nombre_prioridad = $_POST["prioridad"];
        $datoPrioridad->tiempo_estimado = $_POST["tiempoEstimado"];
        $datoPrioridad->prioridad_precio = $_POST["precioPrioridad"];
        $datoPrioridad->update();

        return json_encode(array('data'=>true));
    }

    public function eliminar(){
 
                    
        $trabajo=Prioridad::findOrFail($_POST["id"]);
        $trabajo->delete();

        return json_encode(array('data'=>true));
    }
}
