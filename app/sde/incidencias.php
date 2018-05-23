<?php
//-----------------------------------------------------------------------------
// Programa      : incidencias.php
// Migrado por   : Daniel Durand
// Fecha Migr.   : 15/08/2017
// Descripcion   : Este programa, permite asignar una incidencia o checkpoint
//                 a una o varias guías.
//------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class Incidencias extends FormularioBaseKaizen {
    protected $lstListCkpt;  // ListBox de checkpoints
    protected $strCadeSqlx;
    protected $arrColuQury;
    protected $arrValoQury;
    protected $objDataBase;
    protected $intOperSele;
    protected $arrNumeCont;
    protected $objOperSele;
    protected $txtNumeSeri;
    protected $lstCodiEsta;
    protected $objUsuario;
    protected $intContRegi;
    protected $txtTextObse;
    protected $arrGuiaSina;
    protected $rdbTipoInci;


    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Incidencias';

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->rdbTipoInci_Create();
        $this->lstListCkpt_Create();
        $this->txtNumeSeri_Create();
        $this->txtTextObse_Create();

        $this->intContRegi = 0;
    }

    //--------------------------------
    // Aqui se crean los objetos
    //--------------------------------

    protected function rdbTipoInci_Create() {
        $this->rdbTipoInci = new QRadioButtonList($this);
        $this->rdbTipoInci->Name = QApplication::Translate('Tipo de Incidencia');
        $this->rdbTipoInci->AddItem('&nbsp;Operativa','O');
        $this->rdbTipoInci->AddItem('&nbsp;Registro de Trabajo','R');
        $this->rdbTipoInci->Required = true;
        $this->rdbTipoInci->Width = 250;
        $this->rdbTipoInci->SelectedIndex = 0;
        $this->rdbTipoInci->RepeatColumns = 2;
        $this->rdbTipoInci->HtmlEntities = false;
        $this->rdbTipoInci->AddAction(new QChangeEvent(), new QAjaxAction('rdbTipoInci_Change'));
    }

    protected function txtTextObse_Create() {
        $this->txtTextObse = new QTextBox($this);
        $this->txtTextObse->Name = QApplication::Translate('Observacion');
        $this->txtTextObse->Width = 250;
        $this->txtTextObse->MaxLength = 100;
        $this->txtTextObse->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtTextObse->Required = true;
    }

    protected function lstListCkpt_Create() {
        $this->lstListCkpt = new QListBox($this);
        $this->lstListCkpt->Name = QApplication::Translate("Checkpoint");
        $this->lstListCkpt->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->lstListCkpt->Width = 250;
        //----------------------------------------------------------------------------------
        // No todos los checkpoints pueden ser utilizados en esta pantalla de Incidencias.
        // Esto se controla en la tabla Parametro.  Inicialmente se arma un vector con los
        // checkpoints que nadie puede usar en este formulario.
        //----------------------------------------------------------------------------------
        $strCkptNadi = BuscarParametro("CtrlCkpt","Nadie","Txt1","'OK','TR','AR','ER','PU','BG','SR','CS','NR'");
        $arrCkptNadi = explode(",",$strCkptNadi);
        //-------------------------------------------------------------------------------
        // Existen otros checkpoints que solo pueden ser usados por "algunos" Usuarios.
        //-------------------------------------------------------------------------------
        $strCkptAlgu = BuscarParametro("CtrlCkpt","Algunos","Txt1","'PP'");
        $arrCkptAlgu = explode(",",$strCkptAlgu);
        foreach (SdeCheckpoint::LoadCheckpointsActivos() as $objCkpt) {
            if (!in_array($objCkpt->CodiCkpt,$arrCkptNadi)) {
                if (in_array($objCkpt->CodiCkpt,$arrCkptAlgu)) {
                    //------------------------------------------------------------------
                    // Si el checkpoint solo puede ser usado por algunos Usuarios, se
                    // verifica si el Usuario actual es uno de esos
                    //------------------------------------------------------------------
                    $strUsuaCkpt = BuscarParametro("CtrlCkpt",$objCkpt->CodiCkpt,"Txt1","ddurand");
                    $arrUsuaCkpt = explode(",",$strUsuaCkpt);
                    if (count($arrUsuaCkpt)) {
                        if (in_array($this->objUsuario->LogiUsua,$arrUsuaCkpt)) {
                            //-----------------------------------------------------------------------------
                            // Si el Usuario esta autorizado a usarlo, el checkpoint se agrega al ListBox
                            //-----------------------------------------------------------------------------
                            $this->lstListCkpt->AddItem($objCkpt->__toString(),$objCkpt->CodiCkpt);
                        }
                    }
                } else {
                    //--------------------------------------------------------------------------------
                    // El checkpoint no tiene restricciones de uso, se agrega libremente al ListBox
                    //--------------------------------------------------------------------------------
                    $this->lstListCkpt->AddItem($objCkpt->__toString(),$objCkpt->CodiCkpt);
                }
            }
        }
        $this->lstListCkpt->Required = true;
    }

    protected function txtNumeSeri_Create() {
        $this->txtNumeSeri = new QTextBox($this);
        $this->txtNumeSeri->Name = QApplication::Translate("Nro de Guias");
        $this->txtNumeSeri->Required = true;
        $this->txtNumeSeri->TextMode = QTextMode::MultiLine;
        $this->txtNumeSeri->Height = 250;
        $this->txtNumeSeri->Width = 250;
    }

    //---------------------------------------
    // Acciones asociadas a los objetos
    //---------------------------------------

    protected function rdbTipoInci_Change() {
        if ($this->rdbTipoInci->SelectedValue == "R") {
            $this->lstListCkpt->Visible = false;
            $this->txtTextObse->Name = QApplication::Translate("Comentario Interno");
            $this->txtTextObse->MaxLength = 250;
            $this->txtTextObse->TextMode = QTextMode::MultiLine;
            $this->txtTextObse->Height = 60;
        } else {
            $this->lstListCkpt->Visible = true;
            $this->txtTextObse->Name = QApplication::Translate("Observacion");
            $this->txtTextObse->MaxLength = 100;
            $this->txtTextObse->TextMode = QTextMode::SingleLine;
            $this->txtTextObse->Height = 30;
        }
        $this->lblMensUsua->Text = "";
    }

    protected function validarGuia(Guia $objGuiaEval, $strTipoInci='O', $strCodiCkpt) {
        $strTextVali = '';
        if ($strTipoInci == 'O') {   // Incidencia Operativa
            if ($strCodiCkpt != 'CF') {  // El Cierre Forzado, no requiere validaciones
                $arrSepuProc = $objGuiaEval->SePuedeProcesar();
                if (!$arrSepuProc['TodoOkey']) {
                    $strTextVali = $arrSepuProc['MensUsua'];
                    return $strTextVali;
                }
                if ($objGuiaEval->CodiCkpt == 'TR') {
                    $strTextVali = '(No se ha Recibido/Auditado)';
                    return $strTextVali;
                }
            }
        }
        return $strTextVali;
    }

    protected function btnSave_Click() {
        $this->objDataBase = QApplication::$Database[1];
        $this->objUsuario  = unserialize($_SESSION['User']);
        $this->arrGuiaSina = array();

        $arrGuiaOkey = explode(',',nl2br2($this->txtNumeSeri->Text));
        $arrGuiaOkey = LimpiarArreglo($arrGuiaOkey);
        $strCodiCkpt = $this->lstListCkpt->SelectedValue;
        $this->txtNumeSeri->Text = '';
        //---------------------------------------------------------------------------------------------
        // La rutina "GrabarCheckpoint" que sera invocada mas adelante en este mismo codigo, hace uso
        // de una variable llamada $_SERVER['CkptConf'] la cual debe contener un arreglo con los
        // checkpoints de confirmacion; por lo tanto, aqui se genera y almacena dicho vector
        //---------------------------------------------------------------------------------------------
        $arrVectRece = Counter::LoadArrayByStatusId(1);
        $arrCkptConf = array();
        foreach ($arrVectRece as $objReceptoria) {
            $arrCkptConf[] = $objReceptoria->CkptConfirmacion;
        }
        $_SERVER['CkptConf'] = $arrCkptConf;

        if ($this->rdbTipoInci->SelectedValue == "O") {
            $strCodiCkpt = $this->lstListCkpt->SelectedValue;
        } else {
            $strCodiCkpt = "CG";
        }
        $intContVali = 0;
        $intContGuia = 0;
        $intContCkpt = 0;
        //-----------------------------------------------------------------------
        // Se procesan una a una las Guias proporcionadas por el Usuario
        //-----------------------------------------------------------------------
        $strTipoInci = $this->rdbTipoInci->SelectedValue;
        foreach ($arrGuiaOkey as $strNumeSeri) {
            $blnTodoOkey = true;
            $objGuia = Guia::Load($strNumeSeri);
            if (!$objGuia) {
                $this->txtNumeSeri->Text .= $strNumeSeri." (No Existe)".chr(13);
                $blnTodoOkey = false;
            } else {
                $strTextVali = $this->validarGuia($objGuia,$strTipoInci,$strCodiCkpt);
                if (strlen($strTextVali) > 0) {
                    $this->txtNumeSeri->Text .= $strNumeSeri.' '.$strTextVali.chr(13);
                    $blnTodoOkey = false;
                } else {
                    $intContGuia++;
                }
            }
            if ($blnTodoOkey) {
                if ($strTipoInci == 'R') {
                    //------------------------------------
                    // Incidencia de Registro de Trabajo
                    //------------------------------------
                    $arrParaRegi['CodiCkpt'] = $strCodiCkpt;
                    $arrParaRegi['TextMens'] = "INCIDENCIAS: ".strtoupper($this->txtTextObse->Text);
                    $arrParaRegi['NumeGuia'] = $strNumeSeri;
                    $arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
                    $arrParaRegi['CodiEsta'] = $this->objUsuario->CodiEsta;
                    CrearRegistroDeTrabajo($arrParaRegi);
                    $intContCkpt ++;
                } else {
                    //-------------------------
                    // Incidencia Operativa
                    //-------------------------
                    $arrDatoCkpt = array();
                    $arrDatoCkpt['NumeGuia'] = $objGuia->NumeGuia;
                    $arrDatoCkpt['UltiCkpt'] = '';
                    $arrDatoCkpt['GuiaAnul'] = $objGuia->Anulada;
                    $arrDatoCkpt['CodiCkpt'] = $strCodiCkpt;
                    $arrDatoCkpt['TextCkpt'] = $this->txtTextObse->Text;
                    $arrDatoCkpt['CodiRuta'] = '';

                    $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                    if ($arrResuGrab['TodoOkey']) {
                        $intContCkpt ++;
                        //-----------------------------------------------------------------------------------
                        // Si se trata del checkpoint "PP", se deben cargar la informacion del "pago" en la
                        // tabla de Cobros Cod
                        //-----------------------------------------------------------------------------------
                        if ($strCodiCkpt == "PP") {
                            $this->cargarDatosDeCobro($strNumeSeri);
                        }
                    } else {
                        if ($arrResuGrab['MotiNook'] == "Alto Valor sin Monto de Aduana") {
                            $this->arrGuiaSina[] = array($strNumeSeri);
                        }
                        $blnTodoOkey = false;
                        $this->txtNumeSeri->Text .= $strNumeSeri." (".$arrResuGrab['MotiNook'].")".chr(13);
                    }
                }
            }
        }
        if ($blnTodoOkey && ($intContGuia == $intContCkpt)) {
            if ($this->rdbTipoInci->SelectedValue == 'R') {
                $strMensUsua = sprintf('El Proceso culmino Exitosamente. Guias procesadas (%s)',$intContGuia);
            } else {
                $strMensUsua = sprintf('El Proceso culmino Exitosamente. Guias procesadas (%s)  Checkpoints procesados (%s)',$intContGuia,$intContCkpt);
            }
            $this->mensaje($strMensUsua,'i','m','l', __iCHEC__);

        } else {
            $strMensUsua = sprintf('Hubo Errores en la Transaccion. Guias procesadas (%s)  Checkpoints procesados (%s)',$intContGuia,$intContCkpt);
            $this->mensaje($strMensUsua,'i','d','l',__iHAND__);
        }
    }


    protected function cargarDatosDeCobro($strNumeGuia) {
        $objGuia = Guia::Load($strNumeGuia);
        $objUsuario = unserialize($_SESSION['User']);
        //---------------------------------------------------------------------
        // Si la guia tiene informacion del pago realizado por el Usuario,
        // los datos del cobro cod, deben tomarse de ahi, en caso contrario
        // se asignan valores por defecto
        //---------------------------------------------------------------------
        $arrDatoPago = DatosPago::LoadArrayByGuiaId($strNumeGuia);
        if (count($arrDatoPago) > 0) {
            $objDatoPago = $arrDatoPago[0];
            if (in_array($objDatoPago->TipoTransaccionId, array(1,2))) {
                $intTipoDocu = 3;
            } else {
                $intTipoDocu = 4;
            }
            $strNumeDocu = $objDatoPago->NumeReci;
        } else {
            $intTipoDocu = 1;
            $strNumeDocu = '';
        }
        $dttFechPago = new QDateTime(QDateTime::Now);
        //------------------------------------------
        // Aqui se graban los datos en Cobros COD
        //------------------------------------------
        $objCobroCod = CobroCod::Load($strNumeGuia);
        if (!$objCobroCod) {
            $objCobroCod = new CobroCod();
        }
        $objCobroCod->NumeGuia = $strNumeGuia;
        $objCobroCod->MontoCancelado = $objGuia->MontoTotal;
        $objCobroCod->RecibioElPago = $objUsuario->LogiUsua;
        $objCobroCod->TipoDocumento = $intTipoDocu;
        $objCobroCod->NumeroDocumento = $strNumeDocu;
        $objCobroCod->FechaPago = $dttFechPago;
        $objCobroCod->Save();
    }

}

Incidencias::Run('Incidencias');
?>
