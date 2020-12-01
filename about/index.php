<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../private/initialize.php");
?>
<?php
	// Page Metadata
	$SLUG = "about";

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
				<img src="<?php echo $directory_table->linkToImage("PROFILE_ReillyThate.jpg");?>" alt="<?php echo $image_table->getRowFromImageSlug("reilly-thate-profile-01")['alt'];?>">
				<article id="about_thesis">
					<h2>About Reilly Thate</h2>
					<p>
						Reilly Thate is an artist with a background in science.
					</p>
					<p>
						Whether it be film, computer science, or any other field that interests him, he aspires to develop a well-rounded knowledge base with a complementary skillset.
					</p>
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
				</article>
			</section>
<?php $card_set_1 = array("education", "rit", "aacc"); ?>
            <section class="card_gallery card_count_<?php echo count($card_set_1);?>">
<?php foreach($card_set_1 as $key=>$card): ?>
                <!-- <?php echo $card; ?> card -->
                <?php $card_table->printCard($card, 3); ?>
<?php endforeach; ?>
            </section>

<?php $card_set_2 = array("experience", "film", "science", "design"); ?>
            <section class="card_gallery card_count_<?php echo count($card_set_2);?>">
<?php foreach($card_set_2 as $key=>$card): ?>
                <!-- <?php echo $card; ?> card -->
                <?php $card_table->printCard($card, 3); ?>
<?php endforeach; ?>
            </section>
        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>