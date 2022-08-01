@extends('adminlte::page')
@section('content')



<h1 align="center"><strong>INVENTARIO</strong></h1>
<div style="margin-top: -40px">
  <div class="d-flex" style="visibility: hidden">
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
    <a class="btn btn-success" href="{{URL('inventario/excel')}}" style="background: rgb(20, 141, 9)" role="button">EXCEL</a>
    <a class="btn btn-danger" href="{{URL('inventario/pdf')}}" style="background: #AF1512" role="button">PDF</a> 
    <a class="btn text-white" href="{{URL('inventario/imprimirInventario')}}" style="background:#0F3078" role="button">IMPRIMIR</a>
  </div>
  
  <div class="ml-auto p-2">
    <div class="input-group md-2">
      <span class="input-group-text">Búsqueda Rapida </span>
      <input class="form-control" id="busqueda" placeholder="Buscar Modelo, Fabricante o Factor de Forma " name="busqueda" autocomplete="off">
      <button  id="btnBusqueda" name="btnBusqueda" style="border-color: #ced4da;border-style: solid;" >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#007BFF" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></button>           
  </div>        
   </div>
    
</div>
      
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Rol del Dispositivo</div>
                <select name="grado" id="grado" class="form-control">
                  <option value="todos">Todos</option>
                  <option value="Paciente">Paciente</option>
                  <option value="Donante">Donante</option>
                  <option value="Clon">Clon</option>
                  <option value="Datos">Datos</option>
                </select>
        </div>
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Fabricante</div>
          <select name="estado" id="estado" class="form-control">
            <option value="todos">Todos</option>
            <option value="Seagate">Seagate</option>
            <option value="Toshiba">Toshiba</option>
            <option value="Samsung">Samsung</option>
            <option value="Verbatim">Verbatim</option>
            <option value="Western Digital">Western Digital</option>
            <option value="Skynet">Skynet</option>
            <option value="Maxtor">Maxtor</option>
            <option value="Adata">Adata</option>
            <option value="Crucial">Crucial</option>
            <option value="Kingston">Kingston</option>
            <option value="Sony">Sony</option>
            <option value="Hitachi">Hitachi</option>
            <option value="Asus">Asus</option>
          </select>
        </div>
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Tipo</div>
        
          <select name="ingeniero" id="ingeniero" class="form-control">
            <option value="todos">Todos</option>
            <option value="HDD">HDD</option>
            <option value="SSD">SSD</option>
          </select>
        </div>
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Factor de Forma</div>
                <select name="factor_de_forma" id="factor_de_forma" class="form-control">
                  <option value="Todos">Todos</option>
                  <option value="3.5 pulgadas">3.5 pulgadas</option>
                  <option value="2.5 pulgadas">2.5 pulgadas</option>
                  <option value="M2">M2</option>
                </select>
        </div>
     </div>

     
     @include('inventario.table')


     <ul class="pagination">
      <li class="page-item disabled" id="back"><a id="anterior" aria-hidden="true" class="page-link" onclick="" rel="next" aria-label="« Anterior">‹</a></li>
      <li class="page-item" id="next"><a id="siguiente" class="page-link" onclick="redireccionar(2)" rel="next" aria-label="Siguiente »">›</a></li>
      </ul>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="{{ URL::asset('estilos/style.css') }} ">
