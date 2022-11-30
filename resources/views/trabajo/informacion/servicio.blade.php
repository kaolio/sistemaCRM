<div class="card">
    <div class="card-body">
      <h4><strong>Detalle de Servicio</strong></h4>

      <div class="row">
        <div class="col-4">
            <div class="input-group">
                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Detalle</span>
                <input type="text" class="form-control " name="detalle"id="detalle"
                onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57))">
            </div>
        </div>
        <div class="col-4">
            <div class="input-group">
                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Descripcion</span>
                <input type="text" class="form-control " name="descripcion"id="descripcion"
                onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57))">
            </div>
        </div>
        <div class="col-3">
            <div class="input-group">
                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Precio</span>
                <input type="text" class="form-control " name="precio" id="precio"
                onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
            </div>
        </div>
        <div class="col-1">
            <button class='btn btn-icon btn-success' type='button' id='guardar' name='guardar'>
                <svg xmlns="http://www.w3.org/2000/svg" width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox="0 0 448 512">
                    <path d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 
                    48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM272 80v80H144V80h128zm122 352H54a6 6 0 0 1-6-6V86a6 6 0 0 1 6-6h42v104c0 13.255 
                    10.745 24 24 24h176c13.255 0 24-10.745 24-24V83.882l78.243 78.243a6 6 0 0 1 1.757 4.243V426a6 6 0 0 1-6 6zM224 232c-48.523 0-88 39.477-88 
                    88s39.477 88 88 88 88-39.477 88-88-39.477-88-88-88zm0 128c-22.056 0-40-17.944-40-40s17.944-40 40-40 40 17.944 40 40-17.944 40-40 40z"/>
                </svg>
                </button>
        </div>
        
      </div>
      
    </div>

  </div>

  <div class="card">
    <div class="card-body">
        <table class="table table-light" id="tablaServicio">
            <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                <tr>
                  <th class="text-center" style="width: 20%">Detalle</th>
                  <th class="text-center" style="width: 20%">Descripcion</th>
                  <th class="text-center" style="width: 20%" colspan="2">Precio</th>
                </tr>
              </thead>
            <tbody class="table-bordered" id="serviciosGuardados">
                <tr>
                
                <tr>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>
                        <div class="row justify-content-center">
                            <button class="btn btn-success" style="width: 50%;" id="enviarServicio" name="enviarServicio" >Enviar</button>
                        </div>
                    </th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
     
    
  </div>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script>
    $(document).ready(function() {

        $.ajax({
            url: "/trabajos/nuevo/detalle/servicio",
            type: "POST",
            data:{ 
                "_token": "{{ csrf_token() }}",
                "id": "{{$orden_elegida->id}}",
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
            //console.log(dataResult);
                
            var filas = dataResult.data.length;
            var count = 0;

                for (  i = 0 ; i < filas; i++){ 
                    count = Number(count) + Number(dataResult.data[i].precio); 
                }
                
                for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                    var text = "";
                    var aux1 = "";
                    if (dataResult.data[i].id != null) {
                        aux1 = dataResult.data[i].id;
                    }
                        
                        var nuevafila= "<tr><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                        dataResult.data[i].detalle + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                        dataResult.data[i].descripcion  + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                        dataResult.data[i].precio  + "</td></tr>"
                    
                    $("#serviciosGuardados").append(nuevafila)
                }
                
                    var nueva= "<tr><td class='text-center text-white' style='background: rgb(2, 117, 216)' colspan='2'>"+
                        "TOTAL" +
                        "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                        count + "</td></tr>"
                    
                    $("#serviciosGuardados").append(nueva)
                }
            });
        });


        $("#guardar").on('click',function(){
            var url1 = $('#detalle').val();
            var url2 = $('#descripcion').val();
            var url3 = $('#precio').val();

            $('#detalle').val('');
            $('#descripcion').val('');
            $('#precio').val('');
            
                $.ajax({
                    url: "/trabajos/nuevo/detalle/guardarServicio",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": "{{$orden_elegida->id}}",
                        detalle: url1,
                        descripcion: url2,
                        precio: url3,
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        $('#tablaServicio > tbody').empty();
                        var filas = dataResult.data.length;
                            for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                                var text = "";
                                var aux1 = "";
                                if (dataResult.data[i].id != null) {
                                    aux1 = dataResult.data[i].id;
                                }
                                    
                                    var nuevafila= "<tr><td class='text-center' style= 'background: rgb(209, 244, 255)' >" +
                                    dataResult.data[i].detalle + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                                    dataResult.data[i].descripcion  + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                                    dataResult.data[i].precio  + "</td></tr>"
                                
                                $("#serviciosGuardados").append(nuevafila)
                            } 
                            var nueva= "<tr><td class='text-center text-white' style='background: rgb(2, 117, 216)' colspan='2'>"+
                                "TOTAL" +
                                "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                                count + "</td></tr>"
                        
                        $("#serviciosGuardados").append(nueva)   
                    }
                });
    });


    $("#enviarServicio").on('click',function(){
            
                $.ajax({
                    url: "/trabajos/nuevo/detalle/enviarServicio",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": "{{$orden_elegida->id}}",
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        console.log(dataResult);
                        alert("MENSAJE ENVIADO");
                    }
                });
    });
  </script>