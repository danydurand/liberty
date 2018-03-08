<?php
//----------------------------------------------------------------------------------
// Programa      : repo_rp_sin_pu.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 06/03/2018
// Descripcion   : Este programa muestra las guias que debieron recolectarse y no
//                 lo hicieron.
//----------------------------------------------------------------------------------
require_once('qcubed.inc.php');

echo 1;
//----------------------------------------------------------------
// El reporte se esta invocando desde cron (ejecucion en batch)
//----------------------------------------------------------------
$dttFechDhoy = date('Y-m-d');
$arrSucuSele = Estacion::LoadSucursalesActivasToClients(); //LoadArrayByCodiStat(1);
$strModoEjec = 'CRON';
echo 2;
//-------------------------------
// String de Sucursales activas
//-------------------------------
foreach ($arrSucuSele as $objSucursal) {
    if ($objSucursal->CodiEsta != 'CCS') {
        continue;
    }
    echo 'Procesando: '.$objSucursal->CodiEsta."\n";
    $strNombArch = 'guias_rp_sin_pu_'.$objSucursal->CodiEsta.'.pdf';
    $strTituRepo = 'Guias con RP sin PU +24hrs '.$objSucursal->CodiEsta;
    //--------------------------------------------------------
    // Selecciono los registros que satisfagan la condicion
    //--------------------------------------------------------
    $arrGuiaProc = Guia::RecolectasPendientes($objSucursal->CodiEsta);
    //------------------------------------------
    // Se procesan os registros seleccionados
    //------------------------------------------
    $arrDatoRepo = array();
    foreach ($arrGuiaProc as $objGuiaProc) {
        /**
         * @var $objGuiaProc Guia
         */
//        echo "Procesando Guia Nro: ".$objGuiaProc->NumeGuia."\n";
        //-----------------------------
        // Datos que van al reporte
        //-----------------------------
        $arrDatoRepo[] = array(
            $objGuiaProc->NumeGuia,
            $objGuiaProc->FechGuia->__toString('DD/MM/YYYY'),
            $objGuiaProc->EstaOrig.'-'.$objGuiaProc->EstaDest,
            substr($objGuiaProc->NombRemi,0,22),
            substr($objGuiaProc->NombDest,0,22),
            substr($objGuiaProc->ObseCkpt,0,28),
            //            $objGuiaProc->FechCkpt->__toString('DD/MM/YYYY'),
            //            $objGuiaProc->HoraCkpt,
            //            $objGuiaProc->EstaCkpt,
            //            $objGuiaProc->DiasTran
        );
    }
    if (count($arrDatoRepo)) {
        echo "Voy a enviar el reporte...\n";
        //------------------------------------------------------------------
        $intCantRepo = count($arrDatoRepo);
        if ($strModoEjec == 'CRON') {
            GrabarMedicion($objSucursal->CodiEsta,"RP_SIN_PU_24",$intCantRepo);
        }
        //        $arrDatoRepo = ordenar_array($arrDatoRepo,'9',SORT_DESC);
//        echo "1\n";
        //-----------------------------------------------------------------------------------------------
        // La maquina del laboratorio no tiene habilitado el Sendmail por lo tanto se creo un parametro
        // que le dice al programa si debe o no enviar el e-mail
        //-----------------------------------------------------------------------------------------------
        $strEnviMail = BuscarParametro('EnviMail','MailSino',"Txt1","S");
        //--------------------------------
        // Envio el reporte por e-mail
        //--------------------------------
        $arrDestCorr = array();
        $arrDireMail = explode(',',$objSucursal->DireMail);
        foreach ($arrDireMail as $strDireMail) {
            array_push($arrDestCorr,$strDireMail);
        }
        $to = $arrDestCorr;
        $to = 'danydurand@gmail.com';

//        echo "2\n";
        // Varios destinatarios
        $strDireMail  = 'danydurand@gmail.com';

        // título
        $strTituRepo = 'Recolectas Pendientes sin PickUp';

        // Cuerpo de la tabla
        $strRepoBody = '';
        foreach ($arrDatoRepo as $objDatoRepo) {
            $strRepoBody .= '<tr>';
            $strRepoBody .= '<td class="text-center">'.$objDatoRepo[0].'</td>';
            $strRepoBody .= '<td class="text-center">'.$objDatoRepo[1].'</td>';
            $strRepoBody .= '<td class="text-center">'.$objDatoRepo[2].'</td>';
            $strRepoBody .= '<td class="text-left">'.$objDatoRepo[3].'</td>';
            $strRepoBody .= '<td class="text-left">'.$objDatoRepo[4].'</td>';
            $strRepoBody .= '<td class="text-left">'.$objDatoRepo[5].'</td>';
            $strRepoBody .= '</tr>';
        }
//        echo "3\n";


        // mensaje
        $strTextMens = '
        <html>
            <head>
                <title>'.$strTituRepo.'</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            </head>
            <body>
                <table table-bordered>
                    <thead>
                        <th class="text-center">Nro Guia</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Orig-Dest</th>
                        <th class="text-left">Remitente</th>
                        <th class="text-left">Destinatario</th>
                        <th class="text-left">Observaci&oacute;n</th>
                    </thead>
                    <tbody>'.$strRepoBody.'</tbody>
                </table>
            </body>
        </html>
        ';

//        echo $strTextMens;

        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $strCabeMail  = 'MIME-Version: 1.0' . "\r\n";
        $strCabeMail .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Cabeceras adicionales
        // $strCabeMail .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
        $strCabeMail .= 'From: Medicion y Control <SisCO@libertyexpress.com>' . "\r\n";
//        $strCabeMail .= 'Cc: soportelufeman@gmail.com' . "\r\n";
            // $strCabeMail .= 'Bcc: birthdaycheck@example.com' . "\r\n";

        // Enviarlo
        mail($to, $strTituRepo, $strTextMens, $strCabeMail);
    }
    GrabarMedicion($objSucursal->CodiEsta,"RP_SIN_PU_24",0);
}
echo "Termine.\n";
?>