<script>

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
                  for (let index = 1; index <= valor; index++) {
                    $("#nuevo"+index).remove();
                  }
                  $("ul li:last").before("<li id='nuevo1' class='page-item active' aria-current='page'><span class='page-link'>1</span></li>");
                }


                for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
                  var text = "";
                  if (dataResult.data[i].name != "Administrador") {
                      text = dataResult.data[i].name;
                    }else{
                      text = " ";
                    }
                  var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                  "</td><td class='text-center'>" +
                    dataResult.data[i].id + "</td><td>" +
                    dataResult.data[i].prioridad  + "</td><td>" +
                    dataResult.data[i].nombreCliente  + "</td><td>" +
                    dataResult.data[i].estado  + "</td><td>" +
                    dataResult.data[i].informacion  + "</td><td>" +
                    dataResult.data[i].datosImportantes  + "</td><td>"+
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

  //REDIRECT PAGINATOR
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
        var ver = document.getElementById("factor_de_forma");
        var selectedFact = ver.options[ver.selectedIndex].text;
        var ver = document.getElementById("ver");
        var selectedVer = ver.options[ver.selectedIndex].text;
    
        $.ajax({
            url: "/inventario/redireccionar",
            type: "POST",
            data: {
              "_token": "{{ csrf_token() }}",
              "ingeniero": selectedIng,
              "grado": selectedGra,
              "estado": selectedEst,
              "factor_de_forma": selectedFact,
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
                if (dataResult.data[i].name != "Administrador") {
                    text = dataResult.data[i].name;
                  }else{
                    text = " ";
                  }
                var nuevafila= "<tr><td>" +
                  // "CHECK" + "</td><td class='text-center'>" +
                  dataResult.data[i].id + "</td><td>" +
                  dataResult.data[i].manufactura  + "</td><td>" +
                  dataResult.data[i].modelo  + "</td><td>" +
                  dataResult.data[i].numero_de_serie  + "</td><td>" +
                  dataResult.data[i].firmware  + "</td><td>" +
                  dataResult.data[i].capacidad  + "</td><td>"+
                  dataResult.data[i].pbc  + "</td><td>" +
                  dataResult.data[i].ubicacion  + "</td><td>" +
                  dataResult.data[i].factor_de_forma  + "</td><td>" +
                  dataResult.data[i].nota  + "</td><td>" +
                  dataResult.data[i].cabecera  + "</td><td>" +
                  dataResult.data[i].info_de_cabecera  + "</td><td>" +
                    '<button type="button" style="padding:3px" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                          '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                          '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                        '</svg>'+
                      '</button>'+
                      '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header">'+
                              '<h5 class="modal-title" id="exampleModalLabel">Eliminar Disco</h5>'+
                              '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                              '</button>'+
                            '</div>'+
                            '<div class="modal-body ">'+
                            '¿Realmente Desea Borrar el Disco?<br>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].manufactura+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].modelo+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].capacidad+'</strong></h6>'+
                            '</div>'+
                            '<form action="{{url('/inventario/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                              '@csrf'+
                            ' @method('DELETE')'+
                            '<div class="modal-footer">'+
                              '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>'+
                              '<button class="btn btn-primary" style="padding-left: 6px">'+
                                'Aceptar'+
                              '</button>'+
                            '</div>'+
                          '</form> '+
                          '</div>'+
                        '</div>'+
                    ' </div> '+
              '<a href="{{url('/inventario/editar')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="darkblue" class="bi bi-pencil" viewBox="0 0 16 16">'+
                        '<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/itemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">'+
                        '<path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>'+
                        '<path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/imprimirItemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                  '<button class="btn btn-light-active btn-sm" style="padding:3px" >'+
                  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(39, 62, 62)" class="bi bi-printer" viewBox="0 0 16 16">'+
                    '<path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>'+
                    '<path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>'+
                  '</svg>'+
                  '</button>'+
              '</a>'+
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
  //VISTA GENERAL INVENTARIO
  $(document).ready(function(){
        $("#grado").val('todos'); 
        $("#estado").val('todos'); 
        $("#ingeniero").val('todos'); 
        $('#Table > tbody').empty();
          var tipo = document.getElementById("ver");
          var selectedTipo = tipo.options[tipo.selectedIndex].text;
          $.ajax({
              url: "/inventario/ver",
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
                  if (dataResult.data[i].name != "Administrador") {
                      text = dataResult.data[i].name;
                    }else{
                      text = " ";
                    }
                  var nuevafila= "<tr><td>" +
                  //   "<div class='form-check'>"+
                  //   "<input class='form-check-input' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                  //   "</div>"+
                  // "</td><td class='text-center'>" +
                    dataResult.data[i].id + "</td><td>" +
                  dataResult.data[i].manufactura  + "</td><td>" +
                  dataResult.data[i].modelo  + "</td><td>" +
                  dataResult.data[i].numero_de_serie  + "</td><td>" +
                  dataResult.data[i].firmware  + "</td><td>" +
                  dataResult.data[i].capacidad  + "</td><td>"+
                  dataResult.data[i].pbc  + "</td><td>" +
                  dataResult.data[i].ubicacion  + "</td><td>" +
                  dataResult.data[i].factor_de_forma  + "</td><td>" +
                  dataResult.data[i].nota  + "</td><td>" +
                  dataResult.data[i].cabecera  + "</td><td>" +
                  dataResult.data[i].info_de_cabecera  + "</td><td>" +
                      '<button type="button" style="padding:3px" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                          '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                          '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                        '</svg>'+
                      '</button>'+
                      '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header">'+
                              '<h5 class="modal-title" id="exampleModalLabel">Eliminar Disco</h5>'+
                              '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                              '</button>'+
                            '</div>'+
                            '<div class="modal-body ">'+
                            '¿Realmente Desea Borrar el Disco?<br>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].manufactura+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].modelo+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].capacidad+'</strong></h6>'+
                            '</div>'+
                            '<form action="{{url('/inventario/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                              '@csrf'+
                            ' @method('DELETE')'+
                            '<div class="modal-footer">'+
                              '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>'+
                              '<button class="btn btn-primary" style="padding-left: 6px">'+
                                'Aceptar'+
                              '</button>'+
                            '</div>'+
                          '</form> '+
                          '</div>'+
                        '</div>'+
                    ' </div> '+
              '<a href="{{url('/inventario/editar')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="darkblue" class="bi bi-pencil" viewBox="0 0 16 16">'+
                        '<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/itemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">'+
                        '<path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>'+
                        '<path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/imprimirItemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                  '<button class="btn btn-light-active btn-sm" style="padding:3px" >'+
                  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(39, 62, 62)" class="bi bi-printer" viewBox="0 0 16 16">'+
                    '<path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>'+
                    '<path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>'+
                  '</svg>'+
                  '</button>'+
              '</a>'+
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
                if (dataResult.data[i].name != "Administrador") {
                    text = dataResult.data[i].name;
                  }else{
                    text = " ";
                  }
                var nuevafila= "<tr><td>" +
                  "CHECK" + "</td><td class='text-center'>" +
                  dataResult.data[i].id + "</td><td>" +
                  dataResult.data[i].prioridad  + "</td><td>" +
                  dataResult.data[i].nombreCliente  + "</td><td>" +
                  dataResult.data[i].estado  + "</td><td>" +
                  dataResult.data[i].informacion  + "</td><td>" +
                  dataResult.data[i].datosImportantes  + "</td><td>"+
                  text + "</td><td>" +
                  dataResult.data[i].creado  + "</td><td>" +
                  dataResult.data[i].created_at  + "</td><td class='text-center'>" +
                    '<button type="button" style="padding:3px" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                          '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                          '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                        '</svg>'+
                      '</button>'+
                      '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header">'+
                              '<h5 class="modal-title" id="exampleModalLabel">Eliminar Disco</h5>'+
                              '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                              '</button>'+
                            '</div>'+
                            '<div class="modal-body ">'+
                            '¿Realmente Desea Borrar el Disco?<br>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].manufactura+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].modelo+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].capacidad+'</strong></h6>'+
                            '</div>'+
                            '<form action="{{url('/inventario/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                              '@csrf'+
                            ' @method('DELETE')'+
                            '<div class="modal-footer">'+
                              '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>'+
                              '<button class="btn btn-primary" style="padding-left: 6px">'+
                                'Aceptar'+
                              '</button>'+
                            '</div>'+
                          '</form> '+
                          '</div>'+
                        '</div>'+
                    ' </div> '+
              '<a href="{{url('/inventario/editar')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="darkblue" class="bi bi-pencil" viewBox="0 0 16 16">'+
                        '<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/itemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">'+
                        '<path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>'+
                        '<path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/imprimirItemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                  '<button class="btn btn-light-active btn-sm" style="padding:3px" >'+
                  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(39, 62, 62)" class="bi bi-printer" viewBox="0 0 16 16">'+
                    '<path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>'+
                    '<path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>'+
                  '</svg>'+
                  '</button>'+
              '</a>'+
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


      //BUSCADOR TIEMPO REAL EN INVENTARIO
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
                url: "/inventario/buscadorTiempoReal",
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
                if (dataResult.data[i].name != "Administrador") {
                    text = dataResult.data[i].name;
                  }else{
                    text = " ";
                  }
                var nuevafila= "<tr><td>" +
                  dataResult.data[i].id + "</td><td>" +
                  dataResult.data[i].manufactura  + "</td><td>" +
                  dataResult.data[i].modelo  + "</td><td>" +
                  dataResult.data[i].numero_de_serie  + "</td><td>" +
                  dataResult.data[i].firmware  + "</td><td>" +
                  dataResult.data[i].capacidad  + "</td><td>"+
                  dataResult.data[i].pbc  + "</td><td>" +
                  dataResult.data[i].ubicacion  + "</td><td>" +
                  dataResult.data[i].factor_de_forma  + "</td><td>" +
                  dataResult.data[i].nota  + "</td><td>" +
                  dataResult.data[i].cabecera  + "</td><td>" +
                  dataResult.data[i].info_de_cabecera  + "</td><td>" +
                    '<button type="button" style="padding:3px" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                          '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                          '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                        '</svg>'+
                      '</button>'+
                      '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header">'+
                              '<h5 class="modal-title" id="exampleModalLabel">Eliminar Disco</h5>'+
                              '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                              '</button>'+
                            '</div>'+
                            '<div class="modal-body ">'+
                            '¿Realmente Desea Borrar el Disco?<br>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].manufactura+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].modelo+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].capacidad+'</strong></h6>'+
                            '</div>'+
                            '<form action="{{url('/inventario/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                              '@csrf'+
                            ' @method('DELETE')'+
                            '<div class="modal-footer">'+
                              '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>'+
                              '<button class="btn btn-primary" style="padding-left: 6px">'+
                                'Aceptar'+
                              '</button>'+
                            '</div>'+
                          '</form> '+
                          '</div>'+
                        '</div>'+
                    ' </div> '+
              '<a href="{{url('/inventario/editar')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="darkblue" class="bi bi-pencil" viewBox="0 0 16 16">'+
                        '<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/itemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">'+
                        '<path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>'+
                        '<path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/imprimirItemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                  '<button class="btn btn-light-active btn-sm" style="padding:3px" >'+
                  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(39, 62, 62)" class="bi bi-printer" viewBox="0 0 16 16">'+
                    '<path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>'+
                    '<path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>'+
                  '</svg>'+
                  '</button>'+
              '</a>'+
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


//FILTRAR POR TIPO
    $("#ingeniero").on('change',function(){
      $("#grado").val('todos'); 
      $("#estado").val('todos'); 
      $('#Table > tbody').empty();
        var tipo = document.getElementById("ingeniero");
        var selectedTipo = tipo.options[tipo.selectedIndex].text;
        var ver = document.getElementById("ver");
        var selectedVer = ver.options[ver.selectedIndex].text;
        $.ajax({
            url: "/inventario/ingeniero",
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
                if (dataResult.data[i].name != "Administrador") {
                    text = dataResult.data[i].name;
                  }else{
                    text = " ";
                  }
                var nuevafila= "<tr><td>" +
                  dataResult.data[i].id + "</td><td>" +
                  dataResult.data[i].manufactura  + "</td><td>" +
                  dataResult.data[i].modelo  + "</td><td>" +
                  dataResult.data[i].numero_de_serie  + "</td><td>" +
                  dataResult.data[i].firmware  + "</td><td>" +
                  dataResult.data[i].capacidad  + "</td><td>"+
                  dataResult.data[i].pbc  + "</td><td>" +
                  dataResult.data[i].ubicacion  + "</td><td>" +
                  dataResult.data[i].factor_de_forma  + "</td><td>" +
                  dataResult.data[i].nota  + "</td><td>" +
                  dataResult.data[i].cabecera  + "</td><td>" +
                  dataResult.data[i].info_de_cabecera  + "</td><td>" +
                    '<button type="button" style="padding:3px" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                          '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                          '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                        '</svg>'+
                      '</button>'+
                      '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header">'+
                              '<h5 class="modal-title" id="exampleModalLabel">Eliminar Disco</h5>'+
                              '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                              '</button>'+
                            '</div>'+
                            '<div class="modal-body ">'+
                            '¿Realmente Desea Borrar el Disco?<br>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].manufactura+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].modelo+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].capacidad+'</strong></h6>'+
                            '</div>'+
                            '<form action="{{url('/inventario/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                              '@csrf'+
                            ' @method('DELETE')'+
                            '<div class="modal-footer">'+
                              '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>'+
                              '<button class="btn btn-primary" style="padding-left: 6px">'+
                                'Aceptar'+
                              '</button>'+
                            '</div>'+
                          '</form> '+
                          '</div>'+
                        '</div>'+
                    ' </div> '+
              '<a href="{{url('/inventario/editar')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="darkblue" class="bi bi-pencil" viewBox="0 0 16 16">'+
                        '<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/itemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">'+
                        '<path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>'+
                        '<path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/imprimirItemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                  '<button class="btn btn-light-active btn-sm" style="padding:3px" >'+
                  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(39, 62, 62)" class="bi bi-printer" viewBox="0 0 16 16">'+
                    '<path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>'+
                    '<path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>'+
                  '</svg>'+
                  '</button>'+
              '</a>'+
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

    
//FILTRAR POR FABRICANTE
    $("#estado").on('change',function(){
      $("#grado").val('todos');
      $("#ingeniero").val('todos');
      $('#Table > tbody').empty();
        var tipo = document.getElementById("estado");
        var selectedTipo = tipo.options[tipo.selectedIndex].text;
        var ver = document.getElementById("ver");
        var selectedVer = ver.options[ver.selectedIndex].text;
        $.ajax({
            url: "/inventario/estado",
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
                if (dataResult.data[i].name != "Administrador") {
                    text = dataResult.data[i].name;
                  }else{
                    text = " ";
                  }
                var nuevafila= "<tr><td>" +
                  dataResult.data[i].id + "</td><td>" +
                  dataResult.data[i].manufactura  + "</td><td>" +
                  dataResult.data[i].modelo  + "</td><td>" +
                  dataResult.data[i].numero_de_serie  + "</td><td>" +
                  dataResult.data[i].firmware  + "</td><td>" +
                  dataResult.data[i].capacidad  + "</td><td>"+
                  dataResult.data[i].pbc  + "</td><td>" +
                  dataResult.data[i].ubicacion  + "</td><td>" +
                  dataResult.data[i].factor_de_forma  + "</td><td>" +
                  dataResult.data[i].nota  + "</td><td>" +
                  dataResult.data[i].cabecera  + "</td><td>" +
                  dataResult.data[i].info_de_cabecera  + "</td><td>" +
                    '<button type="button" style="padding:3px" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                          '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                          '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                        '</svg>'+
                      '</button>'+
                      '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header">'+
                              '<h5 class="modal-title" id="exampleModalLabel">Eliminar Disco</h5>'+
                              '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                              '</button>'+
                            '</div>'+
                            '<div class="modal-body ">'+
                            '¿Realmente Desea Borrar el Disco?<br>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].manufactura+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].modelo+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].capacidad+'</strong></h6>'+
                            '</div>'+
                            '<form action="{{url('/inventario/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                              '@csrf'+
                            ' @method('DELETE')'+
                            '<div class="modal-footer">'+
                              '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>'+
                              '<button class="btn btn-primary" style="padding-left: 6px">'+
                                'Aceptar'+
                              '</button>'+
                            '</div>'+
                          '</form> '+
                          '</div>'+
                        '</div>'+
                    ' </div> '+
              '<a href="{{url('/inventario/editar')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="darkblue" class="bi bi-pencil" viewBox="0 0 16 16">'+
                        '<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/itemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">'+
                        '<path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>'+
                        '<path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/imprimirItemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                  '<button class="btn btn-light-active btn-sm" style="padding:3px" >'+
                  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(39, 62, 62)" class="bi bi-printer" viewBox="0 0 16 16">'+
                    '<path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>'+
                    '<path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>'+
                  '</svg>'+
                  '</button>'+
              '</a>'+
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


//FILTRAR ROL DEL DISPOSITIVO
    $("#grado").on('change',function(){
      $("#estado").val('todos');
      $("#ingeniero").val('todos');
      $('#Table > tbody').empty();
        var tipo = document.getElementById("grado"); 
        var selectedTipo = tipo.options[tipo.selectedIndex].text; //para obtener el texto del select option grado=prioridad
        var ver = document.getElementById("ver");
        var selectedVer = ver.options[ver.selectedIndex].text;
        $.ajax({
            url: "/inventario/prioridad",
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
                if (dataResult.data[i].name != "Administrador") {
                    text = dataResult.data[i].name;
                  }else{
                    text = " ";
                  }
                var nuevafila= "<tr><td>" +
                  dataResult.data[i].id + "</td><td>" +
                  dataResult.data[i].manufactura  + "</td><td>" +
                  dataResult.data[i].modelo  + "</td><td>" +
                  dataResult.data[i].numero_de_serie  + "</td><td>" +
                  dataResult.data[i].firmware  + "</td><td>" +
                  dataResult.data[i].capacidad  + "</td><td>"+
                  dataResult.data[i].pbc  + "</td><td>" +
                  dataResult.data[i].ubicacion  + "</td><td>" +
                  dataResult.data[i].factor_de_forma  + "</td><td>" +
                  dataResult.data[i].nota  + "</td><td>" +
                  dataResult.data[i].cabecera  + "</td><td>" +
                  dataResult.data[i].info_de_cabecera  + "</td><td>" +
                    '<button type="button" style="padding:3px" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                          '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                          '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                        '</svg>'+
                      '</button>'+
                      '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header">'+
                              '<h5 class="modal-title" id="exampleModalLabel">Eliminar Disco</h5>'+
                              '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                              '</button>'+
                            '</div>'+
                            '<div class="modal-body ">'+
                            '¿Realmente Desea Borrar el Disco?<br>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].manufactura+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].modelo+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].capacidad+'</strong></h6>'+
                            '</div>'+
                            '<form action="{{url('/inventario/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                              '@csrf'+
                            ' @method('DELETE')'+
                            '<div class="modal-footer">'+
                              '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>'+
                              '<button class="btn btn-primary" style="padding-left: 6px">'+
                                'Aceptar'+
                              '</button>'+
                            '</div>'+
                          '</form> '+
                          '</div>'+
                        '</div>'+
                    ' </div> '+
              '<a href="{{url('/inventario/editar')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="darkblue" class="bi bi-pencil" viewBox="0 0 16 16">'+
                        '<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/itemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">'+
                        '<path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>'+
                        '<path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/imprimirItemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                  '<button class="btn btn-light-active btn-sm" style="padding:3px" >'+
                  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(39, 62, 62)" class="bi bi-printer" viewBox="0 0 16 16">'+
                    '<path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>'+
                    '<path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>'+
                  '</svg>'+
                  '</button>'+
              '</a>'+
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

//FILTRAR POR FACTOR DE FORMA
      $("#factor_de_forma").on('change',function(){
      $("#grado").val('todos');
      $("#estado").val('todos');
      $("#ingeniero").val('todos');
      $('#Table > tbody').empty();
        var tipo = document.getElementById("factor_de_forma"); 
        var selectedTipo = tipo.options[tipo.selectedIndex].text; //para obtener el texto del select option grado=prioridad
        var ver = document.getElementById("ver");
        var selectedVer = ver.options[ver.selectedIndex].text;
        $.ajax({
            url: "/inventario/factor_de_forma",
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
                if (dataResult.data[i].name != "Administrador") {
                    text = dataResult.data[i].name;
                  }else{
                    text = " ";
                  }
                var nuevafila= "<tr><td>" +
                  dataResult.data[i].id + "</td><td>" +
                  dataResult.data[i].manufactura  + "</td><td>" +
                  dataResult.data[i].modelo  + "</td><td>" +
                  dataResult.data[i].numero_de_serie  + "</td><td>" +
                  dataResult.data[i].firmware  + "</td><td>" +
                  dataResult.data[i].capacidad  + "</td><td>"+
                  dataResult.data[i].pbc  + "</td><td>" +
                  dataResult.data[i].ubicacion  + "</td><td>" +
                  dataResult.data[i].factor_de_forma  + "</td><td>" +
                  dataResult.data[i].nota  + "</td><td>" +
                  dataResult.data[i].cabecera  + "</td><td>" +
                  dataResult.data[i].info_de_cabecera  + "</td><td>" +
                    '<button type="button" style="padding:3px" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                          '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                          '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                        '</svg>'+
                      '</button>'+
                      '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header">'+
                              '<h5 class="modal-title" id="exampleModalLabel">Eliminar Disco</h5>'+
                              '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                              '</button>'+
                            '</div>'+
                            '<div class="modal-body ">'+
                            '¿Realmente Desea Borrar el Disco?<br>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].manufactura+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].modelo+'</strong></h6>'+
                            '<h6 style="text-align:center"><strong> &squf; '+dataResult.data[i].capacidad+'</strong></h6>'+
                            '</div>'+
                            '<form action="{{url('/inventario/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                              '@csrf'+
                            ' @method('DELETE')'+
                            '<div class="modal-footer">'+
                              '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>'+
                              '<button class="btn btn-primary" style="padding-left: 6px">'+
                                'Aceptar'+
                              '</button>'+
                            '</div>'+
                          '</form> '+
                          '</div>'+
                        '</div>'+
                    ' </div> '+
              '<a href="{{url('/inventario/editar')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="darkblue" class="bi bi-pencil" viewBox="0 0 16 16">'+
                        '<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/itemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                    '<button class="btn btn-light-active btn-sm" style="padding:3px">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">'+
                        '<path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>'+
                        '<path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>'+
                      '</svg>'+
                    '</button>'+
              '</a>'+
              '<a href="{{url('/inventario/imprimirItemPdf')}}'+'/'+dataResult.data[i].id+'">'+
                  '<button class="btn btn-light-active btn-sm" style="padding:3px" >'+
                  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(39, 62, 62)" class="bi bi-printer" viewBox="0 0 16 16">'+
                    '<path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>'+
                    '<path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>'+
                  '</svg>'+
                  '</button>'+
              '</a>'+
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