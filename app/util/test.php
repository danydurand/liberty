<?php
require_once('qcubed.inc.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Handler\PHPConsoleHandler;

echo 1;
// Common logger
$log = new Logger('files');

echo 2;
// Line formatter without empty brackets in the end
$formatter = new LineFormatter(null, null, false, true);

echo 3;
// Debug level handler
$browserHandler = new PHPConsoleHandler(null,null,Logger::INFO);

echo 4;
$debugHandler = new StreamHandler('/tmp/sisco_debug.log', Logger::DEBUG);
$debugHandler->setFormatter($formatter);

echo 5;
// Error level handler
$errorHandler = new StreamHandler('/tmp/sisco_error.log', Logger::ERROR);
$errorHandler->setFormatter($formatter);

echo 6;
$log->pushHandler($browserHandler);
// This will have both DEBUG and ERROR messages
$log->pushHandler($debugHandler);
// This will have only ERROR messages
$log->pushHandler($errorHandler);

echo 7;
// The actual logging
$log->addInfo('I am in the console');
$log->addDebug('I am debug');
$log->addError('I am error', array('productId' => 123));

echo 8;