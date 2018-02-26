<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the PrealertaMail class.  It uses the code-generated
	 * PrealertaMailDataGrid control which has meta-methods to help with
	 * easily creating/defining PrealertaMail columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both prealerta_mail_list.php AND
	 * prealerta_mail_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class PrealertaMailListFormBase extends QForm {
		protected $lblMensUsua;
		protected $lblNotiUsua;
		protected $lblTituForm;
        protected $btnNuevRegi;
        protected $btnFiltAvan;
        protected $btnExpoExce;

		// Local instance of the Meta DataGrid to list PrealertaMails
		/**
		 * @var PrealertaMailDataGrid dtgPrealertaMails
		 */
		protected $dtgPrealertaMails;

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
			$this->dtgPrealertaMails = new PrealertaMailDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgPrealertaMails->CssClass = 'datagrid';
			$this->dtgPrealertaMails->AlternateRowStyle->CssClass = 'alternate';
			$this->dtgPrealertaMails->FontSize = 13;
			$this->dtgPrealertaMails->ShowFilter = false;

			// Add Pagination (if desired)
			$this->dtgPrealertaMails->Paginator = new QPaginator($this->dtgPrealertaMails);
			$this->dtgPrealertaMails->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

			// Higlight the datagrid rows when mousing over them
			$this->dtgPrealertaMails->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
			$this->dtgPrealertaMails->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

			// Add a click handler for the rows.
			// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
			// or $_ITEM->Id to pass the object's id, or any other data grid variable
			$this->dtgPrealertaMails->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
			$this->dtgPrealertaMails->AddRowAction(new QClickEvent(), new QAjaxAction('dtgPrealertaMailsRow_Click'));

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create the Other Columns (note that you can use strings for prealerta_mail's properties, or you
			// can traverse down QQN::prealerta_mail() to display fields that are down the hierarchy)
			$this->dtgPrealertaMails->MetaAddColumn('Id');
			$this->dtgPrealertaMails->MetaAddColumn('ClienteId');
			$this->dtgPrealertaMails->MetaAddColumn('Cedula');
			$this->dtgPrealertaMails->MetaAddColumn('Courier');
			$this->dtgPrealertaMails->MetaAddColumn('Tracking');
			$this->dtgPrealertaMails->MetaAddColumn('Descripcion');
			$this->dtgPrealertaMails->MetaAddColumn('Precio');
			$this->dtgPrealertaMails->MetaAddColumn('FechaEmail');
			$this->dtgPrealertaMails->MetaAddColumn('FechaRegistro');
			$this->dtgPrealertaMails->MetaAddColumn('HoraRegistro');
			$this->dtgPrealertaMails->MetaAddColumn('Email');
			$this->dtgPrealertaMails->MetaAddColumn('Procesado');
			$this->dtgPrealertaMails->MetaAddColumn('FechaProcesado');
			$this->dtgPrealertaMails->MetaAddColumn('HoraProcesado');
			$this->dtgPrealertaMails->MetaAddColumn('Status');

            $this->btnExpoExce_Create();

        }

		protected function lblTituForm_Create() {
			$this->lblTituForm = new QLabel($this);
			$this->lblTituForm->Text = 'PrealertaMails';
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
            $this->btnExpoExce = new QDataGridExporterButton($this, $this->dtgPrealertaMails);
            $this->btnExpoExce->DownloadFormat = QDataGridExporterButton::EXPORT_AS_XLS;
            $this->btnExpoExce->Text = '<i class="fa fa-download fa-lg"></i> XLS';
            $this->btnExpoExce->HtmlEntities = false;
            $this->btnExpoExce->CssClass = 'btn btn-outline-danger btn-sm';
            $this->btnExpoExce->Visible = false;
        }

        protected function btnNuevRegi_Click() {
            QApplication::Redirect(__SIST__.'/prealerta_mail_edit.php');
        }

        protected function btnFiltAvan_Click() {
            $this->dtgPrealertaMails->ShowFilter = !$this->dtgPrealertaMails->ShowFilter;
        }

		public function dtgPrealertaMailsRow_Click($strFormId, $strControlId, $strParameter) {
		  $intId = intval($strParameter);
		  QApplication::Redirect("prealerta_mail_edit.php/$intId");
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
