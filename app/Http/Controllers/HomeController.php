<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use Illuminate\Support\Facades\DB;

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
                        ->where('estado','=','Trabajo Incompleto')
                        ->count();

        $trabajosPagados = DB::table('orden_trabajos')
                        ->select('*')
                        ->where('estado','=','Pagado')
                        ->count();

                       // dd($trabajosUrgentes);

        $datosDashboard = DB::table('notas')
                        ->select('*')
                        ->get();

        return view('home',compact('datosDashboard','trabajosUrgentes','trabajosCompletos','trabajosInCompletos','trabajosPagados'));
    }

    public function datosDashboard(){

        $datosDashboard = DB::table('notas')
                        ->select('*')
                        ->get();

         return json_encode(array('data'=>$datosDashboard));
    }

}
