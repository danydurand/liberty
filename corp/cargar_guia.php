<?php
//------------------------------------------------------------------------------------
// Programa       : cargar_guia.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 14/10/16 10:53 AM
// Proyecto       : newliberty
// Descripcion    : Este programa permite al Usuario Connect crear una guía Nacional.
//------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');
// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class CargarGuia extends FormularioBaseKaizen {
    //-----------------------
    // Parámetros de objetos
    //-----------------------
    /* @var $objGuia Guia */
    protected $objGuia;
    /* @var $objCliente MasterCliente */
    protected $objCliente;
    protected $objProducto;
    protected $objSeguGuia;
    //----------------------
    // Parámetros regulares
    //----------------------
    protected $blnEditMode;
    //protected $blnSoloCred;
    protected $arrValoMini;
    protected $arrValoMaxi;
    protected $intCantLimi;
    protected $arrSucuActi;
    protected $arrDestFrec;
    protected $decValoDecl;
    protected $strCodiEsta;
    protected $strZonaIncu;
    protected $strPesoGuia;
    protected $strHoraTope;
    //---------------------------
    // Parámetros de información
    //---------------------------
    protected $txtNumeGuia;
    protected $calFechGuia;
    protected $calFechReco;
    protected $txtDescCont;
    protected $txtCantPiez;
    protected $chkSeguGuia;
    protected $chkEnviReto;
    protected $txtContReto;
    protected $txtValoDecl;
    protected $lstModaPago;
    // ---- Remitente -----
    protected $txtNombRemi;
    protected $txtTeleRemi;
    protected $txtDireRemi;
    // ---- Destinatario ----
    protected $lstDestFrec;
    protected $lstSucuDest;
    protected $txtNombDest;
    protected $txtTeleDest;
    protected $txtDireDest;
    protected $lblCeduDest;
    protected $lstCeduDest;
    protected $txtCeduDest;
    protected $chkDestFrec;
    //-----------------------
    // Parámetros de Botones
    //-----------------------
    protected $btnCreaNuev;
    protected $btnImprGuia;
    protected $btnBorrGuia;
    // --- ZNC (Zonas No Cubiertas) ----
    protected $lblBotoPopu;
    protected $lblPopuModa;

    protected function setupGuia() {
        $strNumeGuia = QApplication::PathInfo(0);

        if ($strNumeGuia) {
            $this->objGuia = Guia::Load($strNumeGuia);

            if (!$this->objGuia) {
                throw new Exception('Could not find a Guia object with PK arguments: ' . $strNumeGuia);
            }

            $this->blnEditMode = true;
        } else {
            $this->objGuia = new Guia();
            $this->blnEditMode = false;
        }
    }

    protected function setupValues() {
        $this->objCliente = unserialize($_SESSION['ClieMast']);

        //--------------------------------------------------------------------------------------------
        // Si la Guía se encuentra en modo de edición, la misma se queda con su Peso correspondiente.
        //--------------------------------------------------------------------------------------------
        if ($this->blnEditMode) {
            $this->strPesoGuia = $this->objGuia->PesoGuia;
        } else {
            //------------------------------------------------------------------------------------------------------
            // Si la Tarifa del Cliente es por Valor de la Mercancía, entonces el Peso de la Guía tendrá como valor
            // 2.5 K. En caso contrario, el valor del Peso de la Guía tendrá como valor cero (0).
            //------------------------------------------------------------------------------------------------------
            if ($this->objCliente->Tarifa->TipoTarifa == FacTipoTarifaType::PORVALORDELAMERCANCIA) {
                $this->strPesoGuia = 2.5;
            } else {
                $this->strPesoGuia = 0;
            }
        }

        //-----------------------------------------------------------------------------------------------------
        // Si el Peso de la Guía es Menor o Igual a 2 K., entonces se obtiene Documento Nacional como Producto
        // de la guía. En caso contrario, se obtiene Paquete Nacional como Producto de la guía.
        //-----------------------------------------------------------------------------------------------------
        if ($this->strPesoGuia <= 2) {
            $this->objProducto = FacProducto::LoadBySiglProd('DOC');
        } else {
            $this->objProducto = FacProducto::LoadBySiglProd('APX');
        }

        //----------------------------------------------------------------------
        // Vector con las Sucursales activas de Venezuela, que no sean almacén.
        //----------------------------------------------------------------------
        $this->arrSucuActi = unserialize($_SESSION['SucuActi']);
        t('El Vector de Sucursales tiene: '.count($this->arrSucuActi).' elementos');
        foreach ($this->arrSucuActi as $objSucuProc) {
            t($objSucuProc->CodiEsta);
            if (in_array($objSucuProc->CodiEsta,array('VLN','MCY','MAR'))) {
                t($objSucuProc->CodiEsta.' existe');
            }
        }

        //------------------------------------------------------
        // Vector con los Destinatarios Frecuentes del Cliente.
        //------------------------------------------------------
        $this->arrDestFrec = unserialize($_SESSION['DestFrec']);

        //-----------------------------------------------------
        // Vectores que definen rango reglamentario del Seguro
        //-----------------------------------------------------
        $this->arrValoMini = unserialize($_SESSION['ValoMin1']);
        $this->arrValoMaxi = unserialize($_SESSION['ValoMax1']);
        $this->intCantLimi = count($this->arrValoMaxi)-1;

        //------------------------------------------------------------
        // Se identifica la hora Tope para realizar una Recolecta
        //------------------------------------------------------------
        $this->strHoraTope = BuscarParametro('00009', 'HoraTope', 'Txt1', '14:00');
    }

    protected function Form_Create() {
        parent::Form_Create();

        // t('Creando guia Expreso Nacional...');
        $this->setupGuia();
        $this->setupValues();

        $this->lblTituForm->Text = QApplication::Translate('Guía');

        //------------------------
        // Información de la Guía
        //------------------------
        $this->txtNumeGuia_Create();
        $this->calFechGuia_Create();
        $this->calFechReco_Create();
        $this->txtDescCont_Create();
        $this->txtCantPiez_Create();
        $this->txtValoDecl_Create();
        $this->chkSeguGuia_Create();
        $this->chkEnviReto_Create();
        $this->txtContReto_Create();

        //---------------------------
        // Información del Remitente
        //---------------------------
        $this->txtNombRemi_Create();
        $this->txtTeleRemi_Create();
        $this->txtDireRemi_Create();

        //------------------------------
        // Información del Destinatario
        //------------------------------
        $this->lstDestFrec_Create();
        $this->lstSucuDest_Create();
        $this->txtNombDest_Create();
        $this->txtTeleDest_Create();
        $this->txtDireDest_Create();
        $this->lblCeduDest_Create();
        $this->lstCeduDest_Create();
        $this->txtCeduDest_Create();
        $this->chkDestFrec_Create();
        $this->lstModaPago_Create();
        $this->lstModaPago_Change();

        //-----------------
        // Botones y otros
        //-----------------
        $this->btnSave->Text = TextoIcono('save fa-lg','Guardar');
        $this->btnImprGuia_Create();
        $this->btnCreaNuev_Create();
        $this->btnBorrGuia_Create();
        $this->lblBotoPopu_Create();
        $this->lblPopuModa_Create();

        //---------------------------------------------------------------------
        // Se valida si al usuario se le permite realizar gestiones en la guía
        //---------------------------------------------------------------------
        $this->permitirCambios();
        $this->lstSucuDest_Change();

        if (!$this->blnEditMode) {
            $this->btnCancel->Visible = false;
        }
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    public function txtNumeGuia_Create() {
        $this->txtNumeGuia = new QTextBox($this);
        $this->txtNumeGuia->Name = QApplication::Translate('Nro. de Guía');
        $this->txtNumeGuia->Text = $this->objGuia->NumeGuia;
        $this->txtNumeGuia->Width = 100;
        $this->txtNumeGuia->Enabled = false;
    }

    protected function calFechGuia_Create() {
        $this->calFechGuia = new QCalendar($this);
        $this->calFechGuia->Name = 'Fecha';
        $this->calFechGuia->Width = 100;
        $this->calFechGuia->Enabled = false;
        if ($this->blnEditMode) {
            $this->calFechGuia->DateTime = $this->objGuia->FechGuia;
        } else {
            $this->calFechGuia->DateTime = new QDateTime(QDateTime::Now());
        }
    }

    protected function calFechReco_Create() {
        $this->calFechReco = new QCalendar($this);
        $this->calFechReco->Name = QApplication::Translate('Fecha de la Recolecta');
        $this->calFechReco->Width = 100;
        $this->calFechReco->DateTime = new QDateTime(QDateTime::Now);
        $this->calFechReco->AddAction(new QChangeEvent(), new QAjaxAction('calFechReco_Change'));
    }

    protected function txtDescCont_Create() {
        $this->txtDescCont = new QTextBox($this);
        $this->txtDescCont->Name = 'Contenido del envío';
        $this->txtDescCont->TextMode = QTextMode::MultiLine;
        $this->txtDescCont->MaxLength = Guia::DescContMaxLength;
        $this->txtDescCont->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtDescCont->Width = 225;
        $this->txtDescCont->Height = 70;
        if ($this->blnEditMode) {
            $this->txtDescCont->Text = $this->objGuia->DescCont;
        }
    }

    protected function txtCantPiez_Create() {
        $this->txtCantPiez = new QTextBox($this);
        $this->txtCantPiez->Name = 'Cant. Piezas';
        $this->txtCantPiez->Width = 80;
        if ($this->blnEditMode) {
            $this->txtCantPiez->Text = $this->objGuia->CantPiez;
        }
    }

    protected function txtValoDecl_Create() {
        $this->txtValoDecl = new QTextBox($this);
        $this->txtValoDecl->Name = 'Valor Decl.';
        $this->txtValoDecl->Width = 80;
        if ($this->blnEditMode) {
            $this->txtValoDecl->Text = $this->objGuia->ValorDeclarado;
        }
    }

    protected function chkSeguGuia_Create() {
        $this->chkSeguGuia = new QCheckBox($this);
        $this->chkSeguGuia->Name = '¿Desea Seguro?';
        if ($this->blnEditMode) {
            $this->chkSeguGuia->Checked = $this->objGuia->Asegurado;
        }
        $this->chkSeguGuia->AddAction(new QChangeEvent(), new QAjaxAction('chkSeguGuia_Change'));
    }

    protected function chkEnviReto_Create() {
        $this->chkEnviReto = new QCheckBox($this);
        $this->chkEnviReto->Name = '¿Envío Retorno?';
        if ($this->objCliente->GuiaRetorno) {
            $this->chkEnviReto->Visible = true;
        } else {
            $this->chkEnviReto->Visible = false;
        }
        if ($this->blnEditMode) {
            $this->chkEnviReto->Checked = $this->objGuia->TieneGuiaRetorno;
        }
        $this->chkEnviReto->AddAction(new QChangeEvent(), new QAjaxAction('chkEnviReto_Change'));
    }

    protected function txtContReto_Create() {
        $this->txtContReto = new QTextBox($this);
        $this->txtContReto->Name = 'Contenido Retorno';
        $this->txtContReto->MaxLength = Guia::ObservacionMaxLength;
        $this->txtContReto->Width = 515;
        $this->txtContReto->Height = 40;
        $this->habilitaRetorno();
        if ($this->objCliente->GuiaRetorno) {
            $this->txtContReto->Visible = true;
        } else {
            $this->txtContReto->Visible = false;
        }
    }
    //-------------------------------------
    // ---- Información del Remitente ----
    //-------------------------------------
    protected function txtNombRemi_Create() {
        $this->txtNombRemi = new QTextBox($this);
        $this->txtNombRemi->Name = 'Nombre/R. Social';
        $this->txtNombRemi->Width = 225;
        if ($this->blnEditMode) {
            $this->txtNombRemi->Text = $this->objGuia->NombRemi;
        } else {
            $this->txtNombRemi->Text = $this->objCliente->NombClie;
        }
    }

    protected function txtTeleRemi_Create() {
        $this->txtTeleRemi = new QTextBox($this);
        $this->txtTeleRemi->Name = 'Teléfono (Solo Números)';
        $this->txtTeleRemi->Width = 218;
        if ($this->blnEditMode) {
            $this->txtTeleRemi->Text = $this->objGuia->TeleRemi;
        } else {
            $this->txtTeleRemi->Text = $this->objCliente->TeleCona;
        }
    }

    protected function txtDireRemi_Create() {
        $this->txtDireRemi = new QTextBox($this);
        $this->txtDireRemi->Name = 'Dirección Recolecta';
        $this->txtDireRemi->TextMode = QTextMode::MultiLine;
        $this->txtDireRemi->MaxLength = Guia::DireRemiMaxLength;
        $this->txtDireRemi->Width = 225;
        $this->txtDireRemi->Height = 70;
        if ($this->blnEditMode) {
            $this->txtDireRemi->Text = $this->objGuia->DireRemi;
        } else {
            //            $this->txtDireRemi->Text = $this->objCliente->DireReco;
            $this->txtDireRemi->Text = substr($this->objUsuario->Direccion,0,200);
        }
    }
    //----------------------------------------
    // ---- Información del Destinatario ----
    //----------------------------------------
    protected function lstDestFrec_Create() {
        $this->lstDestFrec = new QListBox($this);
        $this->lstDestFrec->Name = 'Destinatario Frecuente';
        $this->lstDestFrec->Width = 240;
        $this->cargarDestinatario();
        $this->lstDestFrec->AddAction(new QChangeEvent(), new QAjaxAction('lstDestFrec_Change'));
    }

    protected function lstSucuDest_Create() {
        $this->lstSucuDest = new QListBox($this);
        $this->lstSucuDest->Name = 'Destino';
        if ($this->blnEditMode) {
            $this->cargarDestino($this->objGuia->EstaDest);
        } else {
            $this->cargarDestino();
        }
        $this->lstSucuDest->AddAction(new QChangeEvent(), new QAjaxAction('lstSucuDest_Change'));
    }

    protected function txtNombDest_Create() {
        $this->txtNombDest = new QTextBox($this);
        $this->txtNombDest->Name = 'Nombre/R. Social';
        $this->txtNombDest->Width = 240;
        $this->txtNombDest->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        if ($this->blnEditMode) {
            $this->txtNombDest->Text = $this->objGuia->NombDest;
        }
    }

    protected function txtTeleDest_Create() {
        $this->txtTeleDest = new QTextBox($this);
        $this->txtTeleDest->Name = 'Teléfono (Solo Números)';
        $this->txtTeleDest->Width = 218;
        if ($this->blnEditMode) {
            $this->txtTeleDest->Text = $this->objGuia->TeleDest;
        }
    }

    protected function txtDireDest_Create() {
        $this->txtDireDest = new QTextBox($this);
        $this->txtDireDest->Name = 'Dirección Entrega';
        $this->txtDireDest->TextMode = QTextMode::MultiLine;
        $this->txtDireDest->MaxLength = Guia::DireDestMaxLength;
        $this->txtDireDest->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
        $this->txtDireDest->Width = 240;
        $this->txtDireDest->Height = 70;
        if ($this->blnEditMode) {
            $this->txtDireDest->Text = $this->objGuia->DireDest;
        }
    }

    protected function lblCeduDest_Create() {
        $this->lblCeduDest = new QLabel($this);
        $this->lblCeduDest->Text = 'Cédula/RIF del Destinatario (opcional)';
    }

    protected function lstCeduDest_Create() {
        $this->lstCeduDest = new QListBox($this);
        $arrTipoDocu = TipoDocumento::LoadAll();
        foreach ($arrTipoDocu as $objTipoDocu) {
            if (!$this->blnEditMode) {
                $this->lstCeduDest->AddItem($objTipoDocu->Id, $objTipoDocu->Id, $objTipoDocu->Id == "V");
            } else {
                $this->lstCeduDest->AddItem($objTipoDocu->Id, $objTipoDocu->Id, $objTipoDocu->Id == $this->objGuia->TipoDocumentoId);
            }
        }
    }

    protected function txtCeduDest_Create() {
        $this->txtCeduDest = new QTextBox($this);
        $this->txtCeduDest->Width = 160;
        if ($this->blnEditMode) {
            $this->txtCeduDest->Text = $this->objGuia->CedulaRif;
        }
        //        $this->txtCeduDest->AddAction(new QBlurEvent(), new QAjaxAction('txtCeduDest_Blur'));
    }

    protected function chkDestFrec_Create() {
        $this->chkDestFrec = new QCheckBox($this);
        $this->chkDestFrec->Name = '¿Destinatario Frecuente?';
    }

    protected function lstModaPago_Create() {
        $this->lstModaPago = new QListBox($this);
        $this->cargarModalidadPago();
        $this->lstModaPago->AddAction(new QChangeEvent(),new QAjaxAction('lstModaPago_Change'));
    }

    //-------------------
    // ---- Botones ----
    //-------------------
    protected function btnImprGuia_Create() {
        $this->btnImprGuia = new QButtonI($this);
        $this->btnImprGuia->Text = TextoIcono('print fa-lg','Impr');
        $this->btnImprGuia->AddAction(new QClickEvent(), new QAjaxAction('btnImprGuia_Click'));
        $this->btnImprGuia->Visible = $this->blnEditMode;
    }

    protected function btnCreaNuev_Create() {
        $this->btnCreaNuev = new QButtonP($this);
        $this->btnCreaNuev->Text = TextoIcono('plus-circle fa-lg','Nueva');
        $this->btnCreaNuev->AddAction(new QClickEvent(), new QServerAction('btnCreaNuev_Click'));
    }

    protected function btnBorrGuia_Create() {
        $this->btnBorrGuia = new QButtonD($this);
        $this->btnBorrGuia->Text = TextoIcono('trash-o fa-lg','Borr');
        $this->btnBorrGuia->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('Guia'))));
        $this->btnBorrGuia->AddAction(new QClickEvent(), new QAjaxAction('btnBorrGuia_Click'));
        $this->btnBorrGuia->Visible = $this->blnEditMode;
    }

    protected function lblBotoPopu_Create() {
        $this->lblBotoPopu = new QLabel($this);
        $this->lblBotoPopu->Text = $this->recrearBotonPopup();
        $this->lblBotoPopu->HtmlEntities = false;
        $this->lblBotoPopu->CssClass = '';
    }

    protected function lblPopuModa_Create() {
        $this->lblPopuModa = new QLabel($this);
        $this->lblPopuModa->Text = $this->recrearPopupModal();
        $this->lblPopuModa->HtmlEntities = false;
        $this->lblPopuModa->CssClass = '';
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function recrearBotonPopup() {
        $strTextModa =
            "<button type=\"button\" class=\"btn btn-warning btn-sm\" data-toggle=\"modal\" data-target=\"#myModal\">
                <i class=\"fa fa-".__iINFO__." fa-lg\"></i> ZNC 
            </button>";
        return $strTextModa;
    }

    protected function recrearPopupModal() {
        $strTextModa = '
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Zonas No Cubiertas - '.$this->lstSucuDest->SelectedName.'</h4>
              </div>
              <div class="modal-body">';
        $strTextModa .= $this->strZonaIncu;
        $strTextModa .= '</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>';
        return $strTextModa;
    }

    protected function lstModaPago_Change() {
        $this->lblCeduDest->Text = 'Cédula/RIF del Destinatario (opcional)';
        if (!is_null($this->lstModaPago->SelectedValue)) {
            if ($this->lstModaPago->SelectedValue == TipoGuiaType::CODCOBROENDESTINO) {
                $this->lblCeduDest->Text = 'Cédula/RIF del Destinatario';
            }
        }
    }

    protected function Form_Validate() {
        // t('Validando la Guia');
        // t('=================');
        $strTextMens = 'Errores: <b>';
        $strMensErro = '';
        $blnTodoOkey = true;
        //-----------------------------------------
        // Validando campo de Nombre del Remitente
        //-----------------------------------------
        if (strlen($this->txtNombRemi->Text) == 0) {
            $blnTodoOkey = false;
            $strMensErro .= 'Nombre/R.Social del Remitente (Requerido)';
        }
        // t('Razon Social: '.$blnTodoOkey);
        //-------------------------------------------
        // Validando campo de Teléfono del Remitente
        //-------------------------------------------
        if (strlen($this->txtTeleRemi->Text) > 0) {
            $this->txtTeleRemi->Text = DejarSoloLosNumeros($this->txtTeleRemi->Text);
            if (strlen($this->txtTeleRemi->Text) > 11) {
                $blnTodoOkey = false;
                if (strlen($strMensErro) > 0) {
                    $strMensErro .= ', ';
                }
                $strMensErro .= 'Teléfono Remitente no debe tener más de 11 caracteres';
            }
        }
        // t('Telefono del Remitente: '.$blnTodoOkey);
        //-------------------------------------------
        // Validando campo de Dirección de Recolecta
        //-------------------------------------------
        if (strlen($this->txtDireRemi->Text) == 0) {
            $blnTodoOkey = false;
            if (strlen($strMensErro) > 0) {
                $strMensErro .= ', ';
            }
            $strMensErro .= 'Dirección de Recolecta (Requerida)';
        }
        // t('Direccion de Recolecta: '.$blnTodoOkey);
        //---------------------------------------------------------
        // Validando campo de Descripción del Contenido de la Guía
        //---------------------------------------------------------
        if (strlen($this->txtDescCont->Text) == 0) {
            $blnTodoOkey = false;
            if (strlen($strMensErro) > 0) {
                $strMensErro .= ', ';
            }
            $strMensErro .= 'Contenido del Envío (Requerido)';
        }
        // t('Descripcion del Contenido: '.$blnTodoOkey);
        //---------------------------------------
        // Validando campo de Cantidad de Piezas
        //---------------------------------------
        if (strlen($this->txtCantPiez->Text) == 0) {
            $blnTodoOkey = false;
            if (strlen($strMensErro) > 0) {
                $strMensErro .= ', ';
            }
            $strMensErro .= 'Cant. Pzas (Requerida)';
        }
        // t('Cantidad de Piezas: '.$blnTodoOkey);
        //------------------------------------
        // Validando campo de Valor Declarado
        //------------------------------------
        if ($this->chkSeguGuia->Checked) {
            if (strlen($this->txtValoDecl->Text) == 0) {
                $blnTodoOkey = false;
                if (strlen($strMensErro) > 0) {
                    $strMensErro .= ', ';
                }
                $strMensErro .= 'V. Decl. (Requerido)';
            } else {
                //-----------------------------------------------------------------------------------
                // Verificando si el Valor Declarado se encuentra dentro del rango legal del Seguro,
                // en caso de que el Usuario haya requerido el mismo.
                //-----------------------------------------------------------------------------------
                if ($this->objSeguGuia) {
                    if ($this->txtValoDecl->Text < $this->arrValoMini[0]) {
                        //----------------------------------------------------------------------------------
                        // El Valor Decl. se encuentra por debajo del rango legal, por lo que el Sistema no
                        // debe permitir guardar la guía hasta no corregir dicho valor.
                        //----------------------------------------------------------------------------------
                        $blnTodoOkey = false;
                        if (strlen($strMensErro) > 0) {
                            $strMensErro .= ', ';
                        }
                        $strMensErro .= 'V. Decl. ('.$this->objSeguGuia->MensSegu.')';
                    }
                }
            }
        }
        // t('Valor Declarado: '.$blnTodoOkey);
        //----------------------------
        // Validando campo de Destino
        //----------------------------
        if (is_null($this->lstSucuDest->SelectedValue)) {
            $blnTodoOkey = false;
            if (strlen($strMensErro) > 0) {
                $strMensErro .= ', ';
            }
            $strMensErro .= 'Destino (Requerido)';
        }
        // t('Destino: '.$blnTodoOkey);
        //--------------------------------------------
        // Validando campo de Nombre del Destinatario
        //--------------------------------------------
        if (strlen($this->txtNombDest->Text) == 0) {
            $blnTodoOkey = false;
            if (strlen($strMensErro) > 0) {
                $strMensErro .= ', ';
            }
            $strMensErro .= 'Nombre/R. Social del Destinatario (Requerido)';
        }
        // t('Nombre del Destinatario: '.$blnTodoOkey);
        //----------------------------------------------
        // Validando campo de Teléfono del Destinatario
        //----------------------------------------------
        if (strlen($this->txtTeleDest->Text) > 0) {
            $blnErroDest = false;
            //---------------------------------------------------------------------------
            // Se inicia contador de errores para el campo del Teléfono del Destinatario
            // en caso de que en el mismo exista más de un número de teléfono.
            //---------------------------------------------------------------------------
            $intErroDest = 0;
            $this->txtTeleDest->Text = DejarSoloLosNumeros2($this->txtTeleDest->Text);
            //-------------------------------------------------------------------------------
            // En la cadena del campo, se verifica de que exista más de un teléfono
            // del destinatario, mediante un signo divisor reglamentario entre los
            // mismos. En este caso estos números deben estar separador por un slash ("/").
            //-------------------------------------------------------------------------------
            $arrTeleDest = explode('/',$this->txtTeleDest->Text);
            if ($arrTeleDest !== false) {
                //------------------------------------------------------------------------------------------
                // Si existe más de un número, se iteran uno por uno, validando su formato correspondiente.
                //------------------------------------------------------------------------------------------
                foreach  ($arrTeleDest as $strTeleDest) {
                    $strTeleDest = DejarSoloLosNumeros($strTeleDest);
                    if (strlen($strTeleDest) > 11) {
                        //-----------------------------------------------------------------------------------------
                        // Si el número iterado posee más de la cantidad reglamentaria de caracteres, se considera
                        // como formato no válido, y se incrementa el contador de errores.
                        //-----------------------------------------------------------------------------------------
                        $blnTodoOkey = false;
                        $blnErroDest = true;
                        $intErroDest++;
                    }
                }
            } else {
                //-----------------------------------------------------------------------------------------------
                // Se entiende que existe solamente un número del destinatario, y se valida el formato del mismo
                //-----------------------------------------------------------------------------------------------
                if (strlen($this->txtTeleDest->Text) > 11) {
                    $blnTodoOkey = false;
                    $blnErroDest = true;
                }
            }
            if ($blnErroDest){
                //------------------------------------------------------------------------------------------------
                // Si hubo algún error en el campo del teléfono del destinatario, se reporta el mismo al usuario.
                //------------------------------------------------------------------------------------------------
                if (strlen($strMensErro) > 0) {
                    $strMensErro .= ', ';
                }
                if ($intErroDest > 0) {
                    $strMensErro .= 'Cantidad de caracteres inválida de '.$intErroDest.' Teléfono(s) del Destinatario. No debe ser mayor a 11';
                } else {
                    $strMensErro .= 'Cantidad de caracteres de Teléfono del Destinatario no debe ser mayor a 11';
                }
            }
        }
        // t('Telefono del Destinatario: '.$blnTodoOkey);
        //-----------------------------------------
        // Validando campo de Dirección de Entrega
        //-----------------------------------------
        if (strlen($this->txtDireDest->Text) == 0) {
            $blnTodoOkey = false;
            if (strlen($strMensErro) > 0) {
                $strMensErro .= ', ';
            }
            $strMensErro .= 'Dirección de Entrega (Requerida)';
        }
        // t('Direccion Destino: '.$blnTodoOkey);
        //----------------------------------------------------------------
        // Validando campo de Cédula y campo de Teléfono del Destinatario
        // en caso de que la Modalidad de Pago sea COD.
        //----------------------------------------------------------------
        $strModoPago = $this->lstModaPago->SelectedName;
        $intPosiPago = strpos($strModoPago, "-");
        $strNombPago = substr($strModoPago, 0, $intPosiPago);
        if ($strNombPago == 'COD') {
            if (strlen(trim($this->txtCeduDest->Text)) == 0) {
                $blnTodoOkey = false;
                if (strlen($strMensErro) > 0) {
                    $strMensErro .= ', ';
                }
                $strMensErro .= 'Cédula/RIF del Destinatario (Requerido)';
            }
            if (strlen($this->txtTeleDest->Text) == 0) {
                $blnTodoOkey = false;
                if (strlen($strMensErro) > 0) {
                    $strMensErro .= ', ';
                }
                $strMensErro .= 'Teléfono del Destinatario (Requerido)';
            }
        }
        // t('Cedula y Tlf del Destinatario: '.$blnTodoOkey);
        //------------------------------------------------------------------------------------------
        // Si hay uno o más errores, se notifican al usuario y no se permite la gestión de la guía.
        //------------------------------------------------------------------------------------------
        if (!$blnTodoOkey) {
            $strTextMens .= $strMensErro;
            $strTextMens .= '</b>.';
            $this->mensaje($strTextMens,'','d','',__iHAND__);
        }
        // t('Al final: '.$blnTodoOkey);
        return $blnTodoOkey;
    }

    protected function chkSeguGuia_Change() {
        $this->mensaje();
        if ($this->chkSeguGuia->Checked) {
            //--------------------------------------------------------------------------------------------
            // Se obtienen el Valor declarado, el Valor o Monto mínimo y máximo reglamentario del Seguro.
            //--------------------------------------------------------------------------------------------
            $this->decValoDecl = $this->txtValoDecl->Text;
            $decValoMini = $this->arrValoMini[0];
            $decValoMaxi = $this->arrValoMaxi[$this->intCantLimi];
            //-------------------------------------
            // Se inicializan otros parámetros ...
            //-------------------------------------
            $blnExceMini = false;
            $blnExceMaxi = false;
            $strMensAdve = '';
            //---------------------------------------------------------------------------------------------------
            // Se informa al usuario el rango reglamentario de valores del seguro y otras normativas necesarias.
            //---------------------------------------------------------------------------------------------------
            $strMensUsua  = 'El Valor Declarado debe estar comprendido entre Bs. '.nf($decValoMini).' - Bs. '.nf($decValoMaxi);
            $strMensUsua .= '. Se le recuerda también que no se aseguran líquidos ni artículos de vidrio.';
            $this->mensaje($strMensUsua,'m','w','',__iEXCL__);
            //--------------------------------------------------------------------------------------------
            // Si el V. Declarado es Mayor al Valor Máximo establecido entonces se advierte la situación.
            //--------------------------------------------------------------------------------------------
            if ($this->decValoDecl > $decValoMaxi) {
                $blnExceMaxi = true;
                $this->decValoDecl = $decValoMaxi;
                $strMensAdve = 'El Valor Decl. ha sido ajustado al Monto Máximo asegurable (Bs. '.$decValoMaxi.')';
                //----------------------------------------------------------------------------
                // Si la tarifa del Cliente es "Por Peso", entonces el valor máximo permitido
                // se convierte en el valor declarado.
                //----------------------------------------------------------------------------
                if ($this->objCliente->Tarifa->TipoTarifa == FacTipoTarifaType::PORPESO) {
                    $this->txtValoDecl->Text = $decValoMaxi;
                }
            } elseif ($this->decValoDecl < $decValoMini) {
                //-------------------------------------------------------------------------------------------
                // Si el V.Declarado es Menor al Valor Mínimo establecido entonces se advierte la situación
                //-------------------------------------------------------------------------------------------
                $blnExceMini = true;
                $strMensAdve = 'El Monto Mínimo asegurable es de Bs. '.$decValoMini;
            }
            //---------------------------------------------------------------------------------------------
            // Se crea un objeto genérico con la intención de almacenar la información del seguro, y poder
            // manipular el mismo en cualquier parte del programa.
            //---------------------------------------------------------------------------------------------
            $this->objSeguGuia = new stdClass();
            $this->objSeguGuia->ExceMini = $blnExceMini;
            $this->objSeguGuia->ExceMaxi = $blnExceMaxi;
            $this->objSeguGuia->MensSegu = $strMensAdve;
        }
    }

    protected function chkEnviReto_Change() {
        $blnEnviReto = false;
        if ($this->chkEnviReto->Checked) {
            //----------------------------------------------------------------------
            // Si el Usuario marca el checkbox, se habilita el campo de descripción
            // de contenido e información del Envío Retorno.
            //----------------------------------------------------------------------
            $blnEnviReto = true;
        }
        $this->txtContReto->Enabled = $blnEnviReto;
    }

    protected function lstDestFrec_Change() {
        /**
         * @var $objDestFrec DestinatarioFrecuente
         */
        if ($this->lstDestFrec->SelectedValue) {
            //--------------------------------------------------------------
            // Se recorre el vector de Destinatarios Frecuentes del Cliente
            //--------------------------------------------------------------
            foreach ($this->arrDestFrec as $objDestFrec) {
                //-----------------------------------------------------------
                // Se localiza al Destinatario Frecuente correspondiente con
                // el Id seleccionado en la lista.
                //-----------------------------------------------------------
                if ($objDestFrec->Id == $this->lstDestFrec->SelectedValue) {
                    //--------------------------------------------------------------------
                    // Se llenan los campos del Destinatario con la información obtenida.
                    //--------------------------------------------------------------------
                    $this->txtNombDest->Text = $objDestFrec->Nombre;
                    $this->txtDireDest->Text = $objDestFrec->Direccion;
                    $this->txtTeleDest->Text = $objDestFrec->Telefono;
                    $this->txtCeduDest->Text = $objDestFrec->CedulaRif;
                    //------------------------------------------------------------------------------------
                    // Se carga el destino de la guia en funcion del destinatario frecuente seleccionado.
                    //------------------------------------------------------------------------------------
                    $this->lstSucuDest->RemoveAllItems();
                    if ($this->arrSucuActi) {
                        foreach ($this->arrSucuActi as $objSucuDest) {
                            $objListItem = new QListItem($objSucuDest->__toString(),$objSucuDest->CodiEsta);
                            if ($objDestFrec->DestinoId == $objSucuDest->CodiEsta) {
                                $objListItem->Selected = true;
                            }
                            $this->lstSucuDest->AddItem($objListItem);
                        }
                    }
                }
            }
            $this->lstSucuDest_Change();
        }
    }

    protected function lstSucuDest_Change() {
        //$this->mensaje();
        $blnZonaNocu = false;
        if (!is_null($this->lstSucuDest->SelectedValue)) {
            //----------------------------------------------------------
            // Se inicializa la variable global responsable de imprimir
            // las Zonas No Cubiertas de la Sucursal Seleccionada.
            //----------------------------------------------------------
            $this->strZonaIncu = '';
            //--------------------------------------------------------------
            // Al cambiar el destino, se deben mostrar al usuario las Zonas
            // No cubiertas asociadas a dicho destino
            //--------------------------------------------------------------
            $arrZonaNocu = ZonaNoCubierta::LoadArrayByCodiEsta($this->lstSucuDest->SelectedValue);
            if (count($arrZonaNocu) > 0) {
                //------------------------------------------------
                // Se muestra el label quien recrea al botón ZNC.
                //------------------------------------------------
                $blnZonaNocu = true;
                //---------------------------------------------------------------------------------------------
                // Se itera el vector que contiene laz Zonas No Cubiertas de la Sucursal Destino seleccionada.
                //---------------------------------------------------------------------------------------------
                foreach ($arrZonaNocu as $objZonaNocu) {
                    if (strlen($this->strZonaIncu) > 0) {
                        $this->strZonaIncu .= ", ";
                    }
                    //--------------------------------------------------------------------------------
                    // Se agrega a la variable global responsable de imprimir las Zonas No Cubiertas,
                    // la Zona encontrada.
                    //--------------------------------------------------------------------------------
                    $this->strZonaIncu .= $objZonaNocu->Descripcion;
                }
                //-------------------------------------------------------------------------
                // Las siglas de la Sucursal Destino seleccionada en la lista, se asignan
                // a la variable global del programa, responsable de mostrar las mismas en
                // el botón de ZNC (Zonas No Cubiertas) para su referencia.
                //-------------------------------------------------------------------------
                $this->strCodiEsta = $this->lstSucuDest->SelectedValue;
                //--------------------------------------------------------------------------------------
                // Se invoca las funciones para recrear al botón ZNC y al Modal quien mostrará las ZNC.
                //--------------------------------------------------------------------------------------
                $this->lblBotoPopu->Text = $this->recrearBotonPopup();
                $this->lblPopuModa->Text = $this->recrearPopupModal();
                //----------------------------------------------------------------------------------------
                // Se notifica al usuario que existen Zonas referentes a la Sucursal Destino seleccionada
                // cuya ruta no cubre la agencia.
                //----------------------------------------------------------------------------------------
                $strMensUsua  = "Existen en <strong>".$this->lstSucuDest->SelectedName."</strong>, alguna Zonas que no Cubrimos,";
                $strMensUsua .= " presione el botón <strong>ZNC</strong> para mayores detalles";
                $this->mensaje($strMensUsua,'','w','',__iEXCL__);
            }
        }
        $this->lblBotoPopu->Visible = $blnZonaNocu;
    }

    protected function calFechReco_Change() {
        if (!is_null($this->calFechReco->DateTime)) {
            $this->dteFechReco = DspDespacho::LoadFechaRecolecta2(
                $this->strHoraTope, $this->calFechReco->DateTime->__toString("YYYY-MM-DD")
            );
        }
    }

    protected function btnSave_Click() {
        $blnTodoOkey = true;
        // t('Salvando la Guia en el CORP');
        // t('===========================');
        //------------------------------------
        // Parámetros para Mensaje de Usuario
        //------------------------------------
        $strMensUsua = 'Transacción Exitosa';
        $strTipoMens = 's';
        $strSimbMens = __iCHEC__;
        //----------------------------------------
        // Parámetros para Mensaje de Información
        //----------------------------------------
        $strMensInfo = '';
        $strTipoInfo = 'i';
        $strSimbInfo = __iEXCL__;
        //------------------------------------------------------------------------------------
        // Si se guarda por primera vez la guía, a la misma se le genera un número o Id nuevo
        //------------------------------------------------------------------------------------
        if (!$this->blnEditMode) {
            $this->txtNumeGuia->Text = proxNroDeGuia();
        }
        // t('Nro de Guia asignado');
        //--------------------------------------------
        // Se actualizan ahora los campos de la tabla
        //--------------------------------------------
        $this->UpdateGuiaFields();
        // t('Campos de la Guia, actualizados');
        //----------------------------------------------------------------------------------------
        // Si el Cliente ya posee una operación o ruta de recolecta, ésta se le asigna a la Guía,
        // de lo contrario se le asigna por defecto una ruta u operación genérica.
        //----------------------------------------------------------------------------------------
        $blnGrabReco = true;
        if ($blnGrabReco) {
            if ($this->objCliente->RutaRecolecta) {
                $this->objGuia->OperacionId = $this->objCliente->RutaRecolecta;
            } else {
                $arrOperacion = SdeOperacion::LoadArrayByCodiRuta('R9999');
                $this->objGuia->OperacionId = $arrOperacion[0]->CodiOper;
            }
        }
        // t('Operacion asignada');
        //-----------------------------------------------------------------
        // Si la guía no tiene un Cliente asignado, entonces se le asigna.
        //-----------------------------------------------------------------
        if (is_null($this->objGuia->CodiClie)) {
            $this->objGuia->CodiClie = $this->objCliente->CodiClie;
        }
        // t('Codigo del Cliente re-asignado');
        //--------------------------------------------------------------
        // Se salva la Guía con la data actualizada hasta los momentos.
        //--------------------------------------------------------------
        $this->objGuia->Save();
        // t('Guia salvada');
        //-----------------------------------------------------------------------------------------
        // Si el Usuario marcó el registro como "Destinatario Frecuente", los datos proporcionados
        // deben salvarse en la tabla correspondiente.
        //-----------------------------------------------------------------------------------------
        if (($this->chkDestFrec->Checked) || (!is_null($this->lstDestFrec->SelectedValue))) {
            GrabarDestinatarioFrecuente($this->objGuia, $this->lstDestFrec->SelectedValue);
            $arrDestFrec = DestinatarioFrecuente::LoadArrayByClienteId(
                $this->objCliente->CodiClie,
                QQ::Clause(QQ::OrderBy(QQN::DestinatarioFrecuente()->Nombre))
            );
            $_SESSION['DestFrec'] = serialize($arrDestFrec);
        }
        // t('Destinatario Frecuente, gestionado...');
        //--------------------------------------------------------------------
        // Si el Usuario especifico Guia Retorno, entonces se crea dicha Guia
        //--------------------------------------------------------------------
        if ($this->chkEnviReto->Checked && !$this->blnEditMode) {
            if (crearGuiaRetorno($this->objGuia)) {
                $strMensInfo .= 'Guía Retorno creada con éxito';
            } else {
                $strMensInfo .= 'Faltan Datos para crear la Guía Retorno';
                $strTipoInfo = 'd';
            }
        }
        // t('Guia Retorno, gestionada...');
        //---------------------------------------------------------------------------------------------------
        // Se procede a buscar una Recolecta existente usando el código del Cliente y la Fecha de Recolecta.
        //---------------------------------------------------------------------------------------------------
        if ($blnGrabReco) {
            $dteFechReco = DspDespacho::LoadFechaRecolecta($this->strHoraTope);
            $objRecoAnte = DspDespacho::BuscarRecolectaPorCodiClieYFechReco($this->objCliente,$dteFechReco);
            if (!$objRecoAnte) {
                //---------------------------------------------------------------------
                // Si no existe ninguna Guia con Recolecta asociada para el dia de hoy
                // se procede a crear la asociacion Guia-Recolecta
                //---------------------------------------------------------------------
                $objRecoGrab = $this->RegistrarRecolecta($this->objGuia);
                $blnTodoOkey = $objRecoGrab->TodoOkey;
                $dteFechReco = $objRecoGrab->FechReco;
                $intCodiDesp = $objRecoGrab->CodiDesp;
                if ($blnTodoOkey && !is_null($dteFechReco)) {
                    //-----------------------------------------------------
                    // Aqui se asocia la Guia a la Recolecta recien creada
                    //-----------------------------------------------------
                    $this->objGuia->RecolectaId = $intCodiDesp;
                    $this->objGuia->Save();
                } else {
                }
            } else {
                //--------------------------------------------------------------------------------------
                // Si la Recolecta ya existe, se verifica que la cantidad de piezas de la Recolecta,
                // coincida con la cantidad de piezas de la Guia
                //--------------------------------------------------------------------------------------
                $objRecoAnte->PesoEsti = floatval($objRecoAnte->PesoEsti) + floatval($this->objGuia->PesoGuia);
                $objRecoAnte->CantBult = $objRecoAnte->CantBult + $this->objGuia->CantPiez;
                $objRecoAnte->TextObse = $objRecoAnte->TextObse . " / " . $this->objGuia->DescCont;
                $objRecoAnte->Save();
            }
        }
        // t('Recolecta gestionada...');
        //---------------------------------------------------------------------------
        // Luego se graba un Checkpoint para la Guía recien ingresada en el Sistema.
        //---------------------------------------------------------------------------
        if (!$this->objGuia->tieneCheckpoint('NR')) {
            $strCodiRuta = '';
            $objCheckpoint = SdeCheckpoint::Load('NR');  // No Recibido
            $objOperacion = SdeOperacion::Load($this->objGuia->OperacionId);
            if ($objOperacion) {
                $strCodiRuta = $objOperacion->CodiRuta;
            }
            $arrDatoCkpt = array();
            $arrDatoCkpt['NumeGuia'] = $this->objGuia->NumeGuia;
            $arrDatoCkpt['UltiCkpt'] = '';
            $arrDatoCkpt['GuiaAnul'] = SinoType::NO;
            $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
            $arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescCkpt;
            $arrDatoCkpt['CodiRuta'] = $strCodiRuta;
            $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
            if (!$arrResuGrab['TodoOkey']) {
                $blnTodoOkey = false;
                $strMensUsua = 'La Guía ha sido guardada. Sin embargo, '.$arrResuGrab['MotiNook'];
                $strTipoMens = 'i';
                $strSimbMens = __iEXCL__;
            }
        }
        // t('Checkpoint NR, grabado...');
        if ($blnTodoOkey) {
            //----------------------------------------------------------------------------------------------------------
            // Si todos los datos estan en orden, entonces se muestra en pantalla el boton que permite imprimir la Guia.
            //----------------------------------------------------------------------------------------------------------
            $this->btnImprGuia->Visible = true;
            $this->btnBorrGuia->Visible = true;
            //---------------------------------------------------------------------------------------------------
            // Si el Usuario ha requerido el Seguro, y el Valor Decl. está por encima del Rango legal del mismo,
            // se le notifica que el Valor Decl. ha sido ajustado al Monto Máximo del Rango.
            //---------------------------------------------------------------------------------------------------
            if (($this->objSeguGuia) && ($this->objSeguGuia->ExceMaxi)) {
                $strMensUsua .= '. '.$this->objSeguGuia->MensSegu;
            }
        }
        // t('Botones de impresion, visibles...');
        //-----------------------------------------------------------------------
        // Se muestra al Usuario la información del resultado de la transacción.
        //-----------------------------------------------------------------------
        $this->mensaje($strMensUsua,'',$strTipoMens,'',$strSimbMens);
        //-------------------------------------------------------------------------------------------------------
        // Si existe información adicional para mostrar, se expone a través del mensaje inferior del formulario.
        //-------------------------------------------------------------------------------------------------------
        if (strlen($strMensInfo) > 0) {
            $this->mensaje($strMensInfo,'n',$strTipoInfo,'',$strSimbInfo);
        }
        // t('Mensaje mostrado al Usuario...');
        $this->setupGuia();
        $this->setupValues();
        // t('Setups ejecutados...');
    }

    protected function btnBorrGuia_Click() {
        BorrarGuia($this->txtNumeGuia->Text);
        QApplication::Redirect(__SIST__.'/guia_list.php');
    }

    protected function btnImprGuia_Click() {
        QApplication::Redirect(__SIST__.'/guia_pdf.php?strNumeGuia=' . $this->txtNumeGuia->Text);
    }

    protected function btnCreaNuev_Click() {
        QApplication::Redirect(__SIST__.'/cargar_guia.php');
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    //----------------------------
    // Otras acciones del Sistema
    //----------------------------

    protected function permitirCambios() {
        $blnGuarGuia = true;
        $strMensUsua = '';
        //--------------------------------------------------------------------------
        // Si el Cliente, el cual el Usuario se encuentra relacionado, se encuentra
        // inactivo, al mismo no se le permite crear guías.
        //--------------------------------------------------------------------------
        if ($this->objCliente->CodiStat == StatusType::INACTIVO) {
            $blnGuarGuia = false;
            $strMensUsua = 'Su Cuenta ha sido inactivada! No puede crear nuevas Guías!';
        }

        $this->btnSave->Visible = $blnGuarGuia;
        $this->btnCreaNuev->Visible = $blnGuarGuia;

        if (!$blnGuarGuia) {
            $this->mensaje($strMensUsua,'','d','',__iEXCL__);
        }
    }

    protected function habilitaRetorno() {
        $blnHabiReto = false;
        if ($this->blnEditMode) {
            $this->txtContReto->Text = $this->objGuia->Observacion;
            if ($this->chkEnviReto->Checked) {
                $blnHabiReto = true;
            }
        }
        $this->txtContReto->Enabled = $blnHabiReto;
    }

    protected function cargarDestinatario() {
        $this->lstDestFrec->AddItem(QApplication::Translate('- Seleccione Uno -'), null);
        //----------------------------------------------------------------
        // Se cargan los destinatarios frecuentes uno por uno a la lista.
        //----------------------------------------------------------------
        if ($this->arrDestFrec) {
            foreach ($this->arrDestFrec as $objDestFrec) {
                $this->lstDestFrec->AddItem($objDestFrec->Nombre, $objDestFrec->Id);
            }
        }
    }

    protected function cargarDestino($strCodiDest = null) {
        $this->lstSucuDest->RemoveAllItems();
        $this->lstSucuDest->AddItem(QApplication::Translate('- Select One -'), null);
        if ($this->arrSucuActi) {
            //-----------------------------------------------------------------------------------
            // Se itera cada elemento del vector, y a su vez cada uno se va cargando a la lista.
            //-----------------------------------------------------------------------------------
            foreach ($this->arrSucuActi as $objSucuDest) {
                //------------------------------------------------------------------------
                // Si el Códido de la Sucursal no es 'TODOS', puede agregarse a la lista.
                //------------------------------------------------------------------------
                $blnSeleItem = false;
                $objListItem = new QListItem($objSucuDest->__toString(), $objSucuDest->CodiEsta);
                //------------------------------------------------------------------------------------------
                // Si $strCodiDest no es null, quiere decir que el programa se encuentra en modo de Edición
                //------------------------------------------------------------------------------------------
                if (strlen($strCodiDest) > 0) {
                    //-------------------------------------------------------------------------------------
                    // Si la Guía tiene una Sucursal Destino, y la misma coincide o es igual a la Sucursal
                    // obtenida, entonces el ítem se carga a la lista y se deja seleccionado por defecto.
                    //-------------------------------------------------------------------------------------
                    if (($this->objGuia->EstaDestObject) &&
                        ($this->objGuia->EstaDestObject->CodiEsta == $objSucuDest->CodiEsta)) {
                        $blnSeleItem = true;
                    }
                }
                $objListItem->Selected = $blnSeleItem;
                    $this->lstSucuDest->AddItem($objListItem);
            }
        }
    }

    protected function cargarModalidadPago() {
        $this->lstModaPago->RemoveAllItems();
        //-------------------------------------------------------------------------------------------------------------
        // Se obtienen los nombres de las modalidades de Pago con su Id correspondiente, y se van iterando uno por uno
        //-------------------------------------------------------------------------------------------------------------
        $arrModaPago = TipoGuiaType::$NameArray;
        foreach ($arrModaPago as $intId => $strValue) {
            $objListItem = null;
            if ($this->blnEditMode) {
                //-----------------------------------------------------------------------------------------------
                // Si la guía se encuentra en modo de edición, entonces se carga la Modalidad y se selecciona de
                // manera automática si corresponde a la que contiene asignada la Guía.
                //-----------------------------------------------------------------------------------------------
                $objListItem = new QListItem($strValue, $intId, $this->objGuia->TipoGuia == $intId);
                $this->lstModaPago->AddItem($objListItem);
            } else {
                if ($this->objCliente->PagoCrd && (!$this->objCliente->PagoPpd && !$this->objCliente->PagoCod )) {
                    //--------------------------------------------------------------------------------------------------
                    // El usuario actual, siendo filiar de un Cliente, el cual solamente tiene autorizado CRD como modo
                    // de pago, se le habilita únicamente dicho modo.
                    //--------------------------------------------------------------------------------------------------
                    if ($intId == 2) {
                        $objListItem = new QListItem($strValue, $intId, true);
                        $this->lstModaPago->AddItem($objListItem);
                    }
                } elseif ($this->objCliente->PagoPpd && (!$this->objCliente->PagoCrd && !$this->objCliente->PagoCod )) {
                    //--------------------------------------------------------------
                    // El usuario actual el cual solamente tiene autorizado
                    // PPD como modo de pago, se le habilita únicamente dicho modo.
                    //--------------------------------------------------------------
                    if ($intId == 1) {
                        $objListItem = new QListItem($strValue, $intId, true);
                        $this->lstModaPago->AddItem($objListItem);
                    }
                } elseif ($this->objCliente->PagoCod && (!$this->objCliente->PagoPpd && !$this->objCliente->PagoCrd )) {
                    //--------------------------------------------------------------
                    // El usuario actual el cual solamente tiene autorizado
                    // COD como modo de pago, se le habilita únicamente dicho modo.
                    //--------------------------------------------------------------
                    if ($intId == 3) {
                        $objListItem = new QListItem($strValue, $intId, true);
                        $this->lstModaPago->AddItem($objListItem);
                    }
                } elseif (($this->objCliente->PagoPpd && $this->objCliente->PagoCrd ) && !$this->objCliente->PagoCod) {
                    //--------------------------------------------------------------------
                    // Se carga la Modalidad en la lista menos el de COD,
                    // y se selecciona de manera automática si corresponde a CRD-CREDITO.
                    //--------------------------------------------------------------------
                    if ($intId != 3) {
                        $objListItem = new QListItem($strValue, $intId, $intId == TipoGuiaType::CRDCREDITO);
                        $this->lstModaPago->AddItem($objListItem);
                    }
                } elseif (($this->objCliente->PagoCod && $this->objCliente->PagoCrd ) && !$this->objCliente->PagoPpd) {
                    //--------------------------------------------------------------------
                    // Se carga la Modalidad en la lista menos el de PPD,
                    // y se selecciona de manera automática si corresponde a CRD-CREDITO.
                    //--------------------------------------------------------------------
                    if ($intId != 1) {
                        $objListItem = new QListItem($strValue, $intId, $intId == TipoGuiaType::CRDCREDITO);
                        $this->lstModaPago->AddItem($objListItem);
                    }
                } elseif (($this->objCliente->PagoPpd && $this->objCliente->PagoCod ) && !$this->objCliente->PagoCrd) {
                    //--------------------------------------------------------------------
                    // Se carga la Modalidad en la lista menos el de CRD,
                    // y se selecciona de manera automática si corresponde a PPD-PREPAGADA.
                    //--------------------------------------------------------------------
                    if ($intId != 2) {
                        $objListItem = new QListItem($strValue, $intId, $intId == TipoGuiaType::PPDPREPAGADA);
                        $this->lstModaPago->AddItem($objListItem);
                    }
                } else {
                    //------------------------------------------------------------------------------------------
                    // Se carga la Modalidad en la lista, y se selecciona de manera automática si corresponde a
                    // CRD-CREDITO.
                    //------------------------------------------------------------------------------------------
                    $objListItem = new QListItem($strValue, $intId, $intId == TipoGuiaType::CRDCREDITO);
                    $this->lstModaPago->AddItem($objListItem);
                }
                /*if ($this->blnSoloCred) {
                    //--------------------------------------------------------------------------------------------------
                    // El usuario actual, siendo filiar de un Cliente, el cual solamente tiene autorizado CRD como modo
                    // de pago, se le habilita únicamente dicho modo.
                    //--------------------------------------------------------------------------------------------------
                    if ($intId == 2) {
                        $objListItem = new QListItem($strValue, $intId, true);
                    }
                } else {
                    //------------------------------------------------------------------------------------------
                    // Se carga la Modalidad en la lista, y se selecciona de manera automática si corresponde a
                    // CRD-CREDITO.
                    //------------------------------------------------------------------------------------------
                    $objListItem = new QListItem($strValue, $intId, $intId == TipoGuiaType::CRDCREDITO);
                }*/
            }
        }
    }

    protected function UpdateGuiaFields() {
        if (strlen($this->txtValoDecl->Text) == 0) {
            $this->txtValoDecl->Text = 0;
        }
        $this->objGuia->NumeGuia           = $this->txtNumeGuia->Text;
        $this->objGuia->CodiClie           = $this->objCliente->CodiClie;
        $this->objGuia->FechGuia           = $this->calFechGuia->DateTime;
        $this->objGuia->EstaOrig           = $this->objUsuario->SucursalId;
        $this->objGuia->EstaDest           = $this->lstSucuDest->SelectedValue;
        $this->objGuia->PesoGuia           = $this->strPesoGuia;
        $this->objGuia->NombRemi           = limpiarCadena($this->txtNombRemi->Text);
        $this->objGuia->DireRemi           = substr(limpiarCadena($this->txtDireRemi->Text),0,200);
        $this->objGuia->TeleRemi           = DejarSoloLosNumeros($this->txtTeleRemi->Text);
        $this->objGuia->NombDest           = limpiarCadena($this->txtNombDest->Text);
        $this->objGuia->DireDest           = substr(limpiarCadena($this->txtDireDest->Text),0,200);
        $this->objGuia->CedulaDestinatario = DejarSoloLosNumeros($this->txtCeduDest->Text);
        $this->objGuia->TeleDest           = DejarSoloLosNumeros2($this->txtTeleDest->Text);
        $this->objGuia->CantPiez           = DejarSoloLosNumeros($this->txtCantPiez->Text);
        $this->objGuia->DescCont           = limpiarCadena($this->txtDescCont->Text);
        $this->objGuia->CodiProd           = $this->objProducto->CodiProd;
        $this->objGuia->TipoGuia           = $this->lstModaPago->SelectedValue;
        $this->objGuia->ValorDeclarado     = str_replace(',','.',$this->txtValoDecl->Text);
        $this->objGuia->Asegurado          = $this->chkSeguGuia->Checked;
        $this->objGuia->TieneGuiaRetorno   = $this->chkEnviReto->Checked;
        $this->objGuia->GuiaRetorno        = null;
        $this->objGuia->Observacion        = limpiarCadena($this->txtContReto->Text);
        $this->objGuia->TipoDocumentoId    = $this->lstCeduDest->SelectedValue;
        $this->objGuia->CedulaRif          = limpiarCadena($this->txtCeduDest->Text);
        $this->objGuia->CobroCod           = null;
        $this->objGuia->VendedorId         = $this->objCliente->VendedorId;
        $this->objGuia->TarifaId           = $this->objCliente->TarifaId;
        if (!$this->blnEditMode) {
            //------------------------------------------------------------------------
            // En caso de Insercion, se asignan valores por defecto ciertos campos
            //------------------------------------------------------------------------
            $this->objGuia->PorcentajeIva      = 0;
            $this->objGuia->MontoIva           = 0;
            $this->objGuia->PorcentajeSeguro   = 0;
            $this->objGuia->MontoSeguro        = 0;
            $this->objGuia->MontoBase          = 0;
            $this->objGuia->MontoFranqueo      = 0;
            $this->objGuia->MontoOtros         = 0;
            $this->objGuia->MontoTotal         = 0;
            $this->objGuia->ClienteId          = null;
            $this->objGuia->EntregadoA         = null;
            $this->objGuia->FechaEntrega       = null;
            $this->objGuia->HoraEntrega        = null;
            $this->objGuia->CodiCkpt           = null;
            $this->objGuia->EstaCkpt           = null;
            $this->objGuia->FechCkpt           = null;
            $this->objGuia->HoraCkpt           = null;
            $this->objGuia->ObseCkpt           = null;
            $this->objGuia->UsuaCkpt           = null;
            $this->objGuia->FechaPod           = null;
            $this->objGuia->HoraPod            = null;
            $this->objGuia->UsuarioPod         = null;
            $this->objGuia->CantAyudantes      = 0;
            $this->objGuia->ParadasAdicionales = 0;
            $this->objGuia->GuiaExterna        = null;
            $this->objGuia->CierreCaja         = 0;
            $this->objGuia->CajaId             = null;
            $this->objGuia->ProductoId         = null;
            $this->objGuia->TasaDolar          = null;
            $this->objGuia->VolMaritimoPies    = null;
            $this->objGuia->VolMaritimoMts     = null;
            $this->objGuia->DescripcionGral    = null;
            $this->objGuia->Alto               = null;
            $this->objGuia->Ancho              = null;
            $this->objGuia->Largo              = null;
            $this->objGuia->MontoBaseInt       = 0;
            $this->objGuia->PorcentajeSgroInt  = 0;
            $this->objGuia->MontoSgroInt       = 0;
            $this->objGuia->MontoTotalInt      = 0;
            $this->objGuia->TotalIntLocal      = 0;
            $this->objGuia->PesoVolumetrico    = 0;
            $this->objGuia->PesoLibras         = 0;
            $this->objGuia->HojaEntrega        = null;
            $this->objGuia->RecolectaId        = null;
            $this->objGuia->FleteDirecto       = 0;
            $this->objGuia->TransFac           = 0;
            $this->objGuia->CourierId          = 1;
            $this->objGuia->UsuarioCreacion    = $this->objUsuario->LogiUsua;
            $this->objGuia->FechaCreacion      = new QDateTime(QDateTime::Now);
            $this->objGuia->HoraCreacion       = date("H:i");
            $this->objGuia->SistemaId          = 'con';
            $this->objGuia->Anulada            = 0;
            $this->objGuia->EnEfectivo         = 0;
        }
    }

    protected function CreateAndSaveRecolecta($intCodiOper,$strCodiCkpt,$strContGuia,$intCodiUsua,$strMotiNoco,$dteFechReco) {
        $objDespacho = new DspDespacho();

        $objDespacho->CodiClie = $this->objCliente->CodiClie;
        $objDespacho->CodiOrig = $this->objUsuario->SucursalId;
        $objDespacho->CodiDest = $this->lstSucuDest->SelectedValue;
        $objDespacho->CodiOper = $intCodiOper;
        $objDespacho->NombClie = $this->objCliente->NombClie;
        $objDespacho->DireClie = $this->txtDireRemi->Text;
        $objDespacho->TeleClie = DejarSoloLosNumeros($this->txtTeleRemi->Text);
        $objDespacho->FechRegi = new QDateTime(QDateTime::Now);
        $objDespacho->TipoReco = DspTiporecoType::CONNECT;
        $objDespacho->CodiCkpt = $strCodiCkpt;
        $objDespacho->FechReco = new QDateTime($dteFechReco);
        $objDespacho->HoraList = $this->strHoraTope;
        $objDespacho->HoraDesp = '';
        $objDespacho->HoraEfec = '';
        $objDespacho->HoraCier = '17:00';
        $objDespacho->NombPers = $this->txtNombRemi->Text;
        $objDespacho->TextObse = $strContGuia;
        $objDespacho->FechModi = null;
        $objDespacho->CodiUsua = $intCodiUsua;
        $objDespacho->UsuaModi = null;
        $objDespacho->MotiNoco = $strMotiNoco;
        $objDespacho->PesoEsti = $this->strPesoGuia;
        $objDespacho->CantBult = $this->txtCantPiez->Text;
        $objDespacho->DireMail = $this->objUsuario->Email;
        $objDespacho->NombDest = $this->txtNombDest->Text;
        $objDespacho->TeleDest = DejarSoloLosNumeros2($this->txtTeleDest->Text);
        $objDespacho->DireDest = $this->txtDireDest->Text;
        $objDespacho->ContEnvi = $this->txtDescCont->Text;
        $objDespacho->NotiNoco = 0;

        $objDespacho->Save();

        return $objDespacho;
    }

    protected function RegistrarRecolecta($objGuia) {
        $blnTodoOkey = true;
        $strMensUsua = '';
        $intCodiDesp = 0;
        $dteFechReco = null;
        //------------------------------------------------------------------------
        // Se identifica la Operacion Ficticia asociada a la Sucursal del Usuario
        //------------------------------------------------------------------------
        $objOperSucu = SdeOperacion::OperaciónFictAsociadaASucursalUsuario($this->objUsuario->Sucursal->OperacionId);
        if ($objOperSucu) {
            //--------------------------------------------------------
            // Usuario generico usado para registrar la Recolecta
            //--------------------------------------------------------
            $objUsuaReco = Usuario::LoadByLogiUsua('dispatch');
            //------------------------------------------
            // Checkpoint: Recolecta por Asignar (PA)
            //------------------------------------------
            $objCheckpoint = SdeCheckpoint::LoadByCodiCkpt('PA');
            //-------------------------------------------
            // Motivo de No-Completacion o Realizacion
            //-------------------------------------------
            $objMotivo = DspMotivoNoco::Load('SM');
            //-------------------------------------
            // Se obtiene la fecha de la recolecta
            //-------------------------------------
            $dteFechReco = DspDespacho::LoadFechaRecolecta($this->strHoraTope);
            //---------------------------------------
            // Creo, registro y obtengo la Recolecta
            //---------------------------------------
            $objDespacho = $this->CreateAndSaveRecolecta(
                $objOperSucu->CodiOper,$objCheckpoint->CodiCkpt, $objGuia->DescCont,
                $objUsuaReco->CodiUsua, $objMotivo->MotiNoco, $dteFechReco
            );
            //----------------------------------------
            // Obtengo el código (Id) de la Recolecta
            //----------------------------------------
            $intCodiDesp = $objDespacho->CodiDesp;
        } else {
            $blnTodoOkey = false;
            $strMensUsua = 'No se generó la solicitud de Recolecta para su Envío.';
        }
        //---------------------------------------------------------------------
        // Creo una Clase Genérica para almacenar la información de la rutina.
        //---------------------------------------------------------------------
        $objRecoGuia = new stdClass();
        $objRecoGuia->TodoOkey = $blnTodoOkey;
        $objRecoGuia->MensUsua = $strMensUsua;
        $objRecoGuia->FechReco = $dteFechReco;
        $objRecoGuia->CodiDesp = $intCodiDesp;
        return $objRecoGuia;
    }
}

CargarGuia::Run('CargarGuia');