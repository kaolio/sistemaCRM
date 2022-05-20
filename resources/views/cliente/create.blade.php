@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">REGISTRAR NUEVO CLIENTE</h1>
<style>
  span{
    text-transform: capitalize;
  }
  .menor{
              color:red;
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
  function validarNombre() {
 
 if($("#Nombre").val() == ""){
   $("#estadoNombre").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>");
  }else{
       if ($("#Nombre").val().length < 3) {
           $("#estadoNombre").html(
               "<span  class='menor'><h5 class='menor'>Ingrese de 5 a 50 caracteres</h5></span>");
       } else {
           if ($("#Nombre").val().length > 50) {
               $("#estadoNombre").html(
                   "<span  class='menor'><h5 class='menor'>Ingrese menos de 50 caracteres</h5></span>");
           } else {
               
                   $("#estadoNombre").html("<span  class='bien'><h5 class='bien'> Válido </h5></span>");
           }
       } 
 }



 }
 function validarVat(){
  if($("#vat").val() == ""){
    $("#estadoVat").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
            if ($("#vat").val().length > 9) {
                $("#estadoVat").html("<span  class='error'><h5 class='menor'>Ingrese menos de 10 numeros</h5></span>");
            }else {
                    $("#estadoVat").html("<span  class='bien'><h5 class='bien'> Numero de vat Válido </h5></span>");
            }
        } 
  }

function validarCalle(){
  if($("#street").val() == ""){
    $("#estadoCalle").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoCalle").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

function validarNumero(){
  if($("#Numero").val() == ""){
    $("#estadoNumero").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoNumero").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

function validarApt(){
  if($("#Apt").val() == ""){
    $("#estadoApt").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoApt").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

function validarCodigoPostal(){
  if($("#codigoP").val() == ""){
    $("#estadoCodigoP").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoCodigoP").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

function validarPak(){
  if($("#pak").val() == ""){
    $("#estadoPak").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoPak").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

function validarCiudad(){
  if($("#ciudad").val() == ""){
    $("#estadoCiudad").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoCiudad").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

function validarPais(){
  if($("#pais").val() == ""){
    $("#estadoPais").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoPais").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

function validarValor(){
  if($("#valor").val() == ""){
    $("#estadoValor").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoValor").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

 </script>
 

<body>
 <div class="card">
     <div class="card-header">

     </div>
     <div class="card-body">
  
        <div class="container-fluid">
            <form action="{{url('/cliente/nuevo')}}" method="POST">
              @csrf
              <div class="card">
                  <div class="card-body">
                <div class="row">
                  <div class="col-xs-10 col-sm-10 col-md-10">
                      <div class="form-group">
                          <label for="nombre" style="justify-content-center;">Nombre del cliente</label>
                      <input type="text" name="Nombre" id="Nombre" value="{{ old('Nombre') }}" class="form-control" onkeyup="validarNombre()" placeholder="Nombre" tabindex="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32)) ">
                      <span id="estadoNombre"></span>
                      @error('Nombre')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                      </div>
                  </div>
              
                  <div class="col-xs-2 col-sm-2 col-md-2">
                      <div class="form-group">
                          <label for="apellido">VAT ID</label>
                          <input type="number" id="vat" name="vat" value="{{ old('vat') }}" class="form-control" onkeyup="validarVat()" tabindex="2" required>
                          <span id="estadoVat"></span>
                          @error('vat')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                      </div>
                  </div>
                  </div>
                </div>
                </div> 
                <div class="card">
                    <div class="card-body">
                  <div class="row">
              
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <label for="calle">Direccion</label>
                            <input type="text" name="calle" id="street" autocomplete="off" value="{{ old('calle') }}"  class="form-control" onkeyup="validarCalle()" placeholder="Calle"tabindex="1" required>
                            <span id="estadoCalle"></span>
                            @error('calle')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                        </div>
                    </div>
              
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="num">Numero</label>
                            <input type="number" name="Numero" id="Numero" value="{{ old('Numero') }}" class="form-control" tabindex="2" required onkeyup="validarNumero()">
                            <span id="estadoNumero"></span>
                            @error('Numero')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                        </div>
                    </div>
              
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="apt">Apt</label>
                            <input type="number" name="apt" id="Apt" value="{{ old('apt') }}" class="form-control"tabindex="3" required onkeyup="validarApt()">
                            <span id="estadoApt"></span>
                            @error('apt')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                        </div>
                    </div>
                  </div>
                </div>
                 </div>
              <div class="card">
                  <div class="card-body">
                  <div class="row">
              
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="CodigoP">Codigo Postal</label>
                            <input type="number" name="codigoPostal" id="codigoP" value="{{ old('codigoPostal') }}" class="form-control" tabindex="1" required onkeyup="validarCodigoPostal()">
                            <span id="estadoCodigoP"></span>
                            @error('codP')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                        </div>
                    </div>
              
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="PAK">PAK</label>
                            <input type="number" name="pak" id="pak" value="{{ old('pak') }}" class="form-control" tabindex="2" required onkeyup="validarPak()">
                            <span id="estadoPak"></span>
                            @error('pak')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                        </div>
                    </div>
              
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="apt">Nombre de la ciudad</label>
                            <input type="text" name="nombreCiudad" id="ciudad" value="{{ old('nombreCiudad') }}" class="form-control"tabindex="3" required onkeyup="validarCiudad()">
                            <span id="estadoCiudad"></span>
                            @error('city')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card">
                  <div class="card-body">
                  <div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group" style="display: flex;">
                          <label for="UI" style="width: 4em">Idioma </label>
                          <select name="language" class="form-control" style="width: 13em;" required>
                              <option value="0">Seleccione el idioma</option>
                              <option value="Español">Español</option>
                              <option value="Ingles">Ingles</option>
                              <option value="Frances">Frances</option>
                              <option value="Chino">Chino</option>
                          </select>
                          @error('language')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                      </div>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group" style="display: flex;" >
                            <label for="pais" style="width: 3em" align="center">Pais</label>
                            <input type="text" name="pais" id="pais" value="{{ old('pais') }}" class="form-control"tabindex="3" required onkeyup="validarPais()">
                            <span id="estadoPais"></span>
                            @error('pais')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                        </div>
                      </div>     
                  </div>
                </div>
              </div>
              <div class="container">
                  <h4><strong>Detalles</strong></h4>
                        <td><button type="button" name="remove" id="delete" class="btn btn-danger btn_remove" style="border-radius: 50%;">X</button></td>
                        <td class="btn-block"><button type="button" name="add" id="agregar" class="btn add-btn btn-info" style="border-radius: 50%;"><i class="fa fa-plus"></i> </button></td>
              
              <div class="card">
                  <div class="card-body">
              <div class="row" id="dynamic_field">
                  <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group" id="inputDinamic">
                      <label for="Type">Tipo </label>
                      <select name="tipo" class="form-control" required>
                          <option value="">Seleccione el tipo</option>
                          <option value="Email">Email</option>
                          <option value="Telefono">Telefono</option>
                          <option value="Celular">Celular</option>
                          <option value="Skype">Skype</option>
                          <option value="Fax">Fax</option>
                        </select>
                        @error('tipo')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                      </div>
                    </div>
              
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group" >
                            <label for="valor">Valor</label>
                            <input type="text" name="value" id="valor" value="{{ old('value') }}" class="form-control"tabindex="3" required onkeyup="validarValor()">
                            <span id="estadoValor"></span>
                            @error('value')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                        </div>
                    </div>
              
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="name">Nombre*</label>
                            <input type="text" name="na" id="nameN" value="{{ old('na') }}" class="form-control"tabindex="3">
                            @error('na')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                        </div>
                    </div>
                    </div>
                </div>
               </div>
              </div>
                  <div class="card">
                      <div class="card-body">
                        <div class="form-group">
                        <label style="font-size: 16px;">Nota*</label>
                          <input type="text" style="height: 5em"name="info" value="{{ old('info') }}" class="btn-block">
                          @error('info')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                         </div>
                        </div>
                   </div>
                   <h3>Campos opcionales *</h3>
                    <br> <br>
                   <div class="form-group">
                <a href="" class="btn btn-warning my-2 my-sm-0">Resetear</a>
                <button class="btn btn-success" type="submit">Guardar y Crear el trabajo</button>
                <button class="btn btn-success my-2 my-sm-0" type="submit" value="Guardar Datos">Guardar</button>
                </div> 
                   
              </form>
                
                </div>
            
      
                 
      
     </div>

 </div>  
</body>

  {{-- <script>
    var cont = document.getElementById('inputDinamic'); 
    var botonAgregar = document.getElementById('agregar');
    var botonEliminar = document.getElementById('delete');

    agregar.onclick = function(){
      var newField = document.createElement('select');
      //var newField = document.createElement('input');
      newField.setAttribute('name','tipo[]');
      newField.setAttribute('class','form-control');
      newField.setAttribute('value','0');
      inputDinamic.appendChild(newField);
      
        

    
    }
  </script> --}}

@endsection