<?php
require_once('qcubed.inc.php');
//require_once(__APP_INCLUDES__.'/funciones_kaizen.php');

class Index extends QForm {
    protected $lblTituForm;
    protected $lblMensUsua;

    protected $txtEmaiUsua;
    protected $txtClavAcce;
    protected $btnAcceSist;

    protected function Form_Create() {

        $this->lblTituForm_Create();
        $this->lblMensUsua_Create();

        $this->txtEmaiUsua_Create();
        $this->txtClavAcce_Create();

        $this->btnAcceSist_Create();

        $this->txtEmaiUsua->SetFocus();
    }

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'ACCESO EXTRANET';
    }

    protected function lblMensUsua_Create() {
        $this->lblMensUsua = new QLabel($this);
    }

    protected function txtEmaiUsua_Create() {
        $this->txtEmaiUsua = new QTextBox($this);
        $this->txtEmaiUsua->Name = 'E-mail';
        $this->txtEmaiUsua->Required = true;
        $this->txtEmaiUsua->Width = 200;
        $this->txtEmaiUsua->AddAction(new QFocusEvent(), new QAjaxAction('txtEmaiUsua_Focus'));
    }

    protected function txtClavAcce_Create() {
        $this->txtClavAcce = new QTextBox($this);
        $this->txtClavAcce->Name = 'Contraseña';
        $this->txtClavAcce->TextMode = QTextMode::Password;
        $this->txtClavAcce->Required = true;
        $this->txtClavAcce->Width = 200;
        $this->txtClavAcce->AddAction(new QFocusEvent(), new QAjaxAction('txtClaveAcce_Focus'));
    }

    protected function btnAcceSist_Create () {
        $this->btnAcceSist = new QButton($this);
        $this->btnAcceSist->Text = '<i class="fa fa-sign-in fa-fw"></i> Entrar';
        $this->btnAcceSist->CssClass = 'btn btn-success';
        $this->btnAcceSist->HtmlEntities = false;
        $this->btnAcceSist->CausesValidation = true;
        $this->btnAcceSist->PrimaryButton = true;
        $this->btnAcceSist->AddAction(new QClickEvent(), new QServerAction('btnAcceSist_Click'));
    }

    //------------------------------------
    // Acciones referidas a los objetos
    //------------------------------------

    protected function txtEmaiUsua_Focus() {
        $this->blanquearMensaje();
    }

    protected function txtClaveAcce_Focus() {
        $this->blanquearMensaje();
    }

    protected function blanquearMensaje() {
        $this->lblMensUsua->Text = '';
    }

    protected function btnAcceSist_Click() {
        $objUsuario = Cliente::LoadByEmail($this->txtEmaiUsua->Text);
        if ($objUsuario) {
            $_SESSION['User'] = serialize($objUsuario);
            if ($objUsuario->ClaveAcceso == $this->txtClavAcce->Text) {
                if (is_null($objUsuario->FechaAccesoWeb)) {
                    $objUsuario->FechaAccesoWeb = new QDateTime(QDateTime::Now);
                }
                $_SESSION['country_code']   = 've';
                $_SESSION['language_code']  = 'es';
                $_SESSION['UltiAcce']       = $objUsuario->FechaAccesoWeb;
                $_SESSION['Sistema']        = 2; // EXTRANET
                $_SESSION['NombSist']       = 'EXTRANET';
                $_SESSION['NombDire']       = 'servex';
                $objUsuario->FechaAccesoWeb = new QDateTime(QDateTime::Now);
                $objUsuario->HoraAccesoWeb  = new QDateTime(QDateTime::Now);
                $objUsuario->Save();

                $this->SetupValoresDeSesion();

//                QApplication::Redirect('mg.php?m=main&p=mis_guias.php?s=t');
                QApplication::Redirect('mg.php?m=main');
            } else {
                $this->txtClavAcce->Warning = 'Clave de Acceso Errada';
            }
        } else {
            $this->txtEmaiUsua->Warning = 'E-mail Desconocido';
        }
    }

    protected function SetupValoresDeSesion() {
        $strMailSopo = BuscarParametro('CtasMail','MailSopo','Txt1','sopokaizen@gmail.com');
        $objDolaSica = BuscarParametro('TasaCamb','DolaSica','TODO',null);
        $objDolaSima = BuscarParametro('TasaCamb','DolaSima','TODO',null);
        $decPorcAran = BuscarParametro('PorcAran','AranPred','Value1',20);
        $dteFechDhoy = date("Y-m-d");
        $decIvaxDhoy = Impuesto::LoadImpuestoVigente('IVA', $dteFechDhoy);

        $_SESSION['IvaxDhoy'] = serialize($decIvaxDhoy);
        $_SESSION['DolaSica'] = serialize($objDolaSica);
        $_SESSION['DolaSima'] = serialize($objDolaSima);
        $_SESSION['EmaiSopo'] = serialize($strMailSopo);
        $_SESSION['PorcAran'] = serialize($decPorcAran);
    }

}
Index::Run('Index','index.tpl.php');
?>
