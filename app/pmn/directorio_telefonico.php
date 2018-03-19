<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/EstacionListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Estacion class.  It uses the code-generated
 * EstacionDataGrid control which has meta-methods to help with
 * easily creating/defining Estacion columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both estacion_list.php AND
 * estacion_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class DirectorioTelefonico extends EstacionListFormBase {
	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();		    
	}

	//	protected function Form_Load() {}
	protected function Form_Create() {
		parent::Form_Create();

		$this->lblTituForm->Text = 'Directorio de Sucursales';

		// Instantiate the Meta DataGrid
		$this->dtgEstacions = new EstacionDataGrid($this);
		$this->dtgEstacions->FontSize = 13;
		$this->dtgEstacions->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgEstacions->CssClass = 'datagrid';
		$this->dtgEstacions->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgEstacions->Paginator = new QPaginator($this->dtgEstacions);
		$this->dtgEstacions->ItemsPerPage = 9; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgEstacions->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgEstacions->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		$colCodiEsta = $this->dtgEstacions->MetaAddColumn('CodiEsta');
		$colCodiEsta->Name = 'SUC';
		$colCodiEsta->FilterBoxSize = 3;

		$this->dtgEstacions->MetaAddTypeColumn('CodiStat', 'StatusType');

		$colDescEsta = $this->dtgEstacions->MetaAddColumn('DescEsta');
		$colDescEsta->Name = 'Descripción';

		$colNombCont = $this->dtgEstacions->MetaAddColumn('NombCont');
		$colNombCont->Name = 'Contacto';

		$colNumeTele = $this->dtgEstacions->MetaAddColumn('NumeTele');
		$colNumeTele->Name = 'Teléfonos';
		$colNumeTele->FilterBoxSize = 10;

		$colDireMail = $this->dtgEstacions->MetaAddColumn('DireMail');
		$colDireMail->Name = 'Correo Electrónico';
		$colDireMail->FilterBoxSize = 30;

		$colEstaSucu = $this->dtgEstacions->MetaAddColumn(QQN::Estacion()->Estado);
		$colEstaSucu->Name = 'Estado';
		$colEstaSucu->FilterType = null;

        $this->btnNuevRegi->Visible = false;

        $this->dtgEstacions->SetDataBinder('dtgSucursales_Bind');
    }

    public function dtgSucursales_Bind() {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
        $objClauWher[] = QQ::Equal(QQN::Estacion()->EsUnAlmacen,SinoType::NO);
        $objClauWher[] = QQ::Equal(QQN::Estacion()->PaisId,1);
        $objClauWher[] = QQ::NotIn(QQN::Estacion()->CodiEsta,array('SMG'));

        $arrSucuActi = Estacion::QueryArray(QQ::AndCondition($objClauWher));

        $this->dtgEstacions->TotalItemCount = count($arrSucuActi);
        // Bind the datasource to the datagrid
        $this->dtgEstacions->DataSource = Estacion::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgEstacions->OrderByClause, $this->dtgEstacions->LimitClause)
        );
    }

}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// estacion_list.tpl.php as the included HTML template file
DirectorioTelefonico::Run('DirectorioTelefonico');
?>