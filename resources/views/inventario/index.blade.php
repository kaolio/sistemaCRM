@extends('adminlte::page')

@section('content_header')
    <h1 align="center"><strong>INVENTARIO</strong></h1>
@stop

@section('content')

<style>
  body{
    font-family:Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol;
 }
 .tabla-general{
   font-size: 14px;
 }
 .input-group-text, .form-control{
   font-size: 14px;
   border-radius: 0%;
   padding:4px;
   height: 90%;
 }
</style>
<div class="d-flex">
    <div class="p-2">
        <a class="btn btn-primary" href="{{URL('inventario/excel')}}" role="button">Excel</a>
        <a class="btn btn-primary" href="{{URL('inventario/pdf')}}" role="button">PDF</a>
        <a class="btn btn-primary" href="{{URL('inventario/imprimirInventario')}}" role="button">Imprimir</a>
    </div>
    <div class="ml-auto p-2">
            <form class="form-inline" action="{{ url('inventario')}}" method="GET">
              
              <label for="">Busqueda Rápida</label>
              <div class="form-group mx-sm-3 mb-2">
                <input type="" class="form-control" id="busqueda" name="busqueda" value="{{$busqueda}}" placeholder="Modelo o número de serie">
              </div>
              <button type="submit" class="btn btn-primary mb-2">Buscar</button>
            </form>
    </div>
</div>
<div class="input-group">
  <div class="input-group-prepend">
    <div class="input-group-text" id="btnGroupAddon">Dispositivo de Rol</div>
    <select name="priory" id="priory" class="form-control">
                              <option value="Todos">Todos</option>
                              {{-- <option value="Normal">Normal</option> --}}
                              {{-- <option value="Alta">Alta</option> --}}
                              {{-- <option value="Urgente">Urgente</option> --}}
    </select>
  </div>
  <div class="input-group-prepend">
    <div class="input-group-text" id="btnGroupAddon">Fabricante</div>
      <form class="form-inline" action="{{ url('inventario')}}" method="GET">
          <select name="busqueda" id="busqueda" class="form-control">
            <option value="">Todos</option>
            <option value="{{$busqueda="Seagate"}}">Seagate</option>
            <option value="{{$busqueda="Toshiba"}}">Toshiba</option>
            <option value="{{$busqueda="Samsung"}}">Samsung</option>
            <option value="{{$busqueda="Maxtor"}}">Maxtor</option>
            <option value="{{$busqueda="Crucial"}}">Crucial</option>
            <option value="{{$busqueda="Sony"}}">Sony</option>
            <option value="{{$busqueda="Kingston"}}">Kingston</option>
          </select>
        <button type="submit" class="btn btn-primary">Buscar</button>
      </form>
  </div>
<div class="input-group-prepend">
  <div class="input-group-text" id="btnGroupAddon">Tipo</div>

<select name="ingeniero" id="ingeniero" class="form-control">
  <option value="">Todos</option>
  {{-- <option value="Alex">Alex</option>
  <option value="Fercho">Fercho</option>
  <option value="Javier">Javier</option> --}}
</select>
</div>
<div class="input-group-prepend">
  <div class="input-group-text" id="btnGroupAddon">Factor de Forma</div>
    <form class="form-inline" action="{{ url('inventario')}}" method="GET">
        <select name="busqueda" id="busqueda" class="form-control">
          <option value="">Todos</option>
          <option value="{{$busqueda="3.5 pulgadas"}}">3.5 pulgadas</option>
          <option value="{{$busqueda="2.5 pulgadas"}}">2.5 pulgadas</option>
          <option value="{{$busqueda="M2"}}">M2</option>
        </select>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>
<div class="input-group-prepend">
  <div class="input-group-text" id="btnGroupAddon">Activo</div>

<select name="ingeniero" id="ingeniero" class="form-control">
  <option value="">Todos</option>
  {{-- <option value="Alex">Alex</option>
  <option value="Fercho">Fercho</option>
  <option value="Javier">Javier</option> --}}
</select>
</div>
<div class="input-group-prepend">
  <div class="input-group-text" id="btnGroupAddon">Ocupado</div>

<select name="ingeniero" id="ingeniero" class="form-control">
  <option value="">Todos</option>
  {{-- <option value="Alex">Alex</option>
  <option value="Fercho">Fercho</option>
  <option value="Javier">Javier</option> --}}
</select>
</div>
<div class="input-group-prepend">
  <div class="input-group-text" id="btnGroupAddon">Recursos</div>

