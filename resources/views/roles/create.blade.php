@extends('adminlte::page')
@section('content')
    <BR>
        <style>
            
            span {
                text-transform: capitalize;
                }

            .card1  {

                background: linear-gradient(100deg, #C1C2C3, rgb(234, 234, 236));
                
            }
            .card{
                background: linear-gradient(100deg, #96a0be, rgb(253, 253, 253));
                position: absolute;
                width: 50%;
            }
                
        </style>

        <div class="row justify-content-center">
            <div class="card" >
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

                                                    <div class="row justify-content-center">
                                                        <div class="col-5">
                                                            <div class="card1" >
                                                                <div class="card-header">
                                                                    @foreach ($permission as $value)
                                                                        @if ($value->tipo == 'rol' )
                                                                            <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
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
                                                                        @if ($value->tipo == 'usuario' )
                                                                            <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
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
                                                                        @if ($value->tipo == 'trabajo' )
                                                                            <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
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
                                                                        @if ($value->tipo == 'clientes' )
                                                                            <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
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
                                             </form>   
                                        </div>
                            </div>
                        </div>
        
    <br>
    <script>

        function toggle(source) {
                    checkboxes = document.getElementsByName('permission[]');

                    for(var i=0, n=checkboxes.length;i<n;i++) {
                        checkboxes[i].checked = source.checked;
                    }
        }

    </script>

@endsection