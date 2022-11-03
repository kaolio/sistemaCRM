<?php

namespace App\Http\Controllers;

use App\Models\Facturacion;
use Illuminate\Http\Request;

class FacturacionController extends Controller
{
  
    function __construct()
    {
        $this->middleware('permission:ver-facturacion|crear-facturacion|editar-facturacion|borrar-facturacion',['only'=>['index']]);
        $this->middleware('permission:crear-facturacion',['only'=>['create','store']]);
        $this->middleware('permission:editar-facturacion',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-facturacion',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datosFacturas(){

        $datosFacturas =  DB::table('facturacions')
                    // ->join('orden_trabajos','orden_trabajos.id','=','detalle_ordens.id_trabajos')
                    ->select('*')
                            // 'detalle_ordens.serial','detalle_ordens.localizacion','detalle_ordens.id')
                    // ->where('detalle_ordens.id_trabajos','=',$_POST["nombre"])
                    // ->where('detalle_ordens.rol','<>','Paciente')
                    ->get(); 
        return json_encode(array('data'=>$datosFacturas));
    }



    public function index()
    {
        return view('facturacion.index');
    }
    public function verAsistente()
    {
        return view('facturacion.asistente-factura');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('facturacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facturacion = new Facturacion;

        $facturacion->estado = "Factura Creada";
        $facturacion->servicio = request('servicio');
        $facturacion->precio = request('precio');
        $facturacion->partes = request('partes');
        $facturacion->iva = request('iva');
        $facturacion->descuento = request('descuento');
        $facturacion->total = request('total');
        $facturacion->subtotal = request('subtotal');
        $facturacion->totalConIva = request('totalConIva');
        // $facturacion->iva = ((request('precio')+request('partes'))/100)*request('iva');
        // $facturacion->descuento = ((request('precio')+request('partes')+request('iva'))/100)*request('descuento');
        // $facturacion->total = (request('precio')+request('partes')+request('iva'))-request('descuento');
        // $facturacion->subtotal = request('precio')+request('partes'); //
        // $facturacion->totalConIva = (request('precio')+request('partes'))-((request('precio')+request('partes'))/100*request('descuento'));
      
        $facturacion->save();
        return redirect('facturacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function show(Facturacion $facturacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Facturacion $facturacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facturacion $facturacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facturacion  $facturacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facturacion $facturacion)
    {
        //
    }
}
