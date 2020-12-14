<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "bud-light-for-a-soul";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
<?php $card = $card_table->getRowFromCardSlug($SLUG); ?>
		<main>
            <h2><?php echo ucwords($card['title']); ?></h2>
            <?php echo $card['description']; ?>

            <div class="youtube_container">
                <iframe class="youtube_video" src="https://www.youtube.com/embed/o-0vCYiBWtA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <h2>Other Works</h2>
<?php $card_table->generateCardSection(array("birthday-toast", "night-lift", "ruthless-the-final-chapter"), 3, 3); ?>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>