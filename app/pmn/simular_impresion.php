<?php
//---------------------------------------------------------------------------------------------------------
// Programa       : simular_impresion.php
// Realizado por  : Irán Anzola
// Fecha Elab.    : 04/08/16 11:33 AM
// Proyecto       : newliberty
// Descripcion    : Este programa simula la emisión de una factura o nota de crédito, asignando a la misma
//                  una data fiscal ficticia
//---------------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class SimularImpresion extends FormularioBaseKaizen {
    //---------------------------
    // Parámetros de información
    //---------------------------
    protected $rdbTipoDocu;
    protected $txtNumeDocu;
    protected $txtDocuFisc;
    protected $txtMaquFisc;
    protected $txtFechImpr;
    protected $txtHoraImpr;

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Simular Impresion Fiscal';

        $this->rdbTipoDocu_Create();
        $this->txtNumeDocu_Create();
        $this->txtDocuFisc_Create();
        $this->txtMaquFisc_Create();
        $this->txtFechImpr_Create();
        $this->txtHoraImpr_Create();

        $this->btnSave->Text = TextoIcono('cogs','Guardar','F','lg');
    }

    //-----------------------------
    // Construcción de los objetos
    //-----------------------------

    protected function rdbTipoDocu_Create() {
        $this->rdbTipoDocu = new QRadioButtonList($this);
        $this->rdbTipoDocu->Name = QApplication::Translate('Tipo Documento');
        $this->rdbTipoDocu->AddItem('&nbsp;Factura&nbsp;','F');
        $this->rdbTipoDocu->AddItem('&nbsp;Nota de Crédito','N');
        $this->rdbTipoDocu->HtmlEntities = false;
        $this->rdbTipoDocu->Required = true;
        $this->rdbTipoDocu->RepeatColumns = 2;
        $this->rdbTipoDocu->AddAction(new QChangeEvent(), new QAjaxAction('rdbTipoDocu_Change'));
    }

    protected function txtNumeDocu_Create() {
        $this->txtNumeDocu = new QIntegerTextBox($this);
        $this->txtNumeDocu->Name = 'Id Documento';
        $this->txtNumeDocu->Width = 60;
        $this->txtNumeDocu->Required = true;
    }

    protected function txtDocuFisc_Create() {
        $this->txtDocuFisc = new QIntegerTextBox($this);
        $this->txtDocuFisc->Name = 'Doc. Fiscal';
        $this->txtDocuFisc->Width = 100;
        $this->txtDocuFisc->Required = true;
        $this->txtDocuFisc->Enabled = false;
        $this->txtDocuFisc->ForeColor = 'blue';
    }

    protected function txtMaquFisc_Create() {
        $this->txtMaquFisc = new QTextBox($this);
        $this->txtMaquFisc->Name = 'Maquina Fiscal';
        $this->txtMaquFisc->Width = 100;
        $this->txtMaquFisc->Required = true;
        $this->txtMaquFisc->Enabled = false;
        $this->txtMaquFisc->ForeColor = 'blue';
    }

    protected function txtFechImpr_Create() {
        $this->txtFechImpr = new QTextBox($this);
        $this->txtFechImpr->Name = 'Fecha Impresion';
        $this->txtFechImpr->Text = date('ymd');
        $this->txtFechImpr->Width = 100;
        $this->txtFechImpr->Required = true;
        $this->txtFechImpr->Enabled = false;
        $this->txtFechImpr->ForeColor = 'blue';
    }

    protected function txtHoraImpr_Create() {
        $this->txtHoraImpr = new QTextBox($this);
        $this->txtHoraImpr->Name = 'Hora Impresion';
        $this->txtHoraImpr->Text = date('His');
        $this->txtHoraImpr->Width = 100;
        $this->txtHoraImpr->Required = true;
        $this->txtHoraImpr->Enabled = false;
        $this->txtHoraImpr->ForeColor = 'blue';
    }

    //----------------------------------
    // Acciones asociadas a los objetos
    //----------------------------------

    protected function rdbTipoDocu_Change() {
        $this->mensaje();
        $strCadeSqlx = 'select numero + 1 as nume_fisc,
   		                       maquina_fiscal as maqu_fisc
                           from nota_credito
                          where numero = (select max(numero)
                                            from nota_credito
                                           where length(numero) > 1)';
        $objDataBase = NotaCredito::GetDatabase();
        $objDbResult = $objDataBase->Query($strCadeSqlx);
        $mixRegistro = $objDbResult->FetchArray();
        if ($mixRegistro) {
            $this->txtDocuFisc->Text = '00'.$mixRegistro['nume_fisc'];
            $this->txtMaquFisc->Text = $mixRegistro['maqu_fisc'] ? $mixRegistro['maqu_fisc'] : 'EOB0019164';
        } else {
            $this->txtDocuFisc->Text = '0010000';
            $this->txtMaquFisc->Text = 'EOB0019164';
        }
        $this->txtNumeDocu->Text = '';
        $this->txtFechImpr->Text = date('ymd');
        $this->txtHoraImpr->Text = date('His');
    }

    protected function btnSave_Click() {
        $blnTodoOkey = true;
        if ($this->rdbTipoDocu->SelectedValue == 'F') {
            $objFactPmnx = FacturaPmn::Load($this->txtNumeDocu->Text);
            if ($objFactPmnx) {
                if ($objFactPmnx->ImpresaId == SinoType::SI) {
                    $this->mensaje('La Factura ya fue impresa previamente','','d','',__iEXCL__);
                    $blnTodoOkey = false;
                }
                if ($blnTodoOkey) {
                    if ($objFactPmnx->MontoCobrado == 0 && !$objFactPmnx->GuiaCODdelSDE()) {
                        if ($objFactPmnx->TieneRetencion == SinoType::NO) {
                            $this->mensaje('Factura Sin Retencion, Pendiente de Pago','','d','',__iEXCL__);
                            $blnTodoOkey = false;
                        }
                    } else {
                        if ($objFactPmnx->MontoCobrado != $objFactPmnx->MontoTotal) {
                            if ($objFactPmnx->MontoCobrado == null && $objFactPmnx->GuiaCODdelSDE()){
                                $blnTodoOkey = true;
                            } else {
                                $this->mensaje('Factura Pendiente de Pago','','d','',__iEXCL__);
                                $blnTodoOkey = false;
                            }
                        }
                    }
                }
                if ($blnTodoOkey) {
                    $objFactPmnx->Numero = $this->txtDocuFisc->Text;
                    $objFactPmnx->MaquinaFiscal = $this->txtMaquFisc->Text;
                    $objFactPmnx->FechaImpresion = $this->txtFechImpr->Text;
                    $objFactPmnx->HoraImpresion = $this->txtHoraImpr->Text;
                    $objFactPmnx->ImpresaId = SinoType::SI;
                    $objFactPmnx->Save();

                    $this->mensaje('Transacción Exitosa !','','s','',__iCHEC__);
                    $this->blanquearCampos();
                }
            } else {
                $this->mensaje('La Factura No Existe','','d','',__iHAND__);
            }
        } else {
            $objNotaCred = NotaCredito::Load($this->txtNumeDocu->Text);
            if ($objNotaCred) {
                if ($objNotaCred->ImpresaId == SinoType::SI) {
                    $this->mensaje('La NDC ya fue Impresa Previamente','','d','',__iEXCL__);
                    $blnTodoOkey = false;
                }
                if ($blnTodoOkey) {
                    $objNotaCred->Numero = $this->txtDocuFisc->Text;
                    $objNotaCred->MaquinaFiscal = $this->txtMaquFisc->Text;
                    $objNotaCred->FechaImpresion = new QDateTime($this->txtFechImpr->Text);
                    $objNotaCred->HoraImpresion = $this->txtHoraImpr->Text;
                    $objNotaCred->ImpresaId = SinoType::SI;
                    $objNotaCred->Save();

                    $objFactPmnx = FacturaPmn::Load($objNotaCred->FacturaId);
                    //-----------------------
                    // Se Anula la Factura
                    //-----------------------
                    $arrParaAnul['MotiAnul'] = $objNotaCred->Concepto;
                    $arrParaAnul['UsuaAnul'] = $this->objUsuario->CodiUsua;
                    $objFactPmnx->AnularFactura($arrParaAnul);

                    $this->mensaje('Transacción Exitosa !','','s','',__iCHEC__);
                    $this->blanquearCampos();
                }
            } else {
                $this->mensaje('La Nota de Crédito No Existe','','d','',__iHAND__);
            }
        }
    }

    //------------------------------
    // Otras funciones del programa
    //------------------------------

    protected function blanquearCampos() {
        $this->rdbTipoDocu->SelectedValue = null;
        $this->txtNumeDocu->Text = '';
        $this->txtDocuFisc->Text = '';
        $this->txtMaquFisc->Text = '';
    }
}

SimularImpresion::Run('SimularImpresion');