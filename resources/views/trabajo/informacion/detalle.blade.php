@extends('adminlte::page')
@section('content')
<style>
   
</style>

        
            
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                            <div class="card-header p-2" id="card">
                                <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                                <li class="nav-item"><a class="nav-link" href="#dispositivosTrabajo" data-toggle="tab">Dispositivos de Trabajo</a></li>
                                <li class="nav-item"><a class="nav-link" href="#servicios" data-toggle="tab">Servicios</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">Monitor de Clonacion</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">Archivos adjuntos</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">Facturacion</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">Historial</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">Iniciar Sesion</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                <!--General-->
                                <div class="active tab-pane" id="general">
                                    
                                </div>
                                <!--/General-->

                                <!--Dispositivos de trabajo-->
                                <div class="tab-pane" id="dispositivosTrabajo">
                                    <p>holas</p>
                                    @include('trabajo/informacion/dispositivos-de-trabajo')
                                </div>
                                <!--/Dispositivos de trabajo-->

                                <!--Servicios-->
                                <div class="tab-pane" id="servicios">
                                    <p>munfo</p>
                                </div>
                                <!-- /Servicios -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                
                
            

@endsection