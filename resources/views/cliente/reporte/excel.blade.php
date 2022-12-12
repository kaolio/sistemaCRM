  <style>
    body{
      font-family:Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol;
  }
  .tabla-general{
    font-size: 14px;
  }
  .titulo{
    font-size:29px;
  }
  .sub{
    text-transform: uppercase;
  }
  </style>
{{--Inicio tabla de los discos  --}}

<div class="tabla-general">
  <table class="table table-striped table-hover table-responsive">
      <thead class="table-primary table-striped table-bordered text-white" >
      <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th style="font-size:25px"><strong>REPORTE ORDENES DE TRABAJO</strong></th>
        </tr>
        <tr>
        </tr>
        <tr>
            <th class="text-center">Nombre</th>
            <th class="text-center">VAT</th>
            <th class="text-center">Direccion</th>
            <th class="text-center">Numero</th>
            <th class="text-center">Apt</th>
            <th class="text-center">CodigoPostal</th>
            <th class="text-center">PAK</th>
            <th class="text-center">Ciudad</th>
            <th class="text-center">Pais</th>
            <th class="text-center">Idioma</th>
            <th class="text-center">Nota</th>
            <th class="text-center">Fecha</th>
        </tr>
        </thead>
        <tbody class="table-bordered">
            @if(count($cliente)<=0)
              <tr>
                <th>No Hay Resultados.</th>  
              <tr>
             @else   
             @foreach ($cliente as $cliente)
          <tr>
            <td >{{$cliente->nombreCliente}}</td>
                <td class="text-center">{{$cliente->vat}}</td>
                <td class="text-center">{{$cliente->calle}}</td>
                <td class="text-center">{{$cliente->numero}}</td>
                <td class="text-center">{{$cliente->apt}}</td>
                <td class="text-center">{{$cliente->codigoPostal}}</td>
                <td class="text-center">{{$cliente->pak}}</td>
                <td class="text-center">{{$cliente->nombreCiudad}}</td>
                <td class="text-center">{{$cliente->pais}}</td>
                <td class="text-center">{{$cliente->idioma}}</td>
                <td class="text-center">{{$cliente->nota}}</td>
                <td class="text-center">{{ $cliente->created_at}}</td>

          </tr>
          @endforeach
          @endif
        </tbody>
  </table>

</div>