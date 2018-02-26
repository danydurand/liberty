<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected_extranet.inc.php');

class CambiarClave extends QForm {
    protected $lblTituForm;
    protected $lblMensUsua;
    protected $lblNotiUsua;
    protected $objUsuario;

    protected $txtClavActu;
    protected $txtClavNue1;
    protected $txtClavNue2;

    protected $btnCambClav;
    protected $btnCancel;

    protected function Form_Create() {
        
        $this->objUsuario = unserialize($_SESSION['User']);

        $this->lblTituForm_Create();
        $this->lblMensUsua_Create();
        $this->lblNotiUsua_Create();

        $this->txtClavActu_Create();
        $this->txtClavNue1_Create();
        $this->txtClavNue2_Create();
      
        $this->btnCambClav_Create();
        $this->btnCancel_Create();

    }

    //----------------------------
    // Aqui se crean los objetos 
    //----------------------------

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'Cambiar Clave';
    }
    
    protected function lblMensUsua_Create() {
        $this->lblMensUsua = new QLabel($this);
        $this->lblMensUsua->Text = '';
    }
    
    protected function lblNotiUsua_Create() {
        $this->lblNotiUsua = new QLabel($this);
        $this->lblNotiUsua->Text = '';
    }
    
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
        
    protected function btnCambClav_Create() {
        $this->btnCambClav = new QButton($this);
        $this->btnCambClav->Text = '<i class="fa fa-floppy-o fa-lg"></i> Cambiar';
        $this->btnCambClav->CssClass = 'btn btn-success';
        $this->btnCambClav->HtmlEntities = false;
        $this->btnCambClav->PrimaryButton = true;
        $this->btnCambClav->CausesValidation = true;
        $this->btnCambClav->AddAction(new QClickEvent(), new QAjaxAction('btnCambClav_Click'));
    }

    protected function btnCancel_Create() {
        $this->btnCancel = new QButton($this);
        $this->btnCancel->Text = '<i class="fa fa-ban fa-lg"></i> Cancelar';
        $this->btnCancel->CssClass = 'btn btn-warning';
        $this->btnCancel->HtmlEntities = false;
        $this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
    }
    
    //-----------------------------------
    // Acciones relativas a los objetos 
    //-----------------------------------

    protected function Form_Validate() {
        $blnTodoOkey = true;
//        if ($this->objUsuario->ClaveAcceso != md5($this->txtClavActu->Text)) {
        if ($this->objUsuario->ClaveAcceso != $this->txtClavActu->Text) {
            $this->lblNotiUsua->CssClass = 'alert alert-danger';
            $this->lblNotiUsua->Text = '<i class="fa fa-hand-paper-o"></i> La Clave Actual No Coincide';
            $this->lblNotiUsua->HtmlEntities = false;
            $this->lblMensUsua->Text = '';
            $this->lblMensUsua->CssClass = '';
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            if ($this->txtClavNue1->Text != $this->txtClavNue2->Text) {
                $this->lblNotiUsua->Text = '<i class="fa fa-hand-paper-o"></i> La Clave Nueva No Coincide';
                $this->lblNotiUsua->HtmlEntities = false;
                $this->lblMensUsua->Text = '';
                $this->lblMensUsua->CssClass = '';
                $blnTodoOkey = false;
            }
        }
        return $blnTodoOkey;
    }

    protected function btnCambClav_Click() {
        //-----------------------------------------------
        // Se actualizan los campos en la tabla Usuario 
        //-----------------------------------------------
//        $this->objUsuario->Password    = md5($this->txtClavNue1->Text);
        $this->objUsuario->ClaveAcceso   = $this->txtClavNue1->Text;
        $this->objUsuario->Save();

        $this->lblMensUsua->CssClass = 'alert alert-success';
        $this->lblMensUsua->Text = '<i class="fa fa-check"></i> Transaccion Exitosa';
        $this->lblMensUsua->HtmlEntities = false;
        $this->lblNotiUsua->Text = '';
        $this->lblNotiUsua->CssClass = '';
        //---------------------------------------------------------
        // El cambio de Clave es notificado por correo el Usuario
        //---------------------------------------------------------
        $strEmaiSopo = unserialize($_SESSION['EmaiSopo']);
        // Create a new message
        // Note that you can list multiple addresses and that QCubed supports Bcc and Cc
        $objMessage = new QEmailMessage();
        $objMessage->From = 'ServiExpress - Okinawa <locahost@serviexpress.com>';
        $objMessage->To = $this->objUsuario->__nombreYCorreo();
        $objMessage->Bcc = $strEmaiSopo;
        $objMessage->Subject = 'Cambio de Clave ' . QDateTime::NowToString(QDateTime::FormatDisplayDate);

        // Also setup HTML message (optional)
        $strBody  = 'Estimado Cliente,<p><br>';
        $strBody .= 'La Extranet de ServiExpress, ha registrado un cambio de Clave de Acceso, para su Usuario.<br>';
        $strBody .= 'Si Usted desconoce esta transacción, por favor comuníquese a la brevedad<br>';
        $strBody .= 'posible con nuestro personal través de la cuenta de correo:<br><br>';
        $strBody .= 'atc@serviexpress.com<br>';
        $objMessage->HtmlBody = $strBody;

        // Add random/custom email headers
        $objMessage->SetHeader('x-application', 'ServiExpress Extranet');

        // Send the Message (Commented out for obvious reasons)
        QEmailServer::Send($objMessage);

    }
    
    protected function btnCancel_Click() {
        QApplication::Redirect('mg.php?m=main');
    }
    
   
}

if (isset($_SESSION['ProgReto'])) {
   $_SESSION['PagiBack'] = $_SESSION['ProgReto'];
   unset($_SESSION['ProgReto']); 
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// aliado_edit.tpl.php as the included HTML template file
CambiarClave::Run('CambiarClave');
?>
