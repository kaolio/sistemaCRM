@extends('adminlte::page')
@section('content')

 
  <!--?php 
  $orden = $_POST['orden'];
?> -->



<h1 align="center"><strong>ORDEN DE TRABAJO</strong></h1>
<div class="container">
  <div class="col-3">
    
    <div class="input-group md-2">
      <span class="input-group-text">NºOrden </span>
      <input class="form-control" id="orden" name="orden" autocomplete="off">
      <button  id="btnBuscar" name="btnBuscar" style="border-color: #ced4da;border-style: solid;" >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#007BFF" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
        </svg></button>           
  </div>
    
  </div>


<div class="d-flex">
  <div class="p-2">
    <button type="button" class="btn btn-primary">Excel</button>
    <a class="btn btn-primary" href="{{URL('trabajo/pdf')}}" role="button">PDF</a> 
    <button type="button" class="btn btn-primary">Imprimir</button>
  </div>
  <div class="ml-auto p-2">
    <form class="form-inline" action="{{ url('trabajos ')}}" method="GET">
      <label for="">Busqueda Rápida</label>
      <div class="form-group mx-sm-3 mb-2">
        <input type="" class="form-control" id="busqueda" name="busqueda" value="{{$busqueda}}" placeholder="Modelo o Serial">
      </div>
      <button type="submit" class="btn btn-primary mb-2">Buscar</button>
    </form>
  </div>
</div>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Prioridad</div>
                <select name="grado" id="grado" class="form-control">
                  <option value="todos">Todos</option>
                  <option value="normal">Normal</option>
                  <option value="alta">Alta</option>
                  <option value="urgente">Urgente</option>
                </select>
        </div>
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Estado</div>
          <select name="estado" id="estado" class="form-control">
            <option value="todos">Todos</option>
            <option value="recibido">Recibido</option>
            <option value="enProceso">En proceso</option>
            <option value="esperandoPiezas">Esperando Piezas</option>
            <option value="trabajoCompleto">Trabajo Completo</option>
            <option value="trabajoIncompleto">Trabajo Incompleto</option>
            <option value="pagado">Pagado</option>
            <option value="devueltoAlCliente">Devuelto al Cliente</option>
            <option value="pagoPendiente">Pago Pendiente</option>
            <option value="llegadaPendiente">Llegada Pendiente</option>
            <option value="pagadoRegresadoCliente">Pagado y regresado a Cliente</option>
          </select>
        </div>
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Ingeniero</div>
        
          <select name="ingeniero" id="ingeniero" class="form-control">
            <option value="">Todos los Ingenieros</option>
            @foreach ($rol as $rol)
              <option {{ old('categoria') == $rol->id ? "selected" : "" }} value="{{$rol->id}}">{{$rol->name}}</option>
            @endforeach
          </select>
        </div>
     </div>

    

  <div class="tabla-general">
