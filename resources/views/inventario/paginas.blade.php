@if (count($inventario))
    @foreach ($inventario as $item)          
        {{-- <p class="p-2 border-bottom">{{ '<b>'.$item->id.'<b>' .':  '. $item->factor_de_forma .' - '. $item->manufactura}}</p> --}}
            <p class="p-2 border-bottom"><strong>{{$item->id}}:</strong>  {{$item->manufactura}}  - {{$item->factor_de_forma}}</p>
        
    @endforeach             
@endif