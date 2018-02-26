<?php
$objUsuario = unserialize($_SESSION['User']);

//---------------------------------------------------
// Se identifica el Menu Principal de la Aplicacion
//---------------------------------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->Programa,'principal');
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->EsMenu,true);
$objMenuPpal   = NewOpcion::QuerySingle(QQ::AndCondition($objClauWher));

//-------------------------------
// Opciones del Menu Principal 
//-------------------------------
$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::NewOpcion()->Posicion);
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->Dependencia,$objMenuPpal->Id);
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->Activo,true);
if ($objUsuario->CodiGrup != 1) {
    //---------------------------------------------------------
    // Aqui se identifican las Opciones del grupo del Usuario
    //---------------------------------------------------------
    $objClauPerm   = QQ::Clause();
    $objClauPerm[] = QQ::Equal(QQN::Permiso()->GrupoId,$objUsuario->CodiGrup);
    $arrOpciGrup   = Permiso::QueryArray(QQ::AndCondition($objClauPerm));
    $arrGroupId    = array();
    foreach ($arrOpciGrup as $objOpciGrup) {
        $arrGroupId[] = $objOpciGrup->OpcionId;
    }

    //---------------------------------------------------------------------
    // Si el Usuario no esta el grupo de los Super-Usuarios entonces
    // solo se deben cargar las Opciones correspondientes a su grupo.
    //---------------------------------------------------------------------
    $objClauWher[] = QQ::In(QQN::NewOpcion()->Id,$arrGroupId);
}
$arrOpciMenu = NewOpcion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
$strHtmlMenu = "<ul class='nav' id='side-menu'>\n";
foreach ($arrOpciMenu as $objOpcion) {
    $strHtmlMenu .= $objOpcion->HtmlMenuBootstrap();
}
$strHtmlMenu .= "</ul>\n";
?>