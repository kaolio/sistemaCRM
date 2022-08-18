document.oncontextmenu = function(){return false}
  
            function mayus(e) {
              $("#stateRow").html("<span  class='bien'><h5 ></h5></span>");
                e.value = e.value.toUpperCase();
            }
function validarCorreo() {
    $("#estadoTabla").html("<span  class='mayor'><h5 class='menor'></h5></span>");
            if($("#valor").val() == ""){
                $("#estado").html("<span  class='menor'><h5 class='menor'> </h5></span>");
               }else{
                var regex = /^[a-zA-Z0-9]{2}[a-zA-Z0-9.-_]+@[a-zA-Z0-9]+[.]+[a-zA-Z]{2,3}$/;
                if (!regex.test($("#valor").val())) {
                    $("#estado").html("<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Correo electronico incorrecto</h5></span>");
                } else {
                    $("#estado").html("<span  class='mayor'><h5 class='bien'>&nbsp;&nbsp;Correo electronico valido</h5></span>");
                }      
           }
        }
  function validarTelefono() {
    $("#estadoTabla").html("<span  class='mayor'><h5 class='menor'></h5></span>");
            if($("#valor").val() == ""){
                $("#estado").html("<span  class='menor'><h5 class='menor'> </h5></span>");
               }else{
                var regex = /^[8-9]{1}[0-9]{8}$/;
                if (!regex.test($("#valor").val())) {
                    $("#estado").html("<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Telefono incorrecto</h5></span>");
                } else {
                    $("#estado").html("<span  class='mayor'><h5 class='bien'>&nbsp;&nbsp;Telefono valido</h5></span>");
                }      
           }
        }
  function validarCelular() {
    $("#estadoTabla").html("<span  class='mayor'><h5 class='menor'></h5></span>");
            if($("#valor").val() == ""){
                $("#estado").html("<span  class='menor'><h5 class='menor'> </h5></span>");
               }else{
                var regex = /^[6-7]{1}[0-9]{8}$/;
                if (!regex.test($("#valor").val())) {
                    $("#estado").html("<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Celular incorrecto</h5></span>");
                } else {
                    $("#estado").html("<span  class='mayor'><h5 class='bien'>&nbsp;&nbsp;Celular valido</h5></span>");
                }      
           }
        }
  function validarSkype() {
    $("#estadoTabla").html("<span  class='mayor'><h5 class='menor'></h5></span>");
            if($("#valor").val() == ""){
                $("#estado").html("<span  class='menor'><h5 class='menor'> </h5></span>");
               }else{
                var regex = /^@[a-zA-Z0-9-_]{3,20}$/;
                if (!regex.test($("#valor").val())) {
                    $("#estado").html("<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Formato incorrecto</h5></span>");
                } else {
                    $("#estado").html("<span  class='mayor'><h5 class='bien'>&nbsp;&nbsp;Formato valido</h5></span>");
                }      
           }
        }


        function validarNombre() {
          if($("#nombreCliente").val() == ""){
            $("#estadoNombre").html("<span  class='error'><h5 class='menor'></h5></span>");
            }else{
                if ($("#nombreCliente").val().length < 3) {
                    $("#estadoNombre").html(
                        "<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Ingrese de 3 a 50 caracteres</h5></span>");
                } else {
                    if ($("#nombreCliente ").val().length > 50) {
                        $("#estadoNombre").html(
                            "<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Ingrese menos de 50 caracteres</h5></span>");
                    } else {
                        
                            $("#estadoNombre").html("<span  class='bien'><h5 class='bien'>&nbsp;&nbsp;Válido </h5></span>");
                    }
                } 
            }
          }

          function mayus(e) {
              e.value = e.value.toUpperCase();
          }

          function validarDireccion(){
            if($("#direccion").val() == ""){
              $("#estadoDireccion").html("<span  class='error'><h5 class='menor'></h5></span>");
            }else{
                if ($("#direccion").val().length < 3) {
                    $("#estadoDireccion").html(
                        "<span  class='menor'><h5 class='menor'>"+
                          "&nbsp;&nbsp;&nbsp;&nbsp;"+
                          "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                          "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ingrese de 3 a 50 caracteres</h5></span>");
                } else {
                    if ($("#direccion").val().length > 50) {
                        $("#estadoDireccion").html(
                            "<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Ingrese menos de 50 caracteres</h5></span>");
                    } else {
                        
                            $("#estadoDireccion").html("<span  class='bien'><h5 class='bien'>"+
                              "&nbsp;&nbsp;&nbsp;&nbsp;"+
                              "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                              "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Válido </h5></span>");
                    }
                } 
            }
          }

          function validarCiudad(){
            if($("#ciudad").val() == ""){
              $("#estadoCiudad").html("<span  class='error'><h5 class='menor'></h5></span>");
            }else{
                if ($("#ciudad").val().length < 3) {
                    $("#estadoCiudad").html(
                        "<span  class='menor'><h5 class='menor'>"+
                          "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                          "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                          "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                          "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ingrese de 3 a 50 caracteres</h5></span>");
                } else {
                    if ($("#ciudad").val().length > 50) {
                        $("#estadoCiudad").html(
                            "<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Ingrese menos de 50 caracteres</h5></span>");
                    } else {
                        
                            $("#estadoCiudad").html("<span  class='bien'><h5 class='bien'>"+
                              "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                              "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                              "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+
                              "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Válido </h5></span>");
                    }
                } 
            }
          }

          function validarPais(){
            if($("#pais").val() == ""){
              $("#estadoPais").html("<span  class='error'><h5 class='menor'></h5></span>");
            }else{
                if ($("#pais").val().length < 3) {
                    $("#estadoPais").html(
                        "<span  class='menor'><h5 class='menor'>"+
                          "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ingrese de 3 a 50 caracteres</h5></span>");
                } else {
                    if ($("#pais").val().length > 50) {
                        $("#estadoPais").html(
                            "<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Ingrese menos de 50 caracteres</h5></span>");
                    } else {
                        
                            $("#estadoPais").html("<span  class='bien'><h5 class='bien'>"+
                              "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Válido </h5></span>");
                    }
                } 
            }
          }

          function enviarCliente(){
            $("#formulario").attr("action","{{url('/cliente/nuevo/1')}}");
          }
          function enviarOrden(){
            $("#formulario").attr("action","{{url('/cliente/nuevo/2')}}");
          }
 
           
$(document).ready(function(){
  
    $('#valor').get(0).type = 'text';
    $("#valor").attr("onkeyup","validarCorreo()"); 
    $("#valor").attr("placeholder","Example@domain.com");
    $("#valor").attr("onkeypress","return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 64) || (event.charCode == 46) || (event.charCode == 95) || (event.charCode == 45))")
      $("#tipo").change(function(){
  
      var tipo = document.getElementById("tipo");
      var selectedTipo = tipo.options[tipo.selectedIndex].text;
  
      if (selectedTipo == 'Correo Electrónico') {
          $("#valor").val('');
          $("#nombre").val('');
          $('#valor').get(0).type = 'text';
          $("#valor").attr("onkeyup","validarCorreo()"); 
          $("#valor").attr("placeholder","Example@domain.com"); 
          $("#valor").attr("onkeypress","return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 64) || (event.charCode == 46) || (event.charCode == 95) || (event.charCode == 45))")
          $("#estado").html("<span  class='mayor'><h5 class='bien'></h5></span>");
      } else {
        if (selectedTipo == 'Telefono') {
            $("#valor").val('');
            $("#nombre").val('');
            $('#valor').get(0).type = 'text';
            $("#valor").attr("onkeyup","validarTelefono()");
            $("#valor").attr("placeholder","");
            $("#valor").attr("onkeypress","return ((event.charCode >= 48 && event.charCode <= 57))")
            $("#estado").html("<span  class='mayor'><h5 class='bien'></h5></span>");
        } else {
          if (selectedTipo == 'Celular') {
            $("#valor").val('');
            $("#nombre").val('');
            $('#valor').get(0).type = 'text';
            $("#valor").attr("onkeyup","validarCelular()"); 
            $("#valor").attr("placeholder","");
            $("#valor").attr("onkeypress","return ((event.charCode >= 48 && event.charCode <= 57))")
            $("#estado").html("<span  class='mayor'><h5 class='bien'></h5></span>");
          } else {
              $("#valor").val('');
              $("#nombre").val('');
              $('#valor').get(0).type = 'text';
              $("#valor").attr("onkeyup","validarSkype()"); 
              $("#valor").attr("placeholder","@Example");
              $("#valor").attr("onkeypress","return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 64) || (event.charCode == 95) || (event.charCode == 45))")
              $("#estado").html("<span  class='mayor'><h5 class='bien'></h5></span>");
          }
        }
      }
          
      });
  });

  $(function() {


    var eliminar = 0;

    $("#adicional").on('click', function() {
      
      if (validarTabla()) {

        eliminar = eliminar+1;
            
        var tipo = document.getElementById("tipo");
        var selectedTipo = tipo.options[tipo.selectedIndex].text;
        var valor = document.getElementById("valor").value;
        var nombre = document.getElementById("nombre").value;

        $("#tabla>tbody").append("<tr>"+
                                            "<td>"+
                                              "<div class='input-group'>"+
                                              "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Tipo</span>"+
                                              "<input type='text' class='form-control' name='tipo[]'id='tipo' readonly value='"+selectedTipo+"'>"+
                                              "</div>"+
                                            "</td>"+
                                            "<td>"+
                                              "<div class='input-group'>"+
                                              "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Valor</span>"+
                                              "<input type='text' class='form-control' name='valor[]'id='valor' readonly value='"+valor+"'>"+
                                              "</div>"+
                                            "</td>"+
                                            "<td>"+
                                              "<div class='input-group'>"+
                                              "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Nombre</span>"+
                                              "<input type='text' class='form-control' name='nombre[]'id='nombre' readonly value='"+nombre+"'>"+
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
      } else {
        $("#estadoTabla").html("<span  class='mayor'><h5 class='menor'>Llene todos los campos</h5></span>");
      }
        
        $("#valor").val('');
        $("#nombre").val('');
        $("#estado").html("<span  class='mayor'><h5 class='menor'></h5></span>");
            
    });

    $(document).on("click", ".eliminar", function(){
      if (eliminar != 0) {
          $(this).parents('tr').remove();
          eliminar = eliminar-1;
      }
    });

    $(document).on("click", ".borrar", function(){
      $("#tipo").val('correo'); 
      $("#valor").val('');
      $("#nombre").val('');
      $("#valor").attr("onkeyup","validarCorreo()");
      $("#valor").attr("placeholder","Example@domain.com");
      $("#estado").html("<span  class='mayor'><h5 class='bien'></h5></span>");
    });
});

function validarTabla(){ 
      
    var validado = true;

    var valor = document.getElementById("valor").value;
    var nombre = document.getElementById("nombre").value;

    if (valor == '' || nombre == '') {
      return false;
    } else {
      return true;
    }
    
  }