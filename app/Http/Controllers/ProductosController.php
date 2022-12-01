<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = DB::table('productos')
                    ->select('*')
                    ->paginate(50);

        return view('producto.index',compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    public function store(Request $request)
    {
    
        $bandera = false;
        if ($request->get('serial')[0] == null) {
            $bandera = true;
        }

        if ( $bandera == true) {

            for ($i=1; $i < sizeof($request->get('serial')); $i++) { 
                
                $producto = new Productos();
                $producto->dispositivo = $request->get('dispositivo');
                $producto->connection = $request->get('connection');
                $producto->factor = $request->get('factor');
                $producto->fabricante = request('fabricante');
                $producto->modelo = request('modelo');
                $producto->ubicacion = $request->get('ubicacion');
                $producto->distribuidora = request('distribuidora');
                $producto->precio = $request->get('precio');
                $producto->vat = $request->get('vat');
                $producto->precio_fin = request('precioFin');
                $producto->serial = $request->get('serial')[$i];
                $producto->fecha = $request->get('fecha');
                $producto->save();
            }
            

        }else {
            for ($i=0; $i < sizeof($request->get('serial')); $i++) { 
                
                $producto = new Productos();
                $producto->dispositivo = $request->get('dispositivo');
                $producto->connection = $request->get('connection');
                $producto->factor = $request->get('factor');
                $producto->fabricante = request('fabricante');
                $producto->modelo = request('modelo');
                $producto->ubicacion = $request->get('ubicacion');
                $producto->distribuidora = request('distribuidora');
                $producto->precio = $request->get('precio');
                $producto->vat = $request->get('vat');
                $producto->precio_fin = request('precioFin');
                $producto->serial = $request->get('serial')[$i];
                $producto->fecha = $request->get('fecha');
                $producto->save();
            }
        }

        return redirect('/productos');
    }

}
