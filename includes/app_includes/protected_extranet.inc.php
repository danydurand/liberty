<?php 
//----------------------------------------------------------------------------------
// Programa      : protected.inc.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 12/03/2015
// Descripcion   : Este programa cumple un par de funciones claves en el Sistema
//                 - Verifica la existencia de la session 
//                 - Deja registro del programa utilizado por el Usuario
//----------------------------------------------------------------------------------
require_once(__CONFIGURATION__.'/prepend.inc.php');
//-----------------------------------------------
// Aqui se verifica la existencia de la session 
//-----------------------------------------------
if (!isset($_SESSION['User'])) {
    QApplication::Redirect(__EXT__.'/index.php');
}
$objUser = unserialize($_SESSION['User']);
if (!($objUser instanceof Cliente)) {
    QApplication::Redirect(__EXT__.'/index.php');
}
//---------------------------------------------------------------------------------
// Aqui se deja registro de la base de datos del programa accesado por el Usuario 
//---------------------------------------------------------------------------------
$strNombProg = basename($_SERVER['SCRIPT_FILENAME']);
$strRutaProg = $_SERVER['REQUEST_URI'];
$intPosiProg = strpos($strRutaProg, $strNombProg);
$strProgPara = substr($strRutaProg, $intPosiProg);
$objUsuaCone = unserialize($_SESSION['User']);
/*
// $strUltiProg = $objUser->UltimoAcceso();
// if (trim($strUltiProg) != trim($strProgPara) && !in_array($strNombProg,$arrProgNore)) {
	// $objAcceProg = new Access();
	// $objAcceProg->Login = $objUsuaCone->Login;
	// $objAcceProg->AccessDate = new QDateTime(QDateTime::Now);
	// $objAcceProg->Program = $strProgPara;
	// $objAcceProg->Save();
// }
*/
?>