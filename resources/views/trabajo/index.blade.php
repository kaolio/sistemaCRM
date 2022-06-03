@extends('adminlte::page')
@section('content')

 
  <!--?php 
  $orden = $_POST['orden'];
?> -->



<h1 align="center"><strong>ORDEN DE TRABAJO</strong></h1>

    <div class="input-group md-2">
      <div class="col-3">
              <div class="input-group md-2">
                <span class="input-group-text">NºOrden </span>
                <input class="form-control" id="orden" name="orden" autocomplete="off">
                <button  id="btnBuscar" name="btnBuscar" style="border-color: #ced4da;border-style: solid;" >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#007BFF" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                  </svg></button>           
            </div> 
        </div>
    </div>
  


<div class="d-flex">
  <div class="p-2">
    <button type="button" class="btn btn-primary">Excel</button>
    <a class="btn btn-primary" href="{{URL('trabajo/pdf')}}" role="button">PDF</a> 
    <button type="button" class="btn btn-primary">Imprimir</button>
  </div>
  <div class="ml-auto p-2">
    <form class="form-inline" action="{{ url('trabajos ')}}" method="GET">
      
      <label for="">Busqueda Rápida</label>
      <div class="form-group mx-sm-3 mb-2">
        <input type="" class="form-control" id="busqueda" name="busqueda" value="{{$busqueda}}" placeholder="Modelo o Serial">
      </div>
      <button type="submit" class="btn btn-primary mb-2">Buscar</button>
    </form>
</div>
</div>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Prioridad</div>
            <form class="form-inline" action="{{ url('trabajos')}}" method="GET">
                <select name="busqueda" id="busqueda" class="form-control">
                  <option value="">Todos</option>
                  <option value="{{$busqueda="Normal"}}">Normal</option>
                  <option value="{{$busqueda="Alta"}}">Alta</option>
                  <option value="{{$busqueda="Urgente"}}">Urgente</option>
                </select>
              <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Estado</div>
        
        <select name="estado" id="estado" class="form-control">
          <option value="">Todos</option>
          <option value="enProceso">En Proceso</option>
          <option value="actuales">Actuales</option>
          <option value="compleados">Completados</option>
        </select>
      </div>
      <div class="input-group-prepend">
        <div class="input-group-text" id="btnGroupAddon">Ingeniero</div>
      
      <select name="ingeniero" id="ingeniero" class="form-control">
        <option value="">Todos los Ingenieros</option>
        <option value="Alex">Alex</option>
        <option value="Fercho">Fercho</option>
        <option value="Javier">Javier</option>
      </select>
    </div>
     </div>

     <div id="cargando" hidden><h1>CARGANDO...</h1></div>
     


  <div class="tabla-general">
<table class="table table-striped table-hover table-responsive">
  <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
    <tr>
      <th>#</th>
      <th>Orden de Trabajo</th>
      <th>Prioridad</th>
      <th>Cliente</th>
      <th>Estado</th>
      <th>Informacion</th>
      <th>Ultima Nota</th>
      <th>Asignado</th>
      <th>Creado por</th>
      <th>Fecha</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody class="table-bordered">
    @if(count($trabajo)<=0)
      <tr>
        <th>No Hay Resultados.</th>  
      <tr>
     @else   
    @foreach ($trabajo as $trabajo)
      <tr>
        <td>check</td>
        <td>{{$trabajo->id}}</td>
        <td>{{$trabajo->prioridad}}</td>
        <td>{{$trabajo->nombreCliente}}</td>
        <td>{{$trabajo->estado}}</td>
        <td>{{$trabajo->informacion}}</td>
        <td>{{$trabajo->datosImportantes}}</td>
        <td>{{$trabajo->asignado}}</td>
        <td>{{$trabajo->creado}}</td>
        <td>{{$trabajo->created_at}}</td>
        <td>
          <a href="{{ url('/trabajo/editar/'.$trabajo->id)}}">
            <button class="btn btn-light-active btn-sm"  >
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="20">
                <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z">
                </path>
              </svg>
            </button>
          </a> 

          {{-- <form action="{{ url('/trabajo/'.$trabajo->id) }}" method="post" class="d-inline">
            @csrf
            {{method_field('DELETE')}} --}}
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg>
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar trabajo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                   ¿Realmente Desea Borrar el trabajo?
                  </div>
                  <form action="{{url('/trabajo/'.$trabajo->id)}}" method="POST" class="d-inline">
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
      @endif 
  </tbody> 
</table>
</div>


@endsection

@section('js')
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
<script>
  $(function(){
    $('#btnBuscar').on('click', function () {

        var url = document.getElementById('orden').value;


          $.ajax({
            type: "POST",
            url: "/trabajos/detalle",
            data: {
              "_token": "{{ csrf_token() }}",
                orden: url,
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                    var myJSON = JSON.stringify(data);
                    console.log(myJSON);
              window.location.href=data['data'];
            }
          });
      
    });

  })
    
    

      
  
</script>
@stop