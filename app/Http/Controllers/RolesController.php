<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:lista de roles|crear rol|editar rol|borrar rol',['only'=>['index']]);
        $this->middleware('permission:crear rol',['only'=>['create','store']]);
        $this->middleware('permission:editar rol',['only'=>['edit','update']]);
        $this->middleware('permission:borrar rol',['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            
            $roles = Role::paginate(5);
            return view('roles.index',compact('roles'));

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
            
            $permission = Permission::get();
            return view('roles.create',compact('permission'));

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
            
            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));
            
            return redirect('/roles');

        } catch (\Throwable $th) {
            return view('errors.error');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(Roles $roles, $id)
    {

        try {
            
            $id = Crypt::decrypt($id);

            $role = Role::find($id);
            $permission = Permission::get();
            $rolePermission = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id',$id)
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                ->all();

            return view('roles.editar',compact('role','permission','rolePermission'));

        } catch (\Throwable $th) {
            return view('errors.error');
        }

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $roles,$id)
    {

        try {
            
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();

            $role->syncPermissions($request->input('permission'));

        
            return redirect('roles');
            
        } catch (\Throwable $th) {
            return view('errors.error');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $roles , $id)
    {

        try {
            
            DB::table('roles')
                ->where('id',$id)
                ->delete();

            return redirect('/roles');

        } catch (\Throwable $th) {
            return view('errors.error');
        }
        
    }
    
}
