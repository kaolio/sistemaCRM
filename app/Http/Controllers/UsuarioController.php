<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UsuarioController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-usuario|crear-usuario|editar-usuario|borrar-usuario',['only'=>['index']]);
        $this->middleware('permission:crear-usuario',['only'=>['create','store']]);
        $this->middleware('permission:editar-usuario',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-usuario',['only'=>['destroy']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            
            $usuarios = user::paginate(5);

            return view('usuarios.index',compact('usuarios'));

        } catch (\Throwable $th) {
            return view('errors.error');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            
            $roles = Role::pluck('name','name')->all();
            return view('usuarios.create',compact('roles'));

        } catch (\Throwable $th) {
            return view('errors.error');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);

            $user = User::create($input);
            $user->assignRole($request->input('roles'));

            return redirect('usuarios');

        } catch (\Throwable $th) {
            return view('errors.error');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        try {

            $user = User::find($id);
            $roles = Role::pluck('name','name')->all();
            $userRole = $user->roles->pluck('name','name')->all();

            foreach ($userRole as $value) {
                $userRole = $value;
            }
            return view('usuarios.editar',compact('user', 'roles', 'userRole'));

        } catch (\Throwable $th) {
            return view('errors.error');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $input = $request->all();
            if (!empty($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            } else {
                $input = Arr::except($input, array('password'));
            }
            
    
            $user = User::find($id);
            $user->name = request('name');
            $user->email = request('email');
            $user->update();
    
            //DB::table('model_has_roles')
              //  ->where('model_id',$id)->delete();
    
            $user->assignRole($request->input('roles'));
    
            return redirect('usuarios');
        } catch (\Throwable $th) {
            return view('errors.error');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdenTrabajo  $ordenTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            
            User::find($id)->delete();
            return redirect()->route('usuarios.index');

        } catch (\Throwable $th) {
            return view('errors.error');
        }

        
    }

    public function validarCorreo(){
        $db_handle = new User();

        if(!empty($_POST["correo"])) {
            $user_count = $db_handle->validarCorreo($_POST["correo"]);

            if($user_count){
                echo "<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Correo electronico ya registrado</h5></span>";
            }else{
                if($user_count == false) {
                    return 1;
                }
            }
            
        }
    }

}
