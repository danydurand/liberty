<?php
//---------------------------------------------------------------------------------------
// Programa       : crear_factura.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 22/07/16 12:12 PM
// Proyecto       : newliberty
// Descripcion    : Programa que permite la gestión y control de facturación de una guía
//---------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CrearFactura extends FormularioBaseKaizen {
    //-----------------------
    // Parámetros de objetos
    //-----------------------
    protected $objGuia;
    protected $objCliePmnx;
    /**
     * @var $objFactPmnx FacturaPmn
     */
    protected $objFactPmnx;
    //----------------------
    // Parámetros regulares
    //----------------------
    protected $blnEditMode;
    protected $strNumeGuia;
    protected $strModaPago;
    protected $strTipoServ;
    protected $intNumeFact;

    //---------------------------
    // Parametros de informacion
    //---------------------------

    //---- Pre-Factura y Datos Fiscales ----
    protected $lblNumeFact;
    protected $lblCeduRifx;
    protected $lblRazoSoci;
    protected $lblDireFisc;
    protected $lblNumeTele;
    //---- Factura ----
    protected $chkTienRete;
    protected $lblFechFact;
    protected $calFechFact;
    protected $lblCreaPorx;
    protected $lblDocuFisc;
    protected $lblFactImpr;
    protected $lblMotiAnul;
    //---- Ret. ISLR ----
    protected $txtCoreIslr;
    protected $txtPorcIslr;

    protected $lblCoreIslr;
    protected $calCoreIslr;
    protected $lblPorcIslr;
    //---- Servicios ----
    protected $lblMontBase;
    protected $lblMontDcto;
    protected $lblMontFran;
    //---- Ret. IVA ----
    protected $txtCompRete;
    protected $txtPorcRete;

    protected $lblCompRete;
    protected $calCompRete;
    protected $lblPorcRete;
    //---- Otros Montos ----
    protected $lblMontSgro;
    protected $lblMontMiva;
    protected $lblMontTota;
    //---- Cobro ----
    protected $lblMontAcob;
    protected $lblMontCobr;
    protected $lblMontRest;
    //---- Items ----
    protected $dtgItemFact;

    //---------
    // Botones
    //---------

    //---- Regulares ----
    protected $btnAnulFact;
    protected $btnCobrFact;
    protected $btnImprFact;

    protected function SetupFactura() {
        $this->strNumeGuia = QApplication::QueryString('strNumeGuia');

        if (strlen($this->strNumeGuia)) {
            //--------------------------------------------------------------------
            // Cuando al programa se accesa con un numero de guia como parametro
            //--------------------------------------------------------------------
            $this->objGuia = Guia::Load($this->strNumeGuia);
            $this->objCliePmnx = ClientePmn::Load($this->objGuia->CedulaRif);
            if (!is_null($this->objGuia->FacturaId)) {
                //---------------------------------------------------------------------------
                // Si la guia ya esta asociada a una Factura, se lee dicha Factura en la BD
                //---------------------------------------------------------------------------
                $this->objFactPmnx = FacturaPmn::Load($this->objGuia->FacturaId);
                $this->blnEditMode = true;
            } else {
                //----------------------------------------------------------------------------
                // Si la guia no esta previamente asociada a una Factura, se crea un nuevo
                // registro en la tabla.
                //----------------------------------------------------------------------------
                $this->blnEditMode = false;
                $this->objFactPmnx = new FacturaPmn();
            }
            //------------------------------------------------
            // Se determina la Modalidad de pago de la Guia
            //------------------------------------------------
            if (TipoGuiaType::ToStringCorto($this->objGuia->TipoGuia) == 'PPD') {
                $this->strModaPago = 'PPD';
            } else {
                $this->strModaPago = 'COD';
            }
            $objReceDest = Counter::LoadBySiglas($this->objGuia->ReceptoriaDestino);
            if ($objReceDest) {
                $this->strTipoServ = $objReceDest->EsRuta == SinoType::SI ? 'DOM' : 'REC';
            } else {
                $this->strTipoServ = 'REC';
            }
        } else {
            //-------------------------------------------------------------------
            // Cuando el programa se accesa con un Nro de Factura como parametro
            //-------------------------------------------------------------------
            $this->intNumeFact = QApplication::QueryString('intNumeFact');
            $this->objFactPmnx = FacturaPmn::Load($this->intNumeFact);
            $this->objCliePmnx = ClientePmn::Load($this->objFactPmnx->CedulaRif);
            $this->blnEditMode = true;
        }
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupFactura();

        $this->lblTituForm->Text = 'Crear una Factura';

        //---- Pre-Factura y Datos Fiscales ----
        $this->lblNumeFact_Create();
        $this->lblCeduRifx_Create();
        $this->lblRazoSoci_Create();
        $this->lblDireFisc_Create();
        $this->lblNumeTele_Create();
        //---- Factura ----
        $this->chkTienRete_Create();
        $this->lblFechFact_Create();
        $this->calFechFact_Create();
        $this->lblCreaPorx_Create();
        $this->lblDocuFisc_Create();
        $this->lblFactImpr_Create();
        $this->lblMotiAnul_Create();
        //---- Ret. ISLR ----
        $this->txtCoreIslr_Create();
        $this->txtPorcIslr_Create();

        $this->lblCoreIslr_Create();
        $this->calCoreIslr_Create();
        $this->lblPorcIslr_Create();
        //---- Servicios ----
        $this->lblMontBase_Create();
        $this->lblMontDcto_Create();
        $this->lblMontFran_Create();
        //---- Ret. IVA ----
        $this->txtCompRete_Create();
        $this->txtPorcRete_Create();

        $this->lblCompRete_Create();
        $this->calCompRete_Create();
        $this->lblPorcRete_Create();
        //---- Otros montos ----
        $this->lblMontSgro_Create();
        $this->lblMontMiva_Create();
        $this->lblMontTota_Create();
        //---- cobro ----
        $this->lblMontACob_Create();
        $this->lblMontCobr_Create();
        $this->lblMontRest_Create();

        //---------
        // Botones
        //---------
        $this->btnSave->Text = TextoIcono('save','Guardar','F','lg');

        $this->btnAnulFact_Create();
        $this->btnCobrFact_Create();
        $this->btnImprFact_Create();

        if (!$this->blnEditMode) {
            //-------------------------------------------
            // Se crean y salvan los datos de la Factura
            //-------------------------------------------
            $this->CrearNuevaFactura();
        } else {
            $this->CargarDatosDeLaFactura();
            $this->btnImprFact->Visible = $this->FacturaValidaParaImprimir();
        }

        $this->controlDeStatus();
    }

    //---------------------
    // Creando objetos ...
    //---------------------

    //------------------------------
    //---- ... para Información ----
    //------------------------------

    //---- Pre-Factura y Datos Fiscales ----

    protected function lblNumeFact_Create() {
        $this->lblNumeFact = new QLabel($this);
        $this->lblNumeFact->Name = 'Id';
        if (!$this->blnEditMode) {
            $this->lblNumeFact->Text = '';
        } else {
            $this->lblNumeFact->Text = $this->objFactPmnx->Id;
        }
        $this->lblNumeFact->ForeColor = 'red';
    }

    protected function lblCeduRifx_Create() {
        $this->lblCeduRifx = new QLabel($this);
        $this->lblCeduRifx->Name = 'Cedula/RIF';
        $this->lblCeduRifx->Width = 90;
        $this->lblCeduRifx->Required = true;
        $this->lblCeduRifx->SetCustomAttribute('onblur', "this.value=this.value.toUpperCase()");
        if (!$this->blnEditMode) {
            if ($this->strModaPago == 'PPD') {
                $this->lblCeduRifx->Text = $this->objCliePmnx->CedulaRif;
            } else {
                $this->lblCeduRifx->Text = $this->objGuia->CedulaDestinatario;
            }
        } else {
            $this->lblCeduRifx->Text = $this->objFactPmnx->CedulaRif;
        }
    }

    protected function lblRazoSoci_Create() {
        $this->lblRazoSoci = new QLabel($this);
        $this->lblRazoSoci->Name = 'Razon Social';
        $this->lblRazoSoci->Width = 180;
        $this->lblRazoSoci->Required = true;
        $this->lblRazoSoci->SetCustomAttribute('onblur', "this.value=this.value.toUpperCase()");
        if (!$this->blnEditMode) {
            if ($this->strModaPago == 'PPD') {
                $this->lblRazoSoci->Text = $this->objCliePmnx->__toString();
            } else {
                $this->lblRazoSoci->Text = $this->objGuia->NombDest;
            }
        } else {
            $this->lblRazoSoci->Text = $this->objFactPmnx->RazonSocial;
        }
    }

    protected function lblDireFisc_Create() {
        $this->lblDireFisc = new QLabel($this);
        $this->lblDireFisc->Name = 'Direccion Fisc.';
        $this->lblDireFisc->Width = 250;
        $this->lblDireFisc->Required = true;
        $this->lblDireFisc->SetCustomAttribute('onblur', "this.value=this.value.toUpperCase()");
        if (!$this->blnEditMode) {
            if ($this->strModaPago == 'PPD') {
                $this->lblDireFisc->Text = $this->objCliePmnx->Direccion;
            } else {
                $this->lblDireFisc->Text = $this->objGuia->DireDest;
            }
        } else {
            $this->lblDireFisc->Text = $this->objFactPmnx->DireccionFiscal;
        }
    }

    protected function lblNumeTele_Create() {
        $this->lblNumeTele = new QLabel($this);
        $this->lblNumeTele->Name = 'Telefono';
        $this->lblNumeTele->Width = 100;
        $this->lblNumeTele->Required = true;
        if (!$this->blnEditMode) {
            if ($this->strModaPago == 'PPD') {
                $this->lblNumeTele->Text = $this->objCliePmnx->TelefonoMovil;
            } else {
                $this->lblNumeTele->Text = $this->objGuia->TeleDest;
            }
        } else {
            $this->lblNumeTele->Text = $this->objFactPmnx->Telefono;
        }
    }

    //---- Factura ----

    protected function chkTienRete_Create() {
        $this->chkTienRete = new QCheckBox($this);
        $this->chkTienRete->Name = 'Tiene Ret.';
        if ($this->blnEditMode) {
            $this->chkTienRete->Checked = $this->objFactPmnx->TieneRetencion ? true : false;
        }
        $this->chkTienRete->AddAction(new QChangeEvent(), new QAjaxAction('chkTienRete_Change'));
    }

    protected function lblFechFact_Create() {
        $this->lblFechFact = new QLabel($this);
        $this->lblFechFact->Name = 'Creada El';
        $this->lblFechFact->Width = 90;
        $calFechDHoy = new QDateTime(QDateTime::Now);
        if (!$this->blnEditMode) {
            $this->lblFechFact->Text = $calFechDHoy->__toString("DD/MM/YYYY");
        } else {
            $this->lblFechFact->Text = $this->objFactPmnx->CreadaEl->__toString("DD/MM/YYYY");
        }
        $this->lblFechFact->ForeColor = 'blue';
    }

    protected function calFechFact_Create() {
        $this->calFechFact = new QCalendar($this);
        $this->calFechFact->Name = 'Creada El';
        $this->calFechFact->Width = 90;
        $calFechDHoy = new QDateTime(QDateTime::Now);
        if (!$this->blnEditMode) {
            $this->calFechFact->DateTime = $calFechDHoy;
        } else {
            $this->calFechFact->DateTime = $this->objFactPmnx->CreadaEl;
        }
        $this->calFechFact->ForeColor = 'blue';
    }

    protected function lblCreaPorx_Create() {
        $this->lblCreaPorx = new QLabel($this);
        $this->lblCreaPorx->Name = 'Creada Por';
        $this->lblCreaPorx->Width = 60;
        if (!$this->blnEditMode) {
            $this->lblCreaPorx->Text = $this->objUsuario->__toString();
        } else {
            $this->lblCreaPorx->Text = $this->objFactPmnx->CreadaPorObject->LogiUsua;
        }
        $this->lblCreaPorx->Enabled = false;
        $this->lblCreaPorx->ForeColor = 'blue';
    }

    protected function lblDocuFisc_Create() {
        $this->lblDocuFisc = new QLabel($this);
        $this->lblDocuFisc->Name = 'Numero';
        $this->lblDocuFisc->Width = 80;
        if (!$this->blnEditMode) {
            $this->lblDocuFisc->Text = '';
        } else {
            $this->lblDocuFisc->Text = $this->objFactPmnx->Numero;
        }
        $this->lblDocuFisc->Enabled = false;
        $this->lblDocuFisc->ForeColor = 'blue';
    }

    protected function lblFactImpr_Create() {
        $this->lblFactImpr = new QLabel($this);
        $this->lblFactImpr->Name = 'Impresa ?';
        $this->lblFactImpr->Width = 30;
        if (!$this->blnEditMode) {
            $this->lblFactImpr->Text = '';
        } else {
            $this->lblFactImpr->Text = SinoType::ToString($this->objFactPmnx->ImpresaId);
        }
        $this->lblFactImpr->Enabled = false;
        $this->lblFactImpr->ForeColor = 'blue';
    }

    protected function lblMotiAnul_Create() {
        $this->lblMotiAnul = new QLabel($this);
        $this->lblMotiAnul->Name = 'Anulada Por';
        $this->lblMotiAnul->Width = 190;
        if (!$this->blnEditMode) {
            $this->lblMotiAnul->Text = '';
        } else {
            $this->lblMotiAnul->Text = $this->objFactPmnx->MotivoAnulacion;
        }
        $this->lblMotiAnul->Enabled = false;
        $this->lblMotiAnul->ForeColor = 'blue';
    }

    //---- Ret. ISLR ----

    protected function txtCoreIslr_Create() {
        $this->txtCoreIslr = new QTextBox($this);
        $this->txtCoreIslr->Name = 'Comp. Ret.';
        $this->txtCoreIslr->Width = 100;
        if (!$this->blnEditMode) {
            $this->txtCoreIslr->Text = '';
        } else {
            $this->txtCoreIslr->Text = $this->objFactPmnx->ComprobanteRetencionIslr;
        }
    }

    protected function txtPorcIslr_Create() {
        $this->txtPorcIslr = new QFloatTextBox($this);
        $this->txtPorcIslr->Name = '% Ret.';
        $this->txtPorcIslr->Width = 25;
        $this->txtPorcIslr->AddAction(new QKeyPressEvent(500), new QAjaxAction('txtPorcIslr_Change'));
        $this->txtPorcIslr->AddAction(new QEnterKeyEvent(), new QTerminateAction());
        $this->txtPorcIslr->AddAction(new QEscapeKeyEvent(), new QTerminateAction());
        if (!$this->blnEditMode) {
            $this->txtPorcIslr->Text = 0;
        } else {
            $this->txtPorcIslr->Text = $this->objFactPmnx->PorcentajeReteIslr;
        }
    }

    protected function lblCoreIslr_Create() {
        $this->lblCoreIslr = new QLabel($this);
        $this->lblCoreIslr->Name = 'Comp. Ret.';
        $this->lblCoreIslr->Width = 100;
        if (!$this->blnEditMode) {
            $this->lblCoreIslr->Text = '';
        } else {
            $this->lblCoreIslr->Text = $this->objFactPmnx->ComprobanteRetencionIslr;
        }
    }

    protected function calCoreIslr_Create() {
        $this->calCoreIslr = new QCalendar($this);
        $this->calCoreIslr->Name = 'Fec. Comp.';
        $this->calCoreIslr->Width = 90;
        if (!$this->blnEditMode) {
            $this->calCoreIslr->DateTime = null;
        } else {
            $this->calCoreIslr->DateTime = $this->objFactPmnx->FechaComprobanteIslr;
        }
    }

    protected function lblPorcIslr_Create() {
        $this->lblPorcIslr = new QLabel($this);
        $this->lblPorcIslr->Name = '% Ret.';
        $this->lblPorcIslr->Width = 25;
        $this->lblPorcIslr->AddAction(new QKeyPressEvent(500), new QAjaxAction('lblPorcIslr_Change'));
        $this->lblPorcIslr->AddAction(new QEnterKeyEvent(), new QTerminateAction());
        $this->lblPorcIslr->AddAction(new QEscapeKeyEvent(), new QTerminateAction());
        if (!$this->blnEditMode) {
            $this->lblPorcIslr->Text = 0;
        } else {
            $this->lblPorcIslr->Text = $this->objFactPmnx->PorcentajeReteIslr;
        }
    }

    //---- Servicios ----

    protected function lblMontBase_Create() {
        $this->lblMontBase = new QLabel($this);
        $this->lblMontBase->Name = 'Base';
        if (!$this->blnEditMode) {
            $this->lblMontBase->Text = 0;
        } else {
            $this->lblMontBase->Text = $this->objFactPmnx->MontoBase;
        }
    }

    protected function lblMontDcto_Create() {
        $this->lblMontDcto = new QLabel($this);
        $this->lblMontDcto->Name = 'Dscto.';
        if (!$this->blnEditMode) {
            $this->lblMontDcto->Text = 0;
        } else {
            $this->lblMontDcto->Text = $this->objFactPmnx->MontoDscto;
        }
    }

    protected function lblMontFran_Create() {
        $this->lblMontFran = new QLabel($this);
        $this->lblMontFran->Name = 'Franq.';
        if (!$this->blnEditMode) {
            $this->lblMontFran->Text = 0;
        } else {
            $this->lblMontFran->Text = $this->objFactPmnx->MontoFranqueo;
        }
    }

    //---- Ret. IVA ----

    protected function txtCompRete_Create() {
        $this->txtCompRete = new QTextBox($this);
        $this->txtCompRete->Name = 'Comp. Ret.';
        $this->txtCompRete->Width = 100;
        if (!$this->blnEditMode) {
            $this->txtCompRete->Text = '';
        } else {
            $this->txtCompRete->Text = $this->objFactPmnx->ComprobanteRetencion;
        }
    }

    protected function calCompRete_Create() {
        $this->calCompRete = new QCalendar($this);
        $this->calCompRete->Name = 'Fec. Comp.';
        $this->calCompRete->Width = 90;
        if (!$this->blnEditMode) {
            $this->calCompRete->DateTime = null;
        } else {
            $this->calCompRete->DateTime = $this->objFactPmnx->FechaComprobante;
        }
    }

    protected function txtPorcRete_Create() {
        $this->txtPorcRete = new QFloatTextBox($this);
        $this->txtPorcRete->Name = '% Ret.';
        $this->txtPorcRete->Width = 25;
        $this->txtPorcRete->AddAction(new QKeyPressEvent(500), new QAjaxAction('txtPorcRete_Change'));
        $this->txtPorcRete->AddAction(new QEnterKeyEvent(), new QTerminateAction());
        $this->txtPorcRete->AddAction(new QEscapeKeyEvent(), new QTerminateAction());
        if (!$this->blnEditMode) {
            $this->txtPorcRete->Text = 0;
        } else {
            $this->txtPorcRete->Text = $this->objFactPmnx->PorcentajeReteIva;
        }
    }

    protected function lblCompRete_Create() {
        $this->lblCompRete = new QLabel($this);
        $this->lblCompRete->Name = 'Comp. Ret.';
        $this->lblCompRete->Width = 100;
        if (!$this->blnEditMode) {
            $this->lblCompRete->Text = '';
        } else {
            $this->lblCompRete->Text = $this->objFactPmnx->ComprobanteRetencion;
        }
    }

