<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../private/initialize.php");
?>
<?php
	// Page Metadata
	$SLUG = "about";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main>
            <section id="about_card">
				<img src="<?php echo $directory_table->linkToImage("PROFILE_ReillyThate.jpg");?>" alt="<?php echo $image_table->getRowFromImageSlug("reilly-thate-profile-01")['alt'];?>">
				<article id="about_thesis">
					<h2>About Reilly Thate</h2>
					<p>
						Reilly Thate is an artist with a background in science.
					</p>
					<p>
						Whether it be film, computer science, or any other field that interests him, he aspires to develop a well-rounded knowledge base with a complementary skillset.
					</p>
<?php /*
					<h3><a href="<?php echo $directory_table->linkToPage("Education"); ?>">Education</a></h3>
					<p>
						A.A.S. Media Production &mdash; Anne Arundel Community College (In Progress)
					</p>
					<p>
						B.S. Bioinformatics &mdash; Rochester Institute of Technology (2018)

					</p>
					<h3><a href="<?php echo $directory_table->linkToPage("Experience"); ?>">Experience</a></h3>
					<ul>
						<li><a href="<?php echo $directory_table->linkToPage("Film");?>">Film</a></li>
						<li><a href="<?php echo $directory_table->linkToPage("Science");?>">Science</a></li>
						<li><a href="<?php echo $directory_table->linkToPage("Design");?>">Design</a></li>
					</ul>
*/ ?>
				</article>
			</section>
<?php //$card_table->generateCardSection(array("experience", "film", "science", "design"), 3, 3); ?>
<?php $card_table->generateCardSection(array("education", "rit", "aacc"), 3, 3); ?>

        </main>

		<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>