<style>
    textarea {
    resize: none;
}

</style>


    <!--General-->
    <div class="active tab-pane" id="general">
        <!--row-->
        <div class="row">
            <div class="col-5">
                <div class="card">
                </br>
                    <p class="text-left" style="position: relative;left:20px">&nbsp;&nbsp;<b>Servicios:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Recuperacion de Datos </p>
                    <p class="text-left" style="position: relative;left:20px">&nbsp;&nbsp;<b>Contraseña de Archivo:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
                    @if ($orden_elegida->name != "Administrador")
                    <p class="text-left" style="position: relative;left:20px">&nbsp;&nbsp;<b>Ingeniero Designado:</b><span id="userDesignado">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$orden_elegida->name}}</span> </p>
                    @else
                    <p class="text-left" style="position: relative;left:20px" >&nbsp;&nbsp;<b>Ingeniero Designado:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ninguno</p>
                    @endif
                    

                    <div class="card" style="flex-direction:row;">
                        <div class="card-body">
                            <div class="input-group">
                                <span class="input-group-text">Precio</span>
                                 <input class="form-control" type="text" name="precio">
                            </div>
                        </br>
                            <div class="input-group">
                                <span class="input-group-text">Estado</span>
                                 <select id="selectEstado" name="priority" class="form-control" class="btn-block" required>
                                    @foreach($prioridadTrabajo as $estado)
                                    <option  value="{{$estado->estado}}"> {{$estado->estado}}</option>
                                    @endforeach
                                    <option value="">Recibido</option>
                                    <option value="En Proceso">En proceso</option>
                                    <option value="esperandoPiezas">Esperando Piezas</option>
                                    <option value="Trabajo Completo">Trabajo Completo</option>
                                    <option value="Trabajo Incompleto">Trabajo Incompleto</option>
                                    <option value="Pagado">Pagado</option>
                                    <option value="Devuelto Al Cliente">Devuelto al Cliente</option>
                                    <option value="Pago Pendiente">Pago Pendiente</option>
                                    <option value="Llegada Pendiente">Llegada Pendiente</option>
                                    <option value="Pagado y Regresado al Cliente">Pagado y regresado a Cliente</option>
                                 </select>
                            </div>
                        </br>
                            <div class="input-group">
                                <span class="input-group-text">Prioridad</span>
                                 <select id="selectPrioridad" name="prioridad" class="form-control" class="btn-block" required>
                                    @foreach ($prioridadTrabajo as $prioridad)
                                    <option  value="{{$prioridad->prioridad}}"> {{$prioridad->prioridad}}</option>
                                    @endforeach
                                    <option value="Normal">Normal</option>
                                    <option value="Alta">Alta</option>
                                    <option value="Urgente">Urgente</option>
                                 </select>
                            </div>
                        </div>
                    </div> 

                    <!--<p style="position: relative;left:20px">Informacion de Trabajo:</p>-->
                   
                    <div class="card" >
                        <div class="card-body">
                            <p style="height:20px;">Informacion de Trabajo</p>
                                <textarea type="text" style="height: 80px " name="informacionTrabajo" class="form-control" readonly>{{$orden_elegida->informacion}}</textarea>
                            </br>
                            <p style="height:20px;">Datos Importantes</p>
                               <textarea type="text" style="height: 80px" name="datosimportantes" class="form-control" readonly>{{$orden_elegida->datosImportantes}}</textarea>
                            
                            </br>
                            <p style="height:20px;">Nota de Cliente</p>
                                <textarea type="text" style="height: 80px" id="infoCliente" name="infoCliente" class="form-control" required></textarea>
                             </br>
                                      <!--Boton agregar-->
                                        <div style="position: relative;left:5px">
                                            <input type="submit"  id="agregarInfoCliente" class="btn btn-primary my-2 my-sm-0" value="Agregar">
                                        </div>
                                        <!-- /Boton agregar-->
                                    </br>
                                    <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                                        Thank you for getting in touch! 
                                      </div>
                                    
                                        <div class="input-group">
                                            <span class="input-group-text"  style="height: 80px">Comentario</span>
                                             <textarea class="form-control required" type="text" name="comentario" id="comentario"  style="height: 80px"></textarea>
                                             <span class="text-danger" id="message-error"></span>
                                            </div> 
                                        </br>
                                        <!--Boton agregar-->
                                        <div class="form-group" style="position: relative;left:5px">
                                            <button class="btn btn-success" id="submit" onSubmit="return limpiar()" >Enviar Comentario</button>
                                        </div>
                                        <!-- /Boton agregar-->
                                        
                            </div>
                    </div>
                </div>
            </div>

                <div class="col-7">
                    <div class="card">
                        <div class="card">
                            </br>
                        <p class="text-left" style="position: relative;left:20px">&nbsp;&nbsp;<b>INFORMACION DE CLIENTE </b></p>
                         </br>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;<b>Nombre de Cliente:</b>&nbsp;&nbsp;&nbsp;{{$orden_elegida->nombreCliente}}</p>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;<b>PIB/UMBG:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$orden_elegida->vat}}</p>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;<b>Direccion:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$orden_elegida->calle}}</p>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;<b>Codigo Postal y Ciudad:</b> &nbsp;{{$orden_elegida->codigoPostal}}&nbsp;&nbsp;&nbsp;&nbsp;{{$orden_elegida->nombreCiudad}}</p>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;<b>Pais:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$orden_elegida->pais}}</p>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;<b>Nota:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$orden_elegida->nota}}</p>
                        </div>
                        

                        <!--Tabla dispositivos pacientes -->
                        <div class="card"> 
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <p class="text-left" style="position: relative;">Dispositivos Pacientes </p>
                                        <table class="table table-striped table-hover" id="tabla-pacientes">
                                            <thead class="table-primary table-striped table-bordered text-white" >
                                            <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                                                <tr>
                                                    <th class="column2 text-center">Tipo</th>
                                                    <th class="column2 text-center">Manufactura</th>
                                                    <th class="column3 text-center">Modelo</th>
                                                    <th class="column4 text-center">N°Serie</th>
                                                    <th class="column5 text-center">Localizacion</th>
                                                    <th class="column6 text-center">Diagnostico</th>
                                                    <th class="column6 text-center">Nota</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="datosTabla" class="table-bordered">
  
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                         <!--/Fin Tabla dispositivos pacientes-->
                         <!--Tabla Trabajos clonados-->
                         <div class="card"> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <p class="text-left" style="position: relative;">Clon de Trabajo </p>
                                    <table class="table table-striped table-hover">
                                        <thead class="table-primary table-striped table-bordered text-white" >
                                        <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                                            <tr>
                                                <th class="column2 text-center">ID</th>
                                                <th class="column2 text-center">Tipo</th>
                                                <th class="column2 text-center">Manufactura</th>
                                                <th class="column3 text-center">Modelo</th>
                                                <th class="column4 text-center">N°Serie</th>
                                                <th class="column5 text-center">Localizacion</th>
                                                <th class="column6 text-center">Nota</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-bordered">
                                            
                                            <tr>
                                        
                                            
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                         <!--/Fin Tabla trabajos clonados-->
                         <!--Tabla donadores-->
                         <div class="card"> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <p class="text-left" style="position: relative;">Donadores </p>
                                    <table class="table table-striped table-hover">
                                        <thead class="table-primary table-striped table-bordered text-white" >
                                        <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                                            <tr>
                                                <th class="column2 text-center">ID</th>
                                                <th class="column2 text-center">Tipo</th>
                                                <th class="column2 text-center">Manufactura</th>
                                                <th class="column3 text-center">Modelo</th>
                                                <th class="column4 text-center">N°Serie</th>
                                                <th class="column5 text-center">Localizacion</th>
                                                <th class="column6 text-center">Nota</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-bordered">
                                            
                                            <tr>
                                        
                                            
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                         <!--/Fin Tabla donadores-->
                         <!--Tabla otros dispositivos cliente-->
                         <div class="card"> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <p class="text-left" style="position: relative;">Otros Dispositivos de Clientes</p>
                                    <table class="table table-striped table-hover">
                                        <thead class="table-primary table-striped table-bordered text-white" >
                                        <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                                            <tr>
                                                <th class="column2 text-center">Tipo</th>
                                                <th class="column2 text-center">Manufactura</th>
                                                <th class="column3 text-center">Modelo</th>
                                                <th class="column4 text-center">N°Serie</th>
                                                <th class="column5 text-center">Localizacion</th>
                                                <th class="column6 text-center">Nota</th>
                                            </tr>
                                        </thead>
                                        <tbody id="datosDispositivos" class="table-bordered">
                                            
                                            <tr>
                                        
                                            
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                         <!--/Fin Tabla otros dispositivos clientes-->
                    </div>
            </div>
        </div>
        <!--/row-->  
        
                        <div class="card"> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="col-4 ml-auto p-2">
                                        <div class="input-group md-2 ">
                                        <span class="input-group-text">Búsqueda Rapida  </span>
                                        <input class="form-control" id="busquedaRapida" name="busquedaRapida" autocomplete="off">         
                                        </div>
                                    </div>
                                        
                                    <table class="table table-striped table-hover" id="tablaN">
                                        <thead class="table-primary table-striped table-bordered text-white" >
                                        <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                                            <tr>
                                                <th class="column2 text-center" style="width: 120px">Usuario</th>
                                                <th class="column2 text-center" style="width: 150px">Fecha</th>
                                                <th class="column3 text-center">Nota</th>
                                                <th class="column2 text-center" style="width:50px"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaNotas" class="table-bordered" >
                                            @foreach ($notas as $nota)
                                            <tr>
                                                <td class="text-center">{{$nota->creado}}</td>
                                                <td class="text-center">{{$nota->created_at}}</td>
                                                <td>{{$nota->nota}}</td>
                                                <td class="text-center">
                    
                                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal{{$nota->id}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg>
                                                    </button>
                                                    <div class="modal fade" id="exampleModal{{$nota->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Nota</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        ¿Realmente Desea Eliminar la nota?
                                                        </div>
                                                        <form action="{{url('/trabajos/detalle/'.$nota->id)}}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
                                                                        
                                                            <button class="btn btn-primary" style="padding-left: 5px">
                                                            Aceptar
                                                            </button>
                                                            
                                                        </div>
                                                        </form> 
                                                        </div>
                                                    </div>
                                                    </div>
                                                </td>  
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

          
    </div>
    <!--/General-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 


    <script>

    
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
                $('#userDesignado').html('<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+dataResult.data['name']+'</span>');
                
            }
            });
        });
        //
        $('#selectEstado').on('click', function () {

            var url = $('#selectEstado').val();
            console.log(url);
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
                   console.log(dataResult);
                    var resultData = dataResult.data;
                    var bodyData = '';
                    

                    $.each(resultData,function(index,row){
                        tablaNotas+="<tr>"
                        tablaNotas+="<td>"+row.creado+"</td><td>"+row.created_at+"</td><td>"+row.nota+"<td>"+
                            '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">'+
                      '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                        '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                        '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                      '</svg>'+
                    '</button>'
                            "</td>";
                        tablaNotas+="</tr>";
                        
                    })
                    $("#tablaNotas").append(tablaNotas);
                    if('#comentario'==''){

                        $('#comentario').empty();
                    }
                }
            });
        });

        //
        $(document).ready(function(){
            $("#busquedaRapida").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tablaNotas tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
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
