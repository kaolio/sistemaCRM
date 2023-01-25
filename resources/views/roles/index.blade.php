@extends('adminlte::page')
@section('content')

<style>
    
</style>
    <br>
    <div class="row justify-content-center">
         <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center  " style ="font-family:serif,new time roman;"> <b> LISTA DE ROLES </b> </h4>
                </div>
                <div class="card-body">
                            <!-- Tabla -->
                    <div class="table-responsive">
                            <table class="table table-light">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ROL</th>
                                        <th scope="col">ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $rol)
                                    <tr>
                                        <th scope="row">
                                            {{  $rol->name }}
                                        </th>
                                        <td>
                                            @if ($rol->name != 'ADMINISTRADOR')
                                                @can('editar rol')
                                                    <a class="btn btn-sm btn-primary float-left"  href="{{ url('roles/editar/'.$rol->id) }}">Editar</a> 
                                                @endcan
                                                <a class="float-left">&nbsp;&nbsp;</a>
                                                @can('borrar rol')
                                                    <form action="{{ url('/roles/'.$rol->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                        
                                                        <button type="button" class="btn btn-sm btn-danger " onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                    Eliminar
                                                        </button>
                                                    </form>
                                                @endcan
                                            @else
                                                <h5><span class="badge badge-dark">Acceso Total</span></h5>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                
                            </div>
                    </div>
                    <!-- -->
                </div>
                
                
            </div> 
        </div> 
    </div>
    
    

@endsection