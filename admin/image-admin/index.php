<?php 
    $NAV_SET = "admin";
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
    $SLUG = "image-admin";
    pushFootScripts("page-specific/backend/image-admin-functions.js");
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>

<?php 
    function buildImageList()
    {
        global $data;
        //print_r($list);
        echo "<ul>";
        foreach($data[IMAGE]->getTable() as $id=>$imageRow)
        {
            echo "<li>";
            echo "<div class=\"image-item\"";
            echo " data-image_id=\"" . $imageRow['id'] . "\"";
            echo " data-image_slug=\"" . $imageRow['slug'] . "\"";
            echo " data-image_path=\"" . $imageRow['path'] . "\"";
            echo " data-image_name=\"" . $imageRow['name'] . "\"";
            echo " data-image_type=\"" . $imageRow['type'] . "\"";
            echo " data-image_alt=\"" . $imageRow['alt'] . "\"";
            //echo " data-image_srcset=\"" . $imageRow['srcset'] . "\"";
            echo "><h3>" . $imageRow['name'] . "</h3>";
            echo "</div>";
            img($imageRow['slug']);
            echo "</li>";
        }
        echo "</ul>";
    }
?>

		<main>
            <section id="image-admin-list">
                <button id="image-admin__button-add">Add Image</button>
<?php buildImageList(); ?>
            </section>
            <div id="modal__image-admin" class="modal">
                <div class="modal-content">
                    <span class="close-button">&times;</span>
                    <form method="post" action="<?php echo l("image-admin") . "/index.php"; ?>">
                        <input type="hidden" name="db_type" value="image">
                        <input type="hidden" name="db_image_id" id="image-input__id">

                        <fieldset>
                            <legend>Image Slug</legend>
                            <input name="db_image_slug" type="text" placeholder="slug-xxx" id="image-input__slug">
                        </fieldset>
                        <fieldset>
                            <legend>Metadata</legend>
                            <input name="db_image_path" type="text" placeholder="Path" id="image-input__path">
                            <input name="db_image_name" type="text" placeholder="Image Name" id="image-input__name">
                            <input name="db_image_type" type="text" placeholder="Extension" id="image-input__type">
                            <textarea name="db_image_alt" row="2" col="80" placeholder="Image Alt (125ch)" id="image-input__alt"></textarea>
                        </fieldset>
                        <!--
                        <fieldset>
                            <legend>Source Set</legend>
                            <textarea name="db_image_srcset" row="3" col="80" placeholder="Source Set (JSON)" id="image-input__srcset"></textarea>
                        </fieldset>
                        -->
                        <button type="submit" id="db-submit" name="db_UPDATE">Update Image</button>
                    </form>
                </div>
            </div>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>