@extends('adminlte::page')

@section('content_header')
    <h1 align="center" style="font-weight: 700">EDITAR DISCO</h1>
@stop

<style>
  span {
        text-transform: capitalize;}
  .error{
        color:#cf1111;
        font-size: medium;}
  .bien{
        color: rgb(15, 208, 67);
        font-size: medium;}
  strong{
          color: red;
        }
</style>

<script>
  function validarModelo(){
    if($("#modelo").val() == ""){
      $("#estadoModelo").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>");
    }else{
          if ($("#modelo").val().length < 5) {
              $("#estadoModelo").html("<span  class='error'><h5 class='menor'>Ingrese de 5 hasta 40 caracteres</h5></span>");
          }else{
              if($("#modelo").val().length > 40) {
                  $("#estadoModelo").html("<span  class='error'><h5 class='menor'>Ingrese menos de 40 caracteres</h5></span>");
              }else{
                      $("#estadoModelo").html("<span  class='bien'><h5 class='menor'> Modelo Válido </h5></span>");
              }
          } 
    }
  }
  function validarSerie(){
    if($("#numero_de_serie").val() == ""){
      $("#estadoSerie").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
    }else{
          if ($("#numero_de_serie").val().length < 5) {
              $("#estadoSerie").html("<span  class='error'><h5 class='menor'>Ingrese de 5 hasta 40 caracteres</h5></span>");
          }else {
              if ($("#numero_de_serie").val().length > 40) {
                  $("#estadoSerie").html("<span  class='error'><h5 class='menor'>Ingrese menos de 40 caracteres</h5></span>");
              }else {
                      $("#estadoSerie").html("<span  class='bien'><h5 class='menor'> Número de serie Válido </h5></span>");
              }
          } 
    }
  }
  function validarFirmware(){
    if($("#firmware").val() == ""){
      $("#estadoFirmware").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
    }else{
          if ($("#firmware").val().length < 5) {
              $("#estadoFirmware").html("<span  class='error'><h5 class='menor'>Ingrese de 5 hasta 40 caracteres</h5></span>");
          }else {
              if ($("#firmware").val().length > 40) {
                  $("#estadoFirmware").html("<span  class='error'><h5 class='menor'>Ingrese menos de 40 caracteres</h5></span>");
              }else {
                      $("#estadoFirmware").html("<span  class='bien'><h5 class='menor'> Firmware Válido </h5></span>");
              }
          } 
    }
  }
  function validarCapacidad(){
    if($("#capacidad").val() == ""){
      $("#estadoCapacidad").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
    }else{
        $("#estadoCapacidad").html("<span  class='bien'><h5 class='menor'>Válido</h5></span>");  
    }
  }
  function validarPbc(){
    if($("#pbc").val() == ""){
      $("#estadoPbc").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
    }else{
        $("#estadoPbc").html("<span  class='bien'><h5 class='menor'>Válido</h5></span>");
          
    }
  }
</script>

@section('content')

