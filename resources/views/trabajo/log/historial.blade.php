@foreach ($historial as $indice => $item)
                    <tr>
                        <td class="text-center">{{$item->created_at}}</td>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <td class="text-center">{{$item->usuario}}</td>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <td class="text-center">{{$item->informacion}}</td>
                        
                    <tr><br>
                @endforeach  