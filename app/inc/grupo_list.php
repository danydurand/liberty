<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/GrupoListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Grupo class.  It uses the code-generated
 * GrupoDataGrid control which has meta-methods to help with
 * easily creating/defining Grupo columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both grupo_list.php AND
 * grupo_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class GrupoListForm extends GrupoListFormBase {
    protected $btnCreaRegi;

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

        $this->btnCreaRegi_Create();

		// Instantiate the Meta DataGrid
		$this->dtgGrupos = new GrupoDataGrid($this);
		$this->dtgGrupos->FontSize = 13;

		// Style the DataGrid (if desired)
		$this->dtgGrupos->CssClass = 'datagrid';
		$this->dtgGrupos->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgGrupos->Paginator = new QPaginator($this->dtgGrupos);
		$this->dtgGrupos->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgGrupos->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgGrupos->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgGrupos->RowActionParameterHtml = '<?= $_ITEM->CodiGrup ?>';
		$this->dtgGrupos->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGruposRow_Click'));

		// if (isset($_SESSION['dtgGrupos'])) {
		// 	$viewState = $_SESSION['dtgGrupos'];
		// 	unset($_SESSION['dtgGrupos']);
		// 	$this->dtgGrupos->SetFilters($viewState['FilterInfo']);
		// 	$this->dtgGrupos->SortColumnIndex = $viewState['SortColumnIndex'];
		// 	$this->dtgGrupos->SortDirection = $viewState['SortDirection'];
		// 	$this->dtgGrupos->PageNumber = $viewState['PageNumber'];
		// } 

		// Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for grupo's properties, or you
		// can traverse down QQN::grupo() to display fields that are down the hierarchy)
		$this->dtgGrupos->MetaAddColumn('CodiGrup');
		$this->dtgGrupos->MetaAddColumn('DescGrup');
		$this->dtgGrupos->MetaAddTypeColumn('CodiStat', 'StatusType');
		$this->dtgGrupos->MetaAddColumn('TextObse');
	}

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Grupos';
	}

	protected function lblMensUsua_Create() {
		$this->lblMensUsua = new QLabel($this);
		$this->lblMensUsua->Text = '';
	}

    protected function btnCreaRegi_Create() {
        $this->btnCreaRegi = new QButton($this);
        $this->btnCreaRegi->Text = '<i class="fa fa-plus-circle fa-lg"></i> Crear';
        $this->btnCreaRegi->CssClass = 'btn btn-primary';
        $this->btnCreaRegi->HtmlEntities = false;
        $this->btnCreaRegi->AddAction(new QClickEvent(), new QServerAction('btnCreaRegi_Create'));
    }

    //-----------------------------------
    // Acciones relativas a los objetos
    //-----------------------------------

    public function btnCreaRegi_Click() {
        QApplication::Redirect('grupo_edit.php');
    }

public function dtgGruposRow_Click($strFormId, $strControlId, $strParameter) {
	  $intId = intval($strParameter);
	  QApplication::Redirect("grupo_edit.php/$intId");
	}		

}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// grupo_list.tpl.php as the included HTML template file
GrupoListForm::Run('GrupoListForm');
?>
