<!-- Button trigger modal -->
<button type="button" id="botones" class="btn btn-success" data-toggle="modal" data-target="#exampleModalMoverCliente">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
    </svg>
    Agregar nuevo dispositivo de cliente
</button>
<!-- Modal --> 

<div class="modal fade-md" id="exampleModalMoverCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelMoverCliente" aria-hidden="true">
    <div class="modal-dialog " role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="exampleModalLabelMoverCliente">Agregar Nuevo Dispositivo Del Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-body p-1" id="card">
                            <ul class="nav nav-pills">
                            <li class="nav-item col-md-6">
                                <a class="nav-link" href="#nuevoDispositivo" data-toggle="tab" id="searchNuevDispo">
                                    <div class="input-group">
                                        <div class="input-group-text" id="btnGroupAddon" style=" background:rgb(29, 145, 195); color: aliceblue">
                                            <div class="custom-control custom-checkbox">
                                                <input class="form-check-input" type="radio" name="radioNoLabel1" id="radioNoLabel1" value="" aria-label="...">
                                            </div>
                                        </div>
                                        <span class="input-group-text form-control" style=" background:rgb(29, 145, 195); color: aliceblue">Dispositivo</span>
                                    </div> 
                                </a>
                            </li>
                            <li class="nav-item col-md-6">
                                <a class="nav-link" href="#paraVolcadoDispo" data-toggle="tab" id="searchVolcad">
                                    <div class=" input-group">
                                        <div class="input-group-text" id="btnGroupAddon" style=" background:rgb(29, 145, 195); color: aliceblue">
                                            <div class="custom-control custom-checkbox">
                                                <input class="form-check-input" type="radio" name="radioNoLabel2" id="radioNoLabel2" value="" aria-label="...">
                                            </div>
                                        </div>
                                        <span class="input-group-text form-control" style=" background:rgb(29, 145, 195); color: aliceblue">Para Volcado</span>
                                    </div>
                                </a>
                            </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body" id="buscadoresNuevDispositivo">
                            <div class="tab-content">
                                <!--nuevoDispositivo-->
                                <div class="active tab-pane" id="nuevoDispositivo">
                                    <div class="nuevoDispositivo">
                                    <div class="input-group mt-2">
                                        <span class="input-group-text" id="inputGroup-sizing-sm" >Tipo</span>
                                        <select name="tipo" id="tipo" class="form-control"   >
                                            <option disabled selected >Tipo de Dispositivo</option>
                                            @foreach ($dispositivosCargar as $item)
                                                <option value="{{$item->nombre_dispositivo}}">{{$item->nombre_dispositivo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text" >Rol</span>
                                                <select name="rol" id="rol" class="form-control">
                                                    <option disabled selected>Escoja un rol</option>
                                                    <option value="Dispositivo a Recuperar">Dispositivo a Recuperar</option>
                                                    <option value="Datos">Datos</option>
                                                </select>
                                        </div>
                                            <div class="input-group mt-2">
                                                <span class="input-group-text">Fabricante</span>
                                                <select name="fabrica" id="fabrica" class="form-control">
                                                    <option disabled selected value="">Seleccione un Fabricante</option>
                                                        @foreach ($fabricantes as $fabric)
                                                            <option value="{{$fabric->nombre_fabricante}}">{{$fabric->nombre_fabricante}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text" >Modelo</span>
                                             <input type="text" class="form-control" onkeyup="mayus(this);" name="modelo"id="modelo" 
                                                 onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32))" >
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text" >Serial</span>
                                              <input type="text" class="form-control " name="serial"id="serial" onkeyup="mayus(this);" 
                                                  onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32))" >
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text" >Capacidad</span>
                                              <input type="text" class="form-control " name="capacidad"id="capacidad" onkeyup="mayus(this);" placeholder="GB, TB, PB"
                                              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))" >
                                          </div>
                                          <div class="input-group mt-2">
                                            <span class="input-group-text" >Tipo de Daño</span>
                                            <select name="malFuncionamiento" id="malFuncionamiento" class="form-control">
                                              <option disabled selected >Tipo de Mal Funcionamiento</option>
                                              @foreach ($malFuncionamiento as $malFuncionamiento)
                                                  <option value="{{$malFuncionamiento->mal_funcionamiento}}">{{$malFuncionamiento->mal_funcionamiento}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text" >Localizacion</span>
                                            <input type="text" class="form-control " name="localizacion"id="localizacion" onkeyup="mayus(this);" 
                                            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32))" >
                                        </div>
                                            <br>
                                            <div class="float-right">
                                                <button type="button" class="btn btn-danger" id="botones" data-dismiss="modal" style=" margin-left: auto;">Cancelar</button>
                                                <button type="button" class="btn btn-primary" id="btnGuardarNuevoDispositivo"  name="btnGuardarNuevoDispositivo">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                <!--/nuevoDispositivo-->

                                <!--paraVolcadoDispo-->
                                <div class="tab-pane" id="paraVolcadoDispo">
                                    <div class="paraVolcadoDispo">
                                        <div class="input-group mt-2 col-12">
                                            <span class="input-group-text" >Tipo</span>
                                            <select name="tipoVolcadoPrueba" id="tipoVolcadoPrueba" class="form-control">
                                              <option disabled selected value="">Tipo de Dispositivo</option>
                                              @foreach ($dispositivosCargar as  $dispositivo)
                                                <option value="{{$dispositivo->nombre_dispositivo}}">{{$dispositivo->nombre_dispositivo}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                          <div class="input-group mt-2 col-12">
                                              <span class="input-group-text">Fabricante</span>
                                              <select name="fabricanteVolcadoPrueba" id="fabricanteVolcadoPrueba" class="form-control">
                                                <option disabled selected value="">Seleccione un Fabricante</option>
                                                      @foreach ($fabricantes as $fabricante)
                                                        <option value="{{$fabricante->nombre_fabricante}}">{{$fabricante->nombre_fabricante}}</option>
                                                      @endforeach
                                              </select>
                                          </div>
                                          <div class="input-group mt-2 col-12">
                                              <span class="input-group-text" >Modelo</span>
                                              <input type="text" class="form-control" id="modeloVolcadoPrueba" name="modeloVolcadoPrueba">
                                          </div>
                                          <div class="input-group mt-2 col-12">
                                            <span class="input-group-text">Capacidad</span>
                                            <input type="text" class="form-control " name="capacidadVolcadoPrueba"id="capacidadVolcadoPrueba" onkeyup="mayus(this);" placeholder="GB, TB, PB"
                                            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32) || (event.charCode == 241)|| (event.charCode == 209))" >
                                          </div>
                                          <div class="input-group mt-2 col-12">
                                            <span class="input-group-text" >Tipo de Conexión</span>
                                            <select name="conexionVolcadoPrueba" id="conexionVolcadoPrueba" class="form-control">
                                              <option disabled selected value="">Tipo de Conexion</option>
                                              @foreach ($conexion as $conexiones)
                                                <option value="{{$conexiones->nombre_conexion}}">{{$conexiones->nombre_conexion}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                          <div class="input-group mt-2 col-12">
                                              <span class="input-group-text" >Factor de Forma</span>
                                              <select name="factorVolcadoPrueba" id="factorVolcadoPrueba" class="form-control">
                                                <option disabled selected value="">Escoja un Factor de Forma</option>
                                                @foreach ($factor as $factor)
                                                <option value="{{$factor->nombre_factor}}">{{$factor->nombre_factor}}</option>
                                                @endforeach
                                              </select>
                                          </div>
                                          <div class="input-group mt-2 col-12">
                                              <span class="input-group-text" >Serial</span>
                                              <input type="text" class="form-control" id="serieVolcadoPrueba" name="serieVolcadoPrueba">
                                          </div>
                                          <div class="input-group mt-2 col-12">
                                            <span class="input-group-text" >Localizacion</span>
                                            <input type="text" class="form-control " name="localizacionVolcado"id="localizacionVolcado" onkeyup="mayus(this);"  >
                                        </div>
                                          <br>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                      <button type="button" class="btn btn-primary" id="btnGuardarNuevoDispositivoVolcado"  name="btnGuardarNuevoDispositivoVolcado" >Guardar</button>
                                    </div>
                                    </div>{{-- @endif --}}
                                </div> <!--/paraVolcadoDispo-->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    </div>
</div>

<script src="{{ asset('js/trabajo/create.js')}}"></script>

<script>

$( document ).ready(function() {

    $('#buscadoresNuevDispositivo').hide();

    $( "#searchNuevDispo" ).click(function() {
        $('#buscadoresNuevDispositivo').show(); 
    });

    $( "#searchVolcad" ).click(function() {
        $('#buscadoresNuevDispositivo').show(); 
    });
});

$('#btnGuardarNuevoDispositivo').on('click', function () {
            var var1 = $('#tipo').val();
            var var2 = $('#rol').val();
            var var3 = $('#fabrica').val();
            var var4 = $('#modelo').val();
            var var5 = $('#capacidad').val();
            var var6 = $('#malFuncionamiento').val();
            var var7 = $('#serial').val();
            var var8 = $('#localizacion').val();
            //console.log(tipo);

            if (var1 != "" && var2 != "" && var3 != "" && var4 != "" && var5 != "" && var6 != "" && var7 != "" && var8 != "") {
                
                $.ajax({
                    url: "/trabajos/nuevo/detalle/guardarNuevoDispositivo",
                    type: "POST",
                    data:{ 
                        "_token": "{{ csrf_token() }}",
                        'tipo': var1,
                        'rol': var2,
                        'fabrica': var3,
                        'modelo': var4,
                        'capacidad': var5,
                        'funcionamiento': var6,
                        'serial': var7,
                        'localizacion': var8,
                        "nombre": "{{$orden_elegida->id}}",
                    },
                    cache: false,
                    dataType: 'json',
                    success: function(dataResult){
                        //console.log(dataResult);
                        $('#tipo').val('Tipo de Dispositivo');
                        $('#rol').val('Escoja un rol');
                        $('#fabrica').val('');
                        $('#modelo').val('');
                        $('#capacidad').val('');
                        $('#malFuncionamiento').val('Tipo de Mal Funcionamiento');
                        $('#serial').val('');
                        $('#localizacion').val('');
                    
                        cargaDispositivos(); 
                        cargarOtros();
                        verServicio();    
                        
                    }
                });$('#exampleModalMoverCliente').modal('hide');

            } else {
                
                Swal.fire({
                icon: 'error',
                title: 'Complete todos los campos!!'
                })
                $('#exampleModalMoverCliente').modal('hide');
            }  
    });


    $('#btnGuardarNuevoDispositivoVolcado').on('click', function () {
            var var1 = $('#tipoVolcadoPrueba').val();
            var var2 = $('#fabricanteVolcadoPrueba').val();
            var var3 = $('#modeloVolcadoPrueba').val();
            var var4 = $('#capacidadVolcadoPrueba').val();
            var var5 = $('#conexionVolcadoPrueba').val();
            var var6 = $('#factorVolcadoPrueba').val();
            var var7 = $('#serieVolcadoPrueba').val();
            var var8 = $('#localizacionVolcado').val();
            //console.log(tipo);

            if (var1 != "" && var2 != "" && var3 != "" && var4 != "" && var5 != "" && var6 != "" && var7 != "") {
                
                $.ajax({
                    url: "/trabajos/nuevo/detalle/guardarNuevoDispositivoVolcado",
                    type: "POST",
                    data:{ 
                        "_token": "{{ csrf_token() }}",
                        'tipo': var1,
                        'fabrica': var2,
                        'modelo': var3,
                        'capacidad': var4,
                        'conexion': var5,
                        'factor': var6,
                        'serial': var7,
                        'localizacion': var8,
                        "id": "{{$orden_elegida->id}}",
                    },
                    cache: false,
                    dataType: 'json',
                    success: function(dataResult){
                        //console.log(dataResult);
                        $('#tipoVolcadoPrueba').val('Tipo de Dispositivo');
                        $('#fabricanteVolcadoPrueba').val('Seleccione un Fabricante');
                        $('#modeloVolcadoPrueba').val('');
                        $('#capacidadVolcadoPrueba').val('');
                        $('#conexionVolcadoPrueba').val('Tipo de Conexion');
                        $('#factorVolcadoPrueba').val('Escoja un Factor de Forma');
                        $('#serieVolcadoPrueba').val('');
                    
                        cargarClones();    
                        
                    }
                });$('#exampleModalMoverCliente').modal('hide');

            } else {
                
                Swal.fire({
                icon: 'error',
                title: 'Complete todos los campos!!'
                })
                $('#exampleModalMoverCliente').modal('hide');
            }  
    });

</script>

