<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
    $SLUG = "site-builder";
    $PAGE_SET = "admin";
    array_push($wanted_ext_js, "jquery-ui.min.js");
    array_push($wanted_ext_js, "ckeditor/ckeditor.js");
    //array_push($wanted_body_js, "site-builder.js");
    //array_push($wanted_body_js, "richEditor.js");
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main id="manager">

		</main>
        
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>