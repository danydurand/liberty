<?php
//-------------------------------------------------------------------------------------------
// Programa      : factura_pmn.php 
// Realizado por : Daniel Durand
// Fecha Elab.   : 18/05/2015
// Descripcion   : Este programa provee informacion de una factura
//-------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');

function factura($intId) {
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
			//-------------------------------------------------------------------
			// En este punto se determina si la Factura podra ser impresa o no 
			//-------------------------------------------------------------------
			$blnPuedImpr = 1;
			$strMensUsua = '';
			if ($objFactPmnx->ImpresaId == SinoType::SI) {
				//--------------------------------------------------------------------------
				// Solo se podra imprimir una factura que no haya sido previamente impresa 
				//--------------------------------------------------------------------------
				$blnPuedImpr = 0;
				$strMensUsua = 'La Factura ya se Imprimio';
			}
			if ($blnPuedImpr) {
				if ($objFactPmnx->MontoCobrado == 0) {
					//---------------------------------------------------------------------------
					// Una factura que no haya sido cobrada, no podra imprimirse a menos que 
					// se declare que tiene retenciones 
					//---------------------------------------------------------------------------
					if ($objFactPmnx->TieneRetencion == SinoType::NO) {
						$blnPuedImpr = 0;
						$strMensUsua = 'No se ha registrado el Pago de la Factura(1)';
					}
					if (!$blnPuedImpr) {
						//--------------------------------------------------------------------------------					
						// Si se trata de una Factura de una Guia COD hecha en el SDE/CON, tambien podra
						// imprimirse, aun cuando no se haya registrado el pago 
						//--------------------------------------------------------------------------------					
						if ($objFactPmnx->GuiaCODdelSDE()) {
							$blnPuedImpr = 1;
							$strMensUsua = '';
						} else {
							$blnPuedImpr = 0;
							$strMensUsua = 'No se ha registrado el Pago de la Factura(2)';
						}
					}
				}
			}
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
			$xmlEncaFact->addChild('cedula_rif',$objFactPmnx->CedulaRif);
			$xmlEncaFact->addChild('razon_social',$objFactPmnx->RazonSocial);
			$xmlEncaFact->addChild('direccion_fiscal',$objFactPmnx->DireccionFiscal);
			$xmlEncaFact->addChild('telefono',$objFactPmnx->Telefono);
			$xmlEncaFact->addChild('usuario',$objFactPmnx->CreadaPorObject->LogiUsua);
			$xmlEncaFact->addChild('puede_imprimirse',$blnPuedImpr);
			$xmlEncaFact->addChild('mensaje_usuario',$strMensUsua);
			//---------------------------------------------------------------------------
			// El "concepto" de la Factura o la "descripcion de los articulos", viene
			// dada por los nros de las guias que se estan facturando 
			//---------------------------------------------------------------------------
			$arrItemFact = $objFactPmnx->GetItemFacturaPmnAsFacturaArray();
			$strNumeGuia = '';
			foreach ($arrItemFact as $objItemFact) {
				if (strlen($strNumeGuia)) {
					$strNumeGuia .= '/';
				}
				$strNumeGuia .= trim($objItemFact->GuiaId);
			}
			$xmlEncaFact->addChild('guia',$strNumeGuia);
			$xmlEncaFact->addChild('linea1','');
			$xmlEncaFact->addChild('linea2','');
			//-----------------------
			// Items de la Factura 
			//-----------------------
			foreach ($arrItemFact as $objItemFact) {
				// Monto Base
				$xmlItemFact = $xml->addChild('articulo');
				$xmlItemFact->addChild('descripcion','Servicio Transporte');
				$xmlItemFact->addChild('cantidad',1);
				$xmlItemFact->addChild('precio',str_replace(",","",nfp($objItemFact->MontoBase)));
				$xmlItemFact->addChild('alicuota',nfp($objItemFact->PorcentajeIva));
				$xmlItemFact->addChild('linea1','');
				$xmlItemFact->addChild('linea2','');
				$xmlItemFact->addChild('linea3','');
				// Franqueo Postal
				$xmlItemFact = $xml->addChild('articulo');
				$xmlItemFact->addChild('descripcion','Franqueo Postal');
				$xmlItemFact->addChild('cantidad',1);
				$xmlItemFact->addChild('precio',str_replace(",","",nfp($objItemFact->MontoFranqueo)));
				$xmlItemFact->addChild('alicuota',nfp(0));
				$xmlItemFact->addChild('linea1','');
				$xmlItemFact->addChild('linea2','');
				$xmlItemFact->addChild('linea3','');
				// Seguro
				$xmlItemFact = $xml->addChild('articulo');
				$xmlItemFact->addChild('descripcion','Proteccion de Paqueteria');
				$xmlItemFact->addChild('cantidad',1);
				$xmlItemFact->addChild('precio',str_replace(",","",nfp($objItemFact->MontoSeguro)));
				$xmlItemFact->addChild('alicuota',nfp(0));
				$xmlItemFact->addChild('linea1','');
				$xmlItemFact->addChild('linea2','');
				$xmlItemFact->addChild('linea3','');
				// Otros
				$xmlItemFact = $xml->addChild('articulo');
				$xmlItemFact->addChild('descripcion','Otros Gastos');
				$xmlItemFact->addChild('cantidad',1);
				$xmlItemFact->addChild('precio',str_replace(",","",nfp($objItemFact->MontoOtros)));
				$xmlItemFact->addChild('alicuota',nfp(0));
				$xmlItemFact->addChild('linea1','');
				$xmlItemFact->addChild('linea2','');
				$xmlItemFact->addChild('linea3','');
			}
			//-----------------------
			// Pagos de la Factura 
			//-----------------------
			$arrPagoFact = $objFactPmnx->GetPagoFacturaPmnAsFacturaArray();
			foreach ($arrPagoFact as $objPagoFact) {
				$strFormPago = trim($objPagoFact->FormaPago->Abreviado)." ";
				if (!is_null($objPagoFact->BancoId)) {
					$strFormPago .= trim($objPagoFact->Banco->Abreviado)." ";
				}
				if (strlen($objPagoFact->NumeroDocumento)) {
					$strFormPago .= "(".trim($objPagoFact->NumeroDocumento).")";
				}
				$xmlPagoFact = $xml->addChild('pago');
				$xmlPagoFact->addChild('forma_pago',$strFormPago);
				$xmlPagoFact->addChild('monto',str_replace(",","",nfp($objPagoFact->MontoPago)));
			}
			//-----------------------
			// Montos de la Factura 
			//-----------------------
			$xmlTotaFact = $xml->addChild('totales');
			$xmlTotaFact->addChild('monto_sub_total',str_replace(",","",nfp($objFactPmnx->MontoBase)));
			$xmlTotaFact->addChild('monto_dscto',str_replace(",","",nfp($objFactPmnx->MontoDscto)));
			$xmlTotaFact->addChild('monto_iva',str_replace(",","",nfp($objFactPmnx->MontoIva)));
			$xmlTotaFact->addChild('monto_total',str_replace(",","",nfp($objFactPmnx->MontoTotal)));
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
