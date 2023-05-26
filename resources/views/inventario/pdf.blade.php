<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventario</title>
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
        h2{
          font-family:Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol;
        }
      </style>
<body>
  <h2 align="center">REPORTE DE INVENTARIO </h2>
    {{-- <img src="{{public_path('imagenes/logo.jpg')}}" class="text-align-left " width="200px "> --}}
    <div  style="position: absolute; top: 40 px;left: 400px; margin-botom:20px;">
            Sitio Web: &nbsp;&nbsp; www.irecovery.com <br/>
            E-mail: &nbsp;&nbsp;&nbsp; usuario@irecovery.com <br>
    </div>
    <br>
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
    
{{--      
    <div style="position: absolute; left: 50px" >
        <br/>
        Nombre: &nbsp;&nbsp;&nbsp; Usuario <br/>
        Direccion: &nbsp; Calle Jordan <br/>
        Ciudad: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Cochabamba <br/>
        Contraseña: &nbsp; 44466525555 <br/>
        Fecha: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 07-04-2022 <br/>
        Servicio: &nbsp;&nbsp;&nbsp; Recuperacion de datos <br/>      
    </div>  --}}

  
    <table  width="50%" align="center" style="margin-top: 40px;margin-bottom: 20px;" >
      <!--  <tr>
       <td><hr width="100%"></td>
       </tr> -->
         <tr>
    
      </tr>

    <tr>
      <td>
          <table  width="100%" cellpadding="3" cellspacing="1" align="center"  border="groove">
           
            <tr style="text-align:center;background:rgb(2, 117, 216); color: aliceblue">
              <td><b>ID</b></td>
              <td><b>FABRICANTE</b></td>
              <td><b>MODELO</b></td>
              <td><b>NUMERO DE SERIE</b></td>
              <td><b>FIRMWARE</b></td>
              <td><b>CAPACIDAD</b></td>
              <td><b>PBC</b></td>
              <td><b>UBICACIÓN</b></td>
              <td><b>FACTOR DE FORMA</b></td>
              <td><b>NOTA</b></td>
              <td><b>CABEZAL</b></td>
              <td><b>INF. DEL CABEZAL</b></td>
            </tr>
  
              <!-- @foreach($inventario as $item) -->
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->manufactura}}</td>
              <td>{{$item->modelo}}</td>
              <td>{{$item->numero_de_serie}}</td>
              <td>{{ $item->firmware}}</td>
              <td>{{ $item->capacidad}}</td>
              <td>{{ $item->pbc}}</td>
              <td>{{ $item->ubicacion}}</td>
              <td>{{ $item->factor_de_forma}}</td>
              <td>{{ $item->nota}}</td>
              <td>{{ $item->cabecera}}</td>
              <td>{{ $item->info_de_cabecera}}</td>
            </tr>
            <!-- @endforeach -->
          </table>
        </td>
    </tr>
    
    <!--   <tr>
       <td><hr width="30%" align="right"></td>
        </tr> -->
                    {{-- <tr>
                  <td>
                    <table width="100%" align="center" >
                    <tr>
                          <td><b>Grand Total:</b></td>
                          <td align="right">jhgv</td>
                        </tr>
                      
                      </table>
                        </td>
                    </tr> --}}
              
       {{-- <tr>
             <td><hr width="30%" align="right"></td>
       </tr> --}}
      
          <tr>
            <td colspan="6" align="center"><i>Thanks for Visit!</i></td>
          </tr>
    
  
           <hr>
        {{-- <div style="position: absolute; left: 50px" >
            <br/>
            Beneficiario: Empres@ <br/>
            IBAN: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; JRS35160005010028639124<br/>
            Nro de Cuenta: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   00-501-0028639.1 <br/>
            Siwft: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DBDBRSBG <br/>
            Banco: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Banca Intesa AD.<br/>
        </div> --}} 
</body>
</html>
