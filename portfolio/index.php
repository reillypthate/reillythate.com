<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "portfolio";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main>
            <section>
                <article>
                    <h2>Film</h2>
                    <p>
                        In his film endeavors, Reilly aims to bring his interesting and creative visions to life.
                    </p>
                </article>
            </section>
<?php $card_table->generateCardSection(array("project-birthday-toast", "project-night-lift", "project-ruthless-the-final-chapter", "project-bud-light-for-a-soul"), 3, 3, "film-portfolio"); ?>

		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>