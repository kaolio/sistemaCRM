
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
                         <div class="col-5">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Dispositivo</span>
                             <select name="dispositivo" id="dispositivo" class="form-control" class="btn-block" >
                              <option disabled  selected>Tipo de Dispositivo</option>
                              
                              <option value="HDD" {{ $producto->dispositivo == 'HDD' ? 'selected' : '' }}>HDD</option>
                              <option value="CD/DVD"{{ $producto->dispositivo == 'CD/DVD' ? 'selected' : '' }}>CD/DVD</option>
                              <option value="Unidad Flash"{{ $producto->dispositivo == 'Unidad Flash' ? 'selected' : '' }}>Unidad Flash</option>
                              <option value="Tarjeta de Memoria"{{ $producto->dispositivo == 'Tarjeta de Memoria' ? 'selected' : '' }}>Tarjeta de Memoria</option>
                              <option value="Impresora"{{ $producto->dispositivo == 'Impresora' ? 'selected' : '' }}>Impresora</option>
                              <option value="Impresora"{{ $producto->dispositivo == 'Impresora' ? 'selected' : '' }}>Memoria</option>
                              <option value="herramientas de cambio de cabezales"{{ $producto->dispositivo == 'herramientas de cambio de cabezales' ? 'selected' : '' }}>herramientas de cambio de cabezales</option>
                              <option value="herramientas de disco duro"{{ $producto->dispositivo == 'herramientas de disco duro' ? 'selected' : '' }}>herramientas de disco duro</option>
                              <option value="herramientas de desapilado de fuerza bruta"{{ $producto->dispositivo == 'herramientas de desapilado de fuerza bruta' ? 'selected' : '' }}>herramientas de desapilado de fuerza bruta</option>
                              <option value="Laptop"{{ $producto->dispositivo == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                              <option value="Notebook"{{ $producto->dispositivo == 'Notebook' ? 'selected' : '' }}>Notebook</option>
                              <option value="Otro(Dispositivo HDD)"{{ $producto->dispositivo == 'Otro(Dispositivo HDD)' ? 'selected' : '' }}>Otro(Dispositivo HDD)</option>
                              <option value="PC"{{ $producto->dispositivo == 'PC' ? 'selected' : '' }}>PC</option>
                              <option value="Telefono Celular"{{ $producto->dispositivo == 'Telefono Celular' ? 'selected' : '' }}>Telefono Celular</option>
                              <option value="Disco Blu-ray"{{ $producto->dispositivo == 'Disco Blu-ray' ? 'selected' : '' }}>Disco Blu-ray</option>
                              <option value="Tablet"{{ $producto->dispositivo == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                              <option value="FDD"{{ $producto->dispositivo == 'FDD' ? 'selected' : '' }}>FDD</option>
                            </select>
                           </div>
                         </div>
                         <div class="col-4">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Conexión</span>
                             <select name="connection" id="connection" class="form-control" class="btn-block" >
                              <option disabled  selected>Tipo de Conexion</option>
                              <option value="M2" {{ $producto->connection == 'M2' ? 'selected' : '' }}>M2</option>
                              <option value="mSATA"{{ $producto->connection == 'mSATA' ? 'selected' : '' }}>mSATA</option>
                              <option value="PATA"{{ $producto->connection == 'PATA' ? 'selected' : '' }}>PATA</option>
                              <option value="PCI Express"{{ $producto->connection == 'PCI Express' ? 'selected' : '' }}>PCI Express</option>
                              <option value="SAS"{{ $producto->connection == 'SAS' ? 'selected' : '' }}>SAS</option>
                              <option value="SATA"{{ $producto->connection == 'SATA' ? 'selected' : '' }}>SATA</option>
                              <option value="SATA-Express"{{ $producto->connection == 'SATA Extress' ? 'selected' : '' }}>SATA Extress</option>
                              <option value="USB 2.0"{{ $producto->connection == 'USB 2.0' ? 'selected' : '' }}>USB 2.0</option>
                              <option value="USB 3.0"{{ $producto->connection == 'USB 3.0' ? 'selected' : '' }}>USB 3.0</option>
                              <option value="USB 3.1"{{ $producto->connection == 'USB 3.1' ? 'selected' : '' }}>USB 3.1</option>
                              <option value="Otro"{{ $producto->connection == 'Otro' ? 'selected' : '' }}>Otro</option>

                            </select>
                           </div>
                         </div>
                         <div class="col-3">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Factor de Forma</span>
                             <select name="factor" id="factor" class="form-control" class="btn-block" >
                              <option disabled  selected>Tipo</option>
                              <option value="1.0"  {{ $producto->factor == '1.0' ? 'selected' : '' }}>1.0"</option>
                              <option value="1.3"  {{ $producto->factor == '1.3' ? 'selected' : '' }}>1.3"</option>
                              <option value="1.8"  {{ $producto->factor == '1.8' ? 'selected' : '' }}>1.8"</option>
                              <option value="2.5"  {{ $producto->factor == '2.5' ? 'selected' : '' }}>2.5"</option>
                              <option value="3.5"  {{ $producto->factor == '3.5' ? 'selected' : '' }}>3.5"</option>
                              <option value="5.25" {{ $producto->factor == '5.25' ? 'selected' : '' }}>5.25"</option>
                              <option value="otro" {{ $producto->factor == 'otro' ? 'selected' : '' }}>Otro</option>
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
                              <option value="Seagate"{{ $producto->fabricante == 'Seagate' ? 'selected' : '' }}>Seagate</option>
                              <option value="Toshiba"{{ $producto->fabricante == 'Toshiba' ? 'selected' : '' }}>Toshiba</option>
                              <option value="Samsung"{{ $producto->fabricante == 'Samsung' ? 'selected' : '' }}>Samsung</option>
                              <option value="Verbatim"{{ $producto->fabricante == 'Verbatim' ? 'selected' : '' }}>Verbatim</option>
                              <option value="Wester Digital"{{ $producto->fabricante == 'Wester Digital' ? 'selected' : '' }}>Western Digital</option>
                              <option value="SkayNet"{{ $producto->fabricante == 'SkayNet' ? 'selected' : '' }}>SkyNet</option>
                              <option value="Maxtor"{{ $producto->fabricante == 'Maxtor' ? 'selected' : '' }}>Maxtor</option>
                              <option value="Adata"{{ $producto->fabricante == 'Adata' ? 'selected' : '' }}>Adata</option>
                              <option value="Crucial"{{ $producto->fabricante == 'Crucial' ? 'selected' : '' }}>Crucial</option>
                              <option value="Kingston"{{ $producto->fabricante == 'Kingston' ? 'selected' : '' }}>Kingston</option>
                              <option value="Sony"{{ $producto->fabricante == 'Sony' ? 'selected' : '' }}>Sony</option>
                              <option value="Hitachi"{{ $producto->fabricante == 'Hitachi' ? 'selected' : '' }}>Hitachi</option>
                              <option value="Asus"{{ $producto->fabricante == 'Asus' ? 'selected' : '' }}>Asus</option>
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
                         <div class="col-6">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Ubicación</span>
                           <input type="text" id="ubicacion" name="ubicacion" class="form-control" value="{{$producto->ubicacion}}"
                             required onkeyup="validarPais()" autocomplete="off" onkeypress="return ( (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                           </div>
                           <span id="estadoPais"></span>
                         </div>
                         <div class="col-6">
                           <div class="input-group">
                             <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Distribuidora</span>
                             <input type="text" id="distribuidora" name="distribuidora" class="form-control" value="{{$producto->distribuidora}}"
                             required onkeyup="validarPais()" autocomplete="off" onkeypress="return ( (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                           </div>
                         </div>
                       </div>
                       <br>
                       <div class="row">
                         <div class="col-4">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Precio</span>
                             <input type="text" class="form-control " name="precio" id="precio" onblur="resultadoFinal()" value="{{$producto->precio}}"
                                           onkeypress="return ((event.charCode == 44) || (event.charCode >= 48 && event.charCode <= 57))">
                           </div>
                         </div>
                         <div class="col-4">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">VAT (%)</span>
                             <input type="text" class="form-control " name="vat" id="vat" onblur="resultadoFinalVat()" value="{{$producto->vat}}"
                                           onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                           </div>
                         </div>
                         <div class="col-4">
                           <div class="input-group">
                             <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Precio Final</span>
                             <input type="text" class="form-control " value="{{$producto->precio_fin}}" name="precioFin" id="precioFin" readonly>
                           </div>
                         </div>
                       </div>
                     </div> 
                   </div>
   

                   <div class="card">
                    <div class="card-body">
                      <h4><strong>Serial  </strong></h4>
                
                      <div class="row justify-content-center">
                        <div class="col-10">
                          <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Numero Serial</span>
                              <input type="text" class="form-control " name="serial"id="serial" value="{{$producto->serial}}"
                              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57))">
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