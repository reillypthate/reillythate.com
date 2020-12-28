<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "blog-admin";
    $PAGE_SET = "admin";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>

        <main id="manager">
            <section>
                <?php $post_table->buildTable(); ?>
            </section>
            <section>
                <form method="get" action="<?php echo $directory_table->linkBySlug("post") . "/index.php" ?>">
                    <input type="hidden" name="create-new-post" value="true">
                    <button type="submit">Create New Post</button>
                </form>
            </section>
        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>