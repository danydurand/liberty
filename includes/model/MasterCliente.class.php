<?php
require(__MODEL_GEN__ . '/MasterClienteGen.class.php');

/**
 * The MasterCliente class defined here contains any
 * customized code for the MasterCliente class in the
 * Object Relational Model.  It represents the "master_cliente" table
 * in the database, and extends from the code generated abstract MasterClienteGen
 * class, which contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * @package My QCubed Application
 * @subpackage DataObjects
 *
 */
class MasterCliente extends MasterClienteGen {
    /**
     * Default "to string" handler
     * Allows pages to _p()/echo()/print() this object, and to define the default
     * way this object would be outputted.
     *
     * Can also be called directly via $objMasterCliente->__toString().
     *
     * @return string a nicely formatted string representation of this object
     */
    public function __toString() {
        return sprintf('%s',  $this->strNombClie);
    }

    public function __toStringConCodigoInterno() {
        return sprintf('%s - %s', $this->strCodigoInterno, $this->strNombClie);
    }

    public function _ranking() {
        $strCadeSqlx  = "select rnk ";
        $strCadeSqlx .= "  from v_ranking ";
        $strCadeSqlx .= " where id = ".$this->intCodiClie;
        $objDataBase  = $this::GetDatabase();
        $objDbResult  = $objDataBase->Query($strCadeSqlx);
        $mixRegistro  = $objDbResult->FetchArray();
        return !is_null($mixRegistro['rnk']) ? '(Top: '.$mixRegistro['rnk'].')' : null;
    }

    /*
    public function _ranking($strTipoRank=null) {
        $strNombVist = 'v_ranking';
        if (!is_null($strTipoRank)) {
            $strNombVist .= '_'.trim($strTipoRank);
        }
        $strCadeSqlx  = "select rnk ";
        $strCadeSqlx .= "  from $strNombVist ";
        $strCadeSqlx .= " where id = ".$this->intCodiClie;
        $objDataBase  = $this::GetDatabase();
        $objDbResult  = $objDataBase->Query($strCadeSqlx);
        $mixRegistro  = $objDbResult->FetchArray();
        return !is_null($mixRegistro['rnk']) ? '(Top: '.$mixRegistro['rnk'].')' : null;
    }
    */


    /**
     * Esta rutina devuelve algunos codigos de Clientes que no deben ser considerados
     * en los reportes estadisticos
     *
     * @return bool|string
     */
    public static function CodigosInternosParaExcluir() {
        $arrCodiExcl = ['IMP01'];
        return "'".implode("','",$arrCodiExcl)."'";
    }

    public function controlarSubCuentas($blnStatCuen) {
        $arrSubcClie = $this->subCuentas();
        foreach ($arrSubcClie as $intSubcIdxx) {
            $objSubcClie = MasterCliente::Load($intSubcIdxx);
            if ($objSubcClie) {
                $objSubcClie->CodiStat = $blnStatCuen;
                $objSubcClie->Save();
                $arrLogxCamb['strNombTabl'] = 'MasterCliente';
                $arrLogxCamb['intRefeRegi'] = $objSubcClie->CodiClie;
                $arrLogxCamb['strNombRegi'] = '('.$objSubcClie->CodigoInterno .') - '. $objSubcClie->NombClie;
                $arrLogxCamb['strDescCamb'] = 'Se cambi?? el status de la cuenta a: '.StatusType::ToString($blnStatCuen);
                $arrLogxCamb['blnCambDeli'] = true;
                LogDeCambios($arrLogxCamb);
            }
        }
    }

    public function tieneSubCuentas() {
        //---------------------------------------------------------
        // Esta funci??n devuelve "true" si el Cliente tiene una o
        // m??s subcuentas, o devuelve "false" en caso contrario.
        //---------------------------------------------------------
        $intSubxCuen = MasterCliente::CountByCodiDepe($this->CodiClie);
        if ($intSubxCuen > 0) {
            return true;
        }
        return false;
    }

    public function subCuentas() {
        $arrSubcMast = MasterCliente::LoadArrayByCodiDepe($this->CodiClie);
        $arrSubcClie = array();
        foreach ($arrSubcMast as $objSubcClie) {
            $arrSubcClie[] = $objSubcClie->CodiClie;
        }
        return $arrSubcClie;
    }

