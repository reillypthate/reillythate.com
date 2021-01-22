<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "portfolio";
    pushFootScripts("modules/parallax.js");
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
        <main>
            <section class="portfolio-section">
                <div class="page-break title-archive-link">
                    <h2>Films</h2>
                    <a>View All</a>
                </div>
<?php portfolioPiecePreview('birthday-toast'); ?>
<?php portfolioPiecePreview('night-lift'); ?>
<?php portfolioPiecePreview('ruthless-the-final-chapter'); ?>
<?php portfolioPiecePreview('bud-light-for-a-soul'); ?>

            </section>

            <section class="portfolio-section">
                <div class="page-break title-archive-link">
                    <h2>Dev Projects</h2>
                    <a>View All</a>
                </div>
<?php portfolioPiecePreview('travelers-screensaver', -0.45); ?>

            </section>

            <section class="portfolio-section">
                <div class="page-break title-archive-link">
                    <h2>Artwork</h2>
                    <a>View All</a>
                </div>
                <div class="parallax-container transparency">
                    <div class="parallax-image__container">
                        <?php img("renegade-blues", array("data-speed"=>-0.45)); ?>
                    </div>
                    <div class="parallax-image__container-overlay white-text">
                        <h3>Renegade Blues</h3>
                        <p>An extension of the Renegade logo design for my website.</p>
                    </div>
                </div>
                <div class="parallax-container">
                    <div class="parallax-image__container">
                        <?php img("renegade-spray-design", array("data-speed"=>-0.45)); ?>
                    </div>
                    <div class="parallax-image__container-overlay white-text">
                        <h3>Renegade Spray</h3>
                        <p>A brilliant spray paint piece incorporating the Renegade logo as a cosmic entity.</p>
                    </div>
                </div>
            </section>
            <div id="modal__portfolio-piece" class="modal">
                <div class="modal-content">
                    <span class="close-button">&times;</span>
                </div>
            </div>

		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>