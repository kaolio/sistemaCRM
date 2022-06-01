<style>
    .subtitulo{  
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 2px;
    }
    .btn{
        padding: 7px 8px;
        border-radius: 25px;
        font-size: 12px;
        text-align: center;
    }
    #botones{
        font-size: 14px;
        border-radius: 4px;
        padding: 5px;
        box-shadow: 2px 2px 2px rgb(95, 93, 93);

    }
    .dejar-en-blanco{
        color: rgb(59, 57, 57);
        font-size: 14px;
        padding-bottom: 8px;
    }
    .form-check-input{
        position: relative;
    }
    .agregar{
        color: green;
    }
</style>
<div class="fila-botones">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" id="botones" data-toggle="modal" data-target="#exampleModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z"/>
        </svg>
        Mover Dispositivos Seleccionados
    </button>
    <!-- add device --> 

    <script>
        function buscador_modal(){
            event.preventDefault();
            const CSRF_TOKERN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                data:parametros,
                type:'POST',
                url:'buscador.blade.php'
                success: function(data){
                    document.getElementById("datos_buscador").innerHTML = data;
                }
            })
        }
    </script>




    <script>
        function text(x){
          if (x==0) document.getElementById("donante").style.display= "block";
          else document.getElementById("donante").style.display = "none"; 
          return;
        }
      </script>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" align="center">Mover Dispositivos Seleccionados</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h5>Mover todos los dispositivos a un nuevo lugar</h5>
                    <div class="input-group md-2">
                        <span class="input-group-text">Nueva Ubicación</span>
                        <input type="text" class="form-control">
                    </div>
                        <span class="dejar-en-blanco m-2">Dejar en blanco para no cambiar</span>
                    <br><br>
                    <div class="input-group">
                        <span class="input-group-text">Nueva Ubicación Temporal</span>
                        <input type="text" class="form-control"><br>
                    </div>
                        <span class="dejar-en-blanco m-2">Dejar en blanco para no cambiar</span>    
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="botones" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="botones">Mover</button>
            </div>
        </div>
        </div>
    </div>
    
        <!-- Modal mover añadir -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo dispositivo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" >
          
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group" style="display: flex;">
                      
                      <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Clonado</span>
                      <input type="radio" name="selected" class="form-control" id="clonado"  onclick="text(1)"  >
                  
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group" style="display: flex;">
                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Donado</span>
                <input type="radio" name="selected" class="form-control" id="clonado" checked onclick="text(0)">
                 </div>
                </div>
              </div>  
              <div class="row" id="donante">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group" style="display: flex;">
                     <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Donante para</span>
                     <select class="form-control" class="btn-block" name="donante">
                         <option value="Carlos">Carlos</option>
                     </select> 
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group" style="display: flex;">
              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Internal ID</span>
                    <input type="text" id="buscar" name="buscar" class="form-control"> 
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group" style="display: flex;">
              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Modelo</span>
                    <input type="text" id="buscar" name="buscar" class="form-control"> 
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group" style="display: flex;">
              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Serial</span>
                    <input type="text" id="buscar" name="buscar" class="form-control"> 
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group" style="display: flex;">
              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Tamaño</span>
                    <input type="text" id="buscar" name="buscar" class="form-control"> 
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group" style="display: flex;">
              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">PCB ID</span>
                    <input type="text" id="buscar" name="buscar" class="form-control"> 
                  </div>
                </div>
              </div> 
              {{-- <div class="tabla-general">
                <table class="table table-striped table-hover table-responsive">
                    <thead class="table-primary table-striped table-bordered text-white" >
                    <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                        <tr>
                            <th class="column1 text-center">Id</th>
                            <th class="column2 text-center">Fabricante</th>
                            <th class="column3 text-center p-2">Modelo</th>
                            <th class="column4 text-center p-2">N° de Serie</th>
                            <th class="column6 text-center p-2">Capacidad (GB)</th>
                            <th class="column6 text-center p-2">Ubicación</th>
                            <th class="column6 text-center p-2">Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="table-bordered">
                          @if(count($inventario)<=0)
                            <tr>
                              <th>No Hay Resultados.</th>  
                            <tr>
                           @else   
                           @foreach ($inventario as $item)
                        <tr>
                          <th scope="row">{{$item->id}}</th>
                          <td>{{ $item->manufactura}}</td>
                          <td>{{ $item->modelo}}</td>
                          <td>{{ $item->numero_de_serie}}</td>
                          <td>{{ $item->capacidad}}</td>
                          <td>{{ $item->ubicacion}}</td>
                          <td></td>
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                </table>
              </div>  --}}
              <div class="modal-footer">
                <button type="button" id="botones" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button onclick="buscador_modal()" id="botones" class="btn btn-success" >Buscar</button>
              </div>  
        </div>
        
      </div>
    </div>
  </div>
  



        <button class="btn btn-danger" id="botones">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
            </svg>
            Eliminar dispositivos seleccionados
        </button>
        <button class="btn btn-success" id="botones">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>
            Agregar nuevo dispositivo del cliente
        </button>

        <!-- Button trigger modal -->
        <button type="button" id="botones" class="btn btn-success" data-toggle="modal" data-target="#exampleModalMover">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>
            Agregar dispositivo
        </button>
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModalMover" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelMover" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelMover">Agregar Nuevo Dispositivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                
                    
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-body p-1" id="card">
                                    <ul class="nav nav-pills">
                                    <li class="nav-item col-md-6">
                                        <a class="nav-link" href="#clonar" data-toggle="tab">
                                            <div class="input-group">
                                                <div class="input-group-text" id="btnGroupAddon">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="form-check-input" type="radio" name="radioNoLabel1" id="radioNoLabel1" value="" aria-label="...">
                                                    </div>
                                                </div>
                                                <span class="input-group-text form-control">Clonar</span>
                                            </div> 
                                        </a>
                                    </li>
                                    <li class="nav-item col-md-6">
                                        <a class="nav-link" href="#donar" data-toggle="tab">
                                            <div class=" input-group">
                                                <div class="input-group-text" id="btnGroupAddon">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="form-check-input" type="radio" name="radioNoLabel2" id="radioNoLabel2" value="" aria-label="...">
                                                    </div>
                                                </div>
                                                <span class="input-group-text form-control">Donar</span>
                                            </div>
                                        </a>
                                    </li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!--Clonar-->
                                        <div class="active tab-pane" id="clonar">
                                            <div class="clonar">
                                                <div class="input-group mt-2">
                                                    <span class="input-group-text">ID Interno</span>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="input-group mt-2">
                                                    <span class="input-group-text">Modelo</span>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="input-group mt-2">
                                                    <span class="input-group-text">Serie</span>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="input-group mt-2">
                                                    <span class="input-group-text">Tamaño</span>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="input-group mt-2">
                                                    <span class="input-group-text">PCB ID</span>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/Clonar-->
        
                                        <!--Donar-->
                                        <div class="tab-pane" id="donar">
                                            <div class="donar">
                                                <div class="input-group mt-2">
                                                    <span class="input-group-text">Donante para</span>
                                                    <select name="manufactura" class="form-control" class="btn-block">
                                                        <option value="">Elija el donante</option>
                                                        <option value="Seagate">Donante de cabezal</option>
                                                        <option value="Toshiba">xxxx</option>
                                                        <option value="Samsung">xxxx</option>
                                                        <option value="Verbatim">xxxxx</option>
                                                        <option value="Wester Digital">xxxxxx</option>
                                                      </select>
                                                </div>
                                                <div class="input-group mt-2">
                                                    <span class="input-group-text">ID Interno</span>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="input-group mt-2">
                                                    <span class="input-group-text">Modelo</span>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="input-group mt-2">
                                                    <span class="input-group-text">Serie</span>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="input-group mt-2">
                                                    <span class="input-group-text">Tamaño</span>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="input-group mt-2">
                                                    <span class="input-group-text">PCB ID</span>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            {{-- @endif --}}
                                        </div>
                                        <!--/Donar-->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>





                    <div class="table mt-2">
                        <table class="table table-responsive">
                            <thead  class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
                                <tr>
                                    <th class="col-md-1 p-1"> ID  </th>
                                    <th class="col-md-2 p-1">Fabricante</th>
                                    <th class="col-md-2 p-1">Modelo</th>
                                    <th class="col-md-2 p-1">Serie</th>
                                    <th class="col-md-2 p-1">Tamaño</th>
                                    <th class="col-md-1 p-1">Ubicación</th>
                                    <th class="col-md-1 p-1"></th>
                                </tr>
                              </thead>
                              <tbody class="table-bordered">
                                  {{-- @if(count($inventario)<=0) --}}
                                   {{-- @else    --}}

                                   {{-- @foreach ($inventario as $item) --}}
                                   
                                <tr>
                                    <th scope="row">1</th>
                                    <td></td>
                                    <td>xxxxxx</td>
                                    <td>xxxxx</td>
                                    <td>xxxxx</td>
                                    <td>xx xxx xx</td>
                                    <td>
                                        <button type="button">
                                            <svg class="agregar" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                               
                              </tbody>
                        </table>
                    </div> 

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="botones" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="botones">Buscar</button>
                </div>
            </div>
            </div>
        </div>



        <button class="btn btn-danger" id="botones">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
            </svg>
            Liberar seleccionados
        </button>
