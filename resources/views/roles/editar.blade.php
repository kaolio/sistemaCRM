@extends('adminlte::page')
@section('content')
    <BR>
    <div class="card">
        <div class="card-header">
            NUEVO ROL
        </div>
        <div class="card-body">

            <form action="{{url('/roles/nuevo/'.$role->id)}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}
                {{method_field('PATCH')}}

                                   <label form="name">Nombre de Rol</label>
                                   <input class="form-control" type="text" name="name" id="name" 
                                          placeholder="Nombre Completo" value="{{ old('name') }}" onblur="comprobarName()">
                                          <span id="estadoName"></span>
                                
        
                               
                                     <label form="confirm-password">Permisos para este Rol</label>
                                     <br>

                                     @foreach ($permission as $value)
                                     @foreach ($rolePermission as $item)
                                        @if ($item == $value->id)
                                            <label><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}" checked> {{$value->name}}</label><br>
                                        @endif
                                     @endforeach
                                        @if (!in_array($value->id, $rolePermission))
                                            <label><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</label><br>
                                        @endif

                                     @endforeach
                                     

                                
                              
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