@extends('adminlte::page')
@section('content')

<style>
  .boton{
    position: absolute;
    right: 2%;
  }
 
  .file {
  opacity: 0;
  width: 0.1px;
  height: 0.1px;
  position: absolute;
}

.file-input label {
  display: block;
  position: relative;
  width: 200px;
  height: 50px;
  background: linear-gradient(40deg,#3574a8,#7873f5);
  box-shadow: 0 4px 7px rgba(0, 0, 0, 0.4);
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  font-weight: bold;
  cursor: pointer;
  transition: transform .2s ease-out;
}

.file-name {
  position: absolute;
  bottom: -35px;
  left: 10px;
  font-size: 0.85rem;
  color: #555;
}

input:hover + label,
input:focus + label {
  transform: scale(1.02);
}

/* Adding an outline to the label on focus */
input:focus + label {
  outline: 1px solid #000;
  outline: -webkit-focus-ring-color auto 2px;
}
</style>

<h1 align="center" style="font-weight: 700">ORDEN DE TRABAJO</h1>

  
<div class="card">
  <div class="card-body">
    <body>
      
        <form action="{{url('/trabajo/nuevo')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class='container-fluid'>
                <div class="card">
                  @if (Auth::user()->can('crear cliente'))
                      <div class="card-body">
                      <div class="row justify-content-center">
                          <div class="col-11 ">
                            <label class="card-title" style="height: 2rem;">Informacion del Cliente</label>
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Cliente <span style="color: #cf1111">*</span></span>
                             <input type="text" id="cliente" value="{{$cadena}}" name="cliente" class="form-control" autocomplete="off" list="codigo" required onkeyup="" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                             <datalist id="codigoDatalist" >
                            </datalist>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-icon btn-secondary float-right" data-toggle="modal" data-target="#busquedaCliente">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" viewBox="0 0 512 512"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 
                                44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 
                                9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 
                                128-128 128z"/></svg>
                            </button>
                           </div>
                            <span id="estadoCliente"></span>
                            <br>
                            @can('crear cliente')
                                <a href="{{ url('/cliente/nuevo')}}" class="card-link">Nuevo Cliente</a>
                            @endcan
                             
                          </div>
                      </div>
                      </div>
                  @else
                  <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-11 ">
                          <label class="card-title" style="height: 2rem;">Informacion del Cliente</label>
                          <div class="input-group">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Cliente <span style="color: #cf1111">*</span></span>
                           <input type="text" id="cliente" value="{{Auth::user()->name}}, {{Auth::user()->direccionSocial}} {{Auth::user()->telefono}}, {{Auth::user()->codigoPostal}} {{Auth::user()->provincia}}" name="cliente" class="form-control" autocomplete="off" list="codigo" required onkeyup="" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                           
                         </div>
                           
                        </div>
                    </div>
                    </div>
                  @endif
                      
                    

                      <div class="row justify-content-center">
                          
                          <div class="col-5">
                            <div class="input-group">
                              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Prioridad<span style="color: #cf1111">*</span></span>
                                <select name="prioridad" class="form-control" class="btn-block" required>
                                  <option disabled>Escoja la prioridad</option>
                                  <option value="Normal">Normal</option>
                                  <option value="Prioritario">Prioritario</option>
                                  <option value="Urgente">Urgente</option>
                                  <option value="Inmediato">Inmediato</option>
                                </select>
                            </div>
                          </div>
                          
                          <div class="col-5">
                            <div class="input-group">
                               <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Tiempo Estimado<span style="color: #cf1111">*</span></span>
                              <input type="text" id="tiempo" name="tiempoEstimado" class="form-control" 
                                placeholder="Ingrese un tiempo estimado" required onkeyup="validarTiempo()" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32))">
                                
                            </div>
                           <span id="estadoTiempo"></span>
                          </div>
                        </div>
                      <br>
                </div>
                
            

                <div class="card">
                  <div class="card-body">
                    <h5><strong>DISPOSITIVOS</strong></h5>
                    &nbsp;&nbsp;&nbsp;&nbsp;<td class="btn-block"><button type="button" id="adicional" name="adicional" class="btn btn-primary" style="border-radius: 50%;">
                     <i class="fa fa-plus"></i> </button>
                    </td>
                        <div class="table-responsive">
                      <table class="table tftable" id="tabla">
                          <thead class="thead">
                              
                          </thead>
                          <tbody id="tabla">
                              <span id="estadoBoton"></span>
                              <tr>
                                  <td>
                                      <div class="input-group">
                                        <span class="input-group-text" id="inputGroup-sizing-sm" style=" background:rgb(29, 145, 195); color: aliceblue">Tipo</span>
                                          <select name="tipo[]" id="tipo" class="form-control"  required >
                                            <option disabled selected >Tipo de Dispositivo</option>
                                            <option value="HDD">HDD</option>
                                            <option value="SSD">SSD</option>
                                            <option value="MS">M2</option>
                                            <option value="CD/DVD">CD/DVD</option>
                                            <option value="Unidad">Unidad Flash</option>
                                            <option value="MEMORY">Tarjeta de Memoria</option>
                                            <option value="Impresora">Impresora</option>
                                            <option value="Memoria">Memoria</option>
                                            <option value="cabezales">herramientas de cambio de cabezales</option>
                                            <option value="disco">herramientas de disco duro</option>
                                            <option value="desapilado">herramientas de desapilado de fuerza bruta</option>
                                            <option value="Laptop">Laptop</option>
                                            <option value="Notebook">Notebook</option>
                                            <option value="Otro">Otro(Dispositivo HDD)</option>
                                            <option value="PC">PC</option>
                                            <option value="Telefono">Telefono Celular</option>
                                            <option value="Disco">Disco Blu-ray</option>
                                            <option value="Tablet">Tablet</option>
                                            <option value="FDD">FDD</option>

                                          </select>
                                      </div>
                                  </td>
                                  <td>
                                      <div class="input-group">
                                        <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Rol</span>
                                          <select name="rol[]" id="rol" class="form-control">
                                            <option disabled selected>Escoja un rol</option>
                                            <option value="Dispositivo a Recuperar">Dispositivo a Recuperar</option>
                                            <option value="Datos">Datos</option>
                                            <option value="Donante">Donante</option>
                                          </select>
                                      </div>
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Fabricante</span>
                                        <input type="text" class="form-control" name="fabricante[]"id="fabricante" onkeyup="mayus(this);" 
                                        onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))">
                                    </div>
                                    <span id="estadoFabricante"></span>
                                      
                                  </td>
                                  
                              </tr>
                              <tr>
                                <td>
                                  <div class="input-group">
                                    <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Modelo</span>
                                      <input type="text" class="form-control" onkeyup="mayus(this);" name="modelo[]"id="modelo" 
                                      onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))" >
                                  </div>
                                  <span id="estadoModelo"></span>
                                </td>
                                <td>
                                  <div class="input-group">
                                    <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Serial</span>
                                      <input type="text" class="form-control " name="serial[]"id="serial" onkeyup="mayus(this);" 
                                      onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))" >
                                  </div>
                
                                </td>
                                <td>
                                  <div class="input-group">
                                    <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Capacidad</span>
                                      <input type="text" class="form-control " name="capacidad[]"id="capacidad" onkeyup="mayus(this);" placeholder="GB, TB, PB"
                                      onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))" >
                                  </div>
                
                                </td>
                               
                              </tr>
                              <tr>
                                <td>
                                  <div class="input-group">
                                    <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Tipo de Daño</span>
                                    <select name="malFuncionamiento[]" id="malFuncionamiento" class="form-control">
                                      <option disabled selected>Tipo de Mal Funcionamiento</option>
                                    </select>
                                  </div>
                
                                </td>
                                <td>
                                  <div class="input-group">
                                    <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Localizacion</span>
                                      <input type="text" class="form-control " name="localizacion[]"id="localizacion" onkeyup="mayus(this);" 
                                      onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))" >
                                  </div>
                
                                </td>
                                <td >
                                  <div class="borrar" style="width:20%;display: contents;">
                                    <button class='btn btn-icon btn-danger' type='button' id='deletRow' name='deletRow'>
                                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                  </svg>
                                  </button>
                                  </div>
                                  
                                  <!-- Button trigger modal -->
                                  <button type="button" class="btn btn-icon btn-success float-right" data-toggle="modal" data-target="#volcado">
                                    Para Volcado
                                  </button>
                                </td>
                              </tr>
                  
                          </tbody>
                      </table>
                      <div class="div text-center">
                          <span id="stateRow"></span>
                      </div>
                  </div>
                  </div>
                  
                </div>


                <!-- Modal BUSQUEDA CLIENTE -->
                <div class="modal fade" id="busquedaCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Buscar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="">
                            <div class="input-group mt-2 col-12">
                              <span class="input-group-text" >Tipo</span>
                              <select name="tipoVolcado[]" id="tipoVolcado" class="form-control">
                                <option disabled selected>Escoja un Dispositivo</option>
                              </select>
                          </div>
                            <div class="input-group mt-2 col-12">
                                <span class="input-group-text">Fabricante</span>
                                <select name="fabricanteVolcado[]" id="fabricanteVolcado" class="form-control">
                                  <option disabled selected>Escoja un Fabricante</option>
                                </select>
                            </div>
                            <div class="input-group mt-2 col-12">
                                <span class="input-group-text" >Modelo</span>
                                <input type="text" class="form-control" id="modeloVolcado" name="modeloVolcado">
                            </div>
                            <div class="input-group mt-2 col-12">
                              <span class="input-group-text">Capacidad</span>
                              <input type="text" class="form-control " name="capacidadVolcado[]"id="capacidadVolcado" onkeyup="mayus(this);" placeholder="GB, TB, PB"
                              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))" >
                            </div>
                            <div class="input-group mt-2 col-12">
                                <span class="input-group-text" >Factor de Forma</span>
                                <select name="factorVolcado[]" id="factorVolcado" class="form-control">
                                  <option disabled selected>Escoja un Factor de Forma</option>
                                </select>
                            </div>
                            <div class="input-group mt-2 col-12">
                                <span class="input-group-text" >Serie</span>
                                <input type="text" class="form-control" id="serieVolcado">
                            </div>
                            <div class="input-group mt-2 col-12">
                              <span class="input-group-text" >Precio Compra</span>
                              <input type="text" class="form-control" id="compraVolcado">
                              <select name="compraMonedaVolcado[]" id="compraMonedaVolcado" class="form-control">
                                <option disabled selected>Tipo de Moneda</option>
                              </select>
                          </div>
                          <div class="input-group mt-2 col-12">
                            <span class="input-group-text">Precio Venta</span>
                            <input type="text" class="form-control" id="ventaVolcado">
                            <select name="ventaMonedaVolcado[]" id="ventaMonedaVolcado" class="form-control">
                              <option disabled selected>Tipo de Moneda</option>
                            </select>
                        </div>
                            <br>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="volcado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Añadir Disco Volcado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="">
                            <div class="input-group mt-2 col-12">
                              <span class="input-group-text" >Tipo</span>
                              <select name="tipoVolcado[]" id="tipoVolcado" class="form-control">
                                <option disabled selected>Escoja un Dispositivo</option>
                              </select>
                          </div>
                            <div class="input-group mt-2 col-12">
                                <span class="input-group-text">Fabricante</span>
                                <select name="fabricanteVolcado[]" id="fabricanteVolcado" class="form-control">
                                  <option disabled selected>Escoja un Fabricante</option>
                                </select>
                            </div>
                            <div class="input-group mt-2 col-12">
                                <span class="input-group-text" >Modelo</span>
                                <input type="text" class="form-control" id="modeloVolcado" name="modeloVolcado">
                            </div>
                            <div class="input-group mt-2 col-12">
                              <span class="input-group-text">Capacidad</span>
                              <input type="text" class="form-control " name="capacidadVolcado[]"id="capacidadVolcado" onkeyup="mayus(this);" placeholder="GB, TB, PB"
                              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))" >
                            </div>
                            <div class="input-group mt-2 col-12">
                                <span class="input-group-text" >Factor de Forma</span>
                                <select name="factorVolcado[]" id="factorVolcado" class="form-control">
                                  <option disabled selected>Escoja un Factor de Forma</option>
                                </select>
                            </div>
                            <div class="input-group mt-2 col-12">
                                <span class="input-group-text" >Serie</span>
                                <input type="text" class="form-control" id="serieVolcado">
                            </div>
                            <div class="input-group mt-2 col-12">
                              <span class="input-group-text" >Precio Compra</span>
                              <input type="text" class="form-control" id="compraVolcado">
                              <select name="compraMonedaVolcado[]" id="compraMonedaVolcado" class="form-control">
                                <option disabled selected>Tipo de Moneda</option>
                              </select>
                          </div>
                          <div class="input-group mt-2 col-12">
                            <span class="input-group-text">Precio Venta</span>
                            <input type="text" class="form-control" id="ventaVolcado">
                            <select name="ventaMonedaVolcado[]" id="ventaMonedaVolcado" class="form-control">
                              <option disabled selected>Tipo de Moneda</option>
                            </select>
                        </div>
                            <br>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                      </div>
                    </div>
                  </div>
                </div>
               
  
               
                <div class="card">
                    <div class="card-body">
                <label style="font-size: 16px;">Información de mal funcionamiento del dispositivo</label>
                <br>
                <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px"  autocomplete="off" name="informacion" id="informacion" cols="140" rows="4"></textarea>

                </div>
              </div>

                <div class="card" >
                    <div class="card-body">
                      <label style="font-size: 16px;">Dato Importante</label>
                      <br>
                      <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" autocomplete="off" name="dato" id="dato" cols="140" rows="4"></textarea>

                    </div>
                    
                </div>

                <div class="card" >
                  <div class="card-body">
                    <label style="font-size: 16px;">Nota</label>
                    <br>
                    <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" autocomplete="off" name="nota" id="nota" cols="140" rows="4"></textarea>
                  </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <div class="file-input" align="center">
                    <input type="file" accept="image/*" class="file" name="imagen[]" multiple id="imagen" maxlength="256" >
                    <label for="imagen">
                      Seleccionar Imagen &nbsp;
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17" fill="white"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 
                        11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 
                        1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                      </svg>
                    </label>
                  </div>
                  <br>
                  <div class="row" id="resto_form" style="margin-left: 1%"></div>
                </div>
              </div>
                
                <br>
                <div class="form-group">
                <a href="/trabajos" class="btn btn-danger my-2 my-sm-0">Cancelar</a>
                <button class="btn btn-primary" type="submit" >Aceptar</button>
                </div>
            </div>
          </form>   
  </body>
  </div>
