<?php  
    //  Set the timezone.    
    date_default_timezone_set("America/New_York");
        
    //  Initialize definitions.
    require_once('initialize/definitions.php');
    //  Initialize vendor plug-ins.
    require(__DIR__ . '\vendor\autoload.php');
    require_once('initialize/vendor.php');
    //  RETURN TO THIS!!!
    require_once('initialize/dynamic-to-static.php');
    //  Initialize nav menu options.
    require_once('initialize/nav-setup.php');
    //  Initialize error reporting (currently for user notification).
    require_once('initialize/errors-setup.php');

    //  Load functions (mainly used in preprocessing).
    require_once('functions.php');

    // Initialize objects (interfaces & classes)
    require_once('load-objects.php');
    //  Connect to the database.
    require_once('database/database.php');
    //  Retrieve information from the database.
    require_once('build-objects.php');
    
    //  Set up functions used to manage the site's content.
    require_once('dynamic-functions.php');
    require_once('extra_functions.php');
    
    //  Process request values, if any exist.
    require_once('database/request-handler.php');
?>