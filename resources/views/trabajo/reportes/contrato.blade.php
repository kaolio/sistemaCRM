<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CONTRATO DE DIAGNÓSTICO Y RECUPERACIÓN DE DATOS INFORMÁTICOS</title>
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

      .columna {
        width:33%;
        float:left;
        }

        .columna2 {
        width:20%;
        float:left;
        }

        input[type=checkbox]
        {
            /* Doble-tamaño Checkboxes */
            -ms-transform: scale(2); /* IE */
            -moz-transform: scale(2); /* FF */
            -webkit-transform: scale(2); /* Safari y Chrome */
            -o-transform: scale(2); /* Opera */
        }

    @media (max-width: 500px) {
    
        .columna {
            width:auto;
            float:none;
        }
  
    }
</style>

<p align="right"><b>DPR Recovery</b><br>
<b>Arzobispo Loaces N17 Local</b><br>
<b>03003 Alicante</b><br>
<b>+34 966 231 768</b></p>

<br><br>

<b><h5 align="center" >CONTRATO DE DIAGNÓSTICO Y RECUPERACIÓN DE DATOS INFORMÁTICOS</h5></b>

<br><br>

<ol>
    <p>Contrato N° {{$contenedor[0][0]->id}} del {{ \Carbon\Carbon::parse($contenedor[0][0]->created_at)->format('d-m-Y')}} estipulado por vía telemática entre:</p>
</ol>

<br>

<ol>
    <div class="columna">
        <p align="right"><b>DPR Recovery</b><br>
            <b>Arzobispo Loaces N17 Local</b><br>
            <b>03003 Alicante</b><br>
            <b>+34 966 231 768</b></p>
    </div>
    <div class="columna2"></div>
    <div class="columna">
        <p align="left"><b>{{$contenedor[0][0]->nombreCliente}}, {{$contenedor[0][0]->calle}}</b><br>
            <b>{{$contenedor[0][0]->cif}}, {{$contenedor[0][0]->poblacion}}</b><br>
            <b>{{$contenedor[0][0]->numero}}</b></p>
    </div>

</ol>

<br><br><br><br><br><br>

