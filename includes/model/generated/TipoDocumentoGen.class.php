<?php
	/**
	 * The abstract TipoDocumentoGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the TipoDocumento subclass which
	 * extends this TipoDocumentoGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TipoDocumento class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property string $Id the value for strId (PK)
	 * @property string $Descripcion the value for strDescripcion (Not Null)
	 * @property-read ClienteCnt $_ClienteCnt the value for the private _objClienteCnt (Read-Only) if set due to an expansion on the cliente_cnt.tipo_documento_id reverse relationship
	 * @property-read ClienteCnt[] $_ClienteCntArray the value for the private _objClienteCntArray (Read-Only) if set due to an ExpandAsArray on the cliente_cnt.tipo_documento_id reverse relationship
	 * @property-read Factura $_Factura the value for the private _objFactura (Read-Only) if set due to an expansion on the factura.tipo_documento_id reverse relationship
	 * @property-read Factura[] $_FacturaArray the value for the private _objFacturaArray (Read-Only) if set due to an ExpandAsArray on the factura.tipo_documento_id reverse relationship
	 * @property-read Guia $_Guia the value for the private _objGuia (Read-Only) if set due to an expansion on the guia.tipo_documento_id reverse relationship
	 * @property-read Guia[] $_GuiaArray the value for the private _objGuiaArray (Read-Only) if set due to an ExpandAsArray on the guia.tipo_documento_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class TipoDocumentoGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column tipo_documento.id
		 * @var string strId
		 */
		protected $strId;
		const IdMaxLength = 1;
		const IdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var string __strId;
		 */
		protected $__strId;

		/**
		 * Protected member variable that maps to the database column tipo_documento.descripcion
		 * @var string strDescripcion
		 */
		protected $strDescripcion;
		const DescripcionMaxLength = 30;
		const DescripcionDefault = null;


		/**
		 * Private member variable that stores a reference to a single ClienteCnt object
		 * (of type ClienteCnt), if this TipoDocumento object was restored with
		 * an expansion on the cliente_cnt association table.
		 * @var ClienteCnt _objClienteCnt;
		 */
		private $_objClienteCnt;

		/**
		 * Private member variable that stores a reference to an array of ClienteCnt objects
		 * (of type ClienteCnt[]), if this TipoDocumento object was restored with
		 * an ExpandAsArray on the cliente_cnt association table.
		 * @var ClienteCnt[] _objClienteCntArray;
		 */
		private $_objClienteCntArray = null;

		/**
		 * Private member variable that stores a reference to a single Factura object
		 * (of type Factura), if this TipoDocumento object was restored with
		 * an expansion on the factura association table.
		 * @var Factura _objFactura;
		 */
		private $_objFactura;

		/**
		 * Private member variable that stores a reference to an array of Factura objects
		 * (of type Factura[]), if this TipoDocumento object was restored with
		 * an ExpandAsArray on the factura association table.
		 * @var Factura[] _objFacturaArray;
		 */
		private $_objFacturaArray = null;

		/**
		 * Private member variable that stores a reference to a single Guia object
		 * (of type Guia), if this TipoDocumento object was restored with
		 * an expansion on the guia association table.
		 * @var Guia _objGuia;
		 */
		private $_objGuia;

		/**
		 * Private member variable that stores a reference to an array of Guia objects
		 * (of type Guia[]), if this TipoDocumento object was restored with
		 * an ExpandAsArray on the guia association table.
		 * @var Guia[] _objGuiaArray;
		 */
		private $_objGuiaArray = null;

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
			$this->strId = TipoDocumento::IdDefault;
			$this->strDescripcion = TipoDocumento::DescripcionDefault;
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
		 * Load a TipoDocumento from PK Info
		 * @param string $strId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TipoDocumento
		 */
		public static function Load($strId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'TipoDocumento', $strId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = TipoDocumento::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TipoDocumento()->Id, $strId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all TipoDocumentos
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TipoDocumento[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call TipoDocumento::QueryArray to perform the LoadAll query
			try {
				return TipoDocumento::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all TipoDocumentos
		 * @return int
		 */
		public static function CountAll() {
			// Call TipoDocumento::QueryCount to perform the CountAll query
			return TipoDocumento::QueryCount(QQ::All());
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
			$objDatabase = TipoDocumento::GetDatabase();

			// Create/Build out the QueryBuilder object with TipoDocumento-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'tipo_documento');

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
				TipoDocumento::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('tipo_documento');

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
		 * Static Qcubed Query method to query for a single TipoDocumento object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TipoDocumento the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TipoDocumento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new TipoDocumento object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = TipoDocumento::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strId][] = $objItem;
		
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
				return TipoDocumento::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of TipoDocumento objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TipoDocumento[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TipoDocumento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return TipoDocumento::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = TipoDocumento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of TipoDocumento objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TipoDocumento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = TipoDocumento::GetDatabase();

			$strQuery = TipoDocumento::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/tipodocumento', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = TipoDocumento::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this TipoDocumento
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'tipo_documento';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion', $strAliasPrefix . 'descripcion');
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
				if ($objPreviousItem->strId != $objDbRow->GetColumn($strColumnAlias, 'VarChar')) {
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
		 * Instantiate a TipoDocumento from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this TipoDocumento::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a TipoDocumento, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['id']) ? $strColumnAliasArray['id'] : 'id';
				$key = $objDbRow->GetColumn($strColumnAlias, 'VarChar');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (TipoDocumento::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the TipoDocumento object
			$objToReturn = new TipoDocumento();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$objToReturn->__strId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'descripcion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcion = $objDbRow->GetColumn($strAliasName, 'VarChar');

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
				$strAliasPrefix = 'tipo_documento__';


				

			// Check for ClienteCnt Virtual Binding
			$strAlias = $strAliasPrefix . 'clientecnt__tipo_documento_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['clientecnt']) ? null : $objExpansionAliasArray['clientecnt']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objClienteCntArray)
				$objToReturn->_objClienteCntArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objClienteCntArray[] = ClienteCnt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'clientecnt__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objClienteCnt)) {
					$objToReturn->_objClienteCnt = ClienteCnt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'clientecnt__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for Factura Virtual Binding
			$strAlias = $strAliasPrefix . 'factura__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['factura']) ? null : $objExpansionAliasArray['factura']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaArray)
				$objToReturn->_objFacturaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaArray[] = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factura__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFactura)) {
					$objToReturn->_objFactura = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factura__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for Guia Virtual Binding
			$strAlias = $strAliasPrefix . 'guia__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guia']) ? null : $objExpansionAliasArray['guia']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaArray)
				$objToReturn->_objGuiaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaArray[] = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guia__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuia)) {
					$objToReturn->_objGuia = Guia::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guia__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of TipoDocumentos from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return TipoDocumento[]
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
					$objItem = TipoDocumento::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->strId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = TipoDocumento::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single TipoDocumento object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return TipoDocumento next row resulting from the query
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
			return TipoDocumento::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single TipoDocumento object,
		 * by Id Index(es)
		 * @param string $strId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TipoDocumento
		*/
		public static function LoadById($strId, $objOptionalClauses = null) {
			return TipoDocumento::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TipoDocumento()->Id, $strId)
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
		 * Save this TipoDocumento
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `tipo_documento` (
							`id`,
							`descripcion`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strId) . ',
							' . $objDatabase->SqlVariable($this->strDescripcion) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`tipo_documento`
						SET
							`id` = ' . $objDatabase->SqlVariable($this->strId) . ',
							`descripcion` = ' . $objDatabase->SqlVariable($this->strDescripcion) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->__strId) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__strId = $this->strId;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this TipoDocumento
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this TipoDocumento with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tipo_documento`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->strId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this TipoDocumento ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'TipoDocumento', $this->strId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all TipoDocumentos
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`tipo_documento`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate tipo_documento table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `tipo_documento`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this TipoDocumento from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved TipoDocumento object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = TipoDocumento::Load($this->strId);

			// Update $this's local variables to match
			$this->strId = $objReloaded->strId;
			$this->__strId = $this->strId;
			$this->strDescripcion = $objReloaded->strDescripcion;
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
					 * Gets the value for strId (PK)
					 * @return string
					 */
					return $this->strId;

				case 'Descripcion':
					/**
					 * Gets the value for strDescripcion (Not Null)
					 * @return string
					 */
					return $this->strDescripcion;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_ClienteCnt':
					/**
					 * Gets the value for the private _objClienteCnt (Read-Only)
					 * if set due to an expansion on the cliente_cnt.tipo_documento_id reverse relationship
					 * @return ClienteCnt
					 */
					return $this->_objClienteCnt;

				case '_ClienteCntArray':
					/**
					 * Gets the value for the private _objClienteCntArray (Read-Only)
					 * if set due to an ExpandAsArray on the cliente_cnt.tipo_documento_id reverse relationship
					 * @return ClienteCnt[]
					 */
					return $this->_objClienteCntArray;

				case '_Factura':
					/**
					 * Gets the value for the private _objFactura (Read-Only)
					 * if set due to an expansion on the factura.tipo_documento_id reverse relationship
					 * @return Factura
					 */
					return $this->_objFactura;

				case '_FacturaArray':
					/**
					 * Gets the value for the private _objFacturaArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura.tipo_documento_id reverse relationship
					 * @return Factura[]
					 */
					return $this->_objFacturaArray;

				case '_Guia':
					/**
					 * Gets the value for the private _objGuia (Read-Only)
					 * if set due to an expansion on the guia.tipo_documento_id reverse relationship
					 * @return Guia
					 */
					return $this->_objGuia;

				case '_GuiaArray':
					/**
					 * Gets the value for the private _objGuiaArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia.tipo_documento_id reverse relationship
					 * @return Guia[]
					 */
					return $this->_objGuiaArray;


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
				case 'Id':
					/**
					 * Sets the value for strId (PK)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Descripcion':
					/**
					 * Sets the value for strDescripcion (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescripcion = QType::Cast($mixValue, QType::String));
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
			if ($this->CountClienteCnts()) {
				$arrTablRela[] = 'cliente_cnt';
			}
			if ($this->CountFacturas()) {
				$arrTablRela[] = 'factura';
			}
			if ($this->CountGuias()) {
				$arrTablRela[] = 'guia';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for ClienteCnt
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ClienteCnts as an array of ClienteCnt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClienteCnt[]
		*/
		public function GetClienteCntArray($objOptionalClauses = null) {
			if ((is_null($this->strId)))
				return array();

			try {
				return ClienteCnt::LoadArrayByTipoDocumentoId($this->strId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ClienteCnts
		 * @return int
		*/
		public function CountClienteCnts() {
			if ((is_null($this->strId)))
				return 0;

			return ClienteCnt::CountByTipoDocumentoId($this->strId);
		}

		/**
		 * Associates a ClienteCnt
		 * @param ClienteCnt $objClienteCnt
		 * @return void
		*/
		public function AssociateClienteCnt(ClienteCnt $objClienteCnt) {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClienteCnt on this unsaved TipoDocumento.');
			if ((is_null($objClienteCnt->TipoDocumentoId)) || (is_null($objClienteCnt->CedulaRif)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClienteCnt on this TipoDocumento with an unsaved ClienteCnt.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cliente_cnt`
				SET
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strId) . '
				WHERE
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($objClienteCnt->TipoDocumentoId) . ' AND
					`cedula_rif` = ' . $objDatabase->SqlVariable($objClienteCnt->CedulaRif) . '
			');
		}

		/**
		 * Unassociates a ClienteCnt
		 * @param ClienteCnt $objClienteCnt
		 * @return void
		*/
		public function UnassociateClienteCnt(ClienteCnt $objClienteCnt) {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteCnt on this unsaved TipoDocumento.');
			if ((is_null($objClienteCnt->TipoDocumentoId)) || (is_null($objClienteCnt->CedulaRif)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteCnt on this TipoDocumento with an unsaved ClienteCnt.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cliente_cnt`
				SET
					`tipo_documento_id` = null
				WHERE
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($objClienteCnt->TipoDocumentoId) . ' AND
					`cedula_rif` = ' . $objDatabase->SqlVariable($objClienteCnt->CedulaRif) . ' AND
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strId) . '
			');
		}

		/**
		 * Unassociates all ClienteCnts
		 * @return void
		*/
		public function UnassociateAllClienteCnts() {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteCnt on this unsaved TipoDocumento.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cliente_cnt`
				SET
					`tipo_documento_id` = null
				WHERE
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strId) . '
			');
		}

		/**
		 * Deletes an associated ClienteCnt
		 * @param ClienteCnt $objClienteCnt
		 * @return void
		*/
		public function DeleteAssociatedClienteCnt(ClienteCnt $objClienteCnt) {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteCnt on this unsaved TipoDocumento.');
			if ((is_null($objClienteCnt->TipoDocumentoId)) || (is_null($objClienteCnt->CedulaRif)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteCnt on this TipoDocumento with an unsaved ClienteCnt.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_cnt`
				WHERE
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($objClienteCnt->TipoDocumentoId) . ' AND
					`cedula_rif` = ' . $objDatabase->SqlVariable($objClienteCnt->CedulaRif) . ' AND
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strId) . '
			');
		}

		/**
		 * Deletes all associated ClienteCnts
		 * @return void
		*/
		public function DeleteAllClienteCnts() {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClienteCnt on this unsaved TipoDocumento.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_cnt`
				WHERE
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strId) . '
			');
		}


		// Related Objects' Methods for Factura
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Facturas as an array of Factura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public function GetFacturaArray($objOptionalClauses = null) {
			if ((is_null($this->strId)))
				return array();

			try {
				return Factura::LoadArrayByTipoDocumentoId($this->strId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Facturas
		 * @return int
		*/
		public function CountFacturas() {
			if ((is_null($this->strId)))
				return 0;

			return Factura::CountByTipoDocumentoId($this->strId);
		}

		/**
		 * Associates a Factura
		 * @param Factura $objFactura
		 * @return void
		*/
		public function AssociateFactura(Factura $objFactura) {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFactura on this unsaved TipoDocumento.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFactura on this TipoDocumento with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . '
			');
		}

		/**
		 * Unassociates a Factura
		 * @param Factura $objFactura
		 * @return void
		*/
		public function UnassociateFactura(Factura $objFactura) {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this unsaved TipoDocumento.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this TipoDocumento with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`tipo_documento_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strId) . '
			');
		}

		/**
		 * Unassociates all Facturas
		 * @return void
		*/
		public function UnassociateAllFacturas() {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this unsaved TipoDocumento.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`tipo_documento_id` = null
				WHERE
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strId) . '
			');
		}

		/**
		 * Deletes an associated Factura
		 * @param Factura $objFactura
		 * @return void
		*/
		public function DeleteAssociatedFactura(Factura $objFactura) {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this unsaved TipoDocumento.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this TipoDocumento with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strId) . '
			');
		}

		/**
		 * Deletes all associated Facturas
		 * @return void
		*/
		public function DeleteAllFacturas() {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFactura on this unsaved TipoDocumento.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strId) . '
			');
		}


		// Related Objects' Methods for Guia
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Guias as an array of Guia objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Guia[]
		*/
		public function GetGuiaArray($objOptionalClauses = null) {
			if ((is_null($this->strId)))
				return array();

			try {
				return Guia::LoadArrayByTipoDocumentoId($this->strId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Guias
		 * @return int
		*/
		public function CountGuias() {
			if ((is_null($this->strId)))
				return 0;

			return Guia::CountByTipoDocumentoId($this->strId);
		}

		/**
		 * Associates a Guia
		 * @param Guia $objGuia
		 * @return void
		*/
		public function AssociateGuia(Guia $objGuia) {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuia on this unsaved TipoDocumento.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuia on this TipoDocumento with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strId) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . '
			');
		}

		/**
		 * Unassociates a Guia
		 * @param Guia $objGuia
		 * @return void
		*/
		public function UnassociateGuia(Guia $objGuia) {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuia on this unsaved TipoDocumento.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuia on this TipoDocumento with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`tipo_documento_id` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . ' AND
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strId) . '
			');
		}

		/**
		 * Unassociates all Guias
		 * @return void
		*/
		public function UnassociateAllGuias() {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuia on this unsaved TipoDocumento.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia`
				SET
					`tipo_documento_id` = null
				WHERE
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strId) . '
			');
		}

		/**
		 * Deletes an associated Guia
		 * @param Guia $objGuia
		 * @return void
		*/
		public function DeleteAssociatedGuia(Guia $objGuia) {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuia on this unsaved TipoDocumento.');
			if ((is_null($objGuia->NumeGuia)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuia on this TipoDocumento with an unsaved Guia.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuia->NumeGuia) . ' AND
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strId) . '
			');
		}

		/**
		 * Deletes all associated Guias
		 * @return void
		*/
		public function DeleteAllGuias() {
			if ((is_null($this->strId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuia on this unsaved TipoDocumento.');

			// Get the Database Object for this Class
			$objDatabase = TipoDocumento::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia`
				WHERE
					`tipo_documento_id` = ' . $objDatabase->SqlVariable($this->strId) . '
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
			return "tipo_documento";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[TipoDocumento::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="TipoDocumento"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:string"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('TipoDocumento', $strComplexTypeArray)) {
				$strComplexTypeArray['TipoDocumento'] = TipoDocumento::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, TipoDocumento::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new TipoDocumento();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->strId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Descripcion'))
				$objToReturn->strDescripcion = $objSoapObject->Descripcion;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, TipoDocumento::GetSoapObjectFromObject($objObject, true));

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
			$iArray['Id'] = $this->strId;
			$iArray['Descripcion'] = $this->strDescripcion;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->strId ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $Id
     * @property-read QQNode $Descripcion
     *
     *
     * @property-read QQReverseReferenceNodeClienteCnt $ClienteCnt
     * @property-read QQReverseReferenceNodeFactura $Factura
     * @property-read QQReverseReferenceNodeGuia $Guia

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeTipoDocumento extends QQNode {
		protected $strTableName = 'tipo_documento';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'TipoDocumento';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'VarChar', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'VarChar', $this);
				case 'ClienteCnt':
					return new QQReverseReferenceNodeClienteCnt($this, 'clientecnt', 'reverse_reference', 'tipo_documento_id', 'ClienteCnt');
				case 'Factura':
					return new QQReverseReferenceNodeFactura($this, 'factura', 'reverse_reference', 'tipo_documento_id', 'Factura');
				case 'Guia':
					return new QQReverseReferenceNodeGuia($this, 'guia', 'reverse_reference', 'tipo_documento_id', 'Guia');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'VarChar', $this);
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
     * @property-read QQNode $Descripcion
     *
     *
     * @property-read QQReverseReferenceNodeClienteCnt $ClienteCnt
     * @property-read QQReverseReferenceNodeFactura $Factura
     * @property-read QQReverseReferenceNodeGuia $Guia

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeTipoDocumento extends QQReverseReferenceNode {
		protected $strTableName = 'tipo_documento';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'TipoDocumento';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'string', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'ClienteCnt':
					return new QQReverseReferenceNodeClienteCnt($this, 'clientecnt', 'reverse_reference', 'tipo_documento_id', 'ClienteCnt');
				case 'Factura':
					return new QQReverseReferenceNodeFactura($this, 'factura', 'reverse_reference', 'tipo_documento_id', 'Factura');
				case 'Guia':
					return new QQReverseReferenceNodeGuia($this, 'guia', 'reverse_reference', 'tipo_documento_id', 'Guia');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'string', $this);
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
