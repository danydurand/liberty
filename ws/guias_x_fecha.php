<?php
//--------------------------------------------------------------------------
// Programa      : guias_x_fecha.php
// Elaborado por : Daniel Durand
// Fecha Elab.   : 11/11/2014
// Descripcion   : Este programa genera un XML que muestra todas las guias
//                 nacionales emitidas en un rango de fechas.
//--------------------------------------------------------------------------
require_once('../util/includes/config.php');
require_once(__PROG_DIRECTORY__.'/includes/prepend.inc.php');
require_once('../util/includes/funciones.php');
require_once('./crxml/crXml.php');


function guias_x_fecha($dttFechInic,$dttFechFina) {
	$error = new crxml();
	//-------------------------------------------
	// Se verifican las fechas
	//-------------------------------------------
	$arrValiFech = validarFechas($dttFechInic,$dttFechFina);
	$blnTodoOkey = $arrValiFech['blnTodoOkey'];
	$strTextErro = $arrValiFech['strTextErro'];
	//-------------------------------------------
	// Se verifica la existencia del Cliente
	//-------------------------------------------
	if ($blnTodoOkey) {
		//----------------------------------------------------------------------------------------
		// Una vez realizados todas las validaciones, se procede a generar el archivo XML con
		// las guias del Cliente
		//----------------------------------------------------------------------------------------
		$objClausula   = QQ::Clause();
		$objClausula[] = QQ::GreaterOrEqual(QQN::Guia()->FechGuia,$dttFechInic);
		$objClausula[] = QQ::LessOrEqual(QQN::Guia()->FechGuia,$dttFechFina);
		$objClausula[] = QQ::NotEqual(QQN::Guia()->SistemaId,'');
		$objClausula[] = QQ::Equal(QQN::Guia()->CodiClie,$objCliente->CodiClie);
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

function validarFechas($dttFechInic,$dttFechFina) {
	$blnTodoOkey = true;
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
	return $blnTodoOkey;
}

?>