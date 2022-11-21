@extends('adminlte::page')


<style>
  .btn1{
      border-radius: 5px;
      box-shadow: 2px 2px 2px rgb(95, 93, 93);
      transform: translateY(0px);
  }
  .btn1:active {
      transform: translateY(6px);
  }
</style>

@section('content')

<h3>Facturaciónkkkkk</h3>
<div class="form">
  <form class="m-3" action="{{ url('/facturacion/nuevo') }}" method="POST">
    @csrf
    <div class="form-row mt-2" >
    <div class="col-md-2">
      <div class="input-group mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Servicio</span>
        </div>
        <input type="text" class="form-control" id="servicio" name="servicio" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
      </div>
    </div>
    <div class="col-md-2">
    <div class="input-group mb-1">
          <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Precio</span>
            </div>
          <input type="text" class="form-control" id="precio" name="precio" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Partes</span>
          </div>
          <input type="text" class="form-control" id="partes" name="partes" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
        </div>
      </div>
      <div class="col-md-2">
          <div class="input-group mb-1">
              <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">IVA(%)</span>
        </div>
        <input type="text" class="form-control" id="iva" name="iva" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    </div>
    <div class="col-md-2">
        <div class="input-group mb-1">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Descuento(%)</span>
        </div>
        <input type="text" class="form-control" id="descuento" name="descuento" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
      </div>
    </div>
    <div class="col-md-2">
      <div class="input-group mb-1">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Total</span>
        </div>
        <input type="text" id="total" onblur="calcularTotal()" class="form-control" name="total" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
      </div>
    </div>
</div>

<div class="form-row mt-2">
    <div class="col-md-2">
        <div class="input-group mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">SubTotal</span>
          </div>
          <input id="subtotal" onblur="calcularSubtotal()" type="text" class="form-control" name="subtotal" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
        </div>
      </div>
      <div class="col-md-2">
          <div class="input-group mb-1">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Total con IVA</span>
          </div>
          <input type="text" id="totalConIva" onblur="calcularIva()" class="form-control" name="totalConIva" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
        </div>
      </div>
</div>
    <div class="form-group">
      <button type="submit" class="btn1 btn-dark btn-lg m-3">Guardar</button>
    </div>
</form>
</div>
  
<script>
    function calcularTotal(){
    var precio = parseFloat(document.getElementById("precio").value);
    var partes = parseFloat(document.getElementById("partes").value);
    var iva = parseFloat(document.getElementById("iva").value);
    var descuento = parseFloat(document.getElementById("descuento").value);
    // var subtotal = parseFloat(document.getElementById("subtotal").value);
    var iv = parseFloat(((precio+partes)/100)*iva);
    var desc = parseFloat(((precio+partes+iv)/100)*descuento).toFixed(2);
    // var desc = parseFloat(((precio+partes)/100)*iva)*descuento).toFixed(2);
    var total = document.getElementById("total");
    total.value = parseFloat((precio+partes+iv)-desc).toFixed(2);
    console.log(total.value);
  }


  function calcularSubtotal(){
    var precio = parseFloat(document.getElementById("precio").value);
    var partes = parseFloat(document.getElementById("partes").value);

    var descuento = parseFloat(document.getElementById("descuento").value);
    var desc = parseFloat(((precio+partes)/100)*descuento).toFixed(2);
    var subtotal = document.getElementById("subtotal");
    subtotal.value = parseFloat(precio+partes-desc).toFixed(2);
    console.log(subtotal.value);
  }
  
  function calcularIva(){
    var precio = parseFloat(document.getElementById("precio").value);
    var partes = parseFloat(document.getElementById("partes").value);
    var iva = parseFloat(document.getElementById("iva").value);
    var descuento = parseFloat(document.getElementById("descuento").value);
    // var subtotal = parseFloat(document.getElementById("subtotal").value);
    var iv = parseFloat(((precio+partes)/100)*iva);
    var desc = parseFloat(((precio+partes+iv)/100)*descuento).toFixed(2);
    
    var totalConIva = document.getElementById("totalConIva");
    totalConIva.value = parseFloat((precio+partes+iv)-desc).toFixed(2);
    console.log(totalConIva.value);
  }
  </script>
<p class="subtitulo">Facturas</p>
<div class="card">
    <div class="card-body">
        <table class="table table-responsive">
            <thead  class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
                <tr>
                    <th class="col-md-1 p-1">N° </th>
                    <th class="col-md-1 p-1">Estado</th>
                    <th class="col-md-2 p-1">Total</th>
                    <th class="col-md-2 p-1">Creado por</th>
                    <th class="col-md-2 p-1">Creado en Fecha</th>
                </tr>
              </thead>
              <tbody class="table-bordered">
                  {{-- @if(count($inventario)<=0) --}}
                    <tr>
                      <th class="col-md-3">No hay datos disponibles</th>  
                    <tr>
                   {{-- @else    --}}
                   {{-- @foreach ($inventario as $item) --}}
                <tr>
                 
                </tr>
               
              </tbody>
        </table>
    </div>
</div>
    

<p class="subtitulo">Facturación</p>
<div class="card">
    <div class="card-body">
        <table class="table table-responsive">
            <thead  class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
                <tr>
                    <th class="col-md-1 p-1">N° </th>
                    <th class="col-md-1 p-1">Estado</th>
                    <th class="col-md-2 p-1">Total</th>
                    <th class="col-md-2 p-1">Creado por</th>
                    <th class="col-md-2 p-1">Creado en Fecha</th>
                </tr>
              </thead>
              <tbody class="table-bordered">
                  {{-- @if(count($inventario)<=0) --}}
                    <tr>
                      <th class="col-md-3">No hay datos disponibles</th>  
                    <tr>
                   {{-- @else    --}}
                   {{-- @foreach ($inventario as $item) --}}
                <tr>
                 
                </tr>
               
              </tbody>
        </table>
    </div>
</div>
    

{{-- <div>
  <input type="text" wire:model="name">
  
  Hi! My name is @php{{ $name }}@endphp
  </div>
  @php
  $name = "carlos"
@endphp --}}

@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
@stop
