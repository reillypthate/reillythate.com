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

    require_once('functions.php');
    require_once('wrapper_functions.php');

    // DEPRECATED
    require_once('classes/element.php');

    //  Connect to the database.
    require_once('database/database.php');
    //  Retrieve information from the database.
    require_once('database_functions.php');
    //  Set up functions used to manage the site's content.
    require_once('dynamic-functions.php');
    require_once('extra_functions.php');

?>