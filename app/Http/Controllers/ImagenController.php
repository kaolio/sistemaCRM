<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    public function subirArchivo(Request $request,$id){
       
        
        $file = $request->file('file-upload');


            //return Storage::disk('archivos')->get($id.'.html'); PARA OBTENER DEL ALMACEN ARCHIVOS Y MOSTRARLO

            if ($file != null) {
                DB::table('orden_trabajos')
                        ->where('id',$id)
                        ->update(['lista_archivo' => 'SI']);

                $request->file('file-upload')->storeAs('public/archivos', $id.'.html');
                //$request->file('file-upload')->move(base_path('resources/views/otros'), $id.'.blade.php');
            } 

                 
        return redirect('/trabajos/detalle/'.$id);
        //return view('otros/1');
    
    }

    public function verFileList($id)
    {
        //return view('otros.'.$id);
        return Storage::disk('archivos')->get($id.'.html');
    }

    public function descargarFileList($id)
    {
        
        return Storage::download('public/archivos/'.$id.'.html');
    }

    public function eliminarFileList($id)
    {
        DB::table('orden_trabajos')
                        ->where('id',$id)
                        ->update(['lista_archivo' => 'NO']);
         Storage::delete('public/archivos/'.$id.'.html');

        return redirect('/trabajos/detalle/'.$id);
    }

}
