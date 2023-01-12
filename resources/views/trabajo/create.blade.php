@extends('adminlte::page')
@section('content')

<style>
  .boton{
    position: absolute;
    right: 2%;
  }

</style>

<h1 align="center" style="font-weight: 700">ORDEN DE TRABAJO</h1>

  
<div class="card">
  <div class="card-body">
    <body>
      
        <form action="{{url('/trabajo/nuevo')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class='container-fluid'>
                <div class="card">
                    <div class="card-body">
                      <div class="row justify-content-center">
                          <div class="col-11 ">
                            <label class="card-title" style="height: 2rem;">Informacion del Cliente</label>
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Cliente <span style="color: #cf1111">*</span></span>
                             <input type="text" id="cliente" value="{{$cadena}}" name="cliente" class="form-control" autocomplete="off" list="codigo" required onkeyup="" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                             <datalist id="codigoDatalist" >
                            </datalist>
                           </div>
                            <span id="estadoCliente"></span>
                            <br>
                            @can('crear-cliente')
                                <a href="{{ url('/cliente/nuevo')}}" class="card-link">Nuevo Cliente</a>
                            @endcan
                             
                          </div>
                      </div>
                      </div>

                      <div class="row justify-content-center">
                          
                          <div class="col-5">
                            <div class="input-group">
                              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Prioridad<span style="color: #cf1111">*</span></span>
                                <select name="prioridad" class="form-control" class="btn-block" required>
                                  <option disabled>Escoja la prioridad</option>
                                  <option value="Normal">Normal</option>
                                  <option value="Prioritario">Prioritario</option>
                                  <option value="Urgente">Urgente</option>
                                  <option value="Inmediato">Inmediato</option>
                                </select>
                            </div>
                          </div>
                          
                          <div class="col-5">
                            <div class="input-group">
                               <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Tiempo Estimado<span style="color: #cf1111">*</span></span>
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
                    <h5><strong>DISPOSITIVOS</strong></h5>
                    &nbsp;&nbsp;&nbsp;&nbsp;<td class="btn-block"><button type="button" id="adicional" name="adicional" class="btn btn-primary" style="border-radius: 50%;">
                     <i class="fa fa-plus"></i> </button>
                    </td>
                        <div class="table-responsive">
                      <table class="table tftable" id="tabla">
                          <thead class="thead">
                              
                          </thead>
                          <tbody id="tabla">
                              <span id="estadoBoton"></span>
                              <tr>
                                  <td>
                                      <div class="input-group">
                                        <span class="input-group-text" id="inputGroup-sizing-sm" style=" background:rgb(29, 145, 195); color: aliceblue">Tipo</span>
                                          <select name="tipo[]" id="tipo" class="form-control"   >
                                            <option disabled selected >Tipo de Dispositivo</option>
                                            <option value="HDD">HDD</option>
                                            <option value="SSD">SSD</option>
                                            <option value="MS">M2</option>
                                            <option value="CD/DVD">CD/DVD</option>
                                            <option value="Unidad">Unidad Flash</option>
                                            <option value="MEMORY">Tarjeta de Memoria</option>
                                            <option value="Impresora">Impresora</option>
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
                                  </td>
                                  <td>
                                      <div class="input-group">
                                        <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Rol</span>
                                          <select name="rol[]" id="rol" class="form-control">
                                            <option disabled selected>Escoja un rol</option>
                                            <option value="Dispositivo a Recuperar">Dispositivo a Recuperar</option>
                                            <option value="Datos">Datos</option>
                                            <option value="Donante">Donante</option>
                                          </select>
                                      </div>
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Fabricante</span>
                                        <input type="text" class="form-control" name="fabricante[]"id="fabricante" onkeyup="mayus(this);" 
                                        onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))">
                                    </div>
                                    <span id="estadoFabricante"></span>
                                      
                                  </td>
                                  
                              </tr>
                              <tr>
                                <td>
                                  <div class="input-group">
                                    <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Modelo</span>
                                      <input type="text" class="form-control" onkeyup="mayus(this);" name="modelo[]"id="modelo" 
                                      onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))" >
                                  </div>
                                  <span id="estadoModelo"></span>
                                </td>
                                <td>
                                  <div class="input-group">
                                    <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Serial</span>
                                      <input type="text" class="form-control " name="serial[]"id="serial" onkeyup="mayus(this);" 
                                      onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))" >
                                  </div>
                
                                </td>
                                <td>
                                  <div class="input-group">
                                    <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Capacidad</span>
                                      <input type="text" class="form-control " name="capacidad[]"id="capacidad" onkeyup="mayus(this);" placeholder="GB, TB, PB"
                                      onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))" >
                                  </div>
                
                                </td>
                               
                              </tr>
                              <tr>
                                <td>
                                  <div class="input-group">
                                    <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Localizacion</span>
                                      <input type="text" class="form-control " name="localizacion[]"id="localizacion" onkeyup="mayus(this);" 
                                      onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))" >
                                  </div>
                
                                </td>
                                <td class='borrar'>
                                  <button class='btn btn-icon btn-danger' type='button' id='deletRow' name='deletRow'>
                                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                  </svg>
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
                <label style="font-size: 16px;">Información de mal funcionamiento del dispositivo</label>
                <br>
                <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px"  autocomplete="off" name="informacion" id="informacion" cols="140" rows="4"></textarea>

                </div>
              </div>

                <div class="card" >
                    <div class="card-body">
                      <label style="font-size: 16px;">Dato Importante</label>
                      <br>
                      <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" autocomplete="off" name="dato" id="dato" cols="140" rows="4"></textarea>

                    </div>
                    
                </div>

                <div class="card" >
                  <div class="card-body">
                    <label style="font-size: 16px;">Nota</label>
                    <br>
                    <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" autocomplete="off" name="nota" id="nota" cols="140" rows="4"></textarea>
                  </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <label>Imagen:</label>
                  <input type="file" class="form-control" name="imagen[]" multiple id="imagen" maxlength="256" placeholder="Imagen">
                  <br>
                  <div class="row" id="resto_form" style="margin-left: 1%"></div>
                </div>
              </div>
                
                <br>
                <div class="form-group">
                <a href="/trabajos" class="btn btn-danger my-2 my-sm-0">Cancelar</a>
                <button class="btn btn-primary" type="submit" >Aceptar</button>
                </div>
            </div>
          </form>   
  </body>
  </div>
