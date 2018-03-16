<?php
//------------------------------------------------------------------------
// Programa      : retorno_if.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 14/06/2015
// Descripcion   : Este programa toma los parametros de retorno de la 
//                 Impresora Fiscal 
//------------------------------------------------------------------------
require_once('qcubed.inc.php');

function retorno_if($intId, $strTipoDocu, $strDocuFisc, $strMaquFisc, $strFechImpr, $strHoraImpr) {
	$strXmlxInic = "<?xml version='1.0' encoding='UTF-8'?><retorno></retorno>";
	if (get_magic_quotes_runtime()) {
   	$strXmlxInic = stripslashes($strXmlxInic);
	}
	$xml = simplexml_load_string($strXmlxInic);
	if ($strTipoDocu == 'F') {
		// Factura 
		$objFactPmnx = FacturaPmn::Load($intId);
		if ($objFactPmnx) {
			$objFactPmnx->Numero = $strDocuFisc;
			$objFactPmnx->MaquinaFiscal = $strMaquFisc;
			$objFactPmnx->FechaImpresion = $strFechImpr;
			$objFactPmnx->HoraImpresion = $strHoraImpr;
         $objFactPmnx->ImpresaId = SinoType::SI;
			$objFactPmnx->Save();

			$xml->addChild('factura',$objFactPmnx->Id);
			$xml->addChild('resultado','OK');
		} else {
			$xml->addChild('factura',$intId);
			$xml->addChild('resultado','No Existe');
		}
	} else {
		// Nota de Credito
		$objNotaCred = NotaCredito::Load($intId);
		if ($objNotaCred) {
			$objNotaCred->Numero = $strDocuFisc;
			$objNotaCred->MaquinaFiscal = $strMaquFisc;
			$objNotaCred->FechaImpresion = $strFechImpr;
			$objNotaCred->HoraImpresion = $strHoraImpr;
         $objNotaCred->ImpresaId = SinoType::SI;
			$objNotaCred->Save();
			//-----------------------
			// Se Anula la Factura
			//-----------------------
			$objFactPmnx = FacturaPmn::Load($objNotaCred->FacturaId);
			if ($objFactPmnx) {
		      $arrParaAnul['MotiAnul'] = $this->txtConcNota->Text;
		      $arrParaAnul['UsuaAnul'] = $this->objUsuario->CodiUsua;
		      $objFactPmnx->AnularFactura($arrParaAnul);
			}
			$xml->addChild('nota_credito',$objNotaCred->Id);
			$xml->addChild('resultado','OK');
		} else {
			$xml->addChild('nota_credito',$intId);
			$xml->addChild('resultado','No Existe');
		}
	}
	return $xml->asXML();
}
?>