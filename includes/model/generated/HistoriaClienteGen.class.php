<?php
	/**
	 * The abstract HistoriaClienteGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the HistoriaCliente subclass which
	 * extends this HistoriaClienteGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the HistoriaCliente class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property integer $ClienteId the value for intClienteId 
	 * @property string $Comentario the value for strComentario 
	 * @property integer $CodiUsua the value for intCodiUsua 
	 * @property string $SucursalId the value for strSucursalId 
	 * @property QDateTime $Fecha the value for dttFecha 
	 * @property string $Hora the value for strHora 
	 * @property string $CodiCkpt the value for strCodiCkpt 
	 * @property boolean $AlertaCheck the value for blnAlertaCheck 
	 * @property ClienteI $Cliente the value for the ClienteI object referenced by intClienteId 
	 * @property Usuario $CodiUsuaObject the value for the Usuario object referenced by intCodiUsua 
	 * @property Estacion $Sucursal the value for the Estacion object referenced by strSucursalId 
	 * @property SdeCheckpoint $CodiCkptObject the value for the SdeCheckpoint object referenced by strCodiCkpt 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class HistoriaClienteGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column historia_cliente.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column historia_cliente.cliente_id
		 * @var integer intClienteId
		 */
		protected $intClienteId;
		const ClienteIdDefault = null;


		/**
		 * Protected member variable that maps to the database column historia_cliente.comentario
		 * @var string strComentario
		 */
		protected $strComentario;
		const ComentarioMaxLength = 200;
		const ComentarioDefault = null;


		/**
		 * Protected member variable that maps to the database column historia_cliente.codi_usua
		 * @var integer intCodiUsua
		 */
		protected $intCodiUsua;
		const CodiUsuaDefault = null;


		/**
		 * Protected member variable that maps to the database column historia_cliente.sucursal_id
		 * @var string strSucursalId
		 */
		protected $strSucursalId;
		const SucursalIdMaxLength = 20;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column historia_cliente.fecha
		 * @var QDateTime dttFecha
		 */
		protected $dttFecha;
		const FechaDefault = null;


		/**
		 * Protected member variable that maps to the database column historia_cliente.hora
		 * @var string strHora
		 */
		protected $strHora;
		const HoraMaxLength = 8;
		const HoraDefault = null;


		/**
		 * Protected member variable that maps to the database column historia_cliente.codi_ckpt
		 * @var string strCodiCkpt
		 */
		protected $strCodiCkpt;
		const CodiCkptMaxLength = 2;
		const CodiCkptDefault = null;


		/**
		 * Protected member variable that maps to the database column historia_cliente.alerta_check
		 * @var boolean blnAlertaCheck
		 */
		protected $blnAlertaCheck;
		const AlertaCheckDefault = null;


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
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column historia_cliente.cliente_id.
		 *
		 * NOTE: Always use the Cliente property getter to correctly retrieve this ClienteI object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var ClienteI objCliente
		 */
		protected $objCliente;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column historia_cliente.codi_usua.
		 *
		 * NOTE: Always use the CodiUsuaObject property getter to correctly retrieve this Usuario object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Usuario objCodiUsuaObject
		 */
		protected $objCodiUsuaObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column historia_cliente.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objSucursal
		 */
		protected $objSucursal;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column historia_cliente.codi_ckpt.
		 *
		 * NOTE: Always use the CodiCkptObject property getter to correctly retrieve this SdeCheckpoint object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var SdeCheckpoint objCodiCkptObject
		 */
		protected $objCodiCkptObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = HistoriaCliente::IdDefault;
			$this->intClienteId = HistoriaCliente::ClienteIdDefault;
			$this->strComentario = HistoriaCliente::ComentarioDefault;
			$this->intCodiUsua = HistoriaCliente::CodiUsuaDefault;
			$this->strSucursalId = HistoriaCliente::SucursalIdDefault;
			$this->dttFecha = (HistoriaCliente::FechaDefault === null)?null:new QDateTime(HistoriaCliente::FechaDefault);
			$this->strHora = HistoriaCliente::HoraDefault;
			$this->strCodiCkpt = HistoriaCliente::CodiCkptDefault;
			$this->blnAlertaCheck = HistoriaCliente::AlertaCheckDefault;
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
		 * Load a HistoriaCliente from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HistoriaCliente
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'HistoriaCliente', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = HistoriaCliente::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::HistoriaCliente()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all HistoriaClientes
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HistoriaCliente[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call HistoriaCliente::QueryArray to perform the LoadAll query
			try {
				return HistoriaCliente::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all HistoriaClientes
		 * @return int
		 */
		public static function CountAll() {
			// Call HistoriaCliente::QueryCount to perform the CountAll query
			return HistoriaCliente::QueryCount(QQ::All());
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
			$objDatabase = HistoriaCliente::GetDatabase();

			// Create/Build out the QueryBuilder object with HistoriaCliente-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'historia_cliente');

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
				HistoriaCliente::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('historia_cliente');

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
		 * Static Qcubed Query method to query for a single HistoriaCliente object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return HistoriaCliente the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = HistoriaCliente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new HistoriaCliente object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = HistoriaCliente::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return HistoriaCliente::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of HistoriaCliente objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return HistoriaCliente[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = HistoriaCliente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return HistoriaCliente::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = HistoriaCliente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of HistoriaCliente objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = HistoriaCliente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = HistoriaCliente::GetDatabase();

			$strQuery = HistoriaCliente::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/historiacliente', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = HistoriaCliente::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this HistoriaCliente
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'historia_cliente';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'cliente_id', $strAliasPrefix . 'cliente_id');
			    $objBuilder->AddSelectItem($strTableName, 'comentario', $strAliasPrefix . 'comentario');
			    $objBuilder->AddSelectItem($strTableName, 'codi_usua', $strAliasPrefix . 'codi_usua');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha', $strAliasPrefix . 'fecha');
			    $objBuilder->AddSelectItem($strTableName, 'hora', $strAliasPrefix . 'hora');
			    $objBuilder->AddSelectItem($strTableName, 'codi_ckpt', $strAliasPrefix . 'codi_ckpt');
			    $objBuilder->AddSelectItem($strTableName, 'alerta_check', $strAliasPrefix . 'alerta_check');
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
		 * Instantiate a HistoriaCliente from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this HistoriaCliente::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a HistoriaCliente, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (HistoriaCliente::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the HistoriaCliente object
			$objToReturn = new HistoriaCliente();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cliente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'comentario';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strComentario = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiUsua = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSucursalId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFecha = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHora = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiCkpt = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'alerta_check';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnAlertaCheck = $objDbRow->GetColumn($strAliasName, 'Bit');

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
				$strAliasPrefix = 'historia_cliente__';

			// Check for Cliente Early Binding
			$strAlias = $strAliasPrefix . 'cliente_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cliente_id']) ? null : $objExpansionAliasArray['cliente_id']);
				$objToReturn->objCliente = ClienteI::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cliente_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiUsuaObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_usua__codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_usua']) ? null : $objExpansionAliasArray['codi_usua']);
				$objToReturn->objCodiUsuaObject = Usuario::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_usua__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiCkptObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_ckpt__codi_ckpt';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_ckpt']) ? null : $objExpansionAliasArray['codi_ckpt']);
				$objToReturn->objCodiCkptObject = SdeCheckpoint::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_ckpt__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of HistoriaClientes from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return HistoriaCliente[]
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
					$objItem = HistoriaCliente::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = HistoriaCliente::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single HistoriaCliente object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return HistoriaCliente next row resulting from the query
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
			return HistoriaCliente::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single HistoriaCliente object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HistoriaCliente
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return HistoriaCliente::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::HistoriaCliente()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of HistoriaCliente objects,
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HistoriaCliente[]
		*/
		public static function LoadArrayByClienteId($intClienteId, $objOptionalClauses = null) {
			// Call HistoriaCliente::QueryArray to perform the LoadArrayByClienteId query
			try {
				return HistoriaCliente::QueryArray(
					QQ::Equal(QQN::HistoriaCliente()->ClienteId, $intClienteId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count HistoriaClientes
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @return int
		*/
		public static function CountByClienteId($intClienteId) {
			// Call HistoriaCliente::QueryCount to perform the CountByClienteId query
			return HistoriaCliente::QueryCount(
				QQ::Equal(QQN::HistoriaCliente()->ClienteId, $intClienteId)
			);
		}

		/**
		 * Load an array of HistoriaCliente objects,
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HistoriaCliente[]
		*/
		public static function LoadArrayBySucursalId($strSucursalId, $objOptionalClauses = null) {
			// Call HistoriaCliente::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return HistoriaCliente::QueryArray(
					QQ::Equal(QQN::HistoriaCliente()->SucursalId, $strSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count HistoriaClientes
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($strSucursalId) {
			// Call HistoriaCliente::QueryCount to perform the CountBySucursalId query
			return HistoriaCliente::QueryCount(
				QQ::Equal(QQN::HistoriaCliente()->SucursalId, $strSucursalId)
			);
		}

		/**
		 * Load an array of HistoriaCliente objects,
		 * by CodiCkpt Index(es)
		 * @param string $strCodiCkpt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HistoriaCliente[]
		*/
		public static function LoadArrayByCodiCkpt($strCodiCkpt, $objOptionalClauses = null) {
			// Call HistoriaCliente::QueryArray to perform the LoadArrayByCodiCkpt query
			try {
				return HistoriaCliente::QueryArray(
					QQ::Equal(QQN::HistoriaCliente()->CodiCkpt, $strCodiCkpt),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count HistoriaClientes
		 * by CodiCkpt Index(es)
		 * @param string $strCodiCkpt
		 * @return int
		*/
		public static function CountByCodiCkpt($strCodiCkpt) {
			// Call HistoriaCliente::QueryCount to perform the CountByCodiCkpt query
			return HistoriaCliente::QueryCount(
				QQ::Equal(QQN::HistoriaCliente()->CodiCkpt, $strCodiCkpt)
			);
		}

		/**
		 * Load an array of HistoriaCliente objects,
		 * by CodiUsua Index(es)
		 * @param integer $intCodiUsua
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HistoriaCliente[]
		*/
		public static function LoadArrayByCodiUsua($intCodiUsua, $objOptionalClauses = null) {
			// Call HistoriaCliente::QueryArray to perform the LoadArrayByCodiUsua query
			try {
				return HistoriaCliente::QueryArray(
					QQ::Equal(QQN::HistoriaCliente()->CodiUsua, $intCodiUsua),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count HistoriaClientes
		 * by CodiUsua Index(es)
		 * @param integer $intCodiUsua
		 * @return int
		*/
		public static function CountByCodiUsua($intCodiUsua) {
			// Call HistoriaCliente::QueryCount to perform the CountByCodiUsua query
			return HistoriaCliente::QueryCount(
				QQ::Equal(QQN::HistoriaCliente()->CodiUsua, $intCodiUsua)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this HistoriaCliente
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = HistoriaCliente::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `historia_cliente` (
							`cliente_id`,
							`comentario`,
							`codi_usua`,
							`sucursal_id`,
							`fecha`,
							`hora`,
							`codi_ckpt`,
							`alerta_check`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intClienteId) . ',
							' . $objDatabase->SqlVariable($this->strComentario) . ',
							' . $objDatabase->SqlVariable($this->intCodiUsua) . ',
							' . $objDatabase->SqlVariable($this->strSucursalId) . ',
							' . $objDatabase->SqlVariable($this->dttFecha) . ',
							' . $objDatabase->SqlVariable($this->strHora) . ',
							' . $objDatabase->SqlVariable($this->strCodiCkpt) . ',
							' . $objDatabase->SqlVariable($this->blnAlertaCheck) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('historia_cliente', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`historia_cliente`
						SET
							`cliente_id` = ' . $objDatabase->SqlVariable($this->intClienteId) . ',
							`comentario` = ' . $objDatabase->SqlVariable($this->strComentario) . ',
							`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->strSucursalId) . ',
							`fecha` = ' . $objDatabase->SqlVariable($this->dttFecha) . ',
							`hora` = ' . $objDatabase->SqlVariable($this->strHora) . ',
							`codi_ckpt` = ' . $objDatabase->SqlVariable($this->strCodiCkpt) . ',
							`alerta_check` = ' . $objDatabase->SqlVariable($this->blnAlertaCheck) . '
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
		 * Delete this HistoriaCliente
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this HistoriaCliente with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = HistoriaCliente::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`historia_cliente`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this HistoriaCliente ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'HistoriaCliente', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all HistoriaClientes
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = HistoriaCliente::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`historia_cliente`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate historia_cliente table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = HistoriaCliente::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `historia_cliente`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this HistoriaCliente from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved HistoriaCliente object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = HistoriaCliente::Load($this->intId);

			// Update $this's local variables to match
			$this->ClienteId = $objReloaded->ClienteId;
			$this->strComentario = $objReloaded->strComentario;
			$this->CodiUsua = $objReloaded->CodiUsua;
			$this->SucursalId = $objReloaded->SucursalId;
			$this->dttFecha = $objReloaded->dttFecha;
			$this->strHora = $objReloaded->strHora;
			$this->CodiCkpt = $objReloaded->CodiCkpt;
			$this->blnAlertaCheck = $objReloaded->blnAlertaCheck;
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

				case 'ClienteId':
					/**
					 * Gets the value for intClienteId 
					 * @return integer
					 */
					return $this->intClienteId;

				case 'Comentario':
					/**
					 * Gets the value for strComentario 
					 * @return string
					 */
					return $this->strComentario;

				case 'CodiUsua':
					/**
					 * Gets the value for intCodiUsua 
					 * @return integer
					 */
					return $this->intCodiUsua;

				case 'SucursalId':
					/**
					 * Gets the value for strSucursalId 
					 * @return string
					 */
					return $this->strSucursalId;

				case 'Fecha':
					/**
					 * Gets the value for dttFecha 
					 * @return QDateTime
					 */
					return $this->dttFecha;

				case 'Hora':
					/**
					 * Gets the value for strHora 
					 * @return string
					 */
					return $this->strHora;

				case 'CodiCkpt':
					/**
					 * Gets the value for strCodiCkpt 
					 * @return string
					 */
					return $this->strCodiCkpt;

				case 'AlertaCheck':
					/**
					 * Gets the value for blnAlertaCheck 
					 * @return boolean
					 */
					return $this->blnAlertaCheck;


				///////////////////
				// Member Objects
				///////////////////
				case 'Cliente':
					/**
					 * Gets the value for the ClienteI object referenced by intClienteId 
					 * @return ClienteI
					 */
					try {
						if ((!$this->objCliente) && (!is_null($this->intClienteId)))
							$this->objCliente = ClienteI::Load($this->intClienteId);
						return $this->objCliente;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiUsuaObject':
					/**
					 * Gets the value for the Usuario object referenced by intCodiUsua 
					 * @return Usuario
					 */
					try {
						if ((!$this->objCodiUsuaObject) && (!is_null($this->intCodiUsua)))
							$this->objCodiUsuaObject = Usuario::Load($this->intCodiUsua);
						return $this->objCodiUsuaObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Sucursal':
					/**
					 * Gets the value for the Estacion object referenced by strSucursalId 
					 * @return Estacion
					 */
					try {
						if ((!$this->objSucursal) && (!is_null($this->strSucursalId)))
							$this->objSucursal = Estacion::Load($this->strSucursalId);
						return $this->objSucursal;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiCkptObject':
					/**
					 * Gets the value for the SdeCheckpoint object referenced by strCodiCkpt 
					 * @return SdeCheckpoint
					 */
					try {
						if ((!$this->objCodiCkptObject) && (!is_null($this->strCodiCkpt)))
							$this->objCodiCkptObject = SdeCheckpoint::Load($this->strCodiCkpt);
						return $this->objCodiCkptObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


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
				case 'ClienteId':
					/**
					 * Sets the value for intClienteId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCliente = null;
						return ($this->intClienteId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Comentario':
					/**
					 * Sets the value for strComentario 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strComentario = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiUsua':
					/**
					 * Sets the value for intCodiUsua 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiUsuaObject = null;
						return ($this->intCodiUsua = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SucursalId':
					/**
					 * Sets the value for strSucursalId 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objSucursal = null;
						return ($this->strSucursalId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Fecha':
					/**
					 * Sets the value for dttFecha 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFecha = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Hora':
					/**
					 * Sets the value for strHora 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHora = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiCkpt':
					/**
					 * Sets the value for strCodiCkpt 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objCodiCkptObject = null;
						return ($this->strCodiCkpt = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AlertaCheck':
					/**
					 * Sets the value for blnAlertaCheck 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnAlertaCheck = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Cliente':
					/**
					 * Sets the value for the ClienteI object referenced by intClienteId 
					 * @param ClienteI $mixValue
					 * @return ClienteI
					 */
					if (is_null($mixValue)) {
						$this->intClienteId = null;
						$this->objCliente = null;
						return null;
					} else {
						// Make sure $mixValue actually is a ClienteI object
						try {
							$mixValue = QType::Cast($mixValue, 'ClienteI');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED ClienteI object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Cliente for this HistoriaCliente');

						// Update Local Member Variables
						$this->objCliente = $mixValue;
						$this->intClienteId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiUsuaObject':
					/**
					 * Sets the value for the Usuario object referenced by intCodiUsua 
					 * @param Usuario $mixValue
					 * @return Usuario
					 */
					if (is_null($mixValue)) {
						$this->intCodiUsua = null;
						$this->objCodiUsuaObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Usuario object
						try {
							$mixValue = QType::Cast($mixValue, 'Usuario');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Usuario object
						if (is_null($mixValue->CodiUsua))
							throw new QCallerException('Unable to set an unsaved CodiUsuaObject for this HistoriaCliente');

						// Update Local Member Variables
						$this->objCodiUsuaObject = $mixValue;
						$this->intCodiUsua = $mixValue->CodiUsua;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Sucursal':
					/**
					 * Sets the value for the Estacion object referenced by strSucursalId 
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strSucursalId = null;
						$this->objSucursal = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Estacion object
						try {
							$mixValue = QType::Cast($mixValue, 'Estacion');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Estacion object
						if (is_null($mixValue->CodiEsta))
							throw new QCallerException('Unable to set an unsaved Sucursal for this HistoriaCliente');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->strSucursalId = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CodiCkptObject':
					/**
					 * Sets the value for the SdeCheckpoint object referenced by strCodiCkpt 
					 * @param SdeCheckpoint $mixValue
					 * @return SdeCheckpoint
					 */
					if (is_null($mixValue)) {
						$this->strCodiCkpt = null;
						$this->objCodiCkptObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a SdeCheckpoint object
						try {
							$mixValue = QType::Cast($mixValue, 'SdeCheckpoint');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED SdeCheckpoint object
						if (is_null($mixValue->CodiCkpt))
							throw new QCallerException('Unable to set an unsaved CodiCkptObject for this HistoriaCliente');

						// Update Local Member Variables
						$this->objCodiCkptObject = $mixValue;
						$this->strCodiCkpt = $mixValue->CodiCkpt;

						// Return $mixValue
						return $mixValue;
					}
					break;

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
			return "historia_cliente";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[HistoriaCliente::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="HistoriaCliente"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Cliente" type="xsd1:ClienteI"/>';
			$strToReturn .= '<element name="Comentario" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiUsuaObject" type="xsd1:Usuario"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="Fecha" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Hora" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiCkptObject" type="xsd1:SdeCheckpoint"/>';
			$strToReturn .= '<element name="AlertaCheck" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('HistoriaCliente', $strComplexTypeArray)) {
				$strComplexTypeArray['HistoriaCliente'] = HistoriaCliente::GetSoapComplexTypeXml();
				ClienteI::AlterSoapComplexTypeArray($strComplexTypeArray);
				Usuario::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				SdeCheckpoint::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, HistoriaCliente::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new HistoriaCliente();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Cliente')) &&
				($objSoapObject->Cliente))
				$objToReturn->Cliente = ClienteI::GetObjectFromSoapObject($objSoapObject->Cliente);
			if (property_exists($objSoapObject, 'Comentario'))
				$objToReturn->strComentario = $objSoapObject->Comentario;
			if ((property_exists($objSoapObject, 'CodiUsuaObject')) &&
				($objSoapObject->CodiUsuaObject))
				$objToReturn->CodiUsuaObject = Usuario::GetObjectFromSoapObject($objSoapObject->CodiUsuaObject);
			if ((property_exists($objSoapObject, 'Sucursal')) &&
				($objSoapObject->Sucursal))
				$objToReturn->Sucursal = Estacion::GetObjectFromSoapObject($objSoapObject->Sucursal);
			if (property_exists($objSoapObject, 'Fecha'))
				$objToReturn->dttFecha = new QDateTime($objSoapObject->Fecha);
			if (property_exists($objSoapObject, 'Hora'))
				$objToReturn->strHora = $objSoapObject->Hora;
			if ((property_exists($objSoapObject, 'CodiCkptObject')) &&
				($objSoapObject->CodiCkptObject))
				$objToReturn->CodiCkptObject = SdeCheckpoint::GetObjectFromSoapObject($objSoapObject->CodiCkptObject);
			if (property_exists($objSoapObject, 'AlertaCheck'))
				$objToReturn->blnAlertaCheck = $objSoapObject->AlertaCheck;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, HistoriaCliente::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCliente)
				$objObject->objCliente = ClienteI::GetSoapObjectFromObject($objObject->objCliente, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteId = null;
			if ($objObject->objCodiUsuaObject)
				$objObject->objCodiUsuaObject = Usuario::GetSoapObjectFromObject($objObject->objCodiUsuaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiUsua = null;
			if ($objObject->objSucursal)
				$objObject->objSucursal = Estacion::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strSucursalId = null;
			if ($objObject->dttFecha)
				$objObject->dttFecha = $objObject->dttFecha->qFormat(QDateTime::FormatSoap);
			if ($objObject->objCodiCkptObject)
				$objObject->objCodiCkptObject = SdeCheckpoint::GetSoapObjectFromObject($objObject->objCodiCkptObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strCodiCkpt = null;
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
			$iArray['ClienteId'] = $this->intClienteId;
			$iArray['Comentario'] = $this->strComentario;
			$iArray['CodiUsua'] = $this->intCodiUsua;
			$iArray['SucursalId'] = $this->strSucursalId;
			$iArray['Fecha'] = $this->dttFecha;
			$iArray['Hora'] = $this->strHora;
			$iArray['CodiCkpt'] = $this->strCodiCkpt;
			$iArray['AlertaCheck'] = $this->blnAlertaCheck;
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
     * @property-read QQNode $ClienteId
     * @property-read QQNodeClienteI $Cliente
     * @property-read QQNode $Comentario
     * @property-read QQNode $CodiUsua
     * @property-read QQNodeUsuario $CodiUsuaObject
     * @property-read QQNode $SucursalId
     * @property-read QQNodeEstacion $Sucursal
     * @property-read QQNode $Fecha
     * @property-read QQNode $Hora
     * @property-read QQNode $CodiCkpt
     * @property-read QQNodeSdeCheckpoint $CodiCkptObject
     * @property-read QQNode $AlertaCheck
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeHistoriaCliente extends QQNode {
		protected $strTableName = 'historia_cliente';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'HistoriaCliente';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'Integer', $this);
				case 'Cliente':
					return new QQNodeClienteI('cliente_id', 'Cliente', 'Integer', $this);
				case 'Comentario':
					return new QQNode('comentario', 'Comentario', 'VarChar', $this);
				case 'CodiUsua':
					return new QQNode('codi_usua', 'CodiUsua', 'Integer', $this);
				case 'CodiUsuaObject':
					return new QQNodeUsuario('codi_usua', 'CodiUsuaObject', 'Integer', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'VarChar', $this);
				case 'Sucursal':
					return new QQNodeEstacion('sucursal_id', 'Sucursal', 'VarChar', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'Date', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'VarChar', $this);
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'VarChar', $this);
				case 'CodiCkptObject':
					return new QQNodeSdeCheckpoint('codi_ckpt', 'CodiCkptObject', 'VarChar', $this);
				case 'AlertaCheck':
					return new QQNode('alerta_check', 'AlertaCheck', 'Bit', $this);

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
     * @property-read QQNode $ClienteId
     * @property-read QQNodeClienteI $Cliente
     * @property-read QQNode $Comentario
     * @property-read QQNode $CodiUsua
     * @property-read QQNodeUsuario $CodiUsuaObject
     * @property-read QQNode $SucursalId
     * @property-read QQNodeEstacion $Sucursal
     * @property-read QQNode $Fecha
     * @property-read QQNode $Hora
     * @property-read QQNode $CodiCkpt
     * @property-read QQNodeSdeCheckpoint $CodiCkptObject
     * @property-read QQNode $AlertaCheck
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeHistoriaCliente extends QQReverseReferenceNode {
		protected $strTableName = 'historia_cliente';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'HistoriaCliente';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'integer', $this);
				case 'Cliente':
					return new QQNodeClienteI('cliente_id', 'Cliente', 'integer', $this);
				case 'Comentario':
					return new QQNode('comentario', 'Comentario', 'string', $this);
				case 'CodiUsua':
					return new QQNode('codi_usua', 'CodiUsua', 'integer', $this);
				case 'CodiUsuaObject':
					return new QQNodeUsuario('codi_usua', 'CodiUsuaObject', 'integer', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'string', $this);
				case 'Sucursal':
					return new QQNodeEstacion('sucursal_id', 'Sucursal', 'string', $this);
				case 'Fecha':
					return new QQNode('fecha', 'Fecha', 'QDateTime', $this);
				case 'Hora':
					return new QQNode('hora', 'Hora', 'string', $this);
				case 'CodiCkpt':
					return new QQNode('codi_ckpt', 'CodiCkpt', 'string', $this);
				case 'CodiCkptObject':
					return new QQNodeSdeCheckpoint('codi_ckpt', 'CodiCkptObject', 'string', $this);
				case 'AlertaCheck':
					return new QQNode('alerta_check', 'AlertaCheck', 'boolean', $this);

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
