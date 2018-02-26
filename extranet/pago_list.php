<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected_extranet.inc.php');
require_once(__FORMBASE_CLASSES__ . '/PagoListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Pago class.  It uses the code-generated
 * PagoDataGrid control which has meta-methods to help with
 * easily creating/defining Pago columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both pago_list.php AND
 * pago_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class PagoListForm extends PagoListFormBase {
	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

//		protected function Form_Load() {}

	protected function Form_Create() {
		parent::Form_Create();

		$this->lblMensUsua_Create();
		$this->lblTituForm_Create();

		// Instantiate the Meta DataGrid
		$this->dtgPagos = new PagoDataGrid($this);
		$this->dtgPagos->ShowFilter = false;
		$this->dtgPagos->FontSize = 13;

		// Style the DataGrid (if desired)
		$this->dtgPagos->CssClass = 'datagrid';
		$this->dtgPagos->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgPagos->Paginator = new QPaginator($this->dtgPagos);
		$this->dtgPagos->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgPagos->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgPagos->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		$this->dtgPagos->SortColumnIndex = 0;
		$this->dtgPagos->SortDirection   = 1;
		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgPagos->RowActionParameterHtml = '<?= $_ITEM->Guias ?>';
		$this->dtgPagos->AddRowAction(new QClickEvent(), new QAjaxAction('dtgPagosRow_Click'));

		// Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for pago's properties, or you
		// can traverse down QQN::pago() to display fields that are down the hierarchy)
		$this->dtgPagos->MetaAddColumn('Id');
		$this->dtgPagos->MetaAddColumn(QQN::Pago()->Cliente);
		$this->dtgPagos->MetaAddColumn('Documento');
		$this->dtgPagos->MetaAddColumn('Fecha');
		$this->dtgPagos->MetaAddColumn('Monto');
		$this->dtgPagos->MetaAddColumn('Guias');
		$this->dtgPagos->MetaAddColumn(QQN::Pago()->Banco);
		$this->dtgPagos->MetaAddColumn('RegistradoEl');
		$this->dtgPagos->MetaAddColumn('Confirmado');
	}

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Mis Pagos';
	}

	protected function lblMensUsua_Create() {
		$this->lblMensUsua = new QLabel($this);
		$this->lblMensUsua->Text = '';
	}

	public function dtgPagosRow_Click($strFormId, $strControlId, $strParameter) {
//        $intId = intval($strParameter);
        $_SESSION['IdsxSele'] = serialize($strParameter);
        QApplication::Redirect("pago_edit.php");
//        QApplication::Redirect("pago_edit.php/$intId");
	}

}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// pago_list.tpl.php as the included HTML template file
PagoListForm::Run('PagoListForm');
?>
