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
         font-size: 14px;
        }
        h2{
          font-family:Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol;
        }
        .titulo{
            /* text-align:center; */
            background:rgb(2, 117, 216); 
            color: aliceblue;
        }
        .h3{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        p{
            font-size: 22px;
        }
      </style>
<body>
  <h2 align="center">REPORTE DE DISCO</h2>
    {{-- <img src="{{public_path('imagenes/logo.jpg')}}" class="text-align-left " width="200px "> --}}
    <br>
    <div  style="position: absolute; top: 40 px;left: 250px; margin-botom:20px;">
            Sitio Web: &nbsp;&nbsp; www.irecovery.com <br/>
            E-mail: &nbsp;&nbsp;&nbsp; usuario@irecovery.com <br>
    </div>
    <br>
    <hr>
    <div style="position: absolute; left: 50px" >
        Direccion: &nbsp; Calle Antezana <br/>
        Telefono: &nbsp;&nbsp; 4446652 <br/>
        Skype: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Empres@ <br/>
        Sitio Web: &nbsp; www.empresa100.com <br/>
        E-mail: &nbsp; empresa@gmail.com <br/>
        
    </div>
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

  
    <!--  <tr>
        <td><hr width="100%"></td>
    </tr> -->
    <div style="position: absolute; right: 50px" >
        NXXXXxxx XXXX <br/>
        XXXXxxxXX <br/>
        073738 838 <br/>
        
    </div>

<table  width="50%" align="center" style="margin-top: 125px" >
    {{-- <tr align="right">
        <td   style="margin-left: 190px">
            <address>
                NXXX xxxx XXXX <br>
                P.o.Box  4678 , XXxxXX <br>
                0719 260 602 <br>
            </address>
            
        </td>
        
    </tr> --}}
    
    <!-- <tr>
        <td><hr width="100%"></td>
    </tr> -->
    
    <!-- <tr>
        <td><hr width="100%" align="right"></td>
    </tr> -->
     {{-- <h3 class="h3" align="center" style="font-family: Arial, Helvetica, sans-serif">Item N°{{$inventario->id}} - {{$inventario->manufactura}} </h3> --}}
     <p class="m-2" align="center"> <strong> Item N°{{$inventario->id}} - {{$inventario->manufactura}}</strong> </p>
    <tr>
      <td>
          <table  width="100%" cellpadding="6" cellspacing="1" align="center"  border="groove">
           
            <tr>
              <td class="titulo"><b>ID</b></td>
              <td>{{$inventario->id}}</td>
            </tr>
            <tr>
                <td class="titulo"><b>FABRICANTE</b></td>
                <td>{{$inventario->manufactura}}</td>
            </tr>
            <tr>
                <td class="titulo"><b>MODELO</b></td>
                <td>{{$inventario->modelo}}</td>
            </tr>
            <tr>
                <td class="titulo"><b>NUMERO DE SERIE</b></td>
                <td>{{$inventario->numero_de_serie}}</td>
            </tr>
            <tr>
                <td class="titulo"><b>FIRMWARE</b></td>
                <td>{{ $inventario->firmware}}</td>
            </tr>
            <tr>
                <td class="titulo"><b>CAPACIDAD</b></td>
                <td>{{ $inventario->capacidad}}</td>
            </tr>
            <tr>
                <td class="titulo"><b>PBC</b></td>
                <td>{{ $inventario->pbc}}</td>
            </tr>
            <tr>
                <td class="titulo"><b>UBICACIÓN</b></td>
                <td>{{ $inventario->ubicacion}}</td>
            </tr>
            <tr>
                <td class="titulo"><b>FACTOR DE FORMA</b></td>
                <td>{{ $inventario->factor_de_forma}}</td>
            </tr>
            <tr>
                <td class="titulo"><b>NOTA</b></td>
                <td>{{ $inventario->nota}}</td>
            </tr>
            <tr>
                <td class="titulo"><b>CABEZAL</b></td>
                <td>{{ $inventario->cabecera}}</td>
            </tr>
            <tr>
                <td class="titulo"><b>INF. DEL CABEZAL</b></td>
                <td>{{ $inventario->info_de_cabecera}}</td>
            </tr>
           
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
      
        <tr style="margin-top: 25px">
            <td colspan="6" align="center" style="margin-top: 25px"><i>Thanks for Visit!</i></td>
        </tr>
</table>
  
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
