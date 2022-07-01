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
              <th class="sub"><strong>N° DE ORDEN</strong></th>
              <th class="sub"><strong>PRIORIDAD</strong></th>
              <th class="sub"><strong>NOMBRE DE CLIENTE</strong></th>
              <th class="sub"><strong>ESTADO</strong></th>
              <th class="sub"><strong>INFORMACION</strong></th>
              <th class="sub"><strong>DATOS IMPORTANTES</strong></th>
              <th class="sub"><strong>ASIGNADO</strong></th>
              <th class="sub"><strong>CREADO</strong></th>
              <th class="sub"><strong>FECHA</strong></th>
        </tr>
        </thead>
        <tbody class="table-bordered">
            @if(count($trabajo)<=0)
              <tr>
                <th>No Hay Resultados.</th>  
              <tr>
             @else   
             @foreach ($trabajo as $item)
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{ $item->prioridad}}</td>
            <td>{{ $item->nombreCliente}}</td>
            <td>{{ $item->estado}}</td>
            <td>{{ $item->informacion}}</td>
            <td>{{ $item->datosImportantes}}</td>
            <td>{{ $item->name}}</td>
            <td>{{ $item->creado}}</td>
            <td>{{ $item->created_at}}</td>

          </tr>
          @endforeach
          @endif
        </tbody>
  </table>

</div>