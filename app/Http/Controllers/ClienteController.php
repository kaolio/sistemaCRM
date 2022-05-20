<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function index(Request $request)
    {
        $busqueda=trim($request->get('busqueda'));
        $cliente=DB::table('clientes')
                        ->select('id','NombreCliente','VATid','Calle','Numero','Apt','CodigoPostal','Pak','NombreCiudad','Pais','Idioma','Tipo','Valor','NombreX','Nota')
                        ->where('NombreCliente', 'LIKE', '%'.$busqueda.'%')
                        ->orderBy('id','asc')
                        ->paginate(10);
        //$datoCliente['clientes']=Cliente::paginate(10);
        return view('cliente.index', compact('busqueda','cliente'));
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
            
            'vat'=>'required|integer',
            'calle'=>'required|max:50',
            'Numero'=>'required|integer',
            'apt'=>'required|integer',
            'codigoPostal'=>'required|integer',
            'pak'=>'required',
            'nombreCiudad'=>'required|string|max:50',
            'language'=>'required',
            'tipo'=>'required|string',
            'value'=>'required'
            
            
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
       $cliente_elegido = DB::table('clientes')  //recuperar el valor del select
        ->select('*')
        ->Where('clientes.id', '=', $id)->first();
        return view('cliente.editar',compact('cliente','cliente_elegido'));
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
    public function destroy(Cliente $cliente,$id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->delete(); 
        return redirect('clientes');
    }
}
