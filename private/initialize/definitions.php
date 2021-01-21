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

?>