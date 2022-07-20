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
      <input class="form-control required" id="orden" name="orden" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
      <button  id="btnBuscar" name="btnBuscar" disabled style="border-color: #ced4da;border-style: solid;" >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#007BFF" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
        </svg></button>           
  </div>
    
  </div>
  <div class="d-flex">
    <div class="p-2">
      <button class="btn btn-warning text-white" onclick="imprimirPDF()" disabled id="ordenImprimir">Generar Orden</button>
      <!-- Button trigger modal 2-->
      <button type="button" class="btn btn-primary text-white" id="modal2" disabled data-toggle="modal" data-target="#example2">Cambiar Prioridad</button>
      <!-- Button trigger modal 3-->
      <button type="button" class="btn btn-primary text-white" id="modal3" disabled  data-toggle="modal" data-target="#example3">Cambiar Estado</button>
      <!-- Button trigger modal 4-->
      <button type="button" class="btn text-white"  style="background: red" id="modal4" disabled  data-toggle="modal" data-target="#example4">Eliminar</button>
    </div>
  </div>


    <!-- Modal 2-->
    <div class="modal fade" id="example2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100">Cambiar Prioridad</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="input-group-prepend col-10">
                <div class="input-group-text">Prioridad</div>
                      <select name="prio" id="prio" class="form-control" >
                        <option selected disabled value="new">Seleccione una prioridad</option>
                        <option value="normal">Normal</option>
                        <option value="alta">Alta</option>
                        <option value="urgente">Urgente</option>
                      </select>
              </div>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-success" onclick="cambiarPrioridad()">Guardar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 3-->
    <div class="modal fade" id="example3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100">Cambiar Estado</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="input-group-prepend col-10">
                <div class="input-group-text">Estado</div>
                      <select name="est" id="est" class="form-control" >
                        <option selected disabled value="new">Seleccione un Estado</option>
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
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-success" onclick="cambiarEstado()">Guardar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 4-->
    <div class="modal fade" id="example4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5 class="text-center">¿Esta seguro de eliminar estos registros?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
            <button type="button" class="btn btn-primary" onclick="eliminarVarios()">Aceptar</button>
          </div>
        </div>
      </div>
    </div>


  <div class="d-flex">
    <div class="p-1">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">Ver</div>
                <select name="ver" id="ver" class="form-control">
                  @for ($i = 10; $i <= 30; $i++)
                      <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
        </div>
     </div>
    </div>
  </div>
  
  

