<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "rit";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main>
            <section id="about_card">
				<img src="<?php echo $directory_table->linkToImage("GALLERY_RIT-SPR16-Project-Presentation.jpg");?>" alt="<?php echo $image_table->getRowFromImageSlug("intro-bio2-presentation")['alt']; ?>">
				<article id="about_thesis">
					<h2>Rochester Institute of Technology</h2>
					<p>
						Reilly graduated from Rochester Institute of Technology in 2018 with a B.S. in Bioinformatics.
					</p>
					<p>
						Reilly's education at R.I.T. incorporated intensive study where he developed proficiency in a variety of scientific topics.
					</p>
<?php /*
					<ul>
						<li>Bioinformatics Algorithms</li>
						<li>Statistical Analysis</li>
						<li>Genetic Engineering</li>
					</ul>
*/ ?>
				</article>
            </section>

<?php $card_table->generateCardSection(array("education", "aacc", "science"), 3, 3); ?>

        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>