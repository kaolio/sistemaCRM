@extends('adminlte::page')
@section('content')
<style>
    body{
                font-family:serif,new time roman;
            }

            .card1 {
                border: 1px solid #ddd;
                border-radius: 6px;
                max-width: 350px;
                text-align: center;
                margin-top: 60px;
            }
            .card_img {
                width: 120px;
                height: 120px;
                overflow: hidden;
                border-radius: 100%;
                margin: -60px auto 0;
            }
            .card_img img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .card_info {
                padding-bottom: 20px;
            }
            a {
            text-decoration: none;
            color: red;
            }
            a:hover{
            color: black;
            }

            .subir{
                padding: 10px 30px;
                background: #9ca4a9;
                color:#fff;
                border:0px solid #fff;
            }
            
            .subir:hover{
                color:#fff;
                background: #419EF9;
            }
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
     $(function() {
                        var $imagenPerfil, $photoPerfil, $photoForm;

                        $imagenPerfil = $('#imagenPerfil');
                        $photoPerfil = $('#file-upload');
                        $photoForm = $('#photoForm');

                        $imagenPerfil.on('click', function () {
                            $photoPerfil.click();
                        });

                        $photoPerfil.on('change', function () {
                            alert('onChange');
                     });
             });


             $imagenPerfil.on('change', function () {
                    var formData = new FormData();
                    formData.append('photo', $imagenPerfil[0].files[0]);

                    $.ajax({
                        url: $photoForm.attr('action') + '?' + $photoForm.serialize(),
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false

                    }).done(function (data) {
                        if (data.success)
                            $photoPerfil.attr('src', data.path);
                    }).fail(function () {
                        alert('La imagen subida no tiene un formato correcto');
                    });
                });


</script> 

    <script>
        
            
       

           
  
  </script>
    <BR>
        <!-- -->
        
        <div class="row justify-content-center">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-header text-center">
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
                        <input class="form-control" type="text" name="email" id="email" disabled  
                                Placeholder="example@gmail.com" value="{{ $user->email }}" onkeyup="comprobarEmail()">
                                <span id="estadoEmail"></span>
                       
                </form>
                </div>
              </div>
              <div class="card">
                  <div class="card-body">
                    <label form="password">Contraseña</label>
                    <input class="form-control " type="text" name="password" id="password"  
                        Placeholder="Ingrese nueva contraseña"  onkeyup="comprobarPassword()">
                        <span id="estadoNombrepassword"></span>

            
                    <label form="confirm-password">Confirmar Contraseña</label>
                    <input class="form-control" type="text" name="confirm-password" id="confirm-password" 
                            Placeholder="Confirme la contraseña" >

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

            <!--<div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card1"> 
                            <div class="card_img">
                                <img src="https://post.medicalnewstoday.com/wp-content/uploads/sites/3/2020/02/322868_1100-1100x628.jpg" alt="user-image">
                            </div>
                            <div class="card_info">
                                <h5 class="title">{{ auth()->user()->name }}</h5>

                                <h5 class="title">{{ Auth::user()->roles->pluck('name')  }}</h5>
                            </div>
                        </div>
                    </div>
            
                <div class="text-center">
                    <label for="file-upload" class="subir">
                      <i class="fas fa-cloud-upload-alt"></i> Subir Imagen</label>
                    <input id="file-upload" name="archivos[]" onchange='cambiar()' type="file" style='display: none;'/>
                   </div>

                    <div class="card-footer">
                       
                    </div>
                </div>
            </div>
         -->
         <!-- -->
         <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="card1"> 
                        <div class="card_img"> 
                            <form action=" {{ url('/perfil/foto') }}" method="post" style="display: none" id="photoForm">
                                {{ csrf_field() }}
                                <input type="file" id="photoPerfil" name="photo">
                            </form>
                            <img src="https://post.medicalnewstoday.com/wp-content/uploads/sites/3/2020/02/322868_1100-1100x628.jpg" id="imagenPerfil">
                        
                        </div>
                        <div class="card_info">
                            <h5 class="title">{{ auth()->user()->name }}</h5>

                            <h5 class="title">{{ Auth::user()->roles->pluck('name')  }}</h5>
                        </div>
                    </div>
                </div>


                <form action=" {{ url('/perfil/foto') }}" method="post"  id="photoForm">
                    {{ csrf_field() }}
                    
                    <div class="text-center">
                        <label for="file-upload" class="subir" >
                          <i class="fas fa-cloud-upload-alt" ></i> Subir Imagen</label>
                        <input id="file-upload" name="photo" onclick="cargarImagen()" type="file" style='display: none;'/>
                     </div>

                </form>

        
            

                <div class="card-footer">
                   
                </div>
            </div>
        </div>
        <!-- -->

@endsection