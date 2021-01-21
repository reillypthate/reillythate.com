<?php

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// Import Monolog nnamespaces
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Setup Mololog logger
$log = new Logger('reillythate.com');
$log->pushHandler(new StreamHandler('logs/development.log', Logger::DEBUG));
$log->pushHandler(new StreamHandler('logs/production.log', Logger::WARNING));

?>