<?php

namespace App\Http\Controllers;

use App\Models\FactorForma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FactorFormaController extends Controller
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
     * @param  \App\Models\FactorForma  $factorForma
     * @return \Illuminate\Http\Response
     */
    public function show(FactorForma $factorForma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FactorForma  $factorForma
     * @return \Illuminate\Http\Response
     */
    public function edit(FactorForma $factorForma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FactorForma  $factorForma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FactorForma $factorForma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FactorForma  $factorForma
     * @return \Illuminate\Http\Response
     */
    public function destroy(FactorForma $factorForma)
    {
        //
    }

    public function nuevoFactor()
    {

        $factor = new FactorForma();
        $factor->nombre_factor = $_POST["nombreFactor"];
        $factor->save();



        return json_encode(array('data'=>true));

    }

    public function datosFactor(){
        
        $datos = DB::table('factor_formas')
                ->select('*')
                ->get();

        return json_encode(array('data'=>$datos));
    }

    public function actualizarFactor(){

        $datoFactor = FactorForma::find($_POST["id_factor"]);
        $datoFactor->nombre_factor = $_POST["factorForma"];
        $datoFactor->update();

        return json_encode(array('data'=>true));
    }

    public function eliminarFactor(){
 
                    
        $factor=FactorForma::findOrFail($_POST["id"]);
        $factor->delete();

        return json_encode(array('data'=>true));
    }
}
