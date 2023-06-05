<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use App\Mail\NotaCliente;
use App\Models\Historial;
use App\Models\Nota;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $ini_ses = new Historial();
        $ini_ses->usuario = Auth::user()->name;
        $ini_ses->informacion = 'Registro un nuevo servicio Detalle: '.$servicio->detalle.' Descripcion: '.$servicio->descripcion.' Precio: '.$servicio->precio;
        $ini_ses->id_trabajos = $_POST["id"];
        $ini_ses->save();

        return json_encode(array('data'=>$nuevo));

    }

    public function edit()
    {
        try {
            $serve = DB::table('servicios')
                        ->select('*')
                        ->where('id','=',$_POST["id"])
                        ->first();
            
            $servicio = Servicio::find($_POST["id"]);
            $servicio->detalle = $_POST["detalle"];
            $servicio->descripcion = $_POST["descripcion"];
            $servicio->precio = $_POST["precio"];
            $servicio->save();

            $ini_ses = new Historial();
            $ini_ses->usuario = Auth::user()->name;
            $ini_ses->informacion = 'Edito el registro del servicio Detalle: '.$serve->detalle.' Descripcion: '.$serve->descripcion.' Precio: '.$serve->precio.' a '.$_POST["detalle"].' Descripcion: '.$_POST["descripcion"].' Precio: '.$_POST["precio"];
            $ini_ses->id_trabajos = $serve->id_trabajos;
            $ini_ses->save();

            return json_encode(array('data'=>true));
        } catch (\Throwable $th) {
            return json_encode(array('data'=>false));
        }
        

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

        $cliente = DB::table('clientes')
                ->select('correo','nombreCliente')
                ->where('id',$datos->id)
                ->first();
        
            $servicio = DB::table('servicios')
                ->select('*')
                ->where('id_trabajos',$_POST["id"])
                ->get();

            $ini_ses = new Historial();
            $ini_ses->usuario = Auth::user()->name;
            $ini_ses->informacion = 'Envio correo electronico al cliente: '.$cliente->nombreCliente.' del total de servicios';
            $ini_ses->id_trabajos = $_POST["id"];
            $ini_ses->save();
        
            $total = DB::table('servicios')
                    ->select('precio')
                    ->where('id_trabajos',$_POST["id"])
                    ->get()->sum('precio');

            $mailData = [
                        'title' => 'Orden de Trabajo #'.$_POST["id"],
                        'body' => 'Estimado/a: '.$cliente->nombreCliente
                    ];

                    
            Mail::to($cliente->correo)->send(new DemoMail($mailData,$servicio,$total));
            return json_encode(array('data'));
        
        
    }

    public function enviarNota(){

       
        $notas = new Nota();
        $notas->creado = Auth::user()->name;
        $notas ->id_trabajos = $_POST["id"];
        $notas->nota = "(Enviado al Cliente) ".$_POST["nota"];
        $notas->save();

        $datos = DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->select('clientes.id')
                ->where('orden_trabajos.id',$_POST["id"])
                ->first();

        $cliente = DB::table('clientes')
                ->select('correo','nombreCliente')
                ->where('id',$datos->id)
                ->first();

        $nota = $_POST["nota"];

        $ini_ses = new Historial();
        $ini_ses->usuario = Auth::user()->name;
        $ini_ses->informacion = 'Envio correo electronico al cliente: '.$cliente->nombreCliente.' Asunto: '.$nota;
        $ini_ses->id_trabajos = $_POST["id"];
        $ini_ses->save();

        $mailData = [
                    'title' => 'Orden de Trabajo #'.$_POST["id"],
                    'body' => 'Estimado/a: '.$cliente->nombreCliente
                ];
        
                    
            Mail::to($cliente->correo)->send(new NotaCliente($mailData,$nota));
            return json_encode(array('data'=>$notas));
        
        
    }

    public function destroy(){

        $serve = DB::table('servicios')
                ->select('*')
                ->where('id','=',$_POST["id"])
                ->first();
                    
        $ini_ses = new Historial();
        $ini_ses->usuario = Auth::user()->name;
        $ini_ses->informacion = 'Elimino el registro de servicio Detalle: '.$serve->detalle.' Descripcion: '.$serve->descripcion.' Precio: '.$serve->precio;
        $ini_ses->id_trabajos = $serve->id_trabajos;
        $ini_ses->save();


        $trabajo=Servicio::findOrFail($_POST["id"]);
        $trabajo->delete();

        return json_encode(array('data'=>true));
    }
}
 