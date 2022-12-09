{{-- @include('facturacion.create') --}}

<style>
    .btn1{
        border-radius: 5px;
        box-shadow: 2px 2px 2px rgb(95, 93, 93);
        transform: translateY(0px);
    }
    .btn1:active {
        transform: translateY(6px);
    }
</style>

<div class="card">
  <div class="card-body">
            <h5>Facturación</h5>
        <div class="form">
            <div class="form-row mt-2" >
                <div class="col-md-2">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Servicio</span>
                        </div>
                          <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                 </div>
                <div class="col-md-2">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Precio</span>
                        </div>
                            <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Partes</span>
                        </div>
                        <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                  </div>
                  <div class="col-md-2">
                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">IVA(%)</span>
                          </div>
                            <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                  </div>
                  <div class="col-md-2">
                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Descuento(%)</span>
                          </div>
                            <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                  </div>
                  <div class="col-md-2">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Total</span>
                        </div>
                          <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                  </div>
             </div>

            <div class="form-row mt-2">
                <div class="col-md-2">
                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">SubTotal</span>
                          </div>
                            <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                  </div>
                  <div class="col-md-2">
                      <div class="input-group mb-1">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Total con IVA</span>
                          </div>
                          <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                  </div>
            </div>
          <div class="row justify-content-center">
            <button class="btn btn-success" style="width: 40%;" id="guardarFacturacion" name="guardarFacturacion" >Guardar</button>
        </div>
        </div>
  </div>
</div>

<div class="card">
    <div class="card-body">
      <h5>Facturas</h5>
        <table class="table table-responsive">
            <thead  class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
                <tr>
                    <th class="col-md-1 p-1">N° </th>
                    <th class="col-md-2 p-1">Estado</th>
                    <th class="col-md-2 p-1">Total</th>
                    <th class="col-md-3 p-1">Creado por</th>
                    <th class="col-md-2 p-1">Creado en Fecha</th>
                </tr>
              </thead>
              <tbody class="table-bordered" id="facturas">
                  <tr>
                       
                  <tr>
              </tbody>
        </table>
    </div>
</div>
    
<div class="card">
    <div class="card-body">
      <h5>Facturacion</h5>
        <table class="table table-responsive">
            <thead  class="table-bordered" style="background:rgb(2, 117, 216); color: aliceblue">
                <tr>
                    <th class="col-md-1 p-1">N° </th>
                    <th class="col-md-2 p-1">Estado</th>
                    <th class="col-md-2 p-1">Total</th>
                    <th class="col-md-2 p-1">Creado por</th>
                    <th class="col-md-2 p-1">Creado en Fecha</th>
                </tr>
              </thead>
              <tbody class="table-bordered" id="facturaciones">
                  <tr>
                       
                  <tr>
              </tbody>
        </table>
    </div>
</div>
    