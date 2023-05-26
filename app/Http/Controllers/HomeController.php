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
            
            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {
                
                $trabajosUrgentes = DB::table('orden_trabajos')
                            ->select('*')
                            ->where('creado','=',Auth::user()->name)
                            ->where(function($q) {
                                $q->where('prioridad','Urgente')
                                ->orWhere('prioridad','Inmediato');
                            })
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
                                ->where('estado','<>','Pagado')
                                ->where('creado','=',Auth::user()->name)
                                ->count();
    
                $trabajosPagados = DB::table('orden_trabajos')
                                ->select('*')
                                ->where('creado','=',Auth::user()->name)
                                ->where(function($q) {
                                    $q->where('estado','=','Pagado y Regresado al Cliente')
                                    ->orWhere('estado','Pagado');
                                })
                                ->count();
    
                            // dd($trabajosUrgentes);
    
                $datosDashboard = DB::table('notas')
                                ->join('orden_trabajos','orden_trabajos.id','notas.id_trabajos')
                                ->select('*')
                                ->where('orden_trabajos.creado','=',Auth::user()->name)
                                ->paginate(20);
    
                return view('home',compact('datosDashboard','trabajosUrgentes','trabajosCompletos','trabajosInCompletos','trabajosPagados','rol'));
                
            }else{
                
                $trabajosUrgentes = DB::table('orden_trabajos')
                            ->select('*')
                            ->where('prioridad','=','Urgente')
                            ->orWhere('prioridad','Inmediato')
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
                                ->where('estado','<>','Pagado')
                                ->count();
    
                $trabajosPagados = DB::table('orden_trabajos')
                                ->select('*')
                                ->where('estado','=','Pagado y Regresado al Cliente')
                                ->orWhere('estado','Pagado')
                                ->count();
    
                            // dd($trabajosUrgentes);
    
                $datosDashboard = DB::table('notas')
                                ->join('orden_trabajos','orden_trabajos.id','notas.id_trabajos')
                                ->select('*')
                                ->paginate(20);
    
                return view('home',compact('datosDashboard','trabajosUrgentes','trabajosCompletos','trabajosInCompletos','trabajosPagados','rol'));
            }
            
            
            
            
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
                            ->where('estado','<>','Pagado')
                            ->where('estado','<>','Devuelto al Cliente')
                            ->count();

            $trabajosPagados = DB::table('orden_trabajos')
                            ->select('*')
                            ->where('estado','=','Pagado y Regresado al Cliente')
                            ->orWhere('estado','Pagado')
                            ->count();

                        // dd($trabajosUrgentes);

            $datosDashboard = DB::table('notas')
                            ->select('*')
                            ->get();

            return view('home',compact('datosDashboard','trabajosUrgentes','trabajosCompletos','trabajosInCompletos','trabajosPagados','rol'));

        }
        
        
    }

    public function datosDashboard(){

        $rols = DB::table('model_has_roles')
                    ->select('role_id')
                    ->where('model_id',Auth::user()->id)
                    ->first();
                    
            $rol = Role::findById($rols->role_id)->name ;
        if ($rol != 'ADMINISTRADOR') {
            
            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {
                
                $datosDashboard = DB::table('notas')
                        ->select('*')
                        ->where('orden_trabajos.creado','=',Auth::user()->name)
                        ->get();
                
            }else{
                
                $datosDashboard = DB::table('notas')
                        ->select('*')
                        ->get();
            }
            
            
        }else{
            
            $datosDashboard = DB::table('notas')
                        ->select('*')
                        ->get();
        }

        
         return json_encode(array('data'=>$datosDashboard));
    }

    public function urgente(){

        $rols = DB::table('model_has_roles')
        ->select('role_id')
        ->where('model_id',Auth::user()->id)
        ->first();
        
        $rol = Role::findById($rols->role_id)->name ;
        if ($rol == 'ADMINISTRADOR') {

            $urgente = DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                    ->where('prioridad','Urgente')
                    ->orWhere('prioridad','Inmediato')
                    ->get(); 

        }else{

            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {

                $urgente = DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                ->where('orden_trabajos.creado','=',Auth::user()->name)
                ->where(function($q) {
                    $q->where('prioridad','Urgente')
                    ->orWhere('prioridad','Inmediato');
                })
                ->get(); 

            }else{

                $urgente = DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                    ->where('prioridad','Urgente')
                    ->orWhere('prioridad','Inmediato')
                    ->get(); 
            }

        }

        

        return view('dashboard.urgente',compact('urgente'));
    }

    public function completo(){

        $rols = DB::table('model_has_roles')
        ->select('role_id')
        ->where('model_id',Auth::user()->id)
        ->first();
        
        $rol = Role::findById($rols->role_id)->name ;
        if ($rol == 'ADMINISTRADOR') {

            $completo = DB::table('orden_trabajos')
                        ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                        ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                        ->where('estado','Trabajo Completo')
                        ->get(); 

        }else{

            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {

                $completo = DB::table('orden_trabajos')
                            ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                            ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                            ->where('orden_trabajos.creado','=',Auth::user()->name)
                            ->where('estado','Trabajo Completo')
                            ->get(); 

            }else{

                $completo = DB::table('orden_trabajos')
                            ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                            ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                            ->where('estado','Trabajo Completo')
                            ->get(); 

            }

        }


        return view('dashboard.completo',compact('completo'));
    }

    public function pagado(){

        $rols = DB::table('model_has_roles')
        ->select('role_id')
        ->where('model_id',Auth::user()->id)
        ->first();
        
        $rol = Role::findById($rols->role_id)->name ;
        if ($rol == 'ADMINISTRADOR') {

            $pagado = DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                    ->where('estado','Pagado y Regresado al Cliente')
                    ->orWhere('estado','Pagado')
                    ->get(); 

        }else{

            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {

                $pagado = DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                    ->where('orden_trabajos.creado','=',Auth::user()->name)
                    ->where(function($q) {
                        $q->where('estado','=','Pagado y Regresado al Cliente')
                        ->orWhere('estado','Pagado');
                    })
                    ->get(); 


            }else{

                $pagado = DB::table('orden_trabajos')
                    ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                    ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at')
                    ->where('estado','Pagado y Regresado al Cliente')
                    ->orWhere('estado','Pagado')
                    ->get(); 

            }

        }


        return view('dashboard.pagado',compact('pagado'));
    }

    public function pendiente(){

        $rols = DB::table('model_has_roles')
        ->select('role_id')
        ->where('model_id',Auth::user()->id)
        ->first();
        
        $rol = Role::findById($rols->role_id)->name ;
        if ($rol == 'ADMINISTRADOR') {

            $pendiente = DB::table('orden_trabajos')
                                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                                ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at','orden_trabajos.estado')
                                ->where('estado','<>','Pagado y Regresado al Cliente')
                                ->where('estado','<>','Trabajo Completo')
                                ->where('estado','<>','Pagado')
                                ->where('estado','<>','Devuelto al Cliente')
                                ->get(); 

        }else {

            $rolePermission = Auth::user()->hasPermissionTo('ver orden de trabajo(Personal)');

            $usuario = DB::table('users')
                    ->select('name')
                    ->where('id',Auth::user()->id)
                    ->first();
            
            if ($rolePermission) {

                $pendiente = DB::table('orden_trabajos')
                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at','orden_trabajos.estado')
                ->where('estado','<>','Pagado y Regresado al Cliente')
                ->where('estado','<>','Trabajo Completo')
                ->where('estado','<>','Pagado')
                ->where('estado','<>','Devuelto al Cliente')
                ->where('orden_trabajos.creado','=',Auth::user()->name)
                ->get(); 


            }else{

                 $pendiente = DB::table('orden_trabajos')
                                ->join('clientes','clientes.id','orden_trabajos.id_cliente')
                                ->select("orden_trabajos.id",'clientes.nombreCliente','orden_trabajos.created_at','orden_trabajos.estado')
                                ->where('estado','<>','Pagado y Regresado al Cliente')
                                ->where('estado','<>','Trabajo Completo')
                                ->where('estado','<>','Pagado')
                                ->where('estado','<>','Devuelto al Cliente')
                                ->get(); 

            }
           
            
        }

        

        return view('dashboard.pendiente',compact('pendiente'));
    }
}
