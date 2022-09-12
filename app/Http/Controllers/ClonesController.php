<?php

namespace App\Http\Controllers;

use App\Models\Clones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClonesController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clones  $clones
     * @return \Illuminate\Http\Response
     */
    public function show(Clones $clones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clones  $clones
     * @return \Illuminate\Http\Response
     */
    public function edit(Clones $clones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clones  $clones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clones $clones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clones  $clones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clones $clones)
    {
        //
    }

    public function discosUso(){

        $clones = DB::table('clones')
                ->select('*')
                ->get();

        return view('inventario.discosUso.discosUso',compact('clones'));
        
    }

   
}