<div class="d-flex">
  <div class="p-2">
    <a type="button" class="btn text-white" href="{{URL('trabajo/excel')}}" style="background: rgb(20, 141, 9)">Excel</a>
    <a class="btn btn-danger" href="{{URL('trabajo/pdf')}}" role="button">PDF</a> 
    <a type="button" href="{{URL('trabajo/imprimirIndex')}}" class="btn btn-primary">Imprimir</a>
  </div>
  
  <div class="ml-auto p-2">
    <div class="input-group md-2">
      <span class="input-group-text">Busqueda Rapida </span>
      <input class="form-control" id="busqueda" placeholder="Orden, Cliente, Informacion" name="busqueda" autocomplete="off">
      <button  id="btnBusqueda" name="btnBusqueda" style="border-color: #ced4da;border-style: solid;" >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#007BFF" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></button>           
  </div>        
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
            <option value="todos">Todos los Ingenieros</option>
            @foreach ($rol as $rol)
              <option {{ old('categoria') == $rol->id ? "selected" : "" }} value="{{$rol->id}}">{{$rol->name}}</option>
            @endforeach
          </select>
        </div>
     </div>

     
     @include('trabajo.table')


     <ul class="pagination">
      <li class="page-item disabled" id="back"><a id="anterior" aria-hidden="true" class="page-link" onclick="" rel="next" aria-label="« Anterior">‹</a></li>
      <li class="page-item" id="next"><a id="siguiente" class="page-link" onclick="redireccionar(2)" rel="next" aria-label="Siguiente »">›</a></li>
      </ul>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>

  function habilitarModal(){
    const value =  $("input:checkbox:checked").attr('id');

    const arr = value || [];

    const result = arr?.length;

    if(result != 0){
      $("#ordenImprimir").prop('disabled', false);
      $("#modal2").prop('disabled', false);
      $("#modal3").prop('disabled', false);
      $("#modal4").prop('disabled', false);
    }else{
      $("#ordenImprimir").prop('disabled', true);
      $("#modal2").prop('disabled', true);
      $("#modal3").prop('disabled', true);
      $("#modal4").prop('disabled', true);
    }
  }

  function imprimirPDF(){
    var seleccionados = $("input:checkbox:checked");
    var arreglo = [];
    $(seleccionados).each(function() {
      arreglo.push($(this).attr('id'));
    });
        $("#grado").val('todos'); 
        $("#estado").val('todos'); 
        $("#ingeniero").val('todos');

        $.ajax({
              url: "/trabajo/imprimir",
              type: "POST",
              data: {
                "_token": "{{ csrf_token() }}",
                'arreglo':arreglo,
              },
              cache: false,
              dataType: 'json',
              success: function (dataResult) {
              }
          });

  }

  function eliminarVarios(){
    var seleccionados = $("input:checkbox:checked");
    var arreglo = [];
    $(seleccionados).each(function() {
      arreglo.push($(this).attr('id'));
    });
        $("#grado").val('todos'); 
        $("#estado").val('todos'); 
        $("#ingeniero").val('todos'); 
        $('#Table > tbody').empty();
          var tipo = document.getElementById("ver");
          var selectedTipo = tipo.options[tipo.selectedIndex].text;
          console.log(arreglo);
          $.ajax({
              url: "/trabajo/eliminarVarios",
              type: "POST",
              data: {
                "_token": "{{ csrf_token() }}",
                'arreglo':arreglo,
              },
              cache: false,
              dataType: 'json',
              success: function (dataResult) {
                console.log(dataResult);
                var filas = dataResult.data.length;
                  
                if (filas > selectedTipo) {
                  filas = selectedTipo;
                  var cantidad = dataResult.data.length;
                  var valor = factor(cantidad,selectedTipo);

                  for (let index = 1; index <= valor; index++) {
                    $("#nuevo"+index).remove();
                  }
                  for (let index = 1; index <= valor; index++) {
                    if (index == 1) {
                      $("ul li:last").before("<li id='nuevo"+index+"' class='page-item active'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                    } else {
                      $("ul li:last").before("<li id='nuevo"+index+"' class='page-item'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                    }
                    
                    //$("#addItem").append("<li class='page-item'><a class='page-link' href='http://localhost:8000/trabajos/"+index+"'>"+index+"</a></li>");
                  }
                }else{
                    $("#nuevo1").remove();
                  $("ul li:last").before("<li id='nuevo1' class='page-item active' aria-current='page'><span class='page-link'>1</span></li>");
                }


                for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
                  var text = "";
                  var aux1 = "";
                  var aux2 = "";
                  if (dataResult.data[i].informacion != null) {
                    aux1 = dataResult.data[i].informacion;
                  }
                  if (dataResult.data[i].datosImportantes != null) {
                    aux2 = dataResult.data[i].datosImportantes;
                  }
                  if (dataResult.data[i].name != "Administrador") {
                      text = dataResult.data[i].name;
                    }else{
                      text = " ";
                    }
                  var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                  "</td><td class='text-center'>" +
                    dataResult.data[i].id + "</td><td>" +
                    dataResult.data[i].prioridad  + "</td><td>" +
                    dataResult.data[i].nombreCliente  + "</td><td>" +
                    dataResult.data[i].estado  + "</td><td>" +
                    aux1  + "</td><td>" +
                    aux2  + "</td><td>"+
                    text + "</td><td>" +
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
                $('#example4').modal('hide');
                $('#est').val('new');
                      //$("#datosTabla").append(datosTabla);
                      
                      var bloq = factor(cantidad,selectedTipo);
                if (bloq == 0) {
                    $("#back").attr('class', 'page-item disabled');
                    $("#next").attr('class', 'page-item disabled');
                }
                $("#ordenImprimir").prop('disabled', true);
                $("#modal2").prop('disabled', true);
                $("#modal3").prop('disabled', true);
                $("#modal4").prop('disabled', true);
              }
          });
  }

  function cambiarEstado(){
    var seleccionados = $("input:checkbox:checked");
    var arreglo = [];
    $(seleccionados).each(function() {
      arreglo.push($(this).attr('id'));
    });
        $("#grado").val('todos'); 
        $("#estado").val('todos'); 
        $("#ingeniero").val('todos'); 
        $('#Table > tbody').empty();
          var tipo = document.getElementById("ver");
          var selectedTipo = tipo.options[tipo.selectedIndex].text;
          var prio = document.getElementById("est");
          var selectedPrio = prio.options[prio.selectedIndex].text;
          console.log(arreglo);
          $.ajax({
              url: "/trabajo/cambioEstado",
              type: "POST",
              data: {
                "_token": "{{ csrf_token() }}",
                'arreglo':arreglo,
                'seleccionado':selectedPrio,
              },
              cache: false,
              dataType: 'json',
              success: function (dataResult) {
                console.log(dataResult);
                var filas = dataResult.data.length;
                  
                if (filas > selectedTipo) {
                  filas = selectedTipo;
                  var cantidad = dataResult.data.length;
                  var valor = factor(cantidad,selectedTipo);

                  for (let index = 1; index <= valor; index++) {
                    $("#nuevo"+index).remove();
                  }
                  for (let index = 1; index <= valor; index++) {
                    if (index == 1) {
                      $("ul li:last").before("<li id='nuevo"+index+"' class='page-item active'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                    } else {
                      $("ul li:last").before("<li id='nuevo"+index+"' class='page-item'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                    }
                    
                    //$("#addItem").append("<li class='page-item'><a class='page-link' href='http://localhost:8000/trabajos/"+index+"'>"+index+"</a></li>");
                  }
                }else{
                    $("#nuevo1").remove();
                  $("ul li:last").before("<li id='nuevo1' class='page-item active' aria-current='page'><span class='page-link'>1</span></li>");
                }


                for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
                  var text = "";
                  var aux1 = "";
                  var aux2 = "";
                  if (dataResult.data[i].informacion != null) {
                    aux1 = dataResult.data[i].informacion;
                  }
                  if (dataResult.data[i].datosImportantes != null) {
                    aux2 = dataResult.data[i].datosImportantes;
                  }
                  if (dataResult.data[i].name != "Administrador") {
                      text = dataResult.data[i].name;
                    }else{
                      text = " ";
                    }
                  var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                  "</td><td class='text-center'>" +
                    dataResult.data[i].id + "</td><td>" +
                    dataResult.data[i].prioridad  + "</td><td>" +
                    dataResult.data[i].nombreCliente  + "</td><td>" +
                    dataResult.data[i].estado  + "</td><td>" +
                    aux1  + "</td><td>" +
                    aux2  + "</td><td>"+
                    text + "</td><td>" +
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
                $('#example3').modal('hide');
                $('#est').val('new');
                      //$("#datosTabla").append(datosTabla);
                      
                      var bloq = factor(cantidad,selectedTipo);
                if (bloq == 0) {
                    $("#back").attr('class', 'page-item disabled');
                    $("#next").attr('class', 'page-item disabled');
                }
                $("#ordenImprimir").prop('disabled', true);
                $("#modal2").prop('disabled', true);
                $("#modal3").prop('disabled', true);
                $("#modal4").prop('disabled', true);
              }
          });
  }

  function cambiarPrioridad(){
    var seleccionados = $("input:checkbox:checked");
    var arreglo = [];
    $(seleccionados).each(function() {
      arreglo.push($(this).attr('id'));
    });
        $("#grado").val('todos'); 
        $("#estado").val('todos'); 
        $("#ingeniero").val('todos'); 
        $('#Table > tbody').empty();
          var tipo = document.getElementById("ver");
          var selectedTipo = tipo.options[tipo.selectedIndex].text;
          var prio = document.getElementById("prio");
          var selectedPrio = prio.options[prio.selectedIndex].text;
          console.log(arreglo);
          $.ajax({
              url: "/trabajo/cambioPrioridad",
              type: "POST",
              data: {
                "_token": "{{ csrf_token() }}",
                'arreglo':arreglo,
                'seleccionado':selectedPrio,
              },
              cache: false,
              dataType: 'json',
              success: function (dataResult) {
                console.log(dataResult);
                var filas = dataResult.data.length;
                  
                if (filas > selectedTipo) {
                  filas = selectedTipo;
                  var cantidad = dataResult.data.length;
                  var valor = factor(cantidad,selectedTipo);

                  for (let index = 1; index <= valor; index++) {
                    $("#nuevo"+index).remove();
                  }
                  for (let index = 1; index <= valor; index++) {
                    if (index == 1) {
                      $("ul li:last").before("<li id='nuevo"+index+"' class='page-item active'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                    } else {
                      $("ul li:last").before("<li id='nuevo"+index+"' class='page-item'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                    }
                    
                    //$("#addItem").append("<li class='page-item'><a class='page-link' href='http://localhost:8000/trabajos/"+index+"'>"+index+"</a></li>");
                  }
                }else{
                    $("#nuevo1").remove();
                  $("ul li:last").before("<li id='nuevo1' class='page-item active' aria-current='page'><span class='page-link'>1</span></li>");
                }


                for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
                  var text = "";
                  var aux1 = "";
                  var aux2 = "";
                  if (dataResult.data[i].informacion != null) {
                    aux1 = dataResult.data[i].informacion;
                  }
                  if (dataResult.data[i].datosImportantes != null) {
                    aux2 = dataResult.data[i].datosImportantes;
                  }
                  if (dataResult.data[i].name != "Administrador") {
                      text = dataResult.data[i].name;
                    }else{
                      text = " ";
                    }
                  var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                  "</td><td class='text-center'>" +
                    dataResult.data[i].id + "</td><td>" +
                    dataResult.data[i].prioridad  + "</td><td>" +
                    dataResult.data[i].nombreCliente  + "</td><td>" +
                    dataResult.data[i].estado  + "</td><td>" +
                    aux1  + "</td><td>" +
                    aux2  + "</td><td>"+
                    text + "</td><td>" +
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
                $('#example2').modal('hide');
                $('#prio').val('new');
                      //$("#datosTabla").append(datosTabla);
                      
                      var bloq = factor(cantidad,selectedTipo);
                if (bloq == 0) {
                    $("#back").attr('class', 'page-item disabled');
                    $("#next").attr('class', 'page-item disabled');
                }
                $("#ordenImprimir").prop('disabled', true);
                $("#modal2").prop('disabled', true);
                $("#modal3").prop('disabled', true);
                $("#modal4").prop('disabled', true);
              }
          });
  }


  function buscarFinal(datos,select,cantidad){
    var res = datos * select;
    console.log(res);
    return res;
  }

  function buscarInicio(final,select){
    var res = parseFloat(final)-parseFloat(select);
    return res;
    console.log(res);
  }

  function redireccionar(datos){
      //$("#ingeniero").val('todos');
      //$("#grado").val('todos'); 
      //$("#estado").val('todos'); 
      $('#Table > tbody').empty();
        var ing = document.getElementById("ingeniero");
        var selectedIng = ing.options[ing.selectedIndex].text;
        var gra = document.getElementById("grado");
        var selectedGra = gra.options[gra.selectedIndex].text;
        var est = document.getElementById("estado");
        var selectedEst = est.options[est.selectedIndex].text;
        var ver = document.getElementById("ver");
        var selectedVer = ver.options[ver.selectedIndex].text;
        $.ajax({
            url: "/trabajo/redireccionar",
            type: "POST",
            data: {
              "_token": "{{ csrf_token() }}",
              "ingeniero": selectedIng,
              "grado": selectedGra,
              "estado": selectedEst,
            },
            cache: false,
            dataType: 'json',
            success: function (dataResult) {
              var cantidad = dataResult.data.length;
              var valor = factor(cantidad,selectedVer);
              var final  = buscarFinal(datos,selectedVer,cantidad);//parseFloat(selectedVer)+parseFloat(selectedVer);
              var inicio = buscarInicio(final,selectedVer); //parseFloat(final)-parseFloat(selectedVer);
                if (final>cantidad) {
                  final = final-1;
                }
              for (  i = inicio ; i < final; i++){ //cuenta la cantidad de registros
                var text = "";
                  var aux1 = "";
                  var aux2 = "";
                  if (dataResult.data[i].informacion != null) {
                    aux1 = dataResult.data[i].informacion;
                  }
                  if (dataResult.data[i].datosImportantes != null) {
                    aux2 = dataResult.data[i].datosImportantes;
                  }
                  if (dataResult.data[i].name != "Administrador") {
                      text = dataResult.data[i].name;
                    }else{
                      text = " ";
                    }
                  var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                  "</td><td class='text-center'>" +
                    dataResult.data[i].id + "</td><td>" +
                    dataResult.data[i].prioridad  + "</td><td>" +
                    dataResult.data[i].nombreCliente  + "</td><td>" +
                    dataResult.data[i].estado  + "</td><td>" +
                    aux1  + "</td><td>" +
                    aux2  + "</td><td>"+
                    text + "</td><td>" +
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
              for (let i = 1; i <= valor; i++) {
                $("#nuevo"+i).attr('class', 'page-item');
              }
              var num = datos+1;
              var res = datos-1;
              $("#nuevo"+datos).attr('class', 'page-item active');
              $("#siguiente").attr('onclick', 'redireccionar('+num+')');
              $("#anterior").attr('onclick', 'redireccionar('+res+')');
              if (datos == valor) {
                $("#next").attr('class', 'page-item disabled');
              }else{
                $("#next").attr('class', 'page-item');
              }
              if (datos == 1) {
                $("#back").attr('class', 'page-item disabled');
              } else {
                $("#back").attr('class', 'page-item');  
              }
                            
            }
        });
  }

  function factor(filas,select) {
    var count = 0;
    var res = filas;
    while (res > 0) {
      res = filas - select;
      filas = res;
      count = count+1;
    }
    return count;
  }
  
  $(document).ready(function(){
        $("#grado").val('todos'); 
        $("#estado").val('todos'); 
        $("#ingeniero").val('todos'); 
        $('#Table > tbody').empty();
          var tipo = document.getElementById("ver");
          var selectedTipo = tipo.options[tipo.selectedIndex].text;
          $.ajax({
              url: "/trabajo/ver",
              type: "POST",
              data: {
                "_token": "{{ csrf_token() }}",
              },
              cache: false,
              dataType: 'json',
              success: function (dataResult) {

                var filas = dataResult.data.length;
                
                if (filas > selectedTipo) {
                  filas = selectedTipo;
                  var cantidad = dataResult.data.length;
                  var valor = factor(cantidad,selectedTipo);
                  
                  
                  for (let index = 1; index <= valor; index++) {
                    $("#nuevo"+index).remove();
                  }
                  for (let index = 1; index <= valor; index++) {
                    if (index == 1) {
                      $("ul li:last").before("<li id='nuevo"+index+"' class='page-item active'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                    } else {
                      $("ul li:last").before("<li id='nuevo"+index+"' class='page-item'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                    }
                    
                    //$("#addItem").append("<li class='page-item'><a class='page-link' href='http://localhost:8000/trabajos/"+index+"'>"+index+"</a></li>");
                  }
                }else{
                  for (let index = 1; index <= valor; index++) {
                    $("#nuevo"+index).remove();
                  }
                  $("ul li:last").before("<li id='nuevo1' class='page-item active' aria-current='page'><span class='page-link'>1</span></li>");
                }


                for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
                  var text = "";
                  var aux1 = "";
                  var aux2 = "";
                  if (dataResult.data[i].informacion != null) {
                    aux1 = dataResult.data[i].informacion;
                  }
                  if (dataResult.data[i].datosImportantes != null) {
                    aux2 = dataResult.data[i].datosImportantes;
                  }
                  if (dataResult.data[i].name != "Administrador") {
                      text = dataResult.data[i].name;
                    }else{
                      text = " ";
                    }
                  var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                  "</td><td class='text-center'>" +
                    dataResult.data[i].id + "</td><td>" +
                    dataResult.data[i].prioridad  + "</td><td>" +
                    dataResult.data[i].nombreCliente  + "</td><td>" +
                    dataResult.data[i].estado  + "</td><td>" +
                    aux1  + "</td><td>" +
                    aux2  + "</td><td>"+
                    text + "</td><td>" +
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
                      
                      var bloq = factor(cantidad,selectedTipo);
                if (bloq == 0) {
                    $("#back").attr('class', 'page-item disabled');
                    $("#next").attr('class', 'page-item disabled');
                }
                

              }
          });
      });

  $(function(){

    

    $("#ver").on('change',function(){
      $("#grado").val('todos'); 
      $("#estado").val('todos'); 
      $("#ingeniero").val('todos'); 
      $('#Table > tbody').empty();
        var tipo = document.getElementById("ver");
        var selectedTipo = tipo.options[tipo.selectedIndex].text;
        $.ajax({
            url: "/trabajo/ver",
            type: "POST",
            data: {
              "_token": "{{ csrf_token() }}",
            },
            cache: false,
            dataType: 'json',
            success: function (dataResult) {
              
              var filas = dataResult.data.length;
              
              if (filas > selectedTipo) {
                filas = selectedTipo;
                var cantidad = dataResult.data.length;
                var valor = factor(cantidad,selectedTipo);
                
                
                for (let index = 1; index <= 50; index++) {
                  $("#nuevo"+index).remove();
                }
                for (let index = 1; index <= valor; index++) {
                  if (index == 1) {
                    $("ul li:last").before("<li id='nuevo"+index+"' class='page-item active'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                  } else {
                    $("ul li:last").before("<li id='nuevo"+index+"' class='page-item'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                  }
                  
                   //$("#addItem").append("<li class='page-item'><a class='page-link' href='http://localhost:8000/trabajos/"+index+"'>"+index+"</a></li>");
                }
              }else{
                for (let index = 1; index <= 50; index++) {
                  $("#nuevo"+index).remove();
                }
                $("ul li:last").before("<li id='nuevo1' class='page-item active' aria-current='page'><span class='page-link'>1</span></li>");
              }


              for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
                var text = "";
                  var aux1 = "";
                  var aux2 = "";
                  if (dataResult.data[i].informacion != null) {
                    aux1 = dataResult.data[i].informacion;
                  }
                  if (dataResult.data[i].datosImportantes != null) {
                    aux2 = dataResult.data[i].datosImportantes;
                  }
                  if (dataResult.data[i].name != "Administrador") {
                      text = dataResult.data[i].name;
                    }else{
                      text = " ";
                    }
                  var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                  "</td><td class='text-center'>" +
                    dataResult.data[i].id + "</td><td>" +
                    dataResult.data[i].prioridad  + "</td><td>" +
                    dataResult.data[i].nombreCliente  + "</td><td>" +
                    dataResult.data[i].estado  + "</td><td>" +
                    aux1  + "</td><td>" +
                    aux2  + "</td><td>"+
                    text + "</td><td>" +
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
                var bloq = factor(cantidad,selectedTipo);
                if (bloq == 0) {
                  $("#back").attr('class', 'page-item disabled');
                  $("#next").attr('class', 'page-item disabled');
                }else{
                  $("#next").attr('class', 'page-item');
                }
                $("#siguiente").attr('onclick', 'redireccionar(2)');

            }
        });
    });


      
        $("#btnBusqueda").on('click',function(){
          var value = $("#busqueda").val().toLowerCase();
        console.log(value);
          $("#ingeniero").val('todos');
          $("#grado").val('todos'); 
          $("#estado").val('todos'); 
          $('#Table > tbody').empty();
            var ver = document.getElementById("ver");
            var selectedVer = ver.options[ver.selectedIndex].text;
            $.ajax({
                url: "/trabajo/tiempoReal",
                type: "POST",
                data: {
                  "_token": "{{ csrf_token() }}",
                    "value": value,
                },
                cache: false,
                dataType: 'json',
                success: function (dataResult) {
                  console.log(dataResult);
                  var filas = dataResult.data.length;
                  
                  if (filas > selectedVer) {
                    filas = selectedVer;
                    var cantidad = dataResult.data.length;
                    var valor = factor(cantidad,selectedVer);
                    
                    
                    for (let index = 1; index <= 50; index++) {
                      $("#nuevo"+index).remove();
                    }
                    for (let index = 1; index <= valor; index++) {
                      if (index == 1) {
                        $("ul li:last").before("<li id='nuevo"+index+"' class='page-item active'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                      } else {
                        $("ul li:last").before("<li id='nuevo"+index+"' class='page-item'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                      }
                      
                      //$("#addItem").append("<li class='page-item'><a class='page-link' href='http://localhost:8000/trabajos/"+index+"'>"+index+"</a></li>");
                    }
                  }else{
                    for (let index = 1; index <= 50; index++) {
                      $("#nuevo"+index).remove();
                    }
                    $("ul li:last").before("<li id='nuevo1' class='page-item active' aria-current='page'><span class='page-link'>1</span></li>");
                  }
                  //var filas = dataResult.data.length;
                  for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
                    var text = "";
                  var aux1 = "";
                  var aux2 = "";
                  if (dataResult.data[i].informacion != null) {
                    aux1 = dataResult.data[i].informacion;
                  }
                  if (dataResult.data[i].datosImportantes != null) {
                    aux2 = dataResult.data[i].datosImportantes;
                  }
                  if (dataResult.data[i].name != "Administrador") {
                      text = dataResult.data[i].name;
                    }else{
                      text = " ";
                    }
                  var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                  "</td><td class='text-center'>" +
                    dataResult.data[i].id + "</td><td>" +
                    dataResult.data[i].prioridad  + "</td><td>" +
                    dataResult.data[i].nombreCliente  + "</td><td>" +
                    dataResult.data[i].estado  + "</td><td>" +
                    aux1  + "</td><td>" +
                    aux2  + "</td><td>"+
                    text + "</td><td>" +
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

                        var bloq = factor(cantidad,selectedVer);
                    if (bloq == 0) {
                      $("#back").attr('class', 'page-item disabled');
                      $("#next").attr('class', 'page-item disabled');
                    }else{
                      $("#next").attr('class', 'page-item');
                    }
                }
            });
        });

    $("#ingeniero").on('change',function(){
      $("#grado").val('todos'); 
      $("#estado").val('todos'); 
      $('#Table > tbody').empty();
        var tipo = document.getElementById("ingeniero");
        var selectedTipo = tipo.options[tipo.selectedIndex].text;
        var ver = document.getElementById("ver");
        var selectedVer = ver.options[ver.selectedIndex].text;
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
              
              if (filas > selectedVer) {
                filas = selectedVer;
                var cantidad = dataResult.data.length;
                var valor = factor(cantidad,selectedVer);
                
                
                for (let index = 1; index <= 50; index++) {
                  $("#nuevo"+index).remove();
                }
                for (let index = 1; index <= valor; index++) {
                  if (index == 1) {
                    $("ul li:last").before("<li id='nuevo"+index+"' class='page-item active'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                  } else {
                    $("ul li:last").before("<li id='nuevo"+index+"' class='page-item'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                  }
                  
                   //$("#addItem").append("<li class='page-item'><a class='page-link' href='http://localhost:8000/trabajos/"+index+"'>"+index+"</a></li>");
                }
              }else{
                for (let index = 1; index <= 50; index++) {
                  $("#nuevo"+index).remove();
                }
                $("ul li:last").before("<li id='nuevo1' class='page-item active' aria-current='page'><span class='page-link'>1</span></li>");
              }
              //var filas = dataResult.data.length;
              for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
                var text = "";
                  var aux1 = "";
                  var aux2 = "";
                  if (dataResult.data[i].informacion != null) {
                    aux1 = dataResult.data[i].informacion;
                  }
                  if (dataResult.data[i].datosImportantes != null) {
                    aux2 = dataResult.data[i].datosImportantes;
                  }
                  if (dataResult.data[i].name != "Administrador") {
                      text = dataResult.data[i].name;
                    }else{
                      text = " ";
                    }
                  var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                  "</td><td class='text-center'>" +
                    dataResult.data[i].id + "</td><td>" +
                    dataResult.data[i].prioridad  + "</td><td>" +
                    dataResult.data[i].nombreCliente  + "</td><td>" +
                    dataResult.data[i].estado  + "</td><td>" +
                    aux1  + "</td><td>" +
                    aux2  + "</td><td>"+
                    text + "</td><td>" +
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

                    var bloq = factor(cantidad,selectedTipo);
                if (bloq == 0) {
                  $("#back").attr('class', 'page-item disabled');
                  $("#next").attr('class', 'page-item disabled');
                }else{
                  $("#next").attr('class', 'page-item');
                }
            }
        });
    });

    

    $("#estado").on('change',function(){
      $("#grado").val('todos');
      $("#ingeniero").val('todos');
      $('#Table > tbody').empty();
        var tipo = document.getElementById("estado");
        var selectedTipo = tipo.options[tipo.selectedIndex].text;
        var ver = document.getElementById("ver");
        var selectedVer = ver.options[ver.selectedIndex].text;
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
              
              if (filas > selectedVer) {
                filas = selectedVer;
                var cantidad = dataResult.data.length;
                var valor = factor(cantidad,selectedVer);
                
                
                for (let index = 1; index <= 50; index++) {
                  $("#nuevo"+index).remove();
                }
                for (let index = 1; index <= valor; index++) {
                  if (index == 1) {
                    $("ul li:last").before("<li id='nuevo"+index+"' class='page-item active'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                  } else {
                    $("ul li:last").before("<li id='nuevo"+index+"' class='page-item'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                  }
                  
                   //$("#addItem").append("<li class='page-item'><a class='page-link' href='http://localhost:8000/trabajos/"+index+"'>"+index+"</a></li>");
                }
              }else{
                for (let index = 1; index <= 50; index++) {
                  $("#nuevo"+index).remove();
                }
                $("ul li:last").before("<li id='nuevo1' class='page-item active' aria-current='page'><span class='page-link'>1</span></li>");
              }

              //var filas = dataResult.data.length;
              for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
                var text = "";
                  var aux1 = "";
                  var aux2 = "";
                  if (dataResult.data[i].informacion != null) {
                    aux1 = dataResult.data[i].informacion;
                  }
                  if (dataResult.data[i].datosImportantes != null) {
                    aux2 = dataResult.data[i].datosImportantes;
                  }
                  if (dataResult.data[i].name != "Administrador") {
                      text = dataResult.data[i].name;
                    }else{
                      text = " ";
                    }
                  var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                  "</td><td class='text-center'>" +
                    dataResult.data[i].id + "</td><td>" +
                    dataResult.data[i].prioridad  + "</td><td>" +
                    dataResult.data[i].nombreCliente  + "</td><td>" +
                    dataResult.data[i].estado  + "</td><td>" +
                    aux1  + "</td><td>" +
                    aux2  + "</td><td>"+
                    text + "</td><td>" +
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
                    var bloq = factor(cantidad,selectedTipo);
                if (bloq == 0) {
                  $("#back").attr('class', 'page-item disabled');
                  $("#next").attr('class', 'page-item disabled');
                }else{
                  $("#next").attr('class', 'page-item');
                }

            }
        });
    });


    $("#grado").on('change',function(){
      $("#estado").val('todos');
      $("#ingeniero").val('todos');
      $('#Table > tbody').empty();
        var tipo = document.getElementById("grado");
        var selectedTipo = tipo.options[tipo.selectedIndex].text;
        var ver = document.getElementById("ver");
        var selectedVer = ver.options[ver.selectedIndex].text;
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
              
              if (filas > selectedVer) {
                filas = selectedVer;
                var cantidad = dataResult.data.length;
                var valor = factor(cantidad,selectedVer);
                
                
                for (let index = 1; index <= 50; index++) {
                  $("#nuevo"+index).remove();
                }
                for (let index = 1; index <= valor; index++) {
                  if (index == 1) {
                    $("ul li:last").before("<li id='nuevo"+index+"' class='page-item active'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                  } else {
                    $("ul li:last").before("<li id='nuevo"+index+"' class='page-item'><a class='page-link' onclick='redireccionar("+index+")' >"+index+"</a></li>");
                  }
                  
                   //$("#addItem").append("<li class='page-item'><a class='page-link' href='http://localhost:8000/trabajos/"+index+"'>"+index+"</a></li>");
                }
              }else{
                for (let index = 1; index <= 50; index++) {
                  $("#nuevo"+index).remove();
                }
                $("ul li:last").before("<li id='nuevo1' class='page-item active' aria-current='page'><span class='page-link'>1</span></li>");
              }
              
              //var filas = dataResult.data.length;
              for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
                var text = "";
                  var aux1 = "";
                  var aux2 = "";
                  if (dataResult.data[i].informacion != null) {
                    aux1 = dataResult.data[i].informacion;
                  }
                  if (dataResult.data[i].datosImportantes != null) {
                    aux2 = dataResult.data[i].datosImportantes;
                  }
                  if (dataResult.data[i].name != "Administrador") {
                      text = dataResult.data[i].name;
                    }else{
                      text = " ";
                    }
                  var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                  "</td><td class='text-center'>" +
                    dataResult.data[i].id + "</td><td>" +
                    dataResult.data[i].prioridad  + "</td><td>" +
                    dataResult.data[i].nombreCliente  + "</td><td>" +
                    dataResult.data[i].estado  + "</td><td>" +
                    aux1  + "</td><td>" +
                    aux2  + "</td><td>"+
                    text + "</td><td>" +
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
                    var bloq = factor(cantidad,selectedTipo);
                if (bloq == 0) {
                  $("#back").attr('class', 'page-item disabled');
                  $("#next").attr('class', 'page-item disabled');
                }else{
                  $("#next").attr('class', 'page-item');
                }

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
  //
    $(document).on('change keyup', '.required', function(e){
    let Disabled = true;
      $(".required").each(function() {
        let value = this.value
        if ((value)&&(value.trim() !=''))
            {
              Disabled = false
            }else{
              Disabled = true
              return false
            }
      });
    
    if(Disabled){
          $('#btnBuscar').prop("disabled", true);
        }else{
          $('#btnBuscar').prop("disabled", false);
        }
  })
    
  
</script>


@endsection
