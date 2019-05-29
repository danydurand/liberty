<?php
#------------------------------------------------------------
# Programa      : repo_guias_xls_sql.php
# Realizado por : Irán Anzola
# Fecha Elab.   : 27/06/2017
# Descripcion   : Reporte de Guias en Excel con criterio SQL
#------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

$strSepaColu = ';';
if (isset($_SESSION['SepaColu'])) {
    $strSepaColu = $_SESSION['SepaColu'];
}
$objCondWher = unserialize($_SESSION['CondWher']);
$strCadeSqlx = unserialize($_SESSION['CritSqlx']);
$objUser = unserialize($_SESSION['User']);
//----------------------------------------------------------------------
// Se determina el nombre del archivo que sera generado
//----------------------------------------------------------------------
$strNombArch = __TEMP__.'/guias_'.$objUser->LogiUsua.'.csv';
$mixManeArch = fopen($strNombArch,'w');
//----------------
// Encabezados
//----------------
$arrEnca2XLS = array(
    'Guia Lib',
    'Guia Ext',
    'Cliente',
    'Fecha',
    'Suc.Orig',
    'Recep.Orig',
    'Suc.Dest',
    'Recep.Dest',
    'Mod Pago',
    'Remitente',
    'Destinatario',
    'Tarifa',
    'Peso',
    'Tarifa Vol',
    'Piezas',
    'V.Decl',
    'Entregado A',
    'F. Entrega',
    'H. Entrega',
    'Fecha POD',
    'Ult.Ckpt',
    'Suc.Ult.Ckpt',
    'F.Ult.Ckpt',
    'H.Ult.Ckpt',
    'Usuario',
    'Ult. Ruta',
    'FD',
    'Guia Retorno',
    'Guia Original',
    '% Iva',
    'Mto Iva',
    '% Sgro',
    'Mto Sgro',
    'Mto Base',
    '% Dscto',
    'Mto Dscto',
    'Franqueo',
    'Mto Total',
    'Monto Cancelado',
    'Cons. Dscto?',
    'Recibio el Pago',
    'F.Pago',
    'T. Documento',
    'Nro Documento',
    'Contenido',
    'F. PickUp',
    'F. Traslado',
    'F. Arribo',
    'F. En Ruta',
    'F. Entrega',
    'D. PickUp',
    'D. Traslado',
    'D. Arribo',
    'D. En Ruta',
    'D. Entrega',
    'Total Dias',
    'D. Sin Entrega',
    'D. Sin Actualizar'
    );
