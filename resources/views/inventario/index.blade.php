@extends('adminlte::page')

@section('content_header')
    <h1 align="center"><strong>INVENTARIO</strong></h1>
@stop

@section('content')

<style>
  body{
    font-family:Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol;
 }
 .tabla-general{
   font-size: 14px;
 }
 .input-group-text, .form-control{
   font-size: 14px;
   border-radius: 0%;
   padding:4px;
   height: 90%;
 }
</style>
<div class="d-flex">
    <div class="p-2">
        <a class="btn btn-primary" href="{{URL('inventario/excel')}}" role="button">Excel</a>
        <a class="btn btn-primary" href="{{URL('inventario/pdf')}}" role="button">PDF</a>
        <a class="btn btn-primary" href="{{URL('inventario/imprimirInventario')}}" role="button">Imprimir</a>
    </div>
    <div class="ml-auto p-2">
            <form class="form-inline" action="{{ url('inventario')}}" method="GET">
              
              <label for="">Busqueda Rápida</label>
              <div class="form-group mx-sm-3 mb-2">
                <input type="" class="form-control" id="busqueda" name="busqueda" value="{{$busqueda}}" placeholder="Modelo o número de serie">
              </div>
              <button type="submit" class="btn btn-primary mb-2">Buscar</button>
            </form>
    </div>
</div>
<div class="input-group">
  <div class="input-group-prepend">
    <div class="input-group-text" id="btnGroupAddon">Dispositivo de Rol</div>
    <select name="rol" id="rol" class="form-control">
          <option value="Todos">Todos</option>
          <option value="Paciente">Paciente</option>
          <option value="Donante">Donante</option>
          <option value="Datos">Datos</option>
    </select>
  </div>
  <div class="input-group-prepend">
    <div class="input-group-text" id="btnGroupAddon">Fabricante</div>
      {{-- <form class="form-inline" action="{{ url('inventario')}}" method="GET"> --}}
          <select name="manufactura" id="manufactura" class="form-control">
            <option value="Todos">Todos</option>
            <option value="Seagate">Seagate</option>
            <option value="Toshiba">Toshiba</option>
            <option value="Samsung">Samsung</option>
            <option value="Maxtor">Maxtor</option>
            <option value="Crucial">Crucial</option>
            <option value="Sony">Sony</option>
            <option value="Kingston">Kingston</option>
          </select>
        {{-- <button type="submit" class="btn btn-primary">Buscar</button> --}}
      {{-- </form> --}}
  </div>
  <div class="input-group-prepend">
    <div class="input-group-text" id="btnGroupAddon">Tipo</div>
      <select name="tipo" id="tipo" class="form-control">
        <option value="Todos">Todos</option>
        <option value="HDD">HDD</option>
      </select>
  </div>
<div class="input-group-prepend">
  <div class="input-group-text" id="btnGroupAddon">Factor de Forma</div>
    {{-- <form class="form-inline" action="{{ url('inventario')}}" method="GET"> --}}
        <select name="factor_de_forma" id="factor_de_forma" class="form-control">
          <option value="Todos">Todos</option>
          <option value="3.5 pulgadas">3.5 pulgadas</option>
          <option value="2.5 pulgadas">2.5 pulgadas</option>
          <option value="M2">M2</option>
        </select>
      {{-- <button type="submit" class="btn btn-primary">Buscar</button> --}}
    {{-- </form> --}}
</div>
<div class="input-group-prepend">
  <div class="input-group-text" id="btnGroupAddon">Activo</div>

<select name="ingeniero" id="ingeniero" class="form-control">
  <option value="">Todos</option>
  {{-- <option value="Alex">Alex</option>
  <option value="Fercho">Fercho</option>
  <option value="Javier">Javier</option> --}}
</select>
</div>
<div class="input-group-prepend">
  <div class="input-group-text" id="btnGroupAddon">Ocupado</div>

<select name="ingeniero" id="ingeniero" class="form-control">
  <option value="">Todos</option>
  {{-- <option value="Alex">Alex</option>
  <option value="Fercho">Fercho</option>
  <option value="Javier">Javier</option> --}}
