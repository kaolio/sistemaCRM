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
    <button type="button" class="btn btn-primary" id="botones" data-toggle="modal" data-target="#exampleModalDisp">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z"/>
        </svg>
        Mover Dispositivos Seleccionados
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalDisp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelDisp" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelDisp" align="center">Mover Dispositivos Seleccionados</h5>
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
    

    {{-- BOTON ELIMINAR --}}
        <button class="btn btn-danger" id="botones">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
            </svg>
            Eliminar dispositivos seleccionados
        </button>
        {{-- BOTON AGREGAR NUEVO DISPOSITIVO DEL CLIENTE --}}
        <button class="btn btn-success" id="botones">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>
            Agregar nuevo dispositivo del cliente
        </button>

        <!-- MODAL DE AGREGAR DISPOSITIVO -->
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
                                                    <span class="input-group-text">Donar para </span>
                                                    <select name="manufactura" class="form-control" class="btn-block">
                                                        <option value="">Elija la opción</option>
                                                        <option value="Paciente">Paciente</option>
                                                        <option value="Datos">Datos</option>
                                                        <option value="Donante">Donante</option>
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
                                                    <tbody class="table-bordered" id="datosInventario" >
                                                        
                                                        <tr>
                                                            {{-- Aqui va los datos de la lista de inventario --}}
                                                        </tr>
                                                    
                                                    </tbody>
                                                </table>
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



                    

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="botones" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="botones"><a href=""></a>Buscar</button>
                </div>
            </div>
            </div>
        </div>


    {{-- Liberrar Seleccionados --}}
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
          <tbody class="table-bordered" id="datosPacientes">
             <tr>
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
                                                        
            <tr>
                {{-- Aqui va los datos de la lista de inventario --}}
            </tr>
        
        </tbody>
    </table>
</div>     

<div class="container">

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
        <tbody class="table-bordered" id="datosOtrosDispositivos">
            <tr >
            </tr>
        </tbody>
    </table>
</div>
</div>


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
            datosOtrosDispositivos+="<td name='tipo[]' id=''>"+row.tipo+"</td><td name='fabricante[]' id=''>"+row.fabricante+"</td><td name='modelo[]' id=''>"+row.modelo+"</td>"
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

        //AJAX DE LA TABLA  dispositivos-de-trabajo/dispositivos de pacientes
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
                        datosPacientes+="<td></td>"+"<td>"+row.tipo+"</td><td>"+row.fabricante+"</td><td>"+row.modelo+"</td>"
                        +"<td>"+row.serial+"</td><td>"+row.localizacion+"</td><td>"+row.diagnostico+"<td></td>"+"<td>"+
                            "<button class='btn btn-icon btn-danger' type='button' id='deletRow' name='deletRow'>"+
                                              "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>"+
                                              "<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>"+
                                              "<path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>"+
                                              "</svg>"+
                        "</button>"
                        +"</td>";
                        datosPacientes+="</tr>";
                        
                    })
                    $("#datosPacientes").append(datosPacientes);
                }
            });
            
    });

    //Ajax en el modal Dispositivos-de-trabajo/Agregar-Dispositivo/donantes de trabajo

        $(document).ready(function() {

            var url = "{{URL('datosInventario')}}";
            $.ajax({
                url: "/trabajos/nuevo/detalle/datosInventario",
                type: "POST",
                data:{ 
                    "_token": "{{ csrf_token() }}",
                    // "nombre": "{{$orden_elegida->id}}",
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    console.log(dataResult);
                    var resultData = dataResult.data;
                    var bodyData = '';

                    $.each(resultData,function(index,row){
                        datosInventario+="<tr>"
                        datosInventario+="<td>"+row.id+"</td><td>"+row.manufactura+"</td><td>"+row.modelo+"</td>"
                        +"<td>"+row.numero_de_serie+"</td><td>"+row.capacidad+"</td><td>"+row.ubicacion+"<td>"+
                            "<button class='btn btn-icon btn-success' type='button' id='edit' name='edit'>"+
                                "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-circle' viewBox='0 0 16 16'>"+
                                    "<path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>"+
                                    "<path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>"+
                                "</svg>"+
                        "</button>"
                        +"</td>";
                        datosInventario+="</tr>";
                    })
                    $("#datosInventario").append(datosInventario);
                }
            });
            
    });

    //Eliminar en otros dispositivos de clientes
    $(document).on("click", ".eliminar", function() {
var eliminar = 0;
                var tipo = document.getElementById("tipo");
                var fabricante = document.getElementById("fabricante").value;
                var modelo = document.getElementById("modelo").value;
                var serial = document.getElementById("serial").value;
                var serial = document.getElementById("localizacion").value;
        
        
        if (eliminar != 0) {
            $(this).parents('tr').remove();
            eliminar = eliminar-1;
        }
          
      });

      $(document).on("click", ".borrar", function(){
      $("#tipo").val(''); 
      $("#fabricante").val('');
      $("#modelo").val('');
      $("#serial").val('');
      $("#localizacion").val('');
    //   $("#estado").html("<span  class='mayor'><h5 class='bien'></h5></span>");
    });
    </script>