
<div class="row">
    
    @foreach ($imagenes as $imagenes)
        <div class="card col-5" style="width: 35%;height: 10%;" >
            <img src="{{ Storage::url('caso/'.$imagenes->nombre) }}" align="left">
            
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    @endforeach 

</div>