<?php

namespace App\Http\Controllers;

use App\Models\Facturacion;
use Illuminate\Http\Request;

class FacturacionController extends Controller
{
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $facturacion->iva = ((request('precio')+request('partes'))/100)*request('iva');
        $facturacion->descuento = ((request('precio')+request('partes')+request('iva'))/100)*request('descuento');
        $facturacion->total = (request('precio')+request('partes')+request('iva'))-request('descuento');
        $facturacion->subtotal = request('precio')+request('partes'); //
        $facturacion->totalConIva = (request('precio')+request('partes'))-((request('precio')+request('partes'))/100*request('descuento'));
      
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
