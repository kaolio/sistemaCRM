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
        <button id="bton" class="btn btn-warning text-white">Imprimir Orden</button>
        @can('editar orden de trabajo')
        <a type="button" class="btn btn-primary text-white" href="{{url('/trabajos/detalle/'.$trabajo)}}">Ir a Orden de Trabajo</a>
        @endcan
        <a type="button" class="btn btn-primary text-white" href="{{url('/trabajos')}}">Ver Ordenes de Trabajo</a>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>

    $('#bton').on('click', function () {
        $.ajax({
            url: "/trabajo/imprimirOrden",
            type: "POST",
            data:{ 
                "_token": "{{ csrf_token() }}",
                "orden": "{{$trabajo}}",
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
            }
        });
    });

</script>

@endsection