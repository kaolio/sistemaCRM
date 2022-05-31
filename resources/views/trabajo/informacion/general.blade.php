
    <!--General-->
    <div class="active tab-pane" id="general">
        <!--row-->
        <div class="row">
            <div class="col-5">
                <div class="card">
                </br>
                    <p class="text-left" style="position: relative;left:20px">&nbsp;&nbsp;Servicios: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Recuperacion de Datos </p>
                    <p class="text-left" style="position: relative;left:20px">&nbsp;&nbsp;Contraseña de Archivo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
                    <p class="text-left" style="position: relative;left:20px">&nbsp;&nbsp;Ingeniero Designado: </p>

                    <div class="card" style="flex-direction:row;">
                        <div class="card-body">
                            <div class="input-group">
                                <span class="input-group-text">Precio</span>
                                 <input class="form-control" type="text" name="precio">
                            </div>
                        </br>
                            <div class="input-group">
                                <span class="input-group-text">Estado</span>
                                 <select name="priority" class="form-control" class="btn-block" required>
                                    <option value="">Seleccione el estado</option>
                                 </select>
                            </div>
                        </br>
                            <div class="input-group">
                                <span class="input-group-text">Prioridad</span>
                                 <select name="prioridad" class="form-control" class="btn-block" required>
                                    <option value="">Seleccione la prioridad</option>
                                 </select>
                            </div>
                        </div>
                    </div> 

                    <!--<p style="position: relative;left:20px">Informacion de Trabajo:</p>-->
                   
                    <div class="card" >
                        <div class="card-body">
                            <p style="height:20px;">Informacion de Trabajo</p>
                                <textarea type="text" style="height: 80px" name="informacionTrabajo" class="btn-block" required></textarea>
                            </br>
                            <p style="height:20px;">Datos Importantes</p>
                               <textarea type="text" style="height: 80px" name="datosimportantes" class="btn-block" required></textarea>
                            
                            </br>
                            <p style="height:20px;">Nota de Cliente</p>
                                <textarea type="text" style="height: 80px" name="notaCliente" class="btn-block" required></textarea>
                             </br>
                                      <!--Boton agregar-->
                                        <div style="position: relative;left:5px">
                                            <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Agregar">
                                        </div>
                                        <!-- /Boton agregar-->
                                    </br>
                                        <div class="input-group">
                                            <span class="input-group-text"  style="height: 80px">Comentario</span>
                                             <textarea class="form-control" type="text" name="precio"  style="height: 80px"></textarea>
                                        </div> 
                                    </br>
                                     <!--Boton agregar-->
                                     <div style="position: relative;left:5px">
                                        <input type="submit" class="btn btn-success my-2 my-sm-0" value="Enviar Comentario">
                                     </div>
                                    <!-- /Boton agregar-->
                            </div>
                    </div>
                </div>
            </div>

                <div class="col-7">
                    <div class="card">
                        </br>
                        <p class="text-left" style="position: relative;left:20px">&nbsp;&nbsp;Informacion de Cliente </p>
                         </br>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;Nombre de Cliente: </p>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;PIB/UMBG: </p>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;Direccion: </p>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;Codigo Postal y Ciudad: </p>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;Pais: </p>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;Nota: </p>

                            <!--Tabla dispositivos pacientes -->
                            <meta name="csrf-token" content="{{ csrf_token()}}">
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
                                            <span id="estadoTabla"></span>
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
                                                <th class="column6 text-center">Diagnostico</th>
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
                                                <th class="column6 text-center">Diagnostico</th>
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
                                                <th class="column6 text-center">Diagnostico</th>
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
                         <!--/Fin Tabla otros dispositivos clientes-->
                    </div>
            </div>
        </div>
        <!--/row-->  
        
        <div class="card"> 
            <div class="card-body">
                <div class="table-responsive">
                    <p class="text-left" style="position: relative;">Mostrar</p>
                    <table class="table table-striped table-hover">
                        <thead class="table-primary table-striped table-bordered text-white" >
                        <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                            <tr>
                                <th class="column2 text-center" style="width: 150px">Usuario</th>
                                <th class="column2 text-center" style="width: 150px">Fecha</th>
                                <th class="column3 text-center">Nota</th>
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

          
    </div>
    <!--/General-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>


    <script>
        $(document).ready(function() {

            var url = "{{URL('datosTabla')}}";
            $.ajax({
                url: "/trabajos/nuevo/detalle/datosTabla",
                type: "POST",
                data:{ 
                    _token:'{{ csrf_token() }}'
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    console.log(dataResult);
                    var resultData = dataResult.data;
                    var bodyData = '';
                    var i=1;
                    $.each(resultData,function(index,row){
                        var editUrl = url+'/'+row.id;
                        datosTabla+="<tr>"
                        datosTabla+="<td>"+row.Tipo+"</td><td>"+row.Fabricante+"</td><td>"+row.Modelo+"</td>"
                        +"<td>"+row.Serial+"</td><td>"+row.Localizacion+"</td><td>"+"</td><td>";
                        datosTabla+="</tr>";
                        
                    })
                    $("#datosTabla").append(datosTabla);
                }
            });
            
    });
    </script>
    <!--
    <script>
       

        $(document).ready(function () {
                
        $("#loaderIcon").show();

        jQuery.ajax({
            url: "/trabajos/nuevo/detalle/tabla",
            data: {
                "_token": "{{ csrf_token() }}",
                "tipo": $("#tipo").val(),
                "fabricante": $("#fabricante").val(),
                "modelo": $("#modelo").val(),
                "serial": $("#serial").val(),
                "localizacion": $("#localizacion").val(),
            },
            asycn: false,
            type: "POST",
            success: function(data) {
                $("#estadoTabla").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {
                console.log('no da');
            }
        });

         });
    
    </script>
    
    <script type="text/javascript">

        $(document).ready(function () {
            
            $.ajaxSetip({
                
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "/trabajos/nuevo/detalle/tabla",
                method: 'POST',
                data: {
                   
                 
                }
                
            }).done(function(res){
                var arreglo= JSON.parse(res);
                for(var x=0; x<arreglo.length;x++){
                    var todo= '<tr><td>'+arreglo[x].id+'</td>';
                        todo+= '<td>'+arreglo[x].Tipo+'</td>';
                        todo+= '<td>'+arreglo[x].Fabricante+'</td>';
                        todo+= '<td>'+arreglo[x].Modelo+'</td>';
                        todo+= '<td>'+arreglo[x].Serial+'</td>';
                        todo+= '<td>'+arreglo[x].Localizacion+'</td>';
                        todo+= '<td></td></tr>';
                        console.log(todo);

                        $('tBody').append(todo);
                }
            });
        });       

    </script>--> 
