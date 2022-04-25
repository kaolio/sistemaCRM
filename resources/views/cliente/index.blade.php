@extends('adminlte::page')
@section('content')
<div class="container">
  <div class="table-responsive">
<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>VAT</th>
      <th>Direccion</th>
      <th>Numero</th>
      <th>Apt</th>
      <th>CodigoPostal</th>
      <th>PAK</th>
      <th>Ciudad</th>
      <th>Pais</th>
      <th>Idioma</th>
      <th>Tipo</th>
      <th>Valor</th>
      <th>Nombre</th>
      <th>Nota</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($clientes as $cliente)
      <tr>
        <td>{{$cliente->id}}</td>
        <td>{{$cliente->NombreCliente}}</td>
        <td>{{$cliente->VATid}}</td>
        <td>{{$cliente->Calle}}</td>
        <td>{{$cliente->Numero}}</td>
        <td>{{$cliente->Apt}}</td>
        <td>{{$cliente->CodigoPostal}}</td>
        <td>{{$cliente->Pak}}</td>
        <td>{{$cliente->NombreCiudad}}</td>
        <td>{{$cliente->Pais}}</td>
        <td>{{$cliente->Idioma}}</td>
        <td>{{$cliente->Tipo}}</td>
        <td>{{$cliente->Valor}}</td>
        <td>{{$cliente->NombreX}}</td>
        <td>{{$cliente->Nota}}</td>
        <td>
          <a href="{{ url('/cliente/editar/'.$cliente->id)}}" class="btn btn-success">Editar</a> 

          <form action="{{ url('/cliente/'.$cliente->id) }}" method="post" class="d-inline">
            @csrf
            {{method_field('DELETE')}}
            <button class="btn btn-danger" data-toggle="modal" data-target="#ventanaModal">Eliminar</button>
            <div class="modal fade" id="ventanaModal" tabindex="1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 id="tituloVentana">Cliente Eliminado</h5>
                      <button class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="alert alert-danger">
                          <h6><strong>El cliente fue eliminado exitosamente</strong></h6>
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