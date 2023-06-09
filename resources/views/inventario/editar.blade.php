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
    .botones{
    position: absolute;
    right: 3%;
    top:2%;
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
    <form class="m-3"  action="{{ url('/inventario/editar/'.$inventario->id) }}" enctype="multipart/form-data" method="post">
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
              <label for="inputCity">Firmware</label>
              <input type="text" class="form-control" id="firmware" name="firmware" value="{{$inventario->firmware}}" autocomplete="off"
                     value="{{ old('firmware') }}" onkeyup="validarFirmware()"  
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
          placeholder="Part Number" value="{{ old('partNumber') }}" autocomplete="off" 
          onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))">
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">Date Code </label>
          <input type="text" class="form-control" id="dateCode" name="dateCode" autocomplete="off" value="{{$inventario->date_code}}"
          placeholder="Date Code" value="{{ old('dateCode') }}" 
          onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 47))">
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">Site Code </label>
          <input type="text" class="form-control" id="siteCode" name="siteCode" autocomplete="off" value="{{$inventario->site_code}}"
          placeholder="Site Code" value="{{ old('siteCode') }}" 
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
                <option disabled value="" selected>Elija el Dispositivo</option>
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
            <label for="inputCity">Product Of </label>
              <input type="text" class="form-control" id="productOf" name="productOf" placeholder="Product Of" autocomplete="off" value="{{$inventario->product_of}}"
              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">PCB Sticker</label>
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
      <label for="inputCity">Imagenes</label>
      <div class="card">
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">

                      <div class="row">
                        <div class="col">
                          <div class="text-center">
                            <div class="subir_imagen">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span>
                                        <label for="file-upload-image-pcb"  style="cursor:pointer; background: linear-gradient(0.25turn, #3f87a6, #ebf8e1, #f69d3c);" class="subir">
                                        <i class="fas fa-cloud-upload-alt"></i>Imagen PCB</label>
                                        <input id="file-upload-image-pcb" name="file-upload-image-pcb" onchange='cambiarPCB()'  type="file" style='display: none;'/>
                                        <span class="input-group-text"  style=" background:rgb(29, 145, 195);display: none; color: aliceblue"></span>
                                        <input type="text"  class="form-control required"  disabled  id="info-imagen-PCB" > &nbsp;<br>
                                        
                                     </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="text-center">
                            <div class="subir_imagen">
                                <div class="col-12">
                                    <div class="input-group">
                                        <span>
                                        <label for="file-upload-image-pegatina"  style="cursor:pointer; background: linear-gradient(0.25turn, #3f87a6, #ebf8e1, #f69d3c);" class="subir">
                                        <i class="fas fa-cloud-upload-alt"></i>Imagen Pegatina</label>
                                        <input id="file-upload-image-pegatina" name="file-upload-image-pegatina" onchange='cambiarPegatina()'  type="file" style='display: none;'/>
                                        <span class="input-group-text"  style=" background:rgb(29, 145, 195);display: none; color: aliceblue"></span>
                                        <input type="text"  class="form-control required"  disabled  id="info-imagen-Pegatina" > &nbsp;<br>
                                        
                                     </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

          @foreach ($imagenes as $imagenes)
              <div class="card col-5" style="width: 35%;height: 10%;" id="card_cerrado{{$imagenes->id}}">
                  <button type="button" class="btn btn-white botones" data-toggle="modal" data-target="#eliminarImage{{$imagenes->id}}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-trash" viewBox="0 0 448 512">
                          <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg>    
                  </button>
                  <img src="{{asset('imagenes-inventario/'.$imagenes->nombre.'.jpg') }}" align="left">
                  
              </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
      
              {{-- ELIMINAR --}}
              <div class="modal fade" id="eliminarImage{{$imagenes->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Eliminar Imagen</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-title w-100 text-center">
                          ¿Realmente Desea Borrar esta Imagen?
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
                          <button type="button" onclick="enviarDelete({{$imagenes->id}})" class="btn btn-success" >Aceptar</button>
                      </div>
                      
                      </div>
                  </div>
                  </div>
      
          @endforeach 
      
      </div>
        </div>
      </div>


        <div class="form-group">
          <a href="{{url('/inventario')}}" class="btn btn-danger my-2 my-sm-0">Regresar</a>
          <button type="submit" class="btn btn-PRIMARY my-2 my-sm-0">Actualizar</button>
          
        </div>
         </form>
      </div>
   
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
    function cambiarPCB(){
      var pdrs = document.getElementById('file-upload-image-pcb').files[0].name;
      document.getElementById('info-imagen-PCB').value = pdrs;
    }

    function cambiarPegatina(){
      var pdrs = document.getElementById('file-upload-image-pegatina').files[0].name;
      document.getElementById('info-imagen-Pegatina').value = pdrs;
    }

    function enviarDelete(id) {  
        $("#card_cerrado"+id).remove();
      $.ajax({
              type: 'POST',
              url: '/inventario/eliminar/image',
              data: {
                "_token": "{{ csrf_token() }}",
                  id: id,
              },
              cache: false,
              dataType: 'json',
              success: function(data) {
                  //console.log(data);  
                
                $('#eliminarImage'+id).modal('hide');
              }
      });
    }

</script>

@endsection