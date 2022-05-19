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


</script>  


<div class="card">
  <div class="card-body">
    <body>
      
        <form action="{{url('/trabajo/nuevo')}}" method="POST">
          @csrf
          <div class='container-fluid'>
                <div class="card">
                    <div class="card-body">
                      <div class="row justify-content-center">
                          <div class="col-11 ">
                            <label class="card-title" style="height: 2rem;">Informacion del Cliente</label>
                            <input type="text" id="infoCliente" name="infoC" value="{{ old('infoC') }}" class="btn-block" autocomplete="off" required onkeyup="validarInfo()" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
                            <span id="estadoInfo"></span>
                            <br>
                            <a href="{{ url('/cliente/nuevo')}}" class="card-link">Nuevo Cliente</a> 
                          </div>
                      </div>
                      
                      </div>

                      <div class="row justify-content-center">
                          
                          <div class="col-5">
                            <div class="input-group">
                              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Prioridad</span>
                                <select name="priority" class="form-control" class="btn-block" required>
                                  <option value="">Escoga la prioridad</option>
                                  <option value="Normal">Normal</option>
                                  <option value="Alta">Alta</option>
                                  <option value="Urgente">Urgente</option>
                                </select>
                            </div>
                          </div>
                          
                          <div class="col-5">
                            <div class="input-group">
                               <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Tiempo Estimado</span>
                              <input type="text" id="tiempo" name="tiempoEstimado" class="form-control" 
                                placeholder="Ingrese un tiempo estimado" required onkeyup="validarTiempo()" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
                                
                            </div>
                           <span id="estadoTiempo"></span>
                          </div>
                        </div>
                      <br>
                </div>
                
            

                <div class="card">
                  <div class="card-body">
                    <h4><strong>Dispositivos</strong></h4>
                    &nbsp;&nbsp;&nbsp;&nbsp;<td class="btn-block"><button type="button" id="adicional" name="adicional" class="btn btn-primary" style="border-radius: 50%;">
                     <i class="fa fa-plus"></i> </button>
                    </td>
                        <div class="table-responsive">
                      <table class="table" id="tabla">
                          <thead class="thead">
                              
                          </thead>
                          <tbody id="tabla">
                              <span id="estadoBoton"></span>
                              <tr id="columna-0">
                                  <th>
                                      <div class="input-group">
                                        <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Tipo</span>
                                          <select name="tipo[]" id="tipo" class="form-control" class="btn-block" required>
                                            <option disabled>Escoga la prioridad</option>
                                            <option value="HDD">HDD</option>
                                            <option value="CD/DVD">CD/DVD</option>
                                            <option value="Unidad">Unidad Flash</option>
                                            <option value="MEMORY">Tarjeta de Memoria</option>
                                            <option value="Tarjeta">Impresora</option>
                                            <option value="Memoria">Memoria</option>
                                            <option value="cabezales">herramientas de cambio de cabezales</option>
                                            <option value="disco">herramientas de disco duro</option>
                                            <option value="desapilado">herramientas de desapilado de fuerza bruta</option>
                                            <option value="Laptop">Laptop</option>
                                            <option value="Notebook">Notebook</option>
                                            <option value="Otro">Otro(Dispositivo HDD)</option>
                                            <option value="PC">PC</option>
                                            <option value="Telefono">Telefono Celular</option>
                                            <option value="Disco">Disco Blu-ray</option>
                                            <option value="Tablet">Tablet</option>
                                            <option value="FDD">FDD</option>

                                          </select>
                                      </div>
                                  </th>
                                  <td>
                                      <div class="input-group">
                                        <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Rol</span>
                                          <select name="rol[]" id="rol-0" class="form-control" class="btn-block" required>
                                            <option disabled>Escoga la prioridad</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Alta">Alta</option>
                                            <option value="Urgente">Urgente</option>
                                          </select>
                                      </div>
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Fabricante</span>
                                        <input type="text" class="form-control  {{$errors->has('unidad')?'is-invalid':'' }}" name="fabricante[]"id="fabricante">
                                    </div>
                                      
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Modelo</span>
                                        <input type="text" class="form-control  {{$errors->has('unidad')?'is-invalid':'' }}" name="modelo[]"id="modelo">
                                    </div>
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Serial</span>
                                        <input type="text" class="form-control  {{$errors->has('unidad')?'is-invalid':'' }}" name="serial[]"id="serial">
                                    </div>
                  
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Localizacion</span>
                                        <input type="text" class="form-control  {{$errors->has('unidad')?'is-invalid':'' }}" name="localizacion[]"id="localizacion">
                                    </div>
                  
                                  </td>
                                  <td class="eliminar">
                                      <button class="btn btn-icon btn-danger" type="button" id="deletRow" name="deletRow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                          <span class="btn-inner--icon">
                                            

                                          </span>
                                      </button>
                                  </td>
                              </tr>
                  
                          </tbody>
                      </table>
                      <div class="div text-center">
                          <span id="stateRow"></span>
                      </div>
                  </div>
                  </div>
                  
                </div>

               
  
               
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
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
  <script>
    $(function() {
      
      $("#adicional").on('click', function() {
        
              var iman = 0;
              iman = iman + 1;
              //$("#tabla tbody tr:eq(0)").clone().appendTo("#tabla").attr("id", "columna-" + (iman)).find('input, select').attr('readonly', true).show();
              var $tableBody = $('#tabla').find("tbody"),
              $trLast = $tableBody.find("tr:last"),
              
              $trNew = $trLast.clone();
            //Set updated value
            $('select', $trNew).val($('select', $trLast).val());
            $trLast.after($trNew);
      });
      
     $(document).on("click", ".eliminar", function() {
            $(this).parents('tr').remove();
        
    });
});
  </script>

@endsection