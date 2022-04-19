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
              <input type="submit"class="btn btn-danger btn_remove" onclick="return confirm('Quieres borrar?')"value="Borrar">
          </form>
          
        </td>  
      </tr>
      @endforeach  
  </tbody> 
</table>
</div>
</div>
@endsection