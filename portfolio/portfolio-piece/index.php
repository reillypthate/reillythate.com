<?php
	// Before we do anything, we need to initialize a bunch of stuff: namely, 
	// universal constants (for ease of access) and a database connection.
	require_once("../../private/initialize.php");
?>
<?php
	    // Page Metadata
		$SLUG = "portfolio-piece";
		pushFootScripts("modules/parallax.js");
		if(!isset($_GET['project']))
		{
			header('../');
		}else
		{
			$projectSlug = $_GET['project'];
		}
		
    // Page Metadata
    if(isset($_GET['project']))
    {
		$SLUG = $_GET['project'];
		
        $project = $data[PORTFOLIO]->getRowFromId(
            $data[PORTFOLIO]->idBySlug($projectSlug)
        );
		$projectContent = $data[PORTFOLIO]->getProjectContent($projectSlug);
    }
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>

		<main>
			<section id="project-header">
<?php projectHeader(); ?>

			</section>
<?php projectVideos();?>
<?php projectEntities(); ?>

			<section class="page-break">
				<h3>Blogs</h3>
<?php projectPosts(); ?>

			</section>
			<section class="page-break">
				<h3>Gallery</h3>
<?php projectImages(); ?>

			</section>
			<!-- Goal: Automatically generate a set of "related" projects. -->
			<section id="related-projects" class="portfolio-section">
                <div class="page-break title-archive-link">
                    <h2>Related Projects</h2>
                </div>

			</section>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>
