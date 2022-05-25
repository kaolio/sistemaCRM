@extends('adminlte::page')
@section('content')
<style>
    
</style>
    </BR>  
    <div class="row justify-content-center">
            <div class="col-9">
            <div class="card">
        <div class="card-header">
            <h4 class="text-center  " style ="font-family:serif,new time roman;"> <b> LISTA DE USUARIOS </b> </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                    <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th style="display: none">ID</th>
                        <th>NOMBRE</th>
                        <th>E-MAIL</th>
                        <th>ROL</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td style="display: none">{{$usuario->id}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>
                            @if (!@empty($usuario->getRoleNames()))
                                @foreach ($usuario->getRoleNames() as $rolName)
                                    <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @can('editar-usuario')
                            <a class="btn btn-sm btn-primary float-left"  href="{{ url('usuario/editar/'.$usuario->id) }}">Editar</a>
                            @endcan
                            <a class="float-left">&nbsp;&nbsp;</a>
                            @if ($usuario->name != 'Administrador')
                            @can('borrar-usuario')
                                <form action="{{ url('/usuario/'.$usuario->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                Eliminar
                                    </button>
                                </form> 
                            @endcan
                            @endif
                            
                           
 
                        </td>
                    </tr>  
                    @endforeach
                    
                </tbody>
            </table>
            </div>
            
            <div class="pagination justify-content-end">
                
            </div>

        </div>
       
    </div>
    </div>
    </div>
    
    

@endsection