<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../../private/initialize.php");
?>
<?php
    // Page Metadata
	$page_title = "Design";
    $page_description = "";
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
				<img src="<?php echo linkToImage("GALLERY_Renegade-Spray-Design.jpg");?>" alt="<?php echo getRowFromImageSlug("renegade-spray-design")['alt'];?>";>
				<div id="about_thesis">
					<h2>Design</h2>
					<p>
						Skilled in web design, graphic design, and still art.
					</p>
					<p>
						Reilly brings his visions to reality by carefully weaving compositional elements together with great attention to detail.
					</p>
					<p>
						Meticulous and creative, Reilly is well-equipped to develop a vision and bring it to fruition with or without constraints.
					</p>
					<p>
						By combining his unique creative mind with a professional approach to tasks, Reilly is able to apply his talents to professional endeavors. 
					</p>
				</div>
            </section>
<?php include_once(DOC_PREFIX . SHARED_PATH . "/about_experience.php"); ?>
        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>