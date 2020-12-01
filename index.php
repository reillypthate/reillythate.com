<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("private/initialize.php");
?>
<?php
    // Page Metadata
    $SLUG = "reillythate.com";
    
    $wanted_stylesheets = "common.css";
    $wanted_ext_js = "test_head.js";

    // Page Options
    $header_option = "";
    $footer_option = "";

    // Body Scripts
    $wanted_body_js = "test_body.js";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_head.php"); ?>
		
		<main>
<?php $card_set_1 = array("about", "blog", "portfolio"); ?>
            <section class="card_gallery card_count_<?php echo count($card_set_1);?>">
<?php foreach($card_set_1 as $key=>$card): ?>
                <!-- <?php echo $card; ?> card -->
                <?php $card_table->printCard($card, 2); ?>
<?php endforeach; ?>
            </section>
<?php $card_set_2 = array("education", "experience", "rit", "aacc", "film", "design"); ?>
            <section class="card_gallery card_count_<?php echo count($card_set_2);?>">
<?php foreach($card_set_2 as $key=>$card): ?>
                <!-- <?php echo $card; ?> card -->
                <?php $card_table->printCard($card, 3); ?>
<?php endforeach; ?>
            </section>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>