@extends('adminlte::page')
@section('content')

EDITAR ORDEN DE TRABAJO
<form action="{{url('/trabajo/editar/'.$trabajo->id)}}" method="post">
  @csrf
  {{method_field('PUT')}}

  @include('trabajo.formT');    
</form>

@endsection