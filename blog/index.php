<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../private/initialize.php");
?>
<?php
        $SLUG = "blog";
    // Page Metadata
    if(isset($_GET['blog']))
    {
        $DYNAMIC_BREADCRUMB = array();
        array_push($DYNAMIC_BREADCRUMB, $data[BLOG]->getRowFromId(
            $data[BLOG]->idBySlug($_GET['blog']))['title']
        );
        array_push($DYNAMIC_BREADCRUMB, "index.php?blog=" . $_GET['blog']);
    }else
    {
        array_push($wanted_ext_js, "vendor/imagesloaded.pkgd.min.js");
        array_push($wanted_body_js, "page-specific/blog-masonry.js");
    }
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main>
<?php if(isset($DYNAMIC_BREADCRUMB)): ?>
<?php blogPost($_GET['blog']); ?>
<?php else: ?>
            <section id="blog-list__main" class="blog-preview-list">
<?php foreach($data[BLOG]->getSlugs() as $id=>$slug): ?>
<?php blogPreview($slug);//include("blog-preview.php"); ?>
<?php endforeach; ?>
            </section>
<?php endif; ?>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>