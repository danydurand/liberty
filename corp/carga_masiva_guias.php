<?php
//--------------------------------------------------------------------------------------------------------------------
// Programa       : carga_masiva_guias.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 21/11/2017
// Proyecto       : newliberty
// Descripcion    : Este programa es el encargado de cargar guías masivamente a un cliente corporativo, a través de
//                  un archivo plano.
//--------------------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class CargaMasivaGuias extends FormularioBaseKaizen {
    protected $objTarifa;
    /* @var $objCliente MasterCliente */
    protected $objCliente;
    /* @var $objUsuario UsuarioConnect */
    protected $objUsuario;
    /* @var $objProducto FacProducto */
    protected $objProducto;
    protected $objProcEjec;

    protected $intOperGuia;
    protected $decPorcIvax;
    protected $strMensProc;
    protected $arrCliePPDx;
    protected $intTipoGuia;

    protected $txtCargArch;

    protected $lblNumeCarg;
    protected $lblNumePend;
    protected $lblNumeAjus;
    protected $lblNumeProc;
    protected $lblNumeErro;

    protected $btnImpoGuia;
    protected $btnAjusGuia;
    protected $btnErroProc;
    protected $btnMostSucu;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Carga Masiva de Guías';
        $this->strMensProc = '';

        //-------------------------------------------
        // Modalidad de Pago de la Guía por defecto.
        //-------------------------------------------
        $this->intTipoGuia = TipoGuiaType::CRDCREDITO;

        //-----------------------------------------
        // Cliente Corporativo (Usuario operativo)
        //-----------------------------------------
        $this->objCliente = unserialize($_SESSION['ClieMast']);

        //---- Información ----

        $this->txtCargArch_Create();

        //---- Importación y procesamiento ----

        $this->lblNumeCarg_Create();
        $this->lblNumeProc_Create();
        $this->lblNumePend_Create();
        $this->lblNumeAjus_Create();
        $this->lblNumeErro_Create();

        // ---- Botones ----

        $this->btnImpoGuia_Create();
        $this->btnErroProc_Create();
        $this->btnMostSucu_Create();

        $this->btnSave->Text = TextoIcono('cogs fa-lg','Procesar');
        $this->btnSave->PrimaryButton = false;
        $this->btnSave->CausesValidation = false;
        $this->btnSave->Visible = false;

        $this->btnAjusGuia_Create();

        //---- Atributos y funciones ----

        $dteFechDhoy = FechaDeHoy();
        $this->decPorcIvax = FacImpuesto::LoadImpuestoVigente('IVA',$dteFechDhoy);

        $this->mensaje();
        $this->activarProcesamiento();
    }

    //-------------------------
    // Creación de objetos ...
    //-------------------------

    protected function txtCargArch_Create() {
        $this->txtCargArch = new QFileControl($this);
        $this->txtCargArch->Required = true;
        $this->txtCargArch->Width = 300;
        $this->txtCargArch->Name = QApplication::Translate('Archivo a Cargar');
    }

    //------------------------------------------------------
    // ---- Información de importación y procesamiento ----
    //------------------------------------------------------

    protected function lblNumeCarg_Create() {
        $this->lblNumeCarg = new QLabel($this);
        $this->lblNumeCarg->Name = 'Registros Cargados';
        $this->lblNumeCarg->Text = 0;
        $this->lblNumeCarg->HtmlEntities = false;
    }

    protected function lblNumePend_Create() {
        $this->lblNumePend = new QLabel($this);
        $this->lblNumePend->Name = 'Pendientes por procesar';
        $this->lblNumePend->Text = 0;
        $this->lblNumePend->HtmlEntities = false;
    }

    protected function lblNumeAjus_Create() {
        $this->lblNumeAjus = new QLabel($this);
        $this->lblNumeAjus->Name = 'Pendientes por corregir';
        $this->lblNumeAjus->Text = 0;
        $this->lblNumeAjus->HtmlEntities = false;
    }

    protected function lblNumeProc_Create() {
        $this->lblNumeProc = new QLabel($this);
        $this->lblNumeProc->Name = 'Guías Procesadas';
        $this->lblNumeProc->Text = 0;
        $this->lblNumeProc->HtmlEntities = false;
    }

    protected function lblNumeErro_Create() {
        $this->lblNumeErro = new QLabel($this);
        $this->lblNumeErro->Name = 'Errores';
        $this->lblNumeErro->Text = 0;
        $this->lblNumeErro->HtmlEntities = false;
    }

    //-------------------
    // ---- Botones ----
    //-------------------

    protected function btnAjusGuia_Create() {
        $this->btnAjusGuia = new QButtonI($this);
        $this->btnAjusGuia->Text = TextoIcono('pencil-square-o','Corregir');
        $this->btnAjusGuia->Visible = false;
        $this->btnAjusGuia->AddAction(new QClickEvent(), new QServerAction('btnAjusGuia_Click'));
    }

    protected function btnImpoGuia_Create() {
        $this->btnImpoGuia = new QButton($this);
        $this->btnImpoGuia->Text = TextoIcono('download','Importar','F','lg');
        $this->btnImpoGuia->AddAction(new QClickEvent(), new QServerAction('btnImpoGuia_Click'));
        $this->btnImpoGuia->HtmlEntities = false;
        $this->btnImpoGuia->CssClass = 'btn btn-primary btn-sm';
        $this->btnImpoGuia->CausesValidation = true;
    }

    protected function btnErroProc_Create() {
        $this->btnErroProc = new QButtonD($this);
        $this->btnErroProc->Text = TextoIcono('eye','Error(es)','F','lg');
        $this->btnErroProc->AddAction(new QClickEvent(), new QServerAction('btnErroProc_Click'));
        $this->btnErroProc->Visible = false;
    }

    protected function btnMostSucu_Create() {
        $this->btnMostSucu = new QButtonI($this);
        $this->btnMostSucu->Text = TextoIcono('eye','Sucu.','F','lg');
        $this->btnMostSucu->AddAction(new QClickEvent(), new QServerAction('btnMostSucu_Click'));
    }

    //----------------------------------
    // Acciones asociadas a los objetos
    //----------------------------------

    protected function btnMostSucu_Click() {
        QApplication::Redirect(__SIST__."/estacion_list.php");
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    protected function btnSave_Click() {
        //---------------------------------------------------------------------------
        // Invocacion a rutina para crear el proceso. Obteniendo el ID para el mismo.
        //---------------------------------------------------------------------------
        $strNombProc = 'Creando Guias Liberty del Cliente: '.$this->objCliente->NombClie;
        $this->objProcEjec = CrearProceso($strNombProc);
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        //supress_error_start();
        $this->mensaje();
        //-----------------------------------
        // Se identifican valores de trabajo
        //-----------------------------------
        $intCantErro = 0;
        $blnTodoOkey = true;
        $blnProcImpo = true;
        $arrOperFict       = SdeOperacion::LoadArrayByCodiRuta('R9999',QQ::Clause(QQ::LimitInfo(1)));
        $objOperFict       = $arrOperFict[0];
        $objCkptMasi       = SdeCheckpoint::Load('NR');
        $this->objProducto = FacProducto::LoadBySiglProd('DOC');
        if (strlen($this->objCliente->RutaRecolecta) > 0) {
            $this->intOperGuia = $this->objCliente->RutaRecolecta;
        } else {
            $this->intOperGuia = $objOperFict->CodiOper;
        }
        //----------------------------------------------------------
        // Se identifican las Guias Masivas pendientes por procesar
        //----------------------------------------------------------
        $intCantGuia   = 0;
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->Procesada, SinoType::NO);
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->Ajustar, SinoType::NO);
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->ClienteId, $this->objCliente->CodiClie);
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->RegistradoPor, $this->objUsuario->LogiUsua);
        $arrGuiaPend   = GuiaCacesa::QueryArray(QQ::AndCondition($objClauWher));
        $intCantPend   = count($arrGuiaPend);
        if ($intCantPend > 0) {
            foreach ($arrGuiaPend as $objGuiaMasi) {
                //------------------------------------------------------------
                // Se crea una Guia Liberty correspondiente a la Guia Masiva
                //------------------------------------------------------------
                $objGuia = $this->crearGuiaMasiva($objGuiaMasi);
                try {
                    //-------------------
                    // Se guarda la guía
                    //-------------------
                    $objGuia->Save();
                    //------------------------------------------------------------------------
                    // Una vez creada y registrada la Guía Liberty, se elimina la Guía Masiva
                    //------------------------------------------------------------------------
                    $objGuiaMasi->Delete();
                    //------------------------------------------------
                    // Se incrementa el contador de guías procesadas.
                    //------------------------------------------------
                    $intCantGuia++;
                    //---------------------------------------------------------
                    // Se crea un checkpoint (Guía Generada) "GG" para la Guia
                    //---------------------------------------------------------
                    $arrDatoCkpt = array();
                    $arrDatoCkpt['NumeGuia'] = $objGuia->NumeGuia;
                    $arrDatoCkpt['UltiCkpt'] = '';
                    $arrDatoCkpt['GuiaAnul'] = SinoType::NO;
                    $arrDatoCkpt['CodiCkpt'] = $objCkptMasi->CodiCkpt;
                    $arrDatoCkpt['TextCkpt'] = $objCkptMasi->DescCkpt;
                    $arrDatoCkpt['CodiRuta'] = $objGuia->EstaOrig;
                    GrabarCheckpointOptimizado($arrDatoCkpt);
                } catch (Exception $e) {
                    $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                    $arrParaErro['NumeRefe'] = 'Guia: '.$objGuia->NumeGuia;
                    $arrParaErro['MensErro'] = $e->getMessage();
                    $arrParaErro['ComeErro'] = 'Fallo la creacion de la Guia Liberty y su Checkpoint';
                    GrabarError($arrParaErro);
                    $intCantErro ++;
                    $blnTodoOkey = false;
                }
            }
        }
        //------------------------------------------------
        // Se levantan nuevamente los errores en pantalla
        //------------------------------------------------
        error_reporting($mixErroOrig);
        //------------------------------------------------------
        // Se inicializan los parámetros del mensaje al usuario
        //------------------------------------------------------
        $strTextMens = 'El proceso culmino con '.$intCantErro.' error(es)';
        $strTipoMens = 's';
        $strIconMens = __iCHEC__;
        //---------------------------------------------
        // Se indica cuántas guías han sido procesadas
        //---------------------------------------------
        $this->lblNumeProc->Text = $intCantGuia;
        $this->lblNumePend->Text = (int) $this->lblNumePend->Text - $intCantGuia;
        if (!$blnTodoOkey) {
            //---------------------------------------------------------------------------------------------------
            // Si no ha salido to-do bien, se coloca el mensaje construido como un alerta, se indica la cantidad
            // de errores existentes y se visualiza el botón para acceder a los detalles de los mismos.
            //---------------------------------------------------------------------------------------------------
            $strTipoMens = 'd';
            $strIconMens = __iHAND__;
            $this->lblNumeErro->Text = $intCantErro;
            $this->btnErroProc->Visible = true;
        }
        //-----------------------------------------
        // Se construye el mensaje correspondiente
        //-----------------------------------------
        $this->mensaje($strTextMens,'m',$strTipoMens,'i',$strIconMens);
        //-----------------------------------------------------------------------------------------------------------
        // Se activan los procesamientos de validación para determinar el estatus de actividad de carga y registros.
        //-----------------------------------------------------------------------------------------------------------
        $this->activarProcesamiento($blnProcImpo);
        //--------------------------------------
        // Se almacena el resultado del proceso
        //--------------------------------------
        $this->objProcEjec->HoraFinal  = new QDateTime(QDateTime::Now);
        $this->objProcEjec->Comentario = $strTextMens;
        $this->objProcEjec->NotificarAdmin = !$blnTodoOkey ? true : false;
        $this->objProcEjec->Save();
        //TODO: Ver posibilidad de enviar notificación de error(es) a administradores del Sistema por correo.
        //----------------------------------------------
        // Se deja registro de la transacción realizada
        //----------------------------------------------
        $arrLogxCamb['strNombTabl'] = 'ProcesoError';
        $arrLogxCamb['intRefeRegi'] = $this->objProcEjec->Id;
        $arrLogxCamb['strNombRegi'] = $this->objProcEjec->Nombre;
        $arrLogxCamb['strDescCamb'] = 'Ejecutado';
        $arrLogxCamb['strEnlaEnti'] = __SIST__.'/proceso_error_list.php/'.$this->objProcEjec->Id;
        LogDeCambios($arrLogxCamb);
    }

    protected function btnErroProc_Click() {
        $_SESSION['PagiBack'] = __SIST__."/carga_masiva_guias.php";
        QApplication::Redirect(__SIST__.'/detalle_error_list.php/'.$this->objProcEjec->Id);
    }

    protected function btnImpoGuia_Click() {
        $strNombArch = $this->txtCargArch->FileName;
        $strPartNomb = explode('.',$strNombArch);
        $arrExteVali = array('csv','txt','dat');
        if (in_array($strPartNomb[1],$arrExteVali)) {
            $file = basename(tempnam(getcwd(),'tmp'));
            $file = $file.'.'.$strPartNomb[1];
            $filedest = '/tmp/'.$file;
            copy($_FILES['c6']['tmp_name'],$filedest);
            $this->CargarArchivo($filedest);
        } else {
            $strMensUsua = 'Archivo no corresponde a una extensión válida (.csv, .txt o .dat)';
            $this->mensaje($strMensUsua,'','d','i',__iHAND__);
        }
    }

    protected function btnAjusGuia_Click() {
        QApplication::Redirect(__SIST__.'/guia_cacesa_list.php');
    }

    //-----------------------------
    // Otras acciones del programa
    //-----------------------------

    protected function activarProcesamiento($blnProcImpo = false) {
        //---------------------------
        // Se inicializan parámetros
        //---------------------------
        $intGuiaAjus = 0;
        $intGuiaOkey = 0;
        $blnAjusGuia = false;
        $blnCreaGuia = false;
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->Procesada, SinoType::NO);
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->ClienteId, $this->objCliente->CodiClie);
        $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->RegistradoPor, $this->objUsuario->LogiUsua);
        $intPendProc   = GuiaCacesa::QueryCount(QQ::AndCondition($objClauWher));
        if ($intPendProc > 0) {
            //----------------------------------------------------------------------------------------------
            // Si existe una o varias guías a procesar y/o por corregir, se guardan las mismas en un vector
            //----------------------------------------------------------------------------------------------
            $arrGuiaCace = GuiaCacesa::QueryArray(QQ::AndCondition($objClauWher));
            foreach ($arrGuiaCace as $objGuiaCace) {
                //------------------------------------------------------------
                // Se verifica cuántas guías deben ser ajustadas o procesadas
                //------------------------------------------------------------
                if ($objGuiaCace->Ajustar == true) {
                    $intGuiaAjus++;
                } else {
                    $intGuiaOkey++;
                }
            }
        }
        if ($intGuiaOkey > 0) {
            //-----------------------------------------------------------------------------
            // Si existe una o más guías listas para ser procesadas, se indica cuántas hay
            //-----------------------------------------------------------------------------
            $blnCreaGuia = true;
            $this->lblNumePend->Text = $intGuiaOkey;
        }
        if ($intGuiaAjus > 0) {
            //--------------------------------------------------------------
            // Si existe una o más guías por ajustar, se indica cuántas hay
            //--------------------------------------------------------------
            $blnAjusGuia = true;
            $this->lblNumeAjus->Text = $intGuiaAjus;
        }
        //----------------------------------------------------------------------------------
        // Se ordena visualizar o no los botones para procesar y/o para corregir registros.
        //----------------------------------------------------------------------------------
        $this->btnSave->Visible = $blnCreaGuia;
        $this->btnAjusGuia->Visible = $blnAjusGuia;
        if (!$blnProcImpo) {
            //-------------------------------------------------------------
            // Se asume que no se ha importado ni procesado registros ...
            // Por defecto, el mensaje a mostrar al usuario es informativo
            //-------------------------------------------------------------
            $strClasMens = 'i';
            $strIconMens = __iINFO__;
            if ($blnAjusGuia) {
                //---------------------------------------------------------------------------------------------------
                // Existen registros por ajustar y a su vez también puede haber la posibilidad de procesar registros
                //---------------------------------------------------------------------------------------------------
                if ($blnCreaGuia) {
                    $this->strMensProc = 'Quedan guías por corregir y por procesar!';
                } else {
                    $this->strMensProc = 'Quedan guías por corregir!';
                }
                //-----------------------------------------
                // El mensaje a mostrar es una advertencia
                //-----------------------------------------
                $strClasMens = 'w';
                $strIconMens = __iEXCL__;
            } else {
                if ($blnCreaGuia) {
                    //------------------------------------------------------------
                    // Solamente existen registros pendientes para ser procesados
                    //------------------------------------------------------------
                    $this->strMensProc = 'Quedan guías por procesar!';
                } else {
                    $this->strMensProc = 'No hay guía(s) pendiente(s) por procesar ni por corregir!';
                }
            }
            if (!is_null($this->strMensProc)) {
                //--------------------------------------------------------------------------------------
                // Si se quiere manifestar un mensaje para el usuario, se crea el mismo correspondiente
                //--------------------------------------------------------------------------------------
                $this->mensaje($this->strMensProc,'',$strClasMens,'i',$strIconMens);
            }
        }
    }

    protected function verificarDatosMasivos($arrCampClie) {
        $blnTodoOkey = true;
        $blnDestOkey = true;
        $strTextErro = '';
        $strSucuDest = '';
        $arrResuVali = array();
        //--------------------------------------------------------
        // Se verifica la existencia previa de la Guia en la tabla
        //--------------------------------------------------------
        $strGuiaClie = $arrCampClie[0];
        if (strlen($strGuiaClie) > 0) {
            //--------------------------------------------------------------------------------------
            // Primero se verifica si existe una Guía Liberty con dicho correlativo como Tracking.
            //--------------------------------------------------------------------------------------
            $objGuiaMasi = Guia::LoadByGuiaExterna($strGuiaClie);
            if ($objGuiaMasi) {
                $strTextErro = "La Guia #$strGuiaClie (Externa) ya existe";
                $blnTodoOkey = false;
            } else {
                //-----------------------------------------------------------------------
                // Luego se verifica si la misma ya existe esperando por ser procesada.
                //-----------------------------------------------------------------------
                $objClauWher   = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::GuiaCacesa()->GuiaExte,$strGuiaClie);
                $objGuiaMasi   = GuiaCacesa::QueryArray(QQ::AndCondition($objClauWher));
                if ($objGuiaMasi) {
                    $strTextErro = "La Guia #$strGuiaClie (Externa) ya existe. Esperando por ser Procesada";
                    $blnTodoOkey = false;
                }
            }
        }
        if ($blnTodoOkey) {
            $strNombDest = $arrCampClie[2];
            if (strlen($strNombDest) == 0) {
                $strTextErro = "El Nombre del Destinatario es Requerido";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            $strApelDest = $arrCampClie[3];
            if (strlen($strApelDest) == 0) {
                $strTextErro = "El Apellido del Destinatario es Requerido";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            $strDireDest = $arrCampClie[4];
            if (strlen($strDireDest) == 0) {
                $strTextErro = "La Direccion de Destino es Requerida";
                $blnTodoOkey = false;
            }
        }
        if ($blnTodoOkey) {
            //--------------------------------------------------------------------------------
            // Se verifica que el Destino exista. Primero se valida que el mismo coincida con
            // la descripción o nombre de la Sucursal.
            //--------------------------------------------------------------------------------
            $strSucuDest = $arrCampClie[9];
            $objSucuDest = Estacion::LoadByDescEsta($strSucuDest);
            if (!$objSucuDest) {
                //-----------------------------------------------------------------------------
                // Si el Destino no coincide con la descripción o nombre de la Sucursal, se
                // busca por cada Sucursal una localidad relacionada que coincida con el mismo
                //-----------------------------------------------------------------------------
                $arrSucuDest = Estacion::LoadAll();
                $blnSucuOkey = false;
                foreach ($arrSucuDest as $objSucuDest) {
                    $arrPalaRela = explode(',',$objSucuDest->PalabraRelacionada);
                    if (in_array($strSucuDest,$arrPalaRela)) {
                        $strSucuDest = $objSucuDest->CodiEsta;
                        $blnSucuOkey = true;
                        break;
                    }
                }
                if (!$blnSucuOkey) {
                    $strTextErro = "El destino ".$strSucuDest." es desconocido. Debe relacionarlo con una Sucursal existente";
                    $blnDestOkey = false;
                    $blnTodoOkey = false;
                }
            } else {
                $strSucuDest = $objSucuDest->CodiEsta;
            }
        }
        if ($blnTodoOkey) {
            //-----------------------------------------------
            // Se verifica el ó los números del Destinatario
            //-----------------------------------------------
            $strTeleDest1 = $arrCampClie[5];
            $strTeleDest2 = $arrCampClie[6];
            if (strlen($strTeleDest1) == 0) {
                //-------------------------------------------------------------
                // Se verifica si el Destinatario posee otro número telefónico
                //-------------------------------------------------------------
                if (strlen($strTeleDest2) == 0) {
                    $strTextErro = "Se requiere al menos un teléfono del destinarario.";
                    $blnTodoOkey = false;
                }
            }
        }
        if ($blnTodoOkey) {
            //------------------------------------------
            // Se verifica que el formato correspondiente
            // a la cantidad de piezas sea entero.
            //------------------------------------------
            $intCantPiez = $arrCampClie[8];
            if (!(is_int(intval($intCantPiez)) && $intCantPiez > 0)) {
                $strTextErro = "La cantidad de piezas debe ser un Entero mayor a Cero(0)";
                $blnTodoOkey = false;
            }
        }
        $arrResuVali['TodoOkey'] = $blnTodoOkey;
        $arrResuVali['DestOkey'] = $blnDestOkey;
        $arrResuVali['SucuDest'] = $strSucuDest;
        $arrResuVali['TextErro'] = $strTextErro;
        return $arrResuVali;
    }

    protected function CargarArchivo($strNombArch) {
        $this->strMensProc = '';
        //---------------------------------------------------------------------------
        // Invocacion a rutina para crear el proceso. Obteniendo el ID para el mismo.
        //---------------------------------------------------------------------------
        $strNombProc = 'Carga Masiva de Guias en CORP: '.$this->objCliente->NombClie;
        $this->objProcEjec = CrearProceso($strNombProc);
        //-------------------------------------
        // Se suprimen los errores en pantalla
        //-------------------------------------
        $mixErroOrig = error_reporting();
        error_reporting(0);
        //supress_error_start();
        //-----------------------------------------------------------
        // Se inician los contadores y otras propiedades del archivo
        //-----------------------------------------------------------
        $intCantRegi = 0;
        $intNumeLine = 1;
        $intCantErro = 0;
        $strMensErro = '';
        $blnErroProc = false;
        try {
            //-------------------------------
            // Se abre el archivo a procesar
            //-------------------------------
            $mixArchAgen = fopen($strNombArch,'r');
            if (!$mixArchAgen) {
                throw new Exception('No puede abrirse el archivo plano');
            }
            //----------------------------------
            // Se lee el archivo linea a linea
            //----------------------------------
            $strLineArch = fgets($mixArchAgen);
            while (!feof($mixArchAgen)) {
                $blnTodoOkey = true;
                if (strlen(trim($strLineArch)) > 0 && $intNumeLine > 1) {
                    $arrCampClie = explode(';', $strLineArch);
                    if ($arrCampClie === false) {
                        throw new Exception('El delimitador de texto del archivo no es valido. Debe usarse un punto y coma (";")');
                    }
                    //----------------------------------------------------------
                    // Se verifica la existencia de los campos reglamentarios
                    //----------------------------------------------------------
                    $intCantCamp = count($arrCampClie);
                    if ($intCantCamp != 11) {
                        $strMensErro = 'El archivo a cargar no tiene los 11 campos reglamentarios';
                        $blnTodoOkey = false;
                    }
                    //-----------------------------------------------------------------------
                    // Si to-do sale bien, se procede a verificar los datos de cada registro
                    //-----------------------------------------------------------------------
                    if ($blnTodoOkey) {
                        $arrResuVali = $this->verificarDatosMasivos($arrCampClie);
                        $blnTodoOkey = $arrResuVali['TodoOkey'];
                        $blnDestOkey = $arrResuVali['DestOkey'];
                        $strMensObse = $arrResuVali['TextErro'];
                        $strSucuDest = $arrResuVali['SucuDest'];
                        //-----------------------------------------------------------
                        // Se verifica si el destinatario posee uno o varios números
                        //-----------------------------------------------------------
                        $strTeleDest1 = DejarSoloLosNumeros($arrCampClie[4]);
                        $strTeleDest2 = DejarSoloLosNumeros($arrCampClie[5]);
                        if (strlen($strTeleDest1) > 0 && strlen($strTeleDest2) > 0) {
                            $strTeleDest = $strTeleDest1.'/'.$strTeleDest2;
                        } elseif (strlen($strTeleDest1) > 0 && strlen($strTeleDest2) == 0) {
                            $strTeleDest = $strTeleDest1;
                        } else {
                            $strTeleDest = $strTeleDest2;
                        }
                        //----------------------------------------------------------------
                        // Se crea un registro en la tabla guia_cacesa para cada registro
                        //----------------------------------------------------------------
                        $objGuiaMasi                      = new GuiaCacesa();
                        $objGuiaMasi->FechCarg            = new QDateTime(QDateTime::Now);
                        $objGuiaMasi->HoraCarg            = new QDateTime(QDateTime::Now);
                        $objGuiaMasi->Procesada           = SinoType::NO;
                        $objGuiaMasi->NumeGuia            = $arrCampClie[0];
                        $objGuiaMasi->GuiaExte            = $arrCampClie[0];
                        $objGuiaMasi->OrigGuia            = $this->objCliente->CodiEsta;
                        $objGuiaMasi->NombRemi            = $this->objCliente->NombClie;
                        $objGuiaMasi->DireRemi            = $this->objCliente->DirEntregaFactura;
                        $objGuiaMasi->TeleRemi            = $this->objCliente->TeleCona;
                        $objGuiaMasi->NombDest            = utf8_decode(strtoupper($arrCampClie[2])).' '.utf8_decode(strtoupper($arrCampClie[3]));
                        $objGuiaMasi->DireDest            = utf8_decode(strtoupper($arrCampClie[4]));
                        $objGuiaMasi->TeleDest            = $strTeleDest;
                        $objGuiaMasi->CeluDest            = !is_null($arrCampClie[1]) ? strtoupper($arrCampClie[1]) : '.';
                        $objGuiaMasi->DestGuia            = !$blnDestOkey ? '.' : $strSucuDest;
                        $objGuiaMasi->DescCont            = !is_null($arrCampClie[7]) ? strtoupper($arrCampClie[7]) : '.';
                        $objGuiaMasi->CantPiez            = $arrCampClie[8];
                        $objGuiaMasi->PesoGuia            = 0;
                        $objGuiaMasi->RegistradoPor       = $this->objUsuario->LogiUsua;
                        $objGuiaMasi->ArchInput           = utf8_decode($this->txtCargArch->FileName);
                        $objGuiaMasi->Ajustar             = $blnTodoOkey ? SinoType::NO : SinoType::SI;
                        $objGuiaMasi->OtroDestino         = !$blnDestOkey ? $strSucuDest : null;
                        $objGuiaMasi->Observacion         = utf8_decode($strMensObse);
                        $objGuiaMasi->ClienteId           = $this->objCliente->CodiClie;
                        $objGuiaMasi->TarifaId            = $this->objCliente->Tarifa->Id;
                        $objGuiaMasi->ProcesoId           = $this->objProcEjec->Id;
                        $objGuiaMasi->CodigoContrato      = null;
                        try {
                            $objGuiaMasi->Save();
                            $intCantRegi++;
                        } catch (Exception $e) {
                            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                            $arrParaErro['NumeRefe'] = 'Guia: '.$objGuiaMasi->GuiaExte;
                            $arrParaErro['MensErro'] = $e->getMessage();
                            $arrParaErro['ComeErro'] = 'Falló la creación de la Guia del cliente ('.$this->objCliente->CodigoInterno.') durante importación masiva';
                            GrabarError($arrParaErro);
                            $intCantErro ++;
                            $blnErroProc = true;
                        }
                    } else {
                        $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
                        $arrParaErro['NumeRefe'] = 'Linea Nro: '.$intNumeLine;
                        $arrParaErro['MensErro'] = 'No posee las columnas reglamentarias';
                        $arrParaErro['ComeErro'] = 'Fallo la importacion de los datos ';
                        GrabarError($arrParaErro);
                        $intCantErro ++;
                        $blnErroProc = true;
                    }
                }
                $intNumeLine++;
                $strLineArch = fgets($mixArchAgen);
            }
        } catch (Exception $e) {
            $arrParaErro['ProcIdxx'] = $this->objProcEjec->Id;
            $arrParaErro['NumeRefe'] = $strNombArch;
            $arrParaErro['MensErro'] = $e->getMessage();
            $arrParaErro['ComeErro'] = 'Falla al procesar el archivo de Guias del cliente ('.$this->objCliente->CodigoInterno.')';
            GrabarError($arrParaErro);
            $intCantErro ++;
            $blnErroProc = true;
        }
        //-------------------------------------
        // Se levantan los errores en pantalla
        //-------------------------------------
        error_reporting($mixErroOrig);
        //-----------------------------------------------------------------
        // Se inicializan los parámetros del mensaje a mostrar al usuario.
        //-----------------------------------------------------------------
        $strTextMens = 'El proceso culmino con '.$intCantErro.' error(es)';
        $strTipoMens = 's';
        $strIconMens = 'check';
        if ($intCantRegi > 0) {
            //-------------------------------------------------------------------------------------------------
            // Si se ha importado uno o más registros, se manifiesta al usuario la posibilidad de procesar y/o
            // corregir datos, se indica la cantidad de registros cargados y se activan los procesamientos de
            // validación para determinar el estatus de actividad y/o registro.
            //-------------------------------------------------------------------------------------------------
            $strTextMens .= ' - Puede proceder a <strong>Procesar y/o Corregir los Datos</strong>';
            $this->lblNumeCarg->Text = $intCantRegi;
            $blnProcImpo = true;
            $this->activarProcesamiento($blnProcImpo);
        }
        if ($blnErroProc) {
            //----------------------------------------------------------------------------------------------------
            // Si hay uno o varios errores, se coloca el mensaje como un alerta, se indica la cantidad de errores
            // existentes y se visualiza el botón para acceder a los detalles de los mismos.
            //----------------------------------------------------------------------------------------------------
            $strTipoMens = 'd';
            $strIconMens = __iHAND__;
            $this->lblNumeErro->Text = $intCantErro;
            $this->btnErroProc->Visible = true;
        }
        //------------------------------------
        // Se crea el mensaje correspondiente
        //------------------------------------
        $this->mensaje($strTextMens,'m',$strTipoMens,'i',$strIconMens);
        //--------------------------------------
        // Se almacena el resultado del proceso
        //--------------------------------------
        $this->objProcEjec->HoraFinal  = new QDateTime(QDateTime::Now);
        $this->objProcEjec->Comentario = $strTextMens;
        $this->objProcEjec->NotificarAdmin = $blnErroProc ? true : false;
        $this->objProcEjec->Save();
        //TODO: Ver posibilidad de enviar notificación de error(es) a administradores del Sistema por correo.
        //----------------------------------------------
        // Se deja registro de la transacción realizada
        //----------------------------------------------
        $arrLogxCamb['strNombTabl'] = 'ProcesoError';
        $arrLogxCamb['intRefeRegi'] = $this->objProcEjec->Id;
        $arrLogxCamb['strNombRegi'] = $this->objProcEjec->Nombre;
        $arrLogxCamb['strDescCamb'] = 'Ejecutado';
        $arrLogxCamb['strEnlaEnti'] = __SIST__.'/proceso_error_list.php/'.$this->objProcEjec->Id;
        LogDeCambios($arrLogxCamb);
    }


    protected function crearGuiaMasiva(GuiaCacesa $objGuiaMasi) {
        $objGuia                     = new Guia();
        $objGuia->NumeGuia           = proxNroDeGuia();
        $objGuia->CodiClie           = $objGuiaMasi->ClienteId;
        $objGuia->FechGuia           = new QDateTime(QDateTime::Now);
        $objGuia->EstaOrig           = $objGuiaMasi->OrigGuia;
        $objGuia->EstaDest           = $objGuiaMasi->DestGuia;
        $objGuia->PesoGuia           = $objGuiaMasi->PesoGuia;
        $objGuia->NombRemi           = $objGuiaMasi->NombRemi;
        $objGuia->DireRemi           = $objGuiaMasi->DireRemi;
        $objGuia->TeleRemi           = $objGuiaMasi->TeleRemi;
        $objGuia->NombDest           = utf8_encode($objGuiaMasi->NombDest);
        $objGuia->DireDest           = utf8_encode($objGuiaMasi->DireDest);
        $objGuia->TeleDest           = $objGuiaMasi->TeleDest;
        $objGuia->CantPiez           = $objGuiaMasi->CantPiez;
        $objGuia->DescCont           = utf8_encode($objGuiaMasi->DescCont);
        $objGuia->CodiProd           = 14;
        $objGuia->TipoGuia           = $this->intTipoGuia;
        $objGuia->ValorDeclarado     = 0;
        $objGuia->PorcentajeIva      = 0;
        $objGuia->MontoIva           = 0;
        $objGuia->Asegurado          = 0;
        $objGuia->PorcentajeSeguro   = 0;
        $objGuia->MontoSeguro        = 0;
        $objGuia->MontoBase          = 0;
        $objGuia->MontoFranqueo      = 0;
        $objGuia->MontoTotal         = 0;
        $objGuia->CantAyudantes      = 0;
        $objGuia->ParadasAdicionales = 0;
        $objGuia->CourierId          = 1;
        $objGuia->GuiaExterna        = $objGuiaMasi->GuiaExte;
        $objGuia->FleteDirecto       = 0;
        $objGuia->TieneGuiaRetorno   = 0;
        $objGuia->GuiaRetorno        = null;
        $objGuia->Observacion        = '';
        $objGuia->OperacionId        = $this->intOperGuia;
        $objGuia->PorcentajeSgroInt  = 0;
        $objGuia->MontoSgroInt       = 0;
        $objGuia->UsuarioCreacion    = $this->objUsuario->LogiUsua;
        $objGuia->FechaCreacion      = new QDateTime(QDateTime::Now);
        $objGuia->HoraCreacion       = date('H:i');
        $objGuia->CobroCod           = CobroCod::Load($objGuia->NumeGuia);
        $objGuia->VendedorId         = $this->objCliente->VendedorId;
        $objGuia->Alto               = '';
        $objGuia->Ancho              = '';
        $objGuia->Largo              = '';
        $objGuia->RecolectaId        = '';
        $objGuia->TipoDocumentoId    = 'J';
        $objGuia->CedulaRif          = '';
        $objGuia->CierreCaja         = '';
        $objGuia->CajaId             = '';
        $objGuia->MontoTotalInt      = 0;
        $objGuia->PesoVolumetrico    = '';
        $objGuia->PesoLibras         = '';
        $objGuia->HojaEntrega        = '';
        $objGuia->MontoOtros         = 0;
        $objGuia->EntregadoA         = '';
        $objGuia->FechaEntrega       = null;
        $objGuia->HoraEntrega        = '';
        $objGuia->CodiCkpt           = '';
        $objGuia->EstaCkpt           = '';
        $objGuia->FechCkpt           = null;
        $objGuia->HoraCkpt           = '';
        $objGuia->ObseCkpt           = '';
        $objGuia->UsuaCkpt           = '';
        $objGuia->FechaPod           = null;
        $objGuia->HoraPod            = '';
        $objGuia->UsuarioPod         = '';
        $objGuia->TransFac           = 0;
        $objGuia->SistemaId          = 'sde';
        $objGuia->Anulada            = 0;
        $objGuia->TarifaId           = $objGuiaMasi->TarifaId;
        $objGuia->EnEfectivo         = 0;
        return $objGuia;
    }
}

CargaMasivaGuias::Run('CargaMasivaGuias');