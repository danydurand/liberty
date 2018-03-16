<?php
//--------------------------------------------------------------------------
// Programa      : credito_salamandra.php
// Elaborado por : Daniel Durand
// Fecha Elab.   : 19/11/2014
// Descripcion   : Este programa genera un XML que muestra todas las guias
//                 credito dentro del rango de fechas proporcionados.  
//                 Esta informacion es el INPUT del Sistema Administrativo
//                 Salamandra.
//--------------------------------------------------------------------------
require_once('qcubed.inc.php');

function credito_salamandra($dttFechInic,$dttFechFina) {
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
	//------------------------------------------------
	// Se verifica el rango de fechas proporcionado
	//------------------------------------------------
	if (!is_date($dttFechInic)) {
		$blnTodoOkey = false;
		$error->mensaje = "Fecha Inicial Invalida";
	}
	if ($blnTodoOkey) {
		if (!is_date($dttFechFina)) {
			$blnTodoOkey = false;
			$error->mensaje = "Fecha Final Invalida";
		}
	}
	if ($blnTodoOkey) {
		//------------------------------------
		// Condiciones de busqueda del Query 
		//------------------------------------
		$strCondWher = "
        from guia, master_cliente
       where guia.codi_clie = master_cliente.codi_clie
         and guia.trans_fac = 0
         and guia.sistema_id != 'int'
         and codi_ckpt != 'NR'
         and master_cliente.codi_clie != 1023
         and master_cliente.codigo_interno not in ('".implode("','",$arrExclCodi)."')
         and master_cliente.tipo_cliente = ".TipoClienteType::CREDITO."
         and fech_guia between '".$dttFechInic."' and '".$dttFechFina."'
       order by master_cliente.codigo_interno, nume_guia
      ";
		//---------------------------------
		// Query para el contar registros 
		//---------------------------------
		$strCadeCoun = "select count(*) as cant_regi ".$strCondWher;
		//---------------------------------
		// Query para seleccionar campos
		//---------------------------------
		$strCadeSqlx = "
      select nume_guia,
             master_cliente.codigo_interno,
             master_cliente.nume_drif,
             nomb_remi,
             tele_remi,
             date_format(fech_guia,'%d/%m/%Y') fech_guia,
             esta_orig,
             esta_dest,
             peso_guia,
             nomb_dest,
             tele_dest,
             dire_dest,
             desc_cont,
             monto_base,
             monto_iva,
             monto_franqueo,
             monto_seguro,
             monto_total,
             tipo_guia,
             cant_piez,
             valor_declarado,
             codi_ckpt
      ";
      $strCadeSqlx .= $strCondWher;
      // echo $strCadeSqlx;
      // exit(0);
		//------------------------------------------------------------------------
		// Se verifica la existencia de registros que satisfagan las condiciones
		//------------------------------------------------------------------------
		$objDatabase = Guia::GetDatabase();
		$objDbResult = $objDatabase->Query($strCadeCoun);
		$mixRegistro = $objDbResult->FetchArray();
		if ($mixRegistro['cant_regi'] > 0) {
			//--------------------------------------------------------
			// Sabiendo que hay registros, se seleccionan y procesan 
			//--------------------------------------------------------
			$objDbResult = $objDatabase->Query($strCadeSqlx);
			$strXmlxInic = "<?xml version='1.0' encoding='UTF-8'?><guias></guias>";
			if (get_magic_quotes_runtime()) {
		   	$strXmlxInic = stripslashes($strXmlxInic);
			}
			$xml = simplexml_load_string($strXmlxInic);
			while ($mixRegistro = $objDbResult->FetchArray()) {
				$strRazoSoci = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['nomb_remi']));
				$strNombDest = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['nomb_dest']));
				$strTeleRemi = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['tele_remi']));
				$strTeleDest = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['tele_dest']));
				$strDireDest = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['dire_dest']));
				$strDescCont = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['desc_cont']));
				//------------------
				// Se arma el XML
				//------------------
				$xmlNodoGuia = $xml->addChild('guia');
				// $xmlNodoGuia->addAttribute('numero',$mixRegistro['nume_guia']);
				$xlmNumeGuia = $xmlNodoGuia->addChild('numero',$mixRegistro['nume_guia']);
				$xlmCodiClie = $xmlNodoGuia->addChild('cliente',$mixRegistro['codigo_interno']);
				$xlmCeduRifx = $xmlNodoGuia->addChild('cedula_rif',$mixRegistro['nume_drif']);
				$xlmRazoSoci = $xmlNodoGuia->addChild('razon_social',$strRazoSoci);
				$xlmTeleRemi = $xmlNodoGuia->addChild('telefono',$strTeleRemi);
				$xlmFechGuia = $xmlNodoGuia->addChild('fecha',$mixRegistro['fech_guia']);
				$xlmEstaOrig = $xmlNodoGuia->addChild('origen',$mixRegistro['esta_orig']);
				$xlmEstaDest = $xmlNodoGuia->addChild('destino',$mixRegistro['esta_dest']);
				$xlmPesoGuia = $xmlNodoGuia->addChild('peso',$mixRegistro['peso_guia']);
				$xlmNombDest = $xmlNodoGuia->addChild('nombre_destinatario',$strNombDest);
				$xlmTeleDest = $xmlNodoGuia->addChild('telefono_destinatario',$strTeleDest);
				$xlmDireDest = $xmlNodoGuia->addChild('direccion_destinatario',$strDireDest);
				$xlmDescCont = $xmlNodoGuia->addChild('contenido',$strDescCont);
				$xlmMontBase = $xmlNodoGuia->addChild('monto_base',$mixRegistro['monto_base']);
				$xlmMontIvax = $xmlNodoGuia->addChild('monto_iva',$mixRegistro['monto_iva']);
				$xlmMontFran = $xmlNodoGuia->addChild('monto_franqueo',$mixRegistro['monto_franqueo']);
				$xlmMontSegu = $xmlNodoGuia->addChild('monto_seguro',$mixRegistro['monto_seguro']);
				$xlmMontTota = $xmlNodoGuia->addChild('monto_total',$mixRegistro['monto_total']);
				$xlmModaPago = $xmlNodoGuia->addChild('modalidad_pago',TipoGuiaType::ToStringCorto($mixRegistro['tipo_guia']));
				$xlmCantPiez = $xmlNodoGuia->addChild('cantidad_piezas',$mixRegistro['cant_piez']);
				$xlmValoDecl = $xmlNodoGuia->addChild('valor_declarado',$mixRegistro['valor_declarado']);
				$xlmCodiCkpt = $xmlNodoGuia->addChild('ultimo_checkpoint',$mixRegistro['codi_ckpt']);
			}
			return $xml->asXML();
		} else {
			$blnTodoOkey = false;
			$error->addChild('mensaje','No hay guias disponibles en el rango especificado');
		}
	}
	if (!$blnTodoOkey) {
		return $error->asXML();
	}
}

