<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
    $SLUG = "project-night-lift";
    $PAGE_SET = "portfolio";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
<?php $card = $card_table->getRowFromCardSlug($SLUG); ?>
		<main>
            <h2><?php echo ucwords($card['title']); ?></h2>
            <?php echo $card['description']; ?>

            <div class="vimeo_container">
                <iframe class="vimeo_video" src="https://player.vimeo.com/video/467477083" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            </div>

            <h2>Other Works</h2>
<?php $card_table->generateCardSection(array("project-birthday-toast", "project-night-lift", "project-ruthless-the-final-chapter", "project-bud-light-for-a-soul"), 3, 3); ?>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>