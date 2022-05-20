@extends('adminlte::page')
@section('content')

<style>
        span {
                text-transform: capitalize;
                }
         .card{
                background: linear-gradient(100deg, #96a0be, rgb(253, 253, 253));
                position: relative;
                width: 50%;
            }
        .card1  {
        background: linear-gradient(100deg, #C1C2C3, rgb(234, 234, 236));
        }
        
</style>
<BR>
    <div class="row justify-content-center">
        <div class="card">
        <div class="card-header">
            <h3 class="text-center" style ="font-family:serif,new time roman;"> <b> EDITAR ROL </b> </h3>
        </div>
        <div class="card-body">

            <form action="{{url('/roles/nuevo/'.$role->id)}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}
                {{method_field('PATCH')}}

                                   <label form="name">Nombre de Rol</label>
                                   <input class="form-control" type="text" name="name" id="name" 
                                          placeholder="Nombre Completo" value="{{ $role->name }}" onblur="comprobarName()">
                                          <span id="estadoName"></span>
                                
        
                               
                                     <label form="confirm-password">Permisos para este Rol</label>
                                     <br>
                                            <div class="row justify-content-center">
                                                <div class="col-5">
                                                    <div class="card1">
                                                        <div class="card-header">
                                                            @foreach ($permission as $value)
                                                            @foreach ($rolePermission as $item)
                                                            @if ($value->tipo == 'rol' )
                                                            @if ($item == $value->id)
                                                                <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}" checked> {{$value->name}}</span></label><br>
                                                            @endif
                                                            @endif
                                                            @endforeach
                                                            @if ($value->tipo == 'rol' )
                                                            @if (!in_array($value->id, $rolePermission))
                                                                <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
                                                            @endif
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="col-5">
                                                    <div class="card1">
                                                        <div class="card-header">
                                                        @foreach ($permission as $value)
                                                        @foreach ($rolePermission as $item)
                                                        @if ($value->tipo == 'usuario' )
                                                            @if ($item == $value->id)
                                                                <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}" checked> {{$value->name}}</span></label><br>
                                                            @endif
                                                            @endif
                                                        @endforeach
                                                        @if ($value->tipo == 'usuario' )
                                                            @if (!in_array($value->id, $rolePermission))
                                                                <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
                                                            @endif
                                                            @endif
                                                        @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/> 
                                            <div class="row justify-content-center">
                                                <div class="col-5">
                                                    <div class="card1">
                                                        <div class="card-header">
                                                        @foreach ($permission as $value)
                                                        @foreach ($rolePermission as $item)
                                                        @if ($value->tipo == 'trabajo' )
                                                            @if ($item == $value->id)
                                                                <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}" checked> {{$value->name}}</span></label><br>
                                                            @endif
                                                            @endif
                                                        @endforeach
                                                        @if ($value->tipo == 'trabajo' )
                                                            @if (!in_array($value->id, $rolePermission))
                                                                <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
                                                            @endif
                                                            @endif
                                                        @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="col-5">
                                                    <div class="card1">
                                                        <div class="card-header">
                                                        @foreach ($permission as $value)
                                                        @foreach ($rolePermission as $item)
                                                        @if ($value->tipo == 'clientes' )
                                                            @if ($item == $value->id)
                                                                <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}" checked> {{$value->name}}</span></label><br>
                                                            @endif
                                                            @endif
                                                        @endforeach
                                                        @if ($value->tipo == 'clientes' )
                                                            @if (!in_array($value->id, $rolePermission))
                                                                <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
                                                            @endif
                                                            @endif
                                                        @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>   
                                            <div class="row justify-content-center">
                                                <div class="col-5">
                                                    <div class="card1">
                                                        <div class="card-header">
                                                        @foreach ($permission as $value)
                                                        @foreach ($rolePermission as $item)
                                                        @if ($value->tipo == 'inventario' )
                                                            @if ($item == $value->id)
                                                                <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}" checked> {{$value->name}}</span></label><br>
                                                            @endif
                                                            @endif
                                                        @endforeach
                                                        @if ($value->tipo == 'inventario' )
                                                            @if (!in_array($value->id, $rolePermission))
                                                                <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
                                                            @endif
                                                            @endif
                                                        @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                

                                     </br>
                                     </br>
                                     <div class="text-center">
                                                <input type="submit" class="btn btn-success my-2 my-sm-0" value="Agregar">
                                                <a href="{{url('roles')}}"class="btn btn-primary">Regresar</a>
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
    

@endsection