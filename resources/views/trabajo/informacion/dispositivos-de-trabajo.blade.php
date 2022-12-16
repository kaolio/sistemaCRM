<style>
    .subtitulo{  
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 2px;
    }
    .btn{
        padding: 7px 8px;
        font-size: 12px;
        text-align: center;
    }
    #botones, #btnBuscarDonante, #btnBuscarClon,#moverDispositivos{
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
    <button disabled type="button" class="btn btn-primary" id="moverDispositivos" data-toggle="modal" data-target="#moverDispo">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z"/>
        </svg>
        Mover Dispositivos  
    </button>
    <!-- add device --> 

    <!-- Modal -->
    <div class="modal fade" id="moverDispo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title w-100 text-center" id="exampleModalLabel" align="center">Mover Dispositivos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h5 class="modal-title w-100 text-center">Mover todos los dispositivos a un nuevo lugar</h5>
                    <br>
                    <div class="input-group">
                        <tr>
                            <td>
                               <span class="input-group-text">Ubicación Actual</span> 
                            </td>
                            <td>
                                <input type="text" id="ubicacionClon" class="form-control" value="">  
                            </td>
                        </tr>
                    </div>
                        <br>
                    <div class="input-group md-2">
                        <span class="input-group-text">Nueva Ubicación</span>
                        <input type="text" id="nuevaUbic" class="form-control">
                    </div>
                        <span class="dejar-en-blanco m-2">Dejar en blanco para no cambiar</span>
                        
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-success"  onclick="cambiarUbicacion()">Mover</button>
            </div>
        </div>
        </div>
    </div>


        <button disabled type="button" class="btn text-white" id="eliminarDispositivos" style="background: red" data-toggle="modal" data-target="#example4">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
            </svg>
            Eliminar dispositivos
        </button>

        @include('trabajo/informacion/vistas-dispositivos-de-trabajo/modal-agregar-nuevo-dispositivo')

        @include('trabajo/informacion/vistas-dispositivos-de-trabajo/modal-agregar-dispositivo')

        <button class="btn btn-danger" id="botones">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
            </svg>
            Liberar seleccionados
        </button>
</div>

<p class="subtitulo">Dispositivo a Recuperar</p>
    <div class="card">
    <div class="card-body">   
    <table class="table table-responsive">
        <thead  class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
            <tr>
                <th class="p-1" style="width: 80px">&nbsp;&nbsp;&nbsp;</th>
                <th class="col-md-1 p-1 text-center">Tipo</th>
                <th class="col-md-2 p-1 text-center" >Fabricante</th>
                <th class="col-md-1 p-1 text-center" >Modelo</th>
                <th class="col-md-1 p-1 text-center" >Serie</th>
                <th class="col-md-1 p-1 text-center" >Ubicación</th>
                <th class="col-md-2 p-1 text-center" >Diagnóstico</th>
                <th class="col-md-1 p-1 text-center" >Nota</th>
                <th class="col-md-2 p-1 text-center" ></th>
            </tr>
          </thead>
          <tbody class="table-bordered" id="datosPacientes">
             <tr>
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
                             <p align="center">Seleccionar diagnostico para el dispositivo: <br></p>
                             <div class="input-group md-2">
                                <span class="input-group-text">Dispositivo</span>
                                <input type="text" id="dispositivoDiagnostico" class="form-control" readonly>
                            </div>
                            <br>
                             <div class="input-group md-2">
                                 <span class="input-group-text">Diagnóstico</span>
                                 <select id="selectDiagnostico" name="selectDiagnostico" class="form-control" class="btn-block">
                                     <option disabled selected>No Establecido</option>
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
                         </div>
                     </div>
                     <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" id="botones" data-dismiss="modal">Cancelar</button>
                     <button type="button" class="btn btn-success" id="btnDiagnostico" name="btnDiagnostico">Guardar</button>
                     </div>
                 </div>
                 </div>
             </div> 
                           
            </tr>
        </tbody>
    </table>
     </div>
    </div>

