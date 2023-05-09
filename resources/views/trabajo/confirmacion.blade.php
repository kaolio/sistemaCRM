@extends('adminlte::page')
@section('content')

<br>
<div class="card">
    <div class="card-header">
        <h4><b>Nueva orden de trabajo</b></h4>
    </div>
    <div class="card-body">
        <h5><b>Numero de Orden: </b>{{$trabajo}}</h5>
        <h5><b>Cliente: </b>{{$cliente}}</h5>
        <h5><b>Contraseña: </b>{{$acceso}}</h5>
    </div>
    <div class="card-footer"> 
        @can('imprimir orden de trabajo')
        <a role="button" class="btn btn-warning text-white" href="{{URL('/trabajo/imprimirOrden/'.$trabajo)}}" target="_blank" rel="noopener noreferrer">Imprimir Orden</a>
        @endcan
        @can('editar orden de trabajo')
        <a type="button" class="btn btn-primary text-white" href="{{url('/trabajos/detalle/'.$trabajo)}}">Ir a Orden de Trabajo</a>
        @endcan
        
        @can('ver orden de trabajo')
        <a type="button" class="btn btn-primary text-white" href="{{url('/trabajos')}}">Ver Ordenes de Trabajo</a>
        @endcan
        @if ($rol != 'ADMINISTRADOR')
            @can('ver orden de trabajo(Personal)')
                <a type="button" class="btn btn-primary text-white" href="{{url('/trabajos')}}">Ver Ordenes de Trabajo</a>
            @endcan 
        @endif
        
    </div>
</div>


@endsection