@extends('adminlte::page')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
        
    .menor{
            color:#ff3333;
            font-size: medium;
        }
    .mayor{
            color:#29a01e;
            font-size: medium;
        }
</style>
<link rel="stylesheet" href="{{ URL::asset('estilos/style.css') }} ">
<script>

            function validarTelefono() {
                $("#estadoTabla").html("<span  class='mayor'><h5 class='menor'></h5></span>");
                        if($("#telefono").val() == ""){
                            $("#estadoTelefono").html("<span  class='menor'><h5 class='menor'> </h5></span>");
                        }else{
                            var regex = /^[8-9]{1}[0-9]{8}$/;
                            if (!regex.test($("#telefono").val())) {
                                $("#estadoTelefono").html("<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Telefono incorrecto</h5></span>");
                            } else {
                                $("#estadoTelefono").html("<span  class='mayor'><h5 class='bien'>&nbsp;&nbsp;Telefono valido</h5></span>");
                            }      
                    }
                    }

          function validarContraseña(){
                    validarConfirmarContraseña();
                    if($("#password").val() == ""){
                        $("#estadoPassword").html("<span  class='menor'><h5 class='menor'> </h5></span>");
                    }else{
                            if ($("#password").val().length < 6) {
                                $("#estadoPassword").html(
                                    "<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Su contraseña debe tener al menos 6 caracteres</h5></span>");
                            } else {
                                if ($("#password").val().length > 15) {
                                    $("#estadoPassword").html(
                                        "<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Su contraseña debe tener como maximo 15 caracteres</h5></span>");
                                } else {
                                        $("#estadoPassword").html("<span  class='menor'><h5 class='menor'> </h5></span>");
                                }
                            } 
                }
            }


            function validarConfirmarContraseña(){
            if($("#confirm-password").val() == ""){
                $("#estadoConfirmarContraseña").html("<span  class='menor'><h5 class='menor'> </h5></span>");
               }else{
                    if ($("#confirm-password").val().length < 6) {
                        $("#estadoConfirmarContraseña").html("<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Su contraseña debe tener al menos 6 caracteres</h5></span>");
                    } else {
                        if ($("#confirm-password").val().length > 15) {
                            $("#estadoConfirmarContraseña").html( "<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Su contraseña debe tener como maximo 15 caracteres</h5></span>");
                        } else {
                            if ($("#confirm-password").val() == $("#password").val()) {
                                $("#estadoConfirmarContraseña").html("<span  class='menor'><h5 class='menor'> </h5></span>");
                            } else {
                                $("#estadoConfirmarContraseña").html("<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Verifique la contraseña nuevamente</h5></span>");
                            }
                            
                        }
                    } 
           }
        }

</script>

<BR>

