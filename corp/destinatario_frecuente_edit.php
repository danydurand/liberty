<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/DestinatarioFrecuenteEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the DestinatarioFrecuente class.  It uses the code-generated
 * DestinatarioFrecuenteMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a DestinatarioFrecuente columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both destinatario_frecuente_edit.php AND
 * destinatario_frecuente_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class DestinatarioFrecuenteEditForm extends DestinatarioFrecuenteEditFormBase {
    protected $chkCambDest;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the DestinatarioFrecuenteMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctDestinatarioFrecuente = DestinatarioFrecuenteMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on DestinatarioFrecuente's data fields
        $objClauWher = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::MasterCliente()->CodiClie, $this->objUsuario->ClienteId);
		$this->lstCliente = $this->mctDestinatarioFrecuente->lstCliente_Create('',QQ::AndCondition($objClauWher));
        if ($this->lstCliente->ItemCount == 2 && !$this->mctDestinatarioFrecuente->EditMode) {
            $this->lstCliente->SelectedIndex = 1;
        }

		$this->txtNombre = $this->mctDestinatarioFrecuente->txtNombre_Create();
        $this->txtNombre->Width = 240;

		$this->txtDireccion = $this->mctDestinatarioFrecuente->txtDireccion_Create();
		$this->txtDireccion->TextMode = QTextMode::MultiLine;
		$this->txtDireccion->Width = 240;
		$this->txtDireccion->Height = 100;

        $this->txtTelefono = $this->mctDestinatarioFrecuente->txtTelefono_Create();
        $this->txtTelefono->Width = 240;

		$this->txtEmail = $this->mctDestinatarioFrecuente->txtEmail_Create();
		$this->txtEmail->Width = 240;

        $this->txtCedulaRif = $this->mctDestinatarioFrecuente->txtCedulaRif_Create();

		$this->txtPersonaContacto = $this->mctDestinatarioFrecuente->txtPersonaContacto_Create();
		$this->txtPersonaContacto->Width = 240;

		$this->txtCodigoPostal = $this->mctDestinatarioFrecuente->txtCodigoPostal_Create();
		$this->txtCodigoPostal->Width = 70;

		$objClauWher   = QQ::Clause();
		$objClauWher[] = QQ::Equal(QQN::Estacion()->EsUnAlmacen,SinoType::NO);
		$objClauWher[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
		$objClauWher[] = QQ::Equal(QQN::Estacion()->PaisId,1);
		$this->lstDestino = $this->mctDestinatarioFrecuente->lstDestino_Create(null,QQ::AndCondition($objClauWher));

//		$this->chkCambDest_Create();
//		$this->lstDestino_Create();

//        if ($this->mctDestinatarioFrecuente->EditMode) {
//            $this->chkCambDest_Change($this->mctDestinatarioFrecuente->DestinatarioFrecuente->Destino->CodiEsta,'SOLOUNA');
//        } else {
//            $this->chkCambDest_Change(null,'TODAS');
//        }
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function chkCambDest_Create() {
	    $this->chkCambDest = new QCheckBox($this);
	    $this->chkCambDest->Name = 'Desea cambiar el Destino ?';
	    $this->chkCambDest->AddAction(new QChangeEvent(), new QAjaxAction('CambiarDestino'));
	    if (!$this->mctDestinatarioFrecuente->EditMode) {
	        $this->chkCambDest->Visible = false;
        }
    }

    public function lstDestino_Create() {
        $this->lstDestino = new QListBox($this);
        $this->lstDestino->Name = QApplication::Translate('Destino');
        $this->lstDestino->Required = true;
        $this->lstDestino->Width = 200;
    }

    public function CambiarDestino() {
	    $this->chkCambDest_Change($this->mctDestinatarioFrecuente->DestinatarioFrecuente->Destino->CodiEsta, 'TODAS');
    }

    public function chkCambDest_Change($strCodiEsta = null, $strCualSucu) {
	    $this->lstDestino->RemoveAllItems();
        $this->lstDestino->Width = 200;
        if (!$this->mctDestinatarioFrecuente->EditMode)
            $this->lstDestino->AddItem(QApplication::Translate('- Select One -'), null);

        if (!is_null($strCodiEsta) && $strCualSucu == 'SOLOUNA') {
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Estacion()->CodiEsta,$strCodiEsta);
            $objSucuDest   = Estacion::QuerySingle(QQ::AndCondition($objClauWher));
            $this->lstDestino->AddItem($objSucuDest->__toString(), $objSucuDest->CodiEsta, true);
        } else {
            $arrSucuDest = Estacion::LoadSucursalesActivasToClients();
            foreach ($arrSucuDest as $objSucuDest) {
                $blnSeleRegi = false;
                if ($objSucuDest->CodiEsta == $strCodiEsta) {
                    $blnSeleRegi = true;
                }
                $this->lstDestino->AddItem($objSucuDest->__toString(), $objSucuDest->CodiEsta, $blnSeleRegi);
            }
        }

        // Return the QListBox
        return $this->lstDestino;
    }

    protected function determinarPosicion() {
        if ($this->mctDestinatarioFrecuente->DestinatarioFrecuente && !isset($_SESSION['DataDestinatarioFrecuente'])) {
            $_SESSION['DataDestinatarioFrecuente'] = serialize(array($this->mctDestinatarioFrecuente->DestinatarioFrecuente));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataDestinatarioFrecuente']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctDestinatarioFrecuente->DestinatarioFrecuente->Id) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }
    }

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        $this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->HtmlEntities = false;
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('DestinatarioFrecuente',$this->mctDestinatarioFrecuente->DestinatarioFrecuente->Id);
    }



    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/destinatario_frecuente_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/destinatario_frecuente_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/destinatario_frecuente_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/destinatario_frecuente_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctDestinatarioFrecuente->DestinatarioFrecuente;
		$this->mctDestinatarioFrecuente->SaveDestinatarioFrecuente();
		if ($this->mctDestinatarioFrecuente->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctDestinatarioFrecuente->DestinatarioFrecuente;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'DestinatarioFrecuente';
				$arrLogxCamb['intRefeRegi'] = $this->mctDestinatarioFrecuente->DestinatarioFrecuente->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctDestinatarioFrecuente->DestinatarioFrecuente->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/destinatario_frecuente_edit.php/'.$this->mctDestinatarioFrecuente->DestinatarioFrecuente->Id;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'DestinatarioFrecuente';
			$arrLogxCamb['intRefeRegi'] = $this->mctDestinatarioFrecuente->DestinatarioFrecuente->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctDestinatarioFrecuente->DestinatarioFrecuente->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/destinatario_frecuente_edit.php/'.$this->mctDestinatarioFrecuente->DestinatarioFrecuente->Id;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctDestinatarioFrecuente->TablasRelacionadasDestinatarioFrecuente();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            $this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctDestinatarioFrecuente->DeleteDestinatarioFrecuente();
            $arrLogxCamb['strNombTabl'] = 'DestinatarioFrecuente';
            $arrLogxCamb['intRefeRegi'] = $this->mctDestinatarioFrecuente->DestinatarioFrecuente->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctDestinatarioFrecuente->DestinatarioFrecuente->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// destinatario_frecuente_edit.tpl.php as the included HTML template file
DestinatarioFrecuenteEditForm::Run('DestinatarioFrecuenteEditForm');
?>