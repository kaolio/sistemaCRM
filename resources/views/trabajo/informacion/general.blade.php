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
                    <p class="text-left" style="position: relative;left:20px">&nbsp;&nbsp;<b>Contraseña de Cliente:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$orden_elegida->password}}</p>
                    @if ($orden_elegida->name != "Administrador")
                    <p class="text-left" style="position: relative;left:20px">&nbsp;&nbsp;<b>Ingeniero Designado:</b><span id="userDesignado">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$orden_elegida->name}}</span> </p>
                    @else
                    <p class="text-left" style="position: relative;left:20px" >&nbsp;&nbsp;<b>Ingeniero Designado:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ninguno</p>
                    @endif
                    

                    <div class="card" style="flex-direction:row;">
                        <div class="card-body">
                            <div class="input-group">
                                <span class="input-group-text">Precio</span>
                                 <input class="form-control" type="text" name="precioUnico" id="precioUnico" disabled >
                                    
                            </div>
                        </br>
                            <div class="input-group">
                                <span class="input-group-text">Estado</span>
                                 <select id="selectEstado" name="priority" class="form-control" class="btn-block" required>
                                    @foreach($estados as $estado)
                                        @if ($estado->nombre_estado == $orden_elegida->estado)
                                             <option selected value="{{$estado->nombre_estado}}"> {{$estado->nombre_estado}}</option>
                                        @else
                                        <option value="{{$estado->nombre_estado}}"> {{$estado->nombre_estado}}</option>
                                        @endif
                                   
                                    @endforeach
                                 </select>
                            </div>
                        </br>
                            <div class="input-group">
                                <span class="input-group-text">Prioridad</span>
                                 <select id="selectPrioridad" name="prioridad" class="form-control" class="btn-block" required>
                                    @foreach ($prioridad as $prioridad)
                                        @if ($prioridad->nombre_prioridad == $orden_elegida->prioridad)
                                             <option selected value="{{$prioridad->nombre_prioridad}}"> {{$prioridad->nombre_prioridad}}</option>
                                        @else
                                        <option value="{{$prioridad->nombre_prioridad}}"> {{$prioridad->nombre_prioridad}}</option>
                                        @endif
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                    </div> 

                    <!-- Modal -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" align="center">
            <h5>Mensaje Enviado a:</h5>
            <h4> {{$orden_elegida->nombreCliente}}</h4>
            <svg xmlns="http://www.w3.org/2000/svg" width='30' height='30' fill='#3FFF33' class='bi bi-trash' viewBox="0 0 512 512">
                <path d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 
                45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/>
            </svg>
            
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="errorMensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" align="center">
            <h5>Error al Enviar Mensaje a:</h5>
            <h4> {{$orden_elegida->nombreCliente}}</h4>
            <svg xmlns="http://www.w3.org/2000/svg" width='30' height='30' fill='red' class='bi bi-trash' viewBox="0 0 512 512">
                <path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM175 175c9.4-9.4 
                24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 
                47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/>
            </svg>
        </div>
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
                        <p style="height:20px;">Nota de Orden de Trabajo</p>
                           <textarea type="text" style="height: 80px" name="datosimportantes" class="form-control" readonly>{{$orden_elegida->notaOrden}}</textarea> 
                        
                        </br>
                            <p style="height:20px;">Nota al Cliente</p>
                                <textarea type="text" style="height: 80px" id="infoCliente" name="infoCliente" class="form-control"></textarea>
                             </br>
                                      <!--Boton agregar-->
                                        <div style="position: relative;left:5px">
                                            <button  id="enviarInfoCliente" class="btn btn-primary" >Enviar al Cliente</button>
                                        </div>
                                        <!-- /Boton agregar-->
                                    </br>
                                    <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                                        Thank you for getting in touch! 
                                      </div>
                                      <p style="height:20px;">Comentario al Usuario</p>
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

            <div class="modal fade" id="editarCliente{{$orden_elegida->id_cliente}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Editar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="input-group-prepend col-10">
                                <div class="input-group">
                                    <span class="input-group-text" >Nombre</span>
                                    <input type="text" id="clienteNombre{{$orden_elegida->id_cliente}}" name="clienteNombre" class="form-control" autocomplete="off" value="{{$orden_elegida->nombreCliente}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div class="input-group-prepend col-10">
                                <div class="input-group">
                                    <span class="input-group-text" >Correo Electronico</span>
                                    <input type="text" id="clienteCorreo{{$orden_elegida->id_cliente}}" name="clienteCorreo" class="form-control" autocomplete="off" value="{{$orden_elegida->correo}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div class="input-group-prepend col-10">
                                <div class="input-group">
                                    <span class="input-group-text" >Direccion</span>
                                    <input type="text" id="clienteDireccion{{$orden_elegida->id_cliente}}" name="clienteDireccion" class="form-control" autocomplete="off" value="{{$orden_elegida->calle}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div class="input-group-prepend col-10">
                                <div class="input-group">
                                    <span class="input-group-text" >CIF</span>
                                    <input type="text" id="clienteCif{{$orden_elegida->id_cliente}}" name="clienteCif" class="form-control" autocomplete="off" value="{{$orden_elegida->cif}}">
                                </div>
                            </div>
                        </div>
                        <br>
                    <div class="row justify-content-center">
                            <div class="input-group-prepend col-10">
                                <div class="input-group">
                                    <span class="input-group-text" >Tel.Movil</span>
                                    <input type="text" id="clienteMovil{{$orden_elegida->id_cliente}}" name="clienteMovil" class="form-control" autocomplete="off" value="{{$orden_elegida->numero}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div class="input-group-prepend col-10">
                                <div class="input-group">
                                <span class="input-group-text" >Telefono</span>
                                    <input type="text" id="clienteTelefono{{$orden_elegida->id_cliente}}" name="clienteTelefono" class="form-control" autocomplete="off" value="{{$orden_elegida->telefono}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div class="input-group-prepend col-10">
                                <div class="input-group">
                                <span class="input-group-text" >Codigo Postal</span>
                                    <input type="text" id="clientePostal{{$orden_elegida->id_cliente}}" name="clientePostal" class="form-control" autocomplete="off" value="{{$orden_elegida->codigoPostal}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div class="input-group-prepend col-10">
                                <div class="input-group">
                                <span class="input-group-text" >Poblacion</span>
                                    <input type="text" id="clientePoblacion{{$orden_elegida->id_cliente}}" name="clientePoblacion" class="form-control" autocomplete="off" value="{{$orden_elegida->poblacion}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div class="input-group-prepend col-10">
                                <div class="input-group">
                                <span class="input-group-text" >Provincia</span>
                                    <input type="text" id="clienteProvincia{{$orden_elegida->id_cliente}}" name="clienteProvincia" class="form-control" autocomplete="off" value="{{$orden_elegida->provincia}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div class="input-group-prepend col-10">
                                <div class="input-group">
                                <span class="input-group-text" >Ciudad</span>
                                    <input type="text" id="clienteCiudad{{$orden_elegida->id_cliente}}" name="clienteCiudad" class="form-control" autocomplete="off" value="{{$orden_elegida->pais}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" onclick="actualizarCliente({{$orden_elegida->id_cliente}})" >
                            Actualizar
                        </button>
                    </div>
                </div>
                </div>
            </div>

                <div class="col-7">
                    <div class="card">
                        
                        <div class="card">
                           <button class="btn btn-white boton" data-toggle="modal" data-target="#editarCliente{{$orden_elegida->id_cliente}}">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="20" height="20" fill="blue" viewBox="0 0 512 512">
                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>   
                        </button> 
                            </br>
                        <h6 class="text-left" style="position: relative;left:20px">&nbsp;&nbsp;<b>INFORMACION DE CLIENTE </b></h6>
                        
                         </br>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;<b>Nombre de Cliente:</b>&nbsp;&nbsp;&nbsp;{{$orden_elegida->nombreCliente}}</p>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;<b>CIF:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$orden_elegida->cif}}</p>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;<b>Direccion:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$orden_elegida->calle}}</p>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;<b>Codigo Postal y Provincia:</b> &nbsp;{{$orden_elegida->codigoPostal}}&nbsp;&nbsp;&nbsp;&nbsp;{{$orden_elegida->provincia}}</p>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;<b>Ciudad:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$orden_elegida->pais}}</p>
                            <p class="text-left" style="position: relative;left:30px">&nbsp;&nbsp;<b>Nota:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$orden_elegida->nota}}</p>
                        </div>
                        

                        <!--Tabla dispositivos pacientes -->
                        <div class="card"> 
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <p class="text-left" style="position: relative;">Dispositivo a Recuperar </p>
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
                                    <p class="text-left" style="position: relative;">Disco Volcado </p>
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
                                        <tbody id="datosClones" class="table-bordered">
                                            
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
                                        <tbody id="datosDonantes" class="table-bordered">
                                            

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
                                    <p class="text-left" style="position: relative;">Otros Dispositivos del Cliente</p>
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
                                            <tr id="actualizarNotas">
                                                <td class="text-center">{{$nota->creado}}</td>
                                                <td class="text-center">{{ \Carbon\Carbon::parse($nota->created_at)->format('d-m-Y')}}</td>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{ asset('js/trabajo/detalle.js')}}"></script>

    @include('trabajo.ajax.detalle.generalAjax')
    <script>
        $(document).ready(function() {

            precio();

        });

        function precio(){

                $.ajax({
                url: "/trabajos/detalle/mostrarPrecio",
                type: "POST",
                data: {
                "_token": "{{ csrf_token() }}",
                "nombre": "{{$orden_elegida->id}}",
                },
                cache: false,
                dataType: 'json',
                success: function (dataResult) {
                    $("#precioUnico").val(dataResult.data);
                
                }
            });
        }
    </script>
 
