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
    <button disabled type="button" class="btn btn-primary" id="moverDispositivos" data-toggle="modal" data-target="#exampleModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z"/>
        </svg>
        Mover Dispositivos  
    </button>
    <!-- add device --> 

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" align="center">Mover Dispositivos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h5>Mover todos los dispositivos a un nuevo lugar</h5>
                    <div class="input-group md-2">
                        <span class="input-group-text">Nueva Ubicación</span>
                        <input type="text" id="nuevaUbic" class="form-control">
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
            <button type="button" class="btn btn-secondary" id="" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary"  onclick="cambiarUbicacion()">Mover</button>
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
        <button class="btn btn-success" id="botones">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>
            Agregar nuevo dispositivo del cliente
        </button>
        {{-- @include('modal-agregar-dispositivo.blade.php') --}}
        @include('trabajo/informacion/vistas-dispositivos-de-trabajo/modal-agregar-dispositivo')


        <button class="btn btn-danger" id="botones">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
            </svg>
            Liberar seleccionados
        </button>
</div>

<p class="subtitulo">Dispositivos del Paciente</p>
    <div class="card">
    <div class="card-body">   
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
                <th class="p-1">Acciones</th>
            </tr>
          </thead>
          <tbody class="table-bordered" id="datosPacientes">
             <tr>
                <!--<button id="btnPaciente">Borrar paciente</button>-->
    
                 <!-- Button trigger modal -->
           
                  <!-- <button style="visibility: hidden" type="button" style="display:none" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2">
                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                             <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                         </svg>
                     </button>-->
          
             
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
                                 <select id="selectDiagnostico" name="selectDiagnostico" class="form-control" class="btn-block">
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
                     <button type="button" class="btn btn-primary" id="btnDiagnostico" name="btnDiagnostico">Guardar</button>
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
                    <th class="col-md-1 p-1">Tipo</th>
                    <th class="col-md-1 p-1">Fabricante</th>
                    <th class="col-md-1 p-1">Modelo</th>
                    <th class="col-md-1 p-1">Serie</th>
                    <th class="col-md-1 p-1">Ubicación</th>
                    <th class="col-md-1 p-1" style="width: 250px">Nota</th>
                    <th class="col-md-1 p-1" style="width: 400px"></th>
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
        
    //ELIMINAR FILA DE DISP DE PACIENTES

    // $(document).on("click", ".eliminar", function() {
    //     var id = $(this).data('id');
    //         $(this).parents('tr').remove();
           
              
    //   });
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
