<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "experience";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main>
            <section id="about_card">
				<img src="<?php echo $directory_table->linkToImage("GALLERY_Experience-Books.jpg");?>" alt="<?php echo $image_table->getRowFromImageSlug("experience-books")['alt'];?>";>
				<article id="about_thesis">
					<h2>Experience</h2>
					<p>
						Reilly Thate's experiences throughout his education and his life have enabled him to become knowledgable and skilled in a range of different subjects.
					</p>
					<ul>
						<li><a href="<?php echo $directory_table->linkToPage("film");?>">Film</a></li>
						<li><a href="<?php echo $directory_table->linkToPage("science");?>">Science</a></li>
						<li><a href="<?php echo $directory_table->linkToPage("design");?>">Design</a></li>
					</ul>
				</article>
			</section>

<?php $card_table->generateCardSection(array("film", "science", "design"), 3, 3); ?>

        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>