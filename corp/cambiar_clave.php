<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CambiarClave extends FormularioBaseKaizen {

    protected $txtClavActu;
    protected $txtClavNue1;
    protected $txtClavNue2;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = 'Cambiar Clave';
        $this->txtClavActu_Create();
        $this->txtClavNue1_Create();
        $this->txtClavNue2_Create();
    }

    //----------------------------
    // Aqui se crean los objetos 
    //----------------------------

    protected function txtClavActu_Create() {
        $this->txtClavActu = new QTextBox($this);
        $this->txtClavActu->Name = 'Clave Actual';
        $this->txtClavActu->TextMode = QTextMode::Password;
        $this->txtClavActu->Required = true;
        $this->txtClavActu->Width = 100;
    }
    
    protected function txtClavNue1_Create() {
        $this->txtClavNue1 = new QTextBox($this);
        $this->txtClavNue1->Name = 'Nueva Clave';
        $this->txtClavNue1->TextMode = QTextMode::Password;
        $this->txtClavNue1->Required = true;
        $this->txtClavNue1->Width = 100;
    }
    
    protected function txtClavNue2_Create() {
        $this->txtClavNue2 = new QTextBox($this);
        $this->txtClavNue2->Name = 'Repita la Nueva Clave';
        $this->txtClavNue2->TextMode = QTextMode::Password;
        $this->txtClavNue2->Required = true;
        $this->txtClavNue2->Width = 100;
    }
        
    //-----------------------------------
    // Acciones relativas a los objetos 
    //-----------------------------------

    protected function Form_Validate() {
        $blnTodoOkey = true;
        if ($this->objUsuario->ClaveAcceso != $this->txtClavActu->Text) {
            $this->mensaje('La Clave Actual No Coincide','m','d','hand-stop-o');
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            if ($this->txtClavNue1->Text != $this->txtClavNue2->Text) {
                $this->mensaje('La Clave Nueva No Coincide','m','d','hand-stop-o');
                $blnTodoOkey = false;
            }
        }
        return $blnTodoOkey;
    }

    protected function btnSave_Click() {
        //-----------------------------------------------
        // Se actualizan los campos en la tabla Usuario 
        //-----------------------------------------------
        $this->objUsuario->ClaveAcceso = $this->txtClavNue1->Text;
        $this->objUsuario->CantidadIntentos = 0;
        $this->objUsuario->FechaRegistro = new QDateTime(QDateTime::Now);
        $this->objUsuario->Save();
        //--------------------------------------
        // Se deja constancia en el Historico
        //--------------------------------------
        $arrLogxCamb['strNombTabl'] = 'Usuario CORP';
        $arrLogxCamb['intRefeRegi'] = $this->objUsuario->Id;
        $arrLogxCamb['strNombRegi'] = $this->objUsuario->LogiUsua;
        $arrLogxCamb['strDescCamb'] = "Cambio de Clave";
        LogDeCambios($arrLogxCamb);

        $this->mensaje();
        $this->mensaje('La Clave ha sido cambiada Exitosamente','m','s','check');
        //---------------------------------------------------------
        // El cambio de Clave es notificado por correo el Usuario
        //---------------------------------------------------------
        $strEmaiSopo = unserialize($_SESSION['EmaiSopo']);
        // Create a new message
        // Note that you can list multiple addresses and that QCubed supports Bcc and Cc
        $objMessage = new QEmailMessage();
        $objMessage->From = 'LibertyExpress - CORPorativo <locahost@libertyexpress.com>';
        $objMessage->To = $this->objUsuario->__nombreYCorreo();
        $objMessage->Bcc = $strEmaiSopo;
        $objMessage->Subject = 'Cambio de Clave ' . QDateTime::NowToString(QDateTime::FormatDisplayDate);

        // Also setup HTML message (optional)
        $strBody  = 'Estimado Usuario,<p><br>';
        $strBody .= 'El Sistema CORPorativo, ha registrado un cambio de Clave de Acceso, para su Usuario.<br>';
        $strBody .= 'Si Usted desconoce esta transacción, por favor comuníquese a la brevedad<br>';
        $strBody .= 'posible con el Administrador del Sistema a través de la cuenta de correo:<br><br>';
        $strBody .= 'incidencias@libertyexpress.com<br>';
        $objMessage->HtmlBody = $strBody;

        // Add random/custom email headers
        $objMessage->SetHeader('x-application', 'Sistema CORP');

        // Send the Message (Commented out for obvious reasons)
        QEmailServer::Send($objMessage);

    }
    
    protected function btnCancel_Click() {
        QApplication::Redirect('mg.php?m=main');
    }
    
   
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// aliado_edit.tpl.php as the included HTML template file
CambiarClave::Run('CambiarClave');
?>
