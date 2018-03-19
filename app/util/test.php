<?php
require_once('qcubed.inc.php');

$objMensCorp = MensajeYamaguchi::Load(30);
echo $objMensCorp->__toCliente();