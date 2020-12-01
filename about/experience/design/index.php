<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "design";
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
				<img src="<?php echo $directory_table->linkToImage("GALLERY_Renegade-Spray-Design.jpg");?>" alt="<?php echo $image_table->getRowFromImageSlug("renegade-spray-design")['alt'];?>";>
				<article id="about_thesis">
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
				</article>
            </section>

<?php $card_set_1 = array("experience", "film", "science"); ?>
            <section class="card_gallery card_count_<?php echo count($card_set_1);?>">
<?php foreach($card_set_1 as $key=>$card): ?>
                <!-- <?php echo $card; ?> card -->
                <?php $card_table->printCard($card, 3); ?>
<?php endforeach; ?>
            </section>
        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>