<h6 align="center">Condiciones Generales para la recuperación de datos de soportes informáticos</h6>
<h6 align="center">(“Condiciones”)</h6>
<br>
<ol type="1">
    <p><b>1. ANALISIS</b></p>

    <ol type="a">
        <p><b>a. Orden de análisis</b></p>

        <p> La Empresa, bajo encargo del cliente, realizara el análisis del soporte dañado después de haber recibido las presentes Condiciones debidamente rellenadas y firmadas, al igual que el pago integral del importe acordado por el costo de análisis.</p>
        
        <p> La fase de análisis tiene por objeto establecer:</p>
        
        <ol>
            <p><b>i. El origen del problema detectado,</b><br>
            <b>ii. El nivel de integridad física del soporte,</b><br>
            <b>iii. La consistencia de los datos, y</b><br>
            <b>iv. La modalidad de intervención más adecuada, en donde se considera posible una intervención.</b></p>
        </ol>

        <p>La Empresa. emitirá un informe técnico con el resultado de la fase de análisis, que comprenderá el análisis de la calidad y cantidad de datos accesibles, junto con un presupuesto que será valido por un máximo de 10 días. La Empresa, en caso de que sea aceptado el presupuesto para la recuperación de datos y teniendo en cuenta las especificaciones y procedimientos complejos de análisis, de los cuales el cliente declara haber sido informado, haber comprendido y aceptado, no da ninguna garantía de que se pueda acceder de nuevo a los datos en fechas futuras, inclusive después de un nuevo análisis. En caso de apertura de soportes de estado solido los mismos podrían ser devueltos desarmados, sin que ello implique ningún derecho al cliente de reducción de precios, indemnizaciones u otras reclamaciones de algún tipo.</p>
          
        <div style="page-break-after:always;"></div>

        <p><b>b. Tiempo de análisis</b></p>

        <p>El tiempo necesario para el análisis puede variar en base a los problemas técnicos que se encuentren y el nivel de prioridad solicitado por el Cliente. Eventuales indicaciones relacionadas al tiempo de análisis serán exclusivamente indicativas y no vinculantes para La Empresa, no asume ninguna responsabilidad por daños directos o indirectos ocasionados por posibles retrasos en la fase de análisis con respecto al tiempo previamente establecido, dicho retraso no involucra el incumplimiento o la resolución del contrato ni otorga al cliente derechos relacionados con la devolución o reducción del precio del análisis.</p>
    
        <p><b>c. Monitoreo y Comunicación</b></p>

        <p>La Empresa, pondrá a disposición del cliente un área en su portal web en la que será posible monitorear los avances de proceso y resultado final a través de un acceso protegido por nombre de usuario y contraseña. El uso de este servicio está estrechamente vinculado al uso de internet y a otras condiciones externas; por lo tanto, no podemos garantizar su funcionamiento continuo. En todo caso, al final de la fase de análisis se comunicará el éxito del trabajo a los contactos indicados por el cliente.</p>

        <p><b>d. Soportes Alterados</b></p>

        <p>Los soportes que llegan a La Empresa, sin los sellos de fabrica o con señales de manipulación en cualquier punto, serán considerados soportes alterados y por lo tanto será aplicado un sobreprecio para la elaboración, debidamente indicado con antelación.</p>
    
    </ol>

    <p><b>2. RECUPERACION DE DATOS</b></p>

    <ol>

        <p><b>a. Orden para la recuperación de datos</b></p>

        <p>La Empresa. iniciará la fase de transferencia de los datos eventualmente recuperados hacia otros soportes idóneos indicados en la estimación de precio, la compra de dicho soporte se acordará previamente con el cliente. Solo tras la recepción del formulario de aceptación de estimación de gastos debidamente sellada y firmada por el cliente se iniciará el trabajo. El cliente puede enviar junto con el dispositivo dañado un dispositivo idóneo donde copiar los datos, La Empresa se reserva el derecho de evaluarlo, aceptarlo o rechazarlo.</p>

        <p><b>b. Comprobación de consistencia de los datoss</b></p>

        <p>La Empresa analizara la consistencia de los datos a través de procedimientos adecuados. Sin embargo, considerando la imposibilidad de abrir los documentos con los respectivos programas, ya sea por razones de diversidad o de privacidad, no se puede dar ninguna garantía de la integridad de los datos.</p>
    
        <p><b>c. Duración de la recuperación de datos</b></p>

        <p>El tiempo requerido para la etapa de recuperación de datos y la inversión en otros medios adecuados puede variar en función de la complejidad de la misma y a la dificultad en la lectura de datos. Aunque La Empresa utiliza herramientas, metodologías probadas y procedimientos verificados durante la fase de recuperación aun se pueden generar circunstancias inusuales que van a causar una prolongación de los tiempos previos establecidos. Por lo tanto, el tiempo estimado de recuperación y copiado de los datos siempre debe considerarse únicamente a titulo indicativo y no vinculante. La Empresa no asume ninguna responsabilidad por cualquier daño, directo o indirecto, relacionado con un posible retraso en la entrega de los datos recuperados en comparación con los tiempos previstos inicialmente. Este eventual retardo no podrá constituir el incumplimiento o una causal de terminación del contrato, ni otorga al cliente ningún derecho o facultad, como por ejemplo la restitución o reducción del precio de la recuperación de datos.</p>
    
    </ol>

    <div style="page-break-after:always;"></div>

    <p><b>3. SUSPENSION DE LA ORDEN DE ANALISIS O RECUPERACION DE DATOS</b></p>

    <ol>

        <p>El cliente puede solicitar en cualquier momento la suspensión de la fase de análisis o de la recuperación de datos con un coste en concepto de manipulación, transportes y gastos a través de una comunicación por escrito. Esta solicitud no da derecho de ninguna manera y bajo ninguna forma al reembolso de los gastos efectuados ni los anticipos ya pagados hasta el momento de la comunicación. El Cliente esta obligado a pagar la totalidad de las actividades realizadas por La Empresa hasta el momento de recepción de la solicitud de suspensión, independientemente de los resultados alcanzados. Tomando en consideración el procedimiento de recuperación de datos utilizado el soporte se puede devolver al cliente en condiciones diferentes a las originales, es decir, abierto o parcialmente desarmado sin que esto otorgue cualquier derecho de reclamo, reembolso o indemnización alguna al cliente.</p>

    </ol>

    <p><b>4. NIVELES DEL SERVICIO</b></p>

    <ol>

        <p>La Empresa proporciona al cliente tres tiempos de elaboración:</p>

        <ol >
            <p><b>Normal:</b> Prevé el inicio del proceso de análisis según una lista de espera que en promedio es de 8/12 días laborables de lunes a viernes, a partir de la fecha de recepción del soporte y de la aceptación de la orden.</p>
            <p><b>Prioritario:</b> Prevé el inicio del proceso de análisis según una lista de espera que en promedio es de 2/5 días laborables de lunes a viernes, a partir de la fecha de recepción del soporte y de la aceptación de la orden.</p> 
            <p><b>Emergencia:</b>Garantiza al cliente el inicio inmediato del procedimiento de análisis evitando la lista de espera normal, también asegura la labor prioritaria de los técnicos en el instante que llega al laboratorio se procede a realizar todas las intervenciones necesarias inmediatamente a su llegada y de la aceptación de la orden.</p>
        </ol>

    </ol>

    <p><b>5. DEVOLUCION DEL SOPORTE</b></p>

    <p>En caso de resultado negativo en la operación de recuperación de datos, si el cliente consintió la cesión gratuita mediante la firma de la clausula al final de la orden, el soporte será retenido por La Empresa sin confirmaciones o autorizaciones una vez pasados 30 (treinta) días de la fecha de aceptación de la orden. En caso de que el cliente no haya prestado el consentimiento a la cesión gratuita del soporte, el mismo estará a disposición del cliente para ser retirado en los próximos 60 (sesenta) días a partir de la fecha de aceptación de la orden. Transcurridos los mismos el soporte se entenderá en todo caso cedido gratuitamente a La Empresa. Luego de este tiempo, si el cliente aun no ha recuperado el soporte ni ha comunicado por escrito sus peticiones a La Empresa se considerará que el cliente ha ejercido la rescisión del contrato, entendiéndose como otorgado el consentimiento para la cesión gratuita del soporte. En este caso se realizará la eliminación segura de todos los datos presentes en el soporte y se procederá a desecharlo de acuerdo a las disposiciones de ley.</p>

    <p><b>6.	TRANSPORTE Y RESPONSABILIDAD</b></p>

    <p>Los soportes y la mercancía que llegan a La Empresa, viajan siempre por cuenta y bajo la responsabilidad del Cliente. La Empresa no asume ninguna responsabilidad por danos directos o indirectos que puedan ser causados debido a la perdida, daño o robo del soporte en caso de retiro y entrega por medio del servicio de mensajería. El cliente declara que conoce este riesgo, lo acepta y renuncia a reclamar a La Empresa en caso de perdida, daño o robo del soporte enviado por correo u otro servicio.</p>

    <div style="page-break-after:always;"></div>

    <p><b>7.	TRATAMIENTO DE LOS DATOS</b></p>

    <p>De acuerdo con la legislación sobre protección de datos personales Ley Orgánica 15/1999, de 13 diciembre Real Decreto 1720/2007, de 21 de diciembre de Protección de Datos de Carácter Personal, La Empresa recogerá y almacenará los datos personales y comerciales relativos a las presentes condiciones y a las ordenes contraídas exclusivamente para cumplir las obligaciones fiscales y tributarias. Las informaciones relativas a la recuperación de datos informáticos, potencialmente presentes en el soporte dañado serán tratados únicamente para fines de la elaboración técnica de la recuperación, tal tratamiento se limita al periodo de tiempo necesario para terminar el trabajo. Todavía se puede manifestar la necesidad de valerse de colaboraciones con sociedades externas especializadas, cuidadosamente seleccionadas por La Empresa. Por lo tanto, el cliente declara haber recibido la información que se refiere a la Ley Orgánica 15/1999 del 13 de diciembre y Real Decreto 1720/2007 del 21 de diciembre sobre la Protección de Datos de Carácter Personal y autoriza a La Empresa. al tratamiento de los datos informáticos conforme a la Ley 34/2002 del 11/7 Servicios Sociedad de la Información y Comercio Electrónico. De igual manera, el cliente autoriza a La Empresa. para la transferencia de la información estrictamente necesaria para el cumplimiento de la recuperación de datos en caso de requerirse las colaboraciones externas </p>

    <p><b>8.	RESPONSABILIDAD</b></p>

    <p>La Empresa. no asume ninguna responsabilidad por la perdida de ganancias por parte del cliente en modo directo o indirecto. Adicionalmente no asume ninguna responsabilidad por el retraso en la entrega del análisis o recuperación ocasionado por el servicio de mensajería o por la falta de disponibilidad de las piezas de repuesto y/o software, porque están fuera de producción o porque son obsoletas para la realización del análisis y/o recuperación. La Empresa. no asume ninguna responsabilidad por defectos que se producen después de la fase de copia y donde se requieran ulteriores elaboraciones. Se entiende aceptado por el cliente que para llevar a cabo las operaciones de recuperación de datos podría ser necesario quitar los sellos de garantía, utilizar también tecnologías experimentales y valerse de la colaboración de terceros, sea en España que en el extranjero. <br>
        Cualquier reparación de soportes dañados realizada por La Empresa. debe considerarse temporal y no definitiva, destinada exclusivamente para la recuperación de datos y no para volver a utilizar el soporte. El cliente declara conocer y aceptar que La Empresa. aun utilizando know-how y las mejores tecnologías, no da ninguna garantía de éxito y no asume ninguna responsabilidad sino las establecidas en las normas vigentes, todo esto en caso de que durante la fase de análisis y/o recuperación se pierdan o destruyan los datos declarados por el cliente. En virtud de que el trabajo de análisis y recuperación de datos se realiza en un soporte dañado se excluye siempre cualquier responsabilidad que pueda generarse por el daño ocasionado al mismo. El cliente esta siempre obligado a realizar, si es posible, una copia de seguridad de los datos antes de enviar el soporte dañado para el análisis.
    </p>

    <p><b>9.	ENVIO DE DATOS RECUPERADOS</b></p>

    <p>La Empresa entregara al cliente una copia de los datos recuperados manteniendo otra copia durante el tiempo estrictamente necesario, de acuerdo con la ley, para la buena ejecución del transporte y la confirmación de la regularidad de los datos por parte del cliente. Si no hay objeción por escrito de parte del cliente dentro de los próximos 30 (treinta) días a partir de la fecha de recepción de la copia de los datos recuperados, el servicio de recuperación de datos se considerara completado y aceptado por el cliente. La copia en poder de La Empresa será destruida en conformidad con lo dispuesto en la ley.</p>

    <p><b>10.	CAUSAS DE FUERZA MAYOR</b></p>

    <p>Las siguientes circunstancias constituyen motivo de exención de las obligaciones contractuales de La Empresa donde se impida el cumplimiento o lo hagan irracionalmente peligroso: conflictos sindicales y otras circunstancias fuera del control de La Empresa, como por ejemplo: incendio, guerra, movilización u operaciones militares, requisición, confiscación, embargo, cortes de energía, interrupción de conectividad a la red informática, movimientos populares, retrasos o incumplimientos generados por terceros que han sido ocasionados por alguna de las causas mencionadas anteriormente. Las mismas razones de exención son aplicables en caso de terceros encargados por La Empresa durante la fase de análisis y/o recuperación de datos.</p>

    <div style="page-break-after:always;"></div>
    
    <p><b>11.	LEY APLICABLE Y JURISDICCION</b></p>

    <p>Estas condiciones y cualquier contrato relativo a las mismas se regirán exclusivamente por la ley española. Para cualquier disputa que surja en relación a las presentes Condiciones y/o contrato relativo, será exclusivamente competente el tribunal en cuya jurisdicción tiene sede La Empresa. salvo la facultad de este ultimo de actuar en el tribunal del Cliente.</p>
    
    <br>
    <ol>
        <div class="columna">Fecha</div>
        <div class="columna">Partner</div>
        <div class="columna">Cliente</div>

        <br><br><br>
        <div class="columna">_____________________</div>
        <div class="columna">_____________________</div>
        <div class="columna">_____________________</div>  
    </ol>
    <br>

    <p>En cumplimiento de lo establecido en el código civil con relación a las condiciones generales de los contratos, se declara que se ha entendido y aceptado específicamente los artículos: 1 (Análisis), 2 (Recuperación), 3 (Suspensión de la orden de Análisis y Recuperación de datos), 5 (Devolución del soporte), 6 (Transporte y Responsabilidad), 7 (Tratamiento de los datos), 8 ( Responsabilidad), 9 (Envío datos recuperados), 10 (Causas de fuerza mayor), 11 ( Ley aplicable y jurisdicción) de las presentes condiciones generales.</p>

    <ol>
        <div class="columna">Fecha</div>
        <div class="columna"></div>
        <div class="columna">Cliente</div>

        <br><br><br>
        <div class="columna">_____________________</div>
        <div class="columna"></div>
        <div class="columna">_____________________</div>
    </ol>

    <br><br><br><br>

    <div style="page-break-after:always;"></div>

    <p align="center"><b>AUTORIZACIÓN Y ACEPTACIÓN</b></p>

    <p>
        <b>Contrato N°: </b>{{$contenedor[0][0]->id}}<br>
        <b>Fecha de estipulación: </b>{{ \Carbon\Carbon::parse($contenedor[0][0]->created_at)->format('d-m-Y')}}
    </p>

    <p>
        <b>Tipo de contrato: </b>Particular<br>
        <b>Prioridad del contrato: </b>{{$contenedor[0][0]->prioridad}} <br>
        <b>Familia del dispositivo: </b>{{$contenedor[0][4][1]}}<br>
        <b>Tipo de dispositivo: {{$contenedor[0][4][1]}}</b> <br>
        <b>Marca: </b>{{$contenedor[0][4][3]}} <br>
        <b>Modelo: </b>{{$contenedor[0][4][4]}} <br>
        <b>Capacidad: </b>{{$contenedor[0][4][6]}} <br>
        <b>Numero de Serie: </b>{{$contenedor[0][4][5]}} <br>
        <b>Dispositivo Manipulado: </b> <br>
        <b>Tipo de Recuperacion: </b>{{$contenedor[0][4][7]}} <br>
    </p>
    
    <p>Precio de</p>

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Analisis</th>
                <th>Recuperacion</th>
                <th>Prioridad</th>
                <th>Alteracion</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>EUR 0,00</td>
                <td>EUR {{$contenedor[0][2]->mal_funcio_precio}}</td>
                <td>EUR {{$contenedor[0][1]->prioridad_precio}}</td>
                <td>EUR 0,00</td>
                <td>EUR {{$contenedor[0][3]}}</td>
            </tr>
        </tbody>
    </table>
    * IVA excluida ** Diagnostico Gratuito

    <br><br>

    <FONT SIZE=-4>Con la presente el/la Sr/Sra La Empresa, en calidad de Ingeniero, consciente de las responsabilidades penales y civiles que se deben cumplir en caso de declaraciones falsas y engañosas, declara haber sido autorizado/a por el Cliente a dar orden a La Empresa. de efectuar el análisis en el soporte dañado, aceptando y estando dentro de las modalidades y condiciones generales del contrato N° {{$contenedor[0][0]->id}}, autorizando a procesar los datos según la Ley Orgánica 15/1999 del 13 diciembre Real Decreto 1720/2007. El firmante del contrato será considerado como mandante, incluso si no es propietario de los datos o si el soporte dañado será enviado a terceros. El firmante confirma que ha leído y recibido una copia de las Condiciones Generales que regulan la actividad de Recuperación de Datos realizada por La Empresa., incluidos los adjuntos y eventuales apéndices.</font>

    <br><br>

    <ol>
        <div class="columna">Fecha</div>
        <div class="columna"></div>
        <div class="columna">Cliente</div>

        <br><br><br>
        <div class="columna">_____________________</div>
        <div class="columna"></div>
        <div class="columna">_____________________</div>
    </ol>


    <br><br>
    <p><b>CESIÓN GRATUITA DEL SOPORTE</b></p>
    <p>Con la presente escritura privada, el signatario, consiente de las responsabilidades penales y civiles que deben cumplirse en caso de declaraciones falsas, declara:</p>

    <ol>
        <p><input type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;Querer de vuelta el soporte, en cualquier caso, aún si se encuentra desmontado. <br>
        <input type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;Autorizar a La Empresa. a retener el suporte en todos los casos a título gratuito.</p> 
    </ol>

    <br>
    <p><b>SOLICITUD DE PRESUPUESTO DE REPARACIÓN</b></p>
    <ol>
        <p><input type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;Se solicita presupuesto para la reparación del soporte después de la fase de recuperación. <br>
        <input type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;No se solicita presupuesto para la eventual reparación del soporte después de la fase de recuperación.</p> 
    </ol>

    <br>

    <ol>
        <div class="columna">Fecha</div>
        <div class="columna"></div>
        <div class="columna">Cliente</div>

        <br><br><br>
        <div class="columna">_____________________</div>
        <div class="columna"></div>
        <div class="columna">_____________________</div>
    </ol>
    
</ol>

<br>
  
<br>



</html>