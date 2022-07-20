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
        <form action="{{url('/trabajos/detalle/subir')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center">
                    <div class="subir">
                        <div class="col-3">
                            <div class="input-group">
                                <span>
                                <label for="file-upload" class="subir">
                                <i class="fas fa-cloud-upload-alt"></i> Cargar archivo</label>
                                <input id="file-upload" name="file-upload" onchange='cambiar()' type="file" style='display: none;'/>
                                <span class="input-group-text"  style=" background:rgb(29, 145, 195);display: none; color: aliceblue"></span>
                                <input type="text"  class="form-control required"  disabled  id="info" ></input> &nbsp;<br>
                                <button type="submit" class="btn btn-sm btn-success" id="subirArchivo" name="subirArchivo">Subir Archivo</button>
                             </div>
                        </div>
                    </div>
                </div>
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
        </form>
    </div>
</div>
<script>
    function cambiar(){
      var pdrs = document.getElementById('file-upload').files[0].name;
      document.getElementById('info').value = pdrs;
    }
    $(function() {
        
         $(document).on('change keyup', '.required', function(e){
              let Disabled = true;
               $(".required").each(function() {
                 let value = this.value
                 if ((value)&&(value.trim() !=''))
                     {
                       Disabled = false
                     }else{
                       Disabled = true
                       return false
                     }
               });
              
              if(Disabled){
                   $('#subirArchivo').prop("disabled", true);
                 }else{
                   $('#subirArchivo').prop("disabled", false);
                 }
            })
        });
</script>
    
   
