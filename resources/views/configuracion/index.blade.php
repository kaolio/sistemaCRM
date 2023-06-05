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
 <br>
 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<h3 align="center" style="font-weight: 700">CONFIGURACIONES </h3>
         
             <div class="container">
                 <!-- /.col -->
                 <div class="col-md-12">
                     <div class="card">
                             <div class="card-header" id="card">
                                 <ul class="nav nav-pills">
                                 <li class="nav-item"><a class="nav-link active" href="#ordenTrabajo" data-toggle="tab">Prioridad</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#dispositivo" data-toggle="tab">Dispositivo</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#fabricante" data-toggle="tab">Fabricante</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#tipoDano" data-toggle="tab">Tipo de Daño</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#factorForma" data-toggle="tab">Factor de Forma</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#tipoConexion" data-toggle="tab">Tipo de Conexion</a></li>
                                 {{--<li class="nav-item"><a class="nav-link" href="#tipoMoneda" data-toggle="tab">Tipo de Moneda</a></li>--}}
                                 </ul>
                             </div><!-- /.card-header -->
                             <div class="card-body">
                                 <div class="tab-content">
                                        <!--General-->
                                            @include('configuracion/prioridad')
                                        <!--/General-->
                                        
                                        <!--Dispositivos de trabajo-->
                                        <div class="tab-pane" id="dispositivo">
                                            @include('configuracion/dispositivo')
                                        </div>
                                        <!--/Dispositivos de trabajo-->
                                        
                                        <!--venta-->
                                        <div class="tab-pane" id="fabricante">
                                            @include('configuracion/fabricante')
                                        </div>
                                        <!-- /venta -->
        
                                        <!--Facturacion-->
                                        <div class="tab-pane" id="tipoDano">
                                            @include('configuracion/tipoDano')
                                        </div>
                                        <!-- /Facturacion -->
                                        
        
                                        <!--Adjuntar archivo -->
                                        <div class="tab-pane" id="factorForma">
                                            @include('configuracion/factorForma')
                                        </div>
                                        <!--/Adjuntar archivo -->

                                         <!-- tipoConexion -->
                                        <div class="tab-pane" id="tipoConexion">
                                            @include('configuracion/tipoConexion')
                                        </div>
                                         <!-- /tipoConexion -->

                                        <!--Historial-->
                                        <div class="tab-pane" id="tipoMoneda">
                                            @include('configuracion/tipoMoneda')
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
                 


@endsection