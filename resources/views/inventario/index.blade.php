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
</style>
<div class="d-flex">
    <div class="p-2">
        <button type="button" class="btn btn-primary">
          Excel</button>
            <a href="{{URL('/inventario/descargar-pdf')}}">pdf</a>
        <button type="button" class="btn btn-primary">PDF</button> 
        <button type="button" class="btn btn-primary">Imprimir</button>
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
    <div class="ml-auto p-2">
      <form class="form-inline" action="{{ url('inventario')}}" method="GET">
        
        <label for="">Busqueda Rápida</label>
        <div class="form-group mx-sm-3 mb-2">
          <input type="" class="form-control" id="busqueda" name="busqueda" value="{{$busqueda}}" placeholder="factor de forma">
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
    <select name="estado" id="estado" class="form-control">
    <option value="">Todos</option>
    <option value="enProceso">En Proceso</option>
    <option value="actuales">Actuales</option>
    <option value="compleados">Completados</option>
  </select>
</div>
<div class="input-group-prepend">
  <div class="input-group-text" id="btnGroupAddon">Tipo</div>

<select name="ingeniero" id="ingeniero" class="form-control">
  <option value="">Todos los Ingenieros</option>
  <option value="Alex">Alex</option>
  <option value="Fercho">Fercho</option>
  <option value="Javier">Javier</option>
</select>
</div>
<div class="input-group-prepend">
  <div class="input-group-text" id="btnGroupAddon">Factor de Forma</div>

<select name="ingeniero" id="ingeniero" class="form-control">
  <option value="">Todos</option>
  <option value="Alex">3.5 pulgadas</option>
  <option value="Fercho">2.5 pulgadas</option>
  <option value="Javier">M2</option>
</select>
</div>
<div class="input-group-prepend">
  <div class="input-group-text" id="btnGroupAddon">Activo</div>

<select name="ingeniero" id="ingeniero" class="form-control">
  <option value="">Todos los Ingenieros</option>
  <option value="Alex">Alex</option>
  <option value="Fercho">Fercho</option>
  <option value="Javier">Javier</option>
</select>
</div>
<div class="input-group-prepend">
  <div class="input-group-text" id="btnGroupAddon">Ocupado</div>

<select name="ingeniero" id="ingeniero" class="form-control">
  <option value="">Todos los Ingenieros</option>
  <option value="Alex">Alex</option>
  <option value="Fercho">Fercho</option>
  <option value="Javier">Javier</option>
</select>
</div>
<div class="input-group-prepend">
  <div class="input-group-text" id="btnGroupAddon">Recursos</div>

<select name="ingeniero" id="ingeniero" class="form-control">
  <option value="">Todos los Ingenieros</option>
  <option value="Alex">Alex</option>
  <option value="Fercho">Fercho</option>
  <option value="Javier">Javier</option>
</select>
</div>
</div>


{{--Inicio tabla de los discos  --}}
<div class="tabla-general">
    <table class="table table-striped table-hover table-responsive">
        <thead class="table-primary table-striped table-bordered text-white" >
        <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
            <tr>
                <th class="column1">Id</th>
                <th class="column2">Fabricante</th>
                <th class="column3">Modelo</th>
                <th class="column4">N° de Serie</th>
                <th class="column5">Firmware</th>
                <th class="column6">Capacidad (GB)</th>
                <th class="column6">PBC</th>
                <th class="column6">Ubicación</th>
                <th class="column6">Factor de Forma</th>
                <th class="column6">Nota</th>
                <th class="column6">Cabecera</th>
                <th class="column6">Info Cabecera</th>
                <th class="column6">Acciones</th>
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
              <td style="padding: 1px; padding-top:8px; margin:3px">
                <a href="{{url('inventario/editar',$item->id)}}">
                  <button class="btn btn-light-active btn-sm"  >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="20">
                      <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z">
                      </path>
                    </svg>
                  </button>
                </a>
                
                  <button class="btn btn-light-active btn-sm" >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="20">
                      <path fill-rule="evenodd" d="M3.75 1.5a.25.25 0 00-.25.25v11.5c0 .138.112.25.25.25h8.5a.25.25 0 00.25-.25V6H9.75A1.75 1.75 0 018 4.25V1.5H3.75zm5.75.56v2.19c0 .138.112.25.25.25h2.19L9.5 2.06zM2 1.75C2 .784 2.784 0 3.75 0h5.086c.464 0 .909.184 1.237.513l3.414 3.414c.329.328.513.773.513 1.237v8.086A1.75 1.75 0 0112.25 15h-8.5A1.75 1.75 0 012 13.25V1.75z">
                      </path>
                    </svg>
                  </button>
                
                <!-- Button trigger modal -->
<button type="button" class="btn"  data-bs-toggle="modal" data-bs-target="#modal-delete-{{$item->id}}">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="20">
    <path fill-rule="evenodd" d="M2.343 13.657A8 8 0 1113.657 2.343 8 8 0 012.343 13.657zM6.03 4.97a.75.75 0 00-1.06 1.06L6.94 8 4.97 9.97a.75.75 0 101.06 1.06L8 9.06l1.97 1.97a.75.75 0 101.06-1.06L9.06 8l1.97-1.97a.75.75 0 10-1.06-1.06L8 6.94 6.03 4.97z"></path>
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