<div class="card">
    <div class="container-fluid">
    <form class="m-3" action="{{ url('/inventario/editar', $inventario->id) }}" method="post">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-6" style="padding-top: 32px">
          <div class="input-group">
            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Fabricante &nbsp;<strong>*</strong></span>
            <select name="manufactura" class="form-control" class="btn-block" required value="{{$inventario->manufactura}}">
                <option selected disabled value="">Elija el Fabricante</option>
                 @if ($inventario->manufactura == $inventario_elegido->manufactura)
                 <option value="{{$inventario->manufactura}}" selected>{{$inventario->manufactura}}</option>
                 @else
                 <option value="{{$inventario->manufactura}}">{{$inventario->manufactura}}</option>
                 @endif
                <option value="Toshiba">Toshiba</option>
                <option value="Samsung">Samsung</option>
                <option value="Verbatim">Verbatim</option>
                <option value="Western Digital">Western Digital</option>
                <option value="Skynet">Skynet</option>
                <option value="Maxtor">Maxtor</option>
                <option value="Adata">Adata</option>
                <option value="Crucial">Crucial</option>
                <option value="Kingston">Kingston</option>
                <option value="Sony">Sony</option>
                <option value="Hitachi">Hitachi</option>
                <option value="Asus">Asus</option>
            </select>
            <span id="estadoManufactura"></span>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Modelo <strong>*</strong></label>
          <input type="text" class="form-control" id="modelo" name="modelo" placeholder="" value="{{$inventario->modelo}}" autocomplete="off"
                  value="{{ old('modelo') }}" onkeyup="validarModelo()" required
                  onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))">
                  <span id="estadoModelo"></span>
        </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Número de Serie <strong>*</strong></label>
            <input type="text" class="form-control" id="numero_de_serie" name="numero_de_serie" value="{{$inventario->numero_de_serie}}" autocomplete="off"
                   value="{{ old('numero_de_serie') }}" onkeyup="validarSerie()" required 
                   onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))">
                   <span id="estadoSerie"></span>
          </div>
          <div class="form-group col-md-4">
              <label for="inputCity">Firmware <strong>*</strong></label>
              <input type="text" class="form-control" id="firmware" name="firmware" value="{{$inventario->firmware}}" autocomplete="off"
                     value="{{ old('firmware') }}" onkeyup="validarFirmware()" required 
                     onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))">
                     <span id="estadoFirmware"></span>
          </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Capacidad<strong>*</strong></label>
              {{-- <input type="text" class="form-control" id="capacidad" name="capacidad" autocomplete="off" value="{{$inventario->capacidad}}" placeholder="Ingrese capacidad en GB o TB"
                     value="{{ old('capacidad') }}" onkeyup="validarCapacidad()" required maxlength="8"
                     onkeypress="return ((event.charCode >= 84 && event.charCode <= 84)||(event.charCode >= 116 && event.charCode <= 116)||(event.charCode >= 98 && event.charCode <= 98)||(event.charCode >= 103 && event.charCode <= 103)||(event.charCode >= 66 && event.charCode <= 66)||(event.charCode >= 71 && event.charCode <= 71)||(event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))"> --}}
              <input type="text" style="text-transform:uppercase" class="form-control" id="capacidad" name="capacidad" autocomplete="off" value="{{$inventario->capacidad}}" placeholder="GB, TB"
                     value="{{ old('capacidad') }}" onkeyup="validarCapacidad()" required maxlength="8" onkeypress="return ((event.charCode >= 84 && event.charCode <= 84)||(event.charCode >= 116 && event.charCode <= 116)||(event.charCode >= 98 && event.charCode <= 98)||
              (event.charCode >= 103 && event.charCode <= 103)||(event.charCode >= 66 && event.charCode <= 66)||(event.charCode >= 71 && event.charCode <= 71)||(event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">      
                     <span id="estadoCapacidad"></span>
          </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4" style="padding-top: 8px">
          <div class="input-group">
            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Rol del Disco&nbsp;<strong>*</strong></span>
            <select name="rol" class="form-control" class="btn-block" required>
              <option disabled value="">Elija el Rol</option>
              @if ($inventario->rol == $inventario_elegido->rol)
              <option value="{{$inventario->rol}}" selected>{{$inventario->rol}}</option>                      
            @else
              <option value="{{$inventario->rol}}">{{$inventario->rol}}</option>      
            @endif
              <option value="Datos">Datos</option>
              <option value="Dispositivo a Recuperar">Dispositivo a Recuperar</option>
              <option value="Donante">Donante</option>
              <option value="Clon">Clon</option>
            </select>
            <span id="estadoManufactura"></span>
          </div>
        </div>
          <div class="form-group col-md-4" style="padding-top: 8px">
            <div class="input-group">
              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Tipo de Almacenamiento&nbsp;<strong>*</strong></span>
              <select name="tipo" class="form-control" class="btn-block" required>
                <option disabled value="">Elija el Tipo</option>
                @if ($inventario->tipo == $inventario_elegido->tipo)
                <option value="{{$inventario->tipo}}" selected>{{$inventario->tipo}}</option>                      
              @else
                <option value="{{$inventario->tipo}}">{{$inventario->tipo}}</option>      
              @endif
                <option value="HDD">HDD</option>
                <option value="SSD">SSD</option>
                <option value="Otro">Otro</option>
              </select>
              <span id="estadoManufactura"></span>
            </div>
          </div>
          <div class="form-group col-md-4" style="padding-top: 8px">
            <div class="input-group">
              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Factor de Forma &nbsp;<strong>*</strong></span>
              <select class="form-control" class="btn-block" id="factor_de_forma" name="factor_de_forma" required value="{{$inventario->factor_de_forma}}">
                  <option selected disabled value="">Elija el Factor de Forma</option>
                  @if ($inventario->factor_de_forma == $inventario_elegido->factor_de_forma)
                    <option value="{{$inventario->factor_de_forma}}" selected>{{$inventario->factor_de_forma}}</option>                      
                  @else
                    <option value="{{$inventario->factor_de_forma}}">{{$inventario->factor_de_forma}}</option>      
                  @endif
                  <option value="3.5 pulgadas">3.5 pulgadas</option>
                  <option value="3.5 pulgadas">2.5 pulgadas</option>
                  <option value="M2">M2</option>
              </select>
            </div>
          </div> 
        </div>
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">PCB <strong>*</strong></label>
            <input type="text" class="form-control" id="pbc" name="pbc" value="{{$inventario->pbc}}" autocomplete="off"
                   value="{{ old('pbc') }}" onkeyup="validarPbc()" required
                   onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
                   <span id="estadoPbc"></span>
          </div>
          <div class="form-group col-md-4">
              <label for="inputCity">Ubicación </label>
              <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{$inventario->ubicacion}}" autocomplete="off"
              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
          </div> 
          <div class="form-group col-md-4">
            <label for="inputCity">Fecha de Disco</label>
              <input type="date" class="form-control" id="fechaDisco" name="fechaDisco"  value="{{$inventario->fechaDisco}}" autocomplete="off">
            </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Nota </label>
            <input type="text" class="form-control" id="nota" name="nota" value="{{$inventario->nota}}" autocomplete="off">
          </div>
          <div class="form-group col-md-4">
              <label for="inputCity">Cabezal</label>
              <input type="text" class="form-control" id="cabecera" name="cabecera" value="{{$inventario->cabecera}}" autocomplete="off"
              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
          </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Información del Cabezal</label>
              <input type="text" class="form-control" id="info_de_cabecera" name="info_de_cabecera" value="{{$inventario->info_de_cabecera}}" autocomplete="off"
              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
          </div>
          <span class="mb-4"><strong>*</strong> Campos Obligatorios</span>
      </div>
      <br>
        <div class="form-group">
          <a href="{{url('/inventario')}}" class="btn btn-danger my-2 my-sm-0">Regresar</a>
          <button type="submit" class="btn btn-PRIMARY my-2 my-sm-0">Actualizar</button>
          
        </div>
      </div>
    </form>
  </div>
  </div>

@endsection