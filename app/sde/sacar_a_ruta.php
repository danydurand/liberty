<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class SacarARuta extends FormularioBaseKaizen {

	protected $arrEnca2PDF = array();
	protected $arrAnch2PDF = array();
	protected $arrJust2PDF = array();
	protected $arrDato2PDF = array();

	protected $lstOperAbie;  // Combo de Operaciones Abiertas
	protected $txtNumeCont;  // Numero de Contenedor
	protected $txtListNume;  // Lista de Seriales/Guias/Valijas

	protected $arrListNume;  // Arreglo que contiene los numeros de la lista
	protected $strCadeSqlx;
	protected $arrColuQury;
	protected $arrValoQury;
	protected $objDataBase;
	protected $blnExisCont;
	protected $lstTipoOper;
	protected $arrGuiaErro;  // Arreglo de errores surgidos durante el proceso
	protected $arrGuiaReto;  // Arreglo de Guias de Retorno
	protected $arrImprReto;  // Arreglo de Guias de Retorno para Impresion
	protected $dlgMensUsua;

	protected $btnManiCarg;
	protected $btnHojaEntr;
	protected $btnRepoErro;
	protected $btnImprReto;

	protected function Form_Create() {
		parent::Form_Create();
		$this->lblTituForm->Text = QApplication::Translate('Sacar a Ruta');

		$this->dlgMensUsua_Create();

		$this->lstTipoOper_Create();
		$this->lstOperAbier_Create();
		$this->txtNumeCont_Create();
		$this->txtListNume_Create();

		$this->btnSave->Text = TextoIcono('floppy-o','Guardar','F','fa-lg');

		$this->btnManiCarg_Create();
		$this->btnHojaEntr_Create();
		$this->btnRepoErro_Create();
		$this->btnImprReto_Create();

		$this->validarCampos();
	}

	//-----------------------------
	// Aqui se crean los objetos
	//-----------------------------

	protected function dlgMensUsua_Create() {
		$this->dlgMensUsua = new QDialogBox($this);
		$this->dlgMensUsua->Width = '500px';
		$this->dlgMensUsua->Height = '350px';
		$this->dlgMensUsua->Overflow = QOverflow::Auto;
		$this->dlgMensUsua->Padding = '10px';
		$this->dlgMensUsua->FontSize = '24px';
		$this->dlgMensUsua->FontNames = QFontFamily::Georgia;
		$this->dlgMensUsua->BackColor = '#eeffdd';
		$this->dlgMensUsua->Display = false;
		$this->dlgMensUsua->ForeColor = 'blue';
	}

	// Tipo de Operaciones
	protected function lstTipoOper_Create() {
		$this->lstTipoOper = new QListBox($this);
		$this->lstTipoOper->Name = QApplication::Translate("Tipo Operación/Ruta");
		$this->lstTipoOper->Required = true;
		$this->lstTipoOper->AddItem(QApplication::Translate("- Seleccione Uno -"),null);
		foreach (SdeTipoOper::LoadAll() as $objTipoOper) {
			$this->lstTipoOper->AddItem($objTipoOper->__toString(),$objTipoOper->CodiTipo);
		}
		$this->lstTipoOper->AddAction(new QChangeEvent(), new QAjaxAction('lstTipoOper_Change'));
	}

	// Operaciones
	protected function lstOperAbier_Create() {
		$this->lstOperAbie = new QListBox($this);
		$this->lstOperAbie->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		$this->lstOperAbie->Name = 'Operación';
		$this->lstOperAbie->Required = true;
		$this->lstOperAbie->Width = 300;
		$this->lstOperAbie->AddAction(new QChangeEvent(), new QAjaxAction('validarCampos'));
	}

	// Número de Contenedor
	protected function txtNumeCont_Create() {
		$this->txtNumeCont = new QTextBox($this);
		$this->txtNumeCont->Name = 'Precinto/Candado #';
		$this->txtNumeCont->AddAction(new QChangeEvent(), new QAjaxAction('validarCampos'));
		$this->txtNumeCont->Required = true;
	}

	// Lista de Seriales o Items asociados a una Guia
	protected function txtListNume_Create() {
		$this->txtListNume = new QTextBox($this);
		$this->txtListNume->Name = 'Guías/Valijas';
		$this->txtListNume->TextMode = QTextMode::MultiLine;
		$this->txtListNume->Required = true;
		$this->txtListNume->Width = 200;
		$this->txtListNume->Height = 220;
		$this->txtListNume->AddAction(new QChangeEvent(), new QAjaxAction('validarCampos'));
	}

	protected function btnManiCarg_Create() {
		$this->btnManiCarg = new QButtonI($this);
		$this->btnManiCarg->Text = TextoIcono('wpforms','Manifiesto','F','fa-lg');
		$this->btnManiCarg->AddAction(new QClickEvent(), new QServerAction('btnManiCarg_Click'));
		$this->btnManiCarg->Visible = false;
	}

	protected function btnHojaEntr_Create() {
		$this->btnHojaEntr = new QButtonI($this);
		$this->btnHojaEntr->Text = TextoIcono('wpforms','Hoja Entrega','F','fa-lg');
		$this->btnHojaEntr->AddAction(new QClickEvent(), new QServerAction('btnHojaEntr_Click'));
		$this->btnHojaEntr->Visible = false;
	}

	protected function btnRepoErro_Create() {
		$this->btnRepoErro = new QButtonD($this);
		$this->btnRepoErro->Text = TextoIcono('eye','Error(es)','F','fa-lg');
		$this->btnRepoErro->AddAction(new QClickEvent(), new QServerAction('btnRepoErro_Click'));
		$this->btnRepoErro->Visible = false;
	}

	protected function btnImprReto_Create() {
		$this->btnImprReto = new QButtonP($this);
		$this->btnImprReto->Text = TextoIcono('wpforms','Retorno(s)','F','fa-lg');
		$this->btnImprReto->AddAction(new QClickEvent(), new QServerAction('btnImprReto_Click'));
		$this->btnImprReto->Visible = false;
	}

	//---------------------------------------
	// Acciones asociadas a los objetos
	//---------------------------------------

	protected function btnImprReto_Click($strFormId, $strControlId, $strParameter) {
		//---------------------------------
		// Se imprimen las guias retorno
		//---------------------------------
		$_SESSION['Dato'] = serialize($this->arrImprReto);
		QApplication::Redirect('guia_pdf_lote.php');
	}

	protected function btnRepoErro_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------------
		// Datos necesarios para imprimir reporte PDF
		//--------------------------------------------------
		$this->arrEnca2PDF = array('Nro de Guia','Error');
		$this->arrAnch2PDF = array(20,100);
		$this->arrJust2PDF = array('C','L');
		$_SESSION['Dato'] = serialize($this->arrGuiaErro);
		$_SESSION['Enca'] = serialize($this->arrEnca2PDF);
		$_SESSION['Anch'] = serialize($this->arrAnch2PDF);
		$_SESSION['Just'] = serialize($this->arrJust2PDF);
		QApplication::Redirect('../util/tabla2pdf2.php?nomb_repo=Errores_Salida_A_Ruta');
	}

	protected function btnManiCarg_Click() {
		$objContenedor = SdeContenedor::Load($this->txtNumeCont->Text);
		if ($objContenedor) {
			if ($objContenedor->CountGuias()) {
				QApplication::Redirect('imprimir_manifiesto.php?manifiesto='.$this->txtNumeCont->Text);
			} else {
				$strMensUsua = QApplication::Translate('No hay Guias Asociadas');
				$this->mensaje($strMensUsua,'','w','i','exclamation-triangle');
			}
		}
	}

	protected function btnHojaEntr_Click() {
		$objContenedor = SdeContenedor::Load($this->txtNumeCont->Text);
		if ($objContenedor) {
			if ($objContenedor->CountGuias()) {
				QApplication::Redirect('imprimir_hoja_entrega.php?manifiesto='.$this->txtNumeCont->Text);
			} else {
                $strMensUsua = QApplication::Translate('No hay Guias Asociadas');
                $this->mensaje($strMensUsua,'','w','i','exclamation-triangle');
			}
		}
	}

	protected function lstTipoOper_Change() {
		$this->lstOperAbie->RemoveAllItems();
		$this->lstOperAbie->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
		if (!is_null($this->lstTipoOper->SelectedValue)) {
			//------------------------------------------------------------------------------------------------------
            // A petición de la Gerente de Operaciones Actual (Josely Tineo @2016), se procede a mostrar todas las
            // rutas, sin distinguir de la sede desde donde se esté cargando. Solamente se muestran las rutas según
            // el tipo seleccionado.
			//------------------------------------------------------------------------------------------------------
			$objClausula   = QQ::Clause();
			$objClausula[] = QQ::OrderBy(QQN::SdeOperacion()->CodiRuta);
			$intCodiTipo = $this->lstTipoOper->SelectedValue;
			$arrSdexOper = SdeOperacion::LoadArrayByCodiTipo($intCodiTipo,$objClausula);
			foreach ($arrSdexOper as $objOperacion) {
				if ($objOperacion->CodiRuta != "R9999") {
					if ($intCodiTipo == 0) {
						//---------------------------------------------------------------------------------------------
						// Solamente en el caso de las operaciones urbanas, escencialmente tienen que cargarse las que
                        // les corresponden a la Sede donde se realiza la operación.
						//---------------------------------------------------------------------------------------------
						if ($objOperacion->CodiEsta == $this->objUsuario->CodiEsta) {
							$this->lstOperAbie->AddItem(substr($objOperacion->__toString(),0,50),$objOperacion->CodiOper);
						}
					} else {
						$this->lstOperAbie->AddItem(substr($objOperacion->__toString(),0,50),$objOperacion->CodiOper);
					}
				}
			}
			/*foreach (SdeOperacion::LoadArrayByCodiEsta($this->objUsuario->CodiEsta,$objClausula) as $objOperacion) {
				//---------------------------------------------------------------------
				// Solo se deben mostrar las Rutas cuyo tipo, coincida con el valor
				// seleccionado por el Usuario
				//---------------------------------------------------------------------
				if ($objOperacion->CodiTipo == $this->lstTipoOper->SelectedValue) {
					if ($objOperacion->CodiRuta != "R9999" && $objOperacion->CodiEsta == $this->objUsuario->CodiEsta) {
						$this->lstOperAbie->AddItem(substr($objOperacion->__toString(),0,50),$objOperacion->CodiOper);
					}
				}
			}*/
		}
		if ($this->lstTipoOper->SelectedValue == 0) {
			//-----------------------------------
			// Ruta Urbana
			//-----------------------------------
			$this->txtNumeCont->Enabled = false;
			$this->txtNumeCont->ForeColor = 'blue';
			$this->btnHojaEntr->Visible = true;
			$this->btnManiCarg->Visible = false;
		} else {
			//-----------------------------------
			// Ruta Extra-Urbana
			//-----------------------------------
			$this->txtNumeCont->Enabled = true;
			$this->txtNumeCont->ForeColor = 'black';
			$this->btnHojaEntr->Visible = false;
			$this->btnManiCarg->Visible = true;
		}
	}

	protected function validarCampos() {
		$intContCar1 = $this->lstOperAbie->SelectedValue;
		if ($this->lstTipoOper->SelectedValue == 0) {
			//-----------------------------------------------------
			// Las Rutas "Urbanas" no requieren Número de Precinto
			//-----------------------------------------------------
			$intContCar2 = 1;
			$this->txtNumeCont->Required = false;
		} else {
			$this->txtNumeCont->Required = true;
			$intContCar2 = strlen($this->txtNumeCont->Text);
		}
		$intCantGuia = strlen($this->txtListNume->Text);
		if ($intContCar1 && $intContCar2 && $intCantGuia) {
			$this->habilitarBotonSalvar();
		} else {
			$this->deshabilitarBotonSalvar();
		}
		$this->mensaje();
	}

	protected function MostrarRetornos() {
		$this->arrImprReto = array();
		$strRelaGuia  = "<center><font size='2'>";
		$strRelaGuia .= "<table>";
		$strRelaGuia .= "<th align='center'><font size='2'><i>Guia</i></font></th><th><font size='2'><i>Remitente</i></font></th>";
		foreach ($this->arrGuiaReto as $arrGuiaReto) {
			$strRelaGuia .= "<tr>";
			$strRelaGuia .= "<td width='120' align='center'><font size='2'><i>".$arrGuiaReto[0]."</i></font></td>";
			$strRelaGuia .= "<td align='right'><font size='2'><i>".$arrGuiaReto[1]."</i></font></td>";
			$strRelaGuia .= "</tr>";
			$this->arrImprReto[] = $arrGuiaReto[2];
		}
		$strRelaGuia .= "</table>";
		$strRelaGuia .= "</font></center>";
		$this->dlgMensUsua->Text =
			'<i>Este Manifiesto incluye Guias con Retorno.  Particípecelo al Courier inmediatamente<br>'.
			$strRelaGuia.'<br>'.
			'<font color="red">Presione el boton "RETORNOS" p/imprimir las Guias</font><br><br>'.
			'(Haga click fuera del recuadro blanco para ocultar este mensaje)<br/><br>'.
			$this->dlgMensUsua->ShowDialogBox();
	}

	protected function inicializarPantalla() {
		$this->lstOperAbie->SelectedIndex = 0;
		$this->txtNumeCont->Text = '';
		$this->txtListNume->Text = '';
		$this->deshabilitarBotonSalvar();
		$this->btnManiCarg->Visible = false;
		$this->btnHojaEntr->Visible = false;
	}

	protected function deshabilitarBotonSalvar() {
		$this->btnSave->Enabled = false;
		$this->btnSave->ForeColor = 'gray';
	}

	protected function habilitarBotonSalvar() {
		$this->btnSave->Enabled = true;
		$this->btnSave->ForeColor = 'white';
	}

	protected function btnSave_Click() {
		$this->objDataBase = QApplication::$Database[1];
		$strTipoRuta = $this->lstTipoOper->SelectedValue == 0 ? "URBANA" : "EXTRA-URBANA";
		//------------------------------------------------------
		// Se graba o actualiza el contenedor en la tabla guia
		//------------------------------------------------------
		if ($strTipoRuta == "URBANA") {
			//---------------------------------------------------------------
			// Si la Ruta es "Urbana" y no se ha especificado un Contenedor
			// o Número de Valija el Sistema debe asignar un número.
			//---------------------------------------------------------------
			$this->txtNumeCont->Text = date('YmdHis');
		}
		$objContenedor = SdeContenedor::Load($this->txtNumeCont->Text);
		if (!$objContenedor) {
			$objContenedor = new SdeContenedor();
			$objContenedor->NumeCont = $this->txtNumeCont->Text;
			$objContenedor->Fecha = new QDateTime(QDateTime::Now);
			$objContenedor->Hora = date("H:i");
			$objContenedor->StatCont = 'P';
		}
		$objContenedor->CodiOper = $this->lstOperAbie->SelectedValue;
		$objContenedor->Save();
		if ($strTipoRuta == "URBANA") {
			$objCheckpoint = SdeCheckpoint::Load('ER');
		} else {
			$objCheckpoint = SdeCheckpoint::Load('TR');
		}
		//$blnTodoOkey = true;
		$this->arrListNume = explode(',',nl2br2($this->txtListNume->Text));
		//--------------------------------------------------
		// Con la funcion DejarSoloLosNumeros1 se eliminan
		// los caracteres especiales y letras
		//--------------------------------------------------
		array_walk($this->arrListNume,'DejarSoloLosNumeros1');
		//---------------------------------------------------------------------------
		// Con array_unique se eliminan las guias repetidas en caso de que las haya
		//---------------------------------------------------------------------------
		$this->arrListNume = array_unique($this->arrListNume,SORT_STRING);
		$this->txtListNume->Text = '';

		$arrDestinos = $objContenedor->GetDestinos();
		$strCodiRuta = $objContenedor->CodiOperObject->CodiRuta;
		$intContVali = 0;
		$intContGuia = 0;
		$intContCkpt = 0;
		$this->arrGuiaErro = array();
		$this->arrGuiaReto = array();
		foreach ($this->arrListNume as $strNumeSeri) {
			if (strlen($strNumeSeri)) {
				//-----------------------------------------------------------------------
				// Se procesa una a una las Guias/Valijas proporcionadas por el Usuario
				//-----------------------------------------------------------------------
				$objGuia = Guia::Load($strNumeSeri);
				if ($objGuia) {
					$arrSepuProc = $objGuia->SePuedeProcesar();
					if ($arrSepuProc['TodoOkey']) {
						if ($strTipoRuta == 'EXTRA-URBANA') {
							if ($objGuia->PesoGuia != 0 || $objGuia->SistemaId == "int") {
								//-------------------------------------------------------
								// Antes de asociar la Guia al Contenedor, se debe
								// verificar que el destino de la Guia, coincida con
								// algunos de los Destinos de la Operacion seleccionada
								// por el Usuario
								//-------------------------------------------------------
								if (in_array($objGuia->EstaDest,$arrDestinos)) {
									if (!$objContenedor->IsGuiaAssociated($objGuia)) {
										//---------------------------------------------
										// Se establece la relacion "contenedor-guia"
										//---------------------------------------------
										$objContenedor->AssociateGuia($objGuia);
										//--------------------------------
										// Se registra en "guia_ckpt"
										// el checkpoint correspondiente
										//--------------------------------
										$arrDatoCkpt = array();
										$arrDatoCkpt['NumeGuia'] = $objGuia->NumeGuia;
                                        $arrDatoCkpt['UltiCkpt'] = '';
                                        $arrDatoCkpt['GuiaAnul'] = $objGuia->Anulada;
										$arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
										$arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescCkpt.' ('.$objContenedor->NumeCont.')';
										$arrDatoCkpt['CodiRuta'] = $strCodiRuta;
										$arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
										if ($arrResuGrab['TodoOkey']) {
											$intContCkpt ++;
										} else {
											$this->arrGuiaErro[] = array($objGuia->NumeGuia,QApplication::Translate($arrResuGrab['MotiNook']));
										}
									}
								} else {
									$this->txtListNume->Text .= $strNumeSeri." (Destino no Coincide)".chr(13);
									$this->arrGuiaErro[] = array($objGuia->NumeGuia,QApplication::Translate('DESTINO ('.$objGuia->EstaDest.') NO COINCIDE'));
								}
							} else {
								$this->txtListNume->Text .= $strNumeSeri." (Peso de la guia no puede ser cero)".chr(13);
								$this->arrGuiaErro[] = array($objGuia->NumeGuia,QApplication::Translate('PESO ('.$objGuia->PesoGuia.') IGUAL A CERO'));
							}
						} else {
							//--------------
							// Ruta Urbana
							//--------------
							if ($objGuia->EstaDest != $this->objUsuario->CodiEsta) {
								$this->arrGuiaErro[] = array($objGuia->NumeGuia,'Esta Guia no tiene como Destino '.$this->objUsuario->CodiEsta);
							}
							$objContenedor->AssociateGuia($objGuia);
							$objGuia->HojaEntrega = $objContenedor->NumeCont;
							$objGuia->Save();
							//-----------------------------------------------------------
							// Se registra en "guia_ckpt" el checkpoint correspondiente
							//-----------------------------------------------------------
							$arrDatoCkpt = array();
							$arrDatoCkpt['NumeGuia'] = $objGuia->NumeGuia;
                            $arrDatoCkpt['UltiCkpt'] = '';
                            $arrDatoCkpt['GuiaAnul'] = $objGuia->Anulada;
							$arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
							$arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescCkpt.' ('.$objContenedor->NumeCont.')';
							$arrDatoCkpt['CodiRuta'] = $strCodiRuta;
							$arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
							if ($arrResuGrab['TodoOkey']) {
								$intContCkpt ++;
							} else {
								$this->arrGuiaErro[] = array($objGuia->NumeGuia,QApplication::Translate($arrResuGrab['MotiNook']));
							}
						}
						$intContGuia ++;
						//-----------------------------------------------------------------
						// Luego de marcar la guia con el checkpoint de "Salida a Ruta",
						// se verifica si la Guia tiene alguna Guia Retorno. Esto se hace
						// con el fin de advertir al Usuario de la existencia
						// de tales guias de retorno
						//-----------------------------------------------------------------
						if (strlen($objGuia->GuiaRetorno) > 0) {
							$this->arrGuiaReto[] = array($objGuia->NumeGuia,$objGuia->NombRemi,$objGuia->GuiaRetorno);
						}
					} else {
						$this->txtListNume->Text .= $strNumeSeri." (".$arrSepuProc['MensUsua'].")".chr(13);
						$this->arrGuiaErro[] = array($objGuia->NumeGuia,QApplication::Translate($arrSepuProc['MensUsua']));
					}
				} else {
					//---------------------------------------------------
					// Si no es una Guia, se chequea que sea una Valija
					//---------------------------------------------------
					$objValija = SdeContenedor::Load($strNumeSeri);
					if ($objValija) {
						if (!$objValija->IsSdeContenedorAsSdeContContAssociated($objContenedor)) {
							//-----------------------------------------------
							// Se establece la relación "contenedor-valija"
							//-----------------------------------------------
							$objValija->AssociateSdeContenedorAsSdeContCont($objContenedor);
							//--------------------------------------
							// Se registra en "contenedor_ckpt" un
							// checkpoint para cada Valija
							//--------------------------------------
							$arrDatoCkpt = array();
							$arrDatoCkpt['NumeCont'] = $strNumeSeri;
							$arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
							$arrDatoCkpt['TextObse'] = $objCheckpoint->DescCkpt;
							$arrResuGrab = GrabarCheckpointContenedor($arrDatoCkpt);
							if ($arrResuGrab['TodoOkey']) {
								$intContVali ++;
							} else {
								$this->arrGuiaErro[] = array($objGuia->NumeGuia,QApplication::Translate($arrResuGrab['MotiNook']));
							}
						}
						$arrGuiaVali = $objValija->GetGuiaArray();
						foreach ($arrGuiaVali as $objGuiaVali) {
							//-------------------------------------------
							// Se registra en "guia_ckpt" un checkpoint
							// para cada guia de la Valija
							//-------------------------------------------
							$arrDatoCkpt = array();
							$arrDatoCkpt['NumeGuia'] = $objGuiaVali->NumeGuia;
                            $arrDatoCkpt['UltiCkpt'] = '';
                            $arrDatoCkpt['GuiaAnul'] = $objGuia->Anulada;
							$arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
							$arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescCkpt.' ('.$objContenedor->NumeCont.')';
							$arrDatoCkpt['CodiRuta'] = $strCodiRuta;
							$arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
							if ($arrResuGrab['TodoOkey']) {
								$intContCkpt ++;
							} else {
								$this->arrGuiaErro[] = array($objGuia->NumeGuia,QApplication::Translate($arrResuGrab['MotiNook']));
							}
							$intContGuia ++;
						}
						$intContVali ++;
					} else {
						$this->txtListNume->Text .= $strNumeSeri." (No Existe Guia/Valija)".chr(13);
						$this->arrGuiaErro[] = array($strNumeSeri,QApplication::Translate($strNumeSeri." (No Existe Guia/Valija)"));
					}
				}
			}
		}
		$strMensUsua = sprintf('Guias procesadas (%s)  Checkpoints procesados (%s)',$intContGuia,$intContCkpt);
		$this->mensaje($strMensUsua,'','','i','check');
		//--------------------------------------------------------------------------------
		// Si hubo algun error, el boton que permite listar los errores, se hace visible
		//--------------------------------------------------------------------------------
		if (count($this->arrGuiaErro)) {
			$this->btnRepoErro->Visible = true;
		}
		//-------------------------------------------------------
		// Si hay "Retornos" los mismos se muestran en pantalla
		//-------------------------------------------------------
		if (count($this->arrGuiaReto)) {
			$this->btnImprReto->Visible = true;
			$this->MostrarRetornos();
		} else {
			$this->btnImprReto->Visible = false;
		}
		$this->btnManiCarg->Visible = true;
	}
}
SacarARuta::Run('SacarARuta');
?>