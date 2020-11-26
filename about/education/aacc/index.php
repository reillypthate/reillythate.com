<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../../private/initialize.php");
?>
<?php
    // Page Metadata
	$page_title = "Anne Arundel Community College";
    $page_description = "An About sub-page.";
    $wanted_stylesheets = "common.css";
    $wanted_ext_js = "wzrd.io.js";

    // Page Options
    $header_option = "";
    $footer_option = "";

    // Body Scripts
    $wanted_body_js = "test_body.js";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_head.php"); ?>
		
		<main>
            <section id="about_card">
				<img src="<?php echo linkToImage("GALLERY_AACC-VideoEditing-Screenshot.jpg");?>" alt="<?php echo getRowFromImageSlug("aacc-video-editing-screenshot")['alt'];?>";>
				<div id="about_thesis">
					<h2>Anne Arundel Community College</h2>
					<p>
						Reilly is currently pursuing an associate's degree in Media Production at A.A.C.C. His expected graduation date is May 2021.
					</p>
					<p>
						At A.A.C.C., his education is focused on artistic endeavors with a focus on:
					</p>
					<ul>
						<li>Film Production</li>
						<li>Web/Graphic Design</li>
					</ul>
				</div>
			</section>
<?php include_once(DOC_PREFIX . SHARED_PATH . "/about_education.php"); ?>
        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>