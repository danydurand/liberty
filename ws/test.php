<?php
//-------------------------------------------------------------------------------------------
// Programa      : test.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 31/03/2018
// Descripcion   : Este programa provee informacion de una factura
//-------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');

function test($intId) {
	//------------------------------------------------------------
	// Se crea un XML para canalizar cualquier error del proceso
	//------------------------------------------------------------
	$strXmlxInic = "<?xml version='1.0' encoding='UTF-8'?><error></error>";
	if (get_magic_quotes_runtime()) {
		$strXmlxInic = stripslashes($strXmlxInic);
	}
	$error = simplexml_load_string($strXmlxInic);
	$blnTodoOkey = true;
	if (strlen($intId) > 0) {
		$objFactPmnx = FacturaPmn::Load($intId);
		if ($objFactPmnx) {
			//------------------------------------------------------------
			// Se crea el XML que contendra la informacion de la Factura 
			//------------------------------------------------------------
			$strXmlxInic = "<?xml version='1.0' encoding='UTF-8'?><factura></factura>";
			if (get_magic_quotes_runtime()) {
				$strXmlxInic = stripslashes($strXmlxInic);
			}
			$xml = simplexml_load_string($strXmlxInic);
			//---------------------------
			// Encabezado de la Factura 
			//---------------------------
			$xmlEncaFact = $xml->addChild('encabezado');
			$xmlEncaFact->addChild('id',$objFactPmnx->Id);
		} else {
			$blnTodoOkey = false;
			$mensaje = $error->addChild('mensaje',"No existe la Factura ".$intId);
		}
	} else {
		$blnTodoOkey = false;
		$mensaje = $error->addChild('mensaje',"Debe proporcionar un Nro. de Factura");
	}
	if ($blnTodoOkey) {
		return $xml->asXML();
	} else {
		return $error->asXML();
	}
}
?>
