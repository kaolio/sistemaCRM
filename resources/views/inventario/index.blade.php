@extends('adminlte::page')

@section('content_header')
    <h1 align="center"><strong>INVENTARIO</strong></h1>
@stop

@section('content')

<div class="d-flex">
    <div class="p-2">
        <button type="button" class="btn btn-secondary">Excel</button>
        <button type="button" class="btn btn-secondary">PDF</button> 
        <button type="button" class="btn btn-secondary">Imprimir</button>
    </div>
    <div class="ml-auto p-2">
            <form class="form-inline" action="{{ url('inventario  ')}}" method="GET">
              
              <label for="">Busqueda Rápida</label>
              <div class="form-group mx-sm-3 mb-2">
                <input type="" class="form-control" id="busqueda" name="busqueda" value="{{$busqueda}}" placeholder="Modelo o numero de serie">
              </div>
              <button type="submit" class="btn btn-primary mb-2">Buscar</button>
            </form>
    </div>
</div>
<div class="input-group">
  <div class="input-group-prepend">
    <div class="input-group-text" id="btnGroupAddon">Dispositivo de Rol</div>
  </div>
  <input type="text" class="form-control" placeholder="" aria-label="Input group example" aria-describedby="btnGroupAddon">
  <div class="input-group-prepend">
    <div class="input-group-text" id="btnGroupAddon">Manufactura</div>
  </div>
  <input type="text" class="form-control" placeholder="" aria-label="Input group example" aria-describedby="btnGroupAddon">
  <div class="input-group-prepend">
    <div class="input-group-text" id="btnGroupAddon">Tipo</div>
  </div>
  <input type="text" class="form-control" placeholder="" aria-label="Input group example" aria-describedby="btnGroupAddon">
  <div class="input-group-prepend">
    <div class="input-group-text" id="btnGroupAddon">Factor de Forma</div>
  </div>
  <input type="text" class="form-control" placeholder="" aria-label="Input group example" aria-describedby="btnGroupAddon">
  <div class="input-group-prepend">
    <div class="input-group-text" id="btnGroupAddon">Activo</div>
  </div>
  <input type="text" class="form-control" placeholder="" aria-label="Input group example" aria-describedby="btnGroupAddon">
  <div class="input-group-prepend">
    <div class="input-group-text" id="btnGroupAddon">Ocupado</div>
  </div>
  <input type="text" class="form-control" placeholder="" aria-label="Input group example" aria-describedby="btnGroupAddon">
  <div class="input-group-prepend">
    <div class="input-group-text" id="btnGroupAddon">Recursos</div>
  </div>
  <input type="text" class="form-control" placeholder="" aria-label="Input group example" aria-describedby="btnGroupAddon">
</div>


{{--Inicio tabla de los discos  --}}
<div class="">
    <table class="table table-striped table-hover table-responsive">
        <thead class="table table-dark table-striped table-bordered">
            <tr>
                <th class="column1">Id</th>
                <th class="column2">Manufactura</th>
                <th class="column3">Modelo</th>
                <th class="column4">Numero de Serie</th>
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
                  <button class="btn btn-light-active btn-sm" style="padding: 1px" >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="15" height="20">
                      <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z">
                      </path>
                    </svg>
                  </button>
                </a>
                <a href="">
                  <button class="btn btn-light-active btn-sm" style="padding-left: 1px">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="15" height="20">
                      <path fill-rule="evenodd" d="M3.75 1.5a.25.25 0 00-.25.25v11.5c0 .138.112.25.25.25h8.5a.25.25 0 00.25-.25V6H9.75A1.75 1.75 0 018 4.25V1.5H3.75zm5.75.56v2.19c0 .138.112.25.25.25h2.19L9.5 2.06zM2 1.75C2 .784 2.784 0 3.75 0h5.086c.464 0 .909.184 1.237.513l3.414 3.414c.329.328.513.773.513 1.237v8.086A1.75 1.75 0 0112.25 15h-8.5A1.75 1.75 0 012 13.25V1.75z">
                      </path>
                    </svg>
                  </button>
                </a>
                <a href="">
                  {{-- <form action="{{url('inventario.destroy',$item->id)}}" method="POST"> --}}
                    @method('DELETE')
                    <button class="btn btn-light-active btn-sm" style="padding-left: 1px">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="15" height="20">
                        <path fill-rule="evenodd" d="M2.343 13.657A8 8 0 1113.657 2.343 8 8 0 012.343 13.657zM6.03 4.97a.75.75 0 00-1.06 1.06L6.94 8 4.97 9.97a.75.75 0 101.06 1.06L8 9.06l1.97 1.97a.75.75 0 101.06-1.06L9.06 8l1.97-1.97a.75.75 0 10-1.06-1.06L8 6.94 6.03 4.97z">
                        </path>
                      </svg>
                    </button>
                  {{-- </form>               --}}
                </a>
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
    <script>

      
      var myModal = document.getElementById('myModal')
      var myInput = document.getElementById('myInput')
      
      myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
      })
      </script>

@stop