//    protected function calCompRete_Create() {
//        $this->calCompRete = new QCalendar($this);
//        $this->calCompRete->Name = 'Fec. Comp.';
//        $this->calCompRete->Width = 90;
//        if (!$this->blnEditMode) {
//            $this->calCompRete->DateTime = null;
//        } else {
//            $this->calCompRete->DateTime = $this->objFactPmnx->FechaComprobante;
//        }
//    }

    protected function lblPorcRete_Create() {
        $this->lblPorcRete = new QLabel($this);
        $this->lblPorcRete->Name = '% Ret.';
        $this->lblPorcRete->Width = 25;
        $this->lblPorcRete->AddAction(new QKeyPressEvent(500), new QAjaxAction('lblPorcRete_Change'));
        $this->lblPorcRete->AddAction(new QEnterKeyEvent(), new QTerminateAction());
        $this->lblPorcRete->AddAction(new QEscapeKeyEvent(), new QTerminateAction());
        if (!$this->blnEditMode) {
            $this->lblPorcRete->Text = 0;
        } else {
            $this->lblPorcRete->Text = $this->objFactPmnx->PorcentajeReteIva;
        }
    }

    //---- Otros montos ----

    protected function lblMontSgro_Create() {
        $this->lblMontSgro = new QLabel($this);
        $this->lblMontSgro->Name = 'Seguro';
        if (!$this->blnEditMode) {
            $this->lblMontSgro->Text = 0;
        } else {
            $this->lblMontSgro->Text = $this->objFactPmnx->MontoSeguro;
        }
    }

    protected function lblMontMiva_Create() {
        $this->lblMontMiva = new QLabel($this);
        $this->lblMontMiva->Name = 'I.V.A.';
        if (!$this->blnEditMode) {
            $this->lblMontMiva->Text = 0;
        } else {
            $this->lblMontMiva->Text = $this->objFactPmnx->MontoIva;
        }
    }

    protected function lblMontTota_Create() {
        $this->lblMontTota = new QLabel($this);
        $this->lblMontTota->Name = 'Total';
        if (!$this->blnEditMode) {
            $this->lblMontTota->Text = 0;
        } else {
            $this->lblMontTota->Text = $this->objFactPmnx->MontoTotal;
        }
    }

    //---- Cobro ----

    protected function lblMontAcob_Create() {
        $this->lblMontAcob = new QLabel($this);
        $this->lblMontAcob->Name = 'Monto';
        if (!$this->blnEditMode) {
            $this->lblMontAcob->Text = 0;
        } else {
            $this->lblMontAcob->Text = $this->objFactPmnx->MontoTotal;
        }
    }

    protected function lblMontCobr_Create() {
        $this->lblMontCobr = new QLabel($this);
        $this->lblMontCobr->Name = 'Cobrado';
        if (!$this->blnEditMode) {
            $this->lblMontCobr->Text = 0;
        } else {
            $this->lblMontCobr->Text = $this->objFactPmnx->MontoCobrado;
        }
    }

    protected function lblMontRest_Create() {
        $this->lblMontRest = new QLabel($this);
        $this->lblMontRest->Name = 'Deuda';
        if (!$this->blnEditMode) {
            $this->lblMontRest->Text = 0;
        } else {
            $decMontRest = $this->objFactPmnx->MontoTotal - $this->objFactPmnx->MontoCobrado;
            $this->lblMontRest->Text = (string) $decMontRest;
        }
    }

    //---- Items ----

    protected function dtgItemFact_Create() {
        $this->dtgItemFact = new QDataGrid($this);
        $this->dtgItemFact->CellPadding = 0;
        $this->dtgItemFact->CellSpacing = 0;
        $this->dtgItemFact->FontSize    = 12;

        $colCodiItem = new QDataGridColumn('ID', '<?= $_ITEM->Id ?>');
        $colCodiItem->Width = 100;
        $colCodiItem->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colCodiItem);

        $colItemGuia = new QDataGridColumn('Guia', '<?= $_ITEM->GuiaId ?>');
        $colItemGuia->Width = 150;
        $colItemGuia->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemGuia);

        $colItemBase = new QDataGridColumn('Mto Base', '<?= $_ITEM->MontoBase ?>');
        $colItemBase->Width = 150;
        $colItemBase->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemBase);

        $colItemPdes = new QDataGridColumn('% Dscto', '<?= $_ITEM->PorcentajeDscto ?>');
        $colItemPdes->Width = 150;
        $colItemPdes->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemPdes);

        $colItemMdes = new QDataGridColumn('Dscto', '<?= $_ITEM->MontoDscto ?>');
        $colItemMdes->Width = 150;
        $colItemMdes->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemMdes);

        $colItemFran = new QDataGridColumn('F.Post', '<?= $_ITEM->MontoFranqueo ?>');
        $colItemFran->Width = 150;
        $colItemFran->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemFran);

        $colItemPiva = new QDataGridColumn('% IVA', '<?= $_ITEM->PorcentajeIva ?>');
        $colItemPiva->Width = 150;
        $colItemPiva->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemPiva);

        $colItemMiva = new QDataGridColumn('I.V.A.', '<?= $_ITEM->MontoIva ?>');
        $colItemMiva->Width = 150;
        $colItemMiva->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemMiva);

        $colItemSgro = new QDataGridColumn('Sgro', '<?= $_ITEM->MontoSeguro ?>');
        $colItemSgro->Width = 150;
        $colItemSgro->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colItemSgro);

        $colitemTota = new QDataGridColumn('Total', '<?= $_ITEM->MontoTotal ?>');
        $colitemTota->Width = 150;
        $colitemTota->HtmlEntities = false;
        $this->dtgItemFact->AddColumn($colitemTota);

        // Let's pre-default the sorting by id (column index #0) and use AJAX
        $this->dtgItemFact->SortColumnIndex = 0;
        $this->dtgItemFact->UseAjax = true;

        // Specify the DataBinder method for the DataGrid
        $this->dtgItemFact->SetDataBinder('dtgItemFact_Bind');
    }

    //---------------------------
    //---- .... para botones ----
    //---------------------------

    protected function btnAnulFact_Create() {
        $this->btnAnulFact = new QButtonD($this);
        if ($this->objFactPmnx->ImpresaId == SinoType::NO) {
            $this->btnAnulFact->Text = TextoIcono('ban','Anular','F','lg');
        } else {
            $this->btnAnulFact->Text = TextoIcono('exclamation-circle','NDC','F','lg');
        }
        $this->btnAnulFact->Width = 85;
        $this->btnAnulFact->AddAction(new QClickEvent(), new QAjaxAction('btnAnulFact_Click'));
    }

    protected function btnCobrFact_Create() {
        $this->btnCobrFact = new QButtonI($this);
        $this->btnCobrFact->Text = TextoIcono('paypal','Cobrar','F','lg');
        $this->btnCobrFact->Width = 85;
        $this->btnCobrFact->AddAction(new QClickEvent(), new QAjaxAction('btnCobrFact_Click'));
        $this->btnCobrFact->CausesValidation = false;
    }

    protected function btnImprFact_Create() {
        $this->btnImprFact = new QButtonP($this);
        $this->btnImprFact->Text = TextoIcono('print','C.D.I.','F','lg');
        $this->btnImprFact->AddAction(new QClickEvent(), new QAjaxAction('btnImprFact_Click'));
    }

    //-----------------------------------
    // Funciones asociadas a los objetos
    //-----------------------------------

    protected function chkTienRete_Change() {
        if ($this->chkTienRete->Checked) {
            $this->btnImprFact->Visible = true;
        } else {
            if ($this->lblMontRest->Text > 0) {
                $this->btnImprFact->Visible = false;
            } else {
                if (strlen($this->lblDocuFisc->Text) == 0) {
                    $this->btnImprFact->Visible = false;
                }
            }
        }
    }

    protected function txtPorcIslr_Change() {
        if (is_numeric($this->txtPorcIslr->Text) || strlen($this->txtPorcIslr->Text) == 0) {
            $decPorcIslr = $this->txtPorcIslr->Text;
            $decMontRete = $decPorcIslr * $this->objFactPmnx->MontoBase / 100;
            $this->lblMontBase->Text = round($this->objFactPmnx->MontoBase - $decMontRete,2);
            //--------------------------------------
            // Se actualiza la Factura en la BD
            //--------------------------------------
            $this->objFactPmnx->ComprobanteRetencionIslr = $this->txtCoreIslr->Text;
            $this->objFactPmnx->FechaComprobanteIslr = new QDateTime($this->calCoreIslr->DateTime);
            $this->objFactPmnx->PorcentajeReteIslr = $decPorcIslr;
            $this->objFactPmnx->ActualizarMontos();
            $this->MostrarMontos();
        }
    }

    protected function txtPorcRete_Change() {
        if (is_numeric($this->txtPorcRete->Text) || strlen($this->txtPorcRete->Text) == 0) {
            $decPorcRete = $this->txtPorcRete->Text;
            $decMontRete = $decPorcRete * $this->objFactPmnx->MontoIva / 100;
            $this->lblMontMiva->Text = round($this->objFactPmnx->MontoIva - $decMontRete,2);
            //--------------------------------------
            // Se actualiza la Factura en la BD
            //--------------------------------------
            $this->objFactPmnx->ComprobanteRetencion = $this->txtCompRete->Text;
            $this->objFactPmnx->FechaComprobante = new QDateTime($this->calCompRete->DateTime);
            $this->objFactPmnx->PorcentajeReteIva = $decPorcRete;
            $this->objFactPmnx->ActualizarMontos();
            $this->MostrarMontos();
        }
    }

    protected function btnSave_Click() {
        $strNombProc = 'Creando Factura Expreso Nacional';
        $objProcEjec = CrearProceso($strNombProc);
        $mixErroOrig = error_reporting();
        error_reporting(0);
        try {
            $this->objFactPmnx->CedulaRif        = $this->lblCeduRifx->Text;
            $this->objFactPmnx->RazonSocial      = QuitarAmpersand($this->lblRazoSoci->Text);
            $this->objFactPmnx->DireccionFiscal  = $this->lblDireFisc->Text;
            $this->objFactPmnx->Telefono         = $this->lblNumeTele->Text;
            $this->objFactPmnx->TieneRetencion   = $this->chkTienRete->Checked ? 1 : 0;
            $this->objFactPmnx->Save();
        } catch (Exception $e) {
            $this->mensaje($e->getMessage(),'m','d','',__iHAND__);
            $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
            $arrParaErro['NumeRefe'] = 'Factura Exp Nac: '.$this->lblNumeFact->Text;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = 'Falló la creación de la Factura';
            GrabarError($arrParaErro);
            return;
        }
        //------------------------------------------------------------------
        // La razon social de la factura, puede ser diferente al remitente
        // y al destinatario de la guia, por ese motivo, se revisa la
        // existencia en la base de datos y en caso de no existir, se crea
        //------------------------------------------------------------------
        $objCliePmnx = ClientePmn::Load($this->lblCeduRifx->Text);
        try {
            if (!$objCliePmnx) {
                $objCliePmnx = new ClientePmn();
                $objCliePmnx->SucursalId    = $this->objUsuario->CodiEsta;
                $objCliePmnx->RegistradoPor = $this->objUsuario->CodiUsua;
                $objCliePmnx->RegistradoEl  = new QDateTime(QDateTime::Now);
            }
            $objCliePmnx->CedulaRif     = $this->lblCeduRifx->Text;
            $objCliePmnx->Nombre        = $this->lblRazoSoci->Text;
            $objCliePmnx->TelefonoFijo  = $this->lblNumeTele->Text;
            $objCliePmnx->TelefonoMovil = $this->lblNumeTele->Text;
            $objCliePmnx->Direccion     = $this->lblDireFisc->Text;
            $objCliePmnx->Save();
        } catch (Exception $e) {
            $this->mensaje($e->getMessage(),'m','d','',__iHAND__);
            $arrParaErro['ProcIdxx'] = $objProcEjec->Id;
            $arrParaErro['NumeRefe'] = 'Cliente Exp Nac: '.$this->lblCeduRifx->Text;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = 'Falló el Save del Cliente Exp Nac';
            GrabarError($arrParaErro);
        }
        //---------------------------------------------------------------
        // Se actualiza la guia asociandola con el Id de la Pre-Factura
        //---------------------------------------------------------------
        if (!$this->blnEditMode) {
            $this->objGuia->FacturaId = $this->objFactPmnx->Id;
            $this->objGuia->Save();
        }
        //----------------------------------------------------------------
        // Se activan los botones que permiten operar con la Pre-Factura
        //----------------------------------------------------------------
        $this->btnAnulFact->Visible = true;
        $this->btnCobrFact->Visible = true;
        //-------------------------------------------------------------
        // Una regla de negocio establece que, si la guia es COD, con
        // Entrega a Domicilio y con un monto inferior a Bs. 2000
        // entonces se podra imprimir la Factura, sin haberla cobrado
        //-------------------------------------------------------------
        // $this->btnImprFact->Visible = $this->FacturaValidaParaImprimir();
        //-----------------------------------------------------------
        // Se activa el boton que permite agregar nuevos Items
        //-----------------------------------------------------------
        $this->blnEditMode = true;
        error_reporting($mixErroOrig);
    }

    protected function btnAnulFact_Click($strFormId, $strControlId, $strParameter) {
        //--------------------------------------------------------------------------
        // Si el registro no esta "Impreso", se trata realmente de una pre-factura
        //--------------------------------------------------------------------------
        if ($this->objFactPmnx->ImpresaId == SinoType::NO) {
            $this->btnCancel_Click();
        } else {
            //--------------------------------------------------------------------------
            // Si el registro esta "Impreso", se debe emitir una Nota de Credito
            //--------------------------------------------------------------------------
            QApplication::Redirect(__SIST__.'/crear_nota_credito.php?intFactNdcx='.$this->objFactPmnx->Id);            
        }
   }

    protected function btnCancel_Click() {
        if ($this->objFactPmnx->ImpresaId == SinoType::NO) {
            $this->objFactPmnx->BorrarFactura();
        }

        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    protected function btnCobrFact_Click($strFormId, $strControlId, $strParameter) {
        QApplication::Redirect(__SIST__.'/registrar_pago.php/'.$this->objFactPmnx->Id);
    }

    protected function btnImprFact_Click() {
        //------------------------------------------
        // Se muestran los campos en la pantalla
        //------------------------------------------
        $this->objFactPmnx       = FacturaPmn::Load($this->lblNumeFact->Text);
        $this->lblDocuFisc->Text = $this->objFactPmnx->Numero;
        $this->lblFactImpr->Text = SinoType::ToString($this->objFactPmnx->ImpresaId);
        $this->controlDeStatus();
        $this->dtgItemFact->Refresh();
    }

    protected function dtgItemFact_Bind() {
        $objClauWher = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::ItemFacturaPmn()->FacturaId, $this->lblNumeFact->Text);
        $arrItemFact = ItemFacturaPmn::QueryArray(QQ::AndCondition($objClauWher));

        // Bind the datasource to the datagrid
        $this->dtgItemFact->DataSource = $arrItemFact;
    }

    protected function controlDeStatus() {
        if ($this->lblFactImpr->Text == 'SI') {
            //----------------------------------------------------------------------
            // Si la Factura esta Impresa, no se podran alterar los datos fiscales
            //----------------------------------------------------------------------
            $this->lblCeduRifx->Enabled = false;
            $this->lblCeduRifx->ForeColor = 'blue';
            $this->lblRazoSoci->Enabled = false;
            $this->lblRazoSoci->ForeColor = 'blue';
            $this->lblDireFisc->Enabled = false;
            $this->lblDireFisc->ForeColor = 'blue';
            $this->lblNumeTele->Enabled = false;
            $this->lblNumeTele->ForeColor = 'blue';
            $this->btnSave->Visible = false;
            $this->btnAnulFact->Text = TextoIcono('exclamation-circle','NDC','F','lg');
        }
        if (strlen($this->lblMotiAnul->Text) > 0) {
            //----------------------------------------------------------------------
            // Si la Factura esta Anulada, no se podran alterar los datos fiscales
            //----------------------------------------------------------------------
            $this->lblCeduRifx->Enabled = false;
            $this->lblCeduRifx->ForeColor = 'blue';
            $this->lblRazoSoci->Enabled = false;
            $this->lblRazoSoci->ForeColor = 'blue';
            $this->lblDireFisc->Enabled = false;
            $this->lblDireFisc->ForeColor = 'blue';
            $this->lblNumeTele->Enabled = false;
            $this->lblNumeTele->ForeColor = 'blue';
            //------------------------------------------------------
            // Tampoco se podra Guardar, Anular, Imprimir o Cobrar
            //------------------------------------------------------
            $this->btnSave->Visible = false;
            $this->btnImprFact->Visible = false;
            $this->btnCobrFact->Visible = false;
            //-------------------------------------------------------
            // Tampoco se podran digitar datos de las Retenciones
            //-------------------------------------------------------
            $this->lblCoreIslr->Enabled = false;
            $this->lblCoreIslr->ForeColor = 'blue';
            $this->calCoreIslr->Enabled = false;
            $this->calCoreIslr->ForeColor = 'blue';
            $this->lblPorcIslr->Enabled = false;
            $this->lblPorcIslr->ForeColor = 'blue';
            $this->lblCompRete->Enabled = false;
            $this->lblCompRete->ForeColor = 'blue';
            $this->calCompRete->Enabled = false;
            $this->calCompRete->ForeColor = 'blue';
            $this->lblPorcRete->Enabled = false;
            $this->lblPorcRete->ForeColor = 'blue';
            //---------------------------------------------------
            // Tampoco se podran editar los Items de la Factura
            //---------------------------------------------------
            $this->chkTienRete->Enabled = false;
            $this->chkTienRete->ForeColor = 'blue';
        }
    }

    //------------------------------
    // Otras funciones del programa
    //------------------------------
    protected function CrearNuevaFactura() {
        //----------------------------------------------------
        // Se recalcula el IVA y Tarifa de la Guía a asociar.
        //----------------------------------------------------
//        $arrCalcTari   = CalcularTarifaPmnDeLaGuia($this->objGuia);
//        $blnTodoOkey   = $arrCalcTari['blnTodoOkey'];
//        $this->objGuia = $arrCalcTari['objGuiaCalc'];
        $blnTodoOkey = true;
        if ($blnTodoOkey) {
            //---------------------------------------------
            // Se crea un registro en la tabla factura
            //---------------------------------------------
            $this->UpdateFieldsFactura();
            $this->objFactPmnx->Save();
            $this->lblNumeFact->Text = $this->objFactPmnx->Id;
            //-----------------------------------------------------------------------------
            // La guia que entra como parametro, se agrega como primer item de la factura
            //-----------------------------------------------------------------------------
            $this->AgregarPrimerItemFactura();
            $this->dtgItemFact_Create();
            //---------------------------------------------------------------
            // Se actualiza la guia asociandola con el Id de la Pre-Factura
            //---------------------------------------------------------------
            $this->objGuia->FacturaId = $this->objFactPmnx->Id;
            $this->objGuia->Save();
            //-----------------------------------------------------
            // Se actualizan y muestran los montos de la factura
            //-----------------------------------------------------
            $this->objFactPmnx->ActualizarMontos();
            $this->MostrarMontos();
        }
    }

    protected function CargarDatosDeLaFactura() {
        $this->dtgItemFact_Create();
        $this->objFactPmnx->ActualizarMontos();
        $this->MostrarMontos();
    }

    protected function UpdateFieldsFactura() {
        $this->objFactPmnx->CedulaRif          = $this->lblCeduRifx->Text;
        $this->objFactPmnx->RazonSocial        = QuitarAmpersand($this->lblRazoSoci->Text);
        $this->objFactPmnx->DireccionFiscal    = $this->lblDireFisc->Text;
        $this->objFactPmnx->Telefono           = $this->lblNumeTele->Text;
        $this->objFactPmnx->Numero             = null;
        $this->objFactPmnx->MaquinaFiscal      = null;
        $this->objFactPmnx->FechaImpresion     = null;
        $this->objFactPmnx->HoraImpresion      = null;
        $this->objFactPmnx->MontoBase          = 0;
        $this->objFactPmnx->MontoFranqueo      = 0;
        $this->objFactPmnx->MontoIva           = 0;
        $this->objFactPmnx->MontoSeguro        = 0;
        $this->objFactPmnx->MontoOtros         = 0;
        $this->objFactPmnx->MontoTotal         = 0;
        $this->objFactPmnx->SucursalId         = $this->objUsuario->CodiEsta;
        $this->objFactPmnx->ReceptoriaId       = unserialize($_SESSION['CodiRece']);
        $this->objFactPmnx->CajaId             = 1;
        $this->objFactPmnx->CreadaPor          = $this->objUsuario->CodiUsua;
        $this->objFactPmnx->CreadaEl           = $this->calFechFact->DateTime;
        $this->objFactPmnx->Estatus            = 'P';
        $this->objFactPmnx->ImpresaId          = SinoType::NO;
        $this->objFactPmnx->AnuladaPor         = '';
        $this->objFactPmnx->AnuladaEl          = null;
        $this->objFactPmnx->MotivoAnulacion    = '';
        $this->objFactPmnx->PorcentajeReteIva  = 0;
        $this->objFactPmnx->MontoReteIva       = 0;
        $this->objFactPmnx->PorcentajeReteIslr = 0;
        $this->objFactPmnx->MontoReteIslr      = 0;
        $this->objFactPmnx->MontoDscto         = 0;
    }

    protected function AgregarPrimerItemFactura() {
        $objItemFact = new ItemFacturaPmn();
        $objItemFact->FacturaId       = $this->objFactPmnx->Id;
        $objItemFact->GuiaId          = $this->objGuia->NumeGuia;
        $objItemFact->MontoBase       = $this->objGuia->MontoBase;
        $objItemFact->PorcentajeDscto = 0;
        $objItemFact->MontoDscto      = 0;
        $objItemFact->MontoFranqueo   = $this->objGuia->MontoFranqueo;
        $objItemFact->PorcentajeIva   = $this->objGuia->PorcentajeIva;
        $objItemFact->MontoIva        = $this->objGuia->MontoIva;
        $objItemFact->MontoSeguro     = $this->objGuia->MontoSeguro;
        $objItemFact->MontoOtros      = $this->objGuia->MontoOtros;
        $objItemFact->MontoTotal      = $this->objGuia->MontoTotal;
        $objItemFact->Save();
    }

    protected function MostrarMontos() {
        $this->lblMontBase->Text = (string) $this->objFactPmnx->MontoBase;
        $this->lblMontFran->Text = (string) $this->objFactPmnx->MontoFranqueo;
        $this->lblMontSgro->Text = (string) $this->objFactPmnx->MontoSeguro;
        $this->lblMontMiva->Text = (string) $this->objFactPmnx->MontoIva;
        $this->lblMontTota->Text = (string) $this->objFactPmnx->MontoTotal;

        $this->lblMontAcob->Text = (string) $this->objFactPmnx->MontoTotal;
        $this->lblMontCobr->Text = (string) $this->objFactPmnx->MontoCobrado;
        $decMontRest = $this->objFactPmnx->MontoTotal - $this->objFactPmnx->MontoCobrado;
        // $this->lblMontRest->Text = str_replace('.', ',', $decMontRest);
        $this->lblMontRest->Text = (string) $decMontRest;

        if ($this->lblMontRest->Text == 0 && $this->objFactPmnx->ImpresaId == SinoType::NO) {
            $this->btnImprFact->Visible = true;
        } else {
            $this->btnImprFact->Visible = false;
        }

    }

    protected function FacturaValidaParaImprimir() {
        $blnImprFact = true;
        $decRutaMaxi = unserialize($_SESSION['RutaMaxi']);
        if (strlen($this->objFactPmnx->Numero) == 0) {
            if ($this->objFactPmnx->MontoTotal <= $decRutaMaxi) {
                if ($this->strModaPago == 'COD') {
                    if ($this->strTipoServ == 'DOM') {
                        $blnImprFact = true;
                    }
                } else {
                    $blnImprFact = true;
                }
            }
        } else {
            $blnImprFact = false;
        }
        return $blnImprFact;
    }
}

CrearFactura::Run('CrearFactura');