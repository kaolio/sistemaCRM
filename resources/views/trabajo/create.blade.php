@extends('adminlte::page')
@section('content')

<div class="card">
  <div class="card-header">
    
  </div>
  <div class="card-body">
    <body>
      <h2><strong>Orden de Trabajo</strong></h2>
        <form action="{{url('/trabajo/nuevo')}}" method="POST">
          @csrf
          <div class='container-fluid'>
                <div class="card">
                    <div class="card-body">
                    <label class="card-title" style="height: 2rem;">Informacion del Cliente</label>
                      <input type="text" name="infoC" class="btn-block" required="">
                      <br>
                      <a href="{{ url('/cliente/nuevo')}}" class="card-link">Nuevo Cliente</a> 
                    </div>
                </div>
                
                <div class="card" style="flex-direction:row;">
                    <div class="card-body">
                      <label class=""style="width: 16em;display: flex;align-items: center;">Prioridad
                      <select name="priority" class="form-control" class="btn-block">
                        <option value="0">Escoga la prioridad</option>
                        <option value="Normal">Normal</option>
                        <option value="Alta">Alta</option>
                        <option value="Urgente">Urgente</option>
                      </select>
                      </label>
                    </div>
                    <div class="card-body" >
                      <label style="display :flex;">Urgent case 
                          <input type="text" name="urgent1" style="width :8em;">
                      </label>
                    </div>
                    <div class="card-body">
                      <label style="display :flex;">Urgent case 
                          <input type="text" name="urgent2" style="width :8em;">
                      </label>
                    </div>
                    <div class="card-body">
                      <label style="display :flex;">RAID 
                          <input type="text" name="urgent3" style="width :8em;">
                      </label>
                    </div>
                </div>
  
  
                    <h4><strong>Dispositivos</strong></h4>
                    <td><button type="button" name="remove" id="" class="btn btn-danger btn_remove" style="border-radius: 50%;">X</button></td>
                        <td class="btn-block"><button type="button" name="add" id="add" class="btn btn-primary" style="border-radius: 50%;"><i class="fa fa-plus"></i> </button></td>
                        <br><br>
                <div class="card" style="flex-direction:row;justify-content: flex-start;">
                    
                    <div class="card-body"> 
                      <label class=""style="width: 10em;">Tipo
                      <select name="Type" class="form-control">
                        <option value="hdd">hdd</option>
                        <option value="ssd">ssd</option>
                        <option value="disk">disk</option>
                      </select>
                      </label>
                    </div>
                    <div class="card-body">
                      <label >Rol
                      <select name="Role" class="form-control">
                        <option value="Junior">Junior</option>
                        <option value="SemiJunior">SemiJunior</option>
                        <option value="Master">Master</option>
                      </select>
                      </label>
                    </div>
                    <div class="card-body" >
                      <label >Fabricante 
                          <input type="text" name="Fab" style="width :8em;">
                      </label>
                    </div>
                    <div class="card-body">
                      <label >Modelo 
                          <input type="text" name="Model" style="width :8em;">
                      </label>
                    </div>
                    <div class="card-body">
                      <label >Serial 
                          <input type="text" name="Serial" style="width :8em;">
                      </label>
                    </div>
                    <div class="card-body">
                      <label >Localizacion 
                          <input type="text" name="Location" style="width :8em;">
                      </label>
                    </div>
                </div>
  
               
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title" style="height: 2rem;"><strong>información de mal funcionamiento del dispositivo</strong></h5>
                      <input type="text" style="height: 10em"name="infoDevice" class="btn-block" required="">
                    
                    </div>
                </div>
                <div class="card" >
                    <div class="card-body">
                    <h5 class="card-title" style="height: 2rem;"><strong>Dato importante</strong></h5>
                      <input type="text" style="height: 10em" name="important" class="btn-block" required="">
                    
                    </div>
                </div>
                <div class="form-group">
                <a href="" class="btn btn-danger my-2 my-sm-0">Cancelar</a>
                <button class="btn btn-primary" type="submit" >Aceptar</button>
                </div>
            </div>
          </form>   
  </body>
  </div>
  <div class="card-footer">
    
  </div>
</div>



@endsection