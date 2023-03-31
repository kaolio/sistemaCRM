
  //console.log($('#cliente').val());
  

  var eliminar = 0;
  var numeroID = 0;
  $("#adicional").on('click', function() {

    if (validarTabla()) {
      eliminar = eliminar+1;
            //var iman = 0;
            //iman = iman + 1;
            //$("#tabla tbody tr:eq(0)").clone().appendTo("#tabla").attr("id", "columna-" + (iman)).find('input, select').attr('readonly', true).show();
            //adding row to end and start
            //$("#tabla>tbody").prepend("<tr><td>Test Row Prepend</td></tr>");
            var tipo = document.getElementById("tipo").value;
            var selectedTipo = tipo.options[tipo.selectedIndex].text;
            var rol = document.getElementById("rol");
            var selectedRol = rol.options[rol.selectedIndex].text;
            var fabricante = document.getElementById("fabricante").value;
            var modelo = document.getElementById("modelo").value;
            var serial = document.getElementById("serial").value;
            var capacidad = document.getElementById("capacidad").value;
            var malFuncionamiento = document.getElementById("malFuncionamiento").value;
            var localizacion = document.getElementById("localizacion").value;

            
            $("#tabla>tbody").append("<tr id='"+numeroID+"'>"+
                                        "<td>"+
                                          "<div class='input-group'>"+
                                          "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Tipo</span>"+
                                          "<input type='text' class='form-control' name='tipo[]'id='tipo' readonly value='"+selectedTipo+"'>"+
                                          "</div>"+
                                        "</td>"+
                                        "<td>"+
                                          "<div class='input-group'>"+
                                          "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Rol</span>"+
                                          "<input type='text' class='form-control' name='rol[]'id='rol' readonly value='"+selectedRol+"'>"+
                                          "</div>"+
                                        "</td>"+
                                        "<td>"+
                                          "<div class='input-group'>"+
                                          "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Fabricante</span>"+
                                          "<input type='text' class='form-control' name='fabricante[]'id='fabricante' readonly value='"+fabricante+"'>"+
                                          "</div>"+
                                        "</td>"+
                                      "</tr>");

                                      numeroID = numeroID +1;
                        $("#tabla>tbody").append("<tr id='"+numeroID+"'>"+
                                        
                                        "<td>"+
                                          "<div class='input-group'>"+
                                          "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Modelo</span>"+
                                          "<input type='text' class='form-control' name='modelo[]'id='modelo' readonly value='"+modelo+"'>"+
                                          "</div>"+
                                        "</td>"+
                                        "<td>"+
                                          "<div class='input-group'>"+
                                          "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Serial</span>"+
                                          "<input type='text' class='form-control' name='serial[]'id='serial' readonly value='"+serial+"'>"+
                                          "</div>"+
                                        "</td>"+
                                        "<td>"+
                                          "<div class='input-group'>"+
                                          "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Capacidad</span>"+
                                          "<input type='text' class='form-control' name='capacidad[]'id='capacidad' readonly value='"+capacidad+"'>"+
                                          "</div>"+
                                        "</td>"+
                                      "</tr>");
                                      numeroID = numeroID +1;

                          $("#tabla>tbody").append("<tr id='"+numeroID+"'>"+
                                      "<td>"+
                                        "<div class='input-group'>"+
                                        "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Localizacion</span>"+
                                        "<input type='text' class='form-control' name='malFuncionamiento[]'id='malFuncionamiento' readonly value='"+malFuncionamiento+"'>"+
                                        "</div>"+
                                      "</td>"+
                                      "<td>"+
                                        "<div class='input-group'>"+
                                        "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Localizacion</span>"+
                                        "<input type='text' class='form-control' name='localizacion[]'id='localizacion' readonly value='"+localizacion+"'>"+
                                        "</div>"+
                                      "</td>"+
                                      "<td class='eliminar'>"+
                                        "<button class='btn btn-icon btn-danger' type='button' id='deletRow' name='deletRow'>"+
                                        "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>"+
                                        "<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>"+
                                        "<path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>"+
                                        "</svg>"+
                                        "</button>"+
                                      "</td>"+
                                    "</tr>");              

                                      $("#tipo").val(''); 
                                      $("#rol").val(''); 
                                      $("#fabricante").val('');    
                                      $("#modelo").val('');  
                                      $("#serial").val(''); 
                                      $("#capacidad").val('');
                                      $("#malFuncionamiento").val(''); 
                                      $("#localizacion").val('');                           
    
                                      $("#stateRow").html("<span  class='bien text-center'><h5 ></h5></span>");

                                      numeroID = numeroID +1;
    } else {
      $("#stateRow").html("<span  class='menor' ><h5 >Llene todos los campos</h5></span>");
    }
          
  });
  $(document).on("click", ".eliminar", function() {
    
    
    if (eliminar != 0) {
        //$(this).parents('tr').remove();
        var idValor = $(this).parents('tr').attr('id');

          $('#'+idValor).remove();
          var cont1 = idValor-1;
          $('#'+cont1).remove();
          var cont2 = idValor-2;
          $('#'+cont2).remove();
        
        eliminar = eliminar-1;
    }
      
  });

  $(document).on("click", ".borrar", function(){
  $("#tipo").val(''); 
  $("#rol").val('');
  $("#fabricante").val('');
  $("#modelo").val('');
  $("#serial").val('');
  $("#capacidad").val('');
  $("#malFuncionamiento").val(''); 
  $("#localizacion").val('');
  $("#estado").html("<span  class='mayor'><h5 class='bien'></h5></span>");
});

  function validar() {  

  }

 function guardarDiscoVolcado() {

    eliminar = eliminar+1;
    
          var tipo = document.getElementById("tipoVolcadoPrueba");
          var selectedTipo = tipo.options[tipo.selectedIndex].text;
          var fabricante = document.getElementById("fabricanteVolcadoPrueba").value;
          var factor = document.getElementById("factorVolcadoPrueba");
          var selectedFactor = factor.options[factor.selectedIndex].text;
          var modelo = document.getElementById("modeloVolcadoPrueba").value;
          var serie = document.getElementById("serieVolcadoPrueba").value;
          var capacidad = document.getElementById("capacidadVolcadoPrueba").value;
          var conexion = document.getElementById("conexionVolcadoPrueba").value;
          var compra = document.getElementById("compraMonedaVolcadoPrueba").value;
          var venta = document.getElementById("ventaMonedaVolcadoPrueba").value;

          
          $("#tabla>tbody").append("<tr id='"+numeroID+"'>"+
                                      "<td>"+
                                        "<div class='input-group'>"+
                                        "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Tipo</span>"+
                                        "<input type='text' class='form-control' name='tipoVolcado[]'id='tipoVolcado' readonly value='"+selectedTipo+"'>"+
                                        "</div>"+
                                      "</td>"+
                                      "<td>"+
                                      "<div class='input-group'>"+
                                        "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Fabricante</span>"+
                                        "<input type='text' class='form-control' name='fabricanteVolcado[]'id='fabricanteVolcado' readonly value='"+fabricante+"'>"+
                                        "</div>"+
                                      "</td>"+
                                      "<td>"+
                                        "<div class='input-group'>"+
                                        "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Factor de Forma</span>"+
                                        "<input type='text' class='form-control' name='factorVolcado[]'id='factorVolcado' readonly value='"+selectedFactor+"'>"+
                                        "</div>"+
                                      "</td>"+
                                    "</tr>");

                                    numeroID = numeroID +1;
                      $("#tabla>tbody").append("<tr id='"+numeroID+"'>"+
                                      
                                      "<td>"+
                                        "<div class='input-group'>"+
                                        "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Modelo</span>"+
                                        "<input type='text' class='form-control' name='modeloVolcado[]'id='modeloVolcado' readonly value='"+modelo+"'>"+
                                        "</div>"+
                                      "</td>"+
                                      "<td>"+
                                        "<div class='input-group'>"+
                                        "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Serie</span>"+
                                        "<input type='text' class='form-control' name='serieVolcado[]'id='serieVolcado' readonly value='"+serie+"'>"+
                                        "</div>"+
                                      "</td>"+
                                      "<td>"+
                                        "<div class='input-group'>"+
                                        "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Capacidad</span>"+
                                        "<input type='text' class='form-control' name='capacidadVolcado[]'id='capacidadVolcado' readonly value='"+capacidad+"'>"+
                                        "</div>"+
                                      "</td>"+
                                    "</tr>");
                                    numeroID = numeroID +1;

                        $("#tabla>tbody").append("<tr id='"+numeroID+"'>"+
                                    "<td>"+
                                      "<div class='input-group'>"+
                                      "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Conexion</span>"+
                                      "<input type='text' class='form-control' name='conexionVolcado[]'id='conexionVolcado' readonly value='"+conexion+"'>"+
                                      "</div>"+
                                    "</td>"+
                                    "<td>"+
                                      "<div class='input-group'>"+
                                      "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Precio Compra</span>"+
                                      "<input type='text' class='form-control' name='compraMonedaVolcado[]'id='compraMonedaVolcado' readonly value='"+compra+"'>"+
                                      "</div>"+
                                    "</td>"+
                                    "<td>"+
                                      "<div class='input-group'>"+
                                      "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Precio Venta</span>"+
                                      "<input type='text' class='form-control' name='ventaMonedaVolcado[]'id='ventaMonedaVolcado' readonly value='"+venta+"'>"+
                                      "</div>"+
                                    "</td>"+
                                    "<td class='eliminar'>"+
                                      "<button class='btn btn-icon btn-danger' type='button' id='deletRow' name='deletRow'>"+
                                      "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>"+
                                      "<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>"+
                                      "<path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>"+
                                      "</svg>"+
                                      "</button>"+
                                    "</td>"+
                                  "</tr>");              

                                      $("#tipoVolcadoPrueba").val(''); 
                                      $("#factorVolcadoPrueba").val(''); 
                                      $("#fabricanteVolcadoPrueba").val('');    
                                      $("#modeloVolcadoPrueba").val('');  
                                      $("#serieVolcadoPrueba").val(''); 
                                      $("#capacidadVolcadoPrueba").val('');
                                      $("#conexionVolcadoPrueba").val(''); 
                                      $("#compraMonedaVolcadoPrueba").val('');
                                      $("#ventaMonedaVolcadoPrueba").val(''); 

                                    $('#volcado').modal('hide');

                                    numeroID = numeroID +1;
        
}


