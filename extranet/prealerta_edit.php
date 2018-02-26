<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected_extranet.inc.php');
require_once(__FORMBASE_CLASSES__ . '/PrealertaEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Prealerta class.  It uses the code-generated
 * PrealertaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Prealerta columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both prealerta_edit.php AND
 * prealerta_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class PrealertaEditForm extends PrealertaEditFormBase {
	protected $btnLogxCamb;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the PrealertaMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctPrealerta = PrealertaMetaControl::CreateFromPathInfo($this);
		$this->lblMensUsua_Create();
		$this->lblTituForm_Create();

		// Call MetaControl's methods to create qcontrols based on Prealerta's data fields
		$this->lblId = $this->mctPrealerta->lblId_Create();
		$this->lblId->CssClass = 'form-label';

		$this->txtTracking = $this->mctPrealerta->txtTracking_Create();
		$this->txtTracking->Width = 350;

		$this->lstCliente = $this->mctPrealerta->lstCliente_Create();

		$this->calFecha = $this->mctPrealerta->calFecha_Create();
        if (!$this->mctPrealerta->EditMode) {
            $this->calFecha->DateTime = new QDateTime(QDateTime::Now);
        }
        $this->calFecha->Enabled = false;
        $this->calFecha->ForeColor = 'blue';

		$this->txtDescripcion = $this->mctPrealerta->txtDescripcion_Create();
		$this->txtDescripcion->Width = 300;

        $this->txtPrecio = $this->mctPrealerta->txtPrecio_Create();
		$this->txtPrecio->Width = 70;
        $this->txtPrecio->HtmlAfter = ' en USD';

		$this->lstCourier = $this->mctPrealerta->lstCourier_Create();
		$this->chkRetener = $this->mctPrealerta->chkRetener_Create();
		$this->txtApiRegiId = $this->mctPrealerta->txtApiRegiId_Create();
		$this->txtResultadoRegi = $this->mctPrealerta->txtResultadoRegi_Create();
		$this->txtApiModiId = $this->mctPrealerta->txtApiModiId_Create();
		$this->txtResultadoModi = $this->mctPrealerta->txtResultadoModi_Create();

		// Create Buttons and Actions on this Form
		$this->btnSave = new QButton($this);
		$this->btnSave->Text = '<i class="fa fa-floppy-o fa-lg"></i> Guardar';
		$this->btnSave->CssClass = 'btn btn-success';
		$this->btnSave->HtmlEntities = false;
		$this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
		$this->btnSave->CausesValidation = true;

		$this->btnCancel = new QButton($this);
		$this->btnCancel->Text = '<i class="fa fa-ban fa-lg"></i> Cancelar';
		$this->btnCancel->CssClass = 'btn btn-warning';
		$this->btnCancel->HtmlEntities = false;
		$this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));

		$this->btnDelete = new QButton($this);
		$this->btnDelete->Text = '<i class="fa fa-trash-o fa-lg"></i> Borrar';
		$this->btnDelete->CssClass = 'btn btn-danger';
		$this->btnDelete->HtmlEntities = false;
		$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('Prealerta'))));
		$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
		$this->btnDelete->Visible = $this->mctPrealerta->EditMode;

		$this->btnLogxCamb_Create();

//        echo $_SESSION['PagiBack'];

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Crear/Editar Prealerta';
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

	protected function btnLogxCamb_Create() {
		$this->btnLogxCamb = new QButton($this);
		$this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Log Cambios';
		$this->btnLogxCamb->CssClass = 'btn btn-default';
		$this->btnLogxCamb->HtmlEntities = false;
		$this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
		$this->btnLogxCamb->Visible = Log::CountByTablaRef('Prealerta',$this->mctPrealerta->Prealerta->Id);
	}

	//-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

	protected function btnLogxCamb_Click() {
		$_SESSION['RegiRefe'] = $this->mctPrealerta->Prealerta->Id;
		$_SESSION['TablRefe'] = 'Prealerta';
		$_SESSION['RegiReto'] = 'prealerta_edit.php/'.$this->mctPrealerta->Prealerta->Id;
		QApplication::Redirect(__APP__.'/okinawa/log_list.php');
	}


	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctPrealerta->Prealerta;
		$this->mctPrealerta->SavePrealerta();
		if ($this->mctPrealerta->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctPrealerta->Prealerta;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Prealerta';
				$arrLogxCamb['intRefeRegi'] = $this->mctPrealerta->Prealerta->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctPrealerta->Prealerta->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
				LogDeCambios($arrLogxCamb);
			}
			$this->lblMensUsua->CssClass = 'alert alert-success';
			$this->lblMensUsua->Text = '<i class="fa fa-check"></i> Transacción Exitosa';
			$this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
		} else {
			$arrLogxCamb['strNombTabl'] = 'Prealerta';
			$arrLogxCamb['intRefeRegi'] = $this->mctPrealerta->Prealerta->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctPrealerta->Prealerta->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
			LogDeCambios($arrLogxCamb);
			$this->RedirectToListPage();			
		}
	}
	

}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// prealerta_edit.tpl.php as the included HTML template file
PrealertaEditForm::Run('PrealertaEditForm');
?>
