<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "bud-light-for-a-soul";
    $wanted_stylesheets = "common.css";
    $wanted_ext_js = "test_head.js";

    // Page Options
    $header_option = "";
    $footer_option = "";

    // Body Scripts
    $wanted_body_js = "test_body.js";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_head.php"); ?>
		
<?php $card = $card_table->getRowFromCardSlug($SLUG); ?>
		<main>
            <h2><?php echo ucwords($card['title']); ?></h2>
            <?php echo $card['description']; ?>

            <div class="youtube_container">
                <iframe class="youtube_video" src="https://www.youtube.com/embed/o-0vCYiBWtA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <h2>Other Works</h2>
<?php $card_set_1 = array("birthday-toast", "night-lift", "ruthless-the-final-chapter"); ?>
            <section class="card_gallery card_count_<?php echo count($card_set_1);?>" id="about_gallery_education">
<?php foreach($card_set_1 as $key=>$card): ?>
                <!-- <?php echo $card; ?> card -->
                <?php $card_table->printCard($card, 3); ?>
<?php endforeach; ?>
            </section>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>