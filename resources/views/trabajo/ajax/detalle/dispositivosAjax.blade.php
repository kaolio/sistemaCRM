<script>


    //lista de otros dispositivos en: dispositivos-de-trabajo/tabla otros disp. del cliente 
    function cargarOtros() {

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
                $("#datosOtrosDispositivos").empty();
                var filas = dataResult.data.length;
                for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                        
                        var nuevafila= "<tr><td>" +
                        "<div class='form-check'>"+
                        "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='otros' id='"+dataResult.data[i].id+"'>"+
                        "</div>"+
                             "</td><td class='text-center'>" +
                        dataResult.data[i].tipo  + "</td><td>" +
                        dataResult.data[i].fabricante  + "</td><td>" +
                        dataResult.data[i].modelo  + "</td><td>" +
                        dataResult.data[i].serial  + "</td><td>" +
                        dataResult.data[i].localizacion  + "</td><td>" +
                        dataResult.data[i].nota   +"</td><td class='text-center' style='width: 20%'>" +
                        '<button type="button" class="btn" data-toggle="modal" data-target="#dispositivoMoverOtros'+dataResult.data[i].id+'">'+
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(0, 26, 255)" class="bi bi-arrows-move" viewBox="0 0 16 16">'+
                                '<path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z"/>'+
                                '</svg>'+
                            '</button>'+
                            '<div class="modal fade" id="dispositivoMoverOtros'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                                '<div class="modal-dialog" role="document">'+
                                '<div class="modal-content">'+
                                    '<div class="modal-header">'+
                                    '<h5 class="modal-title w-100 text-center" id="exampleModalLabel">Cambiar de Ubicacion</h5>'+
                                    '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                        '<span aria-hidden="true">&times;</span>'+
                                    '</button>'+
                                    '</div>'+
                                    '<div class="modal-body">'+
                                    '<div class="row justify-content-center">'+
                                            '<div class="input-group-prepend col-10">'+
                                                '<div class="input-group">'+
                                                    '<span class="input-group-text" >Ubicacion Actual</span>'+
                                                    '<input type="text" id="" name="" class="form-control text-center" readonly autocomplete="off" value="'+[dataResult.data[i].localizacion]+'">'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</br>'+
                                        '<div class="row justify-content-center">'+
                                            '<div class="input-group-prepend col-10">'+
                                                '<div class="input-group">'+
                                                    '<span class="input-group-text" >Nueva Ubicacion</span>'+
                                                    '<input type="text" id="nuevaUbicacionOtros'+dataResult.data[i].id+'" name="nuevaUbicacionOtros" class="form-control" autocomplete="off" onkeypress="return ( (event.charCode == 45 )|| (event.charCode >= 48 && event.charCode <= 57)||(event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    
                                    '<div class="modal-footer">'+
                                    '<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>'+
                                    '<button class="btn btn-primary" onclick="moverDispositivOtro('+dataResult.data[i].id+')">'+
                                        'Guardar'+
                                    '</button>'+
                                    '</div>'+
                                '</form> '+
                                '</div>'+
                                '</div>'+
                            ' </div> '+  

            '<button type="button" class="btn" data-toggle="modal" data-target="#dispositivoEditarOtro'+dataResult.data[i].id+'">'+
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(168, 166, 14)" class="bi bi-trash" viewBox="0 0 16 16">'+
                '<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>'+
              '</svg>'+
            '</button>'+
            '<div class="modal fade" id="dispositivoEditarOtro'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                        '<div class="modal-content">'+
                            '<div class="modal-header">'+
                            '<h5 class="modal-title w-100 text-center" id="exampleModalLabel">Editar Dispositivo</h5>'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                                '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Tipo</span>'+
                                            '<input type="text" id="" name="" class="form-control text-center" readonly autocomplete="off" value="'+[dataResult.data[i].tipo]+'">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            "<select id='editSelectDiagnosticOtro"+dataResult.data[i].id+"' name='editSelectDiagnosticOtro' class='form-control' class='btn-block'>"+
                                                "<option selected disabled>Tipo de Dispositivo</option>"+
                                                '<option value="HDD">HDD</option>'+
                                                '<option value="SSD">SSD</option>'+
                                                '<option value="MS">M2</option>'+
                                                '<option value="CD/DVD">CD/DVD</option>'+
                                                '<option value="Unidad">Unidad Flash</option>'+
                                                '<option value="MEMORY">Tarjeta de Memoria</option>'+
                                                '<option value="Impresora">Impresora</option>'+
                                                '<option value="Memoria">Memoria</option>'+
                                                '<option value="cabezales">herramientas de cambio de cabezales</option>'+
                                                '<option value="disco">herramientas de disco duro</option>'+
                                                '<option value="desapilado">herramientas de desapilado de fuerza bruta</option>'+
                                                '<option value="Laptop">Laptop</option>'+
                                                '<option value="Notebook">Notebook</option>'+
                                                '<option value="Otro">Otro(Dispositivo HDD)</option>'+
                                                '<option value="PC">PC</option>'+
                                                '<option value="Telefono">Telefono Celular</option>'+
                                                '<option value="Disco">Disco Blu-ray</option>'+
                                                '<option value="Tablet">Tablet</option>'+
                                                '<option value="FDD">FDD</option>'+
                                            "</select>"+ 
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</br>'+
                                '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Rol</span>'+
                                            '<input type="text" id="" name="" class="form-control text-center" readonly autocomplete="off" value="'+[dataResult.data[i].rol]+'">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            "<select id='rolDiagnosticoOtro"+dataResult.data[i].id+"' name='rolDiagnosticoOtro' class='form-control' class='btn-block'>"+
                                                "<option selected disabled>Escoja un Rol</option>"+
                                                '<option value="Dispositivo a Recuperar">Dispositivo a Recuperar</option>'+
                                                '<option value="Datos">Datos</option>'+
                                                '<option value="Donante">Donante</option>'+
                                            "</select>"+ 
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</br>'+
                                '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Fabricante</span>'+
                                            '<input type="text" id="editFabricanteOtro'+dataResult.data[i].id+'" name="editFabricanteOtro" class="form-control" autocomplete="off" value="'+[dataResult.data[i].fabricante]+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</br>'+
                                '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Modelo</span>'+
                                            '<input type="text" id="editModelOtro'+dataResult.data[i].id+'" name="editModelOtro" class="form-control" autocomplete="off" value="'+[dataResult.data[i].modelo]+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</br>'+
                            '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Serial</span>'+
                                            '<input type="text" id="editSerialOtro'+dataResult.data[i].id+'" name="editSerialOtro" class="form-control" autocomplete="off" value="'+[dataResult.data[i].serial]+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</br>'+
                                '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Localizacion</span>'+
                                            '<input type="text" id="editLocalizacionOtro'+dataResult.data[i].id+'" name="editLocalizacionOtro" class="form-control" autocomplete="off" value="'+[dataResult.data[i].localizacion]+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            
                            '<div class="modal-footer">'+
                            '<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>'+
                            '<button class="btn btn-primary" onclick="actualizarDispositivOtro('+dataResult.data[i].id+')" >'+
                                'Actualizar'+
                            '</button>'+
                            '</div>'+
                        '</form> '+
                        '</div>'+
                        '</div>'+
                    ' </div> '+

                    '<button type="button" class="btn" data-toggle="modal" data-target="#dispositivoEliminarOtro'+dataResult.data[i].id+'">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                        '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                        '</svg>'+
                    '</button>'+
                    '<div class="modal fade" id="dispositivoEliminarOtro'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                        '<div class="modal-content">'+
                            '<div class="modal-header">'+
                            '<h5 class="modal-title w-100 text-center" id="exampleModalLabel">Eliminar Dispositivo</h5>'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                            '¿Realmente Desea Borrar Este Dispositivo a Recuperar?'+
                            '</div>'+
                            '<div class="modal-footer">'+
                            '<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>'+
                            '<button class="btn btn-primary" onclick="eliminarDispositivoRecuperarOtro('+dataResult.data[i].id+')" style="padding-left: 5px">'+
                                'Aceptar'+
                            '</button>'+
                            '</div>'+
                        '</div>'+
                        '</div>'+
                    ' </div> '+
                    "</td></tr>"
                    
                     $("#datosOtrosDispositivos").append(nuevafila)
                    } 
                
            }
        });
    }
    //

    $(document).ready(function() {

        cargaDispositivos();
        cargarOtros();

    })

     //AJAX DE LA TABLA DE dispositivos/dispositivos de pacientes
     function cargaDispositivos() {
    
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
                    $("#datosPacientes").empty();
                   // console.log(dataResult);
                   var filas = dataResult.data.length;
            for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                
                    var nuevafila= "<tr><td class='text-center'>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='dispositivo' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                "</td><td class='text-center'>" +
                    dataResult.data[i].tipo  + "</td><td>" +
                    dataResult.data[i].fabricante  + "</td><td>" +
                    dataResult.data[i].modelo  + "</td><td>" +
                    dataResult.data[i].serial  + "</td><td>" +
                    dataResult.data[i].localizacion  + "</td><td>"+
                    dataResult.data[i].diagnostico  + "</td><td >" +
                    dataResult.data[i].nota +
                    "</td><td class='text-center' style='width: 20%'>" +
                   '<button type="button" class="btn" data-toggle="modal" data-target="#dispositivoMover'+dataResult.data[i].id+'">'+
                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(0, 26, 255)" class="bi bi-arrows-move" viewBox="0 0 16 16">'+
                         '<path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z"/>'+
                        '</svg>'+
                    '</button>'+
                    '<div class="modal fade" id="dispositivoMover'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                        '<div class="modal-content">'+
                            '<div class="modal-header">'+
                            '<h5 class="modal-title w-100 text-center" id="exampleModalLabel">Cambiar de Ubicacion</h5>'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                            '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Ubicacion Actual</span>'+
                                            '<input type="text" id="" name="" class="form-control text-center" readonly autocomplete="off" value="'+[dataResult.data[i].localizacion]+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</br>'+
                                '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Nueva Ubicacion</span>'+
                                            '<input type="text" id="nuevaUbicacion'+dataResult.data[i].id+'" name="nuevaUbicacion'+dataResult.data[i].id+'" class="form-control" autocomplete="off" onkeypress="return ( (event.charCode == 45 )|| (event.charCode >= 48 && event.charCode <= 57)||(event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            
                            '<div class="modal-footer">'+
                            '<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>'+
                            '<button class="btn btn-primary" onclick="moverDispositivoRecuperar('+dataResult.data[i].id+')">'+
                                'Guardar'+
                            '</button>'+
                            '</div>'+
                        '</form> '+
                        '</div>'+
                        '</div>'+
                    ' </div> '+
                     
                            //modal

                            "<button type='button' class='btn' data-toggle='modal' data-target='#dispositivoDiagnostico"+dataResult.data[i].id+"'>"+
                                "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='rgb(21, 255, 0)' class='bi bi-share' viewBox='0 0 16 16'>"+
                                    "<path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/>"+
                                    "<path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'/>"+
                                "</svg>"+
                            "</button>"+
 
    "<div class='modal fade' id='dispositivoDiagnostico"+dataResult.data[i].id+"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel2' aria-hidden='true'>"+
        "<div class='modal-dialog' role='document'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
                "<h5 class='modal-title  w-100 text-center' id='exampleModalLabel2'>Diagnóstico</h5>"+
                "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"+
                "<span aria-hidden='true'>&times;</span>"+
            "</button>"+
            "</div>"+
            "<div class='modal-body'>"+
                '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Diagnostico</span>'+
                                            '<input type="text" id="" name="" class="form-control text-center" readonly autocomplete="off" value="'+[dataResult.data[i].diagnostico]+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</br>'+
                '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Estado de Diagnostico</span>'+
                                            "<select id='selectDiagnostico"+dataResult.data[i].id+"' name='selectDiagnostico"+dataResult.data[i].id+"' class='form-control' class='btn-block'>"+
                                                "<option selected disabled>Seleccione un Estado</option>"+
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
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</br>'+
                
            "</div>"+
            "<div class='modal-footer'>"+
            "<button type='button' class='btn btn-danger' id='botones' data-dismiss='modal'>Cancelar</button>"+
            '<button type="button" class="btn btn-primary" onclick="cambiarDiagnosticoRecuperacion('+dataResult.data[i].id+')">Guardar</button>'+
            "</div>"+
        "</div>"+
        "</div>"+
    "</div>"+
            '<button type="button" class="btn" data-toggle="modal" data-target="#dispositivoEditar'+dataResult.data[i].id+'">'+
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(168, 166, 14)" class="bi bi-trash" viewBox="0 0 16 16">'+
                '<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>'+
              '</svg>'+
            '</button>'+
            '<div class="modal fade" id="dispositivoEditar'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                        '<div class="modal-content">'+
                            '<div class="modal-header">'+
                            '<h5 class="modal-title w-100 text-center" id="exampleModalLabel">Editar Dispositivo</h5>'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                                '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Tipo</span>'+
                                            '<input type="text" id="" name="" class="form-control text-center" readonly autocomplete="off" value="'+[dataResult.data[i].tipo]+'">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            "<select id='editSelectDiagnostico"+dataResult.data[i].id+"' name='editSelectDiagnostico' class='form-control' class='btn-block'>"+
                                                "<option selected disabled>Tipo de Dispositivo</option>"+
                                                '<option value="HDD">HDD</option>'+
                                                '<option value="SSD">SSD</option>'+
                                                '<option value="MS">M2</option>'+
                                                '<option value="CD/DVD">CD/DVD</option>'+
                                                '<option value="Unidad">Unidad Flash</option>'+
                                                '<option value="MEMORY">Tarjeta de Memoria</option>'+
                                                '<option value="Impresora">Impresora</option>'+
                                                '<option value="Memoria">Memoria</option>'+
                                                '<option value="cabezales">herramientas de cambio de cabezales</option>'+
                                                '<option value="disco">herramientas de disco duro</option>'+
                                                '<option value="desapilado">herramientas de desapilado de fuerza bruta</option>'+
                                                '<option value="Laptop">Laptop</option>'+
                                                '<option value="Notebook">Notebook</option>'+
                                                '<option value="Otro">Otro(Dispositivo HDD)</option>'+
                                                '<option value="PC">PC</option>'+
                                                '<option value="Telefono">Telefono Celular</option>'+
                                                '<option value="Disco">Disco Blu-ray</option>'+
                                                '<option value="Tablet">Tablet</option>'+
                                                '<option value="FDD">FDD</option>'+
                                            "</select>"+ 
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</br>'+
                                '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Rol</span>'+
                                            '<input type="text" id="" name="" class="form-control text-center" readonly autocomplete="off" value="'+[dataResult.data[i].rol]+'">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            "<select id='rolDiagnostico"+dataResult.data[i].id+"' name='rolDiagnostico' class='form-control' class='btn-block'>"+
                                                "<option selected disabled>Escoja un Rol</option>"+
                                                '<option value="Dispositivo a Recuperar">Dispositivo a Recuperar</option>'+
                                                '<option value="Datos">Datos</option>'+
                                                '<option value="Donante">Donante</option>'+
                                            "</select>"+ 
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</br>'+
                                '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Fabricante</span>'+
                                            '<input type="text" id="editFabricante'+dataResult.data[i].id+'" name="editFabricante" class="form-control" autocomplete="off" value="'+[dataResult.data[i].fabricante]+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</br>'+
                                '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Modelo</span>'+
                                            '<input type="text" id="editModelo'+dataResult.data[i].id+'" name="editModelo" class="form-control" autocomplete="off" value="'+[dataResult.data[i].modelo]+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</br>'+
                            '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Serial</span>'+
                                            '<input type="text" id="editSerial'+dataResult.data[i].id+'" name="editSerial" class="form-control" autocomplete="off" value="'+[dataResult.data[i].serial]+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</br>'+
                                '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-10">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Localizacion</span>'+
                                            '<input type="text" id="editLocalizacion'+dataResult.data[i].id+'" name="editLocalizacion" class="form-control" autocomplete="off" value="'+[dataResult.data[i].localizacion]+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            
                            '<div class="modal-footer">'+
                            '<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>'+
                            '<button class="btn btn-primary" onclick="actualizarDispositivo('+dataResult.data[i].id+')" >'+
                                'Actualizar'+
                            '</button>'+
                            '</div>'+
                        '</form> '+
                        '</div>'+
                        '</div>'+
                    ' </div> '+
        
        '<button type="button" class="btn" data-toggle="modal" data-target="#dispositivoEliminar'+dataResult.data[i].id+'">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                        '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                        '</svg>'+
                    '</button>'+
                    '<div class="modal fade" id="dispositivoEliminar'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                        '<div class="modal-content">'+
                            '<div class="modal-header">'+
                            '<h5 class="modal-title w-100 text-center" id="exampleModalLabel">Eliminar Dispositivo</h5>'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                            '¿Realmente Desea Borrar Este Dispositivo a Recuperar?'+
                            '</div>'+
                            '<div class="modal-footer">'+
                            '<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>'+
                            '<button class="btn btn-primary" onclick="eliminarDispositivoRecuperar('+dataResult.data[i].id+')" style="padding-left: 5px">'+
                                'Aceptar'+
                            '</button>'+
                            '</div>'+
                        '</div>'+
                        '</div>'+
                    ' </div> '+
                    "</td></tr>"
                
                $("#datosPacientes").append(nuevafila)
            } 
            }
         });
    };
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
                $("#cabeceraClones").empty();
              //console.log(dataResult);
              var filas = dataResult.data.length;
              var nuevacabecera = "<tr>"
                        nuevacabecera+="<th>"+"ID"+"</th><th>"+"Fabricante"+"</th><th>"+"Modelo"+"</th>"
                                          +"<th>"+"Serie"+"</th><th>"+"Tamaño"+"</th><th>"+"Ubicacion"+"<th></th>";
                        nuevacabecera+="</tr>";
                        $("#cabeceraClones").append(nuevacabecera)
              for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                    
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
                    '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal5'+dataResult.data[i].id+'">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                        '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                        '</svg>'+
                    '</button>'+
                    '<div class="modal fade" id="exampleModal5'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                        '<div class="modal-content">'+
                            '<div class="modal-header">'+
                            '<h5 class="modal-title w-100 text-center" id="exampleModalLabel">Eliminar Clon</h5>'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                            '¿Realmente Desea Borrar el Clon?'+
                            '</div>'+
                            '<form action="{{url('/eliminarClones/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                            '@csrf'+
                            ' @method('DELETE')'+
                            '<div class="modal-footer">'+
                            '<button type="button" class="btn btn-danger" data-dismiss="modal">Rechazar</button>'+
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
                   
                      
                        var nuevafila= "<tr><td>" +
                        "<div class='form-check'>"+
                        "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='clon' id='"+dataResult.data[i].id+"'>"+
                        "</div>"+
                    "</td><td class='text-center'>" +
                        dataResult.data[i].id_clon + "</td><td>" +
                        dataResult.data[i].tipo  + "</td><td>" +
                        dataResult.data[i].manufactura  + "</td><td>" +
                        dataResult.data[i].modelo  + "</td><td>" +
                        dataResult.data[i].numero_serie  + "</td><td>" +
                        dataResult.data[i].ubicacion  + "</td><td>"+
                        dataResult.data[i].nota  + "</td><td class='text-center'>" +
                            '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal5'+dataResult.data[i].id+'">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                        '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                        '</svg>'+
                    '</button>'+
                    '<div class="modal fade" id="exampleModal5'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                        '<div class="modal-content">'+
                            '<div class="modal-header">'+
                            '<h5 class="modal-title w-100 text-center" id="exampleModalLabel">Eliminar Clon</h5>'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                            '¿Realmente Desea Borrar el Clon?'+
                            '</div>'+
                            '<form action="{{url('/eliminarClones/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                            '@csrf'+
                            ' @method('DELETE')'+
                            '<div class="modal-footer">'+
                            '<button type="button" class="btn btn-danger" data-dismiss="modal">Rechazar</button>'+
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
               
                    
                    var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='otros' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                "</td><td class='text-center'>" +
                    dataResult.data[i].id_donante + "</td><td>" +
                    dataResult.data[i].tipo  + "</td><td>" +
                    dataResult.data[i].manufactura  + "</td><td>" +
                    dataResult.data[i].modelo  + "</td><td>" +
                    dataResult.data[i].numero_serie  + "</td><td>" +
                    dataResult.data[i].ubicacion  + "</td><td>"+
                    dataResult.data[i].nota  +"</td><td class='text-center'>" +
                    '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal7'+dataResult.data[i].id+'">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                        '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                        '</svg>'+
                    '</button>'+
                    '<div class="modal fade" id="exampleModal7'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                        '<div class="modal-content">'+
                            '<div class="modal-header">'+
                            '<h5 class="modal-title w-100 text-center" id="exampleModalLabel">Eliminar Donante</h5>'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                            '¿Realmente Desea Borrar el Donante?'+
                            '</div>'+
                            '<form action="{{url('/eliminarDonantes/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                            '@csrf'+
                            ' @method('DELETE')'+
                            '<div class="modal-footer">'+
                            '<button type="button" class="btn btn-danger" data-dismiss="modal">Rechazar</button>'+
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
                
                    
                    var nuevafila= "<tr><td>" +
                    "<div class='form-check'>"+
                    "<input class='form-check-input' onclick='habilitarModal()' type='checkbox' value='donante' id='"+dataResult.data[i].id+"'>"+
                    "</div>"+
                "</td><td class='text-center'>" +
                    dataResult.data[i].id_donante + "</td><td>" +
                    dataResult.data[i].tipo  + "</td><td>" +
                    dataResult.data[i].manufactura  + "</td><td>" +
                    dataResult.data[i].modelo  + "</td><td>" +
                    dataResult.data[i].numero_serie  + "</td><td>" +
                    dataResult.data[i].ubicacion  + "</td><td>"+
                    dataResult.data[i].nota  + "</td><td class='text-center'>" +
                    '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal7'+dataResult.data[i].id+'">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                        '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                        '</svg>'+
                    '</button>'+
                    '<div class="modal fade" id="exampleModal7'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                        '<div class="modal-content">'+
                            '<div class="modal-header">'+
                            '<h5 class="modal-title w-100 text-center" id="exampleModalLabel">Eliminar Donante</h5>'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                            '¿Realmente Desea Borrar el Donante?'+
                            '</div>'+
                            '<form action="{{url('/eliminarDonantes/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                            '@csrf'+
                            ' @method('DELETE')'+
                            '<div class="modal-footer">'+
                            '<button type="button" class="btn btn-danger" data-dismiss="modal">Rechazar</button>'+
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
    /*/mover ubicacion
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
    */
     //guardar diagnostico de la tabla de disp del paciente
     

    function habilitarModal(){
            const value =  $("input:checkbox:checked").attr('id');
            const tipo =  $("input:checkbox:checked").attr('value');
            //console.log(tipo);
            const arr = value || [];

            const result = arr?.length;
            
            var seleccionados = $("input:checkbox:checked");
            var arreglo = [];
                $(seleccionados).each(function() {
                arreglo.push($(this).attr('value'));
                });
            
                //console.log(arreglo.length);
            if(result != 0){
                
                $.ajax({
                url: "/trabajos/nuevo/detalle/obtenerValores",
                type: "POST",
                data:{ 
                    "_token": "{{ csrf_token() }}",
                    'value':value,
                    'tipo': tipo,
                    "id": "{{$orden_elegida->id}}",
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    //console.log(dataResult);
                    if (arreglo.length == 1) {
                        if (dataResult.data[0].localizacion) {
                            $("#ubicacionClon").val(dataResult.data[0].localizacion);
                        }else{
                            $("#ubicacionClon").val(dataResult.data[0].ubicacion);
                        }
                    } else {
                        $("#ubicacionClon").val(arreglo);
                    }
                    
                }

                });
            $("#moverDispositivos").prop('disabled', false);
            $("#eliminarDispositivos").prop('disabled', false);
            }else{
            $("#moverDispositivos").prop('disabled', true);
            $("#eliminarDispositivos").prop('disabled', true);
            }
        }

    //

    function cambiarUbicacion(){

            var texto = $('#nuevaUbic').val();

            var seleccionados = $("input:checkbox:checked");
            var dispositivo = [];
            var clon = [];
            var donante = [];
            var otros = [];
                $(seleccionados).each(function() {
                    if ($(this).attr('value') == 'dispositivo') {
                        dispositivo.push($(this).attr('id'));
                    } else {
                        if ($(this).attr('value') == 'clon') {
                            clon.push($(this).attr('id'));
                        } else {
                            if ($(this).attr('value') == 'donante') {
                                donante.push($(this).attr('id'));
                            } else {
                                otros.push($(this).attr('id'));
                            }
                        }
                    }
                });

                if (dispositivo.length != 1) {
                    dispositivo.push("vacio");
                }
                if (clon.length != 1) {
                    clon.push("vacio");
                }
                if (donante.length != 1) {
                    donante.push("vacio");
                }
                if (otros.length != 1) {
                    otros.push("vacio");
                }

                $.ajax({
                url: "/trabajos/nuevo/detalle/moverUbicacion",
                type: "POST",
                data:{ 
                    "_token": "{{ csrf_token() }}",
                    'dispositivo':dispositivo,
                    'clon':clon,
                    'donante':donante,
                    'otros':otros,
                    'texto': texto,
                    "id": "{{$orden_elegida->id}}",
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    console.log(dataResult);
                    $('#moverDispo').modal('hide');
                    
                }
            });
      }


      function moverDispositivoRecuperar(detalle){
            
            var loc = $("#nuevaUbicacion"+detalle).val();
            //console.log(det);
            $.ajax({
                url: "/trabajos/nuevo/detalle/moverDispositivoRecuperar",
                type: "POST",
                data: {
                "_token": "{{ csrf_token() }}",
                'loc':loc,
                "id": "{{$orden_elegida->id}}",
                "detalle": detalle,
                },
                cache: false,
                dataType: 'json',
                success: function (dataResult) {
                    console.log(dataResult);
                    cargaDispositivos();
                    $('#dispositivoMover'+detalle).modal('hide');
                //location.reload(); 
                /*$('#exampleModal05').on('hide', function() {
                    location.reload();
                    });*/
                
                }
                
            });
        }
        function cambiarDiagnosticoRecuperacion(id_diagnostico){
            
            var loc = $("#nuevaUbicacion").val();
            var seleccionado = document.getElementById('selectDiagnostico'+id_diagnostico).value;
            //console.log(seleccionado);
            $.ajax({
                url: "/trabajos/nuevo/detalle/guardarDiagnosticoRecuperacion",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": "{{$orden_elegida->id}}",
                    "seleccionado": seleccionado,
                    "id_diagnostico": id_diagnostico,
                },
                cache: false,
                dataType: 'json',
                success: function (dataResult) {
                    console.log(dataResult);
                    cargaDispositivos();
                    $('#dispositivoDiagnostico'+id_diagnostico).modal('hide');
               
                }
                
            });
        }


        function actualizarDispositivo(id_detalle){
            
            var tipo = $("#editSelectDiagnostico"+id_detalle).val();
            var rol = $("#rolDiagnostico"+id_detalle).val();
            var fabricante = $("#editFabricante"+id_detalle).val();
            var modelo = $("#editModelo"+id_detalle).val();
            var serial = $("#editSerial"+id_detalle).val();
            var localizacion = $("#editLocalizacion"+id_detalle).val();

            //console.log(tipo,rol,fabricante,modelo,serial,localizacion);

            $.ajax({
                url: "/trabajos/nuevo/detalle/actualizarDispositivo",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": "{{$orden_elegida->id}}",
                    "id_detalle": id_detalle,
                    "tipo": tipo,
                    "rol": rol,
                    "fabricante": fabricante,
                    "modelo": modelo,
                    "serial": serial,
                    "localizacion": localizacion,
                },
                cache: false,
                dataType: 'json',
                success: function (dataResult) {
                    //console.log(dataResult);
                    cargaDispositivos();
                    $('#dispositivoEditar'+id_detalle).modal('hide');
               
                }
                
            });
        }

        function eliminarDispositivoRecuperar(id_detalle){

            //console.log(tipo,rol,fabricante,modelo,serial,localizacion);

            $.ajax({
                url: "/trabajos/nuevo/detalle/eliminarDispositivoRecuperar",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id_detalle": id_detalle,
                },
                cache: false,
                dataType: 'json',
                success: function (dataResult) {
                    //console.log(dataResult);
                    cargaDispositivos();
                    $('#dispositivoEliminar'+id_detalle).modal('hide');
               
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
                                '<h5 class="modal-title w-100 text-center" id="exampleModalLabel">Eliminar trabajo</h5>'+
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
                                '<button type="button" class="btn btn-danger" data-dismiss="modal">Rechazar</button>'+
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