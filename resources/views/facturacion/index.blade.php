@extends('adminlte::page')
@section('content')

<style>
   .tabla-general{
   font-size: 14px;
 }
  .btn{
    /* box-shadow: 2px 2px 2px rgb(95, 93, 93); */
    transform: translateY(0px);
  }
  .btn:active {
  transform: translateY(6px);
  /* transform: translateX(6px); */
}
  body{
    font-family:Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol;
 }
</style>
<script>
  //VER LISTA DE FACTURAS
  // $(document).ready(function() {

// var url = "{{URL('datosFacturas')}}";
//     $.ajax({
//         url: "/facturacion",
//         type: "POST",
//         data:{ 
//         },
//         cache: false,
//         dataType: 'json',
//         success: function(dataResult){
//         //console.log(dataResult);
//             var resultData = dataResult.data;
//             var bodyData = '';

//             $.each(resultData,function(index,row){
//                 datosFacturas+="<tr>"
//                 datosFacturas+="<td>"+row.id+"</td><td>"+row.estado+"</td><td>"+row.servicio+"</td><td>"+row.precio+"</td>"
//                 +"<td>"+row.partes+"</td><td>"+row.iva+"</td><td>"+row.total+"</td><td>";
//                 datosFacturas+="</tr>";
                
//             })
//             $("#datosFacturas").append(datosFacturas);
//         }
//     });
// });



 //lista de otros dispositivos en: dispositivos-de-trabajo/tabla otros disp. del cliente 
 $(document).ready(function() {

var url = "{{URL('datosFacturas')}}";
$.ajax({
    url: "/facturacion/verFacturas",
    type: "POST",
    cache: false,
    dataType: 'json',
    success: function(dataResult){
        //console.log(dataResult);
        var resultData = dataResult.data;
        var bodyData = '';

        $.each(resultData,function(index,row){
            datosFacturas+="<tr>"
            datosFacturas+="<td>"+"<input type='checkbox'>"+"</td>"+"<td name='tipo[]' id=''>"+row.id+"</td><td name='fabricante[]' id=''>"+row.total+"</td><td name='modelo[]' id=''>"+row.iva+"</td>"
            +"<td name='serial[]' id=''>"+row.serial+"</td><td name='localizacion[]' id=''>"+row.localizacion+"<td></td>"+
            "<td class='eliminar'>"+  
              
                                       
            "</td>";
            datosOtrosDispositivos+="</tr>";
            
        })
        $("#datosOtrosDispositivos").append(datosOtrosDispositivos);
    }
});

});

</script>


<h1 align="center"><strong>FACTURAS</strong></h1>
<div class="card">
  <div class="card-body">
      <table class="table table-responsive">
          <thead  class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
              <tr>
                  <th class="col-md-1 p-1">N° </th>
                  <th class="col-md-1 p-1">Estado</th>
                  <th class="col-md-2 p-1">Nombre Cliente</th>
                  <th class="col-md-2 p-1">Total</th>
                  <th class="col-md-2 p-1">Creado en Fecha</th>
                  <th class="col-md-2 p-1">Creado Por</th>
              </tr>
            </thead>
            <tbody class="table-bordered">
                {{-- @if(count($facturacion)<=0) --}}
                  <tr>
                    <th class="col-md-3">No hay datos disponibles</th>  
                  <tr>
                 {{-- @else  --}}
                   
                 {{-- @foreach ($inventario as $item) --}}
              <tr id="datosFacturas">
               
              </tr>
              {{-- @endif --}}
             
            </tbody>
      </table>
  </div>
</div>

@endsection
