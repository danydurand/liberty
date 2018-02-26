<?php
	/**
	 * The abstract EstadisticaDeClientesGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the EstadisticaDeClientes subclass which
	 * extends this EstadisticaDeClientesGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the EstadisticaDeClientes class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $ClienteId the value for intClienteId (PK)
	 * @property QDateTime $FechaPrimeraGuia the value for dttFechaPrimeraGuia 
	 * @property QDateTime $FechaUltimaGuia the value for dttFechaUltimaGuia 
	 * @property double $PesoTotal the value for fltPesoTotal 
	 * @property integer $CantidadGuias the value for intCantidadGuias 
	 * @property double $VentaTotal the value for fltVentaTotal 
	 * @property MasterCliente $Cliente the value for the MasterCliente object referenced by intClienteId (PK)
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class EstadisticaDeClientesGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK column estadistica_de_clientes.cliente_id
		 * @var integer intClienteId
		 */
		protected $intClienteId;
		const ClienteIdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intClienteId;
		 */
		protected $__intClienteId;

		/**
		 * Protected member variable that maps to the database column estadistica_de_clientes.fecha_primera_guia
		 * @var QDateTime dttFechaPrimeraGuia
		 */
		protected $dttFechaPrimeraGuia;
		const FechaPrimeraGuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_clientes.fecha_ultima_guia
		 * @var QDateTime dttFechaUltimaGuia
		 */
		protected $dttFechaUltimaGuia;
		const FechaUltimaGuiaDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_clientes.peso_total
		 * @var double fltPesoTotal
		 */
		protected $fltPesoTotal;
		const PesoTotalDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_clientes.cantidad_guias
		 * @var integer intCantidadGuias
		 */
		protected $intCantidadGuias;
		const CantidadGuiasDefault = null;


		/**
		 * Protected member variable that maps to the database column estadistica_de_clientes.venta_total
		 * @var double fltVentaTotal
		 */
		protected $fltVentaTotal;
		const VentaTotalDefault = null;


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
		 * in the database column estadistica_de_clientes.cliente_id.
		 *
		 * NOTE: Always use the Cliente property getter to correctly retrieve this MasterCliente object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var MasterCliente objCliente
		 */
		protected $objCliente;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intClienteId = EstadisticaDeClientes::ClienteIdDefault;
			$this->dttFechaPrimeraGuia = (EstadisticaDeClientes::FechaPrimeraGuiaDefault === null)?null:new QDateTime(EstadisticaDeClientes::FechaPrimeraGuiaDefault);
			$this->dttFechaUltimaGuia = (EstadisticaDeClientes::FechaUltimaGuiaDefault === null)?null:new QDateTime(EstadisticaDeClientes::FechaUltimaGuiaDefault);
			$this->fltPesoTotal = EstadisticaDeClientes::PesoTotalDefault;
			$this->intCantidadGuias = EstadisticaDeClientes::CantidadGuiasDefault;
			$this->fltVentaTotal = EstadisticaDeClientes::VentaTotalDefault;
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
		 * Load a EstadisticaDeClientes from PK Info
		 * @param integer $intClienteId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EstadisticaDeClientes
		 */
		public static function Load($intClienteId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'EstadisticaDeClientes', $intClienteId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = EstadisticaDeClientes::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::EstadisticaDeClientes()->ClienteId, $intClienteId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all EstadisticaDeClienteses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EstadisticaDeClientes[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call EstadisticaDeClientes::QueryArray to perform the LoadAll query
			try {
				return EstadisticaDeClientes::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all EstadisticaDeClienteses
		 * @return int
		 */
		public static function CountAll() {
			// Call EstadisticaDeClientes::QueryCount to perform the CountAll query
			return EstadisticaDeClientes::QueryCount(QQ::All());
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
			$objDatabase = EstadisticaDeClientes::GetDatabase();

			// Create/Build out the QueryBuilder object with EstadisticaDeClientes-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'estadistica_de_clientes');

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
				EstadisticaDeClientes::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('estadistica_de_clientes');

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
		 * Static Qcubed Query method to query for a single EstadisticaDeClientes object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EstadisticaDeClientes the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EstadisticaDeClientes::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new EstadisticaDeClientes object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = EstadisticaDeClientes::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intClienteId][] = $objItem;
		
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
				return EstadisticaDeClientes::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of EstadisticaDeClientes objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return EstadisticaDeClientes[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EstadisticaDeClientes::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return EstadisticaDeClientes::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = EstadisticaDeClientes::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of EstadisticaDeClientes objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = EstadisticaDeClientes::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = EstadisticaDeClientes::GetDatabase();

			$strQuery = EstadisticaDeClientes::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/estadisticadeclientes', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = EstadisticaDeClientes::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this EstadisticaDeClientes
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'estadistica_de_clientes';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'cliente_id', $strAliasPrefix . 'cliente_id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'cliente_id', $strAliasPrefix . 'cliente_id');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_primera_guia', $strAliasPrefix . 'fecha_primera_guia');
			    $objBuilder->AddSelectItem($strTableName, 'fecha_ultima_guia', $strAliasPrefix . 'fecha_ultima_guia');
			    $objBuilder->AddSelectItem($strTableName, 'peso_total', $strAliasPrefix . 'peso_total');
			    $objBuilder->AddSelectItem($strTableName, 'cantidad_guias', $strAliasPrefix . 'cantidad_guias');
			    $objBuilder->AddSelectItem($strTableName, 'venta_total', $strAliasPrefix . 'venta_total');
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
			
			$strAlias = $strAliasPrefix . 'cliente_id';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intClienteId != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a EstadisticaDeClientes from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this EstadisticaDeClientes::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a EstadisticaDeClientes, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['cliente_id']) ? $strColumnAliasArray['cliente_id'] : 'cliente_id';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (EstadisticaDeClientes::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the EstadisticaDeClientes object
			$objToReturn = new EstadisticaDeClientes();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'cliente_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intClienteId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intClienteId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'fecha_primera_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaPrimeraGuia = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'fecha_ultima_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechaUltimaGuia = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'peso_total';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltPesoTotal = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'cantidad_guias';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantidadGuias = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'venta_total';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltVentaTotal = $objDbRow->GetColumn($strAliasName, 'Float');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->ClienteId != $objPreviousItem->ClienteId) {
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
				$strAliasPrefix = 'estadistica_de_clientes__';

			// Check for Cliente Early Binding
			$strAlias = $strAliasPrefix . 'cliente_id__codi_clie';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['cliente_id']) ? null : $objExpansionAliasArray['cliente_id']);
				$objToReturn->objCliente = MasterCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cliente_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of EstadisticaDeClienteses from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return EstadisticaDeClientes[]
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
					$objItem = EstadisticaDeClientes::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intClienteId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = EstadisticaDeClientes::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single EstadisticaDeClientes object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return EstadisticaDeClientes next row resulting from the query
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
			return EstadisticaDeClientes::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single EstadisticaDeClientes object,
		 * by ClienteId Index(es)
		 * @param integer $intClienteId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return EstadisticaDeClientes
		*/
		public static function LoadByClienteId($intClienteId, $objOptionalClauses = null) {
			return EstadisticaDeClientes::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::EstadisticaDeClientes()->ClienteId, $intClienteId)
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
		 * Save this EstadisticaDeClientes
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = EstadisticaDeClientes::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `estadistica_de_clientes` (
							`cliente_id`,
							`fecha_primera_guia`,
							`fecha_ultima_guia`,
							`peso_total`,
							`cantidad_guias`,
							`venta_total`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intClienteId) . ',
							' . $objDatabase->SqlVariable($this->dttFechaPrimeraGuia) . ',
							' . $objDatabase->SqlVariable($this->dttFechaUltimaGuia) . ',
							' . $objDatabase->SqlVariable($this->fltPesoTotal) . ',
							' . $objDatabase->SqlVariable($this->intCantidadGuias) . ',
							' . $objDatabase->SqlVariable($this->fltVentaTotal) . '
						)
					');


				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`estadistica_de_clientes`
						SET
							`cliente_id` = ' . $objDatabase->SqlVariable($this->intClienteId) . ',
							`fecha_primera_guia` = ' . $objDatabase->SqlVariable($this->dttFechaPrimeraGuia) . ',
							`fecha_ultima_guia` = ' . $objDatabase->SqlVariable($this->dttFechaUltimaGuia) . ',
							`peso_total` = ' . $objDatabase->SqlVariable($this->fltPesoTotal) . ',
							`cantidad_guias` = ' . $objDatabase->SqlVariable($this->intCantidadGuias) . ',
							`venta_total` = ' . $objDatabase->SqlVariable($this->fltVentaTotal) . '
						WHERE
							`cliente_id` = ' . $objDatabase->SqlVariable($this->__intClienteId) . '
					');
				}
					

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;
			$this->__intClienteId = $this->intClienteId;


			$this->DeleteCache();

			// Return
			return $mixToReturn;
		}

		/**
		 * Delete this EstadisticaDeClientes
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intClienteId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this EstadisticaDeClientes with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = EstadisticaDeClientes::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estadistica_de_clientes`
				WHERE
					`cliente_id` = ' . $objDatabase->SqlVariable($this->intClienteId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this EstadisticaDeClientes ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'EstadisticaDeClientes', $this->intClienteId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all EstadisticaDeClienteses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = EstadisticaDeClientes::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estadistica_de_clientes`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate estadistica_de_clientes table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = EstadisticaDeClientes::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `estadistica_de_clientes`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this EstadisticaDeClientes from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved EstadisticaDeClientes object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = EstadisticaDeClientes::Load($this->intClienteId);

			// Update $this's local variables to match
			$this->ClienteId = $objReloaded->ClienteId;
			$this->__intClienteId = $this->intClienteId;
			$this->dttFechaPrimeraGuia = $objReloaded->dttFechaPrimeraGuia;
			$this->dttFechaUltimaGuia = $objReloaded->dttFechaUltimaGuia;
			$this->fltPesoTotal = $objReloaded->fltPesoTotal;
			$this->intCantidadGuias = $objReloaded->intCantidadGuias;
			$this->fltVentaTotal = $objReloaded->fltVentaTotal;
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
				case 'ClienteId':
					/**
					 * Gets the value for intClienteId (PK)
					 * @return integer
					 */
					return $this->intClienteId;

				case 'FechaPrimeraGuia':
					/**
					 * Gets the value for dttFechaPrimeraGuia 
					 * @return QDateTime
					 */
					return $this->dttFechaPrimeraGuia;

				case 'FechaUltimaGuia':
					/**
					 * Gets the value for dttFechaUltimaGuia 
					 * @return QDateTime
					 */
					return $this->dttFechaUltimaGuia;

				case 'PesoTotal':
					/**
					 * Gets the value for fltPesoTotal 
					 * @return double
					 */
					return $this->fltPesoTotal;

				case 'CantidadGuias':
					/**
					 * Gets the value for intCantidadGuias 
					 * @return integer
					 */
					return $this->intCantidadGuias;

				case 'VentaTotal':
					/**
					 * Gets the value for fltVentaTotal 
					 * @return double
					 */
					return $this->fltVentaTotal;


				///////////////////
				// Member Objects
				///////////////////
				case 'Cliente':
					/**
					 * Gets the value for the MasterCliente object referenced by intClienteId (PK)
					 * @return MasterCliente
					 */
					try {
						if ((!$this->objCliente) && (!is_null($this->intClienteId)))
							$this->objCliente = MasterCliente::Load($this->intClienteId);
						return $this->objCliente;
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
					 * Sets the value for intClienteId (PK)
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

				case 'FechaPrimeraGuia':
					/**
					 * Sets the value for dttFechaPrimeraGuia 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaPrimeraGuia = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechaUltimaGuia':
					/**
					 * Sets the value for dttFechaUltimaGuia 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechaUltimaGuia = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PesoTotal':
					/**
					 * Sets the value for fltPesoTotal 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltPesoTotal = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CantidadGuias':
					/**
					 * Sets the value for intCantidadGuias 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantidadGuias = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'VentaTotal':
					/**
					 * Sets the value for fltVentaTotal 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltVentaTotal = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Cliente':
					/**
					 * Sets the value for the MasterCliente object referenced by intClienteId (PK)
					 * @param MasterCliente $mixValue
					 * @return MasterCliente
					 */
					if (is_null($mixValue)) {
						$this->intClienteId = null;
						$this->objCliente = null;
						return null;
					} else {
						// Make sure $mixValue actually is a MasterCliente object
						try {
							$mixValue = QType::Cast($mixValue, 'MasterCliente');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED MasterCliente object
						if (is_null($mixValue->CodiClie))
							throw new QCallerException('Unable to set an unsaved Cliente for this EstadisticaDeClientes');

						// Update Local Member Variables
						$this->objCliente = $mixValue;
						$this->intClienteId = $mixValue->CodiClie;

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
			return "estadistica_de_clientes";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[EstadisticaDeClientes::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="EstadisticaDeClientes"><sequence>';
			$strToReturn .= '<element name="Cliente" type="xsd1:MasterCliente"/>';
			$strToReturn .= '<element name="FechaPrimeraGuia" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="FechaUltimaGuia" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="PesoTotal" type="xsd:float"/>';
			$strToReturn .= '<element name="CantidadGuias" type="xsd:int"/>';
			$strToReturn .= '<element name="VentaTotal" type="xsd:float"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('EstadisticaDeClientes', $strComplexTypeArray)) {
				$strComplexTypeArray['EstadisticaDeClientes'] = EstadisticaDeClientes::GetSoapComplexTypeXml();
				MasterCliente::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, EstadisticaDeClientes::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new EstadisticaDeClientes();
			if ((property_exists($objSoapObject, 'Cliente')) &&
				($objSoapObject->Cliente))
				$objToReturn->Cliente = MasterCliente::GetObjectFromSoapObject($objSoapObject->Cliente);
			if (property_exists($objSoapObject, 'FechaPrimeraGuia'))
				$objToReturn->dttFechaPrimeraGuia = new QDateTime($objSoapObject->FechaPrimeraGuia);
			if (property_exists($objSoapObject, 'FechaUltimaGuia'))
				$objToReturn->dttFechaUltimaGuia = new QDateTime($objSoapObject->FechaUltimaGuia);
			if (property_exists($objSoapObject, 'PesoTotal'))
				$objToReturn->fltPesoTotal = $objSoapObject->PesoTotal;
			if (property_exists($objSoapObject, 'CantidadGuias'))
				$objToReturn->intCantidadGuias = $objSoapObject->CantidadGuias;
			if (property_exists($objSoapObject, 'VentaTotal'))
				$objToReturn->fltVentaTotal = $objSoapObject->VentaTotal;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, EstadisticaDeClientes::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCliente)
				$objObject->objCliente = MasterCliente::GetSoapObjectFromObject($objObject->objCliente, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intClienteId = null;
			if ($objObject->dttFechaPrimeraGuia)
				$objObject->dttFechaPrimeraGuia = $objObject->dttFechaPrimeraGuia->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechaUltimaGuia)
				$objObject->dttFechaUltimaGuia = $objObject->dttFechaUltimaGuia->qFormat(QDateTime::FormatSoap);
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
			$iArray['ClienteId'] = $this->intClienteId;
			$iArray['FechaPrimeraGuia'] = $this->dttFechaPrimeraGuia;
			$iArray['FechaUltimaGuia'] = $this->dttFechaUltimaGuia;
			$iArray['PesoTotal'] = $this->fltPesoTotal;
			$iArray['CantidadGuias'] = $this->intCantidadGuias;
			$iArray['VentaTotal'] = $this->fltVentaTotal;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intClienteId ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $ClienteId
     * @property-read QQNodeMasterCliente $Cliente
     * @property-read QQNode $FechaPrimeraGuia
     * @property-read QQNode $FechaUltimaGuia
     * @property-read QQNode $PesoTotal
     * @property-read QQNode $CantidadGuias
     * @property-read QQNode $VentaTotal
     *
     *

     * @property-read QQNodeMasterCliente $_PrimaryKeyNode
     **/
	class QQNodeEstadisticaDeClientes extends QQNode {
		protected $strTableName = 'estadistica_de_clientes';
		protected $strPrimaryKey = 'cliente_id';
		protected $strClassName = 'EstadisticaDeClientes';
		public function __get($strName) {
			switch ($strName) {
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'Integer', $this);
				case 'Cliente':
					return new QQNodeMasterCliente('cliente_id', 'Cliente', 'Integer', $this);
				case 'FechaPrimeraGuia':
					return new QQNode('fecha_primera_guia', 'FechaPrimeraGuia', 'Date', $this);
				case 'FechaUltimaGuia':
					return new QQNode('fecha_ultima_guia', 'FechaUltimaGuia', 'Date', $this);
				case 'PesoTotal':
					return new QQNode('peso_total', 'PesoTotal', 'Float', $this);
				case 'CantidadGuias':
					return new QQNode('cantidad_guias', 'CantidadGuias', 'Integer', $this);
				case 'VentaTotal':
					return new QQNode('venta_total', 'VentaTotal', 'Float', $this);

				case '_PrimaryKeyNode':
					return new QQNodeMasterCliente('cliente_id', 'ClienteId', 'Integer', $this);
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
     * @property-read QQNode $ClienteId
     * @property-read QQNodeMasterCliente $Cliente
     * @property-read QQNode $FechaPrimeraGuia
     * @property-read QQNode $FechaUltimaGuia
     * @property-read QQNode $PesoTotal
     * @property-read QQNode $CantidadGuias
     * @property-read QQNode $VentaTotal
     *
     *

     * @property-read QQNodeMasterCliente $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeEstadisticaDeClientes extends QQReverseReferenceNode {
		protected $strTableName = 'estadistica_de_clientes';
		protected $strPrimaryKey = 'cliente_id';
		protected $strClassName = 'EstadisticaDeClientes';
		public function __get($strName) {
			switch ($strName) {
				case 'ClienteId':
					return new QQNode('cliente_id', 'ClienteId', 'integer', $this);
				case 'Cliente':
					return new QQNodeMasterCliente('cliente_id', 'Cliente', 'integer', $this);
				case 'FechaPrimeraGuia':
					return new QQNode('fecha_primera_guia', 'FechaPrimeraGuia', 'QDateTime', $this);
				case 'FechaUltimaGuia':
					return new QQNode('fecha_ultima_guia', 'FechaUltimaGuia', 'QDateTime', $this);
				case 'PesoTotal':
					return new QQNode('peso_total', 'PesoTotal', 'double', $this);
				case 'CantidadGuias':
					return new QQNode('cantidad_guias', 'CantidadGuias', 'integer', $this);
				case 'VentaTotal':
					return new QQNode('venta_total', 'VentaTotal', 'double', $this);

				case '_PrimaryKeyNode':
					return new QQNodeMasterCliente('cliente_id', 'ClienteId', 'integer', $this);
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
