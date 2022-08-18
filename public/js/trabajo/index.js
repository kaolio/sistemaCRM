
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
                            ' @method(DELETE)'+
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
  });
  document.oncontextmenu = function(){return false}
  
  function mayus(e) {
    $("#stateRow").html("<span  class='bien'><h5 ></h5></span>");
      e.value = e.value.toUpperCase();
  }
