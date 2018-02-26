<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected_extranet.inc.php');
require_once(__FORMBASE_CLASSES__ . '/GuiaListFormBase.class.php');

class SeleccionarGuias extends GuiaListFormBase {
	protected $intGuiaIdxx;
    protected $txtContPago;
    protected $objUsuario;

    protected $colSeleGuia;
    protected $btnContPago;

    protected $lblTextMens;

    // Override Form Event Handlers as Needed
    protected function Form_Run() {
        parent::Form_Run();
		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

//		protected function Form_Load() {}

	protected function SetupValores() {
		$this->objUsuario = unserialize($_SESSION['User']);

	}

	protected function Form_Create() {
        parent::Form_Create();

		$this->SetupValores();

		$this->lblMensUsua_Create();
		$this->lblTituForm_Create();
		$this->lblTextMens_Create();
        $this->btnContPago_Create();

		// Instantiate the Meta DataGrid
		$this->dtgGuias = new GuiaDataGrid($this);
		$this->dtgGuias->ShowFilter = false;
		$this->dtgGuias->FontSize = 13;

        //-------------------------------------------------------------------
        // Se muestran las Guías del Cliente que no hayan sido "Canceladas"
        //-------------------------------------------------------------------
        $objCondAdic   = QQ::Clause();
        $objCondAdic[] = QQ::Equal(QQN::Guia()->ClienteId,$this->objUsuario->Id);
        $objCondAdic[] = QQ::IsNull(QQN::Guia()->Cancelada);
        $this->dtgGuias->AdditionalConditions = QQ::AndCondition($objCondAdic);

        // Style the DataGrid (if desired)
		$this->dtgGuias->CssClass = 'datagrid';
		$this->dtgGuias->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgGuias->Paginator = new QPaginator($this->dtgGuias);
		$this->dtgGuias->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
//		$this->dtgGuias->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
//		$this->dtgGuias->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable

		$this->dtgGuias->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgGuias->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiasRow_Click'));

		// Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for guia's properties, or you
		// can traverse down QQN::guia() to display fields that are down the hierarchy)

        $colNumeGuia = $this->dtgGuias->MetaAddColumn('Id');
		$colNumeGuia->Name = 'Nro Guia';

		$this->dtgGuias->MetaAddColumn('Tracking');

        $this->dtgGuias->MetaAddColumn('Remitente');

        $this->dtgGuias->MetaAddColumn('Proveedor');

        $this->dtgGuias->MetaAddColumn('Contenido');

        $this->dtgGuias->MetaAddColumn('Fecha');

        $colCantPiez = $this->dtgGuias->MetaAddColumn('CantPiezas');
        $colCantPiez->Name = 'Piezas';

        $this->dtgGuias->MetaAddColumn('Total');

        $this->colSeleGuia = new QCheckBoxColumn('Selec',$this->dtgGuias);
        $this->colSeleGuia->HtmlEntities = false;
        $this->dtgGuias->AddColumnAt(0,$this->colSeleGuia);

	}

	protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'Pendientes de Pago';
	}

	protected function lblMensUsua_Create() {
		$this->lblMensUsua = new QLabel($this);
		$this->lblMensUsua->Text = '';
		$this->lblMensUsua->HtmlEntities = false;
	}

	protected function lblTextMens_Create() {
		$this->lblTextMens = new QLabel($this);
		$this->lblTextMens->Text = 'Seleccione las guias cuyo pago desea registrar y luego presione el boton "Procesar"';
		$this->lblTextMens->HtmlEntities = false;
		$this->lblTextMens->CssClass = 'alert alert-success';
	}

    public function btnContPago_Create() {
		$this->btnContPago = new QButton($this);
		$this->btnContPago->Text = '<i class="fa fa-cogs fa-lg"></i> Procesar';
		$this->btnContPago->HtmlEntities = false;
		$this->btnContPago->CssClass = 'btn btn-success btn-lista';
		$this->btnContPago->AddAction(new QClickEvent(), new QServerAction('btnContPago_Click'));
    }

	public function dtgGuiasRow_Click($strFormId, $strControlId, $strParameter) {
//		$intId = intval($strParameter);
//		QApplication::Redirect("guia_edit.php/$intId");
        $this->lblMensUsua->Text = '';
        $this->lblMensUsua->CssClass = '';
	}

	//-----------------------------------
	// Acciones relativas a los objetos
	//-----------------------------------

	public function btnContPago_Click() {
        $arrIdsxSele = $this->colSeleGuia->GetChangedIds();
        if (count($arrIdsxSele)) {
            $strIdsxSele = implode(',',array_keys($arrIdsxSele));
            $_SESSION['IdsxSele'] = serialize($strIdsxSele);
//            QApplication::Redirect('pago_edit.php?g='.$strIdsxSele);
            QApplication::Redirect('pago_edit.php');
        } else {
            $this->lblMensUsua->Text = '<i class="fa fa-hand-stop-o fa-lg"></i> Debe seleccionar al menos una Guia';
            $this->lblMensUsua->CssClass = 'alert alert-danger';
        }
	}
}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// mis_guias.tpl.php as the included HTML template file
SeleccionarGuias::Run('SeleccionarGuias');
?>
