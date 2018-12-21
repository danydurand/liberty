<?php
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

class SacarARuta extends FormularioBaseKaizen {
    protected $lstOperAbie;  // Combo de Operaciones Abiertas
    protected $txtNumeCont;  // Numero de Contenedor
    protected $txtListNume;  // Lista de Seriales/Guias/Valijas

    protected $arrListNume;  // Arreglo que contiene los numeros de la lista
    protected $objDataBase;
    protected $lstTipoOper;
    protected $arrGuiaErro;  // Arreglo de errores surgidos durante el proceso
    protected $arrGuiaReto;  // Arreglo de Guias de Retorno
    protected $arrImprReto;  // Arreglo de Guias de Retorno para Impresion
    protected $dlgMensUsua;

    protected $txtNuevChof;
    protected $txtNuevCedu;
    protected $btnRegiChof;

    protected $lstNuevTipo;
    protected $txtNuevPlac;
    protected $txtNuevDesc;
    protected $btnRegiVehi;

    protected $txtNombChof;
    protected $txtCeduChof;
    protected $txtPlacVehi;
    protected $txtDescVehi;
    protected $dtgChofSucu;
    protected $dtgVehiSucu;

    protected $btnManiCarg;
    protected $btnHojaEntr;
    protected $btnRepoErro;
    protected $btnImprReto;

    protected $intChofSele;
    protected $intVehiSele;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = QApplication::Translate('Armar Manifiesto');

        $this->dlgMensUsua_Create();

        $this->lstTipoOper_Create();
        $this->lstOperAbie_Create();
        $this->txtNombChof_Create();
        $this->txtCeduChof_Create();
        $this->txtDescVehi_Create();
        $this->txtPlacVehi_Create();
        $this->txtNumeCont_Create();
        $this->txtListNume_Create();

        $this->btnSave->Text = TextoIcono('floppy-o','Guardar','F','fa-lg');

        $this->txtNuevChof_Create();
        $this->txtNuevCedu_Create();
        $this->btnRegiChof_Create();
        $this->dtgChofSucu_Create();

        $this->lstNuevTipo_Create();
        $this->txtNuevPlac_Create();
        $this->txtNuevDesc_Create();
        $this->btnRegiVehi_Create();
        $this->dtgVehiSucu_Create();

        $this->btnManiCarg_Create();
        $this->btnHojaEntr_Create();
        $this->btnRepoErro_Create();
        $this->btnImprReto_Create();

