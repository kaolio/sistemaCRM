@extends('adminlte::page')

@section('content_header')
    <h1 align="center" style="font-weight: 700">REGISTRAR NUEVO DISCO</h1>
@stop



@section('content')

<div class="card">
  <div class="container-fluid">
    <form class="m-3" action="{{ url('/inventario/nuevo') }}" enctype="multipart/form-data" method="POST">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-6" style="padding-top: 32px">
          <div class="input-group">
            <span class="input-group-text" style="background:rgb(2, 117, 216); color: aliceblue">Fabricante&nbsp;<strong style="color: red">*</strong></span>
            <select name="manufactura" class="form-control" class="btn-block" required>
              <option selected value="" disabled>Elige un Fabricante</option>
                @foreach ($fabricante as $fabricantes)
                 <option value="{{$fabricantes->nombre_fabricante}}">{{$fabricantes->nombre_fabricante}}</option>
                 @endforeach
            </select>
            <span id="estadoManufactura"></span>
          </div>
        </div>
        <div class="form-group col-md-6 pb-17">
            <label for="inputPassword4">Modelo <strong style="color: red">*</strong></label>
            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ingrese el modelo" autocomplete="off"
            value="{{ old('modelo') }}" onkeyup="validarModelo()" required
            onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))">
            <span id="estadoModelo"></span>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Número de Serie <strong style="color: red">*</strong></label>
            <input type="text" class="form-control" id="numero_de_serie" name="numero_de_serie" autocomplete="off"
            placeholder="Ingrese número de serie" value="{{ old('numero_de_serie') }}" onkeyup="validarSerie()" autocomplete="off" required
            onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))">
            <span id="estadoSerie"></span>
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">Firmware</label>
            <input type="text" class="form-control" id="firmware" name="firmware" autocomplete="off"
            placeholder="Ingrese el firmware" value="{{ old('firmware') }}" onkeyup="validarFirmware()" 
            onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 47))">
            <span id="estadoFirmware"></span>
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">Capacidad<strong style="color: red">*</strong></label>
             <input type="text" style="text-transform:uppercase" class="form-control" id="capacidad" name="capacidad" autocomplete="off" placeholder="GB, TB" 
            value="{{ old('capacidad') }}" onkeyup="validarCapacidad()" required maxlength="8" onkeypress="return ((event.charCode >= 84 && event.charCode <= 84)||(event.charCode >= 116 && event.charCode <= 116)||(event.charCode >= 98 && event.charCode <= 98)||
                              (event.charCode >= 103 && event.charCode <= 103)||(event.charCode >= 66 && event.charCode <= 66)||(event.charCode >= 71 && event.charCode <= 71)||(event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">      
          </div>
        </div> 
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Part Number </label>
            <input type="text" class="form-control" id="partNumber" name="partNumber" autocomplete="off"
            placeholder="Part Number" value="{{ old('partNumber') }}" autocomplete="off" 
            onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))">
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">Date Code </label>
            <input type="text" class="form-control" id="dateCode" name="dateCode" autocomplete="off"
            placeholder="Date Code" value="{{ old('dateCode') }}"
            onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 47))">
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">Site Code </label>
            <input type="text" class="form-control" id="siteCode" name="siteCode" autocomplete="off"
            placeholder="Site Code" value="{{ old('siteCode') }}" 
            onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 47))">
          </div>
        </div> 
        <div class="form-row">
          <div class="form-group col-md-4" style="padding-top: 8px">
            <div class="input-group">
              <span class="input-group-text" style="background:rgb(2, 117, 216); color: aliceblue">Rol &nbsp;<strong style="color: red">*</strong></span>
              <select name="rol" class="form-control" class="btn-block" required>
                <option value="">Elija el Rol</option>
                <option value="Datos">Datos</option>
                <option value="Donante">Donante</option>
              </select>
            </div>
          </div>
            <div class="form-group col-md-4" style="padding-top: 8px">
              <div class="input-group">
                <span class="input-group-text" style="background:rgb(2, 117, 216); color: aliceblue">Tipo&nbsp;<strong style="color: red">*</strong></span>
                <select name="tipo" class="form-control" class="btn-block" required>
                  <option selected value="" disabled>Elige un Dispositivo</option>
                    @foreach ($dispositivo as $dispositivos)
                    <option value="{{$dispositivos->nombre_dispositivo}}">{{$dispositivos->nombre_dispositivo}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="form-group col-md-4" style="padding-top: 8px">
              <div class="input-group">
                <span class="input-group-text" style="background:rgb(2, 117, 216); color: aliceblue">Factor de Forma &nbsp;<strong style="color: red">*</strong></span>
                <select class="form-control" class="btn-block" id="factor_de_forma" name="factor_de_forma" required>
                  <option selected value="" disabled>Elige un Factor de Forma</option>
                    @foreach ($factor as $factores)
                     <option value="{{$factores->nombre_factor}}">{{$factores->nombre_factor}}</option>
                     @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputCity">HDA Barcode</label>
                <input type="text" class="form-control" id="hda_barcode" name="hda_barcode" placeholder="Ingrese HDA Barcode" autocomplete="off"
                onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
              </div>
            <div class="form-group col-md-4">
              <label for="inputCity">DCM</label>
                <input type="text" class="form-control" id="dcm" name="dcm" placeholder="Ingrese DCM" autocomplete="off"
                onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
              </div>
              <div class="form-group col-md-4">
                <label for="inputCity">MLC</label>
                <input type="text" class="form-control" id="mlc" name="mlc" placeholder="Ingrese MLC" autocomplete="off"
                value="{{ old('pbc') }}"
                onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
              </div>
            </div>
        <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputCity">Product Of </label>
                <input type="text" class="form-control" id="productOf" name="productOf" placeholder="Product Of" autocomplete="off"
                  onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">PCB Sticker</label>
              <input type="text" class="form-control" id="pbc" name="pbc" placeholder="Ingrese PCB Sticker" autocomplete="off"
              value="{{ old('pbc') }}" onkeyup="validarPbc()" 
              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
              <span id="estadoPbc"></span>
            </div>
            <div class="form-group col-md-4">
              <label for="inputCity">PCB Revision</label>
              <input type="text" class="form-control" id="pcbRevision" name="pcbRevision" placeholder=" PCB Revision" autocomplete="off"
              value="{{ old('pcbRevision') }}"
              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
              <span id="estadoPbc"></span>
            </div>
          </div>
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Controller Chip</label>
            <input type="text" class="form-control" id="controller_chip" name="controller_chip" placeholder="Ingrese controllerChip" autocomplete="off"
            value="{{ old('controllerChip') }}" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
          </div>
        <div class="form-group col-md-4">
          <label for="inputCity">Phisycal Heads </label>
          <input type="text" class="form-control" id="phisycalHeads" name="phisycalHeads" autocomplete="off"
          placeholder="Phisycal Heads" value="{{ old('phisycalHeads') }}" 
          onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 47))">
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">PrempType </label>
          <input type="text" class="form-control" id="prempType" name="prempType" autocomplete="off"
          placeholder="PrempType" value="{{ old('prempType') }}"  
          onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 47))">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputCity">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ingrese la ubicación" autocomplete="off"
            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209)|| (event.charCode == 45))">
          </div>
        <div class="form-group col-md-4">
          <label for="inputCity">Cabezal</label>
          <input type="text" class="form-control" id="cabecera" name="cabecera" autocomplete="off" placeholder="Ingrese el cabezal del disco" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">Información del Cabezal</label>
          <input type="text" class="form-control" id="info_de_cabecera" name="info_de_cabecera" autocomplete="off"
          placeholder="Ingrese información acerca del cabezal" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 45))">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputCity">Precio de Compra</label>
          <textarea class="form-control" id="precio" name="precio" rows="1" cols="20" placeholder="Precio de Compra" autocomplete="off"></textarea>
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">Nota</label>
          <textarea class="form-control" id="nota" name="nota" rows="1" cols="20" placeholder="Ingrese una nota del disco" autocomplete="off"></textarea>
        </div>
      </div>
      <span class="mb-4"><strong style="color: red">*</strong> Campos Obligatorios</span>
      <br><br>

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
        </div>
      </div>

        

      <div class="form-group">
        <button type="submit" class="btn btn-success my-2 my-sm-0">Registrar</button>
      </div>
    </div>
  </form>




</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    function cambiarPCB(){
      var pdrs = document.getElementById('file-upload-image-pcb').files[0].name;
      document.getElementById('info-imagen-PCB').value = pdrs;
    }

    function cambiarPegatina(){
      var pdrs = document.getElementById('file-upload-image-pegatina').files[0].name;
      document.getElementById('info-imagen-Pegatina').value = pdrs;
    }
   
</script>

{{--<script src="{{ asset('js/inventario/create.js')}}"></script>--}}
<link rel="stylesheet" href="{{ URL::asset('estilos/style.css') }} ">

<br>
@endsection

