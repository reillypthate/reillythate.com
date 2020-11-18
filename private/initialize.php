<?php

$to_static = false;

define("HTTP_PREFIX", $_SERVER['HTTP_HOST']);
define("DOC_PREFIX", $_SERVER['DOCUMENT_ROOT']);

define("PROJECT_PATH", "/reillythate.com");
define("PRIVATE_PATH", PROJECT_PATH . "/private");
define("SHARED_PATH", PRIVATE_PATH . "/shared");
define("PUBLIC_PATH", PROJECT_PATH . "/public");

define("STATIC_PATH", PROJECT_PATH . "/static");

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

require_once('functions.php');
require_once('wrapper_functions.php');

require_once('database.php');
require_once('database_functions.php');
// require_once('html_elements_functions.php');
// require_once('query_functions.php');
// require_once('validation_functions.php');

// $db = db_connect();
$errors = [];

?>