</select>
</div>
<div class="input-group-prepend">
  <div class="input-group-text" id="btnGroupAddon">Recursos</div>

<select name="ingeniero" id="ingeniero" class="form-control">
  <option value="">Todos</option>
  {{-- <option value="Alex"></option>
  <option value="Fercho">Fercho</option>
  <option value="Javier">Javier</option> --}}
</select>
</div>
</div>

<!-- html agregado-->
{{-- <div class="col-5 ml-auto p-2" >
  <div class="input-group" align="center">
      <input type="text" class="form-control" id="texto" placeholder="Ingrese fabricante o factor de forma">
      <div class="input-group-append"><span class="input-group-text">Buscar</span></div>
  </div>
  <div id="resultados" class="bg-light border" style="background: rgb(109, 82, 49)"></div>
</div>
 <!--fin del html agregado-->
<div class="col-8" id="contenedor">
  @include('inventario.paginas')
</div>
<div id="cargando" hidden><h1>CARGANDO...</h1></div> --}}


{{-- <script>
  window.addEventListener("load",function(){
      document.getElementById("texto").addEventListener("keyup",function(){
      if((document.getElementById("texto").value.length)>=2)
          fetch(`/inventario/buscador?texto=${document.getElementById("texto").value}`,
                {method:'get'})
          .then(response => response.text())
          .then(html =>   { document.getElementById("resultados").innerHTML = html})
else
    document.getElementById("resultados").innerHTML = ""
    })
  });
</script> --}}



{{--Inicio tabla de los discos  --}}
<div class="tabla-general">
    <table class="table table-striped table-hover table-responsive" id="Table">
        <thead class="table-primary table-striped table-bordered text-white" >
        <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
            <tr>
                <th class="column1 text-center">Id</th>
                <th class="column2 text-center">Fabricante</th>
                <th class="column3 text-center p-2">Modelo</th>
                <th class="column4 text-center p-2">N° de Serie</th>
                <th class="column5 text-center p-2">Firmware</th>
                <th class="column6 text-center p-2">Capacidad</th>
                <th class="column6 text-center p-2">PBC</th>
                <th class="column6 text-center p-2">Ubicación</th>
                <th class="column6 text-center p-2">Factor de Forma</th>
                <th class="column6 text-center p-2">Nota</th>
                <th class="column6 text-center p-2">Cabezal</th>
                <th class="column6 text-center p-2">Inf. del Cabezal</th>
                <th class="column6 text-center p-2">Acciones</th>
            </tr>
          </thead>
          <tbody class="table-bordered" id="verInventario">
              <tr>

              </tr>
              {{-- @if(count($inventario)<=0)
                <tr>
                  <th>No Hay Resultados.</th>  
                <tr>
               @else   
               @foreach ($inventario as $item) --}}
            {{-- <tr>
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
              <td class="text-center" style="padding: 1px;">
                  <a href="{{url('inventario/editar',$item->id)}}">
                    <button class="btn btn-light-active btn-sm"  >
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                      </svg>
                    </button>
                  </a>
                  <a href="{{url('inventario/itemPdf',$item->id)}}">
                    <button class="btn btn-light-active btn-sm" >
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                        <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                      </svg>
                    </button>
                  </a>
                  <a href="{{url('inventario/imprimirItemPdf',$item->id)}}">
                  <button class="btn btn-light-active btn-sm"  >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                    <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                  </svg>
                  </button>
                </a>
                    

<button type="button" class="btn"  data-bs-toggle="modal" data-bs-target="#modal-delete-{{$item->id}}">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
</button>


<div class="modal fade" id="modal-delete-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{url('inventario',$item->id)}}" method="POST">
      @csrf
      @method('DELETE')
      <button class="btn" value="Eliminar">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="15" height="20">
          <path fill-rule="evenodd" d="M2.343 13.657A8 8 0 1113.657 2.343 8 8 0 012.343 13.657zM6.03 4.97a.75.75 0 00-1.06 1.06L6.94 8 4.97 9.97a.75.75 0 101.06 1.06L8 9.06l1.97 1.97a.75.75 0 101.06-1.06L9.06 8l1.97-1.97a.75.75 0 10-1.06-1.06L8 6.94 6.03 4.97z"></path>
        </svg>
      </button>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminación del Disco</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" align="center">
        ¿Realmente desea eliminar el registro :
        <br>
        <strong> {{$item->manufactura." | ".$item->modelo}} ? </strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Rechazar</button>
        <button class="btn btn-primary" value="Eliminar">
          Aceptar
        </button>
      </div>
    </div>
  </form>
  </div>
</div>

              
              </td>
            </tr>
            @endforeach
            @endif --}}
          </tbody>
    </table>

    

  </div>
  {{$inventario->links()}} 
{{-- Fin tabla de discos --}}

