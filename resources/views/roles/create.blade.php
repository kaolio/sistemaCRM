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

                                     <input type="checkbox" onClick="toggle(this)" /> Seleccionar/Deseleccionar todos<br><br>

                                        <div class="row">
                                                <div class="col-5">
                                                <div class="card spring-fever">
                                                    <div class="card-header">
                                                        @foreach ($permission as $value)
                                                            @if ($value->tipo == 'rol' )
                                                                <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
                                                            @endif
                                                        @endforeach 
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-5">
                                                <div class="card">
                                                    <div class="card-header">
                                                        @foreach ($permission as $value)
                                                            @if ($value->tipo == 'usuario' )
                                                                <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
                                                            @endif
                                                        @endforeach 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-5">
                                            <div class="card">
                                                <div class="card-header">
                                                    @foreach ($permission as $value)
                                                        @if ($value->tipo == 'trabajo' )
                                                            <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
                                                        @endif
                                                    @endforeach 
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-5">
                                            <div class="card">
                                                <div class="card-header">
                                                    @foreach ($permission as $value)
                                                        @if ($value->tipo == 'clientes' )
                                                            <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
                                                        @endif
                                                    @endforeach 
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-5">
                                            <div class="card">
                                                <div class="card-header">
                                                    @foreach ($permission as $value)
                                                        @if ($value->tipo == 'inventario' )
                                                            <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
                                                        @endif
                                                    @endforeach 
                                                </div>
                                            </div>
                                        </div>

                                        </div>

                                        
                              
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
    <script>

        function toggle(source) {
                    checkboxes = document.getElementsByName('permission[]');

                    for(var i=0, n=checkboxes.length;i<n;i++) {
                        checkboxes[i].checked = source.checked;
                    }
        }

    </script>

@endsection