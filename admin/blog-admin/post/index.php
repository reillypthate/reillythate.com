<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../../private/initialize.php");
?>
<?php
    // Page Metadata
    $SLUG = "post";
    $PAGE_SET = "admin";
    array_push($wanted_ext_js, "vendor/ckeditor/ckeditor.js");
    array_push($wanted_body_js, "page-specific/post-editor.js");
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
<?php 
    if(isset($_GET['create-new-post'])) {
        $createNewPost = true;
    }else {
        if(!isset($_GET['edit-post'])) {
            $_SESSION['message'] = "";
            header('location: ../');
            exit(0);
        }
    }
?>		
<?php 
    function postEditCheck($trueValue, $falseValue="", $isValue=false)
    {
        global $isEditingPost;

        if($isValue)
        {
            if($isEditingPost)
            {
                echo "value=\"" . $trueValue . "\"";
            }
        }else
        {
            if($isEditingPost)
            {
                echo $trueValue;
            }else
            {
                echo $falseValue;
            }
        }
    }
?>
        <main id="blog-admin">
            <form class="blog-admin__editor" method="post" action="<?php $directory_table->linkBySlug("blog-admin") . "/index.php"; ?>">

                <fieldset class="blog-canvas">
                    <legend>Blog Body</legend>
<?php if($isEditingModule): ?>
                    <input type="hidden" name="parent_module" value="<?php echo $module_id; ?>">
                    <input type="hidden" name="modules_removed" id="modules_removed" value="">
<?php foreach($module_text_rows as $index=>$row): ?>
                    <textarea class="module-child-text module-child" name="module-child_<?php echo $row['id']; ?>" id="module-child_<?php echo $row['id']; ?>" class="<?php echo $row['class']; ?>" module-position="<?php echo $row['position']; ?>"><?php echo $row['content']; ?></textarea>
<?php endforeach; ?>
<?php foreach($module_image_rows as $index=>$row): ?>
                    <fieldset id="<?php echo $index; ?>" class="module-child-gallery module-child" module-position="<?php echo $row['position']; ?>">
                        <input type="hidden" name="images_removed_from-<?php echo $index; ?>" value="">
<?php foreach($row as $key=>$image): ?>
<?php if($key == "position") continue; ?>
<?php $respective_image = $image_table->getRowFromImageId($image); ?>
                        <button class="modal__image-select-button" value="<?php echo $key; ?>">
                            <img class="modal__image-select-option" src="<?php echo $directory_table->linkToImage($respective_image['name']); ?>" alt ="<?php echo $respective_image['alt']; ?>">
                        </button>
<?php endforeach; ?>
                        <button class="module-gallery__new-image">New Image</button>
                    </fieldset>
<?php endforeach; ?>
<?php endif; ?>
                </fieldset>

                <fieldset class="blog-metadata">
                    <legend>Blog Meta</legend>
<?php if($isEditingPost): ?>
                    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
<?php endif; ?>

                    <label for="post_banner">Banner</label>
                    <select name="post_banner">
                        <option value="0">* No Banner *</option>
<?php foreach($image_table->getTable() as $key=>$img): ?>
                        <option value="<?php echo $img['id'];?>"<?php if($img['id'] == $post['banner']){echo " selected";}?>><?php echo $img['name']; ?></option>
<?php endforeach; ?>
                    </select>

                    <label for="post_slug">Slug</label>
                    <input id="post_slug" name="post_slug" type="text" placeholder="post-slug" <?php postEditCheck($post['slug'], "", true); ?>>

                    <label for="post_title">Title</label>
                    <input id="post_title" name="post_title" type="text" placeholder="Title" value="<?php echo $post['title']; ?>">

                    <label for="post_summary">Summary</label>
                    <textarea id="post_summary" name="post_summary" row="3" col="80" placeholder="Summary goes here!" contenteditble="true"><?php postEditCheck($post['summary']); ?></textarea>
                    <label for="post_published">
                        <input id="post_published" name="post_published" type="checkbox" checked><span class="after_button">Publish</span>
                    </label>
                    <button type="submit" name="post_UPDATE">Save</button>
                </fieldset>
            </form>
            <div id="modal__image-select" class="modal">
                <div class="modal-content">
                    <span class="close-button">&times;</span>
<?php foreach($image_table->getTable() as $index=>$image): ?>
                    <button class="modal__image-select-button" value="img_<?php echo $image['id']; ?>">
                        <img class="modal__image-select-option" src="<?php echo $directory_table->linkToImage($image['name']); ?>" alt ="<?php echo $image['alt']; ?>">
                    </button>
<?php endforeach; ?>
                </div>
            </div>
            <script>
                CKEDITOR.disableAutoInline = true;
                $('.module-child-text').each(function() {
                    //CKEDITOR.replace($(this).attr('id'));
                    CKEDITOR.inline($(this).attr('id'));
                });
                CKEDITOR.replace('post_summary');
                $('#post_summary').next().keyup(function() {
                    $('$post_summary').html(CKEDITOR.instances['post_summary'].getData());
                });
            </script>
        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>