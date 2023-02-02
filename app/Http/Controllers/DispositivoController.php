<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DispositivoController extends Controller
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
     * @param  \App\Models\Dispositivo  $dispositivo
     * @return \Illuminate\Http\Response
     */
    public function show(Dispositivo $dispositivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dispositivo  $dispositivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Dispositivo $dispositivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dispositivo  $dispositivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dispositivo $dispositivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dispositivo  $dispositivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dispositivo $dispositivo)
    {
        //
    }

    public function nuevoDispositivo()
    {

        $dispositivo = new Dispositivo();
        $dispositivo->nombre_dispositivo = $_POST["dispositivo"];
        $dispositivo->save();



        return json_encode(array('data'=>true));

    }

    public function datosDispositivo(){
        
        $datos = DB::table('dispositivos')
                ->select('*')
                ->get();

        return json_encode(array('data'=>$datos));
    }

    public function actualizarDispositivo(){

        $datoDispositivo = Dispositivo::find($_POST["id_dispositivo"]);
        $datoDispositivo->nombre_dispositivo = $_POST["dispositivo"];
        $datoDispositivo->update();

        return json_encode(array('data'=>true));
    }

    public function eliminarDispositivo(){
 
                    
        $trabajo=Dispositivo::findOrFail($_POST["id"]);
        $trabajo->delete();

        return json_encode(array('data'=>true));
    }
}
