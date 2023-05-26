@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">REGISTRAR NUEVO CLIENTE</h1>


<body>
 <div class="card">
   
     <div class="card-body">
  
            <form action="{{url('/cliente/nuevo')}}" id="formulario" method="POST">
              @csrf
              <div class="card">
                  <div class="card-body">
                    <h5><strong>DATOS DEL CLIENTE</strong></h5>
                    <br>
                    <div class="row">
                        <div class="col-7">
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Nombre y Apellidos&nbsp;<strong style="color: red">*</strong></span>
                              <input type="text" name="nombreCliente" id="nombreCliente" required value="{{ old('Nombre') }}" class="form-control" onkeyup="validarNombre()" placeholder="Nombre y Apellidos" tabindex="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209)) ">
                            </div>
                          <span id="estadoNombre"></span>
                        </div>
                      <div class="col-3">
                          <div class="input-group">
                               <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">CIF</span>
                                <input type="text" id="cif" name="cif" class="form-control" onkeyup="mayus(this);"
                                     onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57))">
                          </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-7">
                          <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Dirección&nbsp;<strong style="color: red">*</strong></span>
                               <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Direccion"
                                 required onkeyup="validarDireccion()" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 35) || (event.charCode == 46) || (event.charCode == 44) || (event.charCode == 45) || (event.charCode == 58) || (event.charCode == 241) || (event.charCode == 209))">
                          </div>
                        <span id="estadoDireccion"></span>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Tel. Movil</span>
                        <input type="text" id="numero" name="numero" class="form-control" 
                           onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 43 ))">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-7">
                          <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Correo Electrónico&nbsp;<strong style="color: red">*</strong></span>
                               <input type="text" id="valor" name="valor" class="form-control" 
                                 required onkeyup="validarCorreo()"autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241) || (event.charCode == 209) || (event.charCode == 64))">
                          </div>
                        <span id="estado"></span>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Telefono</span>
                             <input type="text" id="telefono" name="telefono" class="form-control" 
                                  autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 43 ))">
                        </div>
                         <span id="estadoTelefono"></span>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Codigo Postal&nbsp;<strong style="color: red">*</strong></span>
                        <input type="text" id="postal" name="postal" class="form-control" placeholder="#"
                          required onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 44) || (event.charCode == 46) || (event.charCode == 35) || (event.charCode == 47) || (event.charCode == 45) || (event.charCode == 124) || (event.charCode == 42))">
                        </div>
                      </div>
                      <div class="col-5">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Poblacion</span>
                        <input type="text" id="poblacion" name="poblacion" class="form-control" 
                           onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32) || (event.charCode == 35) || (event.charCode == 46) || (event.charCode == 44) || (event.charCode == 45) || (event.charCode == 58) || (event.charCode == 46) || (event.charCode == 241) || (event.charCode == 209))">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Provincia</span>
                        <input type="text" id="provincia" name="provincia" class="form-control" 
                            autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209)||(event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 44) || (event.charCode == 46) || (event.charCode == 35) || (event.charCode == 47) || (event.charCode == 45) || (event.charCode == 58) || (event.charCode == 124) || (event.charCode == 42))">
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
                           onkeyup="validarPais()" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                        </div>
                        <span id="estadoPais"></span>
                        <br>
                        <span class="mb-4"><strong style="color: red">*</strong> Campos Obligatorios</span>
                      </div>
                      <div class="col-4">
                        <div class="input-group">
                          <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Idioma</span>
                          <select name="idioma" id="idioma"class="form-control" >
                            <option value="español">Español</option>
                            <option value="ingles">Ingles</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div> 
                </div> 

                


                <label style="font-size: 16px;">Nota</label>
                <br>
                <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" name="nota" id="nota" cols="140" rows="4"></textarea>



              </div>

              <div class="form-group">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="/clientes" class="btn btn-danger my-2 my-sm-0">Cancelar</a>
              
                <button class="btn btn-success" type="submit" onclick="enviarOrden()" >Guardar y Crear Orden</button>

                <button class="btn btn-success my-2 my-sm-0" type="submit" onclick="enviarCliente()" >Guardar</button>
              </div> 
      </div>
                

      </form>
                

</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="{{ asset('js/cliente/create.js')}}"></script>
<link rel="stylesheet" href="{{ URL::asset('estilos/style.css') }} ">
<script>
   function enviarCliente(){
            $("#formulario").attr("action","{{url('/cliente/nuevo/1')}}");
          }
          function enviarOrden(){
            $("#formulario").attr("action","{{url('/cliente/nuevo/2')}}");
          }
 
</script>
  

@endsection