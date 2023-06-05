<script>

    $("#enviarInfoCliente").on('click',function(){

        var url = $('#infoCliente').val();
        //console.log(url);
                
                $.ajax({
                    url: "/trabajos/nuevo/detalle/enviarNota",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": "{{$orden_elegida->id}}",
                        nota:url,
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        //console.log(dataResult);
                        $('#infoCliente').val('');
                        $('#exampleModal1').modal('show');
                        
                        cargarNotas();
                        
                    },
                    error : function() {
                        $('#errorMensaje').modal('show')
                    },
                });
    });

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
            $("#userDesignado").text(url); 
            $('#exampleModal01').modal('hide');
            //location.reload(); 
            $('#userDesignado').html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+dataResult.data['name']+'</span>');
            
        }
        });
    });
    //
    $('#selectEstado').on('change', function () {

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
           // console.log(dataResult);
                
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Estado Cambiado!!',
            showConfirmButton: false,
            timer: 1500
            })
         }
         });
    });

    
    //
    $('#selectPrioridad').on('change', function () {

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
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Prioridad Cambiada!!',
            showConfirmButton: false,
            timer: 1500
            })
            verServicio();
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


    function cargarNotas() {
        $.ajax({
            url: "/trabajos/detalle/notasCargadas",
            type: "POST",
            data:{ 
                "_token": "{{ csrf_token() }}",
                "id": "{{$orden_elegida->id}}",
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                //console.log(dataResult);
                $("#tablaNotas").empty();
                var resultData = dataResult.data;
                var datosDispositivos
                $.each(resultData,function(index,row){
                    datosDispositivos+="<tr><td>"+row.creado+"</td><td>"+row.created_at+"</td><td>"+row.nota+"</td>"+
                    "<td>"+
                            '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data.id+'">'+
                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                                '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                                '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                            '</svg></button>'+
                            '<div class="modal fade" id="exampleModal'+dataResult.data.id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                            '<div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">'+
                                    '<h5 class="modal-title" id="exampleModalLabel">Eliminar Nota</h5>'+
                                    '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                    '<span aria-hidden="true">&times;</span></button></div>'+
                                '<div class="modal-body">¿Realmente Desea Eliminar la nota?</div>'+
                                '<div class="modal-footer">'+
                                    '<button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>'+
                                    '<button class="btn btn-primary" onclick="eliminarNota('+dataResult.data.id+')" data-dismiss="modal">'+
                                    'Aceptar'+
                                '</button></div></div></div></div></td><tr>';
                                    
                    
                })
                $("#tablaNotas").append(datosDispositivos);
            }
        });
    }
    //
    $('#enviarComentario').on('click', function () {
            var url = $('#comentario').val();

            $.ajax({
                url: "/trabajos/detalle/nota",
                type: "POST",
                data:{ 
                    "_token": "{{ csrf_token() }}",
                    comentario: url,
                    "id": "{{$orden_elegida->id}}",
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                   //console.log(dataResult);
                   $('#comentario').val('');
                    cargarNotas();

                }
            });
    });
    
    function eliminarNota(id_nota) {
        $.ajax({
                url: "/trabajos/detalle/eliminarNota",
                type: "POST",
                data:{ 
                    "_token": "{{ csrf_token() }}",
                    "id": id_nota,
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    cargarNotas();
                }
            });
    }

    function actualizarCliente(id_cliente){ 
            
            var nombre = $("#clienteNombre"+id_cliente).val();
            var correo = $("#clienteCorreo"+id_cliente).val();
            var direccion = $("#clienteDireccion"+id_cliente).val();
            var cif = $("#clienteCif"+id_cliente).val();
            var movil = $("#clienteMovil"+id_cliente).val();
            var telefono = $("#clienteTelefono"+id_cliente).val();
            var postal = $("#clientePostal"+id_cliente).val();
            var poblacion = $("#clientePoblacion"+id_cliente).val();
            var provincia = $("#clienteProvincia"+id_cliente).val();
            var ciudad = $("#clienteCiudad"+id_cliente).val();

            $.ajax({
                url: "/trabajos/detalle/editCliente",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": "{{$orden_elegida->id}}",
                    "id_cliente": id_cliente,
                    "nombre": nombre,
                    "correo": correo,
                    "direccion": direccion,
                    "cif": cif,
                    "movil": movil,
                    "telefono": telefono,
                    "postal": postal,
                    "poblacion": poblacion,
                    "provincia": provincia,
                    "ciudad": ciudad,
                },
                cache: false,
                dataType: 'json',
                success: function (dataResult) {
                    //console.log(dataResult);
                    $("#nord").text(nombre);
                    $("#ncl").text(nombre);
                    $("#ncc").text(cif);
                    $("#ndd").text(direccion);
                    $("#ncd").text(postal);
                    $("#npr").text(provincia);
                    $("#nps").text(ciudad);
                    $('#editarCliente'+id_cliente).modal('hide');
               
                }
                
            });
        }
    
</script>