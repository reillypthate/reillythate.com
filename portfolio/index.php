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
                <div class="parallax-container">
                    <div class="parallax-image__container">
                        <?php img("birthday-toast-banner", array("data-speed"=>-1)); ?>
                    </div>
                    <div class="parallax-image__container-overlay white-text">
                        <h3>Birthday Toast</h3>
                        <p>When an 18th birthday party doesn't go quite according to plan, the party-goers find themselves ill-equipped to deal with the consequences.</p>
                    </div>
                </div>

                <div class="parallax-container">
                    <div class="parallax-image__container">
                        <?php img("night-lift-banner", array("data-speed"=>-1)); ?>
                    </div>
                    <div class="parallax-image__container-overlay white-text">
                        <h3>Night Lift</h3>
                        <p>It’s the middle of the night. You’re out in the cold. You’re lifting weights.</p>
                        <p>You’re by yourself — or so it seems...</p>
                    </div>
                </div>

                <div class="parallax-container">
                    <div class="parallax-image__container">
                        <?php img("ruthless-trailer-banner", array("data-speed"=>-1)); ?>
                    </div>
                    <div class="parallax-image__container-overlay white-text">
                        <h3>Ruthless: The Final Chapter</h3>
                        <p>A trailer for a fake slasher.</p>
                        <p>Set to the song “Marceline” by Vista Kicks.</p>
                    </div>
                </div>

                <div class="parallax-container">
                    <div class="parallax-image__container">
                        <?php img("poster-bud-light-for-a-soul", array("data-speed"=>-1)); ?>
                    </div>
                    <div class="parallax-image__container-overlay white-text">
                        <h3>Bud Light (For a Soul)</h3>
                        <p>Your typical basement dweller finds himself on the wrong side of a bargain...</p>
                    </div>
                </div>
            </section>

            <section class="portfolio-section">
                <div class="page-break title-archive-link">
                    <h2>Dev Projects</h2>
                    <a>View All</a>
                </div>
                <a class="parallax-container" href="<?php echo $directory_table->linkBySlug('travelers-screensaver'); ?>">
                    <div class="parallax-image__container">
                        <?php img("travelers-interface", array("data-speed"=>-0.45)); ?>
                    </div>
                    <div class="parallax-image__container-overlay white-text">
                        <h3>Travelers Screensaver</h3>
                        <p>Inspired by the futuristic computer interface used in the Netflix show “Travelers”.</p>
                    </div>
                </a>
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

		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>