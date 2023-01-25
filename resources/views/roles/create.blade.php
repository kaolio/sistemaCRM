@extends('adminlte::page')
@section('content')
    
        <style>
            
            span {
                text-transform: capitalize;
                }

            .card1  {
                border-radius: 5px;
                background-image: radial-gradient( circle farthest-corner at 7.2% 14%, rgba(236,242,246,1) 0%, rgba(238,250,249,1) 100.2% );
                
            }
            .card2  {
                border-radius: 5px;
                background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(37,145,251,0.98) 0.1%, rgba(0,7,128,1) 99.8% );
                
            }
            .card{
                /* background: linear-gradient(100deg, #6489af, rgb(253, 253, 253)); */
                background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(37,145,251,0.98) 0.1%, rgba(0,7,128,1) 99.8% );
                position: relative;
                width: 50%;
            }
            

            .menor{
                color:#d7f78c;
                font-size: medium;
            }
.button-1 {
  background-color: initial;
  background-image: linear-gradient(-180deg, #00D775, #00BD68);
  border-radius: 5px;
  box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Inter,-apple-system,system-ui,Roboto,"Helvetica Neue",Arial,sans-serif;
  font-size: 120%;
  height: 44px;
  line-height: 44px;
  outline: 0;
  overflow: hidden;
  padding: 0 20px;
  pointer-events: auto;
  position: relative;
  text-align: center;
  touch-action: manipulation;
  user-select: none;
  -webkit-user-select: none;
  vertical-align: top;
  white-space: nowrap;
  width: 30%;
  z-index: 9;
  border: 0;
}

.button-1:hover {
  background: #00bd68;
}
                
        </style>
            
        <script>
            function validarNombre() {

                if($("#name").val() == ""){
                    $("#estadoName").html("<span  class='menor'><h5 class='menor'> </h5></span>");
                    desabilitar();
                   }else{
                        if ($("#name").val().length < 3) {
                            $("#estadoName").html(
                                "<span  class='menor'><h5 class='menor'>Ingrese de 3 a 50 caracteres</h5></span>");
                                desabilitar();
                        } else {
                            if ($("#name").val().length > 50) {
                                $("#estadoName").html(
                                    "<span  class='menor'><h5 class='menor'>Ingrese de 3 a 50 caracteres</h5></span>");
                                    desabilitar();
                            } else {
                                    $("#estadoName").html("<span  class='menor'><h5 class='menor'> </h5></span>");
                                    habilitar();
                            }
                        } 
               }
            }
        </script>

        <div class="row justify-content-center">
            <div class="card" style="width: 80%;" >
                    <div class="card-header">
                      <h3 class="text-center text-white"> <b> NUEVO ROL </b> </h3>
                    </div>
                            <div class="card-body">
                                <form action="{{ url('roles/nuevo')}}" method="post">
                                    {{csrf_field()}}
                                                    <label form="name" class="text-white"> Nombre de Rol</label>
                                                        <input class="form-control" type="text" name="name" id="name" 
                                                            placeholder="Nombre de Rol" value="{{ old('name') }}" onkeyup="validarNombre()"
                                                            autocomplete="off" 
                                                            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209)) ">
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
                                                                                @if ($value->tipo == 'dashboard' )
                                                                                    <label><span><input type="checkbox" id="cbox1" name="permission[]" value="{{$value->id}}"> {{$value->name}}</span></label><br>
                                                                                @endif
                                                                                @endforeach 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br/>
                                                                    <div class="col-5">
                                                                    </div>
                                                            </div>
                                                            <br/>
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
                                                            <input type="submit" id="enviar" class="button-1" disabled value="Guardar">
                                                            {{-- <button class="button-1" id="enviar" role="button" disabled value="Agregar">Button 35</button> --}}
                                                        </div>
                                </form>
                            </div>
                </div>
        </div>
        
    <br>
    <script>

        function habilitar(){
            button = document.getElementById('enviar'); 
            button.disabled = false;
        }
        function desabilitar(){
            button = document.getElementById('enviar'); 
            button.disabled = true;
        }

        function toggle(source) {
                    checkboxes = document.getElementsByName('permission[]');

                    for(var i=0, n=checkboxes.length;i<n;i++) {
                        checkboxes[i].checked = source.checked;
                    }
        }

    </script>

@endsection