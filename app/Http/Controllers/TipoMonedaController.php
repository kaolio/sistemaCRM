<?php

namespace App\Http\Controllers;

use App\Models\TipoMoneda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoMonedaController extends Controller
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
     * @param  \App\Models\TipoMoneda  $tipoMoneda
     * @return \Illuminate\Http\Response
     */
    public function show(TipoMoneda $tipoMoneda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoMoneda  $tipoMoneda
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoMoneda $tipoMoneda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoMoneda  $tipoMoneda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoMoneda $tipoMoneda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoMoneda  $tipoMoneda
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoMoneda $tipoMoneda)
    {
        //
    }

    public function nuevoValor()
    {

        $daño = new TipoMoneda();
        $daño->nombre_moneda = $_POST["nombreMoneda"];
        $daño->valor_moneda = $_POST["valorMoneda"];
        $daño->save();



        return json_encode(array('data'=>true));

    }

    public function datosValores(){
        
        $datos = DB::table('tipo_monedas')
                ->select('*')
                ->get();

        return json_encode(array('data'=>$datos));
    }

    public function actualizarValor(){

        $datoMoneda = TipoMoneda::find($_POST["id_moneda"]);
        $datoMoneda->nombre_moneda = $_POST["moneda"];
        $datoMoneda->valor_moneda = $_POST["valor"];
        $datoMoneda->update();

        return json_encode(array('data'=>true));
    }

    public function eliminarValor(){
 
                    
        $trabajo=TipoMoneda::findOrFail($_POST["id"]);
        $trabajo->delete();

        return json_encode(array('data'=>true));
    }
}