<div class="card">
    <div class="card-header">
        <h4 class="text-center  "style ="font-family:serif,new time roman;" > <b> EDITAR USUARIO </b> </h4>
    </div>
    <div class="card-body">

        <form action="{{ url('usuario/editar/'.$user->id)}}" method="post">
            {{csrf_field()}}

            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="input-group">
                        <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Nombre</span>
                        <input class="form-control" type="text" name="name" id="name" 
                        placeholder="Nombre Completo" value="{{ $user->name }}" onblur="comprobarName()"
                        onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209)) ">
                    </div>
                    <span id="estadoName"></span>
                </div>
                <div class="col-5">
                    <div class="input-group">
                        <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Correo Electronico</span>
                        <input class="form-control" type="text" name="email" id="email"  
                        Placeholder="example@gmail.com" value="{{ $user->email }}" onkeyup="comprobarEmail()">
                    </div>
                    <span id="estadoEmail"></span>
                </div>
            </div>
            
             <br>
            <div class="row justify-content-center">
                    <div class="col-5">
                        <div class="input-group">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Ciudad</span>
                            <input type="text" id="ciudad" name="ciudad" class="form-control" 
                            required onblur="comprobarName()" value="{{ $user->ciudad }}" Placeholder="Ciudad / Provincia" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241)|| (event.charCode == 209))">
                        </div>
                    <span></span>
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                        <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Telefono</span>
                        <input type="text" id="telefono" name="telefono" class="form-control" 
                        required onkeyup="validarTelefono()" value="{{ $user->telefono }}" Placeholder="Telefono" autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) )">
                        </div>
                        <span id="estadoTelefono"></span>
                    </div>
            </div>
             <br>
             <div class="row justify-content-center">
                <div class="col-5">
                    <div class="input-group">
                        <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue"> Provincia</span>
                        <input type="text" id="provincia" name="provincia" class="form-control" 
                        required onkeyup="validarDireccion()" value="{{ $user->provincia }}" Placeholder=" Provincia" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241)|| (event.charCode == 209))">
                    </div>
                <span></span>
                </div>
                <div class="col-3">
                    <div class="input-group">
                    <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Codigo Postal</span>
                    <input type="text" id="codigoPostal" name="codigoPostal" class="form-control" 
                    required onkeyup="validarDireccion()" value="{{ $user->codigoPostal }}" Placeholder="Codigo Postal" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 44) || (event.charCode == 46) || (event.charCode == 35) || (event.charCode == 47) || (event.charCode == 45) || (event.charCode == 124) || (event.charCode == 42))">
                    </div>
                    <span></span>
                </div>
                <div class="col-2">
                    <div class="input-group">
                         <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">CIF</span>
                          <input type="text" id="cif" name="cif" class="form-control" Placeholder="CIF"  value="{{ $user->cif }}" onkeyup="mayus(this);"
                              required onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57))">
                    </div>
                </div>
        </div>
             <br>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="input-group">
                        <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Razon Social</span>
                        <input type="text" id="razonSocial" name="razonSocial" class="form-control" 
                        required onkeyup="validarDireccion()" value="{{ $user->razonSocial }}" Placeholder="Razon Social" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241)|| (event.charCode == 209))">
                    </div>
                <span></span>
                </div>
                <div class="col-5">
                    <div class="input-group">
                    <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Direccion Social</span>
                    <input type="text" id="direccionSocial" name="direccionSocial" class="form-control" 
                    required onkeyup="validarDireccion()" value="{{ $user->direccionSocial }}" Placeholder="Direccion Social" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46)|| (event.charCode == 241)|| (event.charCode == 209))">
                    </div>
                    <span></span>
                </div>
            </div>
             <br>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="input-group">
                        <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Nombre Comercial</span>
                        <input type="text" id="nombreComercial" name="nombreComercial" class="form-control" 
                        required onkeyup="validarDireccion()" value="{{ $user->nombreComercial }}" Placeholder="Nombre Comercial" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241)|| (event.charCode == 209))">
                    </div>
                <span></span>
                </div>
                <div class="col-5">
                    <div class="input-group">
                    <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Direccion Comercial</span>
                    <input type="text" id="direccionComercial" name="direccionComercial" class="form-control" 
                    required onkeyup="validarDireccion()" value="{{ $user->direccionComercial }}" Placeholder="Direccion Comercial" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241)|| (event.charCode == 209))">
                    </div>
                    <span></span>
                </div>
            </div>
             <br>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="input-group">
                        <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Contraseña</span>
                            <input class="form-control " type="text" name="password" id="password"  
                            Placeholder="Ingrese el nombre del password"  onkeyup="validarContraseña()">
                    </div>
                    <span id="estadoPassword"></span>
                </div>
                <div class="col-5">
                    <div class="input-group">
                    <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Horario Comercial</span>
                    <input type="text" id="horarioComercial" name="horarioComercial" class="form-control" 
                    required onkeyup="" value="{{ $user->horarioComercial }}" Placeholder="Horario " autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241)|| (event.charCode == 209)|| (event.charCode == 58) || (event.charCode == 45))">
                    </div>
                    <span></span>
                </div>
            </div>
             <br>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="input-group">
                        <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Confirmar Contraseña</span>
                        <input class="form-control" type="text" name="confirm-password" id="confirm-password" onkeyup="validarConfirmarContraseña()"
                        Placeholder="vuelva a ingresar la contraseña">
                    </div>
                    <span id="estadoConfirmarContraseña"></span>
                </div>
                <div class="col-5">
                    <div class="input-group">
                    <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Persona de Contacto</span>
                    <input type="text" id="personaContacto" name="personaContacto" class="form-control" 
                    required onkeyup="validarDireccion()" value="{{ $user->personaContacto }}" Placeholder="Persona Contacto" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241)|| (event.charCode == 209))">
                    </div>
                </div>
           </div>
          <br>
          @if (Auth::user()->id == 1)
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="input-group">
                        <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Seleccione un Rol</span>
                        <select name="roles" id="roles" onblur="validarRoles()" onchange="validarRoles()"
                        class="form-control" >
                        <option selected value="Elige un Rol" disabled>Elige un Rol</option>
                            @foreach ($roles as $rol)
                            @if ($userRole == $rol)
                            <option value="{{$rol}}" selected>{{$rol}}</option>
                            @else
                            <option value="{{$rol}}">{{$rol}}</option>
                            @endif
                            @endforeach
                        </select>               
                    </div>
                    <span id="estadoRol"></span>
                </div>
            </div>
            @endif
                </br>
                 </br>
                <div class="text-center">
                    <a href="{{url('/usuarios')}}"class="btn btn-danger">Cancelar</a>
                    <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Actualizar">
                </div>

        </form>
    </div> 
  </div>


