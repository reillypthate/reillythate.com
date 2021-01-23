<?php blogPost($_GET['blog']); ?>
<?php
    die();
    $post = $content->elementBySlug('blogPost', $SLUG);
    $postContent = $content->getRowFromSlug($SLUG);
?>
<article class="blog">
    <div class="blog-header<?php if(!isset($post['banner'])) echo " no-banner";?>">
<?php if(isset($post['image_id'])): ?>
        <?php img($content->getImages()[$post['image_id']]['slug']); ?>
<?php endif; ?>
        <div class="blog-header__details">
            <h2><?php echo $postContent['title']; ?></h2>
            <div class="blog-header__summary">
                <?php echo $postContent['summary']; ?>
            </div>
        </div>
    </div>
    <div class="blog-body">
        <?php echo $post['body']; ?>
<?php //foreach(getArticleLines($post['body']) as $index=>$line): ?>
        <?php //echo $line; ?>
<?php //endforeach; ?>
    </div>
</article>