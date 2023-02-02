<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orden de Trabajo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    hr {
        height: 1px;
        border-color: 858383;

      }
      body {
         /* el tamaño por defecto es 14px */
         font-size: 14px;
        }
        h2{
          font-family:Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol;
        }
      </style>
<body>
  <h2 align="center">REPORTE DE CLIENTES </h2>
    {{-- <img src="{{public_path('imagenes/logo.jpg')}}" class="text-align-left " width="200px "> --}}
    <div  style="position: absolute; top: 40 px;left: 400px; margin-botom:20px;">
            Sitio Web: &nbsp;&nbsp; www.irecovery.com <br/>
    </div>
    <br><br>
    <hr>
    <div style="position: absolute; left: 50px" >
        Direccion: &nbsp; Calle Antezana <br/>
        Telefono: &nbsp;&nbsp; 4446652 <br/>
        Skype: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Empres@ <br/>
        Sitio Web: &nbsp; www.empresa100.com <br/>
        E-mail: &nbsp; empresa@gmail.com <br/>
        
    </div>
    <div style="position: absolute; right: 50px" >
      NXXX xxxx XXXX <br>
      P.o.Box  4678 , XXxxXX <br>
      0719 260 602 <br>
      
  </div>
  <br><br><br><br><br><br>

          <table  width="100%" cellpadding="3" cellspacing="1" align="center"  border="groove">
           
            <tr style="text-align:center;background:rgb(2, 117, 216); color: aliceblue">
                <th class="text-center">Nombre</th>
                <th class="text-center">E-mail</th>
                <th class="text-center">Telefono</th>
                <th class="text-center">Direccion</th>
                <th class="text-center">CodigoPostal</th>
                <th class="text-center">Provincia</th>
                <th class="text-center">Pais</th>
                <th class="text-center">Referencia</th>
                <th class="text-center">Fecha</th>
            </tr>
            
            
              <!-- @foreach($datosTablas as $cliente) -->
            <tr>
                <td >{{$cliente->nombreCliente}}</td>
                <td class="text-center">{{$cliente->correo}}</td>
                <td class="text-center">{{$cliente->telefono}}</td>
                <td class="text-center">{{$cliente->calle}}</td>
                <td class="text-center">{{$cliente->codigoPostal}}</td>
                <td class="text-center">{{$cliente->provincia}}</td>
                <td class="text-center">{{$cliente->pais}}</td>
                <td class="text-center">{{$cliente->referencia}}</td>
                <td class="text-center">{{ $cliente->created_at}}</td>
            </tr>
            <!-- @endforeach -->
           
          </table>
</body>
</html>