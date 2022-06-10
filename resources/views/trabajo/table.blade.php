
  <div class="tabla-general" >
    <table class="table table-striped table-hover table-responsive" id="Table">
      <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
        <tr>
          <th>#</th>
          <th class="text-center">Orden de Trabajo</th>
          <th class="text-center">Prioridad</th>
          <th class="text-center">Cliente</th>
          <th class="text-center">Estado</th>
          <th class="text-center">Informacion</th>
          <th class="text-center">Ultima Nota</th>
          <th class="text-center">Asignado</th>
          <th class="text-center">Creado por</th>
          <th class="text-center">Fecha</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody class="table-bordered" id="myTable">
          
        @foreach ($trabajo as $trabajos)
          <tr>
            <td>check</td>
            <td class="text-center">{{$trabajos->id}}</td>
            <td class="text-center">{{$trabajos->prioridad}}</td>
            <td>{{$trabajos->nombreCliente}}</td>
            <td>{{$trabajos->estado}}</td>
            <td>{{$trabajos->informacion}}</td>
            <td>{{$trabajos->datosImportantes}}</td>
            <td>{{$trabajos->asignado}}</td>
            <td>{{$trabajos->creado}}</td>
            <td>{{$trabajos->created_at}}</td>
            <td class="text-center">
    
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal{{$trabajos->id}}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                  </svg>
                </button>
                <div class="modal fade" id="exampleModal{{$trabajos->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar trabajo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       ¿Realmente Desea Borrar el trabajo?
                      </div>
                      <form action="{{url('/trabajo/'.$trabajos->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
                                       
                        <button class="btn btn-primary" style="padding-left: 5px">
                          Aceptar
                        </button>
                        
                      </div>
                    </form> 
                    </div>
                  </div>
                </div>
              
            </td>  
          </tr>
          @endforeach 
      </tbody> 
    </table>
    </div>
