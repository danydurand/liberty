<?php
//--------------------------------------------------------------------------
// Programa      : znc_x_sucursal.php
// Elaborado por : Daniel Durand
// Fecha Elab.   : 09/04/2011
// Descripcion   : Este programa genera un XML que muestra las Zonas No
//                 Cubiertas de una Sucursal dada
//--------------------------------------------------------------------------
require_once('../util/includes/config.php');
require_once(__PROG_DIRECTORY__.'/includes/prepend.inc.php');
require_once('../util/includes/funciones.php');
require_once('./crxml/crXml.php');

//$strNombSucu = $_REQUEST['NombSucu'];
//znc_x_sucursal($strNombSucu);

function znc_x_sucursal($strNombSucu) {
	//-------------------------------------------------------------------
	// Aqui se realiza la validacion de los parametros proporcionados
	//-------------------------------------------------------------------
	$error = new crxml();
	$blnTodoOkey = true;
	//-------------------------------------------
	// Se verifica la existencia de la Sucursal
	//-------------------------------------------
	if (strlen($strNombSucu) > 0) {
		$strNombSucu = strtoupper($strNombSucu);
		$objSucursal = Estacion::LoadByDescEsta($strNombSucu);
		if (!$objSucursal) {
			$blnTodoOkey = false;
			$error->mensaje = "Nombre de Sucursal Invalido";
		}
	} else {
		$blnTodoOkey = false;
		$error->mensaje = "Se debe proporcionar un nombre de Sucursal";
	}
	if ($blnTodoOkey) {
		//----------------------------------------------------------------------------------------
		// Una vez realizados todas las validaciones, se procede a generar el archivo XML con
		// las Zonas No Cubiertas de la Sucursal
		//----------------------------------------------------------------------------------------
		$objClausula   = QQ::Clause();
		$objClausula[] = QQ::Equal(QQN::ZonaNoCubierta()->CodiEsta,$objSucursal->CodiEsta);
		$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::ZonaNoCubierta()->Descripcion);
		$arrZncxSucu   = ZonaNoCubierta::QueryArray(QQ::AndCondition($objClausula),$objClauOrde);
		if (count($arrZncxSucu) > 0) {
			$xml = new crxml();
			$zonas_no_cubiertas = $xml->zonas_no_cubiertas;
			$zonas_no_cubiertas['sucursal'] = $strNombSucu;
			//			$zona = $zonas_no_cubiertas->zona;
			$i = 0;
			foreach ($arrZncxSucu as $objZona) {
				$zonas_no_cubiertas->zona[$i] = $objZona->Descripcion;
				$i++;
			}
		} else {
			$blnTodoOkey = false;
			$error->mensaje = "La Sucursal indicada no tiene ZNC asociadas";
		}
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