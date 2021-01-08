
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
            <hr>
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
                    <textarea id="post_summary" name="post_summary" row="3" col="80" placeholder="Summary goes here!" contenteditble="true"><?php postEditCheck($post['summary']); ?></textarea>

                    <label for="post_body">Body</label>
                    <textarea id="post_body" name="post_body" row="12" col="80" placeholder="Body (long)"><?php postEditCheck($post['body']); ?></textarea>

                    <label for="post_published">
                        <input id="post_published" name="post_published" type="checkbox" checked><span class="after_button">Publish</span>
                    </label>

                    <button type="submit" name="post_UPDATE">Update Post</button>
                    <button type="submit" name="post_CANCEL">Cancel</button>
                </form>
            </section>