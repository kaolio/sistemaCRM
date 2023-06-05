<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    public function subirArchivo(Request $request,$id){
       
        try {
            
                $file = $request->file('file-upload');

                //return Storage::disk('archivos')->get($id.'.html'); PARA OBTENER DEL ALMACEN ARCHIVOS Y MOSTRARLO

                $archivo = DB::table('orden_trabajos')
                            ->select('nombre_archivo')
                            ->where('id',$id)
                            ->first();
                
                Storage::delete('public/archivos/'.$archivo->nombre_archivo.'.html');

                if ($file != null) {

                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ%&';
                    $nombre = substr(str_shuffle($permitted_chars), 0, 20);

                    DB::table('orden_trabajos')
                            ->where('id',$id)
                            ->update(['lista_archivo' => 'SI',
                                    'nombre_archivo' => $nombre]);

                    $request->file('file-upload')->storeAs('public/archivos', $nombre.'.html');
                    //$request->file('file-upload')->move(base_path('resources/views/otros'), $id.'.blade.php');

                
                    $ini_ses = new Historial();
                    $ini_ses->usuario = Auth::user()->name;
                    $ini_ses->informacion = 'Subio una lista de archivos';
                    $ini_ses->id_trabajos = $id;
                    $ini_ses->save();
                } 

                    
            $crip =Crypt::encrypt($id);
            return redirect('/trabajos/detalle/'.$crip);

        } catch (\Throwable $th) {
            return back();
        }
            
    
    }

    public function verFileList($id)
    {
        try {
            return Storage::disk('archivos')->get($id.'.html');
        } catch (\Throwable $th) {
            return view('errors.archivo');
        }
       
    }

    public function descargarFileList($id)
    {

        return Storage::download('public/archivos/'.$id.'.html');
    }

    public function eliminarFileList($id)
    {
        $archivo = DB::table('orden_trabajos')
                        ->select('nombre_archivo')
                        ->where('id',$id)
                        ->first();

        DB::table('orden_trabajos')
                        ->where('id',$id)
                        ->update(['lista_archivo' => 'NO']);

        $ini_ses = new Historial();
        $ini_ses->usuario = Auth::user()->name;
        $ini_ses->informacion = 'Elimino la lista de archivos';
        $ini_ses->id_trabajos = $id;
        $ini_ses->save();
            
        Storage::delete('public/archivos/'.$archivo->nombre_archivo.'.html');

        $crip =Crypt::encrypt($id);
        return redirect('/trabajos/detalle/'.$crip);
    } 

    public function subirImagen(Request $request,$id){
       
        
        $file = $request->file('file-upload-image');

        //dd($file);
            //return Storage::disk('archivos')->get($id.'.html'); PARA OBTENER DEL ALMACEN ARCHIVOS Y MOSTRARLO
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $nombre = substr(str_shuffle($permitted_chars), 0, 10);
            
            
            if ($file != null) {

                $ima = new Imagen();
                $ima->nombre = $id."-".$nombre;
                $ima->id_trabajo = $id;
                $ima->save();

                //$request->file('file-upload-image')->storeAs('public/caso/', $id."-".$nombre.'.jpg');
                //$request->file('file-upload')->move(base_path('resources/views/otros'), $id.'.blade.php');
                $request->file('file-upload-image')->move(base_path('public/imagenes-caso/'),  $id."-".$nombre.'.jpg');

                $ini_ses = new Historial();
                $ini_ses->usuario = Auth::user()->name;
                $ini_ses->informacion = 'Subio una Imagen';
                $ini_ses->id_trabajos = $id;
                $ini_ses->save();
            } 

        $crip =Crypt::encrypt($id);
        return redirect('/trabajos/detalle/'.$crip);
        //return view('otros/1');
    
    }

    public function eliminarFileImage($id)
    {

        
        try {
            
            $archivo = DB::table('imagens')
                            ->select('nombre','id_trabajo')
                            ->where('id',$id)
                            ->first();
                
            File::delete('imagenes-caso/'.$archivo->nombre.'.jpg');
            //Storage::delete('public/caso/'.$archivo->nombre.'.jpg');

            $trabajo=Imagen::findOrFail($id);
            $trabajo->delete();

            $ini_ses = new Historial();
            $ini_ses->usuario = Auth::user()->name;
            $ini_ses->informacion = 'Elimino una imagen';
            $ini_ses->id_trabajos = $archivo->id_trabajo;
            $ini_ses->save();

            $crip =Crypt::encrypt($archivo->id_trabajo);
            return redirect('/trabajos/detalle/'.$crip);


        } catch (\Throwable $th) {

            return back();
        }
        
    } 

}
