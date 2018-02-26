<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class InventarioAlmacen extends FormularioBaseKaizen {
	protected $txtUbicAlma;  // Ubicación dentro del Almacén
	protected $strCadeSqlx;
	protected $objDataBase;
	protected $txtNumeSeri;
	protected $lstIdenAlma;
	protected $intContRegi;
	protected $lstElimPodx;

	protected function Form_Create() {
		parent::Form_Create();
		$this->lblTituForm->Text = QApplication::Translate('Inventario de Almacén');

		$this->lstIdenAlma_Create();
		$this->txtUbicAlma_Create();
		$this->lstElimPodx_Create();
		$this->txtNumeSeri_Create();

		$this->intContRegi = 0;
	}

	//----------------------------
	// Aquí se Crean los Objetos
	//----------------------------

	protected function lstIdenAlma_Create() {
		$this->lstIdenAlma = new QListBox($this);
		$this->lstIdenAlma->Name = QApplication::Translate('Almacén');
		$this->lstIdenAlma->Width = 180;
		$this->lstIdenAlma->Required = true;
		$this->lstIdenAlma->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		$objClausula   = QQ::Clause();
		$objClausula[] = QQ::Equal(QQN::Parametro()->IndiPara,'Almacen');
		$objClausula[] = QQ::Equal(QQN::Parametro()->ParaTxt5,$this->objUsuario->CodiEsta);
		$arrListAlma   = Parametro::QueryArray(QQ::AndCondition($objClausula));
		foreach ($arrListAlma as $objAlmacen) {
			$this->lstIdenAlma->AddItem($objAlmacen->DescPara,$objAlmacen->ParaTxt3);
		}
	}

	protected function txtUbicAlma_Create() {
		$this->txtUbicAlma = new QTextBox($this);
		$this->txtUbicAlma->Name = QApplication::Translate('Ubicación dentro del Almacén');
		$this->txtUbicAlma->Width = 180;
		$this->txtUbicAlma->MaxLength = 20;
		$this->txtUbicAlma->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
		$this->txtUbicAlma->Required = true;
	}

	protected function lstElimPodx_Create() {
		$this->lstElimPodx = new QListBox($this);
		$this->lstElimPodx->Name = QApplication::Translate('Si la Guía tiene POD, desea eliminarlo ?');
		$this->lstElimPodx->Width = 180;
		$this->lstElimPodx->Required = true;
		$this->lstElimPodx->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		$this->lstElimPodx->AddItem("SI","S");
		$this->lstElimPodx->AddItem("NO","N");
	}

	protected function txtNumeSeri_Create() {
		$this->txtNumeSeri = new QTextBox($this);
		$this->txtNumeSeri->Name = QApplication::Translate('Números de Guía');
		$this->txtNumeSeri->Required = true;
		$this->txtNumeSeri->TextMode = QTextMode::MultiLine;
		$this->txtNumeSeri->Height = 200;
		$this->txtNumeSeri->Width = 220;
	}

	//-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

	protected function btnSave_Click() {
		$this->objDataBase = QApplication::$Database[1];
		$this->objUsuario = unserialize($_SESSION['User']);

		$arrGuiaOkey = explode(',',nl2br2($this->txtNumeSeri->Text));
		$this->txtNumeSeri->Text = '';

		$blnTodoOkey = true;
		$objCheckpoint = SdeCheckpoint::Load($this->lstIdenAlma->SelectedValue);
		if (!$objCheckpoint) {
            $strMensUsua = QApplication::Translate('No se ha definido el Checkpoint "En Almacen"');
            $this->mensaje($strMensUsua,'','d','i','hand-stop-o');
			$blnTodoOkey = false;
		}
		if ($blnTodoOkey) {
			$intContGuia = 0;
			$intContCkpt = 0;
			foreach ($arrGuiaOkey as $strNumeSeri) {
				if (strlen($strNumeSeri)) {
					$blnTodoOkey = true;
					//-----------------------------------------------------------------------
					// Se procesa una a una las Guias proporcionadas por el Usuario
					//-----------------------------------------------------------------------
					$objGuia = Guia::Load($strNumeSeri);
					if (!$objGuia) {
						$this->txtNumeSeri->Text .= $strNumeSeri." (Esta Guia No Existe)".chr(13);
						$blnTodoOkey = false;
					} else {
					    if ($objGuia->Anulada > 0) {
					        //----------------------------
                            // La Guía ha sido eliminada.
                            //----------------------------
                            $this->txtNumeSeri->Text .= $strNumeSeri." (Esta Guia Fue Eliminada)".chr(13);
                            $blnTodoOkey = false;
                        } else {
                            if ($objGuia->CodiCkpt == 'OK') {
                                if ($this->lstElimPodx->SelectedValue == 'S') {
                                    $objGuia->EliminarPOD();
                                    //----------------------------------------------------------------------------
                                    // Este movimiento debe quedar grabado en el Registro de Trabajo de la Guia
                                    //----------------------------------------------------------------------------
                                    $objCheckModi = SdeCheckpoint::Load('MG');
                                    $objUsuario = unserialize($_SESSION['User']);
                                    if ($objCheckModi && $objUsuario) {
                                        $arrParaRegi['CodiCkpt'] = 'MG';
                                        $arrParaRegi['TextMens'] = QApplication::Translate('Se elimino POD de la Guia por Inventario de Almacen');
                                        $arrParaRegi['NumeGuia'] = $objGuia->NumeGuia;
                                        $arrParaRegi['CodiUsua'] = $objUsuario->CodiUsua;
                                        $arrParaRegi['CodiEsta'] = $objUsuario->CodiEsta;
                                        CrearRegistroDeTrabajo($arrParaRegi);
                                    }
                                } else {
                                    $blnTodoOkey = false;
                                }
                            }
                        }
					}
					if ($blnTodoOkey) {
						//-------------------------------------------------------------
						// La Ubicacion Fisica de la Guia debe actualizarse
						//-------------------------------------------------------------
						$objGuia->Ubicacion = $this->txtUbicAlma->Text;
						$objGuia->Save();
						
						$intContGuia ++;
						//---------------------------------------------
						// Se graba el checkpoint correspondiente
						//---------------------------------------------
						$arrDatoCkpt = array();
						$arrDatoCkpt['NumeGuia'] = $objGuia->NumeGuia;
                        $arrDatoCkpt['UltiCkpt'] = '';
                        $arrDatoCkpt['GuiaAnul'] = $objGuia->Anulada;
						$arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
						$arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescCkpt." (".$this->txtUbicAlma->Text.")";
						$arrDatoCkpt['CodiRuta'] = ''; //$strCodiRuta;
						$arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
						if ($arrResuGrab['TodoOkey']) {
							$intContCkpt ++;
						} else {
							$this->txtNumeSeri->Text .= $strNumeSeri." ".$arrResuGrab['MotiNook'].chr(13);
							$blnTodoOkey = false;
						}
					}
				}
			}
			if ($blnTodoOkey && ($intContGuia == $intContCkpt)) {
				$strMensUsua = sprintf('El Proceso culmino Exitosamente. Guias procesadas (%s)  Checkpoints procesados (%s)',$intContGuia,$intContCkpt);
				$this->mensaje($strMensUsua,'','','i','check');
			} else {
				$strMensUsua = sprintf('Hubo Errores en la Transaccion. Guias procesadas (%s)  Checkpoints procesados (%s)',$intContGuia,$intContCkpt);
				$this->mensaje($strMensUsua,'','d','i','hand-stop-o');
			}
		}
	}
}

InventarioAlmacen::Run('InventarioAlmacen');
?>