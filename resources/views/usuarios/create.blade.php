@extends('adminlte::page')
@section('content')
    <BR>
    <div class="card">
        <div class="card-header">
            NUEVO USUARIO
        </div>
        <div class="card-body">
            <form action="{{ url('usuario/nuevo')}}" method="post">
                {{csrf_field()}}
                                   <label form="name">Nombre</label>
                                   <input class="form-control" type="text" name="name" id="name" 
                                          placeholder="Nombre Completo" value="{{ old('name') }}" onblur="comprobarName()">
                                          <span id="estadoName"></span>
                                
            
                                    <label form="email" class="control-label">Correo Electronico</label>
                                    <input class="form-control" type="text" name="email" id="email"  
                                            Placeholder="example@gmail.com" value="{{ old('email') }}" onkeyup="comprobarEmail()">
                                            <span id="estadoEmail"></span>


                                     <label form="password">Contraseña</label>
                                     <input class="form-control " type="text" name="password" id="password"  
                                           Placeholder="Ingrese el nombre del password" value="{{ old('password') }}" onkeyup="comprobarPassword()">
                                           <span id="estadoNombrepassword"></span>
            
                                       {!!  $errors->first('nombre_password','<div class="invalid-feedback">:message</div>') !!}
                               
                                     <label form="confirm-password">Confirmar Contraseña</label>
                                     <input class="form-control" type="text" name="confirm-password" id="confirm-password" 
                                             Placeholder="vuelva a ingresar la contraseña" value="{{ old('confirm-password') }}">
            
                                             <label for="roles">Selecciona un Rol</label>
                                             <select name="roles" id="roles" onblur="validarSucursal()" onchange="validarSucursal()"
                                                 class="form-control">
                                                 <option selected disabled>Elige un Rol</option>
                                                 @foreach ($roles as $rol)
                                                 <option  value="{{$rol}}">
                                                     {{$rol}}</option>
                                                 @endforeach
                                             </select><span id="estadoRol"></span>
                              
                                     </br>
                                     </br>
                                    <input type="submit" class="btn btn-success my-2 my-sm-0" value="Agregar">
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            Footer
        </div>
    </div>

@endsection