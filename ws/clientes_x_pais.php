<?php
//--------------------------------------------------------------------------
// Programa      : clientes_x_pais.php
// Elaborado por : Daniel Durand
// Fecha Elab.   : 09/04/2014
// Descripcion   : Este programa genera un XML que muestra los Clientes
//                 del pais cuyas siglas entran como parámetro.
//--------------------------------------------------------------------------
require_once('../util/includes/config.php');
require_once(__PROG_DIRECTORY__.'/includes/prepend.inc.php');
require_once('../util/includes/funciones.php');
require_once('./crxml/crXml.php');

// $strSiglPais = $_REQUEST['Siglas'];
// clientes_x_pais($strSiglPais);

function clientes_x_pais($strSiglPais) {
	//-------------------------------------------------------------------
	// Aqui se realiza la validacion de los parametros proporcionados
	//-------------------------------------------------------------------
	$error = new crxml();
	$blnTodoOkey = true;
	//-------------------------------------------
	// Se verifica la existencia del pais
	//-------------------------------------------
	if (strlen($strSiglPais) > 0) {
		$strSiglPais = strtoupper($strSiglPais);
		$objPais = PaisCT::LoadBySiglas($strSiglPais);
		if (!$objPais) {
			$blnTodoOkey = false;
			$error->mensaje = "No existe pais con esas siglas";
		}
	} else {
		$blnTodoOkey = false;
		$error->mensaje = "Debe proporcionar las siglas del país a procesar (Ej: CR ó DO)";
	}
	if ($blnTodoOkey) {
		//----------------------------------------------------------------------------------------
		// Query para seleccionar los Clientes del pais indicado
		//----------------------------------------------------------------------------------------
		$strCadeSqlx = "select nombre_contacto, email 
		                  from cliente_i 
		                 where pais_id = ".$objPais->Id;
		$objDatabase = ClienteICT::GetDatabase();
		$objDbResult = $objDatabase->Query($strCadeSqlx);
		//----------------------------------------------------------------------------------------
		// Se prepara el objeto XML que sera generado
		//----------------------------------------------------------------------------------------
		$xml = new crxml();
		$clientes_x_pais = $xml->clientes_x_pais;
		$clientes_x_pais['nombre'] = $objPais->Nombre;
		$i = 0;
		//----------------------------------------------------------------------------------------
		// Se procesan uno a uno los Clientes seleccionados
		//----------------------------------------------------------------------------------------
		$strDatoClie = '';
		while ($mixRegistro = $objDbResult->FetchArray()) {
			$clientes_x_pais->cliente[$i]->Nombre = utf8_decode($mixRegistro['nombre_contacto']);
			$clientes_x_pais->cliente[$i]->Email = $mixRegistro['email'];
			$strDatoClie .= $mixRegistro['nombre_contacto'].";".$mixRegistro['email']."\n<br>";
			$i++;
		}
		if ($i == 0) {
			$blnTodoOkey = false;
			$error->mensaje = "El pais indicado, no tiene Clientes";
		}
	}
	if ($blnTodoOkey) {
		// return $xml->xml();
		return $strDatoClie;
	} else {
		return $error->xml();
	}
}
?>