<?php

namespace App\Http\Controllers;

use App\Models\TipoConexion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoConexionController extends Controller
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
     * @param  \App\Models\TipoConexion  $tipoConexion
     * @return \Illuminate\Http\Response
     */
    public function show(TipoConexion $tipoConexion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoConexion  $tipoConexion
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoConexion $tipoConexion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoConexion  $tipoConexion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoConexion $tipoConexion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoConexion  $tipoConexion
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoConexion $tipoConexion)
    {
        //
    }

    public function nuevoConexion()
    {

        $conexion = new TipoConexion();
        $conexion->nombre_conexion = $_POST["nombreConexion"];
        $conexion->save();



        return json_encode(array('data'=>true));

    }

    public function datosConexion(){
        
        $datos = DB::table('tipo_conexions')
                ->select('*')
                ->get();

        return json_encode(array('data'=>$datos));
    }

    public function actualizarConexion(){

        $datoConexion = TipoConexion::find($_POST["id_conexion"]);
        $datoConexion->nombre_conexion = $_POST["conexion"];
        $datoConexion->update();

        return json_encode(array('data'=>true));
    }

    public function eliminarConexion(){
 
                    
        $factor=TipoConexion::findOrFail($_POST["id"]);
        $factor->delete();

        return json_encode(array('data'=>true));
    }
}
