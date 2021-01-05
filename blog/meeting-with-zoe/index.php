<?php
	// Before we do anything, we need to initialize a bunch of stuff: namely, 
	// universal constants (for ease of access) and a database connection.
	require_once("../../private/initialize.php");
?>
<?php
	    // Page Metadata
	    $SLUG = "meeting-with-zoe";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>

<main>
<?php $post_table->generateBlogLines($SLUG, 3); ?>
     
            <h2>Other Works</h2>
<?php $card_table->generateCardSection(array("project-birthday-toast", "project-night-lift", "project-ruthless-the-final-chapter", "project-bud-light-for-a-soul"), 3, 3); ?>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>
