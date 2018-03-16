<?php
require_once('../util/includes/config.php');
require_once(__PROG_DIRECTORY__.'/includes/prepend.inc.php');
require_once('./crxml/crXml.php');

function info_cliente_xml($intCodiClie) {
   //-------------------------------------------------------------------
   // Aqui se realiza la validacion de los parametros proporcionados
   //-------------------------------------------------------------------
   $blnTodoOkey = true;
   $error = new crxml();
   $xml = new crxml();
   $cliente = $xml->cliente;
   if (strlen($intCodiClie) > 0) {
      $objCliente = ClienteICT::Load($intCodiClie);
      if ($objCliente) {
         //$cliente->TodoOkey = "TRUE";
         $cliente->Id = $intCodiClie;
         $cliente->Nombre = utf8_decode($objCliente->NombreContacto);
         $cliente->Cedula = $objCliente->CedulaRif;
         $cliente->Fecha_Registro = $objCliente->FechaRegistro->__toString("DD/MM/YYYY");
         $cliente->Email = $objCliente->Email;
         $cliente->Telefono_Movil = $objCliente->Telefono;
         $cliente->Telefono_Fijo = $objCliente->Telefono2;
         $cliente->Sucursal = $objCliente->Sucursal->DescEsta;
         $cliente->Direccion = utf8_decode($objCliente->DireccionCompleta);
         $cliente->Servicio = $objCliente->Receptoria->Descripcion." (".$objCliente->Receptoria->SucursalId.")";
      } else {
         $error->mensaje = "No existe el cliente ".$intCodiClie;
         $blnTodoOkey = false;
         $cliente->TodoOkey = "FALSE";
      }
   } else {
      $error->mensaje = "No existe el cliente ".$intCodiClie;
      $blnTodoOkey = false;
      $cliente->TodoOkey = "FALSE";
   }
   if ($blnTodoOkey) {
      return $xml->xml();
   } else {
      return $error->xml();
   }
}
?>
