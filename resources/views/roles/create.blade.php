@extends('adminlte::page')
@section('content')
    <BR>
        <style>
            span {
                text-transform: capitalize;
                }
        </style>

    <div class="card">
        <div class="card-header">
            NUEVO ROL
        </div>
        <div class="card-body">
            <form action="{{ url('roles/nuevo')}}" method="post">
                {{csrf_field()}}
                                   <label form="name">Nombre de Rol</label>
                                   <input class="form-control" type="text" name="name" id="name" 
                                          placeholder="Nombre Completo" value="{{ old('name') }}" onblur="comprobarName()">
                                          <span id="estadoName"></span>
                                
        
                               
                                     <label form="confirm-password">Permisos para este Rol</label>
                                     <br>

                                     

                                     @foreach ($permission as $value)
                                     <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
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