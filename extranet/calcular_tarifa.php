<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected_extranet.inc.php');

class CalcularTarifa extends QForm {
    protected $lblTituForm;
    protected $lblMensUsua;
    protected $lblNotiUsua;

    protected $txtValoMerc;
    protected $txtPesoLibr;
    protected $txtAltoEnvi;
    protected $txtAnchEnvi;
    protected $txtLargEnvi;
    protected $lstTipoMerc;
    protected $lstTipoArti;
    protected $txtPesoVolu;
    protected $txtPesoCalc;
    protected $txtPorcPart;

    protected $txtCostLibr;
    protected $txtMontBase;
    protected $txtGastMane;
    protected $txtMontAran;
    protected $txtTasaAdua;
    protected $txtIvaxImpo;
    protected $txtValoBoli;
    protected $txtImpuImpo;
    protected $lblTasaDola;

    protected $txtMontBas2;
    protected $txtGastMan2;
    protected $txtImpuImp2;
    protected $txtMontTari;

    protected $objDolaSica;
    protected $objDolaSima;
    protected $decTasaDola;

    protected $btnLimpiar;
    protected $btnCancel;
    protected $btnCalcTari;

    protected $intTamaCamp = 125;

    protected function Form_Create() {
        
        $this->lblTituForm_Create();
        $this->lblMensUsua_Create();
        $this->lblNotiUsua_Create();

        $this->txtValoMerc_Create();
        $this->txtPesoLibr_Create();
        $this->txtAltoEnvi_Create();
        $this->txtAnchEnvi_Create();
        $this->txtLargEnvi_Create();
        $this->lstTipoArti_Create();
        $this->txtPorcPart_Create();
        $this->txtPesoVolu_Create();
        $this->txtPesoCalc_Create();

        $this->txtCostLibr_Create();
        $this->txtMontBase_Create();
        $this->txtGastMane_Create();
        $this->txtMontAran_Create();
        $this->txtTasaAdua_Create();
        $this->txtIvaxImpo_Create();
        $this->txtValoBoli_Create();
        $this->txtImpuImpo_Create();
        $this->lblTasaDola_Create();
        
        $this->txtMontBas2_Create();
        $this->txtGastMan2_Create();
        $this->txtImpuImp2_Create();
        $this->txtMontTari_Create();
      
        $this->btnLimpiar_Create();
        $this->btnCancel_Create();
        $this->btnCalcTari_Create();

        $this->txtValoMerc->SetFocus();

    }

