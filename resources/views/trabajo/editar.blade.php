@extends('adminlte::page')
@section('content')

<h1 align="center"><strong>EDITAR ORDEN DE TRABAJO</strong></h1>
<form action="{{url('/trabajo/editar/'.$trabajo->id)}}" method="post">
  @csrf
  {{method_field('PUT')}}

  @include('trabajo.formT');    
</form>

@endsection