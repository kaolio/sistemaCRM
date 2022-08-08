@extends('adminlte::page')

@section('content_header')
    <h1 style="font-weight: 700">Asistente de Nueva Factura</h1>
@stop
@section('content')
    <div class="">
      <a class="btn btn-success" href="{{URL('inventario/excel')}}" style="background: rgb(20, 141, 9)" role="button">Imprimir Factura</a>
      <a class="btn btn-success" href="{{URL('inventario/pdf')}}" style="background: rgb(20, 141, 9)" role="button">Enviar a Email</a> 
      <a class="btn text-white" href="{{URL('inventario/imprimirInventario')}}" style="background:#0F3078" role="button">Generar Factura</a>
    </div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
@stop