@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700"> EDITAR CLIENTE</h1>



<body>
 <div class="card">
   
     <div class="card-body">
  
            <form action="{{url('/cliente/editar/'.$cliente->id)}}" method="POST">
              @csrf
              <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <label for="nombre" style="justify-content-center;">Nombre del cliente</label>
                        <input type="text" name="nombreCliente" id="nombreCliente" required value="{{$cliente->nombreCliente}}" class="form-control" onkeyup="validarNombre()" placeholder="Nombre" tabindex="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209)) ">
                        <span id="estadoNombre"></span>
                      </div>
                      <div class="col-3">
                        <label for="nombre" style="justify-content-center;"> &nbsp;</label>
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">VAT ID</span>
                        <input type="text" id="vat" name="vat" class="form-control" onkeyup="mayus(this);"
                          required value="{{$cliente->vat}}" onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Dirección</span>
                        <input type="text" id="direccion" name="direccion" class="form-control" 
                          required  value="{{$cliente->calle}}" onkeyup="validarDireccion()" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241) || (event.charCode == 209))">
                        </div>
                        <span id="estadoDireccion"></span>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Número</span>
                        <input type="text" id="numero" name="numero" class="form-control" 
                          required value="{{$cliente->numero}}" onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">APT</span>
                        <input type="text" id="apt" name="apt" class="form-control" 
                          required value="{{$cliente->apt}}" onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-4">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Codigo Postal</span>
                        <input type="text" id="postal" name="postal" class="form-control" 
                          required value="{{$cliente->codigoPostal}}" onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 241)|| (event.charCode == 209) || (event.charCode == 44) || (event.charCode == 46) || (event.charCode == 35) || (event.charCode == 47) || (event.charCode == 45) || (event.charCode == 124) || (event.charCode == 42))">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">PAK</span>
                        <input type="text" id="pak" name="pak" class="form-control" 
                          required value="{{$cliente->pak}}" onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57)   )">
                        </div>
                      </div>
                      <div class="col-5">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Nombre de Ciudad</span>
                        <input type="text" id="ciudad" name="ciudad" class="form-control" 
                          required value="{{$cliente->nombreCiudad}}" onkeyup="validarCiudad()" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                         </div>
                         <span id="estadoCiudad"></span>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Pais</span>
                        <input type="text" id="pais" name="pais" class="form-control" 
                          required value="{{$cliente->pais}}" onkeyup="validarPais()" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                        </div>
                        <span id="estadoPais"></span>
                      </div>
                      <div class="col-6">
                        <div class="input-group">
                          <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Idioma</span>
                          <select name="idioma" id="idioma"class="form-control" value="{{$cliente->idioma}}">
                            @if ($cliente->idioma == $cliente->idioma)
                            <option value="{{$cliente->idioma}}" selected>{{$cliente->idioma}}</option>                      
                          @else
                            <option value="{{$cliente->idioma}}">{{$cliente->idioma}}</option>      
                          @endif
                            <option value="español">Español</option>
                            <option value="ingles">Ingles</option>
                            <option value="frances">Frances</option>
                            <option value="chino">Chino</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div> 
                </div>

                <div class="card">
                  <div class="card-body">
                    <h4><strong>Detalles</strong></h4>
              
                    <div class="row">
                      <div class="col-4">
                        <div class="input-group">
                          <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Tipo</span>
                            <select name="tipo[]" id="tipo" class="form-control country" required>
                              <option value="correo">Correo Electrónico</option>
                              <option value="telefono">Telefono</option>
                              <option value="celular">Celular</option>
                              <option value="skype">Skype</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="input-group">
                          <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Valor</span>
                            <input type="text" class="form-control" onkeyup="validarCorreo()" name="valor[]"id="valor">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Nombre</span>
                            <input type="text" class="form-control " name="nombre[]"id="nombre"
                            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))">
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
                      <table class="table table-light" id="tablaEditar">
                          <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                              <tr>
                                <th class="text-center" style="width: 20%">Tipo</th>
                                <th class="text-center" style="width: 20%">Valor</th>
                                <th class="text-center" style="width: 20%" colspan="2">Nombre</th>
                                <th class="text-center" style="width: 5%" colspan="2"></th>
                              </tr>
                            </thead>
                          <tbody class="table-bordered" id="datosEditados">
                              <tr>
                              
                              <tr>
                          </tbody>
                      </table>
                  </div>
                   
                  
                </div>


                <label style="font-size: 16px;">Nota</label>
                <br>
                <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" name="nota" id="nota"  cols="140" rows="4">{{$cliente->nota}}</textarea>


 
              </div>

              <div class="form-group">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                <a href="/clientes" class="btn btn-danger my-2 my-sm-0">Cancelar</a>

                <button class="btn btn-success my-2 my-sm-0" type="submit" >Actualizar</button>
              </div> 
      </div>
      </form>
                

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

