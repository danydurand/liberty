<?php
//------------------------------------------------------------------------
// Programa      : repo_cuadre_de_caja_plus.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 01/04/2018
// Descripcion   : Reporte de Cierre de Caja Detallado
//------------------------------------------------------------------------
require_once('../../qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');
require_once('/appl/lib/repo_factura_pdf.php');

class RepoCuadreDeCajaPlus extends FormularioBaseKaizen {
    protected $strSucuOrig;
    protected $strReceOrig;

    protected $strLogoComp;
    protected $strNombEmpr;
    protected $strDireEmpr;
    protected $arrFormPago;

    protected $lstCodiSucu;
    protected $lstCodiRece;
    protected $calFechRepo;
    protected $chkMostQuer;

    protected function SetupValores() {
        $this->objUsuario  = unserialize($_SESSION['User']);
        $this->strSucuOrig = unserialize($_SESSION['SucuOrig']);
        $this->strReceOrig = unserialize($_SESSION['ReceOrig']);
        //-------------------------------------------------------
        // Identifico los logos y el nombre de la Empresa
        //-------------------------------------------------------
        $this->strLogoComp = '../../assets/images/LogoEmpresa.jpg';
        $objParametro = Parametro::Load('88888','datfisc');
        $this->strNombEmpr = $objParametro->ParaTxt1;
        $this->strDireEmpr = $objParametro->ParaTxt5;
        //----------------------------
        // Vector de Formas de Pago
        //----------------------------
        $arrFormPago = FormaPago::LoadAll();
        foreach ($arrFormPago as $objFormPago) {
            $this->arrFormPago[$objFormPago->Abreviado] = 0;
        }
    }

    protected function Form_Create() {

        parent::Form_Create();

        $this->SetupValores();

        $this->lblTituForm->Text = 'Cuadre de Caja Plus';

        $this->lstCodiSucu_Create();
        $this->lstCodiRece_Create();
        $this->calFechRepo_Create();
        $this->chkMostQuer_Create();

    }

    //------------------------------
    // Aqui se crean los objetos
    //------------------------------

    protected function lstCodiSucu_Create(){
        $this->lstCodiSucu = new QListBox($this);
        $this->lstCodiSucu->Name = QApplication::Translate('Sucursal');
        $this->lstCodiSucu->Required = true;
        $this->cargarSucursales();
        $this->lstCodiSucu->AddAction(new QChangeEvent(), new QAjaxAction('lstCodiSucu_Change'));
    }

    protected function lstCodiRece_Create(){
        $this->lstCodiRece = new QListBox($this);
        $this->lstCodiRece->Name = QApplication::Translate('Receptoria');
        $this->lstCodiRece->AddItem('- Seleccione Uno -',null);
    }


    protected function calFechRepo_Create() {
        $this->calFechRepo = new QCalendar($this);
        $this->calFechRepo->Name = QApplication::Translate('Fecha');
        $this->calFechRepo->Width = 100;
    }

    protected function chkMostQuer_Create() {
        $this->chkMostQuer = new QCheckBox($this);
        $this->chkMostQuer->Name = 'Mostrar Query ?';
        $this->chkMostQuer->Visible = false;
        if (in_array($this->objUsuario->LogiUsua, array('ddurand'))) {
            $this->chkMostQuer->Visible = true;
        }
    }

    //-------------------------------------
    // Acciones relativas a los objetos
    //-------------------------------------

