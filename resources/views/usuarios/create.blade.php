@extends('adminlte::page')
@section('content')

    <style>
        body{
                    font-family:serif,new time roman;
            }
        .menor{
                color:#ff3333;
                font-size: medium;
            }
        .mayor{
                color:#29a01e;
                font-size: medium;
            }
    </style>
    <script>

        function validarCorreo() {
            $("#loaderIcon").show();
    
            jQuery.ajax({
                url: "/usuario/nuevo/validarCorreo",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "correo": $("#email").val(),
                },
                asycn: false,
                type: "POST",
                success: function(data) {
                    console.log(data);
                    if(data != 1){
                        $("#estadoEmail").html(data);
                    }else{
                        validarCorreos();
                    }
                   
                },
                error: function() {
                    console.log('no da');
                }
            });
        }

        function validarNombre() {
            validarConfirmarContraseña();
            if($("#name").val() == ""){
                $("#estadoName").html("<span  class='menor'><h5 class='menor'> </h5></span>");
               }else{
                    if ($("#name").val().length < 3) {
                        $("#estadoName").html(
                            "<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Ingrese de 3 a 50 caracteres</h5></span>");
                    } else {
                        if ($("#name").val().length > 50) {
                            $("#estadoName").html(
                                "<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Ingrese de 3 a 50 caracteres</h5></span>");
                        } else {
                            
                                $("#estadoName").html("<span  class='menor'><h5 class='menor'> </h5></span>");
                        }
                    } 
           }
        }

        function validarCorreos() {
            validarConfirmarContraseña();
            if($("#email").val() == ""){
                $("#estadoEmail").html("<span  class='menor'><h5 class='menor'> </h5></span>");
               }else{
                var regex = /^[a-zA-Z0-9]{2}[a-zA-Z0-9.-]+@[a-zA-Z0-9]+[.]+[a-zA-Z]{2,3}$/;
                if (!regex.test($("#email").val())) {
                    $("#estadoEmail").html("<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Correo electronico incorrecto</h5></span>");
                } else {
                    $("#estadoEmail").html("<span  class='mayor'><h5 class='mayor'>&nbsp;&nbsp;Correo electronico valido</h5></span>");
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

        function validarRoles() {
            
            var cod = document.getElementById("roles").value;
            console.log(cod);
            if(cod != "Elige un Rol"){
                $("#estadoRol").html("<span  class='menor'><h5 class='menor'> </h5></span>");
            }else{
                $("#estadoRol").html("<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Seleccione un rol</h5></span>");
            }
        }

        function saludos(){
            console.log("Hola Mundo");
        }

        setInterval(saludos, 1000);

    </script>
    
    <BR>
        <div class="row justify-content-center">
                <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center  "> <b> NUEVO USUARIO </b> </h4>
                    </div>
                    
                        <div class="card-body">

                           
                            <form action="{{ url('usuario/nuevo')}}" method="post">
                                {{csrf_field()}}
                                
                                    <label form="name">Nombre</label>
                                    <input class="form-control " type="text" name="name" id="name" 
                                            placeholder="Nombre Completo" value="{{ old('name') }}" onkeyup="validarNombre()"
                                            autocomplete="off" 
                                            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32)) ">
                                            <span id="estadoName"></span>
                
                                        <label form="email" class="control-label">Correo Electronico</label>
                                        <input class="form-control " type="text" name="email" id="email"  autocomplete="off" 
                                                Placeholder="example@gmail.com" value="{{ old('email') }}" onblur="validarCorreo()">
                                                <span id="estadoEmail"></span>

                                        <label form="password">Contraseña</label>
                                        <input class="form-control " type="password" name="password" id="password"   
                                            Placeholder="Escriba una contraseña" value="{{ old('password') }}" 
                                            onkeyup="validarContraseña()"
                                            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)) ">
                                            <span id="estadoPassword"></span>
                
                                
                                        <label form="confirm-password">Confirmar Contraseña</label>
                                        <input class="form-control " type="password" name="confirm-password" id="confirm-password" 
                                                Placeholder="Vuelva a escribir la contraseña" value="{{ old('confirm-password') }}"
                                                onkeyup="validarConfirmarContraseña()"
                                                onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)) ">
                                                <span id="estadoConfirmarContraseña"></span>


                                        <label for="roles">Selecciona un Rol</label>
                                        <select name="roles" id="roles" onblur="validarRoles()" onchange="validarRoles()"
                                            class="form-control">
                                            <option selected value="Elige un Rol" disabled>Elige un Rol</option>
                                            @foreach ($roles as $rol)
                                            <option   value="{{$rol}}">
                                                {{$rol}}</option>
                                            @endforeach
                                        </select><span id="estadoRol"></span>
                                
                                        </br>
                                        </br>
                                        <div class="text-center">
                                            <button class="btn btn-success "  id="sig" name="sig" disabled>Agregar</button>
                                        </div>
                                        
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <div class="card-footer">
                        
                    </div>
                </div>
            </div>
        </div>
        
    


@endsection