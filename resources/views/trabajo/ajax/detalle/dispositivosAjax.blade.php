<script>

    //lista de otros dispositivos en: dispositivos-de-trabajo/tabla otros disp. del cliente 
    $(document).ready(function() {

        var url = "{{URL('datosOtrosDispositivos')}}";
        $.ajax({
            url: "/trabajos/nuevo/detalle/datosOtrosDispositivos",
            type: "POST",
            data:{ 
                "_token": "{{ csrf_token() }}",
                "nombre": "{{$orden_elegida->id}}",
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                //console.log(dataResult);
                var resultData = dataResult.data;
                var bodyData = '';

                $.each(resultData,function(index,row){
                    datosOtrosDispositivos+="<tr>"
                    datosOtrosDispositivos+="<td>"+"<input type='checkbox'>"+"</td>"+"<td name='tipo[]' id=''>"+row.tipo+"</td><td name='fabricante[]' id=''>"+row.fabricante+"</td><td name='modelo[]' id=''>"+row.modelo+"</td>"
                    +"<td name='serial[]' id=''>"+row.serial+"</td><td name='localizacion[]' id=''>"+row.localizacion+"<td></td>"+
                    "<td class='eliminar'>"+  
                    
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
                    datosOtrosDispositivos+="</tr>";
                    
                })
                $("#datosOtrosDispositivos").append(datosOtrosDispositivos);
            }
        });
    });
    //
     //AJAX DE LA TABLA DE dispositivos/dispositivos de pacientes
     $(document).ready(function() {
            var url = "{{URL('datosPacientes')}}";
            
            $.ajax({
                url: "/trabajos/nuevo/detalle/datosPacientes",
                type: "POST",
                data:{ 
                    "_token": "{{ csrf_token() }}",
                    "nombre": "{{$orden_elegida->id}}",
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                   // console.log(dataResult);
                    var resultData = dataResult.data;
                    var bodyData = '';
                    $.each(resultData,function(index,row){
                        datosPacientes+="<tr>"
                        datosPacientes+="<td>"+"<input type='checkbox' id='moverUbicacion'>"+
                            "</td>"+"<td>"+row.tipo+"</td><td>"+row.fabricante+"</td><td>"+row.modelo+"</td>"
                        +"<td>"+row.serial+"</td><td>"+row.localizacion+"</td><td>"+row.diagnostico+"<td></td>"+
                        "<td>"+
                            "<button class='btn btn-icon btn-danger' type='button' id='btnDiagnostico' name='btnDiagnostico'>"+
                                "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>"+
                                    "<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>"+
                                    "<path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>"+
                                "</svg>"+
                            "</button>"+
                            "<button class='btn btn-primary'>"+
                                "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-left-right' viewBox='0 0 16 16'>"+
                                    "<path fill-rule='evenodd' d='M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z'/>"+
                                "</svg>"+
                            "</button>"+
                            "<button class='btn btn-primary'>"+
                                "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrows-move' viewBox='0 0 16 16'>"+
                                    "<path fill-rule='evenodd' d='M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z'/>"+
                                "</svg>"+
                            "</button>"+
                            "<button class='btn btn-success'>"+
                                 "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-download' viewBox='0 0 16 16'>"+
                                    "<path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/>"+
                                    "<path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'/>"+
                                "</svg>"+
                            "</button>"+
                     
                            //modal

                            "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#exampleModal2'>"+
                                "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-share' viewBox='0 0 16 16'>"+
                                    "<path d='M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z'/>"+
                                "</svg>"+
                            "</button>"+
 
    "<div class='modal fade' id='exampleModal2' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel2' aria-hidden='true'>"+
        "<div class='modal-dialog' role='document'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
                "<h5 class='modal-title' id='exampleModalLabel2' align='center'>Diagnóstico</h5>"+
                "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"+
                "<span aria-hidden='true'>&times;</span>"+
            "</button>"+
            "</div>"+
            "<div class='modal-body'>"+
                "<div class='container'>"+
                    "<p align='center'>Seleccionar diagnostico para el dispositivo: <br>"+
                    "</p>"+
                    "<div class='input-group md-2'>"+
                        "<span class='input-group-text'>Diagnóstico</span>"+
                        "<select id='selectDiagnostico' name='selectDiagnostico' class='form-control' class='btn-block'>"+
                            "<option value=''>No Establecido</option>"+
                            "<option value='Cabezal'>Cabezal</option>"+
                            "<option value='PCB'>PCB</option>"+
                            "<option value='Motor'>Motor</option>"+
                            "<option value='Lógico'>Lógico</option>"+
                            "<option value='Sectores malos'>Sectores malos</option>"+
                            "<option value='Firmware'>Firmware</option>"+
                            "<option value='Ransomware'>Ransomware</option>"+
                            "<option value='CD/DVD'>CD/DVD</option>"+
                            "<option value='Disco flexible'>Disco flexible</option>"+
                            "<option value='NAND lógico'>NAND Logico</option>"+
                            "<option value='NAND electrónico'>NAND Electronico</option>"+
                            "<option value='SSD lógico'>SSD Lógico</option>"+
                            "<option value='SDD firmware'>SDD Firmware</option>"+
                            "<option value='Teléfono móvil lógico'>Teléfono movil lógico</option>"+
                            "<option value='Teléfono móvil electrónico'>Teléfono movil electrónico</option>"+
                            "<option value='Unidad de cinta'>Unidad de cinta</option>"+
                        "</select>"+                           
                    "</div><br>"+
                    "<div class='input-group'>"+
                        "<div class='form-check'>"+
                            "<input class='form-check-input' style='width: 20px; height:18px;' type='checkbox' value=' id='flexCheckDefault'>"+
                            "<label class='form-check-label' for='flexCheckDefault'>  Asignar a todos los discos en el trabajo</label>"+
                        "</div>"+
                    "</div>"+  
                "</div>"+
            "</div>"+
            "<div class='modal-footer'>"+
            "<button type='button' class='btn btn-secondary' id='botones' data-dismiss='modal'>Cancelar</button>"+
            '<button type="button" class="btn btn-primary" id="btnDiagnostico" name="btnDiagnostico">Guardar</button>'+
            "</div>"+
        "</div>"+
        "</div>"+
    "</div>"+
    //modal
         '<button class="btn btn-secondary">'+
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">'+
                '<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>'+
              '</svg>'+
        '</button>'+

        '<button class="btn btn-secondary">'+
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">'+
                '<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>'+
              '</svg>'+
        '</button>'+

                        +"</td>";
                        datosPacientes+="</tr>";
                        
                    })
                $("#datosPacientes").append(datosPacientes);
            }
         });
    });
    //
    // ajax de buscador de clones
  $("#btnBuscarClon").on('click',function(){
    $('#tablaClones > tbody').empty();
        var url1 = $('#idInternoClon').val();
        var url2 = $('#modeloClon').val();
        var url3 = $('#serieClon').val();
        var url4 = $('#tamañoClon').val();
        var url5 = $('#pcbClon').val(); 
      
        $.ajax({
            url: "/trabajos/nuevo/detalle/modalClon",
            type: "POST",
            data: {
              "_token": "{{ csrf_token() }}",
              idInternoClon: url1,
                modeloClon: url2,
                serieClon: url3,
                tamañoClon: url4,
                pcbClon: url5,
            },
            cache: false,
            dataType: 'json',
            success: function (dataResult) {
              //console.log(dataResult);
              var filas = dataResult.data.length;
              var nuevacabecera = "<tr>"
                        nuevacabecera+="<th>"+"ID"+"</th><th>"+"Fabricante"+"</th><th>"+"Modelo"+"</th>"
                                          +"<th>"+"Serie"+"</th><th>"+"Tamaño"+"</th><th>"+"Ubicacion"+"<th></th>";
                        nuevacabecera+="</tr>";
                        $("#cabeceraClones").append(nuevacabecera)
              for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                var text = "";
                  var aux1 = "";
                  if (dataResult.data[i].id != null) {
                    aux1 = dataResult.data[i].id;
                  }
                    
                    var nuevafila= "<tr><td id='dato'>" +
                    dataResult.data[i].id + "</td><td>" +
                    dataResult.data[i].manufactura  + "</td><td>" +
                    dataResult.data[i].modelo  + "</td><td>" +
                    dataResult.data[i].numero_de_serie  + "</td><td>" +
                    dataResult.data[i].capacidad  + "</td><td>" +
                    dataResult.data[i].ubicacion  + "</td><td class='text-center'>" +
                        '<button  id="btnAgregarClon" name="btnAgregarClon" type="button" class="btn btn-success">Añadir</button>'+
                  "</td></tr>"
                  
                $("#buscadorClones").append(nuevafila)
              }
            }
        });
    });
    // 
    $(document).on('click','#btnAgregarClon',function(){    

        var fila = $(this).parent();
        var id = fila.siblings("td:eq(0)").text();
        //console.log(id);

        $.ajax({
            url: "/trabajos/nuevo/detalle/agregarClonBuscado",
            type: "POST",
            data: {
            "_token": "{{ csrf_token() }}",
            idBuscado: id,
            "nombre": "{{$orden_elegida->id}}",
            },
            cache: false,
            dataType: 'json',
            success: function (dataResult) {
            //console.log(dataResult);

            var filas = dataResult.data.length;
            for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                var text = "";
                var aux1 = "";
                if (dataResult.data[i].id != null) {
                    aux1 = dataResult.data[i].id;
                }
                    
                    var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                "</td><td class='text-center'>" +
                    dataResult.data[i].id_clon + "</td><td>" +
                    dataResult.data[i].tipo  + "</td><td>" +
                    dataResult.data[i].manufactura  + "</td><td>" +
                    dataResult.data[i].modelo  + "</td><td>" +
                    dataResult.data[i].numero_serie  + "</td><td>" +
                    dataResult.data[i].ubicacion  + "</td><td>"+
                    dataResult.data[i].nota  +"</td><td class='text-center'>" +
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
                
                $("#clonesTrabajo").append(nuevafila)
            }
            }
        });$('#exampleModalMover').modal('hide');
    });
    //
    $(document).ready(function() {

        var url = "{{URL('datosClones')}}";
        $.ajax({
            url: "/trabajos/nuevo/detalle/datosClonesBuscados",
            type: "POST",
            data:{ 
                "_token": "{{ csrf_token() }}",
                "nombre": "{{$orden_elegida->id}}",
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
            //console.log(dataResult);
                
            var filas = dataResult.data.length;
                for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                    var text = "";
                    var aux1 = "";
                    if (dataResult.data[i].id != null) {
                        aux1 = dataResult.data[i].id;
                    }
                        
                        var nuevafila= "<tr><td>" +
                        "<div class='form-check'>"+
                        "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                        "</div>"+
                    "</td><td class='text-center'>" +
                        dataResult.data[i].id_clon + "</td><td>" +
                        dataResult.data[i].tipo  + "</td><td>" +
                        dataResult.data[i].manufactura  + "</td><td>" +
                        dataResult.data[i].modelo  + "</td><td>" +
                        dataResult.data[i].numero_serie  + "</td><td>" +
                        dataResult.data[i].ubicacion  + "</td><td>"+
                        dataResult.data[i].nota  + "</td><td class='text-center'>" +
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
                    
                    $("#clonesTrabajo").append(nuevafila)
                } 
                }
            });
    });
    //
    // ajax de buscador de donante