</div>

    <p class="subtitulo">Dispositivos del Paciente</p>
    <div class="table">
    <table class="table table-responsive">
        <thead  class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
            <tr>
                <th class="p-1">&nbsp;&nbsp;&nbsp;</th>
                <th class="p-1">Tipo</th>
                <th class="p-1">Fabricante</th>
                <th class="p-1">Modelo</th>
                <th class="p-1">Serie</th>
                <th class="p-1">Ubicación</th>
                <th class="p-1">Diagnóstico</th>
                <th class="p-1">Nota</th>
                <th class="p-1"></th>
            </tr>
          </thead>
          <tbody class="table-bordered">
            {{-- @if(count($inventario)<=0) --}}
            <tr>
                <th class="col-md-3">No hay datos disponibles</th>  
            <tr>
             {{-- @else    --}}
             {{-- @foreach ($inventario as $item) --}}
            
             <tr>
                <th scope="row"></th>
                <td>Hdd</td>
                <td>Wester Digital</td>
                <td>ZSDGSER346sSF5</td>
                <td>ER56T78</td>
                <td>Salta</td>
                <td>Sin Diagnostico</td>
                <td>Falla en la cabecera</td>
                <td>
                    {{-- Buscar --}}
                    <a href="">
                        <button class="btn btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                              </svg>
                        </button>
                    </a>

