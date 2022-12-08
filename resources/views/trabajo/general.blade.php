@extends('adminlte::page')
@section('content')

    <style>
        .clockdate-wrapper {
            background-color: #007BFF;
            max-width:350px;
            width:100%;
            text-align:center;
            
        }
        #clock{
            background-color:#007BFF;
            font-family: sans-serif;
            font-size:45px;
            text-shadow:0px 0px 1px #fff;
            color:#fff;
        }
        #clock span {
            color:#fff;
            text-shadow:0px 0px 1px #007BFF;
            font-size:25px;
            position:relative;
            top:-22px;
            left:-10px;
        }
        #date {
            letter-spacing:10px;
            font-size:14px;
            font-family:arial,sans-serif;
            color:#fff;
        }

        .urgente {
            text-align: center;
            width: 10%;
            height: 120px;
            color: black;
            background: #deb9b9;
            position: relative;
            top: -16px;
        }
        .recibido {
            text-align: center;
            width: 10%;
            height: 120px;
            color: black;
            background: #b4d5f3;
            position: relative;
            top: -16px;
        }
        .proceso {
            text-align: center;
            width: 10%;
            height: 120px;
            color: black;
            background: #83b0db;
            position: relative;
            top: -16px;
        }
        .partes {
            text-align: center;
            width: 10%;
            height: 120px;
            color: black;
            background: #b2c2d2;
            position: relative;
            top: -16px;
        }
        .terminado {
            text-align: center;
            width: 10%;
            height: 120px;
            color: black;
            background: #b4f2c6;
            position: relative;
            top: -16px;
        }
        .pendiente {
            text-align: center;
            width: 10%;
            height: 120px;
            color: black;
            background: #f2f1b5;
            position: relative;
            top: -16px;
        }

        .casilla{
            width: 10%;
            height: 95px; 
        }

        .pre{
            top: 14px;
            left: 5px;
        }

        div.scroll {
        margin: 4px, 4px;
        padding: 4px;
        width: auto;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
        height: 130px;
    }

    div.scroll::-webkit-scrollbar {
        width: 0.7em;
        background: white;
    }
  
    </style>
 
<br>
    <div class="card">
        <div class="card-header" style="background: #007BFF" >
            <body onload="startTime()">
                <div id="clockdate" class="float-right">
                    <div class="clockdate-wrapper">
                        <div id="clock"></div>
                        <div id="date"></div>
                    </div>
                    </div>
            </body>
        </div>

            <div class="card-body">
                <div class="scroll" style="background: #e6cacb">
                    <div class="urgente"  style="display: inline-block"><b><br><br>Urgente</b></div>
                    @foreach ($urgente as $urgente)
                        <a href="/trabajos/detalle/{{$urgente->id}}" >
                            &nbsp;
                            <div class="card pre" style="display: inline-block;background: #deb9b9;">
                                <div class="card-body casilla" >
                                    <font  face="Comic Sans MS,Arial,Verdana">
                                    <h4 class="card-title" style="color: black;">#{{$urgente->id}}</h4>
                                    <p class="card-text" style="color: black">{{$urgente->nombreCliente}} <br> <small style="color: black">{{$urgente->created_at}}</small></p>
                                    </font>
                                </div>
                            </div> 
                            &nbsp;
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="card-body">
                <div class="scroll" style="background: #c7dff6">
                    <div class="recibido"  style="display: inline-block"><b><br><br>Recibido</b></div>
                    @foreach ($recibido as $recibido)
                        <a href="/trabajos/detalle/{{$recibido->id}}" >
                            &nbsp;
                            <div class="card pre" style="display: inline-block;background: #c7dff6;">
                                <div class="card-body casilla" >
                                    <font  face="Comic Sans MS,Arial,Verdana">
                                    <h4 class="card-title" style="color: black;">#{{$recibido->id}}</h4>
                                    <p class="card-text" style="color: black">{{$recibido->nombreCliente}} <br> <small style="color: black">{{$recibido->created_at}}</small></p>
                                    </font>
                                </div>
                            </div> 
                            &nbsp;
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="card-body">
                <div class="scroll" style="background: #a2c4e4">
                    <div class="proceso"  style="display: inline-block"><b><br><br>En Proceso</b></div>
                    @foreach ($proceso as $proceso)
                        <a href="/trabajos/detalle/{{$proceso->id}}" >
                            &nbsp;
                            <div class="card pre" style="display: inline-block;background: #a2c4e4;">
                                <div class="card-body casilla" >
                                    <font  face="Comic Sans MS,Arial,Verdana">
                                    <h4 class="card-title" style="color: black;">#{{$proceso->id}}</h4>
                                    <p class="card-text" style="color: black">{{$proceso->nombreCliente}} <br> <small style="color: black">{{$proceso->created_at}}</small></p>
                                    </font>
                                </div>
                            </div> 
                            &nbsp;
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="card-body">
                <div class="scroll" style="background: #c5d1de">
                    <div class="partes"  style="display: inline-block"><b><br>Esperando <p>Partes</p></b></div>
                    @foreach ($partes as $partes)
                        <a href="/trabajos/detalle/{{$partes->id}}" >
                            &nbsp;
                            <div class="card pre" style="display: inline-block;background: #c5d1de;">
                                <div class="card-body casilla" >
                                    <font  face="Comic Sans MS,Arial,Verdana">
                                    <h4 class="card-title" style="color: black;">#{{$partes->id}}</h4>
                                    <p class="card-text" style="color: black">{{$partes->nombreCliente}} <br> <small style="color: black">{{$partes->created_at}}</small></p>
                                    </font>
                                </div>
                            </div> 
                            &nbsp;
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="card-body">
                <div class="scroll" style="background: #c7f5d5">
                    <div class="terminado"  style="display: inline-block"><b><br>Terminado <p>con Exito</p></b></div>
                    @foreach ($terminado as $terminado)
                        <a href="/trabajos/detalle/{{$terminado->id}}" >
                            &nbsp;
                            <div class="card pre" style="display: inline-block;background: #c7f5d5;">
                                <div class="card-body casilla" >
                                    <font  face="Comic Sans MS,Arial,Verdana">
                                    <h4 class="card-title" style="color: black;">#{{$terminado->id}}</h4>
                                    <p class="card-text" style="color: black">{{$terminado->nombreCliente}} <br> <small style="color: black">{{$terminado->created_at}}</small></p>
                                    </font>
                                </div>
                            </div> 
                            &nbsp;
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="card-body">
                <div class="scroll" style="background: #f5f4c8">
                    <div class="pendiente"  style="display: inline-block"><b><br>Pago <p>Pendiente</p></b></div>
                    @foreach ($pendiente as $pendiente)
                        <a href="/trabajos/detalle/{{$pendiente->id}}" >
                            &nbsp;
                            <div class="card pre" style="display: inline-block;background: #f5f4c8;">
                                <div class="card-body casilla" >
                                    <font  face="Comic Sans MS,Arial,Verdana">
                                    <h4 class="card-title" style="color: black;">#{{$pendiente->id}}</h4>
                                    <p class="card-text" style="color: black">{{$pendiente->nombreCliente}} <br> <small style="color: black">{{$pendiente->created_at}}</small></p>
                                    </font>
                                </div>
                            </div> 
                            &nbsp;
                        </a>
                    @endforeach
                </div>
            </div>

    </div>

<script>
    function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Ovtubre', 'Noviembre', 'Diciembre'];
    var days = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTime() }, 500);
    }
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
</script>

@endsection