@endsection


@section('js')
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  

@stop
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
  //ver inventario
  $(document).ready(function() {

var url = "{{URL('verInventario')}}";
$.ajax({
    url: "/inventario/verInventario",
    type: "POST",
    data:{ 
        "_token": "{{ csrf_token() }}",
    },
    cache: false,
    dataType: 'json',
    success: function(dataResult){
        //console.log(dataResult);
        var resultData = dataResult.data;
        var bodyData = '';

        $.each(resultData,function(index,row){
            verInventario+="<tr>"
            verInventario+="<td>"+row.id+"</td>"
                        +"<td>"+row.manufactura+"</td><td>"+row.modelo+"</td><td>"+row.numero_de_serie+"</td>"
                        +"<td>"+row.firmware+"</td><td>"+row.capacidad+"</td><td>"+row.pbc+"</td>"
                        +"<td>"+row.ubicacion+"</td><td>"+row.factor_de_forma+"</td><td>"+row.nota+"</td>"
                        +"<td>"+row.cabecera+"</td><td>"+row.info_de_cabecera+"</td>"+
            +"<td class='eliminar'>"+  
              
                        "<button class='btn btn-primary'>"+
                            "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrows-move' viewBox='0 0 16 16'>"+
                                "<path fill-rule='evenodd' d='M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z'/>"+
                            "</svg>"+
                        "</button>"+
                  
                 
                            "<button class='btn btn-success'>"+
                                "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen' viewBox='0 0 16 16'>"+
                                    "<path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z'/>"+
                                "</svg>"+
                            "</button>"+
                
                
                        "<button class='btn btn-primary'>"+
                            "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-left-right' viewBox='0 0 16 16'>"+
                                "<path fill-rule='evenodd' d='M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z'/>"+
                            "</svg>"+
                        "</button>"+
                    
                        
                        "<button class='btn btn-danger' class='borrar' id='deletRow' name='deletRow'>"+
                            "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>"+
                                "<path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/>"+
                            "</svg>"+
                        "</button>"+
                        
            "</td>";
            verInventario+="</tr>";
            
        })
        $("#verInventario").append(verInventario);
    }
});

});


  //ver todo el inventario
//   $(document).ready(function(){
//         $("#rol").val('Todos'); 
//         $("#manufactura").val('Todos'); 
//         $("#tipo").val('Todos'); 
//         $("#factor_de_forma").val('Todos');
//         $('#Table > tbody').empty();
//           var tipo = document.getElementById("verInventario");
//           // var selectedTipo = tipo.options[tipo.selectedIndex].text;
//           $.ajax({
//               url: "/trabajo/verInventario",
//               type: "POST",
//               data: {
//                 "_token": "{{ csrf_token() }}",
//               },
//               cache: false,
//               dataType: 'json',
//               success: function (dataResult) {

//                 // var filas = dataResult.data.length;
                
//                 // if (filas > selectedTipo) {
//                 //   filas = selectedTipo;
//                 //   var cantidad = dataResult.data.length;
//                 //   var valor = factor(cantidad,selectedTipo);
                  
                  
//                 //   for (let index = 1; index <= valor; index++) {
//                 //     $("#nuevo"+index).remove();
//                 //   }
//                 //   for (let index = 1; index <= valor; index++) {
//                 //     if (index == 1) {
//                 //       $("ul li:last").before("<li id='nuevo"+index+"' class='page-item active'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
//                 //     } else {
//                 //       $("ul li:last").before("<li id='nuevo"+index+"' class='page-item'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
//                 //     }
                    
