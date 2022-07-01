<!--Adjuntar archivo -->
    <div class="text-center">
        <img src="{{asset('imagenes/upload.png')}}" class="img-fluid" width="400px " style="text-align: center;">
        <form action="{{url('/trabajos/detalle/subir')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center">
                <input class="form-control" id="file-upload" name="file-upload" type="file" style="width: 250px;">
                <input type="submit" class="btn btn-sm btn-success" value="Subir Archivo">
             </div>
        </form>
    </div>
   