        $this->validarCampos();
    }

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

    protected function lstNuevTipo_Create() {
        $this->lstNuevTipo = new QListBox($this);
        $this->lstNuevTipo->AddItem('Tipo Veh.');
        $this->lstNuevTipo->Width = 125;
        foreach (TipoVehiculo::LoadAll() as $objTipoVehi) {
            $this->lstNuevTipo->AddItem($objTipoVehi->__toString(),$objTipoVehi->TipoVehi);
        }
    }

    protected function txtNuevPlac_Create() {
        $this->txtNuevPlac = new QTextBox($this);
        $this->txtNuevPlac->Placeholder = 'Placa';
        $this->txtNuevPlac->Width = 95;
        $this->txtNuevPlac->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtNuevDesc_Create() {
        $this->txtNuevDesc = new QTextBox($this);
        $this->txtNuevDesc->Placeholder = 'Descripcion';
        $this->txtNuevDesc->Width = 125;
        $this->txtNuevDesc->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function btnRegiVehi_Create() {
        $this->btnRegiVehi = new QButtonP($this);
        $this->btnRegiVehi->Text = TextoIcono(__iFLOP__,'');
        $this->btnRegiVehi->ToolTip = 'Agregar un Vehículo a la lista';
        $this->btnRegiVehi->AddAction(new QClickEvent(), new QServerAction('btnRegiVehi_Click'));
    }

    protected function txtNuevChof_Create() {
        $this->txtNuevChof = new QTextBox($this);
        $this->txtNuevChof->Placeholder = 'Nuevo Chofer';
        $this->txtNuevChof->Width = 188;
        $this->txtNuevChof->SetCustomAttribute('onblur',"this.value=this.value.toUpperCase()");
    }

    protected function txtNuevCedu_Create() {
        $this->txtNuevCedu = new QTextBox($this);
        $this->txtNuevCedu->Width = 120;
        $this->txtNuevCedu->Placeholder = 'Nueva Cédula';
    }

    protected function btnRegiChof_Create() {
        $this->btnRegiChof = new QButtonP($this);
        $this->btnRegiChof->Text = TextoIcono(__iFLOP__,'');
        $this->btnRegiChof->ToolTip = 'Agregar un Chofer a la lista';
        $this->btnRegiChof->AddAction(new QClickEvent(), new QServerAction('btnRegiChof_Click'));
    }

    protected function txtNombChof_Create() {
        $this->txtNombChof = new QTextBox($this);
        $this->txtNombChof->Placeholder = 'Nombre del Chofer';
        $this->txtNombChof->Enabled = false;
        $this->txtNombChof->ForeColor = 'blue';
    }

    protected function txtCeduChof_Create() {
        $this->txtCeduChof = new QTextBox($this);
        $this->txtCeduChof->Placeholder = 'Cédula del Chofer';
        $this->txtCeduChof->Enabled = false;
        $this->txtCeduChof->ForeColor = 'blue';
    }

    protected function txtDescVehi_Create() {
        $this->txtDescVehi = new QTextBox($this);
        $this->txtDescVehi->Placeholder = 'Vehículo';
        $this->txtDescVehi->Enabled = false;
        $this->txtDescVehi->ForeColor = 'blue';
    }

    protected function txtPlacVehi_Create() {
        $this->txtPlacVehi = new QTextBox($this);
        $this->txtPlacVehi->Placeholder = 'Placa';
        $this->txtPlacVehi->Enabled = false;
        $this->txtPlacVehi->ForeColor = 'blue';
    }

    protected function dtgChofSucu_Create() {

        $this->dtgChofSucu = new ChoferDataGrid($this);
        $this->dtgChofSucu->FontSize = 13;
        $this->dtgChofSucu->ShowFilter = false;

        $this->dtgChofSucu->CssClass = 'datagrid';
        $this->dtgChofSucu->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgChofSucu->Paginator = new QPaginator($this->dtgChofSucu);
        $this->dtgChofSucu->ItemsPerPage = 12; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        $this->dtgChofSucu->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgChofSucu->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $this->dtgChofSucu->RowActionParameterHtml = '<?= $_ITEM->NombChof ?>|<?= $_ITEM->NumeCedu ?>|<?= $_ITEM->CodiChof ?>';
        $this->dtgChofSucu->AddRowAction(new QClickEvent(), new QAjaxAction('dtgChofSucuRow_Click'));

        $colNombChof = $this->dtgChofSucu->MetaAddColumn('NombChof');
        $colNombChof->Name = 'Nombre';
        $colNumeCedu = $this->dtgChofSucu->MetaAddColumn('NumeCedu');
        $colNumeCedu->Name = 'Cedula';
        $this->dtgChofSucu->SetDataBinder('dtgChofSucu_Binder');

    }

    protected function dtgChofSucuRow_Click($strFormId, $strControlId, $strParameter) {
        $this->mensaje();
        $arrNombCedu = explode('|',$strParameter);
        $this->txtNombChof->Text = $arrNombCedu[0];
        $this->txtCeduChof->Text = $arrNombCedu[1];
        $this->intChofSele       = $arrNombCedu[2];
        if (strlen($this->txtCeduChof->Text) == 0) {
            $this->txtCeduChof->Enabled = true;
            $this->txtCeduChof->ForeColor = null;
            $this->mensaje('La cédula del Chofer es requerida','','d','',__iHAND__);
        }
    }

    protected function dtgChofSucu_Binder(){
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Chofer()->NombChof);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Chofer()->CodiStat,StatusType::ACTIVO);
        $objClauWher[] = QQ::Equal(QQN::Chofer()->CodiDisp,SinoType::SI);
        $objClauWher[] = QQ::Equal(QQN::Chofer()->CodiEsta,$this->objUsuario->CodiEsta);
        $objClauWher[] = QQ::NotEqual(QQN::Chofer()->NumeCedu,'9.999.999');

        $arrChofSucu   = Chofer::QueryArray(QQ::AndCondition($objClauWher));
        $intCantRegi   = count($arrChofSucu);
        if ($intCantRegi > 10) {
            $this->dtgChofSucu->TotalItemCount = count($arrChofSucu);
        }
        // Bind the datasource to the datagrid
        $this->dtgChofSucu->DataSource = Chofer::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgChofSucu->OrderByClause, $this->dtgChofSucu->LimitClause)
        );
    }

    protected function dtgVehiSucu_Create() {

        $this->dtgVehiSucu = new VehiculoDataGrid($this);
        $this->dtgVehiSucu->FontSize = 13;
        $this->dtgVehiSucu->ShowFilter = false;

        $this->dtgVehiSucu->CssClass = 'datagrid';
        $this->dtgVehiSucu->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgVehiSucu->Paginator = new QPaginator($this->dtgVehiSucu);
        $this->dtgVehiSucu->ItemsPerPage = 12; //__FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        $this->dtgVehiSucu->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgVehiSucu->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        $this->dtgVehiSucu->RowActionParameterHtml = '<?= $_ITEM->TipoVehiObject->DescTipo ?>|<?= $_ITEM->NumePlac ?>|<?= $_ITEM->CodiVehi ?>';
        $this->dtgVehiSucu->AddRowAction(new QClickEvent(), new QAjaxAction('dtgVehiSucuRow_Click'));

        $colTipoVehi = $this->dtgVehiSucu->MetaAddColumn(QQN::Vehiculo()->TipoVehiObject->DescTipo);
        $colTipoVehi->Name = 'Tipo';
        $colTipoVehi->Width = 120;
        $colPlacVehi = $this->dtgVehiSucu->MetaAddColumn('NumePlac');
        $colPlacVehi->Name = 'Placa';
        $colDescVehi = $this->dtgVehiSucu->MetaAddColumn('DescVehi');
        $colDescVehi->Name = 'Descripcion';
        $this->dtgVehiSucu->SetDataBinder('dtgVehiSucu_Binder');

    }

    protected function dtgVehiSucuRow_Click($strFormId, $strControlId, $strParameter) {
        $this->mensaje();
        $arrTipoPlac = explode('|',$strParameter);
        $this->txtDescVehi->Text = $arrTipoPlac[0];
        $this->txtPlacVehi->Text = $arrTipoPlac[1];
        $this->intVehiSele       = $arrTipoPlac[2];
        if (strlen($this->txtPlacVehi->Text) == 0) {
            $this->txtPlacVehi->Enabled = true;
            $this->txtPlacVehi->ForeColor = null;
            $this->mensaje('La Placa del Vehículo es requerida','','d','',__iHAND__);
        }
    }

    protected function dtgVehiSucu_Binder(){
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Vehiculo()->DescVehi);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Vehiculo()->CodiStat,StatusType::ACTIVO);
        $objClauWher[] = QQ::Equal(QQN::Vehiculo()->CodiDisp,SinoType::SI);
        $objClauWher[] = QQ::Equal(QQN::Vehiculo()->CodiEsta,$this->objUsuario->CodiEsta);
        $objClauWher[] = QQ::NotEqual(QQN::Vehiculo()->NumePlac,'999-999');

        $arrVehiSucu   = Vehiculo::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $intCantRegi   = count($arrVehiSucu);
        if ($intCantRegi > 10){
            $this->dtgVehiSucu->TotalItemCount = count($arrVehiSucu);
        }
        // Bind the datasource to the datagrid
        $this->dtgVehiSucu->DataSource = Vehiculo::QueryArray(
            QQ::AndCondition($objClauWher),
            QQ::Clause($this->dtgVehiSucu->OrderByClause, $this->dtgVehiSucu->LimitClause)
        );

    }

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
    protected function lstOperAbie_Create() {
        $this->lstOperAbie = new QListBox($this);
        $this->lstOperAbie->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->lstOperAbie->Name = 'Operación';
        $this->lstOperAbie->Required = true;
        $this->lstOperAbie->Width = 300;
        $this->lstOperAbie->AddAction(new QChangeEvent(), new QAjaxAction('validarCampos'));
        $this->lstOperAbie->AddAction(new QChangeEvent(), new QAjaxAction('mostrarDatos'));
    }

    // Número de Contenedor
    protected function txtNumeCont_Create() {
        $this->txtNumeCont = new QTextBox($this);
        $this->txtNumeCont->Placeholder = 'Precinto/Candado #';
        $this->txtNumeCont->AddAction(new QChangeEvent(), new QAjaxAction('validarCampos'));
        $this->txtNumeCont->AddAction(new QChangeEvent(), new QAjaxAction('advertirExistencia'));
        $this->txtNumeCont->Required = true;
    }

    // Lista de Seriales o Items asociados a una Guia
    protected function txtListNume_Create() {
        $this->txtListNume = new QTextBox($this);
        $this->txtListNume->Placeholder = 'Guías/Valijas';
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

    protected function mostrarDatos() {
        if (!is_null($this->lstOperAbie->SelectedValue)) {
            $intOperSele = $this->lstOperAbie->SelectedValue;
            $objOperSele = SdeOperacion::Load($intOperSele);
            if ($objOperSele) {
                //---------------------------------------------------------------------------
                // Se muestran en pantalla, el Chofer y el Vehiculo asociado a la Operacion
                //---------------------------------------------------------------------------
                $this->intChofSele       = $objOperSele->CodiChof;
                $this->txtNombChof->Text = $objOperSele->CodiChofObject->__toString();
                $this->txtCeduChof->Text = $objOperSele->CodiChofObject->NumeCedu;

                $this->intVehiSele       = $objOperSele->CodiVehi;
                $this->txtDescVehi->Text = $objOperSele->CodiVehiObject->DescVehi;
                $this->txtPlacVehi->Text = $objOperSele->CodiVehiObject->NumePlac;
            }
        }

    }
    protected function advertirExistencia() {
        $strNumeMani = trim($this->txtNumeCont->Text);
        if (strlen($strNumeMani) > 0) {
            $objExisMani = SdeContenedor::Load($strNumeMani);
            if ($objExisMani) {
                $strMensUsua  = 'Ya existe el Manifiesto: <b>'.$strNumeMani.'</b>, creado el <b>';
                $strMensUsua .= $objExisMani->Fecha->__toString('DD/MM/YYYY').'</b>.  Las piezas serán agregadas';
                $this->mensaje($strMensUsua,'m','w','',__iEXCL__);
            }
        }
    }

    protected function btnRegiVehi_Click(){
        //------------------------
        // Se validan los datos
        //------------------------
        $this->mensaje();
        $intNuevTipo = $this->lstNuevTipo->SelectedValue;
        $strNuevPlac = trim($this->txtNuevPlac->Text);
        $strNuevDesc = trim($this->txtNuevDesc->Text);
        if (is_null($intNuevTipo)) {
            $this->mensaje('El Tipo de Vehiculo, es requerido','','d','',__iHAND__);
            return;
        }
        if (strlen($strNuevPlac) <= 5) {
            $this->mensaje('La Placa debe tener al menos 6 caracteres','','d','',__iHAND__);
            return;
        }
        if (strlen($strNuevDesc) <= 5) {
            $this->mensaje('La Descripción del Vehiculo es muy corta','','d','',__iHAND__);
            return;
        }
        //----------------------------------------------
        // Se crea el nuevo chofer en la base de datos
        //----------------------------------------------
        $objNuevVehi           = new Vehiculo();
        $objNuevVehi->DescVehi = $strNuevDesc;
        $objNuevVehi->NumePlac = $strNuevPlac;
        $objNuevVehi->TipoVehi = $intNuevTipo;
        $objNuevVehi->CodiEsta = $this->objUsuario->CodiEsta;
        $objNuevVehi->CodiDisp = SinoType::SI;
        $objNuevVehi->CodiStat = StatusType::ACTIVO;
        $objNuevVehi->Save();
        //---------------------------------------------
        // Se deja rastro de la transaccion realizada
        //---------------------------------------------
        $arrLogxCamb['strNombTabl'] = 'Vehiculo';
        $arrLogxCamb['intRefeRegi'] = $objNuevVehi->CodiVehi;
        $arrLogxCamb['strNombRegi'] = $objNuevVehi->DescVehi;
        $arrLogxCamb['strDescCamb'] = 'Creado dinamicamente, desde Sacar a Ruta';
        LogDeCambios($arrLogxCamb);
        $this->mensaje('Vehículo creado Exitosamente !','','','',__iCHEC__);
        $this->lstNuevTipo->SelectedIndex = 0;
        $this->txtNuevPlac->Text = '';
        $this->txtNuevDesc->Text = '';
        //----------------------------------------------------
        // El vehiculo recién creado se asigna la Manifiesto
        //----------------------------------------------------
        $this->txtDescVehi->Text = $objNuevVehi->TipoVehiObject->DescTipo;
        $this->txtPlacVehi->Text = $strNuevPlac;
        //------------------------------------
        // Se actualiza la lista de Vehiculos
        //------------------------------------
        $this->dtgVehiSucu->Refresh();
    }

    protected function btnRegiChof_Click(){
        //------------------------
        // Se validan los datos
        //------------------------
        $this->mensaje();
        $strNuevChof = trim($this->txtNuevChof->Text);
        $strNuevCedu = trim($this->txtNuevCedu->Text);
        if (strlen($strNuevChof) <= 4) {
            $this->mensaje('El nombre del nuevo Chofer, es muy pequeño','','d','',__iHAND__);
            return;
        }
        if (strlen($strNuevCedu) <= 6) {
            $this->mensaje('La cédula del nuevo Chofer, es muy corta','','d','',__iHAND__);
            return;
        }
        //----------------------------------------------
        // Se crea el nuevo chofer en la base de datos
        //----------------------------------------------
        $objNuevChof           = new Chofer();
        $objNuevChof->NombChof = $strNuevChof;
        $objNuevChof->ApelChof = $strNuevChof;
        $objNuevChof->NumeCedu = $strNuevCedu;
        $objNuevChof->CodiEsta = $this->objUsuario->CodiEsta;
        $objNuevChof->CodiDisp = SinoType::SI;
        $objNuevChof->CodiStat = StatusType::ACTIVO;
        $objNuevChof->TipoMens = MasTipoMensType::FIJO;
        $objNuevChof->Save();
        //---------------------------------------------
        // Se deja rastro de la transaccion realizada
        //---------------------------------------------
        $arrLogxCamb['strNombTabl'] = 'Chofer';
        $arrLogxCamb['intRefeRegi'] = $objNuevChof->CodiChof;
        $arrLogxCamb['strNombRegi'] = $objNuevChof->NombChof;
        $arrLogxCamb['strDescCamb'] = 'Creado dinamicamente, desde Sacar a Ruta';
        LogDeCambios($arrLogxCamb);
        $this->mensaje('Chofer creado Exitosamente !','','','',__iCHEC__);
        $this->txtNuevChof->Text = '';
        $this->txtNuevCedu->Text = '';
        //---------------------------------------------------
        // El chofer recién creado se asigna la Manifiesto
        //---------------------------------------------------
        $this->txtNombChof->Text = $strNuevChof;
        $this->txtCeduChof->Text = $strNuevCedu;
        //------------------------------------
        // Se actualiza la lista de Choferes
        //------------------------------------
        $this->dtgChofSucu->Refresh();
    }

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
        $arrEnca2PDF = array('Nro de Guia','Error');
        $arrAnch2PDF = array(20,100);
        $arrJust2PDF = array('C','L');
        $_SESSION['Dato'] = serialize($this->arrGuiaErro);
        $_SESSION['Enca'] = serialize($arrEnca2PDF);
        $_SESSION['Anch'] = serialize($arrAnch2PDF);
        $_SESSION['Just'] = serialize($arrJust2PDF);
        QApplication::Redirect('../util/tabla2pdf2.php?nomb_repo=Errores_Salida_A_Ruta');
    }

    protected function btnManiCarg_Click() {
        $objContenedor = SdeContenedor::Load($this->txtNumeCont->Text);
        if ($objContenedor) {
            if ($objContenedor->CountGuias()) {
                if (strlen($objContenedor->PlacaVehiculo) > 0) {
                    QApplication::Redirect('imprimir_manifiesto_nuevo.php?manifiesto='.$this->txtNumeCont->Text);
                } else {
                    QApplication::Redirect('imprimir_manifiesto.php?manifiesto='.$this->txtNumeCont->Text);
                }
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
                if (strlen($objContenedor->PlacaVehiculo) > 0) {
                    QApplication::Redirect('imprimir_hoja_entrega_nueva.php?manifiesto='.$this->txtNumeCont->Text);
                } else {
                    QApplication::Redirect('imprimir_hoja_entrega.php?manifiesto='.$this->txtNumeCont->Text);
                }
            } else {
                $strMensUsua = QApplication::Translate('No hay Guias Asociadas');
                $this->mensaje($strMensUsua,'','w','i','exclamation-triangle');
            }
        }
    }

    protected function lstTipoOper_Change() {
        $this->lstOperAbie->RemoveAllItems();
        if (!is_null($this->lstTipoOper->SelectedValue)) {
            $strCodiSucu   = $this->objUsuario->CodiEsta;
            $objClausula   = QQ::Clause();
            $objClausula[] = QQ::OrderBy(QQN::SdeOperacion()->CodiRuta);
            $intCodiTipo   = $this->lstTipoOper->SelectedValue;
            $arrSdexOper   = SdeOperacion::LoadArrayByCodiTipoCodiEsta($intCodiTipo,$strCodiSucu,$objClausula);
            $intCantOper   = count($arrSdexOper);
            $this->lstOperAbie->AddItem('- Seleccione Uno - ('.$intCantOper.')',null);
            foreach ($arrSdexOper as $objOperacion) {
                if ($objOperacion->CodiRuta != "R9999") {
                    $this->lstOperAbie->AddItem(substr($objOperacion->__toString(),0,50),$objOperacion->CodiOper);
                }
            }
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

    protected function validarChoferVehiculo() {
        //---------------------------------------------
        // Se validan los nuevos datos del Manifiesto
        //---------------------------------------------
        $this->mensaje();
        if (strlen(trim($this->txtNombChof->Text)) == 0) {
            $this->mensaje('Debe seleccionar un Chofer de la lista','','d','',__iHAND__);
            return false;
        }
        if (strlen(trim($this->txtCeduChof->Text)) == 0) {
            $this->mensaje('La cédula del Chofer es requerida','','d','',__iHAND__);
            return false;
        }
        if (strlen(trim($this->txtDescVehi->Text)) == 0) {
            $this->mensaje('Debe seleccionar un Vehículo de la lista','','d','',__iHAND__);
            return false;
        }
        if (strlen(trim($this->txtPlacVehi->Text)) == 0) {
            $this->mensaje('La Placa del Vehículo es requerida','','d','',__iHAND__);
            return false;
        }
        //----------------------------------------------------------------------------------------
        // Si la cedula del chofer o la placa del vehículo, fueron editados, se guardan en la BD
        //----------------------------------------------------------------------------------------
        if ($this->txtCeduChof->Enabled) {
            $objChofSele = Chofer::Load($this->intChofSele);
            if ($objChofSele) {
                $objChofSele->NumeCedu = $this->txtCeduChof->Text;
                $objChofSele->Save();
                //---------------------------------------------
                // Se deja rastro de la transaccion realizada
                //---------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'Chofer';
                $arrLogxCamb['intRefeRegi'] = $objChofSele->CodiChof;
                $arrLogxCamb['strNombRegi'] = $objChofSele->NombChof;
                $arrLogxCamb['strDescCamb'] = 'Nueva Cedula: '.$this->txtCeduChof->Text;
                LogDeCambios($arrLogxCamb);
                $this->txtCeduChof->Enabled = false;
                $this->dtgChofSucu->Refresh();
            }
        }
        if ($this->txtPlacVehi->Enabled) {
            $objVehiSele = Vehiculo::Load($this->intVehiSele);
            if ($objVehiSele) {
                $objVehiSele->NumePlac = $this->txtPlacVehi->Text;
                $objVehiSele->Save();
                //---------------------------------------------
                // Se deja rastro de la transaccion realizada
                //---------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'Vehiculo';
                $arrLogxCamb['intRefeRegi'] = $objVehiSele->CodiVehi;
                $arrLogxCamb['strNombRegi'] = $objVehiSele->DescVehi;
                $arrLogxCamb['strDescCamb'] = 'Nueva Placa: '.$this->txtPlacVehi->Text;
                LogDeCambios($arrLogxCamb);
                $this->txtPlacVehi->Enabled = false;
                $this->dtgVehiSucu->Refresh();
            }
        }
        return true;
    }

    protected function btnSave_Click() {
        $blnTodoOkey = $this->validarChoferVehiculo();
        if ($blnTodoOkey) {
            //-----------------------------------------------------------
            // Si los datos estan completos, se continua con el proceso
            //-----------------------------------------------------------
            $this->objDataBase = QApplication::$Database[1];
            $strTipoRuta = $this->lstTipoOper->SelectedValue == 0 ? "URBANA" : "EXTRA-URBANA";
            //------------------------------------------------------
            // Se graba o actualiza el contenedor en la tabla guia
            //------------------------------------------------------
            if ($strTipoRuta == "URBANA") {
                //-----------------------------------------------------------------------------------
                // Si la Ruta es "Urbana" y no se ha especificado un Contenedor se debe asignar uno
                //-----------------------------------------------------------------------------------
                $this->txtNumeCont->Text = date('YmdHis');
            }
            $objContenedor = SdeContenedor::Load($this->txtNumeCont->Text);
            if (!$objContenedor) {
                $objContenedor           = new SdeContenedor();
                $objContenedor->NumeCont = $this->txtNumeCont->Text;
                $objContenedor->Fecha    = new QDateTime(QDateTime::Now);
                $objContenedor->Hora     = date("H:i");
                $objContenedor->StatCont = 'P';
            }
            $objContenedor->NombreChofer       = $this->txtNombChof->Text;
            $objContenedor->CedulaChofer       = $this->txtCeduChof->Text;
            $objContenedor->DescipcionVehiculo = $this->txtDescVehi->Text;
            $objContenedor->PlacaVehiculo      = $this->txtPlacVehi->Text;
            $objContenedor->CodiOper           = $this->lstOperAbie->SelectedValue;
            $objContenedor->Save();
            if ($strTipoRuta == "URBANA") {
                $objCheckpoint = SdeCheckpoint::Load('ER');
            } else {
                $objCheckpoint = SdeCheckpoint::Load('TR');
            }
            $this->arrListNume = explode(',',nl2br2($this->txtListNume->Text));
            //--------------------------------------------------
            // Se eliminan guías repetidas y líneas en blanco
            //--------------------------------------------------
            $this->arrListNume = LimpiarArreglo($this->arrListNume);
            $this->txtListNume->Text = '';

            $arrDestinos = $objContenedor->GetDestinos();
            $strCodiRuta = $objContenedor->CodiOperObject->CodiRuta;
            $intContVali = 0;
            $intContGuia = 0;
            $intContCkpt = 0;
            $this->arrGuiaErro = array();
            $this->arrGuiaReto = array();
            foreach ($this->arrListNume as $strNumeSeri) {
                //-----------------------------------------------------------------------
                // Se procesa una a una las Guias/Valijas proporcionadas por el Usuario
                //-----------------------------------------------------------------------
                $objGuia = Guia::Load($strNumeSeri);
                if ($objGuia) {
                    //-------------------------------------------------------------------------------------
                    // A petición de la gerencia de ventas, una guia no puede salir a ruta mas de 3 veces
                    //-------------------------------------------------------------------------------------
                    $intCantDesp = $objGuia->cantidadDeDespachos();
                    if ($intCantDesp >= 3) {
                        $this->txtListNume->Text .= $strNumeSeri." (Muchos Despachos)".chr(13);
                        $this->arrGuiaErro[] = array($objGuia->NumeGuia,"Muchos Despachos");
                        continue;
                    }
                    $arrSepuProc = $objGuia->SePuedeProcesar();
                    if ($arrSepuProc['TodoOkey']) {
                        if ($strTipoRuta == 'EXTRA-URBANA') {
                            if ($objGuia->PesoGuia != 0) {
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
                                            $this->arrGuiaErro[] = array($objGuia->NumeGuia,$arrResuGrab['MotiNook']);
                                        }
                                    }
                                } else {
                                    $this->txtListNume->Text .= $strNumeSeri." (Destino no Coincide)".chr(13);
                                    $this->arrGuiaErro[] = array($objGuia->NumeGuia,'DESTINO ('.$objGuia->EstaDest.') NO COINCIDE');
                                }
                            } else {
                                $this->txtListNume->Text .= $strNumeSeri." (Peso de la guia no puede ser cero)".chr(13);
                                $this->arrGuiaErro[] = array($objGuia->NumeGuia,'PESO ('.$objGuia->PesoGuia.') IGUAL A CERO');
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
                                $this->arrGuiaErro[] = array($objGuia->NumeGuia,$arrResuGrab['MotiNook']);
                            }
                        }
                        $intContGuia ++;
                        //---------------------------------------------------------------------------------------------
                        // Luego de marcar la guia con el checkpoint de "Salida a Ruta", se verifica si la Guia tiene
                        // alguna Guia Retorno. Esto se hace con el fin de advertir al Usuario de la existencia
                        // de tales guias de retorno
                        //---------------------------------------------------------------------------------------------
                        if (strlen($objGuia->GuiaRetorno) > 0) {
                            $this->arrGuiaReto[] = array($objGuia->NumeGuia,$objGuia->NombRemi,$objGuia->GuiaRetorno);
                        }
                    } else {
                        $this->txtListNume->Text .= $strNumeSeri." (".$arrSepuProc['MensUsua'].")".chr(13);
                        $this->arrGuiaErro[] = array($objGuia->NumeGuia,$arrSepuProc['MensUsua']);
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
                                $this->arrGuiaErro[] = array($objGuia->NumeGuia,$arrResuGrab['MotiNook']);
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
                            $arrDatoCkpt['GuiaAnul'] = $objGuiaVali->Anulada;
                            $arrDatoCkpt['CodiCkpt'] = $objCheckpoint->CodiCkpt;
                            $arrDatoCkpt['TextCkpt'] = $objCheckpoint->DescCkpt.' ('.$objContenedor->NumeCont.')';
                            $arrDatoCkpt['CodiRuta'] = $strCodiRuta;
                            $arrResuGrab = GrabarCheckpointOptimizado($arrDatoCkpt);
                            if ($arrResuGrab['TodoOkey']) {
                                $intContCkpt ++;
                            } else {
                                $this->arrGuiaErro[] = array($objGuia->NumeGuia,$arrResuGrab['MotiNook']);
                            }
                            $intContGuia ++;
                        }
                        $intContVali ++;
                    } else {
                        $this->txtListNume->Text .= $strNumeSeri." (No Existe Guia/Valija)".chr(13);
                        $this->arrGuiaErro[] = array($strNumeSeri,$strNumeSeri." (No Existe Guia/Valija)");
                    }
                }
            }

            $this->actualizarOperacion($objContenedor);

            $strMensUsua = sprintf('Guias procesadas (%s)  Ckpts procesados (%s)',$intContGuia,$intContCkpt);
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

    protected function actualizarOperacion(SdeContenedor $objContenedor) {
        if ($objContenedor) {
            $objOperAsoc = $objContenedor->CodiOperObject;
            if ($objOperAsoc->CodiChof != $this->intChofSele || $objOperAsoc->CodiVehi = $this->intVehiSele) {
                //-----------------------------------------------------------------------------------------
                // El Chofer y el Vehiculo seleccionado, se asocian a la Operacion para futuras ocasiones
                //-----------------------------------------------------------------------------------------
                $objOperAsoc->CodiChof = $this->intChofSele;
                $objOperAsoc->CodiVehi = $this->intVehiSele;
                $objOperAsoc->Save();
                //---------------------------------------------
                // Se deja rastro de la transaccion realizada
                //---------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'SdeOperacion';
                $arrLogxCamb['intRefeRegi'] = $objOperAsoc->CodiOper;
                $arrLogxCamb['strNombRegi'] = $objOperAsoc->CodiRutaObject->CodiRuta;
                $arrLogxCamb['strDescCamb'] = 'Modificado dinamicamente, desde Sacar a Ruta';
                LogDeCambios($arrLogxCamb);
            }
        }
    }
}
SacarARuta::Run('SacarARuta');
?>