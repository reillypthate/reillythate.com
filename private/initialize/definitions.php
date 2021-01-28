<?php
/** 
 *  "HTTP_PREFIX"
 * 
 *      10.0.0.2
 * 
 */
define("HTTP_PREFIX", $_SERVER['HTTP_HOST']);

/** 
 *  "DOC_PREFIX"
 * 
 *      C:/xampp/htdocs/
 * 
 */
define("DOC_PREFIX", $_SERVER['DOCUMENT_ROOT']);

/** 
 *  "PROJECT_PATH"
 * 
 *      /reillythate.com
 * 
 */
define("PROJECT_PATH", "/reillythate.com");

/** 
 *  "PRIVATE_PATH"
 * 
 *      /reillythate.com/private
 * 
 */
define("PRIVATE_PATH", PROJECT_PATH . "/private");

/** 
 *  "SHARED_PATH"
 * 
 *      /reillythate.com/private/shared
 * 
 */
define("SHARED_PATH", PRIVATE_PATH . "/shared");

define("FUNCTIONS", 'functions');

define("OBJECTS", 'objects');
define("INTERFACES", 'interfaces');
define("TRAITS", 'traits');
define("CLASSES", 'classes');
define("DB_CLASSES", CLASSES . '/db-classes');
define("INCLUDES_PATH", "includes");
define("INCLUDES", DOC_PREFIX . PRIVATE_PATH . '/includes');
/** 
 *  "STATIC_PATH"
 * 
 *      /reillythate.com/static
 * 
 */
define("STATIC_PATH", PROJECT_PATH . "/static");

/** 
 *  "STATIC_PATH"
 * 
 *      /reillythate.com/static/images
 * 
 */
define("IMAGE_PATH", STATIC_PATH . "/images");

/** 
 *  "SCRIPT_PATH"
 * 
 *      /reillythate.com/static/scripts
 * 
 */
define("SCRIPT_PATH", STATIC_PATH . "/scripts");

?>