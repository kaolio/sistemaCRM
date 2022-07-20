<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<br><br><br><br>
<body style="background: #e9ecef">
</body>
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3><b>ORDEN DE TRABAJO #{{$datos->id}}</b></h3>
            <a href="/login/cliente" class="btn btn-danger float-right" type="button">Cerrar Sesion</a>
        </div>
        <div class="card-body">
            &nbsp;<b>Cliente: </b>{{$datos->nombreCliente}} <br>
            &nbsp;<b>Pais:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>{{$datos->pais}} <br>
            &nbsp;<b>Ciudad: </b>{{$datos->nombreCiudad}}
            <br><br>
            <div class="row justify-content-center">
                <div class="card col-8">
                                <div class="card-header text-center">
                                    <b>Estado</b>
                                </div>
                                <div class="card-body text-center">
                                    {{$datos->estado}}
                                </div>
                            </div>
                </div>
            
        </div>
    </div>
</div>
