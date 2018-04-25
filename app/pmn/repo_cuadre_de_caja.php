<?php
//------------------------------------------------------------------------
// Programa      : repo_cuadre_de_caja.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 01/04/2018
// Descripcion   : Reporte de Cierre de Caja Detallado
//------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/validar_ubicacion.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');
require_once('/appl/lib/repo_factura_pdf.php');

class RepoCuadreDeCaja extends FormularioBaseKaizen {
    protected $strSucuOrig;
    protected $strReceOrig;
    protected $strLogoComp;
    protected $strNombEmpr;
    protected $strDireEmpr;
    protected $arrFormPago;

    protected $rdbCualRepo;
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

        $this->lblTituForm->Text = 'Cuadre de Caja';

        $this->rdbCualRepo_Create();
        $this->calFechRepo_Create();
        $this->chkMostQuer_Create();

        $this->rdbCuadRepo_Change();
    }

    //------------------------------
    // Aqui se crean los objetos
    //------------------------------

    protected function rdbCualRepo_Create() {
        $this->rdbCualRepo = new QRadioButtonList($this);
        $this->rdbCualRepo->Name = 'Cual Cuadre de Caja ?';
        $this->rdbCualRepo->AddItem('Mi Cuadre de Caja de Hoy','H',true);
        $this->rdbCualRepo->AddItem('Otro Cuadre de Caja','O');
        $this->rdbCualRepo->Required = true;
        $this->rdbCualRepo->SelectedIndex = 0;
        $this->rdbCualRepo->AddAction(new QChangeEvent(), new QAjaxAction('rdbCuadRepo_Change'));
    }

    protected function calFechRepo_Create() {
        $this->calFechRepo = new QCalendar($this);
        $this->calFechRepo->Name = QApplication::Translate('Fecha');
        $this->calFechRepo->Required = true;
        $this->calFechRepo->Width = 100;
        $this->calFechRepo->Enabled = false;
        $this->calFechRepo->ForeColor = 'blue';
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

    protected function rdbCuadRepo_Change() {
        if ($this->rdbCualRepo->SelectedValue == 'H') {
            $this->calFechRepo->DateTime = new QDateTime(QDateTime::Now);
            $this->calFechRepo->Enabled = false;
            $this->calFechRepo->ForeColor = 'blue';
        } else {
            $this->calFechRepo->Enabled = true;
            $this->calFechRepo->ForeColor = null;
            $this->calFechRepo->DateTime = null;
        }
    }


    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $this->mensaje();
        //---------------------------------------------------------
        // Armo los otros vectores que requiere la rutina PDF
        //---------------------------------------------------------
        $arrEncaReco = array('Id','Fecha','Guia','Factura','Cliente','Maq. Fiscal','Monto Total','F. Pago','Documento','Banco','Mto. Pagado');
        $arrJustColu = array('C','C','C','C','L','C','R','C','L','L','R');
        $arrAnchColu = array(15,18,15,20,60,20,22,20,20,20,25);
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
                             f.fecha_impresion, 
                             g.nume_guia, 
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
		                       inner join guia g 
		                    on g.factura_id = f.id
		                 where f.estatus != 'A'
		                   and f.creada_por = ".$this->objUsuario->CodiUsua."
		                   and f.fecha_impresion = '".$this->calFechRepo->DateTime->__toString("YYMMDD")."'
		                 order by f.numero";
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
            $strFechImpr = $mixRegi['fecha_impresion'];
            if (strlen($strFechImpr)) {
                $strFechImpr = substr($strFechImpr,4,2)."/".substr($strFechImpr,2,2)."/".substr($strFechImpr,0,2);
            }
            $arrDatoRepo[] = array(
                $mixRegi['id'],
                $strFechImpr,
                $mixRegi['nume_guia'],
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
        $arrDatoRepo[] = array('','','','','','TOTALES',nf($decTotaFact),'','','',nf($decTotaPago));
        $arrDatoRepo[] = array('','','','','','','','','','','');
        $arrDatoRepo[] = array('','','','','','','','','','Resumen FP','');
        foreach ($this->arrFormPago as $strFormPago => $decMontPago) {
            if ($decMontPago > 0) {
                $arrDatoRepo[] = array('','','','','','','','','',$strFormPago,nf($decMontPago));
            }
        }

        $_SESSION['Dato'] = serialize($arrDatoRepo);

        $strTituRepo = 'Cuadre de Caja ('.$this->objUsuario->LogiUsua.'-'.$this->strSucuOrig.'-'.$this->strReceOrig.')';
        $pdf = new PDF('L','mm','Letter');
        $pdf->setVariables($arrEncaReco,$arrJustColu,$arrAnchColu,05,$this->strLogoComp);
        $pdf->setEmpresa($this->strNombEmpr,$this->strDireEmpr,$strTituRepo,'Receptoria','Sucursal');
        $pdf->SetTitle('Cuadre de Caja');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->FancyTable($arrEncaReco,$arrDatoRepo,$arrAnchColu,$arrJustColu);
        $pdf->Output();
    }

}
RepoCuadreDeCaja::Run('RepoCuadreDeCaja');
?>