//                 //     //$("#addItem").append("<li class='page-item'><a class='page-link' href='http://localhost:8000/trabajos/"+index+"'>"+index+"</a></li>");
//                 //   }
//                 // }else{
//                 //   for (let index = 1; index <= valor; index++) {
//                 //     $("#nuevo"+index).remove();
//                 //   }
//                 //   $("ul li:last").before("<li id='nuevo1' class='page-item active' aria-current='page'><span class='page-link'>1</span></li>");
//                 // }


//                 // for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
//                 //   // var text = "";
//                   // if (dataResult.data[i].name != "Administrador") {
//                   //     text = dataResult.data[i].name;
//                   //   }else{
//                   //     text = " ";
//                   //   }
//                   var nuevafila= "<tr><td>" +
//                     "<div class='form-check'>"+
//                     "<input class='form-check-input' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
//                     "</div>"+
//                   "</td><td class='text-center'>" +
//                     dataResult.data[i].id + "</td><td>" +
//                     dataResult.data[i].manufactura  + "</td><td>" +
//                     dataResult.data[i].modelo  + "</td><td>" +
//                     dataResult.data[i].numero_de_serie  + "</td><td>" +
//                     dataResult.data[i].firmware  + "</td><td>" +
//                     dataResult.data[i].capacidad  + "</td><td>"+
//                     dataResult.data[i].pbc  + "</td><td>"+
//                     dataResult.data[i].ubicacion  + "</td><td>"+
//                     dataResult.data[i].factor_de_forma  + "</td><td>"+
//                     dataResult.data[i].nota + "</td><td>"+
//                     dataResult.data[i].cabecera  + "</td><td>"+
//                     dataResult.data[i].info_de_cabecera  + "</td><td>"+
//                     // text + "</td><td>" +
//                     //   '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
//                     //     '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
//                     //       '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
//                     //       '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
//                     //     '</svg>'+
//                     //   '</button>'+
//                     //   '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
//                     //     '<div class="modal-dialog" role="document">'+
//                     //       '<div class="modal-content">'+
//                     //         '<div class="modal-header">'+
//                     //           '<h5 class="modal-title" id="exampleModalLabel">Eliminar trabajo</h5>'+
//                     //           '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
//                     //             '<span aria-hidden="true">&times;</span>'+
//                     //           '</button>'+
//                     //         '</div>'+
//                     //         '<div class="modal-body">'+
//                     //         '¿Realmente Desea Borrar el trabajo?'+
//                     //         '</div>'+
//                     //         '<form action="{{url('/trabajo/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
//                     //           '@csrf'+
//                     //         ' @method('DELETE')'+
//                     //         '<div class="modal-footer">'+
//                     //           '<button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>'+
//                     //           '<button class="btn btn-primary" style="padding-left: 5px">'+
//                     //             'Aceptar'+
//                     //           '</button>'+
//                     //         '</div>'+
//                     //       '</form> '+
//                     //       '</div>'+
//                     //     '</div>'+
//                     // ' </div> '+
//                     "</td></tr>"
                    
//                   $("#myTable").append(nuevafila)
//                 // }
//                       //$("#datosTabla").append(datosTabla);
                      
//                       // var bloq = factor(cantidad,selectedTipo);
//                 if (bloq == 0) {
//                     $("#back").attr('class', 'page-item disabled');
//                     $("#next").attr('class', 'page-item disabled');
//                 }
                

//               }
//           });
//       });


//   //ver todos los datos con ajax con change
// // $(function(){

// // $("#verInventario").on('change',function(){
// //   $("#rol").val('Todos'); 
// //   $("#manufactura").val('Todos'); 
// //   $("#tipo").val('Todos'); 
// //   $("#factor_de_forma").val('Todos'); 
// //   $('#Table > tbody').empty();
// //     var tipo = document.getElementById("verInventario");
// //     var selectedTipo = tipo.options[tipo.selectedIndex].text;
// //     $.ajax({
// //         url: "/trabajo/verInventario",
// //         type: "POST",
// //         data: {
// //           "_token": "{{ csrf_token() }}",
// //         },
// //         cache: false,
// //         dataType: 'json',
// //         success: function (dataResult) {
          
