<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected_extranet.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class MiPerfil extends FormularioBaseKaizen {

    protected $mctCliente;
    protected $txtNombClie;
    protected $txtCeduClie;
    protected $txtCorrClie;

    protected $calFechNaci;
    protected $txtClavAcce;
    protected $rdbSexoClie;
    protected $txtTeleFijo;
    protected $txtTeleMovi;
    protected $lstEstaClie;
    protected $lstCiudClie;
    protected $txtDireEntr;

    protected $lstMediPubl;
    protected $txtRecoPorx;
    protected $txtNombAmig;
    protected $lblRecoPorx;

    protected $btnRegiCamb;
    protected $btnCancelar;

    protected function Form_Create() {

        parent::Form_Create();
        $this->lblTituForm->Text = 'Editar Mi Perfil';

        $this->mctCliente = ClienteMetaControl::Create($this,$this->objUsuario->Id);

        $this->txtNombClie = $this->mctCliente->lblNombre_Create();
        $this->txtNombClie->Width = 180;
        $this->txtNombClie->CssClass = 'form-label';

        $this->txtCeduClie = $this->mctCliente->lblCedulaRif_Create();
        $this->txtCeduClie->Width = 180;
        $this->txtCeduClie->CssClass = 'form-label';

        $this->txtCorrClie = $this->mctCliente->txtEmail_Create();
        $this->txtCorrClie->Width = 180;

        $this->calFechNaci = $this->mctCliente->calFechaNacimiento_Create();
//        $this->calFechNaci->Width = 120;

        $this->txtClavAcce = $this->mctCliente->txtClaveAcceso_Create();
        $this->txtClavAcce->TextMode = QTextMode::Password;
        $this->txtClavAcce->Enabled = false;
        $this->txtClavAcce->ForeColor = "blue";
        $this->txtClavAcce->Width = 180;

        $this->rdbSexoClie = $this->mctCliente->rdbSexoClie_Create();

        $this->txtTeleMovi = $this->mctCliente->txtTelefonoMovil_Create();
        $this->txtTeleMovi->Width = 180;

        $this->txtTeleFijo = $this->mctCliente->txtTelefonoFijo_Create();
        $this->txtTeleFijo->Width = 180;

        $this->lstEstaClie = $this->mctCliente->lstEstado_Create();
        $this->lstEstaClie->Width = 180;

        $this->lstCiudClie = $this->mctCliente->lstCiudad_Create();
        $this->lstCiudClie->Width = 180;

        $this->txtDireEntr = $this->mctCliente->txtDireccion_Create();
        $this->txtDireEntr->TextMode = QTextMode::MultiLine;
        $this->txtDireEntr->Width = 180;
        $this->txtDireEntr->Height = 100;

//        $this->lstMediPubl = $this->mctCliente->lstMedio_Create();
//        $this->lstMediPubl->CssClass = 'form-control';
//        $this->lstMediPubl->Width = 180;
        
//        $this->txtRecoPorx = $this->mctCliente->txtRecomendadoPor_Create();
//        $this->txtRecoPorx->Visible = false;
//        $this->txtRecoPorx->Width = 180;
//        $this->txtRecoPorx->AddAction(new QKeyPressEvent(600), new QAjaxAction('txtRecoPorx_Change'));
        
//        $this->txtNombAmig_Create();

//        $this->lblRecoPorx = $this->mctCliente->lblRecomendadoPor_Create();
//        $this->lblRecoPorx->Text = 'Recomendado Por:';
//        $this->lblRecoPorx->Visible = false;
//        $this->lblRecoPorx->Width = 180;
      
        $this->btnRegiCamb_Create();
        $this->btnCancelar_Create();

    }

    //----------------------------------------
    // Aqui se crean los objetos adicionales
    //----------------------------------------
    
    protected function txtNombAmig_Create() {
        $this->txtNombAmig = new QTextBox($this);
        $this->txtNombAmig->CssClass = 'form-control';
        $this->txtNombAmig->Placeholder = 'Nombre del Amigo';
        $this->txtNombAmig->Width = 180;
        $this->txtNombAmig->Enabled = false;
        $this->txtNombAmig->ForeColor = 'blue';
        $this->txtNombAmig->Visible = false;
    }

    protected function btnRegiCamb_Create() {
        $this->btnRegiCamb = new QButton($this);
        $this->btnRegiCamb->Text = '<i class="fa fa-floppy-o fa-lg"></i> Cambiar';
        $this->btnRegiCamb->CssClass = 'btn btn-success';
        $this->btnRegiCamb->HtmlEntities = false;
        $this->btnRegiCamb->PrimaryButton = true;
        $this->btnRegiCamb->CausesValidation = true;
        $this->btnRegiCamb->AddAction(new QClickEvent(), new QAjaxAction('btnRegiCamb_Click'));
    }

    protected function btnCancelar_Create() {
        $this->btnCancelar = new QButton($this);
        $this->btnCancelar->Text = '<i class="fa fa-ban fa-lg"></i> Cancelar';
        $this->btnCancelar->CssClass = 'btn btn-warning';
        $this->btnCancelar->HtmlEntities = false;
        $this->btnCancelar->AddAction(new QClickEvent(), new QServerAction('btnCancelar_Click'));
    }
    
    //-----------------------------------
    // Acciones relativas a los objetos 
    //-----------------------------------

    protected function Form_Validate() {
        $blnTodoOkey = true;
//        if ($this->objUsuario->ClaveAcceso != md5($this->txtNombClie->Text)) {
        if ($this->objUsuario->ClaveAcceso != $this->txtNombClie->Text) {
            $this->lblNotiUsua->CssClass = 'alert alert-danger';
            $this->lblNotiUsua->Text = '<i class="fa fa-hand-paper-o"></i> La Clave Actual No Coincide';
            $this->lblNotiUsua->HtmlEntities = false;
            $this->lblMensUsua->Text = '';
            $this->lblMensUsua->CssClass = '';
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            if ($this->txtCeduClie->Text != $this->txtCorrClie->Text) {
                $this->lblNotiUsua->Text = '<i class="fa fa-hand-paper-o"></i> La Clave Nueva No Coincide';
                $this->lblNotiUsua->HtmlEntities = false;
                $this->lblMensUsua->Text = '';
                $this->lblMensUsua->CssClass = '';
                $blnTodoOkey = false;
            }
        }
        return $blnTodoOkey;
    }

    protected function btnRegiCamb_Click() {
        //-----------------------------------------------
        // Se actualizan los campos en la tabla Usuario 
        //-----------------------------------------------
//        $this->objUsuario->Password    = md5($this->txtCeduClie->Text);
        $this->objUsuario->ClaveAcceso   = $this->txtCeduClie->Text;
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
    
    protected function btnCancelar_Click() {
        QApplication::Redirect('mg.php?m=main');
    }
    
   
}

if (isset($_SESSION['ProgReto'])) {
   $_SESSION['PagiBack'] = $_SESSION['ProgReto'];
   unset($_SESSION['ProgReto']); 
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// aliado_edit.tpl.php as the included HTML template file
MiPerfil::Run('MiPerfil');
?>