{{--
    <BR> 

        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card">
        <div class="card-header text-center" style ="font-family:serif,new time roman;">
            EDITAR USUARIO
        </div>
        <div class="card-body">
            <form action="{{ url('usuario/editar/'.$user->id)}}" method="post">
                {{csrf_field()}}
                                   <label form="name">Nombre</label>
                                   <input class="form-control" type="text" name="name" id="name" 
                                          placeholder="Nombre Completo" value="{{ $user->name }}" onblur="comprobarName()">
                                          <span id="estadoName"></span>
                                
            
                                    <label form="email" class="control-label">Correo Electronico</label>
                                    <input class="form-control" type="text" name="email" id="email"  
                                            Placeholder="example@gmail.com" value="{{ $user->email }}" onkeyup="comprobarEmail()">
                                            <span id="estadoEmail"></span>


                                     <label form="password">Contraseña</label>
                                     <input class="form-control " type="text" name="password" id="password"  
                                           Placeholder="Ingrese el nombre del password"  onkeyup="comprobarPassword()">
                                           <span id="estadoNombrepassword"></span>
            
                               
                                     <label form="confirm-password">Confirmar Contraseña</label>
                                     <input class="form-control" type="text" name="confirm-password" id="confirm-password" 
                                             Placeholder="vuelva a ingresar la contraseña" >
            
                                    @if (Auth::user()->id != 1)
                                        <label for="roles">Selecciona un Rol</label>
                                                <select name="roles" id="roles" onblur="validarSucursal()" onchange="validarSucursal()"
                                                    class="form-control">
                                                    <option selected disabled>Elige un Rol</option>
                                                    @foreach ($roles as $rol)
                                                    @if ($userRole == $rol)
                                                    <option value="{{$rol}}" selected>{{$rol}}</option>
                                                    @else
                                                    <option value="{{$rol}}">{{$rol}}</option>
                                                    @endif
                                                    @endforeach
                                                </select><span id="estadoRol"></span>
                                    @endif
                                                
                        
                                    
                                     </br>
                                     </br>
                                     <div class="text-center">
                                        <a href="{{url('/usuarios')}}"class="btn btn-primary">Regresar</a>
                                        <input type="submit" class="btn btn-success my-2 my-sm-0" value="Guardar">
                                     </div>
                                     
                                    
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
            </div>
        </div>--}}
    
        </html>
@endsection