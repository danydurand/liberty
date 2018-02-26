<?php
	/**
	 * The abstract MasTipoRutaGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the MasTipoRuta subclass which
	 * extends this MasTipoRutaGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the MasTipoRuta class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $TipoRuta the value for intTipoRuta (PK)
	 * @property string $DescTrut the value for strDescTrut (Unique)
	 * @property-read FacResumenFact $_FacResumenFactAsTipoRuta the value for the private _objFacResumenFactAsTipoRuta (Read-Only) if set due to an expansion on the fac_resumen_fact.tipo_ruta reverse relationship
	 * @property-read FacResumenFact[] $_FacResumenFactAsTipoRutaArray the value for the private _objFacResumenFactAsTipoRutaArray (Read-Only) if set due to an ExpandAsArray on the fac_resumen_fact.tipo_ruta reverse relationship
	 * @property-read FacTariMasi $_FacTariMasiAsTipoRuta the value for the private _objFacTariMasiAsTipoRuta (Read-Only) if set due to an expansion on the fac_tari_masi.tipo_ruta reverse relationship
	 * @property-read FacTariMasi[] $_FacTariMasiAsTipoRutaArray the value for the private _objFacTariMasiAsTipoRutaArray (Read-Only) if set due to an ExpandAsArray on the fac_tari_masi.tipo_ruta reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class MasTipoRutaGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column mas_tipo_ruta.tipo_ruta
		 * @var integer intTipoRuta
		 */
		protected $intTipoRuta;
		const TipoRutaDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intTipoRuta;
		 */
		protected $__intTipoRuta;

		/**
		 * Protected member variable that maps to the database column mas_tipo_ruta.desc_trut
		 * @var string strDescTrut
		 */
		protected $strDescTrut;
		const DescTrutMaxLength = 30;
		const DescTrutDefault = null;


		/**
		 * Private member variable that stores a reference to a single FacResumenFactAsTipoRuta object
		 * (of type FacResumenFact), if this MasTipoRuta object was restored with
		 * an expansion on the fac_resumen_fact association table.
		 * @var FacResumenFact _objFacResumenFactAsTipoRuta;
		 */
		private $_objFacResumenFactAsTipoRuta;

		/**
		 * Private member variable that stores a reference to an array of FacResumenFactAsTipoRuta objects
		 * (of type FacResumenFact[]), if this MasTipoRuta object was restored with
		 * an ExpandAsArray on the fac_resumen_fact association table.
		 * @var FacResumenFact[] _objFacResumenFactAsTipoRutaArray;
		 */
		private $_objFacResumenFactAsTipoRutaArray = null;

		/**
		 * Private member variable that stores a reference to a single FacTariMasiAsTipoRuta object
		 * (of type FacTariMasi), if this MasTipoRuta object was restored with
		 * an expansion on the fac_tari_masi association table.
		 * @var FacTariMasi _objFacTariMasiAsTipoRuta;
		 */
		private $_objFacTariMasiAsTipoRuta;

		/**
		 * Private member variable that stores a reference to an array of FacTariMasiAsTipoRuta objects
		 * (of type FacTariMasi[]), if this MasTipoRuta object was restored with
		 * an ExpandAsArray on the fac_tari_masi association table.
		 * @var FacTariMasi[] _objFacTariMasiAsTipoRutaArray;
		 */
		private $_objFacTariMasiAsTipoRutaArray = null;

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
			$this->intTipoRuta = MasTipoRuta::TipoRutaDefault;
			$this->strDescTrut = MasTipoRuta::DescTrutDefault;
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
		 * Load a MasTipoRuta from PK Info
		 * @param integer $intTipoRuta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasTipoRuta
		 */
		public static function Load($intTipoRuta, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'MasTipoRuta', $intTipoRuta);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = MasTipoRuta::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::MasTipoRuta()->TipoRuta, $intTipoRuta)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all MasTipoRutas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasTipoRuta[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call MasTipoRuta::QueryArray to perform the LoadAll query
			try {
				return MasTipoRuta::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all MasTipoRutas
		 * @return int
		 */
		public static function CountAll() {
			// Call MasTipoRuta::QueryCount to perform the CountAll query
			return MasTipoRuta::QueryCount(QQ::All());
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
			$objDatabase = MasTipoRuta::GetDatabase();

			// Create/Build out the QueryBuilder object with MasTipoRuta-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'mas_tipo_ruta');

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
				MasTipoRuta::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('mas_tipo_ruta');

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
		 * Static Qcubed Query method to query for a single MasTipoRuta object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return MasTipoRuta the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = MasTipoRuta::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new MasTipoRuta object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = MasTipoRuta::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intTipoRuta][] = $objItem;
		
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
				return MasTipoRuta::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of MasTipoRuta objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return MasTipoRuta[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = MasTipoRuta::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return MasTipoRuta::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = MasTipoRuta::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of MasTipoRuta objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = MasTipoRuta::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = MasTipoRuta::GetDatabase();

			$strQuery = MasTipoRuta::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/mastiporuta', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = MasTipoRuta::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this MasTipoRuta
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'mas_tipo_ruta';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'tipo_ruta', $strAliasPrefix . 'tipo_ruta');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'tipo_ruta', $strAliasPrefix . 'tipo_ruta');
			    $objBuilder->AddSelectItem($strTableName, 'desc_trut', $strAliasPrefix . 'desc_trut');
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
			
			$strAlias = $strAliasPrefix . 'tipo_ruta';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intTipoRuta != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a MasTipoRuta from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this MasTipoRuta::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a MasTipoRuta, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['tipo_ruta']) ? $strColumnAliasArray['tipo_ruta'] : 'tipo_ruta';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (MasTipoRuta::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the MasTipoRuta object
			$objToReturn = new MasTipoRuta();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'tipo_ruta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTipoRuta = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intTipoRuta = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'desc_trut';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescTrut = $objDbRow->GetColumn($strAliasName, 'VarChar');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->TipoRuta != $objPreviousItem->TipoRuta) {
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
				$strAliasPrefix = 'mas_tipo_ruta__';


				

			// Check for FacResumenFactAsTipoRuta Virtual Binding
			$strAlias = $strAliasPrefix . 'facresumenfactastiporuta__codi_regi';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facresumenfactastiporuta']) ? null : $objExpansionAliasArray['facresumenfactastiporuta']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacResumenFactAsTipoRutaArray)
				$objToReturn->_objFacResumenFactAsTipoRutaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacResumenFactAsTipoRutaArray[] = FacResumenFact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facresumenfactastiporuta__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacResumenFactAsTipoRuta)) {
					$objToReturn->_objFacResumenFactAsTipoRuta = FacResumenFact::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facresumenfactastiporuta__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacTariMasiAsTipoRuta Virtual Binding
			$strAlias = $strAliasPrefix . 'factarimasiastiporuta__codi_prod';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['factarimasiastiporuta']) ? null : $objExpansionAliasArray['factarimasiastiporuta']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacTariMasiAsTipoRutaArray)
				$objToReturn->_objFacTariMasiAsTipoRutaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacTariMasiAsTipoRutaArray[] = FacTariMasi::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factarimasiastiporuta__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacTariMasiAsTipoRuta)) {
					$objToReturn->_objFacTariMasiAsTipoRuta = FacTariMasi::InstantiateDbRow($objDbRow, $strAliasPrefix . 'factarimasiastiporuta__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of MasTipoRutas from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return MasTipoRuta[]
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
					$objItem = MasTipoRuta::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intTipoRuta][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = MasTipoRuta::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single MasTipoRuta object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return MasTipoRuta next row resulting from the query
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
			return MasTipoRuta::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single MasTipoRuta object,
		 * by TipoRuta Index(es)
		 * @param integer $intTipoRuta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasTipoRuta
		*/
		public static function LoadByTipoRuta($intTipoRuta, $objOptionalClauses = null) {
			return MasTipoRuta::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::MasTipoRuta()->TipoRuta, $intTipoRuta)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single MasTipoRuta object,
		 * by DescTrut Index(es)
		 * @param string $strDescTrut
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MasTipoRuta
		*/
		public static function LoadByDescTrut($strDescTrut, $objOptionalClauses = null) {
			return MasTipoRuta::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::MasTipoRuta()->DescTrut, $strDescTrut)
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
		 * Save this MasTipoRuta
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = MasTipoRuta::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `mas_tipo_ruta` (
							`tipo_ruta`,
							`desc_trut`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intTipoRuta) . ',
							' . $objDatabase->SqlVariable($this->strDescTrut) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`mas_tipo_ruta`
						SET
							`tipo_ruta` = ' . $objDatabase->SqlVariable($this->intTipoRuta) . ',
							`desc_trut` = ' . $objDatabase->SqlVariable($this->strDescTrut) . '
						WHERE
							`tipo_ruta` = ' . $objDatabase->SqlVariable($this->__intTipoRuta) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intTipoRuta = $this->intTipoRuta;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this MasTipoRuta
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intTipoRuta)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this MasTipoRuta with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = MasTipoRuta::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`mas_tipo_ruta`
				WHERE
					`tipo_ruta` = ' . $objDatabase->SqlVariable($this->intTipoRuta) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this MasTipoRuta ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'MasTipoRuta', $this->intTipoRuta);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all MasTipoRutas
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = MasTipoRuta::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`mas_tipo_ruta`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate mas_tipo_ruta table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = MasTipoRuta::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `mas_tipo_ruta`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this MasTipoRuta from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved MasTipoRuta object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = MasTipoRuta::Load($this->intTipoRuta);

			// Update $this's local variables to match
			$this->intTipoRuta = $objReloaded->intTipoRuta;
			$this->__intTipoRuta = $this->intTipoRuta;
			$this->strDescTrut = $objReloaded->strDescTrut;
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
				case 'TipoRuta':
					/**
					 * Gets the value for intTipoRuta (PK)
					 * @return integer
					 */
					return $this->intTipoRuta;

				case 'DescTrut':
					/**
					 * Gets the value for strDescTrut (Unique)
					 * @return string
					 */
					return $this->strDescTrut;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_FacResumenFactAsTipoRuta':
					/**
					 * Gets the value for the private _objFacResumenFactAsTipoRuta (Read-Only)
					 * if set due to an expansion on the fac_resumen_fact.tipo_ruta reverse relationship
					 * @return FacResumenFact
					 */
					return $this->_objFacResumenFactAsTipoRuta;

				case '_FacResumenFactAsTipoRutaArray':
					/**
					 * Gets the value for the private _objFacResumenFactAsTipoRutaArray (Read-Only)
					 * if set due to an ExpandAsArray on the fac_resumen_fact.tipo_ruta reverse relationship
					 * @return FacResumenFact[]
					 */
					return $this->_objFacResumenFactAsTipoRutaArray;

				case '_FacTariMasiAsTipoRuta':
					/**
					 * Gets the value for the private _objFacTariMasiAsTipoRuta (Read-Only)
					 * if set due to an expansion on the fac_tari_masi.tipo_ruta reverse relationship
					 * @return FacTariMasi
					 */
					return $this->_objFacTariMasiAsTipoRuta;

				case '_FacTariMasiAsTipoRutaArray':
					/**
					 * Gets the value for the private _objFacTariMasiAsTipoRutaArray (Read-Only)
					 * if set due to an ExpandAsArray on the fac_tari_masi.tipo_ruta reverse relationship
					 * @return FacTariMasi[]
					 */
					return $this->_objFacTariMasiAsTipoRutaArray;


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
				case 'TipoRuta':
					/**
					 * Sets the value for intTipoRuta (PK)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTipoRuta = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DescTrut':
					/**
					 * Sets the value for strDescTrut (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDescTrut = QType::Cast($mixValue, QType::String));
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
			if ($this->CountFacResumenFactsAsTipoRuta()) {
				$arrTablRela[] = 'fac_resumen_fact';
			}
			if ($this->CountFacTariMasisAsTipoRuta()) {
				$arrTablRela[] = 'fac_tari_masi';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for FacResumenFactAsTipoRuta
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacResumenFactsAsTipoRuta as an array of FacResumenFact objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacResumenFact[]
		*/
		public function GetFacResumenFactAsTipoRutaArray($objOptionalClauses = null) {
			if ((is_null($this->intTipoRuta)))
				return array();

			try {
				return FacResumenFact::LoadArrayByTipoRuta($this->intTipoRuta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacResumenFactsAsTipoRuta
		 * @return int
		*/
		public function CountFacResumenFactsAsTipoRuta() {
			if ((is_null($this->intTipoRuta)))
				return 0;

			return FacResumenFact::CountByTipoRuta($this->intTipoRuta);
		}

		/**
		 * Associates a FacResumenFactAsTipoRuta
		 * @param FacResumenFact $objFacResumenFact
		 * @return void
		*/
		public function AssociateFacResumenFactAsTipoRuta(FacResumenFact $objFacResumenFact) {
			if ((is_null($this->intTipoRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacResumenFactAsTipoRuta on this unsaved MasTipoRuta.');
			if ((is_null($objFacResumenFact->CodiRegi)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacResumenFactAsTipoRuta on this MasTipoRuta with an unsaved FacResumenFact.');

			// Get the Database Object for this Class
			$objDatabase = MasTipoRuta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_resumen_fact`
				SET
					`tipo_ruta` = ' . $objDatabase->SqlVariable($this->intTipoRuta) . '
				WHERE
					`codi_regi` = ' . $objDatabase->SqlVariable($objFacResumenFact->CodiRegi) . '
			');
		}

		/**
		 * Unassociates a FacResumenFactAsTipoRuta
		 * @param FacResumenFact $objFacResumenFact
		 * @return void
		*/
		public function UnassociateFacResumenFactAsTipoRuta(FacResumenFact $objFacResumenFact) {
			if ((is_null($this->intTipoRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacResumenFactAsTipoRuta on this unsaved MasTipoRuta.');
			if ((is_null($objFacResumenFact->CodiRegi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacResumenFactAsTipoRuta on this MasTipoRuta with an unsaved FacResumenFact.');

			// Get the Database Object for this Class
			$objDatabase = MasTipoRuta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_resumen_fact`
				SET
					`tipo_ruta` = null
				WHERE
					`codi_regi` = ' . $objDatabase->SqlVariable($objFacResumenFact->CodiRegi) . ' AND
					`tipo_ruta` = ' . $objDatabase->SqlVariable($this->intTipoRuta) . '
			');
		}

		/**
		 * Unassociates all FacResumenFactsAsTipoRuta
		 * @return void
		*/
		public function UnassociateAllFacResumenFactsAsTipoRuta() {
			if ((is_null($this->intTipoRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacResumenFactAsTipoRuta on this unsaved MasTipoRuta.');

			// Get the Database Object for this Class
			$objDatabase = MasTipoRuta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_resumen_fact`
				SET
					`tipo_ruta` = null
				WHERE
					`tipo_ruta` = ' . $objDatabase->SqlVariable($this->intTipoRuta) . '
			');
		}

		/**
		 * Deletes an associated FacResumenFactAsTipoRuta
		 * @param FacResumenFact $objFacResumenFact
		 * @return void
		*/
		public function DeleteAssociatedFacResumenFactAsTipoRuta(FacResumenFact $objFacResumenFact) {
			if ((is_null($this->intTipoRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacResumenFactAsTipoRuta on this unsaved MasTipoRuta.');
			if ((is_null($objFacResumenFact->CodiRegi)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacResumenFactAsTipoRuta on this MasTipoRuta with an unsaved FacResumenFact.');

			// Get the Database Object for this Class
			$objDatabase = MasTipoRuta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_resumen_fact`
				WHERE
					`codi_regi` = ' . $objDatabase->SqlVariable($objFacResumenFact->CodiRegi) . ' AND
					`tipo_ruta` = ' . $objDatabase->SqlVariable($this->intTipoRuta) . '
			');
		}

		/**
		 * Deletes all associated FacResumenFactsAsTipoRuta
		 * @return void
		*/
		public function DeleteAllFacResumenFactsAsTipoRuta() {
			if ((is_null($this->intTipoRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacResumenFactAsTipoRuta on this unsaved MasTipoRuta.');

			// Get the Database Object for this Class
			$objDatabase = MasTipoRuta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_resumen_fact`
				WHERE
					`tipo_ruta` = ' . $objDatabase->SqlVariable($this->intTipoRuta) . '
			');
		}


		// Related Objects' Methods for FacTariMasiAsTipoRuta
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacTariMasisAsTipoRuta as an array of FacTariMasi objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacTariMasi[]
		*/
		public function GetFacTariMasiAsTipoRutaArray($objOptionalClauses = null) {
			if ((is_null($this->intTipoRuta)))
				return array();

			try {
				return FacTariMasi::LoadArrayByTipoRuta($this->intTipoRuta, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacTariMasisAsTipoRuta
		 * @return int
		*/
		public function CountFacTariMasisAsTipoRuta() {
			if ((is_null($this->intTipoRuta)))
				return 0;

			return FacTariMasi::CountByTipoRuta($this->intTipoRuta);
		}

		/**
		 * Associates a FacTariMasiAsTipoRuta
		 * @param FacTariMasi $objFacTariMasi
		 * @return void
		*/
		public function AssociateFacTariMasiAsTipoRuta(FacTariMasi $objFacTariMasi) {
			if ((is_null($this->intTipoRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacTariMasiAsTipoRuta on this unsaved MasTipoRuta.');
			if ((is_null($objFacTariMasi->CodiProd)) || (is_null($objFacTariMasi->CodiClie)) || (is_null($objFacTariMasi->TipoRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacTariMasiAsTipoRuta on this MasTipoRuta with an unsaved FacTariMasi.');

			// Get the Database Object for this Class
			$objDatabase = MasTipoRuta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tari_masi`
				SET
					`tipo_ruta` = ' . $objDatabase->SqlVariable($this->intTipoRuta) . '
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($objFacTariMasi->CodiProd) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($objFacTariMasi->CodiClie) . ' AND
					`tipo_ruta` = ' . $objDatabase->SqlVariable($objFacTariMasi->TipoRuta) . '
			');
		}

		/**
		 * Unassociates a FacTariMasiAsTipoRuta
		 * @param FacTariMasi $objFacTariMasi
		 * @return void
		*/
		public function UnassociateFacTariMasiAsTipoRuta(FacTariMasi $objFacTariMasi) {
			if ((is_null($this->intTipoRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTariMasiAsTipoRuta on this unsaved MasTipoRuta.');
			if ((is_null($objFacTariMasi->CodiProd)) || (is_null($objFacTariMasi->CodiClie)) || (is_null($objFacTariMasi->TipoRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTariMasiAsTipoRuta on this MasTipoRuta with an unsaved FacTariMasi.');

			// Get the Database Object for this Class
			$objDatabase = MasTipoRuta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tari_masi`
				SET
					`tipo_ruta` = null
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($objFacTariMasi->CodiProd) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($objFacTariMasi->CodiClie) . ' AND
					`tipo_ruta` = ' . $objDatabase->SqlVariable($objFacTariMasi->TipoRuta) . ' AND
					`tipo_ruta` = ' . $objDatabase->SqlVariable($this->intTipoRuta) . '
			');
		}

		/**
		 * Unassociates all FacTariMasisAsTipoRuta
		 * @return void
		*/
		public function UnassociateAllFacTariMasisAsTipoRuta() {
			if ((is_null($this->intTipoRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTariMasiAsTipoRuta on this unsaved MasTipoRuta.');

			// Get the Database Object for this Class
			$objDatabase = MasTipoRuta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`fac_tari_masi`
				SET
					`tipo_ruta` = null
				WHERE
					`tipo_ruta` = ' . $objDatabase->SqlVariable($this->intTipoRuta) . '
			');
		}

		/**
		 * Deletes an associated FacTariMasiAsTipoRuta
		 * @param FacTariMasi $objFacTariMasi
		 * @return void
		*/
		public function DeleteAssociatedFacTariMasiAsTipoRuta(FacTariMasi $objFacTariMasi) {
			if ((is_null($this->intTipoRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTariMasiAsTipoRuta on this unsaved MasTipoRuta.');
			if ((is_null($objFacTariMasi->CodiProd)) || (is_null($objFacTariMasi->CodiClie)) || (is_null($objFacTariMasi->TipoRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTariMasiAsTipoRuta on this MasTipoRuta with an unsaved FacTariMasi.');

			// Get the Database Object for this Class
			$objDatabase = MasTipoRuta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tari_masi`
				WHERE
					`codi_prod` = ' . $objDatabase->SqlVariable($objFacTariMasi->CodiProd) . ' AND
					`codi_clie` = ' . $objDatabase->SqlVariable($objFacTariMasi->CodiClie) . ' AND
					`tipo_ruta` = ' . $objDatabase->SqlVariable($objFacTariMasi->TipoRuta) . ' AND
					`tipo_ruta` = ' . $objDatabase->SqlVariable($this->intTipoRuta) . '
			');
		}

		/**
		 * Deletes all associated FacTariMasisAsTipoRuta
		 * @return void
		*/
		public function DeleteAllFacTariMasisAsTipoRuta() {
			if ((is_null($this->intTipoRuta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacTariMasiAsTipoRuta on this unsaved MasTipoRuta.');

			// Get the Database Object for this Class
			$objDatabase = MasTipoRuta::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`fac_tari_masi`
				WHERE
					`tipo_ruta` = ' . $objDatabase->SqlVariable($this->intTipoRuta) . '
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
			return "mas_tipo_ruta";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[MasTipoRuta::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="MasTipoRuta"><sequence>';
			$strToReturn .= '<element name="TipoRuta" type="xsd:int"/>';
			$strToReturn .= '<element name="DescTrut" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('MasTipoRuta', $strComplexTypeArray)) {
				$strComplexTypeArray['MasTipoRuta'] = MasTipoRuta::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, MasTipoRuta::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new MasTipoRuta();
			if (property_exists($objSoapObject, 'TipoRuta'))
				$objToReturn->intTipoRuta = $objSoapObject->TipoRuta;
			if (property_exists($objSoapObject, 'DescTrut'))
				$objToReturn->strDescTrut = $objSoapObject->DescTrut;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, MasTipoRuta::GetSoapObjectFromObject($objObject, true));

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
			$iArray['TipoRuta'] = $this->intTipoRuta;
			$iArray['DescTrut'] = $this->strDescTrut;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intTipoRuta ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $TipoRuta
     * @property-read QQNode $DescTrut
     *
     *
     * @property-read QQReverseReferenceNodeFacResumenFact $FacResumenFactAsTipoRuta
     * @property-read QQReverseReferenceNodeFacTariMasi $FacTariMasiAsTipoRuta

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeMasTipoRuta extends QQNode {
		protected $strTableName = 'mas_tipo_ruta';
		protected $strPrimaryKey = 'tipo_ruta';
		protected $strClassName = 'MasTipoRuta';
		public function __get($strName) {
			switch ($strName) {
				case 'TipoRuta':
					return new QQNode('tipo_ruta', 'TipoRuta', 'Integer', $this);
				case 'DescTrut':
					return new QQNode('desc_trut', 'DescTrut', 'VarChar', $this);
				case 'FacResumenFactAsTipoRuta':
					return new QQReverseReferenceNodeFacResumenFact($this, 'facresumenfactastiporuta', 'reverse_reference', 'tipo_ruta', 'FacResumenFactAsTipoRuta');
				case 'FacTariMasiAsTipoRuta':
					return new QQReverseReferenceNodeFacTariMasi($this, 'factarimasiastiporuta', 'reverse_reference', 'tipo_ruta', 'FacTariMasiAsTipoRuta');

				case '_PrimaryKeyNode':
					return new QQNode('tipo_ruta', 'TipoRuta', 'Integer', $this);
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
     * @property-read QQNode $TipoRuta
     * @property-read QQNode $DescTrut
     *
     *
     * @property-read QQReverseReferenceNodeFacResumenFact $FacResumenFactAsTipoRuta
     * @property-read QQReverseReferenceNodeFacTariMasi $FacTariMasiAsTipoRuta

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeMasTipoRuta extends QQReverseReferenceNode {
		protected $strTableName = 'mas_tipo_ruta';
		protected $strPrimaryKey = 'tipo_ruta';
		protected $strClassName = 'MasTipoRuta';
		public function __get($strName) {
			switch ($strName) {
				case 'TipoRuta':
					return new QQNode('tipo_ruta', 'TipoRuta', 'integer', $this);
				case 'DescTrut':
					return new QQNode('desc_trut', 'DescTrut', 'string', $this);
				case 'FacResumenFactAsTipoRuta':
					return new QQReverseReferenceNodeFacResumenFact($this, 'facresumenfactastiporuta', 'reverse_reference', 'tipo_ruta', 'FacResumenFactAsTipoRuta');
				case 'FacTariMasiAsTipoRuta':
					return new QQReverseReferenceNodeFacTariMasi($this, 'factarimasiastiporuta', 'reverse_reference', 'tipo_ruta', 'FacTariMasiAsTipoRuta');

				case '_PrimaryKeyNode':
					return new QQNode('tipo_ruta', 'TipoRuta', 'integer', $this);
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
