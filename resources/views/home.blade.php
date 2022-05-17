@extends('adminlte::page')
@section('content')
<meta name="csrf-token" content="{{ csrf-token() }}">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="{{ asset('/public/ijaboCropTool/ijaboCropTool.min.css')}}">
<script src="{{ asset('/public/ijaboCropTool/ijaboCropTool.min.js')}}"></script>

@endsection