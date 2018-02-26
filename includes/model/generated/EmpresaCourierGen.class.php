<?php
	/**
	 * The abstract EmpresaCourierGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the EmpresaCourier subclass which
	 * extends this EmpresaCourierGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the EmpresaCourier class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Nombre the value for strNombre (Not Null)
	 * @property integer $CantidadCaracteres the value for intCantidadCaracteres (Not Null)
	 * @property-read CargaRecibida $_CargaRecibidaAsCourier the value for the private _objCargaRecibidaAsCourier (Read-Only) if set due to an expansion on the carga_recibida.courier_id reverse relationship
	 * @property-read CargaRecibida[] $_CargaRecibidaAsCourierArray the value for the private _objCargaRecibidaAsCourierArray (Read-Only) if set due to an ExpandAsArray on the carga_recibida.courier_id reverse relationship
	 * @property-read Compra $_CompraAsCourier the value for the private _objCompraAsCourier (Read-Only) if set due to an expansion on the compra.courier_id reverse relationship
	 * @property-read Compra[] $_CompraAsCourierArray the value for the private _objCompraAsCourierArray (Read-Only) if set due to an ExpandAsArray on the compra.courier_id reverse relationship
	 * @property-read Guia $_GuiaAsCourier the value for the private _objGuiaAsCourier (Read-Only) if set due to an expansion on the guia.courier_id reverse relationship
	 * @property-read Guia[] $_GuiaAsCourierArray the value for the private _objGuiaAsCourierArray (Read-Only) if set due to an ExpandAsArray on the guia.courier_id reverse relationship
	 * @property-read SreGuia $_SreGuiaAsCourier the value for the private _objSreGuiaAsCourier (Read-Only) if set due to an expansion on the sre_guia.courier_id reverse relationship
	 * @property-read SreGuia[] $_SreGuiaAsCourierArray the value for the private _objSreGuiaAsCourierArray (Read-Only) if set due to an ExpandAsArray on the sre_guia.courier_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class EmpresaCourierGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column empresa_courier.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column empresa_courier.nombre
		 * @var string strNombre
		 */
		protected $strNombre;
		const NombreMaxLength = 50;
		const NombreDefault = null;


		/**
		 * Protected member variable that maps to the database column empresa_courier.cantidad_caracteres
		 * @var integer intCantidadCaracteres
		 */
		protected $intCantidadCaracteres;
		const CantidadCaracteresDefault = 0;


		/**
		 * Private member variable that stores a reference to a single CargaRecibidaAsCourier object
		 * (of type CargaRecibida), if this EmpresaCourier object was restored with
		 * an expansion on the carga_recibida association table.
		 * @var CargaRecibida _objCargaRecibidaAsCourier;
		 */
		private $_objCargaRecibidaAsCourier;

		/**
		 * Private member variable that stores a reference to an array of CargaRecibidaAsCourier objects
		 * (of type CargaRecibida[]), if this EmpresaCourier object was restored with
		 * an ExpandAsArray on the carga_recibida association table.
		 * @var CargaRecibida[] _objCargaRecibidaAsCourierArray;
		 */
		private $_objCargaRecibidaAsCourierArray = null;

		/**
		 * Private member variable that stores a reference to a single CompraAsCourier object
		 * (of type Compra), if this EmpresaCourier object was restored with
		 * an expansion on the compra association table.
		 * @var Compra _objCompraAsCourier;
		 */
		private $_objCompraAsCourier;

		/**
		 * Private member variable that stores a reference to an array of CompraAsCourier objects
		 * (of type Compra[]), if this EmpresaCourier object was restored with
		 * an ExpandAsArray on the compra association table.
		 * @var Compra[] _objCompraAsCourierArray;
		 */
		private $_objCompraAsCourierArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaAsCourier object
		 * (of type Guia), if this EmpresaCourier object was restored with
		 * an expansion on the guia association table.
		 * @var Guia _objGuiaAsCourier;
		 */
		private $_objGuiaAsCourier;

		/**
		 * Private member variable that stores a reference to an array of GuiaAsCourier objects
		 * (of type Guia[]), if this EmpresaCourier object was restored with
		 * an ExpandAsArray on the guia association table.
		 * @var Guia[] _objGuiaAsCourierArray;
		 */
		private $_objGuiaAsCourierArray = null;

		/**
		 * Private member variable that stores a reference to a single SreGuiaAsCourier object
		 * (of type SreGuia), if this EmpresaCourier object was restored with
		 * an expansion on the sre_guia association table.
		 * @var SreGuia _objSreGuiaAsCourier;
		 */
		private $_objSreGuiaAsCourier;

		/**
		 * Private member variable that stores a reference to an array of SreGuiaAsCourier objects
		 * (of type SreGuia[]), if this EmpresaCourier object was restored with
		 * an ExpandAsArray on the sre_guia association table.
		 * @var SreGuia[] _objSreGuiaAsCourierArray;
		 */
		private $_objSreGuiaAsCourierArray = null;

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
			$this->intId = EmpresaCourier::IdDefault;
			$this->strNombre = EmpresaCourier::NombreDefault;
			$this->intCantidadCaracteres = EmpresaCourier::CantidadCaracteresDefault;
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
		 * Load a EmpresaCourier from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmpresaCourier
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'EmpresaCourier', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = EmpresaCourier::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::EmpresaCourier()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all EmpresaCouriers
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmpresaCourier[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call EmpresaCourier::QueryArray to perform the LoadAll query
			try {
				return EmpresaCourier::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all EmpresaCouriers
		 * @return int
		 */
		public static function CountAll() {
			// Call EmpresaCourier::QueryCount to perform the CountAll query
			return EmpresaCourier::QueryCount(QQ::All());
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
			$objDatabase = EmpresaCourier::GetDatabase();

			// Create/Build out the QueryBuilder object with EmpresaCourier-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'empresa_courier');

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
				EmpresaCourier::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('empresa_courier');

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
		 * Static Qcubed Query method to query for a single EmpresaCourier object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EmpresaCourier the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EmpresaCourier::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new EmpresaCourier object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = EmpresaCourier::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return EmpresaCourier::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of EmpresaCourier objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EmpresaCourier[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EmpresaCourier::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return EmpresaCourier::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = EmpresaCourier::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of EmpresaCourier objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EmpresaCourier::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = EmpresaCourier::GetDatabase();

			$strQuery = EmpresaCourier::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/empresacourier', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = EmpresaCourier::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this EmpresaCourier
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'empresa_courier';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'nombre', $strAliasPrefix . 'nombre');
			    $objBuilder->AddSelectItem($strTableName, 'cantidad_caracteres', $strAliasPrefix . 'cantidad_caracteres');
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
		 * Instantiate a EmpresaCourier from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this EmpresaCourier::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a EmpresaCourier, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (EmpresaCourier::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the EmpresaCourier object
			$objToReturn = new EmpresaCourier();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nombre';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombre = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'cantidad_caracteres';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantidadCaracteres = $objDbRow->GetColumn($strAliasName, 'Integer');

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
				$strAliasPrefix = 'empresa_courier__';


				

			// Check for CargaRecibidaAsCourier Virtual Binding
			$strAlias = $strAliasPrefix . 'cargarecibidaascourier__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['cargarecibidaascourier']) ? null : $objExpansionAliasArray['cargarecibidaascourier']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCargaRecibidaAsCourierArray)
				$objToReturn->_objCargaRecibidaAsCourierArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCargaRecibidaAsCourierArray[] = CargaRecibida::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cargarecibidaascourier__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCargaRecibidaAsCourier)) {
					$objToReturn->_objCargaRecibidaAsCourier = CargaRecibida::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cargarecibidaascourier__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for CompraAsCourier Virtual Binding
			$strAlias = $strAliasPrefix . 'compraascourier__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['compraascourier']) ? null : $objExpansionAliasArray['compraascourier']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCompraAsCourierArray)
				$objToReturn->_objCompraAsCourierArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCompraAsCourierArray[] = Compra::InstantiateDbRow($objDbRow, $strAliasPrefix . 'compraascourier__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCompraAsCourier)) {
					$objToReturn->_objCompraAsCourier = Compra::InstantiateDbRow($objDbRow, $strAliasPrefix . 'compraascourier__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaAsCourier Virtual Binding
			$strAlias = $strAliasPrefix . 'guiaascourier__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiaascourier']) ? null : $objExpansionAliasArray['guiaascourier']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaAsCourierArray)
				$objToReturn->_objGuiaAsCourierArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaAsCourierArray[] = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaascourier__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaAsCourier)) {
					$objToReturn->_objGuiaAsCourier = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiaascourier__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SreGuiaAsCourier Virtual Binding
			$strAlias = $strAliasPrefix . 'sreguiaascourier__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sreguiaascourier']) ? null : $objExpansionAliasArray['sreguiaascourier']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSreGuiaAsCourierArray)
				$objToReturn->_objSreGuiaAsCourierArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSreGuiaAsCourierArray[] = SreGuia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiaascourier__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSreGuiaAsCourier)) {
					$objToReturn->_objSreGuiaAsCourier = SreGuia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiaascourier__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of EmpresaCouriers from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return EmpresaCourier[]
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
					$objItem = EmpresaCourier::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = EmpresaCourier::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single EmpresaCourier object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return EmpresaCourier next row resulting from the query
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
			return EmpresaCourier::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single EmpresaCourier object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EmpresaCourier
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return EmpresaCourier::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::EmpresaCourier()->Id, $intId)
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
		 * Save this EmpresaCourier
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `empresa_courier` (
							`nombre`,
							`cantidad_caracteres`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strNombre) . ',
							' . $objDatabase->SqlVariable($this->intCantidadCaracteres) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('empresa_courier', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`empresa_courier`
						SET
							`nombre` = ' . $objDatabase->SqlVariable($this->strNombre) . ',
							`cantidad_caracteres` = ' . $objDatabase->SqlVariable($this->intCantidadCaracteres) . '
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
		 * Delete this EmpresaCourier
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this EmpresaCourier with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`empresa_courier`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this EmpresaCourier ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'EmpresaCourier', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all EmpresaCouriers
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`empresa_courier`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate empresa_courier table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `empresa_courier`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this EmpresaCourier from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved EmpresaCourier object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = EmpresaCourier::Load($this->intId);

			// Update $this's local variables to match
			$this->strNombre = $objReloaded->strNombre;
			$this->intCantidadCaracteres = $objReloaded->intCantidadCaracteres;
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

				case 'Nombre':
					/**
					 * Gets the value for strNombre (Not Null)
					 * @return string
					 */
					return $this->strNombre;

				case 'CantidadCaracteres':
					/**
					 * Gets the value for intCantidadCaracteres (Not Null)
					 * @return integer
					 */
					return $this->intCantidadCaracteres;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_CargaRecibidaAsCourier':
					/**
					 * Gets the value for the private _objCargaRecibidaAsCourier (Read-Only)
					 * if set due to an expansion on the carga_recibida.courier_id reverse relationship
					 * @return CargaRecibida
					 */
					return $this->_objCargaRecibidaAsCourier;

				case '_CargaRecibidaAsCourierArray':
					/**
					 * Gets the value for the private _objCargaRecibidaAsCourierArray (Read-Only)
					 * if set due to an ExpandAsArray on the carga_recibida.courier_id reverse relationship
					 * @return CargaRecibida[]
					 */
					return $this->_objCargaRecibidaAsCourierArray;

				case '_CompraAsCourier':
					/**
					 * Gets the value for the private _objCompraAsCourier (Read-Only)
					 * if set due to an expansion on the compra.courier_id reverse relationship
					 * @return Compra
					 */
					return $this->_objCompraAsCourier;

				case '_CompraAsCourierArray':
					/**
					 * Gets the value for the private _objCompraAsCourierArray (Read-Only)
					 * if set due to an ExpandAsArray on the compra.courier_id reverse relationship
					 * @return Compra[]
					 */
					return $this->_objCompraAsCourierArray;

				case '_GuiaAsCourier':
					/**
					 * Gets the value for the private _objGuiaAsCourier (Read-Only)
					 * if set due to an expansion on the guia.courier_id reverse relationship
					 * @return Guia
					 */
					return $this->_objGuiaAsCourier;

				case '_GuiaAsCourierArray':
					/**
					 * Gets the value for the private _objGuiaAsCourierArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia.courier_id reverse relationship
					 * @return Guia[]
					 */
					return $this->_objGuiaAsCourierArray;

				case '_SreGuiaAsCourier':
					/**
					 * Gets the value for the private _objSreGuiaAsCourier (Read-Only)
					 * if set due to an expansion on the sre_guia.courier_id reverse relationship
					 * @return SreGuia
					 */
					return $this->_objSreGuiaAsCourier;

				case '_SreGuiaAsCourierArray':
					/**
					 * Gets the value for the private _objSreGuiaAsCourierArray (Read-Only)
					 * if set due to an ExpandAsArray on the sre_guia.courier_id reverse relationship
					 * @return SreGuia[]
					 */
					return $this->_objSreGuiaAsCourierArray;


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

				case 'CantidadCaracteres':
					/**
					 * Sets the value for intCantidadCaracteres (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantidadCaracteres = QType::Cast($mixValue, QType::Integer));
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
			if ($this->CountCargaRecibidasAsCourier()) {
				$arrTablRela[] = 'carga_recibida';
			}
			if ($this->CountComprasAsCourier()) {
				$arrTablRela[] = 'compra';
			}
			if ($this->CountGuiasAsCourier()) {
				$arrTablRela[] = 'guia';
			}
			if ($this->CountSreGuiasAsCourier()) {
				$arrTablRela[] = 'sre_guia';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for CargaRecibidaAsCourier
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CargaRecibidasAsCourier as an array of CargaRecibida objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CargaRecibida[]
		*/
		public function GetCargaRecibidaAsCourierArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return CargaRecibida::LoadArrayByCourierId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CargaRecibidasAsCourier
		 * @return int
		*/
		public function CountCargaRecibidasAsCourier() {
			if ((is_null($this->intId)))
				return 0;

			return CargaRecibida::CountByCourierId($this->intId);
		}

		/**
		 * Associates a CargaRecibidaAsCourier
		 * @param CargaRecibida $objCargaRecibida
		 * @return void
		*/
		public function AssociateCargaRecibidaAsCourier(CargaRecibida $objCargaRecibida) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCargaRecibidaAsCourier on this unsaved EmpresaCourier.');
			if ((is_null($objCargaRecibida->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCargaRecibidaAsCourier on this EmpresaCourier with an unsaved CargaRecibida.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`carga_recibida`
				SET
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCargaRecibida->Id) . '
			');
		}

		/**
		 * Unassociates a CargaRecibidaAsCourier
		 * @param CargaRecibida $objCargaRecibida
		 * @return void
		*/
		public function UnassociateCargaRecibidaAsCourier(CargaRecibida $objCargaRecibida) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCargaRecibidaAsCourier on this unsaved EmpresaCourier.');
			if ((is_null($objCargaRecibida->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCargaRecibidaAsCourier on this EmpresaCourier with an unsaved CargaRecibida.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`carga_recibida`
				SET
					`courier_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCargaRecibida->Id) . ' AND
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all CargaRecibidasAsCourier
		 * @return void
		*/
		public function UnassociateAllCargaRecibidasAsCourier() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCargaRecibidaAsCourier on this unsaved EmpresaCourier.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`carga_recibida`
				SET
					`courier_id` = null
				WHERE
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated CargaRecibidaAsCourier
		 * @param CargaRecibida $objCargaRecibida
		 * @return void
		*/
		public function DeleteAssociatedCargaRecibidaAsCourier(CargaRecibida $objCargaRecibida) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCargaRecibidaAsCourier on this unsaved EmpresaCourier.');
			if ((is_null($objCargaRecibida->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCargaRecibidaAsCourier on this EmpresaCourier with an unsaved CargaRecibida.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`carga_recibida`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCargaRecibida->Id) . ' AND
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated CargaRecibidasAsCourier
		 * @return void
		*/
		public function DeleteAllCargaRecibidasAsCourier() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCargaRecibidaAsCourier on this unsaved EmpresaCourier.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`carga_recibida`
				WHERE
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for CompraAsCourier
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ComprasAsCourier as an array of Compra objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Compra[]
		*/
		public function GetCompraAsCourierArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Compra::LoadArrayByCourierId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ComprasAsCourier
		 * @return int
		*/
		public function CountComprasAsCourier() {
			if ((is_null($this->intId)))
				return 0;

			return Compra::CountByCourierId($this->intId);
		}

		/**
		 * Associates a CompraAsCourier
		 * @param Compra $objCompra
		 * @return void
		*/
		public function AssociateCompraAsCourier(Compra $objCompra) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCompraAsCourier on this unsaved EmpresaCourier.');
			if ((is_null($objCompra->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCompraAsCourier on this EmpresaCourier with an unsaved Compra.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`compra`
				SET
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCompra->Id) . '
			');
		}

		/**
		 * Unassociates a CompraAsCourier
		 * @param Compra $objCompra
		 * @return void
		*/
		public function UnassociateCompraAsCourier(Compra $objCompra) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompraAsCourier on this unsaved EmpresaCourier.');
			if ((is_null($objCompra->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompraAsCourier on this EmpresaCourier with an unsaved Compra.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`compra`
				SET
					`courier_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCompra->Id) . ' AND
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all ComprasAsCourier
		 * @return void
		*/
		public function UnassociateAllComprasAsCourier() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompraAsCourier on this unsaved EmpresaCourier.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`compra`
				SET
					`courier_id` = null
				WHERE
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated CompraAsCourier
		 * @param Compra $objCompra
		 * @return void
		*/
		public function DeleteAssociatedCompraAsCourier(Compra $objCompra) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompraAsCourier on this unsaved EmpresaCourier.');
			if ((is_null($objCompra->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompraAsCourier on this EmpresaCourier with an unsaved Compra.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`compra`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCompra->Id) . ' AND
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated ComprasAsCourier
		 * @return void
		*/
		public function DeleteAllComprasAsCourier() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompraAsCourier on this unsaved EmpresaCourier.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`compra`
				WHERE
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for GuiaAsCourier
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiasAsCourier as an array of Guia objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public function GetGuiaAsCourierArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Guia::LoadArrayByCourierId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiasAsCourier
		 * @return int
		*/
		public function CountGuiasAsCourier() {
			if ((is_null($this->intId)))
				return 0;

			return Guia::CountByCourierId($this->intId);
		}

		/**
		 * Associates a GuiaAsCourier
		 * @param Guia $objGuia
		 * @return void
		*/
		public function AssociateGuiaAsCourier(Guia $objGuia) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaAsCourier on this unsaved EmpresaCourier.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaAsCourier on this EmpresaCourier with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . '
			');
		}

		/**
		 * Unassociates a GuiaAsCourier
		 * @param Guia $objGuia
		 * @return void
		*/
		public function UnassociateGuiaAsCourier(Guia $objGuia) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsCourier on this unsaved EmpresaCourier.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsCourier on this EmpresaCourier with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`courier_id` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . ' AND
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all GuiasAsCourier
		 * @return void
		*/
		public function UnassociateAllGuiasAsCourier() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsCourier on this unsaved EmpresaCourier.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`courier_id` = null
				WHERE
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated GuiaAsCourier
		 * @param Guia $objGuia
		 * @return void
		*/
		public function DeleteAssociatedGuiaAsCourier(Guia $objGuia) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsCourier on this unsaved EmpresaCourier.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsCourier on this EmpresaCourier with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . ' AND
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated GuiasAsCourier
		 * @return void
		*/
		public function DeleteAllGuiasAsCourier() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaAsCourier on this unsaved EmpresaCourier.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia`
				WHERE
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for SreGuiaAsCourier
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SreGuiasAsCourier as an array of SreGuia objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuia[]
		*/
		public function GetSreGuiaAsCourierArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return SreGuia::LoadArrayByCourierId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SreGuiasAsCourier
		 * @return int
		*/
		public function CountSreGuiasAsCourier() {
			if ((is_null($this->intId)))
				return 0;

			return SreGuia::CountByCourierId($this->intId);
		}

		/**
		 * Associates a SreGuiaAsCourier
		 * @param SreGuia $objSreGuia
		 * @return void
		*/
		public function AssociateSreGuiaAsCourier(SreGuia $objSreGuia) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaAsCourier on this unsaved EmpresaCourier.');
			if ((is_null($objSreGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaAsCourier on this EmpresaCourier with an unsaved SreGuia.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia`
				SET
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuia->NumeGuia) . '
			');
		}

		/**
		 * Unassociates a SreGuiaAsCourier
		 * @param SreGuia $objSreGuia
		 * @return void
		*/
		public function UnassociateSreGuiaAsCourier(SreGuia $objSreGuia) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsCourier on this unsaved EmpresaCourier.');
			if ((is_null($objSreGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsCourier on this EmpresaCourier with an unsaved SreGuia.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia`
				SET
					`courier_id` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuia->NumeGuia) . ' AND
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all SreGuiasAsCourier
		 * @return void
		*/
		public function UnassociateAllSreGuiasAsCourier() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsCourier on this unsaved EmpresaCourier.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia`
				SET
					`courier_id` = null
				WHERE
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated SreGuiaAsCourier
		 * @param SreGuia $objSreGuia
		 * @return void
		*/
		public function DeleteAssociatedSreGuiaAsCourier(SreGuia $objSreGuia) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsCourier on this unsaved EmpresaCourier.');
			if ((is_null($objSreGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsCourier on this EmpresaCourier with an unsaved SreGuia.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuia->NumeGuia) . ' AND
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated SreGuiasAsCourier
		 * @return void
		*/
		public function DeleteAllSreGuiasAsCourier() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaAsCourier on this unsaved EmpresaCourier.');

			// Get the Database Object for this Class
			$objDatabase = EmpresaCourier::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia`
				WHERE
					`courier_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "empresa_courier";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[EmpresaCourier::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="EmpresaCourier"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Nombre" type="xsd:string"/>';
			$strToReturn .= '<element name="CantidadCaracteres" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('EmpresaCourier', $strComplexTypeArray)) {
				$strComplexTypeArray['EmpresaCourier'] = EmpresaCourier::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, EmpresaCourier::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new EmpresaCourier();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Nombre'))
				$objToReturn->strNombre = $objSoapObject->Nombre;
			if (property_exists($objSoapObject, 'CantidadCaracteres'))
				$objToReturn->intCantidadCaracteres = $objSoapObject->CantidadCaracteres;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, EmpresaCourier::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
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
			$iArray['Nombre'] = $this->strNombre;
			$iArray['CantidadCaracteres'] = $this->intCantidadCaracteres;
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
     * @property-read QQNode $Nombre
     * @property-read QQNode $CantidadCaracteres
     *
     *
     * @property-read QQReverseReferenceNodeCargaRecibida $CargaRecibidaAsCourier
     * @property-read QQReverseReferenceNodeCompra $CompraAsCourier
     * @property-read QQReverseReferenceNodeGuia $GuiaAsCourier
     * @property-read QQReverseReferenceNodeSreGuia $SreGuiaAsCourier

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeEmpresaCourier extends QQNode {
		protected $strTableName = 'empresa_courier';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'EmpresaCourier';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'VarChar', $this);
				case 'CantidadCaracteres':
					return new QQNode('cantidad_caracteres', 'CantidadCaracteres', 'Integer', $this);
				case 'CargaRecibidaAsCourier':
					return new QQReverseReferenceNodeCargaRecibida($this, 'cargarecibidaascourier', 'reverse_reference', 'courier_id', 'CargaRecibidaAsCourier');
				case 'CompraAsCourier':
					return new QQReverseReferenceNodeCompra($this, 'compraascourier', 'reverse_reference', 'courier_id', 'CompraAsCourier');
				case 'GuiaAsCourier':
					return new QQReverseReferenceNodeGuia($this, 'guiaascourier', 'reverse_reference', 'courier_id', 'GuiaAsCourier');
				case 'SreGuiaAsCourier':
					return new QQReverseReferenceNodeSreGuia($this, 'sreguiaascourier', 'reverse_reference', 'courier_id', 'SreGuiaAsCourier');

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
     * @property-read QQNode $Nombre
     * @property-read QQNode $CantidadCaracteres
     *
     *
     * @property-read QQReverseReferenceNodeCargaRecibida $CargaRecibidaAsCourier
     * @property-read QQReverseReferenceNodeCompra $CompraAsCourier
     * @property-read QQReverseReferenceNodeGuia $GuiaAsCourier
     * @property-read QQReverseReferenceNodeSreGuia $SreGuiaAsCourier

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeEmpresaCourier extends QQReverseReferenceNode {
		protected $strTableName = 'empresa_courier';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'EmpresaCourier';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Nombre':
					return new QQNode('nombre', 'Nombre', 'string', $this);
				case 'CantidadCaracteres':
					return new QQNode('cantidad_caracteres', 'CantidadCaracteres', 'integer', $this);
				case 'CargaRecibidaAsCourier':
					return new QQReverseReferenceNodeCargaRecibida($this, 'cargarecibidaascourier', 'reverse_reference', 'courier_id', 'CargaRecibidaAsCourier');
				case 'CompraAsCourier':
					return new QQReverseReferenceNodeCompra($this, 'compraascourier', 'reverse_reference', 'courier_id', 'CompraAsCourier');
				case 'GuiaAsCourier':
					return new QQReverseReferenceNodeGuia($this, 'guiaascourier', 'reverse_reference', 'courier_id', 'GuiaAsCourier');
				case 'SreGuiaAsCourier':
					return new QQReverseReferenceNodeSreGuia($this, 'sreguiaascourier', 'reverse_reference', 'courier_id', 'SreGuiaAsCourier');

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
