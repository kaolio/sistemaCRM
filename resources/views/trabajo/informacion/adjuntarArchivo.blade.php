<!--Adjuntar archivo -->
<style>
    .subir {
        text-align: center;
        display: flex;
        justify-content: center;
    }
</style>
<div class="container">
    <div class="text-center">
        <img src="{{asset('imagenes/upload.png')}}" class="img-fluid" width="400px " style="text-align: center;">
        
        <form action="{{route('elMilagro',$orden_elegida->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center">
                    <div class="subir">
                        <div class="col-3">
                            <div class="input-group">
                                <span>
                                <label for="file-upload"  style="cursor:pointer; background: linear-gradient(0.25turn, #3f87a6, #ebf8e1, #f69d3c);" class="subir">
                                <i class="fas fa-cloud-upload-alt"></i> Cargar archivo</label>
                                <input id="file-upload" name="file-upload" onchange='cambiarTexto()'  type="file" style='display: none;'/>
                                <span class="input-group-text"  style=" background:rgb(29, 145, 195);display: none; color: aliceblue"></span>
                                <input type="text"  class="form-control required"  disabled  id="info" > &nbsp;<br>
                                <button class="btn btn-sm btn-success" type="submit" id="subirArchivo" name="subirArchivo">Subir Archivo</button>
                             </div>
                        </div>
                    </div>
                </div>
            </form>
           <!-- <div class="text-center">
                <div class="subir">
                    <div class="input-group">
                        <span>
                            <input class="form-control" id="file-upload" name="file-upload" type="file" style="width: 250px;" value="Cargar">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195);display: none; color: aliceblue"></span> <br>
                            <input type="submit" class="btn btn-sm btn-success" value="Subir Archivo">
                    </div>
                </div>
             </div>-->
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    function cambiarTexto(){
      var pdrs = document.getElementById('file-upload').files[0].name;
      document.getElementById('info').value = pdrs;
    }
   
   
</script>
    
   
