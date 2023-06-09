@extends('adminlte::page')
@section('content')



<h1 align="center"><strong>INVENTARIO</strong></h1>
<div class="container-fluid" style="margin-top: -40px">
  <div class="d-flex" style="visibility: hidden">
    <div class="p-1">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">Ver</div>
                <select name="ver" id="ver" class="form-control">
                  @for ($i = 10; $i <= 30; $i++)
                      <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
        </div>
     </div>
    </div>
  </div>
  
  
<div class="container">
<div class="d-flex">
  <div class="p-2">
    
    @can('lista de inventario excel')
        <a class="btn btn-success" href="{{URL('inventario/excel')}}" style="background: rgb(20, 141, 9)" role="button">EXCEL</a>
    @endcan
    @can('lista de inventario PDF')
        <a class="btn btn-danger" href="{{URL('inventario/pdf')}}" style="background: #AF1512" role="button">PDF</a> 
    @endcan
    @can('imprimir lista de inventario')
        <a class="btn text-white" href="{{URL('inventario/imprimirInventario')}}" target="_blank" style="background:#0F3078" role="button">IMPRIMIR</a>
    @endcan
  </div>
  
  <div class="ml-auto p-2">
    <div class="input-group md-2">
      <span class="input-group-text">Búsqueda Rapida </span>
      <input class="form-control" id="busqueda" placeholder="Buscar Modelo, Fabricante o Factor de Forma " name="busqueda" autocomplete="off">
      <button  id="btnBusqueda" name="btnBusqueda" style="border-color: #ced4da;border-style: solid;" >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#007BFF" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></button>           
  </div>        
   </div>
    
</div>
      
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Rol del Dispositivo</div>
                <select name="grado" id="grado" class="form-control">
                  <option value="todos">Todos</option>
                  <option value="Donante">Donante</option>
                  <option value="Datos">Datos</option>
                </select>
        </div>
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Fabricante</div>
          <select name="estado" id="estado" class="form-control">
            <option value="todos">Todos</option>
            @foreach ($fabricante as $item)
                <option value="{{$item->nombre_fabricante}}">{{$item->nombre_fabricante}}</option>
            @endforeach
          </select>
        </div>
        <div class="input-group-prepend col-3">
          <div class="input-group-text" id="btnGroupAddon">Tipo</div>
        
          <select name="ingeniero" id="ingeniero" class="form-control">
            <option value="todos">Todos</option>
            @foreach ($dispositivo as $item)
                <option value="{{$item->nombre_dispositivo}}">{{$item->nombre_dispositivo}}</option>
            @endforeach
          </select>
        </div>
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Factor de Forma</div>
                <select name="factor_de_forma" id="factor_de_forma" class="form-control">
                  <option value="Todos">Todos</option>
                  @foreach ($factor as $item)
                <option value="{{$item->nombre_factor}}">{{$item->nombre_factor}}</option>
            @endforeach
                </select>
        </div>
     </div>
 
     
     @include('inventario.table')


     <ul class="pagination">
      <li class="page-item disabled" id="back"><a id="anterior" aria-hidden="true" class="page-link" onclick="" rel="next" aria-label="« Anterior">‹</a></li>
      <li class="page-item" id="next"><a id="siguiente" class="page-link" onclick="redireccionar(2)" rel="next" aria-label="Siguiente »">›</a></li>
      </ul>

      {{-- @include('inventario/ajax/indexAjax.blade.php') --}}
</div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
  
  function buscarFinal(datos,select,cantidad){
    var res = datos * select;
    console.log(res);
    return res;
  }

  function buscarInicio(final,select){
    var res = parseFloat(final)-parseFloat(select);
    return res;
    console.log(res);
  }

  //REDIRECT PAGINATOR
 

  function factor(filas,select) {
    var count = 0;
    var res = filas;
    while (res > 0) {
      res = filas - select;
      filas = res;
      count = count+1;
    }
    return count;
  }
  //VISTA GENERAL INVENTARIO
  

  //
    $(document).on('change keyup', '.required', function(e){
    let Disabled = true;
      $(".required").each(function() {
        let value = this.value
        if ((value)&&(value.trim() !=''))
            {
              Disabled = false
            }else{
              Disabled = true
              return false
            }
      });
    
    if(Disabled){
          $('#btnBuscar').prop("disabled", true);
        }else{
          $('#btnBuscar').prop("disabled", false);
        }
  });
    
</script>
<link rel="stylesheet" href="{{ URL::asset('estilos/style.css') }} ">
@include('inventario.ajax.indexAjax')


@endsection