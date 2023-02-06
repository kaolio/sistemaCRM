<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FabricanteController extends Controller
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
     * @param  \App\Models\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function show(Fabricante $fabricante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function edit(Fabricante $fabricante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fabricante $fabricante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fabricante $fabricante)
    {
        //
    }

    public function nuevoFabricante()
    {

        $dispositivo = new Fabricante();
        $dispositivo->nombre_fabricante = $_POST["fabricante"];
        $dispositivo->save();



        return json_encode(array('data'=>true));

    }

    public function datosFabricante(){
        
        $datos = DB::table('fabricantes')
                ->select('*')
                ->get();

        return json_encode(array('data'=>$datos));
    }

    public function actualizarFabricante(){

        $datoFabricante = Fabricante::find($_POST["id_fabricante"]);
        $datoFabricante->nombre_fabricante = $_POST["fabricante"];
        $datoFabricante->update();

        return json_encode(array('data'=>true));
    }

    public function eliminarFabricante(){
 
                    
        $fabricante=Fabricante::findOrFail($_POST["id"]);
        $fabricante->delete();

        return json_encode(array('data'=>true));
    }
}
