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
        <h5 class="modal-title w-100 text-center" id="exampleModalLabelMover">Agregar Nuevo Dispositivo</h5>
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
                                        <div class="input-group-text" id="btnGroupAddon" style=" background:rgb(29, 145, 195); color: aliceblue">
                                            <div class="custom-control custom-checkbox">
                                                <input class="form-check-input" type="radio" name="radioNoLabel1" id="radioNoLabel1" value="" aria-label="...">
                                            </div>
                                        </div>
                                        <span class="input-group-text form-control" style=" background:rgb(29, 145, 195); color: aliceblue">Disco a Volcar</span>
                                    </div> 
                                </a>
                            </li>
                            <li class="nav-item col-md-6">
                                <a class="nav-link" href="#donar" data-toggle="tab">
                                    <div class=" input-group">
                                        <div class="input-group-text" id="btnGroupAddon" style=" background:rgb(29, 145, 195); color: aliceblue">
                                            <div class="custom-control custom-checkbox">
                                                <input class="form-check-input" type="radio" name="radioNoLabel2" id="radioNoLabel2" value="" aria-label="...">
                                            </div>
                                        </div>
                                        <span class="input-group-text form-control" style=" background:rgb(29, 145, 195); color: aliceblue">Disco Donante</span>
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
                                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">ID Interno</span>
                                            <input type="text" class="form-control" id="idInternoClon">
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Modelo</span>
                                            <input type="text" class="form-control" id="modeloClon">
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Serie</span>
                                            <input type="text" class="form-control" id="serieClon">
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Tamaño</span>
                                            <input type="text" class="form-control" id="tamañoClon">
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">PCB ID</span>
                                            <input type="text" class="form-control" id="pcbClon">
                                        </div>
                                        <br>
                                        <div class="card">
                                            <div class="card-body">
                                                 <div class="table">
                                                    <table id="tablaClones" class="table table-responsive" >
                                                        <thead  id="cabeceraClones" class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
                                                            <tr>

                                                            </tr>
                                                        </thead>
                                                        <tbody id="buscadorClones" class="table-bordered" >
                                                            <tr>

                                                            </tr>

                                                            </tbody>
                                                    </table>
                                                </div> 
                                            </div>
                                        </div>
                                            <div class="float-right">
                                                <button type="button" class="btn btn-danger" id="botones" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary" id="btnBuscarClon" name="btnBuscarClon"><a href=""></a>Buscar</button>
                                            </div>
                                    </div>
                                </div>
                                <!--/Clonar-->

                                <!--Donar-->
                                <div class="tab-pane" id="donar">
                                    <div class="donar">
                                        <div class="input-group mt-2">
                                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Donar para </span>
                                            <select name="selectDonante" id="selectDonante" class="form-controlrgb(29, 145, 195)" class="btn-block">
                                                <option value="">Elija la opción</option>
                                                <option value="Dispositivo a Recuperar">Dispositivo a Recuperar</option>
                                                <option value="Datos">Datos</option>
                                                <option value="Donante">Donante</option>
                                              </select>
                                        </div>
                                            <div class="input-group mt-2">
                                                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">ID Interno</span>
                                                <input type="text" class="form-control" id="idInternoDonante">
                                            </div>
                                                <div class="input-group mt-2">
                                                    <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Modelo</span>
                                                    <input type="text" class="form-control" id="modeloDonante">
                                                </div>
                                            <div class="input-group mt-2">
                                                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Serie</span>
                                                <input type="text" class="form-control" id="serieDonante">
                                            </div>
                                            <div class="input-group mt-2">
                                                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Tamaño</span>
                                                <input type="text" class="form-control" id="tamañoDonante">
                                            </div>
                                            <div class="input-group mt-2">
                                                <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">PCB ID</span>
                                                <input type="text" class="form-control" id="pcbDonante">
                                            </div>

                                                <br>
                                                <div class="card">
                                                    <div class="card-body">
                                                         <div class="table">
                                                            <table class="table table-responsive">
                                                                <thead  id="cabeceraDonantes" class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
                                                                    <tr>

                                                                    </tr>
                                                                </thead>
                                                                <tbody id="buscadorDonantes" class="table-bordered" >
                                                                    <tr>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="float-right">
                                                    <button type="button" class="btn btn-danger" id="botones" data-dismiss="modal" style=" margin-left: auto;">Cancelar</button>
                                                    <button type="button" class="btn btn-primary" id="btnBuscarDonante" name="btnBuscarDonante"><a href=""></a>Buscar</button>
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