{{-- Editar --}}
                    <a href="">
                        <button class="btn btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                              </svg>
                        </button>
                    </a>
{{--Fin Editar}}
{{-- Diagnostico --}}
                   
                        <!-- Button trigger modal -->
                    {{-- <a href=""> --}}
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                                    <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                                </svg>
                            </button>
                    {{-- </a> --}}
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2" align="center">Diagnóstico</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <p align="center">Seleccionar diagnostico para el dispositivo: <br>
                                        Wester Digital - 0723GG45RT
                                    </p>
                                    <div class="input-group md-2">
                                        <span class="input-group-text">Diagnóstico</span>
                                        <select name="" class="form-control" class="btn-block">
                                            <option value="">No Establecido</option>
                                            <option value="Cabezal">Cabezal</option>
                                            <option value="PCB">PCB</option>
                                            <option value="Motor">Motor</option>
                                            <option value="Lógico">Lógico</option>
                                            <option value="Sectores malos">Sectores malos</option>
                                            <option value="Firmware">Firmware</option>
                                            <option value="Ransomware">Ransomware</option>
                                            <option value="CD/DVD">CD/DVD</option>
                                            <option value="Disco flexible">Disco flexible</option>
                                            <option value="NAND lógico">NAND Logico</option>
                                            <option value="NAND electrónico">NAND Electronico</option>
                                            <option value="SSD lógico">SSD Lógico</option>
                                            <option value="SDD firmware">SDD Firmware</option>
                                            <option value="Teléfono móvil lógico">Teléfono movil lógico</option>
                                            <option value="Teléfono móvil electrónico">Teléfono movil electrónico</option>
                                            <option value="Unidad de cinta">Unidad de cinta</option>
                                        </select>                           
                                    </div><br>
                                    <div class="input-group">
                                        <div class="form-check">
                                            <input class="form-check-input" style="width: 20px; height:18px;" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                &nbsp; Asignar a todos los discos en el trabajo
                                            </label>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="botones" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="botones">Guardar</button>
                            </div>
                        </div>
                        </div>
                    </div>
{{-- Fin Diagnostico --}}


