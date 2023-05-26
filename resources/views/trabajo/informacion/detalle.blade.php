@extends('adminlte::page')
@section('content')

<style>
   .table-responsive{
   font-size: 14px;
 }  
 #botones, #btnAsignar{
        font-size: 14px;
        border-radius: 4px;
        padding: 5px;
        box-shadow: 2px 2px 2px rgb(95, 93, 93);
    }
</style>

        
            <div class="container">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
<<<<<<< HEAD
                            <h3><b>{{$orden_elegida->id}} - <span id="nord">{{$orden_elegida->nombreCliente}}</span></b></h3>
=======
                            <h3><b>{{$orden_elegida->id}} - {{$orden_elegida->nombreCliente}}</b></h3>
                            @if($rol_encontrado == 'ADMINISTRADOR' || $rolePermission)
>>>>>>> 19f5e87f2af9fe0f90e4a24d225bc05f764a10a4
                            <button class="btn btn-warning" id="botones"data-toggle="modal" data-target="#exampleModal01">Asignar un Usuario</button>
                            <button class="btn btn-primary" id="botones"><a class="text-white" href="{{URL('/trabajo/imprimirContrato/'.Crypt::encrypt($orden_elegida->id))}}" target="_blank" rel="noopener noreferrer">Imprimir Contrato</a></button>
                            <button class="btn btn-warning" id="botones"><a class="text-dark" href="{{URL('/trabajo/imprimirOrden/'.Crypt::encrypt($orden_elegida->id))}}" target="_blank" rel="noopener noreferrer">Imprimir Orden</a></button>
                            @endif
                            <button class="btn btn-primary" id="botones"data-toggle="modal" data-target="#ListaDeArchivos{{$orden_elegida->id}}">Ir a Lista de archivos</button>
                            <button class="btn btn-warning" id="botones">Desbloquear Acceso de cliente</button>
                        </div>

                             <!-- Modal asignar ingeniero-->
                                <div class="modal fade" id="exampleModal01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title w-100 text-center" id="exampleModalLabel2" align="center">Asignar Orden de Trabajo a Usuario:</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="input-group md-2">
                                                            <span class="input-group-text">Usuario</span>
                                                            <select id="selectDesignacion" name="selectDesignacion" class="form-control" class="btn-block">
                                                                <option selected disabled>Seleccione Usuario</option>
                                                                @foreach ($usuarioDesignado as $designado)
                                                                <option  value="{{$designado->id}}"> {{$designado->name}}</option>
                                                                @endforeach
                                                            </select>                           
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" id="botones" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary" id="btnAsignar" name="btnAsignar">Guardar</button>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                             {{-- Fin modal ingeniero --}}
                             <!-- LISTA DE ARCHIVOS-->
                             <div class="modal fade" id="ListaDeArchivos{{$orden_elegida->id}}" tabindex="-1" role="dialog" aria-labelledby="ListaDeArchivos{{$orden_elegida->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title w-100 text-center" id="ListaDeArchivos{{$orden_elegida->id}}" align="center">Lista de Archivos</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="input-group md-2">
                                                        
                                                        @if ($orden_elegida->lista_archivo == 'NO')
                                                            
                                                            <p>No Hay Lista de Archivos</p>

                                                        @else
                                                            

                                                        <div class="row justify-content-center w-100 text-center">
                                                            <div class="col-4">
                                                                <button class=" btn btn-primary">
                                                                    <a class="text-white" href="/trabajos/detalle/fileList/{{$orden_elegida->nombre_archivo}}" target="_blank" rel="noopener noreferrer">Ver Lista de Archivos</a>
                                                                </button>
                                                            </div>
                                                            <div class="col-3">
                                                                <button class="btn btn-warning">
                                                                    <a class="text-white" href="/trabajos/detalle/fileList/descargar/{{$orden_elegida->nombre_archivo}}" >Descargar</a>
                                                                </button>
                                                            </div>
                                                            <div class="col-3">
                                                                <button class="btn btn-danger"  data-toggle="modal" data-target="#eliminarFile{{$orden_elegida->id}}">
                                                                    Eliminar
                                                                </button>
                                                            </div>
                                                            
                                                
                                                            {{-- ELIMINAR --}}
                                                            <div class="modal fade" id="eliminarFile{{$orden_elegida->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Eliminar Lista de Archivos</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-title w-100 text-center">
                                                                    ¿Realmente Desea Borrar la Lista de Archivos?
                                                                </div>
                                                                <form action="{{url('/trabajos/detalle/fileList/eliminar/'.$orden_elegida->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
                                                                    <button class="btn btn-success" >Aceptar</button>
                                                                </div>
                                                                </form> 
                                                                </div>
                                                            </div>
                                                            </div>

                                                        </div>

                                                        @endif
                                                        
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                        </div>
                                </div>
                            </div>
                         {{-- Fin modal ingeniero --}}
                    </div>
                    <div class="card">
                            <div class="card-header" id="card">
                                <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                                <li class="nav-item"><a class="nav-link" href="#dispositivosTrabajo" data-toggle="tab">Dispositivos de Trabajo</a></li>
                                <li class="nav-item"><a class="nav-link" href="#servicio" data-toggle="tab">Detalle Servicio</a></li>
                                <li class="nav-item"><a class="nav-link" href="#adjuntarArchivo" data-toggle="tab">Archivos adjuntos</a></li>
                                <li class="nav-item"><a class="nav-link" href="#imagenes" data-toggle="tab">Imagenes</a></li>
                                <li class="nav-item"><a class="nav-link" href="#historial" data-toggle="tab">Historial</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                <!--General-->
                                    @include('trabajo.informacion.general')
                                <!--/General-->

                                <!--Dispositivos de trabajo-->
                                <div class="tab-pane" id="dispositivosTrabajo">
                                    @include('trabajo/informacion/dispositivos-de-trabajo')
                                </div>
                                <!--/Dispositivos de trabajo-->
                               
                                 <!--servicio-->
                                 <div class="tab-pane" id="servicio">
                                    @include('trabajo/informacion/servicio')
                                </div>
                                <!-- /servicio -->

                                <!--Adjuntar archivo -->
                                <div class="tab-pane" id="adjuntarArchivo">
                                    @include('trabajo.informacion.adjuntarArchivo')
                                </div>
                                <!--/Adjuntar archivo -->

                                <!--Facturacion-->
                                <div class="tab-pane" id="imagenes">
                                    @include('trabajo/informacion/imagenes')
                                </div>
                                <!-- /Facturacion -->

                                <!--Historial-->
                                <div class="tab-pane" id="historial" >
                                    @include('trabajo.informacion.historial')
                                </div>
                                <!-- /Historial -->

                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
                

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
              
            
@endsection

