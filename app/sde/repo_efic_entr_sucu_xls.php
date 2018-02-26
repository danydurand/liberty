<?php
//------------------------------------------------
// Programa      : repo_efic_entr_sucu_xls.php
// Realizado por : Iran Anzola
// Fecha Elab.   : 08/05/2017
//------------------------------------------------
require_once('qcubed.inc.php');
//--------------------------------------
// Criterios de seleccion de registros
//--------------------------------------
$dttFechDhoy = FechaDeHoy();
$dttFechInic = unserialize($_SESSION['FechInic']);
$dttFechFina = unserialize($_SESSION['FechFina']);
if (isset($_SESSION['SucuSele'])) {
    $arrSucuSele[] = Estacion::LoadByCodiEsta(unserialize($_SESSION['SucuSele']));
} else {
    $arrSucuSele = Estacion::LoadArrayByCodiStat(1);
}
//-----------------------------------------
// Se Procesan una por una las Sucursales
//-----------------------------------------
foreach ($arrSucuSele as $objSucursal) {
    if (!in_array($objSucursal->CodiEsta,array('TODOS','EXP','MIA'))) {
        //-----------------------------------------------------------
        // Se seleccionan los registros que satisfagan la condición
        //-----------------------------------------------------------
        $arrDatoRepo = array();
        $objDatabase = Guia::GetDatabase();
        //-----------------------------------------------------------------------------------------------------
        // Se arma el query para obtener la información del reporte, guía, estación, fecha entrega, fecha pod
        //-----------------------------------------------------------------------------------------------------
        $strCadeSqlx  = "select g.nume_guia, g.esta_orig, g.esta_dest, g.nomb_remi, g.nomb_dest, k.fech_ckpt, g.fecha_pod, g.fecha_entrega, g.fech_guia ";
        $strCadeSqlx .= "  from guia g, guia_ckpt k";
        $strCadeSqlx .= " where g.nume_guia = k.nume_guia ";
        $strCadeSqlx .= "   and g.fecha_pod between '$dttFechInic' and '$dttFechFina'";
        $strCadeSqlx .= "   and g.codi_ckpt = 'OK' ";
        $strCadeSqlx .= "   and g.sistema_id != 'int'";
        $strCadeSqlx .= "   and esta_dest = '".$objSucursal->CodiEsta."'";
        $strCadeSqlx .= "   and esta_dest not in ( 'TODOS','EXP' ) ";
        $objDbResult  = $objDatabase->Query($strCadeSqlx);
        while ($mixRegistro = $objDbResult->FetchArray()) {
            // ----------------------------------------------------------------------------------------------------
            // Se determina si las variables que se utilizarán para obtener la efeciciencia contienen datos o no
            // ----------------------------------------------------------------------------------------------------
            if (strlen($mixRegistro['fech_ckpt']) > 0) {
                $intDiasHabi = diasHabilesTranscurridos($mixRegistro['fecha_pod'],$mixRegistro['fech_ckpt']);
                $blnHabiPick = true;
            } else {
                $intDiasHabi = diasHabilesTranscurridos($mixRegistro['fecha_pod'],$mixRegistro['fech_guia']);
                $blnHabiPick = false;
            }
            if (strlen($mixRegistro['fecha_entrega']) > 0) {
                $intDiasHabi2 = diasHabilesTranscurridos($mixRegistro['fecha_pod'],$mixRegistro['fecha_entrega']);
            } else {
                $strCadeSql2 = "select fech_ckpt
                              from guia_ckpt 
                             where nume_guia = '".$mixRegistro['nume_guia']."'
                               and codi_ckpt = 'OK'
                             order by fech_ckpt desc,
                                      hora_ckpt desc
                             limit 1";
                $objDbResulx  = $objDatabase->Query($strCadeSql2);
                $mixRegistr1 = $objDbResult->FetchArray();
                $intDiasHabi2 = diasHabilesTranscurridos($mixRegistro['fecha_pod'],$mixRegistr1['fech_ckpt']);
            }
            //----------------------------------
            // Vector de datos para el reporte
            //----------------------------------
            if ($blnHabiPick) {
                $strHabiPick = '';
            } else {
                $strHabiPick = '*';
            }
            $objMensPago = BuscarParametro('MensUsua','FormPago',"TODO",0);
            if ($objMensPago == 0) {
                $strMensUnox = '';
            }
            $arrDatoRepo[] = array(
                $mixRegistro['nume_guia'].$strHabiPick,
                $mixRegistro['esta_orig']."-".$mixRegistro['esta_dest'],
                substr($mixRegistro['nomb_remi'],0,20),
                substr($mixRegistro['nomb_dest'],0,20),
                $mixRegistro['fech_ckpt'],
                $mixRegistro['fecha_pod'],
                $intDiasHabi,
                $intDiasHabi2
            );
        }
        $arrDatoRepo = ordenar_array($arrDatoRepo,'6',SORT_DESC);
        $arrEncaDato = array('Guia','Ori-Des','Remitente','Destinatario','F.Pick-Up','Fecha POD','Dias', 'Dias Entr');
        $objValoRepo = new stdClass();
        $objValoRepo->arrEncaDato = $arrEncaDato;
        $objValoRepo->arrDatoExpo = $arrDatoRepo;
        $objValoRepo->strTituRepo = 'efic_en_entr_por_sucu_'.$objSucursal->CodiEsta;
        $objValoRepo->blnConxBord = true;

        $objExpoDato = new ExportarDatos($objValoRepo);
        $objExpoDato->Exportar();
    }
}