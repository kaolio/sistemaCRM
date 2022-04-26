@extends('adminlte::page')
@section('content')
<style>
  span{
    text-transform: capitalize;
  }
  .menor{
              color:red;
              font-size: medium;
          }
</style>
<script>
  function validarNombre() {
 
 if($("#Nombre").val() == ""){
   $("#estadoNombre").html("<span  class='menor'><h5 class='menor'> </h5></span>");
  }else{
       if ($("#Nombre").val().length < 3) {
           $("#estadoNombre").html(
               "<span  class='menor'><h5 class='menor'>Ingrese de 5 a 50 caracteres</h5></span>");
       } else {
           if ($("#Nombre").val().length > 50) {
               $("#estadoNombre").html(
                   "<span  class='menor'><h5 class='menor'>Ingrese menos de 50 caracteres</h5></span>");
           } else {
               
                   $("#estadoNombre").html("<span  class='menor'><h5 class='menor'> </h5></span>");
           }
       } 
 }
 }
 </script>
 

<body>
 <div class="card">
     <div class="card-header">

     </div>
     <div class="card-body">
        <h2><strong>Añadir nuevo cliente</strong></h2>
        <div class="container-fluid">
            <form action="{{url('/cliente/nuevo')}}" method="POST">
              @csrf
               
              <div class="card">
                  <div class="card-body">
                <div class="row">
                  <div class="col-xs-10 col-sm-10 col-md-10">
                      <div class="form-group">
                          <label for="nombre" style="justify-content-center;">Nombre del cliente</label>
                      <input type="text" name="Nombre" id="Nombre" class="form-control" onkeyup="validarNombre()" placeholder="Nombre" tabindex="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32)) ">
                      <span id="estadoNombre"></span>
                      @error('Nombre')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                      </div>
                  </div>
              
                  <div class="col-xs-2 col-sm-2 col-md-2">
                      <div class="form-group">
                          <label for="apellido">VAT ID</label>
                          <input type="text" id="vat" name="vat"  class="form-control" tabindex="2">
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
                            <input type="text" name="calle" id="street"  class="form-control" placeholder="Calle"tabindex="1">
                            @error('calle')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                        </div>
                    </div>
              
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="num">Numero</label>
                            <input type="text" name="Numero" id="numero"  class="form-control" tabindex="2">
                            @error('Numero')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                        </div>
                    </div>
              
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="apt">Apt</label>
                            <input type="text" name="apt" id="Ap"  class="form-control"tabindex="3">
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
                            <input type="number" name="codigoPostal" id="Postal"  class="form-control" tabindex="1">
                            @error('codP')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                        </div>
                    </div>
              
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="PAK">PAK</label>
                            <input type="text" name="pak" id="pak"  class="form-control" tabindex="2">
                            @error('pak')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                        </div>
                    </div>
              
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="apt">Nombre de la ciudad</label>
                            <input type="text" name="nombreCiudad" id="nameCity"  class="form-control"tabindex="3">
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
                          <select name="language" class="form-control" style="width: 13em;">
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
                            <input type="text" name="pais" id="pais"  class="form-control"tabindex="3">
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
                      <select name="tipo" class="form-control">
                          <option value="0">Seleccione el tipo</option>
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
                            <input type="text" name="value" id="value"  class="form-control"tabindex="3">
                            @error('value')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                        </div>
                    </div>
              
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="na" id="nameN"  class="form-control"tabindex="3">
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
                        <label style="font-size: 16px;">Nota</label>
                          <input type="text" style="height: 5em"name="info"  class="btn-block">
                          @error('info')
                      <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                         </div>
                        </div>
                   </div>
              
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