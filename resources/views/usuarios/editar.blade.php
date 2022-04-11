@extends('adminlte::page')
@section('content')
    <BR>
    <div class="card">
        <div class="card-header">
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
            
        
                                                <label for="roles">Selecciona un Rol</label>
                                                <select name="roles" id="roles" onblur="validarSucursal()" onchange="validarSucursal()"
                                                    class="form-control">
                                                    <option selected disabled>Elige un Rol</option>
                                                    @foreach ($roles as $rol)
                                                    @if ($rol == $userRole)
                                                    <option value="{{$rol}}" selected>{{$rol}}</option>
                                                    @else
                                                    <option value="{{$rol}}">{{$rol}}</option>
                                                    @endif
                                                    @endforeach
                                                </select><span id="estadoRol"></span>
                        
                                    
                                     </br>
                                     </br>
                                     <a href="{{url('/usuarios')}}"class="btn btn-primary">Regresar</a>
                                    <input type="submit" class="btn btn-success my-2 my-sm-0" value="Guardar">
                                    
                                    
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