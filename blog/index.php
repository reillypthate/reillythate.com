<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../private/initialize.php");
?>
<?php
    // Page Metadata
    if(isset($_GET['blog']))
    {
        $SLUG = $_GET['blog'];
    }else
    {
        $SLUG = "blog";
        array_push($wanted_ext_js, "vendor/imagesloaded.pkgd.min.js");
        array_push($wanted_body_js, "page-specific/blog-masonry.js");
    }
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main>
<?php if($SLUG != "blog"): ?>
<?php include_once("blog-page.php"); ?>
<?php else: ?>
            <section id="blog-list__main" class="blog-preview-list">
<?php foreach($post_table->getTable() as $index=>$post): ?>
<?php include("blog-preview.php"); ?>
<?php endforeach; ?>
            </section>
<?php endif; ?>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>