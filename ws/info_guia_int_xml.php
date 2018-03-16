<?php
//-------------------------------------------------------------------------------
// Programa      : info_guia_int_xml.php 
// Realizado por : Daniel Durand
// Fecha Elab.   : 24/05/2013
// Descripcion   : Este programa genera informacion de la la guia internacional
//                 en formato XML 
//-------------------------------------------------------------------------------
require_once('../util/includes/config.php');
require_once(__PROG_DIRECTORY__.'/includes/prepend.inc.php');
require_once('./crxml/crXml.php');

function info_guia_int_xml($strNumeGuia) {
	//-------------------------------------------------------------------
	// Aqui se realiza la validacion de los parametros proporcionados
	//-------------------------------------------------------------------
	$error = new crxml();
	$blnTodoOkey = true;
	if (strlen($strNumeGuia) > 0) {
		$objGuia = GuiaCT::Load($strNumeGuia);
		if ($objGuia) {
         if ($objGuia->tieneCheckpoint("DP")) {
            //--------------------------------------------------------------
            // Si ya se completaron los datos de la guia, la informacion
            // debe extraerse del Pais correspondiente
            //--------------------------------------------------------------
            $strSiglPais = $objGuia->Cliente->Pais->Siglas;
            switch ($objGuia->Cliente->Pais->Siglas) {
               case 'VE':
                  $objGuiaPais = Guia::Load($objGuia->NumeGuia);
                  break;
               case 'DO':
                  $objGuiaPais = GuiaDO::Load($objGuia->NumeGuia);
                  break;
               case 'CR':
                  $objGuiaPais = GuiaCR::Load($objGuia->NumeGuia);
                  break;
               default:
                  //$objGuiaPais = GuiaCT::Load($objGuia->NumeGuia);
                  $objGuiaPais = $objGuia;
                  break;
            }
			} else {
            //$objGuiaPais = GuiaCT::Load($objGuia->NumeGuia);
            $objGuiaPais = $objGuia;
            $strSiglPais = "US";
			}
         if ($objGuiaPais) {
			   $xml = new crxml();
			   $guia = $xml->guia;
			   $guia['numero'] = $strNumeGuia;
			   $guia->cliente = utf8_decode($objGuiaPais->Cliente->NombreContacto)." (".$objGuia->ClienteId.")";
			   $guia->fecha = $objGuiaPais->FechGuia->__toString("DD/MM/YYYY");
			   $guia->destino = $objGuiaPais->EstaDestObject->DescEsta;
			   $guia->peso_libras = $objGuiaPais->PesoLibras;
			   $guia->peso_volumetrico = $objGuiaPais->PesoVolumetrico;
			   $guia->piezas = $objGuiaPais->CantPiez;
			   $guia->valor_declarado = $objGuiaPais->ValorDeclarado;
			   $guia->estatus_actual = $objGuiaPais->ObseCkpt;
			   //$guia->pais = $strSiglPais;
         } else {
			   $error->mensaje = "No existe la guia ".$strNumeGuia;
			   $blnTodoOkey = false;
         }
		} else {
			$error->mensaje = "No existe la guia ".$strNumeGuia;
			$blnTodoOkey = false;
		}
	} else {
		$error->mensaje = "Debe proporcionar un Nro de Guia";
		$blnTodoOkey = false;
	}
	if ($blnTodoOkey) {
		return $xml->xml();
	} else {
		return $error->xml();
	}
}
?>
