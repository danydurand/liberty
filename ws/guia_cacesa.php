<?php
//-------------------------------------------------------------------------------------------
// Programa      : guia.php 
// Realizado por : Daniel Durand
// Fecha Elab.   : 12/06/2015
// Descripcion   : Este programa genera un XML con la informacion de una guia
//-------------------------------------------------------------------------------------------
require_once('../util/includes/config.php');
require_once(__PROG_DIRECTORY__.'/includes/prepend.inc.php');
require_once('../util/includes/funciones.php');

function guia_cacesa($strNumeGuia) {
	//---------------------------------------------------------------
	// Se genera un XLM para canalizar cualquier error del proceso
	//---------------------------------------------------------------
	$strXmlxInic = "<?xml version='1.0' encoding='UTF-8'?><error></error>";
	if (get_magic_quotes_runtime()) {
   	$strXmlxInic = stripslashes($strXmlxInic);
	}
	$error = simplexml_load_string($strXmlxInic);
	$blnTodoOkey = true;
	if (strlen($strNumeGuia) > 0) {
		$arrGuiaExte = Guia::LoadArrayByGuiaExterna($strNumeGuia);
		foreach ($arrGuiaExte as $objGuia) {
		}
		// $objGuia = Guia::LoadArrayByGuiaExterna($strNumeGuia);
		if ($objGuia) {
			//-------------------------------------------------------
			// Se obtiene un arreglo de los Checkpoints de la Guia
			//-------------------------------------------------------
			$objClauOrde   = QQ::Clause();
			$objClauOrde[] = QQ::OrderBy(QQN::GuiaCkpt()->FechCkpt,false); 
			$objClauOrde[] = QQ::OrderBy(QQN::GuiaCkpt()->HoraCkpt,false); 
			$arrCkptGuia   = $objGuia->GetGuiaCkptAsNumeArray($objClauOrde);
			//-----------------------------------------------------------
			// Se obtiene un arreglo del Registro de Trabajo de la Guia
			//-----------------------------------------------------------
			$objClauOrde   = QQ::Clause();
			$objClauOrde[] = QQ::OrderBy(QQN::RegistroTrabajo()->Fecha,false); 
			$objClauOrde[] = QQ::OrderBy(QQN::RegistroTrabajo()->Hora,false); 
			$arrRegiTrab   = $objGuia->GetRegistroTrabajoArray($objClauOrde);
			//---------------------------------------
			// Se genera el XLM de la Guia como tal 
			//---------------------------------------
 			$strXmlxInic   = "<?xml version='1.0' encoding='UTF-8'?><guia></guia>";
			if (get_magic_quotes_runtime()) {
		   	$strXmlxInic = stripslashes($strXmlxInic);
			}
			$xml = simplexml_load_string($strXmlxInic);
			$xmlEncaGuia = $xml->addChild('encabezado');
			$xmlEncaGuia->addChild('guia_nro',$objGuia->NumeGuia);
			$xmlEncaGuia->addChild('fecha',$objGuia->FechGuia->__toString("YYYY-MM-DD"));
			$xmlEncaGuia->addChild('origen',$objGuia->EstaOrig);
			$xmlEncaGuia->addChild('destino',$objGuia->EstaDest);
			$xmlEncaGuia->addChild('peso',$objGuia->PesoGuia);
			$xmlInfoRemi = $xml->addChild('remitente');
			$xmlInfoRemi->addChild('nombre',$objGuia->NombRemi);
			$xmlInfoRemi->addChild('direccion',$objGuia->DireRemi);
			$xmlInfoRemi->addChild('telefono',$objGuia->TeleRemi);
			$xmlInfoDest = $xml->addChild('destinatario');
			$xmlInfoDest->addChild('nombre',$objGuia->NombDest);
			$xmlInfoDest->addChild('direccion',$objGuia->DireDest);
			$xmlInfoDest->addChild('telefono',$objGuia->TeleDest);
			foreach ($arrCkptGuia as $objCkptGuia) {
				if ($objCkptGuia->CodiCkptObject->TipoCkpt == SdeTipoCkptType::PUBLICO) {
					$xmlCkptGuia = $xml->addChild('checkpoint');
					$xmlCkptGuia->addChild('codigo',$objCkptGuia->CodiCkpt);
					$xmlCkptGuia->addChild('observacion',$objCkptGuia->TextObse);
					$xmlCkptGuia->addChild('sucursal',$objCkptGuia->CodiEsta);
					$xmlCkptGuia->addChild('fecha',$objCkptGuia->FechCkpt->__toString("YYYY-MM-DD"));
					$xmlCkptGuia->addChild('hora',$objCkptGuia->HoraCkpt);
				}
			}
			foreach ($arrRegiTrab as $objRegiTrab) {
				if (trim($objRegiTrab->Comentario) != 'CONSULTO LA GUIA') {
					$xmlRegiTrab = $xml->addChild('registro_de_trabajo');
					$xmlRegiTrab->addChild('comentario',$objRegiTrab->Comentario);
					$xmlRegiTrab->addChild('sucursal',$objRegiTrab->SucursalId);
					$xmlRegiTrab->addChild('fecha',$objRegiTrab->Fecha->__toString("YYYY-MM-DD"));
					$xmlRegiTrab->addChild('hora',$objRegiTrab->Hora);
					$xmlRegiTrab->addChild('usuario',$objRegiTrab->Usuario->LogiUsua);
				}
			}
		} else {
			$blnTodoOkey = false;
			$mensaje = $error->addChild('mensaje',"No existe la Guia ".$strNumeGuia);
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
?>
