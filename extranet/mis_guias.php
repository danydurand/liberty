<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected_extranet.inc.php');
require_once(__FORMBASE_CLASSES__ . '/GuiaListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the Guia class.  It uses the code-generated
 * GuiaDataGrid control which has meta-methods to help with
 * easily creating/defining Guia columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both mis_guias.php AND
 * mis_guias.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class MisGuias extends GuiaListFormBase {
	protected $strStatGuia;
	protected $intGuiaIdxx;
    protected $txtBuscGuia;
    protected $btnBuscGuia;
    protected $objUsuario;

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

		if (isset($_GET['s'])) {
			$this->strStatGuia = trim($_GET['s']);
		} else {
			$this->strStatGuia = '';
		}
		if (isset($_GET['g'])) {
			$this->intGuiaIdxx = trim($_GET['g']);
		} else {
			$this->intGuiaIdxx = '';
		}

	}

	protected function Form_Create() {
		parent::Form_Create();

		$this->SetupValores();

		$this->lblMensUsua_Create();
		$this->lblTituForm_Create();
        $this->txtBuscGuia_Create();
        $this->btnBuscGuia_Create();

		// Instantiate the Meta DataGrid
		$this->dtgGuias = new GuiaDataGrid($this);
		$this->dtgGuias->ShowFilter = false;
		$this->dtgGuias->FontSize = 13;

        $_SERVER['GrabarTraza'] = 'SI';
        //-----------------------------------------------------------------
        // Las guias de la lista, deben corresponder al Cliente conectado
        //-----------------------------------------------------------------
        $objCondAdic   = QQ::Clause();
        $objCondAdic[] = QQ::Equal(QQN::Guia()->ClienteId,$this->objUsuario->Id);
        //t('Agregando condicion de Cliente');
        //------------------------------------------------------------------
        // Si se especificó algún tipo de guía en particular, se establece
        // la condición correspondiente
        //------------------------------------------------------------------
        if (strlen($this->strStatGuia) > 0) {
            switch ($this->strStatGuia) {
                case 't':
                    $objCondAdic[] = QQ::IsNull(QQN::Guia()->Entregada);
                    break;
                case 'e':
                    $objCondAdic[] = QQ::Equal(QQN::Guia()->Entregada,true);
                    break;
                default:
            }
        }
        //---------------------------------------------------------------------
        // Si se especificó algún número de guía en particular, se establece
        // la condición correspondiente
        //---------------------------------------------------------------------
        $intCantCara = strlen($this->intGuiaIdxx);
        //t('El tamaño de la cadena de caracteres es: '.$intCantCara);
        if ($intCantCara > 0) {
			if ($intCantCara == strlen(DejarSoloLosNumeros($this->intGuiaIdxx))) {
                //t('La cadena solo contiene numeros');
                $objCondAdic[] = QQ::OrCondition (
                    QQ::Equal(QQN::Guia()->Id,$this->intGuiaIdxx),
                    QQ::Equal(QQN::Guia()->Tracking,$this->intGuiaIdxx)
                );
            } else {
                //t('Se asume que es un tracking, puesto que la cadena no contiene numeros unicamente');
                $objCondAdic[] = QQ::Equal(QQN::Guia()->Tracking,strtoupper($this->intGuiaIdxx));
            }
        }
        $this->dtgGuias->AdditionalConditions = QQ::AndCondition($objCondAdic);

        // Style the DataGrid (if desired)
		$this->dtgGuias->CssClass = 'datagrid';
		$this->dtgGuias->AlternateRowStyle->CssClass = 'alternate';

		// Add Pagination (if desired)
		$this->dtgGuias->Paginator = new QPaginator($this->dtgGuias);
		$this->dtgGuias->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgGuias->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgGuias->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable

        $this->dtgGuias->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgGuias->AddRowAction(new QClickEvent(), new QAjaxAction('dtgGuiasRow_Click'));

		// Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for guia's properties, or you
		// can traverse down QQN::guia() to display fields that are down the hierarchy)
		$this->dtgGuias->MetaAddColumn('Id');
		$this->dtgGuias->MetaAddColumn('Tracking');
		$this->dtgGuias->MetaAddColumn('Proveedor');
		$this->dtgGuias->MetaAddColumn('Fecha');
		$this->dtgGuias->MetaAddColumn('CantPiezas');
		$this->dtgGuias->MetaAddColumn('Kilos');
		$this->dtgGuias->MetaAddColumn('Libras');
		$this->dtgGuias->MetaAddColumn('Volumen');
		$this->dtgGuias->MetaAddColumn('ValorDeclarado');
        $this->dtgGuias->MetaAddColumn('Total');

        $this->dtgGuias->SetDataBinder('MisGuiasDataBinder');
	}

	protected function lblTituForm_Create() {
        $this->lblTituForm = new QLabel($this);
        $this->lblTituForm->Text = 'Mis Guías';
        switch ($this->strStatGuia) {
            case 't':
                $this->lblTituForm->Text = 'Guías en Tránsito';
                $this->lblNotiUsua->Text = 'Volando Miami-CCS / En Recepción / Por Confirmar en Almacén';
                $this->lblNotiUsua->CssClass = 'alert alert-info';
                break;
            case 'e':
                $this->lblTituForm->Text = 'Guías Entregadas';
                $this->lblNotiUsua->Text = 'Entregadas al Cliente ó Despachada por Courier Nacional';
                $this->lblNotiUsua->CssClass = 'alert alert-success';
                break;
            case 'p':
                $this->lblTituForm->Text = 'Guías Por Retirar';
                $this->lblNotiUsua->Text = 'Pago confirmado pendiente por Retirar';
                $this->lblNotiUsua->CssClass = 'alert alert-warning';
                break;
        }
	}

	protected function lblMensUsua_Create() {
		$this->lblMensUsua = new QLabel($this);
		$this->lblMensUsua->Text = '';
		$this->lblMensUsua->HtmlEntities = false;
	}

    public function txtBuscGuia_Create() {
        $this->txtBuscGuia = new QTextBox($this);
        $this->txtBuscGuia->CssClass = 'btn-lista';
        $this->txtBuscGuia->Name = 'Tracking / Nro de Guía';
        $this->txtBuscGuia->Width = 250;
    }

    public function btnBuscGuia_Create() {
		$this->btnBuscGuia = new QButton($this);
		$this->btnBuscGuia->Text = 'Buscar';
		$this->btnBuscGuia->CssClass = 'btn btn-success';
		$this->btnBuscGuia->AddAction(new QClickEvent(), new QServerAction('btnBuscGuia_Click'));
    }

	public function dtgGuiasRow_Click($strFormId, $strControlId, $strParameter) {
		$intId = intval($strParameter);
		QApplication::Redirect("ver_guia.php/$intId");
	}

	//-----------------------------------
	// Acciones relativas a los objetos
	//-----------------------------------

	public function btnBuscGuia_Click() {
		QApplication::Redirect('mis_guias.php?g='.$this->txtBuscGuia->Text);
	}

    public function MisGuiasDataBinder() {
        $objConditions = QQ::AndCondition($this->dtgGuias->AdditionalConditions);

        // Setup the $objClauses Array
        $objClauses = array();

        if(null !== $this->dtgGuias->AdditionalClauses)
            $objClauses = $this->dtgGuias->AdditionalClauses;

        // Remember!  We need to first set the TotalItemCount, which will affect the calcuation of LimitClause below
//        if ($this->Paginator) {
            $this->dtgGuias->TotalItemCount = Guia::QueryCount($objConditions);
//        }

        // If a column is selected to be sorted, and if that column has a OrderByClause set on it, then let's add
        // the OrderByClause to the $objClauses array
        if ($objClause = $this->dtgGuias->OrderByClause)
            array_push($objClauses, $objClause);

        // Add the LimitClause information, as well
        if ($objClause = $this->dtgGuias->LimitClause)
            array_push($objClauses, $objClause);

        // Set the DataSource to be a Query result from Guia, given the clauses above
        $this->dtgGuias->DataSource = Guia::QueryArray($objConditions, $objClauses);
        $_SESSION['DataTabl'] = serialize($this->dtgGuias->DataSource);
    }

}

// Go ahead and run this form object to generate the page and event handlers, implicitly using
// mis_guias.tpl.php as the included HTML template file
MisGuias::Run('MisGuias');
?>
