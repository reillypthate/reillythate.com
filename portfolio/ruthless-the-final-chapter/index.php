<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
	$page_title = "Ruthless: The Final Chapter";
    $page_description = "A portfolio entry.";
    $wanted_stylesheets = "common.css";
    $wanted_ext_js = "test_head.js";

    // Page Options
    $header_option = "";
    $footer_option = "";

    // Body Scripts
    $wanted_body_js = "test_body.js";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_head.php"); ?>
		
		<main>
            <h2><?php echo $page_title; ?></h2>
            <p>
                <?php echo getPageDescriptionFromPageTitle($page_title); ?>
            </p>

            <div class="vimeo_container">
                <iframe class="vimeo_video" src="https://player.vimeo.com/video/465210163" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            </div>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>