// //           var filas = dataResult.data.length;
          
// //           if (filas > selectedTipo) {
// //             filas = selectedTipo;
// //             var cantidad = dataResult.data.length;
// //             var valor = factor(cantidad,selectedTipo);
            
            
// //             for (let index = 1; index <= 50; index++) {
// //               $("#nuevo"+index).remove();
// //             }
// //             for (let index = 1; index <= valor; index++) {
// //               if (index == 1) {
// //                 $("ul li:last").before("<li id='nuevo"+index+"' class='page-item active'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
// //               } else {
// //                 $("ul li:last").before("<li id='nuevo"+index+"' class='page-item'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
// //               }
              
// //                //$("#addItem").append("<li class='page-item'><a class='page-link' href='http://localhost:8000/trabajos/"+index+"'>"+index+"</a></li>");
// //             }
// //           }else{
// //             for (let index = 1; index <= 50; index++) {
// //               $("#nuevo"+index).remove();
// //             }
// //             $("ul li:last").before("<li id='nuevo1' class='page-item active' aria-current='page'><span class='page-link'>1</span></li>");
// //           }


// //           for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
// //             var text = "";
// //             if (dataResult.data[i].name != "Administrador") {
// //                 text = dataResult.data[i].name;
// //               }else{
// //                 text = " ";
// //               }
// //             var nuevafila= "<tr><td>" +
// //               "CHECK" + "</td><td class='text-center'>" +
// //               dataResult.data[i].id + "</td><td>" +
// //               dataResult.data[i].prioridad  + "</td><td>" +
// //               dataResult.data[i].nombreCliente  + "</td><td>" +
// //               dataResult.data[i].estado  + "</td><td>" +
// //               dataResult.data[i].informacion  + "</td><td>" +
// //               dataResult.data[i].datosImportantes  + "</td><td>"+
// //               text + "</td><td>" +
// //               dataResult.data[i].creado  + "</td><td>" +
// //               dataResult.data[i].created_at  + "</td><td class='text-center'>" +
// //                 '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
// //                   '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
// //                     '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
// //                     '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
// //                   '</svg>'+
// //                 '</button>'+
// //                 '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
// //                   '<div class="modal-dialog" role="document">'+
// //                     '<div class="modal-content">'+
// //                       '<div class="modal-header">'+
// //                         '<h5 class="modal-title" id="exampleModalLabel">Eliminar trabajo</h5>'+
// //                         '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
// //                           '<span aria-hidden="true">&times;</span>'+
// //                         '</button>'+
// //                       '</div>'+
// //                       '<div class="modal-body">'+
// //                       '¿Realmente Desea Borrar el trabajo?'+
// //                       '</div>'+
// //                       '<form action="{{url('/trabajo/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
// //                         '@csrf'+
// //                        ' @method('DELETE')'+
// //                       '<div class="modal-footer">'+
// //                         '<button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>'+
// //                         '<button class="btn btn-primary" style="padding-left: 5px">'+
// //                           'Aceptar'+
// //                         '</button>'+
// //                       '</div>'+
// //                     '</form> '+
// //                     '</div>'+
// //                   '</div>'+
// //                ' </div> '+
// //               "</td></tr>"
              
// //             $("#myTable").append(nuevafila)
// //           }
          
// //                 //$("#datosTabla").append(datosTabla);
// //             var bloq = factor(cantidad,selectedTipo);
// //             if (bloq == 0) {
// //               $("#back").attr('class', 'page-item disabled');
// //               $("#next").attr('class', 'page-item disabled');
// //             }else{
// //               $("#next").attr('class', 'page-item');
// //             }
// //             $("#siguiente").attr('onclick', 'redireccionar(2)');

// //         }
// //     });
// // });


  
    
