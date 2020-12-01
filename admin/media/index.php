<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "media";
    $wanted_stylesheets = "common.css";
    $wanted_ext_js = "test_head.js";

    // Page Options
    $header_option = "";
    $footer_option = "";

    // Body Scripts
    $wanted_body_js = "test_body.js";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/private_head.php"); ?>
		
<main id="manager">
            <table>
                <thead>
<?php $keys = $image_table->getKeys(); ?>
                    <th scope="col"></th>
<?php foreach($keys as $index=>$key): ?>
                    <th scope="col"><?php echo $key; ?></th>
<?php endforeach; ?>
                </thead>

                <tbody>
<?php foreach($image_table->getTable() as $index=>$row): ?>
                    <tr>
                        <td>
                            <button onclick="window.location.href='index.php?edit-img=<?php echo $row['id'];?>'">Edit</button>
                        </td>
<?php foreach($keys as $col_key=>$index): ?>
                        <td><?php echo $row[$index];?></td>
<?php endforeach; ?>
                    </tr>
<?php endforeach; ?>
                </tbody>

                <tfoot>
                </tfoot>
            </table>
            <section>
<?php if($isEditingImg): ?>
                <!-- Edit Image -->
                <h2>Edit Image</h2>
                <form method="post" action="<?php echo $directory_table->linkToPage("media") . "/index.php"; ?>">
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
                <form method="post" action="<?php echo $directory_table->linkToPage("media") . "/index.php"; ?>">
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

<?php require_once(DOC_PREFIX . SHARED_PATH . "/private_foot.php"); ?>