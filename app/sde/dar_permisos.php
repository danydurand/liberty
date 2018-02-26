<?php
//---------------------------------------------------------------------------------
// Programa      : dar_permisos.php
// Elaborado por : Juan Duran
// Fecha Elab.   : 16/02/2017
// Descripcion   : Este programa, permite otorgar/denegar permisos a los Usuarios
//                 sobre ciertas opciones del Sistema que no estan controladas
//                 por el modulo de permisologia original del Sistema
//---------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class DarPermisos extends FormularioBaseKaizen {
    protected $lstPermProc;
    protected $txtTextExpl;
    protected $txtLogiUsua;

    protected $blnDarxQuit;
    protected $btnQuitar;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Dar/Quitar Permisos');

        $this->lstPermProc_Create();
        $this->txtTextExpl_Create();
        $this->txtLogiUsua_Create();

        $arrUsuaAuto = array();
        $arrUsuaAuto[] = "ddurand";
        $arrUsuaAuto[] = "jrivero";
        $arrUsuaAuto[] = "jlaya";

        $this->blnDarxQuit = true;
        if (!in_array($this->objUsuario->LogiUsua,$arrUsuaAuto)) {
            $this->blnDarxQuit = false;
        }

        $this->btnSave_Create();
        $this->btnQuitar_Create();
    }

    //-------------------------------
    // Aqui se crean los objetos
    //-------------------------------

    protected function lstPermProc_Create() {
        $this->lstPermProc = new QListBox($this);
        $this->lstPermProc->Name = QApplication::Translate("Permiso");
        $this->lstPermProc->Required = true;
        $this->lstPermProc->Width = 300;
        $this->lstPermProc->AddItem(QApplication::Translate("- Seleccione Uno -",null));
        $arrListPerm = Parametro::LoadArrayByIndiPara('VariPerm');
        foreach ($arrListPerm as $objPermiso) {
            $this->lstPermProc->AddItem(trim($objPermiso->DescPara)." (".$objPermiso->CodiPara.")",$objPermiso);
        }
        $this->lstPermProc->AddAction(new QChangeEvent(), new QAjaxAction("lstPermProc_Change"));
    }

    protected function txtTextExpl_Create() {
        $this->txtTextExpl = new QTextBox($this);
        $this->txtTextExpl->Name = QApplication::Translate('Mas Información');
        $this->txtTextExpl->TextMode = QTextMode::MultiLine;
        $this->txtTextExpl->Rows = 3;
        $this->txtTextExpl->Width = 300;
        $this->txtTextExpl->ForeColor = "blue";
        $this->txtTextExpl->Enabled = false;
    }

    protected function txtLogiUsua_Create() {
        $this->txtLogiUsua = new QTextBox($this);
        $this->txtLogiUsua->Name = QApplication::Translate('Login(es)');
        $this->txtLogiUsua->TextMode = QTextMode::MultiLine;
        $this->txtLogiUsua->Rows = 5;
        $this->txtLogiUsua->Required = true;
    }

    protected function btnSave_Create() {
        $this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="fa fa-thumbs-o-up fa-lg"></i> Dar';
        $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        $this->btnSave->CssClass = 'btn btn-success btn-sm';
        $this->btnSave->PrimaryButton = true;
        $this->btnSave->CausesValidation = true;
        $this->btnSave->Visible = $this->blnDarxQuit;
    }

    protected function btnQuitar_Create() {
        $this->btnQuitar = new QButton($this);
        $this->btnQuitar->Text = '<i class="fa fa-thumbs-o-down fa-lg"></i> Quitar';
        $this->btnQuitar->AddAction(new QClickEvent(), new QServerAction('btnQuitar_Click'));
        $this->btnQuitar->CssClass = 'btn btn-danger btn-sm';
        $this->btnQuitar->PrimaryButton = true;
        $this->btnQuitar->CausesValidation = true;
        $this->btnQuitar->Visible = $this->blnDarxQuit;
    }

    //------------------------------------
    // Acciones relativas a los objetos
    //------------------------------------

    protected function lstPermProc_Change($strFormId, $strControlId, $strParameter) {
        $this->txtTextExpl->Text = "";
        if ($this->lstPermProc->SelectedValue) {
            $this->txtTextExpl->Text = $this->lstPermProc->SelectedValue->ParaTxt1;
        }
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $blnTodoOkey = true;
        $arrListLogi = explode(',',nl2br2($this->txtLogiUsua->Text));
        //-----------------------------------------------------------------------------
        // Con array_unique se eliminan los logines repetidos en caso de que los haya
        //-----------------------------------------------------------------------------
        $arrListLogi = array_unique($arrListLogi,SORT_STRING);
        $this->txtLogiUsua->Text = '';
        $strPermProc = $this->lstPermProc->SelectedValue->CodiPara;
        $strNombBase = $this->lstPermProc->SelectedValue->ParaTxt2;
        //--------------------------------------------------------
        // Se procesan uno a uno los logines proporcionados
        //--------------------------------------------------------
        $intCantRegi = 0;
        $intUsuaProc = 0;
        foreach ($arrListLogi as $strLogiUsua) {
            if (!in_array($strLogiUsua,array('cliente','liberty'))) {
                $objUsuario = Usuario::LoadByLogiUsua($strLogiUsua);
                if ($objUsuario) {
                    $objPermProc = Parametro::Load($strPermProc, $strLogiUsua);
                    if ($objPermProc) {
                        //---------------------------------------------------------------------------
                        // Si el registro existe, se otorga el permiso cambiando el campo para_val1
                        //---------------------------------------------------------------------------
                        $objPermProc->ParaVal1 = 1;
                    } else {
                        //------------------------------------------------------
                        // Si el registro no existe, se crea el registro nuevo
                        //------------------------------------------------------
                        $objPermProc = new Parametro();
                        $objPermProc->IndiPara = $strPermProc;
                        $objPermProc->CodiPara = $strLogiUsua;
                        $objPermProc->DescPara = trim($objUsuario->NombUsua." ".$objUsuario->ApelUsua);
                        $objPermProc->ParaTxt1 = ".";
                        $objPermProc->ParaVal1 = 1;
                    }
                    $objPermProc->Save();
                    //------------------------
                    // Log de Transacciones
                    //------------------------
                    $strTextCamb = 'Se otorgo permiso para: '.$this->lstPermProc->SelectedName;
                    $arrLogxCamb['strNombTabl'] = 'Permisos';
                    $arrLogxCamb['intRefeRegi'] = $objUsuario->CodiUsua;
                    $arrLogxCamb['strNombRegi'] = $objUsuario->LogiUsua;
                    $arrLogxCamb['strDescCamb'] = $strTextCamb;
                    LogDeCambios($arrLogxCamb);
                    $intUsuaProc++;
                } else {
                    $this->txtLogiUsua->Text = $strLogiUsua." (NO EXISTE)".chr(13);
                }
                $intCantRegi++;
            } else {
                $this->txtLogiUsua->Text = $strLogiUsua." (NO PUEDE SER PROCESADO)".chr(13);
            }
        }
        $this->mensaje('Registros procesados: '.$intUsuaProc."/".$intCantRegi,'','','',__iCHEC__);
    }

    protected function btnQuitar_Click($strFormId, $strControlId, $strParameter) {
        $blnTodoOkey = true;
        $arrListLogi = explode(',',nl2br2($this->txtLogiUsua->Text));
        //-----------------------------------------------------------------------------
        // Con array_unique se eliminan los logines repetidos en caso de que los haya
        //-----------------------------------------------------------------------------
        $arrListLogi = array_unique($arrListLogi,SORT_STRING);
        $this->txtLogiUsua->Text = '';
        $strPermProc = $this->lstPermProc->SelectedValue->CodiPara;
        //--------------------------------------------------------
        // Se procesan uno a uno los logines proporcionados
        //--------------------------------------------------------
        $intCantRegi = 0;
        $intUsuaProc = 0;
        foreach ($arrListLogi as $strLogiUsua) {
            if (!in_array($strLogiUsua,array('cliente','liberty'))) {
                $objUsuario = Usuario::LoadByLogiUsua($strLogiUsua);
                if ($objUsuario) {
                    $objPermProc = Parametro::Load($strPermProc, $strLogiUsua);
                    if ($objPermProc) {
                        //-------------------------------------------------------------------------------------
                        // Si el registro existe, se elimina, con lo cual automaticamente se niega el permiso
                        //-------------------------------------------------------------------------------------
                        $objPermProc->Delete();
                    }
                    //------------------------
                    // Log de Transacciones
                    //------------------------
                    $strTextCamb = 'Se quito permiso para: '.$this->lstPermProc->SelectedName;
                    $arrLogxCamb['strNombTabl'] = 'Permisos';
                    $arrLogxCamb['intRefeRegi'] = $objUsuario->CodiUsua;
                    $arrLogxCamb['strNombRegi'] = $objUsuario->LogiUsua;
                    $arrLogxCamb['strDescCamb'] = $strTextCamb;
                    LogDeCambios($arrLogxCamb);
                    // AuditoriaDeProcesos("Se le quitaron permisos al Usuario: ".$strLogiUsua." para: ".$this->lstPermProc->SelectedName);
                    $intUsuaProc++;
                } else {
                    $this->txtLogiUsua->Text = $strLogiUsua." (NO EXISTE)".chr(13);
                }
                $intCantRegi++;
            } else {
                // AuditoriaDeProcesos("Se intento quitar permisos a: ".$strLogiUsua." para: ".$this->lstPermProc->SelectedName);
                $this->txtLogiUsua->Text = $strLogiUsua." (NO PUEDE SER PROCESADO)".chr(13);
            }
        }
        $this->mensaje('Registros procesados: '.$intUsuaProc."/".$intCantRegi,'','','check');
    }
}

DarPermisos::Run('DarPermisos', 'dar_permisos.tpl.php');
?>