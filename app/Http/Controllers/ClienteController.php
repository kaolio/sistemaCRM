<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:ver-clientes|crear-clientes|editar-clientes|borrar-clientes',['only'=>['index']]);
        $this->middleware('permission:crear-clientes',['only'=>['create','store']]);
        $this->middleware('permission:editar-clientes',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-clientes',['only'=>['destroy']]);
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
                        ->select('id','nombreCliente','vat','calle','numero','apt','codigoPostal','pak','nombreCiudad','pais','idioma','nota')
                        ->where('nombreCliente', 'LIKE', '%'.$busqueda.'%')
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

    public function createTho()
    {
        $ver=$_POST['ver'];
        echo 'trabajo/nuevoTho/'.$ver;
        //return redirect('/trabajo/nuevo',compact('cliente'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $datoCliente = new Cliente;
        $datoCliente->nombreCliente = $request->get('nombreCliente');
        $datoCliente->vat = $request->get('vat');
        $datoCliente->calle = $request->get('direccion');
        $datoCliente->numero = $request->get('numero');
        $datoCliente->apt = $request->get('apt');
        $datoCliente->codigoPostal = $request->get('postal');
        $datoCliente->pak = $request->get('pak');
        $datoCliente->nombreCiudad = $request->get('ciudad');
        $datoCliente->pais = $request->get('pais');
        $datoCliente->idioma = $request->get('idioma');
        $datoCliente->nota = $request->get('nota');
        //dd($datoCliente);
        $datoCliente->save();

        $cliente = DB::table('clientes')
                ->select('id')
                ->where('nombreCliente','=',$request->get('nombreCliente'))
                ->where('calle','=',$request->get('direccion'))
                ->where('codigoPostal','=',$request->get('postal'))
                ->first();


        $tipo = request('tipo');
        $valor = request('valor');
        $nombre = request('nombre');
            
        if ($valor[0] != null) {
            for ($i=0; $i < sizeOf($valor); $i++) { 
                $detalle = new DetalleCliente;
                $detalle->tipo = $tipo[$i];
                $detalle->valor = $valor[$i];
                $detalle->nombre = $nombre[$i];
                $detalle->id_cliente = $cliente->id;
                $detalle->save();
            }
        }
            

        
        if ($id == 1) {
            return redirect('clientes');
        }else {
            $cadena = $request->get('nombreCliente').', '.$request->get('direccion').' '.$request->get('numero').', '.$request->get('postal').' '.$request->get('ciudad');
            return redirect('trabajo/nuevo')->with(compact('cadena'));
            //return Redirect::route('trabajo.create, $cadena');
        }
        
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
        /*$clienteUpdate = Cliente::findOrFail($id);
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
        return redirect('clientes');*/
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
