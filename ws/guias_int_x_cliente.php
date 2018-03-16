<?php
//--------------------------------------------------------------------------
// Programa      : guias_int_x_cliente.php
// Elaborado por : Daniel Durand
// Fecha Elab.   : 24/05/2013
// Descripcion   : Este programa genera un XML que muestra todas las guias
//                 de un Cliente dado en un rango de fechas especificado
//--------------------------------------------------------------------------
require_once('../util/includes/config.php');
require_once(__PROG_DIRECTORY__.'/includes/prepend.inc.php');
require_once('../util/includes/funciones.php');
require_once('./crxml/crXml.php');

function guias_int_x_cliente($intCodiClie) {
   //-------------------------------------------------------------------
   // Aqui se realiza la validacion de los parametros proporcionados
   //-------------------------------------------------------------------
   $error = new crxml();
   $blnTodoOkey = true;
   //-------------------------------------------
   // Se verifica la existencia del Cliente
   //-------------------------------------------
   if (strlen($intCodiClie) > 0) {
      $objCliente = ClienteICT::Load($intCodiClie);
      if ($objCliente) {
         $strSiglPais = $objCliente->Pais->Siglas;
         //----------------------------------------------------------------------------------------
         // Una vez realizados todas las validaciones, se procede a generar el archivo XML con
         // las guias del Cliente
         //----------------------------------------------------------------------------------------
         $objClausula   = QQ::Clause();
         $objClausula[] = QQ::Equal(QQN::GuiaCT()->ClienteId,$objCliente->Id);
         $objClauOrde   = QQ::Clause();
         $objClauOrde[] = QQ::OrderBy(QQN::GuiaCT()->FechGuia,false);
         $arrGuiaClie   = GuiaCT::QueryArray(QQ::AndCondition($objClausula),$objClauOrde);
         if (count($arrGuiaClie) > 0) {
            $xml = new crxml();
            $guias = $xml->guias;
            $i = 0;
            foreach ($arrGuiaClie as $objGuia) {
               if ($objGuia->tieneCheckpoint("DP")) {
                  //--------------------------------------------------------------
                  // Si ya se completaron los datos de la guia, la informacion
                  // debe extraerse del Pais correspondiente
                  //--------------------------------------------------------------
                  switch ($strSiglPais) {
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
                  //$guias->guia[$i]['numero'] = $objGuiaPais->NumeGuia;
                  $strNumeGuia = $objGuiaPais->NumeGuia;
                  $strDescCont = utf8_decode(trim($objGuiaPais->DescCont));
                  $strObseCkpt = utf8_decode(trim($objGuiaPais->ObseCkpt));
                  $guias->guia[$i]->guia = $strNumeGuia." ($strDescCont) ($strObseCkpt)";
                  //$guias->guia[$i]->guia = $objGuiaPais->NumeGuia." - ".trim($objGuiaPais->DescCont)." (".$objGuiaPais->ObseCkpt.")";
                  //$guias->guia[$i]->fecha = $objGuiaPais->FechGuia->__toString("DD/MM/YYYY");
                  //$guias->guia[$i]->destino = $objGuiaPais->EstaDestObject->DescEsta;
                  //$guias->guia[$i]->estatus_actual = $objGuiaPais->ObseCkpt;
                  //$guias->guia[$i]->peso_libras = $objGuiaPais->PesoLibras;
                  //$guias->guia[$i]->peso_volumetrico = $objGuiaPais->PesoVolumetrico;
                  //$guias->guia[$i]->piezas = $objGuiaPais->CantPiez;
                  //$guias->guia[$i]->valor_declarado = $objGuiaPais->ValorDeclarado;
                  //$guias->guia[$i]->direccion_dest = $objGuiaPais->DireDest;
                  $i++;
               }
            }
            return $xml->xml();
         } else {
            $blnTodoOkey = false;
            $error->mensaje = "No hay guias disponibles en el rango especificado";
         }
      }
   } else {
      // code...
   }
   if (!$blnTodoOkey) {
      return $error->xml();
   }
}
?>
