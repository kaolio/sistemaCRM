<div class="active tab-pane" id="tipoDaño">

    <div class="card">
    <div class="card-body">
      <div class="row justify-content-center">
        <div class="col-4">
            <div class="input-group">
                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Moneda</span>
                <input type="text" class="form-control " name="nombreMoneda"id="nombreMoneda"
                onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57))">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group">
                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Valor</span>
                <input type="text" class="form-control " name="valorMoneda" id="valorMoneda"
                onkeypress="return ((event.charCode >= 48 && event.charCode <= 57)||(event.charCode == 46))">
            </div>
        </div>
        
            <div class="col-1">
                <button class='btn btn-icon btn-success' type='button' id='guardarDaño' name='guardarDaño'>
                    <svg xmlns="http://www.w3.org/2000/svg" width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox="0 0 448 512">
                        <path d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 
                        48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM272 80v80H144V80h128zm122 352H54a6 6 0 0 1-6-6V86a6 6 0 0 1 6-6h42v104c0 13.255 
                        10.745 24 24 24h176c13.255 0 24-10.745 24-24V83.882l78.243 78.243a6 6 0 0 1 1.757 4.243V426a6 6 0 0 1-6 6zM224 232c-48.523 0-88 39.477-88 
                        88s39.477 88 88 88 88-39.477 88-88-39.477-88-88-88zm0 128c-22.056 0-40-17.944-40-40s17.944-40 40-40 40 17.944 40 40-17.944 40-40 40z"/>
                    </svg>
                    </button>
            </div>
        </div>
      
    </div>

  </div>

  <div class="card">
    <div class="card-body">
        <table class="table table-light" id="tablaValores">
            <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                <tr>
                  <th class="text-center" style="width: 20%">Tipo de Moneda</th>
                  <th class="text-center" style="width: 30%">Valor</th>
                  <th class="text-center" style="width: 10%"></th>
                </tr>
              </thead>
            <tbody class="table-bordered" id="valoresGuardadas">
                <tr>
                
                <tr>
            </tbody>
        </table>
    </div>
     
    
  </div>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>

    $(document).ready(function () {
        datosValores();
    });

        $("#guardarDaño").on('click',function(){
            var url1 = $('#nombreMoneda').val();
            var url2 = $('#valorMoneda').val();

           // console.log(url1);
                $.ajax({
                    url: "/configuracion/nuevoValor",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        nombreMoneda: url1,
                        valorMoneda: url2,
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                       // console.log(dataResult);
                       datosValores();
                    }
                });
        });


        function datosValores(){
        $.ajax({
                url: "/configuracion/datosValores",
                type: "POST",
                data:{ 
                    "_token": "{{ csrf_token() }}",
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                //console.log(dataResult);
                $('#tablaValores > tbody').empty();
                var filas = dataResult.data.length;
                var count = 0;


                    for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                        var text = "";
                        var aux1 = "";
                        if (dataResult.data[i].id != null) {
                            aux1 = dataResult.data[i].id;
                        }
                            
                            var nuevafila= "<tr><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                            dataResult.data[i].nombre_moneda + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                            dataResult.data[i].valor_moneda  + 
                            "</td><td class='text-center' style='width: 3%;background: rgb(209, 244, 255)' >" +
                                '<button type="button" class="btn" data-toggle="modal" data-target="#monedaEditar'+dataResult.data[i].id+'">'+
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(168, 166, 14)" class="bi bi-trash" viewBox="0 0 16 16">'+
                '<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>'+
              '</svg>'+
            '</button>'+
            '<div class="modal fade" id="monedaEditar'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                        '<div class="modal-content">'+
                            '<div class="modal-header">'+
                            '<h5 class="modal-title w-100 text-center" id="exampleModalLabel">Editar Prioridad</h5>'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                            '</br>'+
                                '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-8">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Moneda</span>'+
                                            '<input type="text" id="editNombreMoneda'+dataResult.data[i].id+'" name="editNombreMoneda" class="form-control text-center" autocomplete="off" value="'+[dataResult.data[i].nombre_moneda]+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</br>'+
                            '<div class="row justify-content-center">'+
                                    '<div class="input-group-prepend col-8">'+
                                        '<div class="input-group">'+
                                            '<span class="input-group-text" >Valor</span>'+
                                            '<input type="text" id="editValorMoneda'+dataResult.data[i].id+'" name="editValorMoneda" class="form-control text-center" autocomplete="off" value="'+[dataResult.data[i].valor_moneda]+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            
                            '<div class="modal-footer">'+
                            '<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>'+
                            '<button class="btn btn-primary" onclick="actualizarMon('+dataResult.data[i].id+')" >'+
                                'Actualizar'+
                            '</button>'+
                            '</div>'+
                        '</form> '+
                        '</div>'+
                        '</div>'+
                    ' </div> '+
                        '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModalMoneda'+dataResult.data[i].id+'">'+
                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                            '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                            '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                            '</svg>'+
                        '</button>'+
                        '<div class="modal fade" id="exampleModalMoneda'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                            '<div class="modal-dialog" role="document">'+
                            '<div class="modal-content">'+
                                '<div class="modal-header">'+
                                '<h5 class="modal-title w-100 text-center" id="exampleModalLabel">Eliminar Tipo de Moneda</h5>'+
                                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                    '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                                '</div>'+
                                '<div class="modal-body">'+
                                '¿Realmente Desea Borrar el Tipo de Moneda?'+
                                '</div>'+
                                '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>'+
                                '<button class="btn btn-primary" onclick="eliminarMon('+dataResult.data[i].id+')">'+
                                    'Aceptar'+
                                '</button>'+
                                '</div>'+
                            '</div>'+
                            '</div>'+
                        ' </div> '+
                        "</td></tr>"
                        
                        $("#valoresGuardadas").append(nuevafila);
                    }
                    
                    }
                });
    }


    function actualizarMon(id_moneda){
            
            var moneda = $("#editNombreMoneda"+id_moneda).val();
            var valor = $("#editValorMoneda"+id_moneda).val();

            //console.log(tipo,rol,fabricante,modelo,serial,localizacion);

            $.ajax({
                url: "/configuracion/actualizarValor",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id_moneda": id_moneda,
                    "moneda": moneda,
                    "valor": valor,
                },
                cache: false,
                dataType: 'json',
                success: function (dataResult) {
                    //console.log(dataResult);
                    datosValores();
                    $('#monedaEditar'+id_moneda).modal('hide');
               
                }
                
            });
        }

        function eliminarMon(id){
             $.ajax({
                    url: "/configuracion/eliminarValor",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        //console.log(dataResult);
                        datosValores();
                        $('#exampleModalMoneda'+id).modal('hide')
                    }
                });
          }

</script>