<p class="subtitulo">Clones de Trabajo</p>
    <div class="card">
        <div class="card-body">
            <table class="table table-responsive">
                <thead  class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
                    <tr>
                        <th class="p-1"> &nbsp;&nbsp;&nbsp; </th>
                        <th class="col-md-1 p-1 text-center"> ID </th>
                        <th class="col-md-1 p-1 text-center">Tipo</th>
                        <th class="col-md-2 p-1 text-center">Fabricante</th>
                        <th class="col-md-2 p-1 text-center">Modelo</th>
                        <th class="col-md-2 p-1 text-center">Serie</th>
                        <th class="col-md-2 p-1 text-center">Ubicación</th>
                        <th class="col-md-2 p-1 text-center">Nota</th>
                        <th class="col-md-1 p-1 text-center"></th>
                    </tr>
                </thead>
                <tbody class="table-bordered" id="clonesTrabajo">
                    <tr>
                    
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


<p class="subtitulo">Donantes de Trabajo</p>
    <div class="card">
    <div class="card-body">
        <table class="table table-responsive">
            <thead  class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
                <tr>
                    <th class="p-1"> &nbsp;&nbsp;&nbsp; </th>
                    <th class="col-md-1 p-1 text-center"> ID </th>
                    <th class="col-md-1 p-1 text-center">Tipo</th>
                    <th class="col-md-2 p-1 text-center">Fabricante</th>
                    <th class="col-md-2 p-1 text-center">Modelo</th>
                    <th class="col-md-2 p-1 text-center">Serie</th>
                    <th class="col-md-2 p-1 text-center">Ubicación</th>
                    <th class="col-md-2 p-1 text-center">Nota</th>
                    <th class="col-md-1 p-1 text-center"></th>
                </tr>
            </thead>
            <tbody class="table-bordered" id="donantesTrabajo">
                <tr>
                
                </tr>
            </tbody>
        </table>
    </div> 
    </div>    


<p class="subtitulo">Otros Dispositivos de los Clientes</p>
    <div class="card">
    <div class="card-body">
        <table class="table table-responsive">
            <thead  class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
                <tr>
                    <th class="p-1"> &nbsp;&nbsp;&nbsp; </th>
                    <th class="col-md-1 p-1 text-center">Tipo</th>
                    <th class="col-md-2 p-1 text-center">Fabricante</th>
                    <th class="col-md-2 p-1 text-center">Modelo</th>
                    <th class="col-md-2 p-1 text-center">Serie</th>
                    <th class="col-md-2 p-1 text-center">Ubicación</th>
                    <th class="col-md-1 p-1 text-center" style="width: 250px">Nota</th>
                    <th class="col-md-1 p-1 text-center" style="width: 400px"></th>
                </tr>
            </thead>
            <tbody class="table-bordered" id="datosOtrosDispositivos">
                 <tr>
                
                <tr>   
            </tbody>
        </table>
    </div>
    </div>

    <!-- Modal 4-->
    <div class="modal fade" id="example4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5 class="text-center">¿Esta seguro de eliminar este registro?</h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
              <button type="button" class="btn btn-primary" onclick="eliminarVariosClones()">Aceptar</button>
            </div>
          </div>
        </div>
      </div>

    @include('trabajo.ajax.detalle.dispositivosAjax')

     
    <script>

        
      $(window).ready(function () {
   
   if ( $ ('.eliminar').length)
   {
       $('.eliminar').click(function () {
          var id = $(this).data('id');
          $(this).parents('tr').fadeOut(1000); 
       });
   }

});
  ////////////////////
  
        //guardar diagnostico de la tabla de disp del paciente
 function Eliminar(btn){
    var token = $("#token").val();
    $.ajax({
        url:"/trabajos/nuevo/detalle/"+btn.value+"",
        headers: {'X-CSRF-TOKEN': token},
        type:'DELETE',
        dataType: 'json',
    });
 }
    </script>
