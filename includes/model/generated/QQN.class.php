<?php
	class QQN {
		/**
		 * @return QQNodeAcceso
		 */
		static public function Acceso() {
			return new QQNodeAcceso('acceso', null, null);
		}
		/**
		 * @return QQNodeAduana
		 */
		static public function Aduana() {
			return new QQNodeAduana('aduana', null, null);
		}
		/**
		 * @return QQNodeAliadoComercial
		 */
		static public function AliadoComercial() {
			return new QQNodeAliadoComercial('aliado_comercial', null, null);
		}
		/**
		 * @return QQNodeArancel
		 */
		static public function Arancel() {
			return new QQNodeArancel('arancel', null, null);
		}
		/**
		 * @return QQNodeAsistente
		 */
		static public function Asistente() {
			return new QQNodeAsistente('asistente', null, null);
		}
		/**
		 * @return QQNodeBanco
		 */
		static public function Banco() {
			return new QQNodeBanco('banco', null, null);
		}
		/**
		 * @return QQNodeCaja
		 */
		static public function Caja() {
			return new QQNodeCaja('caja', null, null);
		}
		/**
		 * @return QQNodeCajero
		 */
		static public function Cajero() {
			return new QQNodeCajero('cajero', null, null);
		}
		/**
		 * @return QQNodeCambioTarifa
		 */
		static public function CambioTarifa() {
			return new QQNodeCambioTarifa('cambio_tarifa', null, null);
		}
		/**
		 * @return QQNodeCargaRecibida
		 */
		static public function CargaRecibida() {
			return new QQNodeCargaRecibida('carga_recibida', null, null);
		}
		/**
		 * @return QQNodeChofer
		 */
		static public function Chofer() {
			return new QQNodeChofer('chofer', null, null);
		}
		/**
		 * @return QQNodeCiudad
		 */
		static public function Ciudad() {
			return new QQNodeCiudad('ciudad', null, null);
		}
		/**
		 * @return QQNodeClienteCnt
		 */
		static public function ClienteCnt() {
			return new QQNodeClienteCnt('cliente_cnt', null, null);
		}
		/**
		 * @return QQNodeClienteI
		 */
		static public function ClienteI() {
			return new QQNodeClienteI('cliente_i', null, null);
		}
		/**
		 * @return QQNodeClienteIConsecutivo
		 */
		static public function ClienteIConsecutivo() {
			return new QQNodeClienteIConsecutivo('cliente_i_consecutivo', null, null);
		}
		/**
		 * @return QQNodeClienteInt
		 */
		static public function ClienteInt() {
			return new QQNodeClienteInt('cliente_int', null, null);
		}
		/**
		 * @return QQNodeClientePmn
		 */
		static public function ClientePmn() {
			return new QQNodeClientePmn('cliente_pmn', null, null);
		}
		/**
		 * @return QQNodeClienteRuta
		 */
		static public function ClienteRuta() {
			return new QQNodeClienteRuta('cliente_ruta', null, null);
		}
		/**
		 * @return QQNodeClienteTmp
		 */
		static public function ClienteTmp() {
			return new QQNodeClienteTmp('cliente_tmp', null, null);
		}
		/**
		 * @return QQNodeCobranza
		 */
		static public function Cobranza() {
			return new QQNodeCobranza('cobranza', null, null);
		}
		/**
		 * @return QQNodeCobroCod
		 */
		static public function CobroCod() {
			return new QQNodeCobroCod('cobro_cod', null, null);
		}
		/**
		 * @return QQNodeCompra
		 */
		static public function Compra() {
			return new QQNodeCompra('compra', null, null);
		}
		/**
		 * @return QQNodeConcepto
		 */
		static public function Concepto() {
			return new QQNodeConcepto('concepto', null, null);
		}
		/**
		 * @return QQNodeConciliacionBancaria
		 */
		static public function ConciliacionBancaria() {
			return new QQNodeConciliacionBancaria('conciliacion_bancaria', null, null);
		}
		/**
		 * @return QQNodeConectados
		 */
		static public function Conectados() {
			return new QQNodeConectados('conectados', null, null);
		}
		/**
		 * @return QQNodeConsultaMail
		 */
		static public function ConsultaMail() {
			return new QQNodeConsultaMail('consulta_mail', null, null);
		}
		/**
		 * @return QQNodeContenedorCkpt
		 */
		static public function ContenedorCkpt() {
			return new QQNodeContenedorCkpt('contenedor_ckpt', null, null);
		}
		/**
		 * @return QQNodeCounter
		 */
		static public function Counter() {
			return new QQNodeCounter('counter', null, null);
		}
		/**
		 * @return QQNodeCuentaBancaria
		 */
		static public function CuentaBancaria() {
			return new QQNodeCuentaBancaria('cuenta_bancaria', null, null);
		}
		/**
		 * @return QQNodeCupon
		 */
		static public function Cupon() {
			return new QQNodeCupon('cupon', null, null);
		}
		/**
		 * @return QQNodeDatosPago
		 */
		static public function DatosPago() {
			return new QQNodeDatosPago('datos_pago', null, null);
		}
		/**
		 * @return QQNodeDestinatarioFrecuente
		 */
		static public function DestinatarioFrecuente() {
			return new QQNodeDestinatarioFrecuente('destinatario_frecuente', null, null);
		}
		/**
		 * @return QQNodeDetalleError
		 */
		static public function DetalleError() {
			return new QQNodeDetalleError('detalle_error', null, null);
		}
		/**
		 * @return QQNodeDivisa
		 */
		static public function Divisa() {
			return new QQNodeDivisa('divisa', null, null);
		}
		/**
		 * @return QQNodeDocumento
		 */
		static public function Documento() {
			return new QQNodeDocumento('documento', null, null);
		}
		/**
		 * @return QQNodeDspDespacho
		 */
		static public function DspDespacho() {
			return new QQNodeDspDespacho('dsp_despacho', null, null);
		}
		/**
		 * @return QQNodeDspMotivoNoco
		 */
		static public function DspMotivoNoco() {
			return new QQNodeDspMotivoNoco('dsp_motivo_noco', null, null);
		}
		/**
		 * @return QQNodeEmpresa
		 */
		static public function Empresa() {
			return new QQNodeEmpresa('empresa', null, null);
		}
		/**
		 * @return QQNodeEmpresaCourier
		 */
		static public function EmpresaCourier() {
			return new QQNodeEmpresaCourier('empresa_courier', null, null);
		}
		/**
		 * @return QQNodeEstacion
		 */
		static public function Estacion() {
			return new QQNodeEstacion('estacion', null, null);
		}
		/**
		 * @return QQNodeEstadistica
		 */
		static public function Estadistica() {
			return new QQNodeEstadistica('estadistica', null, null);
		}
		/**
		 * @return QQNodeEstadisticaDeClientes
		 */
		static public function EstadisticaDeClientes() {
			return new QQNodeEstadisticaDeClientes('estadistica_de_clientes', null, null);
		}
		/**
		 * @return QQNodeEstadisticaDeGuias
		 */
		static public function EstadisticaDeGuias() {
			return new QQNodeEstadisticaDeGuias('estadistica_de_guias', null, null);
		}
		/**
		 * @return QQNodeEstado
		 */
		static public function Estado() {
			return new QQNodeEstado('estado', null, null);
		}
		/**
		 * @return QQNodeFacAudiCierre
		 */
		static public function FacAudiCierre() {
			return new QQNodeFacAudiCierre('fac_audi_cierre', null, null);
		}
		/**
		 * @return QQNodeFacCategoriaProd
		 */
		static public function FacCategoriaProd() {
			return new QQNodeFacCategoriaProd('fac_categoria_prod', null, null);
		}
		/**
		 * @return QQNodeFacDocTemp
		 */
		static public function FacDocTemp() {
			return new QQNodeFacDocTemp('fac_doc_temp', null, null);
		}
		/**
		 * @return QQNodeFacImpuesto
		 */
		static public function FacImpuesto() {
			return new QQNodeFacImpuesto('fac_impuesto', null, null);
		}
		/**
		 * @return QQNodeFacPeriFact
		 */
		static public function FacPeriFact() {
			return new QQNodeFacPeriFact('fac_peri_fact', null, null);
		}
		/**
		 * @return QQNodeFacProducto
		 */
		static public function FacProducto() {
			return new QQNodeFacProducto('fac_producto', null, null);
		}
		/**
		 * @return QQNodeFacProfit
		 */
		static public function FacProfit() {
			return new QQNodeFacProfit('fac_profit', null, null);
		}
		/**
		 * @return QQNodeFacResumenFact
		 */
		static public function FacResumenFact() {
			return new QQNodeFacResumenFact('fac_resumen_fact', null, null);
		}
		/**
		 * @return QQNodeFacTariMasi
		 */
		static public function FacTariMasi() {
			return new QQNodeFacTariMasi('fac_tari_masi', null, null);
		}
		/**
		 * @return QQNodeFacTarifa
		 */
		static public function FacTarifa() {
			return new QQNodeFacTarifa('fac_tarifa', null, null);
		}
		/**
		 * @return QQNodeFacTarifaPeso
		 */
		static public function FacTarifaPeso() {
			return new QQNodeFacTarifaPeso('fac_tarifa_peso', null, null);
		}
		/**
		 * @return QQNodeFacTarifaProd
		 */
		static public function FacTarifaProd() {
			return new QQNodeFacTarifaProd('fac_tarifa_prod', null, null);
		}
		/**
		 * @return QQNodeFacTipoProd
		 */
		static public function FacTipoProd() {
			return new QQNodeFacTipoProd('fac_tipo_prod', null, null);
		}
		/**
		 * @return QQNodeFacVendedor
		 */
		static public function FacVendedor() {
			return new QQNodeFacVendedor('fac_vendedor', null, null);
		}
		/**
		 * @return QQNodeFactura
		 */
		static public function Factura() {
			return new QQNodeFactura('factura', null, null);
		}
		/**
		 * @return QQNodeFacturaPmn
		 */
		static public function FacturaPmn() {
			return new QQNodeFacturaPmn('factura_pmn', null, null);
		}
		/**
		 * @return QQNodeFacturaProfit
		 */
		static public function FacturaProfit() {
			return new QQNodeFacturaProfit('factura_profit', null, null);
		}
		/**
		 * @return QQNodeFacturaProfitDeta
		 */
		static public function FacturaProfitDeta() {
			return new QQNodeFacturaProfitDeta('factura_profit_deta', null, null);
		}
		/**
		 * @return QQNodeFechaUltimaGuia
		 */
		static public function FechaUltimaGuia() {
			return new QQNodeFechaUltimaGuia('fecha_ultima_guia', null, null);
		}
		/**
		 * @return QQNodeFeriado
		 */
		static public function Feriado() {
			return new QQNodeFeriado('feriado', null, null);
		}
		/**
		 * @return QQNodeFormaPago
		 */
		static public function FormaPago() {
			return new QQNodeFormaPago('forma_pago', null, null);
		}
		/**
		 * @return QQNodeGrupo
		 */
		static public function Grupo() {
			return new QQNodeGrupo('grupo', null, null);
		}
		/**
		 * @return QQNodeGuia
		 */
		static public function Guia() {
			return new QQNodeGuia('guia', null, null);
		}
		/**
		 * @return QQNodeGuiaActualizar
		 */
		static public function GuiaActualizar() {
			return new QQNodeGuiaActualizar('guia_actualizar', null, null);
		}
		/**
		 * @return QQNodeGuiaActualizarEsporadico
		 */
		static public function GuiaActualizarEsporadico() {
			return new QQNodeGuiaActualizarEsporadico('guia_actualizar_esporadico', null, null);
		}
		/**
		 * @return QQNodeGuiaAduana
		 */
		static public function GuiaAduana() {
			return new QQNodeGuiaAduana('guia_aduana', null, null);
		}
		/**
		 * @return QQNodeGuiaCacesa
		 */
		static public function GuiaCacesa() {
			return new QQNodeGuiaCacesa('guia_cacesa', null, null);
		}
		/**
		 * @return QQNodeGuiaCheckpoints
		 */
		static public function GuiaCheckpoints() {
			return new QQNodeGuiaCheckpoints('guia_checkpoints', null, null);
		}
		/**
		 * @return QQNodeGuiaCkpt
		 */
		static public function GuiaCkpt() {
			return new QQNodeGuiaCkpt('guia_ckpt', null, null);
		}
		/**
		 * @return QQNodeGuiaConnectPendiente
		 */
		static public function GuiaConnectPendiente() {
			return new QQNodeGuiaConnectPendiente('guia_connect_pendiente', null, null);
		}
		/**
		 * @return QQNodeGuiaConsecutivo
		 */
		static public function GuiaConsecutivo() {
			return new QQNodeGuiaConsecutivo('guia_consecutivo', null, null);
		}
		/**
		 * @return QQNodeGuiaMasivaConnect
		 */
		static public function GuiaMasivaConnect() {
			return new QQNodeGuiaMasivaConnect('guia_masiva_connect', null, null);
		}
		/**
		 * @return QQNodeGuiaModificada
		 */
		static public function GuiaModificada() {
			return new QQNodeGuiaModificada('guia_modificada', null, null);
		}
		/**
		 * @return QQNodeGuiaPieza
		 */
		static public function GuiaPieza() {
			return new QQNodeGuiaPieza('guia_pieza', null, null);
		}
		/**
		 * @return QQNodeHistoriaCliente
		 */
		static public function HistoriaCliente() {
			return new QQNodeHistoriaCliente('historia_cliente', null, null);
		}
		/**
		 * @return QQNodeIncidencia
		 */
		static public function Incidencia() {
			return new QQNodeIncidencia('incidencia', null, null);
		}
		/**
		 * @return QQNodeItemFacturaPmn
		 */
		static public function ItemFacturaPmn() {
			return new QQNodeItemFacturaPmn('item_factura_pmn', null, null);
		}
		/**
		 * @return QQNodeItemNotaCredito
		 */
		static public function ItemNotaCredito() {
			return new QQNodeItemNotaCredito('item_nota_credito', null, null);
		}
		/**
		 * @return QQNodeLog
		 */
		static public function Log() {
			return new QQNodeLog('log', null, null);
		}
		/**
		 * @return QQNodeLogApi
		 */
		static public function LogApi() {
			return new QQNodeLogApi('log_api', null, null);
		}
		/**
		 * @return QQNodeLugarIncidencia
		 */
		static public function LugarIncidencia() {
			return new QQNodeLugarIncidencia('lugar_incidencia', null, null);
		}
		/**
		 * @return QQNodeManifiesto
		 */
		static public function Manifiesto() {
			return new QQNodeManifiesto('manifiesto', null, null);
		}
		/**
		 * @return QQNodeMasCartaDevo
		 */
		static public function MasCartaDevo() {
			return new QQNodeMasCartaDevo('mas_carta_devo', null, null);
		}
		/**
		 * @return QQNodeMasTipoRuta
		 */
		static public function MasTipoRuta() {
			return new QQNodeMasTipoRuta('mas_tipo_ruta', null, null);
		}
		/**
		 * @return QQNodeMasterCliente
		 */
		static public function MasterCliente() {
			return new QQNodeMasterCliente('master_cliente', null, null);
		}
		/**
		 * @return QQNodeMensajeYamaguchi
		 */
		static public function MensajeYamaguchi() {
			return new QQNodeMensajeYamaguchi('mensaje_yamaguchi', null, null);
		}
		/**
		 * @return QQNodeModo
		 */
		static public function Modo() {
			return new QQNodeModo('modo', null, null);
		}
		/**
		 * @return QQNodeMotivoIncidencia
		 */
		static public function MotivoIncidencia() {
			return new QQNodeMotivoIncidencia('motivo_incidencia', null, null);
		}
		/**
		 * @return QQNodeNewGrupo
		 */
		static public function NewGrupo() {
			return new QQNodeNewGrupo('new_grupo', null, null);
		}
		/**
		 * @return QQNodeNewOpcion
		 */
		static public function NewOpcion() {
			return new QQNodeNewOpcion('new_opcion', null, null);
		}
		/**
		 * @return QQNodeNotaCredito
		 */
		static public function NotaCredito() {
			return new QQNodeNotaCredito('nota_credito', null, null);
		}
		/**
		 * @return QQNodeNotificacion
		 */
		static public function Notificacion() {
			return new QQNodeNotificacion('notificacion', null, null);
		}
		/**
		 * @return QQNodeOpciGrup
		 */
		static public function OpciGrup() {
			return new QQNodeOpciGrup('opci_grup', null, null);
		}
		/**
		 * @return QQNodeOpcion
		 */
		static public function Opcion() {
			return new QQNodeOpcion('opcion', null, null);
		}
		/**
		 * @return QQNodeOrigenDestino
		 */
		static public function OrigenDestino() {
			return new QQNodeOrigenDestino('origen_destino', null, null);
		}
		/**
		 * @return QQNodePagoFacturaPmn
		 */
		static public function PagoFacturaPmn() {
			return new QQNodePagoFacturaPmn('pago_factura_pmn', null, null);
		}
		/**
		 * @return QQNodePagoMail
		 */
		static public function PagoMail() {
			return new QQNodePagoMail('pago_mail', null, null);
		}
		/**
		 * @return QQNodePais
		 */
		static public function Pais() {
			return new QQNodePais('pais', null, null);
		}
		/**
		 * @return QQNodeParametro
		 */
		static public function Parametro() {
			return new QQNodeParametro('parametro', null, null);
		}
		/**
		 * @return QQNodePendientesPuntoVirtual
		 */
		static public function PendientesPuntoVirtual() {
			return new QQNodePendientesPuntoVirtual('pendientes_punto_virtual', null, null);
		}
		/**
		 * @return QQNodePermiso
		 */
		static public function Permiso() {
			return new QQNodePermiso('permiso', null, null);
		}
		/**
		 * @return QQNodePilaAcceso
		 */
		static public function PilaAcceso() {
			return new QQNodePilaAcceso('pila_acceso', null, null);
		}
		/**
		 * @return QQNodePlantillaPago
		 */
		static public function PlantillaPago() {
			return new QQNodePlantillaPago('plantilla_pago', null, null);
		}
		/**
		 * @return QQNodePrealertaMail
		 */
		static public function PrealertaMail() {
			return new QQNodePrealertaMail('prealerta_mail', null, null);
		}
		/**
		 * @return QQNodeProceso
		 */
		static public function Proceso() {
			return new QQNodeProceso('proceso', null, null);
		}
		/**
		 * @return QQNodeProcesoError
		 */
		static public function ProcesoError() {
			return new QQNodeProcesoError('proceso_error', null, null);
		}
		/**
		 * @return QQNodeProductoReembolso
		 */
		static public function ProductoReembolso() {
			return new QQNodeProductoReembolso('producto_reembolso', null, null);
		}
		/**
		 * @return QQNodePromocion
		 */
		static public function Promocion() {
			return new QQNodePromocion('promocion', null, null);
		}
		/**
		 * @return QQNodeRegiTrabConsecutivo
		 */
		static public function RegiTrabConsecutivo() {
			return new QQNodeRegiTrabConsecutivo('regi_trab_consecutivo', null, null);
		}
		/**
		 * @return QQNodeRegion
		 */
		static public function Region() {
			return new QQNodeRegion('region', null, null);
		}
		/**
		 * @return QQNodeRegistroTrabajo
		 */
		static public function RegistroTrabajo() {
			return new QQNodeRegistroTrabajo('registro_trabajo', null, null);
		}
		/**
		 * @return QQNodeReporte
		 */
		static public function Reporte() {
			return new QQNodeReporte('reporte', null, null);
		}
		/**
		 * @return QQNodeReposicionIncidencia
		 */
		static public function ReposicionIncidencia() {
			return new QQNodeReposicionIncidencia('reposicion_incidencia', null, null);
		}
		/**
		 * @return QQNodeRuta
		 */
		static public function Ruta() {
			return new QQNodeRuta('ruta', null, null);
		}
		/**
		 * @return QQNodeSaldoExcedente
		 */
		static public function SaldoExcedente() {
			return new QQNodeSaldoExcedente('saldo_excedente', null, null);
		}
		/**
		 * @return QQNodeSdeCheckpoint
		 */
		static public function SdeCheckpoint() {
			return new QQNodeSdeCheckpoint('sde_checkpoint', null, null);
		}
		/**
		 * @return QQNodeSdeContenedor
		 */
		static public function SdeContenedor() {
			return new QQNodeSdeContenedor('sde_contenedor', null, null);
		}
		/**
		 * @return QQNodeSdeOperacion
		 */
		static public function SdeOperacion() {
			return new QQNodeSdeOperacion('sde_operacion', null, null);
		}
		/**
		 * @return QQNodeSdeTipoOper
		 */
		static public function SdeTipoOper() {
			return new QQNodeSdeTipoOper('sde_tipo_oper', null, null);
		}
		/**
		 * @return QQNodeSistema
		 */
		static public function Sistema() {
			return new QQNodeSistema('sistema', null, null);
		}
		/**
		 * @return QQNodeSodexoInput
		 */
		static public function SodexoInput() {
			return new QQNodeSodexoInput('sodexo_input', null, null);
		}
		/**
		 * @return QQNodeSreGuia
		 */
		static public function SreGuia() {
			return new QQNodeSreGuia('sre_guia', null, null);
		}
		/**
		 * @return QQNodeSreGuiaCkpt
		 */
		static public function SreGuiaCkpt() {
			return new QQNodeSreGuiaCkpt('sre_guia_ckpt', null, null);
		}
		/**
		 * @return QQNodeT500
		 */
		static public function T500() {
			return new QQNodeT500('t500', null, null);
		}
		/**
		 * @return QQNodeTarifaI
		 */
		static public function TarifaI() {
			return new QQNodeTarifaI('tarifa_i', null, null);
		}
		/**
		 * @return QQNodeTarifaPeso
		 */
		static public function TarifaPeso() {
			return new QQNodeTarifaPeso('tarifa_peso', null, null);
		}
		/**
		 * @return QQNodeTasaCambio
		 */
		static public function TasaCambio() {
			return new QQNodeTasaCambio('tasa_cambio', null, null);
		}
		/**
		 * @return QQNodeTipoDocumento
		 */
		static public function TipoDocumento() {
			return new QQNodeTipoDocumento('tipo_documento', null, null);
		}
		/**
		 * @return QQNodeTipoReembolso
		 */
		static public function TipoReembolso() {
			return new QQNodeTipoReembolso('tipo_reembolso', null, null);
		}
		/**
		 * @return QQNodeTipoTransaccion
		 */
		static public function TipoTransaccion() {
			return new QQNodeTipoTransaccion('tipo_transaccion', null, null);
		}
		/**
		 * @return QQNodeTipoVehiculo
		 */
		static public function TipoVehiculo() {
			return new QQNodeTipoVehiculo('tipo_vehiculo', null, null);
		}
		/**
		 * @return QQNodeTrackingConsecutivo
		 */
		static public function TrackingConsecutivo() {
			return new QQNodeTrackingConsecutivo('tracking_consecutivo', null, null);
		}
		/**
		 * @return QQNodeTurno
		 */
		static public function Turno() {
			return new QQNodeTurno('turno', null, null);
		}
		/**
		 * @return QQNodeUsuario
		 */
		static public function Usuario() {
			return new QQNodeUsuario('usuario', null, null);
		}
		/**
		 * @return QQNodeUsuarioConnect
		 */
		static public function UsuarioConnect() {
			return new QQNodeUsuarioConnect('usuario_connect', null, null);
		}
		/**
		 * @return QQNodeVehiculo
		 */
		static public function Vehiculo() {
			return new QQNodeVehiculo('vehiculo', null, null);
		}
		/**
		 * @return QQNodeVendedorConsecutivo
		 */
		static public function VendedorConsecutivo() {
			return new QQNodeVendedorConsecutivo('vendedor_consecutivo', null, null);
		}
		/**
		 * @return QQNodeZncPorSucursal
		 */
		static public function ZncPorSucursal() {
			return new QQNodeZncPorSucursal('znc_por_sucursal', null, null);
		}
		/**
		 * @return QQNodeZonaNoCubierta
		 */
		static public function ZonaNoCubierta() {
			return new QQNodeZonaNoCubierta('zona_no_cubierta', null, null);
		}
		/**
		 * @return QQNodeZonaResidencia
		 */
		static public function ZonaResidencia() {
			return new QQNodeZonaResidencia('zona_residencia', null, null);
		}
	}
?>