
@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">REGISTRAR NUEVO PRODUCTO</h1>
<style>
  .menor{
              color:red;
              font-size: medium;
          }
          .error{
              color:#cf1111;
              font-size: medium;
          }
          .bien{
               color: rgb(15, 208, 67);
              font-size: medium;
          }
</style>
<body>
    <div class="card">
      
        <div class="card-body">
     
               <form action="{{url('/producto/nuevo')}}" id="formulario" method="POST">
                 
                 @csrf
                 <div class="card">
                     <div class="card-body">
                       <br>
                       <div class="row">
                         <div class="col-5">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Dispositivo</span>
                             <select name="dispositivo" id="dispositivo" class="form-control" class="btn-block" >
                              <option disabled  selected>Tipo de Dispositivo</option>
                              <option value="HDD">HDD</option>
                              <option value="SSD">SSD</option>
                              <option value="M2">M2</option>
                              <option value="CD/DVD">CD/DVD</option>
                              <option value="Unidad Flash">Unidad Flash</option>
                              <option value="Tarjeta de Memoria">Tarjeta de Memoria</option>
                              <option value="Impresora">Impresora</option>
                              <option value="Memoria">Memoria</option>
                              <option value="herramientas de cambio de cabezales">herramientas de cambio de cabezales</option>
                              <option value="herramientas de disco duro">herramientas de disco duro</option>
                              <option value="herramientas de desapilado de fuerza bruta">herramientas de desapilado de fuerza bruta</option>
                              <option value="Laptop">Laptop</option>
                              <option value="Notebook">Notebook</option>
                              <option value="Otro(Dispositivo HDD)">Otro(Dispositivo HDD)</option>
                              <option value="PC">PC</option>
                              <option value="Telefono Celular">Telefono Celular</option>
                              <option value="Disco Blu-ray">Disco Blu-ray</option>
                              <option value="Tablet">Tablet</option>
                              <option value="FDD">FDD</option>
                            </select>
                           </div>
                         </div>
                         <div class="col-4">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Conexión</span>
                             <select name="connection" id="connection" class="form-control" class="btn-block" >
                              <option disabled  selected>Tipo de Conexion</option>
                              <option value="M2">M2</option>
                              <option value="mSATA">mSATA</option>
                              <option value="PATA">PATA</option>
                              <option value="PCI Express">PCI Express</option>
                              <option value="SAS">SAS</option>
                              <option value="SATA">SATA</option>
                              <option value="SATA Express">SATA Extress</option>
                              <option value="USB 2.0">USB 2.0</option>
                              <option value="USB 3.0">USB 3.0</option>
                              <option value="USB 3.1">USB 3.1</option>
                              <option value="otro">Otro</option>

                            </select>
                           </div>
                         </div>
                         <div class="col-3">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Factor de Forma</span>
                             <select name="factor" id="factor" class="form-control" class="btn-block" >
                              <option disabled  selected>Tipo</option>
                              <option value="1.0">1.0"</option>
                              <option value="1.3">1.3"</option>
                              <option value="1.8">1.8"</option>
                              <option value="2.5">2.5"</option>
                              <option value="3.5">3.5"</option>
                              <option value="5.25">5.25"</option>
                              <option value="otro">Otro</option>
                            </select>
                           </div>
                         </div>
                       </div>
                       <br>
                       <div class="row">
                         <div class="col-5">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Fabricante</span>
                             <select name="fabricante" class="form-control" class="btn-block" required>
                              <option disabled selected>Elija el Fabricante</option>
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
                           </div>
                         </div>
                         <div class="col-4">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Modelo</span>
                           <input type="text" id="modelo" name="modelo" class="form-control" 
                             required onkeyup="validarCiudad()" autocomplete="off" onkeypress="return ( (event.charCode == 45 )|| (event.charCode >= 48 && event.charCode <= 57)|| (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                            </div>
                            <span id="estadoCiudad"></span>
                         </div>
                         <div class="col-3">
                          <div class="input-group">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Rol</span>
                            <select name="rol" id="rol" class="form-control" class="btn-block" >
                             <option disabled  selected>Tipo</option>
                             <option value="Disco para Volcado">Disco para Volcado</option>
                             <option value="Otro">Otro</option>
                           </select>
                          </div>
                        </div>
                       </div>
                       <br>
                       <div class="row">
                        <div class="col-4">
                          <div class="input-group">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Capacidad</span>
                          <input type="text" id="modelo" name="modelo" class="form-control" placeholder="GB, TB"
                            required autocomplete="off" onkeyup="validarCapacidad()" onkeypress="return ((event.charCode >= 84 && event.charCode <= 84)||(event.charCode >= 116 && event.charCode <= 116)||(event.charCode >= 98 && event.charCode <= 98)||
                            (event.charCode >= 103 && event.charCode <= 103)||(event.charCode >= 66 && event.charCode <= 66)||(event.charCode >= 71 && event.charCode <= 71)||(event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
                           </div>
                           <span id="estadoCiudad"></span>
                        </div>
                        <div class="col-4">
                          <div class="input-group">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Firmware</span>
                          <input type="text" id="modelo" name="modelo" class="form-control" 
                            required onkeyup="validarCiudad()" autocomplete="off" onkeypress="return ( (event.charCode == 45 )|| (event.charCode >= 48 && event.charCode <= 57)|| (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                           </div>
                           <span id="estadoCiudad"></span>
                        </div>
                       </div>
                       <br>
                       <div class="row">
                         <div class="col-6">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Ubicación</span>
                           <input type="text" id="ubicacion" name="ubicacion" class="form-control" 
                             required onkeyup="validarPais()" autocomplete="off" onkeypress="return ( (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209) || (event.charCode == 45))">
                           </div>
                           <span id="estadoPais"></span>
                         </div>
                         <div class="col-6">
                           <div class="input-group">
                             <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Distribuidora</span>
                             <input type="text" id="distribuidora" name="distribuidora" class="form-control" 
                             required onkeyup="validarPais()" autocomplete="off" onkeypress="return ( (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209) || (event.charCode == 45))">
                           </div>
                         </div>
                       </div>
                       <br>
                       <div class="row">
                         <div class="col-4">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Precio</span>
                             <input type="text" class="form-control " name="precio" id="precio" onblur="resultadoFinal()"
                                           onkeypress="return ((event.charCode == 44) || (event.charCode >= 48 && event.charCode <= 57))">
                           </div>
                         </div>
                         <div class="col-4">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">VAT (%)</span>
                             <input type="text" class="form-control " name="vat" id="vat" onblur="resultadoFinalVat()"
                                           onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                           </div>
                         </div>
                         <div class="col-4">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Precio Final</span>
                             <input type="text" class="form-control " name="precioFin" id="precioFin" readonly>
                           </div>
                         </div>
                       </div>
                     </div> 
                   </div>
   
                   <div class="card">
                     <div class="card-body">
                       <h4><strong>Seriales</strong></h4>
                       &nbsp;&nbsp;&nbsp;&nbsp;<td class="btn-block"><button type="button" id="adicional" name="adicional" class="btn btn-primary" style="border-radius: 50%;">
                        <i class="fa fa-plus"></i> </button>
                       </td>
                           <div class="table-responsive">
                         <table class="table" id="tabla">
                             <thead class="thead">
                                 
                             </thead>
                             <tbody id="tabla">
                                 <span id="estadoBoton"></span>
                                 <tr id="columna-0">
                                     <td>
                                       <div class="input-group">
                                         <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Numero Serial</span>
                                           <input type="text" class="form-control " name="serial[]"id="serial"
                                           onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 45))">
                                       </div>
                                     </td>
                                     <td class='borrar'>
                                         <button class='btn btn-icon btn-danger' type='button' id='deletRow' name='deletRow'>
                                         <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                         <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                         <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                         </svg>
                                         </button>
                                       </td>
                                 </tr>
                     
                             </tbody>
                         </table>
                         <div class="div text-center">
                           <span id="estadoTabla"></span>
                         </div>
                     </div>
                     </div>
                     
                   </div>
   
   
                   <label style="font-size: 16px;">Nota</label>
                   <br>
                   <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" name="nota" id="nota" cols="140" rows="4"></textarea>
   
   
   
                 </div>
   
                 <div class="form-group">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="/productos" class="btn btn-danger my-2 my-sm-0">Regresar</a>
                 
                   <button class="btn btn-primary" type="submit" >Guardar</button>
                 </div> 
         </div>
                   
   
         </form>
                   
   
   </body>

   <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
   <script>

    $(function() { 


    var eliminar = 0;

    $("#adicional").on('click', function() {

      var nombre = document.getElementById("serial").value;
      if (nombre != "") {
        eliminar = eliminar+1;
            

        $("#tabla>tbody").append("<tr>"+
                                            "<td>"+
                                              "<div class='input-group'>"+
                                              "<span class='input-group-text' style='background:rgb(29, 145, 195); color: aliceblue'>Numero Serial</span>"+
                                              "<input type='text' class='form-control' name='serial[]'id='serial' readonly value='"+nombre+"'>"+
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
      
        
        $("#serial").val('');
        $("#estadoTabla").html("<span  class='mayor'><h5 class='menor'></h5></span>");
      } else {
        $("#estadoTabla").html("<span  class='mayor'><h5 class='menor'>Llene el campo numero serial</h5></span>");
      }
        
    });

    $(document).on("click", ".eliminar", function(){
      if (eliminar != 0) {
          $(this).parents('tr').remove();
          eliminar = eliminar-1;
      }
    });

  });

    function resultadoFinal(){
      var precio = document.getElementById("precio").value;
      document.getElementById("precioFin").value = precio;
    }

    function resultadoFinalVat(){
      var precio = document.getElementById("precio").value;
      var vat = document.getElementById("vat").value;

      var res = (precio*vat)/100;
      var suma = Number(precio) + Number(res);
      document.getElementById("precioFin").value = suma;
    }

    function validarCapacidad(){
    if($("#capacidad").val() == ""){
      $("#estadoCapacidad").html("<span  class='error'><h5 class=''>Este campo no puede estar vacío</h5></span>"); 
    }else{ 
        $("#estadoCapacidad").html("<span  class='bien'><h5 class=''>Válido</h5></span>");              
    }
  }
   </script>

@endsection