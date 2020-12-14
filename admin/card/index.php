<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "card";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/private_head.php"); ?>
		
        <main id="manager">
            <section>
                <?php $card_table->buildTable(); ?>
            </section>
            <section>
<?php if($isEditingCard): ?>
                <!-- Edit Image -->
                <h2>Edit Image</h2>
                <form method="post" action="<?php echo $directory_table->linkToPage("card") . "/index.php"; ?>">
                    <input type="hidden" name="card_id" value="<?php echo $card_id; ?>">
                    <fieldset>
                        <legend>
                            Card Slug
                        </legend>
                        <input name="card_slug" type="text" placeholder="slug-xxx-xxx" value="<?php echo $card_slug; ?>">
                    </fieldset>
                    <fieldset>
                        <legend>
                            Details
                        </legend>
                        <input name="card_title" type="text" placeholder="Title" value="<?php echo $card_title; ?>">
                        <textarea name="card_description" row="3" col="80" placeholder="Description (255ch)"><?php echo $card_description; ?></textarea>
                    </fieldset>
                    <fieldset>
                        <legend>
                            Card Image
                        </legend>
                        <select name="card_img_id">
                            <option></option>
<?php foreach($image_table->getTable() as $key=>$dirs): ?>
                            <option value="<?php echo $dirs['id'];?>"<?php if($dirs['id'] == $card_img_id){echo " selected";} ?>><?php echo $dirs['slug']; ?></option>
<?php endforeach; ?>
                        </select>
                    </fieldset>
                    <button type="submit" name="card_UPDATE">Update Card</button>
                    <button type="submit" name="card_CANCEL">Cancel</button>
                </form>
<?php else: ?>
                <!-- Add Directory -->
                <h2>Add New Card</h2>
<?php include(DOC_PREFIX . SHARED_PATH . "/errors/errors.php"); ?>
                <form method="post" action="<?php echo $directory_table->linkToPage("card") . "/index.php"; ?>">
                    <fieldset>
                        <legend>
                            Card Slug
                        </legend>
                        <input name="card_slug" type="text" placeholder="slug-xxx-xxx">
                    </fieldset>
                    <fieldset>
                        <legend>
                            Details
                        </legend>
                        <input name="card_title" type="text" placeholder="Title">
                        <textarea name="card_description" row="3" col="80" placeholder="Description (255ch)"></textarea>
                    </fieldset>
                    <fieldset>
                        <legend>
                            Card Image
                        </legend>
                        <select name="card_img_id">
                            <option></option>
<?php foreach($image_table->getTable() as $key=>$dirs): ?>
                            <option value="<?php echo $dirs['id'];?>"><?php echo $dirs['slug']; ?></option>
<?php endforeach; ?>
                        </select>
                    </fieldset>
                    <button type="submit" name="card_ADD">Add Card</button>
                </form>
<?php endif; ?>
            </section>
        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/private_foot.php"); ?>