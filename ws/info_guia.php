<?php
require_once('qcubed.inc.php');


function info_guia($strNumeGuia) {
	if (strlen($strNumeGuia) > 0) {
		$objGuia = SreGuia::Load($strNumeGuia);
		if ($objGuia) {
			//---------------------------------------------------------
			// Se crea un vector para almacenar los datos de la guia
			//---------------------------------------------------------
			$arrInfoGuia = array();
			$arrInfoGuia['NumeGuia'] = $objGuia->NumeGuia;
			$arrInfoGuia['FechGuia'] = $objGuia->FechGuia->__toString("DD/MM/YYYY");
			if ($objGuia->SistemaId == 'int') {
				$intCodiClie = $objGuia->ClienteId;
			} else {
				$intCodiClie = $objGuia->CodiClieObject->CodigoInterno;
			}
			$arrInfoGuia['EstaOrig'] = $objGuia->EstaOrigObject->DescEsta;
			$arrInfoGuia['EstaDest'] = $objGuia->EstaDestObject->DescEsta;
			$arrInfoGuia['PesoGuia'] = $objGuia->PesoGuia;
			$arrInfoGuia['NombRemi'] = utf8_decode($objGuia->NombRemi);
			$arrInfoGuia['DireRemi'] = utf8_decode($objGuia->DireRemi);
			$arrInfoGuia['TeleRemi'] = utf8_decode($objGuia->TeleRemi);
			$arrInfoGuia['NombDest'] = utf8_decode($objGuia->NombDest);
			$arrInfoGuia['DireDest'] = utf8_decode($objGuia->DireDest);
			$arrInfoGuia['TeleDest'] = utf8_decode($objGuia->TeleDest);
			$arrInfoGuia['CantPiez'] = $objGuia->CantPiez;
			$arrInfoGuia['DescCont'] = utf8_decode($objGuia->DescCont);
			//----------------------------------------------------------------
			// Se identifica la informacion del ultimo checkpoint disponible
			//----------------------------------------------------------------
			$objUltiCkpt = $objGuia->UltiCkptObj();
			if ($objUltiCkpt) {
				$strStatGuia = $objUltiCkpt->TextObse;
				$strFechStat = $objUltiCkpt->FechCkpt->__toString("DD/MM/YYYY");
				$strHoraStat = $objUltiCkpt->HoraCkpt;
				$strSucuStat = $objUltiCkpt->CodiEstaObject->DescEsta;
			} else {
				$strStatGuia = '';
				$strFechStat = '';
				$strHoraStat = '';
				$strSucuStat = '';
			}
			$arrInfoGuia['StatGuia'] = $strStatGuia;
			$arrInfoGuia['FechStat'] = $strFechStat;
			$arrInfoGuia['HoraStat'] = $strHoraStat;
			$arrInfoGuia['SucuStat'] = $strSucuStat;
			$arrInfoGuia['ValoDecl'] = $objGuia->ValorDeclarado;
			$arrInfoGuia['MontBase'] = $objGuia->MontoBase;
			$arrInfoGuia['MontSgro'] = $objGuia->MontoSeguro;
			$arrInfoGuia['MontIvax'] = $objGuia->MontoIva;
			$arrInfoGuia['MontFran'] = $objGuia->MontoFranqueo;
			$arrInfoGuia['MontTota'] = $objGuia->MontoTotal;
			return implode(';',$arrInfoGuia);
		} else {
			return "La Guia No Existe";
		}
	}
}
