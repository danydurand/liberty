<?php
	/**
	 * The abstract RutaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Ruta subclass which
	 * extends this RutaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Ruta class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $CodiRuta the value for strCodiRuta (PK)
	 * @property string $DescRuta the value for strDescRuta (Not Null)
	 * @property string $TextObse the value for strTextObse 
	 * @property string $CodiEsta the value for strCodiEsta (Not Null)
	 * @property integer $TipoRuta the value for intTipoRuta (Not Null)
	 * @property integer $CodiStat the value for intCodiStat (Not Null)
	 * @property string $PorcMedi the value for strPorcMedi 
	 * @property QDateTime $DeletedAt the value for dttDeletedAt 
	 * @property Estacion $CodiEstaObject the value for the Estacion object referenced by strCodiEsta (Not Null)
	 * @property-read Counter $_Counter the value for the private _objCounter (Read-Only) if set due to an expansion on the counter.ruta_id reverse relationship
	 * @property-read Counter[] $_CounterArray the value for the private _objCounterArray (Read-Only) if set due to an ExpandAsArray on the counter.ruta_id reverse relationship
	 * @property-read SdeOperacion $_SdeOperacionAsCodi the value for the private _objSdeOperacionAsCodi (Read-Only) if set due to an expansion on the sde_operacion.codi_ruta reverse relationship
	 * @property-read SdeOperacion[] $_SdeOperacionAsCodiArray the value for the private _objSdeOperacionAsCodiArray (Read-Only) if set due to an ExpandAsArray on the sde_operacion.codi_ruta reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class RutaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column ruta.codi_ruta
		 * @var string strCodiRuta
		 */
		protected $strCodiRuta;
		const CodiRutaMaxLength = 20;
		const CodiRutaDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strCodiRuta;
		 */
		protected $__strCodiRuta;

		/**
		 * Protected member variable that maps to the database column ruta.desc_ruta
		 * @var string strDescRuta
		 */
		protected $strDescRuta;
		const DescRutaMaxLength = 200;
		const DescRutaDefault = null;


		/**
		 * Protected member variable that maps to the database column ruta.text_obse
		 * @var string strTextObse
		 */
		protected $strTextObse;
		const TextObseMaxLength = 200;
		const TextObseDefault = null;


		/**
		 * Protected member variable that maps to the database column ruta.codi_esta
		 * @var string strCodiEsta
		 */
		protected $strCodiEsta;
		const CodiEstaMaxLength = 20;
		const CodiEstaDefault = null;


		/**
		 * Protected member variable that maps to the database column ruta.tipo_ruta
		 * @var integer intTipoRuta
		 */
		protected $intTipoRuta;
		const TipoRutaDefault = 1;


		/**
		 * Protected member variable that maps to the database column ruta.codi_stat
		 * @var integer intCodiStat
		 */
		protected $intCodiStat;
		const CodiStatDefault = null;


		/**
		 * Protected member variable that maps to the database column ruta.porc_medi
		 * @var string strPorcMedi
		 */
		protected $strPorcMedi;
		const PorcMediDefault = 50;


		/**
		 * Protected member variable that maps to the database column ruta.deleted_at
		 * @var QDateTime dttDeletedAt
		 */
		protected $dttDeletedAt;
		const DeletedAtDefault = null;


		/**
		 * Private member variable that stores a reference to a single Counter object
		 * (of type Counter), if this Ruta object was restored with
		 * an expansion on the counter association table.
		 * @var Counter _objCounter;
		 */
		private $_objCounter;

		/**
		 * Private member variable that stores a reference to an array of Counter objects
		 * (of type Counter[]), if this Ruta object was restored with
		 * an ExpandAsArray on the counter association table.
		 * @var Counter[] _objCounterArray;
		 */
		private $_objCounterArray = null;

		/**
		 * Private member variable that stores a reference to a single SdeOperacionAsCodi object
		 * (of type SdeOperacion), if this Ruta object was restored with
		 * an expansion on the sde_operacion association table.
		 * @var SdeOperacion _objSdeOperacionAsCodi;
		 */
		private $_objSdeOperacionAsCodi;

		/**
		 * Private member variable that stores a reference to an array of SdeOperacionAsCodi objects
		 * (of type SdeOperacion[]), if this Ruta object was restored with
		 * an ExpandAsArray on the sde_operacion association table.
		 * @var SdeOperacion[] _objSdeOperacionAsCodiArray;
		 */
		private $_objSdeOperacionAsCodiArray = null;

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
		 * in the database column ruta.codi_esta.
		 *
		 * NOTE: Always use the CodiEstaObject property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objCodiEstaObject
		 */
		protected $objCodiEstaObject;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->strCodiRuta = Ruta::CodiRutaDefault;
			$this->strDescRuta = Ruta::DescRutaDefault;
			$this->strTextObse = Ruta::TextObseDefault;
			$this->strCodiEsta = Ruta::CodiEstaDefault;
			$this->intTipoRuta = Ruta::TipoRutaDefault;
			$this->intCodiStat = Ruta::CodiStatDefault;
			$this->strPorcMedi = Ruta::PorcMediDefault;
			$this->dttDeletedAt = (Ruta::DeletedAtDefault === null)?null:new QDateTime(Ruta::DeletedAtDefault);
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
		 * Load a Ruta from PK Info
		 * @param string $strCodiRuta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ruta
		 */
		public static function Load($strCodiRuta, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Ruta', $strCodiRuta);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Ruta::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Ruta()->CodiRuta, $strCodiRuta)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Rutas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ruta[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Ruta::QueryArray to perform the LoadAll query
			try {
				return Ruta::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Rutas
		 * @return int
		 */
		public static function CountAll() {
			// Call Ruta::QueryCount to perform the CountAll query
			return Ruta::QueryCount(QQ::All());
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
			$objDatabase = Ruta::GetDatabase();

			// Create/Build out the QueryBuilder object with Ruta-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'ruta');

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
				Ruta::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('ruta');

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
		 * Static Qcubed Query method to query for a single Ruta object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Ruta the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Ruta::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Ruta object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Ruta::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strCodiRuta][] = $objItem;
		
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
				return Ruta::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Ruta objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Ruta[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Ruta::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Ruta::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Ruta::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Ruta objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Ruta::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Ruta::GetDatabase();

			$strQuery = Ruta::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/ruta', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Ruta::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Ruta
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'ruta';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_ruta', $strAliasPrefix . 'codi_ruta');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_ruta', $strAliasPrefix . 'codi_ruta');
			    $objBuilder->AddSelectItem($strTableName, 'desc_ruta', $strAliasPrefix . 'desc_ruta');
			    $objBuilder->AddSelectItem($strTableName, 'text_obse', $strAliasPrefix . 'text_obse');
			    $objBuilder->AddSelectItem($strTableName, 'codi_esta', $strAliasPrefix . 'codi_esta');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_ruta', $strAliasPrefix . 'tipo_ruta');
			    $objBuilder->AddSelectItem($strTableName, 'codi_stat', $strAliasPrefix . 'codi_stat');
			    $objBuilder->AddSelectItem($strTableName, 'porc_medi', $strAliasPrefix . 'porc_medi');
			    $objBuilder->AddSelectItem($strTableName, 'deleted_at', $strAliasPrefix . 'deleted_at');
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
			
			$strAlias = $strAliasPrefix . 'codi_ruta';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->strCodiRuta != $objDbRow->GetColumn($strColumnAlias, 'VarChar')) {
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
		 * Instantiate a Ruta from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Ruta::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Ruta, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_ruta']) ? $strColumnAliasArray['codi_ruta'] : 'codi_ruta';
				$key = $objDbRow->GetColumn($strColumnAlias, 'VarChar');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (Ruta::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Ruta object
			$objToReturn = new Ruta();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_ruta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiRuta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strCodiRuta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'desc_ruta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescRuta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'text_obse';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strTextObse = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiEsta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_ruta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTipoRuta = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_stat';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiStat = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'porc_medi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPorcMedi = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'deleted_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttDeletedAt = $objDbRow->GetColumn($strAliasName, 'Date');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiRuta != $objPreviousItem->CodiRuta) {
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
				$strAliasPrefix = 'ruta__';

			// Check for CodiEstaObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_esta__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_esta']) ? null : $objExpansionAliasArray['codi_esta']);
				$objToReturn->objCodiEstaObject = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_esta__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for Counter Virtual Binding
			$strAlias = $strAliasPrefix . 'counter__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['counter']) ? null : $objExpansionAliasArray['counter']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCounterArray)
				$objToReturn->_objCounterArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCounterArray[] = Counter::InstantiateDbRow($objDbRow, $strAliasPrefix . 'counter__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCounter)) {
					$objToReturn->_objCounter = Counter::InstantiateDbRow($objDbRow, $strAliasPrefix . 'counter__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SdeOperacionAsCodi Virtual Binding
			$strAlias = $strAliasPrefix . 'sdeoperacionascodi__codi_oper';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sdeoperacionascodi']) ? null : $objExpansionAliasArray['sdeoperacionascodi']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSdeOperacionAsCodiArray)
				$objToReturn->_objSdeOperacionAsCodiArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSdeOperacionAsCodiArray[] = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdeoperacionascodi__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSdeOperacionAsCodi)) {
					$objToReturn->_objSdeOperacionAsCodi = SdeOperacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sdeoperacionascodi__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Rutas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Ruta[]
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
					$objItem = Ruta::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strCodiRuta][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Ruta::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Ruta object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Ruta next row resulting from the query
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
			return Ruta::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Ruta object,
		 * by CodiRuta Index(es)
		 * @param string $strCodiRuta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ruta
		*/
		public static function LoadByCodiRuta($strCodiRuta, $objOptionalClauses = null) {
			return Ruta::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Ruta()->CodiRuta, $strCodiRuta)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Ruta objects,
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ruta[]
		*/
		public static function LoadArrayByCodiStat($intCodiStat, $objOptionalClauses = null) {
			// Call Ruta::QueryArray to perform the LoadArrayByCodiStat query
			try {
				return Ruta::QueryArray(
					QQ::Equal(QQN::Ruta()->CodiStat, $intCodiStat),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Rutas
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @return int
		*/
		public static function CountByCodiStat($intCodiStat) {
			// Call Ruta::QueryCount to perform the CountByCodiStat query
			return Ruta::QueryCount(
				QQ::Equal(QQN::Ruta()->CodiStat, $intCodiStat)
			);
		}

		/**
		 * Load an array of Ruta objects,
		 * by CodiEsta Index(es)
		 * @param string $strCodiEsta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ruta[]
		*/
		public static function LoadArrayByCodiEsta($strCodiEsta, $objOptionalClauses = null) {
			// Call Ruta::QueryArray to perform the LoadArrayByCodiEsta query
			try {
				return Ruta::QueryArray(
					QQ::Equal(QQN::Ruta()->CodiEsta, $strCodiEsta),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Rutas
		 * by CodiEsta Index(es)
		 * @param string $strCodiEsta
		 * @return int
		*/
		public static function CountByCodiEsta($strCodiEsta) {
			// Call Ruta::QueryCount to perform the CountByCodiEsta query
			return Ruta::QueryCount(
				QQ::Equal(QQN::Ruta()->CodiEsta, $strCodiEsta)
			);
		}

		/**
		 * Load an array of Ruta objects,
		 * by TipoRuta Index(es)
		 * @param integer $intTipoRuta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ruta[]
		*/
		public static function LoadArrayByTipoRuta($intTipoRuta, $objOptionalClauses = null) {
			// Call Ruta::QueryArray to perform the LoadArrayByTipoRuta query
			try {
				return Ruta::QueryArray(
					QQ::Equal(QQN::Ruta()->TipoRuta, $intTipoRuta),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Rutas
		 * by TipoRuta Index(es)
		 * @param integer $intTipoRuta
		 * @return int
		*/
		public static function CountByTipoRuta($intTipoRuta) {
			// Call Ruta::QueryCount to perform the CountByTipoRuta query
			return Ruta::QueryCount(
				QQ::Equal(QQN::Ruta()->TipoRuta, $intTipoRuta)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Ruta
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Ruta::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `ruta` (
							`codi_ruta`,
							`desc_ruta`,
							`text_obse`,
							`codi_esta`,
							`tipo_ruta`,
							`codi_stat`,
							`porc_medi`,
							`deleted_at`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strCodiRuta) . ',
							' . $objDatabase->SqlVariable($this->strDescRuta) . ',
							' . $objDatabase->SqlVariable($this->strTextObse) . ',
							' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							' . $objDatabase->SqlVariable($this->intTipoRuta) . ',
							' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							' . $objDatabase->SqlVariable($this->strPorcMedi) . ',
							' . $objDatabase->SqlVariable($this->dttDeletedAt) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`ruta`
						SET
							`codi_ruta` = ' . $objDatabase->SqlVariable($this->strCodiRuta) . ',
							`desc_ruta` = ' . $objDatabase->SqlVariable($this->strDescRuta) . ',
							`text_obse` = ' . $objDatabase->SqlVariable($this->strTextObse) . ',
							`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							`tipo_ruta` = ' . $objDatabase->SqlVariable($this->intTipoRuta) . ',
							`codi_stat` = ' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							`porc_medi` = ' . $objDatabase->SqlVariable($this->strPorcMedi) . ',
							`deleted_at` = ' . $objDatabase->SqlVariable($this->dttDeletedAt) . '
						WHERE
							`codi_ruta` = ' . $objDatabase->SqlVariable($this->__strCodiRuta) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strCodiRuta = $this->strCodiRuta;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this Ruta
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strCodiRuta)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Ruta with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Ruta::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ruta`
				WHERE
					`codi_ruta` = ' . $objDatabase->SqlVariable($this->strCodiRuta) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Ruta ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Ruta', $this->strCodiRuta);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Rutas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Ruta::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ruta`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate ruta table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Ruta::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `ruta`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Ruta from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Ruta object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Ruta::Load($this->strCodiRuta);

			// Update $this's local variables to match
			$this->strCodiRuta = $objReloaded->strCodiRuta;
			$this->__strCodiRuta = $this->strCodiRuta;
			$this->strDescRuta = $objReloaded->strDescRuta;
			$this->strTextObse = $objReloaded->strTextObse;
			$this->CodiEsta = $objReloaded->CodiEsta;
			$this->TipoRuta = $objReloaded->TipoRuta;
			$this->CodiStat = $objReloaded->CodiStat;
			$this->strPorcMedi = $objReloaded->strPorcMedi;
			$this->dttDeletedAt = $objReloaded->dttDeletedAt;
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
				case 'CodiRuta':
					/**
					 * Gets the value for strCodiRuta (PK)
					 * @return string
					 */
					return $this->strCodiRuta;

				case 'DescRuta':
					/**
					 * Gets the value for strDescRuta (Not Null)
					 * @return string
					 */
					return $this->strDescRuta;

				case 'TextObse':
					/**
					 * Gets the value for strTextObse 
					 * @return string
					 */
					return $this->strTextObse;

				case 'CodiEsta':
					/**
					 * Gets the value for strCodiEsta (Not Null)
					 * @return string
					 */
					return $this->strCodiEsta;

				case 'TipoRuta':
					/**
					 * Gets the value for intTipoRuta (Not Null)
					 * @return integer
					 */
					return $this->intTipoRuta;

				case 'CodiStat':
					/**
					 * Gets the value for intCodiStat (Not Null)
					 * @return integer
					 */
					return $this->intCodiStat;

				case 'PorcMedi':
					/**
					 * Gets the value for strPorcMedi 
					 * @return string
					 */
					return $this->strPorcMedi;

				case 'DeletedAt':
					/**
					 * Gets the value for dttDeletedAt 
					 * @return QDateTime
					 */
					return $this->dttDeletedAt;


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiEstaObject':
					/**
					 * Gets the value for the Estacion object referenced by strCodiEsta (Not Null)
					 * @return Estacion
					 */
					try {
						if ((!$this->objCodiEstaObject) && (!is_null($this->strCodiEsta)))
							$this->objCodiEstaObject = Estacion::Load($this->strCodiEsta);
						return $this->objCodiEstaObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Counter':
					/**
					 * Gets the value for the private _objCounter (Read-Only)
					 * if set due to an expansion on the counter.ruta_id reverse relationship
					 * @return Counter
					 */
					return $this->_objCounter;

				case '_CounterArray':
					/**
					 * Gets the value for the private _objCounterArray (Read-Only)
					 * if set due to an ExpandAsArray on the counter.ruta_id reverse relationship
					 * @return Counter[]
					 */
					return $this->_objCounterArray;

				case '_SdeOperacionAsCodi':
					/**
					 * Gets the value for the private _objSdeOperacionAsCodi (Read-Only)
					 * if set due to an expansion on the sde_operacion.codi_ruta reverse relationship
					 * @return SdeOperacion
					 */
					return $this->_objSdeOperacionAsCodi;

				case '_SdeOperacionAsCodiArray':
					/**
					 * Gets the value for the private _objSdeOperacionAsCodiArray (Read-Only)
					 * if set due to an ExpandAsArray on the sde_operacion.codi_ruta reverse relationship
					 * @return SdeOperacion[]
					 */
					return $this->_objSdeOperacionAsCodiArray;


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
				case 'CodiRuta':
					/**
					 * Sets the value for strCodiRuta (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCodiRuta = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescRuta':
					/**
					 * Sets the value for strDescRuta (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescRuta = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TextObse':
					/**
					 * Sets the value for strTextObse 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strTextObse = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiEsta':
					/**
					 * Sets the value for strCodiEsta (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objCodiEstaObject = null;
						return ($this->strCodiEsta = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TipoRuta':
					/**
					 * Sets the value for intTipoRuta (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTipoRuta = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CodiStat':
					/**
					 * Sets the value for intCodiStat (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCodiStat = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PorcMedi':
					/**
					 * Sets the value for strPorcMedi 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPorcMedi = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DeletedAt':
					/**
					 * Sets the value for dttDeletedAt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttDeletedAt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiEstaObject':
					/**
					 * Sets the value for the Estacion object referenced by strCodiEsta (Not Null)
					 * @param Estacion $mixValue
					 * @return Estacion
					 */
					if (is_null($mixValue)) {
						$this->strCodiEsta = null;
						$this->objCodiEstaObject = null;
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
							throw new QCallerException('Unable to set an unsaved CodiEstaObject for this Ruta');

						// Update Local Member Variables
						$this->objCodiEstaObject = $mixValue;
						$this->strCodiEsta = $mixValue->CodiEsta;

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
			if ($this->CountCounters()) {
				$arrTablRela[] = 'counter';
			}
			if ($this->CountSdeOperacionsAsCodi()) {
				$arrTablRela[] = 'sde_operacion';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for Counter
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Counters as an array of Counter objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public function GetCounterArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiRuta)))
				return array();

			try {
				return Counter::LoadArrayByRutaId($this->strCodiRuta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Counters
		 * @return int
		*/
		public function CountCounters() {
			if ((is_null($this->strCodiRuta)))
				return 0;

			return Counter::CountByRutaId($this->strCodiRuta);
		}

		/**
		 * Associates a Counter
		 * @param Counter $objCounter
		 * @return void
		*/
		public function AssociateCounter(Counter $objCounter) {
			if ((is_null($this->strCodiRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCounter on this unsaved Ruta.');
			if ((is_null($objCounter->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCounter on this Ruta with an unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Ruta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`counter`
				SET
					`ruta_id` = ' . $objDatabase->SqlVariable($this->strCodiRuta) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCounter->Id) . '
			');
		}

		/**
		 * Unassociates a Counter
		 * @param Counter $objCounter
		 * @return void
		*/
		public function UnassociateCounter(Counter $objCounter) {
			if ((is_null($this->strCodiRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounter on this unsaved Ruta.');
			if ((is_null($objCounter->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounter on this Ruta with an unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Ruta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`counter`
				SET
					`ruta_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCounter->Id) . ' AND
					`ruta_id` = ' . $objDatabase->SqlVariable($this->strCodiRuta) . '
			');
		}

		/**
		 * Unassociates all Counters
		 * @return void
		*/
		public function UnassociateAllCounters() {
			if ((is_null($this->strCodiRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounter on this unsaved Ruta.');

			// Get the Database Object for this Class
			$objDatabase = Ruta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`counter`
				SET
					`ruta_id` = null
				WHERE
					`ruta_id` = ' . $objDatabase->SqlVariable($this->strCodiRuta) . '
			');
		}

		/**
		 * Deletes an associated Counter
		 * @param Counter $objCounter
		 * @return void
		*/
		public function DeleteAssociatedCounter(Counter $objCounter) {
			if ((is_null($this->strCodiRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounter on this unsaved Ruta.');
			if ((is_null($objCounter->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounter on this Ruta with an unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Ruta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`counter`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCounter->Id) . ' AND
					`ruta_id` = ' . $objDatabase->SqlVariable($this->strCodiRuta) . '
			');
		}

		/**
		 * Deletes all associated Counters
		 * @return void
		*/
		public function DeleteAllCounters() {
			if ((is_null($this->strCodiRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCounter on this unsaved Ruta.');

			// Get the Database Object for this Class
			$objDatabase = Ruta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`counter`
				WHERE
					`ruta_id` = ' . $objDatabase->SqlVariable($this->strCodiRuta) . '
			');
		}


		// Related Objects' Methods for SdeOperacionAsCodi
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SdeOperacionsAsCodi as an array of SdeOperacion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SdeOperacion[]
		*/
		public function GetSdeOperacionAsCodiArray($objOptionalClauses = null) {
			if ((is_null($this->strCodiRuta)))
				return array();

			try {
				return SdeOperacion::LoadArrayByCodiRuta($this->strCodiRuta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SdeOperacionsAsCodi
		 * @return int
		*/
		public function CountSdeOperacionsAsCodi() {
			if ((is_null($this->strCodiRuta)))
				return 0;

			return SdeOperacion::CountByCodiRuta($this->strCodiRuta);
		}

		/**
		 * Associates a SdeOperacionAsCodi
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function AssociateSdeOperacionAsCodi(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->strCodiRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeOperacionAsCodi on this unsaved Ruta.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSdeOperacionAsCodi on this Ruta with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = Ruta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_operacion`
				SET
					`codi_ruta` = ' . $objDatabase->SqlVariable($this->strCodiRuta) . '
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . '
			');
		}

		/**
		 * Unassociates a SdeOperacionAsCodi
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function UnassociateSdeOperacionAsCodi(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->strCodiRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodi on this unsaved Ruta.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodi on this Ruta with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = Ruta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_operacion`
				SET
					`codi_ruta` = null
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . ' AND
					`codi_ruta` = ' . $objDatabase->SqlVariable($this->strCodiRuta) . '
			');
		}

		/**
		 * Unassociates all SdeOperacionsAsCodi
		 * @return void
		*/
		public function UnassociateAllSdeOperacionsAsCodi() {
			if ((is_null($this->strCodiRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodi on this unsaved Ruta.');

			// Get the Database Object for this Class
			$objDatabase = Ruta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sde_operacion`
				SET
					`codi_ruta` = null
				WHERE
					`codi_ruta` = ' . $objDatabase->SqlVariable($this->strCodiRuta) . '
			');
		}

		/**
		 * Deletes an associated SdeOperacionAsCodi
		 * @param SdeOperacion $objSdeOperacion
		 * @return void
		*/
		public function DeleteAssociatedSdeOperacionAsCodi(SdeOperacion $objSdeOperacion) {
			if ((is_null($this->strCodiRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodi on this unsaved Ruta.');
			if ((is_null($objSdeOperacion->CodiOper)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodi on this Ruta with an unsaved SdeOperacion.');

			// Get the Database Object for this Class
			$objDatabase = Ruta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_operacion`
				WHERE
					`codi_oper` = ' . $objDatabase->SqlVariable($objSdeOperacion->CodiOper) . ' AND
					`codi_ruta` = ' . $objDatabase->SqlVariable($this->strCodiRuta) . '
			');
		}

		/**
		 * Deletes all associated SdeOperacionsAsCodi
		 * @return void
		*/
		public function DeleteAllSdeOperacionsAsCodi() {
			if ((is_null($this->strCodiRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSdeOperacionAsCodi on this unsaved Ruta.');

			// Get the Database Object for this Class
			$objDatabase = Ruta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sde_operacion`
				WHERE
					`codi_ruta` = ' . $objDatabase->SqlVariable($this->strCodiRuta) . '
			');
		}


		
		///////////////////////////////
		// METHODS TO EXTRACT INFO ABOUT THE CLASS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetTableName() {
			return "ruta";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Ruta::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Ruta"><sequence>';
			$strToReturn .= '<element name="CodiRuta" type="xsd:string"/>';
			$strToReturn .= '<element name="DescRuta" type="xsd:string"/>';
			$strToReturn .= '<element name="TextObse" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiEstaObject" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="TipoRuta" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiStat" type="xsd:int"/>';
			$strToReturn .= '<element name="PorcMedi" type="xsd:string"/>';
			$strToReturn .= '<element name="DeletedAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Ruta', $strComplexTypeArray)) {
				$strComplexTypeArray['Ruta'] = Ruta::GetSoapComplexTypeXml();
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Ruta::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Ruta();
			if (property_exists($objSoapObject, 'CodiRuta'))
				$objToReturn->strCodiRuta = $objSoapObject->CodiRuta;
			if (property_exists($objSoapObject, 'DescRuta'))
				$objToReturn->strDescRuta = $objSoapObject->DescRuta;
			if (property_exists($objSoapObject, 'TextObse'))
				$objToReturn->strTextObse = $objSoapObject->TextObse;
			if ((property_exists($objSoapObject, 'CodiEstaObject')) &&
				($objSoapObject->CodiEstaObject))
				$objToReturn->CodiEstaObject = Estacion::GetObjectFromSoapObject($objSoapObject->CodiEstaObject);
			if (property_exists($objSoapObject, 'TipoRuta'))
				$objToReturn->intTipoRuta = $objSoapObject->TipoRuta;
			if (property_exists($objSoapObject, 'CodiStat'))
				$objToReturn->intCodiStat = $objSoapObject->CodiStat;
			if (property_exists($objSoapObject, 'PorcMedi'))
				$objToReturn->strPorcMedi = $objSoapObject->PorcMedi;
			if (property_exists($objSoapObject, 'DeletedAt'))
				$objToReturn->dttDeletedAt = new QDateTime($objSoapObject->DeletedAt);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Ruta::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCodiEstaObject)
				$objObject->objCodiEstaObject = Estacion::GetSoapObjectFromObject($objObject->objCodiEstaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strCodiEsta = null;
			if ($objObject->dttDeletedAt)
				$objObject->dttDeletedAt = $objObject->dttDeletedAt->qFormat(QDateTime::FormatSoap);
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
			$iArray['CodiRuta'] = $this->strCodiRuta;
			$iArray['DescRuta'] = $this->strDescRuta;
			$iArray['TextObse'] = $this->strTextObse;
			$iArray['CodiEsta'] = $this->strCodiEsta;
			$iArray['TipoRuta'] = $this->intTipoRuta;
			$iArray['CodiStat'] = $this->intCodiStat;
			$iArray['PorcMedi'] = $this->strPorcMedi;
			$iArray['DeletedAt'] = $this->dttDeletedAt;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->strCodiRuta ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiRuta
     * @property-read QQNode $DescRuta
     * @property-read QQNode $TextObse
     * @property-read QQNode $CodiEsta
     * @property-read QQNodeEstacion $CodiEstaObject
     * @property-read QQNode $TipoRuta
     * @property-read QQNode $CodiStat
     * @property-read QQNode $PorcMedi
     * @property-read QQNode $DeletedAt
     *
     *
     * @property-read QQReverseReferenceNodeCounter $Counter
     * @property-read QQReverseReferenceNodeSdeOperacion $SdeOperacionAsCodi

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeRuta extends QQNode {
		protected $strTableName = 'ruta';
		protected $strPrimaryKey = 'codi_ruta';
		protected $strClassName = 'Ruta';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiRuta':
					return new QQNode('codi_ruta', 'CodiRuta', 'VarChar', $this);
				case 'DescRuta':
					return new QQNode('desc_ruta', 'DescRuta', 'VarChar', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'VarChar', $this);
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'VarChar', $this);
				case 'CodiEstaObject':
					return new QQNodeEstacion('codi_esta', 'CodiEstaObject', 'VarChar', $this);
				case 'TipoRuta':
					return new QQNode('tipo_ruta', 'TipoRuta', 'Integer', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'Integer', $this);
				case 'PorcMedi':
					return new QQNode('porc_medi', 'PorcMedi', 'VarChar', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'Date', $this);
				case 'Counter':
					return new QQReverseReferenceNodeCounter($this, 'counter', 'reverse_reference', 'ruta_id', 'Counter');
				case 'SdeOperacionAsCodi':
					return new QQReverseReferenceNodeSdeOperacion($this, 'sdeoperacionascodi', 'reverse_reference', 'codi_ruta', 'SdeOperacionAsCodi');

				case '_PrimaryKeyNode':
					return new QQNode('codi_ruta', 'CodiRuta', 'VarChar', $this);
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
     * @property-read QQNode $CodiRuta
     * @property-read QQNode $DescRuta
     * @property-read QQNode $TextObse
     * @property-read QQNode $CodiEsta
     * @property-read QQNodeEstacion $CodiEstaObject
     * @property-read QQNode $TipoRuta
     * @property-read QQNode $CodiStat
     * @property-read QQNode $PorcMedi
     * @property-read QQNode $DeletedAt
     *
     *
     * @property-read QQReverseReferenceNodeCounter $Counter
     * @property-read QQReverseReferenceNodeSdeOperacion $SdeOperacionAsCodi

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeRuta extends QQReverseReferenceNode {
		protected $strTableName = 'ruta';
		protected $strPrimaryKey = 'codi_ruta';
		protected $strClassName = 'Ruta';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiRuta':
					return new QQNode('codi_ruta', 'CodiRuta', 'string', $this);
				case 'DescRuta':
					return new QQNode('desc_ruta', 'DescRuta', 'string', $this);
				case 'TextObse':
					return new QQNode('text_obse', 'TextObse', 'string', $this);
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'string', $this);
				case 'CodiEstaObject':
					return new QQNodeEstacion('codi_esta', 'CodiEstaObject', 'string', $this);
				case 'TipoRuta':
					return new QQNode('tipo_ruta', 'TipoRuta', 'integer', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'integer', $this);
				case 'PorcMedi':
					return new QQNode('porc_medi', 'PorcMedi', 'string', $this);
				case 'DeletedAt':
					return new QQNode('deleted_at', 'DeletedAt', 'QDateTime', $this);
				case 'Counter':
					return new QQReverseReferenceNodeCounter($this, 'counter', 'reverse_reference', 'ruta_id', 'Counter');
				case 'SdeOperacionAsCodi':
					return new QQReverseReferenceNodeSdeOperacion($this, 'sdeoperacionascodi', 'reverse_reference', 'codi_ruta', 'SdeOperacionAsCodi');

				case '_PrimaryKeyNode':
					return new QQNode('codi_ruta', 'CodiRuta', 'string', $this);
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
