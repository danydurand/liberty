<?php
//-------------------------------------------------------------------------------------
// Programa      : cambiar_tarifa.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 10/08/16 10:18 PM
// Proyecto      : newliberty 
// Descripcion   : Este programa se encarga de realizar cualquier cambio de tarifa
//                 que este programado para el dia en curso.  Esta previsto que este
//                 programa corra via cron a las 5 am de cada día (de lunes a sabado)
//--------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
error_reporting(E_ALL);
//----------------------------------------------------------
// Se seleccionan los cambios de tarifa previstos para hoy
//----------------------------------------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::CambioTarifa()->EjecutarEl,date('Y-m-d'));
$objClauWher[] = QQ::IsNull(QQN::CambioTarifa()->EjecutadoEl);
$arrCambTari   = CambioTarifa::QueryArray(QQ::AndCondition($objClauWher));
if (count($arrCambTari) > 0) {
    foreach ($arrCambTari as $objCambTari) {
        //------------------------------------------------------------------------
        // Se obtienen valores de referencia para el comentario final del proceso
        //------------------------------------------------------------------------
        $intClieOrig = MasterCliente::CountByTarifaId($objCambTari->TarifaOrigenId);
        $intClieDest = MasterCliente::CountByTarifaId($objCambTari->TarifaDestinoId);
        if ($intClieOrig > 0) {
            $strTextCamb = 'Cambio de Tarifa. De: '. $objCambTari->TarifaOrigen->Descripcion.' a: '. $objCambTari->TarifaDestino->Descripcion;
            $strComeProc  = '<u>Antes de hacer el Cambio:</u><br>';
            $strComeProc .= 'Clientes con '.$objCambTari->TarifaOrigen->Descripcion.': '.$intClieOrig.'<br>';
            $strComeProc .= 'Clientes con '.$objCambTari->TarifaDestino->Descripcion.': '.$intClieDest.'<br>';
            $intClieProc  = 0;
            $arrClieOrig  = MasterCliente::LoadArrayByTarifaId($objCambTari->TarifaOrigenId);
            foreach ($arrClieOrig as $objClieOrig) {
                //------------------------------------------------------
                // Se Valida que no se cambien los Clientes "Excluidos"
                //------------------------------------------------------
                $arrClieExcl = explode(',',$objCambTari->Excluir);
                if (!in_array($objClieOrig->CodigoInterno,$arrClieExcl)) {
                    $objClieOrig->TarifaId = $objCambTari->TarifaDestinoId;
                    $objClieOrig->Save();
                    //------------------------
                    // Log de Transacciones
                    //------------------------
                    $arrLogxCamb['strNombTabl'] = 'MasterCliente';
                    $arrLogxCamb['intRefeRegi'] = $objClieOrig->CodigoInterno;
                    $arrLogxCamb['strNombRegi'] = $objClieOrig->NombClie;
                    $arrLogxCamb['strDescCamb'] = $strTextCamb;
                    LogDeCambios($arrLogxCamb);

                    $intClieProc ++;
                }
            }
            $intClieOrig  = MasterCliente::CountByTarifaId($objCambTari->TarifaOrigenId);
            $intClieDest  = MasterCliente::CountByTarifaId($objCambTari->TarifaDestinoId);
            $strComeProc .= '<u>Despues de hacer el Cambio:</u><br>';
            $strComeProc .= 'Clientes con '.$objCambTari->TarifaOrigen->Descripcion.': '.$intClieOrig.'<br>';
            $strComeProc .= 'Clientes con '.$objCambTari->TarifaDestino->Descripcion.': '.$intClieDest.'<br>';
            //---------------------------------------------------
            // El resultado del cambio, se almacena en la tabla
            //---------------------------------------------------
            $objCambTari->EjecutadoEl   = new QDateTime(QDateTime::Now);
            $objCambTari->HoraEjecucion = new QDateTime(QDateTime::Now);
            $objCambTari->Comentario    = $strComeProc;
            $objCambTari->Save();
            //------------------------------------------------------------
            // Se Envía correo al Usuario y/o Administradores del Sistema
            //------------------------------------------------------------
            $arrDireMail = array('soportelufeman@gmail.com');
            $strTituRepo = utf8_decode("Cambio de Tarifa: ".$objCambTari->TarifaOrigen->Descripcion." a ".
                $objCambTari->TarifaDestino->Descripcion." (".
                $objCambTari->EjecutadoEl->__toString("YYYY-MM-DD")." a las ".
                $objCambTari->HoraEjecucion->qFormat(QDateTime::FormatDisplayTime)).")";

            $mimemail = new MIMEMAIL('HTML');
            $mimemail->senderName = 'Sistema SisCO';
            $mimemail->senderMail = 'localhost@libertyexpress.com';
            $mimemail->subject    = $strTituRepo;
            $mimemail->body       = 'Estimado Usuario, sirvase revisar la siguiente información de Cambio de Tarifa: <br><br>';
            $mimemail->body      .= $objCambTari->Comentario;
            $mimemail->create();
            $mimemail->send($arrDireMail);
        }
    }
}
