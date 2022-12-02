<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Support\Facades\Auth;
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
                    ->where('usuario',Auth::user()->id)
                    ->paginate(50);

        return view('producto.index',compact('producto'));
    }

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
                $producto->estado = "disponible";
                $producto->usuario = Auth::user()->id;
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
                $producto->estado = "disponible";
                $producto->usuario = Auth::user()->id;
                $producto->save();
            }
        }

        return redirect('/productos');
    }

    public function cambiarEstado(){
        DB::table('productos')
        ->where('id',  $_POST["id"])
        ->update(['estado' => $_POST["seleccionado"]]);


        return json_encode(array('data'=>$_POST["id"]));
    }

    public function moverDisp(){
        DB::table('productos')
        ->where('id',  $_POST["id"])
        ->update(['ubicacion' => $_POST["texto"]]);


        return json_encode(array('data'=>$_POST["id"]));
    }

    public function destroy($id){
        $producto=Productos::findOrFail($id);
        $producto->delete();

        return redirect('/productos');
    }
}
