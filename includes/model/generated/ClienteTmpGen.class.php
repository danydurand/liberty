<?php
	/**
	 * The abstract ClienteTmpGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ClienteTmp subclass which
	 * extends this ClienteTmpGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ClienteTmp class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $CodigoContrato the value for strCodigoContrato (Unique)
	 * @property string $Nombre Nombre/R. Social::Nombre o Razon social del Cliente
 (Not Null)
	 * @property string $Rif C�dula/RIF:: C�dula o RIF del Cliente. 
	 * @property string $Direccion Direcci�n::Direcci�n Fiscal del Cliente (Not Null)
	 * @property string $DirEntregaFactura Dir Entrega Factura::Direcci�n Entrega de Factura del Cliente 
	 * @property string $Sucursal Sucursal::Sucursal o Sede donde se ubica el Cliente (Not Null)
	 * @property string $PersCona Persona Contacto::Nombre de la Persona de contacto (Not Null)
	 * @property string $TeleCona Tel�fono Contacto::N�mero de Tel�fono de la Persona de Contacto (Not Null)
	 * @property string $Email EMail::Direcci�n de correo del Cliente (Unique)
	 * @property integer $MasterId Cliente Master::Cliente Padre a quien est� relacionado 
	 * @property QDateTime $FechCarg Fecha Carga::Fecha de la carga del registro (Not Null)
	 * @property QDateTime $HoraCarg Hora Carga::Hora de carga del registro (Not Null)
	 * @property string $OtraSucursal the value for strOtraSucursal 
	 * @property string $Observacion the value for strObservacion 
	 * @property boolean $Ajustar the value for blnAjustar 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ClienteTmpGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column cliente_tmp.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_tmp.codigo_contrato
		 * @var string strCodigoContrato
		 */
		protected $strCodigoContrato;
		const CodigoContratoMaxLength = 50;
		const CodigoContratoDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_tmp.nombre
		 * Nombre/R. Social::Nombre o Razon social del Cliente
		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 100;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_tmp.rif
		 * C�dula/RIF:: C�dula o RIF del Cliente.		 * @var string strRif
		 */
		protected $strRif;
		const RifMaxLength = 15;
		const RifDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_tmp.direccion
		 * Direcci�n::Direcci�n Fiscal del Cliente		 * @var string strDireccion
		 */
		protected $strDireccion;
		const DireccionMaxLength = 250;
		const DireccionDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_tmp.dir_entrega_factura
		 * Dir Entrega Factura::Direcci�n Entrega de Factura del Cliente		 * @var string strDirEntregaFactura
		 */
		protected $strDirEntregaFactura;
		const DirEntregaFacturaMaxLength = 250;
		const DirEntregaFacturaDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_tmp.sucursal
		 * Sucursal::Sucursal o Sede donde se ubica el Cliente		 * @var string strSucursal
		 */
		protected $strSucursal;
		const SucursalMaxLength = 4;
		const SucursalDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_tmp.pers_cona
		 * Persona Contacto::Nombre de la Persona de contacto		 * @var string strPersCona
		 */
		protected $strPersCona;
		const PersConaMaxLength = 50;
		const PersConaDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_tmp.tele_cona
		 * Tel�fono Contacto::N�mero de Tel�fono de la Persona de Contacto		 * @var string strTeleCona
		 */
		protected $strTeleCona;
		const TeleConaMaxLength = 50;
		const TeleConaDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_tmp.email
		 * EMail::Direcci�n de correo del Cliente		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 50;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_tmp.master_id
		 * Cliente Master::Cliente Padre a quien est� relacionado		 * @var integer intMasterId
		 */
		protected $intMasterId;
		const MasterIdDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_tmp.fech_carg
		 * Fecha Carga::Fecha de la carga del registro		 * @var QDateTime dttFechCarg
		 */
		protected $dttFechCarg;
		const FechCargDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_tmp.hora_carg
		 * Hora Carga::Hora de carga del registro		 * @var QDateTime dttHoraCarg
		 */
		protected $dttHoraCarg;
		const HoraCargDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_tmp.otra_sucursal
		 * @var string strOtraSucursal
		 */
		protected $strOtraSucursal;
		const OtraSucursalMaxLength = 50;
		const OtraSucursalDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_tmp.observacion
		 * @var string strObservacion
		 */
		protected $strObservacion;
		const ObservacionMaxLength = 400;
		const ObservacionDefault = null;


		/**
		 * Protected member variable that maps to the database column cliente_tmp.ajustar
		 * @var boolean blnAjustar
		 */
		protected $blnAjustar;
		const AjustarDefault = null;


		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = ClienteTmp::IdDefault;
			$this->strCodigoContrato = ClienteTmp::CodigoContratoDefault;
			$this->strNombre = ClienteTmp::NombreDefault;
			$this->strRif = ClienteTmp::RifDefault;
			$this->strDireccion = ClienteTmp::DireccionDefault;
			$this->strDirEntregaFactura = ClienteTmp::DirEntregaFacturaDefault;
			$this->strSucursal = ClienteTmp::SucursalDefault;
			$this->strPersCona = ClienteTmp::PersConaDefault;
			$this->strTeleCona = ClienteTmp::TeleConaDefault;
			$this->strEmail = ClienteTmp::EmailDefault;
			$this->intMasterId = ClienteTmp::MasterIdDefault;
			$this->dttFechCarg = (ClienteTmp::FechCargDefault === null)?null:new QDateTime(ClienteTmp::FechCargDefault);
			$this->dttHoraCarg = (ClienteTmp::HoraCargDefault === null)?null:new QDateTime(ClienteTmp::HoraCargDefault);
			$this->strOtraSucursal = ClienteTmp::OtraSucursalDefault;
			$this->strObservacion = ClienteTmp::ObservacionDefault;
			$this->blnAjustar = ClienteTmp::AjustarDefault;
		}


		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a ClienteTmp from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteTmp
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ClienteTmp', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = ClienteTmp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ClienteTmp()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all ClienteTmps
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteTmp[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call ClienteTmp::QueryArray to perform the LoadAll query
			try {
				return ClienteTmp::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ClienteTmps
		 * @return int
		 */
		public static function CountAll() {
			// Call ClienteTmp::QueryCount to perform the CountAll query
			return ClienteTmp::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCUBED QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcubed Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = ClienteTmp::GetDatabase();

			// Create/Build out the QueryBuilder object with ClienteTmp-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'cliente_tmp');

			$blnAddAllFieldsToSelect = true;
			if ($objDatabase->OnlyFullGroupBy) {
				// see if we have any group by or aggregation clauses, if yes, don't add the fields to select clause
				if ($objOptionalClauses instanceof QQClause) {
					if ($objOptionalClauses instanceof QQAggregationClause || $objOptionalClauses instanceof QQGroupBy) {
						$blnAddAllFieldsToSelect = false;
					}
				} else if (is_array($objOptionalClauses)) {
					foreach ($objOptionalClauses as $objClause) {
						if ($objClause instanceof QQAggregationClause || $objClause instanceof QQGroupBy) {
							$blnAddAllFieldsToSelect = false;
							break;
						}
					}
				}
			}
			if ($blnAddAllFieldsToSelect) {
				ClienteTmp::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('cliente_tmp');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcubed Query method to query for a single ClienteTmp object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClienteTmp the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClienteTmp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new ClienteTmp object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ClienteTmp::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if(null === $objDbRow)
					return null;
				return ClienteTmp::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of ClienteTmp objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ClienteTmp[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClienteTmp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ClienteTmp::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = ClienteTmp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcubed Query method to query for a count of ClienteTmp objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ClienteTmp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause) {
					if ($objOptionalClauses instanceof QQGroupBy) {
						$blnGrouped = true;
					}
				} else if (is_array($objOptionalClauses)) {
					foreach ($objOptionalClauses as $objClause) {
						if ($objClause instanceof QQGroupBy) {
							$blnGrouped = true;
							break;
						}
					}
				} else {
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

		public static function QueryArrayCached(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ClienteTmp::GetDatabase();

			$strQuery = ClienteTmp::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/clientetmp', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = ClienteTmp::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ClienteTmp
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'cliente_tmp';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'codigo_contrato', $strAliasPrefix . 'codigo_contrato');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'rif', $strAliasPrefix . 'rif');
			    $objBuilder->AddSelectItem($strTableName, 'direccion', $strAliasPrefix . 'direccion');
			    $objBuilder->AddSelectItem($strTableName, 'dir_entrega_factura', $strAliasPrefix . 'dir_entrega_factura');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal', $strAliasPrefix . 'sucursal');
			    $objBuilder->AddSelectItem($strTableName, 'pers_cona', $strAliasPrefix . 'pers_cona');
			    $objBuilder->AddSelectItem($strTableName, 'tele_cona', $strAliasPrefix . 'tele_cona');
			    $objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			    $objBuilder->AddSelectItem($strTableName, 'master_id', $strAliasPrefix . 'master_id');
			    $objBuilder->AddSelectItem($strTableName, 'fech_carg', $strAliasPrefix . 'fech_carg');
			    $objBuilder->AddSelectItem($strTableName, 'hora_carg', $strAliasPrefix . 'hora_carg');
			    $objBuilder->AddSelectItem($strTableName, 'otra_sucursal', $strAliasPrefix . 'otra_sucursal');
			    $objBuilder->AddSelectItem($strTableName, 'observacion', $strAliasPrefix . 'observacion');
			    $objBuilder->AddSelectItem($strTableName, 'ajustar', $strAliasPrefix . 'ajustar');
            }
		}



		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Do a possible array expansion on the given node. If the node is an ExpandAsArray node,
		 * it will add to the corresponding array in the object. Otherwise, it will follow the node
		 * so that any leaf expansions can be handled.
		 *  
		 * @param DatabaseRowBase $objDbRow
		 * @param QQBaseNode $objChildNode
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 */
		
		public static function ExpandArray ($objDbRow, $strAliasPrefix, $objNode, $objPreviousItemArray, $strColumnAliasArray) {
			if (!$objNode->ChildNodeArray) {
				return false;
			}
			
			$strAlias = $strAliasPrefix . 'id';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intId != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
					continue;
				}
				
				foreach ($objNode->ChildNodeArray as $objChildNode) {	
					$strPropName = $objChildNode->_PropertyName;
					$strClassName = $objChildNode->_ClassName;
					$blnExpanded = false;
					$strLongAlias = $objChildNode->ExtendedAlias();
				
					if ($objChildNode->ExpandAsArray) {
						$strVarName = '_obj' . $strPropName . 'Array';
						if (null === $objPreviousItem->$strVarName) {
							$objPreviousItem->$strVarName = array();
						}
						if ($intPreviousChildItemCount = count($objPreviousItem->$strVarName)) {
							$objPreviousChildItems = $objPreviousItem->$strVarName;
							if ($objChildNode->_Type == "association") {
								$objChildNode = $objChildNode->FirstChild();
							}
							$nextAlias = $objChildNode->ExtendedAlias() . '__';
							
							$objChildItem = call_user_func(array ($strClassName, 'InstantiateDbRow'), $objDbRow, $nextAlias, $objChildNode, $objPreviousChildItems, $strColumnAliasArray);
							if ($objChildItem) {
								$objPreviousItem->{$strVarName}[] = $objChildItem;
								$blnExpanded = true;
							} elseif ($objChildItem === false) {
								$blnExpanded = true;
							}
						}
					} else {
	
						// Follow single node if keys match
						$nodeType = $objChildNode->_Type;
						if ($nodeType == 'reverse_reference' || $nodeType == 'association') {
							$strVarName = '_obj' . $strPropName;
						} else {	
							$strVarName = 'obj' . $strPropName;
						}
						
						if (null === $objPreviousItem->$strVarName) {
							return false;
						}
											
						$objPreviousChildItems = array($objPreviousItem->$strVarName);
						$blnResult = call_user_func(array ($strClassName, 'ExpandArray'), $objDbRow, $strLongAlias . '__', $objChildNode, $objPreviousChildItems, $strColumnAliasArray);
		
						if ($blnResult) {
							$blnExpanded = true;
						}		
					}
				}	
			}
			return $blnExpanded;
		}
		
		/**
		 * Instantiate a ClienteTmp from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ClienteTmp::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a ClienteTmp, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['id']) ? $strColumnAliasArray['id'] : 'id';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			

			// Create a new instance of the ClienteTmp object
			$objToReturn = new ClienteTmp();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codigo_contrato';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodigoContrato = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'rif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strRif = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'direccion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'dir_entrega_factura';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDirEntregaFactura = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'sucursal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSucursal = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'pers_cona';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPersCona = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tele_cona';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTeleCona = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'email';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'master_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intMasterId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fech_carg';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechCarg = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_carg';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttHoraCarg = $objDbRow->GetColumn($strAliasName, 'Time');
			$strAlias = $strAliasPrefix . 'otra_sucursal';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strOtraSucursal = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'observacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strObservacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ajustar';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnAjustar = $objDbRow->GetColumn($strAliasName, 'Bit');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->Id != $objPreviousItem->Id) {
						continue;
					}
					// this is a duplicate leaf in a complex join
					return null; // indicates no object created and the db row has not been used
				}
			}
			
			// Instantiate Virtual Attributes
			$strVirtualPrefix = $strAliasPrefix . '__';
			$strVirtualPrefixLength = strlen($strVirtualPrefix);
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				if (strncmp($strColumnName, $strVirtualPrefix, $strVirtualPrefixLength) == 0)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}


			// Prepare to Check for Early/Virtual Binding

			$objExpansionAliasArray = array();
			if ($objExpandAsArrayNode) {
				$objExpansionAliasArray = $objExpandAsArrayNode->ChildNodeArray;
			}

			if (!$strAliasPrefix)
				$strAliasPrefix = 'cliente_tmp__';


				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of ClienteTmps from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return ClienteTmp[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $objExpandAsArrayNode = null, $strColumnAliasArray = null) {
			$objToReturn = array();

			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($objExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ClienteTmp::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ClienteTmp::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single ClienteTmp object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ClienteTmp next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions
			$objExpandAsArrayNode = $objDbResult->QueryBuilder->ExpandAsArrayNode;
			if (!empty ($objExpandAsArrayNode)) {
				throw new QCallerException ("Cannot use InstantiateCursor with ExpandAsArray");
			}

			// Load up the return result with a row and return it
			return ClienteTmp::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single ClienteTmp object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteTmp
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ClienteTmp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ClienteTmp()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single ClienteTmp object,
		 * by CodigoContrato Index(es)
		 * @param string $strCodigoContrato
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteTmp
		*/
		public static function LoadByCodigoContrato($strCodigoContrato, $objOptionalClauses = null) {
			return ClienteTmp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ClienteTmp()->CodigoContrato, $strCodigoContrato)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single ClienteTmp object,
		 * by Email Index(es)
		 * @param string $strEmail
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteTmp
		*/
		public static function LoadByEmail($strEmail, $objOptionalClauses = null) {
			return ClienteTmp::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::ClienteTmp()->Email, $strEmail)
				),
				$objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this ClienteTmp
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ClienteTmp::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `cliente_tmp` (
							`codigo_contrato`,
							`nombre`,
							`rif`,
							`direccion`,
							`dir_entrega_factura`,
							`sucursal`,
							`pers_cona`,
							`tele_cona`,
							`email`,
							`master_id`,
							`fech_carg`,
							`hora_carg`,
							`otra_sucursal`,
							`observacion`,
							`ajustar`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strCodigoContrato) . ',
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->strRif) . ',
							' . $objDatabase->SqlVariable($this->strDireccion) . ',
							' . $objDatabase->SqlVariable($this->strDirEntregaFactura) . ',
							' . $objDatabase->SqlVariable($this->strSucursal) . ',
							' . $objDatabase->SqlVariable($this->strPersCona) . ',
							' . $objDatabase->SqlVariable($this->strTeleCona) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->intMasterId) . ',
							' . $objDatabase->SqlVariable($this->dttFechCarg) . ',
							' . $objDatabase->SqlVariable($this->dttHoraCarg) . ',
							' . $objDatabase->SqlVariable($this->strOtraSucursal) . ',
							' . $objDatabase->SqlVariable($this->strObservacion) . ',
							' . $objDatabase->SqlVariable($this->blnAjustar) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('cliente_tmp', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`cliente_tmp`
						SET
							`codigo_contrato` = ' . $objDatabase->SqlVariable($this->strCodigoContrato) . ',
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`rif` = ' . $objDatabase->SqlVariable($this->strRif) . ',
							`direccion` = ' . $objDatabase->SqlVariable($this->strDireccion) . ',
							`dir_entrega_factura` = ' . $objDatabase->SqlVariable($this->strDirEntregaFactura) . ',
							`sucursal` = ' . $objDatabase->SqlVariable($this->strSucursal) . ',
							`pers_cona` = ' . $objDatabase->SqlVariable($this->strPersCona) . ',
							`tele_cona` = ' . $objDatabase->SqlVariable($this->strTeleCona) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`master_id` = ' . $objDatabase->SqlVariable($this->intMasterId) . ',
							`fech_carg` = ' . $objDatabase->SqlVariable($this->dttFechCarg) . ',
							`hora_carg` = ' . $objDatabase->SqlVariable($this->dttHoraCarg) . ',
							`otra_sucursal` = ' . $objDatabase->SqlVariable($this->strOtraSucursal) . ',
							`observacion` = ' . $objDatabase->SqlVariable($this->strObservacion) . ',
							`ajustar` = ' . $objDatabase->SqlVariable($this->blnAjustar) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this ClienteTmp
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ClienteTmp with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ClienteTmp::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_tmp`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this ClienteTmp ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'ClienteTmp', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all ClienteTmps
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ClienteTmp::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_tmp`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate cliente_tmp table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ClienteTmp::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `cliente_tmp`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this ClienteTmp from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ClienteTmp object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = ClienteTmp::Load($this->intId);

			// Update $this's local variables to match
			$this->strCodigoContrato = $objReloaded->strCodigoContrato;
			$this->strNombre = $objReloaded->strNombre;
			$this->strRif = $objReloaded->strRif;
			$this->strDireccion = $objReloaded->strDireccion;
			$this->strDirEntregaFactura = $objReloaded->strDirEntregaFactura;
			$this->strSucursal = $objReloaded->strSucursal;
			$this->strPersCona = $objReloaded->strPersCona;
			$this->strTeleCona = $objReloaded->strTeleCona;
			$this->strEmail = $objReloaded->strEmail;
			$this->intMasterId = $objReloaded->intMasterId;
			$this->dttFechCarg = $objReloaded->dttFechCarg;
			$this->dttHoraCarg = $objReloaded->dttHoraCarg;
			$this->strOtraSucursal = $objReloaded->strOtraSucursal;
			$this->strObservacion = $objReloaded->strObservacion;
			$this->blnAjustar = $objReloaded->blnAjustar;
		}



		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Id':
					/**
					 * Gets the value for intId (Read-Only PK)
					 * @return integer
					 */
					return $this->intId;

				case 'CodigoContrato':
					/**
					 * Gets the value for strCodigoContrato (Unique)
					 * @return string
					 */
					return $this->strCodigoContrato;

				case 'Nombre':
					/**
					 * Gets the value for strNombre (Not Null)
					 * @return string
					 */
					return $this->strNombre;

				case 'Rif':
					/**
					 * Gets the value for strRif 
					 * @return string
					 */
					return $this->strRif;

				case 'Direccion':
					/**
					 * Gets the value for strDireccion (Not Null)
					 * @return string
					 */
					return $this->strDireccion;

				case 'DirEntregaFactura':
					/**
					 * Gets the value for strDirEntregaFactura 
					 * @return string
					 */
					return $this->strDirEntregaFactura;

				case 'Sucursal':
					/**
					 * Gets the value for strSucursal (Not Null)
					 * @return string
					 */
					return $this->strSucursal;

				case 'PersCona':
					/**
					 * Gets the value for strPersCona (Not Null)
					 * @return string
					 */
					return $this->strPersCona;

				case 'TeleCona':
					/**
					 * Gets the value for strTeleCona (Not Null)
					 * @return string
					 */
					return $this->strTeleCona;

				case 'Email':
					/**
					 * Gets the value for strEmail (Unique)
					 * @return string
					 */
					return $this->strEmail;

				case 'MasterId':
					/**
					 * Gets the value for intMasterId 
					 * @return integer
					 */
					return $this->intMasterId;

				case 'FechCarg':
					/**
					 * Gets the value for dttFechCarg (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechCarg;

				case 'HoraCarg':
					/**
					 * Gets the value for dttHoraCarg (Not Null)
					 * @return QDateTime
					 */
					return $this->dttHoraCarg;

				case 'OtraSucursal':
					/**
					 * Gets the value for strOtraSucursal 
					 * @return string
					 */
					return $this->strOtraSucursal;

				case 'Observacion':
					/**
					 * Gets the value for strObservacion 
					 * @return string
					 */
					return $this->strObservacion;

				case 'Ajustar':
					/**
					 * Gets the value for blnAjustar 
					 * @return boolean
					 */
					return $this->blnAjustar;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////


				case '__Restored':
					return $this->__blnRestored;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

				/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'CodigoContrato':
					/**
					 * Sets the value for strCodigoContrato (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodigoContrato = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Nombre':
					/**
					 * Sets the value for strNombre (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombre = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Rif':
					/**
					 * Sets the value for strRif 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strRif = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Direccion':
					/**
					 * Sets the value for strDireccion (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DirEntregaFactura':
					/**
					 * Sets the value for strDirEntregaFactura 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDirEntregaFactura = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Sucursal':
					/**
					 * Sets the value for strSucursal (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSucursal = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PersCona':
					/**
					 * Sets the value for strPersCona (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPersCona = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TeleCona':
					/**
					 * Sets the value for strTeleCona (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTeleCona = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					/**
					 * Sets the value for strEmail (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MasterId':
					/**
					 * Sets the value for intMasterId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intMasterId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechCarg':
					/**
					 * Sets the value for dttFechCarg (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechCarg = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraCarg':
					/**
					 * Sets the value for dttHoraCarg (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttHoraCarg = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OtraSucursal':
					/**
					 * Sets the value for strOtraSucursal 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strOtraSucursal = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Observacion':
					/**
					 * Sets the value for strObservacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strObservacion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Ajustar':
					/**
					 * Sets the value for blnAjustar 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnAjustar = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}

			/**
		 * Esta runtina devuelve el nombre de las tablas relacionadas a esta Clase
		 * con el proposito de poder advertir la existencia integridad que no 
		 * puede ser violada con un "delete"
		 *
		 * @return array con los nombres de las tablas
		 */
		public function TablasRelacionadas() {
			$arrTablRela = array();
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		
		///////////////////////////////
		// METHODS TO EXTRACT INFO ABOUT THE CLASS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetTableName() {
			return "cliente_tmp";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[ClienteTmp::GetDatabaseIndex()]->Database;
		}

		/**
		 * Static method to retrieve the Database index in the configuration.inc.php file.
		 * This can be useful when there are two databases of the same name which create
		 * confusion for the developer. There are no internal uses of this function but are
		 * here to help retrieve info if need be!
		 * @return int position or index of the database in the config file.
		 */
		public static function GetDatabaseIndex() {
			return 1;
		}

		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="ClienteTmp"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="CodigoContrato" type="xsd:string"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="Rif" type="xsd:string"/>';
			$strToReturn .= '<element name="Direccion" type="xsd:string"/>';
			$strToReturn .= '<element name="DirEntregaFactura" type="xsd:string"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd:string"/>';
			$strToReturn .= '<element name="PersCona" type="xsd:string"/>';
			$strToReturn .= '<element name="TeleCona" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="MasterId" type="xsd:int"/>';
			$strToReturn .= '<element name="FechCarg" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraCarg" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="OtraSucursal" type="xsd:string"/>';
			$strToReturn .= '<element name="Observacion" type="xsd:string"/>';
			$strToReturn .= '<element name="Ajustar" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ClienteTmp', $strComplexTypeArray)) {
				$strComplexTypeArray['ClienteTmp'] = ClienteTmp::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ClienteTmp::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ClienteTmp();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'CodigoContrato'))
				$objToReturn->strCodigoContrato = $objSoapObject->CodigoContrato;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if (property_exists($objSoapObject, 'Rif'))
				$objToReturn->strRif = $objSoapObject->Rif;
			if (property_exists($objSoapObject, 'Direccion'))
				$objToReturn->strDireccion = $objSoapObject->Direccion;
			if (property_exists($objSoapObject, 'DirEntregaFactura'))
				$objToReturn->strDirEntregaFactura = $objSoapObject->DirEntregaFactura;
			if (property_exists($objSoapObject, 'Sucursal'))
				$objToReturn->strSucursal = $objSoapObject->Sucursal;
			if (property_exists($objSoapObject, 'PersCona'))
				$objToReturn->strPersCona = $objSoapObject->PersCona;
			if (property_exists($objSoapObject, 'TeleCona'))
				$objToReturn->strTeleCona = $objSoapObject->TeleCona;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'MasterId'))
				$objToReturn->intMasterId = $objSoapObject->MasterId;
			if (property_exists($objSoapObject, 'FechCarg'))
				$objToReturn->dttFechCarg = new QDateTime($objSoapObject->FechCarg);
			if (property_exists($objSoapObject, 'HoraCarg'))
				$objToReturn->dttHoraCarg = new QDateTime($objSoapObject->HoraCarg);
			if (property_exists($objSoapObject, 'OtraSucursal'))
				$objToReturn->strOtraSucursal = $objSoapObject->OtraSucursal;
			if (property_exists($objSoapObject, 'Observacion'))
				$objToReturn->strObservacion = $objSoapObject->Observacion;
			if (property_exists($objSoapObject, 'Ajustar'))
				$objToReturn->blnAjustar = $objSoapObject->Ajustar;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ClienteTmp::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechCarg)
				$objObject->dttFechCarg = $objObject->dttFechCarg->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttHoraCarg)
				$objObject->dttHoraCarg = $objObject->dttHoraCarg->qFormat(QDateTime::FormatSoap);
			return $objObject;
		}


		////////////////////////////////////////
		// METHODS for JSON Object Translation
		////////////////////////////////////////

		// this function is required for objects that implement the
		// IteratorAggregate interface
		public function getIterator() {
			///////////////////
			// Member Variables
			///////////////////
			$iArray['Id'] = $this->intId;
			$iArray['CodigoContrato'] = $this->strCodigoContrato;
			$iArray['Nombre'] = $this->strNombre;
			$iArray['Rif'] = $this->strRif;
			$iArray['Direccion'] = $this->strDireccion;
			$iArray['DirEntregaFactura'] = $this->strDirEntregaFactura;
			$iArray['Sucursal'] = $this->strSucursal;
			$iArray['PersCona'] = $this->strPersCona;
			$iArray['TeleCona'] = $this->strTeleCona;
			$iArray['Email'] = $this->strEmail;
			$iArray['MasterId'] = $this->intMasterId;
			$iArray['FechCarg'] = $this->dttFechCarg;
			$iArray['HoraCarg'] = $this->dttHoraCarg;
			$iArray['OtraSucursal'] = $this->strOtraSucursal;
			$iArray['Observacion'] = $this->strObservacion;
			$iArray['Ajustar'] = $this->blnAjustar;
			return new ArrayIterator($iArray);
		}

		// this function returns a Json formatted string using the
		// IteratorAggregate interface
		public function getJson() {
			return json_encode($this->getIterator());
		}

		/**
		 * Default "toJsObject" handler
		 * Specifies how the object should be displayed in JQuery UI lists and menus. Note that these lists use
		 * value and label differently.
		 *
		 * value 	= The short form of what to display in the list and selection.
		 * label 	= [optional] If defined, is what is displayed in the menu
		 * id 		= Primary key of object.
		 *
		 * @return an array that specifies how to display the object
		 */
		public function toJsObject () {
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intId ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $Id
     * @property-read QQNode $CodigoContrato
     * @property-read QQNode $Nombre
     * @property-read QQNode $Rif
     * @property-read QQNode $Direccion
     * @property-read QQNode $DirEntregaFactura
     * @property-read QQNode $Sucursal
     * @property-read QQNode $PersCona
     * @property-read QQNode $TeleCona
     * @property-read QQNode $Email
     * @property-read QQNode $MasterId
     * @property-read QQNode $FechCarg
     * @property-read QQNode $HoraCarg
     * @property-read QQNode $OtraSucursal
     * @property-read QQNode $Observacion
     * @property-read QQNode $Ajustar
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeClienteTmp extends QQNode {
		protected $strTableName = 'cliente_tmp';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ClienteTmp';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'CodigoContrato':
					return new QQNode('codigo_contrato', 'CodigoContrato', 'VarChar', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'Rif':
					return new QQNode('rif', 'Rif', 'VarChar', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'VarChar', $this);
				case 'DirEntregaFactura':
					return new QQNode('dir_entrega_factura', 'DirEntregaFactura', 'VarChar', $this);
				case 'Sucursal':
					return new QQNode('sucursal', 'Sucursal', 'VarChar', $this);
				case 'PersCona':
					return new QQNode('pers_cona', 'PersCona', 'VarChar', $this);
				case 'TeleCona':
					return new QQNode('tele_cona', 'TeleCona', 'VarChar', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'VarChar', $this);
				case 'MasterId':
					return new QQNode('master_id', 'MasterId', 'Integer', $this);
				case 'FechCarg':
					return new QQNode('fech_carg', 'FechCarg', 'Date', $this);
				case 'HoraCarg':
					return new QQNode('hora_carg', 'HoraCarg', 'Time', $this);
				case 'OtraSucursal':
					return new QQNode('otra_sucursal', 'OtraSucursal', 'VarChar', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'VarChar', $this);
				case 'Ajustar':
					return new QQNode('ajustar', 'Ajustar', 'Bit', $this);

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'Integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

    /**
     * @property-read QQNode $Id
     * @property-read QQNode $CodigoContrato
     * @property-read QQNode $Nombre
     * @property-read QQNode $Rif
     * @property-read QQNode $Direccion
     * @property-read QQNode $DirEntregaFactura
     * @property-read QQNode $Sucursal
     * @property-read QQNode $PersCona
     * @property-read QQNode $TeleCona
     * @property-read QQNode $Email
     * @property-read QQNode $MasterId
     * @property-read QQNode $FechCarg
     * @property-read QQNode $HoraCarg
     * @property-read QQNode $OtraSucursal
     * @property-read QQNode $Observacion
     * @property-read QQNode $Ajustar
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeClienteTmp extends QQReverseReferenceNode {
		protected $strTableName = 'cliente_tmp';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ClienteTmp';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'CodigoContrato':
					return new QQNode('codigo_contrato', 'CodigoContrato', 'string', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'Rif':
					return new QQNode('rif', 'Rif', 'string', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'string', $this);
				case 'DirEntregaFactura':
					return new QQNode('dir_entrega_factura', 'DirEntregaFactura', 'string', $this);
				case 'Sucursal':
					return new QQNode('sucursal', 'Sucursal', 'string', $this);
				case 'PersCona':
					return new QQNode('pers_cona', 'PersCona', 'string', $this);
				case 'TeleCona':
					return new QQNode('tele_cona', 'TeleCona', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'MasterId':
					return new QQNode('master_id', 'MasterId', 'integer', $this);
				case 'FechCarg':
					return new QQNode('fech_carg', 'FechCarg', 'QDateTime', $this);
				case 'HoraCarg':
					return new QQNode('hora_carg', 'HoraCarg', 'QDateTime', $this);
				case 'OtraSucursal':
					return new QQNode('otra_sucursal', 'OtraSucursal', 'string', $this);
				case 'Observacion':
					return new QQNode('observacion', 'Observacion', 'string', $this);
				case 'Ajustar':
					return new QQNode('ajustar', 'Ajustar', 'boolean', $this);

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>
