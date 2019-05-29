<?php
$strNombSist = "YOKOHAMA<br>SYSTEM";
$strNombEmpr = 'LIBERTY EXPRESS';
if (isset($_SESSION['User'])) {
    /**
     * @var $objUsuaCone Usuario
     */
    $objUsuaCone = unserialize($_SESSION['User']);
    $strNombUsua = $objUsuaCone->__nombreApellido()." (".$objUsuaCone->LogiUsua.")";
    $strDatoUsua = $objUsuaCone->LogiUsua;
    $strDatoEsta = $objUsuaCone->CodiEsta;
    //$strDatoGrup = $objUsuaCone->LogiUsua." (".$objUsuaCone->CodiGrupObject->DescGrup.")";
    $strDatoGrup = $objUsuaCone->LogiUsua." (".$objUsuaCone->Grupo->Nombre.")";
    $strLastAcce = "Ultimo Acceso: ".$objUsuaCone->FechAcce->__toString("YYYY-MM-DD");
    $strLinkMenu = __APP__.'/mg.php';

    $_SESSION['NombProg'] = basename($_SERVER['SCRIPT_FILENAME']);
    $strNombProg = basename($_SERVER['SCRIPT_FILENAME']);
    //if (isset($_GET['m'])) {
    //    $_SESSION['NombProg'] = $_GET['m'];
    //}
}
?>
