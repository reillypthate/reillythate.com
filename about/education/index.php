<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "education";
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
				<img src="<?php echo $directory_table->linkToImage("GALLERY_Reilly-Lucas-Graduation.jpg");?>" alt="<?php echo $image_table->getRowFromImageSlug("graduation-reilly-lucas")['alt'];?>">
				<article id="about_thesis">
					<h2>Education</h2>
					<p>Reilly's academic career has enriched him with knowledge from a broad range of scientific and artistic disciplines.</p>
					<p>
						A.A.S. Media Production &mdash; Anne Arundel Community College (In Progress)
					</p>
					<p>
						B.S. Bioinformatics &mdash; Rochester Institute of Technology (2018)
					</p>
					<h3><a href="<?php echo $directory_table->linkToPage("rit");?>">Rochester Institute of Technology (R.I.T.)</a></h3>
					<p>
						Reilly's education at R.I.T. incorporated intensive study where he developed proficiency in:
					</p>
					<ul>
						<li>Bioinformatics Algorithms</li>
						<li>Statistical Analysis</li>
						<li>Genetic Engineering</li>
					</ul>
					<h3><a href="<?php echo $directory_table->linkToPage("aacc");?>">Anne Arundel Community College (A.A.C.C.)</a></h3>
					<p>
						At A.A.C.C., his education is focused on artistic endeavors with a focus on:
					</p>
					<ul>
						<li>Film Production</li>
						<li>Web/Graphic Design</li>
					</ul>
				</article>
			</section>
<?php $about_page_cards_1 = array("rit", "aacc"); ?>
            <section class="card_gallery card_count_<?php echo count($about_page_cards_1);?>">
<?php foreach($about_page_cards_1 as $key=>$card): ?>
                <!-- <?php echo $card; ?> card -->
                <?php $card_table->printCard($card, 3); ?>
<?php endforeach; ?>
            </section>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>