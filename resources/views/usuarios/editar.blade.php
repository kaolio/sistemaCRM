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
        </div>
    
        </html>
@endsection