// $("#ingeniero").on('change',function(){
//   $("#grado").val('todos'); 
//   $("#estado").val('todos'); 
//   $('#Table > tbody').empty();
//     var tipo = document.getElementById("ingeniero");
//     var selectedTipo = tipo.options[tipo.selectedIndex].text;
//     var ver = document.getElementById("ver");
//     var selectedVer = ver.options[ver.selectedIndex].text;
//     $.ajax({
//         url: "/trabajo/ingeniero",
//         type: "POST",
//         data: {
//           "_token": "{{ csrf_token() }}",
//             "orden": selectedTipo,
//         },
//         cache: false,
//         dataType: 'json',
//         success: function (dataResult) {
          
//           var filas = dataResult.data.length;
          
//           if (filas > selectedVer) {
//             filas = selectedVer;
//             var cantidad = dataResult.data.length;
//             var valor = factor(cantidad,selectedVer);
            
            
//             for (let index = 1; index <= 50; index++) {
//               $("#nuevo"+index).remove();
//             }
//             for (let index = 1; index <= valor; index++) {
//               if (index == 1) {
//                 $("ul li:last").before("<li id='nuevo"+index+"' class='page-item active'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
//               } else {
//                 $("ul li:last").before("<li id='nuevo"+index+"' class='page-item'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
//               }
              
//                //$("#addItem").append("<li class='page-item'><a class='page-link' href='http://localhost:8000/trabajos/"+index+"'>"+index+"</a></li>");
//             }
//           }else{
//             for (let index = 1; index <= 50; index++) {
//               $("#nuevo"+index).remove();
//             }
//             $("ul li:last").before("<li id='nuevo1' class='page-item active' aria-current='page'><span class='page-link'>1</span></li>");
//           }
//           //var filas = dataResult.data.length;
//           for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
//             var text = "";
//             if (dataResult.data[i].name != "Administrador") {
//                 text = dataResult.data[i].name;
//               }else{
//                 text = " ";
//               }
//             var nuevafila= "<tr><td>" +
//               "CHECK" + "</td><td class='text-center'>" +
//               dataResult.data[i].id + "</td><td>" +
//               dataResult.data[i].prioridad  + "</td><td>" +
//               dataResult.data[i].nombreCliente  + "</td><td>" +
//               dataResult.data[i].estado  + "</td><td>" +
//               dataResult.data[i].informacion  + "</td><td>" +
//               dataResult.data[i].datosImportantes  + "</td><td>"+
//               text + "</td><td>" +
//               dataResult.data[i].creado  + "</td><td>" +
//               dataResult.data[i].created_at  + "</td><td class='text-center'>" +
//                 '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
//                   '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
//                     '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
//                     '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
//                   '</svg>'+
//                 '</button>'+
//                 '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
//                   '<div class="modal-dialog" role="document">'+
//                     '<div class="modal-content">'+
//                       '<div class="modal-header">'+
//                         '<h5 class="modal-title" id="exampleModalLabel">Eliminar trabajo</h5>'+
//                         '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
//                           '<span aria-hidden="true">&times;</span>'+
//                         '</button>'+
//                       '</div>'+
//                       '<div class="modal-body">'+
//                       '¿Realmente Desea Borrar el trabajo?'+
//                       '</div>'+
//                       '<form action="{{url('/trabajo/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
//                         '@csrf'+
//                        ' @method('DELETE')'+
//                       '<div class="modal-footer">'+
//                         '<button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>'+
//                         '<button class="btn btn-primary" style="padding-left: 5px">'+
//                           'Aceptar'+
//                         '</button>'+
//                       '</div>'+
//                     '</form> '+
//                     '</div>'+
//                   '</div>'+
//                ' </div> '+
//               "</td></tr>"
              
//             $("#myTable").append(nuevafila)
//           }
//                 //$("#datosTabla").append(datosTabla);

//                 var bloq = factor(cantidad,selectedTipo);
//             if (bloq == 0) {
//               $("#back").attr('class', 'page-item disabled');
//               $("#next").attr('class', 'page-item disabled');
//             }else{
//               $("#next").attr('class', 'page-item');
//             }
//         }
//     });
// });



