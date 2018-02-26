<?php
//--------------------------------------------------------------------------------------
// Programa      : ver_guia.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 20/01/2016
// Descripcion   : Este programa muestra al Usuario, informacion detallada de una guia
//--------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected_extranet.inc.php');

Class VerGuia extends QForm {
    protected $lblTituForm;
    protected $lblNotiUsua;
    protected $lblMensUsua;

    // Controles de navegacion
    protected $arrDataTabl;
    protected $intCantRegi;
    protected $intPosiRegi;
    protected $btnProxRegi;
    protected $btnRegiAnte;
    protected $btnPrimRegi;
    protected $btnUltiRegi;

    protected $objUsuario;
    protected $mctGuia;
    protected $strClasForm;
    protected $strActiGuia;


    // Campos de la Guia
    protected $objGuia;
    protected $lblGuiaIdxx;
    protected $lblNumeTrac;
    protected $lblNombCli1;
    protected $lblNombRemi;
    protected $lblNombProv;
    protected $lblDescCont;
    protected $lblNombClie;
    protected $lblMediGuia;
    protected $lblVoluGuia;
    protected $lblLibrGuia;
    protected $lblValoDecl;
    protected $lblFechGuia;
    protected $lblCantPiez;
    protected $lblSucuDest;
    protected $lblKiloGuia;


    // DataGrids
    protected $dtgPiecGuia;
    protected $dtgGuiaCkpt;

    // Botones
//    protected $btnEditP;
//    protected $btnCancelP;
//    protected $btnDeleteP;

//    protected $btnNew;

    protected $btnEdit;
    protected $btnCancel;

    protected function SetupValores() {
        $this->objUsuario = unserialize($_SESSION['User']);
        $intNumeGuia       = QApplication::PathInfo(0);
        if (strlen($intNumeGuia) > 0) {
            $this->objGuia = Guia::Load($intNumeGuia);
        } else {
            QApplication::Redirect('mis_guias.php');
        }
    }

    protected function Form_Create() {

        $this->SetupValores();

        if (isset($_SESSION['DataTabl'])) {
            $this->arrDataTabl = unserialize($_SESSION['DataTabl']);
            $this->intCantRegi = count($this->arrDataTabl);
            //-------------------------------------------------------------------------------
            // Se determina la posicion del registro actual, dentro del vector de registros
            //-------------------------------------------------------------------------------
            $intContRegi = 0;
            foreach ($this->arrDataTabl as $objTable) {
                if ($objTable->Id == $this->objGuia->Id) {
                    $this->intPosiRegi = $intContRegi;
                    break;
                } else {
                    $intContRegi++;
                }
            }
        }

        $this->lblTituForm_Create();
        $this->lblNotiUsua_Create();
        $this->lblMensUsua_Create();

        $this->btnProxRegi_Create();
        $this->btnRegiAnte_Create();
        $this->btnPrimRegi_Create();
        $this->btnUltiRegi_Create();

        $this->verificarNavegacion();

		$this->mctGuia = GuiaMetaControl::CreateFromPathInfo($this);
        $this->lblGuiaIdxx = $this->mctGuia->lblId_Create();
        $this->lblGuiaIdxx->CssClass = 'form-label';
        $this->lblNumeTrac = $this->mctGuia->lblTracking_Create();
        $this->lblNumeTrac->CssClass = 'form-label';
        $this->lblNombRemi = $this->mctGuia->lblRemitente_Create();
        $this->lblNombRemi->CssClass = 'form-label';
        $this->lblNombProv = $this->mctGuia->lblProveedor_Create();
        $this->lblNombProv->Name = 'DL Prov';
        $this->lblNombProv->CssClass = 'form-label';
        $this->lblDescCont = $this->mctGuia->lblContenido_Create();
        $this->lblDescCont->CssClass = 'form-label';
        $this->lblNombClie = $this->mctGuia->lblClienteId_Create();
        $this->lblNombClie->CssClass = 'form-label';
        $this->lblMediGuia_Create();
        $this->lblVoluGuia = $this->mctGuia->lblVolumen_Create();
        $this->lblVoluGuia->CssClass = 'form-label';
        $this->lblLibrGuia = $this->mctGuia->lblLibras_Create();
        $this->lblLibrGuia->CssClass = 'form-label';
        $this->lblValoDecl = $this->mctGuia->lblValorDeclarado_Create();
        $this->lblValoDecl->Name = 'Val. Decl. (USD)';
        $this->lblValoDecl->CssClass = 'form-label';
        $this->lblFechGuia = $this->mctGuia->lblFecha_Create();
        $this->lblFechGuia->CssClass = 'form-label';
        $this->lblCantPiez = $this->mctGuia->lblCantPiezas_Create();
        $this->lblCantPiez->CssClass = 'form-label';
        $this->lblSucuDest = $this->mctGuia->lblDestinoId_Create();
        $this->lblSucuDest->CssClass = 'form-label';
        $this->lblKiloGuia = $this->mctGuia->lblKilos_Create();
        $this->lblKiloGuia->CssClass = 'form-label';


        $this->strClasForm = "row";
        if ($this->mctGuia->Guia->Retener) {
            $this->lblNotiUsua->CssClass = 'alert alert-danger';
            $this->lblNotiUsua->Text     = '<i class="fa fa-hand-stop-o fa-lg"></i> Retenida';
            $this->strClasForm = "row alert-warning";
        }

        $this->dtgPiecGuia_Create();
        $this->dtgGuiaCkpt_Create();

//        $this->strActiGuia_Create();
//        $this->btnCancel_Create();

    }

    //----------------------------
    // Aqui se crean los objetos
    //----------------------------

    protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'Detalle de la Guía';
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

    protected function btnProxRegi_Create() {
        $this->btnProxRegi = new QButton($this);
//		$this->btnProxRegi->Text = '<i class="fa fa-angle-right"></i>';
        $this->btnProxRegi->Text = 'Next';
        $this->btnProxRegi->CssClass = 'btn btn-primary btn-sm';
        $this->btnProxRegi->HtmlEntities = false;
        $this->btnProxRegi->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnRegiAnte_Create() {
        $this->btnRegiAnte = new QButton($this);
//		$this->btnRegiAnte->Text = '<i class="fa fa-angle-left"></i>';
        $this->btnRegiAnte->Text = 'Prev';
        $this->btnRegiAnte->CssClass = 'btn btn-primary btn-sm';
        $this->btnRegiAnte->HtmlEntities = false;
        $this->btnRegiAnte->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnPrimRegi_Create() {
        $this->btnPrimRegi = new QButton($this);
//		$this->btnPrimRegi->Text = '<i class="fa fa-angle-double-left"></i>';
        $this->btnPrimRegi->Text = 'First';
        $this->btnPrimRegi->CssClass = 'btn btn-primary btn-sm';
        $this->btnPrimRegi->HtmlEntities = false;
        $this->btnPrimRegi->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnUltiRegi_Create() {
        $this->btnUltiRegi = new QButton($this);
//		$this->btnUltiRegi->Text = '<i class="fa fa-angle-double-right"></i>';
        $this->btnUltiRegi->Text = 'Last';
        $this->btnUltiRegi->CssClass = 'btn btn-primary btn-sm';
        $this->btnUltiRegi->HtmlEntities = false;
        $this->btnUltiRegi->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
    }

    protected function btnEdit_Create() {
        $this->btnEdit = new QButton($this);
        $this->btnEdit->Text = 'Edit';
        $this->btnEdit->CssClass = 'btn btn-success btn-sm';
        $this->btnEdit->HtmlEntities = false;
        $this->btnEdit->AddAction(new QClickEvent(), new QAjaxAction('btnEdit_Click'));
        $this->btnEdit->CausesValidation = true;
    }

    protected function lblMediGuia_Create() {
        $this->lblMediGuia = new QLabel($this);
        $this->lblMediGuia->Name = 'Medidas';
        $this->lblMediGuia->CssClass = 'form-label';
        $this->lblMediGuia->Text = $this->mctGuia->Guia->Alto."/".
                                   $this->mctGuia->Guia->Ancho."/".
                                   $this->mctGuia->Guia->Largo;
    }

    protected function strActiGuia_Create() {
        $this->strActiGuia = '';
        $_SESSION['RegiRefe'] = $this->mctGuia->Awb->Id;
        $_SESSION['TablRefe'] = 'Awb';
        $_SESSION['ProgReto'] = __EXT__.'/ver_guia.php/'.$this->mctGuia->Awb->Id;
        $intGuiaIdxx = $this->mctGuia->Awb->Id;
        $strTextHold = $this->mctGuia->Awb->OnHold ? 'Release' : 'OnHold';
        $strImagHold = $this->mctGuia->Awb->OnHold ? 'unlock-alt' : 'lock';
        $strLinkEdit = __EXT__.'/awb_edit.php/'.$intGuiaIdxx.'><i class="fa fa-pencil-square-o"></i> Edit</a>';
        if (strlen($this->mctGuia->Awb->CustomerId) > 0) {
            $strLinkEtiq = __EXT__.'/print_label_pdf.php/'.$intGuiaIdxx.'><i class="fa fa-file-pdf-o"></i> Print Label</a>';
            $strLinkCust = __EXT__.'/whr_list.php?c='.$this->mctGuia->Awb->CustomerId.'><i class="fa fa-user"></i> Custumer Details</a>';
        }
        $strLinkHold = __EXT__.'/hold_release.php/'.$intGuiaIdxx.'/'.$strTextHold.'><i class="fa fa-'.$strImagHold.' fa-lg"></i> '.$strTextHold.'</a>';
        $this->strActiGuia = '
            <div class="dropdown">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                    &nbsp;<i class="fa fa-cog fa-fw"></i> Options
                    <span class="fa fa-caret-down"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href='.$strLinkEdit.'</li>';
        if (strlen($this->mctGuia->Awb->CustomerId) > 0) {
            $this->strActiGuia .= "<li><a href=$strLinkEtiq</li>";
            $this->strActiGuia .= "<li><a href=$strLinkCust</li>";
        }
        $this->strActiGuia .= '
                    <li><a href='.$strLinkHold.'</li>
                </ul>
            </div>
        ';
//        echo $_SESSION['ProgReto'];
    }

    protected function btnCancel_Create() {
        $this->btnCancel = new QButton($this);
        $this->btnCancel->Text = 'Back';
        $this->btnCancel->CssClass = 'btn btn-warning btn-sm';
        $this->btnCancel->HtmlEntities = false;
        $this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));
    }

    protected function dtgPiecGuia_Create() {
        $this->dtgPiecGuia = new QDataGrid($this);
        $this->dtgPiecGuia->CellPadding = 0;
        $this->dtgPiecGuia->CellSpacing = 0;
        $this->dtgPiecGuia->FontSize    = 12;

        $colItemIdxx = new QDataGridColumn('Id', '<?= $_ITEM->Id ?>');
        $colItemIdxx->CssClass = 'campo';
        $colItemIdxx->Width = 35;
        $colItemIdxx->HtmlEntities = false;
        $this->dtgPiecGuia->AddColumn($colItemIdxx);

        $colQuanPiec = new QDataGridColumn('Cant', '<?= $_ITEM->Cantidad ?>');
        $colQuanPiec->CssClass = 'campo';
        $colQuanPiec->Width = 35;
        $colQuanPiec->HtmlEntities = false;
        $this->dtgPiecGuia->AddColumn($colQuanPiec);

        $colPackType = new QDataGridColumn('Descripcion', '<?= $_ITEM->Descripcion ?>');
        $colPackType->Width = 150;
        $colPackType->HtmlEntities = false;
        $this->dtgPiecGuia->AddColumn($colPackType);

        $colWidtPiec = new QDataGridColumn('Alto', '<?= $_ITEM->Alto ?>');
        $colWidtPiec->CssClass = 'campo';
        $colWidtPiec->Width = 35;
        $colWidtPiec->HtmlEntities = false;
        $this->dtgPiecGuia->AddColumn($colWidtPiec);

        $colHeigPiec = new QDataGridColumn('Ancho', '<?= $_ITEM->Ancho ?>');
        $colHeigPiec->CssClass = 'campo';
        $colHeigPiec->Width = 35;
        $colHeigPiec->HtmlEntities = false;
        $this->dtgPiecGuia->AddColumn($colHeigPiec);

        $colLengPiec = new QDataGridColumn('Largo', '<?= $_ITEM->Largo ?>');
        $colLengPiec->CssClass = 'campo';
        $colLengPiec->Width = 35;
        $colLengPiec->HtmlEntities = false;
        $this->dtgPiecGuia->AddColumn($colLengPiec);

        $colWeigPiec = new QDataGridColumn('Volumen', '<?= $_ITEM->Volumen ?>');
        $colWeigPiec->CssClass = 'campo';
        $colWeigPiec->Width = 35;
        $colWeigPiec->HtmlEntities = false;
        $this->dtgPiecGuia->AddColumn($colWeigPiec);

        // Let's pre-default the sorting by id (column index #0) and use AJAX
        $this->dtgPiecGuia->SortColumnIndex = 0;
        $this->dtgPiecGuia->UseAjax = true;

        // Specify the DataBinder method for the DataGrid
        $this->dtgPiecGuia->SetDataBinder('dtgPiecGuia_Bind');

        // Style the DataGrid (if desired)
        $this->dtgPiecGuia->CssClass = 'datagrid';
        $this->dtgPiecGuia->AlternateRowStyle->CssClass = 'alternate';

    }

    protected function dtgPiecGuia_Bind() {
        $intGuiaNumb   = $this->mctGuia->Guia->Id;
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Piezas()->Id);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Piezas()->GuiaId,$intGuiaNumb);
        $arrPiecGuia   = Piezas::QueryArray(QQ::AndCondition($objClauWher), $objClauOrde);

        // Bind the datasource to the datagrid
        $this->dtgPiecGuia->DataSource = $arrPiecGuia;
    }

    protected function dtgGuiaCkpt_Create() {
        $this->dtgGuiaCkpt = new QDataGrid($this);
        $this->dtgGuiaCkpt->CellPadding = 0;
        $this->dtgGuiaCkpt->CellSpacing = 0;
        $this->dtgGuiaCkpt->FontSize    = 12;

        $colDescCkpt = new QDataGridColumn('Observacion', '<?= $_ITEM->Observacion ?>');
        $colDescCkpt->Width = 150;
        $colDescCkpt->HtmlEntities = false;
        $this->dtgGuiaCkpt->AddColumn($colDescCkpt);

        $colFechCkpt = new QDataGridColumn('Fecha', '<?= $_ITEM->Fecha ?>');
        $colFechCkpt->Width = 45;
        $colFechCkpt->HtmlEntities = false;
        $this->dtgGuiaCkpt->AddColumn($colFechCkpt);

        $colHoraCkpt = new QDataGridColumn('Hora', '<?= $_ITEM->Hora->__toString("hh:MM") ?>');
        $colHoraCkpt->Width = 40;
        $colHoraCkpt->HtmlEntities = false;
        $this->dtgGuiaCkpt->AddColumn($colHoraCkpt);

        $colUsuaCkpt = new QDataGridColumn('Usuario', '<?= $_ITEM->Usuario->Login ?>');
        $colUsuaCkpt->CssClass = 'campo';
        $colUsuaCkpt->Width = 35;
        $colUsuaCkpt->HtmlEntities = false;
        $this->dtgGuiaCkpt->AddColumn($colUsuaCkpt);

        // Let's pre-default the sorting by id (column index #0) and use AJAX
        $this->dtgGuiaCkpt->SortColumnIndex = 0;
        $this->dtgGuiaCkpt->UseAjax = true;

        // Specify the DataBinder method for the DataGrid
        $this->dtgGuiaCkpt->SetDataBinder('dtgGuiaCkpt_Bind');

        // Style the DataGrid (if desired)
        $this->dtgGuiaCkpt->CssClass = 'datagrid';
        $this->dtgGuiaCkpt->AlternateRowStyle->CssClass = 'alternate';
    }

    protected function dtgGuiaCkpt_Bind() {
        $arrGuiaCkpt = GuiaCkpt::LoadArrayByGuiaId($this->mctGuia->Guia->Id);
        $this->dtgGuiaCkpt->DataSource = $arrGuiaCkpt;
    }


    //-----------------------------------
    // Acciones relativas a los objetos
    //-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__EXT__.'/ver_guia.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__EXT__.'/ver_guia.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__EXT__.'/ver_guia.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__EXT__.'/ver_guia.php/'.$objRegiTabl->Id);
    }

    protected function verificarNavegacion() {
        $this->btnRegiAnte->Enabled = !($this->intPosiRegi == 0);
        $this->btnPrimRegi->Enabled = !($this->intPosiRegi == 0);
        $this->btnProxRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
        $this->btnUltiRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
    }

    protected function btnEdit_Click() {
        $_SESSION['ProgReto'] = __EXT__.'/ver_guia.php/'.$this->mctGuia->Awb->Id;
        QApplication::Redirect(__EXT__.'/awb_edit.php/'.$this->mctGuia->Awb->Id);
    }

    protected function btnCancel_Click() {
        QApplication::Redirect($_SESSION['PagiBack']);
    }

}

VerGuia::Run('VerGuia');
