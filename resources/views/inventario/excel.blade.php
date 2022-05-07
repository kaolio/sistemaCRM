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
          <th style="font-size:25px"><strong>REPORTE DE INVENTARIO</strong></th>
        </tr>
        <tr>
        </tr>
        <tr>
              <th class="sub" style="background-color:rgb(2, 117, 216);"><strong>ID</strong></th>
              <th class="sub"><strong>FABRICANTE</strong></th>
              <th class="sub"><strong>MODELO</strong></th>
              <th class="sub"><strong>NUMERO DE SERIE</strong></th>
              <th class="sub"><strong>FIRMWARE</strong></th>
              <th class="sub"><strong>CAPACIDAD (GB)</strong></th>
              <th class="sub"><strong>PBC</strong></th>
              <th class="sub"><strong>UBICACION</strong></th>
              <th class="sub"><strong>FACTOR DE FORMA</strong></th>
              <th class="sub"><strong>NOTA</strong></th>
              <th class="sub"><strong>CABEZAL</strong></th>
              <th class="sub"><strong>INF. DEL CABEZAL</strong></th>
        </tr>
        </thead>
        <tbody class="table-bordered">
            @if(count($inventario)<=0)
              <tr>
                <th>No Hay Resultados.</th>  
              <tr>
             @else   
             @foreach ($inventario as $item)
          <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{ $item->manufactura}}</td>
            <td>{{ $item->modelo}}</td>
            <td>{{ $item->numero_de_serie}}</td>
            <td>{{ $item->firmware}}</td>
            <td>{{ $item->capacidad}}</td>
            <td>{{ $item->pbc}}</td>
            <td>{{ $item->ubicacion}}</td>
            <td>{{ $item->factor_de_forma}}</td>
            <td>{{ $item->nota}}</td>
            <td>{{ $item->cabecera}}</td>
            <td>{{ $item->info_de_cabecera}}</td>

          </tr>
          @endforeach
          @endif
        </tbody>
  </table>

</div>