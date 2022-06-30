<!-- Button trigger modal -->
<button type="button" id="botones" class="btn btn-success" data-toggle="modal" data-target="#exampleModalMover">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
    </svg>
    Agregar dispositivo
</button>
<!-- Modal -->
<div class="modal fade-md" id="exampleModalMover" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelMover" aria-hidden="true">
    <div class="modal-dialog " role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelMover">Agregar Nuevo Dispositivo</h5>
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
                                <a class="nav-link" href="#clonar" data-toggle="tab">
                                    <div class="input-group">
                                        <div class="input-group-text" id="btnGroupAddon">
                                            <div class="custom-control custom-checkbox">
                                                <input class="form-check-input" type="radio" name="radioNoLabel1" id="radioNoLabel1" value="" aria-label="...">
                                            </div>
                                        </div>
                                        <span class="input-group-text form-control">Clonar</span>
                                    </div> 
                                </a>
                            </li>
                            <li class="nav-item col-md-6">
                                <a class="nav-link" href="#donar" data-toggle="tab">
                                    <div class=" input-group">
                                        <div class="input-group-text" id="btnGroupAddon">
                                            <div class="custom-control custom-checkbox">
                                                <input class="form-check-input" type="radio" name="radioNoLabel2" id="radioNoLabel2" value="" aria-label="...">
                                            </div>
                                        </div>
                                        <span class="input-group-text form-control">Donar</span>
                                    </div>
                                </a>
                            </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <!--Clonar-->
                                <div class="active tab-pane" id="clonar">
                                    <div class="clonar">
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">ID Interno</span>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">Modelo</span>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">Serie</span>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">Tamaño</span>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">PCB ID</span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="botones" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary" id="botones" name=""><a href=""></a>Buscar</button>
                                    </div>
                                </div>
                                <!--/Clonar-->

                                <!--Donar-->
                                <div class="tab-pane" id="donar">
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
                                                <div class="card">
                                                    <div class="card-body">
                                                         <div class="table">
                                                            <table class="table table-responsive">
                                                                <thead  id="cabeceraDonantes" class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
                                                                    <tr>
                                                                        {{-- titulos de la tabla--}}
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="buscadorDonantes" class="table-bordered" >
                                                                    <tr>
                                                                        {{-- datos de la tabla inventarios --}}
                                                                    </tr>
                                                                    <button class='btn btn-success' type="button" id="btnAgregarDonante" name="btnAgregarDonante">
                                                                        <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' fill='currentColor' class='bi bi-plus-circle' viewBox='0 0 16 16'>
                                                                            <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                                                            <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>
                                                                        </svg>
                                                                </button>
                                                                {{-- '<button type="button" class="btn btn-primary" id="btnBuscarDonante" name="btnBuscarDonante">XXXXXXXXX</button>' --}}
                                                                </tbody>
                                                            </table>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="float-right">
                                                    <button type="button" class="btn btn-secondary" id="botones" data-dismiss="modal" style=" margin-left: auto;">Cancelar</button>
                                                    <button type="button" class="btn btn-primary" id="btnBuscarDonante" name="btnBuscarDonante"><a href=""></a>Buscar</button>
                                                    {{-- <button id="btnAgregarDonante">agregar donante</button> --}}
                                                </div>
                                    </div>{{-- @endif --}}
                                </div> <!--/Donar-->
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
