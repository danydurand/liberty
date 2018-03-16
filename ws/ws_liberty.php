<?php
//-------------------------------------------------------------------------------
// Programa      : ws_liberty.php
// Elaborado por : Daniel Durand
// Fecha Elab.   : 21/03/2011
// Descripcion   : Este programa expone los servicios web de Liberty Express
//-------------------------------------------------------------------------------
require_once('/appl/lib/nusoap.php');
require_once('retorno_if.php');
require_once('guia_cacesa.php');
require_once('ndc.php');
require_once('factura.php');
require_once('clientes_salamandra.php');
require_once('credito_salamandra.php');
require_once('guia_salamandra.php');
require_once('info_guia.php');
require_once('info_guia_xml.php');
require_once('info_guia_int_xml.php');
require_once('info_cliente_xml.php');
require_once('info_sucursales.php');
require_once('guias_x_cliente.php');
require_once('guias_int_x_cliente.php');
require_once('znc_x_sucursal.php');

$server = new nusoap_server();
$server->register('retorno_if');
$server->register('guia_cacesa');
$server->register('ndc');
$server->register('factura');
$server->register('clientes_salamandra');
$server->register('credito_salamandra');
$server->register('guia_salamandra');
$server->register('info_guia');
$server->register('info_guia_xml');
$server->register('info_guia_int_xml');
$server->register('info_cliente_xml');
$server->register('guias_x_cliente');
$server->register('guias_int_x_cliente');
$server->register('znc_x_sucursal');
$server->register('info_sucursales');

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : 'Nada';
$server->service($HTTP_RAW_POST_DATA);

?>
