<?php
//----------------------------------------------------------------------------------------------------------
// Programa      : pase_a_historico.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 13/03/2018
// Descripcion   : Este programa pasa los datos viejos de la base de datos liberty a archivos historicos
//----------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');

//-------------------------------------------------------------------------------------------------
// Se seleccionan las guias cuya fecha de creacion, supere la caducidad establecida en el Sistema
//-------------------------------------------------------------------------------------------------
$intDiasCadu   = BuscarParametro('DiasCadu','PaseHist','Val1',365);
$dteFechCadu   = SumaRestaDiasAFecha(FechaDeHoy(),'-',$intDiasCadu);
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::LessThan(QQN::Guia()->FechGuia,$dteFechCadu);
$arrGuiaCadu   = Guia::QueryArray(QQ::AndCondition($objClauWher));

foreach ($arrGuiaCadu as $objGuiaCadu) {
    $blnTodoOkey = verificarDatosQuePrelan($objGuiaCadu);
    if ($blnTodoOkey) {

        // Copiar Guia

        // Copiar Checkpoints

        // Copiar Registro de Trabajo

        // Copiar Log de Transacciones

        // Borrar la guía
    }
}

function copiarGuia(Guia $objGuiaCadu) {

}

function copiarCheckpoints(Guia $objGuiaCadu) {

}

function copiarRegistroDeTrabajo(Guia $objGuiaCadu) {

}


function verificarDatosQuePrelan(Guia $objGuiaCadu) {
    //-----------------------------------------------------------------------------------------
    // Antes de poder mover la guia hacia el historico, es necesario chequear la existencia
    // de los datos de los cuales depende
    //-----------------------------------------------------------------------------------------
    $blnTodoOkey = true;

    // Verificar Cliente (codi_clie)

    // Verificar Origen (esta_orig)

    // Verificar Destino (esta_dest)

    // Verificar Producto (codi_prod)

    // Verificar Tipo Guia (tipo_guia)

    // Verificar Checkpoint (codi_ckpt)

    // Verificar Sucursal del Checkpoint (esta_ckpt)

    // Verificar Usuario del Checkpoint (usua_ckpt)

    // Verificar Sistema (sistema_id)

    // Verificar Vendedor (vendedor_id)

    // Verificar Tarifa (tarifa_id)

    return $blnTodoOkey;
}