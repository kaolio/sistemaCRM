@extends('adminlte::page')
@section('content')
<h2 align="center"><strong>DISCOS VOLCADOS EN USO</strong></h2>
<br>
<div class="container">
    <button type="button" class="btn btn-primary" id="botones" data-toggle="modal" data-target="#exampleModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z"/>
        </svg>
        Mover Dispositivos
    </button>
    <button class="btn btn-danger" id="botones">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
        </svg>
        Eliminar dispositivos
    </button>
</div>
<br>
<div class="container">
    <div class="d-flex">
        <div class="p-2">
            <button type="button" class="btn text-white" style="background: rgb(20, 141, 9)">Excel</button>
            <a class="btn btn-primary"  role="button">PDF</a> 
            <button type="button" class="btn btn-primary">Imprimir</button>
        </div>
    <div class="col-4 ml-auto p-2">
        <div class="input-group md-2 ">
            <span class="input-group-text">Búsqueda Rapida  </span>
            <input class="form-control" id="busquedaRapida" name="busquedaRapida" autocomplete="off">         
        </div>
    </div>
    </div>
</div>

<div class="container">
    <div class="tabla-general" >
        <table class="table table-striped table-hover table-responsive" id="Table">
            <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                <tr>
                <th>#</th>
                <th class="text-center">ID</th>
                <th class="text-center">Manufactura</th>
                <th class="text-center">Modelo</th>
                <th class="text-center">Numero de Serie</th>
                <th class="text-center">Factor de Forma</th>
                <th class="text-center">Orden de Trabajo</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Ocupado Hasta</th>
                <th class="text-center">Ubicacion</th>
                <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody id="tablaDiscosUso" class="table-bordered">
                @foreach ($clones as $clon)
                <tr>
                    <th></th>
                    <th class="text-center">{{ $clon->id_clon }}</th>
                    <td class="text-center">{{ $clon->manufactura }}</td>
                    <td class="text-center">{{ $clon->modelo }}</td>
                    <td class="text-center">{{ $clon->numero_serie }}</td>
                    <td class="text-center" style="width: 110px">{{ $clon->factor_forma}}</td>
                    <td class="text-center" style="width: 100px">{{ $clon->id_trabajos}}</td>
                    <td class="text-center">{{ $clon->estado}}</td>
                    <td class="text-center">{{ $clon->ocupado_hasta}}</td>
                    <td class="text-center">{{ $clon->ubicacion}}</td>
                    <td>
                        
                    </td>
                </tr>
                @endforeach
            </tbody> 
        </table>
    </div>
</div>

@endsection
<script src="{{ asset('js/inventario/discosUso.js')}}"></script>