<script src="{{ asset('js/cliente/create.js')}}"></script>
<link rel="stylesheet" href="{{ URL::asset('estilos/style.css') }} ">
<script>

$(document).ready(function() {

$.ajax({
    url: "/cliente/editar/datos",
    type: "POST",
    data:{ 
        "_token": "{{ csrf_token() }}",
        "id": "{{$cliente->id}}",
    },
    cache: false,
    dataType: 'json',
    success: function(dataResult){
    //console.log(dataResult);
        
    var filas = dataResult.data.length;
        
          for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                 
                  var nuevafila= "<tr><td class='text-center'>" +
                  dataResult.data[i].tipo + "</td><td class='text-center'>" +
                  dataResult.data[i].valor  + "</td><td class='text-center' >" +
                  dataResult.data[i].nombre  + "</td><td>"+ "</td><td class='text-center'>" +
                  '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                          '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                          '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                        '</svg>'+
                      '</button>'+
                      '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '<div class="modal-dialog" role="document">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header">'+
                              '<h5 class="modal-title" id="exampleModalLabel">Eliminar trabajo</h5>'+
                              '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                              '</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                            '¿Realmente Desea Borrar el trabajo?'+
                            '</div>'+
                            '<form action="{{url('/eliminarDatos/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                              '@csrf'+
                            ' @method('DELETE')'+
                            '<div class="modal-footer">'+
                              '<button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>'+
                              '<button class="btn btn-primary" style="padding-left: 5px">'+
                                'Aceptar'+
                              '</button>'+
                            '</div>'+
                          '</form> '+
                          '</div>'+
                        '</div>'+
                    ' </div> '+
                    "</td></tr>"
              
              $("#datosEditados").append(nuevafila)
          }
      
        }
    });
});
//

$("#guardar").on('click',function(){
            var url1 = $('#tipo').val();
            var url2 = $('#valor').val();
            var url3 = $('#nombre').val();

           // console.log(url1);

            $('#tipo').val('');
            $('#valor').val('');
            $('#nombre').val('');
            
                $.ajax({
                    url: "/clientes/editar/detallesNuevos",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": "{{$cliente->id}}",
                        tipo: url1,
                        valor: url2,
                        nombre: url3,
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        console.log(dataResult);
                        $('#tablaEditar > tbody').empty();
                        var filas = dataResult.data.length;

                     
                            for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                                
                                    
                                var nuevafila= "<tr><td class='text-center'>" +
                                  dataResult.data[i].tipo + "</td><td class='text-center'>" +
                                  dataResult.data[i].valor  + "</td><td class='text-center' >" +
                                  dataResult.data[i].nombre  + "</td><td>"+ "</td><td class='text-center'>" +
                                  '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal'+dataResult.data[i].id+'">'+
                                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                                          '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                                          '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                                        '</svg>'+
                                      '</button>'+
                                      '<div class="modal fade" id="exampleModal'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                                        '<div class="modal-dialog" role="document">'+
                                          '<div class="modal-content">'+
                                            '<div class="modal-header">'+
                                              '<h5 class="modal-title" id="exampleModalLabel">Eliminar trabajo</h5>'+
                                              '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                                '<span aria-hidden="true">&times;</span>'+
                                              '</button>'+
                                            '</div>'+
                                            '<div class="modal-body">'+
                                            '¿Realmente Desea Borrar el trabajo?'+
                                            '</div>'+
                                            '<form action="{{url('/eliminarDatos/')}}'+'/'+dataResult.data[i].id+'" method="POST" class="d-inline">'+
                                              '@csrf'+
                                            ' @method('DELETE')'+
                                            '<div class="modal-footer">'+
                                              '<button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>'+
                                              '<button class="btn btn-primary" style="padding-left: 5px">'+
                                                'Aceptar'+
                                              '</button>'+
                                            '</div>'+
                                          '</form> '+
                                          '</div>'+
                                        '</div>'+
                                    ' </div> '+
                                    "</td></tr>"
                                    
                                    $("#datosEditados").append(nuevafila);
                                }
                
                    }
                });
    });

</script>

@endsection