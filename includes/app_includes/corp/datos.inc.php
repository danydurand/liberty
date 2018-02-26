<?php
$strNombSist = "YAMAGUCHI<br>SYSTEM";
$strNombEmpr = 'LIBERTY EXPRESS';
if (isset($_SESSION['User'])) {
    $objUsuaCone = unserialize($_SESSION['User']);
    $objClieUsua = unserialize($_SESSION['ClieMast']);
    $strNombUsua = $objUsuaCone->__nombreApellido()." (".$objUsuaCone->LogiUsua.")";
    $strDatoUsua = $objUsuaCone->LogiUsua.' ('.$objUsuaCone->SucursalId.')';
    $strDatoClie = $objClieUsua->NombClie;
    //$strDatoGrup = $objUsuaCone->LogiUsua." (".$objUsuaCone->CodiGrupObject->DescGrup.")";
    $strLastAcce = "Ultimo Acceso: ".$objUsuaCone->FechaAcceso->__toString("YYYY-MM-DD");
    $strLinkMenu = __YAMAGUCHI__.'/mg.php?m=main';

    $_SESSION['NombProg'] = basename($_SERVER['SCRIPT_FILENAME']);
    $strNombProg = basename($_SERVER['SCRIPT_FILENAME']);
    if (isset($_GET['m'])) {
        $_SESSION['NombProg'] = $_GET['m'];
    }
}
?>
