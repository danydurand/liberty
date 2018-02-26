<?php
//--------------------------------------------------------------------------------
// Programa      : test_mail.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 20/02/2018
//--------------------------------------------------------------------------------
require_once('qcubed.inc.php');

// Varios destinatarios
$para  = 'danydurand@gmail.com' . ', '; // atención a la coma
$para .= 'danydurandds@gmail.com';

// título
$título = 'Recordatorio de cumpleaños para Agosto';

// mensaje
$mensaje = '
<html>
<head>
  <title>Recordatorio de cumpleaños para Agosto</title>
</head>
<body>
  <p>¡Estos son los cumpleaños para Agosto!</p>
  <table>
    <tr>
      <th>Quien</th><th>Día</th><th>Mes</th><th>Año</th>
    </tr>
    <tr>
      <td>Joe</td><td>3</td><td>Agosto</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17</td><td>Agosto</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
// $cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: magap2117@gmail.com' . "\r\n";
// $cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Enviarlo
mail($para, $título, $mensaje, $cabeceras);

/*
// El mensaje
$mensaje = "Línea Uno\r\nLínea Dos\r\nLínea Tres";
// Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
$mensaje = wordwrap($mensaje, 70, "\r\n");
$cabeceras = 'From: notificaciones@libertyexpress.com';
// Enviarlo
mail('danydurand@gmail.com', 'Test desde el 244', $mensaje, $cabeceras);
*/

// $to                   = array('danydurand@gmail.com');
// $mimemail             = new MIMEMAIL('plain/text');
// $mimemail->senderName = 'Notificaciones Liberty';
// $mimemail->senderMail = 'localhost@libertyexpress.com';
// $mimemail->subject    = 'Purge de Datos';
// $mimemail->body       = 'Esto es una prueba de envio de correos';
// $mimemail->create();
// $mimemail->send($to);

echo "\nListo, ya mande el correo\n";
?>
