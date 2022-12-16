<button class="btn btn-success" id="botones" class="btn btn-success" data-toggle="modal" data-target="#exampleModalNuevoDis">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
    </svg>
    Agregar nuevo dispositivo del cliente
</button>

<div class="modal fade-md" id="exampleModalNuevoDis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelMover" aria-hidden="true">
    <div class="modal-dialog " role="document">
    <div class="modal-content">
        <div class="modal-header">
             <h5 class="modal-title w-100 text-center" id="exampleModalLabelMover">Nuevo Dispositivo Del Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <!--Nuevo-->
                                    <div class="donar">
                                        <div class="input-group mt-2">
                                            <span class="input-group-text" id="inputGroup-sizing-sm" style=" background:rgb(29, 145, 195); color: aliceblue">Tipo</span>
                                            <select name="tipo" id="tipo" class="form-control"   >
                                                <option disabled >Tipo de Dispositivo</option>
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
                                            <div class="input-group mt-2">
                                                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Rol</span>
                                                    <select name="rol" id="rol" class="form-control">
                                                        <option disabled>Escoja un rol</option>
                                                        <option value="Dispositivo a Recuperar">Dispositivo a Recuperar</option>
                                                        <option value="Daros">Datos</option>
                                                        <option value="Donante">Donante</option>
                                                    </select>
                                            </div>
                                                <div class="input-group mt-2">
                                                    <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Fabricante</span>
                                                        <input type="text" class="form-control" name="fabrica"id="fabrica" onkeyup="mayus(this);" 
                                                        onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))">
                                                </div>
                                            <div class="input-group mt-2">
                                                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Modelo</span>
                                                 <input type="text" class="form-control" onkeyup="mayus(this);" name="modelo"id="modelo" 
                                                     onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32))" >
                                            </div>
                                            <div class="input-group mt-2">
                                                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Serial</span>
                                                  <input type="text" class="form-control " name="serial"id="serial" onkeyup="mayus(this);" 
                                                      onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32))" >
                                            </div>
                                            <div class="input-group mt-2">
                                                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Localizacion</span>
                                                <input type="text" class="form-control " name="localizacion"id="localizacion" onkeyup="mayus(this);" 
                                                onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 32))" >
                                            </div>
                                                <br>
                                                <div class="float-right">
                                                    <button type="button" class="btn btn-danger" id="botones" data-dismiss="modal" style=" margin-left: auto;">Cancelar</button>
                                                    <button type="button" class="btn btn-primary" id="btnGuardarNuevoDispositivo" name="btnGuardarNuevoDispositivo">Guardar</button>
                                                </div>
                                    </div>{{-- @endif --}}
                                
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
    $('#btnGuardarNuevoDispositivo').on('click', function () {
            var var1 = $('#tipo').val();
            var var2 = $('#rol').val();
            var var3 = $('#fabrica').val();
            var var4 = $('#modelo').val();
            var var5 = $('#serial').val();
            var var6 = $('#localizacion').val();
            //console.log(tipo);
            $.ajax({
                url: "/trabajos/nuevo/detalle/guardarNuevoDispositivo",
                type: "POST",
                data:{ 
                    "_token": "{{ csrf_token() }}",
                    'tipo': var1,
                    'rol': var2,
                    'fabrica': var3,
                    'modelo': var4,
                    'serial': var5,
                    'localizacion': var6,
                    "nombre": "{{$orden_elegida->id}}",
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                 console.log(dataResult);
                          
                    
                }
            });$('#exampleModalNuevoDis').modal('hide');
            
    });
</script>