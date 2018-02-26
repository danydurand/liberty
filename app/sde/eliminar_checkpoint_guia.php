<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class EliminarCkptGuia extends FormularioBaseKaizen {
    protected $txtNumeGuia;
    protected $lstChecBoxs;
    protected $blnTienPerm;

    protected $btnSave;
    protected $btnCancel;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Eliminar Checkpoint(s)');

        $this->blnTienPerm = BuscarParametro("ElimCkpt", $this->objUsuario->LogiUsua, "Val1", 0);

        $this->txtNumeGuia_Create();
        $this->lstChecBoxs_Create();

        if ($this->blnTienPerm == 1) {
            $this->btnSave->Visible = true;
        } else {
            $this->btnSave->Visible = false;
        }
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Name = QApplication::Translate('Número de Guía');
        $this->txtNumeGuia->Required = true;
        $this->txtNumeGuia->AddAction(new QBlurEvent(), new QAjaxAction('txtNumeGuia_Blur'));
    }

    protected function lstChecBoxs_Create(){
        $this->lstChecBoxs = new QListBox($this);
        $this->lstChecBoxs->Name = QApplication::Translate('Lista de Checkpoints');
        $this->lstChecBoxs->SelectionMode = QSelectionMode::Multiple;
        $this->lstChecBoxs->Rows = 10;
        $this->lstChecBoxs->Required = true;
        $this->lstChecBoxs->Width = 550;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function txtNumeGuia_Blur() {
        if (strlen($this->txtNumeGuia->Text)) {
            $this->lstChecBoxs->RemoveAllItems();
            $this->lstChecBoxs->Width = 550;
            $blnTodoPais   = BuscarParametro("TodoPais", $this->objUsuario->LogiUsua, "Val1", 0);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::GuiaCkpt()->NumeGuia, $this->txtNumeGuia->Text);
            if (!$blnTodoPais) {
                $objClauWher[] = QQ::Equal(QQN::GuiaCkpt()->CodiEsta, $this->objUsuario->CodiEsta);
            }
            foreach (GuiaCkpt::QueryArray(QQ::AndCondition($objClauWher), QQ::Clause(QQ::OrderBy(QQN::GuiaCkpt()->FechCkpt))) as $arrCodiCkptNG) {
                $strPartVisi = $arrCodiCkptNG->CodiCkpt.' - '.$arrCodiCkptNG->CodiEsta.' - '.$arrCodiCkptNG->FechCkpt->__toString('YYYY-MM-DD').' - '.$arrCodiCkptNG->HoraCkpt.' - '.substr($arrCodiCkptNG->TextObse,0,36);
                $strPartInvi = $arrCodiCkptNG->NumeGuia.','.$arrCodiCkptNG->CodiEsta.','.$arrCodiCkptNG->CodiCkpt.','.$arrCodiCkptNG->FechCkpt->__toString('YYYY-MM-DD').','.$arrCodiCkptNG->HoraCkpt.','.$arrCodiCkptNG->TextObse.','.$arrCodiCkptNG->CodiRuta.','.$arrCodiCkptNG->CodiUsua;
                $this->lstChecBoxs->AddItem($strPartVisi, $strPartInvi);
            }
        }
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $arrClavRegi = $this->lstChecBoxs->SelectedValues;
        $objDatabase = Guia::GetDatabase();
        $intContElem = count($arrClavRegi);

        foreach ($arrClavRegi as $strCkptDelt) {
            $arrCkptDelt = explode(',',$strCkptDelt);
            $strNumeGuia = $arrCkptDelt[0];
            $strCodiEsta = $arrCkptDelt[1];
            $strCodiCkpt = $arrCkptDelt[2];
            $strFechCkpt = $arrCkptDelt[3];
            $strHoraCkpt = $arrCkptDelt[4];
            $strTextObse = $arrCkptDelt[5];
            $strCodiRuta = $arrCkptDelt[6];
            $strCodiUsua = $arrCkptDelt[7];

            $strRegiTrab = $strNumeGuia.' | '.$strCodiEsta.' | '.$strCodiCkpt.' | '.$strFechCkpt.' | '.$strHoraCkpt.' | '.$strTextObse.' | '.$strCodiRuta.' | '.$strCodiUsua;

            $strCadeSqlx  = "delete ";
            $strCadeSqlx .= "  from guia_ckpt ";
            $strCadeSqlx .= " where nume_guia = '$strNumeGuia'";
            $strCadeSqlx .= "   and codi_esta = '$strCodiEsta'";
            $strCadeSqlx .= "   and codi_ckpt = '$strCodiCkpt'";
            $strCadeSqlx .= "   and fech_ckpt = '$strFechCkpt'";
            $strCadeSqlx .= "   and hora_ckpt = '$strHoraCkpt'";

            $objResuChec = $objDatabase->NonQuery($strCadeSqlx);

            if($strCodiCkpt == 'OK'){
                $strCadeSqlx  = "update guia ";
                $strCadeSqlx .= "   set entregado_a = null, ";
                $strCadeSqlx .= "       fecha_entrega = null, ";
                $strCadeSqlx .= "       hora_entrega = null ";
                $strCadeSqlx .= " where nume_guia = '$strNumeGuia'";

                $objResuChec = $objDatabase->NonQuery($strCadeSqlx);
            }

            //----------------------------------------------------------------------------------------
            // En el Registro de Trabajo, debe quedar constancia de los cambios ocurridos a la Guia
            //----------------------------------------------------------------------------------------
            $arrParaRegi['CodiCkpt'] = 'EC';
            $arrParaRegi['TextMens'] = 'ELIMINO CHECKPOINT: '.$strRegiTrab;
            $arrParaRegi['NumeGuia'] = $strNumeGuia;
            $arrParaRegi['CodiUsua'] = $this->objUsuario->CodiUsua;
            $arrParaRegi['CodiEsta'] = $this->objUsuario->CodiEsta;
            CrearRegistroDeTrabajo($arrParaRegi);
            $this->mensaje('Transaccion Exitosa','m','s','check');

        }
        $this->txtNumeGuia_Blur();
    }

    protected function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $objUltAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/'.$objUltAcce->__toString());
    }
}

EliminarCkptGuia::Run('EliminarCkptGuia');
?>