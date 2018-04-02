<?php
//----------------------------------------------------------------------------------
// Programa      : repo_guias_cmail.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 04/11/2017
// Descripcion   : Este programa genera una lista de las guías de correspondencia
//                 interna de la Empresa en formato csv.
//----------------------------------------------------------------------------------
require_once('qcubed.inc.php');
use PHPMailer\PHPMailer\PHPMailer;

//--------------------------------------
// Identifico el nombre de la Empresa
//--------------------------------------
$objParametro = Parametro::Load('88888','datfisc');
$strNombEmpr = $objParametro->ParaTxt1;
$strDireEmpr = $objParametro->ParaTxt5;
//---------------------------------------
// Criterios de seleccion de registros
//---------------------------------------
if (isset($_SESSION['SucuSele'])) {
	$arrSucuSele[] = Estacion::LoadByCodiEsta(unserialize($_SESSION['SucuSele']));
	$strModoEjec   = 'MENU';
}  else {
	//----------------------------------------------------------------
	// El reporte se esta invocando desde cron (ejecucion en batch)
	//----------------------------------------------------------------
	$dttFechDhoy = date('Y-m-d');
	$arrSucuSele = Estacion::LoadSucursalesActivasSinAlmacenes();
	$strModoEjec = 'CRON';
}
//----------------
// Archivo plano
//----------------
$strNombArch = __TEMP__.'/guias_cmail.csv';
$mixManeArch = fopen($strNombArch,'w');
$arrDato2PDF = array('Guia', 'Pzas', 'Ubic', 'Nombre del Cliente', 'Ult.Status', 'F.Status', 'Destino', 'Servicio');
$strCadeAudi = implode(';',$arrDato2PDF);
fputs($mixManeArch,$strCadeAudi.";\n");
foreach ($arrSucuSele as $objSucursal) {
    if (!in_array($objSucursal->CodiEsta, array('CCS','VLN','MAR'))) {
        continue;
    }
    $strNombArch = 'guias_cmail_'.$objSucursal->CodiEsta.'.csv';
    $strTituRepo = 'Guias CMAIL con Origen '.$objSucursal->CodiEsta;
    //--------------------------------------------------------
    // Selecciono los registros que satisfagan la condicion
    //--------------------------------------------------------
    $strCadeSqlx  = "select distinct g.*, k.fech_ckpt FechTras";
    $strCadeSqlx .= "  from guia g, guia_ckpt k";
    $strCadeSqlx .= " where g.nume_guia = k.nume_guia";
    $strCadeSqlx .= "   and g.codi_clie = 948";
    $strCadeSqlx .= "   and k.codi_ckpt = 'TR'";
    $strCadeSqlx .= "   and k.fech_ckpt >= date_sub( now( ), INTERVAL 60 DAY ) ";
    $strCadeSqlx .= "   and g.esta_orig = '".$objSucursal->CodiEsta."'";
    $strCadeSqlx .= "   and k.codi_esta = g.esta_orig ";
    $strCadeSqlx .= "   and g.esta_ckpt = g.esta_orig ";
    $strCadeSqlx .= "   and not exists (select *";
    $strCadeSqlx .= "                     from sde_checkpoint";
    $strCadeSqlx .= "                    where sde_checkpoint.codi_ckpt = g.codi_ckpt ";
    $strCadeSqlx .= "                      and sde_checkpoint.tipo_term = 1)";
    $objDatabase = Guia::GetDatabase();
    $objDbResult  = $objDatabase->Query($strCadeSqlx);
    //------------------------------------------
    // Proceso los registros seleccionados
    //------------------------------------------
    $arrDatoRepo = array();
    while ($mixRegi = $objDbResult->FetchArray()) {
        // echo "Procesando Guia Nro: ".$mixRegi['nume_guia']."\n";
        $arrDatoRepo[] = array(
        $mixRegi['nume_guia'],
        $mixRegi['esta_orig'].'-'.$mixRegi['esta_dest'],
        $mixRegi['fech_guia'],
        substr($mixRegi['nomb_remi'],0,22),
        substr($mixRegi['nomb_dest'],0,22),
        substr($mixRegi['obse_ckpt'],0,28),
        $mixRegi['fech_ckpt'],
        $mixRegi['hora_ckpt'],
        $mixRegi['esta_ckpt']
        );
    }
    $intCantRepo = count($arrDatoRepo);
    if ($intCantRepo > 0) {
        // echo "El reporte de: ".$objSucursal->CodiEsta." tiene ".$intCantRepo." registro(s)\n";
        //------------------------------------------------------------------
        if ($strModoEjec == 'CRON') {
            GrabarMedicion($objSucursal->CodiEsta,"CMAIL",$intCantRepo);
        }
        //---------------------------------------------------------
        // Armo los otros vectores que requiere la rutina PDF
        //---------------------------------------------------------
        $arrEncaReco = array('Guia','Ori-Des','Fecha','Remitente','Destinatario','Ult Ckpt','Fec Ckpt','Hora Ckpt','SUC');
        $arrJustColu = array('C','C','C','L','L','L','C','C','C');
        $arrAnchColu = array(15,18,18,48,48,58,20,15,12);
        //-----------------------------
        // Genero el reporte solicitado
        //-----------------------------
        $pdf=new PDF('L','mm','Letter');
        $pdf->setVariables($arrEncaReco,$arrJustColu,$arrAnchColu,02,$strLogoComp);
        $pdf->setEmpresa($strNombEmpr,$strDireEmpr,$strTituRepo);
        $pdf->SetTitle('Guias CMAIL');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->FancyTable($arrEncaReco,$arrDatoRepo,$arrAnchColu,$arrJustColu);
        if ($strModoEjec == 'MENU') {
            $pdf->Output();
        } else {
            $pdf->Output($strNombArch);
            //-------------------------------------------------------------------------------------
            // La maquina del laboratorio no tiene habilitado el Sendmail por lo tanto se creo un
            // parametro que le dice al programa si debe o no enviar el e-mail
            //-------------------------------------------------------------------------------------
            $strEnviMail = BuscarParametro('EnviMail','MailSino',"Txt1","S");
            //--------------------------------
            // Envio el reporte por e-mail
            //--------------------------------
//				$to = array('rortega@libertyexpress.com','pmelendez@libertyexpress.com');

            $arrDestCorr = array();
            $arrDireMail = explode(',',$objSucursal->DireMail);
            foreach ($arrDireMail as $strDireMail) {
                array_push($arrDestCorr,$strDireMail);
            }
            $strDireMail = $arrDestCorr;
//                $strDireMail = array('danydurand@gmail.com, aalvarado@libertyexpress.com, emontilla@libertyexpress.com, rortega@libertyexpress.com, jmartini@libertyexpress.com');

            $mail = new PHPMailer();
            $mail->setFrom('SisCO@libertyexpress.com', 'Medicion y Control');
            $mail->addAddress('soportelufeman@gmail.com');
//                $mail->addAddress('aalvarado@libertyexpress.com');
//                $mail->addAddress('aalvarado@libertyexpress.com');
//                $mail->addAddress('emontilla@libertyexpress.com');
//                $mail->addAddress('rortega@libertyexpress.com');
//                $mail->addAddress('jmartini@libertyexpress.com');
            $mail->Subject  = $strTituRepo;
            $mail->Body     = 'Estimado Usuario, sírvase revisar el documento anexo...';
            $mail->addAttachment($strNombArch);
            if(!$mail->send()) {
                echo "Message was not sent.\n";
                echo "Mailer error: " . $mail->ErrorInfo."\n";
            }
        }
    } else {
        if ($strModoEjec == 'MENU') {
            echo "<h1> No existen Datos para la Sucursal: ".$objSucursal->CodiEsta."</h1>";
        } else {
            GrabarMedicion($objSucursal->CodiEsta,"CMAIL",0);
        }
    }
}
?>