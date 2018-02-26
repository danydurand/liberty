<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__ . '/FormularioBaseKaizen.class.php');

class MasterClienteEditForm extends FormularioBaseKaizen {
    // Objetos del Formulario //
    /* @var $objUsuaSist Usuario */
    protected $objUsuaSist;
    /* @var $objUsuario Usuario */
    protected $objUsuario;
    /* @var $objMasterCliente MasterCliente */
    protected $objMasterCliente;
    // Parámetros Regulares //
    protected $intCantHist;
    protected $blnEditMode;
    //protected $arrSucuActi;
    // Campos del Formulario //
    protected $txtCodiInte;
    protected $txtBuscCodi;
    protected $txtNombBusc;
    protected $lstCodiDepe;
    protected $txtNombClie;
    protected $chkCodiEsta;
    protected $lstCodiEsta;
    protected $txtDireFisc;
    protected $txtNumeDrif;
    protected $chkVendClie;
    protected $lstVendClie;
    protected $txtEntrFact;
    protected $chkTariClie;
    protected $lstTariClie;
    protected $txtPersCona;
    protected $txtTeleCona;
    protected $txtPersConb;
    protected $txtTeleConb;
    protected $txtDireMail;
    protected $txtDireReco;
    protected $chkRutaReco;
    protected $lstRutaReco;
    protected $chkRutaEntr;
    protected $lstRutaEntr;
    protected $rdbCodiStat;
    protected $rdbEnviPodx;
    protected $lstTipoClie;
    protected $txtPorcSgro;
    protected $rdbStatCred;
    protected $txtClavSweb;
    protected $txtCaduGuia;
    protected $lstMostExte;
    protected $chkCargMasi;
    protected $chkGuiaYama;
    protected $txtGuiaXcar;
    protected $txtGuiaXdia;
    protected $chkDestFrec;
    protected $txtDestXcar;
    protected $txtDestXdia;
    protected $chkPagoPpdx;
    protected $chkPagoCrdx;
    protected $chkPagoCodx;
    protected $chkGuiaReto;
    protected $chkManeApix;
    protected $txtUsuaApix;
    protected $txtPassApix;

    // Boton(es) del Formulario //
    protected $btnLogxCamb;
    protected $btnCargMasi;
    protected $btnMasxAcci;
    protected $btnNuevClie;
    protected $btnDelete;
    protected $chkEsunSubc;
    protected $dtgSubcClie;
    protected $intCantSubc = 0;

    protected $dtePrimGuia;
    protected $dteUltiGuia;
    protected $txtCantGuia;
    protected $txtPesoTota;
    protected $txtVentTota;
    protected $txtTiemEmpr;

    // Botones de Navegacion

    protected $arrDataTabl;
    protected $intCantRegi;
    protected $intPosiRegi;
    protected $btnPrimRegi;
    protected $btnRegiAnte;
    protected $btnProxRegi;
    protected $btnUltiRegi;

    protected $btnPrimSmal;
    protected $btnAnteSmal;
    protected $btnProxSmal;
    protected $btnUltiSmal;


    protected function ClienteSetup() {
        $intCodiClie = QApplication::PathInfo(0);
        if ($intCodiClie) {
            $this->objMasterCliente = MasterCliente::Load($intCodiClie);
            if (!$this->objMasterCliente) {
                throw new Exception('Could not find a MasterCliente object with PK arguments: ' . $intCodiClie);
            }
            $this->blnEditMode = true;
        } else {
            $this->objMasterCliente = new MasterCliente();
            $this->blnEditMode = false;
        }
    }

	protected function Form_Create() {
		parent::Form_Create();

        $this->ClienteSetup();
        $this->determinarPosicion();

        $this->objUsuaSist = Usuario::LoadByLogiUsua('liberty');

        $this->lblTituForm->Text  = 'Cliente ';
        $this->lblTituForm->Text .= '('.$this->intPosiRegi.'/'.$this->intCantRegi.')';

        $this->txtCodiInte_Create();
        $this->chkEsunSubc_Create();
        $this->txtBuscCodi_Create();
        $this->txtNombBusc_Create();
        $this->lstCodiDepe_Create();
        $this->txtNombClie_Create();
        $this->chkCodiEsta_Create();
        $this->lstCodiEsta_Create();
        $this->txtDireFisc_Create();
        $this->txtNumeDrif_Create();

        $this->chkVendClie_Create();
        $this->lstVendClie_Create();
        $this->txtEntrFact_Create();
        $this->chkTariClie_Create();
        $this->lstTariClie_Create();
        $this->txtPersCona_Create();
        $this->txtTeleCona_Create();
        $this->txtPersConb_Create();
        $this->txtTeleConb_Create();
        $this->txtDireMail_Create();

        $this->txtDireReco_Create();
		$this->chkRutaReco_Create();
		$this->lstRutaReco_Create();
        $this->chkRutaEntr_Create();
        $this->lstRutaEntr_Create();
        $this->rdbCodiStat_Create();
        $this->rdbEnviPodx_Create();
        $this->lstTipoClie_Create();

        $this->txtPorcSgro_Create();
        $this->rdbStatCred_Create();
        $this->txtClavSweb_Create();
        $this->txtCaduGuia_Create();
        $this->lstMostExte_Create();
        $this->chkCargMasi_Create();

        $this->chkGuiaYama_Create();
        $this->txtGuiaXcar_Create();
        $this->txtGuiaXdia_Create();
        $this->chkDestFrec_Create();
        $this->txtDestXcar_Create();
        $this->txtDestXdia_Create();
        $this->chkPagoPpdx_Create();
        $this->chkPagoCrdx_Create();
        $this->chkPagoCodx_Create();
        $this->chkGuiaReto_Create();
        $this->chkManeApix_Create();
        $this->txtUsuaApix_Create();
        $this->txtPassApix_Create();

        $this->dtePrimGuia_Create();
        $this->dteUltiGuia_Create();
        $this->txtCantGuia_Create();
        $this->txtPesoTota_Create();
        $this->txtVentTota_Create();
        $this->txtTiemEmpr_Create();

        $this->btnNuevClie_Create();

        //------------------------
        // Botónes de Navegacion
        //------------------------
        $this->btnProxRegi_Create();
        $this->btnRegiAnte_Create();
        $this->btnPrimRegi_Create();
        $this->btnUltiRegi_Create();

        $this->btnPrimSmal_Create();
        $this->btnAnteSmal_Create();
        $this->btnProxSmal_Create();
        $this->btnUltiSmal_Create();

        $this->verificarNavegacion();

        $this->btnSave->Text = TextoIcono('cogs','Guardar','F','fa-lg');
        //$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
        $this->btnDelete_Create();
        $this->btnCargMasi_Create();

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::MasterCliente()->CodiDepe,$this->objMasterCliente->CodiClie);
        $this->intCantSubc = MasterCliente::QueryCount(QQ::AndCondition($objClauWher));

        $this->dtgSubcClie_Create();

        if ($this->blnEditMode) {
            $objInfoEsta = EstadisticaDeClientes::LoadByClienteId($this->objMasterCliente->CodiClie);
            if ($objInfoEsta) {
                $dtePrimFech                 = date_create($objInfoEsta->FechaPrimeraGuia);
                $dteUltiFech                 = date_create($objInfoEsta->FechaUltimaGuia);
                $this->dtePrimGuia->DateTime = $objInfoEsta->FechaPrimeraGuia;
                $this->dteUltiGuia->DateTime = $objInfoEsta->FechaUltimaGuia;
                $this->txtCantGuia->Text     = $objInfoEsta->CantidadGuias;
                $this->txtPesoTota->Text     = $objInfoEsta->PesoTotal;
                $this->txtVentTota->Text     = $objInfoEsta->VentaTotal;
                $this->txtTiemEmpr->Text     = date_diff($dteUltiFech,$dtePrimFech)->format('%y Año(s) %m Mese(s) %d Día(s)');
            } else {
                $this->dtePrimGuia->DateTime = null;
                $this->dteUltiGuia->DateTime = null;
                $this->txtCantGuia->Text     = '';
                $this->txtPesoTota->Text     = '';
                $this->txtVentTota->Text     = ''; 
                $this->txtTiemEmpr->Text     = ''; 
            }

            // Variable de Sesión que contiene la data del Cliente para la carga de Sub-cuentas.
            //$_SESSION['MastClie'] = serialize($this->mctMasterCliente->MasterCliente);
            // Variables de sesión requeridas para el histórico.
            $_SESSION['RegiRefe'] = $this->objMasterCliente->CodiClie;
            $_SESSION['TablRefe'] = 'MasterCliente';
            $_SESSION['RegiReto'] = 'master_cliente_edit.php/'.$this->objMasterCliente->CodiClie;
            //----------------------------------------------------------------
            // Cantidad de Históricos existentes por Tabla y por Referencia.
            //----------------------------------------------------------------
            $this->intCantHist = Log::CountByTablaRef('MasterCliente',$this->objMasterCliente->CodiClie);
            //---------------------
            // Eventos Checkbox
            //---------------------
            $this->chkGuiaYama_Change();
            $this->chkDestFrec_Change();
            $this->chkManeApix_Change();
            if (!is_null($this->lstCodiDepe->SelectedValue) && $this->lstCodiDepe->SelectedValue != 4) {
                //-----------------------------------------------------------------------------------
                // Si el registro es una SubCuenta, se muestran los campos de busqueda del Clientes
                // y el listbox de seleccion
                //-----------------------------------------------------------------------------------
                $this->txtBuscCodi->Visible = true;
                $this->txtNombBusc->Visible = true;
                $this->lstCodiDepe->Visible = true;
            } else {
                $this->txtBuscCodi->Visible = false;
                $this->txtNombBusc->Visible = false;
                $this->lstCodiDepe->Visible = false;
            }
        } else {
            $this->txtBuscCodi->Visible = false;
            $this->txtNombBusc->Visible = false;
            $this->lstCodiDepe->Visible = false;
            $strTextMens = 'Si deja el Código en blanco, el Sistema asignará el próximo consecutivo disponible';
            $this->mensaje($strTextMens,'m','i','',__iINFO__);
        }