</div>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

<script src="{{ asset('js/trabajo/create.js')}}"></script>
<link rel="stylesheet" href="{{ URL::asset('estilos/style.css') }} ">
<script>

if ($('#cliente').val() != "") {
    $('#cliente').prop('readonly', true);
  }

  $('#cliente').keyup(function() {
      var query = $(this).val();
      console.log(query);
      if (query != '') {
          $.ajax({
              url: '/autocompletarCliente',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
                  query: query,
              },
              success: function(data) {
                  $('#codigoDatalist').fadeIn();
                  $('#codigoDatalist').html(data);
              }
          
          });
      }
  });




  var contador = 0;
  function readURL(input) {
    //console.log( numero);
    
    
    for (let i = 0; i < input.files.length; i++) {
      
      $('#resto_form').append('<div  id="resto_form'+contador+'" class="card anuncio" style="width: 350px; height: 140px; background: transparent">'
                      +'<span class="boton"  onclick="eliminarImagen('+contador+')">'
                      +'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-trash" viewBox="0 0 448 512"><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm88 200H296c13.3 0 24 10.7 24 24s-10.7 24-24 24H152c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/></svg>'
                      +'</span>'
                      +'</div>&nbsp;&nbsp;&nbsp;&nbsp;');

      //$('#resto_form'+contador).append('<div id="img'+contador+'" class="card" style="width: 350px"></div>');

      
      $('#resto_form'+contador).append(`<img id="img`+contador+`" width="350px" height="140px" align="left">`); //Asignamos el src dinámicamente a un img dinámico también
      addImg(input.files[i],contador);
      //reader.readAsDataURL(input.files[0]);
      //reader.readAsDataURL(input.files[i]);
      contador = contador+1;
    }

  }

  function addImg(input,cont) {
      console.log(input.files);
      var reader = new FileReader();
      reader.onload = function(e) {
        // Asignamos el atributo src a la tag de imagen
        //$('#imagenmuestra').attr('src', e.target.result);
        var result = e.target.result;
        $('#img'+cont).attr('src', e.target.result);
      };
      reader.readAsDataURL(input);
  }

  // El listener va asignado al input
  $("#imagen").change(function() {
    readURL(this);
  });

  function eliminarImagen(cont) {
    $('#resto_form'+cont).remove();
  }
</script>

@endsection