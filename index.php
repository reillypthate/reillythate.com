<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("private/initialize.php");
?>
<?php
    // Page Metadata
	$page_title = "Home";
    // $page_description = "Reilly Thate's personal website.";
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
            <h2>About Reilly</h2>
<?php include(DOC_PREFIX . SHARED_PATH . "/about_education.php"); ?>
<?php include(DOC_PREFIX . SHARED_PATH . "/about_experience.php"); ?>
            <h2>Reilly&rsquo;s Work</h2>
            <section id="portfolio_grid">
<?php 
    $pc_slugs = getPortfolioCardSlugs();
    for($pc_i = 0; $pc_i < count($pc_slugs); $pc_i++): ?>
                <?php echo constructPortfolioCard($pc_slugs[$pc_i]); ?>
<?php endfor; ?>
            </section>
            <h2>Reilly's Blog</h2>
<?php include(DOC_PREFIX . SHARED_PATH . "/about_experience.php"); ?>
<?php include(DOC_PREFIX . SHARED_PATH . "/about_education.php"); ?>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/page_foot.php"); ?>