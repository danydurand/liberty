<?php
//---------------------------------------------------------------
// Programa       : desactivar_cliente.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 23/09/16 08:43 AM
// Proyecto       : newliberty
// Descripcion    : Este programa desactiva masivamente clientes
//---------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class EliminarClientes extends FormularioBaseKaizen {
    protected $txtCodiClie;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = 'Eliminar Clientes';

        $this->txtCodiClie_Create();
    }

    //------------------------------
    // Aquí se crean los objetos
    //------------------------------
    protected function txtCodiClie_Create() {
        $this->txtCodiClie = new QTextBox($this);
        $this->txtCodiClie->Name = QApplication::Translate('Clientes a Eliminar');
        $this->txtCodiClie->Height = 100;
        $this->txtCodiClie->Width = 300;
        $this->txtCodiClie->Placeholder = 'Un código CR en cada línea';
        $this->txtCodiClie->TextMode = QTextMode::MultiLine;
    }

    //-----------------------------------
    // Acciones Relativas a los Objetos
    //-----------------------------------
    protected function Form_Validate() {
        if (strlen($this->txtCodiClie->Text) == 0) {
            $this->mensaje('Debe proporcionar los Clientes que desea Eliminar','m','d',__iHAND__);
            return false;
        }
        return true;
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $this->mensaje('');
        $arrCodiClie = explode(',',nl2br2($this->txtCodiClie->Text));
        $this->txtCodiClie->Text = '';
        $intCantRegi = 0;

        foreach ($arrCodiClie as $strCodiClie) {
            if (strlen($strCodiClie) > 0) {
                $objMastClie = MasterCliente::LoadByCodigoInterno($strCodiClie);
                if ($objMastClie) {
                    $objMastClie->DeletedAt = new QDateTime(QDateTime::Now());
                    $objMastClie->Save();
                    $intCantRegi++;
                    //--------------------------------------
                    // Se deja constancia en el Historico
                    //--------------------------------------
                    $arrLogxCamb['strNombTabl'] = 'Cliente';
                    $arrLogxCamb['intRefeRegi'] = $objMastClie->CodigoInterno;
                    $arrLogxCamb['strNombRegi'] = $objMastClie->NombClie;
                    $arrLogxCamb['strDescCamb'] = "Desactivado";
                    LogDeCambios($arrLogxCamb);
                } else {
                    $strTextMens = $strCodiClie." (No Existe)";
                    $this->txtCodiClie->Text .= $strTextMens.chr(13);
                }
            }
        }

        $strTextMens = 'Registros procesados: '.$intCantRegi;
        $this->mensaje($strTextMens,'m','s',__iCHEC__);
    }

    protected function btnCancel_Click() {
        $objUltAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/'.$objUltAcce->__toString());
    }
}

EliminarClientes::Run('EliminarClientes');