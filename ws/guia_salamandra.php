<?php
//-------------------------------------------------------------------------------------------
// Programa      : info_guia_salamandra.php 
// Realizado por : Daniel Durand
// Fecha Elab.   : 19/11/2014
// Descripcion   : Este programa provee informacion de una guia, al sistema administrativo
//                 Salamandra 
//-------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');

function guia_salamandra($strNumeGuia) {
	$strXmlxInic = "<?xml version='1.0' encoding='UTF-8'?><error></error>";
	if (get_magic_quotes_runtime()) {
   	$strXmlxInic = stripslashes($strXmlxInic);
	}
	$error = simplexml_load_string($strXmlxInic);
	$blnTodoOkey = true;
	if (strlen($strNumeGuia) > 0) {
		$objGuia = Guia::Load($strNumeGuia);
		if ($objGuia) {
			$strXmlxInic = "<?xml version='1.0' encoding='UTF-8'?><guia></guia>";
			if (get_magic_quotes_runtime()) {
		   	$strXmlxInic = stripslashes($strXmlxInic);
			}
			$xml = simplexml_load_string($strXmlxInic);

			$xml->addAttribute('numero',$strNumeGuia);
			$xlmNumeCedu = $xml->addChild('cedula',$objGuia->CedulaRif);
			$xlmNombClie = $xml->addChild('nombre',$objGuia->NombRemi);
			$xlmTeleRemi = $xml->addChild('telefono',$objGuia->TeleRemi);
			$xlmDireRemi = $xml->addChild('direccion',$objGuia->DireRemi);
			$xlmDescCont = $xml->addChild('descripcion_articulo',$objGuia->DescCont);
			$xlmFechGuia = $xml->addChild('fecha',$objGuia->FechGuia->__toString("DD/MM/YYYY"));
			$xlmSucuOrig = $xml->addChild('origen',$objGuia->EstaOrigObject->DescEsta);
			$xlmSucuDest = $xml->addChild('destino',$objGuia->EstaDestObject->DescEsta);
			$xlmPesoGuia = $xml->addChild('peso',$objGuia->PesoGuia);
			$xlmCantPiez = $xml->addChild('piezas',$objGuia->CantPiez);
			$xlmValoDecl = $xml->addChild('valor_declarado',$objGuia->ValorDeclarado);
			$xlmMontBase = $xml->addChild('monto_base',$objGuia->MontoBase);
			$xlmMontIvax = $xml->addChild('monto_iva',$objGuia->MontoIva);
			$xlmMontFran = $xml->addChild('monto_franqueo',$objGuia->MontoFranqueo);
			$xlmMontSegu = $xml->addChild('monto_seguro',$objGuia->MontoSeguro);
			$xlmMontTota = $xml->addChild('monto_total',$objGuia->MontoTotal);
		} else {
			$blnTodoOkey = false;
			$mensaje = $error->addChild('mensaje',"No existe la guia ".$strNumeGuia);
		}
	} else {
		$blnTodoOkey = false;
		$mensaje = $error->addChild('mensaje',"Debe proporcionar un Nro. de Guia");
	}
	if ($blnTodoOkey) {
		return $xml->asXML();
	} else {
		return $error->asXML();
	}
}

// function guia_salamandra($strNumeGuia) {
// 	$error = new crxml();
// 	$blnTodoOkey = true;
// 	if (strlen($strNumeGuia) > 0) {
// 		$objGuia = Guia::Load($strNumeGuia);
// 		if ($objGuia) {
// 			$xml = new crxml();
// 			$guia = $xml->guia;
// 			$guia['numero'] = $strNumeGuia;
// 			$guia->cedula = $objGuia->CedulaRif;
// 			$guia->nombre = $objGuia->NombRemi;
// 			$guia->telefono = $objGuia->TeleRemi;
// 			$guia->direccion = $objGuia->DireRemi;
// 			$guia->descripcion_articulo = $objGuia->DescCont;
// 			$guia->fecha = $objGuia->FechGuia->__toString("DD/MM/YYYY");
// 			$guia->origen = $objGuia->EstaOrigObject->DescEsta;
// 			$guia->destino = $objGuia->EstaDestObject->DescEsta;
// 			$guia->peso = $objGuia->PesoGuia;
// 			$guia->piezas = $objGuia->CantPiez;
// 			$guia->valor_declarado = $objGuia->ValorDeclarado;
// 			$guia->monto_base = $objGuia->MontoBase;
// 			$guia->monto_iva = $objGuia->MontoIva;
// 			$guia->monto_franqueo = $objGuia->MontoFranqueo;
// 			$guia->monto_seguro = $objGuia->MontoSeguro;
// 			$guia->monto_total = $objGuia->MontoTotal;
// 		} else {
// 			$error->mensaje = "No existe la guia ".$strNumeGuia;
// 			$blnTodoOkey = false;
// 		}
// 	} else {
// 		$error->mensaje = "Debe proporcionar un Nro. de Guia";
// 		$blnTodoOkey = false;
// 	}
// 	if ($blnTodoOkey) {
// 		return $xml->xml();
// 	} else {
// 		return $error->xml();
// 	}
// }
?>
