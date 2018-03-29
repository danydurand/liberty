<?php
//-----------------------------------------------------------------------------
// Programa      : auditoria_carga.php
// Realizado por : Juan Duran
// Fecha Elab.   : 25/02/2017
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class ImprimirManifiestoHe extends FormularioBaseKaizen {
    protected $objDataBase;

    protected $txtNumeCont;  // Número de Contenedor
    protected $txtListNume;  // Lista de Seriales

    protected $lstOperAbie;  // Combo de Operaciones Abiertas
    protected $lstTipoOper;
    protected $lstContMani;
    protected $lstTipoRepo;
    protected $calFechMani;

    protected $arrListNume;  // Arreglo que contiene los numeros de la lista
    protected $arrColuQury;
    protected $arrValoQury;

    protected $blnExisCont;
    protected $strCadeSqlx;

    protected $btnImprRepo;
    protected $btnImprExce;

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Imprimir Manifiesto');

        // Define the Wait Icon -- we need to remember to "RENDER" this wait icon, too!
        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->lstTipoOper_Create();
        $this->lstOperAbie_Create();
        $this->lstContMani_Create();
        $this->lstTipoRepo_Create();
        $this->calFechMani_Create();

        $this->btnImprRepo_Create();
        $this->btnImprExce_Create();

        $this->validarCampos();
    }

    //-----------------------------
    // Aqui se crean los objetos
    //-----------------------------

    protected function lstTipoOper_Create() {
        $this->lstTipoOper = new QListBox($this);
        $this->lstTipoOper->Name = QApplication::Translate("Tipo Operación/Ruta");
        $this->lstTipoOper->Width = 180;
        $this->lstTipoOper->Required = true;
        $this->lstTipoOper->AddItem(QApplication::Translate("- Seleccione Uno -"),null);
        foreach (SdeTipoOper::LoadAll() as $objTipoOper) {
            $this->lstTipoOper->AddItem($objTipoOper->__toString(),$objTipoOper->CodiTipo);
        }
        $this->lstTipoOper->AddAction(new QChangeEvent(), new QAjaxAction('lstTipoOper_Change'));
    }

    protected function lstOperAbie_Create() {
        $this->lstOperAbie = new QListBox($this);
        $this->lstOperAbie->Name = 'Operación';
        $this->lstOperAbie->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->lstOperAbie->Required = true;
        $this->lstOperAbie->Width = 220;
        $this->lstOperAbie->AddAction(new QChangeEvent(), new QServerAction('lstOperAbie_Change'));
    }

    protected function calFechMani_Create() {
        $this->calFechMani = new QCalendar($this);
        $this->calFechMani->Name = QApplication::Translate('Fecha Manifiesto/Hoja');
        $this->calFechMani->Width = 180;
        $this->calFechMani->AddAction(new QChangeEvent(), new QAjaxAction('calFechMani_Change'));
    }

    protected function lstTipoRepo_Create() {
        $this->lstTipoRepo = new QListBox($this);
        $this->lstTipoRepo->Name = QApplication::Translate('Tipo de Reporte');
        $this->lstTipoRepo->Required = true;
        $this->lstTipoRepo->Width = 180;
        $this->lstTipoRepo->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->lstTipoRepo->AddItem(QApplication::Translate('MANIFIESTO DE CARGA'),'M');
        $this->lstTipoRepo->AddItem(QApplication::Translate('HOJA DE ENTREGA'),'H');
        $this->lstTipoRepo->AddAction(new QChangeEvent(), new QAjaxAction('validarCampos'));
    }

    protected function lstContMani_Create() {
        $this->lstContMani = new QListBox($this);
        $this->lstContMani->Name = QApplication::Translate('Contenedor/Valijas');
        $this->lstContMani->Required = true;
        $this->lstContMani->Width = 180;
        $this->lstContMani->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->lstContMani->AddAction(new QChangeEvent(), new QAjaxAction('validarCampos'));
    }

    protected function btnImprRepo_Create() {
        $this->btnImprRepo = new QButtonI($this);
        $this->btnImprRepo->Text = TextoIcono('wpforms','Imprimir','F','fa-lg');
        $this->btnImprRepo->CausesValidation = true;
        $this->btnImprRepo->AddAction(new QClickEvent(), new QServerAction('Imprimir'));
    }

    protected function btnImprExce_Create() {
        $this->btnImprExce = new QButtonD($this);
        $this->btnImprExce->Text = TextoIcono('file-excel-o','Excel','F','fa-lg');
        $this->btnImprExce->CausesValidation = true;
        $this->btnImprExce->AddAction(new QClickEvent(), new QServerAction('Excel'));
//        $this->deshabilitarBoton();
    }

    //-----------------------------------
    // Acciones Asociadas a los Objetos
    //-----------------------------------

    protected function calFechMani_Change() {
        if (!is_null($this->calFechMani->DateTime)) {
            $this->lstContMani->RemoveAllItems();
            $intCodiOper = $this->lstOperAbie->SelectedValue;
            $calFechSele = $this->calFechMani->DateTime->__toString("YYYY-MM-DD");
            $intContMani = SdeContenedor::CountByCodiOperFecha($intCodiOper,$calFechSele);
            $this->lstContMani->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intContMani.')'),null);
            foreach (SdeContenedor::LoadArrayByCodiOperFecha($intCodiOper,$calFechSele) as $objContenedor) {
                $this->lstContMani->AddItem($objContenedor->NumeCont, $objContenedor->NumeCont);
            }
        }
    }

    protected function Imprimir() {
        $strManiImpr = $this->lstContMani->SelectedValue;
        $objContenedor = SdeContenedor::Load($strManiImpr);
        if ($this->lstTipoRepo->SelectedValue == 'M') {
            if ($objContenedor) {
                if (strlen($objContenedor->PlacaVehiculo) > 0) {
                    QApplication::Redirect('imprimir_manifiesto_nuevo.php?manifiesto='.$strManiImpr);
                } else {
                    QApplication::Redirect('imprimir_manifiesto.php?manifiesto='.$strManiImpr);
                }
            }
//            QApplication::Redirect('imprimir_manifiesto.php?manifiesto='.$strManiImpr);
        }
        if ($this->lstTipoRepo->SelectedValue == 'H') {
            if ($objContenedor) {
                if (strlen($objContenedor->PlacaVehiculo) > 0) {
                    QApplication::Redirect('imprimir_hoja_entrega_nueva.php?manifiesto='.$strManiImpr);
                } else {
                    QApplication::Redirect('imprimir_hoja_entrega.php?manifiesto='.$strManiImpr);
                }
            }
//            QApplication::Redirect('imprimir_hoja_entrega.php?manifiesto='.$strManiImpr);
        }
    }

    protected function Excel() {
        if ($this->lstTipoRepo->SelectedValue == 'M') {
            QApplication::Redirect('imprimir_manifiestoXls.php?manifiesto='.$this->lstContMani->SelectedValue);
        }
        if ($this->lstTipoRepo->SelectedValue == 'H') {
            QApplication::Redirect('imprimir_hoja_entregaXls.php?manifiesto='.$this->lstContMani->SelectedValue);
        }
    }

    protected function lstOperAbie_Change() {
        $this->lstContMani->RemoveAllItems();
        if (!is_null($this->lstOperAbie->SelectedValue)) {
            $dttFechDhoy   = FechaDeHoy();
            $dttFechMani   = SumaRestaDiasAFecha($dttFechDhoy,30,"-");
            $objClausula   = QQ::Clause();
            $objClausula[] = QQ::Equal(QQN::SdeContenedor()->CodiOper, $this->lstOperAbie->SelectedValue);
            $objClausula[] = QQ::GreaterOrEqual(QQN::SdeContenedor()->Fecha, $dttFechMani);
            $arrContOper   = SdeContenedor::QueryArray(QQ::AndCondition($objClausula),QQ::Clause(QQ::OrderBy(QQN::SdeContenedor()->Fecha,false)));
            $intContRegi   = count($arrContOper);
            $this->lstContMani->AddItem(QApplication::Translate('- Seleccione Uno - ('.$intContRegi.')'),null);
            foreach ($arrContOper as $objContenedor) {
                $this->lstContMani->AddItem($objContenedor->NumeCont." (".$objContenedor->Fecha->__toString("DD/MM/YYYY").")",$objContenedor->NumeCont);
            }
            $this->validarCampos();
        }
    }

    protected function lstTipoOper_Change() {
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
                $this->lstOperAbie->AddItem(substr($objOperacion->__toString(),0,60),$objOperacion->CodiOper);
            }
        }
        $this->lstOperAbie->Width = 280;
    }

    protected function validarCampos() {
        /*
        $intContCar1 = $this->lstOperAbie->SelectedValue;
        $intContCar2 = $this->lstContMani->SelectedValue;
        $intContCar3 = $this->lstTipoRepo->SelectedValue;
        if ($intContCar1 && $intContCar2 && $intContCar3) {
            $this->habilitarBoton();
        } else {
            $this->deshabilitarBoton();
        }
        */
        $this->mensaje();
    }

    protected function deshabilitarBoton() {
        $this->btnImprRepo->Enabled = false;
        $this->btnImprRepo->ForeColor = 'gray';
    }

    protected function habilitarBoton() {
        $this->btnImprRepo->Enabled = true;
        $this->btnImprRepo->ForeColor = 'white';
    }
}

ImprimirManifiestoHe::Run('ImprimirManifiestoHe');
?>