<select name="ingeniero" id="ingeniero" class="form-control">
  <option value="">Todos</option>
  {{-- <option value="Alex"></option>
  <option value="Fercho">Fercho</option>
  <option value="Javier">Javier</option> --}}
</select>
</div>
</div>

<!-- html agregado-->
<div class="col-5 ml-auto p-2" >
  <div class="input-group" align="center">
      <input type="text" class="form-control" id="texto" placeholder="Ingrese fabricante o factor de forma">
      <div class="input-group-append"><span class="input-group-text">Buscar</span></div>
  </div>
  <div id="resultados" class="bg-light border" style="background: rgb(109, 82, 49)"></div>
</div>
 <!--fin del html agregado-->
<div class="col-8" id="contenedor">
  @include('inventario.paginas')
</div>
<div id="cargando" hidden><h1>CARGANDO...</h1></div>


<script>
  window.addEventListener("load",function(){
      document.getElementById("texto").addEventListener("keyup",function(){
      if((document.getElementById("texto").value.length)>=2)
          fetch(`/inventario/buscador?texto=${document.getElementById("texto").value}`,
                {method:'get'})
          .then(response => response.text())
          .then(html =>   { document.getElementById("resultados").innerHTML = html})
else
    document.getElementById("resultados").innerHTML = ""
    })
  });
</script>



{{--Inicio tabla de los discos  --}}
<div class="tabla-general">
    <table class="table table-striped table-hover table-responsive">
        <thead class="table-primary table-striped table-bordered text-white" >
        <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
            <tr>
                <th class="column1 text-center">Id</th>
                <th class="column2 text-center">Fabricante</th>
                <th class="column3 text-center p-2">Modelo</th>
                <th class="column4 text-center p-2">N° de Serie</th>
                <th class="column5 text-center p-2">Firmware</th>
                <th class="column6 text-center p-2">Capacidad (GB)</th>
                <th class="column6 text-center p-2">PBC</th>
                <th class="column6 text-center p-2">Ubicación</th>
                <th class="column6 text-center p-2">Factor de Forma</th>
                <th class="column6 text-center p-2">Nota</th>
                <th class="column6 text-center p-2">Cabezal</th>
                <th class="column6 text-center p-2">Inf. del Cabezal</th>
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
              <td>{{ $item->firmware}}</td>
              <td>{{ $item->capacidad}}</td>
              <td>{{ $item->pbc}}</td>
              <td>{{ $item->ubicacion}}</td>
              <td>{{ $item->factor_de_forma}}</td>
              <td>{{ $item->nota}}</td>
              <td>{{ $item->cabecera}}</td>
              <td>{{ $item->info_de_cabecera}}</td>
              <td class="text-center" style="padding: 1px;">
                  <a href="{{url('inventario/editar',$item->id)}}">
                    <button class="btn btn-light-active btn-sm"  >
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                      </svg>
                    </button>
                  </a>
                  <a href="{{url('inventario/itemPdf',$item->id)}}">
                    <button class="btn btn-light-active btn-sm" >
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                        <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                      </svg>
                    </button>
                  </a>
                  <a href="{{url('inventario/imprimirItemPdf',$item->id)}}">
                  <button class="btn btn-light-active btn-sm"  >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                    <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                  </svg>
                  </button>
                </a>
                    
                <!-- Button trigger modal -->
<button type="button" class="btn"  data-bs-toggle="modal" data-bs-target="#modal-delete-{{$item->id}}">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
</button>

<!-- Modal -->
<div class="modal fade" id="modal-delete-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{url('inventario',$item->id)}}" method="POST">
      @csrf
      @method('DELETE')
      <button class="btn" value="Eliminar">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="15" height="20">
          <path fill-rule="evenodd" d="M2.343 13.657A8 8 0 1113.657 2.343 8 8 0 012.343 13.657zM6.03 4.97a.75.75 0 00-1.06 1.06L6.94 8 4.97 9.97a.75.75 0 101.06 1.06L8 9.06l1.97 1.97a.75.75 0 101.06-1.06L9.06 8l1.97-1.97a.75.75 0 10-1.06-1.06L8 6.94 6.03 4.97z"></path>
        </svg>
      </button>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminación del Disco</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" align="center">
        ¿Realmente desea eliminar el registro :
        <br>
        <strong> {{$item->manufactura." | ".$item->modelo}} ? </strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Rechazar</button>
        <button class="btn btn-primary" value="Eliminar">
          Aceptar
        </button>
      </div>
    </div>
  </form>
  </div>
</div>

              
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
    </table>

    

  </div>
  {{$inventario->links()}} 
{{-- Fin tabla de discos --}}

@endsection


@section('js')
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  

@stop
