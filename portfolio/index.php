<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../private/initialize.php");
?>
<?php
    // Page Metadata
	$page_title = "Portfolio";
    $page_description = "A curated collection of Reilly Thate's work.";
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
            <h2>Film</h2>
            <p>
                In his film endeavors, Reilly aims to bring his interesting and creative visions to life.
            </p>
            <section id="video_selection">
                <div class="vimeo_container">
                    <iframe class="vimeo_video" src="https://player.vimeo.com/video/460666013" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                </div>
                <div class="vimeo_container">
                    <iframe class="vimeo_video" src="https://player.vimeo.com/video/467477083" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                </div>
                <div class="vimeo_container">
                    <iframe class="vimeo_video" src="https://player.vimeo.com/video/465210163" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                </div>
            </section>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>