<!-- Blog Post -->
<section class="blog-post">
    <?php include("parallax/blog-page-header.php"); ?>

    <article class="page-break">
<?php if(isset($blogPost['body'])): ?>
<?php foreach($blogPost['body'] as $index=>$module) : ?>
<?php if($module['type'] == 'text'): ?>
        <?php echo html_entity_decode($module['content']); ?>
<?php elseif($module['type'] == 'gallery'): ?>
<?php 
    $images = array();
    foreach($module['content'] as $image_id)
    {
        array_push($images, $image_id);
    }
?>
        <?php include("image-gallery.php"); ?>
<?php else: ?>

<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>

    </article>
</section>