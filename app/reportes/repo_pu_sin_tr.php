<?php
//----------------------------------------------------------------------------------------------
// Programa      : repo_pu_sin_tr.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 10/03/2018
// Descripcion   : Este programa muestra las guias que debieron trasladarse y no lo hicieron.
//----------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
use PHPMailer\PHPMailer\PHPMailer;

$dttFechDhoy = date('Y-m-d');
$arrSucuSele = Estacion::LoadSucursalesActivasSinAlmacenes();
foreach ($arrSucuSele as $objSucursal) {
    //if ($objSucursal->CodiEsta != 'CCS') {
    //    continue;
    //}
    //--------------------------------------------------------
    // Selecciono los registros que satisfagan la condicion
    //--------------------------------------------------------
    $strCadeSqlx  = "select g.*,e.fecha_pickup, (fn_diastrans(e.fecha_pickup, now()) - (fn_cantsados(e.fecha_pickup, now()) + fn_cantferiados(e.fecha_pickup, now()))) as dias_tran ";
    $strCadeSqlx .= "  from guia g inner join estadistica_de_guias e";
    $strCadeSqlx .= "    on g.nume_guia = e.guia_id";
    $strCadeSqlx .= " where (fn_diastrans(e.fecha_pickup, now()) - (fn_cantsados(e.fecha_pickup, now()) + fn_cantferiados(e.fecha_pickup, now()))) > 1  ";
    $strCadeSqlx .= "   and g.esta_orig  = '".$objSucursal->CodiEsta."'";
    $strCadeSqlx .= "   and g.esta_dest != '".$objSucursal->CodiEsta."'";
    $strCadeSqlx .= "   and g.esta_ckpt  = g.esta_orig";
    $strCadeSqlx .= "   and g.anulada    = 0";
    $strCadeSqlx .= "   and e.fecha_pickup >= date_sub(now(), INTERVAL 30 DAY) ";
    $strCadeSqlx .= "   and e.fecha_pickup IS NOT NULL";
    $strCadeSqlx .= "   and e.fecha_traslado IS NULL";
    $strCadeSqlx .= "   and e.fecha_entrega IS NULL";
    $strCadeSqlx .= " order by fecha_pickup ";

    $objDatabase  = Guia::GetDatabase();
    $objDbResult = $objDatabase->Query($strCadeSqlx);

    $arrDatoRepo = array();
    while ($mixRegiProc = $objDbResult->FetchArray()) {
        $arrDatoRepo[] = array(
            $mixRegiProc['nume_guia'],
            $mixRegiProc['fech_guia'],
            $mixRegiProc['usuario_creacion'],
            $mixRegiProc['esta_orig'].'-'.$mixRegiProc['esta_dest'],
            $mixRegiProc['receptoria_origen'],
            $mixRegiProc['peso_guia'],
            $mixRegiProc['codi_ckpt'],
            $mixRegiProc['fech_ckpt'],
            $mixRegiProc['hora_ckpt'],
            $mixRegiProc['esta_ckpt'],
            $mixRegiProc['dias_tran']
        );
    }

    $intCantRepo = count($arrDatoRepo);

    if ($intCantRepo) {
        $arrDatoRepo = ordenar_array($arrDatoRepo,'10',SORT_DESC);
        $strNombArch = 'guias_pu_sin_tr_'.$objSucursal->CodiEsta.'.xls';
        $mixManeArch = fopen($strNombArch,'w');
        $strTituRepo = 'Guias con PU sin TR +24hrs ('.$objSucursal->CodiEsta.')';
        $arrEncaDato = array(
            'Nro Guia',
            'Fecha',
            'Creada Por',
            'Orig-Dest',
            'R. Origen',
            'Peso',
            'Ult. Ckpt',
            'F. Ckpt',
            'H. Ckpt',
            'S. Ckpt',
            'D. Tran'
        );

        $objValoRepo = new stdClass();
        $objValoRepo->arrEncaDato = $arrEncaDato;
        $objValoRepo->arrDatoExpo = $arrDatoRepo;
        $objValoRepo->strTituRepo = $strTituRepo;
        $objValoRepo->blnConxBord = false;
        $objValoRepo->strFormExpo = 'XLS';
        $objExpoDato = new ExportarDatos($objValoRepo);
        $strTextMens = $objExpoDato->Exportar();

        fputs($mixManeArch,$strTextMens);
        fclose($mixManeArch);
        //--------------------------------
        // Envio el reporte por e-mail
        //--------------------------------
        $arrDestCorr = array();
        $arrDireMail = explode(',',$objSucursal->DireMail);
        foreach ($arrDireMail as $strDireMail) {
            array_push($arrDestCorr,$strDireMail);
        }
        $strDireMail = $arrDestCorr;

        $mail = new PHPMailer();
        $mail->setFrom('SisCO@libertyexpress.com', 'Medicion y Control');
        if ($objSucursal->CodiEsta == 'CCS') {
            $mail->addAddress('soportelufeman@gmail.com');
        }
        $mail->addAddress('jhernandez@libertyexpress.com');
        $mail->addAddress('aalvarado@libertyexpress.com');
        $mail->addAddress('operacionesurbanas@libertyexpress.com');
        $mail->addAddress('emontilla@libertyexpress.com');
        $mail->addAddress('rortega@libertyexpress.com');
        $mail->addAddress('jmartini@libertyexpress.com');
        $mail->addAddress('incidencias@libertyexpress.com');
        $mail->addAddress('calidadyservicio@libertyexpress.com');
        $mail->Subject  = $strTituRepo;
        $mail->Body     = 'Estimado Usuario, sírvase revisar el documento anexo...';
        $mail->addAttachment($strNombArch);
        if(!$mail->send()) {
            echo "Message was not sent.\n";
            echo "Mailer error: " . $mail->ErrorInfo."\n";
        }
    }
    GrabarMedicion($objSucursal->CodiEsta,"PU_SIN_TR_24",$intCantRepo);
}
?>