        $this->btnMasxAcci_Create();
        $this->txtCodiInte->SetFocus();
	}

	//----------------------------
	// Aquí se Crean los Objetos 
	//----------------------------

    protected function btnProxRegi_Create() {
        $this->btnProxRegi = new QButton($this);
        $this->btnProxRegi->Text = TextoIcono('angle-right fa-lg','Proximo','P');
        $this->btnProxRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnProxRegi->HtmlEntities = false;
        $this->btnProxRegi->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnRegiAnte_Create() {
        $this->btnRegiAnte = new QButton($this);
        $this->btnRegiAnte->Text = TextoIcono('angle-left fa-lg','Anterior');
        $this->btnRegiAnte->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnRegiAnte->HtmlEntities = false;
        $this->btnRegiAnte->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnPrimRegi_Create() {
        $this->btnPrimRegi = new QButton($this);
        $this->btnPrimRegi->Text = TextoIcono('angle-double-left fa-lg','Primero');
        $this->btnPrimRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnPrimRegi->HtmlEntities = false;
        $this->btnPrimRegi->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnUltiRegi_Create() {
        $this->btnUltiRegi = new QButton($this);
        $this->btnUltiRegi->Text = TextoIcono('angle-double-right fa-lg','Ultimo','P');
        $this->btnUltiRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnUltiRegi->HtmlEntities = false;
        $this->btnUltiRegi->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
    }

    // ---- Botónes de Navegación Pequeños ---- //

    protected function btnPrimSmal_Create() {
        $this->btnPrimSmal = new QButton($this);
        $this->btnPrimSmal->Text = TextoIcono('angle-double-left fa-lg','');
        $this->btnPrimSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnPrimSmal->HtmlEntities = false;
        $this->btnPrimSmal->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnAnteSmal_Create() {
        $this->btnAnteSmal = new QButton($this);
        $this->btnAnteSmal->Text = TextoIcono('angle-left fa-lg','');
        $this->btnAnteSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnAnteSmal->HtmlEntities = false;
        $this->btnAnteSmal->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnProxSmal_Create() {
        $this->btnProxSmal = new QButton($this);
        $this->btnProxSmal->Text = TextoIcono('angle-right fa-lg','');
        $this->btnProxSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnProxSmal->HtmlEntities = false;
        $this->btnProxSmal->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnUltiSmal_Create() {
        $this->btnUltiSmal = new QButton($this);
        $this->btnUltiSmal->Text = TextoIcono('angle-double-right fa-lg','');
        $this->btnUltiSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnUltiSmal->HtmlEntities = false;
        $this->btnUltiSmal->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
    }


    protected function dtePrimGuia_Create() {
        $this->dtePrimGuia = new QCalendar($this);
        $this->dtePrimGuia->Name = 'Fecha 1era Guia';
        $this->dtePrimGuia->Enabled = false;
        $this->dtePrimGuia->ForeColor = 'blue';
    }

    protected function dteUltiGuia_Create() {
        $this->dteUltiGuia = new QCalendar($this);
        $this->dteUltiGuia->Name = 'Fecha Ultima Guia';
        $this->dteUltiGuia->Enabled = false;
        $this->dteUltiGuia->ForeColor = 'blue';
    }

    protected function txtCantGuia_Create() {
        $this->txtCantGuia = new QTextBox($this);
        $this->txtCantGuia->Name = 'Cant. Total de Guías';
        $this->txtCantGuia->Enabled = false;
        $this->txtCantGuia->ForeColor = 'blue';
    }

    protected function txtPesoTota_Create() {
        $this->txtPesoTota = new QTextBox($this);
        $this->txtPesoTota->Name = 'Peso Total';
        $this->txtPesoTota->Enabled = false;
        $this->txtPesoTota->ForeColor = 'blue';
    }

    protected function txtVentTota_Create() {
        $this->txtVentTota = new QTextBox($this);
        $this->txtVentTota->Name = 'Venta Total';
        $this->txtVentTota->Enabled = false;
        $this->txtVentTota->ForeColor = 'blue';
    }

    protected function txtTiemEmpr_Create() {
        $this->txtTiemEmpr = new QTextBox($this);
        $this->txtTiemEmpr->Name = 'Tiempo en la Empresa';
        $this->txtTiemEmpr->Width = 250;
        $this->txtTiemEmpr->Enabled = false;
        $this->txtTiemEmpr->ForeColor = 'blue';
    }

    protected function dtgSubcClie_Create() {
        // Instantiate the Meta DataGrid
        $this->dtgSubcClie = new MasterClienteDataGrid($this);
        $this->dtgSubcClie->FontSize = 13;
        $this->dtgSubcClie->ShowFilter = false;

        // $this->dtgSubcClie->AdditionalConditions = QQ::Equal(QQN::MasterCliente()->CodiDepe,$this->objMasterCliente->CodiClie);

        // Style the DataGrid (if desired)
        $this->dtgSubcClie->CssClass = 'datagrid';
        $this->dtgSubcClie->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgSubcClie->Paginator = new QPaginator($this->dtgSubcClie);
        $this->dtgSubcClie->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgSubcClie->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgSubcClie->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgSubcClie->RowActionParameterHtml = '<?= $_ITEM->CodiClie ?>';
        $this->dtgSubcClie->AddRowAction(new QClickEvent(), new QAjaxAction('dtgSubcClieRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for master_cliente's properties, or you
        // can traverse down QQN::master_cliente() to display fields that are down the hierarchy)

        $colCodiClie = $this->dtgSubcClie->MetaAddColumn('CodigoInterno');
        $colCodiClie->Name = 'Codigo';
        $colCodiClie->Width = 85;

        $colNombClie = $this->dtgSubcClie->MetaAddColumn('NombClie');
        $colNombClie->Name = 'Nombre del Cliente';
        $colNombClie->Width = 400;

        $colSucuClie = $this->dtgSubcClie->MetaAddColumn(QQN::MasterCliente()->CodiEsta);
        $colSucuClie->Name = 'Suc';
        $colSucuClie->Width = 100;

        $colPersCona = $this->dtgSubcClie->MetaAddColumn('PersCona');
        $colPersCona->Name = 'Contacto';
        $colPersCona->Width = 200;

        $colTeleCona = $this->dtgSubcClie->MetaAddColumn('TeleCona');
        $colTeleCona->Name = 'Teléfono';
        $colTeleCona->Width = 250;

        $this->dtgSubcClie->MetaAddTypeColumn('CodiStat', 'StatusType');

        $this->dtgSubcClie->SetDataBinder('dtgSubcClie_Bind');

    }

    public function dtgSubcClieRow_Click($strFormId, $strControlId, $strParameter) {
        $intCodiClie = intval($strParameter);
        QApplication::Redirect(__SIST__."/master_cliente_edit.php/$intCodiClie");
    }

    protected function dtgSubcClie_Bind() {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::MasterCliente()->CodiDepe,$this->objMasterCliente->CodiClie);
        $this->dtgSubcClie->TotalItemCount = MasterCliente::QueryCount(QQ::AndCondition($objClauWher));
        $this->dtgSubcClie->DataSource = MasterCliente::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgSubcClie->OrderByClause, $this->dtgSubcClie->LimitClause)
        );
    }

    protected function txtCodiInte_Create() {
        $this->txtCodiInte = new QTextBox($this);
        $this->txtCodiInte->Name = 'Código';
        //$this->txtCodiInte->Required = true;
        $this->txtCodiInte->Width = 150;
        $this->txtCodiInte->Text = '';
        if ($this->blnEditMode){
            $this->txtCodiInte->Text = $this->objMasterCliente->CodigoInterno;
        }
        $this->txtCodiInte->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function chkEsunSubc_Create() {
        $this->chkEsunSubc = new QCheckBox($this);
        $this->chkEsunSubc->Name = 'Es una Sub-Cuenta ?';
        $this->chkEsunSubc->AddAction(new QChangeEvent(), new QAjaxAction('chkEsunSubc_Change'));
    }

    protected function txtBuscCodi_Create() {
        $this->txtBuscCodi = new QTextBox($this);
        $this->txtBuscCodi->Name = 'Buscar Cuenta Padre x Código';
        $this->txtBuscCodi->Width = 150;
        $this->txtBuscCodi->Placeholder = 'Codigo Cuenta Padre';
        $this->txtBuscCodi->AddAction(new QBlurEvent(), new QAjaxAction('txtBuscCodi_Blur'));
    }

    protected function txtNombBusc_Create() {
        $this->txtNombBusc = new QTextBox($this);
        $this->txtNombBusc->Name = 'Buscar Cuenta Padre x Nombre';
        $this->txtNombBusc->Width = 180;
        $this->txtNombBusc->Placeholder = 'Nombre Cuenta Padre';
        $this->txtNombBusc->AddAction(new QBlurEvent(), new QAjaxAction('txtNombBusc_Blur'));
    }

    protected function lstCodiDepe_Create() {
        $this->lstCodiDepe = new QListBox($this);
        $this->lstCodiDepe->Name = 'Seleccione la Cuenta Padre';
        $this->lstCodiDepe->Width = 200;
        //$this->lstCodiDepe->Required = true;
        if ($this->blnEditMode) {
            if (!is_null($this->objMasterCliente->CodiDepe)) {
                $objClieDepe = MasterCliente::Load($this->objMasterCliente->CodiDepe);
                if ($objClieDepe) {
                    $this->lstCodiDepe->AddItem($objClieDepe->__toString(), $objClieDepe->CodiClie, true);
                }
            }
        } else {
            $this->lstCodiDepe->AddItem('- Seleccione Uno -', null);
        }
    }

    protected function txtNombClie_Create() {
        $this->txtNombClie = new QTextBox($this);
        $this->txtNombClie->Name = 'Nombre o Razón Social';
        $this->txtNombClie->Width = 200;
        $this->txtNombClie->Required = true;
        if ($this->blnEditMode) {
            $this->txtNombClie->Text = $this->objMasterCliente->NombClie;
        }
        $this->txtNombClie->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function chkCodiEsta_Create() {
        $this->chkCodiEsta = new QCheckBox($this);
        $this->chkCodiEsta->Checked = false;
        if ($this->blnEditMode) {
            $this->chkCodiEsta->Name = "Desea cambiar la Sucursal ?";
        } else {
            $this->chkCodiEsta->Name = "Desea especificar la Sucursal ?";
        }
        $this->chkCodiEsta->AddAction(new QChangeEvent(), new QAjaxAction('chkCodiEsta_Change'));
    }

    protected function lstCodiEsta_Create() {
        $this->lstCodiEsta = new QListBox($this);
        $this->lstCodiEsta->Name = 'Sucursal';
        $this->lstCodiEsta->Required = true;
        $this->lstCodiEsta->Width = 200;
        if ($this->blnEditMode) {
            $objSucuClie = Estacion::Load($this->objMasterCliente->CodiEsta);
            if ($objSucuClie) {
                $this->lstCodiEsta->AddItem($objSucuClie->__toString(), $objSucuClie->CodiEsta, true);
            }
        }
    }

    protected function txtDireFisc_Create() {
        $this->txtDireFisc = new QTextBox($this);
        $this->txtDireFisc->Name = 'Dirección Fiscal';
        $this->txtDireFisc->Required = true;
        $this->txtDireFisc->TextMode = QTextMode::MultiLine;
        $this->txtDireFisc->Width = 250;
        $this->txtDireFisc->Height = 80;
        if ($this->blnEditMode) {
            $this->txtDireFisc->Text = $this->objMasterCliente->DireFisc;
        }
        $this->txtDireFisc->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtNumeDrif_Create() {
        $this->txtNumeDrif = new QTextBox($this);
        $this->txtNumeDrif->Name = 'Número de RIF';
        $this->txtNumeDrif->Required = true;
        if ($this->blnEditMode) {
            $this->txtNumeDrif->Text = $this->objMasterCliente->NumeDrif;
        }
        $this->txtNumeDrif->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function chkVendClie_Create() {
        $this->chkVendClie = new QCheckBox($this);
        $this->chkVendClie->Checked = false;
        if ($this->blnEditMode) {
            $this->chkVendClie->Name = "Desea cambiar el Vendedor ?";
        } else {
            $this->chkVendClie->Name = "Desea especificar el Vendedor ?";
        }
        $this->chkVendClie->AddAction(new QChangeEvent(), new QAjaxAction('chkVendClie_Change'));
    }

    protected function lstVendClie_Create() {
        $this->lstVendClie = new QListBox($this);
        $this->lstVendClie->Name = 'Vendedor';
        $this->lstVendClie->Required = true;
        if ($this->blnEditMode) {
            if (!is_null($this->objMasterCliente->VendedorId)) {
                $objVendedor = FacVendedor::Load($this->objMasterCliente->VendedorId);
                if ($objVendedor) {
                    $this->lstVendClie->AddItem($objVendedor->__toString(), $objVendedor->Id, true);
                }
            }
        } else {
            $this->lstVendClie->AddItem('- Seleccione Uno -', null);
        }
    }

    protected function txtEntrFact_Create() {
        $this->txtEntrFact = new QTextBox($this);
        $this->txtEntrFact->Name = 'Dirección de Facturación';
        $this->txtEntrFact->Required = true;
        $this->txtEntrFact->TextMode = QTextMode::MultiLine;
        $this->txtEntrFact->Width = 250;
        $this->txtEntrFact->Height = 80;
        if ($this->blnEditMode) {
            $this->txtEntrFact->Text = $this->objMasterCliente->DirEntregaFactura;
        }
        $this->txtEntrFact->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function chkTariClie_Create() {
        $this->chkTariClie = new QCheckBox($this);
        $this->chkTariClie->Checked = false;
        if ($this->blnEditMode) {
            $this->chkTariClie->Name = "Desea cambiar la Tarifa ?";
        } else {
            $this->chkTariClie->Name = "Desea especificar la Tarifa ?";
        }
        $this->chkTariClie->AddAction(new QChangeEvent(), new QAjaxAction('chkTariClie_Change'));
    }

    protected function lstTariClie_Create() {
        $this->lstTariClie = new QListBox($this);
        $this->lstTariClie->Name = 'Tarifa';
        $this->lstTariClie->Required = true;
        if ($this->blnEditMode) {
            if (!is_null($this->objMasterCliente->TarifaId)) {
                $objTarifa = FacTarifa::Load($this->objMasterCliente->TarifaId);
                if ($objTarifa) {
                    $this->lstTariClie->AddItem($objTarifa->__toString(), $objTarifa->Id, true);
                }
            }
        } else {
            $this->lstTariClie->AddItem('- Seleccione Una -', null);
        }
    }

    protected function txtPersCona_Create() {
        $this->txtPersCona = new QTextBox($this);
        $this->txtPersCona->Name = 'Persona Contacto';
        $this->txtPersCona->Required = true;
        if ($this->blnEditMode) {
            $this->txtPersCona->Text = $this->objMasterCliente->PersCona;
        }
        $this->txtPersCona->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtTeleCona_Create() {
        $this->txtTeleCona = new QTextBox($this);
        $this->txtTeleCona->Name = 'Telefono Del Contacto';
        $this->txtTeleCona->Required = true;
        if ($this->blnEditMode) {
            $this->txtTeleCona->Text = $this->objMasterCliente->TeleCona;
        }
        $this->txtTeleCona->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtPersConb_Create() {
        $this->txtPersConb = new QTextBox($this);
        $this->txtPersConb->Name = 'Otra Persona Contacto';
        if ($this->blnEditMode) {
            $this->txtPersConb->Text = $this->objMasterCliente->PersConb;
        }
        $this->txtPersConb->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtTeleConb_Create() {
        $this->txtTeleConb = new QTextBox($this);
        $this->txtTeleConb->Name = 'Telefono Del Contacto';
        if ($this->blnEditMode) {
            $this->txtTeleConb->Text = $this->objMasterCliente->TeleConb;
        }
        $this->txtTeleConb->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtDireMail_Create() {
        $this->txtDireMail = new QTextBox($this);
        $this->txtDireMail->Name = 'Correo Electronico';
        $this->txtDireMail->Width = 250;
        if ($this->blnEditMode) {
            $this->txtDireMail->Text = $this->objMasterCliente->DireMail;
        }
        $this->txtDireMail->SetCustomAttribute('onblur',"this.value=this.value.toLowerCase()");
    }

    protected function txtDireReco_Create() {
        $this->txtDireReco = new QTextBox($this);
        $this->txtDireReco->Name = 'Dirección de Recolecta';
        $this->txtDireReco->TextMode = QTextMode::MultiLine;
        $this->txtDireReco->Width = 250;
        $this->txtDireReco->Height = 80;
        if ($this->blnEditMode) {
            $this->txtDireReco->Text = $this->objMasterCliente->DireReco;
        }
        $this->txtDireReco->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function chkRutaReco_Create() {
        $this->chkRutaReco = new QCheckBox($this);
        $this->chkRutaReco->Checked = false;
        if ($this->blnEditMode) {
            $this->chkRutaReco->Name = "Desea cambiar la Ruta de Recolecta ?";
        } else {
            $this->chkRutaReco->Name = "Desea especificar la Ruta de Recol. ?";
        }
        $this->chkRutaReco->AddAction(new QChangeEvent(), new QAjaxAction('chkRutaReco_Change'));
    }

    protected function lstRutaReco_Create() {
        $this->lstRutaReco = new QListBox($this);
        $this->lstRutaReco->Name = 'Ruta Recolecta';
        $this->lstRutaReco->Width = 200;
        if ($this->blnEditMode) {
            if (!is_null($this->objMasterCliente->RutaRecolecta)) {
                $objOperacion = SdeOperacion::Load($this->objMasterCliente->RutaRecolecta);
                if ($objOperacion) {
                    $this->lstRutaReco->AddItem($objOperacion->__toString(), $objOperacion->CodiOper, true);
                }
            }
        } else {
            $this->lstRutaReco->AddItem('- Seleccione Una -', null);
        }
    }

    protected function chkRutaEntr_Create() {
        $this->chkRutaEntr = new QCheckBox($this);
        $this->chkRutaEntr->Checked = false;
        if ($this->blnEditMode) {
            $this->chkRutaEntr->Name = "Desea cambiar la Ruta de Entrega ?";
        } else {
            $this->chkRutaEntr->Name = "Desea especificar la Ruta de Entr. ?";
        }
        $this->chkRutaEntr->AddAction(new QChangeEvent(), new QAjaxAction('chkRutaEntr_Change'));
    }

    protected function lstRutaEntr_Create() {
        $this->lstRutaEntr = new QListBox($this);
        $this->lstRutaEntr->Name = 'Ruta Entrega';
        $this->lstRutaEntr->Width = 200;
        if ($this->blnEditMode) {
            if (!is_null($this->objMasterCliente->RutaEntrega)) {
                $objOperacion = SdeOperacion::Load($this->objMasterCliente->RutaEntrega);
                if ($objOperacion) {
                    $this->lstRutaEntr->AddItem($objOperacion->__toString(), $objOperacion->CodiOper, true);
                }
            }
        } else {
            $this->lstRutaEntr->AddItem('- Seleccione Una -', null);
        }
    }

    protected function rdbCodiStat_Create() {
        $this->rdbCodiStat = new QRadioButtonList($this);
        $this->rdbCodiStat->Name = QApplication::Translate('Estatus');
        $this->rdbCodiStat->Required = true;
        $this->rdbCodiStat->HtmlEntities = false;
        $this->rdbCodiStat->RepeatColumns = 2;
        foreach (StatusType::$NameArray as $intId => $strValue) {
            $blnSeleRegi = false;
            if (!$this->blnEditMode) {
                //------------------------------------------------------------------
                // En modo insercion, el Status "ACTIVO" debe aparecer por defecto
                //------------------------------------------------------------------
                if ($intId == StatusType::ACTIVO) {
                    $blnSeleRegi = true;
                }
            } else {
                if ($intId == $this->objMasterCliente->CodiStat) {
                    $blnSeleRegi = true;
                }
            }
            $this->rdbCodiStat->AddItem(new QListItem("&nbsp;$strValue&nbsp;&nbsp;", $intId, $blnSeleRegi));
        }
    }

    protected function rdbEnviPodx_Create() {
        $this->rdbEnviPodx = new QRadioButtonList($this);
        $this->rdbEnviPodx->Name = QApplication::Translate('Enviar POD ?');
        $this->rdbEnviPodx->Required = true;
        $this->rdbEnviPodx->HtmlEntities = false;
        $this->rdbEnviPodx->RepeatColumns = 2;
        foreach (SinoType::$NameArray as $intId => $strValue) {
            if ($this->blnEditMode) {
                $this->rdbEnviPodx->AddItem(new QListItem("&nbsp;$strValue&nbsp;&nbsp;", $intId, $this->objMasterCliente->CodiSino == $intId));
            } else {
                $this->rdbEnviPodx->AddItem(new QListItem("&nbsp;$strValue&nbsp;&nbsp;", $intId));
            }
        }
    }

    protected function lstTipoClie_Create() {
        $this->lstTipoClie = new QListBox($this);
        $this->lstTipoClie->Name = QApplication::Translate('Tipo de Cliente');
        $this->lstTipoClie->Required = true;
        foreach (TipoClienteType::$NameArray as $intId => $strValue) {
            if ($this->blnEditMode) {
                $this->lstTipoClie->AddItem(new QListItem($strValue, $intId, $this->objMasterCliente->TipoCliente == $intId));
            } else {
                $this->lstTipoClie->AddItem(new QListItem($strValue, $intId));
            }
        }
    }

    protected function txtPorcSgro_Create() {
        $this->txtPorcSgro = new QTextBox($this);
        $this->txtPorcSgro->Name = 'Porcentaje de Seguro';
        if ($this->blnEditMode) {
            $this->txtPorcSgro->Text = $this->objMasterCliente->PorcentajeSeguro;
        }
    }

    protected function rdbStatCred_Create() {
        $this->rdbStatCred = new QRadioButtonList($this);
        $this->rdbStatCred->Name = QApplication::Translate('Status Credito');
        $this->rdbStatCred->Required = true;
        $this->rdbStatCred->HtmlEntities = false;
        $this->rdbStatCred->RepeatColumns = 2;
        foreach (StatusCreditoType::$NameArray as $intId => $strValue)
            if ($this->blnEditMode) {
                $this->rdbStatCred->AddItem(new QListItem("&nbsp;$strValue&nbsp;&nbsp;", $intId, $this->objMasterCliente->StatusCreditoId == $intId));
            } else {
                $this->rdbStatCred->AddItem(new QListItem("&nbsp;$strValue&nbsp;&nbsp;", $intId));
            }
    }

    protected function txtClavSweb_Create() {
        $this->txtClavSweb = new QTextBox($this);
        $this->txtClavSweb->Name = 'Clave de Servicios Web';
        if ($this->blnEditMode) {
            $this->txtClavSweb->Text = $this->objMasterCliente->ClaveServiciosWeb;
        }
    }

    protected function txtCaduGuia_Create() {
        $this->txtCaduGuia = new QTextBox($this);
        $this->txtCaduGuia->Name = 'Caducidad de Guías NR/PR (En Blanco = 3 dias)';
        $this->txtCaduGuia->Width = 50;
        if ($this->blnEditMode) {
            $this->txtCaduGuia->Text = $this->objMasterCliente->CaducidadDeGuias;
        }
    }

    protected function lstMostExte_Create() {
        $this->lstMostExte = new QListBox($this);
        $this->lstMostExte->Name = QApplication::Translate('Mostrar Guia Externa ?');
        $this->lstMostExte->Required = true;
        foreach (SinoType::$NameArray as $intId => $strValue)
            if ($this->blnEditMode) {
                $this->lstMostExte->AddItem(new QListItem($strValue, $intId, $this->objMasterCliente->MostrarGuiaExterna == $intId));
            } else {
                $this->lstMostExte->AddItem(new QListItem($strValue, $intId));
            }
    }

    protected function chkCargMasi_Create() {
        $this->chkCargMasi = new QCheckBox($this);
        $this->chkCargMasi->Name = QApplication::Translate('Carga Masiva ?');
        if ($this->blnEditMode) {
            $this->chkCargMasi->Checked = $this->objMasterCliente->CargaMasiva;
        }
    }

    protected function chkGuiaYama_Create() {
        $this->chkGuiaYama = new QCheckBox($this);
        $this->chkGuiaYama->Name = 'Carga Masiva de Guías ?';
        if ($this->blnEditMode) {
            $this->chkGuiaYama->Checked = $this->objMasterCliente->CmGuiasYamaguchi;
        }
        $this->chkGuiaYama->AddAction(new QChangeEvent(), new QAjaxAction('chkGuiaYama_Change'));
    }

    protected function txtGuiaXcar_Create() {
        $this->txtGuiaXcar = new QIntegerTextBox($this);
        $this->txtGuiaXcar->Name = 'Cantidad de Guías por Carga';
        $this->txtGuiaXcar->Width = 30;
        $this->txtGuiaXcar->Visible = false;
        $this->txtGuiaXcar->Text = '';
        if ($this->blnEditMode){
            $this->txtGuiaXcar->Text = $this->objMasterCliente->GuiasYamaguchiPorCarga;
        }
    }

    protected function txtGuiaXdia_Create() {
        $this->txtGuiaXdia = new QIntegerTextBox($this);
        $this->txtGuiaXdia->Name = 'Cantidad de Guías por Día';
        $this->txtGuiaXdia->Width = 70;
        $this->txtGuiaXdia->Visible = false;
        $this->txtGuiaXdia->Text = '';
        if ($this->blnEditMode){
            $this->txtGuiaXdia->Text = $this->objMasterCliente->GuiasYamaguchiPorDia;
        }
    }

    protected function chkDestFrec_Create() {
        $this->chkDestFrec = new QCheckBox($this);
        $this->chkDestFrec->Name = 'Carga Masiva de Destinatarios Frecuentes ?';
        if ($this->blnEditMode) {
            $this->chkDestFrec->Checked = $this->objMasterCliente->CmDestinatarioFrecuente;
        }
        $this->chkDestFrec->AddAction(new QChangeEvent(), new QAjaxAction('chkDestFrec_Change'));
    }

    protected function txtDestXcar_Create() {
        $this->txtDestXcar = new QIntegerTextBox($this);
        $this->txtDestXcar->Name = 'Cantidad de Clientes por Carga';
        $this->txtDestXcar->Width = 30;
        $this->txtDestXcar->Visible = false;
        $this->txtDestXcar->Text = '';
        if ($this->blnEditMode){
            $this->txtDestXcar->Text = $this->objMasterCliente->ClientesPorCarga;
        }
    }

    protected function txtDestXdia_Create() {
        $this->txtDestXdia = new QIntegerTextBox($this);
        $this->txtDestXdia->Name = 'Cantidad de Clientes por Día';
        $this->txtDestXdia->Width = 30;
        $this->txtDestXdia->Text = '';
        $this->txtDestXdia->Visible = false;
        if ($this->blnEditMode){
            $this->txtDestXdia->Text = $this->objMasterCliente->ClientesPorDia;
        }
    }

    protected function chkPagoPpdx_Create() {
        $this->chkPagoPpdx = new QCheckBox($this);
        $this->chkPagoPpdx->Name = 'Pago PPD ?';
        if ($this->blnEditMode) {
            $this->chkPagoPpdx->Checked = $this->objMasterCliente->PagoPpd;
        }
    }

    protected function chkPagoCrdx_Create() {
        $this->chkPagoCrdx = new QCheckBox($this);
        $this->chkPagoCrdx->Name = 'Pago CRD ?';
        if ($this->blnEditMode) {
            $this->chkPagoCrdx->Checked = $this->objMasterCliente->PagoCrd;
        }
    }

    protected function chkPagoCodx_Create() {
        $this->chkPagoCodx = new QCheckBox($this);
        $this->chkPagoCodx->Name = 'Pago COD ?';
        if ($this->blnEditMode) {
            $this->chkPagoCodx->Checked = $this->objMasterCliente->PagoCod;
        }
    }

    protected function chkGuiaReto_Create() {
        $this->chkGuiaReto = new QCheckBox($this);
        $this->chkGuiaReto->Name = 'Guía Retorno ?';
        if ($this->blnEditMode) {
            $this->chkGuiaReto->Checked = $this->objMasterCliente->GuiaRetorno;
        }
    }

    protected function chkManeApix_Create() {
        $this->chkManeApix = new QCheckBox($this);
        $this->chkManeApix->Name = 'Maneja API ?';
        if ($this->blnEditMode) {
            $this->chkManeApix->Checked = $this->objMasterCliente->ManejaApi;
        }
        $this->chkManeApix->AddAction(new QChangeEvent(), new QAjaxAction('chkManeApix_Change'));
    }

    protected function txtUsuaApix_Create() {
        $this->txtUsuaApix = new QTextBox($this);
        $this->txtUsuaApix->Name = 'Usuario API';
        $this->txtUsuaApix->Width = 100;
        $this->txtUsuaApix->Text = '';
        $this->txtUsuaApix->Visible = false;
        if ($this->blnEditMode){
            $this->txtUsuaApix->Text = $this->objMasterCliente->UsuarioApi;
        }
    }

    protected function txtPassApix_Create() {
        $this->txtPassApix = new QTextBox($this);
        $this->txtPassApix->Name = 'Password API';
        $this->txtPassApix->Width = 100;
        // $this->txtPassApix->TextMode = QTextMode::Password;
        $this->txtPassApix->Text = '';
        $this->txtPassApix->Visible = false;
        if ($this->blnEditMode){
            $this->txtPassApix->Text = $this->objMasterCliente->PasswordApi;
        }
    }

    protected function btnDelete_Create() {
        $this->btnDelete = new QButton($this);
        $this->btnDelete->Text = TextoIcono('trash-o','Borrar','F','fa-lg');
        $this->btnDelete->CssClass = 'btn btn-danger btn-sm';
        $this->btnDelete->HtmlEntities = false;
        $strMensConf = 'Está seguro que desea BORRAR este Cliente ?';
        $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction($strMensConf));
        $this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
        $this->btnDelete->Visible = $this->blnEditMode;
    }

    protected function btnNuevClie_Create() {
        $this->btnNuevClie = new QButton($this);
        $this->btnNuevClie->Text = TextoIcono('plus-circle','Crear','','fa-lg');;
        $this->btnNuevClie->CssClass = 'btn btn-primary btn-sm';
        $this->btnNuevClie->HtmlEntities = false;
        $this->btnNuevClie->AddAction(new QClickEvent(), new QServerAction('btnNuevClie_Click'));
        $this->btnNuevClie->Visible = false;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/master_cliente_edit.php/'.$objRegiTabl->CodiClie);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/master_cliente_edit.php/'.$objRegiTabl->CodiClie);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/master_cliente_edit.php/'.$objRegiTabl->CodiClie);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/master_cliente_edit.php/'.$objRegiTabl->CodiClie);
    }

    protected function verificarNavegacion() {
        $this->btnRegiAnte->Enabled = !($this->intPosiRegi == 0);
        $this->btnPrimRegi->Enabled = !($this->intPosiRegi == 0);
        $this->btnProxRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
        $this->btnUltiRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
    }

    protected function determinarPosicion() {
        if (isset($_SESSION['DataClie'])) {
            $this->arrDataTabl = unserialize($_SESSION['DataClie']);
            $this->intCantRegi = count($this->arrDataTabl);
            //-------------------------------------------------------------------------------
            // Se determina la posicion del registro actual, dentro del vector de registros
            //-------------------------------------------------------------------------------
            $intContRegi = 0;
            foreach ($this->arrDataTabl as $objTable) {
                if ($objTable->CodiClie == $this->objMasterCliente->CodiClie) {
                    $this->intPosiRegi = $intContRegi;
                    break;
                } else {
                    $intContRegi++;
                }
            }
        }
    }

    protected function chkEsunSubc_Change() {
        $this->txtBuscCodi->Visible = $this->chkEsunSubc->Checked;
        $this->txtNombBusc->Visible = $this->chkEsunSubc->Checked;
        $this->lstCodiDepe->Visible = $this->chkEsunSubc->Checked;
    }

    protected function txtBuscCodi_Blur() {
        if (strlen($this->txtBuscCodi->Text)) {
            $this->txtNombBusc->Text = '';
            $this->txtBuscCodi->Text = strtoupper($this->txtBuscCodi->Text);
            $this->lstCodiDepe->RemoveAllItems();
            //-------------------------------------------------------------------------------------
            // Se busca el Cliente cuyo Codigo Interno coincida con el valor dado por el Usuario
            //-------------------------------------------------------------------------------------
            $objCliente = MasterCliente::LoadByCodigoInterno($this->txtBuscCodi->Text);
            if ($objCliente) {
                $this->lstCodiDepe->AddItem($objCliente->__toStringConCodigoInterno(), $objCliente->CodiClie,true);
            } else {
                $this->lstCodiDepe->AddItem('- Seleccione Uno -');
                $this->mensaje('No Existe Cliente con este Código.','','w','i','exclamation-triangle');
            }
        } else {
            $this->mensaje();
        }
    }
    
    protected function txtNombBusc_Blur() {
        if (strlen($this->txtNombBusc->Text)) {
            $this->txtBuscCodi->Text = '';
            $this->txtNombBusc->Text = strtoupper($this->txtNombBusc->Text);
            $this->lstCodiDepe->RemoveAllItems();
            $objcondición= QQ::Clause();
            $objcondición[] = QQ::Like(QQN::MasterCliente()->NombClie,'%'.trim($this->txtNombBusc->Text).'%');
            //------------------------------------------------------------------------------
            // Se buscan Clientes cuyo nombre coincida con el criterio dado por el Usuario
            //------------------------------------------------------------------------------
            $arrClieMost = MasterCliente::QueryArray(QQ::AndCondition($objcondición),QQ::Clause(QQ::OrderBy(QQN::MasterCliente()->NombClie)));
            if (count($arrClieMost)) {
                if (count($arrClieMost) > 1) {
                    //-----------------------------------------------
                    // Si hay mas de uno, se lo advierto al Usuario
                    //-----------------------------------------------
                    $this->lstCodiDepe->AddItem(QApplication::Translate('- Seleccione Uno - ')."(".count($arrClieMost).")",null);
                }
                foreach ($arrClieMost as $objCliente) {
                    $this->lstCodiDepe->AddItem($objCliente->__toStringConCodigoInterno(), $objCliente->CodiClie);
                }
                if ($this->lstCodiDepe->ItemCount == 1) {
                    //---------------------------------------------------------------------
                    // Si solo existe un Cliente, se carga la informacion automaticamente
                    //---------------------------------------------------------------------
                    $this->lstCodiDepe->SelectedIndex = 0;
                } else {
                    if ($this->lstCodiDepe->ItemCount == 0) {
                    $this->lstCodiDepe->AddItem('- Seleccione Uno - ');
                        $this->mensaje('No existen Clientes que satisfagan la condición.','','w','i','exclamation-triangle');
                    }
                }
            } else {
                $this->mensaje('No existen Clientes que satisfagan la condición.','','w','i','exclamation-triangle');
            }
        }
    }

    protected function chkCodiEsta_Change() {
        $this->lstCodiEsta->RemoveAllItems();
        if ($this->chkCodiEsta->Checked) {
            $arrSucuClie = Estacion::LoadSucursalesActivasToClients();
            $intCantSucu = count($arrSucuClie);
            $this->lstCodiEsta->AddItem('- Seleccione Una - ('.$intCantSucu.')', null);
            if ($arrSucuClie) {
                foreach ($arrSucuClie as $objSucuClie) {
                    $this->lstCodiEsta->AddItem($objSucuClie->__toString(), $objSucuClie->CodiEsta);
                }
            }
        } else {
            if ($this->blnEditMode && !is_null($this->objMasterCliente->CodiEsta)) {
                $objSucuClie = Estacion::Load($this->objMasterCliente->CodiEsta);
                if ($objSucuClie) {
                    $this->lstCodiEsta->AddItem($objSucuClie->__toString(), $objSucuClie->CodiEsta, true);
                }
            }
        }
    }

    protected function chkVendClie_Change() {
        $this->lstVendClie->RemoveAllItems();
        if ($this->chkVendClie->Checked) {
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::FacVendedor()->Nombre);
            $arrVendClie   = FacVendedor::LoadArrayByStatusId(StatusType::ACTIVO, $objClauOrde);
            $intCantVend   = count($arrVendClie);
            $this->lstVendClie->AddItem('- Seleccione Uno - ('.$intCantVend.')', null);
            if ($arrVendClie) {
                foreach ($arrVendClie as $objVendClie) {
                    $this->lstVendClie->AddItem($objVendClie->__toString(), $objVendClie->Id);
                }
            }
        } else {
            if ($this->blnEditMode && !is_null($this->objMasterCliente->VendedorId)) {
                $objVendClie = FacVendedor::Load($this->objMasterCliente->VendedorId);
                if ($objVendClie) {
                    $this->lstVendClie->AddItem($objVendClie->__toString(), $objVendClie->Id, true);
                }
            }
        }
    }

    protected function chkTariClie_Change() {
        $this->lstTariClie->RemoveAllItems();
        if ($this->chkTariClie->Checked) {
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::FacTarifa()->Id,false);
            $arrTariClie   = FacTarifa::LoadAll($objClauOrde);
            $intCantTari   = count($arrTariClie);
            $this->lstTariClie->AddItem('- Seleccione Una - ('.$intCantTari.')', null);
            if ($arrTariClie) {
                foreach ($arrTariClie as $objTariClie) {
                    $this->lstTariClie->AddItem($objTariClie->__toString(), $objTariClie->Id);
                }
            }
        } else {
            if ($this->blnEditMode && !is_null($this->objMasterCliente->TarifaId)) {
                $objTariClie = FacTarifa::Load($this->objMasterCliente->TarifaId);
                if ($objTariClie) {
                    $this->lstTariClie->AddItem($objTariClie->__toString(), $objTariClie->Id, true);
                }
            }
        }
    }

    protected function chkRutaReco_Change() {
        $this->lstRutaReco->RemoveAllItems();
        if ($this->chkRutaReco->Checked) {
            $objClauWher   = QQ::Clause();
            if (!is_null($this->lstCodiEsta->SelectedValue)) {
                $objClauWher[] = QQ::Equal(QQN::SdeOperacion()->CodiEsta,$this->lstCodiEsta->SelectedValue);
            }
            $objClauWher[] = QQ::Equal(QQN::SdeOperacion()->CodiTipo,0);  // URBANA
            $objClauWher[] = QQ::NotLike(QQN::SdeOperacion()->CodiRuta,'%99%');
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::SdeOperacion()->CodiRuta);
            $arrRecoClie   = SdeOperacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
            $intCantReco   = count($arrRecoClie);
            $this->lstRutaReco->AddItem('- Seleccione Una - ('.$intCantReco.')', null);
            if ($arrRecoClie) {
                foreach ($arrRecoClie as $objRecoClie) {
                    $this->lstRutaReco->AddItem($objRecoClie->__toString(), $objRecoClie->CodiOper);
                }
            }
        } else {
            if ($this->blnEditMode && !is_null($this->objMasterCliente->RutaRecolecta)) {
                $objRecoClie = SdeOperacion::Load($this->objMasterCliente->RutaRecolecta);
                if ($objRecoClie) {
                    $this->lstRutaReco->AddItem($objRecoClie->__toString(), $objRecoClie->CodiOper, true);
                }
            }
        }
    }

    protected function chkRutaEntr_Change() {
        $this->lstRutaEntr->RemoveAllItems();
        if ($this->chkRutaEntr->Checked) {
            $objClauWher   = QQ::Clause();
            if (!is_null($this->lstCodiEsta->SelectedValue)) {
                $objClauWher[] = QQ::Equal(QQN::SdeOperacion()->CodiEsta,$this->lstCodiEsta->SelectedValue);
            }
            $objClauWher[] = QQ::Equal(QQN::SdeOperacion()->CodiTipo,0);  // URBANA
            $objClauWher[] = QQ::NotLike(QQN::SdeOperacion()->CodiRuta,'%99%');
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::SdeOperacion()->CodiRuta);
            $arrEntrClie   = SdeOperacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
            $intCantEntr   = count($arrEntrClie);
            $this->lstRutaEntr->AddItem('- Seleccione Una - ('.$intCantEntr.')', null);
            if ($arrEntrClie) {
                foreach ($arrEntrClie as $objEntrClie) {
                    $this->lstRutaEntr->AddItem($objEntrClie->__toString(), $objEntrClie->CodiOper);
                }
            }
        } else {
            if ($this->blnEditMode && !is_null($this->objMasterCliente->RutaEntrega)) {
                $objEntrClie = SdeOperacion::Load($this->objMasterCliente->RutaEntrega);
                if ($objEntrClie) {
                    $this->lstRutaEntr->AddItem($objEntrClie->__toString(), $objEntrClie->CodiOper, true);
                }
            }
        }
    }

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        $this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->HtmlEntities = false;
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('MasterCliente',$this->objMasterCliente->CodiClie);
    }

    protected function btnCargMasi_Create() {
        $this->btnCargMasi = new QButtonP($this);
        $this->btnCargMasi->Text = TextoIcono('briefcase fa-lg','Carga Subclientes');
        $this->btnCargMasi->AddAction(new QClickEvent(), new QAjaxAction('btnCargMasi_Click'));
        $this->btnCargMasi->Visible  = false;
        //$this->btnCargMasi->Visible  = $this->$this->blnEditMode;
    }

    protected function btnMasxAcci_Create() {
        $this->btnMasxAcci = new QLabel($this);
        $this->btnMasxAcci->HtmlEntities = false;
        $this->btnMasxAcci->CssClass = '';

        $strTextBoto   = TextoIcono('cog fa-fw','Más');
        $arrOpciDrop   = array();

        if ($this->intCantHist > 0) {
            $arrOpciDrop[] = OpcionDropDown(__SIST__.'/log_list.php',TextoIcono('file-text','Histórico'));
        }

        if ($this->blnEditMode) {
            $arrOpciDrop[] = OpcionDropDown(
                __SIST__.'/carga_masiva_clientes.php/'.$this->objMasterCliente->CodiClie,
                TextoIcono('briefcase','Carga Sub-Clientes')
            );
        }

        $this->btnMasxAcci->Text = CrearDropDownButton($strTextBoto, $arrOpciDrop, 'f');
        $this->btnMasxAcci->Visible  = $this->blnEditMode;
    }

    protected function chkGuiaYama_Change() {
        if ($this->chkGuiaYama->Checked) {
            $this->txtGuiaXcar->Visible = true;
            $this->txtGuiaXdia->Visible = true;
        } else {
            $this->txtGuiaXcar->Visible = false;
            $this->txtGuiaXdia->Visible = false;
        }
    }

    protected function chkDestFrec_Change() {
        if ($this->chkDestFrec->Checked) {
            $this->txtDestXcar->Visible = true;
            $this->txtDestXdia->Visible = true;
        } else {
            $this->txtDestXcar->Visible = false;
            $this->txtDestXdia->Visible = false;
        }
    }

    protected function chkManeApix_Change() {
        $this->txtUsuaApix->Visible = $this->chkManeApix->Checked;
        $this->txtPassApix->Visible = $this->chkManeApix->Checked;
        $this->txtGuiaXdia->Visible = $this->chkManeApix->Checked;
    }

    protected function AnularMensajeDeAlertaYamaguchi(MasterCliente $objMastClie) {
        if ($objMastClie->tieneMsjYamaguchiAlerta()) {
            //-----------------------------------------------------------------------------------
            // Si tiene un Mensaje de Alerta Yamaguchi asignado, se procede a eliminar el mismo.
            //-----------------------------------------------------------------------------------
            $objMensYama = MensajeYamaguchi::LoadMsjAlertByCodigoInterno($objMastClie->CodigoInterno);
            $objMensYama->Delete();
            //--------------------------------------
            // Se registra la transacción en el Log
            //--------------------------------------
            $arrLogxCamb['strNombTabl'] = 'MensajeCORP';
            $arrLogxCamb['intRefeRegi'] = $objMensYama->Id;
            $arrLogxCamb['strNombRegi'] = $objMensYama->Tipo.' | '.$objMensYama->Texto;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/master_cliente_edit.php/'.$objMastClie->CodiClie;
            LogDeCambios($arrLogxCamb);
        }
    }

    protected function MensajeDeAlertaYamaguchi(MasterCliente $objMastClie) {
        if (!$objMastClie->tieneMsjYamaguchiAlerta()) {
            //------------------------------------------------------------------------------------------
            // Si no tiene un Mensaje de Alerta Yamaguchi asignado, se procede a crear y asignarle uno.
            //------------------------------------------------------------------------------------------
            $objMensDang = BuscarMensajeYamaguchi('MensDang');
            $objMensYama                   = new MensajeYamaguchi();
            $objMensYama->Tipo             = $objMensDang->ParaTxt2;
            $objMensYama->Orden            = 0;
            $objMensYama->Login            = $this->objUsuaSist->LogiUsua;
            $objMensYama->Texto            = 'Estimado Cliente, se le informa que su cuenta a sido inactivada, ';
            $objMensYama->Texto           .= 'Por lo que no puede ni crear ni editar guías, hasta nuevo aviso. ';
            $objMensYama->Icono            = $objMensDang->ParaTxt3;
            $objMensYama->Codigos          = $objMastClie->CodigoInterno;
            $objMensYama->FechInic         = new QDateTime(QDateTime::Now());
            $objMensYama->TiempoIndefinido = true;
            $objMensYama->Save();
            //--------------------------------------
            // Se registra la transacción en el Log
            //--------------------------------------
            $arrLogxCamb['strNombTabl'] = 'MensajeCORP';
            $arrLogxCamb['intRefeRegi'] = $objMensYama->Id;
            $arrLogxCamb['strNombRegi'] = $objMensYama->Tipo.' | '.$objMensYama->Texto;
            $arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/master_cliente_edit.php/'.$objMastClie->CodiClie;
            LogDeCambios($arrLogxCamb);
        }
    }

    protected function GestionMensajeDeAlertaYamaguchi(MasterCliente $objMastClie) {
        if ($objMastClie->CodiStat) {
            //-----------------------------------------------------------------------------------------
            // Si el Cliente está activo, se borra cualquier Mensaje de Alerta Yamaguchi que contenga.
            //-----------------------------------------------------------------------------------------
            $this->AnularMensajeDeAlertaYamaguchi($objMastClie);
        } else {
            //--------------------------------------------------------------------------------------------------------
            // Si el Cliente está inactivo, se verifica si el mismo ya tiene asignado un Mensaje de Alerta Yamaguchi.
            //--------------------------------------------------------------------------------------------------------
            $this->MensajeDeAlertaYamaguchi($objMastClie);
        }
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__.'/'.$objUltiAcce->__toString());
    }

    // protected function btnCancel_Click() {
    //     QApplication::Redirect(__SIST__.'/master_cliente_list.php');
    // }

    protected function btnNuevClie_Click() {
        QApplication::Redirect(__SIST__.'/master_cliente_edit.php');
    }

    protected function btnSave_Click() {
        $blnTodoOkey = true;
        $this->mensaje();
        //-----------------------------------------------------------------
        // Si no se ha seleccionado a un Cliente Maestro como dependencia,
        // se asume que el mismo es el Genérico del Sistema.
        //-----------------------------------------------------------------
        if (is_null($this->lstCodiDepe->SelectedValue)) {
            $intCodiDepe = 4;
        } else {
            $intCodiDepe = $this->lstCodiDepe->SelectedValue;
        }
        if ($this->chkManeApix->Checked) {
            //--------------------------------------------------------------------------------------
            // Si se especifica que el Cliente "Maneja API", la "Cantidad de Guias Maxima por Dia"
            // no debe quedar en cero (0)
            //--------------------------------------------------------------------------------------
            if ($this->txtGuiaXdia->Text <= 0) {
                $this->mensaje('En la sección <strong>Configuracion: API</strong>, la cantidad de guías por día debe ser mayor a cero','m','d','',__iHAND__);
                $blnTodoOkey = false;
            }
            //-------------------------------------------------------------
            // La credenciales de acceso a la API, deben contener valores
            //-------------------------------------------------------------
            if ((strlen($this->txtUsuaApix->Text) == 0 || strlen($this->txtPassApix->Text) == 0)) {
                $this->mensaje('En la sección <strong>Configuracion: API</strong>, las credenciales (Usauriode acceso a la API, no deben estar vacías','m','d','',__iHAND__);
                $blnTodoOkey = false;
            }
        } else {
            $this->txtUsuaApix->Text = '';
            $this->txtPassApix->Text = '';
            $this->txtGuiaXdia->Text = '';
        }
        if (!$this->blnEditMode && $blnTodoOkey) {
            if (strlen($this->txtCodiInte->Text)) {
                //---------------------------------------------------------------------------
                // En este caso, se le está asignando manualmente el Correlativo al Cliente.
                //---------------------------------------------------------------------------
                if ($this->lstCodiDepe->SelectedValue != 4) {
                    //-----------------------------------------------------------------------------
                    // Este Cliente, en realidad es una Sub-Cuenta de un Cliente Maestro.
                    //-----------------------------------------------------------------------------
                    $objCliente = MasterCliente::LoadByCodiClie($intCodiDepe);
                    $this->txtCodiInte->Text = $objCliente->CodigoInterno.'-'.$this->txtCodiInte->Text;
                }
            } else {
                //------------------------------------------------------------------------------------------------------
                // El Programa genera el Correlativo correspondiente y se lo asigna automáticamente al Cliente a Crear.
                //------------------------------------------------------------------------------------------------------
                $this->txtCodiInte->Text = MasterCliente::generarProxCodigo($intCodiDepe);
            }
            //-------------------------------------------------------------------------------------------------
            // Se verifica la existencia previa de un Cliente con el Correlativo asignado en la Base de Datos.
            //-------------------------------------------------------------------------------------------------
            $objCliente = MasterCliente::LoadByCodigoInterno($this->txtCodiInte->Text);
            if ($objCliente) {
                $this->mensaje('Ya existe un Cliente con este Código','','d','',__iHAND__);
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            //--------------------------------------------
            // Se clona el objeto para verificar cambios
            //--------------------------------------------
            if ($this->blnEditMode) {
                $objRegiViej = clone $this->objMasterCliente;
            }
            //------------------------------------
            // Se actualiza la ficha del Cliente
            //------------------------------------
            $this->ActualizarCampos($intCodiDepe);
            $this->objMasterCliente->Save();
            //--------------------------------------------------------------------
            // Se valida si el cliente se encuentra inactivo o activo para luego
            // proceder a hacer gestión del MensajeCORP que le corresponda.
            //--------------------------------------------------------------------
            $this->GestionMensajeDeAlertaYamaguchi($this->objMasterCliente);
            if ($this->blnEditMode) {
                //---------------------------------------------------------------------------------------
                // Si estamos en Modo Edición, se verificará la existencia de algun cambio en los datos.
                //---------------------------------------------------------------------------------------
                $objRegiNuev = $this->objMasterCliente;
                $objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
                if ($objResuComp->FriendlyComparisonStatus == 'different') {
                    //-----------------------------------------
                    // En caso de que el objeto haya cambiado
                    //-----------------------------------------
                    $arrLogxCamb['strNombTabl'] = 'MasterCliente';
                    $arrLogxCamb['intRefeRegi'] = $this->objMasterCliente->CodiClie;
                    $arrLogxCamb['strNombRegi'] = '('.$this->objMasterCliente->CodigoInterno .') - '. $this->objMasterCliente->NombClie;
                    $arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                    $arrLogxCamb['strEnlaEnti'] = __SIST__.'/master_cliente_edit.php/'.$this->objMasterCliente->CodiClie;
                    if (buscarCadenas($arrLogxCamb['strDescCamb'],'Cliente')) {
                        $arrLogxCamb['blnCambDeli'] = true;
                    }
                    LogDeCambios($arrLogxCamb);
                    $this->mensaje('Transacción Exitosa','','','',__iCHEC__);
                }
            } else {
                $arrLogxCamb['strNombTabl'] = 'MasterCliente';
                $arrLogxCamb['intRefeRegi'] = $this->objMasterCliente->CodiClie;
                $arrLogxCamb['strNombRegi'] = '('.$this->objMasterCliente->CodigoInterno .') - '. $this->objMasterCliente->NombClie;
                $arrLogxCamb['strDescCamb'] = "Creado";
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/master_cliente_edit.php/'.$this->objMasterCliente->CodiClie;
                LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','',__iCHEC__);
            }
            $this->btnNuevClie->Visible = true;
            $this->btnDelete->Visible = true;
            $this->blnEditMode = true;
        }
    }

    protected function btnDelete_Click() {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->objMasterCliente->TablasRelacionadas();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $strTextMens = sprintf('Existen registros relacionados en <strong>%s</strong>',$strTablRela);
            $this->mensaje($strTextMens,'','w','',__iEXCL__);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {

            $arrLogxCamb['strNombTabl'] = 'MasterCliente';
            $arrLogxCamb['intRefeRegi'] = $this->objMasterCliente->CodiClie;
            $arrLogxCamb['strNombRegi'] = '('.$this->objMasterCliente->CodigoInterno .') - '. $this->objMasterCliente->NombClie;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            // $arrLogxCamb['strEnlaEnti'] = __SIST__.'/master_cliente_edit.php/'.$this->objMasterCliente->CodiClie;
            $arrLogxCamb['blnCambDeli'] = true;
            LogDeCambios($arrLogxCamb);

            $this->objMasterCliente->Delete();
            $this->limpiarFormulario();
            $strTextMens = 'Transaccion Exitosa. El Cliente '.trim($this->objMasterCliente->CodigoInterno).' ha sido Eliminado.';
            $this->mensaje($strTextMens,'','','',__iCHEC__);
            $this->btnDelete->Visible = false;
            $this->btnSave->Visible = false;
            $this->btnNuevClie->Visible = true;
            $this->ocultarCampos();
        }
    }

    protected function btnCargMasi_Click() {
        $_SESSION['MastClie'] = serialize($this->objMasterCliente);
        QApplication::Redirect(__SIST__.'/carga_masiva_clientes.php');
    }

    protected function ocultarCampos() {
        $this->txtCodiInte->Visible = false;
        $this->chkEsunSubc->Visible = false;
        $this->txtBuscCodi->Visible = false;
        $this->txtNombBusc->Visible = false;
        $this->lstCodiDepe->Visible = false;
        $this->txtNombClie->Visible = false;
        $this->chkCodiEsta->Visible = false;
        $this->lstCodiEsta->Visible = false;
        $this->txtDireFisc->Visible = false;
        $this->txtNumeDrif->Visible = false;
        $this->txtEntrFact->Visible = false;
        $this->chkVendClie->Visible = false;
        $this->lstVendClie->Visible = false;
        $this->chkTariClie->Visible = false;
        $this->lstTariClie->Visible = false;
        $this->txtPersCona->Visible = false;
        $this->txtTeleCona->Visible = false;
        $this->txtPersConb->Visible = false;
        $this->txtTeleConb->Visible = false;
        $this->txtDireMail->Visible = false;
        $this->txtDireReco->Visible = false;
        $this->chkRutaReco->Visible = false;
        $this->lstRutaReco->Visible = false;
        $this->chkRutaEntr->Visible = false;
        $this->lstRutaEntr->Visible = false;
        $this->rdbCodiStat->Visible = false;
        $this->rdbEnviPodx->Visible = false;
        $this->lstTipoClie->Visible = false;
        $this->txtPorcSgro->Visible = false;
        $this->rdbStatCred->Visible = false;
        $this->txtClavSweb->Visible = false;
        $this->txtCaduGuia->Visible = false;
        $this->lstMostExte->Visible = false;
        $this->chkCargMasi->Visible = false;
        $this->chkGuiaYama->Visible = false;
        $this->txtGuiaXcar->Visible = false;
        $this->txtGuiaXdia->Visible = false;
        $this->chkDestFrec->Visible = false;
        $this->txtDestXcar->Visible = false;
        $this->txtDestXdia->Visible = false;
        $this->chkPagoPpdx->Visible = false;
        $this->chkPagoCrdx->Visible = false;
        $this->chkPagoCodx->Visible = false;
        $this->chkGuiaReto->Visible = false;
        $this->txtUsuaApix->Visible = false;
        $this->txtPassApix->Visible = false;
        $this->chkManeApix->Visible = false;
    }

    protected function ActualizarCampos($intCodiDepe) {
        $this->objMasterCliente->CodiDepe = $intCodiDepe;
        $this->objMasterCliente->NombClie = $this->txtNombClie->Text;
        $this->objMasterCliente->CodiEsta = $this->lstCodiEsta->SelectedValue;
        $this->objMasterCliente->DireFisc = $this->txtDireFisc->Text;
        $this->objMasterCliente->NumeDrif = $this->txtNumeDrif->Text;
        $this->objMasterCliente->VendedorId = $this->lstVendClie->SelectedValue;
        $this->objMasterCliente->TarifaId = $this->lstTariClie->SelectedValue;
        $this->objMasterCliente->CicloId = 1;
        $this->objMasterCliente->NumeDnit = '';
        $this->objMasterCliente->PersCona = $this->txtPersCona->Text;
        $this->objMasterCliente->TeleCona = $this->txtTeleCona->Text;
        $this->objMasterCliente->PersConb = $this->txtPersConb->Text;
        $this->objMasterCliente->TeleConb = $this->txtTeleConb->Text;
        $this->objMasterCliente->DireMail = $this->txtDireMail->Text;
        $this->objMasterCliente->DireReco = $this->txtDireReco->Text;
        $this->objMasterCliente->HoraLune = '';
        $this->objMasterCliente->HoraMart = '';
        $this->objMasterCliente->HoraMier = '';
        $this->objMasterCliente->HoraJuev = '';
        $this->objMasterCliente->HoraVier = '';
        $this->objMasterCliente->HoraSaba = '';
        $this->objMasterCliente->CodiStat = $this->rdbCodiStat->SelectedValue;
        $this->objMasterCliente->CodiSino = $this->rdbEnviPodx->SelectedValue;
        $this->objMasterCliente->TextObse = '';
        $this->objMasterCliente->NumeDfax = '';
        $this->objMasterCliente->CodigoInterno = $this->txtCodiInte->Text;
        $this->objMasterCliente->TipoCliente = $this->lstTipoClie->SelectedValue;
        $this->objMasterCliente->RutaRecolecta = $this->lstRutaReco->SelectedValue;
        $this->objMasterCliente->RutaEntrega = $this->lstRutaEntr->SelectedValue;
        $this->objMasterCliente->PorcentajeDsctoincr = 0;
        $this->objMasterCliente->HoraCierre = '';
        $this->objMasterCliente->StatusCreditoId = $this->rdbStatCred->SelectedValue;
        $this->objMasterCliente->DsctoPorVolumen = 0;
        $this->objMasterCliente->VolumenParaDscto = '';
        $this->objMasterCliente->DsctoPorPeso = 0;
        $this->objMasterCliente->PesoParaDscto = '';
        $this->objMasterCliente->PorcentajeSeguro = $this->txtPorcSgro->Text;
        $this->objMasterCliente->DirEntregaFactura = $this->txtEntrFact->Text;
        $this->objMasterCliente->ClaveServiciosWeb = $this->txtClavSweb->Text;
        $this->objMasterCliente->CaducidadDeGuias = $this->txtCaduGuia->Text;
        $this->objMasterCliente->MostrarGuiaExterna = $this->lstMostExte->SelectedValue;
        $this->objMasterCliente->CargaMasiva = $this->chkCargMasi->Checked ? $this->chkCargMasi->Checked : 0;
        $this->objMasterCliente->CmGuiasYamaguchi = $this->chkGuiaYama->Checked ? $this->chkGuiaYama->Checked : 0;
        $this->objMasterCliente->GuiasYamaguchiPorCarga = $this->txtGuiaXcar->Text;
        $this->objMasterCliente->GuiasYamaguchiPorDia = $this->txtGuiaXdia->Text;
        $this->objMasterCliente->PagoPpd = $this->chkPagoPpdx->Checked ? $this->chkPagoPpdx->Checked : 0;
        $this->objMasterCliente->PagoCrd = $this->chkPagoCrdx->Checked ? $this->chkPagoCrdx->Checked : 0;
        $this->objMasterCliente->PagoCod = $this->chkPagoCodx->Checked ? $this->chkPagoCodx->Checked : 0;
        $this->objMasterCliente->CmDestinatarioFrecuente = $this->chkDestFrec->Checked ? $this->chkDestFrec->Checked : 0;
        $this->objMasterCliente->ClientesPorCarga = $this->txtDestXcar->Text;
        $this->objMasterCliente->ClientesPorDia = $this->txtDestXdia->Text;
        $this->objMasterCliente->UsuarioApi = $this->txtUsuaApix->Text;
        $this->objMasterCliente->PasswordApi = $this->txtPassApix->Text;
        $this->objMasterCliente->ManejaApi = $this->chkManeApix->Checked ? $this->chkManeApix->Checked : 0;
        $this->objMasterCliente->GuiaRetorno = $this->chkGuiaReto->Checked ? $this->chkGuiaReto->Checked : 0;
    }

    protected function limpiarFormulario() {
        $this->txtCodiInte->Text = '';
        $this->lstCodiDepe->RemoveAllItems();
        $this->txtNombClie->Text = '';
        $this->chkCodiEsta->Checked = false;
        $this->lstCodiEsta->RemoveAllItems();
        $this->txtDireFisc->Text = '';
        $this->txtNumeDrif->Text = '';
        $this->txtEntrFact->Text = '';
        $this->chkVendClie->Checked = false;
        $this->lstVendClie->RemoveAllItems();
        $this->chkTariClie->Checked = false;
        $this->lstTariClie->RemoveAllItems();
        $this->txtPersCona->Text = '';
        $this->txtTeleCona->Text = '';
        $this->txtPersConb->Text = '';
        $this->txtTeleConb->Text = '';
        $this->txtDireMail->Text = '';
        $this->txtDireReco->Text = '';
        $this->chkRutaReco->Checked = false;
        $this->lstRutaReco->RemoveAllItems();
        $this->chkRutaEntr->Checked = false;
        $this->lstRutaEntr->RemoveAllItems();
        $this->txtPorcSgro->Text = '';
        $this->txtClavSweb->Text = '';
        $this->txtCaduGuia->Text = '';
        $this->chkCargMasi->Checked = false;
        $this->chkGuiaYama->Checked = false;
        $this->txtGuiaXcar->Text = '';
        $this->txtGuiaXdia->Text = '';
        $this->chkDestFrec->Checked = false;
        $this->txtDestXcar->Text = '';
        $this->txtDestXdia->Text = '';
        $this->chkPagoPpdx->Checked = false;
        $this->chkPagoCrdx->Checked = false;
        $this->chkPagoCodx->Checked = false;
        $this->chkGuiaReto->Checked = false;
        $this->txtUsuaApix->Text = '';
        $this->txtPassApix->Text = '';
        $this->chkManeApix->Checked = false;
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// master_cliente_edit.tpl.php as the included HTML template file
MasterClienteEditForm::Run('MasterClienteEditForm');
?>