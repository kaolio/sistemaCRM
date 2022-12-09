@extends('adminlte::page')
@section('content')
<h1 align="center"><strong>CLIENTES</strong></h1>

<div class="container">

  <br>
  <div class="d-flex">
    <div class="p-2">
      <a type="button" class="btn text-white" href="{{URL('cliente/excel')}}" style="background: rgb(20, 141, 9)">Excel</a>
      <a class="btn btn-danger" href="{{URL('cliente/pdf')}}" role="button">PDF</a> 
      <a type="button" href="{{URL('cliente/imprimirIndex')}}" class="btn btn-primary">Imprimir</a>
    </div>
    
    <div class="ml-auto p-2">
      <div class="input-group md-2">
        <form class="form-inline" action="{{ url('clientes ')}}" method="GET">
          <span class="input-group-text">Busqueda Rapida </span>
          <input class="form-control" id="busqueda" placeholder="Nombre" name="busqueda" autocomplete="off">
          <button value="{{$busqueda}}"  type="submit" style="border-color: #ced4da;border-style: solid; height:38px;" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#007BFF" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg></button>  
        </form>         
    </div>        
     </div>
      
  </div>

  <div class="table-responsive">
<table class="table table-striped table-hover table-responsive">
  <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
    <tr>
      <th class="text-center">Nombre</th>
      <th class="text-center">VAT</th>
      <th class="text-center">Direccion</th>
      <th class="text-center">Numero</th>
      <th class="text-center">Apt</th>
      <th class="text-center">CodigoPostal</th>
      <th class="text-center">PAK</th>
      <th class="text-center">Ciudad</th>
      <th class="text-center">Pais</th>
      <th class="text-center">Idioma</th>
      <th class="text-center">Nota</th>
      <th class="text-center" style="width: 15%">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($cliente as $cliente)
      <tr>
        <td >{{$cliente->nombreCliente}}</td>
        <td class="text-center">{{$cliente->vat}}</td>
        <td class="text-center">{{$cliente->calle}}</td>
        <td class="text-center">{{$cliente->numero}}</td>
        <td class="text-center">{{$cliente->apt}}</td>
        <td class="text-center">{{$cliente->codigoPostal}}</td>
        <td class="text-center">{{$cliente->pak}}</td>
        <td class="text-center">{{$cliente->nombreCiudad}}</td>
        <td class="text-center">{{$cliente->pais}}</td>
        <td class="text-center">{{$cliente->idioma}}</td>
        <td class="text-center">{{$cliente->nota}}</td>
        <td style="width: 10%">

          <div style="text-align: center;width:150px">
            
            {{-- EDITAR --}}
          <a href="{{ url('/cliente/editar/'.$cliente->id)}}">
            <button class="btn btn-light-active btn-sm d-inline"  >
              <svg xmlns="http://www.w3.org/2000/svg" fill="rgb(168, 166, 14)" viewBox="0 0 16 16" width="18" height="20">
                <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 
                0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z">
                </path>
              </svg>
            </button>
          </a> 

          {{-- ELIMINAR --}}
            <button class="btn d-inline" style="color: red"  data-toggle="modal" data-target="#eliminar{{$cliente->id}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg>
            </button>

          </div>


          {{-- ELIMINAR --}}
          <div class="modal fade" id="eliminar{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Eliminar Cliente</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  ¿Realmente Desea Borrar el Cliente?
                </div>
                <form action="{{url('/producto/'.$cliente->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
                  <button class="btn btn-success" >Aceptar</button>
                </div>
              </form> 
              </div>
            </div>

        </td>  
      </tr>
      @endforeach  
  </tbody> 
</table>

</div>
</div>

<script src="{{ asset('js/cliente/index.js')}}"></script>

@endsection