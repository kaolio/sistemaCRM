<?php 
  $buscador = DB::table('inventarios')
  ->select('id','manufactura','modelo','numero_de_serie','firmware','capacidad','pbc','ubicacion','factor_de_forma','nota','cabecera','info_de_cabecera')
  ->where('id', 'LIKE',LOWER('%'.$_POST["buscar"].'%'))
  ->orWhere('modelo', 'LIKE',LOWER('%'.$_POST["buscar"].'%'))
  ->orWhere('numero_de_serie', 'LIKE',LOWER('%'.$_POST["buscar"].'%'))
  ->orWhere('capacidad', 'LIKE',LOWER('%'.$_POST["buscar"].'%'));
  $numero = mysql_num_rows($buscador);
?>

<?php while($resultado =  mysql_fetch_assoc($buscador)){ ?>

<div class="tabla-general">
  <table class="table table-striped table-hover table-responsive">
      <thead class="table-primary table-striped table-bordered text-white" >
      <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
          <tr>
              <th class="column1 text-center">Id</th>
              <th class="column2 text-center">Fabricante</th>
              <th class="column3 text-center p-2">Modelo</th>
              <th class="column4 text-center p-2">N° de Serie</th>
              <th class="column6 text-center p-2">Capacidad (GB)</th>
              <th class="column6 text-center p-2">Ubicación</th>
              <th class="column6 text-center p-2">Acciones</th>
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
            <td>{{ $item->capacidad}}</td>
            <td>{{ $item->ubicacion}}</td>
            <td></td>
          </tr>
          @endforeach
          @endif
        </tbody>
  </table>
</div>
<?php } ?>