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
			$content_slug = $_GET['project'];
		}
		
    // Page Metadata
    if(isset($_GET['project']))
    {
        $SLUG = $_GET['project'];
    }
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>

		<main>
			<section id="project-header">
<?php portfolioPieceHeader($content_slug); ?>

			</section>
<?php portfolioPieceVideos($content_slug); ?>
<?php portfolioPieceEntities($content_slug); ?>

			<section class="page-break">
				<h3>Blogs</h3>
<?php portfolioPieceBlogs($content_slug); ?>

			</section>
			<section class="page-break">
				<h3>Gallery</h3>
<?php portfolioPieceImages($content_slug); ?>

			</section>
			<!-- Goal: Automatically generate a set of "related" projects. -->
			<section id="related-projects" class="portfolio-section">
                <div class="page-break title-archive-link">
                    <h2>Related Projects</h2>
                </div>
<?php portfolioPiecePreview('birthday-toast'); ?>
<?php portfolioPiecePreview('night-lift'); ?>
<?php portfolioPiecePreview('ruthless-the-final-chapter'); ?>
<?php portfolioPiecePreview('bud-light-for-a-soul'); ?>

			</section>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>
