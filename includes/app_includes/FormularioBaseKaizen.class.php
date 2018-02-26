<?php

abstract class FormularioBaseKaizen extends QForm {
    protected $lblTituForm;
    protected $lblMensUsua;
    protected $lblNotiUsua;

    /**
     * @var $objUsuario Usuario
     */
    protected $objUsuario;

    protected $btnSave;
    protected $btnCancel;

    protected function Form_Create() {

        $this->objUsuario = unserialize($_SESSION['User']);

        $this->lblTituForm_Create();
        $this->lblMensUsua_Create();
        $this->lblNotiUsua_Create();

        $this->btnSave_Create();
        $this->btnCancel_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'Título';
    }

    protected function lblMensUsua_Create() {
        $this->lblMensUsua = new QLabel($this);
        $this->lblMensUsua->Text = '';
        $this->lblMensUsua->HtmlEntities = false;
    }

    protected function lblNotiUsua_Create() {
        $this->lblNotiUsua = new QLabel($this);
        $this->lblNotiUsua->Text = '';
        $this->lblNotiUsua->HtmlEntities = false;
    }

    //----------------------------------
    // Botónes Clásicos del Formulario
    //----------------------------------

    protected function btnSave_Create() {
        $this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="fa fa-cogs fa-lg"></i> Procesar';
        $this->btnSave->AddAction(new QClickEvent(), new QServerAction('btnSave_Click'));
        $this->btnSave->HtmlEntities = false;
        $this->btnSave->CssClass = 'btn btn-success btn-sm';
        $this->btnSave->PrimaryButton = true;
        $this->btnSave->CausesValidation = true;
    }

    protected function btnCancel_Create() {
        $this->btnCancel = new QButton($this);
        $this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
        $this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
        $this->btnCancel->CssClass = 'btn btn-warning btn-sm';
        $this->btnCancel->HtmlEntities = 'false';
        $this->btnCancel->CausesValidation = false;
    }

    protected function mensaje($strTextNoti='', $strTipoMens='m', $strClasMens='s', $strPosiIcon='l', $strNombIcon='') {
        if (strlen($strTextNoti) == 0) {
            $this->lblMensUsua->Text = '';
            $this->lblMensUsua->HtmlEntities = false;
            $this->lblMensUsua->CssClass = '';
            $this->lblNotiUsua->Text = '';
            $this->lblNotiUsua->HtmlEntities = false;
            $this->lblNotiUsua->CssClass = '';
        } else {
            //------------------------------------------
            // Aqui se determina el estilo del mensaje
            //------------------------------------------
            $strClasAsig = 'alert alert-';
            switch (strtolower($strClasMens)) {
                case 'i':
                    $strClasAsig .= 'info';
                    break;
                case 's':
                    $strClasAsig .= 'success';
                    break;
                case 'w':
                    $strClasAsig .= 'warning';
                    break;
                case 'd':
                    $strClasAsig .= 'danger';
                    break;
                default:
                    $strClasAsig .= 'success';
                    break;
            }
            if (strlen($strNombIcon) > 0) {
                $strNombIcon = '<i class="fa fa-'.$strNombIcon.' fa-lg"></i> ';
            }
            if ($strPosiIcon == 'i') {
                //---------------------------------------------------------------------------
                // El tipo de mensaje, puede ser de (n)otificacion (que aparece arriba y a
                // la izquierda) o un (m)ensaje regular (que aparece arriba y a la derecha)
                //---------------------------------------------------------------------------
                switch (strtolower($strTipoMens)) {
                    case 'n':
                        $this->lblNotiUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblNotiUsua->CssClass = $strClasAsig;
                        break;
                    case 'm':
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                        break;
                    default:
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                }
            } elseif ($strPosiIcon == 'r') {
                //---------------------------------------------------------------------------
                // El tipo de mensaje, puede ser de (n)otificacion (que aparece arriba y a
                // la izquierda) o un (m)ensaje regular (que aparece arriba y a la derecha)
                //---------------------------------------------------------------------------
                switch (strtolower($strTipoMens)) {
                    case 'n':
                        $this->lblNotiUsua->Text = $strTextNoti.$strNombIcon;
                        $this->lblNotiUsua->CssClass = $strClasAsig;
                        break;
                    case 'm':
                        $this->lblMensUsua->Text = $strTextNoti.$strNombIcon;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                        break;
                    default:
                        $this->lblMensUsua->Text = $strTextNoti.$strNombIcon;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                }
            } else {
                switch (strtolower($strTipoMens)) {
                    case 'n':
                        $this->lblNotiUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblNotiUsua->CssClass = $strClasAsig;
                        break;
                    case 'm':
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                        break;
                    default:
                        $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                        $this->lblMensUsua->CssClass = $strClasAsig;
                }
            }
        }
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/'.$objUltiAcce->__toString());
    }

}
?>