    protected function cargarSucursales() {
        $this->lstCodiSucu->RemoveAllItems();
        $objClauOrde   = QQ::Clause();
        $objClauOrde   = QQ::OrderBy(QQN::Estacion()->DescEsta);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::Estacion()->CodiStat,StatusType::ACTIVO);
        $objClauWher[] = QQ::Equal(QQN::Estacion()->EsUnAlmacen,SinoType::NO);
        $arrCodiSucu   = Estacion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $intCantSucu   = count($arrCodiSucu);
        $this->lstCodiSucu->AddItem('- Seleccione Uno - ('.$intCantSucu.')',null);
        foreach ($arrCodiSucu as $objSucursal) {
            $this->lstCodiSucu->AddItem($objSucursal->DescEsta,$objSucursal->CodiEsta);
        }
        $objCagua = Estacion::Load('CGA');
        $this->lstCodiSucu->AddItem($objCagua->DescEsta,$objCagua->CodiEsta);
    }

    protected function lstCodiSucu_Change() {
        if (!is_null($this->lstCodiSucu->SelectedValue)) {
            $this->lstCodiRece->RemoveAllItems();
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::Counter()->Descripcion);
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::Equal(QQN::Counter()->SucursalId,$this->lstCodiSucu->SelectedValue);
            $objClauWher[] = QQ::Equal(QQN::Counter()->StatusId,StatusType::ACTIVO);
            $arrCodiRece   = Counter::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
            $intCantRece   = count($arrCodiRece);
            $this->lstCodiRece->AddItem('- Seleccione Uno - ('.$intCantRece.')');
            foreach ($arrCodiRece as $objReceptoria) {
                $this->lstCodiRece->AddItem($objReceptoria->__toString(),$objReceptoria->Id);
            }
            if ($intCantRece > 1) {
                $this->lstCodiRece->Enabled = true;
                $this->lstCodiRece->ForeColor = null;
            } else {
                $this->lstCodiRece->Enabled = false;
                $this->lstCodiRece->ForeColor = 'blue';
                if ($intCantRece == 1) {
                    $this->lstCodiRece->SelectedIndex = 1;
                }
            }
        }
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $this->mensaje();
        //---------------------------------------------------------
        // Armo los otros vectores que requiere la rutina PDF
        //---------------------------------------------------------
        $arrEncaReco = array('Id','Ubic','Guia','Fecha','Factura','Cliente','Maq. Fiscal','Monto Total','F. Pago','Documento','Banco','Mto. Pagado');
        $arrJustColu = array('C','C','C','C','C','L','C','R','C','L','L','R');
        $arrAnchColu = array(14,28,15,15,16,55,20,20,15,20,20,20);
        //---------------------------------------------------------
        // Los vectores se llevan a variables de session
        //---------------------------------------------------------
        $_SESSION['Enca'] = serialize($arrEncaReco);
        $_SESSION['Anch'] = serialize($arrAnchColu);
        $_SESSION['Just'] = serialize($arrJustColu);
        //--------------------------------------------------
        // Aqui se define el Query sobre la base de datos
        //--------------------------------------------------
        $strCadeSqlx = "select f.id,
						 	   f.sucursal_id,
						 	   g.nume_guia,
							   r.siglas,
							   u.logi_usua, 
                               f.fecha_impresion, 
                               f.numero, 
                               f.cedula_rif, 
                               f.razon_social, 
                               f.maquina_fiscal, 
                               f.monto_total,
                               fp.abreviado forma_pago, 
                               p.numero_documento, 
                               b.abreviado banco, 
                               p.monto_pago
		                  from factura_pmn f inner join pago_factura_pmn p 
		                    on f.id = p.factura_id 
		                       inner join forma_pago fp 
		                    on fp.id = p.forma_pago_id
		                       left join banco b 
		                    on b.id = p.banco_id
		                       inner join usuario u 
		                    on u.codi_usua = f.creada_por
		                       inner join counter r 
		                    on r.id = f.receptoria_id
		                       inner join guia g
		                    on f.id = g.factura_id
		                 where f.estatus != 'A'
		                   and f.sucursal_id = '".$this->lstCodiSucu->SelectedValue."' ";
        if (!is_null($this->lstCodiRece->SelectedValue)) {
            $strCadeSqlx .= "and f.receptoria_id = ".$this->lstCodiRece->SelectedValue." ";
        }
        if (!is_null($this->calFechRepo->DateTime)) {
            $strCadeSqlx .= "and f.fecha_impresion = '".$this->calFechRepo->DateTime->__toString("YYMMDD")."' ";
        }
        $strCadeSqlx .= "order by f.numero";
        if ($this->chkMostQuer->Checked) {
            echo $strCadeSqlx;
            exit(0);
        }
        $objDatabase = FacturaPmn::GetDatabase();
        $objDbResult = $objDatabase->Query($strCadeSqlx);
        $arrFormPago = array();
        $arrDatoRepo = array();
        $decTotaFact = 0;
        $decTotaPago = 0;
        while ($mixRegi = $objDbResult->FetchArray()) {
            //-----------------------------
            // Datos que van al reporte
            //-----------------------------
            $strUbicFact = trim($mixRegi['sucursal_id'])."|".trim($mixRegi['siglas'])."|".$mixRegi['logi_usua'];
            $strFechImpr = $mixRegi['fecha_impresion'];
            if (strlen($strFechImpr)) {
                $strFechImpr = substr($strFechImpr,4,2)."/".substr($strFechImpr,2,2)."/".substr($strFechImpr,0,2);
            }
            $arrDatoRepo[] = array(
                $mixRegi['id'],
                $strUbicFact,
                $mixRegi['nume_guia'],
                $strFechImpr,
                $mixRegi['numero'],
                $mixRegi['cedula_rif']."|".substr($mixRegi['razon_social'],0,20),
                $mixRegi['maquina_fiscal'],
                nf($mixRegi['monto_total']),
                $mixRegi['forma_pago'],
                $mixRegi['numero_documento'],
                $mixRegi['banco'],
                nf($mixRegi['monto_pago'])
            );
            //----------------------------------------------------
            // Se acumulan los montos pagados por Forma de Pago
            //----------------------------------------------------
            $this->arrFormPago[$mixRegi['forma_pago']] += $mixRegi['monto_pago'];
            //--------------------------------------------
            // Se acumula el monto de la forma de pago
            //--------------------------------------------
            $decTotaFact += $mixRegi['monto_total'];
            $decTotaPago += $mixRegi['monto_pago'];
        }
        // Linea de totales
        $arrDatoRepo[] = array('','','','','','','TOTALES',nf($decTotaFact),'','','',nf($decTotaPago));
        $arrDatoRepo[] = array('','','','','','','','','','','','');
        $arrDatoRepo[] = array('','','','','','','','','','','Resumen FP','');
        foreach ($this->arrFormPago as $strFormPago => $decMontPago) {
            if ($decMontPago > 0) {
                $arrDatoRepo[] = array('','','','','','','','','','',$strFormPago,nf($decMontPago));
            }
        }

        $_SESSION['Dato'] = serialize($arrDatoRepo);
        //----------------------
        // Titulo del Reporte
        //----------------------
        $strTituRepo = 'Cuadre de Caja Plus ('.$this->lstCodiSucu->SelectedValue;
        if (!is_null($this->lstCodiRece->SelectedValue)) {
            $strTituRepo .= "-".$this->lstCodiRece->SelectedName;
        }
        if (!is_null($this->calFechRepo->DateTime)) {
            $strTituRepo .= "-".$this->calFechRepo->DateTime->__toString("DD/MM/YYYY");
        }
        $strTituRepo .= ")";
        //--------------------------------
        // Aqui se genera el reporte PDF
        //--------------------------------
        $pdf = new PDF('L','mm','Letter');
        $pdf->setVariables($arrEncaReco,$arrJustColu,$arrAnchColu,05,$this->strLogoComp);
        $pdf->setEmpresa($this->strNombEmpr,$this->strDireEmpr,$strTituRepo,'Receptoria','Sucursal');
        $pdf->SetTitle('Cuadre de Caja +');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->FancyTable($arrEncaReco,$arrDatoRepo,$arrAnchColu,$arrJustColu);
        $pdf->Output();
    }
}
RepoCuadreDeCajaPlus::Run('RepoCuadreDeCajaPlus');
?>
