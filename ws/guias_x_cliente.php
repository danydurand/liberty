<?php
//--------------------------------------------------------------------------
// Programa      : guias_x_cliente.php
// Elaborado por : Daniel Durand
// Fecha Elab.   : 09/04/2011
// Descripcion   : Este programa genera un XML que muestra todas las guias
//                 de un Cliente dado en un rango de fechas especificado
//--------------------------------------------------------------------------
require_once('../util/includes/config.php');
require_once(__PROG_DIRECTORY__.'/includes/prepend.inc.php');
require_once('../util/includes/funciones.php');
require_once('./crxml/crXml.php');

//$strCodiClie = $_REQUEST['CodiClie'];
//$dttFechInic = $_REQUEST['FechInic'];
//$dttFechFina = $_REQUEST['FechFina'];
//$strClavSecr = $_REQUEST['ClavSecr'];
//guias_x_cliente($strCodiClie,$dttFechInic,$dttFechFina,$strClavSecr);

function guias_x_cliente($strCodiClie,$dttFechInic,$dttFechFina,$strClavSecr) {
	//-------------------------------------------------------------------
	// Aqui se realiza la validacion de los parametros proporcionados
	//-------------------------------------------------------------------
	$error = new crxml();
	$blnTodoOkey = true;
	//-------------------------------------------
	// Se verifica la existencia del Cliente
	//-------------------------------------------
	if (strlen($strCodiClie) > 0) {
		$objCliente = MasterCliente::LoadByCodigoInterno($strCodiClie);
		if ($objCliente) {
			//------------------------------------------------------------------------------------------
			// Se verifica la validez de la Clave Secreta para la ejecucion o consumo de Servicios Web
			//------------------------------------------------------------------------------------------
			if ($objCliente->ClaveServiciosWeb != $strClavSecr) {
				//			if ('Clave' != $strClavSecr) {
				$blnTodoOkey = false;
				$error->mensaje = "Clave Secreta de Servicios Web Invalida";
			}
			if ($blnTodoOkey) {
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
			}
		} else {
			$blnTodoOkey = false;
			$error->mensaje = "Codigo de Cliente Invalido";
		}
	} else {
		$blnTodoOkey = false;
		$error->mensaje = "Se debe proporcionar un Codigo de Cliente";
	}
	if ($blnTodoOkey) {
		//----------------------------------------------------------------------------------------
		// Una vez realizados todas las validaciones, se procede a generar el archivo XML con
		// las guias del Cliente
		//----------------------------------------------------------------------------------------
		$objClausula   = QQ::Clause();
		$objClausula[] = QQ::GreaterOrEqual(QQN::SreGuiaCT()->FechGuia,$dttFechInic);
		$objClausula[] = QQ::LessOrEqual(QQN::SreGuiaCT()->FechGuia,$dttFechFina);
		$objClausula[] = QQ::Equal(QQN::SreGuiaCT()->CodiClie,$objCliente->CodiClie);
		$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::SreGuiaCT()->FechGuia,false);
		$arrGuiaClie   = SreGuiaCT::QueryArray(QQ::AndCondition($objClausula),$objClauOrde);
		if (count($arrGuiaClie) > 0) {
			$xml = new crxml();
			$guias = $xml->guias;
			$i = 0;
			foreach ($arrGuiaClie as $objGuia) {
				//				$guia = $guias[$i]->guia;
				$guias->guia[$i]['numero'] = $objGuia->NumeGuia;
				$guias->guia[$i]->cliente_nac = $objCliente->CodigoInterno;
				$guias->guia[$i]->cliente_int = $objGuia->ClienteId;
				$guias->guia[$i]->fecha = $objGuia->FechGuia->__toString("DD/MM/YYYY");
				$guias->guia[$i]->origen = $objGuia->EstaOrigObject->DescEsta;
				$guias->guia[$i]->destino = $objGuia->EstaDestObject->DescEsta;
				$guias->guia[$i]->peso = $objGuia->PesoGuia;
				$guias->guia[$i]->piezas = $objGuia->CantPiez;
				$guias->guia[$i]->valor_declarado = $objGuia->ValorDeclarado;
				$guias->guia[$i]->remitente = $objGuia->NombRemi;
				$guias->guia[$i]->direccion_remi = $objGuia->DireRemi;
				$guias->guia[$i]->telefono_remi = $objGuia->TeleRemi;
				$guias->guia[$i]->destinatario = $objGuia->NombDest;
				$guias->guia[$i]->direccion_dest = $objGuia->DireDest;
				$guias->guia[$i]->telefono_dest = $objGuia->TeleDest;
				$guias->guia[$i]->cedula = $objGuia->TipoDocumentoId.$objGuia->CedulaRif;

				$i++;
			}
			return $xml->xml();
		} else {
			$blnTodoOkey = false;
			$error->mensaje = "No hay guias disponibles en el rango especificado";
		}
	}
	if (!$blnTodoOkey) {
		return $error->xml();
	}
}
?>