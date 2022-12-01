<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function guardar()
    {
        $servicio = new Servicio();
        $servicio->detalle = $_POST["detalle"];
        $servicio->descripcion = $_POST["descripcion"];
        $servicio->precio = $_POST["precio"];
        $servicio->id_trabajos = $_POST["id"];
        $servicio->save();

        $nuevo = DB::table('servicios')
        ->select('*')
        ->where('id_trabajos','=',$_POST["id"])
        ->get();

        return json_encode(array('data'=>$nuevo));

    }

    public function guardarTabla(){

        $nuevo = DB::table('servicios')
        ->select('*')
        ->where('id_trabajos','=',$_POST["id"])
        ->get();

        return json_encode(array('data'=>$nuevo));
    }

    public function enviar(){

       

        $datos = DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->select('clientes.id')
                ->where('orden_trabajos.id',$_POST["id"])
                ->first();

        $cliente = DB::table('detalle_clientes')
                ->select('detalle_clientes.valor')
                ->where('detalle_clientes.id',$datos->id)
                ->where('detalle_clientes.tipo','correo')
                ->first();
        
            $servicio = DB::table('servicios')
                ->select('*')
                ->where('id_trabajos',$datos->id)
                ->get();
        
            $total = DB::table('servicios')
                    ->select('precio')
                    ->where('id_trabajos',$datos->id)
                    ->get()->sum('precio');

            $mailData = [
                        'title' => 'Orden de Trabajo #'.$datos->id,
                        'body' => 'Estimado/a: '
                    ];

                    
            Mail::to($cliente->valor)->send(new DemoMail($mailData,$servicio,$total));
            return json_encode(array('data'));
        
        
    }

    public function destroy($id){

        $orden = DB::table('servicios')
                    ->select('id_trabajos')
                    ->where('id',$id)
                    ->first();
                    
        $trabajo=Servicio::findOrFail($id);
        $trabajo->delete();

        return redirect('/trabajos/detalle/'.$orden->id_trabajos);
    }
}
 