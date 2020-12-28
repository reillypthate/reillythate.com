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

require_once('functions.php');
require_once('wrapper_functions.php');
require_once('classes/element.php');

// Database Functions

require_once('database.php');
require_once('database_functions.php');

?>