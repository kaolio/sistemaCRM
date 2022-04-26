@extends('adminlte::page')
@section('content')


<div class="container">
  <div class="table-responsive">
<table class="table table-hover">
  <thead class="thead-dark">
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
  <tbody>
    @foreach ($trabajos as $trabajo)
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
                                   
                    <button class="btn btn-light btn-sm" style="padding-left: 1px">
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
  </tbody> 
</table>
</div>
</div>

@endsection