    //----------------------------
    // Aqui se crean los objetos 
    //----------------------------

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'Calcular Tarifa';
    }
    
    protected function lblMensUsua_Create() {
        $this->lblMensUsua = new QLabel($this);
        $this->lblMensUsua->Text = '';
        $this->lblMensUsua->HtmlEntities = false;
    }
    
    protected function lblNotiUsua_Create() {
        $this->lblNotiUsua = new QLabel($this);
        $this->lblNotiUsua->Text = '<i class="fa fa-info-circle fa-lg"></i> El resultado es apenas un estimado';
        $this->lblNotiUsua->CssClass = 'alert alert-info';
        $this->lblNotiUsua->HtmlEntities = false;
    }
    
    protected function txtValoMerc_Create() {
        $this->txtValoMerc = new QFloatTextBox($this);
        $this->txtValoMerc->Name = 'Valor de la Mercancía';
        $this->txtValoMerc->Width = $this->intTamaCamp;
        $this->txtValoMerc->Required = true;
        $this->txtValoMerc->HtmlAfter = ' (USD)';
        $this->txtValoMerc->CssClass = 'campo';
        $this->txtValoMerc->AddAction(new QBlurEvent(), new QAjaxAction('txtValoMerc_Blur'));
    }
    
    protected function txtPesoLibr_Create() {
        $this->txtPesoLibr = new QFloatTextBox($this);
        $this->txtPesoLibr->Name = 'Peso';
        $this->txtPesoLibr->Width = $this->intTamaCamp;
        $this->txtPesoLibr->HtmlAfter = ' (lbs)';
        $this->txtPesoLibr->Required = true;
        $this->txtPesoLibr->CssClass = 'campo';
    }
    
    protected function txtAltoEnvi_Create() {
        $this->txtAltoEnvi = new QFloatTextBox($this);
        $this->txtAltoEnvi->Name = 'Alto';
        $this->txtAltoEnvi->Width = 40;
        $this->txtAltoEnvi->Required = true;
        $this->txtAltoEnvi->CssClass = 'campo';
    }
    
    protected function txtAnchEnvi_Create() {
        $this->txtAnchEnvi = new QFloatTextBox($this);
        $this->txtAnchEnvi->Name = 'Ancho';
        $this->txtAnchEnvi->Width = 40;
        $this->txtAnchEnvi->Required = true;
        $this->txtAnchEnvi->CssClass = 'campo';
    }
    
    protected function txtLargEnvi_Create() {
        $this->txtLargEnvi = new QFloatTextBox($this);
        $this->txtLargEnvi->Name = 'Largo';
        $this->txtLargEnvi->Width = 40;
        $this->txtLargEnvi->Required = true;
        $this->txtLargEnvi->CssClass = 'campo';
    }
    
    protected function lstTipoArti_Create() {
        $this->lstTipoArti = new QListBox($this);
        $this->lstTipoArti->Name = 'Tipo de Artículo';
        $this->lstTipoArti->Required = true;
        $this->lstTipoArti->Width = 160;
        $arrTipoArti = Arancel::LoadAll();
        $this->lstTipoArti->AddItem('- Seleccione Uno -', null);
        foreach ($arrTipoArti as $objTipoArti) {
            $this->lstTipoArti->AddItem($objTipoArti->__toStringConPorc(), $objTipoArti->Porcentaje);
        }
        $this->lstTipoArti->AddItem('PORC. PARTICULAR', 'PP');
        $this->lstTipoArti->Enabled = false;
        $this->lstTipoArti->AddAction(new QChangeEvent(), new QAjaxAction('lstTipoArti_Change'));
    }

    protected function txtPorcPart_Create() {
        $this->txtPorcPart = new QFloatTextBox($this);
        $this->txtPorcPart->Name = '% Particular';
        $this->txtPorcPart->Width = 40;
        $this->txtPorcPart->Enabled = false;
        $this->txtPorcPart->ForeColor = 'blue';
        $this->txtPorcPart->CssClass = 'campo';
    }
    
    protected function txtPesoVolu_Create() {
        $this->txtPesoVolu = new QFloatTextBox($this);
        $this->txtPesoVolu->Name = 'Peso Volumétrico';
        $this->txtPesoVolu->Width = $this->intTamaCamp;
        $this->txtPesoVolu->Enabled = false;
        $this->txtPesoVolu->ForeColor = 'blue';
        $this->txtPesoVolu->CssClass = 'campo';
    }
    
    protected function txtPesoCalc_Create() {
        $this->txtPesoCalc = new QFloatTextBox($this);
        $this->txtPesoCalc->Name = 'Libras p/Cálculo';
        $this->txtPesoCalc->Width = $this->intTamaCamp;
        $this->txtPesoCalc->Enabled = false;
        $this->txtPesoCalc->ForeColor = 'blue';
        $this->txtPesoCalc->CssClass = 'campo';
    }
    
    protected function txtCostLibr_Create() {
        $this->txtCostLibr = new QFloatTextBox($this);
        $this->txtCostLibr->Name = 'Costo x Libra';
        $this->txtCostLibr->Width = $this->intTamaCamp;
        $this->txtCostLibr->Enabled = false;
        $this->txtCostLibr->ForeColor = 'blue';
        $this->txtCostLibr->CssClass = 'campo';
    }
    
    protected function txtMontBase_Create() {
        $this->txtMontBase = new QFloatTextBox($this);
        $this->txtMontBase->Name = 'Monto Flete';
        $this->txtMontBase->Width = $this->intTamaCamp;
        $this->txtMontBase->Enabled = false;
        $this->txtMontBase->ForeColor = 'blue';
        $this->txtMontBase->CssClass = 'campo';
    }
    
    protected function txtGastMane_Create() {
        $this->txtGastMane = new QFloatTextBox($this);
        $this->txtGastMane->Name = 'Gastos de Manejo';
        $this->txtGastMane->Width = $this->intTamaCamp;
        $this->txtGastMane->Enabled = false;
        $this->txtGastMane->ForeColor = 'blue';
        $this->txtGastMane->CssClass = 'campo';
    }
    
    protected function txtMontAran_Create() {
        $this->txtMontAran = new QFloatTextBox($this);
        $this->txtMontAran->Name = 'Mto Arancel';
        $this->txtMontAran->Width = $this->intTamaCamp;
        $this->txtMontAran->Enabled = false;
        $this->txtMontAran->ForeColor = 'green';
        $this->txtMontAran->CssClass = 'campo';
    }
    
    protected function txtTasaAdua_Create() {
        $this->txtTasaAdua = new QFloatTextBox($this);
        $this->txtTasaAdua->Name = 'Tasa Aduana';
        $this->txtTasaAdua->Width = $this->intTamaCamp;
        $this->txtTasaAdua->Enabled = false;
        $this->txtTasaAdua->ForeColor = 'green';
        $this->txtTasaAdua->CssClass = 'campo';
    }
    
    protected function txtIvaxImpo_Create() {
        $this->txtIvaxImpo = new QFloatTextBox($this);
        $this->txtIvaxImpo->Name = 'Iva Importación';
        $this->txtIvaxImpo->Width = $this->intTamaCamp;
        $this->txtIvaxImpo->Enabled = false;
        $this->txtIvaxImpo->ForeColor = 'green';
        $this->txtIvaxImpo->CssClass = 'campo';
    }
    
    protected function txtImpuImpo_Create() {
        $this->txtImpuImpo = new QFloatTextBox($this);
        $this->txtImpuImpo->Name = 'Nacionalización';
        $this->txtImpuImpo->Width = $this->intTamaCamp;
        $this->txtImpuImpo->Enabled = false;
        $this->txtImpuImpo->ForeColor = 'blue';
        $this->txtImpuImpo->CssClass = 'campo';
    }
    
    protected function lblTasaDola_Create() {
        $this->lblTasaDola = new QLabel($this);
        $this->lblTasaDola->Text = '';
    }
    
    protected function txtValoBoli_Create() {
        $this->txtValoBoli = new QFloatTextBox($this);
        $this->txtValoBoli->Name = 'Monto en Bs';
        $this->txtValoBoli->Width = $this->intTamaCamp;
        $this->txtValoBoli->Enabled = false;
        $this->txtValoBoli->ForeColor = 'blue';
        $this->txtValoBoli->CssClass = 'campo';
    }
    
    protected function txtMontBas2_Create() {
        $this->txtMontBas2 = new QFloatTextBox($this);
        $this->txtMontBas2->Name = 'Monto Flete';
        $this->txtMontBas2->Width = $this->intTamaCamp;
        $this->txtMontBas2->Enabled = false;
        $this->txtMontBas2->ForeColor = 'blue';
        $this->txtMontBas2->CssClass = 'campo';
    }
    
    protected function txtGastMan2_Create() {
        $this->txtGastMan2 = new QFloatTextBox($this);
        $this->txtGastMan2->Name = 'Gastos de Manejo';
        $this->txtGastMan2->Width = $this->intTamaCamp;
        $this->txtGastMan2->Enabled = false;
        $this->txtGastMan2->ForeColor = 'blue';
        $this->txtGastMan2->CssClass = 'campo';
    }
    
    protected function txtImpuImp2_Create() {
        $this->txtImpuImp2 = new QFloatTextBox($this);
        $this->txtImpuImp2->Name = 'Nacionalización';
        $this->txtImpuImp2->Width = $this->intTamaCamp;
        $this->txtImpuImp2->Enabled = false;
        $this->txtImpuImp2->ForeColor = 'blue';
        $this->txtImpuImp2->CssClass = 'campo';
    }
    
    protected function txtMontTari_Create() {
        $this->txtMontTari = new QFloatTextBox($this);
        $this->txtMontTari->Name = 'Monto de la Tarifa';
        $this->txtMontTari->Width = $this->intTamaCamp;
        $this->txtMontTari->Enabled = false;
        $this->txtMontTari->HtmlAfter = ' (Bs)';
        $this->txtMontTari->ForeColor = 'blue';
        $this->txtMontTari->CssClass = 'campo';
    }

    protected function btnLimpiar_Create() {
        $this->btnLimpiar = new QButton($this);
        $this->btnLimpiar->Text = '<i class="fa fa-refresh fa-lg"></i> Limpiar';
        $this->btnLimpiar->CssClass = 'btn btn-default';
        $this->btnLimpiar->HtmlEntities = false;
        $this->btnLimpiar->AddAction(new QClickEvent(), new QServerAction('btnLimpiar_Click'));
    }
    
    protected function btnCalcTari_Create() {
        $this->btnCalcTari = new QButton($this);
        $this->btnCalcTari->Text = '<i class="fa fa-calculator fa-lg"></i> Calcular';
        $this->btnCalcTari->CssClass = 'btn btn-primary';
        $this->btnCalcTari->HtmlEntities = false;
        $this->btnCalcTari->PrimaryButton = true;
        $this->btnCalcTari->CausesValidation = true;
        $this->btnCalcTari->AddAction(new QClickEvent(), new QAjaxAction('btnCalcTari_Click'));
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

    protected function lstTipoArti_Change() {
        if (!is_null($this->lstTipoArti->SelectedValue)) {
            if ($this->lstTipoArti->SelectedValue == 'PP') {
                $this->txtPorcPart->Enabled = true;
                $this->txtPorcPart->ForeColor = null;
                $this->txtPorcPart->Required = true;
                $this->txtPorcPart->SetFocus();
            } else {
                $this->txtPorcPart->Enabled = false;
                $this->txtPorcPart->ForeColor = 'blue';
                $this->txtPorcPart->Required = false;
                $this->txtPorcPart->Text = '';
            }
        }
    }

    protected function btnLimpiar_Click() {
        QApplication::Redirect($_SERVER['PHP_SELF']);
    }

    protected function Form_Validate() {
        $blnTodoOkey = true;
        if ($this->txtValoMerc->Text > 100) {
            if (is_null($this->lstTipoArti->SelectedValue)) {
                if (!$this->lstTipoArti->Enabled) {
                    $this->lstTipoArti->Enabled = true;
                }
                $this->txtMontBas2->Text = 0;
                $this->txtGastMan2->Text = 0;
                $this->txtImpuImp2->Text = 0;
                $this->txtMontTari->Text = 0;
                $blnTodoOkey = false;
            } else {
                $this->lblNotiUsua->Text = '';
            }
        }
        return $blnTodoOkey;
    }
    
    protected function txtValoMerc_Blur() {
        if ($this->txtValoMerc->Text > 100) {
            $this->lstTipoArti->Enabled = true;
            $this->lblNotiUsua->Text = '<i class="fa fa-info-circle fa-lg"></i> Por favor seleccione un Tipo de Artículo';
            $this->lblNotiUsua->CssClass = 'alert alert-info';
        } else {
            $this->lstTipoArti->Enabled = false;
        }
    }
    
    protected function btnCalcTari_Click() {

        $decValoMerc = $this->txtValoMerc->Text;
        $decPesoLibr = $this->txtPesoLibr->Text;
        $decAltoEnvi = $this->txtAltoEnvi->Text;
        $decAnchEnvi = $this->txtAnchEnvi->Text;
        $decLargEnvi = $this->txtLargEnvi->Text;

        $arrDatoPeso['decAltoEnvi'] = $decAltoEnvi;
        $arrDatoPeso['decAnchEnvi'] = $decAnchEnvi;
        $arrDatoPeso['decLargEnvi'] = $decLargEnvi;

        $arrPesoVolu = CalcularPesosVolumetricos($arrDatoPeso);

        $decPesoVolu = $arrPesoVolu['decPesoVolu'];

        $this->txtPesoVolu->Text = $decPesoVolu;

        if (!is_null($this->lstTipoArti->SelectedValue)) {
            if ($this->lstTipoArti->SelectedValue == 'PP') {
                $decPorcAran = $this->txtPorcPart->Text;
            } else {
                $decPorcAran = $this->lstTipoArti->SelectedValue;
            }
        } else {
            $decPorcAran = 0;
        }

        $arrDatoTari['objProdCalc'] = Producto::Load(1);
        $arrDatoTari['dttFechVige'] = date('Y-m-d');
        $arrDatoTari['decValoMerc'] = $decValoMerc;
        $arrDatoTari['decPesoLibr'] = $decPesoLibr;
        $arrDatoTari['decPesoVolu'] = $decPesoVolu;
        $arrDatoTari['decPorcAran'] = $decPorcAran; 
        
        $arrResuCalc = calcularTarifa($arrDatoTari);

        $blnTodoOkey = $arrResuCalc['blnTodoOkey'];
        $decPesoCalc = $arrResuCalc['decPesoCalc'];
        $decCostLibr = $arrResuCalc['decCostLibr'];
        $decMontBase = $arrResuCalc['decMontBase'];
        $decGastMane = $arrResuCalc['decGastMane'];
        $decMontAran = $arrResuCalc['decMontAran'];
        $decTasaAdua = $arrResuCalc['decTasaAdua'];
        $decIvaxImpo = $arrResuCalc['decIvaxImpo'];
        $decImpuImpo = $arrResuCalc['decImpuImpo'];
        $decMontTari = $arrResuCalc['decMontTari'];
        $decTasaDola = $arrResuCalc['decTasaDola'];
        $strTipoDola = $arrResuCalc['strTipoDola'];
        $decValoBoli = $arrResuCalc['decValoBoli'];

        $this->txtPesoCalc->Text = nf($decPesoCalc);
        $this->txtCostLibr->Text = nf($decCostLibr);
        $this->txtMontBase->Text = nf($decMontBase);
        $this->txtGastMane->Text = nf($decGastMane);
        $this->txtMontAran->Text = nf($decMontAran);
        $this->txtTasaAdua->Text = nf($decTasaAdua);
        $this->txtIvaxImpo->Text = nf($decIvaxImpo);
        $this->txtImpuImpo->Text = nf($decImpuImpo);
        $this->txtValoBoli->Text = nf($decValoBoli);
        $this->lblTasaDola->Text = nf($decTasaDola).' ('.$strTipoDola.')';

        $this->txtMontBas2->Text = nf($decMontBase);
        $this->txtGastMan2->Text = nf($decGastMane);
        $this->txtImpuImp2->Text = nf($decImpuImpo);
        $this->txtMontTari->Text = nf($decMontTari);

        if (!$blnTodoOkey) {
            $this->lblNotiUsua->Text = '<i class="fa fa-exclamation fa-lg"></i> Error. Verifique Tarifa';
            $this->lblNotiUsua->CssClass = 'alert alert-danger';
        }
    }

    protected function btnCancel_Click() {
        QApplication::Redirect($_SESSION['PagiBack']);
    }
   
}

if (isset($_SESSION['ProgReto'])) {
   $_SESSION['PagiBack'] = $_SESSION['ProgReto'];
   unset($_SESSION['ProgReto']); 
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// aliado_edit.tpl.php as the included HTML template file
CalcularTarifa::Run('CalcularTarifa');
?>
