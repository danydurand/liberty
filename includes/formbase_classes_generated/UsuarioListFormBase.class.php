<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Usuario class.  It uses the code-generated
	 * UsuarioDataGrid control which has meta-methods to help with
	 * easily creating/defining Usuario columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both usuario_list.php AND
	 * usuario_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class UsuarioListFormBase extends QForm {
		protected $lblMensUsua;
		protected $lblNotiUsua;
		protected $lblTituForm;
        protected $btnNuevRegi;
        protected $btnFiltAvan;
        protected $btnExpoExce;

		// Local instance of the Meta DataGrid to list Usuarios
		/**
		 * @var UsuarioDataGrid dtgUsuarios
		 */
		protected $dtgUsuarios;

		// Create QForm Event Handlers as Needed

        //		protected function Form_Exit() {}
        //		protected function Form_Load() {}
        //		protected function Form_PreRender() {}
        //		protected function Form_Validate() {}

		protected function Form_Run() {
			parent::Form_Run();
		}

		protected function Form_Create() {
			parent::Form_Create();

			$this->lblMensUsua_Create();
			$this->lblNotiUsua_Create();
			$this->lblTituForm_Create();
            $this->btnNuevRegi_Create();
            $this->btnFiltAvan_Create();

			// Instantiate the Meta DataGrid
			$this->dtgUsuarios = new UsuarioDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgUsuarios->CssClass = 'datagrid';
			$this->dtgUsuarios->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgUsuarios->FontSize = 13;
			$this->dtgUsuarios->ShowFilter = false;

			// Add Pagination (if desired)
			$this->dtgUsuarios->Paginator = new QPaginator($this->dtgUsuarios);
			$this->dtgUsuarios->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

			// Higlight the datagrid rows when mousing over them
			$this->dtgUsuarios->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
			$this->dtgUsuarios->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

			// Add a click handler for the rows.
			// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
			// or $_ITEM->Id to pass the object's id, or any other data grid variable
			$this->dtgUsuarios->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
			$this->dtgUsuarios->AddRowAction(new QClickEvent(), new QAjaxAction('dtgUsuariosRow_Click'));

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create the Other Columns (note that you can use strings for usuario's properties, or you
			// can traverse down QQN::usuario() to display fields that are down the hierarchy)
			$this->dtgUsuarios->MetaAddColumn('CodiUsua');
			$this->dtgUsuarios->MetaAddColumn(QQN::Usuario()->CodiGrupObject);
			$this->dtgUsuarios->MetaAddColumn('NombUsua');
			$this->dtgUsuarios->MetaAddColumn('ApelUsua');
			$this->dtgUsuarios->MetaAddColumn('LogiUsua');
			$this->dtgUsuarios->MetaAddColumn('PassUsua');
			$this->dtgUsuarios->MetaAddTypeColumn('CodiStat', 'StatusType');
			$this->dtgUsuarios->MetaAddColumn(QQN::Usuario()->CodiEstaObject);
			$this->dtgUsuarios->MetaAddTypeColumn('TipoUsua', 'TipoUsuaType');
			$this->dtgUsuarios->MetaAddColumn('CantInte');
			$this->dtgUsuarios->MetaAddColumn('MailUsua');
			$this->dtgUsuarios->MetaAddColumn('FechAcce');
			$this->dtgUsuarios->MetaAddColumn('MotiBloq');
			$this->dtgUsuarios->MetaAddColumn('FechClav');
			$this->dtgUsuarios->MetaAddColumn('CargUsua');
			$this->dtgUsuarios->MetaAddColumn('Supervisor');
			$this->dtgUsuarios->MetaAddColumn(QQN::Usuario()->Grupo);
			$this->dtgUsuarios->MetaAddColumn('DeleteAt');
			$this->dtgUsuarios->MetaAddColumn(QQN::Usuario()->Cajero);

            $this->btnExpoExce_Create();

        }

		protected function lblTituForm_Create() {
			$this->lblTituForm = new QLabel($this);
			$this->lblTituForm->Text = 'Usuarios';
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

        protected function btnNuevRegi_Create() {
            $this->btnNuevRegi = new QButton($this);
            $this->btnNuevRegi->Text = '<i class="fa fa-plus-circle fa-lg"></i> Crear';
            $this->btnNuevRegi->CssClass = 'btn btn-primary btn-sm';
            $this->btnNuevRegi->HtmlEntities = false;
            $this->btnNuevRegi->AddAction(new QClickEvent(), new QServerAction('btnNuevRegi_Click'));
        }

        protected function btnFiltAvan_Create() {
            $this->btnFiltAvan = new QButton($this);
            $this->btnFiltAvan->Text = '<i class="fa fa-filter fa-lg"></i> Filtro';
            $this->btnFiltAvan->CssClass = 'btn btn-success btn-sm';
            $this->btnFiltAvan->HtmlEntities = false;
            $this->btnFiltAvan->AddAction(new QClickEvent(), new QServerAction('btnFiltAvan_Click'));
        }

        protected function btnExpoExce_Create() {
            $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgUsuarios);
            $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
            $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
            $this->btnExpoExce->HtmlEntities = false;
            $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
            $this->btnExpoExce->Visible = false;
        }

        protected function btnNuevRegi_Click() {
            QApplication::Redirect(__SIST__.'/usuario_edit.php');
        }

        protected function btnFiltAvan_Click() {
            $this->dtgUsuarios->ShowFilter = !$this->dtgUsuarios->ShowFilter;
        }

		public function dtgUsuariosRow_Click($strFormId, $strControlId, $strParameter) {
		  $intId = intval($strParameter);
		  QApplication::Redirect("usuario_edit.php/$intId");
		}


        protected function mensaje($strTextNoti='', $strTipoMens='m', $strClasMens='s', $strNombIcon='') {
            if (strlen($strTextNoti) == 0) {
                $this->lblMensUsua->Text = '';
                $this->lblMensUsua->CssClass = '';
                $this->lblNotiUsua->Text = '';
                $this->lblNotiUsua->CssClass = '';
            } else {
                //------------------------------------------
                // Aqui se determina el estilo del mensaje
                //------------------------------------------
                $strClasAsig = 'alert alert-';
                switch (strtolower($strClasMens)) {
                    case 'i':
                        $strClasAsig .= 'info';
                        break;
                    case 's':
                        $strClasAsig .= 'success';
                        break;
                    case 'w':
                        $strClasAsig .= 'warning';
                        break;
                    case 'd':
                        $strClasAsig .= 'danger';
                        break;
                    default:
                        $strClasAsig .= 'success';
            }
            if (strlen($strNombIcon) > 0) {
                $strNombIcon = '<i class="fa fa-'.$strNombIcon.' fa-lg"></i> ';
            }
            //-----------------------------------------------------------------------------
            // El tipo de mensaje, puede ser de (n)otificacion (que aparece arriba y a
            // la izquierda) o un (m)ensaje regular (que aparece arriba y a la derecha)
            //-----------------------------------------------------------------------------
            switch (strtolower($strTipoMens)) {
                case 'n':
                    $this->lblNotiUsua->Text = $strNombIcon.$strTextNoti;
                    $this->lblNotiUsua->CssClass = $strClasAsig;
                    break;
                case 'm':
                    $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                    $this->lblMensUsua->CssClass = $strClasAsig;
                    break;
                default:
                    $this->lblMensUsua->Text = $strNombIcon.$strTextNoti;
                    $this->lblMensUsua->CssClass = $strClasAsig;
                }
            }
        }

}
?>
