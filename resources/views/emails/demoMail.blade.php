<!DOCTYPE html>

    <style>
        .nuevo {
            display: inline-block;
        }
    </style>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>
  
    <p>A continuacion tiene el detalle de los servicios que se llevaran a cabo durante el tiempo establecido</p>
    
            <table  align="center" class="table table-light" id="tablaServicio">
                <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                    <tr>
                    <th class="text-center" style="width: 20%">Detalle</th>
                    <th class="text-center" style="width: 20%">Descripcion</th>
                    <th class="text-center" style="width: 20%" colspan="2">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($datos as $datos)
                        <tr>
                            <td align="center">{{$datos->detalle}}</td>
                            <td align="center">{{$datos->descripcion}}</td>  
                            <td align="center">{{$datos->precio}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td align="center" style='background: rgb(2, 117, 216); color: white' colspan='2'> TOTAL </td>
                            <td align="center">{{$total}}</td>
                        </tr>
                </tbody>
            </table>
     

    <p>Esta usted de acuerdo con el costo a los servicios que se presentan en la tabla</p>
    <p>Si tiene alguna consulta comuniquese con nosotros al ############</p>

    {{-- <div class="row" align="center">
        <div class="col-md-9 col-md-offset-9 col-xs-12" >
          <div class="btn-group" role="group">
             <button class="btn btn-default" style="background: none; border: none" type="button">
                <a href="#" class="nuevo" style="text-decoration:none;color:#ffffff;max-width:100px;background-color:#0f88b8;border-radius:24px;display:block" target="_blank">
                <table style="border-collapse:collapse;padding:0;width:100%;max-width:100px;min-height:48px">
                    <tbody style="border:none;padding:0;margin:0">
                        <tr style="border:none;margin:0px;padding:0px">
                            <td style="border:none;padding:0;margin:0;width:24px"></td>
                            <td style="border:none;padding:0;margin:0;font-family:'helvetica','arial',sans-serif;font-weight:700;line-height:1.1em;letter-spacing:0.15px;font-size:14px;text-decoration:none;text-align:center;text-transform:uppercase;color:#ffffff">ACEPTAR</td>
                            <td style="border:none;padding:0;margin:0;width:24px"></td>
                        </tr>
                    </tbody>
                </table>
            </a>
             </button>
             <button class="btn btn-default" style="background: none; border: none" type="button">
              <a href="#" class="nuevo" style="text-decoration:none;color:#ffffff;max-width:120px;background-color:#6d6767;border-radius:24px;display:block" target="_blank" >
                    <table style="border-collapse:collapse;padding:0;width:100%;max-width:120px;min-height:48px">
                        <tbody style="border:none;padding:0;margin:0">
                            <tr style="border:none;margin:0px;padding:0px">
                                <td style="border:none;padding:0;margin:0;width:24px"></td>
                                <td style="border:none;padding:0;margin:0;font-family:'helvetica','arial',sans-serif;font-weight:700;line-height:1.1em;letter-spacing:0.15px;font-size:14px;text-decoration:none;text-align:center;text-transform:uppercase;color:#ffffff">RECHAZAR</td>
                                <td style="border:none;padding:0;margin:0;width:24px"></td>
                            </tr>
                        </tbody>
                    </table>
                </a>  
             </button>
          </div>
        </div>
     </div> --}}
        


    </body>
</html>