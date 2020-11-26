<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../../private/initialize.php");
?>
<?php
    // Page Metadata
	$page_title = "Film";
    $page_description = "";
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
				<img src="<?php echo linkToImage("GALLERY_Birthday-Toast-Rehearsal.jpg");?>" alt="<?php echo getRowFromImageSlug("birthday-toast-rehearsal")['alt'];?>";>
				<div id="about_thesis">
					<h2>Film</h2>
					<p>
						Experienced in roles throughout all phases of production.
					</p>
					<p>
						Reilly has produced numerous short films with ambitious concepts that have allowed him to express his unique voice and tell interesting stories about multi-facted characters.
					</p>
					<p>
						All of his short films were written by him. As an aspiring filmmaker, he spends his free time writing screenplays for prospective projects ranging from a serialized comedy with elements of tragedy ("Under New Ownership") to a feature-length drama with elements of science fiction ("Mind Over").
					</p>
					<p>
						His most notable experience on set was as a director for his short film "Birthday Toast", which was produced as a final project for one of his media production classes. He brought effective leadership and contagious enthusiasm to the set, culminating in one of his favorite projects to date.
					</p>
					<p>
						In addition to work behind the camera, Reilly brings finely-tuned acting instincts from the stage (as Juror Three in Twelve Angry Men) to the screen with a diverse character range that enables him to bring his visions to life.
					</p>
				</div>
            </section>
<?php include_once(DOC_PREFIX . SHARED_PATH . "/about_experience.php"); ?>
        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>