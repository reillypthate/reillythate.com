<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "experience";
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
<?php $card_set_1 = array("film", "science", "design"); ?>
            <section class="card_gallery card_count_<?php echo count($card_set_1);?>">
<?php foreach($card_set_1 as $key=>$card): ?>
                <!-- <?php echo $card; ?> card -->
                <?php $card_table->printCard($card, 3); ?>
<?php endforeach; ?>
            </section>
        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>