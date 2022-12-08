<script>
    //
    $('#btnAsignar').on('click', function () {

    var url = $('#selectDesignacion').val();
    //console.log(url);
        $.ajax({
            url: "/trabajos/detalle/guardarDesignado",
            type: "POST",
            data:{ 
                "_token": "{{ csrf_token() }}",
                selectDesignacion: url,
                "nombre": "{{$orden_elegida->id}}",
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
            //console.log(dataResult);
            // console.log(myJSON);
            // console.log(typeof JSON.stringify(dataResult))  
            $('#exampleModal01').modal('hide');
            location.reload(); 
            $('#userDesignado').html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+dataResult.data['name']+'</span>');
            
        }
        });
    });
    //
    $('#selectEstado').on('click', function () {

    var url = $('#selectEstado').val();
    //console.log(url);
        $.ajax({
            url: "/trabajos/detalle/guardarEstado",
            type: "POST",
            data:{ 
                "_token": "{{ csrf_token() }}",
                selectEstado: url,
                "nombre": "{{$orden_elegida->id}}",
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
            //console.log(dataResult);

         }
         });
    });
    //
    $('#selectPrioridad').on('click', function () {

    var url = $('#selectPrioridad').val();
    //  console.log(url);
        $.ajax({
            url: "/trabajos/detalle/guardarPrioridad",
            type: "POST",
            data:{ 
                "_token": "{{ csrf_token() }}",
                selectPrioridad: url,
                "nombre": "{{$orden_elegida->id}}",
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
            //console.log(dataResult);

          }
        });
    });
    //
    $(document).ready(function() {

        var url = "{{URL('datosTabla')}}";
        $.ajax({
            url: "/trabajos/nuevo/detalle/datosTabla",
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
                    datosTabla+="<tr>"
                    datosTabla+="<td>"+row.tipo+"</td><td>"+row.fabricante+"</td><td>"+row.modelo+"</td>"
                    +"<td>"+row.serial+"</td><td>"+row.localizacion+"</td><td>"+row.diagnostico+"</td><td>";
                    datosTabla+="</tr>";
                    
                })
                $("#datosTabla").append(datosTabla);
            }
        });
    });
    //
    $(document).ready(function() {

    var url = "{{URL('datosClones')}}";
        $.ajax({
            url: "/trabajos/nuevo/detalle/datosClones",
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
                    datosClones+="<tr>"
                    datosClones+="<td>"+row.id+"</td><td>"+row.tipo+"</td><td>"+row.manufactura+"</td><td>"+row.modelo+"</td>"
                    +"<td>"+row.numero_serie+"</td><td>"+row.ubicacion+"</td><td>"+row.nota+"</td><td>";
                    datosClones+="</tr>";
                    
                })
                $("#datosClones").append(datosClones);
            }
        });
    });
    //
    $(document).ready(function() {

    var url = "{{URL('datosDonantes')}}";
        $.ajax({
            url: "/trabajos/nuevo/detalle/datosDonantes",
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
                    datosDonantes+="<tr>"
                    datosDonantes+="<td>"+row.id+"</td><td>"+row.tipo+"</td><td>"+row.manufactura+"</td><td>"+row.modelo+"</td>"
                    +"<td>"+row.numero_serie+"</td><td>"+row.ubicacion+"</td><td>"+row.nota+"</td><td>";
                    datosDonantes+="</tr>";
                    
                })
                $("#datosDonantes").append(datosDonantes);
            }
        });
    });
    //
    $(document).ready(function() {

    var url = "{{URL('datosDispositivos')}}";
        $.ajax({
            url: "/trabajos/nuevo/detalle/datosDispositivos",
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
                    datosDispositivos+="<tr>"
                    datosDispositivos+="<td>"+row.tipo+"</td><td>"+row.fabricante+"</td><td>"+row.modelo+"</td>"
                    +"<td>"+row.serial+"</td><td>"+row.localizacion+"</td><td>";
                    datosDispositivos+="</tr>";
                    
                })
                $("#datosDispositivos").append(datosDispositivos);
            }
        });
    });
    //
    $('#submit').on('click', function () {
            $('#tablaN > tbody').empty();
            var url = $('#comentario').val();

            $.ajax({
                url: "/trabajos/detalle/nota",
                type: "POST",
                data:{ 
                    "_token": "{{ csrf_token() }}",
                    comentario: url,
                    "nombre": "{{$orden_elegida->id}}",
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                  // console.log(dataResult);
                  location.reload(); 
                    var resultData = dataResult.data;
                    var bodyData = '';
                    

                    $.each(resultData,function(index,row){
                        tablaNotas+="<tr>"
                        tablaNotas+="<td>"+row.creado+"</td><td>"+row.created_at+"</td><td>"+row.nota+"<td>"+
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
                              '<h5 class="modal-title" id="exampleModalLabel">Eliminar Nota</h5>'+
                              '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                              '</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                            '¿Realmente Desea Eliminar la nota?'+
                            '</div>'+
                            '<form action="{{url('/trabajos/detalle/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
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
                            "</td>";
                        tablaNotas+="</tr>";
                        
                    })
                    
                    
                }
            });
    });
    //
    $('#agregarInfoCliente').on('click', function () {
          //  $('#tablaN > tbody').empty();
            var url = $('#infoCliente').val();
            console.log(url);
            $.ajax({
                url: "/trabajos/detalle/notaCliente",
                type: "POST",
                data:{ 
                    "_token": "{{ csrf_token() }}",
                    infoCliente: url,
                    "nombre": "{{$orden_elegida->id}}",
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                   console.log(dataResult);
                    var resultData = dataResult.data;
                    var bodyData = '';
                    

                    $.each(resultData,function(index,row){
                        tablaNotas+="<tr>"
                        tablaNotas+="<td>"+row.creado+"</td><td>"+row.created_at+"</td><td>"+row.nota+"<td>"+"</td>";
                        tablaNotas+="</tr>";
                        
                    })
                    $("#tablaNotas").append(tablaNotas);
                }
            });
        });
        //
        /*  $(document).on('change keyup', '.required', function(e){
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
            $('#submit').prop("disabled", true);
            }else{
            $('#submit').prop("disabled", false);
            }
    })*/
    
</script>