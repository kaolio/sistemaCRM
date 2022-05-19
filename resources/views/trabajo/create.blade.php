@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">ORDEN DE TRABAJO</h1>

<style>
  span {
              text-transform: capitalize;
              }
          .menor{
            color: red;
            font-size: medium;
          }    
          .error{
              color:#cf1111;
              font-size: medium;
          }
          .bien{
               color: rgb(15, 208, 67);
              font-size: medium;
          }
</style>

<script>
  function validarInfo(){
  if($("#infoCliente").val() == ""){
    $("#estadoInfo").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
    if ($("#infoCliente").val().length < 5) {
           $("#estadoInfo").html(
               "<span  class='menor'><h5 class='menor'>Ingrese de 5 a 50 caracteres</h5></span>");
       } else {
        if ($("#infoCliente").val().length > 50) {
               $("#estadoInfo").html(
                   "<span  class='menor'><h5 class='menor'>Ingrese menos de 50 caracteres</h5></span>");
           } else {
    
      $("#estadoInfo").html("<span  class='bien'><h5 >Válido</h5></span>");
    }
  }
}
}

function validarTiempo(){
  if($("#tiempo").val() == ""){
    $("#estadoTiempo").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoTiempo").html("<span  class='bien'><h5 >Válido</h5></span>");
        
  }
}

// function validarFabricante(){
//   if($("#fabricante").val() == ""){
//     $("#estadoFabricante").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
//   }else{
//       $("#estadoFabricante").html("<span  class='bien'><h5 >Válido</h5></span>");
        
//   }
// }

// function validarModelo(){
//   if($("#modelo").val() == ""){
//     $("#estadoModelo").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
//   }else{
//       $("#estadoModelo").html("<span  class='bien'><h5 >Válido</h5></span>");
        
//   }
// }

// function validarSerial(){
//   if($("#serial").val() == ""){
//     $("#estadoSerial").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
//   }else{
//       $("#estadoSerial").html("<span  class='bien'><h5 >Válido</h5></span>");
        
//   }
// }

// function validarLocalizacion(){
//   if($("#localizacion").val() == ""){
//     $("#estadoLocalizacion").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
//   }else{
//       $("#estadoLocalizacion").html("<span  class='bien'><h5 >Válido</h5></span>");
        
//   }
// }

</script>  


<div class="card">
  <div class="card-body">
    <body>
      
        <form action="{{url('/trabajo/nuevo')}}" method="POST">
          @csrf
          <div class='container-fluid'>
                <div class="card">
                    <div class="card-body">
                    <label class="card-title" style="height: 2rem;">Informacion del Cliente</label>
                      <input type="text" id="infoCliente" name="infoC" value="{{ old('infoC') }}" class="btn-block" autocomplete="off" required onkeyup="validarInfo()" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
                      <span id="estadoInfo"></span>
                      <br>
                      <a href="{{ url('/cliente/nuevo')}}" class="card-link">Nuevo Cliente</a> 
                    </div>
                </div>
                
            

               <!-- Nuevos Prioridad-->
                <div class="card" style="flex-direction:row;">
                    <div class="card-body">
                        <div class="input-group">
                          <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Prioridad</span>
                            <select name="priority" class="form-control" class="btn-block" required>
                              <option value="">Escoga la prioridad</option>
                              <option value="Normal">Normal</option>
                              <option value="Alta">Alta</option>
                              <option value="Urgente">Urgente</option>
                            </select>
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Tiempo Estimado</span>
                            <input type="text" id="tiempo" name="tiempoEstimado" class="form-control" 
                                placeholder="Ingrese un tiempo estimado" required onkeyup="validarTiempo()" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
                                {{-- <span id="estadoTiempo"></span> --}}
                        </div>
                        <span id="estadoTiempo"></span>
                    </div>
                </div>
                 <!-- -->

                    <h4><strong>Dispositivos</strong></h4>
                    <td><button type="button" name="remove" id="" class="btn btn-danger btn_remove" style="border-radius: 50%;">X</button></td>
                        <td class="btn-block"><button type="button" name="add" id="add" class="btn btn-primary" style="border-radius: 50%;"><i class="fa fa-plus"></i> </button></td>
                        <br><br>
            

                <!-- Nuevo Tipo-->
                  <div class="card" style="flex-direction:row;">
                      <div class="card-body">
                          <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Tipo</span>
                            <select name="Type" class="form-control" required>
                              <option value="">Escoja el tipo</option>
                              <option value="hdd">hdd</option>
                              <option value="ssd">ssd</option>
                              <option value="disk">disk</option>
                            </select>
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Rol</span>
                            <select name="Role" id="Roles" class="form-control" required>
                              <option value="">Escoja el Rol</option>
                              <option value="Master">Master</option>
                            </select>
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Fabricante</span>
                            <input type="text" id="fabricante" name="Fabricante" class="form-control" 
                                placeholder="Ingrese el fabricante" value="{{ old('Fabricante') }}" autocomplete="off" required onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32)) ">
                                <span id="estadoFabricante"></span>

                                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Modelo</span>
                            <input type="text" id="modelo" name="Modelo" value="{{ old('Modelo') }}" autocomplete="off" class="form-control" 
                                placeholder="Ingrese el modelo" required onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32)) ">
                                <span id="estadoModelo"></span>


                                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Serial</span>
                            <input type="text" id="serial" name="Serial" value="{{ old('Serial') }}" autocomplete="off" class="form-control" 
                                placeholder="Ingrese el serial" required onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32)) ">
                                <span id="estadoSerial"></span>


                                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Localizacion</span>
                            <input type="text" id="localizacion" name="Localizacion" value="{{ old('Localizacion') }}" autocomplete="off" class="form-control" 
                                placeholder="Ingrese la localizacion" required onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32)) ">
                                <span id="estadoLocalizacion"></span>
                          </div>
                      </div>
                  </div>
                <!-- -->
  
               
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title" style="height: 2rem;"><strong>Información de mal funcionamiento del dispositivo </strong></h5>
                      <input type="text" style="height: 10em" name="infoDispositivo" class="btn-block" autocomplete="off" required onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32)) ">
                    
                    </div>
                </div>
                <div class="card" >
                    <div class="card-body">
                    <h5 class="card-title" style="height: 2rem;"><strong>Dato importante </strong></h5>
                      <input type="text" style="height: 10em" name="DatoImportante" class="btn-block" autocomplete="off" required onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32)) ">
                    
                    </div>
                </div>
                
                <br><br>
                <div class="form-group">
                <a href="" class="btn btn-danger my-2 my-sm-0">Cancelar</a>
                <button class="btn btn-primary" type="submit" >Aceptar</button>
                </div>
            </div>
          </form>   
  </body>
  </div>
  <div class="card-footer">
    
  </div>
</div>



@endsection