// $("#estado").on('change',function(){
//   $("#grado").val('todos');
//   $("#ingeniero").val('todos');
//   $('#Table > tbody').empty();
//     var tipo = document.getElementById("estado");
//     var selectedTipo = tipo.options[tipo.selectedIndex].text;
//     var ver = document.getElementById("ver");
//     var selectedVer = ver.options[ver.selectedIndex].text;
//     $.ajax({
//         url: "/trabajo/estado",
//         type: "POST",
//         data: {
//           "_token": "{{ csrf_token() }}",
//             "orden": selectedTipo,
//         },
//         cache: false,
//         dataType: 'json',
//         success: function (dataResult) {
          
//           var filas = dataResult.data.length;
          
//           if (filas > selectedVer) {
//             filas = selectedVer;
//             var cantidad = dataResult.data.length;
//             var valor = factor(cantidad,selectedVer);
            
            
//             for (let index = 1; index <= 50; index++) {
//               $("#nuevo"+index).remove();
//             }
//             for (let index = 1; index <= valor; index++) {
//               if (index == 1) {
//                 $("ul li:last").before("<li id='nuevo"+index+"' class='page-item active'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
//               } else {
//                 $("ul li:last").before("<li id='nuevo"+index+"' class='page-item'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
//               }
              
//                //$("#addItem").append("<li class='page-item'><a class='page-link' href='http://localhost:8000/trabajos/"+index+"'>"+index+"</a></li>");
//             }
//           }else{
//             for (let index = 1; index <= 50; index++) {
//               $("#nuevo"+index).remove();
//             }
//             $("ul li:last").before("<li id='nuevo1' class='page-item active' aria-current='page'><span class='page-link'>1</span></li>");
//           }

//           //var filas = dataResult.data.length;
//           for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
//             var text = "";
//             if (dataResult.data[i].name != "Administrador") {
//                 text = dataResult.data[i].name;
//               }else{
//                 text = " ";
//               }
//             var nuevafila= "<tr><td>" +
//               "CHECK" + "</td><td class='text-center'>" +
//               dataResult.data[i].id + "</td><td>" +
//               dataResult.data[i].prioridad  + "</td><td>" +
//               dataResult.data[i].nombreCliente  + "</td><td>" +
//               dataResult.data[i].estado  + "</td><td>" +
//               dataResult.data[i].informacion  + "</td><td>" +
//               dataResult.data[i].datosImportantes  + "</td><td>"+
//               text + "</td><td>" +
//               dataResult.data[i].creado  + "</td><td>" +
//               dataResult.data[i].created_at  + "</td><td class='text-center'>" +
//                 '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
//                   '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
//                     '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
//                     '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
//                   '</svg>'+
//                 '</button>'+
//                 '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
//                   '<div class="modal-dialog" role="document">'+
//                     '<div class="modal-content">'+
//                       '<div class="modal-header">'+
//                         '<h5 class="modal-title" id="exampleModalLabel">Eliminar trabajo</h5>'+
//                         '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
//                           '<span aria-hidden="true">&times;</span>'+
//                         '</button>'+
//                       '</div>'+
//                       '<div class="modal-body">'+
//                       '¿Realmente Desea Borrar el trabajo?'+
//                       '</div>'+
//                       '<form action="{{url('/trabajo/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
//                         '@csrf'+
//                        ' @method('DELETE')'+
//                       '<div class="modal-footer">'+
//                         '<button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>'+
//                         '<button class="btn btn-primary" style="padding-left: 5px">'+
//                           'Aceptar'+
//                         '</button>'+
//                       '</div>'+
//                     '</form> '+
//                     '</div>'+
//                   '</div>'+
//                ' </div> '+
//               "</td></tr>"
              
//             $("#myTable").append(nuevafila)
//           }
//                 //$("#datosTabla").append(datosTabla);
//                 var bloq = factor(cantidad,selectedTipo);
//             if (bloq == 0) {
//               $("#back").attr('class', 'page-item disabled');
//               $("#next").attr('class', 'page-item disabled');
//             }else{
//               $("#next").attr('class', 'page-item');
//             }

//         }
//     });
// });


