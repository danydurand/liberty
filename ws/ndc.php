<?php
//-------------------------------------------------------------------------------------------
// Programa      : ndc.php 
// Realizado por : Daniel Durand
// Fecha Elab.   : 27/05/2015
// Descripcion   : Este programa provee informacion de una Nota de Credito
//-------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');

function ndc($intId) {
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
		$objNdcxPmnx = NotaCredito::Load($intId);
		if ($objNdcxPmnx) {
			//--------------------------------------------------------------------------
			// En este punto se determina si la Nota de Credito podra ser impresa o no 
			//--------------------------------------------------------------------------
			$blnPuedImpr = 1;
			$strMensUsua = '';
			if ($objNdcxPmnx->ImpresaId == SinoType::SI) {
				$blnPuedImpr = 0;
				$strMensUsua = 'La Nota de Credito ya se Imprimio';
			}			
			if ($blnPuedImpr) {
				if (strlen($objNdcxPmnx->Concepto) == 0) {
					$blnPuedImpr = 0;
					$strMensUsua = 'Debe especificar el Concepto de la Nota de Credito';
				}
			}
			//------------------------------------------------------------
			// Se crea el XML que contendra la informacion de la Factura 
			//------------------------------------------------------------
 			$strXmlxInic = "<?xml version='1.0' encoding='UTF-8'?><ndc></ndc>";
			if (get_magic_quotes_runtime()) {
		   	$strXmlxInic = stripslashes($strXmlxInic);
			}
			$xml = simplexml_load_string($strXmlxInic);
			//-----------------------------------
			// Encabezado de la Nota de Credito
			//-----------------------------------
			$xmlEncaNdcx = $xml->addChild('encabezado');
			$xmlEncaNdcx->addChild('id',$objNdcxPmnx->Id);
			$xmlEncaNdcx->addChild('cedula_rif',$objNdcxPmnx->CedulaRif);
			$xmlEncaNdcx->addChild('razon_social',$objNdcxPmnx->RazonSocial);
			$xmlEncaNdcx->addChild('doc_afectado',$objNdcxPmnx->Factura->Numero);
			$xmlEncaNdcx->addChild('maquina_fiscal',$objNdcxPmnx->Factura->MaquinaFiscal);
			$xmlEncaNdcx->addChild('fecha_fact',$objNdcxPmnx->Factura->FechaImpresion);
			$xmlEncaNdcx->addChild('hora',$objNdcxPmnx->Factura->HoraImpresion);
			$xmlEncaNdcx->addChild('usuario',$objNdcxPmnx->CreadaPorObject->LogiUsua);
			$xmlEncaNdcx->addChild('puede_imprimirse',$blnPuedImpr);
			$xmlEncaNdcx->addChild('mensaje_usuario',$strMensUsua);
			//------------------------------
			// Items de la Nota de Credito
			//------------------------------
			$arrItemNota = $objNdcxPmnx->GetItemNotaCreditoArray();
			foreach ($arrItemNota as $objItemNota) {
				// Monto Base
				$xmlItemNota = $xml->addChild('articulo');
				$xmlItemNota->addChild('descripcion','Servicio Transporte');
				$xmlItemNota->addChild('cantidad',1);
				$xmlItemNota->addChild('precio',str_replace(",","",nfp($objItemNota->MontoBase)));
				$xmlItemNota->addChild('alicuota',nfp($objItemNota->PorcentajeIva));
				$xmlItemNota->addChild('linea1','');
				$xmlItemNota->addChild('linea2','');
				$xmlItemNota->addChild('linea3','');
				// Franqueo Postal
				$xmlItemNota = $xml->addChild('articulo');
				$xmlItemNota->addChild('descripcion','Franqueo Postal');
				$xmlItemNota->addChild('cantidad',1);
				$xmlItemNota->addChild('precio',str_replace(",","",nfp($objItemNota->MontoFranqueo)));
				$xmlItemNota->addChild('alicuota',nfp(00));
				$xmlItemNota->addChild('linea1','');
				$xmlItemNota->addChild('linea2','');
				$xmlItemNota->addChild('linea3','');
				// Seguro
				$xmlItemNota = $xml->addChild('articulo');
				$xmlItemNota->addChild('descripcion','Servicio Seguro');
				$xmlItemNota->addChild('cantidad',1);
				$xmlItemNota->addChild('precio',str_replace(",","",nfp($objItemNota->MontoSeguro)));
				$xmlItemNota->addChild('alicuota',nfp(00));
				$xmlItemNota->addChild('linea1','');
				$xmlItemNota->addChild('linea2','');
				$xmlItemNota->addChild('linea3','');
				// Otros
				$xmlItemNota = $xml->addChild('articulo');
				$xmlItemNota->addChild('descripcion','Otros Gastos');
				$xmlItemNota->addChild('cantidad',1);
				$xmlItemNota->addChild('precio',str_replace(",","",nfp($objItemNota->MontoOtros)));
				$xmlItemNota->addChild('alicuota',nfp(00));
				$xmlItemNota->addChild('linea1','');
				$xmlItemNota->addChild('linea2','');
				$xmlItemNota->addChild('linea3','');
			}
			//-------------------------------
			// Montos de la Nota de Credito
			//-------------------------------
			$xmlTotaNota = $xml->addChild('totales');
			$xmlTotaNota->addChild('monto_sub_total',str_replace(",","",nfp($objNdcxPmnx->MontoBase)));
			$xmlTotaNota->addChild('monto_iva',str_replace(",","",nfp($objNdcxPmnx->MontoIva)));
			$xmlTotaNota->addChild('monto_total',str_replace(",","",nfp($objNdcxPmnx->MontoTotal)));
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