//----------------------------------------------------------------------
// El vector de encabezados, se lleva al archivo plano
//----------------------------------------------------------------------
$strCadeAudi = implode($strSepaColu,$arrEnca2XLS);
fputs($mixManeArch,$strCadeAudi.$strSepaColu."\n");
//-----------------------
// Chunk de registros
//-----------------------
$intCantRegi = Guia::QueryCount(QQ::AndCondition($objCondWher));
$intCantChun = 500;
if ($intCantRegi > $intCantChun) {
    $intCantCicl = round($intCantRegi/$intCantChun,0);
} else {
    $intCantCicl = 1;
}
$intCantRepe = 0;
$objClauLimi = QQ::Clause();
while ($intCantRepe <= $intCantCicl) {
    $objClauLimi = QQ::LimitInfo($intCantChun,$intCantRepe*$intCantChun);
    $arrDatoRepo = Guia::QueryArray(QQ::AndCondition($objCondWher),QQ::Clause($objClauLimi));
    //--------------------------------------------------------------
    // Recorro la lista de registros, armando el vector de datos
    //--------------------------------------------------------------
    foreach ($arrDatoRepo as $objTabla) {
        $strDescTari = '';
        if (!is_null($objTabla->TarifaId)) {
            $objTariGuia = FacTarifa::Load($objTabla->TarifaId);
            if ($objTariGuia) {
                $strDescTari = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTariGuia->Descripcion)));
            }
        }
        $objEstaGuia = $objTabla->GetEstadisticaDeGuias();
        $strNumeGuia = " ".quitaCaracter($strSepaColu,$objTabla->NumeGuia);
        $strNumeTrac = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->GuiaExterna)));
        $strCodiClie = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->CodiClieObject->CodigoInterno)));
        $strFechGuia = $objTabla->FechGuia->__toString("YYYY-MM-DD");
        $strEstaOrig = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->EstaOrig)));
        $strReceOrig = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->ReceptoriaOrigen)));
        $strEstaDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->EstaDest)));
        $strReceDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->ReceptoriaDestino)));
        $strModaPago = TipoGuiaType::ToStringCorto($objTabla->TipoGuia);
        $strNombRemi = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->NombRemi)));
        $strNombDest = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->NombDest)));
        $strPesoGuia = nf($objTabla->PesoGuia);
        $strPesoVolu = SinoType::ToString($objTabla->CantAyudantes);
        $strCantPiez = nf0($objTabla->CantPiez);
        $strValoDecl = nf($objTabla->ValorDeclarado);
        $strEntrAxxx = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->EntregadoA)));
        $strEntrDigi = strlen($objTabla->FechaEntrega) > 0 ? $objTabla->FechaEntrega->__toString("YYYY-MM-DD") : '';
        $strHoraEntr = $objTabla->HoraEntrega;
        $strFechPodx = $objTabla->FechaPod ? $objTabla->FechaPod->__toString("YYYY-MM-DD") : '';
        $strCodiCkpt = $objTabla->CodiCkpt;
        $strEstaCkpt = $objTabla->EstaCkpt;
        $strFechCkpt = $objTabla->FechCkpt ? $objTabla->FechCkpt->__toString("YYYY-MM-DD") : '';
        $strHoraCkpt = $objTabla->HoraCkpt;
        $objUsuaCkpt = Usuario::Load($objTabla->UsuaCkpt);
        $strUsuaCkpt = $objUsuaCkpt ? $objUsuaCkpt->LogiUsua : '';
        $strCodiRuta = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->UltimaRuta())));
        $strFletDire = $objTabla->FleteDirecto;
        $strGuiaReto = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->GuiaRetorno)));
        $strGuiaOrig = '';
        $intPosiCade = strpos(quitaCaracter($strSepaColu,$objTabla->Observacion),'RETORNO DE LA GUIA: ');
        if ($intPosiCade !== false) {
            $strGuiaOrig = QuitarCaracteresEspeciales2(utf8_decode(substr($objTabla->Observacion, 20)));
        }
        //-------------------------------------------------------------------------------
        // A solicitud de la Gte de Ventas (Yelimar Roth) hemos hecho reconversión
        // de los montos anteriores a la fecha de implementación real de dicho proceso
        //-------------------------------------------------------------------------------
        $decMontBase = $objTabla->MontoBase;
        $decMontIvax = $objTabla->MontoIva;
        $decMontFran = $objTabla->MontoFranqueo;
        $decMontSgro = $objTabla->MontoSeguro;
        $decMontTota = $objTabla->MontoTotal;
        if ($strFechGuia < '2018-08-20') {
            $decMontBase = $objTabla->MontoBase / 100000;
            $decMontIvax = $objTabla->MontoIva / 100000;
            $decMontFran = $objTabla->MontoFranqueo / 100000;
            $decMontSgro = $objTabla->MontoSeguro / 100000;
            $decMontTota = $objTabla->MontoTotal / 100000;
        }
        $strPorcIvax = nf($objTabla->PorcentajeIva);
        $strMontIvax = nf($decMontIvax);
        $strPorcSgro = nf($objTabla->PorcentajeSeguro);
        $strMontSgro = nf($decMontSgro);
        $strMontBase = nf($decMontBase);
        $strPorcDcto = nf($objTabla->PorcentajeDscto);
        $strMontDcto = nf($objTabla->MontoDscto);
        $strConsDcto = $objTabla->ConsiderarDscto ? 'SI' : 'NO';
        $strMontFran = nf($decMontFran);
        $strMontTota = nf($decMontTota);
        // echo4;
        //---------------------------
        // Datos del Pago Realizado
        //---------------------------
        $objCobrCodx = CobroCod::Load($objTabla->NumeGuia);
        if ($objCobrCodx) {
            $strMontCanc = nf($objCobrCodx->MontoCancelado);
            $strReciPago = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objCobrCodx->RecibioElPago)));
            if ($objCobrCodx->FechaPago) {
                $strFechPago = $objCobrCodx->FechaPago->__toString("YYYY-MM-DD");
            } else {
                $strFechPago = "N/A";
            }
            if ($objCobrCodx->TipoDocumento) {
                $strTipoDocu = TipoDocumento($objCobrCodx->TipoDocumento);
            } else {
                $strTipoDocu = "N/A";
            }
            $strNumeDocu = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objCobrCodx->NumeroDocumento)));
        } else {
            $strMontCanc = 0;
            $strReciPago = 0;
            $strFechPago = 0;
            $strTipoDocu = 0;
            $strNumeDocu = 0;
        }
        $strDescCont = QuitarCaracteresEspeciales2(utf8_decode(quitaCaracter($strSepaColu,$objTabla->DescCont)));
        // Estadistica de la guia
        if ($objEstaGuia) {
            $strFechPick = $objEstaGuia->FechaPickup ? $objEstaGuia->FechaPickup->__toString("YYYY-MM-DD") : null;
            $strFechTras = $objEstaGuia->FechaTraslado ? $objEstaGuia->FechaTraslado->__toString("YYYY-MM-DD") : null;
            $strFechArri = $objEstaGuia->FechaArribo ? $objEstaGuia->FechaArribo->__toString("YYYY-MM-DD") : null;
            $strFechRuta = $objEstaGuia->FechaRuta ? $objEstaGuia->FechaRuta->__toString("YYYY-MM-DD") : null;
            $strFechEntr = $objEstaGuia->FechaEntrega ? $objEstaGuia->FechaEntrega->__toString("YYYY-MM-DD") : null;
            $intDiasPick = $objEstaGuia->DiasPickup;
            $intDiasTras = $objEstaGuia->DiasTraslado;
            $intDiasArri = $objEstaGuia->DiasArribo;
            $intDiasRuta = $objEstaGuia->DiasRuta;
            $intDiasEntr = $objEstaGuia->DiasEntrega;
            $intAcumEntr = $objEstaGuia->AcumuladoEntrega;
            $intSinxEntr = $objEstaGuia->AcumuladoSinEntrega;
            $intDiasSina = $objEstaGuia->DiasSinActualizar;
        } else {
            $strFechPick = null;
            $strFechTras = null;
            $strFechArri = null;
            $strFechRuta = null;
            $strFechEntr = null;
            $intDiasPick = null;
            $intDiasTras = null;
            $intDiasArri = null;
            $intDiasRuta = null;
            $intDiasEntr = null;
            $intAcumEntr = null;
            $intSinxEntr = null;
            $intDiasSina = null;
        }

        // echo5;
        $arrLineArch = array(
            $strNumeGuia,
            $strNumeTrac,
            $strCodiClie,
            $strFechGuia,
            $strEstaOrig,
            $strReceOrig,
            $strEstaDest,
            $strReceDest,
            $strModaPago,
            $strNombRemi,
            $strNombDest,
            $strDescTari,
            $strPesoGuia,
            $strPesoVolu,
            $strCantPiez,
            $strValoDecl,
            $strEntrAxxx,
            $strEntrDigi,
            $strHoraEntr,
            $strFechPodx,
            $strCodiCkpt,
            $strEstaCkpt,
            $strFechCkpt,
            $strHoraCkpt,
            $strUsuaCkpt,
            $strCodiRuta,
            $strFletDire,
            $strGuiaReto,
            $strGuiaOrig,
            $strPorcIvax,
            $strMontIvax,
            $strPorcSgro,
            $strMontSgro,
            $strMontBase,
            $strPorcDcto,
            $strMontDcto,
            $strMontFran,
            $strMontTota,
            $strMontCanc,
            $strConsDcto,
            $strReciPago,
            $strFechPago,
            $strTipoDocu,
            $strNumeDocu,
            $strDescCont,
            $strFechPick,
            $strFechTras,
            $strFechArri,
            $strFechRuta,
            $strFechEntr,
            $intDiasPick,
            $intDiasTras,
            $intDiasArri,
            $intDiasRuta,
            $intDiasEntr,
            $intAcumEntr,
            $intSinxEntr,
            $intDiasSina
        );
        // echo6;
        //----------------------------------------------------------------------
        // El vector generado, se lleva al archivo plano
        //----------------------------------------------------------------------
        $strCadeAudi = implode($strSepaColu,$arrLineArch);
        fputs($mixManeArch,$strCadeAudi.$strSepaColu."\n");
        // echo "<br>";
    }
    // echo"Salió<br>";
    $intCantRepe ++;
}
if ($intCantRepe > 0) {
    // echo"Descarga<br>";
    QApplication::Redirect(__UTIL__.'/descargar_archivo.php?f='.$strNombArch);
} else {
    echo '<h2>No hay registros que satisfagan las condiciones</h2>';
}