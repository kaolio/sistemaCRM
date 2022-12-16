@extends('adminlte::page')

@section('content_header')
    <h1 align="center" style="font-weight: 700">REGISTRAR NUEVO DISCO</h1>
@stop



@section('content')

<div class="card">
  <div class="container-fluid">
    <form class="m-3" action="{{ url('/inventario/nuevo') }}" method="POST">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-6" style="padding-top: 32px">
          <div class="input-group">
            <span class="input-group-text" style="background:rgb(2, 117, 216); color: aliceblue">Fabricante&nbsp;<strong>*</strong></span>
            <select name="manufactura" class="form-control" class="btn-block" required>
              <option value="">Elija el Fabricante</option>
              <option value="Seagate">Seagate</option>
              <option value="Toshiba">Toshiba</option>
              <option value="Samsung">Samsung</option>
              <option value="Verbatim">Verbatim</option>
              <option value="Wester Digital">Western Digital</option>
              <option value="SkayNet">SkyNet</option>
              <option value="Maxtor">Maxtor</option>
              <option value="Adata">Adata</option>
              <option value="Crucial">Crucial</option>
              <option value="Kingston">Kingston</option>
              <option value="Sony">Sony</option>
              <option value="Hitachi">Hitachi</option>
              <option value="Asus">Asus</option>
            </select>
            <span id="estadoManufactura"></span>
          </div>
        </div>
        <div class="form-group col-md-6 pb-17">
            <label for="inputPassword4">Modelo <strong>*</strong></label>
            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ingrese el modelo" autocomplete="off"
            value="{{ old('modelo') }}" onkeyup="validarModelo()" required
            onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
            <span id="estadoModelo"></span>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Número de Serie <strong>*</strong></label>
            <input type="text" class="form-control" id="numero_de_serie" name="numero_de_serie" autocomplete="off"
            placeholder="Ingrese número de serie" value="{{ old('numero_de_serie') }}" onkeyup="validarSerie()" autocomplete="off" required
            onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
            <span id="estadoSerie"></span>
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">Firmware <strong>*</strong></label>
            <input type="text" class="form-control" id="firmware" name="firmware" autocomplete="off"
            placeholder="Ingrese el firmware" value="{{ old('firmware') }}" onkeyup="validarFirmware()" required
            onkeypress="return ((event.charCode >= 45 && event.charCode <= 45) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
            <span id="estadoFirmware"></span>
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">Capacidad<strong>*</strong></label>
             <input type="text" style="text-transform:uppercase" class="form-control" id="capacidad" name="capacidad" autocomplete="off" placeholder="GB, TB" 
            value="{{ old('capacidad') }}" onkeyup="validarCapacidad()" required maxlength="8" onkeypress="return ((event.charCode >= 84 && event.charCode <= 84)||(event.charCode >= 116 && event.charCode <= 116)||(event.charCode >= 98 && event.charCode <= 98)||
                              (event.charCode >= 103 && event.charCode <= 103)||(event.charCode >= 66 && event.charCode <= 66)||(event.charCode >= 71 && event.charCode <= 71)||(event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">      
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4" style="padding-top: 8px">
            <div class="input-group">
              <span class="input-group-text" style="background:rgb(2, 117, 216); color: aliceblue">Rol del Disco&nbsp;<strong>*</strong></span>
              <select name="rol" class="form-control" class="btn-block" required>
                <option value="">Elija el Rol</option>
                <option value="Datos">Datos</option>
                <option value="Dispositivo a Recuperar">Dispositivo a Recuperar</option>
                <option value="Donante">Donante</option>
                <option value="Clon">Clon</option>
              </select>
              <span id="estadoManufactura"></span>
            </div>
          </div>
            <div class="form-group col-md-4" style="padding-top: 8px">
              <div class="input-group">
                <span class="input-group-text" style="background:rgb(2, 117, 216); color: aliceblue">Tipo de Almacenamiento&nbsp;<strong>*</strong></span>
                <select name="tipo" class="form-control" class="btn-block" required>
                  <option value="">Elija el Tipo</option>
                  <option value="HDD">HDD</option>
                  <option value="SSD">SSD</option>
                  <option value="Otro">Otro</option>
                </select>
                <span id="estadoManufactura"></span>
              </div>
            </div>
            <div class="form-group col-md-4" style="padding-top: 8px">
              <div class="input-group">
                <span class="input-group-text" style="background:rgb(2, 117, 216); color: aliceblue">Factor de Forma &nbsp;<strong>*</strong></span>
                <select class="form-control" class="btn-block" id="factor_de_forma" name="factor_de_forma" required>
                  <option value="">Elija el Factor de Forma</option>
                  <option value="3.5 pulgadas ">3.5 pulgadas</option>
                  <option value="2.5 pulgadas">2.5 pulgadas</option>
                  <option value="M2">M2</option>
                </select>
              </div>
            </div>
          </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="inputCity">PCB <strong>*</strong></label>
            <input type="text" class="form-control" id="pbc" name="pbc" placeholder="Ingrese la placa del disco" autocomplete="off"
            value="{{ old('pbc') }}" onkeyup="validarPbc()" required
            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
            <span id="estadoPbc"></span>
          </div>
          <div class="form-group col-md-4">
            <label for="inputCity">Ubicación</label>
              <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ingrese la ubicación" autocomplete="off"
              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
            </div>
          </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputCity">Nota</label>
          <textarea class="form-control" id="nota" name="nota" rows="1" cols="20" placeholder="Ingrese una nota del disco" autocomplete="off"></textarea>
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">Cabezal</label>
          <input type="text" class="form-control" id="cabecera" name="cabecera" autocomplete="off" placeholder="Ingrese el cabezal del disco" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
        </div>
        <div class="form-group col-md-4">
          <label for="inputCity">Información del Cabezal</label>
          <input type="text" class="form-control" id="info_de_cabecera" name="info_de_cabecera" autocomplete="off"
          placeholder="Ingrese información acerca del cabezal" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
        </div>
        <span class="mb-4"><strong>*</strong> Campos Obligatorios</span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success my-2 my-sm-0">Registrar</button>
      </div>
    </div>
  </form>
</div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
  $(function() {
      
      console.log($('#cliente').val());
      if ($('#cliente').val() != "") {
        $('#cliente').prop('readonly', true);
      }
    
      $('#cliente').keyup(function() {
          var query = $(this).val();
          if (query != '') {
              var _token = $('input[name="_token"]').val();
              $.ajax({
                  url: '/autocompletarCliente',
                  method: 'POST',
                  data: {
                      query: query,
                      _token: _token,
                  },
                  success: function(data) {
                      $('#codigoDatalist').fadeIn();
                      $('#codigoDatalist').html(data);
                  }
              
              });
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
          $("#stateRow").html("<span  class='menor' ><h5 >Llene todos los campos</h5></span>");
        }
              
      });
      $(document).on("click", ".eliminar", function() {
        
        
        if (eliminar != 0) {
            $(this).parents('tr').remove();
            eliminar = eliminar-1;
        }
          
      });
    
      $(document).on("click", ".borrar", function(){
      $("#tipo").val('HDD'); 
      $("#rol").val('Paciente');
      $("#fabricante").val('');
      $("#modelo").val('');
      $("#serial").val('');
      $("#localizacion").val('');
      $("#estado").html("<span  class='mayor'><h5 class='bien'></h5></span>");
    });
    });
    
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
</script>
<link rel="stylesheet" href="{{ URL::asset('estilos/style.css') }} ">

<br>
@endsection

