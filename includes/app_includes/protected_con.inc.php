<?php
//----------------------------------------------------------------------------------
// Programa      : protected_con.inc.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 22/07/2016
// Descripcion   : Este programa cumple un par de funciones claves en el Sistema
//                 - Verifica la existencia de la session
//                 - Deja registro del programa utilizado por el Usuario
//----------------------------------------------------------------------------------
if (isset($_SESSION['User'])) {
    $objUsuaConn = unserialize($_SESSION['User']);
    if (!$objUsuaConn) {
        QApplication::Redirect('../index_connect.php');
    } else {
        if (!($objUsuaConn instanceof UsuarioConnect)) {
            QApplication::Redirect('../index_connect.php');
        }
    }
} else {
    QApplication::Redirect('../index_connect.php');
}
//---------------------------------------------------------------------------------
// Aqui se deja registro de la base de datos del programa accesado por el Usuario
//---------------------------------------------------------------------------------
PilaAcceso::Push();
?>