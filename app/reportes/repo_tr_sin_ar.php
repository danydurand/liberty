<?php
//----------------------------------------------------------------------------------------------
// Programa      : repo_tr_sin_ar.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 10/03/2018
// Descripcion   : Este programa muestra las guias que debieron recibirse y no lo hicieron.
//----------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
use PHPMailer\PHPMailer\PHPMailer;

$dttFechDhoy = date('Y-m-d');
$arrSucuSele = Estacion::LoadSucursalesActivasSinAlmacenes();
foreach ($arrSucuSele as $objSucursal) {
    if (!in_array($objSucursal->CodiEsta, array('CCS','VLN','MAR'))) {
        continue;
    }
    //--------------------------------------------------------
    // Selecciono los registros que satisfagan la condicion
    //--------------------------------------------------------
    $strCadeSqlx  = "select distinct g.*,(fn_diastrans( now(), e.fecha_traslado ) - (fn_cantsados(e.fecha_traslado, now()) + fn_cantferiados(e.fecha_traslado, now()))) as dias_tran ";
    $strCadeSqlx .= "  from guia g inner join estadistica_de_guias e";
    $strCadeSqlx .= "    on g.nume_guia = e.guia_id";
    $strCadeSqlx .= " where (fn_diastrans( now(), e.fecha_traslado ) - (fn_cantsados(e.fecha_traslado, now()) + fn_cantferiados(e.fecha_traslado, now()))) > 2  ";
    $strCadeSqlx .= "   and g.esta_dest = '".$objSucursal->CodiEsta."'";
    $strCadeSqlx .= "   and g.anulada   = 0";
    $strCadeSqlx .= "   and e.fecha_traslado IS NOT NULL";
    $strCadeSqlx .= "   and e.fecha_arribo IS NULL";
    $strCadeSqlx .= "   and e.fecha_entrega IS NULL";
    $strCadeSqlx .= " order by fecha_traslado desc ";

    $objDatabase  = Guia::GetDatabase();
    $objDbResult = $objDatabase->Query($strCadeSqlx);

    $arrDatoRepo = array();
    while ($mixRegiProc = $objDbResult->FetchArray()) {
        $arrDatoRepo[] = array(
            $mixRegiProc['nume_guia'],
            $mixRegiProc['fech_guia'],
            $mixRegiProc['esta_orig'].'-'.$mixRegiProc['esta_dest'],
            substr($mixRegiProc['nomb_remi'],0,22),
            $mixRegiProc['codi_ckpt'],
            $mixRegiProc['fech_ckpt'],
            $mixRegiProc['hora_ckpt'],
            $mixRegiProc['esta_ckpt'],
            $mixRegiProc['dias_tran']
        );
    }

    $intCantRepo = count($arrDatoRepo);
    if ($intCantRepo) {
        $arrDatoRepo = ordenar_array($arrDatoRepo,'8',SORT_DESC);
        $strNombArch = 'guias_tr_sin_ar_'.$objSucursal->CodiEsta.'.xls';
        $mixManeArch = fopen($strNombArch,'w');
        $strTituRepo = 'Guias con TR sin AR +48hrs ('.$objSucursal->CodiEsta.')';
        $arrEncaDato = array(
            'Nro Guia',
            'Fecha',
            'Orig-Dest',
            'Remitente',
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
        $strDireMail = array('danydurand@gmail.com, aalvarado@libertyexpress.com, emontilla@libertyexpress.com, rortega@libertyexpress.com, jmartini@libertyexpress.com');

        $mail = new PHPMailer();
        $mail->setFrom('SisCO@libertyexpress.com', 'Medicion y Control');
        $mail->addAddress('soportelufeman@gmail.com');
        $mail->addAddress('aalvarado@libertyexpress.com');
        $mail->addAddress('aalvarado@libertyexpress.com');
        $mail->addAddress('emontilla@libertyexpress.com');
        $mail->addAddress('rortega@libertyexpress.com');
        $mail->addAddress('jmartini@libertyexpress.com');
        $mail->Subject  = $strTituRepo;
        $mail->Body     = 'Estimado Usuario, sírvase revisar el documento anexo...';
        $mail->addAttachment($strNombArch);
        if(!$mail->send()) {
            echo "Message was not sent.\n";
            echo "Mailer error: " . $mail->ErrorInfo."\n";
        }
    }
    GrabarMedicion($objSucursal->CodiEsta,"TR_SIN_AR_48",$intCantRepo);
}
?>