// $("#grado").on('change',function(){
//   $("#estado").val('todos');
//   $("#ingeniero").val('todos');
//   $('#Table > tbody').empty();
//     var tipo = document.getElementById("grado");
//     var selectedTipo = tipo.options[tipo.selectedIndex].text;
//     var ver = document.getElementById("ver");
//     var selectedVer = ver.options[ver.selectedIndex].text;
//     $.ajax({
//         url: "/trabajo/prioridad",
//         type: "POST",
//         data: {
//           "_token": "{{ csrf_token() }}",
//             "orden": selectedTipo,
//         },
//         cache: false,
//         dataType: 'json',
//         success: function (dataResult) {
          
//           var filas = dataResult.data.length;
          
//           if (filas > selectedVer) {
//             filas = selectedVer;
//             var cantidad = dataResult.data.length;
//             var valor = factor(cantidad,selectedVer);
            
            
//             for (let index = 1; index <= 50; index++) {
//               $("#nuevo"+index).remove();
//             }
//             for (let index = 1; index <= valor; index++) {
//               if (index == 1) {
//                 $("ul li:last").before("<li id='nuevo"+index+"' class='page-item active'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
//               } else {
//                 $("ul li:last").before("<li id='nuevo"+index+"' class='page-item'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
//               }
              
//                //$("#addItem").append("<li class='page-item'><a class='page-link' href='http://localhost:8000/trabajos/"+index+"'>"+index+"</a></li>");
//             }
//           }else{
//             for (let index = 1; index <= 50; index++) {
//               $("#nuevo"+index).remove();
//             }
//             $("ul li:last").before("<li id='nuevo1' class='page-item active' aria-current='page'><span class='page-link'>1</span></li>");
//           }
          
//           //var filas = dataResult.data.length;
//           for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
//             var text = "";
//             if (dataResult.data[i].name != "Administrador") {
//                 text = dataResult.data[i].name;
//               }else{
//                 text = " ";
//               }
//             var nuevafila= "<tr><td>" +
//               "CHECK" + "</td><td class='text-center'>" +
//               dataResult.data[i].id + "</td><td>" +
//               dataResult.data[i].prioridad  + "</td><td>" +
//               dataResult.data[i].nombreCliente  + "</td><td>" +
//               dataResult.data[i].estado  + "</td><td>" +
//               dataResult.data[i].informacion  + "</td><td>" +
//               dataResult.data[i].datosImportantes  + "</td><td>"+
//               text + "</td><td>" +
//               dataResult.data[i].creado  + "</td><td>" +
//               dataResult.data[i].created_at  + "</td><td class='text-center'>" +
//                 '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
//                   '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
//                     '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
//                     '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
//                   '</svg>'+
//                 '</button>'+
//                 '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
//                   '<div class="modal-dialog" role="document">'+
//                     '<div class="modal-content">'+
//                       '<div class="modal-header">'+
//                         '<h5 class="modal-title" id="exampleModalLabel">Eliminar trabajo</h5>'+
//                         '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
//                           '<span aria-hidden="true">&times;</span>'+
//                         '</button>'+
//                       '</div>'+
//                       '<div class="modal-body">'+
//                       '¿Realmente Desea Borrar el trabajo?'+
//                       '</div>'+
//                       '<form action="{{url('/trabajo/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
//                         '@csrf'+
//                        ' @method('DELETE')'+
//                       '<div class="modal-footer">'+
//                         '<button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>'+
//                         '<button class="btn btn-primary" style="padding-left: 5px">'+
//                           'Aceptar'+
//                         '</button>'+
//                       '</div>'+
//                     '</form> '+
//                     '</div>'+
//                   '</div>'+
//                ' </div> '+
//               "</td></tr>"
              
//             $("#myTable").append(nuevafila)
//           }
//                 //$("#datosTabla").append(datosTabla);
//                 var bloq = factor(cantidad,selectedTipo);
//             if (bloq == 0) {
//               $("#back").attr('class', 'page-item disabled');
//               $("#next").attr('class', 'page-item disabled');
//             }else{
//               $("#next").attr('class', 'page-item');
//             }

//         }
//     });
// });




</script>
