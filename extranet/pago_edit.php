<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected_extranet.inc.php');
require_once(__FORMBASE_CLASSES__ . '/PagoEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Pago class.  It uses the code-generated
 * PagoMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Pago columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both pago_edit.php AND
 * pago_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class PagoEditForm extends PagoEditFormBase {
	protected $btnLogxCamb;
    protected $arrIdsxSele;
    protected $strIdsxSele;
    protected $txtPagoEspe;
    protected $decTotaPago;
    protected $objUsuario;

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();
	}

	protected function SetupValores() {
        $this->objUsuario = unserialize($_SESSION['User']);
		if (isset($_SESSION['IdsxSele'])) {
			$this->strIdsxSele = unserialize($_SESSION['IdsxSele']);
			$this->arrIdsxSele = explode(',',$this->strIdsxSele);
            $objClauWher       = QQ::Clause();
            $objClauWher[]     = QQ::In(QQN::Guia()->Id,$this->arrIdsxSele);
            $arrGuiaSele       = Guia::QueryArray(QQ::AndCondition($objClauWher));
            $this->decTotaPago = 0;
            foreach ($arrGuiaSele as $objGuiaSele) {
                $this->decTotaPago += $objGuiaSele->Total;
            }
		} else {
		    QApplication::Redirect(__EXT__.'/seleccionar_guias.php');
		}
	}

	protected function Form_Create() {
		parent::Form_Create();

		$this->SetupValores();

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the PagoMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctPago = PagoMetaControl::CreateFromPathInfo($this);
		$this->lblMensUsua_Create();
		$this->lblTituForm_Create();

        $this->txtPagoEspe_Create();

		// Call MetaControl's methods to create qcontrols based on Pago's data fields
		$this->lblId = $this->mctPago->lblId_Create();
		$this->lblId->CssClass = 'form-label';

		$this->lstCliente = $this->mctPago->lstClientePago_Create($this->objUsuario->Id);

		$this->txtDocumento = $this->mctPago->txtDocumento_Create();
		$this->txtDocumento->Name = 'Nro de Documento/Voucher';

		$this->calFecha = $this->mctPago->calFecha_Create();
		$this->calFecha->Name = "Fecha del Pago";

		$this->txtMonto = $this->mctPago->txtMonto_Create();
		$this->txtMonto->Name = 'Monto del Pago';

        $this->txtGuias = $this->mctPago->txtGuias_Create();
        $this->txtGuias->Name = 'Guias Canceladas';
        $this->txtGuias->Enabled = false;
        $this->txtGuias->ForeColor = 'blue';

        $this->lstBanco = $this->mctPago->lstBanco_Create();

        $this->calRegistradoEl = $this->mctPago->calRegistradoEl_Create();
        $this->calRegistradoEl->Enabled = false;
        $this->calRegistradoEl->ForeColor = 'blue';

        $this->chkConfirmado = $this->mctPago->chkConfirmado_Create();
        $this->chkConfirmado->Enabled = false;
        $this->chkConfirmado->ForeColor = 'blue';

        if (!$this->mctPago->EditMode) {
            $this->txtGuias->Name = 'Guias a Cancelar';
            $this->txtGuias->Text = $this->strIdsxSele;
            $this->calRegistradoEl->DateTime = new QDateTime(QDateTime::Now);
			if ($this->lstBanco->ItemCount == 2) {
				$this->lstBanco->SelectedIndex = 1;
                $this->lstBanco->Enabled = false;
                $this->lstBanco->ForeColor = 'blue';
			}
            $this->chkConfirmado->Visible = false;
        } else {
            if ($this->chkConfirmado->Checked) {
                //-------------------------------------------------------
                // Si el pago ya fue confirmado, no se permiten cambios
                //-------------------------------------------------------
                $this->txtDocumento->Enabled = false;
                $this->txtDocumento->ForeColor = 'blue';
                $this->lstBanco->Enabled = false;
                $this->lstBanco->ForeColor = 'blue';
                $this->calFecha->Enabled = false;
                $this->calFecha->ForeColor = 'blue';
                $this->txtMonto->Enabled = false;
                $this->txtMonto->ForeColor = 'blue';

                $this->lblNotiUsua->Text = '<i class="fa fa-info-circle fa-lg"></i> Pago Confirmado, no se admiten cambios';
                $this->lblNotiUsua->CssClass = 'alert alert-info';
            }
        }


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
		$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'), QApplication::Translate('Pago'))));
		$this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
		$this->btnDelete->Visible = $this->mctPago->EditMode;

		$this->btnLogxCamb_Create();

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function txtPagoEspe_Create() {
        $this->txtPagoEspe = new QTextBox($this);
        $this->txtPagoEspe->Name = 'Pago Esperado';
        $this->txtPagoEspe->Enabled = false;
        $this->txtPagoEspe->ForeColor = 'blue';
        $this->txtPagoEspe->Text = $this->decTotaPago;
        $this->txtPagoEspe->Visible = !$this->mctPago->EditMode;
    }

	protected function lblTituForm_Create() {
		$this->lblTituForm = new QLabel($this);
		$this->lblTituForm->Text = 'Registrar/Editar un Pago';
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
		$this->btnLogxCamb->Visible = Log::CountByTablaRef('Pago',$this->mctPago->Pago->Id);
	}

	//-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

	protected function btnLogxCamb_Click() {
		$_SESSION['RegiRefe'] = $this->mctPago->Pago->Id;
		$_SESSION['TablRefe'] = 'Pago';
		$_SESSION['RegiReto'] = 'pago_edit.php/'.$this->mctPago->Pago->Id;
		QApplication::Redirect(__APP__.'/okinawa/log_list.php');
	}

    public function Form_Validate() {
        //-------------------------------------------------------------
        // La combinacion Nro de Documento y Banco, no debe repetirse
        //-------------------------------------------------------------
        $blnTodoOkey = true;
        $strDocuPago = $this->txtDocumento->Text;
        $intCodiBanc = $this->lstBanco->SelectedValue;
        $objPagoRegi = Pago::LoadByDocumentoBancoId($strDocuPago, $intCodiBanc);
        if ($objPagoRegi) {
            $blnTodoOkey = false;
            $this->lblMensUsua->Text = '<i class="fa fa-hand-stop-o fa-lg"></i> La combinación Nro Documento y Banco, ya existe.';
            $this->lblMensUsua->CssClass = 'alert alert-danger';
        }
        return $blnTodoOkey;
    }

	protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctPago->Pago;
		$this->mctPago->SavePago();
		if ($this->mctPago->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctPago->Pago;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Pago';
				$arrLogxCamb['intRefeRegi'] = $this->mctPago->Pago->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctPago->Pago->Documento;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
				LogDeCambios($arrLogxCamb);
			}
			$this->lblMensUsua->CssClass = 'alert alert-success';
			$this->lblMensUsua->Text = '<i class="fa fa-check"></i> Transaccion Exitosa';
			$this->btnCancel->Text = '<i class="fa fa-mail-reply fa-lg"></i> Volver';
		} else {
			$arrLogxCamb['strNombTabl'] = 'Pago';
			$arrLogxCamb['intRefeRegi'] = $this->mctPago->Pago->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctPago->Pago->Documento;
			$arrLogxCamb['strDescCamb'] = "Creado";
			LogDeCambios($arrLogxCamb);
			$this->RedirectToListPage();			
		}
	}
	

}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// pago_edit.tpl.php as the included HTML template file
PagoEditForm::Run('PagoEditForm');
?>
