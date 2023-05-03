<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ORDEN DE TRABAjO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<style>
    hr {
        height: 1px;
        border-color: 858383;

      }
      body {
         /* el tamaño por defecto es 14px */
         font-size: 12px;
      }
</style>

 @for ($i = 0; $i < count($contenedor); $i++)

<body>

   

          <img src="{{public_path('imagenes/logo_hdd.jpg')}}" class="text-align-left " width="200px ">
          <div  style="position: absolute; top: 15 px;left: 500px" >
                  Sitio Web: &nbsp;&nbsp; www.irecovery.com <br/>
                  E-mail: &nbsp;&nbsp;&nbsp; usuario@irecovery.com
          </div>
          <br>
          <hr>

          <div style="position: absolute; left: 50px" >
              <br/><br/>

              Direccion: &nbsp; Calle Antezana <br/>
              Telefono: &nbsp;&nbsp; 4446652 <br/>
              Skype: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Empres@ <br/>
              Sitio Web: &nbsp; www.empresa100.com <br/>
              E-mail: &nbsp; empresa@gmail.com <br/>
              
          </div>
          <br/><br/><br/><br/><br/><br/><br/><br/><br/>
          <hr>
          <h2 align="center" >ORDEN DE TRABAJO N° {{$contenedor[$i][0]}}</h2>
          
          <div style="position: absolute; left: 50px" >
              <br/>
                Nombre: &nbsp;&nbsp;&nbsp;&nbsp; {{$contenedor[$i][1]->nombreCliente}} <br/>
                Direccion: &nbsp;&nbsp; {{$contenedor[$i][1]->calle}} <br/>
                Provincia
                : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   {{$contenedor[$i][1]->provincia}} <br/>
                Fecha: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$contenedor[$i][1]->created_at}} <br/>
                Servicio: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Recuperacion de datos <br/> 
              

              
          </div>
          <br/><br/><br/><br/><br/><br/><br/><br/><br/>
          <hr>

              <div style="position: absolute; left: 100px">
                    <table class="table ">
                  <thead>
                    <tr>
                      <th scope="col">Tipo de Dispositivo</th>
                      <th scope="col">Empresa Manufacturera</th>
                      <th scope="col">Modelo</th>
                      <th scope="col">Numero de Serie</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                      @for ($j = 0; $j < count($contenedor[$i][2]); $j++)
                        <tr>   
                        <td>{{$contenedor[$i][2][$j]->tipo}}</td>
                        <td>{{$contenedor[$i][2][$j]->fabricante}}</td>
                        <td>{{$contenedor[$i][2][$j]->modelo}}</td> 
                        <td>{{$contenedor[$i][2][$j]->serial}}</td>
                        </tr>
                      @endfor
                    
                  </tbody>
                </table>
              </div>
              <br/><br/><br/><br/><br/><br/><br/><br/><br/>
                <hr>
                <div style="position: absolute; left: 50px" >
                  <br/>
                  Beneficiario: Empres@ <br/>
                  IBAN: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; JRS35160005010028639124<br/>
                  Nro de Cuenta: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   00-501-0028639.1 <br/>
                  Siwft: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DBDBRSBG <br/>
                  Banco: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Banca Intesa AD.<br/>
          
                  
              </div>

    
    
</body>

@endfor

</html>