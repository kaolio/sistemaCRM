<style>
    .boton{
    position: absolute;
    right: 3%;
    top:2%;
  }
</style>

<div class="row justify-content-center">
<div class="card">
    
    <div class="card-body">
        
            <form action="{{route('Imagen',$orden_elegida->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center">
                    <div class="subir_imagen">
                        <div class="col-12">
                            <div class="input-group">
                                <span>
                                <label for="file-upload-image"  style="cursor:pointer; background: linear-gradient(0.25turn, #3f87a6, #ebf8e1, #f69d3c);" class="subir">
                                <i class="fas fa-cloud-upload-alt"></i> Cargar Imagen</label>
                                <input id="file-upload-image" name="file-upload-image" onchange='cambiar()'  type="file" style='display: none;'/>
                                <span class="input-group-text"  style=" background:rgb(29, 145, 195);display: none; color: aliceblue"></span>
                                <input type="text"  class="form-control required"  disabled  id="info-imagen" > &nbsp;<br>
                                <button class="btn btn-sm btn-success" type="submit" id="subirArchivoImagen" name="subirArchivo">Subir Imagen</button>
                             </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>

<div class="row">

    @foreach ($imagenes as $imagenes)
        <div class="card col-5" style="width: 35%;height: 10%;" >
            <button class="btn btn-white boton" data-toggle="modal" data-target="#eliminarImage{{$imagenes->id}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-trash" viewBox="0 0 448 512"><path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg>    
            </button>
            <img src="{{ Storage::url('caso/'.$imagenes->nombre.'.jpg') }}" align="left">
            
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


        {{-- ELIMINAR --}}
        <div class="modal fade" id="eliminarImage{{$imagenes->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Eliminar Imagen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-title w-100 text-center">
                    ¿Realmente Desea Borrar esta Imagen?
                </div>
                <form action="{{url('/trabajos/detalle/fileImage/eliminar/'.$imagenes->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
                    <button class="btn btn-success" >Aceptar</button>
                </div>
                </form> 
                </div>
            </div>
            </div>

    @endforeach 

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    function cambiar(){
      var pdrs = document.getElementById('file-upload-image').files[0].name;
      document.getElementById('info-imagen').value = pdrs;
    }
   
</script>