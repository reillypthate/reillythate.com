<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("private/initialize.php");
?>
<?php
    // Page Metadata
    $SLUG = "reillythate.com";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main>
<?php $card_table->generateCardSection(array("portfolio", "education", "about"), 2, 3, "cards-home-primary"); ?>

        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>