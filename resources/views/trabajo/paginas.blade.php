@if (count($trabajo))
    @foreach ($trabajo as $item)          
        {{-- <p class="p-2 border-bottom">{{ '<b>'.$item->id.'<b>' .':  '. $item->factor_de_forma .' - '. $item->manufactura}}</p> --}}
            <p class="p-2 border-bottom"><strong>{{$item->id}}:</strong>  {{$item->priority}}</p>
        
    @endforeach             
@endif