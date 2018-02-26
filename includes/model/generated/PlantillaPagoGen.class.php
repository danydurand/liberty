<?php
	/**
	 * The abstract PlantillaPagoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the PlantillaPago subclass which
	 * extends this PlantillaPagoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the PlantillaPago class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $FechaEmail the value for strFechaEmail (Not Null)
	 * @property QDateTime $FechaRegistro the value for dttFechaRegistro (Not Null)
	 * @property string $HoraRegistro the value for strHoraRegistro (Not Null)
	 * @property string $Email the value for strEmail (Not Null)
	 * @property integer $Procesado the value for intProcesado (Not Null)
	 * @property QDateTime $FechaProcesado the value for dttFechaProcesado 
	 * @property string $HoraProcesado the value for strHoraProcesado 
	 * @property string $Status the value for strStatus 
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PlantillaPagoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column plantilla_pago.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column plantilla_pago.fecha_email
		 * @var string strFechaEmail
		 */
		protected $strFechaEmail;
		const FechaEmailMaxLength = 50;
		const FechaEmailDefault = null;


		/**
		 * Protected member variable that maps to the database column plantilla_pago.fecha_registro
		 * @var QDateTime dttFechaRegistro
		 */
		protected $dttFechaRegistro;
		const FechaRegistroDefault = null;


		/**
		 * Protected member variable that maps to the database column plantilla_pago.hora_registro
		 * @var string strHoraRegistro
		 */
		protected $strHoraRegistro;
		const HoraRegistroMaxLength = 5;
		const HoraRegistroDefault = null;


		/**
		 * Protected member variable that maps to the database column plantilla_pago.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 50;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column plantilla_pago.procesado
		 * @var integer intProcesado
		 */
		protected $intProcesado;
		const ProcesadoDefault = 0;


		/**
		 * Protected member variable that maps to the database column plantilla_pago.fecha_procesado
		 * @var QDateTime dttFechaProcesado
		 */
		protected $dttFechaProcesado;
		const FechaProcesadoDefault = null;


		/**
		 * Protected member variable that maps to the database column plantilla_pago.hora_procesado
		 * @var string strHoraProcesado
		 */
		protected $strHoraProcesado;
		const HoraProcesadoMaxLength = 5;
		const HoraProcesadoDefault = null;


		/**
		 * Protected member variable that maps to the database column plantilla_pago.status
		 * @var string strStatus
		 */
		protected $strStatus;
		const StatusMaxLength = 1;
		const StatusDefault = null;


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
			$this->intId = PlantillaPago::IdDefault;
			$this->strFechaEmail = PlantillaPago::FechaEmailDefault;
			$this->dttFechaRegistro = (PlantillaPago::FechaRegistroDefault === null)?null:new QDateTime(PlantillaPago::FechaRegistroDefault);
			$this->strHoraRegistro = PlantillaPago::HoraRegistroDefault;
			$this->strEmail = PlantillaPago::EmailDefault;
			$this->intProcesado = PlantillaPago::ProcesadoDefault;
			$this->dttFechaProcesado = (PlantillaPago::FechaProcesadoDefault === null)?null:new QDateTime(PlantillaPago::FechaProcesadoDefault);
			$this->strHoraProcesado = PlantillaPago::HoraProcesadoDefault;
			$this->strStatus = PlantillaPago::StatusDefault;
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
		 * Load a PlantillaPago from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PlantillaPago
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'PlantillaPago', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = PlantillaPago::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PlantillaPago()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all PlantillaPagos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PlantillaPago[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call PlantillaPago::QueryArray to perform the LoadAll query
			try {
				return PlantillaPago::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all PlantillaPagos
		 * @return int
		 */
		public static function CountAll() {
			// Call PlantillaPago::QueryCount to perform the CountAll query
			return PlantillaPago::QueryCount(QQ::All());
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
			$objDatabase = PlantillaPago::GetDatabase();

			// Create/Build out the QueryBuilder object with PlantillaPago-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'plantilla_pago');

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
				PlantillaPago::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('plantilla_pago');

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
		 * Static Qcubed Query method to query for a single PlantillaPago object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PlantillaPago the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PlantillaPago::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new PlantillaPago object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = PlantillaPago::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return PlantillaPago::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of PlantillaPago objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return PlantillaPago[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PlantillaPago::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return PlantillaPago::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = PlantillaPago::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of PlantillaPago objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = PlantillaPago::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = PlantillaPago::GetDatabase();

			$strQuery = PlantillaPago::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/plantillapago', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = PlantillaPago::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this PlantillaPago
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'plantilla_pago';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_email', $strAliasPrefix . 'fecha_email');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_registro', $strAliasPrefix . 'fecha_registro');
			    $objBuilder->AddSelectItem($strTableName, 'hora_registro', $strAliasPrefix . 'hora_registro');
			    $objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			    $objBuilder->AddSelectItem($strTableName, 'procesado', $strAliasPrefix . 'procesado');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_procesado', $strAliasPrefix . 'fecha_procesado');
			    $objBuilder->AddSelectItem($strTableName, 'hora_procesado', $strAliasPrefix . 'hora_procesado');
			    $objBuilder->AddSelectItem($strTableName, 'status', $strAliasPrefix . 'status');
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
		 * Instantiate a PlantillaPago from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this PlantillaPago::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a PlantillaPago, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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
			
			

			// Create a new instance of the PlantillaPago object
			$objToReturn = new PlantillaPago();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_email';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strFechaEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fecha_registro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaRegistro = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_registro';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraRegistro = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'email';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'procesado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intProcesado = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_procesado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaProcesado = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'hora_procesado';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strHoraProcesado = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'status';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strStatus = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'plantilla_pago__';


				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of PlantillaPagos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return PlantillaPago[]
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
					$objItem = PlantillaPago::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = PlantillaPago::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single PlantillaPago object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return PlantillaPago next row resulting from the query
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
			return PlantillaPago::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single PlantillaPago object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PlantillaPago
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return PlantillaPago::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PlantillaPago()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of PlantillaPago objects,
		 * by Procesado Index(es)
		 * @param integer $intProcesado
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PlantillaPago[]
		*/
		public static function LoadArrayByProcesado($intProcesado, $objOptionalClauses = null) {
			// Call PlantillaPago::QueryArray to perform the LoadArrayByProcesado query
			try {
				return PlantillaPago::QueryArray(
					QQ::Equal(QQN::PlantillaPago()->Procesado, $intProcesado),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count PlantillaPagos
		 * by Procesado Index(es)
		 * @param integer $intProcesado
		 * @return int
		*/
		public static function CountByProcesado($intProcesado) {
			// Call PlantillaPago::QueryCount to perform the CountByProcesado query
			return PlantillaPago::QueryCount(
				QQ::Equal(QQN::PlantillaPago()->Procesado, $intProcesado)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this PlantillaPago
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = PlantillaPago::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `plantilla_pago` (
							`fecha_email`,
							`fecha_registro`,
							`hora_registro`,
							`email`,
							`procesado`,
							`fecha_procesado`,
							`hora_procesado`,
							`status`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strFechaEmail) . ',
							' . $objDatabase->SqlVariable($this->dttFechaRegistro) . ',
							' . $objDatabase->SqlVariable($this->strHoraRegistro) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->intProcesado) . ',
							' . $objDatabase->SqlVariable($this->dttFechaProcesado) . ',
							' . $objDatabase->SqlVariable($this->strHoraProcesado) . ',
							' . $objDatabase->SqlVariable($this->strStatus) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('plantilla_pago', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`plantilla_pago`
						SET
							`fecha_email` = ' . $objDatabase->SqlVariable($this->strFechaEmail) . ',
							`fecha_registro` = ' . $objDatabase->SqlVariable($this->dttFechaRegistro) . ',
							`hora_registro` = ' . $objDatabase->SqlVariable($this->strHoraRegistro) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`procesado` = ' . $objDatabase->SqlVariable($this->intProcesado) . ',
							`fecha_procesado` = ' . $objDatabase->SqlVariable($this->dttFechaProcesado) . ',
							`hora_procesado` = ' . $objDatabase->SqlVariable($this->strHoraProcesado) . ',
							`status` = ' . $objDatabase->SqlVariable($this->strStatus) . '
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
		 * Delete this PlantillaPago
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this PlantillaPago with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = PlantillaPago::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`plantilla_pago`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this PlantillaPago ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'PlantillaPago', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all PlantillaPagos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = PlantillaPago::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`plantilla_pago`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate plantilla_pago table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = PlantillaPago::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `plantilla_pago`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this PlantillaPago from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved PlantillaPago object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = PlantillaPago::Load($this->intId);

			// Update $this's local variables to match
			$this->strFechaEmail = $objReloaded->strFechaEmail;
			$this->dttFechaRegistro = $objReloaded->dttFechaRegistro;
			$this->strHoraRegistro = $objReloaded->strHoraRegistro;
			$this->strEmail = $objReloaded->strEmail;
			$this->intProcesado = $objReloaded->intProcesado;
			$this->dttFechaProcesado = $objReloaded->dttFechaProcesado;
			$this->strHoraProcesado = $objReloaded->strHoraProcesado;
			$this->strStatus = $objReloaded->strStatus;
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

				case 'FechaEmail':
					/**
					 * Gets the value for strFechaEmail (Not Null)
					 * @return string
					 */
					return $this->strFechaEmail;

				case 'FechaRegistro':
					/**
					 * Gets the value for dttFechaRegistro (Not Null)
					 * @return QDateTime
					 */
					return $this->dttFechaRegistro;

				case 'HoraRegistro':
					/**
					 * Gets the value for strHoraRegistro (Not Null)
					 * @return string
					 */
					return $this->strHoraRegistro;

				case 'Email':
					/**
					 * Gets the value for strEmail (Not Null)
					 * @return string
					 */
					return $this->strEmail;

				case 'Procesado':
					/**
					 * Gets the value for intProcesado (Not Null)
					 * @return integer
					 */
					return $this->intProcesado;

				case 'FechaProcesado':
					/**
					 * Gets the value for dttFechaProcesado 
					 * @return QDateTime
					 */
					return $this->dttFechaProcesado;

				case 'HoraProcesado':
					/**
					 * Gets the value for strHoraProcesado 
					 * @return string
					 */
					return $this->strHoraProcesado;

				case 'Status':
					/**
					 * Gets the value for strStatus 
					 * @return string
					 */
					return $this->strStatus;


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
				case 'FechaEmail':
					/**
					 * Sets the value for strFechaEmail (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFechaEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaRegistro':
					/**
					 * Sets the value for dttFechaRegistro (Not Null)
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaRegistro = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraRegistro':
					/**
					 * Sets the value for strHoraRegistro (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraRegistro = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					/**
					 * Sets the value for strEmail (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Procesado':
					/**
					 * Sets the value for intProcesado (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intProcesado = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaProcesado':
					/**
					 * Sets the value for dttFechaProcesado 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaProcesado = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'HoraProcesado':
					/**
					 * Sets the value for strHoraProcesado 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHoraProcesado = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Status':
					/**
					 * Sets the value for strStatus 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strStatus = QType::Cast($mixValue, QType::String));
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
			return "plantilla_pago";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[PlantillaPago::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="PlantillaPago"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="FechaEmail" type="xsd:string"/>';
			$strToReturn .= '<element name="FechaRegistro" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraRegistro" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="Procesado" type="xsd:int"/>';
			$strToReturn .= '<element name="FechaProcesado" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="HoraProcesado" type="xsd:string"/>';
			$strToReturn .= '<element name="Status" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('PlantillaPago', $strComplexTypeArray)) {
				$strComplexTypeArray['PlantillaPago'] = PlantillaPago::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, PlantillaPago::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new PlantillaPago();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'FechaEmail'))
				$objToReturn->strFechaEmail = $objSoapObject->FechaEmail;
			if (property_exists($objSoapObject, 'FechaRegistro'))
				$objToReturn->dttFechaRegistro = new QDateTime($objSoapObject->FechaRegistro);
			if (property_exists($objSoapObject, 'HoraRegistro'))
				$objToReturn->strHoraRegistro = $objSoapObject->HoraRegistro;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'Procesado'))
				$objToReturn->intProcesado = $objSoapObject->Procesado;
			if (property_exists($objSoapObject, 'FechaProcesado'))
				$objToReturn->dttFechaProcesado = new QDateTime($objSoapObject->FechaProcesado);
			if (property_exists($objSoapObject, 'HoraProcesado'))
				$objToReturn->strHoraProcesado = $objSoapObject->HoraProcesado;
			if (property_exists($objSoapObject, 'Status'))
				$objToReturn->strStatus = $objSoapObject->Status;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, PlantillaPago::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttFechaRegistro)
				$objObject->dttFechaRegistro = $objObject->dttFechaRegistro->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaProcesado)
				$objObject->dttFechaProcesado = $objObject->dttFechaProcesado->qFormat(QDateTime::FormatSoap);
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
			$iArray['FechaEmail'] = $this->strFechaEmail;
			$iArray['FechaRegistro'] = $this->dttFechaRegistro;
			$iArray['HoraRegistro'] = $this->strHoraRegistro;
			$iArray['Email'] = $this->strEmail;
			$iArray['Procesado'] = $this->intProcesado;
			$iArray['FechaProcesado'] = $this->dttFechaProcesado;
			$iArray['HoraProcesado'] = $this->strHoraProcesado;
			$iArray['Status'] = $this->strStatus;
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
     * @property-read QQNode $FechaEmail
     * @property-read QQNode $FechaRegistro
     * @property-read QQNode $HoraRegistro
     * @property-read QQNode $Email
     * @property-read QQNode $Procesado
     * @property-read QQNode $FechaProcesado
     * @property-read QQNode $HoraProcesado
     * @property-read QQNode $Status
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodePlantillaPago extends QQNode {
		protected $strTableName = 'plantilla_pago';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PlantillaPago';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'FechaEmail':
					return new QQNode('fecha_email', 'FechaEmail', 'VarChar', $this);
				case 'FechaRegistro':
					return new QQNode('fecha_registro', 'FechaRegistro', 'Date', $this);
				case 'HoraRegistro':
					return new QQNode('hora_registro', 'HoraRegistro', 'VarChar', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'VarChar', $this);
				case 'Procesado':
					return new QQNode('procesado', 'Procesado', 'Integer', $this);
				case 'FechaProcesado':
					return new QQNode('fecha_procesado', 'FechaProcesado', 'Date', $this);
				case 'HoraProcesado':
					return new QQNode('hora_procesado', 'HoraProcesado', 'VarChar', $this);
				case 'Status':
					return new QQNode('status', 'Status', 'VarChar', $this);

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
     * @property-read QQNode $FechaEmail
     * @property-read QQNode $FechaRegistro
     * @property-read QQNode $HoraRegistro
     * @property-read QQNode $Email
     * @property-read QQNode $Procesado
     * @property-read QQNode $FechaProcesado
     * @property-read QQNode $HoraProcesado
     * @property-read QQNode $Status
     *
     *

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodePlantillaPago extends QQReverseReferenceNode {
		protected $strTableName = 'plantilla_pago';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'PlantillaPago';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'FechaEmail':
					return new QQNode('fecha_email', 'FechaEmail', 'string', $this);
				case 'FechaRegistro':
					return new QQNode('fecha_registro', 'FechaRegistro', 'QDateTime', $this);
				case 'HoraRegistro':
					return new QQNode('hora_registro', 'HoraRegistro', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'Procesado':
					return new QQNode('procesado', 'Procesado', 'integer', $this);
				case 'FechaProcesado':
					return new QQNode('fecha_procesado', 'FechaProcesado', 'QDateTime', $this);
				case 'HoraProcesado':
					return new QQNode('hora_procesado', 'HoraProcesado', 'string', $this);
				case 'Status':
					return new QQNode('status', 'Status', 'string', $this);

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