function validarTabla(){ 
  
  var validado = true;

  var fabricante = document.getElementById("fabricante").value;
  var modelo = document.getElementById("modelo").value;
  var serial = document.getElementById("serial").value;
  var localizacion = document.getElementById("localizacion").value;

  if (fabricante == '' || modelo == '' || serial == '' || localizacion == '') {
    return false;
  } else {
    return true;
  }
  
}
function validarInfo(){
    if($("#infoCliente").val() == ""){
      $("#estadoInfo").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
    }else{
      if ($("#infoCliente").val().length < 5) {
             $("#estadoInfo").html(
                 "<span  class='menor'><h5 class='menor'>Ingrese de 5 a 50 caracteres</h5></span>");
         } else {
          if ($("#infoCliente").val().length > 50) {
                 $("#estadoInfo").html(
                     "<span  class='menor'><h5 class='menor'>Ingrese menos de 50 caracteres</h5></span>");
             } else {
      
                $("#estadoInfo").html("<span  class='bien'><h5 >Válido</h5></span>");
              }
          }
      }
  }
  
  function validarTiempo(){
    if($("#tiempo").val() == ""){
      $("#estadoTiempo").html("<span  class='error'><h5 class='menor'></h5></span>"); 
    }else{
      if ($("#tiempo").val().length < 3) {
             $("#estadoTiempo").html("<span  class='menor'><h5 class='menor'>" +
              "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
              "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
              "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
              "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
              "Ingrese de 3 a 50 caracteres</h5></span>");
         } else {
          if ($("#tiempo").val().length > 50) {
                 $("#estadoTiempo").html(
                     "<span  class='menor'><h5 class='menor'>"+
                    "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                    "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                    "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                    "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                      
                      "Ingrese menos de 50 caracteres</h5></span>");
             } else {
      
                $("#estadoTiempo").html("<span  class='bien'><h5 >"+
                  "&nbsp;&nbsp;&nbsp;"+
                  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                  "Válido</h5></span>");
              }
          }
          
    }
  }
  
  document.oncontextmenu = function(){return false}
  
            function mayus(e) {
              $("#stateRow").html("<span  class='bien'><h5 ></h5></span>");
                e.value = e.value.toUpperCase();
            }
