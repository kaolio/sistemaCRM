@extends('adminlte::page')
@section('content')
    
        <style>
            
            span {
                text-transform: capitalize;
                }

            .card1  {

                background: linear-gradient(100deg, #5f8ab6, rgb(234, 234, 236));
                
            }
            .card2  {

                background: linear-gradient(100deg, #6489af, rgb(234, 234, 236));
                
            }
            .card{
                background: linear-gradient(100deg, #6489af, rgb(253, 253, 253));
                position: relative;
                width: 50%;
            }
            

            .menor{
                color:#d7f78c;
                font-size: medium;
            }
                
        </style>
            
        <script>
            function validarNombre() {

                if($("#name").val() == ""){
                    $("#estadoName").html("<span  class='menor'><h5 class='menor'> </h5></span>");
                   }else{
                        if ($("#name").val().length < 3) {
                            $("#estadoName").html(
                                "<span  class='menor'><h5 class='menor'>Ingrese de 3 a 50 caracteres</h5></span>");
                        } else {
                            if ($("#name").val().length > 50) {
                                $("#estadoName").html(
                                    "<span  class='menor'><h5 class='menor'>Ingrese de 3 a 50 caracteres</h5></span>");
                            } else {
                                
                                    $("#estadoName").html("<span  class='menor'><h5 class='menor'> </h5></span>");
                            }
                        } 
               }
            }
        </script>

        <div class="row justify-content-center">
            <div class="card" >
                    <div class="card-header " style ="font-family:serif,new time roman;">
                      <h3 class="text-center text-white"> <b> NUEVO ROL </b> </h3>
                    </div>
                            <div class="card-body">
                                <form action="{{ url('roles/nuevo')}}" method="post">
                                    {{csrf_field()}}
                                                    <label form="name" class="text-white"> Nombre de Rol</label>
                                                        <input class="form-control" type="text" name="name" id="name" 
                                                            placeholder="Nombre de Rol" value="{{ old('name') }}" onkeyup="validarNombre()"
                                                            autocomplete="off" 
                                                            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32)) ">
                                                            <span id="estadoName"></span>
                                                    
                            
                                                <br>
                                                        <label form="confirm-password" class="text-white">Permisos para este Rol</label>
                                                        <br>

                                                        <div class="card2">
                                                            <div class="card-body">
                                                                <input type="checkbox" onClick="toggle(this)" style="font-weight:bold;" > <b class="text-white">Seleccionar todos</b><br><br>

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
                                                            </div>
                                                        </div>

                                                        
                                                        </br>
                                                        <div class="text-center">
                                                            <input type="submit" class="btn btn-success my-2 my-sm-0" value="Agregar">
                                                        </div>
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