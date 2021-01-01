<?php

if(isset($_GET['html-refresh']))
{
    $to_static = true;
}else
{
    $to_static = false;
}

date_default_timezone_set("America/New_York");

$errors = [];
$PAGE_SET = "";

define("HTTP_PREFIX", $_SERVER['HTTP_HOST']);       /* 10.0.0.2                         */
define("DOC_PREFIX", $_SERVER['DOCUMENT_ROOT']);    /* C:/xampp/htdocs/                 */

define("PROJECT_PATH", "/reillythate.com");         /* /reillythate.com                 */
define("PRIVATE_PATH", PROJECT_PATH . "/private");  /* /reillythate.com/private         */
define("SHARED_PATH", PRIVATE_PATH . "/shared");    /* /reillythate.com/private/shared  */

define("STATIC_PATH", PROJECT_PATH . "/static");    /* /reillythate.com/static          */

// Functions

require(__DIR__ . '\vendor\autoload.php');

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// Import Monolog nnamespaces
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Setup Mololog logger
$log = new Logger('reillythate.com');
$log->pushHandler(new StreamHandler('logs/warnings.log', Logger::WARNING));

// Prepare logger
//$log = new Logger('myApp');
//$log->pushHandler(new StreamHandler('logs/development.log', Logger::DEBUG));
//$log->pushHandler(new StreamHandler('logs/production.log', Logger::WARNING));

// Use logger
//$log->debug('This is a debug message');
//$log->warning('This is a warning message');

//require_once('trick-php/trick.php');
require_once('functions.php');
require_once('wrapper_functions.php');
require_once('classes/element.php');

// Database Functions

require_once('database.php');
require_once('database_functions.php');

?>