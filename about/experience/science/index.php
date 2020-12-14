<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "science";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main>
            <section id="about_card">
				<img src="<?php echo $directory_table->linkToImage("GALLERY_Science-Culture.jpg");?>" alt="<?php echo $image_table->getRowFromImageSlug("science-culture")['alt']; ?>">
				<article id="about_thesis">
					<h2>Science</h2>
					<p>
						Reilly graduated from Rochester Institute of Technology in 2018 with a B.S. in Bioinformatics and immersion in Mathematics.
					</p>
<?php /*
					<p>
						His science background began in high school when he was enrolled in his school's STEM magnet program. During high school, he learned how to program, how to work with a team, and how to conduct research. His high school career culminated in a capstone research project entitled "Music-Induced Hearing Loss", where he took inspiration from his own pathological hearing loss to research how habitually listening to music can contribute to sensorineural hearing loss.
					</p>
					<p>
						Before his college career began, Reilly participated in RIT's IMPRESS program, where he developed his foundation in metacognitive thinking. He studied Computer Engineering during his first year, and then studied Bioinformatics for the final three.
					</p>
					<p>
						He was involved in research opportunities with Dr. Feng Cui at RIT between 2016&ndash;2017 and with Dr. Todd Treangen at University of Maryland, College Park during a summer internship in 2017.
					</p>
*/ ?>
					<p>
						Reilly hopes to apply his extensive STEM background and scientific mind to his creative endeavors.
					</p>
				</article>
            </section>

<?php $card_table->generateCardSection(array("experience", "film", "design"), 3, 3); ?>

        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>