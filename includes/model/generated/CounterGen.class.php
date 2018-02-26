<?php
	/**
	 * The abstract CounterGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Counter subclass which
	 * extends this CounterGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Counter class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $Id the value for intId (Read-Only PK)
	 * @property string $Descripcion the value for strDescripcion (Not Null)
	 * @property string $SucursalId the value for strSucursalId (Not Null)
	 * @property string $RutaId the value for strRutaId (Not Null)
	 * @property integer $EntregaInmediata the value for intEntregaInmediata 
	 * @property string $Siglas the value for strSiglas (Unique)
	 * @property integer $LimiteDePaquetes the value for intLimiteDePaquetes 
	 * @property integer $CantidadDePaquetes the value for intCantidadDePaquetes 
	 * @property string $CkptRecepcion the value for strCkptRecepcion 
	 * @property string $CkptConfirmacion the value for strCkptConfirmacion 
	 * @property string $CkptAlmacen the value for strCkptAlmacen 
	 * @property integer $PaisId the value for intPaisId 
	 * @property integer $StatusId the value for intStatusId 
	 * @property string $Direccion the value for strDireccion 
	 * @property integer $ElegirServicio the value for intElegirServicio 
	 * @property integer $EsRuta the value for intEsRuta 
	 * @property integer $SeFactura the value for intSeFactura 
	 * @property integer $PermitePago the value for intPermitePago 
	 * @property string $EmailJefeAlmacen the value for strEmailJefeAlmacen 
	 * @property string $CkptAntiguedad1 the value for strCkptAntiguedad1 
	 * @property string $CkptAntiguedad2 the value for strCkptAntiguedad2 
	 * @property string $CkptAntiguedad0 the value for strCkptAntiguedad0 
	 * @property integer $AliadoComercialId the value for intAliadoComercialId 
	 * @property double $LimiteKilos the value for fltLimiteKilos 
	 * @property integer $DependeDe the value for intDependeDe 
	 * @property boolean $DomOrigen the value for blnDomOrigen 
	 * @property boolean $DomDestino the value for blnDomDestino 
	 * @property Estacion $Sucursal the value for the Estacion object referenced by strSucursalId (Not Null)
	 * @property Ruta $Ruta the value for the Ruta object referenced by strRutaId (Not Null)
	 * @property AliadoComercial $AliadoComercial the value for the AliadoComercial object referenced by intAliadoComercialId 
	 * @property-read Caja $_Caja the value for the private _objCaja (Read-Only) if set due to an expansion on the caja.counter_id reverse relationship
	 * @property-read Caja[] $_CajaArray the value for the private _objCajaArray (Read-Only) if set due to an ExpandAsArray on the caja.counter_id reverse relationship
	 * @property-read Cajero $_Cajero the value for the private _objCajero (Read-Only) if set due to an expansion on the cajero.counter_id reverse relationship
	 * @property-read Cajero[] $_CajeroArray the value for the private _objCajeroArray (Read-Only) if set due to an ExpandAsArray on the cajero.counter_id reverse relationship
	 * @property-read Estacion $_EstacionAsSeFacturaEn the value for the private _objEstacionAsSeFacturaEn (Read-Only) if set due to an expansion on the estacion.se_factura_en reverse relationship
	 * @property-read Estacion[] $_EstacionAsSeFacturaEnArray the value for the private _objEstacionAsSeFacturaEnArray (Read-Only) if set due to an ExpandAsArray on the estacion.se_factura_en reverse relationship
	 * @property-read NotaCredito $_NotaCreditoAsReceptoria the value for the private _objNotaCreditoAsReceptoria (Read-Only) if set due to an expansion on the nota_credito.receptoria_id reverse relationship
	 * @property-read NotaCredito[] $_NotaCreditoAsReceptoriaArray the value for the private _objNotaCreditoAsReceptoriaArray (Read-Only) if set due to an ExpandAsArray on the nota_credito.receptoria_id reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class CounterGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column counter.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.descripcion
		 * @var string strDescripcion
		 */
		protected $strDescripcion;
		const DescripcionMaxLength = 50;
		const DescripcionDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.sucursal_id
		 * @var string strSucursalId
		 */
		protected $strSucursalId;
		const SucursalIdMaxLength = 20;
		const SucursalIdDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.ruta_id
		 * @var string strRutaId
		 */
		protected $strRutaId;
		const RutaIdMaxLength = 20;
		const RutaIdDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.entrega_inmediata
		 * @var integer intEntregaInmediata
		 */
		protected $intEntregaInmediata;
		const EntregaInmediataDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.siglas
		 * @var string strSiglas
		 */
		protected $strSiglas;
		const SiglasMaxLength = 5;
		const SiglasDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.limite_de_paquetes
		 * @var integer intLimiteDePaquetes
		 */
		protected $intLimiteDePaquetes;
		const LimiteDePaquetesDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.cantidad_de_paquetes
		 * @var integer intCantidadDePaquetes
		 */
		protected $intCantidadDePaquetes;
		const CantidadDePaquetesDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.ckpt_recepcion
		 * @var string strCkptRecepcion
		 */
		protected $strCkptRecepcion;
		const CkptRecepcionMaxLength = 2;
		const CkptRecepcionDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.ckpt_confirmacion
		 * @var string strCkptConfirmacion
		 */
		protected $strCkptConfirmacion;
		const CkptConfirmacionMaxLength = 2;
		const CkptConfirmacionDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.ckpt_almacen
		 * @var string strCkptAlmacen
		 */
		protected $strCkptAlmacen;
		const CkptAlmacenMaxLength = 2;
		const CkptAlmacenDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.pais_id
		 * @var integer intPaisId
		 */
		protected $intPaisId;
		const PaisIdDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.status_id
		 * @var integer intStatusId
		 */
		protected $intStatusId;
		const StatusIdDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.direccion
		 * @var string strDireccion
		 */
		protected $strDireccion;
		const DireccionMaxLength = 250;
		const DireccionDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.elegir_servicio
		 * @var integer intElegirServicio
		 */
		protected $intElegirServicio;
		const ElegirServicioDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.es_ruta
		 * @var integer intEsRuta
		 */
		protected $intEsRuta;
		const EsRutaDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.se_factura
		 * @var integer intSeFactura
		 */
		protected $intSeFactura;
		const SeFacturaDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.permite_pago
		 * @var integer intPermitePago
		 */
		protected $intPermitePago;
		const PermitePagoDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.email_jefe_almacen
		 * @var string strEmailJefeAlmacen
		 */
		protected $strEmailJefeAlmacen;
		const EmailJefeAlmacenMaxLength = 150;
		const EmailJefeAlmacenDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.ckpt_antiguedad1
		 * @var string strCkptAntiguedad1
		 */
		protected $strCkptAntiguedad1;
		const CkptAntiguedad1MaxLength = 2;
		const CkptAntiguedad1Default = null;


		/**
		 * Protected member variable that maps to the database column counter.ckpt_antiguedad2
		 * @var string strCkptAntiguedad2
		 */
		protected $strCkptAntiguedad2;
		const CkptAntiguedad2MaxLength = 2;
		const CkptAntiguedad2Default = null;


		/**
		 * Protected member variable that maps to the database column counter.ckpt_antiguedad0
		 * @var string strCkptAntiguedad0
		 */
		protected $strCkptAntiguedad0;
		const CkptAntiguedad0MaxLength = 2;
		const CkptAntiguedad0Default = null;


		/**
		 * Protected member variable that maps to the database column counter.aliado_comercial_id
		 * @var integer intAliadoComercialId
		 */
		protected $intAliadoComercialId;
		const AliadoComercialIdDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.limite_kilos
		 * @var double fltLimiteKilos
		 */
		protected $fltLimiteKilos;
		const LimiteKilosDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.depende_de
		 * @var integer intDependeDe
		 */
		protected $intDependeDe;
		const DependeDeDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.dom_origen
		 * @var boolean blnDomOrigen
		 */
		protected $blnDomOrigen;
		const DomOrigenDefault = null;


		/**
		 * Protected member variable that maps to the database column counter.dom_destino
		 * @var boolean blnDomDestino
		 */
		protected $blnDomDestino;
		const DomDestinoDefault = null;


		/**
		 * Private member variable that stores a reference to a single Caja object
		 * (of type Caja), if this Counter object was restored with
		 * an expansion on the caja association table.
		 * @var Caja _objCaja;
		 */
		private $_objCaja;

		/**
		 * Private member variable that stores a reference to an array of Caja objects
		 * (of type Caja[]), if this Counter object was restored with
		 * an ExpandAsArray on the caja association table.
		 * @var Caja[] _objCajaArray;
		 */
		private $_objCajaArray = null;

		/**
		 * Private member variable that stores a reference to a single Cajero object
		 * (of type Cajero), if this Counter object was restored with
		 * an expansion on the cajero association table.
		 * @var Cajero _objCajero;
		 */
		private $_objCajero;

		/**
		 * Private member variable that stores a reference to an array of Cajero objects
		 * (of type Cajero[]), if this Counter object was restored with
		 * an ExpandAsArray on the cajero association table.
		 * @var Cajero[] _objCajeroArray;
		 */
		private $_objCajeroArray = null;

		/**
		 * Private member variable that stores a reference to a single EstacionAsSeFacturaEn object
		 * (of type Estacion), if this Counter object was restored with
		 * an expansion on the estacion association table.
		 * @var Estacion _objEstacionAsSeFacturaEn;
		 */
		private $_objEstacionAsSeFacturaEn;

		/**
		 * Private member variable that stores a reference to an array of EstacionAsSeFacturaEn objects
		 * (of type Estacion[]), if this Counter object was restored with
		 * an ExpandAsArray on the estacion association table.
		 * @var Estacion[] _objEstacionAsSeFacturaEnArray;
		 */
		private $_objEstacionAsSeFacturaEnArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaCreditoAsReceptoria object
		 * (of type NotaCredito), if this Counter object was restored with
		 * an expansion on the nota_credito association table.
		 * @var NotaCredito _objNotaCreditoAsReceptoria;
		 */
		private $_objNotaCreditoAsReceptoria;

		/**
		 * Private member variable that stores a reference to an array of NotaCreditoAsReceptoria objects
		 * (of type NotaCredito[]), if this Counter object was restored with
		 * an ExpandAsArray on the nota_credito association table.
		 * @var NotaCredito[] _objNotaCreditoAsReceptoriaArray;
		 */
		private $_objNotaCreditoAsReceptoriaArray = null;

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
		 * in the database column counter.sucursal_id.
		 *
		 * NOTE: Always use the Sucursal property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objSucursal
		 */
		protected $objSucursal;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column counter.ruta_id.
		 *
		 * NOTE: Always use the Ruta property getter to correctly retrieve this Ruta object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Ruta objRuta
		 */
		protected $objRuta;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column counter.aliado_comercial_id.
		 *
		 * NOTE: Always use the AliadoComercial property getter to correctly retrieve this AliadoComercial object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var AliadoComercial objAliadoComercial
		 */
		protected $objAliadoComercial;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intId = Counter::IdDefault;
			$this->strDescripcion = Counter::DescripcionDefault;
			$this->strSucursalId = Counter::SucursalIdDefault;
			$this->strRutaId = Counter::RutaIdDefault;
			$this->intEntregaInmediata = Counter::EntregaInmediataDefault;
			$this->strSiglas = Counter::SiglasDefault;
			$this->intLimiteDePaquetes = Counter::LimiteDePaquetesDefault;
			$this->intCantidadDePaquetes = Counter::CantidadDePaquetesDefault;
			$this->strCkptRecepcion = Counter::CkptRecepcionDefault;
			$this->strCkptConfirmacion = Counter::CkptConfirmacionDefault;
			$this->strCkptAlmacen = Counter::CkptAlmacenDefault;
			$this->intPaisId = Counter::PaisIdDefault;
			$this->intStatusId = Counter::StatusIdDefault;
			$this->strDireccion = Counter::DireccionDefault;
			$this->intElegirServicio = Counter::ElegirServicioDefault;
			$this->intEsRuta = Counter::EsRutaDefault;
			$this->intSeFactura = Counter::SeFacturaDefault;
			$this->intPermitePago = Counter::PermitePagoDefault;
			$this->strEmailJefeAlmacen = Counter::EmailJefeAlmacenDefault;
			$this->strCkptAntiguedad1 = Counter::CkptAntiguedad1Default;
			$this->strCkptAntiguedad2 = Counter::CkptAntiguedad2Default;
			$this->strCkptAntiguedad0 = Counter::CkptAntiguedad0Default;
			$this->intAliadoComercialId = Counter::AliadoComercialIdDefault;
			$this->fltLimiteKilos = Counter::LimiteKilosDefault;
			$this->intDependeDe = Counter::DependeDeDefault;
			$this->blnDomOrigen = Counter::DomOrigenDefault;
			$this->blnDomDestino = Counter::DomDestinoDefault;
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
		 * Load a Counter from PK Info
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter
		 */
		public static function Load($intId, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Counter', $intId);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Counter::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Counter()->Id, $intId)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Counters
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Counter::QueryArray to perform the LoadAll query
			try {
				return Counter::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Counters
		 * @return int
		 */
		public static function CountAll() {
			// Call Counter::QueryCount to perform the CountAll query
			return Counter::QueryCount(QQ::All());
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
			$objDatabase = Counter::GetDatabase();

			// Create/Build out the QueryBuilder object with Counter-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'counter');

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
				Counter::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('counter');

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
		 * Static Qcubed Query method to query for a single Counter object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Counter the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Counter::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Counter object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Counter::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
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
				return Counter::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Counter objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Counter[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Counter::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Counter::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Counter::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Counter objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Counter::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Counter::GetDatabase();

			$strQuery = Counter::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/counter', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Counter::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Counter
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'counter';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			    $objBuilder->AddSelectItem($strTableName, 'descripcion', $strAliasPrefix . 'descripcion');
			    $objBuilder->AddSelectItem($strTableName, 'sucursal_id', $strAliasPrefix . 'sucursal_id');
			    $objBuilder->AddSelectItem($strTableName, 'ruta_id', $strAliasPrefix . 'ruta_id');
			    $objBuilder->AddSelectItem($strTableName, 'entrega_inmediata', $strAliasPrefix . 'entrega_inmediata');
			    $objBuilder->AddSelectItem($strTableName, 'siglas', $strAliasPrefix . 'siglas');
			    $objBuilder->AddSelectItem($strTableName, 'limite_de_paquetes', $strAliasPrefix . 'limite_de_paquetes');
			    $objBuilder->AddSelectItem($strTableName, 'cantidad_de_paquetes', $strAliasPrefix . 'cantidad_de_paquetes');
			    $objBuilder->AddSelectItem($strTableName, 'ckpt_recepcion', $strAliasPrefix . 'ckpt_recepcion');
			    $objBuilder->AddSelectItem($strTableName, 'ckpt_confirmacion', $strAliasPrefix . 'ckpt_confirmacion');
			    $objBuilder->AddSelectItem($strTableName, 'ckpt_almacen', $strAliasPrefix . 'ckpt_almacen');
			    $objBuilder->AddSelectItem($strTableName, 'pais_id', $strAliasPrefix . 'pais_id');
			    $objBuilder->AddSelectItem($strTableName, 'status_id', $strAliasPrefix . 'status_id');
			    $objBuilder->AddSelectItem($strTableName, 'direccion', $strAliasPrefix . 'direccion');
			    $objBuilder->AddSelectItem($strTableName, 'elegir_servicio', $strAliasPrefix . 'elegir_servicio');
			    $objBuilder->AddSelectItem($strTableName, 'es_ruta', $strAliasPrefix . 'es_ruta');
			    $objBuilder->AddSelectItem($strTableName, 'se_factura', $strAliasPrefix . 'se_factura');
			    $objBuilder->AddSelectItem($strTableName, 'permite_pago', $strAliasPrefix . 'permite_pago');
			    $objBuilder->AddSelectItem($strTableName, 'email_jefe_almacen', $strAliasPrefix . 'email_jefe_almacen');
			    $objBuilder->AddSelectItem($strTableName, 'ckpt_antiguedad1', $strAliasPrefix . 'ckpt_antiguedad1');
			    $objBuilder->AddSelectItem($strTableName, 'ckpt_antiguedad2', $strAliasPrefix . 'ckpt_antiguedad2');
			    $objBuilder->AddSelectItem($strTableName, 'ckpt_antiguedad0', $strAliasPrefix . 'ckpt_antiguedad0');
			    $objBuilder->AddSelectItem($strTableName, 'aliado_comercial_id', $strAliasPrefix . 'aliado_comercial_id');
			    $objBuilder->AddSelectItem($strTableName, 'limite_kilos', $strAliasPrefix . 'limite_kilos');
			    $objBuilder->AddSelectItem($strTableName, 'depende_de', $strAliasPrefix . 'depende_de');
			    $objBuilder->AddSelectItem($strTableName, 'dom_origen', $strAliasPrefix . 'dom_origen');
			    $objBuilder->AddSelectItem($strTableName, 'dom_destino', $strAliasPrefix . 'dom_destino');
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
		 * Instantiate a Counter from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Counter::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Counter, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
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

				if (Counter::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Counter object
			$objToReturn = new Counter();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'descripcion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDescripcion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'sucursal_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSucursalId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ruta_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strRutaId = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'entrega_inmediata';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intEntregaInmediata = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'siglas';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strSiglas = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'limite_de_paquetes';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intLimiteDePaquetes = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cantidad_de_paquetes';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantidadDePaquetes = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'ckpt_recepcion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCkptRecepcion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ckpt_confirmacion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCkptConfirmacion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ckpt_almacen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCkptAlmacen = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'pais_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPaisId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'status_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intStatusId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'direccion';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strDireccion = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'elegir_servicio';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intElegirServicio = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'es_ruta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intEsRuta = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'se_factura';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intSeFactura = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'permite_pago';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intPermitePago = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'email_jefe_almacen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strEmailJefeAlmacen = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ckpt_antiguedad1';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCkptAntiguedad1 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ckpt_antiguedad2';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCkptAntiguedad2 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'ckpt_antiguedad0';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCkptAntiguedad0 = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'aliado_comercial_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intAliadoComercialId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'limite_kilos';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->fltLimiteKilos = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAlias = $strAliasPrefix . 'depende_de';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intDependeDe = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'dom_origen';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnDomOrigen = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'dom_destino';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnDomDestino = $objDbRow->GetColumn($strAliasName, 'Bit');

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
				$strAliasPrefix = 'counter__';

			// Check for Sucursal Early Binding
			$strAlias = $strAliasPrefix . 'sucursal_id__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['sucursal_id']) ? null : $objExpansionAliasArray['sucursal_id']);
				$objToReturn->objSucursal = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sucursal_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Ruta Early Binding
			$strAlias = $strAliasPrefix . 'ruta_id__codi_ruta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['ruta_id']) ? null : $objExpansionAliasArray['ruta_id']);
				$objToReturn->objRuta = Ruta::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ruta_id__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for AliadoComercial Early Binding
			$strAlias = $strAliasPrefix . 'aliado_comercial_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['aliado_comercial_id']) ? null : $objExpansionAliasArray['aliado_comercial_id']);
				$objToReturn->objAliadoComercial = AliadoComercial::InstantiateDbRow($objDbRow, $strAliasPrefix . 'aliado_comercial_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

				

			// Check for Caja Virtual Binding
			$strAlias = $strAliasPrefix . 'caja__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['caja']) ? null : $objExpansionAliasArray['caja']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCajaArray)
				$objToReturn->_objCajaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCajaArray[] = Caja::InstantiateDbRow($objDbRow, $strAliasPrefix . 'caja__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCaja)) {
					$objToReturn->_objCaja = Caja::InstantiateDbRow($objDbRow, $strAliasPrefix . 'caja__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for Cajero Virtual Binding
			$strAlias = $strAliasPrefix . 'cajero__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['cajero']) ? null : $objExpansionAliasArray['cajero']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objCajeroArray)
				$objToReturn->_objCajeroArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objCajeroArray[] = Cajero::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cajero__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objCajero)) {
					$objToReturn->_objCajero = Cajero::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cajero__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for EstacionAsSeFacturaEn Virtual Binding
			$strAlias = $strAliasPrefix . 'estacionassefacturaen__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['estacionassefacturaen']) ? null : $objExpansionAliasArray['estacionassefacturaen']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objEstacionAsSeFacturaEnArray)
				$objToReturn->_objEstacionAsSeFacturaEnArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objEstacionAsSeFacturaEnArray[] = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estacionassefacturaen__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objEstacionAsSeFacturaEn)) {
					$objToReturn->_objEstacionAsSeFacturaEn = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'estacionassefacturaen__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaCreditoAsReceptoria Virtual Binding
			$strAlias = $strAliasPrefix . 'notacreditoasreceptoria__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notacreditoasreceptoria']) ? null : $objExpansionAliasArray['notacreditoasreceptoria']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaCreditoAsReceptoriaArray)
				$objToReturn->_objNotaCreditoAsReceptoriaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaCreditoAsReceptoriaArray[] = NotaCredito::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditoasreceptoria__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaCreditoAsReceptoria)) {
					$objToReturn->_objNotaCreditoAsReceptoria = NotaCredito::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditoasreceptoria__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Counters from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Counter[]
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
					$objItem = Counter::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intId][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Counter::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Counter object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Counter next row resulting from the query
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
			return Counter::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Counter object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Counter::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Counter()->Id, $intId)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Counter object,
		 * by Siglas Index(es)
		 * @param string $strSiglas
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter
		*/
		public static function LoadBySiglas($strSiglas, $objOptionalClauses = null) {
			return Counter::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Counter()->Siglas, $strSiglas)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayBySucursalId($strSucursalId, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayBySucursalId query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->SucursalId, $strSucursalId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by SucursalId Index(es)
		 * @param string $strSucursalId
		 * @return int
		*/
		public static function CountBySucursalId($strSucursalId) {
			// Call Counter::QueryCount to perform the CountBySucursalId query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->SucursalId, $strSucursalId)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by RutaId Index(es)
		 * @param string $strRutaId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByRutaId($strRutaId, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByRutaId query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->RutaId, $strRutaId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by RutaId Index(es)
		 * @param string $strRutaId
		 * @return int
		*/
		public static function CountByRutaId($strRutaId) {
			// Call Counter::QueryCount to perform the CountByRutaId query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->RutaId, $strRutaId)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by EntregaInmediata Index(es)
		 * @param integer $intEntregaInmediata
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByEntregaInmediata($intEntregaInmediata, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByEntregaInmediata query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->EntregaInmediata, $intEntregaInmediata),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by EntregaInmediata Index(es)
		 * @param integer $intEntregaInmediata
		 * @return int
		*/
		public static function CountByEntregaInmediata($intEntregaInmediata) {
			// Call Counter::QueryCount to perform the CountByEntregaInmediata query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->EntregaInmediata, $intEntregaInmediata)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by CkptRecepcion Index(es)
		 * @param string $strCkptRecepcion
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByCkptRecepcion($strCkptRecepcion, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByCkptRecepcion query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->CkptRecepcion, $strCkptRecepcion),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by CkptRecepcion Index(es)
		 * @param string $strCkptRecepcion
		 * @return int
		*/
		public static function CountByCkptRecepcion($strCkptRecepcion) {
			// Call Counter::QueryCount to perform the CountByCkptRecepcion query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->CkptRecepcion, $strCkptRecepcion)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by CkptConfirmacion Index(es)
		 * @param string $strCkptConfirmacion
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByCkptConfirmacion($strCkptConfirmacion, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByCkptConfirmacion query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->CkptConfirmacion, $strCkptConfirmacion),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by CkptConfirmacion Index(es)
		 * @param string $strCkptConfirmacion
		 * @return int
		*/
		public static function CountByCkptConfirmacion($strCkptConfirmacion) {
			// Call Counter::QueryCount to perform the CountByCkptConfirmacion query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->CkptConfirmacion, $strCkptConfirmacion)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by CkptAlmacen Index(es)
		 * @param string $strCkptAlmacen
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByCkptAlmacen($strCkptAlmacen, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByCkptAlmacen query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->CkptAlmacen, $strCkptAlmacen),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by CkptAlmacen Index(es)
		 * @param string $strCkptAlmacen
		 * @return int
		*/
		public static function CountByCkptAlmacen($strCkptAlmacen) {
			// Call Counter::QueryCount to perform the CountByCkptAlmacen query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->CkptAlmacen, $strCkptAlmacen)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByPaisId($intPaisId, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByPaisId query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->PaisId, $intPaisId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by PaisId Index(es)
		 * @param integer $intPaisId
		 * @return int
		*/
		public static function CountByPaisId($intPaisId) {
			// Call Counter::QueryCount to perform the CountByPaisId query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->PaisId, $intPaisId)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByStatusId($intStatusId, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByStatusId query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->StatusId, $intStatusId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by StatusId Index(es)
		 * @param integer $intStatusId
		 * @return int
		*/
		public static function CountByStatusId($intStatusId) {
			// Call Counter::QueryCount to perform the CountByStatusId query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->StatusId, $intStatusId)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by ElegirServicio Index(es)
		 * @param integer $intElegirServicio
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByElegirServicio($intElegirServicio, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByElegirServicio query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->ElegirServicio, $intElegirServicio),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by ElegirServicio Index(es)
		 * @param integer $intElegirServicio
		 * @return int
		*/
		public static function CountByElegirServicio($intElegirServicio) {
			// Call Counter::QueryCount to perform the CountByElegirServicio query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->ElegirServicio, $intElegirServicio)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by EsRuta Index(es)
		 * @param integer $intEsRuta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByEsRuta($intEsRuta, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByEsRuta query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->EsRuta, $intEsRuta),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by EsRuta Index(es)
		 * @param integer $intEsRuta
		 * @return int
		*/
		public static function CountByEsRuta($intEsRuta) {
			// Call Counter::QueryCount to perform the CountByEsRuta query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->EsRuta, $intEsRuta)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by SeFactura Index(es)
		 * @param integer $intSeFactura
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayBySeFactura($intSeFactura, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayBySeFactura query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->SeFactura, $intSeFactura),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by SeFactura Index(es)
		 * @param integer $intSeFactura
		 * @return int
		*/
		public static function CountBySeFactura($intSeFactura) {
			// Call Counter::QueryCount to perform the CountBySeFactura query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->SeFactura, $intSeFactura)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by PermitePago Index(es)
		 * @param integer $intPermitePago
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByPermitePago($intPermitePago, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByPermitePago query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->PermitePago, $intPermitePago),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by PermitePago Index(es)
		 * @param integer $intPermitePago
		 * @return int
		*/
		public static function CountByPermitePago($intPermitePago) {
			// Call Counter::QueryCount to perform the CountByPermitePago query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->PermitePago, $intPermitePago)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by CkptAntiguedad0 Index(es)
		 * @param string $strCkptAntiguedad0
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByCkptAntiguedad0($strCkptAntiguedad0, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByCkptAntiguedad0 query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->CkptAntiguedad0, $strCkptAntiguedad0),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by CkptAntiguedad0 Index(es)
		 * @param string $strCkptAntiguedad0
		 * @return int
		*/
		public static function CountByCkptAntiguedad0($strCkptAntiguedad0) {
			// Call Counter::QueryCount to perform the CountByCkptAntiguedad0 query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->CkptAntiguedad0, $strCkptAntiguedad0)
			);
		}

		/**
		 * Load an array of Counter objects,
		 * by AliadoComercialId Index(es)
		 * @param integer $intAliadoComercialId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Counter[]
		*/
		public static function LoadArrayByAliadoComercialId($intAliadoComercialId, $objOptionalClauses = null) {
			// Call Counter::QueryArray to perform the LoadArrayByAliadoComercialId query
			try {
				return Counter::QueryArray(
					QQ::Equal(QQN::Counter()->AliadoComercialId, $intAliadoComercialId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Counters
		 * by AliadoComercialId Index(es)
		 * @param integer $intAliadoComercialId
		 * @return int
		*/
		public static function CountByAliadoComercialId($intAliadoComercialId) {
			// Call Counter::QueryCount to perform the CountByAliadoComercialId query
			return Counter::QueryCount(
				QQ::Equal(QQN::Counter()->AliadoComercialId, $intAliadoComercialId)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Counter
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `counter` (
							`descripcion`,
							`sucursal_id`,
							`ruta_id`,
							`entrega_inmediata`,
							`siglas`,
							`limite_de_paquetes`,
							`cantidad_de_paquetes`,
							`ckpt_recepcion`,
							`ckpt_confirmacion`,
							`ckpt_almacen`,
							`pais_id`,
							`status_id`,
							`direccion`,
							`elegir_servicio`,
							`es_ruta`,
							`se_factura`,
							`permite_pago`,
							`email_jefe_almacen`,
							`ckpt_antiguedad1`,
							`ckpt_antiguedad2`,
							`ckpt_antiguedad0`,
							`aliado_comercial_id`,
							`limite_kilos`,
							`depende_de`,
							`dom_origen`,
							`dom_destino`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							' . $objDatabase->SqlVariable($this->strSucursalId) . ',
							' . $objDatabase->SqlVariable($this->strRutaId) . ',
							' . $objDatabase->SqlVariable($this->intEntregaInmediata) . ',
							' . $objDatabase->SqlVariable($this->strSiglas) . ',
							' . $objDatabase->SqlVariable($this->intLimiteDePaquetes) . ',
							' . $objDatabase->SqlVariable($this->intCantidadDePaquetes) . ',
							' . $objDatabase->SqlVariable($this->strCkptRecepcion) . ',
							' . $objDatabase->SqlVariable($this->strCkptConfirmacion) . ',
							' . $objDatabase->SqlVariable($this->strCkptAlmacen) . ',
							' . $objDatabase->SqlVariable($this->intPaisId) . ',
							' . $objDatabase->SqlVariable($this->intStatusId) . ',
							' . $objDatabase->SqlVariable($this->strDireccion) . ',
							' . $objDatabase->SqlVariable($this->intElegirServicio) . ',
							' . $objDatabase->SqlVariable($this->intEsRuta) . ',
							' . $objDatabase->SqlVariable($this->intSeFactura) . ',
							' . $objDatabase->SqlVariable($this->intPermitePago) . ',
							' . $objDatabase->SqlVariable($this->strEmailJefeAlmacen) . ',
							' . $objDatabase->SqlVariable($this->strCkptAntiguedad1) . ',
							' . $objDatabase->SqlVariable($this->strCkptAntiguedad2) . ',
							' . $objDatabase->SqlVariable($this->strCkptAntiguedad0) . ',
							' . $objDatabase->SqlVariable($this->intAliadoComercialId) . ',
							' . $objDatabase->SqlVariable($this->fltLimiteKilos) . ',
							' . $objDatabase->SqlVariable($this->intDependeDe) . ',
							' . $objDatabase->SqlVariable($this->blnDomOrigen) . ',
							' . $objDatabase->SqlVariable($this->blnDomDestino) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('counter', 'id');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`counter`
						SET
							`descripcion` = ' . $objDatabase->SqlVariable($this->strDescripcion) . ',
							`sucursal_id` = ' . $objDatabase->SqlVariable($this->strSucursalId) . ',
							`ruta_id` = ' . $objDatabase->SqlVariable($this->strRutaId) . ',
							`entrega_inmediata` = ' . $objDatabase->SqlVariable($this->intEntregaInmediata) . ',
							`siglas` = ' . $objDatabase->SqlVariable($this->strSiglas) . ',
							`limite_de_paquetes` = ' . $objDatabase->SqlVariable($this->intLimiteDePaquetes) . ',
							`cantidad_de_paquetes` = ' . $objDatabase->SqlVariable($this->intCantidadDePaquetes) . ',
							`ckpt_recepcion` = ' . $objDatabase->SqlVariable($this->strCkptRecepcion) . ',
							`ckpt_confirmacion` = ' . $objDatabase->SqlVariable($this->strCkptConfirmacion) . ',
							`ckpt_almacen` = ' . $objDatabase->SqlVariable($this->strCkptAlmacen) . ',
							`pais_id` = ' . $objDatabase->SqlVariable($this->intPaisId) . ',
							`status_id` = ' . $objDatabase->SqlVariable($this->intStatusId) . ',
							`direccion` = ' . $objDatabase->SqlVariable($this->strDireccion) . ',
							`elegir_servicio` = ' . $objDatabase->SqlVariable($this->intElegirServicio) . ',
							`es_ruta` = ' . $objDatabase->SqlVariable($this->intEsRuta) . ',
							`se_factura` = ' . $objDatabase->SqlVariable($this->intSeFactura) . ',
							`permite_pago` = ' . $objDatabase->SqlVariable($this->intPermitePago) . ',
							`email_jefe_almacen` = ' . $objDatabase->SqlVariable($this->strEmailJefeAlmacen) . ',
							`ckpt_antiguedad1` = ' . $objDatabase->SqlVariable($this->strCkptAntiguedad1) . ',
							`ckpt_antiguedad2` = ' . $objDatabase->SqlVariable($this->strCkptAntiguedad2) . ',
							`ckpt_antiguedad0` = ' . $objDatabase->SqlVariable($this->strCkptAntiguedad0) . ',
							`aliado_comercial_id` = ' . $objDatabase->SqlVariable($this->intAliadoComercialId) . ',
							`limite_kilos` = ' . $objDatabase->SqlVariable($this->fltLimiteKilos) . ',
							`depende_de` = ' . $objDatabase->SqlVariable($this->intDependeDe) . ',
							`dom_origen` = ' . $objDatabase->SqlVariable($this->blnDomOrigen) . ',
							`dom_destino` = ' . $objDatabase->SqlVariable($this->blnDomDestino) . '
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
		 * Delete this Counter
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Counter with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`counter`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Counter ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Counter', $this->intId);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Counters
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`counter`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate counter table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `counter`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Counter from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Counter object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Counter::Load($this->intId);

			// Update $this's local variables to match
			$this->strDescripcion = $objReloaded->strDescripcion;
			$this->SucursalId = $objReloaded->SucursalId;
			$this->RutaId = $objReloaded->RutaId;
			$this->EntregaInmediata = $objReloaded->EntregaInmediata;
			$this->strSiglas = $objReloaded->strSiglas;
			$this->intLimiteDePaquetes = $objReloaded->intLimiteDePaquetes;
			$this->intCantidadDePaquetes = $objReloaded->intCantidadDePaquetes;
			$this->strCkptRecepcion = $objReloaded->strCkptRecepcion;
			$this->strCkptConfirmacion = $objReloaded->strCkptConfirmacion;
			$this->strCkptAlmacen = $objReloaded->strCkptAlmacen;
			$this->intPaisId = $objReloaded->intPaisId;
			$this->intStatusId = $objReloaded->intStatusId;
			$this->strDireccion = $objReloaded->strDireccion;
			$this->ElegirServicio = $objReloaded->ElegirServicio;
			$this->EsRuta = $objReloaded->EsRuta;
			$this->SeFactura = $objReloaded->SeFactura;
			$this->PermitePago = $objReloaded->PermitePago;
			$this->strEmailJefeAlmacen = $objReloaded->strEmailJefeAlmacen;
			$this->strCkptAntiguedad1 = $objReloaded->strCkptAntiguedad1;
			$this->strCkptAntiguedad2 = $objReloaded->strCkptAntiguedad2;
			$this->strCkptAntiguedad0 = $objReloaded->strCkptAntiguedad0;
			$this->AliadoComercialId = $objReloaded->AliadoComercialId;
			$this->fltLimiteKilos = $objReloaded->fltLimiteKilos;
			$this->intDependeDe = $objReloaded->intDependeDe;
			$this->blnDomOrigen = $objReloaded->blnDomOrigen;
			$this->blnDomDestino = $objReloaded->blnDomDestino;
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

				case 'Descripcion':
					/**
					 * Gets the value for strDescripcion (Not Null)
					 * @return string
					 */
					return $this->strDescripcion;

				case 'SucursalId':
					/**
					 * Gets the value for strSucursalId (Not Null)
					 * @return string
					 */
					return $this->strSucursalId;

				case 'RutaId':
					/**
					 * Gets the value for strRutaId (Not Null)
					 * @return string
					 */
					return $this->strRutaId;

				case 'EntregaInmediata':
					/**
					 * Gets the value for intEntregaInmediata 
					 * @return integer
					 */
					return $this->intEntregaInmediata;

				case 'Siglas':
					/**
					 * Gets the value for strSiglas (Unique)
					 * @return string
					 */
					return $this->strSiglas;

				case 'LimiteDePaquetes':
					/**
					 * Gets the value for intLimiteDePaquetes 
					 * @return integer
					 */
					return $this->intLimiteDePaquetes;

				case 'CantidadDePaquetes':
					/**
					 * Gets the value for intCantidadDePaquetes 
					 * @return integer
					 */
					return $this->intCantidadDePaquetes;

				case 'CkptRecepcion':
					/**
					 * Gets the value for strCkptRecepcion 
					 * @return string
					 */
					return $this->strCkptRecepcion;

				case 'CkptConfirmacion':
					/**
					 * Gets the value for strCkptConfirmacion 
					 * @return string
					 */
					return $this->strCkptConfirmacion;

				case 'CkptAlmacen':
					/**
					 * Gets the value for strCkptAlmacen 
					 * @return string
					 */
					return $this->strCkptAlmacen;

				case 'PaisId':
					/**
					 * Gets the value for intPaisId 
					 * @return integer
					 */
					return $this->intPaisId;

				case 'StatusId':
					/**
					 * Gets the value for intStatusId 
					 * @return integer
					 */
					return $this->intStatusId;

				case 'Direccion':
					/**
					 * Gets the value for strDireccion 
					 * @return string
					 */
					return $this->strDireccion;

				case 'ElegirServicio':
					/**
					 * Gets the value for intElegirServicio 
					 * @return integer
					 */
					return $this->intElegirServicio;

				case 'EsRuta':
					/**
					 * Gets the value for intEsRuta 
					 * @return integer
					 */
					return $this->intEsRuta;

				case 'SeFactura':
					/**
					 * Gets the value for intSeFactura 
					 * @return integer
					 */
					return $this->intSeFactura;

				case 'PermitePago':
					/**
					 * Gets the value for intPermitePago 
					 * @return integer
					 */
					return $this->intPermitePago;

				case 'EmailJefeAlmacen':
					/**
					 * Gets the value for strEmailJefeAlmacen 
					 * @return string
					 */
					return $this->strEmailJefeAlmacen;

				case 'CkptAntiguedad1':
					/**
					 * Gets the value for strCkptAntiguedad1 
					 * @return string
					 */
					return $this->strCkptAntiguedad1;

				case 'CkptAntiguedad2':
					/**
					 * Gets the value for strCkptAntiguedad2 
					 * @return string
					 */
					return $this->strCkptAntiguedad2;

				case 'CkptAntiguedad0':
					/**
					 * Gets the value for strCkptAntiguedad0 
					 * @return string
					 */
					return $this->strCkptAntiguedad0;

				case 'AliadoComercialId':
					/**
					 * Gets the value for intAliadoComercialId 
					 * @return integer
					 */
					return $this->intAliadoComercialId;

				case 'LimiteKilos':
					/**
					 * Gets the value for fltLimiteKilos 
					 * @return double
					 */
					return $this->fltLimiteKilos;

				case 'DependeDe':
					/**
					 * Gets the value for intDependeDe 
					 * @return integer
					 */
					return $this->intDependeDe;

				case 'DomOrigen':
					/**
					 * Gets the value for blnDomOrigen 
					 * @return boolean
					 */
					return $this->blnDomOrigen;

				case 'DomDestino':
					/**
					 * Gets the value for blnDomDestino 
					 * @return boolean
					 */
					return $this->blnDomDestino;


				///////////////////
				// Member Objects
				///////////////////
				case 'Sucursal':
					/**
					 * Gets the value for the Estacion object referenced by strSucursalId (Not Null)
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

				case 'Ruta':
					/**
					 * Gets the value for the Ruta object referenced by strRutaId (Not Null)
					 * @return Ruta
					 */
					try {
						if ((!$this->objRuta) && (!is_null($this->strRutaId)))
							$this->objRuta = Ruta::Load($this->strRutaId);
						return $this->objRuta;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AliadoComercial':
					/**
					 * Gets the value for the AliadoComercial object referenced by intAliadoComercialId 
					 * @return AliadoComercial
					 */
					try {
						if ((!$this->objAliadoComercial) && (!is_null($this->intAliadoComercialId)))
							$this->objAliadoComercial = AliadoComercial::Load($this->intAliadoComercialId);
						return $this->objAliadoComercial;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Caja':
					/**
					 * Gets the value for the private _objCaja (Read-Only)
					 * if set due to an expansion on the caja.counter_id reverse relationship
					 * @return Caja
					 */
					return $this->_objCaja;

				case '_CajaArray':
					/**
					 * Gets the value for the private _objCajaArray (Read-Only)
					 * if set due to an ExpandAsArray on the caja.counter_id reverse relationship
					 * @return Caja[]
					 */
					return $this->_objCajaArray;

				case '_Cajero':
					/**
					 * Gets the value for the private _objCajero (Read-Only)
					 * if set due to an expansion on the cajero.counter_id reverse relationship
					 * @return Cajero
					 */
					return $this->_objCajero;

				case '_CajeroArray':
					/**
					 * Gets the value for the private _objCajeroArray (Read-Only)
					 * if set due to an ExpandAsArray on the cajero.counter_id reverse relationship
					 * @return Cajero[]
					 */
					return $this->_objCajeroArray;

				case '_EstacionAsSeFacturaEn':
					/**
					 * Gets the value for the private _objEstacionAsSeFacturaEn (Read-Only)
					 * if set due to an expansion on the estacion.se_factura_en reverse relationship
					 * @return Estacion
					 */
					return $this->_objEstacionAsSeFacturaEn;

				case '_EstacionAsSeFacturaEnArray':
					/**
					 * Gets the value for the private _objEstacionAsSeFacturaEnArray (Read-Only)
					 * if set due to an ExpandAsArray on the estacion.se_factura_en reverse relationship
					 * @return Estacion[]
					 */
					return $this->_objEstacionAsSeFacturaEnArray;

				case '_NotaCreditoAsReceptoria':
					/**
					 * Gets the value for the private _objNotaCreditoAsReceptoria (Read-Only)
					 * if set due to an expansion on the nota_credito.receptoria_id reverse relationship
					 * @return NotaCredito
					 */
					return $this->_objNotaCreditoAsReceptoria;

				case '_NotaCreditoAsReceptoriaArray':
					/**
					 * Gets the value for the private _objNotaCreditoAsReceptoriaArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_credito.receptoria_id reverse relationship
					 * @return NotaCredito[]
					 */
					return $this->_objNotaCreditoAsReceptoriaArray;


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

				case 'SucursalId':
					/**
					 * Sets the value for strSucursalId (Not Null)
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

				case 'RutaId':
					/**
					 * Sets the value for strRutaId (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						$this->objRuta = null;
						return ($this->strRutaId = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EntregaInmediata':
					/**
					 * Sets the value for intEntregaInmediata 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intEntregaInmediata = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Siglas':
					/**
					 * Sets the value for strSiglas (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSiglas = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LimiteDePaquetes':
					/**
					 * Sets the value for intLimiteDePaquetes 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intLimiteDePaquetes = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CantidadDePaquetes':
					/**
					 * Sets the value for intCantidadDePaquetes 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantidadDePaquetes = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CkptRecepcion':
					/**
					 * Sets the value for strCkptRecepcion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCkptRecepcion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CkptConfirmacion':
					/**
					 * Sets the value for strCkptConfirmacion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCkptConfirmacion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CkptAlmacen':
					/**
					 * Sets the value for strCkptAlmacen 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCkptAlmacen = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PaisId':
					/**
					 * Sets the value for intPaisId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intPaisId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StatusId':
					/**
					 * Sets the value for intStatusId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intStatusId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Direccion':
					/**
					 * Sets the value for strDireccion 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDireccion = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ElegirServicio':
					/**
					 * Sets the value for intElegirServicio 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intElegirServicio = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EsRuta':
					/**
					 * Sets the value for intEsRuta 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intEsRuta = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'SeFactura':
					/**
					 * Sets the value for intSeFactura 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intSeFactura = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PermitePago':
					/**
					 * Sets the value for intPermitePago 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intPermitePago = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EmailJefeAlmacen':
					/**
					 * Sets the value for strEmailJefeAlmacen 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strEmailJefeAlmacen = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CkptAntiguedad1':
					/**
					 * Sets the value for strCkptAntiguedad1 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCkptAntiguedad1 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CkptAntiguedad2':
					/**
					 * Sets the value for strCkptAntiguedad2 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCkptAntiguedad2 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CkptAntiguedad0':
					/**
					 * Sets the value for strCkptAntiguedad0 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCkptAntiguedad0 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AliadoComercialId':
					/**
					 * Sets the value for intAliadoComercialId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objAliadoComercial = null;
						return ($this->intAliadoComercialId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LimiteKilos':
					/**
					 * Sets the value for fltLimiteKilos 
					 * @param double $mixValue
					 * @return double
					 */
					try {
						return ($this->fltLimiteKilos = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DependeDe':
					/**
					 * Sets the value for intDependeDe 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intDependeDe = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DomOrigen':
					/**
					 * Sets the value for blnDomOrigen 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnDomOrigen = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DomDestino':
					/**
					 * Sets the value for blnDomDestino 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnDomDestino = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Sucursal':
					/**
					 * Sets the value for the Estacion object referenced by strSucursalId (Not Null)
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
							throw new QCallerException('Unable to set an unsaved Sucursal for this Counter');

						// Update Local Member Variables
						$this->objSucursal = $mixValue;
						$this->strSucursalId = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Ruta':
					/**
					 * Sets the value for the Ruta object referenced by strRutaId (Not Null)
					 * @param Ruta $mixValue
					 * @return Ruta
					 */
					if (is_null($mixValue)) {
						$this->strRutaId = null;
						$this->objRuta = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Ruta object
						try {
							$mixValue = QType::Cast($mixValue, 'Ruta');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Ruta object
						if (is_null($mixValue->CodiRuta))
							throw new QCallerException('Unable to set an unsaved Ruta for this Counter');

						// Update Local Member Variables
						$this->objRuta = $mixValue;
						$this->strRutaId = $mixValue->CodiRuta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'AliadoComercial':
					/**
					 * Sets the value for the AliadoComercial object referenced by intAliadoComercialId 
					 * @param AliadoComercial $mixValue
					 * @return AliadoComercial
					 */
					if (is_null($mixValue)) {
						$this->intAliadoComercialId = null;
						$this->objAliadoComercial = null;
						return null;
					} else {
						// Make sure $mixValue actually is a AliadoComercial object
						try {
							$mixValue = QType::Cast($mixValue, 'AliadoComercial');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED AliadoComercial object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved AliadoComercial for this Counter');

						// Update Local Member Variables
						$this->objAliadoComercial = $mixValue;
						$this->intAliadoComercialId = $mixValue->Id;

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
			if ($this->CountCajas()) {
				$arrTablRela[] = 'caja';
			}
			if ($this->CountCajeros()) {
				$arrTablRela[] = 'cajero';
			}
			if ($this->CountEstacionsAsSeFacturaEn()) {
				$arrTablRela[] = 'estacion';
			}
			if ($this->CountNotaCreditosAsReceptoria()) {
				$arrTablRela[] = 'nota_credito';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for Caja
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Cajas as an array of Caja objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Caja[]
		*/
		public function GetCajaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Caja::LoadArrayByCounterId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Cajas
		 * @return int
		*/
		public function CountCajas() {
			if ((is_null($this->intId)))
				return 0;

			return Caja::CountByCounterId($this->intId);
		}

		/**
		 * Associates a Caja
		 * @param Caja $objCaja
		 * @return void
		*/
		public function AssociateCaja(Caja $objCaja) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCaja on this unsaved Counter.');
			if ((is_null($objCaja->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCaja on this Counter with an unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`caja`
				SET
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCaja->Id) . '
			');
		}

		/**
		 * Unassociates a Caja
		 * @param Caja $objCaja
		 * @return void
		*/
		public function UnassociateCaja(Caja $objCaja) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCaja on this unsaved Counter.');
			if ((is_null($objCaja->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCaja on this Counter with an unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`caja`
				SET
					`counter_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCaja->Id) . ' AND
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Cajas
		 * @return void
		*/
		public function UnassociateAllCajas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCaja on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`caja`
				SET
					`counter_id` = null
				WHERE
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Caja
		 * @param Caja $objCaja
		 * @return void
		*/
		public function DeleteAssociatedCaja(Caja $objCaja) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCaja on this unsaved Counter.');
			if ((is_null($objCaja->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCaja on this Counter with an unsaved Caja.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`caja`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCaja->Id) . ' AND
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Cajas
		 * @return void
		*/
		public function DeleteAllCajas() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCaja on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`caja`
				WHERE
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for Cajero
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Cajeros as an array of Cajero objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Cajero[]
		*/
		public function GetCajeroArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Cajero::LoadArrayByCounterId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Cajeros
		 * @return int
		*/
		public function CountCajeros() {
			if ((is_null($this->intId)))
				return 0;

			return Cajero::CountByCounterId($this->intId);
		}

		/**
		 * Associates a Cajero
		 * @param Cajero $objCajero
		 * @return void
		*/
		public function AssociateCajero(Cajero $objCajero) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCajero on this unsaved Counter.');
			if ((is_null($objCajero->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCajero on this Counter with an unsaved Cajero.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cajero`
				SET
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCajero->Id) . '
			');
		}

		/**
		 * Unassociates a Cajero
		 * @param Cajero $objCajero
		 * @return void
		*/
		public function UnassociateCajero(Cajero $objCajero) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCajero on this unsaved Counter.');
			if ((is_null($objCajero->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCajero on this Counter with an unsaved Cajero.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cajero`
				SET
					`counter_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCajero->Id) . ' AND
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all Cajeros
		 * @return void
		*/
		public function UnassociateAllCajeros() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCajero on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cajero`
				SET
					`counter_id` = null
				WHERE
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Cajero
		 * @param Cajero $objCajero
		 * @return void
		*/
		public function DeleteAssociatedCajero(Cajero $objCajero) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCajero on this unsaved Counter.');
			if ((is_null($objCajero->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCajero on this Counter with an unsaved Cajero.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cajero`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCajero->Id) . ' AND
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated Cajeros
		 * @return void
		*/
		public function DeleteAllCajeros() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCajero on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cajero`
				WHERE
					`counter_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for EstacionAsSeFacturaEn
		//-------------------------------------------------------------------

		/**
		 * Gets all associated EstacionsAsSeFacturaEn as an array of Estacion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Estacion[]
		*/
		public function GetEstacionAsSeFacturaEnArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Estacion::LoadArrayBySeFacturaEn($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated EstacionsAsSeFacturaEn
		 * @return int
		*/
		public function CountEstacionsAsSeFacturaEn() {
			if ((is_null($this->intId)))
				return 0;

			return Estacion::CountBySeFacturaEn($this->intId);
		}

		/**
		 * Associates a EstacionAsSeFacturaEn
		 * @param Estacion $objEstacion
		 * @return void
		*/
		public function AssociateEstacionAsSeFacturaEn(Estacion $objEstacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEstacionAsSeFacturaEn on this unsaved Counter.');
			if ((is_null($objEstacion->CodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateEstacionAsSeFacturaEn on this Counter with an unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estacion`
				SET
					`se_factura_en` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($objEstacion->CodiEsta) . '
			');
		}

		/**
		 * Unassociates a EstacionAsSeFacturaEn
		 * @param Estacion $objEstacion
		 * @return void
		*/
		public function UnassociateEstacionAsSeFacturaEn(Estacion $objEstacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsSeFacturaEn on this unsaved Counter.');
			if ((is_null($objEstacion->CodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsSeFacturaEn on this Counter with an unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estacion`
				SET
					`se_factura_en` = null
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($objEstacion->CodiEsta) . ' AND
					`se_factura_en` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all EstacionsAsSeFacturaEn
		 * @return void
		*/
		public function UnassociateAllEstacionsAsSeFacturaEn() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsSeFacturaEn on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`estacion`
				SET
					`se_factura_en` = null
				WHERE
					`se_factura_en` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated EstacionAsSeFacturaEn
		 * @param Estacion $objEstacion
		 * @return void
		*/
		public function DeleteAssociatedEstacionAsSeFacturaEn(Estacion $objEstacion) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsSeFacturaEn on this unsaved Counter.');
			if ((is_null($objEstacion->CodiEsta)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsSeFacturaEn on this Counter with an unsaved Estacion.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estacion`
				WHERE
					`codi_esta` = ' . $objDatabase->SqlVariable($objEstacion->CodiEsta) . ' AND
					`se_factura_en` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated EstacionsAsSeFacturaEn
		 * @return void
		*/
		public function DeleteAllEstacionsAsSeFacturaEn() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateEstacionAsSeFacturaEn on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`estacion`
				WHERE
					`se_factura_en` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}


		// Related Objects' Methods for NotaCreditoAsReceptoria
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaCreditosAsReceptoria as an array of NotaCredito objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito[]
		*/
		public function GetNotaCreditoAsReceptoriaArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return NotaCredito::LoadArrayByReceptoriaId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaCreditosAsReceptoria
		 * @return int
		*/
		public function CountNotaCreditosAsReceptoria() {
			if ((is_null($this->intId)))
				return 0;

			return NotaCredito::CountByReceptoriaId($this->intId);
		}

		/**
		 * Associates a NotaCreditoAsReceptoria
		 * @param NotaCredito $objNotaCredito
		 * @return void
		*/
		public function AssociateNotaCreditoAsReceptoria(NotaCredito $objNotaCredito) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoAsReceptoria on this unsaved Counter.');
			if ((is_null($objNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoAsReceptoria on this Counter with an unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito`
				SET
					`receptoria_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCredito->Id) . '
			');
		}

		/**
		 * Unassociates a NotaCreditoAsReceptoria
		 * @param NotaCredito $objNotaCredito
		 * @return void
		*/
		public function UnassociateNotaCreditoAsReceptoria(NotaCredito $objNotaCredito) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsReceptoria on this unsaved Counter.');
			if ((is_null($objNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsReceptoria on this Counter with an unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito`
				SET
					`receptoria_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCredito->Id) . ' AND
					`receptoria_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Unassociates all NotaCreditosAsReceptoria
		 * @return void
		*/
		public function UnassociateAllNotaCreditosAsReceptoria() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsReceptoria on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito`
				SET
					`receptoria_id` = null
				WHERE
					`receptoria_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated NotaCreditoAsReceptoria
		 * @param NotaCredito $objNotaCredito
		 * @return void
		*/
		public function DeleteAssociatedNotaCreditoAsReceptoria(NotaCredito $objNotaCredito) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsReceptoria on this unsaved Counter.');
			if ((is_null($objNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsReceptoria on this Counter with an unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCredito->Id) . ' AND
					`receptoria_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes all associated NotaCreditosAsReceptoria
		 * @return void
		*/
		public function DeleteAllNotaCreditosAsReceptoria() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsReceptoria on this unsaved Counter.');

			// Get the Database Object for this Class
			$objDatabase = Counter::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito`
				WHERE
					`receptoria_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
			return "counter";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Counter::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Counter"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Descripcion" type="xsd:string"/>';
			$strToReturn .= '<element name="Sucursal" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="Ruta" type="xsd1:Ruta"/>';
			$strToReturn .= '<element name="EntregaInmediata" type="xsd:int"/>';
			$strToReturn .= '<element name="Siglas" type="xsd:string"/>';
			$strToReturn .= '<element name="LimiteDePaquetes" type="xsd:int"/>';
			$strToReturn .= '<element name="CantidadDePaquetes" type="xsd:int"/>';
			$strToReturn .= '<element name="CkptRecepcion" type="xsd:string"/>';
			$strToReturn .= '<element name="CkptConfirmacion" type="xsd:string"/>';
			$strToReturn .= '<element name="CkptAlmacen" type="xsd:string"/>';
			$strToReturn .= '<element name="PaisId" type="xsd:int"/>';
			$strToReturn .= '<element name="StatusId" type="xsd:int"/>';
			$strToReturn .= '<element name="Direccion" type="xsd:string"/>';
			$strToReturn .= '<element name="ElegirServicio" type="xsd:int"/>';
			$strToReturn .= '<element name="EsRuta" type="xsd:int"/>';
			$strToReturn .= '<element name="SeFactura" type="xsd:int"/>';
			$strToReturn .= '<element name="PermitePago" type="xsd:int"/>';
			$strToReturn .= '<element name="EmailJefeAlmacen" type="xsd:string"/>';
			$strToReturn .= '<element name="CkptAntiguedad1" type="xsd:string"/>';
			$strToReturn .= '<element name="CkptAntiguedad2" type="xsd:string"/>';
			$strToReturn .= '<element name="CkptAntiguedad0" type="xsd:string"/>';
			$strToReturn .= '<element name="AliadoComercial" type="xsd1:AliadoComercial"/>';
			$strToReturn .= '<element name="LimiteKilos" type="xsd:float"/>';
			$strToReturn .= '<element name="DependeDe" type="xsd:int"/>';
			$strToReturn .= '<element name="DomOrigen" type="xsd:boolean"/>';
			$strToReturn .= '<element name="DomDestino" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Counter', $strComplexTypeArray)) {
				$strComplexTypeArray['Counter'] = Counter::GetSoapComplexTypeXml();
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				Ruta::AlterSoapComplexTypeArray($strComplexTypeArray);
				AliadoComercial::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Counter::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Counter();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Descripcion'))
				$objToReturn->strDescripcion = $objSoapObject->Descripcion;
			if ((property_exists($objSoapObject, 'Sucursal')) &&
				($objSoapObject->Sucursal))
				$objToReturn->Sucursal = Estacion::GetObjectFromSoapObject($objSoapObject->Sucursal);
			if ((property_exists($objSoapObject, 'Ruta')) &&
				($objSoapObject->Ruta))
				$objToReturn->Ruta = Ruta::GetObjectFromSoapObject($objSoapObject->Ruta);
			if (property_exists($objSoapObject, 'EntregaInmediata'))
				$objToReturn->intEntregaInmediata = $objSoapObject->EntregaInmediata;
			if (property_exists($objSoapObject, 'Siglas'))
				$objToReturn->strSiglas = $objSoapObject->Siglas;
			if (property_exists($objSoapObject, 'LimiteDePaquetes'))
				$objToReturn->intLimiteDePaquetes = $objSoapObject->LimiteDePaquetes;
			if (property_exists($objSoapObject, 'CantidadDePaquetes'))
				$objToReturn->intCantidadDePaquetes = $objSoapObject->CantidadDePaquetes;
			if (property_exists($objSoapObject, 'CkptRecepcion'))
				$objToReturn->strCkptRecepcion = $objSoapObject->CkptRecepcion;
			if (property_exists($objSoapObject, 'CkptConfirmacion'))
				$objToReturn->strCkptConfirmacion = $objSoapObject->CkptConfirmacion;
			if (property_exists($objSoapObject, 'CkptAlmacen'))
				$objToReturn->strCkptAlmacen = $objSoapObject->CkptAlmacen;
			if (property_exists($objSoapObject, 'PaisId'))
				$objToReturn->intPaisId = $objSoapObject->PaisId;
			if (property_exists($objSoapObject, 'StatusId'))
				$objToReturn->intStatusId = $objSoapObject->StatusId;
			if (property_exists($objSoapObject, 'Direccion'))
				$objToReturn->strDireccion = $objSoapObject->Direccion;
			if (property_exists($objSoapObject, 'ElegirServicio'))
				$objToReturn->intElegirServicio = $objSoapObject->ElegirServicio;
			if (property_exists($objSoapObject, 'EsRuta'))
				$objToReturn->intEsRuta = $objSoapObject->EsRuta;
			if (property_exists($objSoapObject, 'SeFactura'))
				$objToReturn->intSeFactura = $objSoapObject->SeFactura;
			if (property_exists($objSoapObject, 'PermitePago'))
				$objToReturn->intPermitePago = $objSoapObject->PermitePago;
			if (property_exists($objSoapObject, 'EmailJefeAlmacen'))
				$objToReturn->strEmailJefeAlmacen = $objSoapObject->EmailJefeAlmacen;
			if (property_exists($objSoapObject, 'CkptAntiguedad1'))
				$objToReturn->strCkptAntiguedad1 = $objSoapObject->CkptAntiguedad1;
			if (property_exists($objSoapObject, 'CkptAntiguedad2'))
				$objToReturn->strCkptAntiguedad2 = $objSoapObject->CkptAntiguedad2;
			if (property_exists($objSoapObject, 'CkptAntiguedad0'))
				$objToReturn->strCkptAntiguedad0 = $objSoapObject->CkptAntiguedad0;
			if ((property_exists($objSoapObject, 'AliadoComercial')) &&
				($objSoapObject->AliadoComercial))
				$objToReturn->AliadoComercial = AliadoComercial::GetObjectFromSoapObject($objSoapObject->AliadoComercial);
			if (property_exists($objSoapObject, 'LimiteKilos'))
				$objToReturn->fltLimiteKilos = $objSoapObject->LimiteKilos;
			if (property_exists($objSoapObject, 'DependeDe'))
				$objToReturn->intDependeDe = $objSoapObject->DependeDe;
			if (property_exists($objSoapObject, 'DomOrigen'))
				$objToReturn->blnDomOrigen = $objSoapObject->DomOrigen;
			if (property_exists($objSoapObject, 'DomDestino'))
				$objToReturn->blnDomDestino = $objSoapObject->DomDestino;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Counter::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objSucursal)
				$objObject->objSucursal = Estacion::GetSoapObjectFromObject($objObject->objSucursal, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strSucursalId = null;
			if ($objObject->objRuta)
				$objObject->objRuta = Ruta::GetSoapObjectFromObject($objObject->objRuta, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strRutaId = null;
			if ($objObject->objAliadoComercial)
				$objObject->objAliadoComercial = AliadoComercial::GetSoapObjectFromObject($objObject->objAliadoComercial, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAliadoComercialId = null;
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
			$iArray['Descripcion'] = $this->strDescripcion;
			$iArray['SucursalId'] = $this->strSucursalId;
			$iArray['RutaId'] = $this->strRutaId;
			$iArray['EntregaInmediata'] = $this->intEntregaInmediata;
			$iArray['Siglas'] = $this->strSiglas;
			$iArray['LimiteDePaquetes'] = $this->intLimiteDePaquetes;
			$iArray['CantidadDePaquetes'] = $this->intCantidadDePaquetes;
			$iArray['CkptRecepcion'] = $this->strCkptRecepcion;
			$iArray['CkptConfirmacion'] = $this->strCkptConfirmacion;
			$iArray['CkptAlmacen'] = $this->strCkptAlmacen;
			$iArray['PaisId'] = $this->intPaisId;
			$iArray['StatusId'] = $this->intStatusId;
			$iArray['Direccion'] = $this->strDireccion;
			$iArray['ElegirServicio'] = $this->intElegirServicio;
			$iArray['EsRuta'] = $this->intEsRuta;
			$iArray['SeFactura'] = $this->intSeFactura;
			$iArray['PermitePago'] = $this->intPermitePago;
			$iArray['EmailJefeAlmacen'] = $this->strEmailJefeAlmacen;
			$iArray['CkptAntiguedad1'] = $this->strCkptAntiguedad1;
			$iArray['CkptAntiguedad2'] = $this->strCkptAntiguedad2;
			$iArray['CkptAntiguedad0'] = $this->strCkptAntiguedad0;
			$iArray['AliadoComercialId'] = $this->intAliadoComercialId;
			$iArray['LimiteKilos'] = $this->fltLimiteKilos;
			$iArray['DependeDe'] = $this->intDependeDe;
			$iArray['DomOrigen'] = $this->blnDomOrigen;
			$iArray['DomDestino'] = $this->blnDomDestino;
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
     * @property-read QQNode $Descripcion
     * @property-read QQNode $SucursalId
     * @property-read QQNodeEstacion $Sucursal
     * @property-read QQNode $RutaId
     * @property-read QQNodeRuta $Ruta
     * @property-read QQNode $EntregaInmediata
     * @property-read QQNode $Siglas
     * @property-read QQNode $LimiteDePaquetes
     * @property-read QQNode $CantidadDePaquetes
     * @property-read QQNode $CkptRecepcion
     * @property-read QQNode $CkptConfirmacion
     * @property-read QQNode $CkptAlmacen
     * @property-read QQNode $PaisId
     * @property-read QQNode $StatusId
     * @property-read QQNode $Direccion
     * @property-read QQNode $ElegirServicio
     * @property-read QQNode $EsRuta
     * @property-read QQNode $SeFactura
     * @property-read QQNode $PermitePago
     * @property-read QQNode $EmailJefeAlmacen
     * @property-read QQNode $CkptAntiguedad1
     * @property-read QQNode $CkptAntiguedad2
     * @property-read QQNode $CkptAntiguedad0
     * @property-read QQNode $AliadoComercialId
     * @property-read QQNodeAliadoComercial $AliadoComercial
     * @property-read QQNode $LimiteKilos
     * @property-read QQNode $DependeDe
     * @property-read QQNode $DomOrigen
     * @property-read QQNode $DomDestino
     *
     *
     * @property-read QQReverseReferenceNodeCaja $Caja
     * @property-read QQReverseReferenceNodeCajero $Cajero
     * @property-read QQReverseReferenceNodeEstacion $EstacionAsSeFacturaEn
     * @property-read QQReverseReferenceNodeNotaCredito $NotaCreditoAsReceptoria

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeCounter extends QQNode {
		protected $strTableName = 'counter';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Counter';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'Integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'VarChar', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'VarChar', $this);
				case 'Sucursal':
					return new QQNodeEstacion('sucursal_id', 'Sucursal', 'VarChar', $this);
				case 'RutaId':
					return new QQNode('ruta_id', 'RutaId', 'VarChar', $this);
				case 'Ruta':
					return new QQNodeRuta('ruta_id', 'Ruta', 'VarChar', $this);
				case 'EntregaInmediata':
					return new QQNode('entrega_inmediata', 'EntregaInmediata', 'Integer', $this);
				case 'Siglas':
					return new QQNode('siglas', 'Siglas', 'VarChar', $this);
				case 'LimiteDePaquetes':
					return new QQNode('limite_de_paquetes', 'LimiteDePaquetes', 'Integer', $this);
				case 'CantidadDePaquetes':
					return new QQNode('cantidad_de_paquetes', 'CantidadDePaquetes', 'Integer', $this);
				case 'CkptRecepcion':
					return new QQNode('ckpt_recepcion', 'CkptRecepcion', 'VarChar', $this);
				case 'CkptConfirmacion':
					return new QQNode('ckpt_confirmacion', 'CkptConfirmacion', 'VarChar', $this);
				case 'CkptAlmacen':
					return new QQNode('ckpt_almacen', 'CkptAlmacen', 'VarChar', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'Integer', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'Integer', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'VarChar', $this);
				case 'ElegirServicio':
					return new QQNode('elegir_servicio', 'ElegirServicio', 'Integer', $this);
				case 'EsRuta':
					return new QQNode('es_ruta', 'EsRuta', 'Integer', $this);
				case 'SeFactura':
					return new QQNode('se_factura', 'SeFactura', 'Integer', $this);
				case 'PermitePago':
					return new QQNode('permite_pago', 'PermitePago', 'Integer', $this);
				case 'EmailJefeAlmacen':
					return new QQNode('email_jefe_almacen', 'EmailJefeAlmacen', 'VarChar', $this);
				case 'CkptAntiguedad1':
					return new QQNode('ckpt_antiguedad1', 'CkptAntiguedad1', 'VarChar', $this);
				case 'CkptAntiguedad2':
					return new QQNode('ckpt_antiguedad2', 'CkptAntiguedad2', 'VarChar', $this);
				case 'CkptAntiguedad0':
					return new QQNode('ckpt_antiguedad0', 'CkptAntiguedad0', 'VarChar', $this);
				case 'AliadoComercialId':
					return new QQNode('aliado_comercial_id', 'AliadoComercialId', 'Integer', $this);
				case 'AliadoComercial':
					return new QQNodeAliadoComercial('aliado_comercial_id', 'AliadoComercial', 'Integer', $this);
				case 'LimiteKilos':
					return new QQNode('limite_kilos', 'LimiteKilos', 'Float', $this);
				case 'DependeDe':
					return new QQNode('depende_de', 'DependeDe', 'Integer', $this);
				case 'DomOrigen':
					return new QQNode('dom_origen', 'DomOrigen', 'Bit', $this);
				case 'DomDestino':
					return new QQNode('dom_destino', 'DomDestino', 'Bit', $this);
				case 'Caja':
					return new QQReverseReferenceNodeCaja($this, 'caja', 'reverse_reference', 'counter_id', 'Caja');
				case 'Cajero':
					return new QQReverseReferenceNodeCajero($this, 'cajero', 'reverse_reference', 'counter_id', 'Cajero');
				case 'EstacionAsSeFacturaEn':
					return new QQReverseReferenceNodeEstacion($this, 'estacionassefacturaen', 'reverse_reference', 'se_factura_en', 'EstacionAsSeFacturaEn');
				case 'NotaCreditoAsReceptoria':
					return new QQReverseReferenceNodeNotaCredito($this, 'notacreditoasreceptoria', 'reverse_reference', 'receptoria_id', 'NotaCreditoAsReceptoria');

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
     * @property-read QQNode $Descripcion
     * @property-read QQNode $SucursalId
     * @property-read QQNodeEstacion $Sucursal
     * @property-read QQNode $RutaId
     * @property-read QQNodeRuta $Ruta
     * @property-read QQNode $EntregaInmediata
     * @property-read QQNode $Siglas
     * @property-read QQNode $LimiteDePaquetes
     * @property-read QQNode $CantidadDePaquetes
     * @property-read QQNode $CkptRecepcion
     * @property-read QQNode $CkptConfirmacion
     * @property-read QQNode $CkptAlmacen
     * @property-read QQNode $PaisId
     * @property-read QQNode $StatusId
     * @property-read QQNode $Direccion
     * @property-read QQNode $ElegirServicio
     * @property-read QQNode $EsRuta
     * @property-read QQNode $SeFactura
     * @property-read QQNode $PermitePago
     * @property-read QQNode $EmailJefeAlmacen
     * @property-read QQNode $CkptAntiguedad1
     * @property-read QQNode $CkptAntiguedad2
     * @property-read QQNode $CkptAntiguedad0
     * @property-read QQNode $AliadoComercialId
     * @property-read QQNodeAliadoComercial $AliadoComercial
     * @property-read QQNode $LimiteKilos
     * @property-read QQNode $DependeDe
     * @property-read QQNode $DomOrigen
     * @property-read QQNode $DomDestino
     *
     *
     * @property-read QQReverseReferenceNodeCaja $Caja
     * @property-read QQReverseReferenceNodeCajero $Cajero
     * @property-read QQReverseReferenceNodeEstacion $EstacionAsSeFacturaEn
     * @property-read QQReverseReferenceNodeNotaCredito $NotaCreditoAsReceptoria

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeCounter extends QQReverseReferenceNode {
		protected $strTableName = 'counter';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Counter';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Descripcion':
					return new QQNode('descripcion', 'Descripcion', 'string', $this);
				case 'SucursalId':
					return new QQNode('sucursal_id', 'SucursalId', 'string', $this);
				case 'Sucursal':
					return new QQNodeEstacion('sucursal_id', 'Sucursal', 'string', $this);
				case 'RutaId':
					return new QQNode('ruta_id', 'RutaId', 'string', $this);
				case 'Ruta':
					return new QQNodeRuta('ruta_id', 'Ruta', 'string', $this);
				case 'EntregaInmediata':
					return new QQNode('entrega_inmediata', 'EntregaInmediata', 'integer', $this);
				case 'Siglas':
					return new QQNode('siglas', 'Siglas', 'string', $this);
				case 'LimiteDePaquetes':
					return new QQNode('limite_de_paquetes', 'LimiteDePaquetes', 'integer', $this);
				case 'CantidadDePaquetes':
					return new QQNode('cantidad_de_paquetes', 'CantidadDePaquetes', 'integer', $this);
				case 'CkptRecepcion':
					return new QQNode('ckpt_recepcion', 'CkptRecepcion', 'string', $this);
				case 'CkptConfirmacion':
					return new QQNode('ckpt_confirmacion', 'CkptConfirmacion', 'string', $this);
				case 'CkptAlmacen':
					return new QQNode('ckpt_almacen', 'CkptAlmacen', 'string', $this);
				case 'PaisId':
					return new QQNode('pais_id', 'PaisId', 'integer', $this);
				case 'StatusId':
					return new QQNode('status_id', 'StatusId', 'integer', $this);
				case 'Direccion':
					return new QQNode('direccion', 'Direccion', 'string', $this);
				case 'ElegirServicio':
					return new QQNode('elegir_servicio', 'ElegirServicio', 'integer', $this);
				case 'EsRuta':
					return new QQNode('es_ruta', 'EsRuta', 'integer', $this);
				case 'SeFactura':
					return new QQNode('se_factura', 'SeFactura', 'integer', $this);
				case 'PermitePago':
					return new QQNode('permite_pago', 'PermitePago', 'integer', $this);
				case 'EmailJefeAlmacen':
					return new QQNode('email_jefe_almacen', 'EmailJefeAlmacen', 'string', $this);
				case 'CkptAntiguedad1':
					return new QQNode('ckpt_antiguedad1', 'CkptAntiguedad1', 'string', $this);
				case 'CkptAntiguedad2':
					return new QQNode('ckpt_antiguedad2', 'CkptAntiguedad2', 'string', $this);
				case 'CkptAntiguedad0':
					return new QQNode('ckpt_antiguedad0', 'CkptAntiguedad0', 'string', $this);
				case 'AliadoComercialId':
					return new QQNode('aliado_comercial_id', 'AliadoComercialId', 'integer', $this);
				case 'AliadoComercial':
					return new QQNodeAliadoComercial('aliado_comercial_id', 'AliadoComercial', 'integer', $this);
				case 'LimiteKilos':
					return new QQNode('limite_kilos', 'LimiteKilos', 'double', $this);
				case 'DependeDe':
					return new QQNode('depende_de', 'DependeDe', 'integer', $this);
				case 'DomOrigen':
					return new QQNode('dom_origen', 'DomOrigen', 'boolean', $this);
				case 'DomDestino':
					return new QQNode('dom_destino', 'DomDestino', 'boolean', $this);
				case 'Caja':
					return new QQReverseReferenceNodeCaja($this, 'caja', 'reverse_reference', 'counter_id', 'Caja');
				case 'Cajero':
					return new QQReverseReferenceNodeCajero($this, 'cajero', 'reverse_reference', 'counter_id', 'Cajero');
				case 'EstacionAsSeFacturaEn':
					return new QQReverseReferenceNodeEstacion($this, 'estacionassefacturaen', 'reverse_reference', 'se_factura_en', 'EstacionAsSeFacturaEn');
				case 'NotaCreditoAsReceptoria':
					return new QQReverseReferenceNodeNotaCredito($this, 'notacreditoasreceptoria', 'reverse_reference', 'receptoria_id', 'NotaCreditoAsReceptoria');

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
