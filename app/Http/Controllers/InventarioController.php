<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:ver-inventario|crear-inventario|editar-inventario|borrar-inventario',['only'=>['index']]);
        $this->middleware('permission:crear-inventario',['only'=>['create','store']]);
        $this->middleware('permission:editar-inventario',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-inventario',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        $busqueda=trim($request->get('busqueda'));
        $inventario=DB::table('inventarios')
                        ->select('id','manufactura','modelo','numero_de_serie','firmware','capacidad','pbc','ubicacion','factor_de_forma','nota','cabecera','info_de_cabecera')
                        ->where('modelo', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('numero_de_serie', 'LIKE', '%'.$busqueda.'%')
                        ->orderBy('id','desc')
                        ->paginate(10);
    //metodo facades para consultar la db //table name

        // $inventario = Inventario::all();
        //metodo eloquent para consultar la bd

        return view('inventario.index', compact('inventario','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected function validar(Request $request)  //VALIDACIONES
    {
        $request->validate([
        'manufactura' => 'required | unique:forms',
        'modelo' => 'required | unique:forms',
        'numero_de_serie' =>'required | string | min:20 | max:30',
        'firmware' => '',
        'capacidad' =>'required | numeric',
        'pbc' =>'',
        'ubicacion' => 'required | string',
        'factor_de_forma' => '',
        'nota' => '',
        'cabecera' => '',
        'info_de_cabecera' => ''
        ]);
        
        $form = new Inventario;
        $form->manufactura = $request->manufactura;
    }

    protected function validator(array $data)  //VALIDACIONES
    {
        return Validator::make($data, [
            'id' => ['required', 'string', 'max:255'],
            'manufactura' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'modelo' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function store(Request $request)
    {
        $inventario = new Inventario();

        $inventario->manufactura = request('manufactura');
        $inventario->modelo = request('modelo');
        $inventario->numero_de_serie = request('numero_de_serie');
        $inventario->firmware = request('firmware');
        $inventario->capacidad = request('capacidad');
        $inventario->pbc = request('pbc');
        $inventario->ubicacion = request('ubicacion');
        $inventario->factor_de_forma = request('factor_de_forma');
        $inventario->nota = request('nota');
        $inventario->cabecera = request('cabecera');
        $inventario->info_de_cabecera = request('info_de_cabecera');

        $inventario->save();
        return redirect('inventario');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        // return view('inventario.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    // public function edit(Inventario $inventario)
    public function edit($id)
    {
        $inventario=Inventario::findOrFail($id);
        // return $inventario;
        return view('inventario.editar',compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $inventario=Inventario::findOrFail($id);

        $inventario->manufactura = request('manufactura');
        $inventario->modelo = request('modelo');
        $inventario->numero_de_serie = request('numero_de_serie');
        $inventario->firmware = request('firmware');
        $inventario->capacidad = request('capacidad');
        $inventario->pbc = request('pbc');
        $inventario->ubicacion = request('ubicacion');
        $inventario->factor_de_forma = request('factor_de_forma');
        $inventario->nota = request('nota');
        $inventario->cabecera = request('cabecera');
        $inventario->info_de_cabecera = request('info_de_cabecera');
        $inventario->save();

        return redirect('inventario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario, $id)
    {
        $inventario=Inventario::findOrFail($id);
        $inventario->delete();

        return redirect('inventario');
    }
}
