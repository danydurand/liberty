<?php
//---------------------------------------------------------------------------------------------------
// Programa      : ajusta_consecutivo.php
// Migrado por   : Daniel Durand
// Fecha Migr.   : 15/11/2017
// Descripcion   : El uso (manual) indiscriminado de números de guias trajo como consecuencia el
//                 uso de mecanismos de validacion que resultaron muy costos en terminos de tiempo.
//                 Para solventar ese problema, se eliminó el mecanismo de validación pero quedamos
//                 expuestos a "choques" entre los datos existentes y los asignados por el Sistema.
//                 Este programa ajusta el consecutivo del nro de guía asignado por el Sistema,
//                 colocando en la tabla generadora un número de guía más alto de la secuencia.
//---------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class Envalijar extends FormularioBaseKaizen {
	protected $lstOperAbie;
	protected $txtNumeCont;
	protected $txtListNume;
	protected $lstTipoOper;

	protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Envalijar';

        $this->objDefaultWaitIcon = new QWaitIcon($this);

		$this->lstTipoOper_Create();
		$this->lstOperAbier_Create();
		$this->txtNumeCont_Create();
		$this->txtListNume_Create();

	}

	//-----------------------------
	// Aqui se crean los objetos
	//-----------------------------

	protected function lstTipoOper_Create() {
		$this->lstTipoOper = new QListBox($this);
		$this->lstTipoOper->Name = QApplication::Translate("Tipo Operacion/Ruta");
		$this->lstTipoOper->Required = true;
		$this->lstTipoOper->AddItem(QApplication::Translate("- Seleccione Uno -"),null);
		foreach (SdeTipoOper::LoadAll() as $objTipoOper) {
			$this->lstTipoOper->AddItem($objTipoOper->__toString(),$objTipoOper->CodiTipo);
		}
		$this->lstTipoOper->AddAction(new QChangeEvent(), new QAjaxAction('lstTipoOper_Change'));
	}

	protected function lstOperAbier_Create() {
		$this->lstOperAbie = new QListBox($this);
		$this->lstOperAbie->Name = 'Operación';
		$this->lstOperAbie->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		$this->lstOperAbie->Required = true;
		$this->lstOperAbie->Width = 300;
	}

	protected function txtNumeCont_Create() {
		$this->txtNumeCont = new QTextBox($this);
		$this->txtNumeCont->Name = 'Contenedor';
		$this->txtNumeCont->Width = 200;
	}

	protected function txtListNume_Create() {
		$this->txtListNume = new QTextBox($this);
		$this->txtListNume->Name = 'Guías / Valijas';
		$this->txtListNume->TextMode = QTextMode::MultiLine;
		$this->txtListNume->Required = true;
		$this->txtListNume->Width = 200;
		$this->txtListNume->Height = 250;
	}

	//---------------------------------------
	// Acciones asociadas a los objetos
	//---------------------------------------

	protected function lstTipoOper_Change() {
        if (!is_null($this->lstTipoOper->SelectedValue)) {
            $this->lstOperAbie->RemoveAllItems();
            $intTipoOper   = $this->lstTipoOper->SelectedValue;
            $strCodiSucu   = $this->objUsuario->CodiEsta;
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::SdeOperacion()->CodiRuta);
            $arrSdexOper   = SdeOperacion::LoadArrayByCodiTipoCodiEsta($intTipoOper,$strCodiSucu,$objClauOrde);
            $intCantOper   = count($arrSdexOper);
            $this->lstOperAbie->AddItem('- Seleccione Uno - ('.$intCantOper.')',null);
            foreach ($arrSdexOper as $objOperacion) {
                if ($objOperacion->CodiRuta != "R9999") {
                    $this->lstOperAbie->AddItem(substr($objOperacion->__toString(),0,50),$objOperacion->CodiOper);
                }
			}
		}
	}

	protected function btnSave_Click() {
	    t('===========================================');
	    t('Entrando a Salvar en la opcion de Envalijar');
		//--------------------------------------
		// Se graba o actualiza el Contenedor
		//--------------------------------------
		$objContenedor = SdeContenedor::Load($this->txtNumeCont->Text);
		if (!$objContenedor) {
			$objContenedor           = new SdeContenedor();
			$objContenedor->NumeCont = $this->txtNumeCont->Text;
			$objContenedor->CodiOper = $this->lstOperAbie->SelectedValue;
			$objContenedor->Fecha    = new QDateTime(QDateTime::Now);
			$objContenedor->StatCont = 'P';
			$objContenedor->Save();
            //------------------------
            // Log de Transacciones
            //------------------------
            $arrLogxCamb['strNombTabl'] = 'Contenedor';
            $arrLogxCamb['intRefeRegi'] = $objContenedor->NumeCont;
            $arrLogxCamb['strNombRegi'] = $objContenedor->NumeCont;
            $arrLogxCamb['strDescCamb'] = 'Contenedor Creado';
            LogDeCambios($arrLogxCamb);
		} else {
            //------------------------
            // Log de Transacciones
            //------------------------
            $arrLogxCamb['strNombTabl'] = 'Contenedor';
            $arrLogxCamb['intRefeRegi'] = $objContenedor->NumeCont;
            $arrLogxCamb['strNombRegi'] = $objContenedor->NumeCont;
            $arrLogxCamb['strDescCamb'] = 'Contenedor Actualizado';
            LogDeCambios($arrLogxCamb);
		}
		$blnTodoOkey = true;
		$arrListNume = explode(',',nl2br2($this->txtListNume->Text));
		$arrListNume = LimpiarArreglo($arrListNume);
		$this->txtListNume->Text = '';

		$arrDestinos = $objContenedor->GetDestinos();
		t('La Operaciones es:  '.$this->lstOperAbie->SelectedValue);
		t('Los destinos asociados a la ruta del contenedor son: ');
		foreach ($arrDestinos as $strCodiSucu) {
		    t('Sucursal: '.$strCodiSucu);
        }
		$strCodiRuta = $objContenedor->CodiOperObject->CodiRuta;

		$intContVali = 0;
		$intContGuia = 0;
		$intContCkpt = 0;
		foreach ($arrListNume as $strNumeSeri) {
            //-----------------------------------------------------------------------
            // Se procesa una a una las Guias/Valijas proporcionadas por el Usuario
            //-----------------------------------------------------------------------
            $objGuia = Guia::Load($strNumeSeri);
            if ($objGuia) {
                //------------------------------------------------------------
                // Primeramente se verifica que la guia pueda ser procesada
                //------------------------------------------------------------
                $arrSepuProc = $objGuia->SePuedeProcesar();
                if ($arrSepuProc['TodoOkey']) {
                    //-----------------------------------------------------------------------------------
                    // Antes de asociar la Guia al Contenedor, se debe verificar que el destino
                    // de la Guia, coincida con algunos de los Destinos de la Operacion seleccionada
                    // por el Usuario
                    //-----------------------------------------------------------------------------------
                    if (in_array($objGuia->EstaDest,$arrDestinos)) {
                        if (!$objContenedor->IsGuiaAssociated($objGuia)) {
                            //------------------------------------------------------
                            // Se establece la relación "contenedor-guia"
                            //------------------------------------------------------
                            $objContenedor->AssociateGuia(Guia::Load($strNumeSeri));
                        }
                        $intContGuia ++;
                    } else {
                        $blnTodoOkey = false;
                        $this->txtListNume->Text .= $strNumeSeri." (Destino no Coincide)".chr(13);
                    }
                } else {
                    $blnTodoOkey = false;
                    $this->txtListNume->Text .= $strNumeSeri." (".$arrSepuProc['MensUsua'].")".chr(13);
                }
            } else {
                //---------------------------------------------------
                // Si no es una Guia, se chequea que sea una Valija
                //---------------------------------------------------
                $objValija = SdeContenedor::Load($strNumeSeri);
                if ($objValija) {
                    if (!$objContenedor->IsSdeContenedorAsSdeContContAssociated($objValija)) {
                        //---------------------------------------------------
                        // Se establece la relación "contenedor-valija"
                        //---------------------------------------------------
                        $objContenedor->AssociateSdeContenedorAsSdeContCont($objValija);
                    }
                    $intContVali ++;
                } else {
                    $blnTodoOkey = false;
                    $this->txtListNume->Text .= $strNumeSeri." (No Existe Valija)".chr(13);
                }
            }
            if ($blnTodoOkey) {
                $objCheckpoint = SdeCheckpoint::Load('BG');
                if ($objCheckpoint) {
                    if ($objGuia) {
                        //-------------------------------------------------
                        // Se registra un checkpoint "BG" para cada guia
                        //-------------------------------------------------
                        $arrDatoCkpt             = array();
                        $arrDatoCkpt['NumeGuia'] = $strNumeSeri;
                        $arrDatoCkpt['UltiCkpt'] = $objGuia->CodiCkpt;
                        $arrDatoCkpt['GuiaAnul'] = $objGuia->Anulada;
                        $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
                        $arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescCkpt." (".$objContenedor->NumeCont.")";
                        $arrDatoCkpt['CodiRuta'] = $strCodiRuta;
                        $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                        if ($arrResuGrab['TodoOkey']) {
                            $intContCkpt ++;
                        } else {
                            $blnTodoOkey = false;
                        }
                    } else {
                        //-----------------------------------------------------------------------
                        // Se registra en "contenedor_ckpt" un checkpoint "BG" para cada Valija
                        //-----------------------------------------------------------------------
                        $arrDatoCkpt             = array();
                        $arrDatoCkpt['NumeCont'] = $strNumeSeri;
                        $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
                        $arrDatoCkpt['TextObse'] = $objCheckpoint->DescCkpt;
                        $arrResuGrab = GrabarCheckpointContenedor($arrDatoCkpt)." (".$objContenedor->NumeCont.")";
                        if ($arrResuGrab['TodoOkey']) {
                            $intContVali ++;
                        } else {
                            $blnTodoOkey = false;
                        }
                    }
                } else {
                    $blnTodoOkey = false;
                }
            }
		}
		if ($blnTodoOkey && ($intContGuia == $intContCkpt)) {
			$strMensUsua = sprintf('El Proceso culmino Exitosamente. Guias procesadas (%s)  Checkpoints procesados (%s)',$intContGuia,$intContCkpt);
            $this->mensaje($strMensUsua,'m','s','l',__iCHEC__);
			$this->inicializarPantalla();
		} else {
			$strMensUsua = sprintf('Hubo Errores en la Transaccion. Guias procesadas (%s)  Checkpoints procesados (%s)',$intContGuia,$intContCkpt);
            $this->mensaje($strMensUsua,'m','w','l',__iEXCL__);
		}
        //------------------------
        // Log de Transacciones
        //------------------------
        $arrLogxCamb['strNombTabl'] = 'Contenedor';
        $arrLogxCamb['intRefeRegi'] = $objContenedor->NumeCont;
        $arrLogxCamb['strNombRegi'] = $objContenedor->NumeCont;
        $arrLogxCamb['strDescCamb'] = 'Envalijado: '.$strMensUsua;
        LogDeCambios($arrLogxCamb);
	}

	protected function inicializarPantalla() {
		$this->lstOperAbie->SelectedIndex = 0;
		$this->txtNumeCont->Text = '';
		$this->txtListNume->Text = '';
	}

}

Envalijar::Run('Envalijar');
?>