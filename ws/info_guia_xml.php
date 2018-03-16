<?php
require_once('../util/includes/config.php');
require_once(__PROG_DIRECTORY__.'/includes/prepend.inc.php');
require_once('./crxml/crXml.php');

function info_guia_xml($strNumeGuia) {
	//-------------------------------------------------------------------
	// Aqui se realiza la validacion de los parametros proporcionados
	//-------------------------------------------------------------------
	$error = new crxml();
	$blnTodoOkey = true;
	if (strlen($strNumeGuia) > 0) {
		$objGuia = SreGuiaCT::Load($strNumeGuia);
		if ($objGuia) {
			if (strlen($objGuia->CodiClie)) {
				$objCliente = MasterCliente::Load($objGuia->CodiClie);
				$strCodiClie = $objCliente->CodigoInterno;
			} else {
				$strCodiClie = "N/A";
			}
			$xml = new crxml();
			$guia = $xml->guia;
			$guia['numero'] = $strNumeGuia;
			$guia->cliente_nac = $strCodiClie;
			$guia->cliente_int = $objGuia->ClienteId;
			$guia->fecha = $objGuia->FechGuia->__toString("DD/MM/YYYY");
			$guia->origen = $objGuia->EstaOrigObject->DescEsta;
			$guia->destino = $objGuia->EstaDestObject->DescEsta;
			$guia->peso = $objGuia->PesoGuia;
			$guia->piezas = $objGuia->CantPiez;
			$guia->valor_declarado = $objGuia->ValorDeclarado;
			$guia->remitente = $objGuia->NombRemi;
			$guia->direccion_remi = $objGuia->DireRemi;
			$guia->telefono_remi = $objGuia->TeleRemi;
			$guia->destinatario = $objGuia->NombDest;
			$guia->direccion_dest = $objGuia->DireDest;
			$guia->telefono_dest = $objGuia->TeleDest;
			$guia->cedula = $objGuia->TipoDocumentoId.$objGuia->CedulaRif;
		} else {
			$error->mensaje = "No existe la guia ".$strNumeGuia;
			$blnTodoOkey = false;
		}
	} else {
		$error->mensaje = "Debe proporcionar un Nro. de Guia";
		$blnTodoOkey = false;
	}
	if ($blnTodoOkey) {
		return $xml->xml();
		//		echo $xml->xml();
	} else {
		return $error->xml();
		//		echo $error->xml();
	}

}
?>
