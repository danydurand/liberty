<?php
//--------------------------------------------------------------------------
// Programa      : clientes_salamandra.php
// Elaborado por : Daniel Durand
// Fecha Elab.   : 20/11/2014
// Descripcion   : Este programa genera un XML que contiene informacion de
//                 los Clientes Credito de Liberty Express.  
//--------------------------------------------------------------------------
require_once('qcubed.inc.php');

function clientes_salamandra() {
	//-----------------------------------------------------------------------
	// Aqui se definen algunos codigos de Clientes que no deben ser tomados
	// en cuenta a la hora de generar el xml
	//-----------------------------------------------------------------------
	$arrExclCodi   = array();
	$arrExclCodi[] = 'CCS01'; 
	$arrExclCodi[] = 'CCS02'; 
	$arrExclCodi[] = 'CCS03'; 
	$arrExclCodi[] = 'VLN01'; 
	$arrExclCodi[] = 'VLN02'; 
	$arrExclCodi[] = 'VLN03'; 
	$arrExclCodi[] = 'MAR01'; 
	$arrExclCodi[] = 'MAR02'; 
	$arrExclCodi[] = 'MAR03'; 
	$arrExclCodi[] = 'BRM01'; 
	$arrExclCodi[] = 'BRM02'; 
	$arrExclCodi[] = 'BRM03'; 
	$arrExclCodi[] = 'BLA01'; 
	$arrExclCodi[] = 'BLA02'; 
	$arrExclCodi[] = 'BLA03'; 
	$arrExclCodi[] = 'CMAIL'; 
	$strXmlxInic = "<?xml version='1.0' encoding='UTF-8'?><error></error>";
	if (get_magic_quotes_runtime()) {
   	$strXmlxInic = stripslashes($strXmlxInic);
	}
	$error = simplexml_load_string($strXmlxInic);
	$blnTodoOkey = true;
	//------------------------------------
	// Condiciones de busqueda del Query 
	//------------------------------------
	$strCondWher = "
     from master_cliente
    where master_cliente.codi_clie != 1023
      and master_cliente.codigo_interno not in ('".implode("','",$arrExclCodi)."')
      and master_cliente.tipo_cliente = ".TipoClienteType::CREDITO."
    order by codigo_interno
   ";
	//---------------------------------
	// Query para el contar registros 
	//---------------------------------
	$strCadeCoun = "select count(*) as cant_regi ".$strCondWher;
	//---------------------------------
	// Query para seleccionar campos
	//---------------------------------
	$strCadeSqlx = "
   select codigo_interno,
   		 nume_drif,
   		 nomb_clie,
   		 dire_fisc,
   		 codi_esta,
   		 codi_stat,
   		 tele_cona
   ";
   $strCadeSqlx .= $strCondWher;
	//------------------------------------------------------------------------
	// Se verifica la existencia de registros que satisfagan las condiciones
	//------------------------------------------------------------------------
	$objDatabase = MasterCliente::GetDatabase();
	$objDbResult = $objDatabase->Query($strCadeCoun);
	$mixRegistro = $objDbResult->FetchArray();
	if ($mixRegistro['cant_regi'] > 0) {
		//--------------------------------------------------------
		// Sabiendo que hay registros, se seleccionan y procesan 
		//--------------------------------------------------------
		$objDbResult = $objDatabase->Query($strCadeSqlx);
		$strXmlxInic = "<?xml version='1.0' encoding='UTF-8'?><clientes></clientes>";
		if (get_magic_quotes_runtime()) {
	   	$strXmlxInic = stripslashes($strXmlxInic);
		}
		$xml = simplexml_load_string($strXmlxInic);
		while ($mixRegistro = $objDbResult->FetchArray()) {
			$strNombClie = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['nomb_clie']));
			$strDireFisc = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['dire_fisc']));
			$strTeleCona = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['tele_cona']));
			$xmlNodoClie = $xml->addChild('cliente');
			$xmlNodoClie->addAttribute('codigo',$mixRegistro['codigo_interno']);
			$xlmNumeDrif = $xmlNodoClie->addChild('cedula_rif',$mixRegistro['nume_drif']);
			$xlmNombClie = $xmlNodoClie->addChild('razon_social',$strNombClie);
			$xlmDireFisc = $xmlNodoClie->addChild('direccion_fiscal',$strDireFisc);
			$xlmTeleCona = $xmlNodoClie->addChild('telefono',$strTeleCona);
			$xlmCodiEsta = $xmlNodoClie->addChild('sucursal',$mixRegistro['codi_esta']);
			$xlmStatClie = $xmlNodoClie->addChild('status',$mixRegistro['codi_stat']);
		}
		// header('Content-Type: text/xml');
		return $xml->asXML();
	} else {
		$blnTodoOkey = false;
		$mensaje = $error->addChild('mensaje','No hay Clientes disponibles');
	}
	if (!$blnTodoOkey) {
		// header('Content-Type: text/xml');
		return $error->asXML();
	}
}
?>