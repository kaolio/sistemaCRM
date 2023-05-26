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
         font-size: 16px;
        }
        h2{
          font-family:Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol;
        }
      </style>
<body>
  <h2 align="center">REPORTE DE ORDENES DE TRABAJO </h2>
    {{-- <img src="{{public_path('imagenes/logo.jpg')}}" class="text-align-left " width="200px "> --}}
    <div  style="position: absolute; top: 40 px;left: 400px; margin-botom:20px;">
            Sitio Web: &nbsp;&nbsp; www.irecovery.com <br/>
            E-mail: &nbsp;&nbsp;&nbsp; usuario@irecovery.com <br>
    </div>
    <br><br>
    <hr>
    <div style="position: absolute; left: 50px" >
      Telefono: &nbsp;&nbsp; +34 966 231 768 <br/>
      Skype: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Empres@ <br/>
      Sitio Web: &nbsp; www.empresa100.com <br/>
      E-mail: &nbsp; empresa@gmail.com <br/>
      
  </div>
  <div style="position: absolute; right: 50px" >
    DPR Recovery <br>
    Arzobispo Loaces N17 Local <br>
    03003 Alicante <br>
      
  </div>
  <br><br><br><br><br><br>

          <table  width="100%" cellpadding="3" cellspacing="1" align="center"  border="groove">
           
            <tr style="text-align:center;background:rgb(2, 117, 216); color: aliceblue">
              <th class="text-center">N° de Orden</th>
              <th class="text-center">Prioridad</th>
              <th class="text-center">Cliente</th>
              <th class="text-center">Estado</th>
              <th class="text-center">Informacion</th>
              <th class="text-center">Ultima Nota</th>
              <th class="text-center">Asignado</th>
              <th class="text-center">Creado por</th>
              <th class="text-center">Fecha</th>
            </tr>
            
            
              <!-- @foreach($datosTablas as $item) -->
            <tr>
              <td class="text-center">{{$item->id}}</td>
              <td class="text-center">{{$item->prioridad}}</td>
              <td>{{$item->nombreCliente}}</td>
              <td class="text-center">{{$item->estado}}</td>
              <td>{{ $item->informacion}}</td>
              <td>{{ $item->datosImportantes}}</td>
              <td class="text-center">{{ $item->name}}</td>
              <td class="text-center">{{ $item->creado}}</td>
              <td>{{ $item->created_at}}</td>
            </tr>
            <!-- @endforeach -->
           
          </table>
</body>
</html>