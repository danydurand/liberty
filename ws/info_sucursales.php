<?php
require_once('../util/includes/config.php');
require_once(__PROG_DIRECTORY__.'/includes/prepend.inc.php');
require_once('../util/includes/funciones.php');
require_once('./crxml/crXml.php');

//info_sucursales();

function info_sucursales() {
	$error = new crxml();
	$blnTodoOkey = true;

	$objClausula   = QQ::Clause();
	$objClausula[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
	$objClausula[] = QQ::Equal(QQN::Estacion()->EsUnAlmacen,SinoType::NO);
	$objClausula[] = QQ::NotEqual(QQN::Estacion()->Region,5);
	$objClausula[] = QQ::NotEqual(QQN::Estacion()->DescEsta,"TODOS");
	$objClauOrde   = QQ::Clause();
	$objClauOrde[] = QQ::OrderBy(QQN::Estacion()->DescEsta);
	$arrSucursal   = Estacion::QueryArray(QQ::AndCondition($objClausula),$objClauOrde);
	if ($arrSucursal) {
		$xml = new crxml();
		$sucursales = $xml->sucursales;
		//		$sucursal = $sucursales->sucursal;
		$i = 0;
		foreach ($arrSucursal as $objSucursal) {
			//$sucursales->sucursal[$i]['nombre'] = $objSucursal->DescEsta;
			$sucursales->sucursal[$i]->nombre = $objSucursal->DescEsta;
			$sucursales->sucursal[$i]->siglas = $objSucursal->CodiEsta;
			$sucursales->sucursal[$i]->direccion = $objSucursal->TextObse;
			$sucursales->sucursal[$i]->contacto = $objSucursal->NombCont;
			$sucursales->sucursal[$i]->email = $objSucursal->DireMailPrincipal;
			$sucursales->sucursal[$i]->telefonos = $objSucursal->NumeTele;
			$sucursales->sucursal[$i]->nro_de_dias = $objSucursal->NumeDias;
			$sucursales->sucursal[$i]->oficina = SinoType::ToString($objSucursal->OficinaFisica);

			$i++;
		}
	} else {
		$blnTodoOkey = false;
		$error->mensaje = "No existe informacion de las Sucursales";
	}
	if ($blnTodoOkey) {
		return $xml->xml();
	} else {
		return $error->xml();
	}
}
