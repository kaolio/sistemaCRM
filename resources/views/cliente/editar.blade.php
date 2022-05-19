@extends('adminlte::page')
@section('content')

<h1 align="center" style="font-weight: 700">EDITAR CLIENTE</h1>
<style>
  span{
    text-transform: capitalize;
  }
  .menor{
              color:red;
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
  function validarNombre() {
 
 if($("#Nombre").val() == ""){
   $("#estadoNombre").html("<span  class='menor'><h5 class='menor'> </h5></span>");
  }else{
       if ($("#Nombre").val().length < 3) {
           $("#estadoNombre").html(
               "<span  class='menor'><h5 class='menor'>Ingrese de 5 a 50 caracteres</h5></span>");
       } else {
           if ($("#Nombre").val().length > 50) {
               $("#estadoNombre").html(
                   "<span  class='menor'><h5 class='menor'>Ingrese menos de 50 caracteres</h5></span>");
           } else {
               
                   $("#estadoNombre").html("<span  class='menor'><h5 class='menor'> </h5></span>");
           }
       } 
 }



 }
 function validarVat(){
  if($("#vat").val() == ""){
    $("#estadoVat").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
            if ($("#vat").val().length > 9) {
                $("#estadoVat").html("<span  class='error'><h5 class='menor'>Ingrese menos de 10 numeros</h5></span>");
            }else {
                    $("#estadoVat").html("<span  class='bien'><h5 class='bien'> Numero de vat Válido </h5></span>");
            }
        } 
  }

function validarCalle(){
  if($("#street").val() == ""){
    $("#estadoCalle").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoCalle").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

function validarNumero(){
  if($("#Numero").val() == ""){
    $("#estadoNumero").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoNumero").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

function validarApt(){
  if($("#Apt").val() == ""){
    $("#estadoApt").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoApt").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

function validarCodigoPostal(){
  if($("#codigoP").val() == ""){
    $("#estadoCodigoP").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoCodigoP").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

function validarPak(){
  if($("#pak").val() == ""){
    $("#estadoPak").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoPak").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

function validarCiudad(){
  if($("#ciudad").val() == ""){
    $("#estadoCiudad").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoCiudad").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

function validarPais(){
  if($("#pais").val() == ""){
    $("#estadoPais").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoPais").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

function validarValor(){
  if($("#valor").val() == ""){
    $("#estadoValor").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoValor").html("<span  class='bien'><h5>Válido</h5></span>");
        
  }
}

 </script>
 

<form action="{{url('/cliente/editar/'.$cliente->id)}}" method="post">
  @csrf
  {{method_field('PUT')}}

  @include('cliente.form');    
</form>
 
@endsection