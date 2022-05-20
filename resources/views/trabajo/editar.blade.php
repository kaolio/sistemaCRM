@extends('adminlte::page')
@section('content')

<h1 align="center"><strong>EDITAR ORDEN DE TRABAJO</strong></h1>
<style>
  span {
              text-transform: capitalize;
              }
          .menor{
            color: red;
            font-size: medium;
          }    
          .error{
              color:#cf1111;
              font-size: medium;
          }
          .bien{
               color: rgb(15, 208, 67);
              font-size: medium;
          }
</style>

<script>
  function validarInfo(){
  if($("#infoCliente").val() == ""){
    $("#estadoInfo").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoInfo").html("<span  class='bien'><h5 >Válido</h5></span>");
        
  }
}

function validarTiempo(){
  if($("#tiempo").val() == ""){
    $("#estadoTiempo").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoTiempo").html("<span  class='bien'><h5 >Válido</h5></span>");
        
  }
}
</script>


<form action="{{url('/trabajo/editar/'.$trabajo->id)}}" method="post">
  @csrf
  {{method_field('PUT')}}

  @include('trabajo.formT');    
</form>

@endsection