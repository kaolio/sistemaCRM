<div class='container-fluid'>
  <div class="card">
      <div class="card-body">
      <label class="card-title" style="height: 2rem;">Informacion del Cliente</label>
        <input type="text" name="infoC" class="btn-block" value="{{$trabajo->infoCliente}}" required onkeyup="validarInfo()">
        <br>
        <a href="{{ url('/cliente/nuevo')}}" class="card-link">Nuevo Cliente</a> 
      </div>
  </div>
  


 <!-- Nuevos Prioridad-->
  <div class="card" style="flex-direction:row;">
      <div class="card-body">
          <div class="input-group">
            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Prioridad</span>
              <select name="priority" class="form-control" class="btn-block"  required value="{{$trabajo->Prioridad}}">
                <option selected disabled value="">Escoga la prioridad</option>
                  @if ($trabajo->Prioridad == $trabajo_elegido->Prioridad)
                    <option value="{{$trabajo_elegido->Prioridad}}" selected>{{$trabajo_elegido->Prioridad}}</option>                      
                  @else
                    <option value="{{$trabajo_elegido->Prioridad}}">{{$trabajo_elegido->Prioridad}}</option>      
                  @endif
                <option value="Normal">Normal</option>
                <option value="Alta">Alta</option>
                <option value="Urgente">Urgente</option>
              </select>
              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Tiempo Estimado</span>
              <input type="text" name="tiempoEstimado" class="form-control" value="{{$trabajo->TiempoEstimado}}" required onkeyup="validarTiempo()"
                  placeholder="Ingrese un tiempo estimado" />

          </div>
      </div>
  </div>
   <!-- -->

      <h4>Dispositivos</h4>
      <td><button type="button" name="remove" id="" class="btn btn-danger btn_remove" style="border-radius: 50%;">X</button></td>
          <td class="btn-block"><button type="button" name="add" id="add" class="btn btn-primary" style="border-radius: 50%;"><i class="fa fa-plus"></i> </button></td>
          <br><br>


  <!-- Nuevo Tipo-->
    <div class="card" style="flex-direction:row;">
        <div class="card-body">
            <div class="input-group">
              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Tipo</span>
              <select name="Type" class="form-control" required value="{{$trabajo->Tipo}}">
                <option selected disabled value="">Escoga el tipo</option>
                  @if ($trabajo->Tipo == $trabajo_elegido->Tipo)
                    <option value="{{$trabajo_elegido->Tipo}}" selected>{{$trabajo_elegido->Tipo}}</option>                      
                  @else
                    <option value="{{$trabajo_elegido->Tipo}}">{{$trabajo_elegido->Tipo}}</option>      
                  @endif
                <option value="hdd">hdd</option>
                <option value="ssd">ssd</option>
                <option value="disk">disk</option>
              </select>
              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Rol</span>
              <select name="Role" class="form-control">
                <option value="Junior">Junior</option>
                <option value="SemiJunior">SemiJunior</option>
                <option value="Master">Master</option>
              </select>
              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Fabricante</span>
              <input type="text" name="Fabricante" class="form-control" value="{{$trabajo->Fabricante}}" required onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32)) "
                  placeholder="Ingrese el fabricante" />
                  <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Modelo</span>
              <input type="text" name="Modelo" class="form-control" value="{{$trabajo->Modelo}}" required onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32)) "
                  placeholder="Ingrese el modelo" />
                  <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Serial</span>
              <input type="text" name="Serial" class="form-control" value="{{$trabajo->Serial}}" required onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32)) "
                  placeholder="Ingrese el serial" />
                  <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Localizacion</span>
              <input type="text" name="Localizacion" class="form-control" value="{{$trabajo->Localizacion}}" required onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32)) "
                  placeholder="Ingrese la localizacion" />
            </div>
        </div>
    </div>
  <!-- -->

 
  <div class="card">
      <div class="card-body">
      <h5 class="card-title" style="height: 2rem;"><strong>información de mal funcionamiento del dispositivo</strong></h5>
        <input type="text" style="height: 10em" name="infoDispositivo" value="{{$trabajo->informacionDispositivo}}" class="btn-block" required="">
      
      </div>
  </div>
  <div class="card" >
      <div class="card-body">
      <h5 class="card-title" style="height: 2rem;"><strong>Dato importante</strong></h5>
        <input type="text" style="height: 10em" name="DatoImportante" value="{{$trabajo->datoImportante}}" class="btn-block" required="">
      
      </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-lg btn-dark">Actualizar</button>
    <a href="{{url('/trabajos')}}" class="btn btn-lg btn-secondary float-right">Regresar a trabajos</a>
  </div>
</div>