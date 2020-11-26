<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
	$page_title = "Bud Light (For a Soul)";
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

            <div class="youtube_container">
                <iframe class="youtube_video" src="https://www.youtube.com/embed/o-0vCYiBWtA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>