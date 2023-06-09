@extends('adminlte::page')
@section('content')

 
  <!--?php 
  $orden = $_POST['orden'];
?> -->

<!-- Modal -->
<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title w-100 text-center">!! AVISO !!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center">
          <h5>Nro de Orden de Trabajo no existe</h5>
          <svg xmlns="http://www.w3.org/2000/svg" width='30' height='30' fill='red' class='bi bi-trash' viewBox="0 0 512 512">
            <path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM175 175c9.4-9.4 
            24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 
            47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/>
        </svg>
          
      </div>
    </div>
  </div>
</div>


<h1 align="center"><strong>ORDEN DE TRABAJO</strong></h1>
<div class="container">
  <div class="col-3">
    
    @can('editar orden de trabajo')
          <div class="input-group md-2">
        <span class="input-group-text">NºOrden </span>
        <input class="form-control required" id="orden" name="orden" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" >
        <button  id="btnBuscar" name="btnBuscar" disabled style="border-color: #ced4da;border-style: solid;" >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#007BFF" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
          </svg></button>           
    </div>
    @endcan
    
    
  </div>
  <div class="d-flex">
    <div class="p-2">
      @can('imprimir orden de trabajo')
          <button class="btn btn-warning text-white" onclick="imprimirPDF()" disabled id="ordenImprimir">Generar Orden</button>
      @endcan
      
      @can('editar orden de trabajo')
          <!-- Button trigger modal 2-->
          <button type="button" class="btn btn-primary text-white" id="modal2" disabled data-toggle="modal" data-target="#example2">Cambiar Prioridad</button>
          <!-- Button trigger modal 3-->
          <button type="button" class="btn btn-primary text-white" id="modal3" disabled  data-toggle="modal" data-target="#example3">Cambiar Estado</button>      
      @endcan
      @can('borrar orden de trabajo')
          <!-- Button trigger modal 4-->
          <button type="button" class="btn text-white"  style="background: red" id="modal4" disabled  data-toggle="modal" data-target="#example4">Eliminar</button>
      @endcan
      
    </div>
  </div>


    <!-- Modal 2-->
    <div class="modal fade" id="example2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100">Cambiar Prioridad</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="input-group-prepend col-10">
                <div class="input-group-text">Prioridad</div>
                      <select name="prio" id="prio" class="form-control" >
                        <option selected disabled value="new">Seleccione una prioridad</option>
                        @foreach ($prioridad as $prioridad)
                          <option value="{{$prioridad->nombre_prioridad}}">{{$prioridad->nombre_prioridad}}</option>
                        @endforeach
                      </select>
              </div>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-success" onclick="cambiarPrioridad()">Guardar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 3-->
    <div class="modal fade" id="example3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100">Cambiar Estado</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="input-group-prepend col-10">
                <div class="input-group-text">Estado</div>
                      <select name="est" id="est" class="form-control" >
                        <option selected disabled value="new">Seleccione un Estado</option>
                        <option value="registrado">Registrado</option>
                        <option value="recibido">Recibido</option>
                        <option value="enProceso">En proceso</option>
                        <option value="esperandoPiezas">Esperando Piezas</option>
                        <option value="trabajoCompleto">Trabajo Completo</option>
                        <option value="trabajoIncompleto">Trabajo Incompleto</option>
                        <option value="pagado">Pagado</option>
                        <option value="devueltoAlCliente">Devuelto al Cliente</option>
                        <option value="pagoPendiente">Pago Pendiente</option>
                        <option value="llegadaPendiente">Llegada Pendiente</option>
                        <option value="pagadoRegresadoCliente">Pagado y regresado a Cliente</option>
                      </select>
              </div>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-success" onclick="cambiarEstado()">Guardar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 4-->
    <div class="modal fade" id="example4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5 class="text-center">¿Esta seguro de eliminar estos registros?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
            <button type="button" class="btn btn-primary" onclick="eliminarVarios()">Aceptar</button>
          </div>
        </div>
      </div>
    </div>


  <div class="d-flex">
    <div class="p-1">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">Ver</div>
                <select name="ver" id="ver" class="form-control">
                  @for ($i = 50; $i <= 100; $i=$i+10)
                      <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
        </div>
     </div>
    </div>
  </div>
  
  

<div class="d-flex">
  <div class="p-2">
    @can('lista de trabajos excel')
       <a type="button" class="btn text-white" href="{{URL('trabajo/excel')}}" style="background: rgb(20, 141, 9)">Excel</a> 
    @endcan
    @can('lista de trabajos PDF')
        <a class="btn btn-danger" href="{{URL('trabajo/pdf')}}" role="button">PDF</a> 
    @endcan
    @can('imprimir lista de trabajos')
        <a type="button" href="{{URL('trabajo/imprimirIndex')}}" target="_blank"  class="btn btn-primary">Imprimir</a>
    @endcan
    
  </div>
  
  <div class="ml-auto p-2">
    <div class="input-group md-2">
      <span class="input-group-text">Busqueda Rapida </span>
      <input class="form-control" id="busqueda" placeholder="Orden, Cliente, Informacion" name="busqueda" autocomplete="off">
      <button  id="btnBusqueda" name="btnBusqueda" style="border-color: #ced4da;border-style: solid;" >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#007BFF" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></button>           
  </div>        
   </div>
    
</div>
      
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Prioridad</div>
            <select name="grado" id="grado" class="form-control">
              <option value="todos">Todos</option>
              @foreach ($prioridads as $prioridad)
                <option  value="{{$prioridad->nombre_prioridad}}">{{$prioridad->nombre_prioridad}}</option>
              @endforeach
            </select>
        </div>
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Estado</div>
          <select name="estado" id="estado" class="form-control">
            <option value="todos">Todos</option>
            <option value="registrado">Registrado</option>
            <option value="recibido">Recibido</option>
            <option value="enProceso">En proceso</option>
            <option value="esperandoPiezas">Esperando Piezas</option>
            <option value="trabajoCompleto">Trabajo Completo</option>
            <option value="trabajoIncompleto">Trabajo Incompleto</option>
            <option value="pagado">Pagado</option>
            <option value="devueltoAlCliente">Devuelto al Cliente</option>
            <option value="pagoPendiente">Pago Pendiente</option>
            <option value="llegadaPendiente">Llegada Pendiente</option>
            <option value="pagadoRegresadoCliente">Pagado y regresado a Cliente</option>
          </select>
        </div>
        @if ($rol_encontrado == 'ADMINISTRADOR' || $rolePermission != 1)
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Ingeniero</div>
        
          <select name="ingeniero" id="ingeniero" class="form-control">
            <option value="todos">Todos los Ingenieros</option>
            @foreach ($rol as $rol)
              <option {{ old('categoria') == $rol->id ? "selected" : "" }} value="{{$rol->id}}">{{$rol->name}}</option>
            @endforeach
          </select>
        </div>@endif
     </div>

     
     @include('trabajo.table')


     <ul class="pagination">
      <li class="page-item disabled" id="back"><a id="anterior" aria-hidden="true" class="page-link" onclick="" rel="next" aria-label="« Anterior">‹</a></li>
      <li class="page-item" id="next"><a id="siguiente" class="page-link" onclick="redireccionar(2)" rel="next" aria-label="Siguiente »">›</a></li>
      </ul>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('js/trabajo/index.js')}}"></script>
<link rel="stylesheet" href="{{ URL::asset('estilos/style.css') }} ">

@include('trabajo.ajax.index.funcionesAjax')

<script>


var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>
@endsection