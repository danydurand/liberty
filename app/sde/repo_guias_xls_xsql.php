<?php
#------------------------------------------------------------------
# Programa      : repo_guias_xls_xsql.php
# Realizado por : Iran Anzola
# Fecha Elab.   : 03/07/2017
# Descripcion   : Reporte de Guias en Excel con criterio SQL
#------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');
//------------------------------------------------------------------
// La variable de Sesion llamada 'CritImpr' contiene los valores
// que definen el conjunto de registros que debe salir en el
// Reporte
//------------------------------------------------------------------
$strCadeSqlx = unserialize($_SESSION['CritSqlx']);
$objUser = unserialize($_SESSION['User']);
//----------------------------------------------------------------------
// Se determina el nombre del archivo que sera generado
//----------------------------------------------------------------------
// $strNombArch = __DOCROOT__.__SIST__.'/guias'.$objUser->LogiUsua.'.csv';
$strNombArch = __TEMP__.'/guias'.$objUser->LogiUsua.'.csv';
$mixManeArch = fopen($strNombArch,'w');
//----------------
// Encabezados
//----------------
$arrEnca2XLS = array(
    'GuiaLib',
    'Tracking',
    'Cliente',
    'Fecha',
    'Origen',
    'Destino',
    'ModPago',
    'Tarifa',
    'Remitente',
    'Destinatario',
    'Peso',
    'Piezas',
    'V.Decl',
    'EntregadoA',
    'F.Entrega',
    'H. Entrega',
    'Ult.Ckpt',
    'Suc.Ult.Ckpt',
    'F.Ult.Ckpt',
    'H.Ult.Ckpt',
    'Usuario',
    'FleteDir',
    'Guia Retorno',
    'Iva',
    '%Iva',
    '%Sgro',
    'MtoSgro',
    'MtoBase',
    'Franqueo',
    'MtoTotal',
    'MontoCancelado',
    'RecibioPago',
    'FechaPago',
    'NumeroDoc.',
    'TipoDocumento',
    'Tipo Envio'
);
//----------------------------------------------------------------------
// El vector de encabezados, se lleva al archivo plano
//----------------------------------------------------------------------
$strCadeAudi = implode(';',$arrEnca2XLS);
fputs($mixManeArch,$strCadeAudi.";\n");
//--------------------------------------------------------
// Selecciono los registros que satisfagan la condicion
//--------------------------------------------------------
$intCantRepe = 0;
$objDatabase = Guia::GetDatabase();
$objResulSet = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro = $objResulSet->FetchArray()) {
    $strNumeGuia = " ".$mixRegistro['nume_guia'];
    $strNumeTrac = " ".$mixRegistro['guia_externa'];
    $strCodiClie = $mixRegistro['codigo_interno'];
    $strFechGuia = $mixRegistro['fech_guia'];
    $strEstaOrig = $mixRegistro['esta_orig'];
    $strEstaDest = $mixRegistro['esta_dest'];
    $strModaPago = $mixRegistro['modalidad_pago'];
    $strNombTari = $mixRegistro['descripcion'];
    $strNombRemi = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['remitente']));
    $strNombDest = QuitarCaracteresEspeciales2(utf8_decode($mixRegistro['nomb_dest']));
    $strPesoGuia = nf($mixRegistro['peso_guia']);
    $strCantPiez = nf0($mixRegistro['cant_piez']);
    $strValoDecl = nf($mixRegistro['valor_declarado']);
    $strEntrAxxx = $mixRegistro['entregado_a'];
    $strFechEntr = $mixRegistro['fecha_entrega'];
    $strHoraEntr = $mixRegistro['hora_entrega'];
    $strCodiCkpt = $mixRegistro['codi_ckpt'];
    $strEstaCkpt = $mixRegistro['esta_ckpt'];
    $strFechCkpt = $mixRegistro['fech_ckpt'];
    $strHoraCkpt = $mixRegistro['hora_ckpt'];
    $strUsuaCkpt = $mixRegistro['usua_ckpt'];
    $strFletDire = $mixRegistro['flete_directo'];
    $strGuiaReto = $mixRegistro['guia_retorno'];
    $strPorcIvax = nf($mixRegistro['porcentaje_iva']);
    $strMontIvax = nf($mixRegistro['monto_iva']);
    $strPorcSgro = nf($mixRegistro['porcentaje_seguro']);
    $strMontSgro = nf($mixRegistro['monto_seguro']);
    $strMontBase = nf($mixRegistro['monto_base']);
    $strMontFran = nf($mixRegistro['monto_franqueo']);
    $strMontTota = nf($mixRegistro['monto_total']);
    $strMontCanc = nf($mixRegistro['monto_cancelado']);
    $strReciPago = $mixRegistro['recibio_el_pago'];
    $strFechPago = $mixRegistro['fecha_pago'];
    $strNumeDocu = $mixRegistro['numero_documento'];
    $strTipoDocu = $mixRegistro['tipo_documento'];

    //  $strEsunReto = $mixRegistro['retorno'];

    $arrLineArch = array(
        $strNumeGuia,
        $strNumeTrac,
        $strCodiClie,
        $strFechGuia,
        $strEstaOrig,
        $strEstaDest,
        $strModaPago,
        $strNombTari,
        $strNombRemi,
        $strNombDest,
        $strPesoGuia,
        $strCantPiez,
        $strValoDecl,
        $strEntrAxxx,
        $strFechEntr,
        $strHoraEntr,
        $strCodiCkpt,
        $strEstaCkpt,
        $strFechCkpt,
        $strHoraCkpt,
        $strUsuaCkpt,
        $strFletDire,
        $strGuiaReto,
        $strPorcIvax,
        $strMontIvax,
        $strPorcSgro,
        $strMontSgro,
        $strMontBase,
        $strMontFran,
        $strMontTota,
        $strMontCanc,
        $strReciPago,
        $strFechPago,
        $strNumeDocu,
        $strTipoDocu
    );
    //----------------------------------------------------------------------
    // El vector generado, se lleva al archivo plano
    //----------------------------------------------------------------------

    $strCadeAudi = implode(';',$arrLineArch);
    fputs($mixManeArch,$strCadeAudi.";\n");
    $intCantRepe ++;
}
if ($intCantRepe > 0) {
    QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strNombArch);
} else {
    echo '<h2>No hay registros que satisfagan las condiciones</h2>';
}