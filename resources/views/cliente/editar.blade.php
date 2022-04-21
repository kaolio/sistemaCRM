@extends('adminlte::page')
@section('content')

EDITAR CLIENTE

<form action="{{url('/cliente/editar/'.$cliente->id)}}" method="post">
  @csrf
  {{method_field('PUT')}}

  @include('cliente.form');    
</form>
 
@endsection