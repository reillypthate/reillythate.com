<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "design";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main>
            <section id="about_card">
				<img src="<?php echo $directory_table->linkToImage("GALLERY_Renegade-Spray-Design.jpg");?>" alt="<?php echo $image_table->getRowFromImageSlug("renegade-spray-design")['alt'];?>">
				<article id="about_thesis">
					<h2>Design</h2>
					<p>
						Skilled in web design, graphic design, and still art.
					</p>
<?php /*
					<p>
						Reilly brings his visions to reality by carefully weaving compositional elements together with great attention to detail.
					</p>
*/ ?>
					<p>
						Meticulous and creative, Reilly is well-equipped to develop a vision and bring it to fruition with or without constraints.
					</p>
<?php /*
					<p>
						By combining his unique creative mind with a professional approach to tasks, Reilly is able to apply his talents to professional endeavors. 
					</p>
*/ ?>
					<p class="end-preview-link"><a href="<?php echo $directory_table->linkBySlug("portfolio"); ?>">Visit Portfolio</a></p>
				</article>
            </section>

<?php $card_table->generateCardSection(array("experience", "film", "science"), 3, 3); ?>

        </main>


<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>