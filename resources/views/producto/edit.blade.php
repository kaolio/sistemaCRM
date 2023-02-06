
@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">EDITAR PRODUCTO</h1>
<style>
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
<body>
    <div class="card">
      
        <div class="card-body">
     
               <form action="{{url('/producto/editar/'.$producto->id)}}" id="formulario" method="POST">
                
                 @csrf
                 <div class="card">
                     <div class="card-body">
                       <br>
                       <div class="row">
                         <div class="col-6">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Dispositivo</span>
                             <select name="dispositivo" id="dispositivo" class="form-control" class="btn-block" >
                              <option disabled  selected>Tipo de Dispositivo</option>
                              @foreach ($dispositivo as $dispositivos)
                                @if ($dispositivos->nombre_dispositivo == $producto_elegido->dispositivo)
                            <option value="{{$dispositivos->nombre_dispositivo}}" selected>{{$dispositivos->nombre_dispositivo}}</option>                      
                              @else
                                <option value="{{$dispositivos->nombre_dispositivo}}">{{$dispositivos->nombre_dispositivo}}</option>      
                              @endif
                            @endforeach
                            </select>
                           </div>
                         </div>
                         <div class="col-6">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Conexión</span>
                             <select name="connection" id="connection" class="form-control" class="btn-block" >
                              <option disabled  selected>Tipo de Conexion</option>
                              @foreach ($conexion as $conexiones)
                                @if ($conexiones->nombre_conexion == $producto_elegido->connection)
                                 <option value="{{$conexiones->nombre_conexion}}" selected>{{$conexiones->nombre_conexion}}</option>                      
                                @else
                                  <option value="{{$conexiones->nombre_conexion}}">{{$conexiones->nombre_conexion}}</option>      
                                @endif  
                              @endforeach

                            </select>
                           </div>
                         </div>
                       </div>
                       <br>
                       <div class="row">
                         <div class="col-6">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Fabricante</span>
                             <select name="fabricante" class="form-control" class="btn-block" required>
                              <option disabled selected>Elija el Fabricante</option>
                              @foreach ($fabricante as $fabricantes)
                              @if ($fabricantes->nombre_fabricante == $producto_elegido->fabricante)
                             <option value="{{$fabricantes->nombre_fabricante}}" selected>{{$fabricantes->nombre_fabricante}}</option>
                             @else
                             <option value="{{$fabricantes->nombre_fabricante}}">{{$fabricantes->nombre_fabricante}}</option>
                             @endif 
                           @endforeach
                            </select>
                           </div>
                         </div>
                         <div class="col-6">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Modelo</span>
                           <input type="text" id="modelo" name="modelo" class="form-control" value="{{$producto->modelo}}" 
                             required onkeyup="validarCiudad()" autocomplete="off" onkeypress="return ( (event.charCode == 45 )|| (event.charCode >= 48 && event.charCode <= 57)|| (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                            </div>
                            <span id="estadoCiudad"></span>
                         </div>
                       </div>
                       <br>
                       <div class="row">
                        <div class="col-4">
                          <div class="input-group">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Capacidad</span>
                          <input type="text" id="capacidad" name="capacidad" class="form-control" placeholder="GB, TB" 
                            required autocomplete="off" value="{{$producto->capacidad_producto}}" onkeyup="validarCapacidad()" onkeypress="return ((event.charCode >= 84 && event.charCode <= 84)||(event.charCode >= 116 && event.charCode <= 116)||(event.charCode >= 98 && event.charCode <= 98)||
                            (event.charCode >= 103 && event.charCode <= 103)||(event.charCode >= 66 && event.charCode <= 66)||(event.charCode >= 71 && event.charCode <= 71)||(event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
                           </div>
                           <span id="estadoCiudad"></span>
                        </div>
                        <div class="col-5">
                          <div class="input-group">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Factor de Forma</span>
                            <select name="factor" id="factor" class="form-control" class="btn-block" >
                             <option disabled  selected>Tipo</option>
                             @foreach ($factor as $factores)
                               @if ($factores->nombre_factor == $producto_elegido->factor)
                                <option value="{{$factores->nombre_factor}}" selected>{{$factores->nombre_factor}}</option>                      
                               @else
                                 <option value="{{$factores->nombre_factor}}">{{$factores->nombre_factor}}</option>      
                               @endif  
                             @endforeach
                           </select>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="input-group">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Rol</span>
                            <select name="rol" id="rol" class="form-control" class="btn-block" >
                             <option disabled  selected>Tipo</option>
                               @if ($producto->rol == $producto_elegido->rol)
                                <option value="{{$producto_elegido->rol}}" selected>{{$producto_elegido->rol}}</option>                      
                              @else
                                <option value="{{$producto_elegido->rol}}">{{$producto_elegido->rol}}</option>      
                              @endif
                              <option value="Disco para Volcado">Disco para Volcado</option>
                              <option value="Otro">Otro</option>
                           </select>
                          </div>
                        </div>
                       </div>
                       <br>
                       <div class="row">
                         <div class="col-6">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Ubicación</span>
                           <input type="text" id="ubicacion" name="ubicacion" class="form-control" value="{{$producto->ubicacion}}"
                             required onkeyup="validarPais()" autocomplete="off" onkeypress="return ( (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209) || (event.charCode == 45))">
                           </div>
                           <span id="estadoPais"></span>
                         </div>
                         <div class="col-6">
                           <div class="input-group">
                             <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Distribuidora</span>
                             <input type="text" id="distribuidora" name="distribuidora" class="form-control" value="{{$producto->distribuidora}}"
                             required onkeyup="validarPais()" autocomplete="off" onkeypress="return ( (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209) || (event.charCode == 45))">
                           </div>
                         </div>
                       </div>
                       <br>
                       <div class="row">
                         <div class="col-6">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Precio</span>
                             <input type="text" class="form-control " name="precio" id="precio" onblur="resultadoFinal()" value="{{$producto->precio_compra}}"
                                           onkeypress="return ((event.charCode == 44) || (event.charCode >= 48 && event.charCode <= 57))">
                           </div>
                         </div>
                         <div class="col-6">
                          <div class="input-group">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Precio de Venta</span>
                            <input type="text" class="form-control " name="precioVenta" id="precioVenta" onblur="resultadoFinal()" value="{{$producto->precio_venta}}"
                                          onkeypress="return ((event.charCode == 44) || (event.charCode >= 48 && event.charCode <= 57))">
                          </div>
                        </div>
                       </div>
                     </div> 
                   </div>
   

                   <div class="card">
                    <div class="card-body">
                      <h5><strong>SERIAL</strong></h5>
                
                      <div class="row justify-content-center">
                        <div class="col-10">
                          <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Numero Serial</span>
                              <input type="text" class="form-control " name="serial"id="serial" value="{{$producto->serial}}"
                              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 45))">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
   
   
                   <label style="font-size: 16px;">Nota</label>
                   <br>
                   <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" name="nota" id="nota" cols="140" rows="4">{{$producto->nota}}</textarea>
   
   
   
                 </div>
   
                 <div class="form-group">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="/productos" class="btn btn-danger my-2 my-sm-0">Regresar</a>
                 
                   <button class="btn btn-primary" type="submit" >Actualizar</button>
                 </div> 
         </div>
                   
   
         </form>
                   
   
   </body>


   <script>
    function resultadoFinal(){
      var precio = document.getElementById("precio").value;
      document.getElementById("precioFin").value = precio;
    }

    function resultadoFinalVat(){
      var precio = document.getElementById("precio").value;
      var vat = document.getElementById("vat").value;

      var res = (precio*vat)/100;
      var suma = Number(precio) + Number(res);
      document.getElementById("precioFin").value = suma;
    }
   </script>
   
@endsection