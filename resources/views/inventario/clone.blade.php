@extends('adminlte::page')

@section('content_header')

JOB DEVICES
<br><br>

<script>
  function text(x){
    if (x==0) document.getElementById("donante").style.display= "block";
    else document.getElementById("donante").style.display = "none"; 
    return;
  }
</script>


<!-- Modal -->
<div class="modal fade" id="move" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mover dispositivos seleccionados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" style="display: flex;">
        <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Nueva localizacion</span>
              <input type="text" id="nueva_localizacion" name="nueva_localizacion" class="form-control"> 
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" style="display: flex;">
        <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Nueva localizacion temporal</span>
              <input type="text" id="localizacion_temporal" name="localizacion_temporal" class="form-control"> 
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Mover</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal mover añadir -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo dispositivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form>
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group" style="display: flex;">
                    
                    <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Clonado</span>
                    <input type="radio" name="selected" class="form-control" id="clonado"  onclick="text(1)"  >
                
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group" style="display: flex;">
              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Donado</span>
              <input type="radio" name="selected" class="form-control" id="clonado" checked onclick="text(0)">
               </div>
              </div>
            </div>  
            <div class="row" id="donante">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="display: flex;">
            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Donante para</span>
            <select class="form-control" class="btn-block" name="donante">
              <option value="Carlos">Carlos</option>
            </select> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="display: flex;">
            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Internal ID</span>
                  <input type="text" id="internalId" name="internalId" class="form-control"> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="display: flex;">
            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Modelo</span>
                  <input type="text" id="ModeloM" name="ModeloM" class="form-control"> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="display: flex;">
            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Serial</span>
                  <input type="text" id="SerialM" name="SerialM" class="form-control"> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="display: flex;">
            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Tamaño</span>
                  <input type="text" id="TamañoM" name="TamañoM" class="form-control"> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" style="display: flex;">
            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">PCB ID</span>
                  <input type="text" id="pcb" name="pcb" class="form-control"> 
                </div>
              </div>
            </div>    
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" name="buscar">Buscar</button>
      </div>
    </div>
  </div>
</div>



<div class="d-flex">
  <div class="p-2">
    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#move" href="" role="button">Mover dispositivo </button>
      <a class="btn btn-sm btn-danger" href="" role="button">Remover dispositivos seleccionados </a>

      <button class="btn btn-sm btn-success" href="" role="button">Añadir nuevo dispositivo del cliente </button>

      <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#add" href="" role="button">Añadir dispositivo </button>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <h4><strong>Dispositivo de pacientes</strong></h4>
    <div class="tabla-general">
      <table class="table table-striped table-hover table-responsive-lg">
          <thead class="table-primary table-striped table-bordered text-white" >
          <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
              <tr>
                  <th class="column1 text-center"></th>
                  <th class="column2 text-center">Tipo</th>
                  <th class="column3 text-center">Manufactura</th>
                  <th class="column4 text-center ">Modelo</th>
                  <th class="column5 text-center ">Serial</th>
                  <th class="column5 text-center ">Localizacion</th>
                  <th class="column5 text-center ">Diagnostico</th>
                  <th class="column5 text-center ">Nota</th>
                  <th class="column5 text-center ">Acciones</th>
              </tr>
          </thead>
          <tbody class="table-bordered">
            <tr>
              <th scope="row"></th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="text-center" style="padding: 1px;">
                <a href="">
                  <button class="btn btn-light-active btn-sm"  >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="20">
                      <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z">
                      </path>
                    </svg>
                  </button>
                </a>
              </tbody>
          </table>
    </div>
  </div>
</div>


<div class="card" >
  <div class="card-body">
    <h4><strong>Trabajos Clonados</strong></h4>
    <div class="tabla-general">
      <table class="table table-striped table-hover table-responsive-lg">
          <thead class="table-primary table-striped table-bordered text-white" >
          <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
              <tr>
                  <th class="column1 text-center"></th>
                  <th class="column2 text-center">ID</th>
                  <th class="column2 text-center">Tipo</th>
                  <th class="column3 text-center ">Manufactura</th>
                  <th class="column4 text-center ">Modelo</th>
                  <th class="column5 text-center ">Serial</th>
                  <th class="column5 text-center ">Localizacion</th>
                  <th class="column5 text-center ">Diagnostico</th>
                  <th class="column5 text-center ">Nota</th>
                  <th class="column5 text-center ">Acciones</th>
              </tr>
          </thead>
          <tbody class="table-bordered">
            <tr>
              <th scope="row"></th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="text-center" style="padding: 1px;">
                <a href="">
                  <button class="btn btn-light-active btn-sm"  >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="20">
                      <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z">
                      </path>
                    </svg>
                  </button>
                </a>
              </tbody>
            </table>
  </div>
</div>
</div>

<div class="card">
  <div class="card-body">
    <h4><strong>Trabajos Donados</strong></h4>
    <div class="tabla-general">
      <table class="table table-striped table-hover table-responsive-lg">
          <thead class="table-primary table-striped table-bordered text-white" >
          <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
              <tr>
                  <th class="column1 text-center"></th>
                  <th class="column2 text-center">ID</th>
                  <th class="column2 text-center">Tipo</th>
                  <th class="column3 text-center ">Manufactura</th>
                  <th class="column4 text-center ">Modelo</th>
                  <th class="column5 text-center ">Serial</th>
                  <th class="column5 text-center ">Localizacion</th>
                  <th class="column5 text-center ">Diagnostico</th>
                  <th class="column5 text-center ">Nota</th>
                  <th class="column5 text-center ">Acciones</th>
              </tr>
          </thead>
          <tbody class="table-bordered">
            <tr>
              <th scope="row"></th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="text-center" style="padding: 1px;">
                <a href="">
                  <button class="btn btn-light-active btn-sm"  >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="20">
                      <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z">
                      </path>
                    </svg>
                  </button>
                </a>
              </tbody>
            </table>
  </div>
</div>
</div>

<div class="card">
  <div class="card-body">
    <h4><strong>Dispositivos de otros clientes</strong></h4>
    <div class="tabla-general">
      <table class="table table-striped table-hover table-responsive-lg">
          <thead class="table-primary table-striped table-bordered text-white" >
          <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
              <tr>
                  <th class="column1 text-center"></th>
                  <th class="column2 text-center">ID</th>
                  <th class="column2 text-center">Tipo</th>
                  <th class="column3 text-center">Manufactura</th>
                  <th class="column4 text-center">Modelo</th>
                  <th class="column5 text-center">Serial</th>
                  <th class="column5 text-center">Localizacion</th>
                  <th class="column5 text-center">Diagnostico</th>
                  <th class="column5 text-center">Nota</th>
                  <th class="column5 text-center">Acciones</th>
              </tr>
          </thead>
          <tbody class="table-bordered">
            <tr>
              <th scope="row"></th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="text-center" style="padding: 1px;">
                <a href="">
                  <button class="btn btn-light-active btn-sm"  >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="20">
                      <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z">
                      </path>
                    </svg>
                  </button>
                </a>
              </tbody>
            </table>
  </div>
</div>
</div>

@endsection