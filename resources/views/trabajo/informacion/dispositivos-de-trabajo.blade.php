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
    #botones, #btnBuscarDonante{
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
    
                 <!-- Button trigger modal -->
           
                   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2">
                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                             <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                         </svg>
                     </button>
          
             
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
        <thead  id="cabeceraDonantes1" class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
            <tr>
                {{-- titulos de la tabla--}}
            </tr>
        </thead>
        <tbody id="buscadorDonantes1" class="table-bordered" >
            <tr>
                {{-- datos de la tabla inventarios --}}
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
          <tbody class="table-bordered" id="datosOtrosDispositivos">
              {{-- @if(count($inventario)<=0) --}}
            <tr>
              
            <tr>
               {{--  --}}
          </tbody>
    </table>
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
            datosOtrosDispositivos+="<td>"+"<input type='checkbox'>"+"</td>"+"<td name='tipo[]' id=''>"+row.tipo+"</td><td name='fabricante[]' id=''>"+row.fabricante+"</td><td name='modelo[]' id=''>"+row.modelo+"</td>"
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


        //AJAX DE LA TABLA DE dispositivos/dispositivos de pacientes
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
                        datosPacientes+="<td>"+"<input type='checkbox' id='moverUbicacion'>"+
                            "</td>"+"<td>"+row.tipo+"</td><td>"+row.fabricante+"</td><td>"+row.modelo+"</td>"
                        +"<td>"+row.serial+"</td><td>"+row.localizacion+"</td><td>"+row.diagnostico+"<td></td>"+
                        "<td>"+
                            "<button class='btn btn-icon btn-danger' type='button' id='btnDiagnostico' name='btnDiagnostico'>"+
                                "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>"+
                                    "<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>"+
                                    "<path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>"+
                                "</svg>"+
                            "</button>"+
                            "<button class='btn btn-primary'>"+
                                "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-left-right' viewBox='0 0 16 16'>"+
                                    "<path fill-rule='evenodd' d='M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z'/>"+
                                "</svg>"+
                            "</button>"+
                            "<button class='btn btn-primary'>"+
                                "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrows-move' viewBox='0 0 16 16'>"+
                                    "<path fill-rule='evenodd' d='M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z'/>"+
                                "</svg>"+
                            "</button>"+
                            "<button class='btn btn-success'>"+
                                 "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-download' viewBox='0 0 16 16'>"+
                                    "<path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/>"+
                                    "<path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'/>"+
                                "</svg>"+
                            "</button>"+
                     
                            //modal

                            "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#exampleModal2'>"+
                                "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-share' viewBox='0 0 16 16'>"+
                                    "<path d='M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z'/>"+
                                "</svg>"+
                            "</button>"+
 
    "<div class='modal fade' id='exampleModal2' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel2' aria-hidden='true'>"+
        "<div class='modal-dialog' role='document'>"+
            "<div class='modal-content'>"+
            "<div class='modal-header'>"+
                "<h5 class='modal-title' id='exampleModalLabel2' align='center'>Diagnóstico</h5>"+
                "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"+
                "<span aria-hidden='true'>&times;</span>"+
            "</button>"+
            "</div>"+
            "<div class='modal-body'>"+
                "<div class='container'>"+
                    "<p align='center'>Seleccionar diagnostico para el dispositivo: <br>"+
                    "</p>"+
                    "<div class='input-group md-2'>"+
                        "<span class='input-group-text'>Diagnóstico</span>"+
                        "<select id='selectDiagnostico' name='selectDiagnostico' class='form-control' class='btn-block'>"+
                            "<option value=''>No Establecido</option>"+
                            "<option value='Cabezal'>Cabezal</option>"+
                            "<option value='PCB'>PCB</option>"+
                            "<option value='Motor'>Motor</option>"+
                            "<option value='Lógico'>Lógico</option>"+
                            "<option value='Sectores malos'>Sectores malos</option>"+
                            "<option value='Firmware'>Firmware</option>"+
                            "<option value='Ransomware'>Ransomware</option>"+
                            "<option value='CD/DVD'>CD/DVD</option>"+
                            "<option value='Disco flexible'>Disco flexible</option>"+
                            "<option value='NAND lógico'>NAND Logico</option>"+
                            "<option value='NAND electrónico'>NAND Electronico</option>"+
                            "<option value='SSD lógico'>SSD Lógico</option>"+
                            "<option value='SDD firmware'>SDD Firmware</option>"+
                            "<option value='Teléfono móvil lógico'>Teléfono movil lógico</option>"+
                            "<option value='Teléfono móvil electrónico'>Teléfono movil electrónico</option>"+
                            "<option value='Unidad de cinta'>Unidad de cinta</option>"+
                        "</select>"+                           
                    "</div><br>"+
                    "<div class='input-group'>"+
                        "<div class='form-check'>"+
                            "<input class='form-check-input' style='width: 20px; height:18px;' type='checkbox' value=' id='flexCheckDefault'>"+
                            "<label class='form-check-label' for='flexCheckDefault'>  Asignar a todos los discos en el trabajo</label>"+
                        "</div>"+
                    "</div>"+  
                "</div>"+
            "</div>"+
            "<div class='modal-footer'>"+
            "<button type='button' class='btn btn-secondary' id='botones' data-dismiss='modal'>Cancelar</button>"+
            '<button type="button" class="btn btn-primary" id="btnDiagnostico" name="btnDiagnostico">Guardar</button>'+
            "</div>"+
        "</div>"+
        "</div>"+
    "</div>"+
    //modal
         '<button class="btn btn-secondary">'+
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">'+
                '<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>'+
              '</svg>'+
        '</button>'+

        '<button class="btn btn-secondary">'+
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">'+
                '<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>'+
              '</svg>'+
        '</button>'+

                        +"</td>";
                        datosPacientes+="</tr>";
                        
                    })
                    $("#datosPacientes").append(datosPacientes);
                }
            });
            
    });
    //
    //     $(document).ready(function() {
    //         var url = "{{URL('datosInventario')}}";
    //         $.ajax({
    //             url: "/trabajos/nuevo/detalle/datosInventario",
    //             type: "POST",
    //             data:{ 
    //                 "_token": "{{ csrf_token() }}",
    //                 "nombre": "{{$orden_elegida->id}}",
    //             },
    //             cache: false,
    //             dataType: 'json',
    //             success: function(dataResult){
    //                 console.log(dataResult);
    //                 var resultData = dataResult.data;
    //                 var bodyData = '';
    //                 $.each(resultData,function(index,row){
    //                     datosInventario+="<tr>"
    //                     datosInventario+="<td></td>"+"<td>"+row.tipo+"</td><td>"+row.fabricante+"</td><td>"+row.modelo+"</td>"
    //                     +"<td>"+row.serial+"</td><td>"+row.localizacion+"</td><td>"+row.diagnostico+
    //                     "</td>"
    //                     "<button class='btn btn-icon btn-danger' type='button' id='deletRow' name='deletRow'>"+
    //                                           "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>"+
    //                                           "<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>"+
    //                                           "<path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>"+
    //                                           "</svg>"+
    //                     "</button>"
    //                     +"<td>";
    //                     datosInventario+="</tr>";
                        
    //                 })
    //                 $("#datosInventario").append(datosInventario);
    //             }
    //         });
            
    // });
  ////////////////////
  // ajax de buscador de donante
    $('#btnBuscarDonante').on('click', function () {
        var url1 = $('#idInternoDonante').val();
        var url2 = $('#modeloDonante').val();
        var url3 = $('#serieDonante').val();
        var url4 = $('#tamañoDonante').val();
        var url5 = $('#pcbDonante').val();
      //  console.log(url3);
        $.ajax({
            
            url: "/trabajos/nuevo/detalle/modalDonante",
            type: "POST",
            data:{ 
                "_token": "{{ csrf_token() }}",
                idInternoDonante: url1,
                modeloDonante: url2,
                serieDonante: url3,
                tamañoDonante: url4,
                pcbDonante: url5,
                
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
            console.log(dataResult);
                var resultData = dataResult.data;
                var bodyData = '';
                $.each(resultData,function(index,row){
                    cabeceraDonantes+="<tr>"
                    cabeceraDonantes+="<th>"+"ID"+"</th><th>"+"Fabricante"+"</th><th>"+"Modelo"+"</th>"
                    +"<th>"+"Serie"+"</th><th>"+"Tamaño"+"</th><th>"+"Ubicacion"+"<th></th>";
                    cabeceraDonantes+="</tr>";
                    buscadorDonantes+="<tr>"
                    buscadorDonantes+="<td>"+row.id+"</td><td>"+row.manufactura+"</td><td>"+row.modelo+"</td>"
                    +"<td>"+row.numero_de_serie+"</td><td>"+row.capacidad+"</td><td>"+row.ubicacion+
                    "<td>"+
                            '<button class="btn btn-success" type="button" id="btnBuscarDonante" name="btnBuscarDonante">'+
                                "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' fill='currentColor' class='bi bi-plus-circle' viewBox='0 0 16 16'>"+
                                    "<path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>"+
                                    "<path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>"+
                                "</svg>"+
                        '</button>'+
                        '<button type="button" class="btn btn-primary" id="btnBuscarDonante" name="btnBuscarDonante">XXXXXXXXX</button>';
                    buscadorDonantes+="</tr>";
                    
                })
                $("#cabeceraDonantes").append(cabeceraDonantes);
                $("#buscadorDonantes").append(buscadorDonantes);
            }
        });
});


   // ajax de lista de donantes en dispositivos de trabajos
   $('#btnAgregarDonante').on('click', function () {
        var url11 = $('#idInternoDonante1').val();
        var url21 = $('#modeloDonante1').val();
        var url31 = $('#serieDonante1').val();
        var url41 = $('#tamañoDonante1').val();
        var url51 = $('#pcbDonante1').val();
       console.log(url21);
        $.ajax({
            
            url: "/trabajos/nuevo/detalle/agregarDonante",
            type: "POST",
            data:{ 
                "_token": "{{ csrf_token() }}",
                idInternoDonante1: url11,
                modeloDonante1: url21,
                serieDonante1: url31,
                tamañoDonante1: url41,
                pcbDonante1: url51,
                
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
            console.log(dataResult);
                var resultData = dataResult.data;
                var bodyData = '';
                $.each(resultData,function(index,row){
                    cabeceraDonantes1+="<tr>"
                    cabeceraDonantes1+="<th>"+"ID"+"</th><th>"+"Fabricante"+"</th><th>"+"Modelo"+"</th>"
                    +"<th>"+"Serie"+"</th><th>"+"Tamaño"+"</th><th>"+"Ubicacion"+"<th></th>";
                    cabeceraDonantes1+="</tr>";
                    buscadorDonantes1+="<tr>"
                    buscadorDonantes1+="<td>"+row.id+"</td><td>"+row.manufactura+"</td><td>"+row.modelo+"</td>"
                    +"<td>"+row.numero_de_serie+"</td><td>"+row.capacidad+"</td><td>"+row.ubicacion+
                    "<td>"                
                    ;
                    buscadorDonantes1+="</tr>";
                    
                })
                $("#cabeceraDonantes1").append(cabeceraDonantes1);
                $("#buscadorDonantes1").append(buscadorDonantes1);
            }
        });
});



//mover ubicacion
$('#btnMoverUbicacion').on('click', function () {
        
        var url = $('#moverUbicacion').val();
       console.log(url);
        $.ajax({
            url: "/trabajos/nuevo/detalle/moverUbicacion",
            type: "POST",
            data:{ 
                "_token": "{{ csrf_token() }}",
                moverUbicacion: url,
                "nombre": "{{$orden_elegida->id}}",
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
            // console.log(dataResult);

                
            }
        });
    });


    //guardar diagnostico de la tabla de disp del paciente
    $('#btnDiagnostico').on('click', function () {
        
        var url = $('#selectDiagnostico').val();
       console.log(url);
        $.ajax({
            url: "/trabajos/nuevo/detalle/guardarDiagnostico",
            type: "POST",
            data:{ 
                "_token": "{{ csrf_token() }}",
                selectDiagnostico: url,
                "nombre": "{{$orden_elegida->id}}",
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                $('#exampleModal2').modal('hide');
            //console.log(dataResult);

                
            }
        });
    });
    </script>