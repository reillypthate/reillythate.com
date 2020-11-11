<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("private/initialize.php");
?>
<?php
    // Page Metadata
	$page_name = "Home";
    $page_description = "Reilly Thate's personal website.";
    $wanted_stylesheets = "common2.css,common.css";
    $wanted_ext_js = "test_head.js";

    // Page Options
    $header_option = "";
    $footer_option = "";

    // Body Scripts
    $wanted_body_js = "test_body.js";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_head.php"); ?>
		
		<main>
            <section id="video_selection">
                <div class="youtube_container">
                    <iframe class="youtube_video" src="https://www.youtube.com/embed/19ghZuSgtuU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="youtube_container">
                    <iframe class="youtube_video" src="https://www.youtube.com/embed/HXhRUrtxByU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="youtube_container">
                    <iframe class="youtube_video" src="https://www.youtube.com/embed/FtKwKWFR57A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </section>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>