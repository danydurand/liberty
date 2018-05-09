<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__ . '/FormularioBaseKaizen.class.php');

class GuiaListNew extends FormularioBaseKaizen {
    /**
     * @var $objUsuario UsuarioConnect
     */
    protected $objUsuario;
    protected $dtgGuiaClie;

    protected $btnMostFilt;
    protected $btnFiltDhoy;
    protected $btnFiltPend;
    protected $btnFiltTran;
    protected $btnFiltEntr;
    protected $btnFiltToda;

    protected $btnMostImpr;
    protected $btnImprMani;
    protected $btnImprLote;
    protected $btnExpoExce;

    protected $objWaitIcon;

    protected function Form_Create() {
        parent::Form_Create();

        $this->objUsuario  = unserialize($_SESSION['User']);
        $this->objWaitIcon = new QWaitIcon($this);

        $this->lblTituForm->Text = 'Lista de Guias';

        if (!isset($_SESSION['FiltGuia'])) {
            $_SESSION['FiltGuia'] = '';
        }

        $this->btnMostFilt_Create();
        $this->btnFiltDhoy_Create();
        $this->btnFiltPend_Create();
        $this->btnFiltTran_Create();
        $this->btnFiltEntr_Create();
        $this->btnFiltToda_Create();

        $this->btnMostImpr_Create();
        $this->btnImprMani_Create();
        $this->btnImprLote_Create();
        $this->btnExpoExce_Create();

        $this->dtgGuiaClie_Create();

        $this->btnCancel->Visible = false;


    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    protected function btnCancel_Create() {
        $this->btnCancel = new QButton($this);
        $this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i>';
        $this->btnCancel->AddAction(new QClickEvent(), new QServerAction('btnCancel_Click'));
        $this->btnCancel->CssClass = 'btn btn-warning btn-sm';
        $this->btnCancel->HtmlEntities = 'false';
        $this->btnCancel->Visible = true;
        $this->btnCancel->CausesValidation = false;
    }

    protected function btnMostFilt_Create() {
        $this->btnMostFilt = new QButtonS($this);
        $this->btnMostFilt->Text = TextoIcono('filter fa-lg','Filtros','F','lg');
        $this->btnMostFilt->AddAction(new QClickEvent(), new QAjaxAction('btnMostFilt_Click'));
    }

    protected function btnFiltDhoy_Create() {
        $this->btnFiltDhoy = new QButtonS($this);
        $this->btnFiltDhoy->Text = TextoIcono('sun-o','De Hoy','F','lg');
        $this->btnFiltDhoy->ActionParameter = 'H';
        $this->btnFiltDhoy->AddAction(new QClickEvent(), new QAjaxAction('btnFiltGuia_Click'));
        $this->btnFiltDhoy->Visible = false;
    }

    protected function btnFiltPend_Create() {
        $this->btnFiltPend = new QButtonD($this);
        $this->btnFiltPend->Text = TextoIcono('dot-circle-o','Por Recolectar','F','lg');
        $this->btnFiltPend->ActionParameter = 'P';
        $this->btnFiltPend->AddAction(new QClickEvent(), new QAjaxAction('btnFiltGuia_Click'));
        $this->btnFiltPend->Visible = false;
    }

    protected function btnFiltTran_Create() {
        $this->btnFiltTran = new QButtonP($this);
        $this->btnFiltTran->Text = TextoIcono('truck','En Tránsito','F','lg');
        $this->btnFiltTran->ActionParameter = 'T';
        $this->btnFiltTran->AddAction(new QClickEvent(), new QAjaxAction('btnFiltGuia_Click'));
        $this->btnFiltTran->Visible = false;
    }

    protected function btnFiltEntr_Create() {
        $this->btnFiltEntr = new QButtonW($this);
        $this->btnFiltEntr->Text = TextoIcono('check','Entregadas','F','lg');
        $this->btnFiltEntr->ActionParameter = 'E';
        $this->btnFiltEntr->AddAction(new QClickEvent(), new QAjaxAction('btnFiltGuia_Click'));
        $this->btnFiltEntr->Visible = false;
    }

    protected function btnFiltToda_Create() {
        $this->btnFiltToda = new QButtonI($this);
        $this->btnFiltToda->Text = TextoIcono('align-justify','Todas','F','lg');
        $this->btnFiltToda->ActionParameter = 'A';
        $this->btnFiltToda->AddAction(new QClickEvent(), new QAjaxAction('btnFiltGuia_Click'));
        $this->btnFiltToda->Visible = false;
    }

    protected function btnMostImpr_Create() {
        $this->btnMostImpr = new QButtonI($this);
        $this->btnMostImpr->Text = TextoIcono('print fa-lg','Opciones de Impresion');
        $this->btnMostImpr->AddAction(new QClickEvent(), new QServerAction('btnMostImpr_Click'));
        $this->btnMostImpr->Visible = true;
    }

    protected function btnImprMani_Create() {
        $this->btnImprMani = new QButtonS($this);
        $this->btnImprMani->Text = TextoIcono('file fa-lg','Manifiesto');
        $this->btnImprMani->AddAction(new QClickEvent(), new QServerAction('btnImprMani_Click'));
        $this->btnImprMani->Visible = false;
    }

    protected function btnImprLote_Create() {
        $this->btnImprLote = new QButtonP($this);
        $this->btnImprLote->Text = TextoIcono('clone fa-lg','Guías Individuales');
        $this->btnImprLote->AddAction(new QClickEvent(), new QServerAction('btnImprLote_Click'));
        $this->btnImprLote->Visible = false;
    }

    protected function btnExpoExce_Create() {
        $this->btnExpoExce = new QButtonP($this);
        $this->btnExpoExce->Text = TextoIcono('download fa-lg','Exportar XLS');
        $this->btnExpoExce->AddAction(new QClickEvent(), new QServerAction('btnExpoExce_Click'));
        $this->btnExpoExce->Visible = true;
    }

    protected function dtgGuiaClie_Create() {
        $this->dtgGuiaClie = new GuiaDataGrid($this);
        $this->dtgGuiaClie->FontSize = 12;
        $this->dtgGuiaClie->ShowFilter = false;

        $this->dtgGuiaClie->CssClass = 'datagrid';
        $this->dtgGuiaClie->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgGuiaClie->Paginator = new QPaginator($this->dtgGuiaClie);
        $this->dtgGuiaClie->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        $this->dtgGuiaClie->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgGuiaClie->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $this->dtgGuiaClie->RowActionParameterHtml = '<?= $_ITEM->NumeGuia ?>';
        $this->dtgGuiaClie->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiaRowx_Click'));

        $colStatGuia = new QDataGridColumn('ST', '<?= $_FORM->StatusColumnRender($_ITEM) ?>');
        $colStatGuia->HtmlEntities = false;
        $colStatGuia->Width        = 10;
        $this->dtgGuiaClie->AddColumn($colStatGuia);

        $colNumeGuia = $this->dtgGuiaClie->MetaAddColumn('NumeGuia');
        $colNumeGuia->Name = 'Guía';

        $colFechGuia = new QDataGridColumn('Fecha','<?= $_ITEM->FechGuia->__toString("DD/MM/YYYY") ?>');
        $colFechGuia->OrderByClause = QQ::OrderBy(QQN::Guia()->FechGuia, false);
        $colFechGuia->ReverseOrderByClause = QQ::OrderBy(QQN::Guia()->FechGuia);
        $this->dtgGuiaClie->AddColumn($colFechGuia);

        $colOrigGuia = $this->dtgGuiaClie->MetaAddColumn(QQN::Guia()->EstaOrig);
        $colOrigGuia->Name = 'Orig';

        $colDestGuia = $this->dtgGuiaClie->MetaAddColumn(QQN::Guia()->EstaDest);
        $colDestGuia->Name = 'Dest';

        $colNombDest = new QDataGridColumn('DESTINATARIO','<?= $_FORM->dtgNombDest_Render($_ITEM) ?>');
        $this->dtgGuiaClie->AddColumn($colNombDest);

        $colStatGuia = new QDataGridColumn('ULTIMO ESTATUS','<?= $_FORM->dtgDescStat_Render($_ITEM) ?>');
        $this->dtgGuiaClie->AddColumn($colStatGuia);

        $colSucuCkpt = new QDataGridColumn('SUC','<?= $_FORM->dtgEstaCkpt_Render($_ITEM); ?>');
        $colSucuCkpt->Name = 'SUC';
        $this->dtgGuiaClie->AddColumn($colSucuCkpt);

        $colFechGuia = new QDataGridColumn('F. ESTATUS','<?= $_FORM->dtgFechCkpt_Render($_ITEM); ?>');
        $colFechGuia->OrderByClause = QQ::OrderBy(QQN::Guia()->FechCkpt, false);
        $colFechGuia->ReverseOrderByClause = QQ::OrderBy(QQN::Guia()->FechCkpt);
        $this->dtgGuiaClie->AddColumn($colFechGuia);

        $colHoraCkpt = new QDataGridColumn('H. ESTATUS','<?= $_FORM->dtgHoraCkpt_Render($_ITEM); ?>');
        $this->dtgGuiaClie->AddColumn($colHoraCkpt);

        $colUsuaCrea = $this->dtgGuiaClie->MetaAddColumn('UsuarioCreacion');
        $colUsuaCrea->Name = 'CRDA POR';

        $this->dtgGuiaClie->SetDataBinder('dtgGuiaClie_Bind');
    }

    protected function dtgGuiaClie_Bind() {
        $dttFechLimi   = SumaRestaDiasAFecha(FechaDeHoy(),180,'-');
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Guia()->CodiClie,$this->objUsuario->Cliente->CodiClie);
        $objClauWher[] = QQ::Equal(QQN::Guia()->Anulada,0);
        $objClauWher[] = QQ::GreaterThan(QQN::Guia()->FechGuia,$dttFechLimi);

        $this->lblTituForm->Text = 'Guías';
        $strTituFilt = '';
        if (isset($_SESSION['FiltGuia'])) {
            switch ($_SESSION['FiltGuia']) {
                case 'H':   // De Hoy
                    $objClauWher[] = QQ::Equal(QQN::Guia()->FechGuia,date("Y-m-d"));
                    $strTituFilt = ' (DE HOY)';
                    break;
                case 'P':   // Pendientes por Recolectar
                    $arrCodiCkpt = array('NR','RP');
                    $objClauWher[] = QQ::In(QQN::Guia()->CodiCkpt,$arrCodiCkpt);
                    $strTituFilt = ' (POR RECOLECTAR)';
                    break;
                case 'T':   // Guias En Transito
                    $arrCodiCkpt   = array('NR','RP','OK');
                    $objClauWher[] = QQ::NotIn(QQN::Guia()->CodiCkpt,$arrCodiCkpt);
                    $strTituFilt = ' (EN TRÁNSITO)';
                    break;
                case 'E':   // Entregadas
                    $objClauWher[] = QQ::Equal(QQN::Guia()->CodiCkpt,'OK');
                    $strTituFilt = ' (ENTREGADAS)';
                    break;
                default:   // Todas las Guias
                    $strTituFilt = ' (TODAS)';
            }
        }
        $this->lblTituForm->Text .= $strTituFilt;

        $this->dtgGuiaClie->TotalItemCount = Guia::QueryCount(QQ::AndCondition($objClauWher));
        $arrGuiaNaci = Guia::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgGuiaClie->OrderByClause, $this->dtgGuiaClie->LimitClause)
        );
        $this->dtgGuiaClie->DataSource = $arrGuiaNaci;

        //-------------------------------------------------------------------
        // Este vector de nros de guias, se utiliza en la impresion en lote
        //-------------------------------------------------------------------
        $objSeleColu = QQ::Select(QQN::Guia()->NumeGuia);
        $arrDataGuia = Guia::QueryArray(QQ::AndCondition($objClauWher),QQ::Clause($objSeleColu));
        $arrSoloGuia = array();
        foreach ($arrDataGuia as $objSoloGuia) {
            $arrSoloGuia[] = $objSoloGuia->NumeGuia;
        }
        $_SESSION['NrosGuia'] = $arrSoloGuia;

    }

    public function StatusColumnRender(Guia $objGuia) {
        if (!$objGuia) {
            return null;
        }
        if (is_null($objGuia->CodiCkpt)) {
            return null;
        }
        $objCkptGuia = SdeCheckpoint::Load($objGuia->CodiCkpt);
        if (!$objCkptGuia) {
            return null;
        }
        if (strlen($objCkptGuia->Imagen) == 0) {
            return null;
        }
        return TextoIconoColor($objCkptGuia->Imagen,'','','lg',$objCkptGuia->Color);
    }

    public function dtgNombDest_Render(Guia $objGuiaList) {
        if ($objGuiaList) {
            return substr(limpiarCadena($objGuiaList->NombDest),0,40).'...';
        } else {
            return null;
        }
    }

    public function dtgDescStat_Render(Guia $objGuiaList) {
        if ($objGuiaList) {
            return substr($objGuiaList->ObseCkpt,0,40).'...';
        } else {
            return null;
        }
    }

    public function dtgEstaCkpt_Render(Guia $objGuia) {
        if (!$objGuia) {
            return null;
        }
        if (is_null($objGuia->EstaCkpt)) {
            return null;
        }
        return $objGuia->EstaCkpt;
    }

    public function dtgFechCkpt_Render(Guia $objGuia) {
        if (!$objGuia) {
            return null;
        }
        if (is_null($objGuia->FechCkpt)) {
            return null;
        }
        return $objGuia->FechCkpt->__toString('DD/MM/YYYY');
    }

    public function dtgHoraCkpt_Render(Guia $objGuia) {
        if (!$objGuia) {
            return null;
        }
        if (is_null($objGuia->HoraCkpt)) {
            return null;
        }
        return substr($objGuia->HoraCkpt,0,5);
    }

    //--------------------------
    // Acciones de los objetos
    //--------------------------

    public function dtgGuiaRowx_Click($strFormId, $strControlId, $strParameter) {
        $strNumeGuia = strval($strParameter);
        QApplication::Redirect(__SIST__."/consulta_guia.php/$strNumeGuia");
    }

    protected function btnExpoExce_Click() {
        QApplication::Redirect(__SIST__."/exportar_guias_nros.php");
    }

    protected function btnMostImpr_Click() {
        $this->mostrarFiltros(false);
        $this->mostrarOpcionesDeImpresion(true);
    }

    protected function btnCancel_Click() {
        $this->mostrarFiltros(false);
        $this->mostrarOpcionesDeImpresion(false);
        $this->btnExpoExce->Visible = true;
    }

    protected function btnMostFilt_Click() {
        $this->mostrarFiltros(true);
        $this->mostrarOpcionesDeImpresion(false);
    }

    protected function mostrarFiltros($blnMostFilt) {
        $this->btnCancel->Visible   = !$this->btnCancel->Visible;
        $this->btnMostFilt->Visible = !$this->btnMostFilt->Visible;
        $this->btnExpoExce->Visible = false;
        $this->btnFiltDhoy->Visible = $blnMostFilt;
        $this->btnFiltPend->Visible = $blnMostFilt;
        $this->btnFiltTran->Visible = $blnMostFilt;
        $this->btnFiltEntr->Visible = $blnMostFilt;
        $this->btnFiltToda->Visible = $blnMostFilt;
    }

    protected function btnFiltGuia_Click($strFormId, $strControlId, $strParameter) {
        $_SESSION['FiltGuia'] = $strParameter;
        $this->dtgGuiaClie->Refresh();
    }

    protected function mostrarOpcionesDeImpresion($blnMostImpr) {
        $this->btnMostImpr->Visible = !$this->btnMostImpr->Visible;
        $this->btnExpoExce->Visible = false;
        $this->btnImprMani->Visible = $blnMostImpr;
        $this->btnImprLote->Visible = $blnMostImpr;
    }

    protected function btnImprLote_Click() {
        $strUrlxLote = __SIST__.'/guia_pdf_lote_new.php';
        QApplication::Redirect($strUrlxLote);
    }

    protected function btnImprMani_Click() {
        $arrDatoMani = $_SESSION['NrosGuia'];
        $arrImprMani = array();

        foreach ($arrDatoMani as $strNumeGuia) {
            $objDatoMani = Guia::Load($strNumeGuia);
            $arrImprMani[] = array(
                $objDatoMani->NumeGuia,
                $objDatoMani->FechGuia->__toString("DD/MM/YYYY"),
                substr($objDatoMani->NombRemi,0,30),
                substr($objDatoMani->NombDest,0,30),
                $objDatoMani->PesoGuia,
                $objDatoMani->CantPiez,
                TipoGuiaType::ToStringCorto($objDatoMani->TipoGuia),
                $objDatoMani->EstaOrig."-".$objDatoMani->EstaDest
            );
        }

        if (count($arrImprMani)) {
            $arrEnca2PDF = array('Guia Nro.','Fecha','Remitente','Destinatario','Peso','Cant Piez','Tipo','ORI-DES');
            $arrAnch2PDF = array(20,20,60,60,20,16,16,20);
            $arrJust2PDF = array('C','C','L','L','R','R','C','C');

            $_SESSION['Dato'] = serialize($arrImprMani);
            $_SESSION['Enca'] = serialize($arrEnca2PDF);
            $_SESSION['Anch'] = serialize($arrAnch2PDF);
            $_SESSION['Just'] = serialize($arrJust2PDF);
            QApplication::Redirect(__UTIL__.'/tabla_pdf.php?nomb_repo=Manifiesto_Diario&nomb_empr='.$this->objUsuario->Cliente->NombClie);
        }

    }
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// guia_list.tpl.php as the included HTML template file
GuiaListNew::Run('GuiaListNew');
?>