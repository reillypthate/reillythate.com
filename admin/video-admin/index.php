<?php 
    $NAV_SET = "admin";
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
    $SLUG = "video-admin";
    pushFootScripts("page-specific/backend/video-admin-functions.js");
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>

<?php 
    function buildVideoList()
    {
        global $data;
        //print_r($list);
        echo "<ul>";
        foreach($data[VIDEO]->getTable() as $id=>$videoRow)
        {
            echo "<li>";
            echo "<div class=\"video-item\"";
            echo " data-video_id=\"" . $videoRow['id'] . "\"";
            echo " data-video_slug=\"" . $videoRow['slug'] . "\"";
            echo " data-video_title=\"" . $videoRow['title'] . "\"";
            echo " data-video_src=\"" . $videoRow['src'] . "\"";
            echo "><h3>" . $videoRow['title'] . "</h3>";
            echo "</div>";
            echo "</li>";
        }
        echo "</ul>";
    }
?>

		<main>
            <section id="video-admin-list">
                <button id="video-admin__button-add">Add Video</button>
<?php buildVideoList(); ?>
            </section>
            <div id="modal__video-admin" class="modal">
                <div class="modal-content">
                    <span class="close-button">&times;</span>
                    <form method="post" action="<?php echo l("video-admin") . "/index.php"; ?>">
                        <input type="hidden" name="db_type" value="video">
                        <input type="hidden" name="db_video_id" id="video-input__id">

                        <fieldset>
                            <legend>Video Slug</legend>
                            <input name="db_video_slug" type="text" placeholder="slug-xxx" id="video-input__slug">
                        </fieldset>
                        <fieldset>
                            <legend>Metadata</legend>
                            <input name="db_video_title" type="text" placeholder="Video Title" id="video-input__title">
                            <input name="db_video_src" type="text" placeholder="Source" id="video-input__src">
                        </fieldset>
                        <!--
                        <fieldset>
                            <legend>Attributes</legend>
                            <textarea name="db_video_attributes" row="3" col="80" placeholder="Attributes (JSON)" id="video-input__attributes"></textarea>
                        </fieldset>
                        -->
                        <button type="submit" id="db-submit" name="db_UPDATE">Update Video</button>
                    </form>
                </div>
            </div>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>