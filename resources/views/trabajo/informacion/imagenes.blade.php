@foreach ($imagenes as $imagenes)
    
    <div class="card" style="width: 35%;height: 10%;">
        <img src="{{ asset('storage/caso/'.$imagenes->nombre) }}">
    </div>
    
@endforeach   