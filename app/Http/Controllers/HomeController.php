<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rols = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
            $rol = Role::findById($rols->role_id)->name ;
        if ($rol != 'ADMINISTRADOR') {
            
            $trabajosUrgentes = DB::table('orden_trabajos')
                            ->select('*')
                            ->where('prioridad','=','Urgente')
                            ->where('creado','=',Auth::user()->name)
                            ->count();

            $trabajosCompletos = DB::table('orden_trabajos')
                            ->select('*')
                            ->where('estado','=','Trabajo Completo')
                            ->where('creado','=',Auth::user()->name)
                            ->count();

            $trabajosInCompletos = DB::table('orden_trabajos')
                            ->select('*')
                            ->where('estado','<>','Pagado y Regresado al Cliente')
                            ->where('estado','<>','Trabajo Completo')
                            ->where('estado','<>','Devuelto al Cliente')
                            ->where('creado','=',Auth::user()->name)
                            ->count();

            $trabajosPagados = DB::table('orden_trabajos')
                            ->select('*')
                            ->where('estado','=','Pagado y Regresado al Cliente')
                            ->where('creado','=',Auth::user()->name)
                            ->count();

                        // dd($trabajosUrgentes);

            $datosDashboard = DB::table('notas')
                            ->join('orden_trabajos','orden_trabajos.id','notas.id_trabajos')
                            ->select('*')
                            ->where('orden_trabajos.creado','=',Auth::user()->name)
                            ->paginate(20);

            return view('home',compact('datosDashboard','trabajosUrgentes','trabajosCompletos','trabajosInCompletos','trabajosPagados','rol'));
            
            
        } else {
            
            $trabajosUrgentes = DB::table('orden_trabajos')
                            ->select('*')
                            ->where('prioridad','=','Urgente')
                            ->count();

            $trabajosCompletos = DB::table('orden_trabajos')
                            ->select('*')
                            ->where('estado','=','Trabajo Completo')
                            ->count();

            $trabajosInCompletos = DB::table('orden_trabajos')
                            ->select('*')
                            ->where('estado','<>','Pagado y Regresado al Cliente')
                            ->where('estado','<>','Trabajo Completo')
                            ->where('estado','<>','Devuelto al Cliente')
                            ->count();

            $trabajosPagados = DB::table('orden_trabajos')
                            ->select('*')
                            ->where('estado','=','Pagado y Regresado al Cliente')
                            ->count();

                        // dd($trabajosUrgentes);

            $datosDashboard = DB::table('notas')
                            ->select('*')
                            ->get();

            return view('home',compact('datosDashboard','trabajosUrgentes','trabajosCompletos','trabajosInCompletos','trabajosPagados','rol'));

        }
        
        
    }

    public function datosDashboard(){

        $datosDashboard = DB::table('notas')
                        ->select('*')
                        ->get();

         return json_encode(array('data'=>$datosDashboard));
    }

    public function urgente(){

        $urgente = DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                    ->where('prioridad','Urgente')
                    ->get(); 

        return view('dashboard.urgente',compact('urgente'));
    }

    public function completo(){

        $completo = DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                    ->where('estado','Trabajo Completo')
                    ->get(); 

        return view('dashboard.completo',compact('completo'));
    }

    public function pagado(){

        $pagado = DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                    ->where('estado','Pagado y Regresado al Cliente')
                    ->get(); 

        return view('dashboard.pagado',compact('pagado'));
    }

    public function pendiente(){
        $pendiente = DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at','orden_trabajos.estado')
                    ->where('estado','<>','Pagado y Regresado al Cliente')
                    ->where('estado','<>','Trabajo Completo')
                    ->where('estado','<>','Devuelto al Cliente')
                    ->get(); 

        return view('dashboard.pendiente',compact('pendiente'));
    }
}