// function credito_salamandra($dttFechInic,$dttFechFina) {
// 	//-----------------------------------------------------------------------
// 	// Aqui se definen algunos codigos de Clientes que no deben ser tomados
// 	// en cuenta a la hora de generar el xml
// 	//-----------------------------------------------------------------------
// 	$arrExclCodi   = array();
// 	$arrExclCodi[] = 'CCS01'; 
// 	$arrExclCodi[] = 'CCS02'; 
// 	$arrExclCodi[] = 'CCS03'; 
// 	$arrExclCodi[] = 'VLN01'; 
// 	$arrExclCodi[] = 'VLN02'; 
// 	$arrExclCodi[] = 'VLN03'; 
// 	$arrExclCodi[] = 'MAR01'; 
// 	$arrExclCodi[] = 'MAR02'; 
// 	$arrExclCodi[] = 'MAR03'; 
// 	$arrExclCodi[] = 'BRM01'; 
// 	$arrExclCodi[] = 'BRM02'; 
// 	$arrExclCodi[] = 'BRM03'; 
// 	$arrExclCodi[] = 'BLA01'; 
// 	$arrExclCodi[] = 'BLA02'; 
// 	$arrExclCodi[] = 'BLA03'; 
// 	$arrExclCodi[] = 'CMAIL'; 
// 	$error = new crxml();
// 	$blnTodoOkey = true;
// 	//------------------------------------------------
// 	// Se verifica el rango de fechas proporcionado
// 	//------------------------------------------------
// 	if (!is_date($dttFechInic)) {
// 		$blnTodoOkey = false;
// 		$error->mensaje = "Fecha Inicial Invalida";
// 	}
// 	if ($blnTodoOkey) {
// 		if (!is_date($dttFechFina)) {
// 			$blnTodoOkey = false;
// 			$error->mensaje = "Fecha Final Invalida";
// 		}
// 	}
// 	if ($blnTodoOkey) {
// 		//------------------------------------
// 		// Condiciones de busqueda del Query 
// 		//------------------------------------
// 		$strCondWher = "
//         from guia, master_cliente
//        where guia.codi_clie = master_cliente.codi_clie
//          and guia.trans_fac = 0
//          and guia.sistema_id != 'int'
//          and codi_ckpt != 'NR'
//          and master_cliente.codi_clie != 1023
//          and master_cliente.codigo_interno not in ('".implode("','",$arrExclCodi)."')
//          and master_cliente.tipo_cliente = ".TipoClienteType::CREDITO."
//          and fech_guia between '".$dttFechInic."' and '".$dttFechFina."'
//        order by master_cliente.codigo_interno, nume_guia
//       ";
// 		//---------------------------------
// 		// Query para el contar registros 
// 		//---------------------------------
// 		$strCadeCoun = "select count(*) as cant_regi ".$strCondWher;
// 		//---------------------------------
// 		// Query para seleccionar campos
// 		//---------------------------------
// 		$strCadeSqlx = "
//       select nume_guia,
//              master_cliente.codigo_interno,
//              date_format(fech_guia,'%d/%m/%Y') fech_guia,
//              esta_orig,
//              esta_dest,
//              peso_guia,
//              master_cliente.nume_drif,
//              nomb_dest,
//              tele_dest,
//              dire_dest,
//              desc_cont,
//              monto_base,
//              monto_iva,
//              monto_franqueo,
//              monto_seguro,
//              monto_total
//       ";
//       $strCadeSqlx .= $strCondWher;
// 		//------------------------------------------------------------------------
// 		// Se verifica la existencia de registros que satisfagan las condiciones
// 		//------------------------------------------------------------------------
// 		$objDatabase = Guia::GetDatabase();
// 		$objDbResult = $objDatabase->Query($strCadeCoun);
// 		$mixRegistro = $objDbResult->FetchArray();
// 		if ($mixRegistro['cant_regi'] > 0) {
// 			//--------------------------------------------------------
// 			// Sabiendo que hay registros, se seleccionan y procesan 
// 			//--------------------------------------------------------
// 			$objDbResult = $objDatabase->Query($strCadeSqlx);
// 			$xml = new crxml();
// 			$guias = $xml->guias;
// 			$i = 0;
// 			while ($mixRegistro = $objDbResult->FetchArray()) {
// 				//------------------
// 				// Se arma el XML
// 				//------------------
// 				$guias->guia[$i]['numero'] = $mixRegistro['nume_guia'];
// 				$guias->guia[$i]->cliente = $mixRegistro['codigo_interno'];
// 				$guias->guia[$i]->fecha = $mixRegistro['fech_guia'];
// 				$guias->guia[$i]->peso = $mixRegistro['peso_guia'];
// 				$guias->guia[$i]->cedula_rif = $mixRegistro['nume_drif'];
// 				$guias->guia[$i]->nombre_destinatario = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['nomb_dest']));
// 				$guias->guia[$i]->telefono_destinatario = utf8_decode($mixRegistro['tele_dest']);
// 				$guias->guia[$i]->direccion_destinatario = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['dire_dest']));
// 				$guias->guia[$i]->contenido = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['desc_cont']));
// 				$guias->guia[$i]->monto_base = $mixRegistro['monto_base'];
// 				$guias->guia[$i]->monto_iva = $mixRegistro['monto_iva'];
// 				$guias->guia[$i]->monto_franqueo = $mixRegistro['monto_franqueo'];
// 				$guias->guia[$i]->monto_seguro = $mixRegistro['monto_seguro'];
// 				$guias->guia[$i]->monto_total = $mixRegistro['monto_total'];
// 				$i++;
// 			}
// 			return $xml->xml();
// 		} else {
// 			$blnTodoOkey = false;
// 			$error->mensaje = "No hay guias disponibles en el rango especificado";
// 		}
// 	}
// 	if (!$blnTodoOkey) {
// 		return $error->xml();
// 	}
// }
?>