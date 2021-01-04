<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../private/initialize.php");
?>
<?php
    // Page Metadata
    $SLUG = "blog";
    array_push($wanted_ext_js, "vendor/imagesloaded.pkgd.min.js");
    array_push($wanted_body_js, "page-specific/blog-masonry.js");
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main>
            <section id="blog-list__main" class="blog-preview-list">
<?php $post_table->printBlogPreviews(4); ?>
            </section>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>