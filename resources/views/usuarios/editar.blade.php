@extends('adminlte::page')
@section('content')
<style>
    body{
                font-family:serif,new time roman;
            }
</style>
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
                        <a href="{{url('/usuarios')}}"class="btn btn-primary">Regresar</a>
                        <input type="submit" class="btn btn-success my-2 my-sm-0" value="Guardar">
                       
                </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="card-body">
                        <p class="card-text">
                            <div class="author">
                                <div class="block block-one"></div>
                                <div class="block block-two"></div>
                                <div class="block block-three"></div>
                                <div class="block block-four"></div>
                                <a href="#">
                                    <img class="avatar" src="{{ asset('black') }}/img/emilyz.jpg" alt="">
                                    <img class="avatar" src="{{public_path('imagenes/usuariopng.png')}}"  alt="">
                                    <h5 class="title">{{ auth()->user()->name }}</h5>
                                </a>
                                <p class="description">
                                    {{ __('Ceo/Co-Founder') }}
                                </p>
                            </div>
                        </p>
                        <div class="card-description text-center">
                            {{ __('VTDFIX') }}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="button-container">
                            <button class="btn btn-icon btn-round btn-facebook">
                                <i class="fab fa-facebook"></i>
                            </button>
                            <button class="btn btn-icon btn-round btn-twitter">
                                <i class="fab fa-twitter"></i>
                            </button>
                            <button class="btn btn-icon btn-round btn-google">
                                <i class="fab fa-google-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        
         <!-- -->

@endsection