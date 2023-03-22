<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:lista de productos|crear producto|editar producto|borrar producto',['only'=>['index']]);
        $this->middleware('permission:crear producto',['only'=>['create','store']]);
        $this->middleware('permission:editar producto',['only'=>['edit','update']]);
        $this->middleware('permission:borrar producto',['only'=>['destroy']]);
    }
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
            $fabricante = DB::table('fabricantes')
                    ->select('*')
                    ->get();

            $factor = DB::table('factor_formas')
                    ->select('*')
                    ->get();

            $dispositivo = DB::table('dispositivos')
                    ->select('*')
                    ->get();

            $conexion = DB::table('tipo_conexions')
                    ->select('*')
                    ->get();

        return view('producto.create',compact('fabricante','factor','dispositivo','conexion'));
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
                $producto->fabricante = request('fabricante');
                $producto->modelo = request('modelo');
                $producto->capacidad_producto = $request->get('capacidad');
                $producto->factor = $request->get('factor');
                $producto->rol = $request->get('rol');
                $producto->ubicacion = $request->get('ubicacion');
                $producto->distribuidora = request('distribuidora');
                $producto->precio_compra= $request->get('precioCompra');
                $producto->precio_venta = $request->get('precioVenta');
                $producto->serial = $request->get('serial')[$i];
                $producto->fecha = $request->get('fecha');
                $producto->nota = $request->get('nota');
                $producto->estado = "disponible";
                $producto->usuario = Auth::user()->id;
                $producto->save();
            }
            

        }else {
            for ($i=0; $i < sizeof($request->get('serial')); $i++) { 
                
                $producto = new Productos();
                $producto->dispositivo = $request->get('dispositivo');
                $producto->connection = $request->get('connection');
                $producto->fabricante = request('fabricante');
                $producto->modelo = request('modelo');
                $producto->capacidad_producto = $request->get('capacidad');
                $producto->factor = $request->get('factor');
                $producto->rol = $request->get('rol');
                $producto->ubicacion = $request->get('ubicacion');
                $producto->distribuidora = request('distribuidora');
                $producto->precio_compra= $request->get('precioCompra');
                $producto->precio_venta = $request->get('precioVenta');
                $producto->serial = $request->get('serial')[$i];
                $producto->fecha = $request->get('fecha');
                $producto->nota = $request->get('nota');
                $producto->estado = "disponible";
                $producto->usuario = Auth::user()->id;
                $producto->save();
            }
        }

        return redirect('/productos');
    }

    public function edit($id){

        try {

            $fabricante = DB::table('fabricantes')
                    ->select('*')
                    ->get();

            $factor = DB::table('factor_formas')
                    ->select('*')
                    ->get();

            $dispositivo = DB::table('dispositivos')
                    ->select('*')
                    ->get();

            $conexion = DB::table('tipo_conexions')
                    ->select('*')
                    ->get();

            $producto=Productos::findOrFail($id);
            
            $producto_elegido = DB::table('productos')  //recuperar el valor del select
                    ->select('*')
                    ->Where('productos.id', '=', $id)
                    ->first();

        return view('producto.edit',compact('producto','producto_elegido','fabricante','factor','dispositivo','conexion'));

        } catch (\Throwable $th) {
            //throw $th;
        }

                    
    }

    public function update($id){

        $producto = Productos::find($id);
        $producto->dispositivo = request('dispositivo');
        $producto->connection = request('connection');
        $producto->fabricante = request('fabricante');
        $producto->modelo = request('modelo');
        $producto->capacidad_producto = request('capacidad');
        $producto->factor = request('factor');
        $producto->rol = request('rol');
        $producto->ubicacion = request('ubicacion');
        $producto->distribuidora = request('distribuidora');
        $producto->precio_compra = request('precioCompra');
        $producto->precio_venta = request('precioVenta');
        $producto->serial = request('serial');
        $producto->fecha =request('fecha');
        $producto->nota = request('nota');
        $producto->usuario = Auth::user()->id;
        $producto->update();

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
