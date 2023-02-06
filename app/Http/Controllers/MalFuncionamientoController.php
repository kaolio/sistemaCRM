<?php

namespace App\Http\Controllers;

use App\Models\MalFuncionamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MalFuncionamientoController extends Controller
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
     * @param  \App\Models\MalFuncionamiento  $malFuncionamiento
     * @return \Illuminate\Http\Response
     */
    public function show(MalFuncionamiento $malFuncionamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MalFuncionamiento  $malFuncionamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(MalFuncionamiento $malFuncionamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MalFuncionamiento  $malFuncionamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MalFuncionamiento $malFuncionamiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MalFuncionamiento  $malFuncionamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(MalFuncionamiento $malFuncionamiento)
    {
        //
    }

    public function nuevoTipoDaño()
    {

        $daño = new MalFuncionamiento();
        $daño->mal_funcionamiento = $_POST["nombreDaño"];
        $daño->mal_funcio_precio = $_POST["precioTipoDaño"];
        $daño->save();



        return json_encode(array('data'=>true));

    }

    public function datosTipoDaño(){
        
        $datos = DB::table('mal_funcionamientos')
                ->select('*')
                ->get();

        return json_encode(array('data'=>$datos));
    }

    public function actualizarTipoDaño(){

        $datoDaño = MalFuncionamiento::find($_POST["id_daño"]);
        $datoDaño->mal_funcionamiento = $_POST["daño"];
        $datoDaño->mal_funcio_precio = $_POST["precioDaño"];
        $datoDaño->update();

        return json_encode(array('data'=>true));
    }

    public function eliminarTipoDaño(){
 
                    
        $trabajo=MalFuncionamiento::findOrFail($_POST["id"]);
        $trabajo->delete();

        return json_encode(array('data'=>true));
    }
}
