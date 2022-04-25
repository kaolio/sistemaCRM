@extends('adminlte::page')
@section('content')

VER ORDENES DE TRABAJO
<div class="container">
  <div class="table-responsive">
<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Informacion del Cliente</th>
      <th>Prioridad</th>
      <th>Caso1</th>
      <th>Caso2</th>
      <th>Caso3</th>
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
        <td>{{$trabajo->CasoUrgente1}}</td>
        <td>{{$trabajo->Prioridad}}</td>
        <td>{{$trabajo->CasoUrgente2}}</td>
        <td>{{$trabajo->RAID}}</td>
        <td>{{$trabajo->Tipo}}</td>
        <td>{{$trabajo->Rol}}</td>
        <td>{{$trabajo->Fabricante}}</td>
        <td>{{$trabajo->Modelo}}</td>
        <td>{{$trabajo->Serial}}</td>
        <td>{{$trabajo->Localizacion}}</td>
        <td>{{$trabajo->infoDevice}}</td>
        <td>{{$trabajo->importantDate}}</td>
        <td>
          <a href="{{ url('/trabajo/editar/'.$trabajo->id)}}" class="btn btn-success">Editar</a> 

          <form action="{{ url('/trabajo/'.$trabajo->id) }}" method="post" class="d-inline">
            @csrf
            {{method_field('DELETE')}}
            <button class="btn btn-danger" data-toggle="modal" data-target="#ventanaModal">Eliminar</button>
            <div class="modal fade" id="ventanaModal" tabindex="1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 id="tituloVentana">Orden Eliminada</h5>
                      <button class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="alert alert-danger">
                          <h6><strong>Tu orden de trabajo fue eliminada exitosamente</strong></h6>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-warning" type="button" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
              </div>
            </div>
          </form>
          
        </td>  
      </tr>
      @endforeach  
  </tbody> 
</table>
</div>
</div>

@endsection