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
            'nombre' => 'required|string|regex:/^[\pL\s\-]+$/u|max:50',
            'vat' => 'required|integer|max:99999999|min:9999999',
            'calle' => 'required|string|regex:/^[\pL\s\-]+$/u|max:50',
            'Num' => 'required|integer|max:99999999|min:9999999',
            'apt' => 'required|integer|max:99999999|min:9999999',
            'codP' => 'required|integer|max:99999999|min:9999999',
            'pak' => 'required|integer|max:99999999|min:9999999',
            'city' => 'required|string|regex:/^[\pL\s\-]+$/u|max:50',
            'pais' => 'required|string|regex:/^[\pL\s\-]+$/u|max:50',
            'value' => 'required|string|regex:/^[\pL\s\-]+$/u|max:50',
            'na' => 'required|string|regex:/^[\pL\s\-]+$/u|max:50',
            'info' => 'required|string|regex:/^[\pL\s\-]+$/u|max:50',
        ]);

       



        $datoCliente = new Cliente;
        $datoCliente-> NombreCliente = $request->get('nombre');
        $datoCliente-> VATid = $request->get('vat');
        $datoCliente->Calle = $request->get('calle');
        $datoCliente->Numero = $request->get('Num');
        $datoCliente->Apt = $request->get('apt');
        $datoCliente->CodigoPostal = $request->get('codP');
        $datoCliente->Pak = $request->get('pak');
        $datoCliente->NombreCiudad = $request->get('city');
        $datoCliente->Pais = $request->get('pais');
        $datoCliente->Idioma = $request->get('language');
        $datoCliente->Tipo = $request->get('tipo');
        $datoCliente->Valor = $request->get('value');
        $datoCliente->NombreX = $request->get('na');
        $datoCliente->Nota = $request->get('info');
        //dd($datoCliente);
        $datoCliente->save();
        //return response()->json($datoCliente);
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
        $clienteUpdate->Numero = $request->Num;
        $clienteUpdate->Apt = $request->apt;
        $clienteUpdate->CodigoPostal = $request->codP;
        $clienteUpdate->Pak = $request->pak;
        $clienteUpdate->NombreCiudad = $request->city;
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
