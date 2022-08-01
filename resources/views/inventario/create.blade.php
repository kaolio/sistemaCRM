@extends('adminlte::page')

@section('content_header')
    <h1 align="center" style="font-weight: 700">REGISTRAR NUEVO DISCO</h1>
@stop



@section('content')

<div class="card">
  <div class="container">
    <form class="m-3" action="{{ url('/inventario/nuevo') }}" method="POST">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-6" style="padding-top: 32px">
          <div class="input-group">
            <span class="input-group-text" style="background:rgb(2, 117, 216); color: aliceblue">Fabricante&nbsp;<strong>*</strong></span>
            <select name="manufactura" class="form-control" class="btn-block" required>
              <option value="">Elija el Fabricante</option>
              <option value="Seagate">Seagate</option>
              <option value="Toshiba">Toshiba</option>
              <option value="Samsung">Samsung</option>
              <option value="Verbatim">Verbatim</option>
              <option value="Wester Digital">Western Digital</option>
              <option value="SkayNet">SkyNet</option>
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
        <div class="form-group col-md-6 pb-17">
            <label for="inputPassword4">Modelo <strong>*</strong></label>
            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ingrese el modelo" autocomplete="off"
            value="{{ old('modelo') }}" onkeyup="validarModelo()" required
            onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
            <span id="estadoModelo"></span>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Número de Serie <strong>*</strong></label>
            <input type="text" class="form-control" id="numero_de_serie" name="numero_de_serie" autocomplete="off"
            placeholder="Ingrese número de serie" value="{{ old('numero_de_serie') }}" onkeyup="validarSerie()" autocomplete="off" required
            onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
            <span id="estadoSerie"></span>
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">Firmware <strong>*</strong></label>
            <input type="text" class="form-control" id="firmware" name="firmware" autocomplete="off"
            placeholder="Ingrese el firmware" value="{{ old('firmware') }}" onkeyup="validarFirmware()" required
            onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
            <span id="estadoFirmware"></span>
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">Capacidad<strong>*</strong></label>
             <input type="text" style="text-transform:uppercase" class="form-control" id="capacidad" name="capacidad" autocomplete="off" placeholder="GB, TB" 
            value="{{ old('capacidad') }}" onkeyup="validarCapacidad()" required maxlength="8" onkeypress="return ((event.charCode >= 84 && event.charCode <= 84)||(event.charCode >= 116 && event.charCode <= 116)||(event.charCode >= 98 && event.charCode <= 98)||
                              (event.charCode >= 103 && event.charCode <= 103)||(event.charCode >= 66 && event.charCode <= 66)||(event.charCode >= 71 && event.charCode <= 71)||(event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">      
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4" style="padding-top: 8px">
            <div class="input-group">
              <span class="input-group-text" style="background:rgb(2, 117, 216); color: aliceblue">Rol del Disco&nbsp;<strong>*</strong></span>
              <select name="rol" class="form-control" class="btn-block" required>
                <option value="">Elija el Rol</option>
                <option value="Datos">Datos</option>
                <option value="Paciente">Paciente</option>
                <option value="Donante">Donante</option>
                <option value="Clon">Clon</option>
              </select>
              <span id="estadoManufactura"></span>
            </div>
          </div>
            <div class="form-group col-md-4" style="padding-top: 8px">
              <div class="input-group">
                <span class="input-group-text" style="background:rgb(2, 117, 216); color: aliceblue">Tipo de Almacenamiento&nbsp;<strong>*</strong></span>
                <select name="tipo" class="form-control" class="btn-block" required>
                  <option value="">Elija el Tipo</option>
                  <option value="HDD">HDD</option>
                  <option value="SSD">SSD</option>
                  <option value="Otro">Otro</option>
                </select>
                <span id="estadoManufactura"></span>
              </div>
            </div>
            <div class="form-group col-md-4" style="padding-top: 8px">
              <div class="input-group">
                <span class="input-group-text" style="background:rgb(2, 117, 216); color: aliceblue">Factor de Forma &nbsp;<strong>*</strong></span>
                <select class="form-control" class="btn-block" id="factor_de_forma" name="factor_de_forma" required>
                  <option value="">Elija el Factor de Forma</option>
                  <option value="3.5 pulgadas ">3.5 pulgadas</option>
                  <option value="2.5 pulgadas">2.5 pulgadas</option>
                  <option value="M2">M2</option>
                </select>
              </div>
            </div>
          </div>
        <div class="form-row" style="align-items:center">
          <div class="form-group col-md-4">
            <label for="inputCity">PCB <strong>*</strong></label>
            <input type="text" class="form-control" id="pbc" name="pbc" placeholder="Ingrese la placa del disco" autocomplete="off"
            value="{{ old('pbc') }}" onkeyup="validarPbc()" required
            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
            <span id="estadoPbc"></span>
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">Ubicación</label>
              <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ingrese la ubicación" autocomplete="off"
              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
            </div>
          </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputCity">Nota</label>
          <textarea class="form-control" id="nota" name="nota" rows="1" cols="20" placeholder="Ingrese una nota del disco" autocomplete="off"></textarea>
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">Cabezal</label>
          <input type="text" class="form-control" id="cabecera" name="cabecera" autocomplete="off" placeholder="Ingrese el cabezal del disco" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">Información del Cabezal</label>
          <input type="text" class="form-control" id="info_de_cabecera" name="info_de_cabecera" autocomplete="off"
          placeholder="Ingrese información acerca del cabezal" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
        </div>
        <span class="mb-4"><strong>*</strong> Campos Obligatorios</span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-lg btn-secondary" style="background:rgb(2, 117, 216); color: aliceblue">Registrar</button>
      </div>
    </div>
  </form>
</div>
</div>

@endsection

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="{{ asset('js/inventario/create.js')}}"></script>
<link rel="stylesheet" href="{{ URL::asset('estilos/style.css') }} ">