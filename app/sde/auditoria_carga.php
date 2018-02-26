<?php
//-----------------------------------------------------------------------------
// Programa      : auditoria_carga.php
// Realizado por : Juan Duran
// Fecha Elab.   : 25/02/2017
// Descripcion   : Este programa muestra un formulario con los campos 
//                 requeridos para auditar la carga recibida.
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class AuditoriaCarga extends FormularioBaseKaizen {
    protected $objDataBase;

    protected $lstOperAbie;  // Combo de Operaciones Abiertas
    protected $lstNumeCont;  // Lista de Contenedores
    protected $txtListNume;  // Lista de Guías

    protected $arrListNume;  // Arreglo que contiene los números de la lista
    protected $arrColuQury;
    protected $arrValoQury;
    protected $arrGuiaDisc;
    protected $arrGuiaSina;

    protected $strCadeSqlx;
    protected $lstTipoOper;
    protected $blnExisCont;
    protected $btnRepoDisc;

    protected function Form_Create() {
        parent::Form_Create();
        //$this->validarCampos();
        $this->lblTituForm->Text = QApplication::Translate('Auditoría de Carga');

        $this->lstOperAbier_Create();
        $this->lstNumeCont_Create();
        $this->txtListNume_Create();

        $this->btnRepoDisc_Create();
    }

    //----------------------------
    // Aquí se Crean los Objetos
    //----------------------------

    // Operaciones //
    protected function lstOperAbier_Create() {
        $this->lstOperAbie = new QListBox($this);
        $this->lstOperAbie->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->lstOperAbie->Name = QApplication::Translate('Operación/Ruta');
        $this->lstOperAbie->Width = 220;
        $this->lstOperAbie->AddAction(new QChangeEvent(), new QAjaxAction('lstOperAbie_Change'));
        $objClausula = QQ::Clause();
        $objClausula[] = QQ::OrderBy(QQN::SdeOperacion()->CodiRuta);
        foreach (SdeOperacion::LoadArrayByCodiTipo(1,$objClausula) as $objOperacion) {
            if ($objOperacion->CodiRuta != "R9999") {
                $this->lstOperAbie->AddItem($objOperacion->__toString(),$objOperacion->CodiOper);
            }
        }
        //$this->lstOperAbie->AddAction(new QChangeEvent(), new QAjaxAction('validarCampos'));
    }

    // Nro de Contenedor //
    protected function lstNumeCont_Create() {
        $this->lstNumeCont = new QListBox($this);
        $this->lstNumeCont->Name = QApplication::Translate('Precinto/Contenedor');
        $this->lstNumeCont->Width = 140;
        //$this->lstNumeCont->AddAction(new QChangeEvent(), new QAjaxAction('validarCampos'));
    }

    // Lista de Seriales o Items asociados a una Guía //
    protected function txtListNume_Create() {
        $this->txtListNume = new QTextBox($this);
        $this->txtListNume->Name = QApplication::Translate('Guías');
        $this->txtListNume->TextMode = QTextMode::MultiLine;
        $this->txtListNume->Rows = 20;
        $this->txtListNume->Width = 220;
        $this->txtListNume->Height = 240;
    }

    protected function btnRepoDisc_Create() {
        $this->btnRepoDisc = new QButtonI($this);
        $this->btnRepoDisc->Text = TextoIcono('wpforms','Ver Discrepancia','F','fa-lg');
        $this->btnRepoDisc->AddAction(new QClickEvent(), new QServerAction('reporteDeDiscrepancias'));
        $this->btnRepoDisc->Enabled = false;
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function lstOperAbie_Change() {
        $this->lstNumeCont->RemoveAllItems();
        $arrContPend = SdeContenedor::LoadArrayByCodiOperStatCont($this->lstOperAbie->SelectedValue,'R',QQ::Clause(QQ::OrderBy(QQN::SdeContenedor()->Fecha,false),QQ::LimitInfo(1000)));
        $intContPend = count($arrContPend);
        $this->lstNumeCont->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intContPend.')'),null);
        foreach ($arrContPend as $objContenedor) {
            $this->lstNumeCont->AddItem($objContenedor->NumeCont,$objContenedor->NumeCont);
        }
    }

    protected function enviarCorreoSinAduana() {
        $arrEncaReco = array('Nro Guia');
        $arrJustColu = array('C');
        $arrAnchColu = array(20);
        $objParaLogo = Parametro::Load('88888','logos');
        $objParaFisc = Parametro::Load('88888','datfisc');
        $strLogoComp = '../'.$objParaLogo->ParaTxt1;
        $strNombEmpr = $objParaFisc->ParaTxt1;
        $strDireEmpr = $objParaFisc->ParaTxt5;
        $strTituRepo = 'Guias HGV sin Aduana';
        //-------------------------------
        // Genero el reporte solicitado
        //-------------------------------
        $strNombArch = "GuiasHGVSinAduana.pdf";
        $pdf=new PDF('L','mm','Letter');
        $pdf->setVariables($arrEncaReco,$arrJustColu,$arrAnchColu,02,$strLogoComp);
        $pdf->setEmpresa($strNombEmpr,$strDireEmpr,$strTituRepo);
        $pdf->SetTitle('Guias HGV sin Aduana');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->FancyTable($arrEncaReco,$this->arrGuiaSina,$arrAnchColu,$arrJustColu);
        $pdf->Output($strNombArch);
        //----------------------------------------------------------------------------------------------------
        // La maquina del laboratorio no tiene habilitado el Sendmail por lo tanto se creo un parametro que 
        // le dice al programa si debe o no enviar el e-mail
        //----------------------------------------------------------------------------------------------------
        $strEnviMail = BuscarParametro('EnviMail','MailSino',"Txt1","S");
        $strMailSina = BuscarParametro('MailSina','DireMail',"Txt1","hruiz@libertyexpress.com");
        //--------------------------------
        // Envio el reporte por e-mail
        //--------------------------------
        $arrDestCorr = array();
        $arrDireMail = explode(',',$strMailSina);
        foreach ($arrDireMail as $strDireMail) {
            array_push($arrDestCorr,$strDireMail);
        }
        $to = $arrDestCorr;
        $attach = $strNombArch;
        $mimemail = new MIMEMAIL('plain/text');
        $mimemail->senderName = 'LibertyExpress';
        $mimemail->senderMail = 'localhost@app-libertyexpress.com';
        $mimemail->subject = "Guias HGV sin Monto de Aduana";
        $mimemail->body = '';
        $mimemail->attachments[] = $attach;
        $mimemail->create();
        if ($strEnviMail == 'S') {
            $mimemail->send($to);
        }
    }

    protected function Form_Validate() {
        $strTextMens = 'Los siguientes campos son requeridos: <b>';
        $strMensErro = '';
        $blnTodoOkey = true;
        $this->mensaje();
        //------------------------------------
        // Validando campo de Operación/Ruta.
        //------------------------------------
        if (is_null($this->lstOperAbie->SelectedValue)){
            $blnTodoOkey = false;
            $strMensErro .= 'Operación/Ruta';
        }
        //-----------------------------------------
        // Validando campo de Precinto/Contenedor.
        //-----------------------------------------
        if (is_null($this->lstNumeCont->SelectedValue)) {
            $blnTodoOkey = false;
            if (strlen($strMensErro) > 0) {
                $strMensErro .= ', ';
            }
            $strMensErro .= 'Precinto/Contenedor';
        }
        //---------------------------
        // Validando campo de Guías.
        //---------------------------
        if (strlen($this->txtListNume->Text) == 0) {
            $blnTodoOkey = false;
            if (strlen($strMensErro) > 0) {
                $strMensErro .= ', ';
            }
            $strMensErro .= 'Guías';
        }
        //-------------------------------------------------------------------------------------------
        // Si hay uno o más errores, se notifica al usuario y no se permite la gestión de auditoría.
        //-------------------------------------------------------------------------------------------
        if (!$blnTodoOkey) {
            $strTextMens .= $strMensErro;
            $strTextMens .= '</b>.';
            $this->mensaje($strTextMens,'','d','i','hand-stop-o');
        }
        return $blnTodoOkey;
    }

    /*protected function validarCampos() {
        if (isset($this->lstOperAbie->SelectedValue)) {
            $intContCar1 = $this->lstOperAbie->SelectedValue;
        }
        if (isset($this->lstNumeCont->SelectedValue)) {
            $intContCar2 = $this->lstNumeCont->SelectedValue;
        }
        //      $intCantGuia = strlen($this->txtListNume->Text);
        if (isset($intContCar1) && isset($intContCar2)) {
            $this->habilitarBotonSalvar();
        } else {
            $this->deshabilitarBotonSalvar();
        }
        $this->mensaje();
    }*/

    protected function reporteDeDiscrepancias() {
        $arrEnca2PDF = array('Nro de Guia','Destinatario','Origen','Destino','Peso','Piezas','Discrepancia');
        $arrAnch2PDF = array(25,90,20,20,15,15,20);
        $arrJust2PDF = array('C','L','C','C','R','R','C');
        $_SESSION['Dato'] = serialize($this->arrGuiaDisc);
        $_SESSION['Enca'] = serialize($arrEnca2PDF);
        $_SESSION['Anch'] = serialize($arrAnch2PDF);
        $_SESSION['Just'] = serialize($arrJust2PDF);
        QApplication::Redirect('../util/tabla2pdf2.php?nomb_repo=Discrepancias');
    }

    /*protected function inicializarPantalla() {
        $this->lstOperAbie->SelectedIndex = 0;
        $this->lstNumeCont->SelectedIndex = 0;
        $this->txtListNume->Text = '';
        $this->deshabilitarBotonSalvar();
    }*/

    /*protected function habilitarBotonSalvar() {
        $this->btnSave->Enabled = true;
        $this->btnSave->ForeColor = 'white';
    }*/

    /*protected function deshabilitarBotonSalvar() {
        $this->btnSave->Enabled = false;
        $this->btnSave->ForeColor = 'gray';
    }*/

    protected function btnSave_Click() {
        $this->objDataBase = QApplication::$Database[1];
        //miTraza('Proceso: Auditoria de Carga');
        //miTraza('===========================');
        $objContenedor = SdeContenedor::Load($this->lstNumeCont->SelectedValue);
        $blnTodoOkey = true;
        $strCodiRuta = $objContenedor->CodiOperObject->CodiRuta;
        $intContVali = 0;
        $intContGuia = 0;
        $intContCkpt = 0;
        $intContSobr = 0;
        $intContFalt = 0;
        $strCkptUnox = '';
        $strCkptDosx = '';
        //------------------------------------------------------------
        // Las operaciones realizadas sobre una master determinan el
        // par de checkpoints que se estarán usando en este proceso.
        //------------------------------------------------------------
        if ($objContenedor->tieneCheckpoint('AR')) {
            $strCkptUnox = 'AV';  // Auditoria de Valija
            $strCkptDosx = 'AR';  // LLegada a la Sucursal
        } elseif ($objContenedor->tieneCheckpoint('KU')) {
            $strCkptUnox = 'WU';  // Recepcion Almacen La Urbina Edif Pionner Confirmada
            $strCkptDosx = 'KU';  // Recepcion Almacen La Urbina Edif Pionner 
        } elseif ($objContenedor->tieneCheckpoint('KH')) {
            $strCkptUnox = 'WH';  // Recepcion Almacen La Urbina Sede Antigua Edif Renzo Confirmada
            $strCkptDosx = 'KH';  // Recepcion Almacen La Urbina Sede Antigua Edif Renzo
        } elseif ($objContenedor->tieneCheckpoint('KE')) {
            $strCkptUnox = 'WK';  // Recepcion Almacen Boleita Confirmada
            $strCkptDosx = 'KE';  // Recepcion Almacen Boleita
        } elseif ($objContenedor->tieneCheckpoint('KX')) {
            $strCkptUnox = 'WX';  // Recepcion Almacen Altamira Confirmada
            $strCkptDosx = 'KX';  // Recepcion Almacen Altamira
        } elseif ($objContenedor->tieneCheckpoint('KZ')) {
            $strCkptUnox = 'WZ';  // Recepcion Ciudad Center-Boleita Confirmada
            $strCkptDosx = 'KZ';  // Recepcion Ciudad Center-Boleita
        } elseif ($objContenedor->tieneCheckpoint('K1')) {
            $strCkptUnox = 'W1';  // Recepcion Sabana Grande Confirmada
            $strCkptDosx = 'K1';  // Recepcion Sabana Grande
        } elseif ($objContenedor->tieneCheckpoint('KQ')) {
            $strCkptUnox = 'WQ';  // Recepcion Almacen Altamira Confirmada Nueva Sede
            $strCkptDosx = 'KQ';  // Recepcion Almacen Altamira Nueva Sede
        } elseif ($objContenedor->tieneCheckpoint('KB')) {
            $strCkptUnox = 'WB';  // Recepcion Almacen Barquisimeto Confirmada
            $strCkptDosx = 'KB';  // Recepcion Almacen Barquisimeto
        } elseif ($objContenedor->tieneCheckpoint('KD')) {
            $strCkptUnox = 'WD';  // Recepcion Dos Caminos Confirmada
            $strCkptDosx = 'KD';  // Recepcion Dos Caminos
        } elseif ($objContenedor->tieneCheckpoint('KL')) {
            $strCkptUnox = 'WL';  // Recepcion Barcelona Confirmada
            $strCkptDosx = 'KL';  // Recepcion Barcelona
        } elseif ($objContenedor->tieneCheckpoint('KV')) {
            $strCkptUnox = 'WV';  // Recepcion Almacen Valencia
            $strCkptDosx = 'KV';  // Recepcion Almacen Valencia
        } elseif ($objContenedor->tieneCheckpoint('KT')) {
            $strCkptUnox = 'WT';  // Recepcion Almacen Bello Monte
            $strCkptDosx = 'KT';  // Recepcion Almacen Bello Monte
        } elseif ($objContenedor->tieneCheckpoint('KN')) {
            $strCkptUnox = 'WN';  // Confirmada Almacen Panteon
            $strCkptDosx = 'KN';  // Recepcion Almacen Panteon
        } elseif ($objContenedor->tieneCheckpoint('KP')) {
            $strCkptUnox = 'WP';  // Confirmada Almacen Pto Ordaz
            $strCkptDosx = 'KP';  // Recepcion Almacen Pto Ordaz
        } elseif ($objContenedor->tieneCheckpoint('KO')) {
            $strCkptUnox = 'WO';  // Confirmada Almacen Maracaibo
            $strCkptDosx = 'KO';  // Recepcion Almacen Maracaibo
        } elseif ($objContenedor->tieneCheckpoint('KG')) {
            $strCkptUnox = 'WG';  // Confirmada Almacen La Guaira
            $strCkptDosx = 'KG';  // Recepcion Almacen La Guaira
        } elseif ($objContenedor->tieneCheckpoint('KJ')) {
            $strCkptUnox = 'WC';  // Confirmada Almacen Porlamar
            $strCkptDosx = 'KJ';  // Recepcion Almacen Porlamar 
        } elseif ($objContenedor->tieneCheckpoint('KS')) {
            $strCkptUnox = 'WS';  // Confirmada Almacen Santa Paula
            $strCkptDosx = 'KS';  // Recepcion Almacen Santa Paula    
        } elseif ($objContenedor->tieneCheckpoint('KW')) {
            $strCkptUnox = 'WW';  // Confirmada MARACAY
            $strCkptDosx = 'KW';  // Recepcion MARACAY    
        } elseif ($objContenedor->tieneCheckpoint('KY')) {
            $strCkptUnox = 'WY';  // Confirmada BARQUISIMETO C/40
            $strCkptDosx = 'KY';  // Recepcion BARQUISIMETO C/40
        } elseif ($objContenedor->tieneCheckpoint('KF')) {
            $strCkptUnox = 'WF';  // Confirmada Almacen Pto Fijo
            $strCkptDosx = 'KF';  // Recepcion Almacen Pto Fijo
        } else {
            // $strCkptUnox = 'WM';  // Recepcion Almacen Monte Cristo Confirmada
            // $strCkptDosx = 'KM';  // Recepcion Almacen Monte Cristo
            //$lblMensUsua = "No existe la sucursal";
        }
        //miTraza('Los checkpoints que seran procesados son: '.$strCkptUnox.' y '.$strCkptDosx);
        //----------------------------------------------------------
        // Se registra un checkpoint "Uno" para cada Guía digitada
        // en la pantalla. Esto se hace siempre y cuando no tenga
        // dicho checkpoint previamente registrado en la Sucursal
        //----------------------------------------------------------
        $this->arrListNume = array();
        $this->arrListNume = explode(',',nl2br2($this->txtListNume->Text));
        //---------------------------------------------------------------------------------------
        // Con la función "DejarSoloLosNumeros1" se eliminan los caractéres especiales y letras
        //---------------------------------------------------------------------------------------
        array_walk($this->arrListNume,'DejarSoloLosNumeros1');
        //-----------------------------------------------------------------------------
        // Con "array_unique" se eliminan las guías repetidas en caso de que las haya
        //-----------------------------------------------------------------------------
        $this->arrListNume = array_unique($this->arrListNume);
        $this->arrGuiaSina = array();
        $this->txtListNume->Text = '';
        //miTraza('Voy a grabar el checkpoint '.$strCkptUnox.' para cada guia ');
        $objCheckpoint = SdeCheckpoint::Load($strCkptUnox);
        foreach ($this->arrListNume as $strGuiaArri) {
            if (strlen($strGuiaArri) > 0) {
                $objGuia = Guia::Load($strGuiaArri);
                if ($objGuia) {
                    //miTraza("Voy a evaluar la guia: ".$objGuia->NumeGuia);
                    if ($objGuia->ultimoCheckpointEnSucursal($this->objUsuario->CodiEsta) != $strCkptUnox) {
                        //miTraza("Esa guia no tiene ".$strCkptUnox." en ".$this->objUsuario->CodiEsta);
                        //-----------------------------------------
                        // Se Registra un Checkpoint para la Guía
                        //-----------------------------------------
                        $arrDatoCkpt = array();
                        $arrDatoCkpt['NumeGuia'] = $strGuiaArri;
                        $arrDatoCkpt['UltiCkpt'] = '';
                        $arrDatoCkpt['GuiaAnul'] = $objGuia->Anulada;
                        $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
                        $arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescCkpt." (".$objContenedor->NumeCont.")";
                        $arrDatoCkpt['CodiRuta'] = '';
                        $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                        if ($arrResuGrab['TodoOkey']) {
                            $intContCkpt ++;
                            //miTraza("Ya grabe el checkpoint para la guia. Van: ".$intContCkpt." checkpoints grabados");
                        } else {
                            $blnTodoOkey = false;
                            if ($arrResuGrab['MotiNook'] == "Alto Valor sin Monto de Aduana") {
                                $this->arrGuiaSina[] = $strGuiaArri;
                            }
                            //miTraza("Error al registrar checkpoint a la Guia: ".$objGuia->NumeGuia." El mensaje de error fue: ".$arrResuGrab['MotiNook']);
                            $strMensUsua  = QApplication::Translate("Error al registrar checkpoint a la Guia: ".$objGuia->NumeGuia);
                            $strMensUsua .= " - ".$arrResuGrab['MotiNook'];
                            $this->mensaje($strMensUsua,'','d','i','hand-stop-o');
                            $this->btnSave->Enabled = false;
                        }
                    }
                    $intContGuia++;
                }
            }
        }
        sleep(1);
        //-------------------------------------------------
        // Se procede a cargar en un vector las Guías del
        // Precinto que hayan sido recibidas y auditadas.
        //-------------------------------------------------
        $arrGuiaReci = $objContenedor->GetGuiasConCheckpoint($strCkptDosx);

        $arrGuiaAudi = $this->arrListNume;

        $this->arrGuiaDisc = array();  // Arreglo de Discrepancias
        //-------------------------
        // Detección de Sobrantes
        //-------------------------
        $objContenedor = SdeContenedor::Load($objContenedor->NumeCont);
        //miTraza('Deteccion de Sobrantes');
        $objCheckpoint = SdeCheckpoint::Load($strCkptUnox);
        $objCkptRece = SdeCheckpoint::Load($strCkptDosx);
        foreach ($arrGuiaAudi as $strGuiaAudi) {
            if (strlen($strGuiaAudi) > 0) {
                //---------------------------------------------------
                // Se Chequean las Guías Recibidas vs las Auditadas
                //---------------------------------------------------
                //miTraza("Voy a verificar si la guia ".$strGuiaAudi." llego a la Sucursal/Almacen");
                if (!in_array($strGuiaAudi,$arrGuiaReci)) {
                    $objGuiaDisc = Guia::Load($strGuiaAudi);
                    //miTraza("Estoy verificando que la guia ".$strGuiaAudi." este en la tabla guia ");
                    if ($objGuiaDisc) {
                        if ($objGuiaDisc->Anulada > 0) {
                            //------------------------
                            // La guía está eliminada
                            //------------------------
                            $this->arrGuiaDisc[] = array($strGuiaAudi,QApplication::Translate('La Guia FUE ELIMINADA'),'','','','','FUE ELIMINADA');
                            $this->txtListNume->Text .= $strGuiaAudi." (ELIMINADA)".chr(13);
                        } else {
                            //miTraza("La guia ".$strGuiaAudi." no aparece como Recibida, por lo tanto se considera un Sobrante");
                            $this->arrGuiaDisc[] = array($strGuiaAudi,$objGuiaDisc->NombDest,$objGuiaDisc->EstaOrig,$objGuiaDisc->EstaDest,$objGuiaDisc->PesoGuia,$objGuiaDisc->CantPiez,'SOBRANTE');
                            $this->txtListNume->Text .= $strGuiaAudi." (SOBRANTE)".chr(13);
                            $intContSobr++;

                            if ($strGuiaAudi) {
                                //---------------------------------------------------------------
                                // Se Registra el Checkpoint de Recepción para la Guía Sobrante
                                //---------------------------------------------------------------
                                $arrDatoCkpt = array();
                                $arrDatoCkpt['NumeGuia'] = $strGuiaAudi;
                                $arrDatoCkpt['UltiCkpt'] = '';
                                $arrDatoCkpt['GuiaAnul'] = $objGuiaDisc->Anulada;
                                $arrDatoCkpt['CodiCkpt'] = $objCkptRece->CodiCkpt;
                                $arrDatoCkpt['TextCkpt'] = $objCkptRece->DescCkpt." (".$objContenedor->NumeCont.")";
                                $arrDatoCkpt['CodiRuta'] = '';
                                $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                                sleep(1);
                                //------------------------------------------------------------------
                                // Se Registra el Checkpoint de Confirmación para la Guía Sobrante
                                //------------------------------------------------------------------
                                $arrDatoCkpt = array();
                                $arrDatoCkpt['NumeGuia'] = $strGuiaAudi;
                                $arrDatoCkpt['UltiCkpt'] = '';
                                $arrDatoCkpt['GuiaAnul'] = $objGuiaDisc->Anulada;
                                $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
                                $arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescCkpt." (".$objContenedor->NumeCont.")";
                                $arrDatoCkpt['CodiRuta'] = '';
                                $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                                //----------------------------------
                                // Se Asocia la Guia al Contenedor
                                //----------------------------------
                                $objContenedor->AsociaLaGuia($strGuiaAudi);
                            } else {
                                $this->txtListNume->Text .= $strGuiaAudi." (NO EXISTE)".chr(13);
                            }
                        }
                    } else {
                        $intContSobr++;
                        $this->arrGuiaDisc[] = array($strGuiaAudi,QApplication::Translate('La Guia NO EXISTE'),'','','','','NO EXISTE');
                        $this->txtListNume->Text .= $strGuiaAudi." (NO EXISTE)".chr(13);
                    }
                }
            }
        }
        //-------------------------
        // Detección de Faltantes
        //-------------------------
        //miTraza('Deteccion de Faltantes');
        $objCheckpoint = SdeCheckpoint::Load('RM');
        foreach ($arrGuiaReci as $strGuiaReci) {
            //-------------------------------------------------------------
            // Se chequean las Guías Manifestadas vs las Guías Scanneadas
            //-------------------------------------------------------------
            //miTraza("Voy a verificar si la guia ".$strGuiaReci." fue Auditada");
            if (!in_array($strGuiaReci,$arrGuiaAudi)) {
                $objGuiaDisc = Guia::Load($strGuiaReci);
                if ($objGuiaDisc) {
                    if ($objGuiaDisc->Anulada > 0) {
                        $this->arrGuiaDisc[] = array($strGuiaReci,QApplication::Translate('La Guia FUE ELIMINADA'),'','','','','FUE ELIMINADA');
                        $this->txtListNume->Text .= $strGuiaReci." (ELIMINADA)".chr(13);
                    } else {
                        //miTraza("La guia ".$strGuiaAudi." esta manifestada pero no se confirmo su Recepcion, se trata de un Faltante");
                        $this->arrGuiaDisc[] = array($strGuiaReci,$objGuiaDisc->NombDest,$objGuiaDisc->EstaOrig,$objGuiaDisc->EstaDest,$objGuiaDisc->PesoGuia,$objGuiaDisc->CantPiez,'FALTANTE');
                        $this->txtListNume->Text .= $strGuiaReci." (FALTANTE)".chr(13);
                        $intContFalt++;
                        //-------------------------------------------------------------------
                        // Se Registra en "guia_ckpt" un checkpoint para cada Guía Faltante
                        //-------------------------------------------------------------------
                        $arrDatoCkpt = array();
                        $arrDatoCkpt['NumeGuia'] = $strGuiaReci;
                        $arrDatoCkpt['UltiCkpt'] = '';
                        $arrDatoCkpt['GuiaAnul'] = $objGuiaDisc->Anulada;
                        $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
                        $arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescCkpt." (".$objContenedor->NumeCont.")";
                        $arrDatoCkpt['CodiRuta'] = '';
                        $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                    }
                } else {
                    $this->arrGuiaDisc[] = array($strGuiaReci,QApplication::Translate('La Guia NO EXISTE'),'','','','','NO EXISTE');
                    $this->txtListNume->Text .= $strGuiaReci." (NO EXISTE)".chr(13);
                }
            }
        }
        if (count($this->arrGuiaDisc) == 0) {
            $strMensUsua = QApplication::Translate(sprintf("Transaccion Exitosa. Se validaron (%s) Guias",$intContGuia));
            $this->mensaje($strMensUsua,'','','i','check');
        } else {
            $strMensUsua = QApplication::Translate(sprintf("Hubo Discrepancias. Faltantes (%s) / Sobrantes ".$intContSobr,$intContFalt,$intContSobr));
            $this->mensaje($strMensUsua,'','d','i','hand-stop-o');
            $this->btnRepoDisc->Enabled = true;
        }
        //-------------------------------------------------------------------
        // Si durante el proceso se detectaron Guías de Alto Valor que se
        // intentaron confirmar sin haberles cargado el monto de la Aduana,
        // se debe emitir un correo a la persona encargada de esa tarera
        //-------------------------------------------------------------------
        if (count($this->arrGuiaSina) > 0) {
            $this->enviarCorreoSinAduana();
        }
    }
}

AuditoriaCarga::Run('AuditoriaCarga');
?>