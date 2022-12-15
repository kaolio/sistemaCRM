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
             <h5 class="modal-title" id="exampleModalLabelMover">Agregar Nuevo Dispositivo Del Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <!--Donar-->
                                    <div class="donar">
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">Donar para </span>
                                            <select name="selectDonante" id="selectDonante" class="form-control" class="btn-block">
                                                <option value="">Elija la opción</option>
                                                <option value="Paciente">Paciente</option>
                                                <option value="Datos">Datos</option>
                                                <option value="Donante">Donante</option>
                                              </select>
                                        </div>
                                            <div class="input-group mt-2">
                                                <span class="input-group-text" >ID Interno</span>
                                                <input type="text" class="form-control" id="idInternoDonante">
                                            </div>
                                                <div class="input-group mt-2">
                                                    <span class="input-group-text" >Modelo</span>
                                                    <input type="text" class="form-control" id="modeloDonante">
                                                </div>
                                            <div class="input-group mt-2">
                                                <span class="input-group-text" >Serie</span>
                                                <input type="text" class="form-control" id="serieDonante">
                                            </div>
                                            <div class="input-group mt-2">
                                                <span class="input-group-text" >Tamaño</span>
                                                <input type="text" class="form-control" id="tamañoDonante">
                                            </div>
                                            <div class="input-group mt-2">
                                                <span class="input-group-text" >PCB ID</span>
                                                <input type="text" class="form-control" id="pcbDonante">
                                            </div>
                                                <br>
                                                <div class="float-right">
                                                    <button type="button" class="btn btn-danger" id="botones" data-dismiss="modal" style=" margin-left: auto;">Cancelar</button>
                                                    <button type="button" class="btn btn-primary" id="btnGuardarNuevoDispositivo" name="btnGuardarNuevoDispositivo"><a href=""></a>Guardar</button>
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