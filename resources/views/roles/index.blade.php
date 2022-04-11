@extends('adminlte::page')
@section('content')
    <br>
    <div class="card">
        <div class="card-header">
            ROLES
        </div>
        <div class="card-body">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>ROL</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                        
                        <tr>
                            <td>{{ $rol->name }}</td>
                            <td>

                                @can('editar-rol')
                                    <a class="btn btn-primary" href="{{ url('roles/editar/'.$rol->id) }}">Editar</a> 
                                @endcan

                                @can('borrar-rol')
                                    <form action="{{ url('/roles/'.$rol->id) }}" method="post">
                                        @csrf
                                        @method('delete')
        
                                        <button type="button" class="btn btn-danger" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                    Eliminar
                                        </button>
                                    </form>
                                @endcan

                            </td>
                        </tr>

                    @endforeach
                    
                </tbody>
            </table>
            <div class="pagination justify-content-end">
                 
            </div>

        </div>
        <div class="card-footer">
            
        </div>
    </div>

@endsection