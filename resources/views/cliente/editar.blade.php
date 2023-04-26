@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700"> EDITAR CLIENTE</h1>



<body>
 <div class="card">
   
     <div class="card-body">
  
            <form action="{{url('/cliente/editar/'.$cliente->id)}}" method="POST">
              @csrf
              <div class="card">
                  <div class="card-body">
                    <h5><strong>DATOS DEL CLIENTE</strong></h5>
                    <br>
                    <div class="row">
                      <div class="col-7">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Nombre y Apellidos</span>
                        <input type="text" name="nombreCliente" id="nombreCliente" required value="{{$cliente->nombreCliente}}" class="form-control" onkeyup="validarNombre()" placeholder="Nombre" tabindex="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209)) ">
                      </div>
                        <span id="estadoNombre"></span>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">CIF</span>
                        <input type="text" id="cif" name="cif" class="form-control" onkeyup="mayus(this);"
                          required value="{{$cliente->cif}}" onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-7">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Dirección</span>
                        <input type="text" id="direccion" name="direccion" class="form-control" 
                          required  value="{{$cliente->calle}}" onkeyup="validarDireccion()" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) ||  (event.charCode == 35) || (event.charCode == 46) || (event.charCode == 44) || (event.charCode == 45) || (event.charCode == 58) || (event.charCode == 46) || (event.charCode == 241) || (event.charCode == 209))">
                        </div>
                        <span id="estadoDireccion"></span>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Número</span>
                        <input type="text" id="numero" name="numero" class="form-control" 
                           value="{{$cliente->numero}}" onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-7">
                          <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Correo Electrónico</span>
                               <input type="text" id="valor" name="valor" class="form-control" 
                                 required value="{{$cliente->correo}}" onkeyup="validarCorreo()"autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241) || (event.charCode == 209) || (event.charCode == 64))">
                          </div>
                        <span id="estado"></span>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Telefono</span>
                             <input type="text" id="telefono" name="telefono" class="form-control" 
                                  value="{{$cliente->telefono}}"  autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                         <span id="estadoTelefono"></span>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Codigo Postal</span>
                        <input type="text" id="postal" name="postal" class="form-control" 
                          required value="{{$cliente->codigoPostal}}" onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 44) || (event.charCode == 46) || (event.charCode == 35) || (event.charCode == 47) || (event.charCode == 45) || (event.charCode == 124) || (event.charCode == 42))">
                        </div>
                      </div>
                      <div class="col-5">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Poblacion</span>
                        <input type="text" id="poblacion" name="poblacion" class="form-control" 
                          required value="{{$cliente->poblacion}}" onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241) || (event.charCode == 209))">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Provincia</span>
                        <input type="text" id="provincia" name="provincia" class="form-control" 
                          required value="{{$cliente->provincia}}" onkeyup="validarDireccion()" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                         </div>
                         <span id="estadoCiudad"></span>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-4">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Pais</span>
                        <input type="text" id="pais" name="pais" class="form-control" 
                          required value="{{$cliente->pais}}" onkeyup="validarPais()" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                        </div>
                        <span id="estadoPais"></span>
                      </div>
                      <div class="col-4">
                        <div class="input-group">
                          <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Idioma</span>
                          <select name="idioma" id="idioma"class="form-control" value="{{$cliente->idioma}}">
                            @if ($cliente->idioma == $cliente->idioma)
                            <option value="{{$cliente->idioma}}" selected>{{$cliente->idioma}}</option>                      
                          @else
                            <option value="{{$cliente->idioma}}">{{$cliente->idioma}}</option>      
                          @endif
                            <option value="español">Español</option>
                            <option value="ingles">Ingles</option>
                            <option value="frances">Frances</option>
                            <option value="chino">Chino</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div> 
                </div>


                <label style="font-size: 16px;">Nota</label>
                <br>
                <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" name="nota" id="nota"  cols="140" rows="4">{{$cliente->nota}}</textarea>


 
              </div>

              <div class="form-group">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                <a href="/clientes" class="btn btn-danger my-2 my-sm-0">Cancelar</a>

                <button class="btn btn-success my-2 my-sm-0" type="submit" >Actualizar</button>
              </div> 
      </div>
      </form>
                

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

<script src="{{ asset('js/cliente/create.js')}}"></script>
<link rel="stylesheet" href="{{ URL::asset('estilos/style.css') }} ">

@endsection