{{-- Descargar --}}
                    <a href="">
                        <button class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                              </svg>
                        </button>
                    </a>
                    {{--Mover --}}
                    <a href="">
                        <button class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z"/>
                            </svg>
                        </button>
                    </a>
                    {{--Arrastrar --}}
                    <a href="">
                        <button class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                            </svg>
                        </button>
                    </a>
                     {{--Eliminar --}}
                     <a href="">
                        <button class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                              </svg>
                        </button>
                    </a>
                </td>
            </tr>
         
        </tbody>
    </table>
     </div>

<p class="subtitulo">Clones de Trabajo</p>
<div class="table">
    <table class="table table-responsive">
        <thead  class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
            <tr>
                <th class="p-1"> &nbsp;&nbsp;&nbsp; </th>
                <th class="col-md-1 p-1"> ID </th>
                <th class="col-md-1 p-1">Tipo</th>
                <th class="col-md-2 p-1">Fabricante</th>
                <th class="col-md-2 p-1">Modelo</th>
                <th class="col-md-2 p-1">Serie</th>
                <th class="col-md-1 p-1">Ubicación</th>
                <th class="col-md-2 p-1">Nota</th>
                <th class="col-md-1 p-1"></th>
            </tr>
          </thead>
          <tbody class="table-bordered">
              {{-- @if(count($inventario)<=0) --}}
                <tr>
                  <th class="col-md-3">No hay datos disponibles</th>  
                <tr>
               {{-- @else    --}}
               {{-- @foreach ($inventario as $item) --}}
            <tr>
             
            </tr>
           
          </tbody>
    </table>
</div>     


<p class="subtitulo">Donantes de Trabajo</p>
<div class="table">
    <table class="table table-responsive">
        <thead  class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
            <tr>
                <th class="p-1">&nbsp;&nbsp;&nbsp;</th>
                <th class="col-md-1 p-1"> ID  </th>
                <th class="col-md-1 p-1">Tipo</th>
                <th class="col-md-1 p-1">Rol</th>
                <th class="col-md-2 p-1">Fabricante</th>
                <th class="col-md-2 p-1">Modelo</th>
                <th class="col-md-2 p-1">Serie</th>
                <th class="col-md-1 p-1">Ubicación</th>
                <th class="col-md-2 p-1">Nota</th>
                <th class="col-md-1 p-1"></th>
            </tr>
          </thead>
          <tbody class="table-bordered">
              {{-- @if(count($inventario)<=0) --}}
            <tr>
                <th class="col-md-3">No hay datos disponibles</th>
            <tr>
               {{-- @else    --}}
               {{-- @foreach ($inventario as $item) --}}
            <tr>
             
            </tr>
           
          </tbody>
    </table>
</div>     


<p class="subtitulo">Otros Dispositivos de los Clientes</p>
<div class="table">
    <table class="table table-responsive">
        <thead  class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
            <tr>
                <th class="p-1"> &nbsp;&nbsp;&nbsp; </th>
                <th class="p-1">Tipo</th>
                <th class="p-1">Fabricante</th>
                <th class="p-1">Modelo</th>
                <th class="p-1">Serie</th>
                <th class="p-1">Ubicación</th>
                <th class="p-1">Nota</th>
                <th class="p-1"></th>
            </tr>
          </thead>
          <tbody class="table-bordered">
              {{-- @if(count($inventario)<=0) --}}
            <tr>
                  <th class="col-md-3">No hay datos disponibles</th>
            <tr>
                {{-- @foreach ($inventario as $item) --}}
               {{-- @else    --}}
               <tr>
                   {{-- <th scope="row">{{$item->id}}</th> --}}
                   {{-- <td>{{$item->modelo}}</td> --}}
                   <td>Wester Digital</td>
                   <td>ZSDGSER346sSF5</td>
                   <td>ER56T78</td>
                   <td>Cabinet</td>
                   <td>Falla en la cabecera</td>
                   {{-- @endforeach --}}
                   <td>
                    {{--Mover --}}
                    <a href="">
                        <button class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z"/>
                            </svg>
                        </button>
                    </a>
                      {{-- Editar --}}
                      <a href="">
                        <button class="btn btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                              </svg>
                        </button>
                    </a>
                    {{--Arrastrar --}}
                    <a href="">
                        <button class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                            </svg>
                        </button>
                    </a>
                     {{--Eliminar --}}
                     <a href="">
                        <button class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                              </svg>
                        </button>
                    </a>
                </td>
            </tr>
           
          </tbody>
    </table>
     </div>     

