<?php
//-------------------------------------------------------------------------------------------
// Programa      : ndc.php 
// Realizado por : Daniel Durand
// Fecha Elab.   : 27/05/2015
// Descripcion   : Este programa provee informacion de una Nota de Credito
//-------------------------------------------------------------------------------------------
require_once('../util/includes/config.php');
require_once(__PROG_DIRECTORY__.'/includes/prepend.inc.php');
require_once('../util/includes/funciones.php');

function ndc($intId) {
	$strXmlxInic = "<?xml version='1.0' encoding='UTF-8'?><error></error>";
	if (get_magic_quotes_runtime()) {
   	$strXmlxInic = stripslashes($strXmlxInic);
	}
	$error = simplexml_load_string($strXmlxInic);
	$blnTodoOkey = true;
	if (strlen($intId) > 0) {
		$objNdcxPmnx = NotaCredito::Load($intId);
		if ($objNdcxPmnx) {
 			$strXmlxInic = "<?xml version='1.0' encoding='UTF-8'?><ndc></ndc>";
			if (get_magic_quotes_runtime()) {
		   	$strXmlxInic = stripslashes($strXmlxInic);
			}
			$xml = simplexml_load_string($strXmlxInic);
			$xlmNumeCedu = $xml->addChild('id',$objNdcxPmnx->Id);
			$xlmNumeFact = $xml->addChild('factura_id',$objNdcxPmnx->FacturaId);
			$xlmTextConc = $xml->addChild('concepto',$objNdcxPmnx->Concepto);
			$xlmNumeCedu = $xml->addChild('cedula_rif',$objNdcxPmnx->CedulaRif);
			$xlmRazoSoci = $xml->addChild('razon_social',$objNdcxPmnx->RazonSocial);
			$xlmDireFisc = $xml->addChild('direccion_fiscal',$objNdcxPmnx->DireccionFiscal);
			$xlmTeleClie = $xml->addChild('telefono',$objNdcxPmnx->Telefono);
			$xlmMontBase = $xml->addChild('monto_base',$objNdcxPmnx->MontoBase);
			$xlmMontFran = $xml->addChild('monto_franqueo',$objNdcxPmnx->MontoFranqueo);
			$xlmMontIvax = $xml->addChild('monto_iva',$objNdcxPmnx->MontoIva);
			$xlmMontSegu = $xml->addChild('monto_seguro',$objNdcxPmnx->MontoSeguro);
			$xlmMontTota = $xml->addChild('monto_total',$objNdcxPmnx->MontoTotal);
		} else {
			$blnTodoOkey = false;
			$mensaje = $error->addChild('mensaje',"No existe la Nota de Credito ".$intId);
		}
	} else {
		$blnTodoOkey = false;
		$mensaje = $error->addChild('mensaje',"Debe proporcionar un Id de Nota de Credito");
	}
	if ($blnTodoOkey) {
		return $xml->asXML();
	} else {
		return $error->asXML();
	}
}
?>
