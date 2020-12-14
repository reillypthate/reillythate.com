<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "aacc";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main>
            <section id="about_card">
				<img src="<?php echo $directory_table->linkToImage("GALLERY_AACC-VideoEditing-Screenshot.jpg");?>" alt="<?php echo $image_table->getRowFromImageSlug("aacc-video-editing-screenshot")['alt']; ?>">
				<article id="about_thesis">
					<h2>Anne Arundel Community College</h2>
					<p>
						Reilly is currently pursuing an associate's degree in Media Production at A.A.C.C. His expected graduation date is May 2021.
					</p>
<?php /*
					<p>
						At A.A.C.C., his education is focused on artistic endeavors with a focus on:
					</p>
					<ul>
						<li>Film Production</li>
						<li>Web/Graphic Design</li>
					</ul>
*/ ?>
				</article>
			</section>

<?php $card_table->generateCardSection(array("education", "rit", "film", "design"), 3, 3); ?>

        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>