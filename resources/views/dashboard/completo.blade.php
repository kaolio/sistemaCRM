@extends('adminlte::page')
@section('content')

<br>
<div class="card">
    <div class="card-header" style="background: #24963e">
        <a href="/home" style="color: rgb(255, 255, 255)">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 576 512">
                <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4
                 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 
                 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 
                 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
            </svg>
        </a>
            
        
        <div align="center"  >
            <h3 class="text-white"><b>TRABAJOS TERMINADOS</b></h3>
        </div>
       
    </div>
    <div class="card-body" style="background: #24963fb9">
        
        <div class="card-body">
                @foreach ($completo as $completo)
                    
                        @can('editar orden de trabajo')
                            <a href="/trabajos/detalle/{{Crypt::encrypt($completo->id)}}" >
                        @endcan
                        &nbsp;
                        <div class="card" style="display: inline-block;background: #24963fb9;">
                            <div class="card-body" >
                                <font  face="Comic Sans MS,Arial,Verdana">
                                <h4 class="card-title" style="color: rgb(255, 255, 255);">#{{$completo->id}}</h4>
                                <p class="card-text" style="color: rgb(255, 255, 255)">{{$completo->nombreCliente}}</p>
                                </font>
                            </div>
                            <div class="card-footer text-center text-capitalize" style="color: rgb(255, 255, 255)">{{$completo->created_at}}</div>
                        </div> 
                        &nbsp;
                    </a>
                @endforeach
        </div>

    </div>
</div>
    

@endsection