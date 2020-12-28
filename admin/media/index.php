<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "media";
    $PAGE_SET = "admin";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
        <main id="manager">
            <section>
                <?php $image_table->buildTable(); ?>
            </section>
            <section>
<?php if($isEditingImg): ?>
                <!-- Edit Image -->
                <h2>Edit Image</h2>
                <form method="post" action="<?php echo $directory_table->linkBySlug("media") . "/index.php"; ?>">
                    <input type="hidden" name="img_id" value="<?php echo $img_id; ?>">
                    <fieldset>
                        <legend>
                            Image Slug
                        </legend>
                        <input name="img_slug" type="text" placeholder="slug-xxx-xxx" value="<?php echo $img_slug;?>">
                    </fieldset>
                    <fieldset>
                        <legend>
                            Alt
                        </legend>
                        <input name="img_name" type="text" placeholder="name" value="<?php echo $img_name; ?>">
                        <textarea name="img_alt" row="3" col="80" placeholder="Image Alt (255ch)"><?php echo $img_alt; ?></textarea>
                    </fieldset>
                    <button type="submit" name="img_UPDATE">Update Image</button>
                </form>
<?php else: ?>
                <!-- Add Directory -->
                <h2>Add New Image</h2>
<?php include(DOC_PREFIX . SHARED_PATH . "/errors/errors.php"); ?>
                <form method="post" action="<?php echo $directory_table->linkBySlug("media") . "/index.php"; ?>">
                    <fieldset>
                        <legend>
                            Image Slug
                        </legend>
                        <input name="img_slug" type="text" placeholder="slug-xxx-xxx">
                    </fieldset>
                    <fieldset>
                        <legend>
                            Alt
                        </legend>
                        <input name="img_name" type="text" placeholder="name">
                        <textarea name="img_alt" row="3" col="80" placeholder="Image Alt (255ch)"></textarea>
                    </fieldset>
                    <button type="submit" name="img_ADD">Add Image</button>
                </form>
<?php endif; ?>
            </section>
        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>