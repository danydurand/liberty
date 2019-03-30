<?php
	/**
	 * The abstract UsuarioGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Usuario subclass which
	 * extends this UsuarioGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Usuario class.
	 *
	 * @package My QCubed Application
	 * @subpackage GeneratedDataObjects
	 * @property-read integer $CodiUsua Codigo:: (Read-Only PK)
	 * @property integer $CodiGrup the value for intCodiGrup (Not Null)
	 * @property string $NombUsua Nombre:: (Not Null)
	 * @property string $ApelUsua Apellido:: (Not Null)
	 * @property string $LogiUsua Login:: (Unique)
	 * @property string $PassUsua Clave:: (Not Null)
	 * @property integer $CodiStat Estatus:: (Not Null)
	 * @property string $CodiEsta Sucursal:: (Not Null)
	 * @property integer $TipoUsua the value for intTipoUsua (Not Null)
	 * @property integer $CantInte the value for intCantInte 
	 * @property string $MailUsua the value for strMailUsua 
	 * @property QDateTime $FechAcce the value for dttFechAcce 
	 * @property string $MotiBloq the value for strMotiBloq 
	 * @property QDateTime $FechClav the value for dttFechClav 
	 * @property string $CargUsua the value for strCargUsua 
	 * @property boolean $Supervisor the value for blnSupervisor 
	 * @property integer $GrupoId Grupo:: 
	 * @property QDateTime $DeleteAt the value for dttDeleteAt 
	 * @property Grupo $CodiGrupObject the value for the Grupo object referenced by intCodiGrup (Not Null)
	 * @property Estacion $CodiEstaObject the value for the Estacion object referenced by strCodiEsta (Not Null)
	 * @property NewGrupo $Grupo the value for the NewGrupo object referenced by intGrupoId 
	 * @property Cajero $Cajero the value for the Cajero object that uniquely references this Usuario
	 * @property-read Acceso $_Acceso the value for the private _objAcceso (Read-Only) if set due to an expansion on the acceso.usuario_id reverse relationship
	 * @property-read Acceso[] $_AccesoArray the value for the private _objAccesoArray (Read-Only) if set due to an ExpandAsArray on the acceso.usuario_id reverse relationship
	 * @property-read ClientePmn $_ClientePmnAsRegistradoPor the value for the private _objClientePmnAsRegistradoPor (Read-Only) if set due to an expansion on the cliente_pmn.registrado_por reverse relationship
	 * @property-read ClientePmn[] $_ClientePmnAsRegistradoPorArray the value for the private _objClientePmnAsRegistradoPorArray (Read-Only) if set due to an ExpandAsArray on the cliente_pmn.registrado_por reverse relationship
	 * @property-read ContenedorCkpt $_ContenedorCkpt the value for the private _objContenedorCkpt (Read-Only) if set due to an expansion on the contenedor_ckpt.usuario reverse relationship
	 * @property-read ContenedorCkpt[] $_ContenedorCkptArray the value for the private _objContenedorCkptArray (Read-Only) if set due to an ExpandAsArray on the contenedor_ckpt.usuario reverse relationship
	 * @property-read DatosPago $_DatosPago the value for the private _objDatosPago (Read-Only) if set due to an expansion on the datos_pago.usuario_id reverse relationship
	 * @property-read DatosPago[] $_DatosPagoArray the value for the private _objDatosPagoArray (Read-Only) if set due to an ExpandAsArray on the datos_pago.usuario_id reverse relationship
	 * @property-read DspDespacho $_DspDespachoAsCodiUsua the value for the private _objDspDespachoAsCodiUsua (Read-Only) if set due to an expansion on the dsp_despacho.codi_usua reverse relationship
	 * @property-read DspDespacho[] $_DspDespachoAsCodiUsuaArray the value for the private _objDspDespachoAsCodiUsuaArray (Read-Only) if set due to an ExpandAsArray on the dsp_despacho.codi_usua reverse relationship
	 * @property-read DspDespacho $_DspDespachoAsUsuaModi the value for the private _objDspDespachoAsUsuaModi (Read-Only) if set due to an expansion on the dsp_despacho.usua_modi reverse relationship
	 * @property-read DspDespacho[] $_DspDespachoAsUsuaModiArray the value for the private _objDspDespachoAsUsuaModiArray (Read-Only) if set due to an ExpandAsArray on the dsp_despacho.usua_modi reverse relationship
	 * @property-read DspDespacho $_DspDespachoAsUsuaCier the value for the private _objDspDespachoAsUsuaCier (Read-Only) if set due to an expansion on the dsp_despacho.usua_cier reverse relationship
	 * @property-read DspDespacho[] $_DspDespachoAsUsuaCierArray the value for the private _objDspDespachoAsUsuaCierArray (Read-Only) if set due to an ExpandAsArray on the dsp_despacho.usua_cier reverse relationship
	 * @property-read DspDespacho $_DspDespachoAsUsuaDesp the value for the private _objDspDespachoAsUsuaDesp (Read-Only) if set due to an expansion on the dsp_despacho.usua_desp reverse relationship
	 * @property-read DspDespacho[] $_DspDespachoAsUsuaDespArray the value for the private _objDspDespachoAsUsuaDespArray (Read-Only) if set due to an ExpandAsArray on the dsp_despacho.usua_desp reverse relationship
	 * @property-read Factura $_FacturaAsCreacion the value for the private _objFacturaAsCreacion (Read-Only) if set due to an expansion on the factura.usuario_creacion reverse relationship
	 * @property-read Factura[] $_FacturaAsCreacionArray the value for the private _objFacturaAsCreacionArray (Read-Only) if set due to an ExpandAsArray on the factura.usuario_creacion reverse relationship
	 * @property-read Factura $_FacturaAsAnulacion the value for the private _objFacturaAsAnulacion (Read-Only) if set due to an expansion on the factura.usuario_anulacion reverse relationship
	 * @property-read Factura[] $_FacturaAsAnulacionArray the value for the private _objFacturaAsAnulacionArray (Read-Only) if set due to an ExpandAsArray on the factura.usuario_anulacion reverse relationship
	 * @property-read FacturaPmn $_FacturaPmnAsAnuladaPor the value for the private _objFacturaPmnAsAnuladaPor (Read-Only) if set due to an expansion on the factura_pmn.anulada_por reverse relationship
	 * @property-read FacturaPmn[] $_FacturaPmnAsAnuladaPorArray the value for the private _objFacturaPmnAsAnuladaPorArray (Read-Only) if set due to an ExpandAsArray on the factura_pmn.anulada_por reverse relationship
	 * @property-read FacturaPmn $_FacturaPmnAsCreadaPor the value for the private _objFacturaPmnAsCreadaPor (Read-Only) if set due to an expansion on the factura_pmn.creada_por reverse relationship
	 * @property-read FacturaPmn[] $_FacturaPmnAsCreadaPorArray the value for the private _objFacturaPmnAsCreadaPorArray (Read-Only) if set due to an ExpandAsArray on the factura_pmn.creada_por reverse relationship
	 * @property-read GuiaCkpt $_GuiaCkptAsCodiUsua the value for the private _objGuiaCkptAsCodiUsua (Read-Only) if set due to an expansion on the guia_ckpt.codi_usua reverse relationship
	 * @property-read GuiaCkpt[] $_GuiaCkptAsCodiUsuaArray the value for the private _objGuiaCkptAsCodiUsuaArray (Read-Only) if set due to an ExpandAsArray on the guia_ckpt.codi_usua reverse relationship
	 * @property-read HistoriaCliente $_HistoriaClienteAsCodiUsua the value for the private _objHistoriaClienteAsCodiUsua (Read-Only) if set due to an expansion on the historia_cliente.codi_usua reverse relationship
	 * @property-read HistoriaCliente[] $_HistoriaClienteAsCodiUsuaArray the value for the private _objHistoriaClienteAsCodiUsuaArray (Read-Only) if set due to an ExpandAsArray on the historia_cliente.codi_usua reverse relationship
	 * @property-read MotivoEliminacion $_MotivoEliminacionAsUser the value for the private _objMotivoEliminacionAsUser (Read-Only) if set due to an expansion on the motivo_eliminacion.user_id reverse relationship
	 * @property-read MotivoEliminacion[] $_MotivoEliminacionAsUserArray the value for the private _objMotivoEliminacionAsUserArray (Read-Only) if set due to an ExpandAsArray on the motivo_eliminacion.user_id reverse relationship
	 * @property-read NotaCredito $_NotaCreditoAsCreadaPor the value for the private _objNotaCreditoAsCreadaPor (Read-Only) if set due to an expansion on the nota_credito.creada_por reverse relationship
	 * @property-read NotaCredito[] $_NotaCreditoAsCreadaPorArray the value for the private _objNotaCreditoAsCreadaPorArray (Read-Only) if set due to an ExpandAsArray on the nota_credito.creada_por reverse relationship
	 * @property-read PagoFacturaPmn $_PagoFacturaPmnAsCreadoPor the value for the private _objPagoFacturaPmnAsCreadoPor (Read-Only) if set due to an expansion on the pago_factura_pmn.creado_por reverse relationship
	 * @property-read PagoFacturaPmn[] $_PagoFacturaPmnAsCreadoPorArray the value for the private _objPagoFacturaPmnAsCreadoPorArray (Read-Only) if set due to an ExpandAsArray on the pago_factura_pmn.creado_por reverse relationship
	 * @property-read RegistroTrabajo $_RegistroTrabajo the value for the private _objRegistroTrabajo (Read-Only) if set due to an expansion on the registro_trabajo.usuario_id reverse relationship
	 * @property-read RegistroTrabajo[] $_RegistroTrabajoArray the value for the private _objRegistroTrabajoArray (Read-Only) if set due to an ExpandAsArray on the registro_trabajo.usuario_id reverse relationship
	 * @property-read SreGuiaCkpt $_SreGuiaCkptAsCodiUsua the value for the private _objSreGuiaCkptAsCodiUsua (Read-Only) if set due to an expansion on the sre_guia_ckpt.codi_usua reverse relationship
	 * @property-read SreGuiaCkpt[] $_SreGuiaCkptAsCodiUsuaArray the value for the private _objSreGuiaCkptAsCodiUsuaArray (Read-Only) if set due to an ExpandAsArray on the sre_guia_ckpt.codi_usua reverse relationship
	 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class UsuarioGen extends QBaseClass implements IteratorAggregate {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////

		/**
		 * Protected member variable that maps to the database PK Identity column usuario.codi_usua
		 * Codigo::		 * @var integer intCodiUsua
		 */
		protected $intCodiUsua;
		const CodiUsuaDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.codi_grup
		 * @var integer intCodiGrup
		 */
		protected $intCodiGrup;
		const CodiGrupDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.nomb_usua
		 * Nombre::		 * @var string strNombUsua
		 */
		protected $strNombUsua;
		const NombUsuaMaxLength = 50;
		const NombUsuaDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.apel_usua
		 * Apellido::		 * @var string strApelUsua
		 */
		protected $strApelUsua;
		const ApelUsuaMaxLength = 50;
		const ApelUsuaDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.logi_usua
		 * Login::		 * @var string strLogiUsua
		 */
		protected $strLogiUsua;
		const LogiUsuaMaxLength = 8;
		const LogiUsuaDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.pass_usua
		 * Clave::		 * @var string strPassUsua
		 */
		protected $strPassUsua;
		const PassUsuaMaxLength = 50;
		const PassUsuaDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.codi_stat
		 * Estatus::		 * @var integer intCodiStat
		 */
		protected $intCodiStat;
		const CodiStatDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.codi_esta
		 * Sucursal::		 * @var string strCodiEsta
		 */
		protected $strCodiEsta;
		const CodiEstaMaxLength = 20;
		const CodiEstaDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.tipo_usua
		 * @var integer intTipoUsua
		 */
		protected $intTipoUsua;
		const TipoUsuaDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.cant_inte
		 * @var integer intCantInte
		 */
		protected $intCantInte;
		const CantInteDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.mail_usua
		 * @var string strMailUsua
		 */
		protected $strMailUsua;
		const MailUsuaMaxLength = 50;
		const MailUsuaDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.fech_acce
		 * @var QDateTime dttFechAcce
		 */
		protected $dttFechAcce;
		const FechAcceDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.moti_bloq
		 * @var string strMotiBloq
		 */
		protected $strMotiBloq;
		const MotiBloqMaxLength = 200;
		const MotiBloqDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.fech_clav
		 * @var QDateTime dttFechClav
		 */
		protected $dttFechClav;
		const FechClavDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.carg_usua
		 * @var string strCargUsua
		 */
		protected $strCargUsua;
		const CargUsuaMaxLength = 50;
		const CargUsuaDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.supervisor
		 * @var boolean blnSupervisor
		 */
		protected $blnSupervisor;
		const SupervisorDefault = 0;


		/**
		 * Protected member variable that maps to the database column usuario.grupo_id
		 * Grupo::		 * @var integer intGrupoId
		 */
		protected $intGrupoId;
		const GrupoIdDefault = null;


		/**
		 * Protected member variable that maps to the database column usuario.delete_at
		 * @var QDateTime dttDeleteAt
		 */
		protected $dttDeleteAt;
		const DeleteAtDefault = null;


		/**
		 * Private member variable that stores a reference to a single Acceso object
		 * (of type Acceso), if this Usuario object was restored with
		 * an expansion on the acceso association table.
		 * @var Acceso _objAcceso;
		 */
		private $_objAcceso;

		/**
		 * Private member variable that stores a reference to an array of Acceso objects
		 * (of type Acceso[]), if this Usuario object was restored with
		 * an ExpandAsArray on the acceso association table.
		 * @var Acceso[] _objAccesoArray;
		 */
		private $_objAccesoArray = null;

		/**
		 * Private member variable that stores a reference to a single ClientePmnAsRegistradoPor object
		 * (of type ClientePmn), if this Usuario object was restored with
		 * an expansion on the cliente_pmn association table.
		 * @var ClientePmn _objClientePmnAsRegistradoPor;
		 */
		private $_objClientePmnAsRegistradoPor;

		/**
		 * Private member variable that stores a reference to an array of ClientePmnAsRegistradoPor objects
		 * (of type ClientePmn[]), if this Usuario object was restored with
		 * an ExpandAsArray on the cliente_pmn association table.
		 * @var ClientePmn[] _objClientePmnAsRegistradoPorArray;
		 */
		private $_objClientePmnAsRegistradoPorArray = null;

		/**
		 * Private member variable that stores a reference to a single ContenedorCkpt object
		 * (of type ContenedorCkpt), if this Usuario object was restored with
		 * an expansion on the contenedor_ckpt association table.
		 * @var ContenedorCkpt _objContenedorCkpt;
		 */
		private $_objContenedorCkpt;

		/**
		 * Private member variable that stores a reference to an array of ContenedorCkpt objects
		 * (of type ContenedorCkpt[]), if this Usuario object was restored with
		 * an ExpandAsArray on the contenedor_ckpt association table.
		 * @var ContenedorCkpt[] _objContenedorCkptArray;
		 */
		private $_objContenedorCkptArray = null;

		/**
		 * Private member variable that stores a reference to a single DatosPago object
		 * (of type DatosPago), if this Usuario object was restored with
		 * an expansion on the datos_pago association table.
		 * @var DatosPago _objDatosPago;
		 */
		private $_objDatosPago;

		/**
		 * Private member variable that stores a reference to an array of DatosPago objects
		 * (of type DatosPago[]), if this Usuario object was restored with
		 * an ExpandAsArray on the datos_pago association table.
		 * @var DatosPago[] _objDatosPagoArray;
		 */
		private $_objDatosPagoArray = null;

		/**
		 * Private member variable that stores a reference to a single DspDespachoAsCodiUsua object
		 * (of type DspDespacho), if this Usuario object was restored with
		 * an expansion on the dsp_despacho association table.
		 * @var DspDespacho _objDspDespachoAsCodiUsua;
		 */
		private $_objDspDespachoAsCodiUsua;

		/**
		 * Private member variable that stores a reference to an array of DspDespachoAsCodiUsua objects
		 * (of type DspDespacho[]), if this Usuario object was restored with
		 * an ExpandAsArray on the dsp_despacho association table.
		 * @var DspDespacho[] _objDspDespachoAsCodiUsuaArray;
		 */
		private $_objDspDespachoAsCodiUsuaArray = null;

		/**
		 * Private member variable that stores a reference to a single DspDespachoAsUsuaModi object
		 * (of type DspDespacho), if this Usuario object was restored with
		 * an expansion on the dsp_despacho association table.
		 * @var DspDespacho _objDspDespachoAsUsuaModi;
		 */
		private $_objDspDespachoAsUsuaModi;

		/**
		 * Private member variable that stores a reference to an array of DspDespachoAsUsuaModi objects
		 * (of type DspDespacho[]), if this Usuario object was restored with
		 * an ExpandAsArray on the dsp_despacho association table.
		 * @var DspDespacho[] _objDspDespachoAsUsuaModiArray;
		 */
		private $_objDspDespachoAsUsuaModiArray = null;

		/**
		 * Private member variable that stores a reference to a single DspDespachoAsUsuaCier object
		 * (of type DspDespacho), if this Usuario object was restored with
		 * an expansion on the dsp_despacho association table.
		 * @var DspDespacho _objDspDespachoAsUsuaCier;
		 */
		private $_objDspDespachoAsUsuaCier;

		/**
		 * Private member variable that stores a reference to an array of DspDespachoAsUsuaCier objects
		 * (of type DspDespacho[]), if this Usuario object was restored with
		 * an ExpandAsArray on the dsp_despacho association table.
		 * @var DspDespacho[] _objDspDespachoAsUsuaCierArray;
		 */
		private $_objDspDespachoAsUsuaCierArray = null;

		/**
		 * Private member variable that stores a reference to a single DspDespachoAsUsuaDesp object
		 * (of type DspDespacho), if this Usuario object was restored with
		 * an expansion on the dsp_despacho association table.
		 * @var DspDespacho _objDspDespachoAsUsuaDesp;
		 */
		private $_objDspDespachoAsUsuaDesp;

		/**
		 * Private member variable that stores a reference to an array of DspDespachoAsUsuaDesp objects
		 * (of type DspDespacho[]), if this Usuario object was restored with
		 * an ExpandAsArray on the dsp_despacho association table.
		 * @var DspDespacho[] _objDspDespachoAsUsuaDespArray;
		 */
		private $_objDspDespachoAsUsuaDespArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaAsCreacion object
		 * (of type Factura), if this Usuario object was restored with
		 * an expansion on the factura association table.
		 * @var Factura _objFacturaAsCreacion;
		 */
		private $_objFacturaAsCreacion;

		/**
		 * Private member variable that stores a reference to an array of FacturaAsCreacion objects
		 * (of type Factura[]), if this Usuario object was restored with
		 * an ExpandAsArray on the factura association table.
		 * @var Factura[] _objFacturaAsCreacionArray;
		 */
		private $_objFacturaAsCreacionArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaAsAnulacion object
		 * (of type Factura), if this Usuario object was restored with
		 * an expansion on the factura association table.
		 * @var Factura _objFacturaAsAnulacion;
		 */
		private $_objFacturaAsAnulacion;

		/**
		 * Private member variable that stores a reference to an array of FacturaAsAnulacion objects
		 * (of type Factura[]), if this Usuario object was restored with
		 * an ExpandAsArray on the factura association table.
		 * @var Factura[] _objFacturaAsAnulacionArray;
		 */
		private $_objFacturaAsAnulacionArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaPmnAsAnuladaPor object
		 * (of type FacturaPmn), if this Usuario object was restored with
		 * an expansion on the factura_pmn association table.
		 * @var FacturaPmn _objFacturaPmnAsAnuladaPor;
		 */
		private $_objFacturaPmnAsAnuladaPor;

		/**
		 * Private member variable that stores a reference to an array of FacturaPmnAsAnuladaPor objects
		 * (of type FacturaPmn[]), if this Usuario object was restored with
		 * an ExpandAsArray on the factura_pmn association table.
		 * @var FacturaPmn[] _objFacturaPmnAsAnuladaPorArray;
		 */
		private $_objFacturaPmnAsAnuladaPorArray = null;

		/**
		 * Private member variable that stores a reference to a single FacturaPmnAsCreadaPor object
		 * (of type FacturaPmn), if this Usuario object was restored with
		 * an expansion on the factura_pmn association table.
		 * @var FacturaPmn _objFacturaPmnAsCreadaPor;
		 */
		private $_objFacturaPmnAsCreadaPor;

		/**
		 * Private member variable that stores a reference to an array of FacturaPmnAsCreadaPor objects
		 * (of type FacturaPmn[]), if this Usuario object was restored with
		 * an ExpandAsArray on the factura_pmn association table.
		 * @var FacturaPmn[] _objFacturaPmnAsCreadaPorArray;
		 */
		private $_objFacturaPmnAsCreadaPorArray = null;

		/**
		 * Private member variable that stores a reference to a single GuiaCkptAsCodiUsua object
		 * (of type GuiaCkpt), if this Usuario object was restored with
		 * an expansion on the guia_ckpt association table.
		 * @var GuiaCkpt _objGuiaCkptAsCodiUsua;
		 */
		private $_objGuiaCkptAsCodiUsua;

		/**
		 * Private member variable that stores a reference to an array of GuiaCkptAsCodiUsua objects
		 * (of type GuiaCkpt[]), if this Usuario object was restored with
		 * an ExpandAsArray on the guia_ckpt association table.
		 * @var GuiaCkpt[] _objGuiaCkptAsCodiUsuaArray;
		 */
		private $_objGuiaCkptAsCodiUsuaArray = null;

		/**
		 * Private member variable that stores a reference to a single HistoriaClienteAsCodiUsua object
		 * (of type HistoriaCliente), if this Usuario object was restored with
		 * an expansion on the historia_cliente association table.
		 * @var HistoriaCliente _objHistoriaClienteAsCodiUsua;
		 */
		private $_objHistoriaClienteAsCodiUsua;

		/**
		 * Private member variable that stores a reference to an array of HistoriaClienteAsCodiUsua objects
		 * (of type HistoriaCliente[]), if this Usuario object was restored with
		 * an ExpandAsArray on the historia_cliente association table.
		 * @var HistoriaCliente[] _objHistoriaClienteAsCodiUsuaArray;
		 */
		private $_objHistoriaClienteAsCodiUsuaArray = null;

		/**
		 * Private member variable that stores a reference to a single MotivoEliminacionAsUser object
		 * (of type MotivoEliminacion), if this Usuario object was restored with
		 * an expansion on the motivo_eliminacion association table.
		 * @var MotivoEliminacion _objMotivoEliminacionAsUser;
		 */
		private $_objMotivoEliminacionAsUser;

		/**
		 * Private member variable that stores a reference to an array of MotivoEliminacionAsUser objects
		 * (of type MotivoEliminacion[]), if this Usuario object was restored with
		 * an ExpandAsArray on the motivo_eliminacion association table.
		 * @var MotivoEliminacion[] _objMotivoEliminacionAsUserArray;
		 */
		private $_objMotivoEliminacionAsUserArray = null;

		/**
		 * Private member variable that stores a reference to a single NotaCreditoAsCreadaPor object
		 * (of type NotaCredito), if this Usuario object was restored with
		 * an expansion on the nota_credito association table.
		 * @var NotaCredito _objNotaCreditoAsCreadaPor;
		 */
		private $_objNotaCreditoAsCreadaPor;

		/**
		 * Private member variable that stores a reference to an array of NotaCreditoAsCreadaPor objects
		 * (of type NotaCredito[]), if this Usuario object was restored with
		 * an ExpandAsArray on the nota_credito association table.
		 * @var NotaCredito[] _objNotaCreditoAsCreadaPorArray;
		 */
		private $_objNotaCreditoAsCreadaPorArray = null;

		/**
		 * Private member variable that stores a reference to a single PagoFacturaPmnAsCreadoPor object
		 * (of type PagoFacturaPmn), if this Usuario object was restored with
		 * an expansion on the pago_factura_pmn association table.
		 * @var PagoFacturaPmn _objPagoFacturaPmnAsCreadoPor;
		 */
		private $_objPagoFacturaPmnAsCreadoPor;

		/**
		 * Private member variable that stores a reference to an array of PagoFacturaPmnAsCreadoPor objects
		 * (of type PagoFacturaPmn[]), if this Usuario object was restored with
		 * an ExpandAsArray on the pago_factura_pmn association table.
		 * @var PagoFacturaPmn[] _objPagoFacturaPmnAsCreadoPorArray;
		 */
		private $_objPagoFacturaPmnAsCreadoPorArray = null;

		/**
		 * Private member variable that stores a reference to a single RegistroTrabajo object
		 * (of type RegistroTrabajo), if this Usuario object was restored with
		 * an expansion on the registro_trabajo association table.
		 * @var RegistroTrabajo _objRegistroTrabajo;
		 */
		private $_objRegistroTrabajo;

		/**
		 * Private member variable that stores a reference to an array of RegistroTrabajo objects
		 * (of type RegistroTrabajo[]), if this Usuario object was restored with
		 * an ExpandAsArray on the registro_trabajo association table.
		 * @var RegistroTrabajo[] _objRegistroTrabajoArray;
		 */
		private $_objRegistroTrabajoArray = null;

		/**
		 * Private member variable that stores a reference to a single SreGuiaCkptAsCodiUsua object
		 * (of type SreGuiaCkpt), if this Usuario object was restored with
		 * an expansion on the sre_guia_ckpt association table.
		 * @var SreGuiaCkpt _objSreGuiaCkptAsCodiUsua;
		 */
		private $_objSreGuiaCkptAsCodiUsua;

		/**
		 * Private member variable that stores a reference to an array of SreGuiaCkptAsCodiUsua objects
		 * (of type SreGuiaCkpt[]), if this Usuario object was restored with
		 * an ExpandAsArray on the sre_guia_ckpt association table.
		 * @var SreGuiaCkpt[] _objSreGuiaCkptAsCodiUsuaArray;
		 */
		private $_objSreGuiaCkptAsCodiUsuaArray = null;

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
		 * in the database column usuario.codi_grup.
		 *
		 * NOTE: Always use the CodiGrupObject property getter to correctly retrieve this Grupo object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Grupo objCodiGrupObject
		 */
		protected $objCodiGrupObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column usuario.codi_esta.
		 *
		 * NOTE: Always use the CodiEstaObject property getter to correctly retrieve this Estacion object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Estacion objCodiEstaObject
		 */
		protected $objCodiEstaObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column usuario.grupo_id.
		 *
		 * NOTE: Always use the Grupo property getter to correctly retrieve this NewGrupo object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var NewGrupo objGrupo
		 */
		protected $objGrupo;

		/**
		 * Protected member variable that contains the object which points to
		 * this object by the reference in the unique database column cajero.usuario_id.
		 *
		 * NOTE: Always use the Cajero property getter to correctly retrieve this Cajero object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Cajero objCajero
		 */
		protected $objCajero;

		/**
		 * Used internally to manage whether the adjoined Cajero object
		 * needs to be updated on save.
		 *
		 * NOTE: Do not manually update this value
		 */
		protected $blnDirtyCajero;



		/**
		 * Initialize each property with default values from database definition
		 */
		public function Initialize()
		{
			$this->intCodiUsua = Usuario::CodiUsuaDefault;
			$this->intCodiGrup = Usuario::CodiGrupDefault;
			$this->strNombUsua = Usuario::NombUsuaDefault;
			$this->strApelUsua = Usuario::ApelUsuaDefault;
			$this->strLogiUsua = Usuario::LogiUsuaDefault;
			$this->strPassUsua = Usuario::PassUsuaDefault;
			$this->intCodiStat = Usuario::CodiStatDefault;
			$this->strCodiEsta = Usuario::CodiEstaDefault;
			$this->intTipoUsua = Usuario::TipoUsuaDefault;
			$this->intCantInte = Usuario::CantInteDefault;
			$this->strMailUsua = Usuario::MailUsuaDefault;
			$this->dttFechAcce = (Usuario::FechAcceDefault === null)?null:new QDateTime(Usuario::FechAcceDefault);
			$this->strMotiBloq = Usuario::MotiBloqDefault;
			$this->dttFechClav = (Usuario::FechClavDefault === null)?null:new QDateTime(Usuario::FechClavDefault);
			$this->strCargUsua = Usuario::CargUsuaDefault;
			$this->blnSupervisor = Usuario::SupervisorDefault;
			$this->intGrupoId = Usuario::GrupoIdDefault;
			$this->dttDeleteAt = (Usuario::DeleteAtDefault === null)?null:new QDateTime(Usuario::DeleteAtDefault);
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
		 * Load a Usuario from PK Info
		 * @param integer $intCodiUsua
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario
		 */
		public static function Load($intCodiUsua, $objOptionalClauses = null) {
			$strCacheKey = false;
			if (QApplication::$objCacheProvider && !$objOptionalClauses && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Usuario', $intCodiUsua);
				$objCachedObject = QApplication::$objCacheProvider->Get($strCacheKey);
				if ($objCachedObject !== false) {
					return $objCachedObject;
				}
			}
			// Use QuerySingle to Perform the Query
			$objToReturn = Usuario::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Usuario()->CodiUsua, $intCodiUsua)
				),
				$objOptionalClauses
			);
			if ($strCacheKey !== false) {
				QApplication::$objCacheProvider->Set($strCacheKey, $objToReturn);
			}
			return $objToReturn;
		}

		/**
		 * Load all Usuarios
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			if (func_num_args() > 1) {
				throw new QCallerException("LoadAll must be called with an array of optional clauses as a single argument");
			}
			// Call Usuario::QueryArray to perform the LoadAll query
			try {
				return Usuario::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Usuarios
		 * @return int
		 */
		public static function CountAll() {
			// Call Usuario::QueryCount to perform the CountAll query
			return Usuario::QueryCount(QQ::All());
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
			$objDatabase = Usuario::GetDatabase();

			// Create/Build out the QueryBuilder object with Usuario-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'usuario');

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
				Usuario::GetSelectFields($objQueryBuilder, null, QQuery::extractSelectClause($objOptionalClauses));
			}
			$objQueryBuilder->AddFromItem('usuario');

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
		 * Static Qcubed Query method to query for a single Usuario object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Usuario the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Usuario::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query, Get the First Row, and Instantiate a new Usuario object
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNode) {
				$objToReturn = array();
				$objPrevItemArray = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Usuario::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiUsua][] = $objItem;
		
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
				return Usuario::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcubed Query method to query for an array of Usuario objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Usuario[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Usuario::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Usuario::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Usuario::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcubed Query method to query for a count of Usuario objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClausees additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Usuario::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Usuario::GetDatabase();

			$strQuery = Usuario::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

			$objCache = new QCache('qquery/usuario', $strQuery);
			$cacheData = $objCache->GetData();

			if (!$cacheData || $blnForceUpdate) {
				$objDbResult = $objQueryBuilder->Database->Query($strQuery);
				$arrResult = Usuario::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
				$objCache->SaveData(serialize($arrResult));
			} else {
				$arrResult = unserialize($cacheData);
			}

			return $arrResult;
		}

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Usuario
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null, QQSelect $objSelect = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'usuario';
				$strAliasPrefix = '';
			}

            if ($objSelect) {
			    $objBuilder->AddSelectItem($strTableName, 'codi_usua', $strAliasPrefix . 'codi_usua');
                $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
            } else {
			    $objBuilder->AddSelectItem($strTableName, 'codi_usua', $strAliasPrefix . 'codi_usua');
			    $objBuilder->AddSelectItem($strTableName, 'codi_grup', $strAliasPrefix . 'codi_grup');
			    $objBuilder->AddSelectItem($strTableName, 'nomb_usua', $strAliasPrefix . 'nomb_usua');
			    $objBuilder->AddSelectItem($strTableName, 'apel_usua', $strAliasPrefix . 'apel_usua');
			    $objBuilder->AddSelectItem($strTableName, 'logi_usua', $strAliasPrefix . 'logi_usua');
			    $objBuilder->AddSelectItem($strTableName, 'pass_usua', $strAliasPrefix . 'pass_usua');
			    $objBuilder->AddSelectItem($strTableName, 'codi_stat', $strAliasPrefix . 'codi_stat');
			    $objBuilder->AddSelectItem($strTableName, 'codi_esta', $strAliasPrefix . 'codi_esta');
			    $objBuilder->AddSelectItem($strTableName, 'tipo_usua', $strAliasPrefix . 'tipo_usua');
			    $objBuilder->AddSelectItem($strTableName, 'cant_inte', $strAliasPrefix . 'cant_inte');
			    $objBuilder->AddSelectItem($strTableName, 'mail_usua', $strAliasPrefix . 'mail_usua');
			    $objBuilder->AddSelectItem($strTableName, 'fech_acce', $strAliasPrefix . 'fech_acce');
			    $objBuilder->AddSelectItem($strTableName, 'moti_bloq', $strAliasPrefix . 'moti_bloq');
			    $objBuilder->AddSelectItem($strTableName, 'fech_clav', $strAliasPrefix . 'fech_clav');
			    $objBuilder->AddSelectItem($strTableName, 'carg_usua', $strAliasPrefix . 'carg_usua');
			    $objBuilder->AddSelectItem($strTableName, 'supervisor', $strAliasPrefix . 'supervisor');
			    $objBuilder->AddSelectItem($strTableName, 'grupo_id', $strAliasPrefix . 'grupo_id');
			    $objBuilder->AddSelectItem($strTableName, 'delete_at', $strAliasPrefix . 'delete_at');
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
			
			$strAlias = $strAliasPrefix . 'codi_usua';
			$strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$blnExpanded = false;
			
			foreach ($objPreviousItemArray as $objPreviousItem) {
				if ($objPreviousItem->intCodiUsua != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
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
		 * Instantiate a Usuario from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Usuario::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param QBaseClass $arrPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return mixed Either a Usuario, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow) {
				return null;
			}
			
			if (empty ($strAliasPrefix) && $objPreviousItemArray) {
				$strColumnAlias = !empty($strColumnAliasArray['codi_usua']) ? $strColumnAliasArray['codi_usua'] : 'codi_usua';
				$key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
				$objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
			}
			
			
			// See if we're doing an array expansion on the previous item
			if ($objExpandAsArrayNode && 
					is_array($objPreviousItemArray) && 
					count($objPreviousItemArray)) {

				if (Usuario::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
					return false; // db row was used but no new object was created
				}
			}

			// Create a new instance of the Usuario object
			$objToReturn = new Usuario();
			$objToReturn->__blnRestored = true;

			$strAlias = $strAliasPrefix . 'codi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiUsua = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_grup';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiGrup = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'nomb_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strNombUsua = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'apel_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strApelUsua = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'logi_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strLogiUsua = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'pass_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strPassUsua = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'codi_stat';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCodiStat = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCodiEsta = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'tipo_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intTipoUsua = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'cant_inte';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intCantInte = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'mail_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMailUsua = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fech_acce';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechAcce = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAlias = $strAliasPrefix . 'moti_bloq';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strMotiBloq = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'fech_clav';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttFechClav = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAlias = $strAliasPrefix . 'carg_usua';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->strCargUsua = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAlias = $strAliasPrefix . 'supervisor';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->blnSupervisor = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAlias = $strAliasPrefix . 'grupo_id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->intGrupoId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAlias = $strAliasPrefix . 'delete_at';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objToReturn->dttDeleteAt = $objDbRow->GetColumn($strAliasName, 'DateTime');

			if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
				foreach ($objPreviousItemArray as $objPreviousItem) {
					if ($objToReturn->CodiUsua != $objPreviousItem->CodiUsua) {
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
				$strAliasPrefix = 'usuario__';

			// Check for CodiGrupObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_grup__codi_grup';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_grup']) ? null : $objExpansionAliasArray['codi_grup']);
				$objToReturn->objCodiGrupObject = Grupo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_grup__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for CodiEstaObject Early Binding
			$strAlias = $strAliasPrefix . 'codi_esta__codi_esta';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['codi_esta']) ? null : $objExpansionAliasArray['codi_esta']);
				$objToReturn->objCodiEstaObject = Estacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'codi_esta__', $objExpansionNode, null, $strColumnAliasArray);
			}
			// Check for Grupo Early Binding
			$strAlias = $strAliasPrefix . 'grupo_id__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				$objExpansionNode = (empty($objExpansionAliasArray['grupo_id']) ? null : $objExpansionAliasArray['grupo_id']);
				$objToReturn->objGrupo = NewGrupo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'grupo_id__', $objExpansionNode, null, $strColumnAliasArray);
			}

			// Check for Cajero Unique ReverseReference Binding
			$strAlias = $strAliasPrefix . 'cajero__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if ($objDbRow->ColumnExists($strAliasName)) {
				if (!is_null($objDbRow->GetColumn($strAliasName))) {
					$objExpansionNode = (empty($objExpansionAliasArray['cajero']) ? null : $objExpansionAliasArray['cajero']);
					$objToReturn->objCajero = Cajero::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cajero__', $objExpansionNode, null, $strColumnAliasArray);
				}
				else {
					// We ATTEMPTED to do an Early Bind but the Object Doesn't Exist
					// Let's set to FALSE so that the object knows not to try and re-query again
					$objToReturn->objCajero = false;
				}
			}

				

			// Check for Acceso Virtual Binding
			$strAlias = $strAliasPrefix . 'acceso__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['acceso']) ? null : $objExpansionAliasArray['acceso']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objAccesoArray)
				$objToReturn->_objAccesoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objAccesoArray[] = Acceso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'acceso__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objAcceso)) {
					$objToReturn->_objAcceso = Acceso::InstantiateDbRow($objDbRow, $strAliasPrefix . 'acceso__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ClientePmnAsRegistradoPor Virtual Binding
			$strAlias = $strAliasPrefix . 'clientepmnasregistradopor__cedula_rif';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['clientepmnasregistradopor']) ? null : $objExpansionAliasArray['clientepmnasregistradopor']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objClientePmnAsRegistradoPorArray)
				$objToReturn->_objClientePmnAsRegistradoPorArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objClientePmnAsRegistradoPorArray[] = ClientePmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'clientepmnasregistradopor__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objClientePmnAsRegistradoPor)) {
					$objToReturn->_objClientePmnAsRegistradoPor = ClientePmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'clientepmnasregistradopor__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for ContenedorCkpt Virtual Binding
			$strAlias = $strAliasPrefix . 'contenedorckpt__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['contenedorckpt']) ? null : $objExpansionAliasArray['contenedorckpt']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objContenedorCkptArray)
				$objToReturn->_objContenedorCkptArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objContenedorCkptArray[] = ContenedorCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contenedorckpt__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objContenedorCkpt)) {
					$objToReturn->_objContenedorCkpt = ContenedorCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'contenedorckpt__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for DatosPago Virtual Binding
			$strAlias = $strAliasPrefix . 'datospago__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['datospago']) ? null : $objExpansionAliasArray['datospago']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objDatosPagoArray)
				$objToReturn->_objDatosPagoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objDatosPagoArray[] = DatosPago::InstantiateDbRow($objDbRow, $strAliasPrefix . 'datospago__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objDatosPago)) {
					$objToReturn->_objDatosPago = DatosPago::InstantiateDbRow($objDbRow, $strAliasPrefix . 'datospago__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for DspDespachoAsCodiUsua Virtual Binding
			$strAlias = $strAliasPrefix . 'dspdespachoascodiusua__codi_desp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['dspdespachoascodiusua']) ? null : $objExpansionAliasArray['dspdespachoascodiusua']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objDspDespachoAsCodiUsuaArray)
				$objToReturn->_objDspDespachoAsCodiUsuaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objDspDespachoAsCodiUsuaArray[] = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoascodiusua__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objDspDespachoAsCodiUsua)) {
					$objToReturn->_objDspDespachoAsCodiUsua = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoascodiusua__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for DspDespachoAsUsuaModi Virtual Binding
			$strAlias = $strAliasPrefix . 'dspdespachoasusuamodi__codi_desp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['dspdespachoasusuamodi']) ? null : $objExpansionAliasArray['dspdespachoasusuamodi']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objDspDespachoAsUsuaModiArray)
				$objToReturn->_objDspDespachoAsUsuaModiArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objDspDespachoAsUsuaModiArray[] = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoasusuamodi__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objDspDespachoAsUsuaModi)) {
					$objToReturn->_objDspDespachoAsUsuaModi = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoasusuamodi__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for DspDespachoAsUsuaCier Virtual Binding
			$strAlias = $strAliasPrefix . 'dspdespachoasusuacier__codi_desp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['dspdespachoasusuacier']) ? null : $objExpansionAliasArray['dspdespachoasusuacier']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objDspDespachoAsUsuaCierArray)
				$objToReturn->_objDspDespachoAsUsuaCierArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objDspDespachoAsUsuaCierArray[] = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoasusuacier__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objDspDespachoAsUsuaCier)) {
					$objToReturn->_objDspDespachoAsUsuaCier = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoasusuacier__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for DspDespachoAsUsuaDesp Virtual Binding
			$strAlias = $strAliasPrefix . 'dspdespachoasusuadesp__codi_desp';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['dspdespachoasusuadesp']) ? null : $objExpansionAliasArray['dspdespachoasusuadesp']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objDspDespachoAsUsuaDespArray)
				$objToReturn->_objDspDespachoAsUsuaDespArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objDspDespachoAsUsuaDespArray[] = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoasusuadesp__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objDspDespachoAsUsuaDesp)) {
					$objToReturn->_objDspDespachoAsUsuaDesp = DspDespacho::InstantiateDbRow($objDbRow, $strAliasPrefix . 'dspdespachoasusuadesp__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaAsCreacion Virtual Binding
			$strAlias = $strAliasPrefix . 'facturaascreacion__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturaascreacion']) ? null : $objExpansionAliasArray['facturaascreacion']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaAsCreacionArray)
				$objToReturn->_objFacturaAsCreacionArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaAsCreacionArray[] = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaascreacion__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaAsCreacion)) {
					$objToReturn->_objFacturaAsCreacion = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaascreacion__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaAsAnulacion Virtual Binding
			$strAlias = $strAliasPrefix . 'facturaasanulacion__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturaasanulacion']) ? null : $objExpansionAliasArray['facturaasanulacion']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaAsAnulacionArray)
				$objToReturn->_objFacturaAsAnulacionArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaAsAnulacionArray[] = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaasanulacion__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaAsAnulacion)) {
					$objToReturn->_objFacturaAsAnulacion = Factura::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturaasanulacion__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaPmnAsAnuladaPor Virtual Binding
			$strAlias = $strAliasPrefix . 'facturapmnasanuladapor__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturapmnasanuladapor']) ? null : $objExpansionAliasArray['facturapmnasanuladapor']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaPmnAsAnuladaPorArray)
				$objToReturn->_objFacturaPmnAsAnuladaPorArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaPmnAsAnuladaPorArray[] = FacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapmnasanuladapor__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaPmnAsAnuladaPor)) {
					$objToReturn->_objFacturaPmnAsAnuladaPor = FacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapmnasanuladapor__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for FacturaPmnAsCreadaPor Virtual Binding
			$strAlias = $strAliasPrefix . 'facturapmnascreadapor__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['facturapmnascreadapor']) ? null : $objExpansionAliasArray['facturapmnascreadapor']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objFacturaPmnAsCreadaPorArray)
				$objToReturn->_objFacturaPmnAsCreadaPorArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objFacturaPmnAsCreadaPorArray[] = FacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapmnascreadapor__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objFacturaPmnAsCreadaPor)) {
					$objToReturn->_objFacturaPmnAsCreadaPor = FacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'facturapmnascreadapor__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for GuiaCkptAsCodiUsua Virtual Binding
			$strAlias = $strAliasPrefix . 'guiackptascodiusua__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['guiackptascodiusua']) ? null : $objExpansionAliasArray['guiackptascodiusua']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objGuiaCkptAsCodiUsuaArray)
				$objToReturn->_objGuiaCkptAsCodiUsuaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objGuiaCkptAsCodiUsuaArray[] = GuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiackptascodiusua__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objGuiaCkptAsCodiUsua)) {
					$objToReturn->_objGuiaCkptAsCodiUsua = GuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'guiackptascodiusua__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for HistoriaClienteAsCodiUsua Virtual Binding
			$strAlias = $strAliasPrefix . 'historiaclienteascodiusua__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['historiaclienteascodiusua']) ? null : $objExpansionAliasArray['historiaclienteascodiusua']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objHistoriaClienteAsCodiUsuaArray)
				$objToReturn->_objHistoriaClienteAsCodiUsuaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objHistoriaClienteAsCodiUsuaArray[] = HistoriaCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'historiaclienteascodiusua__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objHistoriaClienteAsCodiUsua)) {
					$objToReturn->_objHistoriaClienteAsCodiUsua = HistoriaCliente::InstantiateDbRow($objDbRow, $strAliasPrefix . 'historiaclienteascodiusua__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for MotivoEliminacionAsUser Virtual Binding
			$strAlias = $strAliasPrefix . 'motivoeliminacionasuser__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['motivoeliminacionasuser']) ? null : $objExpansionAliasArray['motivoeliminacionasuser']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objMotivoEliminacionAsUserArray)
				$objToReturn->_objMotivoEliminacionAsUserArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objMotivoEliminacionAsUserArray[] = MotivoEliminacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'motivoeliminacionasuser__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objMotivoEliminacionAsUser)) {
					$objToReturn->_objMotivoEliminacionAsUser = MotivoEliminacion::InstantiateDbRow($objDbRow, $strAliasPrefix . 'motivoeliminacionasuser__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for NotaCreditoAsCreadaPor Virtual Binding
			$strAlias = $strAliasPrefix . 'notacreditoascreadapor__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['notacreditoascreadapor']) ? null : $objExpansionAliasArray['notacreditoascreadapor']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objNotaCreditoAsCreadaPorArray)
				$objToReturn->_objNotaCreditoAsCreadaPorArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objNotaCreditoAsCreadaPorArray[] = NotaCredito::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditoascreadapor__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objNotaCreditoAsCreadaPor)) {
					$objToReturn->_objNotaCreditoAsCreadaPor = NotaCredito::InstantiateDbRow($objDbRow, $strAliasPrefix . 'notacreditoascreadapor__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for PagoFacturaPmnAsCreadoPor Virtual Binding
			$strAlias = $strAliasPrefix . 'pagofacturapmnascreadopor__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['pagofacturapmnascreadopor']) ? null : $objExpansionAliasArray['pagofacturapmnascreadopor']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objPagoFacturaPmnAsCreadoPorArray)
				$objToReturn->_objPagoFacturaPmnAsCreadoPorArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objPagoFacturaPmnAsCreadoPorArray[] = PagoFacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pagofacturapmnascreadopor__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objPagoFacturaPmnAsCreadoPor)) {
					$objToReturn->_objPagoFacturaPmnAsCreadoPor = PagoFacturaPmn::InstantiateDbRow($objDbRow, $strAliasPrefix . 'pagofacturapmnascreadopor__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for RegistroTrabajo Virtual Binding
			$strAlias = $strAliasPrefix . 'registrotrabajo__id';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['registrotrabajo']) ? null : $objExpansionAliasArray['registrotrabajo']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objRegistroTrabajoArray)
				$objToReturn->_objRegistroTrabajoArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objRegistroTrabajoArray[] = RegistroTrabajo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'registrotrabajo__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objRegistroTrabajo)) {
					$objToReturn->_objRegistroTrabajo = RegistroTrabajo::InstantiateDbRow($objDbRow, $strAliasPrefix . 'registrotrabajo__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			// Check for SreGuiaCkptAsCodiUsua Virtual Binding
			$strAlias = $strAliasPrefix . 'sreguiackptascodiusua__nume_guia';
			$strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
			$objExpansionNode = (empty($objExpansionAliasArray['sreguiackptascodiusua']) ? null : $objExpansionAliasArray['sreguiackptascodiusua']);
			$blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
			if ($blnExpanded && null === $objToReturn->_objSreGuiaCkptAsCodiUsuaArray)
				$objToReturn->_objSreGuiaCkptAsCodiUsuaArray = array();
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if ($blnExpanded) {
					$objToReturn->_objSreGuiaCkptAsCodiUsuaArray[] = SreGuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiackptascodiusua__', $objExpansionNode, null, $strColumnAliasArray);
				} elseif (is_null($objToReturn->_objSreGuiaCkptAsCodiUsua)) {
					$objToReturn->_objSreGuiaCkptAsCodiUsua = SreGuiaCkpt::InstantiateDbRow($objDbRow, $strAliasPrefix . 'sreguiackptascodiusua__', $objExpansionNode, null, $strColumnAliasArray);
				}
			}

			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Usuarios from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @param QQBaseNode $objExpandAsArrayNode
		 * @param string[] $strColumnAliasArray
		 * @return Usuario[]
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
					$objItem = Usuario::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objPrevItemArray[$objItem->intCodiUsua][] = $objItem;
		
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Usuario::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}


		/**
		 * Instantiate a single Usuario object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Usuario next row resulting from the query
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
			return Usuario::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////

		/**
		 * Load a single Usuario object,
		 * by CodiUsua Index(es)
		 * @param integer $intCodiUsua
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario
		*/
		public static function LoadByCodiUsua($intCodiUsua, $objOptionalClauses = null) {
			return Usuario::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Usuario()->CodiUsua, $intCodiUsua)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load a single Usuario object,
		 * by LogiUsua Index(es)
		 * @param string $strLogiUsua
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario
		*/
		public static function LoadByLogiUsua($strLogiUsua, $objOptionalClauses = null) {
			return Usuario::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Usuario()->LogiUsua, $strLogiUsua)
				),
				$objOptionalClauses
			);
		}

		/**
		 * Load an array of Usuario objects,
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario[]
		*/
		public static function LoadArrayByCodiStat($intCodiStat, $objOptionalClauses = null) {
			// Call Usuario::QueryArray to perform the LoadArrayByCodiStat query
			try {
				return Usuario::QueryArray(
					QQ::Equal(QQN::Usuario()->CodiStat, $intCodiStat),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Usuarios
		 * by CodiStat Index(es)
		 * @param integer $intCodiStat
		 * @return int
		*/
		public static function CountByCodiStat($intCodiStat) {
			// Call Usuario::QueryCount to perform the CountByCodiStat query
			return Usuario::QueryCount(
				QQ::Equal(QQN::Usuario()->CodiStat, $intCodiStat)
			);
		}

		/**
		 * Load an array of Usuario objects,
		 * by CodiEsta Index(es)
		 * @param string $strCodiEsta
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario[]
		*/
		public static function LoadArrayByCodiEsta($strCodiEsta, $objOptionalClauses = null) {
			// Call Usuario::QueryArray to perform the LoadArrayByCodiEsta query
			try {
				return Usuario::QueryArray(
					QQ::Equal(QQN::Usuario()->CodiEsta, $strCodiEsta),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Usuarios
		 * by CodiEsta Index(es)
		 * @param string $strCodiEsta
		 * @return int
		*/
		public static function CountByCodiEsta($strCodiEsta) {
			// Call Usuario::QueryCount to perform the CountByCodiEsta query
			return Usuario::QueryCount(
				QQ::Equal(QQN::Usuario()->CodiEsta, $strCodiEsta)
			);
		}

		/**
		 * Load an array of Usuario objects,
		 * by TipoUsua Index(es)
		 * @param integer $intTipoUsua
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario[]
		*/
		public static function LoadArrayByTipoUsua($intTipoUsua, $objOptionalClauses = null) {
			// Call Usuario::QueryArray to perform the LoadArrayByTipoUsua query
			try {
				return Usuario::QueryArray(
					QQ::Equal(QQN::Usuario()->TipoUsua, $intTipoUsua),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Usuarios
		 * by TipoUsua Index(es)
		 * @param integer $intTipoUsua
		 * @return int
		*/
		public static function CountByTipoUsua($intTipoUsua) {
			// Call Usuario::QueryCount to perform the CountByTipoUsua query
			return Usuario::QueryCount(
				QQ::Equal(QQN::Usuario()->TipoUsua, $intTipoUsua)
			);
		}

		/**
		 * Load an array of Usuario objects,
		 * by CodiGrup Index(es)
		 * @param integer $intCodiGrup
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario[]
		*/
		public static function LoadArrayByCodiGrup($intCodiGrup, $objOptionalClauses = null) {
			// Call Usuario::QueryArray to perform the LoadArrayByCodiGrup query
			try {
				return Usuario::QueryArray(
					QQ::Equal(QQN::Usuario()->CodiGrup, $intCodiGrup),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Usuarios
		 * by CodiGrup Index(es)
		 * @param integer $intCodiGrup
		 * @return int
		*/
		public static function CountByCodiGrup($intCodiGrup) {
			// Call Usuario::QueryCount to perform the CountByCodiGrup query
			return Usuario::QueryCount(
				QQ::Equal(QQN::Usuario()->CodiGrup, $intCodiGrup)
			);
		}

		/**
		 * Load an array of Usuario objects,
		 * by GrupoId Index(es)
		 * @param integer $intGrupoId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario[]
		*/
		public static function LoadArrayByGrupoId($intGrupoId, $objOptionalClauses = null) {
			// Call Usuario::QueryArray to perform the LoadArrayByGrupoId query
			try {
				return Usuario::QueryArray(
					QQ::Equal(QQN::Usuario()->GrupoId, $intGrupoId),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Usuarios
		 * by GrupoId Index(es)
		 * @param integer $intGrupoId
		 * @return int
		*/
		public static function CountByGrupoId($intGrupoId) {
			// Call Usuario::QueryCount to perform the CountByGrupoId query
			return Usuario::QueryCount(
				QQ::Equal(QQN::Usuario()->GrupoId, $intGrupoId)
			);
		}

		/**
		 * Load an array of Usuario objects,
		 * by DeleteAt Index(es)
		 * @param QDateTime $dttDeleteAt
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Usuario[]
		*/
		public static function LoadArrayByDeleteAt($dttDeleteAt, $objOptionalClauses = null) {
			// Call Usuario::QueryArray to perform the LoadArrayByDeleteAt query
			try {
				return Usuario::QueryArray(
					QQ::Equal(QQN::Usuario()->DeleteAt, $dttDeleteAt),
					$objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Usuarios
		 * by DeleteAt Index(es)
		 * @param QDateTime $dttDeleteAt
		 * @return int
		*/
		public static function CountByDeleteAt($dttDeleteAt) {
			// Call Usuario::QueryCount to perform the CountByDeleteAt query
			return Usuario::QueryCount(
				QQ::Equal(QQN::Usuario()->DeleteAt, $dttDeleteAt)
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////





		//////////////////////////
		// SAVE, DELETE AND RELOAD
		//////////////////////////

		/**
		 * Save this Usuario
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `usuario` (
							`codi_grup`,
							`nomb_usua`,
							`apel_usua`,
							`logi_usua`,
							`pass_usua`,
							`codi_stat`,
							`codi_esta`,
							`tipo_usua`,
							`cant_inte`,
							`mail_usua`,
							`fech_acce`,
							`moti_bloq`,
							`fech_clav`,
							`carg_usua`,
							`supervisor`,
							`grupo_id`,
							`delete_at`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCodiGrup) . ',
							' . $objDatabase->SqlVariable($this->strNombUsua) . ',
							' . $objDatabase->SqlVariable($this->strApelUsua) . ',
							' . $objDatabase->SqlVariable($this->strLogiUsua) . ',
							' . $objDatabase->SqlVariable($this->strPassUsua) . ',
							' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							' . $objDatabase->SqlVariable($this->intTipoUsua) . ',
							' . $objDatabase->SqlVariable($this->intCantInte) . ',
							' . $objDatabase->SqlVariable($this->strMailUsua) . ',
							' . $objDatabase->SqlVariable($this->dttFechAcce) . ',
							' . $objDatabase->SqlVariable($this->strMotiBloq) . ',
							' . $objDatabase->SqlVariable($this->dttFechClav) . ',
							' . $objDatabase->SqlVariable($this->strCargUsua) . ',
							' . $objDatabase->SqlVariable($this->blnSupervisor) . ',
							' . $objDatabase->SqlVariable($this->intGrupoId) . ',
							' . $objDatabase->SqlVariable($this->dttDeleteAt) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intCodiUsua = $objDatabase->InsertId('usuario', 'codi_usua');
				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`usuario`
						SET
							`codi_grup` = ' . $objDatabase->SqlVariable($this->intCodiGrup) . ',
							`nomb_usua` = ' . $objDatabase->SqlVariable($this->strNombUsua) . ',
							`apel_usua` = ' . $objDatabase->SqlVariable($this->strApelUsua) . ',
							`logi_usua` = ' . $objDatabase->SqlVariable($this->strLogiUsua) . ',
							`pass_usua` = ' . $objDatabase->SqlVariable($this->strPassUsua) . ',
							`codi_stat` = ' . $objDatabase->SqlVariable($this->intCodiStat) . ',
							`codi_esta` = ' . $objDatabase->SqlVariable($this->strCodiEsta) . ',
							`tipo_usua` = ' . $objDatabase->SqlVariable($this->intTipoUsua) . ',
							`cant_inte` = ' . $objDatabase->SqlVariable($this->intCantInte) . ',
							`mail_usua` = ' . $objDatabase->SqlVariable($this->strMailUsua) . ',
							`fech_acce` = ' . $objDatabase->SqlVariable($this->dttFechAcce) . ',
							`moti_bloq` = ' . $objDatabase->SqlVariable($this->strMotiBloq) . ',
							`fech_clav` = ' . $objDatabase->SqlVariable($this->dttFechClav) . ',
							`carg_usua` = ' . $objDatabase->SqlVariable($this->strCargUsua) . ',
							`supervisor` = ' . $objDatabase->SqlVariable($this->blnSupervisor) . ',
							`grupo_id` = ' . $objDatabase->SqlVariable($this->intGrupoId) . ',
							`delete_at` = ' . $objDatabase->SqlVariable($this->dttDeleteAt) . '
						WHERE
							`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
					');
				}
					



				// Update the adjoined Cajero object (if applicable)
				// TODO: Make this into hard-coded SQL queries
				if ($this->blnDirtyCajero) {
					// Unassociate the old one (if applicable)
					if ($objAssociated = Cajero::LoadByUsuarioId($this->intCodiUsua)) {
						$objAssociated->UsuarioId = null;
						$objAssociated->Save();
					}

					// Associate the new one (if applicable)
					if ($this->objCajero) {
						$this->objCajero->UsuarioId = $this->intCodiUsua;
						$this->objCajero->Save();
					}

					// Reset the "Dirty" flag
					$this->blnDirtyCajero = false;
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
		 * Delete this Usuario
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Usuario with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();


		
			// Update the adjoined Cajero object (if applicable) and perform a delete

			// Optional -- if you **KNOW** that you do not want to EVER run any level of business logic on the disassocation,
			// you *could* override Delete() so that this step can be a single hard coded query to optimize performance.
			if ($objAssociated = Cajero::LoadByUsuarioId($this->intCodiUsua)) {
				$objAssociated->Delete();
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`usuario`
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '');

			$this->DeleteCache();
		}

        /**
 	     * Delete this Usuario ONLY from the cache
 		 * @return void
		 */
		public function DeleteCache() {
			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				$strCacheKey = QApplication::$objCacheProvider->CreateKey(QApplication::$Database[1]->Database, 'Usuario', $this->intCodiUsua);
				QApplication::$objCacheProvider->Delete($strCacheKey);
			}
		}

		/**
		 * Delete all Usuarios
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`usuario`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Truncate usuario table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `usuario`');

			if (QApplication::$objCacheProvider && QApplication::$Database[1]->Caching) {
				QApplication::$objCacheProvider->DeleteAll();
			}
		}

		/**
		 * Reload this Usuario from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Usuario object.');

			$this->DeleteCache();

			// Reload the Object
			$objReloaded = Usuario::Load($this->intCodiUsua);

			// Update $this's local variables to match
			$this->CodiGrup = $objReloaded->CodiGrup;
			$this->strNombUsua = $objReloaded->strNombUsua;
			$this->strApelUsua = $objReloaded->strApelUsua;
			$this->strLogiUsua = $objReloaded->strLogiUsua;
			$this->strPassUsua = $objReloaded->strPassUsua;
			$this->CodiStat = $objReloaded->CodiStat;
			$this->CodiEsta = $objReloaded->CodiEsta;
			$this->TipoUsua = $objReloaded->TipoUsua;
			$this->intCantInte = $objReloaded->intCantInte;
			$this->strMailUsua = $objReloaded->strMailUsua;
			$this->dttFechAcce = $objReloaded->dttFechAcce;
			$this->strMotiBloq = $objReloaded->strMotiBloq;
			$this->dttFechClav = $objReloaded->dttFechClav;
			$this->strCargUsua = $objReloaded->strCargUsua;
			$this->blnSupervisor = $objReloaded->blnSupervisor;
			$this->GrupoId = $objReloaded->GrupoId;
			$this->dttDeleteAt = $objReloaded->dttDeleteAt;
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
				case 'CodiUsua':
					/**
					 * Gets the value for intCodiUsua (Read-Only PK)
					 * @return integer
					 */
					return $this->intCodiUsua;

				case 'CodiGrup':
					/**
					 * Gets the value for intCodiGrup (Not Null)
					 * @return integer
					 */
					return $this->intCodiGrup;

				case 'NombUsua':
					/**
					 * Gets the value for strNombUsua (Not Null)
					 * @return string
					 */
					return $this->strNombUsua;

				case 'ApelUsua':
					/**
					 * Gets the value for strApelUsua (Not Null)
					 * @return string
					 */
					return $this->strApelUsua;

				case 'LogiUsua':
					/**
					 * Gets the value for strLogiUsua (Unique)
					 * @return string
					 */
					return $this->strLogiUsua;

				case 'PassUsua':
					/**
					 * Gets the value for strPassUsua (Not Null)
					 * @return string
					 */
					return $this->strPassUsua;

				case 'CodiStat':
					/**
					 * Gets the value for intCodiStat (Not Null)
					 * @return integer
					 */
					return $this->intCodiStat;

				case 'CodiEsta':
					/**
					 * Gets the value for strCodiEsta (Not Null)
					 * @return string
					 */
					return $this->strCodiEsta;

				case 'TipoUsua':
					/**
					 * Gets the value for intTipoUsua (Not Null)
					 * @return integer
					 */
					return $this->intTipoUsua;

				case 'CantInte':
					/**
					 * Gets the value for intCantInte 
					 * @return integer
					 */
					return $this->intCantInte;

				case 'MailUsua':
					/**
					 * Gets the value for strMailUsua 
					 * @return string
					 */
					return $this->strMailUsua;

				case 'FechAcce':
					/**
					 * Gets the value for dttFechAcce 
					 * @return QDateTime
					 */
					return $this->dttFechAcce;

				case 'MotiBloq':
					/**
					 * Gets the value for strMotiBloq 
					 * @return string
					 */
					return $this->strMotiBloq;

				case 'FechClav':
					/**
					 * Gets the value for dttFechClav 
					 * @return QDateTime
					 */
					return $this->dttFechClav;

				case 'CargUsua':
					/**
					 * Gets the value for strCargUsua 
					 * @return string
					 */
					return $this->strCargUsua;

				case 'Supervisor':
					/**
					 * Gets the value for blnSupervisor 
					 * @return boolean
					 */
					return $this->blnSupervisor;

				case 'GrupoId':
					/**
					 * Gets the value for intGrupoId 
					 * @return integer
					 */
					return $this->intGrupoId;

				case 'DeleteAt':
					/**
					 * Gets the value for dttDeleteAt 
					 * @return QDateTime
					 */
					return $this->dttDeleteAt;


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiGrupObject':
					/**
					 * Gets the value for the Grupo object referenced by intCodiGrup (Not Null)
					 * @return Grupo
					 */
					try {
						if ((!$this->objCodiGrupObject) && (!is_null($this->intCodiGrup)))
							$this->objCodiGrupObject = Grupo::Load($this->intCodiGrup);
						return $this->objCodiGrupObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'Grupo':
					/**
					 * Gets the value for the NewGrupo object referenced by intGrupoId 
					 * @return NewGrupo
					 */
					try {
						if ((!$this->objGrupo) && (!is_null($this->intGrupoId)))
							$this->objGrupo = NewGrupo::Load($this->intGrupoId);
						return $this->objGrupo;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cajero':
					/**
					 * Gets the value for the Cajero object that uniquely references this Usuario
					 * by objCajero (Unique)
					 * @return Cajero
					 */
					try {
						if ($this->objCajero === false)
							// We've attempted early binding -- and the reverse reference object does not exist
							return null;
						if (!$this->objCajero)
							$this->objCajero = Cajero::LoadByUsuarioId($this->intCodiUsua);
						return $this->objCajero;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Acceso':
					/**
					 * Gets the value for the private _objAcceso (Read-Only)
					 * if set due to an expansion on the acceso.usuario_id reverse relationship
					 * @return Acceso
					 */
					return $this->_objAcceso;

				case '_AccesoArray':
					/**
					 * Gets the value for the private _objAccesoArray (Read-Only)
					 * if set due to an ExpandAsArray on the acceso.usuario_id reverse relationship
					 * @return Acceso[]
					 */
					return $this->_objAccesoArray;

				case '_ClientePmnAsRegistradoPor':
					/**
					 * Gets the value for the private _objClientePmnAsRegistradoPor (Read-Only)
					 * if set due to an expansion on the cliente_pmn.registrado_por reverse relationship
					 * @return ClientePmn
					 */
					return $this->_objClientePmnAsRegistradoPor;

				case '_ClientePmnAsRegistradoPorArray':
					/**
					 * Gets the value for the private _objClientePmnAsRegistradoPorArray (Read-Only)
					 * if set due to an ExpandAsArray on the cliente_pmn.registrado_por reverse relationship
					 * @return ClientePmn[]
					 */
					return $this->_objClientePmnAsRegistradoPorArray;

				case '_ContenedorCkpt':
					/**
					 * Gets the value for the private _objContenedorCkpt (Read-Only)
					 * if set due to an expansion on the contenedor_ckpt.usuario reverse relationship
					 * @return ContenedorCkpt
					 */
					return $this->_objContenedorCkpt;

				case '_ContenedorCkptArray':
					/**
					 * Gets the value for the private _objContenedorCkptArray (Read-Only)
					 * if set due to an ExpandAsArray on the contenedor_ckpt.usuario reverse relationship
					 * @return ContenedorCkpt[]
					 */
					return $this->_objContenedorCkptArray;

				case '_DatosPago':
					/**
					 * Gets the value for the private _objDatosPago (Read-Only)
					 * if set due to an expansion on the datos_pago.usuario_id reverse relationship
					 * @return DatosPago
					 */
					return $this->_objDatosPago;

				case '_DatosPagoArray':
					/**
					 * Gets the value for the private _objDatosPagoArray (Read-Only)
					 * if set due to an ExpandAsArray on the datos_pago.usuario_id reverse relationship
					 * @return DatosPago[]
					 */
					return $this->_objDatosPagoArray;

				case '_DspDespachoAsCodiUsua':
					/**
					 * Gets the value for the private _objDspDespachoAsCodiUsua (Read-Only)
					 * if set due to an expansion on the dsp_despacho.codi_usua reverse relationship
					 * @return DspDespacho
					 */
					return $this->_objDspDespachoAsCodiUsua;

				case '_DspDespachoAsCodiUsuaArray':
					/**
					 * Gets the value for the private _objDspDespachoAsCodiUsuaArray (Read-Only)
					 * if set due to an ExpandAsArray on the dsp_despacho.codi_usua reverse relationship
					 * @return DspDespacho[]
					 */
					return $this->_objDspDespachoAsCodiUsuaArray;

				case '_DspDespachoAsUsuaModi':
					/**
					 * Gets the value for the private _objDspDespachoAsUsuaModi (Read-Only)
					 * if set due to an expansion on the dsp_despacho.usua_modi reverse relationship
					 * @return DspDespacho
					 */
					return $this->_objDspDespachoAsUsuaModi;

				case '_DspDespachoAsUsuaModiArray':
					/**
					 * Gets the value for the private _objDspDespachoAsUsuaModiArray (Read-Only)
					 * if set due to an ExpandAsArray on the dsp_despacho.usua_modi reverse relationship
					 * @return DspDespacho[]
					 */
					return $this->_objDspDespachoAsUsuaModiArray;

				case '_DspDespachoAsUsuaCier':
					/**
					 * Gets the value for the private _objDspDespachoAsUsuaCier (Read-Only)
					 * if set due to an expansion on the dsp_despacho.usua_cier reverse relationship
					 * @return DspDespacho
					 */
					return $this->_objDspDespachoAsUsuaCier;

				case '_DspDespachoAsUsuaCierArray':
					/**
					 * Gets the value for the private _objDspDespachoAsUsuaCierArray (Read-Only)
					 * if set due to an ExpandAsArray on the dsp_despacho.usua_cier reverse relationship
					 * @return DspDespacho[]
					 */
					return $this->_objDspDespachoAsUsuaCierArray;

				case '_DspDespachoAsUsuaDesp':
					/**
					 * Gets the value for the private _objDspDespachoAsUsuaDesp (Read-Only)
					 * if set due to an expansion on the dsp_despacho.usua_desp reverse relationship
					 * @return DspDespacho
					 */
					return $this->_objDspDespachoAsUsuaDesp;

				case '_DspDespachoAsUsuaDespArray':
					/**
					 * Gets the value for the private _objDspDespachoAsUsuaDespArray (Read-Only)
					 * if set due to an ExpandAsArray on the dsp_despacho.usua_desp reverse relationship
					 * @return DspDespacho[]
					 */
					return $this->_objDspDespachoAsUsuaDespArray;

				case '_FacturaAsCreacion':
					/**
					 * Gets the value for the private _objFacturaAsCreacion (Read-Only)
					 * if set due to an expansion on the factura.usuario_creacion reverse relationship
					 * @return Factura
					 */
					return $this->_objFacturaAsCreacion;

				case '_FacturaAsCreacionArray':
					/**
					 * Gets the value for the private _objFacturaAsCreacionArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura.usuario_creacion reverse relationship
					 * @return Factura[]
					 */
					return $this->_objFacturaAsCreacionArray;

				case '_FacturaAsAnulacion':
					/**
					 * Gets the value for the private _objFacturaAsAnulacion (Read-Only)
					 * if set due to an expansion on the factura.usuario_anulacion reverse relationship
					 * @return Factura
					 */
					return $this->_objFacturaAsAnulacion;

				case '_FacturaAsAnulacionArray':
					/**
					 * Gets the value for the private _objFacturaAsAnulacionArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura.usuario_anulacion reverse relationship
					 * @return Factura[]
					 */
					return $this->_objFacturaAsAnulacionArray;

				case '_FacturaPmnAsAnuladaPor':
					/**
					 * Gets the value for the private _objFacturaPmnAsAnuladaPor (Read-Only)
					 * if set due to an expansion on the factura_pmn.anulada_por reverse relationship
					 * @return FacturaPmn
					 */
					return $this->_objFacturaPmnAsAnuladaPor;

				case '_FacturaPmnAsAnuladaPorArray':
					/**
					 * Gets the value for the private _objFacturaPmnAsAnuladaPorArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura_pmn.anulada_por reverse relationship
					 * @return FacturaPmn[]
					 */
					return $this->_objFacturaPmnAsAnuladaPorArray;

				case '_FacturaPmnAsCreadaPor':
					/**
					 * Gets the value for the private _objFacturaPmnAsCreadaPor (Read-Only)
					 * if set due to an expansion on the factura_pmn.creada_por reverse relationship
					 * @return FacturaPmn
					 */
					return $this->_objFacturaPmnAsCreadaPor;

				case '_FacturaPmnAsCreadaPorArray':
					/**
					 * Gets the value for the private _objFacturaPmnAsCreadaPorArray (Read-Only)
					 * if set due to an ExpandAsArray on the factura_pmn.creada_por reverse relationship
					 * @return FacturaPmn[]
					 */
					return $this->_objFacturaPmnAsCreadaPorArray;

				case '_GuiaCkptAsCodiUsua':
					/**
					 * Gets the value for the private _objGuiaCkptAsCodiUsua (Read-Only)
					 * if set due to an expansion on the guia_ckpt.codi_usua reverse relationship
					 * @return GuiaCkpt
					 */
					return $this->_objGuiaCkptAsCodiUsua;

				case '_GuiaCkptAsCodiUsuaArray':
					/**
					 * Gets the value for the private _objGuiaCkptAsCodiUsuaArray (Read-Only)
					 * if set due to an ExpandAsArray on the guia_ckpt.codi_usua reverse relationship
					 * @return GuiaCkpt[]
					 */
					return $this->_objGuiaCkptAsCodiUsuaArray;

				case '_HistoriaClienteAsCodiUsua':
					/**
					 * Gets the value for the private _objHistoriaClienteAsCodiUsua (Read-Only)
					 * if set due to an expansion on the historia_cliente.codi_usua reverse relationship
					 * @return HistoriaCliente
					 */
					return $this->_objHistoriaClienteAsCodiUsua;

				case '_HistoriaClienteAsCodiUsuaArray':
					/**
					 * Gets the value for the private _objHistoriaClienteAsCodiUsuaArray (Read-Only)
					 * if set due to an ExpandAsArray on the historia_cliente.codi_usua reverse relationship
					 * @return HistoriaCliente[]
					 */
					return $this->_objHistoriaClienteAsCodiUsuaArray;

				case '_MotivoEliminacionAsUser':
					/**
					 * Gets the value for the private _objMotivoEliminacionAsUser (Read-Only)
					 * if set due to an expansion on the motivo_eliminacion.user_id reverse relationship
					 * @return MotivoEliminacion
					 */
					return $this->_objMotivoEliminacionAsUser;

				case '_MotivoEliminacionAsUserArray':
					/**
					 * Gets the value for the private _objMotivoEliminacionAsUserArray (Read-Only)
					 * if set due to an ExpandAsArray on the motivo_eliminacion.user_id reverse relationship
					 * @return MotivoEliminacion[]
					 */
					return $this->_objMotivoEliminacionAsUserArray;

				case '_NotaCreditoAsCreadaPor':
					/**
					 * Gets the value for the private _objNotaCreditoAsCreadaPor (Read-Only)
					 * if set due to an expansion on the nota_credito.creada_por reverse relationship
					 * @return NotaCredito
					 */
					return $this->_objNotaCreditoAsCreadaPor;

				case '_NotaCreditoAsCreadaPorArray':
					/**
					 * Gets the value for the private _objNotaCreditoAsCreadaPorArray (Read-Only)
					 * if set due to an ExpandAsArray on the nota_credito.creada_por reverse relationship
					 * @return NotaCredito[]
					 */
					return $this->_objNotaCreditoAsCreadaPorArray;

				case '_PagoFacturaPmnAsCreadoPor':
					/**
					 * Gets the value for the private _objPagoFacturaPmnAsCreadoPor (Read-Only)
					 * if set due to an expansion on the pago_factura_pmn.creado_por reverse relationship
					 * @return PagoFacturaPmn
					 */
					return $this->_objPagoFacturaPmnAsCreadoPor;

				case '_PagoFacturaPmnAsCreadoPorArray':
					/**
					 * Gets the value for the private _objPagoFacturaPmnAsCreadoPorArray (Read-Only)
					 * if set due to an ExpandAsArray on the pago_factura_pmn.creado_por reverse relationship
					 * @return PagoFacturaPmn[]
					 */
					return $this->_objPagoFacturaPmnAsCreadoPorArray;

				case '_RegistroTrabajo':
					/**
					 * Gets the value for the private _objRegistroTrabajo (Read-Only)
					 * if set due to an expansion on the registro_trabajo.usuario_id reverse relationship
					 * @return RegistroTrabajo
					 */
					return $this->_objRegistroTrabajo;

				case '_RegistroTrabajoArray':
					/**
					 * Gets the value for the private _objRegistroTrabajoArray (Read-Only)
					 * if set due to an ExpandAsArray on the registro_trabajo.usuario_id reverse relationship
					 * @return RegistroTrabajo[]
					 */
					return $this->_objRegistroTrabajoArray;

				case '_SreGuiaCkptAsCodiUsua':
					/**
					 * Gets the value for the private _objSreGuiaCkptAsCodiUsua (Read-Only)
					 * if set due to an expansion on the sre_guia_ckpt.codi_usua reverse relationship
					 * @return SreGuiaCkpt
					 */
					return $this->_objSreGuiaCkptAsCodiUsua;

				case '_SreGuiaCkptAsCodiUsuaArray':
					/**
					 * Gets the value for the private _objSreGuiaCkptAsCodiUsuaArray (Read-Only)
					 * if set due to an ExpandAsArray on the sre_guia_ckpt.codi_usua reverse relationship
					 * @return SreGuiaCkpt[]
					 */
					return $this->_objSreGuiaCkptAsCodiUsuaArray;


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
				case 'CodiGrup':
					/**
					 * Sets the value for intCodiGrup (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objCodiGrupObject = null;
						return ($this->intCodiGrup = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'NombUsua':
					/**
					 * Sets the value for strNombUsua (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strNombUsua = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ApelUsua':
					/**
					 * Sets the value for strApelUsua (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strApelUsua = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LogiUsua':
					/**
					 * Sets the value for strLogiUsua (Unique)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strLogiUsua = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PassUsua':
					/**
					 * Sets the value for strPassUsua (Not Null)
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strPassUsua = QType::Cast($mixValue, QType::String));
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

				case 'TipoUsua':
					/**
					 * Sets the value for intTipoUsua (Not Null)
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intTipoUsua = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CantInte':
					/**
					 * Sets the value for intCantInte 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						return ($this->intCantInte = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MailUsua':
					/**
					 * Sets the value for strMailUsua 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMailUsua = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechAcce':
					/**
					 * Sets the value for dttFechAcce 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechAcce = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MotiBloq':
					/**
					 * Sets the value for strMotiBloq 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strMotiBloq = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FechClav':
					/**
					 * Sets the value for dttFechClav 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttFechClav = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CargUsua':
					/**
					 * Sets the value for strCargUsua 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCargUsua = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Supervisor':
					/**
					 * Sets the value for blnSupervisor 
					 * @param boolean $mixValue
					 * @return boolean
					 */
					try {
						return ($this->blnSupervisor = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'GrupoId':
					/**
					 * Sets the value for intGrupoId 
					 * @param integer $mixValue
					 * @return integer
					 */
					try {
						$this->objGrupo = null;
						return ($this->intGrupoId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DeleteAt':
					/**
					 * Sets the value for dttDeleteAt 
					 * @param QDateTime $mixValue
					 * @return QDateTime
					 */
					try {
						return ($this->dttDeleteAt = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'CodiGrupObject':
					/**
					 * Sets the value for the Grupo object referenced by intCodiGrup (Not Null)
					 * @param Grupo $mixValue
					 * @return Grupo
					 */
					if (is_null($mixValue)) {
						$this->intCodiGrup = null;
						$this->objCodiGrupObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Grupo object
						try {
							$mixValue = QType::Cast($mixValue, 'Grupo');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED Grupo object
						if (is_null($mixValue->CodiGrup))
							throw new QCallerException('Unable to set an unsaved CodiGrupObject for this Usuario');

						// Update Local Member Variables
						$this->objCodiGrupObject = $mixValue;
						$this->intCodiGrup = $mixValue->CodiGrup;

						// Return $mixValue
						return $mixValue;
					}
					break;

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
							throw new QCallerException('Unable to set an unsaved CodiEstaObject for this Usuario');

						// Update Local Member Variables
						$this->objCodiEstaObject = $mixValue;
						$this->strCodiEsta = $mixValue->CodiEsta;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Grupo':
					/**
					 * Sets the value for the NewGrupo object referenced by intGrupoId 
					 * @param NewGrupo $mixValue
					 * @return NewGrupo
					 */
					if (is_null($mixValue)) {
						$this->intGrupoId = null;
						$this->objGrupo = null;
						return null;
					} else {
						// Make sure $mixValue actually is a NewGrupo object
						try {
							$mixValue = QType::Cast($mixValue, 'NewGrupo');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Make sure $mixValue is a SAVED NewGrupo object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Grupo for this Usuario');

						// Update Local Member Variables
						$this->objGrupo = $mixValue;
						$this->intGrupoId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Cajero':
					/**
					 * Sets the value for the Cajero object referenced by objCajero (Unique)
					 * @param Cajero $mixValue
					 * @return Cajero
					 */
					if (is_null($mixValue)) {
						$this->objCajero = null;

						// Make sure we update the adjoined Cajero object the next time we call Save()
						$this->blnDirtyCajero = true;

						return null;
					} else {
						// Make sure $mixValue actually is a Cajero object
						try {
							$mixValue = QType::Cast($mixValue, 'Cajero');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						}

						// Are we setting objCajero to a DIFFERENT $mixValue?
						if ((!$this->Cajero) || ($this->Cajero->Id != $mixValue->Id)) {
							// Yes -- therefore, set the "Dirty" flag to true
							// to make sure we update the adjoined Cajero object the next time we call Save()
							$this->blnDirtyCajero = true;

							// Update Local Member Variable
							$this->objCajero = $mixValue;
						} else {
							// Nope -- therefore, make no changes
						}

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
			if ($this->CountAccesos()) {
				$arrTablRela[] = 'acceso';
			}
			if ($this->CountClientePmnsAsRegistradoPor()) {
				$arrTablRela[] = 'cliente_pmn';
			}
			if ($this->CountContenedorCkpts()) {
				$arrTablRela[] = 'contenedor_ckpt';
			}
			if ($this->CountDatosPagos()) {
				$arrTablRela[] = 'datos_pago';
			}
			if ($this->CountDspDespachosAsCodiUsua()) {
				$arrTablRela[] = 'dsp_despacho';
			}
			if ($this->CountDspDespachosAsUsuaModi()) {
				$arrTablRela[] = 'dsp_despacho';
			}
			if ($this->CountDspDespachosAsUsuaCier()) {
				$arrTablRela[] = 'dsp_despacho';
			}
			if ($this->CountDspDespachosAsUsuaDesp()) {
				$arrTablRela[] = 'dsp_despacho';
			}
			if ($this->CountFacturasAsCreacion()) {
				$arrTablRela[] = 'factura';
			}
			if ($this->CountFacturasAsAnulacion()) {
				$arrTablRela[] = 'factura';
			}
			if ($this->CountFacturaPmnsAsAnuladaPor()) {
				$arrTablRela[] = 'factura_pmn';
			}
			if ($this->CountFacturaPmnsAsCreadaPor()) {
				$arrTablRela[] = 'factura_pmn';
			}
			if ($this->CountGuiaCkptsAsCodiUsua()) {
				$arrTablRela[] = 'guia_ckpt';
			}
			if ($this->CountHistoriaClientesAsCodiUsua()) {
				$arrTablRela[] = 'historia_cliente';
			}
			if ($this->CountMotivoEliminacionsAsUser()) {
				$arrTablRela[] = 'motivo_eliminacion';
			}
			if ($this->CountNotaCreditosAsCreadaPor()) {
				$arrTablRela[] = 'nota_credito';
			}
			if ($this->CountPagoFacturaPmnsAsCreadoPor()) {
				$arrTablRela[] = 'pago_factura_pmn';
			}
			if ($this->CountRegistroTrabajos()) {
				$arrTablRela[] = 'registro_trabajo';
			}
			if ($this->CountSreGuiaCkptsAsCodiUsua()) {
				$arrTablRela[] = 'sre_guia_ckpt';
			}
			
			return $arrTablRela;
		}

		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////



		// Related Objects' Methods for Acceso
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Accesos as an array of Acceso objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Acceso[]
		*/
		public function GetAccesoArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return Acceso::LoadArrayByUsuarioId($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Accesos
		 * @return int
		*/
		public function CountAccesos() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return Acceso::CountByUsuarioId($this->intCodiUsua);
		}

		/**
		 * Associates a Acceso
		 * @param Acceso $objAcceso
		 * @return void
		*/
		public function AssociateAcceso(Acceso $objAcceso) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAcceso on this unsaved Usuario.');
			if ((is_null($objAcceso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateAcceso on this Usuario with an unsaved Acceso.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`acceso`
				SET
					`usuario_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAcceso->Id) . '
			');
		}

		/**
		 * Unassociates a Acceso
		 * @param Acceso $objAcceso
		 * @return void
		*/
		public function UnassociateAcceso(Acceso $objAcceso) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAcceso on this unsaved Usuario.');
			if ((is_null($objAcceso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAcceso on this Usuario with an unsaved Acceso.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`acceso`
				SET
					`usuario_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAcceso->Id) . ' AND
					`usuario_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all Accesos
		 * @return void
		*/
		public function UnassociateAllAccesos() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAcceso on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`acceso`
				SET
					`usuario_id` = null
				WHERE
					`usuario_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated Acceso
		 * @param Acceso $objAcceso
		 * @return void
		*/
		public function DeleteAssociatedAcceso(Acceso $objAcceso) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAcceso on this unsaved Usuario.');
			if ((is_null($objAcceso->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAcceso on this Usuario with an unsaved Acceso.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`acceso`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objAcceso->Id) . ' AND
					`usuario_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated Accesos
		 * @return void
		*/
		public function DeleteAllAccesos() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAcceso on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`acceso`
				WHERE
					`usuario_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for ClientePmnAsRegistradoPor
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ClientePmnsAsRegistradoPor as an array of ClientePmn objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ClientePmn[]
		*/
		public function GetClientePmnAsRegistradoPorArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return ClientePmn::LoadArrayByRegistradoPor($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ClientePmnsAsRegistradoPor
		 * @return int
		*/
		public function CountClientePmnsAsRegistradoPor() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return ClientePmn::CountByRegistradoPor($this->intCodiUsua);
		}

		/**
		 * Associates a ClientePmnAsRegistradoPor
		 * @param ClientePmn $objClientePmn
		 * @return void
		*/
		public function AssociateClientePmnAsRegistradoPor(ClientePmn $objClientePmn) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClientePmnAsRegistradoPor on this unsaved Usuario.');
			if ((is_null($objClientePmn->CedulaRif)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateClientePmnAsRegistradoPor on this Usuario with an unsaved ClientePmn.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cliente_pmn`
				SET
					`registrado_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`cedula_rif` = ' . $objDatabase->SqlVariable($objClientePmn->CedulaRif) . '
			');
		}

		/**
		 * Unassociates a ClientePmnAsRegistradoPor
		 * @param ClientePmn $objClientePmn
		 * @return void
		*/
		public function UnassociateClientePmnAsRegistradoPor(ClientePmn $objClientePmn) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientePmnAsRegistradoPor on this unsaved Usuario.');
			if ((is_null($objClientePmn->CedulaRif)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientePmnAsRegistradoPor on this Usuario with an unsaved ClientePmn.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cliente_pmn`
				SET
					`registrado_por` = null
				WHERE
					`cedula_rif` = ' . $objDatabase->SqlVariable($objClientePmn->CedulaRif) . ' AND
					`registrado_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all ClientePmnsAsRegistradoPor
		 * @return void
		*/
		public function UnassociateAllClientePmnsAsRegistradoPor() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientePmnAsRegistradoPor on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`cliente_pmn`
				SET
					`registrado_por` = null
				WHERE
					`registrado_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated ClientePmnAsRegistradoPor
		 * @param ClientePmn $objClientePmn
		 * @return void
		*/
		public function DeleteAssociatedClientePmnAsRegistradoPor(ClientePmn $objClientePmn) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientePmnAsRegistradoPor on this unsaved Usuario.');
			if ((is_null($objClientePmn->CedulaRif)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientePmnAsRegistradoPor on this Usuario with an unsaved ClientePmn.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_pmn`
				WHERE
					`cedula_rif` = ' . $objDatabase->SqlVariable($objClientePmn->CedulaRif) . ' AND
					`registrado_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated ClientePmnsAsRegistradoPor
		 * @return void
		*/
		public function DeleteAllClientePmnsAsRegistradoPor() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateClientePmnAsRegistradoPor on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`cliente_pmn`
				WHERE
					`registrado_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for ContenedorCkpt
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ContenedorCkpts as an array of ContenedorCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ContenedorCkpt[]
		*/
		public function GetContenedorCkptArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return ContenedorCkpt::LoadArrayByUsuario($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ContenedorCkpts
		 * @return int
		*/
		public function CountContenedorCkpts() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return ContenedorCkpt::CountByUsuario($this->intCodiUsua);
		}

		/**
		 * Associates a ContenedorCkpt
		 * @param ContenedorCkpt $objContenedorCkpt
		 * @return void
		*/
		public function AssociateContenedorCkpt(ContenedorCkpt $objContenedorCkpt) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContenedorCkpt on this unsaved Usuario.');
			if ((is_null($objContenedorCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateContenedorCkpt on this Usuario with an unsaved ContenedorCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contenedor_ckpt`
				SET
					`usuario` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContenedorCkpt->Id) . '
			');
		}

		/**
		 * Unassociates a ContenedorCkpt
		 * @param ContenedorCkpt $objContenedorCkpt
		 * @return void
		*/
		public function UnassociateContenedorCkpt(ContenedorCkpt $objContenedorCkpt) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkpt on this unsaved Usuario.');
			if ((is_null($objContenedorCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkpt on this Usuario with an unsaved ContenedorCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contenedor_ckpt`
				SET
					`usuario` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContenedorCkpt->Id) . ' AND
					`usuario` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all ContenedorCkpts
		 * @return void
		*/
		public function UnassociateAllContenedorCkpts() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkpt on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`contenedor_ckpt`
				SET
					`usuario` = null
				WHERE
					`usuario` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated ContenedorCkpt
		 * @param ContenedorCkpt $objContenedorCkpt
		 * @return void
		*/
		public function DeleteAssociatedContenedorCkpt(ContenedorCkpt $objContenedorCkpt) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkpt on this unsaved Usuario.');
			if ((is_null($objContenedorCkpt->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkpt on this Usuario with an unsaved ContenedorCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contenedor_ckpt`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objContenedorCkpt->Id) . ' AND
					`usuario` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated ContenedorCkpts
		 * @return void
		*/
		public function DeleteAllContenedorCkpts() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateContenedorCkpt on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`contenedor_ckpt`
				WHERE
					`usuario` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for DatosPago
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DatosPagos as an array of DatosPago objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DatosPago[]
		*/
		public function GetDatosPagoArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return DatosPago::LoadArrayByUsuarioId($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DatosPagos
		 * @return int
		*/
		public function CountDatosPagos() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return DatosPago::CountByUsuarioId($this->intCodiUsua);
		}

		/**
		 * Associates a DatosPago
		 * @param DatosPago $objDatosPago
		 * @return void
		*/
		public function AssociateDatosPago(DatosPago $objDatosPago) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDatosPago on this unsaved Usuario.');
			if ((is_null($objDatosPago->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDatosPago on this Usuario with an unsaved DatosPago.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`datos_pago`
				SET
					`usuario_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDatosPago->Id) . '
			');
		}

		/**
		 * Unassociates a DatosPago
		 * @param DatosPago $objDatosPago
		 * @return void
		*/
		public function UnassociateDatosPago(DatosPago $objDatosPago) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPago on this unsaved Usuario.');
			if ((is_null($objDatosPago->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPago on this Usuario with an unsaved DatosPago.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`datos_pago`
				SET
					`usuario_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDatosPago->Id) . ' AND
					`usuario_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all DatosPagos
		 * @return void
		*/
		public function UnassociateAllDatosPagos() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPago on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`datos_pago`
				SET
					`usuario_id` = null
				WHERE
					`usuario_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated DatosPago
		 * @param DatosPago $objDatosPago
		 * @return void
		*/
		public function DeleteAssociatedDatosPago(DatosPago $objDatosPago) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPago on this unsaved Usuario.');
			if ((is_null($objDatosPago->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPago on this Usuario with an unsaved DatosPago.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`datos_pago`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objDatosPago->Id) . ' AND
					`usuario_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated DatosPagos
		 * @return void
		*/
		public function DeleteAllDatosPagos() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDatosPago on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`datos_pago`
				WHERE
					`usuario_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for DspDespachoAsCodiUsua
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DspDespachosAsCodiUsua as an array of DspDespacho objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public function GetDspDespachoAsCodiUsuaArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return DspDespacho::LoadArrayByCodiUsua($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DspDespachosAsCodiUsua
		 * @return int
		*/
		public function CountDspDespachosAsCodiUsua() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return DspDespacho::CountByCodiUsua($this->intCodiUsua);
		}

		/**
		 * Associates a DspDespachoAsCodiUsua
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function AssociateDspDespachoAsCodiUsua(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsCodiUsua on this unsaved Usuario.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsCodiUsua on this Usuario with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . '
			');
		}

		/**
		 * Unassociates a DspDespachoAsCodiUsua
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function UnassociateDspDespachoAsCodiUsua(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiUsua on this unsaved Usuario.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiUsua on this Usuario with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_usua` = null
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all DspDespachosAsCodiUsua
		 * @return void
		*/
		public function UnassociateAllDspDespachosAsCodiUsua() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiUsua on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`codi_usua` = null
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated DspDespachoAsCodiUsua
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function DeleteAssociatedDspDespachoAsCodiUsua(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiUsua on this unsaved Usuario.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiUsua on this Usuario with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated DspDespachosAsCodiUsua
		 * @return void
		*/
		public function DeleteAllDspDespachosAsCodiUsua() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsCodiUsua on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for DspDespachoAsUsuaModi
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DspDespachosAsUsuaModi as an array of DspDespacho objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public function GetDspDespachoAsUsuaModiArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return DspDespacho::LoadArrayByUsuaModi($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DspDespachosAsUsuaModi
		 * @return int
		*/
		public function CountDspDespachosAsUsuaModi() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return DspDespacho::CountByUsuaModi($this->intCodiUsua);
		}

		/**
		 * Associates a DspDespachoAsUsuaModi
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function AssociateDspDespachoAsUsuaModi(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsUsuaModi on this unsaved Usuario.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsUsuaModi on this Usuario with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`usua_modi` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . '
			');
		}

		/**
		 * Unassociates a DspDespachoAsUsuaModi
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function UnassociateDspDespachoAsUsuaModi(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaModi on this unsaved Usuario.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaModi on this Usuario with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`usua_modi` = null
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`usua_modi` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all DspDespachosAsUsuaModi
		 * @return void
		*/
		public function UnassociateAllDspDespachosAsUsuaModi() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaModi on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`usua_modi` = null
				WHERE
					`usua_modi` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated DspDespachoAsUsuaModi
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function DeleteAssociatedDspDespachoAsUsuaModi(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaModi on this unsaved Usuario.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaModi on this Usuario with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`usua_modi` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated DspDespachosAsUsuaModi
		 * @return void
		*/
		public function DeleteAllDspDespachosAsUsuaModi() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaModi on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`usua_modi` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for DspDespachoAsUsuaCier
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DspDespachosAsUsuaCier as an array of DspDespacho objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public function GetDspDespachoAsUsuaCierArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return DspDespacho::LoadArrayByUsuaCier($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DspDespachosAsUsuaCier
		 * @return int
		*/
		public function CountDspDespachosAsUsuaCier() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return DspDespacho::CountByUsuaCier($this->intCodiUsua);
		}

		/**
		 * Associates a DspDespachoAsUsuaCier
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function AssociateDspDespachoAsUsuaCier(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsUsuaCier on this unsaved Usuario.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsUsuaCier on this Usuario with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`usua_cier` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . '
			');
		}

		/**
		 * Unassociates a DspDespachoAsUsuaCier
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function UnassociateDspDespachoAsUsuaCier(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaCier on this unsaved Usuario.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaCier on this Usuario with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`usua_cier` = null
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`usua_cier` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all DspDespachosAsUsuaCier
		 * @return void
		*/
		public function UnassociateAllDspDespachosAsUsuaCier() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaCier on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`usua_cier` = null
				WHERE
					`usua_cier` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated DspDespachoAsUsuaCier
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function DeleteAssociatedDspDespachoAsUsuaCier(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaCier on this unsaved Usuario.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaCier on this Usuario with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`usua_cier` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated DspDespachosAsUsuaCier
		 * @return void
		*/
		public function DeleteAllDspDespachosAsUsuaCier() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaCier on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`usua_cier` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for DspDespachoAsUsuaDesp
		//-------------------------------------------------------------------

		/**
		 * Gets all associated DspDespachosAsUsuaDesp as an array of DspDespacho objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return DspDespacho[]
		*/
		public function GetDspDespachoAsUsuaDespArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return DspDespacho::LoadArrayByUsuaDesp($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated DspDespachosAsUsuaDesp
		 * @return int
		*/
		public function CountDspDespachosAsUsuaDesp() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return DspDespacho::CountByUsuaDesp($this->intCodiUsua);
		}

		/**
		 * Associates a DspDespachoAsUsuaDesp
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function AssociateDspDespachoAsUsuaDesp(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsUsuaDesp on this unsaved Usuario.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateDspDespachoAsUsuaDesp on this Usuario with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`usua_desp` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . '
			');
		}

		/**
		 * Unassociates a DspDespachoAsUsuaDesp
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function UnassociateDspDespachoAsUsuaDesp(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaDesp on this unsaved Usuario.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaDesp on this Usuario with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`usua_desp` = null
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`usua_desp` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all DspDespachosAsUsuaDesp
		 * @return void
		*/
		public function UnassociateAllDspDespachosAsUsuaDesp() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaDesp on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`dsp_despacho`
				SET
					`usua_desp` = null
				WHERE
					`usua_desp` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated DspDespachoAsUsuaDesp
		 * @param DspDespacho $objDspDespacho
		 * @return void
		*/
		public function DeleteAssociatedDspDespachoAsUsuaDesp(DspDespacho $objDspDespacho) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaDesp on this unsaved Usuario.');
			if ((is_null($objDspDespacho->CodiDesp)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaDesp on this Usuario with an unsaved DspDespacho.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`codi_desp` = ' . $objDatabase->SqlVariable($objDspDespacho->CodiDesp) . ' AND
					`usua_desp` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated DspDespachosAsUsuaDesp
		 * @return void
		*/
		public function DeleteAllDspDespachosAsUsuaDesp() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateDspDespachoAsUsuaDesp on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`dsp_despacho`
				WHERE
					`usua_desp` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for FacturaAsCreacion
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturasAsCreacion as an array of Factura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public function GetFacturaAsCreacionArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return Factura::LoadArrayByUsuarioCreacion($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturasAsCreacion
		 * @return int
		*/
		public function CountFacturasAsCreacion() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return Factura::CountByUsuarioCreacion($this->intCodiUsua);
		}

		/**
		 * Associates a FacturaAsCreacion
		 * @param Factura $objFactura
		 * @return void
		*/
		public function AssociateFacturaAsCreacion(Factura $objFactura) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaAsCreacion on this unsaved Usuario.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaAsCreacion on this Usuario with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`usuario_creacion` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaAsCreacion
		 * @param Factura $objFactura
		 * @return void
		*/
		public function UnassociateFacturaAsCreacion(Factura $objFactura) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCreacion on this unsaved Usuario.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCreacion on this Usuario with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`usuario_creacion` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`usuario_creacion` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all FacturasAsCreacion
		 * @return void
		*/
		public function UnassociateAllFacturasAsCreacion() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCreacion on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`usuario_creacion` = null
				WHERE
					`usuario_creacion` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated FacturaAsCreacion
		 * @param Factura $objFactura
		 * @return void
		*/
		public function DeleteAssociatedFacturaAsCreacion(Factura $objFactura) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCreacion on this unsaved Usuario.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCreacion on this Usuario with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`usuario_creacion` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated FacturasAsCreacion
		 * @return void
		*/
		public function DeleteAllFacturasAsCreacion() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsCreacion on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`usuario_creacion` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for FacturaAsAnulacion
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturasAsAnulacion as an array of Factura objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Factura[]
		*/
		public function GetFacturaAsAnulacionArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return Factura::LoadArrayByUsuarioAnulacion($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturasAsAnulacion
		 * @return int
		*/
		public function CountFacturasAsAnulacion() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return Factura::CountByUsuarioAnulacion($this->intCodiUsua);
		}

		/**
		 * Associates a FacturaAsAnulacion
		 * @param Factura $objFactura
		 * @return void
		*/
		public function AssociateFacturaAsAnulacion(Factura $objFactura) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaAsAnulacion on this unsaved Usuario.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaAsAnulacion on this Usuario with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`usuario_anulacion` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaAsAnulacion
		 * @param Factura $objFactura
		 * @return void
		*/
		public function UnassociateFacturaAsAnulacion(Factura $objFactura) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsAnulacion on this unsaved Usuario.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsAnulacion on this Usuario with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`usuario_anulacion` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`usuario_anulacion` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all FacturasAsAnulacion
		 * @return void
		*/
		public function UnassociateAllFacturasAsAnulacion() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsAnulacion on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura`
				SET
					`usuario_anulacion` = null
				WHERE
					`usuario_anulacion` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated FacturaAsAnulacion
		 * @param Factura $objFactura
		 * @return void
		*/
		public function DeleteAssociatedFacturaAsAnulacion(Factura $objFactura) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsAnulacion on this unsaved Usuario.');
			if ((is_null($objFactura->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsAnulacion on this Usuario with an unsaved Factura.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFactura->Id) . ' AND
					`usuario_anulacion` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated FacturasAsAnulacion
		 * @return void
		*/
		public function DeleteAllFacturasAsAnulacion() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaAsAnulacion on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura`
				WHERE
					`usuario_anulacion` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for FacturaPmnAsAnuladaPor
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturaPmnsAsAnuladaPor as an array of FacturaPmn objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		*/
		public function GetFacturaPmnAsAnuladaPorArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return FacturaPmn::LoadArrayByAnuladaPor($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturaPmnsAsAnuladaPor
		 * @return int
		*/
		public function CountFacturaPmnsAsAnuladaPor() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return FacturaPmn::CountByAnuladaPor($this->intCodiUsua);
		}

		/**
		 * Associates a FacturaPmnAsAnuladaPor
		 * @param FacturaPmn $objFacturaPmn
		 * @return void
		*/
		public function AssociateFacturaPmnAsAnuladaPor(FacturaPmn $objFacturaPmn) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPmnAsAnuladaPor on this unsaved Usuario.');
			if ((is_null($objFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPmnAsAnuladaPor on this Usuario with an unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pmn`
				SET
					`anulada_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPmn->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaPmnAsAnuladaPor
		 * @param FacturaPmn $objFacturaPmn
		 * @return void
		*/
		public function UnassociateFacturaPmnAsAnuladaPor(FacturaPmn $objFacturaPmn) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsAnuladaPor on this unsaved Usuario.');
			if ((is_null($objFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsAnuladaPor on this Usuario with an unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pmn`
				SET
					`anulada_por` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPmn->Id) . ' AND
					`anulada_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all FacturaPmnsAsAnuladaPor
		 * @return void
		*/
		public function UnassociateAllFacturaPmnsAsAnuladaPor() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsAnuladaPor on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pmn`
				SET
					`anulada_por` = null
				WHERE
					`anulada_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated FacturaPmnAsAnuladaPor
		 * @param FacturaPmn $objFacturaPmn
		 * @return void
		*/
		public function DeleteAssociatedFacturaPmnAsAnuladaPor(FacturaPmn $objFacturaPmn) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsAnuladaPor on this unsaved Usuario.');
			if ((is_null($objFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsAnuladaPor on this Usuario with an unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pmn`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPmn->Id) . ' AND
					`anulada_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated FacturaPmnsAsAnuladaPor
		 * @return void
		*/
		public function DeleteAllFacturaPmnsAsAnuladaPor() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsAnuladaPor on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pmn`
				WHERE
					`anulada_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for FacturaPmnAsCreadaPor
		//-------------------------------------------------------------------

		/**
		 * Gets all associated FacturaPmnsAsCreadaPor as an array of FacturaPmn objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return FacturaPmn[]
		*/
		public function GetFacturaPmnAsCreadaPorArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return FacturaPmn::LoadArrayByCreadaPor($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated FacturaPmnsAsCreadaPor
		 * @return int
		*/
		public function CountFacturaPmnsAsCreadaPor() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return FacturaPmn::CountByCreadaPor($this->intCodiUsua);
		}

		/**
		 * Associates a FacturaPmnAsCreadaPor
		 * @param FacturaPmn $objFacturaPmn
		 * @return void
		*/
		public function AssociateFacturaPmnAsCreadaPor(FacturaPmn $objFacturaPmn) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPmnAsCreadaPor on this unsaved Usuario.');
			if ((is_null($objFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateFacturaPmnAsCreadaPor on this Usuario with an unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pmn`
				SET
					`creada_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPmn->Id) . '
			');
		}

		/**
		 * Unassociates a FacturaPmnAsCreadaPor
		 * @param FacturaPmn $objFacturaPmn
		 * @return void
		*/
		public function UnassociateFacturaPmnAsCreadaPor(FacturaPmn $objFacturaPmn) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsCreadaPor on this unsaved Usuario.');
			if ((is_null($objFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsCreadaPor on this Usuario with an unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pmn`
				SET
					`creada_por` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPmn->Id) . ' AND
					`creada_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all FacturaPmnsAsCreadaPor
		 * @return void
		*/
		public function UnassociateAllFacturaPmnsAsCreadaPor() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsCreadaPor on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`factura_pmn`
				SET
					`creada_por` = null
				WHERE
					`creada_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated FacturaPmnAsCreadaPor
		 * @param FacturaPmn $objFacturaPmn
		 * @return void
		*/
		public function DeleteAssociatedFacturaPmnAsCreadaPor(FacturaPmn $objFacturaPmn) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsCreadaPor on this unsaved Usuario.');
			if ((is_null($objFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsCreadaPor on this Usuario with an unsaved FacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pmn`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objFacturaPmn->Id) . ' AND
					`creada_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated FacturaPmnsAsCreadaPor
		 * @return void
		*/
		public function DeleteAllFacturaPmnsAsCreadaPor() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateFacturaPmnAsCreadaPor on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`factura_pmn`
				WHERE
					`creada_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for GuiaCkptAsCodiUsua
		//-------------------------------------------------------------------

		/**
		 * Gets all associated GuiaCkptsAsCodiUsua as an array of GuiaCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GuiaCkpt[]
		*/
		public function GetGuiaCkptAsCodiUsuaArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return GuiaCkpt::LoadArrayByCodiUsua($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated GuiaCkptsAsCodiUsua
		 * @return int
		*/
		public function CountGuiaCkptsAsCodiUsua() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return GuiaCkpt::CountByCodiUsua($this->intCodiUsua);
		}

		/**
		 * Associates a GuiaCkptAsCodiUsua
		 * @param GuiaCkpt $objGuiaCkpt
		 * @return void
		*/
		public function AssociateGuiaCkptAsCodiUsua(GuiaCkpt $objGuiaCkpt) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaCkptAsCodiUsua on this unsaved Usuario.');
			if ((is_null($objGuiaCkpt->NumeGuia)) || (is_null($objGuiaCkpt->CodiEsta)) || (is_null($objGuiaCkpt->CodiCkpt)) || (is_null($objGuiaCkpt->FechCkpt)) || (is_null($objGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGuiaCkptAsCodiUsua on this Usuario with an unsaved GuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_ckpt`
				SET
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->HoraCkpt) . '
			');
		}

		/**
		 * Unassociates a GuiaCkptAsCodiUsua
		 * @param GuiaCkpt $objGuiaCkpt
		 * @return void
		*/
		public function UnassociateGuiaCkptAsCodiUsua(GuiaCkpt $objGuiaCkpt) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiUsua on this unsaved Usuario.');
			if ((is_null($objGuiaCkpt->NumeGuia)) || (is_null($objGuiaCkpt->CodiEsta)) || (is_null($objGuiaCkpt->CodiCkpt)) || (is_null($objGuiaCkpt->FechCkpt)) || (is_null($objGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiUsua on this Usuario with an unsaved GuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_ckpt`
				SET
					`codi_usua` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->HoraCkpt) . ' AND
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all GuiaCkptsAsCodiUsua
		 * @return void
		*/
		public function UnassociateAllGuiaCkptsAsCodiUsua() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiUsua on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`guia_ckpt`
				SET
					`codi_usua` = null
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated GuiaCkptAsCodiUsua
		 * @param GuiaCkpt $objGuiaCkpt
		 * @return void
		*/
		public function DeleteAssociatedGuiaCkptAsCodiUsua(GuiaCkpt $objGuiaCkpt) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiUsua on this unsaved Usuario.');
			if ((is_null($objGuiaCkpt->NumeGuia)) || (is_null($objGuiaCkpt->CodiEsta)) || (is_null($objGuiaCkpt->CodiCkpt)) || (is_null($objGuiaCkpt->FechCkpt)) || (is_null($objGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiUsua on this Usuario with an unsaved GuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_ckpt`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objGuiaCkpt->HoraCkpt) . ' AND
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated GuiaCkptsAsCodiUsua
		 * @return void
		*/
		public function DeleteAllGuiaCkptsAsCodiUsua() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGuiaCkptAsCodiUsua on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`guia_ckpt`
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for HistoriaClienteAsCodiUsua
		//-------------------------------------------------------------------

		/**
		 * Gets all associated HistoriaClientesAsCodiUsua as an array of HistoriaCliente objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return HistoriaCliente[]
		*/
		public function GetHistoriaClienteAsCodiUsuaArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return HistoriaCliente::LoadArrayByCodiUsua($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated HistoriaClientesAsCodiUsua
		 * @return int
		*/
		public function CountHistoriaClientesAsCodiUsua() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return HistoriaCliente::CountByCodiUsua($this->intCodiUsua);
		}

		/**
		 * Associates a HistoriaClienteAsCodiUsua
		 * @param HistoriaCliente $objHistoriaCliente
		 * @return void
		*/
		public function AssociateHistoriaClienteAsCodiUsua(HistoriaCliente $objHistoriaCliente) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHistoriaClienteAsCodiUsua on this unsaved Usuario.');
			if ((is_null($objHistoriaCliente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateHistoriaClienteAsCodiUsua on this Usuario with an unsaved HistoriaCliente.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`historia_cliente`
				SET
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHistoriaCliente->Id) . '
			');
		}

		/**
		 * Unassociates a HistoriaClienteAsCodiUsua
		 * @param HistoriaCliente $objHistoriaCliente
		 * @return void
		*/
		public function UnassociateHistoriaClienteAsCodiUsua(HistoriaCliente $objHistoriaCliente) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCodiUsua on this unsaved Usuario.');
			if ((is_null($objHistoriaCliente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCodiUsua on this Usuario with an unsaved HistoriaCliente.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`historia_cliente`
				SET
					`codi_usua` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHistoriaCliente->Id) . ' AND
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all HistoriaClientesAsCodiUsua
		 * @return void
		*/
		public function UnassociateAllHistoriaClientesAsCodiUsua() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCodiUsua on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`historia_cliente`
				SET
					`codi_usua` = null
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated HistoriaClienteAsCodiUsua
		 * @param HistoriaCliente $objHistoriaCliente
		 * @return void
		*/
		public function DeleteAssociatedHistoriaClienteAsCodiUsua(HistoriaCliente $objHistoriaCliente) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCodiUsua on this unsaved Usuario.');
			if ((is_null($objHistoriaCliente->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCodiUsua on this Usuario with an unsaved HistoriaCliente.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`historia_cliente`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objHistoriaCliente->Id) . ' AND
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated HistoriaClientesAsCodiUsua
		 * @return void
		*/
		public function DeleteAllHistoriaClientesAsCodiUsua() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateHistoriaClienteAsCodiUsua on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`historia_cliente`
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for MotivoEliminacionAsUser
		//-------------------------------------------------------------------

		/**
		 * Gets all associated MotivoEliminacionsAsUser as an array of MotivoEliminacion objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MotivoEliminacion[]
		*/
		public function GetMotivoEliminacionAsUserArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return MotivoEliminacion::LoadArrayByUserId($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated MotivoEliminacionsAsUser
		 * @return int
		*/
		public function CountMotivoEliminacionsAsUser() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return MotivoEliminacion::CountByUserId($this->intCodiUsua);
		}

		/**
		 * Associates a MotivoEliminacionAsUser
		 * @param MotivoEliminacion $objMotivoEliminacion
		 * @return void
		*/
		public function AssociateMotivoEliminacionAsUser(MotivoEliminacion $objMotivoEliminacion) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMotivoEliminacionAsUser on this unsaved Usuario.');
			if ((is_null($objMotivoEliminacion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMotivoEliminacionAsUser on this Usuario with an unsaved MotivoEliminacion.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`motivo_eliminacion`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMotivoEliminacion->Id) . '
			');
		}

		/**
		 * Unassociates a MotivoEliminacionAsUser
		 * @param MotivoEliminacion $objMotivoEliminacion
		 * @return void
		*/
		public function UnassociateMotivoEliminacionAsUser(MotivoEliminacion $objMotivoEliminacion) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMotivoEliminacionAsUser on this unsaved Usuario.');
			if ((is_null($objMotivoEliminacion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMotivoEliminacionAsUser on this Usuario with an unsaved MotivoEliminacion.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`motivo_eliminacion`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMotivoEliminacion->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all MotivoEliminacionsAsUser
		 * @return void
		*/
		public function UnassociateAllMotivoEliminacionsAsUser() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMotivoEliminacionAsUser on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`motivo_eliminacion`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated MotivoEliminacionAsUser
		 * @param MotivoEliminacion $objMotivoEliminacion
		 * @return void
		*/
		public function DeleteAssociatedMotivoEliminacionAsUser(MotivoEliminacion $objMotivoEliminacion) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMotivoEliminacionAsUser on this unsaved Usuario.');
			if ((is_null($objMotivoEliminacion->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMotivoEliminacionAsUser on this Usuario with an unsaved MotivoEliminacion.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`motivo_eliminacion`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMotivoEliminacion->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated MotivoEliminacionsAsUser
		 * @return void
		*/
		public function DeleteAllMotivoEliminacionsAsUser() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMotivoEliminacionAsUser on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`motivo_eliminacion`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for NotaCreditoAsCreadaPor
		//-------------------------------------------------------------------

		/**
		 * Gets all associated NotaCreditosAsCreadaPor as an array of NotaCredito objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return NotaCredito[]
		*/
		public function GetNotaCreditoAsCreadaPorArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return NotaCredito::LoadArrayByCreadaPor($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated NotaCreditosAsCreadaPor
		 * @return int
		*/
		public function CountNotaCreditosAsCreadaPor() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return NotaCredito::CountByCreadaPor($this->intCodiUsua);
		}

		/**
		 * Associates a NotaCreditoAsCreadaPor
		 * @param NotaCredito $objNotaCredito
		 * @return void
		*/
		public function AssociateNotaCreditoAsCreadaPor(NotaCredito $objNotaCredito) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoAsCreadaPor on this unsaved Usuario.');
			if ((is_null($objNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateNotaCreditoAsCreadaPor on this Usuario with an unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito`
				SET
					`creada_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCredito->Id) . '
			');
		}

		/**
		 * Unassociates a NotaCreditoAsCreadaPor
		 * @param NotaCredito $objNotaCredito
		 * @return void
		*/
		public function UnassociateNotaCreditoAsCreadaPor(NotaCredito $objNotaCredito) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsCreadaPor on this unsaved Usuario.');
			if ((is_null($objNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsCreadaPor on this Usuario with an unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito`
				SET
					`creada_por` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCredito->Id) . ' AND
					`creada_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all NotaCreditosAsCreadaPor
		 * @return void
		*/
		public function UnassociateAllNotaCreditosAsCreadaPor() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsCreadaPor on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`nota_credito`
				SET
					`creada_por` = null
				WHERE
					`creada_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated NotaCreditoAsCreadaPor
		 * @param NotaCredito $objNotaCredito
		 * @return void
		*/
		public function DeleteAssociatedNotaCreditoAsCreadaPor(NotaCredito $objNotaCredito) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsCreadaPor on this unsaved Usuario.');
			if ((is_null($objNotaCredito->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsCreadaPor on this Usuario with an unsaved NotaCredito.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objNotaCredito->Id) . ' AND
					`creada_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated NotaCreditosAsCreadaPor
		 * @return void
		*/
		public function DeleteAllNotaCreditosAsCreadaPor() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateNotaCreditoAsCreadaPor on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`nota_credito`
				WHERE
					`creada_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for PagoFacturaPmnAsCreadoPor
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PagoFacturaPmnsAsCreadoPor as an array of PagoFacturaPmn objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PagoFacturaPmn[]
		*/
		public function GetPagoFacturaPmnAsCreadoPorArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return PagoFacturaPmn::LoadArrayByCreadoPor($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PagoFacturaPmnsAsCreadoPor
		 * @return int
		*/
		public function CountPagoFacturaPmnsAsCreadoPor() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return PagoFacturaPmn::CountByCreadoPor($this->intCodiUsua);
		}

		/**
		 * Associates a PagoFacturaPmnAsCreadoPor
		 * @param PagoFacturaPmn $objPagoFacturaPmn
		 * @return void
		*/
		public function AssociatePagoFacturaPmnAsCreadoPor(PagoFacturaPmn $objPagoFacturaPmn) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePagoFacturaPmnAsCreadoPor on this unsaved Usuario.');
			if ((is_null($objPagoFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePagoFacturaPmnAsCreadoPor on this Usuario with an unsaved PagoFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pago_factura_pmn`
				SET
					`creado_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagoFacturaPmn->Id) . '
			');
		}

		/**
		 * Unassociates a PagoFacturaPmnAsCreadoPor
		 * @param PagoFacturaPmn $objPagoFacturaPmn
		 * @return void
		*/
		public function UnassociatePagoFacturaPmnAsCreadoPor(PagoFacturaPmn $objPagoFacturaPmn) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmnAsCreadoPor on this unsaved Usuario.');
			if ((is_null($objPagoFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmnAsCreadoPor on this Usuario with an unsaved PagoFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pago_factura_pmn`
				SET
					`creado_por` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagoFacturaPmn->Id) . ' AND
					`creado_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all PagoFacturaPmnsAsCreadoPor
		 * @return void
		*/
		public function UnassociateAllPagoFacturaPmnsAsCreadoPor() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmnAsCreadoPor on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`pago_factura_pmn`
				SET
					`creado_por` = null
				WHERE
					`creado_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated PagoFacturaPmnAsCreadoPor
		 * @param PagoFacturaPmn $objPagoFacturaPmn
		 * @return void
		*/
		public function DeleteAssociatedPagoFacturaPmnAsCreadoPor(PagoFacturaPmn $objPagoFacturaPmn) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmnAsCreadoPor on this unsaved Usuario.');
			if ((is_null($objPagoFacturaPmn->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmnAsCreadoPor on this Usuario with an unsaved PagoFacturaPmn.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pago_factura_pmn`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPagoFacturaPmn->Id) . ' AND
					`creado_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated PagoFacturaPmnsAsCreadoPor
		 * @return void
		*/
		public function DeleteAllPagoFacturaPmnsAsCreadoPor() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePagoFacturaPmnAsCreadoPor on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`pago_factura_pmn`
				WHERE
					`creado_por` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for RegistroTrabajo
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RegistroTrabajos as an array of RegistroTrabajo objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return RegistroTrabajo[]
		*/
		public function GetRegistroTrabajoArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return RegistroTrabajo::LoadArrayByUsuarioId($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RegistroTrabajos
		 * @return int
		*/
		public function CountRegistroTrabajos() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return RegistroTrabajo::CountByUsuarioId($this->intCodiUsua);
		}

		/**
		 * Associates a RegistroTrabajo
		 * @param RegistroTrabajo $objRegistroTrabajo
		 * @return void
		*/
		public function AssociateRegistroTrabajo(RegistroTrabajo $objRegistroTrabajo) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRegistroTrabajo on this unsaved Usuario.');
			if ((is_null($objRegistroTrabajo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRegistroTrabajo on this Usuario with an unsaved RegistroTrabajo.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`registro_trabajo`
				SET
					`usuario_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRegistroTrabajo->Id) . '
			');
		}

		/**
		 * Unassociates a RegistroTrabajo
		 * @param RegistroTrabajo $objRegistroTrabajo
		 * @return void
		*/
		public function UnassociateRegistroTrabajo(RegistroTrabajo $objRegistroTrabajo) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajo on this unsaved Usuario.');
			if ((is_null($objRegistroTrabajo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajo on this Usuario with an unsaved RegistroTrabajo.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`registro_trabajo`
				SET
					`usuario_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRegistroTrabajo->Id) . ' AND
					`usuario_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all RegistroTrabajos
		 * @return void
		*/
		public function UnassociateAllRegistroTrabajos() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajo on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`registro_trabajo`
				SET
					`usuario_id` = null
				WHERE
					`usuario_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated RegistroTrabajo
		 * @param RegistroTrabajo $objRegistroTrabajo
		 * @return void
		*/
		public function DeleteAssociatedRegistroTrabajo(RegistroTrabajo $objRegistroTrabajo) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajo on this unsaved Usuario.');
			if ((is_null($objRegistroTrabajo->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajo on this Usuario with an unsaved RegistroTrabajo.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`registro_trabajo`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRegistroTrabajo->Id) . ' AND
					`usuario_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated RegistroTrabajos
		 * @return void
		*/
		public function DeleteAllRegistroTrabajos() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRegistroTrabajo on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`registro_trabajo`
				WHERE
					`usuario_id` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}


		// Related Objects' Methods for SreGuiaCkptAsCodiUsua
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SreGuiaCkptsAsCodiUsua as an array of SreGuiaCkpt objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SreGuiaCkpt[]
		*/
		public function GetSreGuiaCkptAsCodiUsuaArray($objOptionalClauses = null) {
			if ((is_null($this->intCodiUsua)))
				return array();

			try {
				return SreGuiaCkpt::LoadArrayByCodiUsua($this->intCodiUsua, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SreGuiaCkptsAsCodiUsua
		 * @return int
		*/
		public function CountSreGuiaCkptsAsCodiUsua() {
			if ((is_null($this->intCodiUsua)))
				return 0;

			return SreGuiaCkpt::CountByCodiUsua($this->intCodiUsua);
		}

		/**
		 * Associates a SreGuiaCkptAsCodiUsua
		 * @param SreGuiaCkpt $objSreGuiaCkpt
		 * @return void
		*/
		public function AssociateSreGuiaCkptAsCodiUsua(SreGuiaCkpt $objSreGuiaCkpt) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaCkptAsCodiUsua on this unsaved Usuario.');
			if ((is_null($objSreGuiaCkpt->NumeGuia)) || (is_null($objSreGuiaCkpt->CodiEsta)) || (is_null($objSreGuiaCkpt->CodiCkpt)) || (is_null($objSreGuiaCkpt->FechCkpt)) || (is_null($objSreGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSreGuiaCkptAsCodiUsua on this Usuario with an unsaved SreGuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia_ckpt`
				SET
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->HoraCkpt) . '
			');
		}

		/**
		 * Unassociates a SreGuiaCkptAsCodiUsua
		 * @param SreGuiaCkpt $objSreGuiaCkpt
		 * @return void
		*/
		public function UnassociateSreGuiaCkptAsCodiUsua(SreGuiaCkpt $objSreGuiaCkpt) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiUsua on this unsaved Usuario.');
			if ((is_null($objSreGuiaCkpt->NumeGuia)) || (is_null($objSreGuiaCkpt->CodiEsta)) || (is_null($objSreGuiaCkpt->CodiCkpt)) || (is_null($objSreGuiaCkpt->FechCkpt)) || (is_null($objSreGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiUsua on this Usuario with an unsaved SreGuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia_ckpt`
				SET
					`codi_usua` = null
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->HoraCkpt) . ' AND
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Unassociates all SreGuiaCkptsAsCodiUsua
		 * @return void
		*/
		public function UnassociateAllSreGuiaCkptsAsCodiUsua() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiUsua on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`sre_guia_ckpt`
				SET
					`codi_usua` = null
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes an associated SreGuiaCkptAsCodiUsua
		 * @param SreGuiaCkpt $objSreGuiaCkpt
		 * @return void
		*/
		public function DeleteAssociatedSreGuiaCkptAsCodiUsua(SreGuiaCkpt $objSreGuiaCkpt) {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiUsua on this unsaved Usuario.');
			if ((is_null($objSreGuiaCkpt->NumeGuia)) || (is_null($objSreGuiaCkpt->CodiEsta)) || (is_null($objSreGuiaCkpt->CodiCkpt)) || (is_null($objSreGuiaCkpt->FechCkpt)) || (is_null($objSreGuiaCkpt->HoraCkpt)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiUsua on this Usuario with an unsaved SreGuiaCkpt.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia_ckpt`
				WHERE
					`nume_guia` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->NumeGuia) . ' AND
					`codi_esta` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiEsta) . ' AND
					`codi_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->CodiCkpt) . ' AND
					`fech_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->FechCkpt) . ' AND
					`hora_ckpt` = ' . $objDatabase->SqlVariable($objSreGuiaCkpt->HoraCkpt) . ' AND
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
			');
		}

		/**
		 * Deletes all associated SreGuiaCkptsAsCodiUsua
		 * @return void
		*/
		public function DeleteAllSreGuiaCkptsAsCodiUsua() {
			if ((is_null($this->intCodiUsua)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSreGuiaCkptAsCodiUsua on this unsaved Usuario.');

			// Get the Database Object for this Class
			$objDatabase = Usuario::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sre_guia_ckpt`
				WHERE
					`codi_usua` = ' . $objDatabase->SqlVariable($this->intCodiUsua) . '
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
			return "usuario";
		}

		/**
		 * Static method to retrieve the Table name from which this class has been created.
		 * @return string Name of the table from which this class has been created.
		 */
		public static function GetDatabaseName() {
			return QApplication::$Database[Usuario::GetDatabaseIndex()]->Database;
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
			$strToReturn = '<complexType name="Usuario"><sequence>';
			$strToReturn .= '<element name="CodiUsua" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiGrupObject" type="xsd1:Grupo"/>';
			$strToReturn .= '<element name="NombUsua" type="xsd:string"/>';
			$strToReturn .= '<element name="ApelUsua" type="xsd:string"/>';
			$strToReturn .= '<element name="LogiUsua" type="xsd:string"/>';
			$strToReturn .= '<element name="PassUsua" type="xsd:string"/>';
			$strToReturn .= '<element name="CodiStat" type="xsd:int"/>';
			$strToReturn .= '<element name="CodiEstaObject" type="xsd1:Estacion"/>';
			$strToReturn .= '<element name="TipoUsua" type="xsd:int"/>';
			$strToReturn .= '<element name="CantInte" type="xsd:int"/>';
			$strToReturn .= '<element name="MailUsua" type="xsd:string"/>';
			$strToReturn .= '<element name="FechAcce" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="MotiBloq" type="xsd:string"/>';
			$strToReturn .= '<element name="FechClav" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="CargUsua" type="xsd:string"/>';
			$strToReturn .= '<element name="Supervisor" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Grupo" type="xsd1:NewGrupo"/>';
			$strToReturn .= '<element name="DeleteAt" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Usuario', $strComplexTypeArray)) {
				$strComplexTypeArray['Usuario'] = Usuario::GetSoapComplexTypeXml();
				Grupo::AlterSoapComplexTypeArray($strComplexTypeArray);
				Estacion::AlterSoapComplexTypeArray($strComplexTypeArray);
				NewGrupo::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Usuario::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Usuario();
			if (property_exists($objSoapObject, 'CodiUsua'))
				$objToReturn->intCodiUsua = $objSoapObject->CodiUsua;
			if ((property_exists($objSoapObject, 'CodiGrupObject')) &&
				($objSoapObject->CodiGrupObject))
				$objToReturn->CodiGrupObject = Grupo::GetObjectFromSoapObject($objSoapObject->CodiGrupObject);
			if (property_exists($objSoapObject, 'NombUsua'))
				$objToReturn->strNombUsua = $objSoapObject->NombUsua;
			if (property_exists($objSoapObject, 'ApelUsua'))
				$objToReturn->strApelUsua = $objSoapObject->ApelUsua;
			if (property_exists($objSoapObject, 'LogiUsua'))
				$objToReturn->strLogiUsua = $objSoapObject->LogiUsua;
			if (property_exists($objSoapObject, 'PassUsua'))
				$objToReturn->strPassUsua = $objSoapObject->PassUsua;
			if (property_exists($objSoapObject, 'CodiStat'))
				$objToReturn->intCodiStat = $objSoapObject->CodiStat;
			if ((property_exists($objSoapObject, 'CodiEstaObject')) &&
				($objSoapObject->CodiEstaObject))
				$objToReturn->CodiEstaObject = Estacion::GetObjectFromSoapObject($objSoapObject->CodiEstaObject);
			if (property_exists($objSoapObject, 'TipoUsua'))
				$objToReturn->intTipoUsua = $objSoapObject->TipoUsua;
			if (property_exists($objSoapObject, 'CantInte'))
				$objToReturn->intCantInte = $objSoapObject->CantInte;
			if (property_exists($objSoapObject, 'MailUsua'))
				$objToReturn->strMailUsua = $objSoapObject->MailUsua;
			if (property_exists($objSoapObject, 'FechAcce'))
				$objToReturn->dttFechAcce = new QDateTime($objSoapObject->FechAcce);
			if (property_exists($objSoapObject, 'MotiBloq'))
				$objToReturn->strMotiBloq = $objSoapObject->MotiBloq;
			if (property_exists($objSoapObject, 'FechClav'))
				$objToReturn->dttFechClav = new QDateTime($objSoapObject->FechClav);
			if (property_exists($objSoapObject, 'CargUsua'))
				$objToReturn->strCargUsua = $objSoapObject->CargUsua;
			if (property_exists($objSoapObject, 'Supervisor'))
				$objToReturn->blnSupervisor = $objSoapObject->Supervisor;
			if ((property_exists($objSoapObject, 'Grupo')) &&
				($objSoapObject->Grupo))
				$objToReturn->Grupo = NewGrupo::GetObjectFromSoapObject($objSoapObject->Grupo);
			if (property_exists($objSoapObject, 'DeleteAt'))
				$objToReturn->dttDeleteAt = new QDateTime($objSoapObject->DeleteAt);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Usuario::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCodiGrupObject)
				$objObject->objCodiGrupObject = Grupo::GetSoapObjectFromObject($objObject->objCodiGrupObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCodiGrup = null;
			if ($objObject->objCodiEstaObject)
				$objObject->objCodiEstaObject = Estacion::GetSoapObjectFromObject($objObject->objCodiEstaObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->strCodiEsta = null;
			if ($objObject->dttFechAcce)
				$objObject->dttFechAcce = $objObject->dttFechAcce->qFormat(QDateTime::FormatSoap);
			if ($objObject->dttFechClav)
				$objObject->dttFechClav = $objObject->dttFechClav->qFormat(QDateTime::FormatSoap);
			if ($objObject->objGrupo)
				$objObject->objGrupo = NewGrupo::GetSoapObjectFromObject($objObject->objGrupo, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intGrupoId = null;
			if ($objObject->dttDeleteAt)
				$objObject->dttDeleteAt = $objObject->dttDeleteAt->qFormat(QDateTime::FormatSoap);
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
			$iArray['CodiUsua'] = $this->intCodiUsua;
			$iArray['CodiGrup'] = $this->intCodiGrup;
			$iArray['NombUsua'] = $this->strNombUsua;
			$iArray['ApelUsua'] = $this->strApelUsua;
			$iArray['LogiUsua'] = $this->strLogiUsua;
			$iArray['PassUsua'] = $this->strPassUsua;
			$iArray['CodiStat'] = $this->intCodiStat;
			$iArray['CodiEsta'] = $this->strCodiEsta;
			$iArray['TipoUsua'] = $this->intTipoUsua;
			$iArray['CantInte'] = $this->intCantInte;
			$iArray['MailUsua'] = $this->strMailUsua;
			$iArray['FechAcce'] = $this->dttFechAcce;
			$iArray['MotiBloq'] = $this->strMotiBloq;
			$iArray['FechClav'] = $this->dttFechClav;
			$iArray['CargUsua'] = $this->strCargUsua;
			$iArray['Supervisor'] = $this->blnSupervisor;
			$iArray['GrupoId'] = $this->intGrupoId;
			$iArray['DeleteAt'] = $this->dttDeleteAt;
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
			return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intCodiUsua ));
		}



	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCubed QUERY
	/////////////////////////////////////

    /**
     * @uses QQNode
     *
     * @property-read QQNode $CodiUsua
     * @property-read QQNode $CodiGrup
     * @property-read QQNodeGrupo $CodiGrupObject
     * @property-read QQNode $NombUsua
     * @property-read QQNode $ApelUsua
     * @property-read QQNode $LogiUsua
     * @property-read QQNode $PassUsua
     * @property-read QQNode $CodiStat
     * @property-read QQNode $CodiEsta
     * @property-read QQNodeEstacion $CodiEstaObject
     * @property-read QQNode $TipoUsua
     * @property-read QQNode $CantInte
     * @property-read QQNode $MailUsua
     * @property-read QQNode $FechAcce
     * @property-read QQNode $MotiBloq
     * @property-read QQNode $FechClav
     * @property-read QQNode $CargUsua
     * @property-read QQNode $Supervisor
     * @property-read QQNode $GrupoId
     * @property-read QQNodeNewGrupo $Grupo
     * @property-read QQNode $DeleteAt
     *
     *
     * @property-read QQReverseReferenceNodeAcceso $Acceso
     * @property-read QQReverseReferenceNodeCajero $Cajero
     * @property-read QQReverseReferenceNodeClientePmn $ClientePmnAsRegistradoPor
     * @property-read QQReverseReferenceNodeContenedorCkpt $ContenedorCkpt
     * @property-read QQReverseReferenceNodeDatosPago $DatosPago
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsCodiUsua
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsUsuaModi
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsUsuaCier
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsUsuaDesp
     * @property-read QQReverseReferenceNodeFactura $FacturaAsCreacion
     * @property-read QQReverseReferenceNodeFactura $FacturaAsAnulacion
     * @property-read QQReverseReferenceNodeFacturaPmn $FacturaPmnAsAnuladaPor
     * @property-read QQReverseReferenceNodeFacturaPmn $FacturaPmnAsCreadaPor
     * @property-read QQReverseReferenceNodeGuiaCkpt $GuiaCkptAsCodiUsua
     * @property-read QQReverseReferenceNodeHistoriaCliente $HistoriaClienteAsCodiUsua
     * @property-read QQReverseReferenceNodeMotivoEliminacion $MotivoEliminacionAsUser
     * @property-read QQReverseReferenceNodeNotaCredito $NotaCreditoAsCreadaPor
     * @property-read QQReverseReferenceNodePagoFacturaPmn $PagoFacturaPmnAsCreadoPor
     * @property-read QQReverseReferenceNodeRegistroTrabajo $RegistroTrabajo
     * @property-read QQReverseReferenceNodeSreGuiaCkpt $SreGuiaCkptAsCodiUsua

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQNodeUsuario extends QQNode {
		protected $strTableName = 'usuario';
		protected $strPrimaryKey = 'codi_usua';
		protected $strClassName = 'Usuario';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiUsua':
					return new QQNode('codi_usua', 'CodiUsua', 'Integer', $this);
				case 'CodiGrup':
					return new QQNode('codi_grup', 'CodiGrup', 'Integer', $this);
				case 'CodiGrupObject':
					return new QQNodeGrupo('codi_grup', 'CodiGrupObject', 'Integer', $this);
				case 'NombUsua':
					return new QQNode('nomb_usua', 'NombUsua', 'VarChar', $this);
				case 'ApelUsua':
					return new QQNode('apel_usua', 'ApelUsua', 'VarChar', $this);
				case 'LogiUsua':
					return new QQNode('logi_usua', 'LogiUsua', 'VarChar', $this);
				case 'PassUsua':
					return new QQNode('pass_usua', 'PassUsua', 'VarChar', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'Integer', $this);
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'VarChar', $this);
				case 'CodiEstaObject':
					return new QQNodeEstacion('codi_esta', 'CodiEstaObject', 'VarChar', $this);
				case 'TipoUsua':
					return new QQNode('tipo_usua', 'TipoUsua', 'Integer', $this);
				case 'CantInte':
					return new QQNode('cant_inte', 'CantInte', 'Integer', $this);
				case 'MailUsua':
					return new QQNode('mail_usua', 'MailUsua', 'VarChar', $this);
				case 'FechAcce':
					return new QQNode('fech_acce', 'FechAcce', 'DateTime', $this);
				case 'MotiBloq':
					return new QQNode('moti_bloq', 'MotiBloq', 'VarChar', $this);
				case 'FechClav':
					return new QQNode('fech_clav', 'FechClav', 'Date', $this);
				case 'CargUsua':
					return new QQNode('carg_usua', 'CargUsua', 'VarChar', $this);
				case 'Supervisor':
					return new QQNode('supervisor', 'Supervisor', 'Bit', $this);
				case 'GrupoId':
					return new QQNode('grupo_id', 'GrupoId', 'Integer', $this);
				case 'Grupo':
					return new QQNodeNewGrupo('grupo_id', 'Grupo', 'Integer', $this);
				case 'DeleteAt':
					return new QQNode('delete_at', 'DeleteAt', 'DateTime', $this);
				case 'Acceso':
					return new QQReverseReferenceNodeAcceso($this, 'acceso', 'reverse_reference', 'usuario_id', 'Acceso');
				case 'Cajero':
					return new QQReverseReferenceNodeCajero($this, 'cajero', 'reverse_reference', 'usuario_id', 'Cajero');
				case 'ClientePmnAsRegistradoPor':
					return new QQReverseReferenceNodeClientePmn($this, 'clientepmnasregistradopor', 'reverse_reference', 'registrado_por', 'ClientePmnAsRegistradoPor');
				case 'ContenedorCkpt':
					return new QQReverseReferenceNodeContenedorCkpt($this, 'contenedorckpt', 'reverse_reference', 'usuario', 'ContenedorCkpt');
				case 'DatosPago':
					return new QQReverseReferenceNodeDatosPago($this, 'datospago', 'reverse_reference', 'usuario_id', 'DatosPago');
				case 'DspDespachoAsCodiUsua':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoascodiusua', 'reverse_reference', 'codi_usua', 'DspDespachoAsCodiUsua');
				case 'DspDespachoAsUsuaModi':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoasusuamodi', 'reverse_reference', 'usua_modi', 'DspDespachoAsUsuaModi');
				case 'DspDespachoAsUsuaCier':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoasusuacier', 'reverse_reference', 'usua_cier', 'DspDespachoAsUsuaCier');
				case 'DspDespachoAsUsuaDesp':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoasusuadesp', 'reverse_reference', 'usua_desp', 'DspDespachoAsUsuaDesp');
				case 'FacturaAsCreacion':
					return new QQReverseReferenceNodeFactura($this, 'facturaascreacion', 'reverse_reference', 'usuario_creacion', 'FacturaAsCreacion');
				case 'FacturaAsAnulacion':
					return new QQReverseReferenceNodeFactura($this, 'facturaasanulacion', 'reverse_reference', 'usuario_anulacion', 'FacturaAsAnulacion');
				case 'FacturaPmnAsAnuladaPor':
					return new QQReverseReferenceNodeFacturaPmn($this, 'facturapmnasanuladapor', 'reverse_reference', 'anulada_por', 'FacturaPmnAsAnuladaPor');
				case 'FacturaPmnAsCreadaPor':
					return new QQReverseReferenceNodeFacturaPmn($this, 'facturapmnascreadapor', 'reverse_reference', 'creada_por', 'FacturaPmnAsCreadaPor');
				case 'GuiaCkptAsCodiUsua':
					return new QQReverseReferenceNodeGuiaCkpt($this, 'guiackptascodiusua', 'reverse_reference', 'codi_usua', 'GuiaCkptAsCodiUsua');
				case 'HistoriaClienteAsCodiUsua':
					return new QQReverseReferenceNodeHistoriaCliente($this, 'historiaclienteascodiusua', 'reverse_reference', 'codi_usua', 'HistoriaClienteAsCodiUsua');
				case 'MotivoEliminacionAsUser':
					return new QQReverseReferenceNodeMotivoEliminacion($this, 'motivoeliminacionasuser', 'reverse_reference', 'user_id', 'MotivoEliminacionAsUser');
				case 'NotaCreditoAsCreadaPor':
					return new QQReverseReferenceNodeNotaCredito($this, 'notacreditoascreadapor', 'reverse_reference', 'creada_por', 'NotaCreditoAsCreadaPor');
				case 'PagoFacturaPmnAsCreadoPor':
					return new QQReverseReferenceNodePagoFacturaPmn($this, 'pagofacturapmnascreadopor', 'reverse_reference', 'creado_por', 'PagoFacturaPmnAsCreadoPor');
				case 'RegistroTrabajo':
					return new QQReverseReferenceNodeRegistroTrabajo($this, 'registrotrabajo', 'reverse_reference', 'usuario_id', 'RegistroTrabajo');
				case 'SreGuiaCkptAsCodiUsua':
					return new QQReverseReferenceNodeSreGuiaCkpt($this, 'sreguiackptascodiusua', 'reverse_reference', 'codi_usua', 'SreGuiaCkptAsCodiUsua');

				case '_PrimaryKeyNode':
					return new QQNode('codi_usua', 'CodiUsua', 'Integer', $this);
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
     * @property-read QQNode $CodiUsua
     * @property-read QQNode $CodiGrup
     * @property-read QQNodeGrupo $CodiGrupObject
     * @property-read QQNode $NombUsua
     * @property-read QQNode $ApelUsua
     * @property-read QQNode $LogiUsua
     * @property-read QQNode $PassUsua
     * @property-read QQNode $CodiStat
     * @property-read QQNode $CodiEsta
     * @property-read QQNodeEstacion $CodiEstaObject
     * @property-read QQNode $TipoUsua
     * @property-read QQNode $CantInte
     * @property-read QQNode $MailUsua
     * @property-read QQNode $FechAcce
     * @property-read QQNode $MotiBloq
     * @property-read QQNode $FechClav
     * @property-read QQNode $CargUsua
     * @property-read QQNode $Supervisor
     * @property-read QQNode $GrupoId
     * @property-read QQNodeNewGrupo $Grupo
     * @property-read QQNode $DeleteAt
     *
     *
     * @property-read QQReverseReferenceNodeAcceso $Acceso
     * @property-read QQReverseReferenceNodeCajero $Cajero
     * @property-read QQReverseReferenceNodeClientePmn $ClientePmnAsRegistradoPor
     * @property-read QQReverseReferenceNodeContenedorCkpt $ContenedorCkpt
     * @property-read QQReverseReferenceNodeDatosPago $DatosPago
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsCodiUsua
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsUsuaModi
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsUsuaCier
     * @property-read QQReverseReferenceNodeDspDespacho $DspDespachoAsUsuaDesp
     * @property-read QQReverseReferenceNodeFactura $FacturaAsCreacion
     * @property-read QQReverseReferenceNodeFactura $FacturaAsAnulacion
     * @property-read QQReverseReferenceNodeFacturaPmn $FacturaPmnAsAnuladaPor
     * @property-read QQReverseReferenceNodeFacturaPmn $FacturaPmnAsCreadaPor
     * @property-read QQReverseReferenceNodeGuiaCkpt $GuiaCkptAsCodiUsua
     * @property-read QQReverseReferenceNodeHistoriaCliente $HistoriaClienteAsCodiUsua
     * @property-read QQReverseReferenceNodeMotivoEliminacion $MotivoEliminacionAsUser
     * @property-read QQReverseReferenceNodeNotaCredito $NotaCreditoAsCreadaPor
     * @property-read QQReverseReferenceNodePagoFacturaPmn $PagoFacturaPmnAsCreadoPor
     * @property-read QQReverseReferenceNodeRegistroTrabajo $RegistroTrabajo
     * @property-read QQReverseReferenceNodeSreGuiaCkpt $SreGuiaCkptAsCodiUsua

     * @property-read QQNode $_PrimaryKeyNode
     **/
	class QQReverseReferenceNodeUsuario extends QQReverseReferenceNode {
		protected $strTableName = 'usuario';
		protected $strPrimaryKey = 'codi_usua';
		protected $strClassName = 'Usuario';
		public function __get($strName) {
			switch ($strName) {
				case 'CodiUsua':
					return new QQNode('codi_usua', 'CodiUsua', 'integer', $this);
				case 'CodiGrup':
					return new QQNode('codi_grup', 'CodiGrup', 'integer', $this);
				case 'CodiGrupObject':
					return new QQNodeGrupo('codi_grup', 'CodiGrupObject', 'integer', $this);
				case 'NombUsua':
					return new QQNode('nomb_usua', 'NombUsua', 'string', $this);
				case 'ApelUsua':
					return new QQNode('apel_usua', 'ApelUsua', 'string', $this);
				case 'LogiUsua':
					return new QQNode('logi_usua', 'LogiUsua', 'string', $this);
				case 'PassUsua':
					return new QQNode('pass_usua', 'PassUsua', 'string', $this);
				case 'CodiStat':
					return new QQNode('codi_stat', 'CodiStat', 'integer', $this);
				case 'CodiEsta':
					return new QQNode('codi_esta', 'CodiEsta', 'string', $this);
				case 'CodiEstaObject':
					return new QQNodeEstacion('codi_esta', 'CodiEstaObject', 'string', $this);
				case 'TipoUsua':
					return new QQNode('tipo_usua', 'TipoUsua', 'integer', $this);
				case 'CantInte':
					return new QQNode('cant_inte', 'CantInte', 'integer', $this);
				case 'MailUsua':
					return new QQNode('mail_usua', 'MailUsua', 'string', $this);
				case 'FechAcce':
					return new QQNode('fech_acce', 'FechAcce', 'QDateTime', $this);
				case 'MotiBloq':
					return new QQNode('moti_bloq', 'MotiBloq', 'string', $this);
				case 'FechClav':
					return new QQNode('fech_clav', 'FechClav', 'QDateTime', $this);
				case 'CargUsua':
					return new QQNode('carg_usua', 'CargUsua', 'string', $this);
				case 'Supervisor':
					return new QQNode('supervisor', 'Supervisor', 'boolean', $this);
				case 'GrupoId':
					return new QQNode('grupo_id', 'GrupoId', 'integer', $this);
				case 'Grupo':
					return new QQNodeNewGrupo('grupo_id', 'Grupo', 'integer', $this);
				case 'DeleteAt':
					return new QQNode('delete_at', 'DeleteAt', 'QDateTime', $this);
				case 'Acceso':
					return new QQReverseReferenceNodeAcceso($this, 'acceso', 'reverse_reference', 'usuario_id', 'Acceso');
				case 'Cajero':
					return new QQReverseReferenceNodeCajero($this, 'cajero', 'reverse_reference', 'usuario_id', 'Cajero');
				case 'ClientePmnAsRegistradoPor':
					return new QQReverseReferenceNodeClientePmn($this, 'clientepmnasregistradopor', 'reverse_reference', 'registrado_por', 'ClientePmnAsRegistradoPor');
				case 'ContenedorCkpt':
					return new QQReverseReferenceNodeContenedorCkpt($this, 'contenedorckpt', 'reverse_reference', 'usuario', 'ContenedorCkpt');
				case 'DatosPago':
					return new QQReverseReferenceNodeDatosPago($this, 'datospago', 'reverse_reference', 'usuario_id', 'DatosPago');
				case 'DspDespachoAsCodiUsua':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoascodiusua', 'reverse_reference', 'codi_usua', 'DspDespachoAsCodiUsua');
				case 'DspDespachoAsUsuaModi':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoasusuamodi', 'reverse_reference', 'usua_modi', 'DspDespachoAsUsuaModi');
				case 'DspDespachoAsUsuaCier':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoasusuacier', 'reverse_reference', 'usua_cier', 'DspDespachoAsUsuaCier');
				case 'DspDespachoAsUsuaDesp':
					return new QQReverseReferenceNodeDspDespacho($this, 'dspdespachoasusuadesp', 'reverse_reference', 'usua_desp', 'DspDespachoAsUsuaDesp');
				case 'FacturaAsCreacion':
					return new QQReverseReferenceNodeFactura($this, 'facturaascreacion', 'reverse_reference', 'usuario_creacion', 'FacturaAsCreacion');
				case 'FacturaAsAnulacion':
					return new QQReverseReferenceNodeFactura($this, 'facturaasanulacion', 'reverse_reference', 'usuario_anulacion', 'FacturaAsAnulacion');
				case 'FacturaPmnAsAnuladaPor':
					return new QQReverseReferenceNodeFacturaPmn($this, 'facturapmnasanuladapor', 'reverse_reference', 'anulada_por', 'FacturaPmnAsAnuladaPor');
				case 'FacturaPmnAsCreadaPor':
					return new QQReverseReferenceNodeFacturaPmn($this, 'facturapmnascreadapor', 'reverse_reference', 'creada_por', 'FacturaPmnAsCreadaPor');
				case 'GuiaCkptAsCodiUsua':
					return new QQReverseReferenceNodeGuiaCkpt($this, 'guiackptascodiusua', 'reverse_reference', 'codi_usua', 'GuiaCkptAsCodiUsua');
				case 'HistoriaClienteAsCodiUsua':
					return new QQReverseReferenceNodeHistoriaCliente($this, 'historiaclienteascodiusua', 'reverse_reference', 'codi_usua', 'HistoriaClienteAsCodiUsua');
				case 'MotivoEliminacionAsUser':
					return new QQReverseReferenceNodeMotivoEliminacion($this, 'motivoeliminacionasuser', 'reverse_reference', 'user_id', 'MotivoEliminacionAsUser');
				case 'NotaCreditoAsCreadaPor':
					return new QQReverseReferenceNodeNotaCredito($this, 'notacreditoascreadapor', 'reverse_reference', 'creada_por', 'NotaCreditoAsCreadaPor');
				case 'PagoFacturaPmnAsCreadoPor':
					return new QQReverseReferenceNodePagoFacturaPmn($this, 'pagofacturapmnascreadopor', 'reverse_reference', 'creado_por', 'PagoFacturaPmnAsCreadoPor');
				case 'RegistroTrabajo':
					return new QQReverseReferenceNodeRegistroTrabajo($this, 'registrotrabajo', 'reverse_reference', 'usuario_id', 'RegistroTrabajo');
				case 'SreGuiaCkptAsCodiUsua':
					return new QQReverseReferenceNodeSreGuiaCkpt($this, 'sreguiackptascodiusua', 'reverse_reference', 'codi_usua', 'SreGuiaCkptAsCodiUsua');

				case '_PrimaryKeyNode':
					return new QQNode('codi_usua', 'CodiUsua', 'integer', $this);
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
