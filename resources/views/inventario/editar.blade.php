@extends('adminlte::page')

@section('content_header')
    <h1 align="center"><strong>EDITAR DISCO</strong></h1>
@stop

@section('content')

<div class="card">
    <div class="container">
    <form class="m-3" action="{{ url('/inventario/editar', $inventario->id) }}" method="post">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Manufactura</label>
          <input type="text" class="form-control" id="manufactura" name="manufactura" placeholder="" value="{{$inventario->manufactura}}">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Modelo</label>
          <input type="text" class="form-control" id="modelo" name="modelo" placeholder="" value="{{$inventario->modelo}}">
        </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Numero de Serie</label>
            <input type="text" class="form-control" id="numero_de_serie" name="numero_de_serie" value="{{$inventario->numero_de_serie}}">
          </div>
          <div class="form-group col-md-4">
              <label for="inputCity">Firmware</label>
              <input type="text" class="form-control" id="firmware" name="firmware" value="{{$inventario->firmware}}">
          </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Capacidad</label>
              <input type="text" class="form-control" id="capacidad" name="capacidad" value="{{$inventario->capacidad}}">
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">PBC</label>
            <input type="text" class="form-control" id="pbc" name="pbc" value="{{$inventario->pbc}}">
          </div>
          <div class="form-group col-md-4">
              <label for="inputCity">Ubicación</label>
              <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{$inventario->ubicacion}}">
          </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Factor de Forma</label>
              <input type="text" class="form-control" id="factor_de_forma" name="factor_de_forma" value="{{$inventario->factor_de_forma}}">
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Nota</label>
            <input type="text" class="form-control" id="nota" name="nota" value="{{$inventario->nota}}">
          </div>
          <div class="form-group col-md-4">
              <label for="inputCity">Cabecera</label>
              <input type="text" class="form-control" id="cabecera" name="cabecera" value="{{$inventario->cabecera}}">
          </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Info de Cabecera</label>
              <input type="text" class="form-control" id="info_de_cabecera" name="info_de_cabecera" value="{{$inventario->info_de_cabecera}}">
          </div>
      </div>
        <div class="form-group">
          <button type="submit" class="btn btn-lg btn-secondary">Actualizar</button>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-dark" {{url('inventario')}}>Regresar al Inventario</button>
          </div>
    </div>
    </form>
  </div>
  </div>

@endsection