<?php
//-----------------------------------------------------------------------------------------
// Programa      : cliente.php
// Elaborado por : Daniel Durand
// Fecha Elab.   : 21/03/2011
// Descripcion   : Este programa consume los servicios web ofrecidos por Liberty Express
//-----------------------------------------------------------------------------------------

require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/nusoap/lib/nusoap.php');

//require_once('/appl/lib/nusoap.php');
$cliente = new nusoap_client('http://localhost/newliberty/ws/ws_liberty.php');
//$cliente = new nusoap_client('http://www.app-libertyexpress.com/liberty/ws/ws_liberty.php');

if (isset($_REQUEST['NombRuti'])) {
	$strNombRuti = $_REQUEST['NombRuti'];
	switch ($strNombRuti) {
		case "retorno_if":
			if (isset($_REQUEST['id']) && isset($_REQUEST['td']) && isset($_REQUEST['df']) && isset($_REQUEST['mf']) && isset($_REQUEST['fi']) && isset($_REQUEST['hi'])) {
				$arrParaServ = array(
					'intId' => $_GET['id'],
					'strTipoDocu' => $_GET['td'],
					'strDocuFisc' => $_GET['df'],
					'strMaquFisc' => $_GET['mf'],
					'strFechImpr' => $_GET['fi'],
					'strHoraImpr' => $_GET['hi']
				);
				$resultado = $cliente->call('retorno_if',$arrParaServ);
				header('Content-Type: text/xml');
				echo $resultado;
			} else {
				echo "Se requiren 6 parametros: id (id de la FAC/NDC), td (Tipo de Documento F/N), df (Nro de Documento Fiscal), mf (Maquina Fiscal), fi (Fecha de Impresion), hi (Hora de Impresion)<br>";
			}
			break;
		case "guia_cacesa":
			if (isset($_REQUEST['id'])) {
				$arrParaServ = array('strNumeGuia' => $_GET['id']);
				$resultado = $cliente->call('guia_cacesa',$arrParaServ);
				header('Content-Type: text/xml');
				echo $resultado;
			} else {
				echo "Se requiren 1 parametro: id (id de la guia)<br>";
			}
			break;
		case "ndc":
			if (isset($_REQUEST['id'])) {
				$arrParaServ = array('intId' => $_GET['id']);
				$resultado = $cliente->call('ndc',$arrParaServ);
				header('Content-Type: text/xml');
				echo $resultado;
			} else {
				echo "Se requiren 1 parametro: id (id de la ndc)<br>";
			}
			break;
		case "test":
			if (isset($_REQUEST['id'])) {
				$arrParaServ = array('intId' => $_GET['id']);
				$resultado = $cliente->call('test',$arrParaServ);
				header('Content-Type: text/xml');
				echo $resultado;
			} else {
				echo "Se requiren 1 parametro: id (id de la factura)<br>";
			}
			break;
		case "factura":
			if (isset($_REQUEST['id'])) {
				$arrParaServ = array('intId' => $_GET['id']);
				$resultado = $cliente->call('factura',$arrParaServ);
				header('Content-Type: text/xml');
				echo $resultado;
			} else {
				echo "Se requiren 1 parametro: id (id de la factura)<br>";
			}
			break;
		case "clientes_salamandra":
			$resultado = $cliente->call('clientes_salamandra');
			header('Content-Type: text/xml');
			echo $resultado;
			break;
		case "credito_salamandra":
			if (isset($_REQUEST['FechInic']) && isset($_REQUEST['FechFina'])) {
				$arrParaServ = array('dttFechInic' => $_GET['FechInic'],'dttFechFina' => $_GET['FechFina']);
				$resultado = $cliente->call('credito_salamandra',$arrParaServ);
				header('Content-Type: text/xml');
				echo $resultado;
			} else {
				echo "Se requiren 2 parametros: FechInic (YYYY-MM-DD), FechFina (YYYY-MM-DD)<br>";
			}
			break;
		case "guia_salamandra":
			if (isset($_REQUEST['NumeGuia'])) {
				$arrParaServ = array('strNumeGuia' => $_GET['NumeGuia']);
				$resultado = $cliente->call('guia_salamandra',$arrParaServ);
				header('Content-Type: text/xml');
				echo $resultado;
			} else {
				echo "Debe especificar el Nro de la Guia (NumeGuia)";
			}
			break;
		case "guias_int_x_cliente":
			if (isset($_REQUEST['CodiClie'])) {
				$arrParaServ = array('intCodiClie' => $_GET['CodiClie']);
				$resultado = $cliente->call('guias_int_x_cliente',$arrParaServ);
				echo $resultado;
			} else {
				echo "Debe especificar un codigo lib (CodiClie)";
			}
			break;
		case "guias_x_cliente":
			if (isset($_REQUEST['CodiClie']) && isset($_REQUEST['FechInic']) && isset($_REQUEST['FechFina']) && isset($_REQUEST['ClavSecr'])) {
				$arrParaServ = array('strCodiClie' => $_GET['CodiClie'],
				'dttFechInic' => $_GET['FechInic'],
				'dttFechFina' => $_GET['FechFina'],
				'strClavSecr' => $_GET['ClavSecr']);
				$resultado = $cliente->call('guias_x_cliente',$arrParaServ);
				echo $resultado;
			} else {
				echo "Se requiren 4 parametros: CodiClie (CR999), FechInic (YYYY-MM-DD), FechFina (YYYY-MM-DD), ClavSecr<br>";
			}
			break;
		case "info_guia_int_xml":
			if (isset($_REQUEST['NumeGuia'])) {
				$arrParaServ = array('strNumeGuia' => $_GET['NumeGuia']);
				$resultado = $cliente->call('info_guia_int_xml',$arrParaServ);
				echo $resultado;
			} else {
				echo "Debe especificar un numero de guia internacional (NumeGuia)";
			}
			break;
		case "info_guia_xml":
			if (isset($_REQUEST['NumeGuia'])) {
				$arrParaServ = array('strNumeGuia' => $_GET['NumeGuia']);
				$resultado = $cliente->call('info_guia_xml',$arrParaServ);
				echo $resultado;
			} else {
				echo "Debe especificar un numero de guia (NumeGuia)";
			}
			break;
		case "info_cliente_xml":
			if (isset($_REQUEST['CodiClie'])) {
				$arrParaServ = array('intCodiClie' => $_GET['CodiClie']);
				$resultado = $cliente->call('info_cliente_xml',$arrParaServ);
				echo $resultado;
			} else {
				echo "Debe especificar un Codigo de Cliente (CodiClie)";
			}
			break;
		case "znc_x_sucursal":
			if (isset($_REQUEST['NombSucu'])) {
				$arrParaServ = array('strNombSucu' => $_REQUEST['NombSucu']);
				$resultado = $cliente->call('znc_x_sucursal',$arrParaServ);
				echo $resultado;
			} else {
				echo "Debe especificar el codigo de la Sucursal (NombSucu)";
			}
			break;
		case "info_sucursales":
			$resultado = $cliente->call('info_sucursales');
			echo $resultado;
			break;
		default:
			echo "No existe ningun servicio web con el nombre $strNombRuti";
			break;
	}
} else {
	echo "Debe especificar el nombre de la rutina que desea ejecutar";
}

?>
