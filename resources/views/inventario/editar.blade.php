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
            <select name="manufactura" class="form-control" class="btn-block" required>
                <option selected disabled value="">Elija el Fabricante</option>
                @foreach ($fabricante as $fabricantes)
                   @if ($fabricantes->nombre_fabricante == $inventario_elegido->manufactura)
                  <option value="{{$fabricantes->nombre_fabricante}}" selected>{{$fabricantes->nombre_fabricante}}</option>
                  @else
                  <option value="{{$fabricantes->nombre_fabricante}}">{{$fabricantes->nombre_fabricante}}</option>
                  @endif 
                @endforeach
                 
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
              <input type="text" style="text-transform:uppercase" class="form-control" id="capacidad" name="capacidad" autocomplete="off" value="{{$inventario->capacidad}}" placeholder="GB, TB"
                     value="{{ old('capacidad') }}" onkeyup="validarCapacidad()" required maxlength="8" onkeypress="return ((event.charCode >= 84 && event.charCode <= 84)||(event.charCode >= 116 && event.charCode <= 116)||(event.charCode >= 98 && event.charCode <= 98)||
              (event.charCode >= 103 && event.charCode <= 103)||(event.charCode >= 66 && event.charCode <= 66)||(event.charCode >= 71 && event.charCode <= 71)||(event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">      
                     <span id="estadoCapacidad"></span>
          </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputCity">Part Number </label>
          <input type="text" class="form-control" id="partNumber" name="partNumber" autocomplete="off" value="{{$inventario->part_Number}}"
          placeholder="Part Number" value="{{ old('partNumber') }}" onkeyup="validarSerie()" autocomplete="off" 
          onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))">
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">Date Code </label>
          <input type="text" class="form-control" id="dateCode" name="dateCode" autocomplete="off" value="{{$inventario->date_code}}"
          placeholder="Date Code" value="{{ old('dateCode') }}" onkeyup="validarFirmware()" 
          onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 47))">
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">Site Code </label>
          <input type="text" class="form-control" id="siteCode" name="siteCode" autocomplete="off" value="{{$inventario->site_code}}"
          placeholder="Site Code" value="{{ old('siteCode') }}" onkeyup="validarFirmware()"
          onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 47))">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4" style="padding-top: 8px">
          <div class="input-group">
            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Rol&nbsp;<strong>*</strong></span>
            <select name="rol" class="form-control" class="btn-block" required>
              <option disabled value="">Elija el Rol</option>
              @if ($inventario->rol == 'Donante')
                <option value="{{$inventario->rol}}" selected>{{$inventario->rol}}</option>       
                <option value="Datos">Datos</option>               
              @else
                <option value="{{$inventario->rol}}" selected>{{$inventario->rol}}</option>  
                <option value="Donante">Donante</option>   
              @endif
            </select>
          </div>
        </div>    
          <div class="form-group col-md-4" style="padding-top: 8px">
            <div class="input-group">
              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Tipo&nbsp;<strong>*</strong></span>
              <select name="tipo" class="form-control" class="btn-block" required>
                <option disabled value="">Elija el Dispositivo</option>
                @foreach ($dispositivo as $dispositivos)
                    @if ($dispositivos->nombre_dispositivo == $inventario_elegido->tipo)
                <option value="{{$dispositivos->nombre_dispositivo}}" selected>{{$dispositivos->nombre_dispositivo}}</option>                      
                  @else
                    <option value="{{$dispositivos->nombre_dispositivo}}">{{$dispositivos->nombre_dispositivo}}</option>      
                  @endif
                @endforeach
                
              </select>
            </div>
          </div>
          <div class="form-group col-md-4" style="padding-top: 8px">
            <div class="input-group">
              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Factor de Forma &nbsp;<strong>*</strong></span>
              <select class="form-control" class="btn-block" id="factor_de_forma" name="factor_de_forma" required value="{{$inventario->factor_de_forma}}">
                  <option selected disabled value="">Elija el Factor de Forma</option>
                  @foreach ($factor as $factores)
                     @if ($factores->nombre_factor == $inventario_elegido->factor_de_forma)
                     <option value="{{$factores->nombre_factor}}" selected>{{$factores->nombre_factor}}</option>                      
                    @else
                      <option value="{{$factores->nombre_factor}}">{{$factores->nombre_factor}}</option>      
                    @endif  
                  @endforeach
              </select>
            </div>
          </div>  
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">HDA Barcode</label>
              <input type="text" class="form-control" id="hda_barcode" name="hda_barcode" placeholder="Ingrese HDA Barcode" autocomplete="off" value="{{$inventario->hda_barcode}}"
              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
            </div>
          <div class="form-group col-md-4">
            <label for="inputCity">DCM</label>
              <input type="text" class="form-control" id="dcm" name="dcm" placeholder="Ingrese DCM" autocomplete="off" value="{{$inventario->dcm}}"
              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">MLC</label>
              <input type="text" class="form-control" id="mlc" name="mlc" placeholder="Ingrese MLC" autocomplete="off" value="{{$inventario->mlc}}"
              value="{{ old('pbc') }}"
              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
            </div>
          </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Product Of <strong style="color: red">*</strong></label>
              <input type="text" class="form-control" id="productOf" name="productOf" placeholder="Product Of" autocomplete="off" value="{{$inventario->product_of}}"
              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">PCB Sticker <strong style="color: red">*</strong></label>
              <input type="text" class="form-control" id="pbc" name="pbc" placeholder="Ingrese PCB Sticker" autocomplete="off" value="{{$inventario->pbc}}"
              value="{{ old('pbc') }}" onkeyup="validarPbc()" 
              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
              <span id="estadoPbc"></span>
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">PCB Revision</label>
              <input type="text" class="form-control" id="pcbRevision" name="pcbRevision" placeholder=" PCB Revision" autocomplete="off" value="{{$inventario->pcb_revision}}"
              value="{{ old('pcbRevision') }}" onkeyup="validarPbc()" 
              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputCity">Controller Chip</label>
              <input type="text" class="form-control" id="controller_chip" name="controller_chip" placeholder="Ingrese controllerChip" autocomplete="off" value="{{$inventario->controller_chip}}"
              value="{{ old('controllerChip') }}" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Phisycal Heads </label>
              <input type="text" class="form-control" id="phisycalHeads" name="phisycalHeads" autocomplete="off" value="{{$inventario->phisycal_heads}}"
              placeholder="Phisycal Heads" value="{{ old('phisycalHeads') }}" 
              onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 47))">
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">PrempType </label>
              <input type="text" class="form-control" id="prempType" name="prempType" autocomplete="off" value="{{$inventario->premp_Type}}"
              placeholder="PrempType"  value="{{ old('prempType') }}"
              onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 47))">
            </div>
          </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputCity">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ingrese la ubicación" autocomplete="off" value="{{$inventario->ubicacion}}"
            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209)|| (event.charCode == 45))">
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
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Precio de Compra</label>
            <input type="text" class="form-control" id="precio" name="precio" value="{{$inventario->precio}}" autocomplete="off"
            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">Nota </label>
          <input type="text" class="form-control" id="nota" name="nota" value="{{$inventario->nota}}" autocomplete="off">
        </div>
       
    </div>
    <br><br>
     <span class="mb-4"><strong>*</strong> Campos Obligatorios</span>
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