<table class="table table-striped table-hover table-responsive" id="Table">
  <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
    <tr>
      <th>#</th>
      <th class="text-center">Orden de Trabajo</th>
      <th class="text-center">Prioridad</th>
      <th class="text-center">Cliente</th>
      <th class="text-center">Estado</th>
      <th class="text-center">Informacion</th>
      <th class="text-center">Ultima Nota</th>
      <th class="text-center">Asignado</th>
      <th class="text-center">Creado por</th>
      <th class="text-center">Fecha</th>
      <th class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody class="table-bordered" id="myTable">
    @if(count($trabajo)<=0)
      <tr>
        <th>No Hay Resultados.</th>  
      <tr>
     @else   
    @foreach ($trabajo as $trabajo)
      <tr>
        <td>check</td>
        <td class="text-center">{{$trabajo->id}}</td>
        <td class="text-center">{{$trabajo->prioridad}}</td>
        <td>{{$trabajo->nombreCliente}}</td>
        <td>{{$trabajo->estado}}</td>
        <td>{{$trabajo->informacion}}</td>
        <td>{{$trabajo->datosImportantes}}</td>
        <td>{{$trabajo->asignado}}</td>
        <td>{{$trabajo->creado}}</td>
        <td>{{$trabajo->created_at}}</td>
        <td class="text-center">

            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal{{$trabajo->id}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg>
            </button>
            <div class="modal fade" id="exampleModal{{$trabajo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar trabajo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                   ¿Realmente Desea Borrar el trabajo?
                  </div>
                  <form action="{{url('/trabajo/'.$trabajo->id)}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
                                   
                    <button class="btn btn-primary" style="padding-left: 5px">
                      Aceptar
                    </button>
                    
                  </div>
                </form> 
                </div>
              </div>
            </div>
          
        </td>  
      </tr>
      @endforeach 
      @endif 
  </tbody> 
</table>
</div>

</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
  $(function(){
    $("#ingeniero").on('change',function(){
      $('#Table > tbody').empty();
        var tipo = document.getElementById("ingeniero");
        var selectedTipo = tipo.options[tipo.selectedIndex].text;

        $.ajax({
            url: "/trabajo/ingeniero",
            type: "POST",
            data: {
              "_token": "{{ csrf_token() }}",
                "orden": selectedTipo,
            },
            cache: false,
            dataType: 'json',
            success: function (dataResult) {
              
              var filas = dataResult.data.length;
              for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
                var nuevafila= "<tr><td>" +
                  "CHECK" + "</td><td class='text-center'>" +
                  dataResult.data[i].id + "</td><td>" +
                  dataResult.data[i].prioridad  + "</td><td>" +
                  dataResult.data[i].nombreCliente  + "</td><td>" +
                  dataResult.data[i].estado  + "</td><td>" +
                  dataResult.data[i].informacion  + "</td><td>" +
                  dataResult.data[i].datosImportantes  + "</td><td>" +
                  dataResult.data[i].asignado  + "</td><td>" +
                  dataResult.data[i].creado  + "</td><td>" +
                  dataResult.data[i].created_at  + "</td><td class='text-center'>" +
                    '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                        '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                      '</svg>'+
                    '</button>'+
                    '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                      '<div class="modal-dialog" role="document">'+
                        '<div class="modal-content">'+
                          '<div class="modal-header">'+
                            '<h5 class="modal-title" id="exampleModalLabel">Eliminar trabajo</h5>'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                              '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                          '</div>'+
                          '<div class="modal-body">'+
                          '¿Realmente Desea Borrar el trabajo?'+
                          '</div>'+
                          '<form action="{{url('/trabajo/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                            '@csrf'+
                           ' @method('DELETE')'+
                          '<div class="modal-footer">'+
                            '<button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>'+
                            '<button class="btn btn-primary" style="padding-left: 5px">'+
                              'Aceptar'+
                            '</button>'+
                          '</div>'+
                        '</form> '+
                        '</div>'+
                      '</div>'+
                   ' </div> '+
                  "</td></tr>"
                  
                $("#myTable").append(nuevafila)
              }
                    //$("#datosTabla").append(datosTabla);

            }
        });
    });

    

    $("#estado").on('change',function(){
      $('#Table > tbody').empty();
        var tipo = document.getElementById("estado");
        var selectedTipo = tipo.options[tipo.selectedIndex].text;

        $.ajax({
            url: "/trabajo/estado",
            type: "POST",
            data: {
              "_token": "{{ csrf_token() }}",
                "orden": selectedTipo,
            },
            cache: false,
            dataType: 'json',
            success: function (dataResult) {
              
              var filas = dataResult.data.length;
              for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
                var nuevafila= "<tr><td>" +
                  "CHECK" + "</td><td class='text-center'>" +
                  dataResult.data[i].id + "</td><td>" +
                  dataResult.data[i].prioridad  + "</td><td>" +
                  dataResult.data[i].nombreCliente  + "</td><td>" +
                  dataResult.data[i].estado  + "</td><td>" +
                  dataResult.data[i].informacion  + "</td><td>" +
                  dataResult.data[i].datosImportantes  + "</td><td>" +
                  dataResult.data[i].asignado  + "</td><td>" +
                  dataResult.data[i].creado  + "</td><td>" +
                  dataResult.data[i].created_at  + "</td><td class='text-center'>" +
                    '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                        '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                      '</svg>'+
                    '</button>'+
                    '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                      '<div class="modal-dialog" role="document">'+
                        '<div class="modal-content">'+
                          '<div class="modal-header">'+
                            '<h5 class="modal-title" id="exampleModalLabel">Eliminar trabajo</h5>'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                              '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                          '</div>'+
                          '<div class="modal-body">'+
                          '¿Realmente Desea Borrar el trabajo?'+
                          '</div>'+
                          '<form action="{{url('/trabajo/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                            '@csrf'+
                           ' @method('DELETE')'+
                          '<div class="modal-footer">'+
                            '<button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>'+
                            '<button class="btn btn-primary" style="padding-left: 5px">'+
                              'Aceptar'+
                            '</button>'+
                          '</div>'+
                        '</form> '+
                        '</div>'+
                      '</div>'+
                   ' </div> '+
                  "</td></tr>"
                  
                $("#myTable").append(nuevafila)
              }
                    //$("#datosTabla").append(datosTabla);

            }
        });
    });


    $("#grado").on('change',function(){
      $('#Table > tbody').empty();
        var tipo = document.getElementById("grado");
        var selectedTipo = tipo.options[tipo.selectedIndex].text;

        $.ajax({
            url: "/trabajo/prioridad",
            type: "POST",
            data: {
              "_token": "{{ csrf_token() }}",
                "orden": selectedTipo,
            },
            cache: false,
            dataType: 'json',
            success: function (dataResult) {
              
              var filas = dataResult.data.length;
              for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
                var nuevafila= "<tr><td>" +
                  "CHECK" + "</td><td class='text-center'>" +
                  dataResult.data[i].id + "</td><td>" +
                  dataResult.data[i].prioridad  + "</td><td>" +
                  dataResult.data[i].nombreCliente  + "</td><td>" +
                  dataResult.data[i].estado  + "</td><td>" +
                  dataResult.data[i].informacion  + "</td><td>" +
                  dataResult.data[i].datosImportantes  + "</td><td>" +
                  dataResult.data[i].asignado  + "</td><td>" +
                  dataResult.data[i].creado  + "</td><td>" +
                  dataResult.data[i].created_at  + "</td><td class='text-center'>" +
                    '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                        '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                      '</svg>'+
                    '</button>'+
                    '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                      '<div class="modal-dialog" role="document">'+
                        '<div class="modal-content">'+
                          '<div class="modal-header">'+
                            '<h5 class="modal-title" id="exampleModalLabel">Eliminar trabajo</h5>'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                              '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                          '</div>'+
                          '<div class="modal-body">'+
                          '¿Realmente Desea Borrar el trabajo?'+
                          '</div>'+
                          '<form action="{{url('/trabajo/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                            '@csrf'+
                           ' @method('DELETE')'+
                          '<div class="modal-footer">'+
                            '<button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>'+
                            '<button class="btn btn-primary" style="padding-left: 5px">'+
                              'Aceptar'+
                            '</button>'+
                          '</div>'+
                        '</form> '+
                        '</div>'+
                      '</div>'+
                   ' </div> '+
                  "</td></tr>"
                  
                $("#myTable").append(nuevafila)
              }
                    //$("#datosTabla").append(datosTabla);

            }
        });
    });

    
    $('#btnBuscar').on('click', function () {

        var url = document.getElementById('orden').value;

          $.ajax({
            type: "POST",
            url: "/trabajos/detalle",
            data: {
              "_token": "{{ csrf_token() }}",
                orden: url,
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                    var myJSON = JSON.stringify(data);
                    console.log(myJSON);
              window.location.href=data['data'];
            }
          });
      
    });

  

  });
    
  
</script>


@endsection
