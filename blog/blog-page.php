<?php
    $post = $post_table->getRowFromPostSlug($SLUG);
?>
<article class="blog">
    <div class="blog-header<?php if(isset($post['banner'])) echo " no-banner";?>">
<?php if(isset($post['banner'])): ?>
<?php $banner = $image_table->getRowFromImageId($post['banner']); ?>
        <img class="blog-header__banner" src="<?php echo $directory_table->linkToImage($banner['name']); ?>" alt ="<?php echo $banner['alt']; ?>">
<?php endif; ?>
        <div class="blog-header__details">
            <h2><?php echo $post['title']; ?></h2>
            <div class="blog-header__summary">
<?php foreach(getArticleLines($post['summary']) as $index=>$line): ?>
            <?php echo $line; ?>
<?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="blog-body">
<?php foreach(getArticleLines($post['body']) as $index=>$line): ?>
        <?php echo $line; ?>
<?php endforeach; ?>
    </div>
</article>