</div>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

<script src="{{ asset('js/trabajo/create.js')}}"></script>
<link rel="stylesheet" href="{{ URL::asset('estilos/style.css') }} ">
<script>

if ($('#cliente').val() != "") {
    $('#cliente').prop('readonly', true);
  }

  $('#cliente').keyup(function() {
      var query = $(this).val();
      console.log(query);
      if (query != '') {
          $.ajax({
              url: '/autocompletarCliente',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
                  query: query,
              },
              success: function(data) {
                  $('#codigoDatalist').fadeIn();
                  $('#codigoDatalist').html(data);
              }
          
          });
      }
  });




  var contador = 0;
  function readURL(input) {
    //console.log( numero);
    
    
    for (let i = 0; i < input.files.length; i++) {
      
      $('#resto_form').append('<div  id="resto_form'+contador+'" class="card" style="width: 350px; height: 140px; background: transparent">'
                      +'<span class="boton"  onclick="eliminarImagen('+contador+')">'
                      +'<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-trash" viewBox="0 0 448 512"><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm88 200H296c13.3 0 24 10.7 24 24s-10.7 24-24 24H152c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/></svg>'
                      +'</span>'
                      +'</div>&nbsp;&nbsp;&nbsp;&nbsp;');

      //$('#resto_form'+contador).append('<div id="img'+contador+'" class="card" style="width: 350px"></div>');

      
      $('#resto_form'+contador).append(`<img id="img`+contador+`" width="350px" height="140px" align="left">`); //Asignamos el src dinámicamente a un img dinámico también
      addImg(input.files[i],contador);
      //reader.readAsDataURL(input.files[0]);
      //reader.readAsDataURL(input.files[i]);
      contador = contador+1;
    }

  }

  function addImg(input,cont) {
      console.log(input.files);
      var reader = new FileReader();
      reader.onload = function(e) {
        // Asignamos el atributo src a la tag de imagen
        //$('#imagenmuestra').attr('src', e.target.result);
        var result = e.target.result;
        $('#img'+cont).attr('src', e.target.result);
      };
      reader.readAsDataURL(input);
  }

  // El listener va asignado al input
  $("#imagen").change(function() {
    readURL(this);
  });

  function eliminarImagen(cont) {
    //var archivo2 = $('#imagen').prop("files");
    $('#resto_form'+cont).remove();
  }
</script>

@endsection