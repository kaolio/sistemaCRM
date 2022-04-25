<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
class ClienteController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:ver-cliente|crear-cliente|editar-cliente|borrar-cliente',['only'=>['index']]);
        $this->middleware('permission:crear-cliente',['only'=>['create','store']]);
        $this->middleware('permission:editar-cliente',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-cliente',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datoCliente['clientes']=Cliente::paginate(10);
        return view('cliente.index',$datoCliente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre'=>'required|string|regex:/^[\pL\s\-]+$/u|min:3|max:50',
            'vat'=>'required|string|regex:/^[\pL\s\-]+$/u|max:50',
            'calle'=>'required|max:50',
            'Numero'=>'required|integer',
            'apt'=>'required|integer',
            'codigoPostal'=>'required|max:4',
            'pak'=>'required',
            'nombreCiudad'=>'required|string|max:50',
            'language'=>'required',
            'tipo'=>'required|string',
            'value'=>'required',
            'na'=>'required',
            'info'=>'required'
        ]);
        


        $datoCliente = new Cliente;
        $datoCliente-> NombreCliente = $request->get('Nombre');
        $datoCliente-> VATid = $request->get('vat');
        $datoCliente->Calle = $request->get('calle');
        $datoCliente->Numero = $request->get('Numero');
        $datoCliente->Apt = $request->get('apt');
        $datoCliente->CodigoPostal = $request->get('codigoPostal');
        $datoCliente->Pak = $request->get('pak');
        $datoCliente->NombreCiudad = $request->get('nombreCiudad');
        $datoCliente->Pais = $request->get('pais');
        $datoCliente->Idioma = $request->get('language');
        $datoCliente->Tipo = $request->get('tipo');
        $datoCliente->Valor = $request->get('value');
        $datoCliente->NombreX = $request->get('na');
        $datoCliente->Nota = $request->get('info');
        //dd($datoCliente);
        $datoCliente->save();
        return redirect('clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $cliente = Cliente::findOrFail($id);
        return view('cliente.editar',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clienteUpdate = Cliente::findOrFail($id);
        $clienteUpdate->NombreCliente = $request->Nombre;
        $clienteUpdate-> VATid = $request->vat;
        $clienteUpdate->Calle = $request->calle;
        $clienteUpdate->Numero = $request->Numero;
        $clienteUpdate->Apt = $request->apt;
        $clienteUpdate->CodigoPostal = $request->codigoPostal;
        $clienteUpdate->Pak = $request->pak;
        $clienteUpdate->NombreCiudad = $request->nombreCiudad;
        $clienteUpdate->Pais = $request->pais;
        $clienteUpdate->Idioma = $request->language;
        $clienteUpdate->Tipo = $request->tipo;
        $clienteUpdate->Valor = $request->value;
        $clienteUpdate->NombreX = $request->na;
        $clienteUpdate->Nota = $request->info;
        //dd($clienteUpdate);
        $clienteUpdate->save();
        return redirect('clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::destroy($id); 
        return redirect('clientes');
    }
}