    public function tieneMsjYamaguchiAlerta() {
        //$blnTienMens = false;

        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::MensajeYamaguchi()->Tipo,'danger');
        $objClauWher[] = QQ::Equal(QQN::MensajeYamaguchi()->Codigos,$this->CodigoInterno);
        return MensajeYamaguchi::QueryCount(QQ::AndCondition($objClauWher));

        /*
        $objMensYama = MensajeYamaguchi::LoadMsjAlertByCodigoInterno($this->CodigoInterno);
        if ($objMensYama) {
            $blnTienMens = true;
        }
        return $blnTienMens;
        */
    }

    public function LoadMsjAlertByCodigoInterno() {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::MensajeYamaguchi()->Tipo,'danger');
        $objClauWher[] = QQ::Equal(QQN::MensajeYamaguchi()->Codigos,$this->CodigoInterno);
        return MensajeYamaguchi::QuerySingle(QQ::AndCondition($objClauWher));
    }


    public function getUltimaSubCuentaAsociada() {
        //-------------------------------------------------------------------------------------------
        // Se obtiene la Sub-Cuenta asociada a quien se le origin?? y/o asign?? el ??ltimo Correlativo.
        //-------------------------------------------------------------------------------------------
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::MasterCliente()->CodigoInterno,false);
        $objClauOrde[] = QQ::LimitInfo(1);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::MasterCliente()->CodiDepe,$this->intCodiClie);
        $arrSubxCuen = MasterCliente::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        return $arrSubxCuen[0];
    }

    public static function generarProxCodigo($intCodiDepe) {
        //-------------------------------------------------------------------
        // Se determina a qu?? tipo de Cliente se le crear?? o se le asignar??
        // el nuevo Correlativo, seg??n la Cuenta o Cliente del cual dependa.
        //-------------------------------------------------------------------
        if ($intCodiDepe != 4) {   // El Cliente 4 es LibertyExpress
            //---------------------------------------------------------------------------------------------------
            // En este caso, el Cliente a quien se le asignar?? el nuevo Correlativo, es una Sub-Cuenta o Filiar.
            //---------------------------------------------------------------------------------------------------
            $objClieDepe = MasterCliente::LoadByCodiClie($intCodiDepe);
            $intNumeCorr = 1;
            //------------------------------------------------------------------------------------------------------------------
            // Se verifica si el Cliente de quien depende, posee previamente una o m??s Sub-Cuentas Asociadas.
            //------------------------------------------------------------------------------------------------------------------
            if ($objClieDepe->tieneSubCuentas()) {
                $objSubxCuen = $objClieDepe->getUltimaSubCuentaAsociada();
                //-------------------------------------------------------------------------------------------
                // Si el Correlativo de la Sub-Cuenta obtenida, posee como separador un Gui??n(-), se obtiene
                // el Nro. de Contrato Original del Correlativo de la Sub-Cuenta, y se incrementa.
                //-------------------------------------------------------------------------------------------
                if (strrpos($objSubxCuen->CodigoInterno,'-')) {
                    $arrBloqCodi = explode('-',$objSubxCuen->CodigoInterno);
                    $intNumeCorr = $arrBloqCodi[1];
                    $intNumeCorr++;
                }
            }
            //--------------------------------------------------------------------------------------------------
            // Se arma o crea el Correlativo Oficial de Liberty, concatenando el Correlativo del CLiente M??ster
            // de quien depende, con el Nro. de Contrato Original incrementado o ajustado.
            //--------------------------------------------------------------------------------------------------
            $strProxCorr = $objClieDepe->CodigoInterno."-$intNumeCorr";
        } else {
            //-----------------------------------------------------------------------------------------------
            // En este caso, el Cliente a quien se le asignar?? el nuevo Correlativo, es un Cliente Gen??rico.
            //-----------------------------------------------------------------------------------------------
            $objParaGene = BuscarParametro('CorrGene','ClieMast','TODO');
            //---------------------------------------------------
            // Se Cargan los Valores del Par??metro en Variables.
            //---------------------------------------------------
            $strProxCorr = $objParaGene->ParaTxt1;
            $intNumeCorr = $objParaGene->ParaVal1;
            //-------------------------------------------------------------------------------------------------------
            // Se incrementa el n??mero Correlativo y luego se le concatena al Valor del String que contiene el "CR".
            //-------------------------------------------------------------------------------------------------------
            $intNumeCorr  = $intNumeCorr + 1;
            $strProxCorr .= $intNumeCorr;
            //--------------------------------------------------------------------------------------------------
            // El n??mero Correlativo inrementado es asignado al par??metro y se guarda para actualizar el mismo.
            //--------------------------------------------------------------------------------------------------
            $objParaGene->ParaVal1 = $intNumeCorr;
            $objParaGene->Save();
        }
        //-----------------------------------------------------
        // Finalmente, se retorna el nuevo Correlativo creado.
        //-----------------------------------------------------
        return $strProxCorr;
    }

    // Override or Create New Load/Count methods
    // (For obvious reasons, these methods are commented out...
    // but feel free to use these as a starting point)
    /*
        public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
            // This will return an array of MasterCliente objects
            return MasterCliente::QueryArray(
                QQ::AndCondition(
                    QQ::Equal(QQN::MasterCliente()->Param1, $strParam1),
                    QQ::GreaterThan(QQN::MasterCliente()->Param2, $intParam2)
                ),
                $objOptionalClauses
            );
        }

        public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
            // This will return a single MasterCliente object
            return MasterCliente::QuerySingle(
                QQ::AndCondition(
                    QQ::Equal(QQN::MasterCliente()->Param1, $strParam1),
                    QQ::GreaterThan(QQN::MasterCliente()->Param2, $intParam2)
                ),
                $objOptionalClauses
            );
        }

        public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
            // This will return a count of MasterCliente objects
            return MasterCliente::QueryCount(
                QQ::AndCondition(
                    QQ::Equal(QQN::MasterCliente()->Param1, $strParam1),
                    QQ::Equal(QQN::MasterCliente()->Param2, $intParam2)
                ),
                $objOptionalClauses
            );
        }

        public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
            // Performing the load manually (instead of using QCubed Query)

            // Get the Database Object for this Class
            $objDatabase = MasterCliente::GetDatabase();

            // Properly Escape All Input Parameters using Database->SqlVariable()
            $strParam1 = $objDatabase->SqlVariable($strParam1);
            $intParam2 = $objDatabase->SqlVariable($intParam2);

            // Setup the SQL Query
            $strQuery = sprintf('
                SELECT
                    `master_cliente`.*
                FROM
                    `master_cliente` AS `master_cliente`
                WHERE
                    param_1 = %s AND
                    param_2 < %s',
                $strParam1, $intParam2);

            // Perform the Query and Instantiate the Result
            $objDbResult = $objDatabase->Query($strQuery);
            return MasterCliente::InstantiateDbResult($objDbResult);
        }
    */

    // Override or Create New Properties and Variables
    // For performance reasons, these variables and __set and __get override methods
    // are commented out.  But if you wish to implement or override any
    // of the data generated properties, please feel free to uncomment them.
    /*
        protected $strSomeNewProperty;

        public function __get($strName) {
            switch ($strName) {
                case 'SomeNewProperty': return $this->strSomeNewProperty;

                default:
                    try {
                        return parent::__get($strName);
                    } catch (QCallerException $objExc) {
                        $objExc->IncrementOffset();
                        throw $objExc;
                    }
            }
        }

        public function __set($strName, $mixValue) {
            switch ($strName) {
                case 'SomeNewProperty':
                    try {
                        return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
                    } catch (QInvalidCastException $objExc) {
                        $objExc->IncrementOffset();
                        throw $objExc;
                    }

                default:
                    try {
                        return (parent::__set($strName, $mixValue));
                    } catch (QCallerException $objExc) {
                        $objExc->IncrementOffset();
                        throw $objExc;
                    }
            }
        }
    */

    // Initialize each property with default values from database definition
    /*
        public function __construct()
        {
            $this->Initialize();
        }
    */
}
?>