$("#btnBuscarDonante").on('click',function(){
    $('#tablaClones > tbody').empty();
    var url1 = $('#idInternoDonante').val();
        var url2 = $('#modeloDonante').val();
        var url3 = $('#serieDonante').val();
        var url4 = $('#tamañoDonante').val();
        var url5 = $('#pcbDonante').val(); 
      
        $.ajax({
            url: "/trabajos/nuevo/detalle/modalDonante",
            type: "POST",
            data: {
              "_token": "{{ csrf_token() }}",
              idInternoDonante: url1,
                modeloDonante: url2,
                serieDonante: url3,
                tamañoDonante: url4,
                pcbDonante: url5,
            },
            cache: false,
            dataType: 'json',
            success: function (dataResult) {
              //console.log(dataResult);
              var filas = dataResult.data.length;
              var nuevacabecera = "<tr>"
                        nuevacabecera+="<th>"+"ID"+"</th><th>"+"Fabricante"+"</th><th>"+"Modelo"+"</th>"
                                          +"<th>"+"Serie"+"</th><th>"+"Tamaño"+"</th><th>"+"Ubicacion"+"<th></th>";
                        nuevacabecera+="</tr>";
                        $("#cabeceraDonantes").append(nuevacabecera)
              for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                var text = "";
                  var aux1 = "";
                  if (dataResult.data[i].id != null) {
                    aux1 = dataResult.data[i].id;
                  }
                    
                    var nuevafila= "<tr><td id='dato'>" +
                    dataResult.data[i].id + "</td><td>" +
                    dataResult.data[i].manufactura  + "</td><td>" +
                    dataResult.data[i].modelo  + "</td><td>" +
                    dataResult.data[i].numero_de_serie  + "</td><td>" +
                    dataResult.data[i].capacidad  + "</td><td>" +
                    dataResult.data[i].ubicacion  + "</td><td class='text-center'>" +
                        '<button  id="btnAgregarDonante" name="btnAgregarDonante" type="button" class="btn btn-success">Añadir</button>'+
                  "</td></tr>"
                  
                $("#buscadorDonantes").append(nuevafila)
              }
            }
        });
    });
    //
     // ajax de lista de donantes en dispositivos de trabajos
   $(document).on('click','#btnAgregarDonante',function(){    

        var fila = $(this).parent();
        var id = fila.siblings("td:eq(0)").text();
        //console.log(id);

        $.ajax({
            url: "/trabajos/nuevo/detalle/agregarDonanteBuscado",
            type: "POST",
            data: {
            "_token": "{{ csrf_token() }}",
            idDonanteBuscado: id,
            "nombre": "{{$orden_elegida->id}}",
            },
            cache: false,
            dataType: 'json',
            success: function (dataResult) {
            //console.log(dataResult);

        var filas = dataResult.data.length;
            for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                var text = "";
                var aux1 = "";
                if (dataResult.data[i].id != null) {
                    aux1 = dataResult.data[i].id;
                }
                    
                    var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                "</td><td class='text-center'>" +
                    dataResult.data[i].id_donante + "</td><td>" +
                    dataResult.data[i].tipo  + "</td><td>" +
                    dataResult.data[i].manufactura  + "</td><td>" +
                    dataResult.data[i].modelo  + "</td><td>" +
                    dataResult.data[i].numero_serie  + "</td><td>" +
                    dataResult.data[i].ubicacion  + "</td><td>"+
                    dataResult.data[i].nota  +"</td><td class='text-center'>" +
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
                
                $("#donantesTrabajo").append(nuevafila)
            }
            }
        });$('#exampleModalMover').modal('hide');

    });
    //
    $(document).ready(function() {

    var url = "{{URL('datosDonantes')}}";
    $.ajax({
        url: "/trabajos/nuevo/detalle/datosDonantesBuscados",
        type: "POST",
        data:{ 
            "_token": "{{ csrf_token() }}",
            "nombre": "{{$orden_elegida->id}}",
        },
        cache: false,
        dataType: 'json',
        success: function(dataResult){
        //console.log(dataResult);
            
        var filas = dataResult.data.length;
            for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                var text = "";
                var aux1 = "";
                if (dataResult.data[i].id != null) {
                    aux1 = dataResult.data[i].id;
                }
                    
                    var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                "</td><td class='text-center'>" +
                    dataResult.data[i].id_donante + "</td><td>" +
                    dataResult.data[i].tipo  + "</td><td>" +
                    dataResult.data[i].manufactura  + "</td><td>" +
                    dataResult.data[i].modelo  + "</td><td>" +
                    dataResult.data[i].numero_serie  + "</td><td>" +
                    dataResult.data[i].ubicacion  + "</td><td>"+
                    dataResult.data[i].nota  + "</td><td class='text-center'>" +
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
                
                $("#donantesTrabajo").append(nuevafila)
            } 
            }
        });
    });
    //
    //mover ubicacion
    $('#btnMoverUbicacion').on('click', function () {
            
            var url = $('#nuevaUbicacion').val();
          console.log(url);
            $.ajax({
                url: "/trabajos/nuevo/detalle/moverUbicacion",
                type: "POST",
                data:{ 
                    "_token": "{{ csrf_token() }}",
                    nuevaUbicacion: url,
                    "nombre": "{{$orden_elegida->id}}",
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                 console.log(dataResult);
                $('#exampleModal').modal('hide');

                    
                }
            });
    });
    //
     //guardar diagnostico de la tabla de disp del paciente
     $('#btnDiagnostico').on('click', function () {
        
        var url = $('#selectDiagnostico').val();
       //console.log(url);
        $.ajax({
            url: "/trabajos/nuevo/detalle/guardarDiagnostico",
            type: "POST",
            data:{ 
                "_token": "{{ csrf_token() }}",
                selectDiagnostico: url,
                "nombre": "{{$orden_elegida->id}}",
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                $('#exampleModal2').modal('hide');
            //console.log(dataResult);

                
            }
        });
    });

    function habilitarModal(){
            const value =  $("input:checkbox:checked").attr('id');

            const arr = value || [];

            const result = arr?.length;
            

            if(result != 0){
            $("#moverDispositivos").prop('disabled', false);
            $("#eliminarDispositivos").prop('disabled', false);
            }else{
            $("#moverDispositivos").prop('disabled', true);
            $("#eliminarDispositivos").prop('disabled', true);
            }
        }

    //

    function cambiarUbicacion(){

            var ubic = $('#nuevaUbic').val();

            var seleccionados = $("input:checkbox:checked");
            var arreglo = [];
            // console.log( seleccionados);
            $(seleccionados).each(function() {
            arreglo.push($(this).attr('id'));
           // console.log(arreglo);
            console.log(ubic);
            });
                $.ajax({
                url: "/trabajos/nuevo/detalle/moverUbicacion",
                type: "POST",
                data:{ 
                "_token": "{{ csrf_token() }}",
                'arreglo':arreglo,
                'seleccionado': ubic,
                "nombre": "{{$orden_elegida->id}}",
                    },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                console.log(dataResult);
                $('#exampleModal').modal('hide');
                                
                    }
                });
      }


    function eliminarVariosClones(){

        var seleccionados = $("input:checkbox:checked");
        var arreglo = [];
        $(seleccionados).each(function() {
        arreglo.push($(this).attr('id'));
        });
            $('#Table > tbody').empty();
            console.log(arreglo);
            $.ajax({
                url: "/trabajos/nuevo/detalle/eliminarVariosClones",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'arreglo':arreglo,
                    "nombre": "{{$orden_elegida->id}}",
                },
                cache: false,
                dataType: 'json',
                success: function (dataResult) {
                    console.log(dataResult);

                    var filas = dataResult.data.length;
                for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                    var text = "";
                    var aux1 = "";
                    if (dataResult.data[i].id != null) {
                        aux1 = dataResult.data[i].id;
                    }
                        
                        var nuevafila= "<tr><td>" +
                        "<div class='form-check'>"+
                        "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='' id='"+dataResult.data[i].id+"'>"+
                        "</div>"+
                    "</td><td class='text-center'>" +
                        dataResult.data[i].id_clon + "</td><td>" +
                        dataResult.data[i].tipo  + "</td><td>" +
                        dataResult.data[i].manufactura  + "</td><td>" +
                        dataResult.data[i].modelo  + "</td><td>" +
                        dataResult.data[i].numero_serie  + "</td><td>" +
                        dataResult.data[i].ubicacion  + "</td><td>"+
                        dataResult.data[i].nota  + "</td><td class='text-center'>" +
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
                    
                    $("#clonesTrabajo").append(nuevafila)
                    $('#example4').modal('hide');
                } 
                }
            });
                    
    }
</script>