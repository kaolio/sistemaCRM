@extends('adminlte::page')
@section('content')

<h1 align="center"><strong>ORDEN DE TRABAJO</strong></h1>
<div class="d-flex">
  <div class="p-2">
    <button type="button" class="btn btn-primary">Excel</button>
    <button type="button" class="btn btn-primary">PDF</button> 
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
          <select name="priory" id="priory" class="form-control">
                                    <option value="Todos">Todos</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Alta">Alta</option>
                                    <option value="Urgente">Urgente</option>
          </select>
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

  <div class="">
<table class="table table-striped table-hover table-responsive">
  <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
    <tr>
      <th>#</th>
      <th>Informacion del Cliente</th>
      <th>Prioridad</th>
      <th>TiempoEstimado</th>
      <th>Tipo</th>
      <th>Rol</th>
      <th>Fabricante</th>
      <th>Modelo</th>
      <th>Serial</th>
      <th>Localizacion</th>
      <th>Informacion Mal funcionamiento</th>
      <th>Dato Importante</th>
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
        <td>{{$trabajo->id}}</td>
        <td>{{$trabajo->infoCliente}}</td>
        <td>{{$trabajo->Prioridad}}</td>
        <td>{{$trabajo->TiempoEstimado}}</td>
        <td>{{$trabajo->Tipo}}</td>
        <td>{{$trabajo->Rol}}</td>
        <td>{{$trabajo->Fabricante}}</td>
        <td>{{$trabajo->Modelo}}</td>
        <td>{{$trabajo->Serial}}</td>
        <td>{{$trabajo->Localizacion}}</td>
        <td>{{$trabajo->informacionDispositivo}}</td>
        <td>{{$trabajo->datoImportante}}</td>
        <td>
          <a href="{{ url('/trabajo/editar/'.$trabajo->id)}}" class="btn btn-success">Editar</a> 

          {{-- <form action="{{ url('/trabajo/'.$trabajo->id) }}" method="post" class="d-inline">
            @csrf
            {{method_field('DELETE')}} --}}
            <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Eliminar</button>
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
                  <form action="{{url('/trabajo/'.$trabajo->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
                                   
                    <button class="btn btn-primary btn-sm" style="padding-left: 1px">
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