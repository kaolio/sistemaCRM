document.oncontextmenu = function(){return false}
  
            function mayus(e) {
              $("#stateRow").html("<span  class='bien'><h5 ></h5></span>");
                e.value = e.value.toUpperCase();
            }

function validarModelo(){
    if($("#modelo").val() == ""){
      $("#estadoModelo").html("<span  class='error'><h5 class=''>Este campo no puede estar vacío</h5></span>");
    }else{
          if ($("#modelo").val().length < 5) {
              $("#estadoModelo").html("<span  class='error'><h5 class=''>Ingrese de 5 hasta 40 caracteres</h5></span>");
          }else{
              if($("#modelo").val().length > 40) {
                  $("#estadoModelo").html("<span  class='error'><h5 class=''>Ingrese menos de 40 caracteres</h5></span>");
              }else{
                      $("#estadoModelo").html("<span  class='bien'><h5 class=''> Modelo Válido </h5></span>");
              }
          } 
    }
  }
  function validarSerie(){
        if($("#numero_de_serie").val() == ""){
                $("#estadoSerie").html("<span  class='error'><h5 class=''>Este campo no puede estar vacío</h5></span>"); 
    }else{
          if ($("#numero_de_serie").val().length < 5) {
              $("#estadoSerie").html("<span  class='error'><h5 class=''>Ingrese de 5 hasta 40 caracteres</h5></span>");
          }else {
              if ($("#numero_de_serie").val().length > 40) {
                  $("#estadoSerie").html("<span  class='error'><h5 class=''>Ingrese menos de 40 caracteres</h5></span>");
              }else {
                      $("#estadoSerie").html("<span  class='bien'><h5 class=''> Número de serie Válido </h5></span>");
              }
          } 
    }
  }
  function validarFirmware(){
    if($("#firmware").val() == ""){
      $("#estadoFirmware").html("<span  class='error'><h5 class=''>Este campo no puede estar vacío</h5></span>"); 
    }else{
          if ($("#firmware").val().length < 4) {
              $("#estadoFirmware").html("<span  class='error'><h5 class=''>Ingrese de 5 hasta 40 caracteres</h5></span>");
          }else {
              if ($("#firmware").val().length > 40) {
                  $("#estadoFirmware").html("<span  class='error'><h5 class=''>Ingrese menos de 40 caracteres</h5></span>");
              }else {
                      $("#estadoFirmware").html("<span  class='bien'><h5 class=''> Firmware Válido </h5></span>");
              }
          } 
    }
  }
  function validarCapacidad(){
    if($("#capacidad").val() == ""){
      $("#estadoCapacidad").html("<span  class='error'><h5 class=''>Este campo no puede estar vacío</h5></span>"); 
    }else{ 
        $("#estadoCapacidad").html("<span  class='bien'><h5 class=''>Válido</h5></span>");              
    }
  }
  function validarCapacidadTB(){
    if($("#capacidadTB").val() == ""){
      $("#estadoCapacidadTB").html("<span  class='error'><h5 class=''>Este campo no puede estar vacío</h5></span>"); 
    }else{ 
        $("#estadoCapacidadTB").html("<span  class='bien'><h5 class=''>Válido</h5></span>");              
    }
  }
  function mostrarCapacidad(answer) {
    document.getElementById(answer + 'Question').style.display = "block";
    if (answer == "GB") { // ocultar el div que no esta seleccionado
      document.getElementById('noQuestion').style.display = "none";
    } else if (answer == "TB") {
      document.getElementById('yesQuestion').style.display = "none";
    }
} 
  function validarPbc(){
    if($("#pbc").val() == ""){
      $("#estadoPbc").html("<span  class='error'><h5 class=''>Este campo no puede estar vacío</h5></span>"); 
    }else{
        $("#estadoPbc").html("<span  class='bien'><h5 class=''>Válido</h5></span>");
    }
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

  $(document).on("click", ".borrar", function(){
    $("#tipo").val('HDD'); 
    $("#rol").val('Paciente');
    $("#fabricante").val('');
    $("#modelo").val('');
    $("#serial").val('');
    $("#localizacion").val('');
    $("#estado").html("<span  class='mayor'><h5 class='bien'></h5></span>");
  });

  $(document).on("click", ".eliminar", function() {
        
        
    if (eliminar != 0) {
        $(this).parents('tr').remove();
        eliminar = eliminar-1;
    }
      
  });

  var eliminar = 0;

      $("#adicional").on('click', function() {

        if (validarTabla()) {
          eliminar = eliminar+1;
                //var iman = 0;
                //iman = iman + 1;
                //$("#tabla tbody tr:eq(0)").clone().appendTo("#tabla").attr("id", "columna-" + (iman)).find('input, select').attr('readonly', true).show();
                //adding row to end and start
                //$("#tabla>tbody").prepend("<tr><td>Test Row Prepend</td></tr>");
                var tipo = document.getElementById("tipo");
                var selectedTipo = tipo.options[tipo.selectedIndex].text;
                var rol = document.getElementById("rol");
                var selectedRol = rol.options[rol.selectedIndex].text;
                var fabricante = document.getElementById("fabricante").value;
                var modelo = document.getElementById("modelo").value;
                var serial = document.getElementById("serial").value;
                var localizacion = document.getElementById("localizacion").value;
                $("#tabla>tbody").append("<tr>"+
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

                                          $("#tipo").val('Tipo de Dispositivo'); 
                                          $("#rol").val('Escoja un rol'); 
                                          $("#fabricante").val('');    
                                          $("#modelo").val('');  
                                          $("#serial").val(''); 
                                          $("#localizacion").val('');                           
        
                                          $("#stateRow").html("<span  class='bien text-center'><h5 ></h5></span>");
        } else {
          $("#stateRow").html("<span  class='' ><h5 >Llene todos los campos</h5></span>");
        }
              
      });
      
