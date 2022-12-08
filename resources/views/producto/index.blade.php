@extends('adminlte::page')
@section('content')


<h1 align="center"><strong>PRODUCTOS</strong></h1>
<div class="d-flex">
  <div class="ml-auto p-2">
</div>
</div>
<div class="container">
  
<table class="table table-striped table-hover table-responsive ">
  <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
    <tr>
      <th class="text-center" style="width: 15%">Fabricante</th>
      <th class="text-center" style="width: 15%">Modelo</th>
      <th class="text-center" >Numero Serial</th>
      <th class="text-center" >Ubicacion</th>
      <th class="text-center" style="width: 10%">Precio VAT</th> 
      <th class="text-center" >Proveedor</th>
      <th class="text-center" style="width: 15%">Fecha</th>
      <th class="text-center" >Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($producto as $productos) 

      @if ($productos->estado == "Reservado")
          <tr id="fila-{{$productos->id}}" style="background: rgba(217, 255, 0, 0.349)">
      @else
        @if ($productos->estado == "Vendido")
            <tr id="fila-{{$productos->id}}"  style="background: rgba(255, 102, 0, 0.356)">
        @else
            <tr id="fila-{{$productos->id}}" >
        @endif      
      @endif
      
        <td class="text-center" >{{$productos->fabricante}}</td>
        <td class="text-center" >{{$productos->modelo}}</td>
        <td class="text-center" >{{$productos->serial}}</td>
        <td class="text-center" >{{$productos->ubicacion}}</td>
        <td class="text-center" >{{$productos->precio_fin}}</td>
        <td class="text-center" >{{$productos->distribuidora}}</td>
        <td class="text-center" >{{$productos->fecha}}</td>
        <td class="text-center" >

          <div style="text-align: right;width:200px">

            <button class="btn d-inline" style="color: rgb(255, 102, 0)"  data-toggle="modal" data-target="#estado{{$productos->id}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor" viewBox="0 0 384 512">
                <path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM80 
                64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm16 
                96H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm0 32v64H288V256H96zM240 416h64c8.8 0 16 7.2 16 16s-7.2 
                16-16 16H240c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
              </svg>
            </button>

            <button class="btn d-inline" style="color: rgb(0, 26, 255); "  data-toggle="modal" data-target="#mover{{$productos->id}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 512 512">
                <path d="M278.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-64 64c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l9.4-9.4V224H109.3l9.4-9.4c12.5-12.5 12.5-32.8 
                0-45.3s-32.8-12.5-45.3 0l-64 64c-12.5 12.5-12.5 32.8 0 45.3l64 64c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-9.4-9.4H224V402.7l-9.4-9.4c-12.5-12.5-32.8-12.5-45.3 
                0s-12.5 32.8 0 45.3l64 64c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-9.4 9.4V288H402.7l-9.4 9.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 
                12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-64-64c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l9.4 9.4H288V109.3l9.4 9.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-64-64z"/>
              </svg>
            </button>

          <a href="{{ url('/productos/editar/'.$productos->id)}}"disabled>
            <button class="btn btn-light-active btn-sm d-inline" disabled >
              <svg xmlns="http://www.w3.org/2000/svg" fill="rgb(168, 166, 14)" viewBox="0 0 16 16" width="18" height="20">
                <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 
                0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z">
                </path>
              </svg>
            </button>
          </a> 

            <button class="btn d-inline" style="color: red"  data-toggle="modal" data-target="#eliminar{{$productos->id}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg>
            </button>

            </div>


            {{-- ESTADO --}}
            <div class="modal fade" id="estado{{$productos->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100">Cambiar Estado</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <b>Estado actual: {{$productos->estado}}</b>
                    <p></p>
                    <div class="row justify-content-center">
                      <div class="input-group-prepend col-10">
                        <div class="input-group-text">Estado</div>
                              <select name="est{{$productos->id}}" id="est{{$productos->id}}" name="est" id="est" class="form-control" >
                                <option selected disabled value="Disponible">Seleccione un Estado</option>
                                <option value="Disponible">Disponible</option>
                                <option value="Reservado">Reservado</option>
                                <option value="Vendido">Vendido</option>
                              </select>
                      </div>
                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" onclick="cambiarEstado({{$productos->id}})">Guardar</button>
                  </div>
                </div>
              </div>
            </div>

             {{-- MOVER --}}
             <div class="modal fade" id="mover{{$productos->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100">Cambiar Ubicacion</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <b>Ubicacion Actual: {{$productos->ubicacion}}</b>
                    <p></p>
                    <div class="row justify-content-center">
                      <div class="input-group-prepend col-10">
                        <div class="input-group">
                          <span class="input-group-text" >Nueva Ubicacion</span>
                        <input type="text" id="ubi{{$productos->id}}" name="ubi{{$productos->id}}" class="form-control" 
                           autocomplete="off" onkeypress="return ( (event.charCode == 45 )|| (event.charCode >= 48 && event.charCode <= 57)|| (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                         </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" onclick="moverDisp({{$productos->id}})">Guardar</button>
                  </div>
                </div>
              </div>
            </div>

            {{-- ELIMINAR --}}
            <div class="modal fade" id="eliminar{{$productos->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                   ¿Realmente Desea Borrar el producto?
                  </div>
                  <form action="{{url('/producto/'.$productos->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
                    <button class="btn btn-success" >Aceptar</button>
                    
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
{{ $producto->links() }}
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
  function cambiarEstado(id){
    
    //var esta = document.getElementById("est").value;
    var combo = document.getElementById("est"+id);
var selected = combo.options[combo.selectedIndex].text;
    //console.log(selected);
    $.ajax({
        url: "/producto/cambiarEstado",
        type: "POST",
        data: {
          "_token": "{{ csrf_token() }}",
          'seleccionado':selected,
          'id': id,
        },
        cache: false,
        dataType: 'json',
        success: function (dataResult) {
          c//onsole.log(dataResult.data);
          $('#estado'+dataResult.data).modal('hide');
          location.href="/productos";
        }
    });
  }

  function moverDisp(id){
    
    var combo = $("#ubi"+id).val();
    
    $.ajax({
        url: "/producto/moverDispositivo",
        type: "POST",
        data: {
          "_token": "{{ csrf_token() }}",
          'texto':combo,
          'id': id,
        },
        cache: false,
        dataType: 'json',
        success: function (dataResult) {
          //console.log(dataResult.data);
          $('#mover'+dataResult.data).modal('hide');
          location.href="/productos";
        }
    });
  }
</script> 
@endsection