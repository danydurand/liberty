<?php
//-------------------------------------------------------------------------------------
// Programa       : consulta_guia.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 27/10/16 05:02 PM
// Proyecto       : newliberty
// Descripcion    : Este programa muestra información detallada de una guía al Usuario
//-------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__YAMAGUCHI__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ConsultaGuia extends FormularioBaseKaizen {
    //-----------------------
    // Parámetros de objetos
    //-----------------------
    protected $objGuia;
    protected $objCliente;
    protected $objProducto;
    protected $dtgGuiaCkpt;
    //----------------------
    // Parámetros regulares
    //----------------------
    protected $blnSubxClie;
    //---------------------------
    // Parámetros de información
    //---------------------------
    // ---- Remitente ----
    protected $lblNumeGuia;
    protected $lblFechGuia;
    protected $lblSucuOrig;
    protected $lblNombRemi;
    protected $lblDireRemi;
    protected $lblTeleRemi;
    // ---- Envío ----
    protected $lblDescCont;
    protected $lblSeguGuia;
    protected $lblPorcSegu;
    protected $lblMontSegu;
    protected $lblMontFran;
    protected $lblFletDire;
    protected $lblPersEntr;
    protected $lblFechEntr;
    //        *   *   *   *
    // Lado Derecho del Formulario
    //        *   *   *   *
    // ---- Envío ----
    protected $lblPesoGuia;
    protected $lblCantPiez;
    protected $lblValoDecl;
    // ---- Destinatario ----
    protected $lblSucuDest;
    protected $lblNombDest;
    protected $lblDireDest;
    protected $lblTeleDest;
    // ---- Montos y otros ----
    protected $lblTipoTari;
    protected $lblMontBase;
    protected $lblPorcIvax;
    protected $lblMontIvax;
    protected $lblMontTota;
    protected $lblGuiaReto;
    //    *   *   *   *
    // Resto del Formulario
    //    *   *   *   *
    protected $lblTextObse;
    //------------------------
    // Parámetros de posición
    //------------------------
    protected $arrDataTabl;
    protected $intCantRegi;
    protected $intPosiRegi;

    //---------------------
    // Botones de posición
    //---------------------
    protected $btnPrimRegi;
    protected $btnRegiAnte;
    protected $btnProxRegi;
    protected $btnUltiRegi;

    protected $btnPrimSmal;
    protected $btnAnteSmal;
    protected $btnProxSmal;
    protected $btnUltiSmal;

    //--------------------
    // Botones corrientes
    //--------------------
    protected $btnEditGuia;
    protected $btnImprGuia;

    protected function SetupValores() {
        //------------------------------------------
        // Obteniendo el Nro de la guía a consultar
        //------------------------------------------
        $strNumeGuia = QApplication::PathInfo(0);
        if ($strNumeGuia) {
            $this->objGuia = Guia::Load($strNumeGuia);
            if (!$this->objGuia) {
                throw new Exception('Could not find a Guia object with PK arguments: ' . $strNumeGuia);
            } else {
                //---------------------------------------------------------------------------------------------
                // Se determina si el Cliente, el cual el Usuario (quien opera actualmente en el Sistema) está
                // asociado, es quien se encuentra vinculado con la Guía a consultar.
                //---------------------------------------------------------------------------------------------
                $intClieGuia = $this->objGuia->CodiClieObject->CodiClie;
                $intClieUsua = $this->objUsuario->Cliente->CodiClie;
                if ($intClieGuia != $intClieUsua) {
                    //-------------------------------------------------------------------
                    // En este caso, se trata de la consulta de la Guía de un SobCliente
                    //-------------------------------------------------------------------
                    $this->blnSubxClie = true;
                } else {
                    $this->blnSubxClie = false;
                }
            }
        } else {
            $this->mensaje('Debe especificar un Número de Guía para Consultar','m','d','hand-stop-o');
        }
        //------------------------------------------
        // Cliente al cual el usuario está asociado
        //------------------------------------------
        $this->objCliente = unserialize($_SESSION['ClieMast']);
    }

    protected function Form_Create() {
        parent::Form_Create();

        $this->SetupValores();
        $this->determinarPosicion();

        $this->lblTituForm->Text = 'Consulta de la Guía';

        //---- Remitente ----

        $this->lblNumeGuia_Create();
        $this->lblFechGuia_Create();
        $this->lblSucuOrig_Create();
        $this->lblNombRemi_Create();
        $this->lblDireRemi_Create();
        $this->lblTeleRemi_Create();

        // ---- Envío ----

        $this->lblDescCont_Create();
        $this->lblFletDire_Create();
        $this->lblPersEntr_Create();
        $this->lblFechEntr_Create();
        $this->lblGuiaReto_Create();

        // ---- Envío ----

        $this->lblCantPiez_Create();
        $this->lblSucuDest_Create();
        $this->lblValoDecl_Create();

        // ---- Destinatario ----

        $this->lblNombDest_Create();
        $this->lblDireDest_Create();
        $this->lblTeleDest_Create();

        // ---- Montos y Otros ----

        $this->lblTipoTari_Create();
        $this->lblMontBase_Create();
        $this->lblSeguGuia_Create();
        $this->lblPorcSegu_Create();
        $this->lblMontSegu_Create();
        $this->lblMontFran_Create();
        $this->lblPorcIvax_Create();
        $this->lblMontIvax_Create();
        $this->lblMontTota_Create();
        $this->lblTextObse_Create();

        $this->dtgGuiaCkpt_Create();

        //-------------------
        // Botones regulares
        //-------------------
        $this->btnSave->Visible = false;
        $this->btnEditGuia_Create();
        $this->btnImprGuia_Create();

        //------------------------
        // Botones de navegacion
        //------------------------

        $this->btnProxRegi_Create();
        $this->btnRegiAnte_Create();
        $this->btnPrimRegi_Create();
        $this->btnUltiRegi_Create();

        $this->btnPrimSmal_Create();
        $this->btnAnteSmal_Create();
        $this->btnProxSmal_Create();
        $this->btnUltiSmal_Create();

        //-----------------
        // Otras funciones
        //-----------------
        $this->verificarNavegacion();
        //---------------------------------------------------------------------
        // Se valida si al usuario se le permite realizar gestiones en la guía
        //---------------------------------------------------------------------
        $this->permitirCambios();
    }

    //---------------------
    // Creando objetos ...
    //---------------------

    //        *   *   *   *
    // Lado Izquierdo del Formulario
    //        *   *   *   *

    //-------- Información del Remitente --------

    protected function lblNumeGuia_Create() {
        $this->lblNumeGuia = new QLabel($this);
        $this->lblNumeGuia->Name = 'Guia #';
        $this->lblNumeGuia->Text = $this->objGuia->NumeGuia;
    }

    protected function lblFechGuia_Create() {
        $this->lblFechGuia = new QLabel($this);
        $this->lblFechGuia->Name = 'Fecha';
        $this->lblFechGuia->Text = $this->objGuia->FechGuia->__toString("DD/MM/YYYY");
    }

    protected function lblSucuOrig_Create() {
        $this->lblSucuOrig = new QLabel($this);
        $this->lblSucuOrig->Name = 'Origen';
        $this->lblSucuOrig->Text = $this->objGuia->EstaOrigObject->DescEsta;
    }

    protected function lblNombRemi_Create() {
        $this->lblNombRemi = new QLabel($this);
        $this->lblNombRemi->Name = 'Remitente';
        $this->lblNombRemi->Text = substr($this->objGuia->NombRemi,0,35);
        $this->lblNombRemi->ToolTip = $this->objGuia->NombRemi;
    }

    protected function lblDireRemi_Create() {
        $this->lblDireRemi = new QLabel($this);
        $this->lblDireRemi->Name = 'Dir. Remitente';
        $this->lblDireRemi->Text = substr($this->objGuia->DireRemi,0,118);
        $this->lblDireRemi->ToolTip = $this->objGuia->DireRemi;
    }

    protected function lblTeleRemi_Create() {
        $this->lblTeleRemi = new QLabel($this);
        $this->lblTeleRemi->Name = 'Tlf. Remitente';
        $this->lblTeleRemi->Text = $this->objGuia->TeleRemi;
    }

    // ---- Envío ----

    protected function lblDescCont_Create() {
        $this->lblDescCont = new QLabel($this);
        $this->lblDescCont->Name = 'Contenido';
        $this->lblDescCont->Text = $this->objGuia->DescCont;
        $this->lblDescCont->ToolTip = $this->objGuia->DescCont;
    }

    protected function lblCantPiez_Create() {
        $this->lblCantPiez = new QLabel($this);
        $this->lblCantPiez->Name = 'Piezas/Peso';
        $this->lblCantPiez->Text = $this->objGuia->CantPiez.'/'.$this->objGuia->PesoGuia.' (Kg)';
    }

    protected function lblSucuDest_Create() {
        $this->lblSucuDest = new QLabel($this);
        $this->lblSucuDest->Name = 'Destino';
        $this->lblSucuDest->Text = $this->objGuia->EstaDestObject->DescEsta;
    }

    protected function lblValoDecl_Create() {
        $this->lblValoDecl = new QLabel($this);
        $this->lblValoDecl->Name = 'V. Declarado';
        $this->lblValoDecl->Text = $this->objGuia->ValorDeclarado." Bs";
    }

    protected function lblFletDire_Create() {
        $this->lblFletDire = new QLabel($this);
        $this->lblFletDire->Text = $this->objGuia->FleteDirecto ? 'SI' : 'NO';
    }

    protected function lblPersEntr_Create() {
        $this->lblPersEntr = new QLabel($this);
        $this->lblPersEntr->Text = $this->objGuia->EntregadoA ? substr($this->objGuia->EntregadoA,0,14) : 'N/A';
        $this->lblPersEntr->ToolTip = $this->objGuia->EntregadoA ? $this->objGuia->EntregadoA : 'N/A';
    }

    protected function lblFechEntr_Create() {
        $this->lblFechEntr = new QLabel($this);
        $this->lblFechEntr->Text = $this->objGuia->FechaEntrega
            ? $this->objGuia->FechaEntrega->__toString("DD/MM/YYYY") . " " . $this->objGuia->HoraEntrega
            : 'N/A';
    }

    protected function lblGuiaReto_Create() {
        $this->lblGuiaReto = new QLabel($this);
        $this->lblGuiaReto->Text = $this->objGuia->GuiaRetorno ? $this->objGuia->GuiaRetorno : 'N/A';
    }

    // ---- Destinatario ----

    protected function lblNombDest_Create() {
        $this->lblNombDest = new QLabel($this);
        $this->lblNombDest->Name = 'Destinatario';
        $this->lblNombDest->Text = substr($this->objGuia->NombDest,0,35);
        $this->lblNombDest->ToolTip = $this->objGuia->NombDest;
    }

    protected function lblDireDest_Create() {
        $this->lblDireDest = new QLabel($this);
        $this->lblDireDest->Name = 'Dir. Destinatario';
        $this->lblDireDest->Text = substr($this->objGuia->DireDest,0,118);
        $this->lblDireDest->ToolTip = $this->objGuia->DireDest;
    }

    protected function lblTeleDest_Create() {
        $this->lblTeleDest = new QLabel($this);
        $this->lblTeleDest->Name = 'Tlf. Destinatario';
        $this->lblTeleDest->Text = $this->objGuia->TeleDest;
    }

    // ---- Montos y otros ----

    protected function lblTipoTari_Create() {
        $this->lblTipoTari = new QLabel($this);
        $this->lblTipoTari->Text = $this->objGuia->CodiClieObject->Tarifa->Descripcion;
    }

    protected function lblSeguGuia_Create() {
        $this->lblSeguGuia = new QLabel($this);
        $this->lblSeguGuia->Text = $this->objGuia->Asegurado ? 'SI' : 'NO';
    }

    protected function lblPorcSegu_Create() {
        $this->lblPorcSegu = new QLabel($this);
        $this->lblPorcSegu->Text = $this->objGuia->PorcentajeSeguro;
    }

    protected function lblMontSegu_Create() {
        $this->lblMontSegu = new QLabel($this);
        $this->lblMontSegu->Text  = $this->objGuia->MontoSeguro;
    }

    protected function lblMontFran_Create() {
        $this->lblMontFran = new QLabel($this);
        $this->lblMontFran->Text = $this->objGuia->MontoFranqueo;
    }

    protected function lblMontBase_Create() {
        $this->lblMontBase = new QLabel($this);
        $this->lblMontBase->Text = $this->objGuia->MontoBase;
    }

    protected function lblPorcIvax_Create() {
        $this->lblPorcIvax = new QLabel($this);
        $this->lblPorcIvax->Text = $this->objGuia->PorcentajeIva;
    }

    protected function lblMontIvax_Create() {
        $this->lblMontIvax = new QLabel($this);
        $this->lblMontIvax->Text = $this->objGuia->MontoIva;
    }

    protected function lblMontTota_Create() {
        $this->lblMontTota = new QLabel($this);
        $this->lblMontTota->Text = $this->objGuia->MontoTotal;
    }

    protected function lblTextObse_Create() {
        $this->lblTextObse = new QLabel($this);
        $this->lblTextObse->Text = $this->objGuia->Observacion;
    }


    protected function dtgGuiaCkpt_Create() {
        $this->dtgGuiaCkpt = new QDataGrid($this);
        $this->dtgGuiaCkpt->FontSize = 12;
        $this->dtgGuiaCkpt->ShowFilter = false;

        $this->dtgGuiaCkpt->CssClass = 'datagrid';
        $this->dtgGuiaCkpt->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgGuiaCkpt->UseAjax = true;

        $this->dtgGuiaCkpt->SetDataBinder('dtgGuiaCkpt_Bind');

        $this->createDtgGuiaCkptColumns();
    }

    //-------- Botones medianos --------

    protected function btnEditGuia_Create() {
        $this->btnEditGuia = new QButtonP($this);
        $this->btnEditGuia->Text = TextoIcono('pencil-square-o','Editar');
        $this->btnEditGuia->AddAction(new QClickEvent(), new QAjaxAction('btnEditGuia_Click'));
    }

    protected function btnImprGuia_Create() {
        $this->btnImprGuia = new QButtonI($this);
        $this->btnImprGuia->Text = TextoIcono('print fa-lg','Imprimir');
        $this->btnImprGuia->AddAction(new QClickEvent(), new QAjaxAction('btnImprGuia_Click'));
    }

    //-------- Botones de posición medianos --------

    protected function btnProxRegi_Create() {
        $this->btnProxRegi = new QButton($this);
        $this->btnProxRegi->Text = TextoIcono('angle-right fa-lg','Proximo','P');
        $this->btnProxRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnProxRegi->HtmlEntities = false;
        $this->btnProxRegi->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnRegiAnte_Create() {
        $this->btnRegiAnte = new QButton($this);
        $this->btnRegiAnte->Text = TextoIcono('angle-left fa-lg','Anterior');
        $this->btnRegiAnte->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnRegiAnte->HtmlEntities = false;
        $this->btnRegiAnte->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnPrimRegi_Create() {
        $this->btnPrimRegi = new QButton($this);
        $this->btnPrimRegi->Text = TextoIcono('angle-double-left fa-lg','Primero');
        $this->btnPrimRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnPrimRegi->HtmlEntities = false;
        $this->btnPrimRegi->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnUltiRegi_Create() {
        $this->btnUltiRegi = new QButton($this);
        $this->btnUltiRegi->Text = TextoIcono('angle-double-right fa-lg','Ultimo','P');
        $this->btnUltiRegi->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnUltiRegi->HtmlEntities = false;
        $this->btnUltiRegi->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
    }

    //-------- Botones de posición pequeños --------

    protected function btnPrimSmal_Create() {
        $this->btnPrimSmal = new QButton($this);
        $this->btnPrimSmal->Text = TextoIcono('angle-double-left fa-lg','');
        $this->btnPrimSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnPrimSmal->HtmlEntities = false;
        $this->btnPrimSmal->AddAction(new QClickEvent(), new QServerAction('btnPrimRegi_Click'));
    }

    protected function btnAnteSmal_Create() {
        $this->btnAnteSmal = new QButton($this);
        $this->btnAnteSmal->Text = TextoIcono('angle-left fa-lg','');
        $this->btnAnteSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnAnteSmal->HtmlEntities = false;
        $this->btnAnteSmal->AddAction(new QClickEvent(), new QServerAction('btnRegiAnte_Click'));
    }

    protected function btnProxSmal_Create() {
        $this->btnProxSmal = new QButton($this);
        $this->btnProxSmal->Text = TextoIcono('angle-right fa-lg','');
        $this->btnProxSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnProxSmal->HtmlEntities = false;
        $this->btnProxSmal->AddAction(new QClickEvent(), new QServerAction('btnProxRegi_Click'));
    }

    protected function btnUltiSmal_Create() {
        $this->btnUltiSmal = new QButton($this);
        $this->btnUltiSmal->Text = TextoIcono('angle-double-right fa-lg','');
        $this->btnUltiSmal->CssClass = 'btn btn-outline-primary btn-sm';
        $this->btnUltiSmal->HtmlEntities = false;
        $this->btnUltiSmal->AddAction(new QClickEvent(), new QServerAction('btnUltiRegi_Click'));
    }

    //-----------------------------------
    // Funciones asociadas a los objetos
    //-----------------------------------

    // ---- DataGrid de Checkpoints de la Guía ----

    public function dtgGuiaCkpt_CodiEstaObject_Render(GuiaCkpt $objGuiaCkpt) {
        if (!is_null($objGuiaCkpt->CodiEstaObject))
            return $objGuiaCkpt->CodiEsta;
        else
            return null;
    }

    public function dtgGuiaCkpt_FechCkpt_Render(GuiaCkpt $objGuiaCkpt) {
        if (!is_null($objGuiaCkpt->FechCkpt))
            return $objGuiaCkpt->FechCkpt->__toString("DD/MM/YYYY");
        else
            return null;
    }

    protected function dtgGuiaCkpt_Bind() {
        $objCondicion = QQ::Clause();
        $objCondicion[] = QQ::Equal(QQN::GuiaCkpt()->NumeGuia,$this->objGuia->NumeGuia);
        $objCondicion[] = QQ::Equal(QQN::GuiaCkpt()->CodiCkptObject->TipoCkpt,SdeTipoCkptType::PUBLICO);
        $objClauses = array();
        if ($objClause = $this->dtgGuiaCkpt->OrderByClause)
            array_push($objClauses, $objClause);
        if ($objClause = $this->dtgGuiaCkpt->LimitClause)
            array_push($objClauses, $objClause);
        $this->dtgGuiaCkpt->DataSource = GuiaCkpt::QueryArray(
            QQ::AndCondition($objCondicion),
            QQ::Clause(
                QQ::OrderBy(
                    QQN::GuiaCkpt()->FechCkpt,false,QQN::GuiaCkpt()->HoraCkpt,false
                )
            )
        );
    }

    protected function createDtgGuiaCkptColumns() {
        $colCodiEsta = new QDataGridColumn($this);
        $colCodiEsta->Name = QApplication::Translate('SUC');
        $colCodiEsta->Html = '<?= $_FORM->dtgGuiaCkpt_CodiEstaObject_Render($_ITEM); ?>';
        $this->dtgGuiaCkpt->AddColumn($colCodiEsta);

        $colTextObse = new QDataGridColumn($this);
        $colTextObse->Name = QApplication::Translate('Text Obse');
        $colTextObse->Html = '<?= QString::Truncate($_ITEM->TextObse, 400); ?>';
        $colTextObse->OrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->TextObse);
        $colTextObse->ReverseOrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->TextObse, false);
        $colTextObse->Width = 350;
        $this->dtgGuiaCkpt->AddColumn($colTextObse);

        $colFechCkpt = new QDataGridColumn($this);
        $colFechCkpt->Name = QApplication::Translate('Fecha');
        $colFechCkpt->Html = '<?= $_FORM->dtgGuiaCkpt_FechCkpt_Render($_ITEM); ?>';
        $colFechCkpt->OrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->FechCkpt);
        $colFechCkpt->ReverseOrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->FechCkpt, false);
        $this->dtgGuiaCkpt->AddColumn($colFechCkpt);

        $colHoraCkpt = new QDataGridColumn($this);
        $colHoraCkpt->Name = QApplication::Translate('Hora');
        $colHoraCkpt->Html = '<?= QString::Truncate($_ITEM->HoraCkpt, 200); ?>';
        $colHoraCkpt->OrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->HoraCkpt);
        $colHoraCkpt->ReverseOrderByClause = QQ::OrderBy(QQN::GuiaCkpt()->HoraCkpt, false);
        $colHoraCkpt->Width = 15;
        $this->dtgGuiaCkpt->AddColumn($colHoraCkpt);
    }

    // ---- Botones ----

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->NumeGuia);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->NumeGuia);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->NumeGuia);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/consulta_guia.php/'.$objRegiTabl->NumeGuia);
    }

    protected function btnEditGuia_Click() {
        QApplication::Redirect(__SIST__.'/cargar_guia.php/'.$this->objGuia->NumeGuia);
    }

    protected function btnImprGuia_Click() {
        QApplication::Redirect(__SIST__.'/guia_pdf.php?strNumeGuia=' . $this->objGuia->NumeGuia);
    }

    protected function btnCancel_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }

    //------------------------------
    // Otras funciones del programa
    //------------------------------
    protected function verificarNavegacion() {
        $this->btnRegiAnte->Enabled = !($this->intPosiRegi == 0);
        $this->btnPrimRegi->Enabled = !($this->intPosiRegi == 0);
        $this->btnProxRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
        $this->btnUltiRegi->Enabled = !($this->intPosiRegi == $this->intCantRegi - 1);
    }

    protected function determinarPosicion() {
        if (isset($_SESSION['DataGuia'])) {
            $this->arrDataTabl = unserialize($_SESSION['DataGuia']);
            $this->intCantRegi = count($this->arrDataTabl);
            //-------------------------------------------------------------------------------
            // Se determina la posicion del registro actual, dentro del vector de registros
            //-------------------------------------------------------------------------------
            $intContRegi = 0;
            foreach ($this->arrDataTabl as $objTable) {
                if ($objTable->NumeGuia == $this->objGuia->NumeGuia) {
                    $this->intPosiRegi = $intContRegi;
                    break;
                } else {
                    $intContRegi++;
                }
            }
        }
    }

    protected function permitirCambios() {
        $blnGestGuia = false;
        $blnGuarGuia = true;
        $strMensUsua = '';
        //---------------------------------------------------------------------------------------
        // Si la guía consultada pertenece a un SubCliente, entonces la misma no puede editarse.
        //---------------------------------------------------------------------------------------
        if ($this->blnSubxClie) {
            $blnGuarGuia = false;
        }
        //-----------------------------------------------------------------------------
        // Si el Cliente, el cual el Usuario se encuentra relacionado se encuentra
        // inactivo, al mismo no se le permite crear guías ni borrar Guías existentes.
        //-----------------------------------------------------------------------------
        if ($this->objCliente->CodiStat == StatusType::INACTIVO) {
            $blnGestGuia = false;
            $blnGuarGuia = false;
            $strMensUsua = 'Su Cuenta ha sido inactivada! No puede crear, ni editar, ni borrar Guías existentes!';
        }
        //-----------------------------------------------------------------
        // Si el envío ya fue recibido y procesado por la Empresa Courier
        // no se permitirá al Usuario del Sistema CORP la realización de
        // ningún cambio.
        //-----------------------------------------------------------------
        if (($this->objGuia->CodiCkpt != 'NR') && (strlen($this->objGuia->CodiCkpt) > 0)) {
            $blnGestGuia = false;
            $blnGuarGuia = false;
            $strMensUsua = 'Esta Guía ya fué procesada por LibertyExpress, no se admiten cambios!';
        }

        $this->btnEditGuia->Visible = $blnGuarGuia;

        if (!$blnGestGuia) {
            $this->mensaje($strMensUsua,'','w','','exclamation-triangle');
        }
    }
}
ConsultaGuia::Run('ConsultaGuia');