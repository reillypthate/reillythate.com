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
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
<?php 
    if(isset($_GET['create-new-post'])) {
        $createNewPost = true;
    }else {
        if(!isset($_GET['edit-post'])) {
            $_SESSION['message'] = "Returning to Blog Manager.";
            header('location: ../');
            exit(0);
        }
    }
?>		
        <main id="manager">
            <!-- Echo Section -->
            <section>
                <h2 id="title_echo"><?php 
                    if($createNewPost)  echo "&ldquo;&rdquo;";
                    else                echo $post['title'];
                ?></h2>
                <article id="body_echo">
                    <?php 
                        if($createNewPost)  echo "";
                        else                echo $post['body'];
                    ?>
                </article>
            </section>
            <!-- Form Section -->
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
            <section>
                <h2><?php postEditCheck("Edit", "Add");?> Post</h2>
                <form method="post" action="<?php $directory_table->linkBySlug("blog-admin") . "/index.php"; ?>">
<?php if($isEditingPost): ?>
                    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
<?php endif; ?>
                    <fieldset>
                        <legend>Banner</legend>
                        <select name="post_banner">
                            <option value="0">* No Banner *</option>
<?php foreach($image_table->getTable() as $key=>$img): ?>
                            <option value="<?php echo $img['id'];?>"<?php if($img['id'] == $post['banner']){echo " selected";}?>><?php echo $img['name']; ?></option>
<?php endforeach; ?>
                        </select>
                    </fieldset>

                    <label for="post_slug">Slug</label>
                    <input id="post_slug" name="post_slug" type="text" placeholder="post-slug" <?php postEditCheck($post['slug'], "", true); ?>>

                    <label for="post_title">Title</label>
                    <input id="post_title" name="post_title" type="text" placeholder="Title" value="<?php echo $post['title']; ?>">

                    <label for="post_summary">Summary</label>
                    <textarea id="post_summary" name="post_summary" row="3" col="80" placeholder="Summary goes here!"><?php postEditCheck($post['summary']); ?></textarea>

                    <label for="post_body">Body</label>
                    <textarea id="post_body" name="post_body" row="12" col="80" placeholder="Body (long)"><?php postEditCheck($post['body']); ?></textarea>

                    <label for="post_published">
                        <input id="post_published" name="post_published" type="checkbox" checked><span class="after_button">Publish</span>
                    </label>

                    <button type="submit" name="post_UPDATE">Update Post</button>
                    <button type="submit" name="post_CANCEL">Cancel</button>
                </form>
            </section>
            <script>
                $('textarea').each(function() {
                    CKEDITOR.replace($(this).attr('id'));
                });
                /*
                CKEDITOR.replace("post_summary").setData("post_summary");
                CKEDITOR.add;
                CKEDITOR.replace("post_body").setData("post_body");
                */
                $("#post_slug").on("keyup", function() { console.log("ZZ"); });
                
                $("#post_title").on("keyup", function(e){
                    $("#title_echo").text($("#post_title").val());
                    console.log("Test!");
                });

                CKEDITOR.instances.post_body.on('change', function()
                {
                    $("#body_echo").html(CKEDITOR.instances.post_body.getData());
                });
            </script>
        </main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>