<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
	$page_title = "Experience";
    $page_description = "An overview of Reilly Thate.";
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
				<img src="<?php echo linkToImage("GALLERY_Experience-Books.jpg");?>" alt="<?php echo getRowFromImageSlug("experience-books")['alt'];?>";>
				<div id="about_thesis">
					<h2>Experience</h2>
					<p>
						Reilly Thate's experiences throughout his education and his life have enabled him to become knowledgable and skilled in a range of different subjects.
					</p>
					<ul>
						<li><a href="<?php echo linkToPage("Film");?>">Film</a></li>
						<li><a href="<?php echo linkToPage("Science");?>">Science</a></li>
						<li><a href="<?php echo linkToPage("Design");?>">Design</a></li>
					</ul>
				</div>
            </section>
<?php include_once(DOC_PREFIX . SHARED_PATH . "/about_experience.php"); ?>
        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>